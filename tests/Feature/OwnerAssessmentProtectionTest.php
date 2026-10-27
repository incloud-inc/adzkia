<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OwnerAssessmentProtectionTest extends TestCase
{
    use RefreshDatabase;

    private Tenant $enterpriseTenant;

    private Tenant $starterTenant;

    private User $enterpriseAdmin;

    private User $starterAdmin;

    private User $ownerUser;

    private Subject $subject;

    private Assessment $ownerAssessment;

    private Assessment $enterpriseCustomAssessment;

    protected function setUp(): void
    {
        parent::setUp();

        $this->enterpriseTenant = Tenant::factory()->create([
            'name' => 'SMA Enterprise Jaya',
            'subdomain' => 'sma-enterprise',
            'plan' => 'whitelabel',
        ]);

        $this->starterTenant = Tenant::factory()->create([
            'name' => 'SMP Starter Cerdas',
            'subdomain' => 'smp-starter',
            'plan' => 'gratis',
        ]);

        $this->ownerUser = User::factory()->create();
        $ownerTenant = Tenant::factory()->create(['name' => 'Adzkia Pusat']);
        $this->ownerUser->tenants()->attach($ownerTenant->id, ['role' => 'S']);
        $this->ownerUser->update(['current_tenant_id' => $ownerTenant->id]);

        $this->enterpriseAdmin = User::factory()->create(['current_tenant_id' => $this->enterpriseTenant->id]);
        $this->enterpriseAdmin->tenants()->attach($this->enterpriseTenant->id, ['role' => 'A']);

        $this->starterAdmin = User::factory()->create(['current_tenant_id' => $this->starterTenant->id]);
        $this->starterAdmin->tenants()->attach($this->starterTenant->id, ['role' => 'A']);

        $this->subject = Subject::factory()->create(['name' => 'Matematika']);

        // 1. Asesmen buatan Owner ADZKIA (Super User)
        $this->ownerAssessment = Assessment::create([
            'tenant_id' => $ownerTenant->id,
            'subject_id' => $this->subject->id,
            'created_by' => $this->ownerUser->id,
            'title' => 'Tryout Nasional UTBK Adzkia',
            'type' => 'utbk',
            'grade_level' => '12',
            'description' => 'Tryout resmi nasional dari Owner Adzkia.',
            'duration_minutes' => 90,
            'scoring_type' => 'standard',
            'status' => 'published',
            'is_mandatory' => true,
            'is_global' => true,
        ]);

        // 2. Asesmen mandiri buatan Enterprise Tenant
        $this->enterpriseCustomAssessment = Assessment::create([
            'tenant_id' => $this->enterpriseTenant->id,
            'subject_id' => $this->subject->id,
            'created_by' => $this->enterpriseAdmin->id,
            'title' => 'Kuis Harian Matematika SMA Enterprise',
            'type' => 'custom',
            'grade_level' => '12',
            'description' => 'Kuis buatan guru SMA Enterprise.',
            'duration_minutes' => 45,
            'scoring_type' => 'standard',
            'status' => 'published',
            'is_mandatory' => false,
            'is_global' => false,
        ]);
    }

    public function test_enterprise_tenant_sees_delete_button_only_for_own_assessment_and_not_for_owner_assessment(): void
    {
        $response = $this->actingAs($this->enterpriseAdmin)
            ->get("http://{$this->enterpriseTenant->subdomain}.localhost/assessments");

        $response->assertOk();

        // Asesmen buatan Owner: judul terlihat + badge Kurasi ADZKIA, tetapi form/tombol hapus tidak ada
        $response->assertSee('Tryout Nasional UTBK Adzkia');
        $response->assertSee('Kurasi ADZKIA');
        $response->assertDontSee('action="'.route('assessments.destroy', $this->ownerAssessment).'"', false);

        // Asesmen mandiri buatan Enterprise: form/tombol hapus MUNCUL
        $response->assertSee('Kuis Harian Matematika SMA Enterprise');
        $response->assertSee('action="'.route('assessments.destroy', $this->enterpriseCustomAssessment).'"', false);
        $response->assertSee('title="Hapus Ujian Ini"', false);
    }

    public function test_starter_tenant_never_sees_delete_button(): void
    {
        $response = $this->actingAs($this->starterAdmin)
            ->get("http://{$this->starterTenant->subdomain}.localhost/assessments");

        $response->assertOk();
        $response->assertSee('Tryout Nasional UTBK Adzkia');
        $response->assertDontSee('title="Hapus Ujian Ini"', false);
        $response->assertDontSee('action="'.route('assessments.destroy', $this->ownerAssessment).'"', false);
    }

    public function test_enterprise_tenant_cannot_delete_owner_assessment_via_http_delete(): void
    {
        $response = $this->actingAs($this->enterpriseAdmin)
            ->delete(route('assessments.destroy', $this->ownerAssessment));

        $response->assertStatus(403);
        $this->assertDatabaseHas('assessments', [
            'id' => $this->ownerAssessment->id,
        ]);
    }

    public function test_enterprise_tenant_can_delete_own_custom_assessment(): void
    {
        $response = $this->actingAs($this->enterpriseAdmin)
            ->delete(route('assessments.destroy', $this->enterpriseCustomAssessment));

        $response->assertRedirect(route('assessments.index'));
        $this->assertDatabaseMissing('assessments', [
            'id' => $this->enterpriseCustomAssessment->id,
        ]);
    }

    public function test_super_user_can_delete_owner_assessment(): void
    {
        $response = $this->actingAs($this->ownerUser)
            ->delete(route('assessments.destroy', $this->ownerAssessment));

        $response->assertRedirect(route('assessments.index'));
        $this->assertDatabaseMissing('assessments', [
            'id' => $this->ownerAssessment->id,
        ]);
    }
}
