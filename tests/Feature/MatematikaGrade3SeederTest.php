<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Subject;
use Database\Seeders\MatematikaKurikulumMerdekaKelas3Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MatematikaGrade3SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_30_assessments_for_grade_3_matematika_kurikulum_merdeka(): void
    {
        // 1. Run seeder
        $this->seed(MatematikaKurikulumMerdekaKelas3Seeder::class);

        // 2. Verify Subject
        $subject = Subject::where('name', 'Matematika')->first();
        $this->assertNotNull($subject);

        // 3. Verify exactly 30 assessments for Grade 3
        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '3 SD')
            ->get();

        $this->assertCount(30, $assessments);

        // 4. Verify total questions = 870
        // 18 Quiz * 25 = 450
        // 12 Sumatif (ASTS, ASAS, ASAT) * 35 = 420
        // Total = 870 questions
        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        $this->assertEquals(870, $totalQuestions);

        // 5. Verify all MCQ questions have exactly 4 options (A, B, C, D) and exactly 1 correct
        $mcqQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->where('type', 'mcq_single')->with('options')->get();

        $this->assertEquals(510, $mcqQuestions->count()); // (18 * 15) + (12 * 20) = 270 + 240 = 510

        foreach ($mcqQuestions as $q) {
            $this->assertCount(
                4,
                $q->options,
                "Soal ID {$q->id} [{$q->prompt}] harus memiliki tepat 4 opsi pilihan (A, B, C, D)."
            );
            $labels = $q->options->pluck('label')->all();
            $this->assertEquals(['A', 'B', 'C', 'D'], $labels, "Label soal ID {$q->id} harus A, B, C, D.");

            $correctCount = $q->options->where('is_correct', true)->count();
            $this->assertEquals(1, $correctCount, "Soal ID {$q->id} harus memiliki tepat 1 kunci jawaban benar.");
        }

        // 6. Verify durations: Quiz = 60 mins, Sumatif = 90 mins
        foreach ($assessments as $asm) {
            if ($asm->type === 'quiz') {
                $this->assertEquals(60, $asm->duration_minutes, 'Durasi Quiz Matematika Grade 3 harus 60 menit.');
            } else {
                $this->assertEquals(90, $asm->duration_minutes, 'Durasi Sumatif Matematika Grade 3 harus 90 menit.');
            }
        }
    }
}
