<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use Illuminate\Support\Collection;

class ItemAnalysisService
{
    /**
     * Jalankan analisis butir soal menyeluruh untuk sebuah asesmen berdasarkan sesi yang selesai.
     */
    public function analyzeAssessment(Assessment $assessment, ?int $tenantId = null): array
    {
        // 1. Ambil seluruh sesi ujian yang sudah selesai (completed)
        $sessionQuery = ExamSession::query()
            ->where('assessment_id', $assessment->id)
            ->where('status', 'completed');

        if ($tenantId) {
            $sessionQuery->where('tenant_id', $tenantId);
        }

        $completedSessions = $sessionQuery->with('user')->get();
        $totalParticipants = $completedSessions->count();

        // 2. Ambil seluruh soal asesmen terurut
        $sections = $assessment->sections()
            ->with(['questions.options', 'questions.questionGroup'])
            ->orderBy('order')
            ->get();

        $allQuestions = collect();
        foreach ($sections as $section) {
            foreach ($section->questions as $q) {
                $q->section_title = $section->title;
                $allQuestions->push($q);
            }
        }

        if ($totalParticipants === 0) {
            return [
                'total_participants' => 0,
                'total_questions' => $allQuestions->count(),
                'avg_difficulty' => 0,
                'avg_discrimination' => 0,
                'reliability_kr20' => null,
                'questions' => $allQuestions->map(fn ($q) => $this->emptyQuestionStat($q))->all(),
            ];
        }

        // 3. Ambil semua jawaban peserta untuk sesi-sesi ini
        $sessionIds = $completedSessions->pluck('id')->all();
        $allAnswers = ExamAnswer::query()
            ->whereIn('exam_session_id', $sessionIds)
            ->get()
            ->groupBy('question_id');

        // 4. Pembagian kelompok 27% Atas (Upper) dan 27% Bawah (Lower) berdasarkan total skor
        $sortedSessions = $completedSessions->sortByDesc('score')->values();
        $cutCount = max(1, (int) round($totalParticipants * 0.27));
        $upperSessionIds = $sortedSessions->take($cutCount)->pluck('id')->all();
        $lowerSessionIds = $sortedSessions->slice(-$cutCount)->pluck('id')->all();

        $itemStats = [];
        $pValues = [];
        $dValues = [];
        $itemVariancesSum = 0.0;

        foreach ($allQuestions as $index => $question) {
            $qAnswers = $allAnswers->get($question->id, collect());
            $stat = $this->calculateQuestionMetrics(
                $question,
                $qAnswers,
                $totalParticipants,
                $upperSessionIds,
                $lowerSessionIds,
                $index + 1
            );

            $itemStats[] = $stat;
            $pValues[] = $stat['difficulty_index'];
            $dValues[] = $stat['discrimination_index'];

            // Varians skor butir soal untuk rumus KR-20
            $pointsList = $qAnswers->pluck('points_awarded')->map(fn ($p) => (float) ($p ?? 0))->all();
            if (count($pointsList) > 1) {
                $itemVariancesSum += $this->calculateVariance($pointsList);
            }
        }

        // 5. Kalkulasi Reliabilitas Tes (KR-20 / Cronbach's Alpha)
        $k = max(1, $allQuestions->count());
        $totalScoresList = $completedSessions->pluck('score')->map(fn ($s) => (float) $s)->all();
        $testTotalVariance = $this->calculateVariance($totalScoresList);

        $reliability = null;
        if ($testTotalVariance > 0 && $k > 1) {
            $kr20 = ($k / ($k - 1)) * (1 - ($itemVariancesSum / $testTotalVariance));
            $reliability = max(0, min(1, round($kr20, 3)));
        }

        $avgDifficulty = count($pValues) > 0 ? round(array_sum($pValues) / count($pValues), 3) : 0;
        $avgDiscrimination = count($dValues) > 0 ? round(array_sum($dValues) / count($dValues), 3) : 0;

        return [
            'total_participants' => $totalParticipants,
            'total_questions' => $allQuestions->count(),
            'avg_difficulty' => $avgDifficulty,
            'avg_discrimination' => $avgDiscrimination,
            'reliability_kr20' => $reliability,
            'upper_count' => count($upperSessionIds),
            'lower_count' => count($lowerSessionIds),
            'questions' => $itemStats,
        ];
    }

    /**
     * Kalkulasi statistik psikometri untuk 1 butir soal.
     */
    protected function calculateQuestionMetrics(
        Question $question,
        Collection $answers,
        int $totalParticipants,
        array $upperSessionIds,
        array $lowerSessionIds,
        int $number
    ): array {
        $maxPoints = (float) ($question->points ?? 1);
        if ($maxPoints <= 0) {
            $maxPoints = 1.0;
        }

        // Responden yang menjawab soal ini
        $answeredCount = $answers->count();
        $totalEarnedPoints = $answers->sum(fn ($a) => (float) ($a->points_awarded ?? 0));

        // 1. Tingkat Kesukaran (Facility Value / Difficulty Index p)
        // p = Rata-rata skor peserta / Skor maksimal soal
        $p = $totalParticipants > 0
            ? round($totalEarnedPoints / ($maxPoints * $totalParticipants), 3)
            : 0.0;
        $p = max(0.0, min(1.0, $p));

        $difficultyCategory = match (true) {
            $p >= 0.70 => 'Mudah',
            $p >= 0.30 => 'Sedang',
            default => 'Sukar',
        };

        // 2. Daya Pembeda (Discrimination Index D)
        // D = P_Upper - P_Lower
        $upperAnswers = $answers->whereIn('exam_session_id', $upperSessionIds);
        $lowerAnswers = $answers->whereIn('exam_session_id', $lowerSessionIds);

        $upperEarned = $upperAnswers->sum(fn ($a) => (float) ($a->points_awarded ?? 0));
        $lowerEarned = $lowerAnswers->sum(fn ($a) => (float) ($a->points_awarded ?? 0));

        $upperCount = max(1, count($upperSessionIds));
        $lowerCount = max(1, count($lowerSessionIds));

        $pUpper = $upperEarned / ($maxPoints * $upperCount);
        $pLower = $lowerEarned / ($maxPoints * $lowerCount);

        $d = round($pUpper - $pLower, 3);

        $discriminationCategory = match (true) {
            $d >= 0.40 => 'Sangat Baik',
            $d >= 0.30 => 'Baik',
            $d >= 0.20 => 'Cukup (Revisi)',
            $d >= 0.00 => 'Buruk (Dibuang)',
            default => 'Sangat Buruk / Negatif',
        };

        // 3. Analisis Pengecoh (Distractor Analysis) untuk Pilihan Ganda
        $optionsDist = [];
        $options = $question->options->sortBy('order');

        foreach ($options as $opt) {
            $optId = $opt->id;

            // Hitung pemilih di seluruh peserta
            $totalChosen = $answers->filter(function ($ans) use ($optId) {
                $payload = (array) ($ans->answer_payload ?? []);
                if (isset($payload['option_id'])) {
                    return $payload['option_id'] == $optId;
                }
                if (isset($payload['option_ids']) && is_array($payload['option_ids'])) {
                    return in_array($optId, $payload['option_ids']);
                }

                return false;
            })->count();

            // Hitung pemilih di kelompok atas & kelompok bawah
            $upperChosen = $upperAnswers->filter(function ($ans) use ($optId) {
                $payload = (array) ($ans->answer_payload ?? []);
                if (isset($payload['option_id'])) {
                    return $payload['option_id'] == $optId;
                }
                if (isset($payload['option_ids']) && is_array($payload['option_ids'])) {
                    return in_array($optId, $payload['option_ids']);
                }

                return false;
            })->count();

            $lowerChosen = $lowerAnswers->filter(function ($ans) use ($optId) {
                $payload = (array) ($ans->answer_payload ?? []);
                if (isset($payload['option_id'])) {
                    return $payload['option_id'] == $optId;
                }
                if (isset($payload['option_ids']) && is_array($payload['option_ids'])) {
                    return in_array($optId, $payload['option_ids']);
                }

                return false;
            })->count();

            $pct = $totalParticipants > 0 ? round(($totalChosen / $totalParticipants) * 100, 1) : 0;

            // Status evaluasi distraktor
            $status = 'Biasa';
            if ($opt->is_correct) {
                $status = 'Kunci Jawaban';
            } elseif ($pct >= 5.0 && $lowerChosen >= $upperChosen) {
                $status = 'Berfungsi Baik';
            } elseif ($pct < 5.0) {
                $status = 'Kurang Efektif (<5%)';
            } elseif ($upperChosen > $lowerChosen) {
                $status = 'Menyesatkan (Dipilih Kelompok Atas)';
            }

            $optionsDist[] = [
                'id' => $opt->id,
                'label' => $opt->label ?: '○',
                'option_text' => $opt->option_text,
                'is_correct' => (bool) $opt->is_correct,
                'total_chosen' => $totalChosen,
                'pct' => $pct,
                'upper_chosen' => $upperChosen,
                'lower_chosen' => $lowerChosen,
                'status' => $status,
            ];
        }

        return [
            'number' => $number,
            'question_id' => $question->id,
            'type' => $question->type,
            'prompt' => $question->prompt,
            'points' => $maxPoints,
            'section_title' => $question->section_title ?? '-',
            'total_answers' => $answeredCount,
            'difficulty_index' => $p,
            'difficulty_category' => $difficultyCategory,
            'discrimination_index' => $d,
            'discrimination_category' => $discriminationCategory,
            'p_upper' => round($pUpper, 3),
            'p_lower' => round($pLower, 3),
            'options' => $optionsDist,
        ];
    }

    /**
     * Hitung varians sampel.
     */
    protected function calculateVariance(array $numbers): float
    {
        $count = count($numbers);
        if ($count <= 1) {
            return 0.0;
        }

        $mean = array_sum($numbers) / $count;
        $variance = 0.0;
        foreach ($numbers as $val) {
            $variance += pow($val - $mean, 2);
        }

        return $variance / ($count - 1);
    }

    /**
     * Nilai default kosong jika belum ada peserta.
     */
    protected function emptyQuestionStat(Question $question): array
    {
        return [
            'number' => $question->order ?? 1,
            'question_id' => $question->id,
            'type' => $question->type,
            'prompt' => $question->prompt,
            'points' => (float) ($question->points ?? 1),
            'section_title' => $question->section_title ?? '-',
            'total_answers' => 0,
            'difficulty_index' => 0.0,
            'difficulty_category' => 'Belum Ada Data',
            'discrimination_index' => 0.0,
            'discrimination_category' => 'Belum Ada Data',
            'p_upper' => 0.0,
            'p_lower' => 0.0,
            'options' => [],
        ];
    }
}
