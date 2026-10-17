<?php

namespace App\Services;

use App\Models\Assessment;
use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use App\Services\Scoring\SpecializedScoringService;
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

    public static function clearMemoryCache(): void
    {
        self::$inMemoryQuestions = [];
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
            [$finalScore, $computedMaxScore, $scaleResult] = self::calculateFinalScores($assessment, $questions, $answers, $scorePenalty);

            $hasEssay = $questions->contains(fn ($q) => $q->type === 'essay');
            $meta = (array) ($session->meta ?? []);
            if ($scaleResult !== null) {
                $meta['scale_result'] = $scaleResult;
            }
            $isScoreReleased = (bool) data_get($meta, 'is_score_released', false);

            if ($hasEssay && ! $isScoreReleased) {
                $gradingStatus = 'pending_manual';
                $meta['is_score_released'] = false;
            } else {
                $gradingStatus = 'completed';
                if (! $hasEssay) {
                    $meta['is_score_released'] = true;
                }
            }

            $session->forceFill([
                'score' => $finalScore,
                'max_score' => $computedMaxScore > 0 ? $computedMaxScore : $session->max_score,
                'grading_status' => $gradingStatus,
                'meta' => $meta,
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
                continue;
            }

            if (! in_array($q->type, $objectiveTypes, true)) {
                continue;
            }

            [$isCorrect, $points] = self::gradeOne($q, $ans);

            // Kumpulkan ke array untuk 1 kali Bulk Upsert
            $bulkUpsertRows[] = [
                'id' => $ans->id,
                'exam_session_id' => $session->id,
                'question_id' => $ans->question_id,
                'is_correct' => $isCorrect,
                'points_awarded' => $points,
                'updated_at' => $now,
            ];

            // Perbarui objek in-memory agar perhitungan nilai akhir akurat
            $ans->is_correct = $isCorrect;
            $ans->points_awarded = $points;
        }

        $assessment = $session->assessment;
        $scorePenalty = (float) data_get($session->meta, 'score_penalty', 0);
        [$finalScore, $computedMaxScore, $scaleResult] = self::calculateFinalScores($assessment, $questionMap, $answers, $scorePenalty);

        $hasEssay = $questionMap->contains(fn ($q) => $q->type === 'essay');
        $meta = (array) ($session->meta ?? []);
        if ($scaleResult !== null) {
            $meta['scale_result'] = $scaleResult;
        }
        $isScoreReleased = (bool) data_get($meta, 'is_score_released', false);

        if ($hasEssay && ! $isScoreReleased) {
            $gradingStatus = 'pending_manual';
            $meta['is_score_released'] = false;
        } else {
            $gradingStatus = 'completed';
            if (! $hasEssay) {
                $meta['is_score_released'] = true;
            }
        }

        // 3. Simpan Jawaban Menggunakan Bulk Upsert (1 Single SQL Query!)
        DB::transaction(function () use ($bulkUpsertRows, $session, $finalScore, $computedMaxScore, $gradingStatus, $meta, $now) {
            if (! empty($bulkUpsertRows)) {
                ExamAnswer::query()->upsert(
                    $bulkUpsertRows,
                    ['id'],
                    ['is_correct', 'points_awarded', 'updated_at']
                );
            }

            $session->forceFill([
                'score' => $finalScore,
                'max_score' => $computedMaxScore > 0 ? $computedMaxScore : $session->max_score,
                'grading_status' => $gradingStatus,
                'graded_at' => $now,
                'meta' => $meta,
            ])->save();
        });
    }

    /**
     * Hitung skor akhir dan skor maksimum sesi ujian dengan formula pembobotan per bagian (skala 100) atau akumulasi murni.
     *
     * @param  Collection<int, Question>  $questionMap
     * @param  Collection<int, ExamAnswer>|array  $answers
     * @return array{float, float} [finalScore, maxScore]
     */
    public static function calculateFinalScores(?Assessment $assessment, Collection $questionMap, $answers, float $scorePenalty = 0.0): array
    {
        if ($assessment) {
            $scoringService = app(SpecializedScoringService::class);
            if ($scoringService->isSpecializedScale($assessment)) {
                $sections = $assessment->relationLoaded('sections')
                    ? $assessment->sections
                    : $assessment->sections()->get();

                $scaleResult = $scoringService->calculateSpecializedScore(
                    $assessment,
                    $sections,
                    $questionMap,
                    $answers,
                    $scorePenalty
                );

                return [(float) $scaleResult['score'], (float) $scaleResult['max_score'], $scaleResult];
            }
        }

        $settings = (array) ($assessment?->settings ?? []);
        $isWeighted = ($settings['formula_type'] ?? '') === 'weighted_percentage' && ! empty($settings['section_weights']);

        if (! $isWeighted) {
            $rawTotal = 0.0;
            foreach ($answers as $ans) {
                $rawTotal += (float) (is_array($ans) ? ($ans['points_awarded'] ?? 0.0) : ($ans->points_awarded ?? 0.0));
            }
            $rawMax = (float) $questionMap->sum(fn ($q) => (float) ($q->points ?? 1));
            $finalScore = max(0.0, $rawTotal - $scorePenalty);

            return [round($finalScore, 2), $rawMax > 0 ? $rawMax : 100.0, null];
        }

        $sectionWeights = (array) $settings['section_weights'];
        $sectionEarned = [];
        $sectionMax = [];

        foreach ($questionMap as $q) {
            $secId = $q->assessment_section_id;
            if (! $secId && $q->questionGroup) {
                $secId = $q->questionGroup->assessment_section_id;
            }
            if ($secId) {
                $sectionMax[$secId] = ($sectionMax[$secId] ?? 0.0) + (float) ($q->points ?? 1);
            }
        }

        foreach ($answers as $ans) {
            $qId = is_array($ans) ? ($ans['question_id'] ?? null) : ($ans->question_id ?? null);
            $q = $questionMap->get($qId);
            if (! $q) {
                continue;
            }
            $secId = $q->assessment_section_id;
            if (! $secId && $q->questionGroup) {
                $secId = $q->questionGroup->assessment_section_id;
            }
            $awarded = (float) (is_array($ans) ? ($ans['points_awarded'] ?? 0.0) : ($ans->points_awarded ?? 0.0));
            if ($secId) {
                $sectionEarned[$secId] = ($sectionEarned[$secId] ?? 0.0) + $awarded;
            }
        }

        $weightedTotal = 0.0;
        foreach ($sectionWeights as $secId => $weight) {
            $weight = (float) $weight;
            $maxP = $sectionMax[$secId] ?? 0.0;
            $earnedP = $sectionEarned[$secId] ?? 0.0;

            if ($maxP > 0) {
                $sectionScorePct = ($earnedP / $maxP) * 100.0;
                $weightedTotal += ($sectionScorePct * ($weight / 100.0));
            }
        }

        $finalScore = max(0.0, $weightedTotal - $scorePenalty);

        return [round($finalScore, 2), 100.0, null];
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
