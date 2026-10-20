<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Models\UserAssessmentAccess;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentAssessmentCatalogAndPurchaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_dashboard_displays_paid_and_free_assessments_with_action_buttons(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Bimbel Adzkia', 'subdomain' => 'bimbeladzkia']);
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'username' => 'siswa_cbt',
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Matematika Dasar']);

        // 1. Asesmen Berbayar (Belum dibeli)
        $paidAssessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Try Out UTBK SNBT Premium Berbayar',
            'type' => 'utbk',
            'grade_level' => '12 SMA',
            'duration_minutes' => 90,
            'status' => 'published',
            'price_type' => 'paid',
            'price' => 50000,
            'settings' => ['token' => 'PREM01'],
        ]);

        // 2. Asesmen Gratis
        $freeAssessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Simulasi Tes Potensi Skolastik Gratis',
            'type' => 'utbk',
            'grade_level' => '12 SMA',
            'duration_minutes' => 60,
            'status' => 'published',
            'price_type' => 'free',
            'price' => 0,
            'settings' => ['token' => 'FREE01'],
        ]);

        $response = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/dashboard");

        $response->assertStatus(200);
        $response->assertSee('Try Out UTBK SNBT Premium Berbayar');
        $response->assertSee('Simulasi Tes Potensi Skolastik Gratis');

        // Pastikan harga asesmen berbayar dan tombol Beli muncul mengarah ke orders.checkout
        $response->assertSee('Rp 50.000');
        $response->assertSee(route('orders.checkout', $paidAssessment));
        $response->assertSee('Beli (Rp 50.000)');

        // Asesmen gratis mengarah ke gerbang ujian
        $response->assertSee(route('exam.gate.show', $freeAssessment));
        $response->assertSee('Mulai Ujian');
    }

    public function test_student_can_search_and_filter_assessments_on_dashboard(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Bimbel Adzkia', 'subdomain' => 'bimbeladzkia']);
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subjectBiologi = Subject::create(['name' => 'Biologi Sel']);
        $subjectFisika = Subject::create(['name' => 'Fisika Kuantum']);

        Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subjectBiologi->id,
            'created_by' => $student->id,
            'title' => 'Ujian Mandiri Biologi Sel',
            'type' => 'pts',
            'grade_level' => '11 SMA',
            'duration_minutes' => 45,
            'status' => 'published',
            'price_type' => 'paid',
            'price' => 25000,
        ]);

        Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subjectFisika->id,
            'created_by' => $student->id,
            'title' => 'Latihan Soal Fisika Kuantum',
            'type' => 'pts',
            'grade_level' => '11 SMA',
            'duration_minutes' => 45,
            'status' => 'published',
            'price_type' => 'free',
            'price' => 0,
        ]);

        // Cari 'Biologi'
        $searchResponse = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/dashboard?search=Biologi");
        $searchResponse->assertStatus(200);
        $searchResponse->assertSee('Ujian Mandiri Biologi Sel');
        $searchResponse->assertDontSee('Latihan Soal Fisika Kuantum');

        // Filter 'price_type=free'
        $freeResponse = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/dashboard?price_type=free");
        $freeResponse->assertStatus(200);
        $freeResponse->assertSee('Latihan Soal Fisika Kuantum');
        $freeResponse->assertDontSee('Ujian Mandiri Biologi Sel');

        // Filter 'price_type=paid'
        $paidResponse = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/dashboard?price_type=paid");
        $paidResponse->assertStatus(200);
        $paidResponse->assertSee('Ujian Mandiri Biologi Sel');
        $paidResponse->assertDontSee('Latihan Soal Fisika Kuantum');
    }

    public function test_assessments_page_shows_purchase_button_in_action_column_for_unpaid_assessments(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Bimbel Adzkia', 'subdomain' => 'bimbeladzkia']);
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Kimia Organik']);

        // 1. Asesmen Berbayar (Belum dibeli)
        $paidAssessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Paket Tryout Kimia Eksklusif',
            'type' => 'pas',
            'grade_level' => '12 SMA',
            'duration_minutes' => 75,
            'status' => 'published',
            'price_type' => 'paid',
            'price' => 75000,
        ]);

        // 2. Asesmen Berbayar (Sudah dibeli dan aktif)
        $purchasedAssessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Paket Tryout Kimia Sudah Dibeli',
            'type' => 'pas',
            'grade_level' => '12 SMA',
            'duration_minutes' => 75,
            'status' => 'published',
            'price_type' => 'paid',
            'price' => 75000,
        ]);

        UserAssessmentAccess::create([
            'user_id' => $student->id,
            'assessment_id' => $purchasedAssessment->id,
            'quota_attempts' => 3,
            'attempts_used' => 0,
            'expires_at' => now()->addDays(30),
            'last_purchased_at' => now(),
        ]);

        $response = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/assessments");

        $response->assertStatus(200);
        $response->assertSee('Biaya / Akses');

        // Untuk asesmen berbayar belum dibeli: muncul tombol Beli di kolom Aksi
        $response->assertSee('Paket Tryout Kimia Eksklusif');
        $response->assertSee('Beli (Rp 75.000)');
        $response->assertSee(route('orders.checkout', $paidAssessment));

        // Untuk asesmen yang sudah dibeli: muncul tombol Ikuti Ujian
        $response->assertSee('Paket Tryout Kimia Sudah Dibeli');
        $response->assertSee(route('exam.gate.show', $purchasedAssessment));
        $response->assertSee('Aktif (3x)');
    }

    public function test_student_dashboard_and_assessments_page_show_accurate_question_counts(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Bimbel Adzkia', 'subdomain' => 'bimbeladzkia']);
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Fisika Terapan']);

        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Simulasi Ujian Fisika 15 Soal',
            'type' => 'pts',
            'grade_level' => '11 SMA',
            'duration_minutes' => 60,
            'status' => 'published',
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian A',
            'order' => 1,
        ]);

        for ($i = 1; $i <= 15; $i++) {
            Question::create([
                'assessment_section_id' => $section->id,
                'type' => 'multiple_choice',
                'prompt' => "Pertanyaan ke-{$i}",
                'points' => 1,
                'order' => $i,
            ]);
        }

        // Dashboard
        $dashResponse = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/dashboard");
        $dashResponse->assertStatus(200);
        $dashResponse->assertSee('15 Soal');

        // Assessments page
        $assessmentsResponse = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/assessments");
        $assessmentsResponse->assertStatus(200);
        $assessmentsResponse->assertSee('15 Soal');
    }

    public function test_student_dashboard_renders_markdown_description(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Bimbel Adzkia', 'subdomain' => 'bimbeladzkia']);
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'username' => 'siswa_cbt_md',
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::create(['name' => 'Fisika']);

        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $student->id,
            'title' => 'Try Out Fisika Mekanika',
            'type' => 'utbk',
            'grade_level' => '12 SMA',
            'duration_minutes' => 60,
            'status' => 'published',
            'price_type' => 'free',
            'price' => 0,
            'description' => '**Perhatian!** Ujian ini mencakup materi *kinematika* dan $$E = mc^2$$.',
        ]);

        $response = $this->actingAs($student)->get("http://{$tenant->subdomain}.localhost/dashboard");

        $response->assertStatus(200);
        $response->assertSee('<strong>Perhatian!</strong>', false);
        $response->assertSee('<em>kinematika</em>', false);
    }
}
