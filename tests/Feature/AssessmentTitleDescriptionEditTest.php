<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssessmentTitleDescriptionEditTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $tenant;

    private User $teacher;

    private User $student;

    private User $owner;

    private Subject $subject;

    private Assessment $assessment;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create([
            'name' => 'SMAN 8 Jakarta',
            'subdomain' => 'sman8',
            'plan' => 'whitelabel',
        ]);

        $this->teacher = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->teacher->tenants()->attach($this->tenant->id, ['role' => 'T']);

        $this->student = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->student->tenants()->attach($this->tenant->id, ['role' => 'U']);

        $this->owner = User::factory()->create(['current_tenant_id' => $this->tenant->id]);
        $this->owner->tenants()->attach($this->tenant->id, ['role' => 'S']);

        $this->subject = Subject::factory()->create([
            'name' => 'Matematika IPA',
            'code' => 'MAT-IPA',
        ]);

        $this->assessment = Assessment::create([
            'tenant_id' => $this->tenant->id,
            'subject_id' => $this->subject->id,
            'created_by' => $this->teacher->id,
            'title' => 'UTBK 2019 [Soal Asli & Latihan]',
            'type' => 'utbk',
            'grade_level' => 'UTBK',
            'description' => 'Petunjuk pengerjaan UTBK 2019 lama.',
            'duration_minutes' => 90,
            'scoring_type' => 'conversion',
            'status' => 'published',
            'settings' => ['token' => 'ADZ030'],
            'price_type' => 'free',
            'price' => 0,
            'is_mandatory' => true,
            'is_global' => true,
        ]);
    }

    public function test_teacher_can_update_assessment_title_and_description(): void
    {
        $response = $this->actingAs($this->teacher)
            ->put(route('assessments.update', $this->assessment), [
                'title' => 'UTBK 2020 [Soal Asli & Latihan]',
                'description' => 'Petunjuk resmi TPS UTBK 2020 terbaru.',
            ]);

        $response->assertRedirect(route('assessments.show', $this->assessment));
        $response->assertSessionHas('success');

        $this->assessment->refresh();
        $this->assertSame('UTBK 2020 [Soal Asli & Latihan]', $this->assessment->title);
        $this->assertSame('Petunjuk resmi TPS UTBK 2020 terbaru.', $this->assessment->description);
    }

    public function test_update_returns_json_when_requested_as_ajax(): void
    {
        $response = $this->actingAs($this->teacher)
            ->putJson(route('assessments.update', $this->assessment), [
                'title' => 'UTBK 2021 [Paket Campuran]',
                'description' => 'Deskripsi baru via JSON.',
            ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'title' => 'UTBK 2021 [Paket Campuran]',
            'description' => 'Deskripsi baru via JSON.',
        ]);

        $this->assertDatabaseHas('assessments', [
            'id' => $this->assessment->id,
            'title' => 'UTBK 2021 [Paket Campuran]',
            'description' => 'Deskripsi baru via JSON.',
        ]);
    }

    public function test_student_cannot_update_assessment(): void
    {
        $response = $this->actingAs($this->student)
            ->put(route('assessments.update', $this->assessment), [
                'title' => 'Hacked Title',
                'description' => 'Hacked Description',
            ]);

        $response->assertStatus(403);

        $this->assessment->refresh();
        $this->assertSame('UTBK 2019 [Soal Asli & Latihan]', $this->assessment->title);
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->put(route('assessments.update', $this->assessment), [
            'title' => 'Guest Update',
        ]);

        $response->assertRedirect(route('login'));
    }

    public function test_title_is_required_and_cannot_be_empty(): void
    {
        $response = $this->actingAs($this->teacher)
            ->put(route('assessments.update', $this->assessment), [
                'title' => '',
                'description' => 'Some description',
            ]);

        $response->assertSessionHasErrors(['title']);

        $this->assessment->refresh();
        $this->assertSame('UTBK 2019 [Soal Asli & Latihan]', $this->assessment->title);
    }

    public function test_title_cannot_exceed_255_characters(): void
    {
        $response = $this->actingAs($this->teacher)
            ->put(route('assessments.update', $this->assessment), [
                'title' => str_repeat('A', 256),
            ]);

        $response->assertSessionHasErrors(['title']);
    }

    public function test_tenant_isolation_prevents_teacher_from_updating_other_tenant_assessment(): void
    {
        $otherTenant = Tenant::factory()->create([
            'name' => 'SMAN 70 Jakarta',
            'subdomain' => 'sman70',
            'plan' => 'whitelabel',
        ]);

        $otherTeacher = User::factory()->create(['current_tenant_id' => $otherTenant->id]);
        $otherTeacher->tenants()->attach($otherTenant->id, ['role' => 'T']);

        // Assessment explicitly belonging to tenant SMAN 8
        $response = $this->actingAs($otherTeacher)
            ->put(route('assessments.update', $this->assessment), [
                'title' => 'Cross-Tenant Tampering',
            ]);

        // Karena ScopedBy TenantScope aktif, route binding akan menghasilkan 404,
        // atau jika lolos TenantScope, controller abort(403).
        $this->assertTrue(in_array($response->getStatusCode(), [403, 404], true));

        $this->assessment->refresh();
        $this->assertSame('UTBK 2019 [Soal Asli & Latihan]', $this->assessment->title);
    }

    public function test_super_user_owner_can_update_any_assessment(): void
    {
        $response = $this->actingAs($this->owner)
            ->put(route('assessments.update', $this->assessment), [
                'title' => 'UTBK Resmi Nasional 2025',
                'description' => 'Petunjuk resmi ditetapkan oleh Owner ADZKIA.',
            ]);

        $response->assertRedirect(route('assessments.show', $this->assessment));
        $this->assessment->refresh();
        $this->assertSame('UTBK Resmi Nasional 2025', $this->assessment->title);
        $this->assertSame('Petunjuk resmi ditetapkan oleh Owner ADZKIA.', $this->assessment->description);
    }

    public function test_assessment_detail_page_renders_edit_button_for_teacher(): void
    {
        $response = $this->actingAs($this->teacher)
            ->get(route('assessments.show', $this->assessment));

        $response->assertStatus(200);
        $response->assertSee('Edit Judul &amp; Deskripsi', false);
        $response->assertSee('open-edit-assessment-modal', false);
        $response->assertSee('editAssessmentModal', false);
    }

    public function test_assessment_detail_page_hides_edit_button_for_student(): void
    {
        $response = $this->actingAs($this->student)
            ->get(route('assessments.show', $this->assessment));

        $response->assertStatus(200);
        $response->assertDontSee('Edit Judul &amp; Deskripsi', false);
        $response->assertDontSee('editAssessmentModal', false);
    }
}
