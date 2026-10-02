<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Subject;
use Database\Seeders\BahasaIndonesiaGrade1Semester1Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BahasaIndonesiaGrade1SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_18_assessments_for_grade_1_semester_1(): void
    {
        // 1. Jalankan seeder
        $this->seed(BahasaIndonesiaGrade1Semester1Seeder::class);

        // 2. Verifikasi Subject Bahasa Indonesia
        $subject = Subject::where('name', 'Bahasa Indonesia')->first();
        $this->assertNotNull($subject);

        // 3. Verifikasi jumlah asesmen persis 18
        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '1 SD')
            ->get();

        $this->assertCount(18, $assessments);

        // 4. Verifikasi jumlah seluruh soal adalah 345 butir
        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        $this->assertEquals(345, $totalQuestions);

        // 5. Verifikasi semua soal pilihan ganda (mcq_single dan mcq_multiple) hanya memiliki tepat 3 pilihan jawaban (A, B, C)
        $mcqQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->whereIn('type', ['mcq_single', 'mcq_multiple'])->with('options')->get();

        $this->assertGreaterThan(0, $mcqQuestions->count());

        foreach ($mcqQuestions as $q) {
            $this->assertCount(
                3,
                $q->options,
                "Soal ID {$q->id} [{$q->prompt}] harus memiliki tepat 3 opsi pilihan."
            );
            $labels = $q->options->pluck('label')->all();
            $this->assertEquals(['A', 'B', 'C'], $labels, "Label soal ID {$q->id} harus A, B, C.");
        }

        // 6. Verifikasi asesmen memiliki token unik
        foreach ($assessments as $assessment) {
            $token = data_get($assessment->settings, 'token');
            $this->assertNotEmpty($token);
            $this->assertStringStartsWith('ADZ', $token);
        }

        // 7. Verifikasi idempotensi: Seeder dapat dijalankan ulang tanpa membuat duplikat
        $this->seed(BahasaIndonesiaGrade1Semester1Seeder::class);

        $assessmentsAfterRerun = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '1 SD')
            ->count();

        $this->assertEquals(18, $assessmentsAfterRerun);
    }

    public function test_artisan_command_seeds_successfully(): void
    {
        $this->artisan('adzkia:seed-grade1-bahasa')
            ->assertSuccessful();

        $subject = Subject::where('name', 'Bahasa Indonesia')->first();
        $this->assertNotNull($subject);

        $count = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->count();

        $this->assertEquals(18, $count);
    }
}
