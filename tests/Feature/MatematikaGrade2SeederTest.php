<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Subject;
use Database\Seeders\MatematikaKurikulumMerdekaKelas2Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MatematikaGrade2SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_30_assessments_for_grade_2_matematika_kurikulum_merdeka(): void
    {
        // 1. Jalankan seeder
        $this->seed(MatematikaKurikulumMerdekaKelas2Seeder::class);

        // 2. Verifikasi Subject Matematika
        $subject = Subject::where('name', 'Matematika')->first();
        $this->assertNotNull($subject);

        // 3. Verifikasi jumlah asesmen persis 30 untuk Grade 2
        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '2 SD')
            ->get();

        $this->assertCount(30, $assessments);

        // 4. Verifikasi jumlah seluruh butir soal adalah 570 butir
        // 18 Quiz * 15 = 270
        // 6 ASTS * 20 = 120
        // 3 ASAS * 30 = 90
        // 3 ASAT * 30 = 90
        // Total = 570 butir soal
        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        $this->assertEquals(570, $totalQuestions);

        // 5. Verifikasi semua soal pilihan ganda (mcq_single) memiliki tepat 3 pilihan jawaban (A, B, C)
        $mcqQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->where('type', 'mcq_single')->with('options')->get();

        $this->assertGreaterThan(0, $mcqQuestions->count());

        foreach ($mcqQuestions as $q) {
            $this->assertCount(
                3,
                $q->options,
                "Soal ID {$q->id} [{$q->prompt}] harus memiliki tepat 3 opsi pilihan."
            );
            $labels = $q->options->pluck('label')->all();
            $this->assertEquals(['A', 'B', 'C'], $labels, "Label soal ID {$q->id} harus A, B, C.");
            $this->assertEquals(1, $q->options->where('is_correct', true)->count(), "Soal ID {$q->id} harus memiliki tepat 1 kunci jawaban benar.");
        }

        // 6. Verifikasi asesmen memiliki token unik
        foreach ($assessments as $assessment) {
            $token = $assessment->token ?? data_get($assessment->settings, 'token');
            $this->assertNotEmpty($token);
            $this->assertStringStartsWith('ADZ', $token);
        }

        // 7. Verifikasi durasi: Quiz 45 menit, ASTS 90 menit, ASAS/ASAT 120 menit
        $quizSample = $assessments->firstWhere('title', 'Quiz 1 Bab 1: Bilangan Cacah sampai 100');
        $this->assertNotNull($quizSample);
        $this->assertEquals(45, $quizSample->duration_minutes);

        $astsSample = $assessments->firstWhere('title', 'ASTS Semester 1 (Bab 1 dan 2) #1');
        $this->assertNotNull($astsSample);
        $this->assertEquals(90, $astsSample->duration_minutes);

        $asasSample = $assessments->firstWhere('title', 'ASAS Semester 1 (Bab 1 sampai 3) #1');
        $this->assertNotNull($asasSample);
        $this->assertEquals(120, $asasSample->duration_minutes);

        $asajSample = $assessments->firstWhere('title', 'ASAT (Bab 1 sampai 6) #1');
        $this->assertNotNull($asajSample);
        $this->assertEquals(120, $asajSample->duration_minutes);
    }

    public function test_artisan_command_seeds_grade_2_matematika(): void
    {
        $this->artisan('adzkia:seed-grade2-matematika')
            ->assertSuccessful();

        $subject = Subject::where('name', 'Matematika')->first();
        $this->assertNotNull($subject);

        $count = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '2 SD')
            ->count();

        $this->assertEquals(30, $count);
    }
}
