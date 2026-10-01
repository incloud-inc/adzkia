<?php

namespace App\Services;

use App\Models\ExamAnswer;
use App\Models\ExamSession;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class ExamGradingService
{
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

            // Ambil semua soal asesmen (baik direct section maupun via group)
            $questions = Question::query()
                ->where(function ($query) use ($assessment) {
                    $query->whereHas('assessmentSection', fn ($q) => $q->where('assessment_id', $assessment->id))
                        ->orWhereHas('questionGroup.assessmentSection', fn ($q) => $q->where('assessment_id', $assessment->id));
                })
                ->with(['options' => fn ($q) => $q->orderBy('order')])
                ->get()
                ->keyBy('id');

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
