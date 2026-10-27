<?php

use App\Models\Assessment;
use App\Models\Question;
use App\Services\ExamGradingService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sec1Keys = [
            1 => 'B', 2 => 'A', 3 => 'A', 4 => 'D', 5 => 'C', 6 => 'D', 7 => 'C', 8 => 'C', 9 => 'A', 10 => 'D',
            11 => 'B', 12 => 'D', 13 => 'C', 14 => 'A', 15 => 'B', 16 => 'A', 17 => 'D', 18 => 'C', 19 => 'C', 20 => 'B',
            21 => 'C', 22 => 'A', 23 => 'A', 24 => 'C', 25 => 'D', 26 => 'B', 27 => 'C', 28 => 'A', 29 => 'B', 30 => 'B',
            31 => 'C', 32 => 'C', 33 => 'B', 34 => 'D', 35 => 'A', 36 => 'C', 37 => 'B', 38 => 'C', 39 => 'A', 40 => 'A',
            41 => 'D', 42 => 'A', 43 => 'C', 44 => 'B', 45 => 'A', 46 => 'D', 47 => 'A', 48 => 'C', 49 => 'D', 50 => 'B',
        ];

        $sec2Keys = [
            // Structure (1 - 15)
            1 => 'A', 2 => 'D', 3 => 'C', 4 => 'D', 5 => 'B', 6 => 'B', 7 => 'B', 8 => 'A', 9 => 'D', 10 => 'C',
            11 => 'D', 12 => 'C', 13 => 'B', 14 => 'A', 15 => 'A',
            // Written Expression (16 - 40)
            16 => 'A', 17 => 'D', 18 => 'A', 19 => 'A', 20 => 'D', 21 => 'B', 22 => 'B', 23 => 'A', 24 => 'C', 25 => 'B',
            26 => 'C', 27 => 'D', 28 => 'B', 29 => 'D', 30 => 'D', 31 => 'C', 32 => 'D', 33 => 'A', 34 => 'B', 35 => 'A',
            36 => 'C', 37 => 'B', 38 => 'C', 39 => 'A', 40 => 'A',
        ];

        $sec3Keys = [
            1 => 'A', 2 => 'D', 3 => 'B', 4 => 'B', 5 => 'B', 6 => 'C', 7 => 'A', 8 => 'A', 9 => 'B', 10 => 'D',
            11 => 'C', 12 => 'D', 13 => 'C', 14 => 'B', 15 => 'A', 16 => 'B', 17 => 'C', 18 => 'C', 19 => 'B', 20 => 'A',
            21 => 'D', 22 => 'C', 23 => 'D', 24 => 'D', 25 => 'B', 26 => 'A', 27 => 'C', 28 => 'A', 29 => 'A', 30 => 'D',
            31 => 'C', 32 => 'B', 33 => 'C', 34 => 'B', 35 => 'A', 36 => 'D', 37 => 'D', 38 => 'C', 39 => 'B', 40 => 'C',
            41 => 'A', 42 => 'C', 43 => 'C', 44 => 'D', 45 => 'B', 46 => 'B', 47 => 'C', 48 => 'A', 49 => 'D', 50 => 'C',
        ];

        $assessment = Assessment::withoutGlobalScopes()
            ->where(function ($q) {
                $q->where('settings->token', 'ADZ794')
                    ->orWhere('settings', 'like', '%"token":"ADZ794"%')
                    ->orWhere('title', 'like', '%TOEFL Simulation [A]%');
            })
            ->first();

        if (! $assessment) {
            return;
        }

        $sections = $assessment->sections()->orderBy('order')->get();
        if ($sections->count() < 3) {
            return;
        }

        $sectionConfigs = [
            $sections[0]->id => $sec1Keys,
            $sections[1]->id => $sec2Keys,
            $sections[2]->id => $sec3Keys,
        ];

        DB::transaction(function () use ($sectionConfigs, $assessment) {
            foreach ($sectionConfigs as $sectionId => $keys) {
                $questions = Question::where('assessment_section_id', $sectionId)
                    ->orWhereHas('questionGroup', fn ($q) => $q->where('assessment_section_id', $sectionId))
                    ->with(['options', 'questionGroup'])
                    ->get();

                $sortedQuestions = $questions->sortBy(function ($q) {
                    if ($q->question_group_id && $q->questionGroup) {
                        return sprintf('%06d_%06d_%09d', (int) ($q->questionGroup->order ?? 1), (int) ($q->order ?? 1), (int) $q->id);
                    }

                    return sprintf('%06d_000000_%09d', (int) ($q->order ?? 1), (int) $q->id);
                })->values();

                foreach ($sortedQuestions as $idx => $question) {
                    $qNum = $idx + 1;
                    if (! isset($keys[$qNum])) {
                        continue;
                    }

                    $targetLabel = strtoupper(trim($keys[$qNum]));
                    $points = (float) ($question->points ?? 1.00);

                    foreach ($question->options as $option) {
                        $isTarget = (strtoupper(trim($option->label)) === $targetLabel);
                        $option->is_correct = $isTarget;
                        $option->score = $isTarget ? $points : 0.00;
                        $option->save();
                    }
                }
            }

            Cache::forget("assessment:grading_keys:{$assessment->id}");
            ExamGradingService::clearMemoryCache();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kunci jawaban tidak di-revert untuk mencegah kehilangan data penilaian aktif
    }
};
