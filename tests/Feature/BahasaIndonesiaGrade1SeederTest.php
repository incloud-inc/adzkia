<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\BahasaIndonesiaKurikulumMerdekaKelas1Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BahasaIndonesiaGrade1SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_36_assessments_for_grade_1_kurikulum_merdeka(): void
    {
        // 1. Jalankan seeder
        $this->seed(BahasaIndonesiaKurikulumMerdekaKelas1Seeder::class);

        // 2. Verifikasi Subject Bahasa Indonesia
        $subject = Subject::where('name', 'Bahasa Indonesia')->first();
        $this->assertNotNull($subject);

        // 3. Verifikasi jumlah asesmen persis 36
        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '1 SD')
            ->get();

        $this->assertCount(36, $assessments);

        // 4. Verifikasi jumlah seluruh butir soal adalah 660 butir
        // 24 Quiz * 15 = 360
        // 6 ASTS * 20 = 120
        // 3 ASAS * 30 = 90
        // 3 ASAT * 30 = 90
        // Total = 660 butir soal
        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        $this->assertEquals(660, $totalQuestions);

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
        }

        // 6. Verifikasi asesmen memiliki token unik
        foreach ($assessments as $assessment) {
            $token = data_get($assessment->settings, 'token');
            $this->assertNotEmpty($token);
            $this->assertStringStartsWith('ADZ', $token);
        }

        // 7. Verifikasi durasi: Quiz 30 menit, ASTS 60 menit, ASAS/ASAT 90 menit
        $quizSample = $assessments->firstWhere('title', 'Quiz 1 Bab 1: Bunyi Apa?');
        $this->assertEquals(30, $quizSample->duration_minutes);

        $astsSample = $assessments->firstWhere('title', 'ASTS Semester 1 (Bab 1 dan 2) #1');
        $this->assertEquals(60, $astsSample->duration_minutes);

        $asajSample = $assessments->firstWhere('title', 'ASAT (Bab 1 sampai 8) #1');
        $this->assertEquals(90, $asajSample->duration_minutes);
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

        $this->assertEquals(36, $count);
    }

    public function test_teacher_can_edit_question_from_assessment(): void
    {
        $this->seed(BahasaIndonesiaKurikulumMerdekaKelas1Seeder::class);

        $tenant = Tenant::first();
        $teacher = User::create([
            'name' => 'Guru Bahasa',
            'email' => 'guru@adzkia.id',
            'password' => bcrypt('password'),
            'current_tenant_id' => $tenant->id,
        ]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $question = Question::where('type', 'mcq_single')->first();

        $response = $this->actingAs($teacher)
            ->putJson(route('questions.update', $question), [
                'prompt' => '[Keterangan Gambar: Ilustrasi burung pipit]\nSuara burung pada gambar adalah ....',
                'points' => 2.0,
                'explanation' => 'Burung berkicau merdu cuit-cuit.',
                'options' => [
                    ['id' => $question->options[0]->id, 'label' => 'A', 'option_text' => 'cuit-cuit', 'is_correct' => true],
                    ['id' => $question->options[1]->id, 'label' => 'B', 'option_text' => 'guk-guk', 'is_correct' => false],
                    ['id' => $question->options[2]->id, 'label' => 'C', 'option_text' => 'meong', 'is_correct' => false],
                ],
                'correct_option' => 0,
            ]);

        $response->assertOk()
            ->assertJsonPath('success', true);

        $question->refresh();
        $this->assertStringContainsString('burung pipit', $question->prompt);
        $this->assertEquals(2.0, (float) $question->points);
        $this->assertEquals('cuit-cuit', $question->options->firstWhere('label', 'A')->option_text);
        $this->assertTrue((bool) $question->options->firstWhere('label', 'A')->is_correct);
    }

    public function test_teacher_can_toggle_assessment_status_in_detail_view(): void
    {
        $this->seed(BahasaIndonesiaKurikulumMerdekaKelas1Seeder::class);

        $tenant = Tenant::first();
        $teacher = User::create([
            'name' => 'Guru Kelas 1',
            'email' => 'guru1@adzkia.id',
            'password' => bcrypt('password'),
            'current_tenant_id' => $tenant->id,
        ]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::first();
        $this->assertEquals('published', $assessment->status);

        // Menonaktifkan asesmen (menjadi draf)
        $response = $this->actingAs($teacher)
            ->patch(route('assessments.toggle-status', $assessment));

        $response->assertRedirect();
        $assessment->refresh();
        $this->assertEquals('draft', $assessment->status);

        // Mengaktifkan kembali asesmen (menjadi published)
        $response2 = $this->actingAs($teacher)
            ->patch(route('assessments.toggle-status', $assessment));

        $response2->assertRedirect();
        $assessment->refresh();
        $this->assertEquals('published', $assessment->status);
    }

    public function test_assessment_detail_view_renders_edit_and_status_buttons_for_teacher(): void
    {
        $this->seed(BahasaIndonesiaKurikulumMerdekaKelas1Seeder::class);

        $tenant = Tenant::first();
        $teacher = User::create([
            'name' => 'Guru Wali',
            'email' => 'guruwali@adzkia.id',
            'password' => bcrypt('password'),
            'current_tenant_id' => $tenant->id,
        ]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $assessment = Assessment::first();

        $response = $this->actingAs($teacher)
            ->get(route('assessments.show', $assessment));

        $response->assertOk();
        $response->assertSee('Nonaktifkan Asesmen');
        $response->assertSee('Edit Soal');
    }
}
