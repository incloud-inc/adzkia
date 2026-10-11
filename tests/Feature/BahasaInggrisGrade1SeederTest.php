<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\BahasaInggrisKurikulumMerdekaKelas1Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BahasaInggrisGrade1SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_24_assessments_for_grade_1_bahasa_inggris(): void
    {
        // 1. Jalankan seeder
        $this->seed(BahasaInggrisKurikulumMerdekaKelas1Seeder::class);

        // 2. Verifikasi Subject Bahasa Inggris
        $subject = Subject::where('name', 'Bahasa Inggris')->first();
        $this->assertNotNull($subject);

        // 3. Verifikasi jumlah asesmen persis 24
        $assessments = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->where('grade_level', '1 SD')
            ->get();

        $this->assertCount(24, $assessments);

        // 4. Verifikasi jumlah seluruh butir soal adalah 480 butir
        // 12 Quiz * 15 = 180
        // 6 ASTS * 20 = 120
        // 3 ASAS * 30 = 90
        // 3 ASAT * 30 = 90
        // Total = 480 butir soal
        $assessmentIds = $assessments->pluck('id');
        $totalQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->count();

        $this->assertEquals(480, $totalQuestions);

        // 5. Verifikasi semua soal pilihan ganda (mcq_single) memiliki tepat 3 pilihan jawaban (A, B, C)
        $mcqQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->where('type', 'mcq_single')->with('options')->get();

        $this->assertEquals(270, $mcqQuestions->count());

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
        $quizSample = $assessments->firstWhere('title', 'Quiz 1 Unit 1: How Are You?');
        $this->assertNotNull($quizSample);
        $this->assertEquals(30, $quizSample->duration_minutes);

        $astsSample = $assessments->firstWhere('title', 'ASTS Semester 1 (Unit 1) #1');
        $this->assertNotNull($astsSample);
        $this->assertEquals(60, $astsSample->duration_minutes);

        $asasSample = $assessments->firstWhere('title', 'ASAS Semester 1 (Unit 1 dan 2) #1');
        $this->assertNotNull($asasSample);
        $this->assertEquals(90, $asasSample->duration_minutes);

        $asajSample = $assessments->firstWhere('title', 'ASAT (Unit 1 sampai 4) #1');
        $this->assertNotNull($asajSample);
        $this->assertEquals(90, $asajSample->duration_minutes);
    }

    public function test_artisan_command_seeds_english_successfully(): void
    {
        $this->artisan('adzkia:seed-grade1-inggris')
            ->assertSuccessful();

        $subject = Subject::where('name', 'Bahasa Inggris')->first();
        $this->assertNotNull($subject);

        $count = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->count();

        $this->assertEquals(24, $count);
    }

    public function test_assessment_wizard_grade_level_filter(): void
    {
        $this->seed(BahasaInggrisKurikulumMerdekaKelas1Seeder::class);

        $tenant = Tenant::first();
        $user = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);

        // Filter 'sd' should match '1 SD' and show 24 results paginated
        $response = $this->actingAs($user)->get(route('assessments.index', ['grade_level' => 'sd']));
        $response->assertOk();
        $response->assertSee('Bahasa Inggris');
        $response->assertSee('Showing');

        // Filter exact '1 SD' and search 'How Are You?' should specifically find Unit 1
        $responseExact = $this->actingAs($user)->get(route('assessments.index', [
            'grade_level' => '1 SD',
            'search' => 'How Are You?',
        ]));
        $responseExact->assertOk();
        $responseExact->assertSee('How Are You?');
    }

    public function test_tenant_and_profile_pages_display_clickable_badges(): void
    {
        $this->seed(BahasaInggrisKurikulumMerdekaKelas1Seeder::class);

        $tenant = Tenant::first();
        $user = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'username' => 'teststudent',
        ]);

        // Public tenant page
        $responseTenant = $this->get(route('tenant.portal.direct', ['subdomain' => $tenant->subdomain]));
        $responseTenant->assertOk();
        $responseTenant->assertSee(route('assessments.index', ['grade_level' => 'sd']));

        // Public profile page (global) redirects to tenant subdomain profile
        $responseGlobal = $this->get(route('global.student.profile', ['username' => $user->username]));
        $responseGlobal->assertRedirect(route('tenant.student.profile', ['subdomain' => $tenant->subdomain, 'username' => $user->username]));

        // Public profile page directly on tenant subdomain
        $responseProfile = $this->get(route('tenant.student.profile', ['subdomain' => $tenant->subdomain, 'username' => $user->username]));
        $responseProfile->assertOk();
        $responseProfile->assertSee(route('assessments.index', ['grade_level' => 'sd']));
    }
}
