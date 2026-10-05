<?php

namespace App\Services;

use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ExamGradingService
{
    /**
     * Cache in-memory per-request untuk mencegah overhead query berulang
     * tanpa risiko serialization __PHP_Incomplete_Class.
     *
     * @var array<int, Collection<int, Question>>
     */
    protected static array $inMemoryQuestions = [];

    /**
     * Ambil pertanyaan asesmen secara aman (in-memory memoized).
     *
     * @return Collection<int, Question>
     */
    public static function getAssessmentQuestions(int $assessmentId): Collection
    {
        if (isset(self::$inMemoryQuestions[$assessmentId])) {
            return self::$inMemoryQuestions[$assessmentId];
        }

        $questions = Question::query()
            ->where(function ($query) use ($assessmentId) {
                $query->whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $assessmentId))
                    ->orWhereHas('questionGroup.assessmentSection', fn ($q) => $q->where('assessment_id', $assessmentId));
            })
            ->with(['options' => fn ($q) => $q->orderBy('order')])
            ->get()
            ->keyBy('id');

        return self::$inMemoryQuestions[$assessmentId] = $questions;
    }

    /**
     * Auto-grade seluruh jawaban objektif pada sesi ujian dan hitung total skor.
     * Metode ini bersifat idempotent (aman dijalankan berkali-kali).
     */
    public static function autoGradeSession(ExamSession $session): void
    {
        DB::transaction(function () use ($session) {
            $assessment = $session->assessment;
            if (! $assessment) {
                return;
            }

            // Ambil semua soal asesmen (in-memory memoized)
            $questions = self::getAssessmentQuestions($assessment->id);

            $answers = ExamAnswer::query()
                ->where('exam_session_id', $session->id)
                ->get();

            $objectiveTypes = [
                'mcq_single',
                'mcq_multiple',
                'mcq_weighted',
                'binary_matrix',
                'boolean_matrix',
                'matching',
                'short_answer',
                'fill_blank',
                'ordering',
                'reorder',
            ];

            $totalScore = 0.0;
            $maxScore = (float) $questions->sum(fn ($q) => (float) ($q->points ?? 1));

            foreach ($answers as $ans) {
                $q = $questions->get($ans->question_id);

                if (! $q) {
                    continue;
                }

                if ($q->type === 'essay') {
                    // Poin essay dipertahankan jika guru sudah menilai
                    if ($ans->points_awarded !== null) {
                        $totalScore += (float) $ans->points_awarded;
                    }

                    continue;
                }

                if (! in_array($q->type, $objectiveTypes, true)) {
                    continue;
                }

                [$isCorrect, $points] = self::gradeOne($q, $ans);

                $ans->forceFill([
                    'is_correct' => $isCorrect,
                    'points_awarded' => $points,
                ])->save();

                $totalScore += (float) $points;
            }

            $scorePenalty = (float) data_get($session->meta, 'score_penalty', 0);
            $finalScore = max(0.0, $totalScore - $scorePenalty);

            $session->forceFill([
                'score' => $finalScore,
                'max_score' => $maxScore > 0 ? $maxScore : $session->max_score,
            ])->save();
        });
    }

    public static function autoGradeSessionOptimized(ExamSession $session): void
    {
        $assessmentId = $session->assessment_id;
        if (! $assessmentId) {
            return;
        }

        // Hapus cache Redis/File lama yang mungkin rusak/poisoned
        $cacheKey = "assessment:grading_keys:{$assessmentId}";
        Cache::forget($cacheKey);

        // 1. Ambil master soal & opsi secara aman (in-memory per-request memoized)
        $questionMap = self::getAssessmentQuestions($assessmentId);

        // 2. Ambil seluruh jawaban siswa (1 Single Query)
        $answers = ExamAnswer::query()
            ->where('exam_session_id', $session->id)
            ->get();

        $totalScore = 0.0;
        $maxScore = (float) $questionMap->sum(fn ($q) => (float) ($q->points ?? 1));
        $bulkUpsertRows = [];
        $now = now();

        $objectiveTypes = [
            'mcq_single', 'mcq_multiple', 'mcq_weighted', 'binary_matrix',
            'boolean_matrix', 'matching', 'short_answer', 'fill_blank', 'ordering', 'reorder',
        ];

        foreach ($answers as $ans) {
            $q = $questionMap->get($ans->question_id);
            if (! $q) {
                continue;
            }

            if ($q->type === 'essay') {
                if ($ans->points_awarded !== null) {
                    $totalScore += (float) $ans->points_awarded;
                }

                continue;
            }

            if (! in_array($q->type, $objectiveTypes, true)) {
                continue;
            }

            [$isCorrect, $points] = self::gradeOne($q, $ans);
            $totalScore += (float) $points;

            // Kumpulkan ke array untuk 1 kali Bulk Upsert
            $bulkUpsertRows[] = [
                'id' => $ans->id,
                'exam_session_id' => $session->id,
                'question_id' => $ans->question_id,
                'is_correct' => $isCorrect,
                'points_awarded' => $points,
                'updated_at' => $now,
            ];
        }

        $scorePenalty = (float) data_get($session->meta, 'score_penalty', 0);
        $finalScore = max(0.0, $totalScore - $scorePenalty);

        // 3. Simpan Jawaban Menggunakan Bulk Upsert (1 Single SQL Query!)
        DB::transaction(function () use ($bulkUpsertRows, $session, $finalScore, $maxScore, $now) {
            if (! empty($bulkUpsertRows)) {
                ExamAnswer::query()->upsert(
                    $bulkUpsertRows,
                    ['id'],
                    ['is_correct', 'points_awarded', 'updated_at']
                );
            }

            $session->forceFill([
                'score' => $finalScore,
                'max_score' => $maxScore > 0 ? $maxScore : $session->max_score,
                'grading_status' => 'completed',
                'graded_at' => $now,
            ])->save();
        });
    }

    /**
     * Hitung kebenaran dan perolehan poin satu butir soal objektif.
     *
     * @return array{bool, float} [isCorrect, pointsAwarded]
     */
    public static function gradeOne(Question $question, ExamAnswer $answer): array
    {
        $payload = (array) ($answer->answer_payload ?? []);
        $maxPoints = (float) ($question->points ?? 1);
        $options = $question->options;

        $correctOptionIds = $options
            ->where('is_correct', true)
            ->pluck('id')
            ->map(fn ($i) => (int) $i)
            ->all();

        return match ($question->type) {
            'mcq_single' => (function () use ($payload, $correctOptionIds, $maxPoints) {
                $picked = (int) ($payload['option_id'] ?? 0);
                $correct = in_array($picked, $correctOptionIds, true);

                return [$correct, $correct ? $maxPoints : 0.0];
            })(),

            'mcq_weighted' => (function () use ($payload, $options, $maxPoints) {
                $picked = (int) ($payload['option_id'] ?? 0);
                $option = $options->firstWhere('id', $picked);
                if (! $option) {
                    return [false, 0.0];
                }
                $points = (float) ($option->score ?? $option->weight ?? ($option->is_correct ? $maxPoints : 0.0));

                return [$points > 0, $points];
            })(),

            'mcq_multiple' => (function () use ($payload, $correctOptionIds, $maxPoints) {
                $picked = array_map('intval', (array) ($payload['option_ids'] ?? []));
                sort($picked);
                sort($correctOptionIds);
                $correct = ! empty($correctOptionIds) && $picked === $correctOptionIds;

                return [$correct, $correct ? $maxPoints : 0.0];
            })(),

            'short_answer', 'fill_blank' => (function () use ($payload, $options, $maxPoints) {
                $given = strtolower(preg_replace('/\s+/', ' ', trim((string) ($payload['value'] ?? ''))));
                if ($given === '') {
                    return [false, 0.0];
                }

                $validKeys = $options
                    ->pluck('option_text')
                    ->map(fn ($v) => strtolower(preg_replace('/\s+/', ' ', trim((string) $v))))
                    ->filter(fn ($v) => $v !== '')
                    ->all();

                $correct = in_array($given, $validKeys, true);

                return [$correct, $correct ? $maxPoints : 0.0];
            })(),

            'binary_matrix', 'boolean_matrix' => (function () use ($payload, $options, $maxPoints) {
                $givenAnswers = (array) ($payload['answers'] ?? []);
                if (empty($givenAnswers)) {
                    return [false, 0.0];
                }

                $total = $options->count();
                if ($total === 0) {
                    return [false, 0.0];
                }

                $correctCount = 0;
                foreach ($options as $opt) {
                    $val = $givenAnswers[$opt->id] ?? null;
                    if ($val === null) {
                        continue;
                    }

                    $expectedKey = strtolower(trim((string) ($opt->match_key ?? '')));
                    if (filled($expectedKey)) {
                        $isExpectedTrue = in_array($expectedKey, ['benar', 'true', '1', 'yes', 'ya'], true);
                    } else {
                        $isExpectedTrue = (bool) $opt->is_correct;
                    }

                    $isGivenTrue = ($val === true || $val === 1 || in_array(strtolower(trim((string) $val)), ['benar', 'true', '1', 'yes', 'ya'], true));

                    if ($isExpectedTrue === $isGivenTrue) {
                        $correctCount++;
                    }
                }

                $points = round(($correctCount / $total) * $maxPoints, 2);

                return [$correctCount === $total, $points];
            })(),

            'matching' => (function () use ($payload, $options, $maxPoints) {
                $givenPairs = (array) ($payload['pairs'] ?? []);
                if (empty($givenPairs)) {
                    return [false, 0.0];
                }

                $total = $options->count();
                if ($total === 0) {
                    return [false, 0.0];
                }

                $correctCount = 0;
                foreach ($options as $opt) {
                    $selected = $givenPairs[$opt->id] ?? null;
                    if ($selected === null || $selected === '') {
                        continue;
                    }

                    $expected = trim((string) ($opt->match_key ?? ''));
                    if (strcasecmp((string) $selected, $expected) === 0) {
                        $correctCount++;
                    }
                }

                $points = round(($correctCount / $total) * $maxPoints, 2);

                return [$correctCount === $total, $points];
            })(),

            'ordering', 'reorder' => (function () use ($payload, $options, $maxPoints) {
                $givenOrder = array_map('intval', (array) ($payload['order'] ?? []));
                if (empty($givenOrder)) {
                    return [false, 0.0];
                }

                $expectedOrder = $options
                    ->sortBy('order')
                    ->pluck('id')
                    ->map(fn ($i) => (int) $i)
                    ->values()
                    ->all();

                $total = count($expectedOrder);
                if ($total === 0) {
                    return [false, 0.0];
                }

                $correctPositions = 0;
                foreach ($expectedOrder as $idx => $optId) {
                    if (isset($givenOrder[$idx]) && $givenOrder[$idx] === $optId) {
                        $correctPositions++;
                    }
                }

                $points = round(($correctPositions / $total) * $maxPoints, 2);

                return [$correctPositions === $total, $points];
            })(),

            default => [false, 0.0],
        };
    }
}
