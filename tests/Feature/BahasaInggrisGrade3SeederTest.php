<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Subject;
use Database\Seeders\BahasaInggrisKurikulumMerdekaKelas3Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BahasaInggrisGrade3SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_24_assessments_for_grade_3_bahasa_inggris_kurikulum_merdeka(): void
    {
        // 1. Run seeder
        $this->seed(BahasaInggrisKurikulumMerdekaKelas3Seeder::class);

        // 2. Verify Subject
        $subject = Subject::where('name', 'Bahasa Inggris')->first();
        $this->assertNotNull($subject);

        // 3. Verify exactly 24 assessments for Grade 3
        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '3 SD')
            ->get();

        $this->assertCount(24, $assessments);

        // 4. Verify total questions = 720
        // 12 Quiz * 25 = 300
        // 12 Sumatif (ASTS, ASAS, ASAT) * 35 = 420
        // Total = 720 questions
        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        $this->assertEquals(720, $totalQuestions);

        // 5. Verify all MCQ questions have exactly 4 options (A, B, C, D) and exactly 1 correct
        $mcqQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->where('type', 'mcq_single')->with('options')->get();

        $this->assertEquals(420, $mcqQuestions->count()); // (12 * 15) + (12 * 20) = 180 + 240 = 420

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

        // 6. Verify durations: Quiz = 45 mins, Sumatif = 75 mins
        foreach ($assessments as $asm) {
            if ($asm->type === 'quiz') {
                $this->assertEquals(45, $asm->duration_minutes, 'Durasi Quiz Bahasa Inggris Grade 3 harus 45 menit.');
            } else {
                $this->assertEquals(75, $asm->duration_minutes, 'Durasi Sumatif Bahasa Inggris Grade 3 harus 75 menit.');
            }
        }
    }
}
