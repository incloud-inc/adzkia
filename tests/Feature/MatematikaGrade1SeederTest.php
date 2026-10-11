<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\MatematikaKurikulumMerdekaKelas1Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MatematikaGrade1SeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_seeds_all_36_assessments_for_grade_1_matematika(): void
    {
        // 1. Jalankan seeder
        $this->seed(MatematikaKurikulumMerdekaKelas1Seeder::class);

        // 2. Verifikasi Subject Matematika
        $subject = Subject::where('name', 'Matematika')->first();
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
        // 24 Quiz * 10 = 240
        // 6 ASTS * 10 = 60
        // 3 ASAS * 15 = 45
        // 3 ASAT * 15 = 45
        // Total MCQ = 390
        $mcqQuestions = Question::whereHas('assessmentSection', function ($q) use ($assessmentIds) {
            $q->whereIn('assessment_id', $assessmentIds);
        })->where('type', 'mcq_single')->with('options')->get();

        $this->assertEquals(390, $mcqQuestions->count());

        foreach ($mcqQuestions as $q) {
            $this->assertCount(
                3,
                $q->options,
                "Soal ID {$q->id} [{$q->prompt}] harus memiliki tepat 3 opsi pilihan."
            );
            $labels = $q->options->pluck('label')->all();
            $this->assertEquals(['A', 'B', 'C'], $labels, "Label soal ID {$q->id} harus A, B, C.");

            $correctCount = $q->options->where('is_correct', true)->count();
            $this->assertEquals(1, $correctCount, "Soal ID {$q->id} harus memiliki tepat 1 kunci jawaban yang benar.");
        }

        // 6. Verifikasi asesmen memiliki token unik
        foreach ($assessments as $assessment) {
            $token = data_get($assessment->settings, 'token');
            $this->assertNotEmpty($token);
            $this->assertStringStartsWith('ADZ', $token);
        }

        // 7. Verifikasi durasi: Quiz 45 menit, ASTS 90 menit, ASAS 120 menit, ASAT 120 menit
        $quizSample = $assessments->firstWhere('title', 'Quiz 1 Bab 1: Bilangan sampai 10');
        $this->assertNotNull($quizSample);
        $this->assertEquals(45, $quizSample->duration_minutes);

        $astsSample = $assessments->firstWhere('title', 'ASTS Semester 1 (Bab 1 dan 2) #1');
        $this->assertNotNull($astsSample);
        $this->assertEquals(90, $astsSample->duration_minutes);

        $asasSample = $assessments->firstWhere('title', 'ASAS Semester 1 (Bab 1 sampai 4) #1');
        $this->assertNotNull($asasSample);
        $this->assertEquals(120, $asasSample->duration_minutes);

        $asajSample = $assessments->firstWhere('title', 'ASAT (Bab 1 sampai 8) #1');
        $this->assertNotNull($asajSample);
        $this->assertEquals(120, $asajSample->duration_minutes);
    }

    public function test_artisan_command_seeds_matematika_successfully(): void
    {
        $this->artisan('adzkia:seed-grade1-matematika')
            ->assertSuccessful();

        $subject = Subject::where('name', 'Matematika')->first();
        $this->assertNotNull($subject);

        $count = Assessment::withoutGlobalScopes()
            ->where('subject_id', $subject->id)
            ->count();

        $this->assertEquals(36, $count);
    }

    public function test_student_dashboard_and_profile_redirects_to_tenant_portal(): void
    {
        $tenant = Tenant::create([
            'name' => 'SD Harapan Bangsa',
            'subdomain' => 'harapan-bangsa',
            'plan' => 'gratis',
        ]);

        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'username' => 'siswa_harapan',
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        // Verifikasi role student
        $this->assertTrue($student->isStudent());

        // 1. Mengunjungi profil publik dari domain utama harus redirect ke subdomain tenant
        $responsePublic = $this->get('http://localhost:8000/@siswa_harapan');
        $responsePublic->assertRedirect('http://harapan-bangsa.localhost:8000/@siswa_harapan');

        // 2. Mengunjungi dashboard dari domain utama harus redirect ke subdomain tenant
        $responseDashboard = $this->actingAs($student)->get('http://localhost:8000/dashboard');
        $responseDashboard->assertRedirect('http://harapan-bangsa.localhost:8000');

        // 3. Mengunjungi profile edit dari domain utama harus redirect ke subdomain tenant
        $responseProfile = $this->actingAs($student)->get('http://localhost:8000/profile');
        $responseProfile->assertRedirect('http://harapan-bangsa.localhost:8000/@siswa_harapan');

        // 4. Mengunjungi profil pada subdomain tenant harus menampilkan profil murid (200 OK)
        $responseOnSubdomain = $this->get('http://harapan-bangsa.localhost:8000/@siswa_harapan');
        $responseOnSubdomain->assertOk();
    }

    public function test_existing_siswaadzkia_redirects_to_bimbel_subdomain(): void
    {
        $bimbel = Tenant::firstOrCreate(
            ['subdomain' => 'bimbel'],
            ['name' => 'BIMBEL ADZKIA', 'plan' => 'whitelabel']
        );

        $siswa = User::firstOrCreate(
            ['username' => 'siswaadzkia'],
            [
                'name' => 'siswaadzkia',
                'email' => 'siswaadzkia@adzkia.id',
                'password' => bcrypt('password'),
                'current_tenant_id' => $bimbel->id,
            ]
        );

        if (! $siswa->tenants()->where('tenant_id', $bimbel->id)->exists()) {
            $siswa->tenants()->attach($bimbel->id, ['role' => 'U']);
        }

        // 1. Mengunjungi http://localhost:8000/@siswaadzkia harus redirect ke http://bimbel.localhost:8000/@siswaadzkia
        $response = $this->get('http://localhost:8000/@siswaadzkia');
        $response->assertRedirect('http://bimbel.localhost:8000/@siswaadzkia');

        // 2. Mengunjungi dari tenant lain http://other.localhost:8000/@siswaadzkia harus redirect ke http://bimbel.localhost:8000/@siswaadzkia
        $otherTenant = Tenant::create([
            'name' => 'Other Tenant',
            'subdomain' => 'other',
            'plan' => 'gratis',
        ]);
        $responseWrongTenant = $this->get('http://other.localhost:8000/@siswaadzkia');
        $responseWrongTenant->assertRedirect('http://bimbel.localhost:8000/@siswaadzkia');

        // 3. Mengunjungi http://bimbel.localhost:8000/@siswaadzkia harus render OK (200)
        $responseDirect = $this->get('http://bimbel.localhost:8000/@siswaadzkia');
        $responseDirect->assertOk();
    }
}
