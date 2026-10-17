<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Models\UserAssessmentAccess;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantGrantFreeAssessmentAccessTest extends TestCase
{
    use RefreshDatabase;

    private function createTenantWithAdminAndStudent(): array
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);

        $admin = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        return [$tenant, $admin, $student];
    }

    private function createPaidAssessment(Tenant $tenant, User $creator): Assessment
    {
        $subject = Subject::factory()->create();

        $assessment = Assessment::create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $creator->id,
            'title' => 'TOEIC Official Practice Test',
            'type' => 'ph',
            'duration_minutes' => 60,
            'status' => 'published',
            'price_type' => 'paid',
            'price' => 150000,
            'max_attempts' => 1,
            'access_validity_days' => 35,
            'settings' => [
                'token' => 'TOEIC999',
            ],
            'is_mandatory' => false,
            'is_global' => false,
        ]);

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Listening & Reading',
            'order' => 1,
        ]);

        $question = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Choose the correct answer.',
            'points' => 10,
            'order' => 1,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => 'Option A',
            'is_correct' => true,
            'score' => 10,
            'order' => 1,
        ]);

        return $assessment;
    }

    public function test_admin_tenant_can_grant_free_attempt_for_paid_assessment_to_student(): void
    {
        [$tenant, $admin, $student] = $this->createTenantWithAdminAndStudent();
        $assessment = $this->createPaidAssessment($tenant, $admin);

        // Pastikan belum ada akses sebelum diberikan
        $this->assertDatabaseMissing('user_assessment_accesses', [
            'user_id' => $student->id,
            'assessment_id' => $assessment->id,
        ]);

        $response = $this->actingAs($admin)
            ->from('/dashboard')
            ->post(route('dashboard.users.grant-assessment-access', $student), [
                'assessment_id' => $assessment->id,
            ]);

        $response->assertRedirect('/dashboard');
        $response->assertSessionHas('success');

        // Verifikasi record di database
        $this->assertDatabaseHas('user_assessment_accesses', [
            'user_id' => $student->id,
            'assessment_id' => $assessment->id,
            'quota_attempts' => 1,
            'attempts_used' => 0,
            'last_order_id' => null, // Tidak melalui payment gateway!
        ]);

        $access = UserAssessmentAccess::where('user_id', $student->id)
            ->where('assessment_id', $assessment->id)
            ->first();

        $this->assertNotNull($access);
        $this->assertTrue($access->isValid());
        $this->assertEquals(1, $access->availableAttempts());
        $this->assertFalse($access->isExpired());
    }

    public function test_student_with_granted_access_can_enter_exam_gate_without_checkout(): void
    {
        [$tenant, $admin, $student] = $this->createTenantWithAdminAndStudent();
        $assessment = $this->createPaidAssessment($tenant, $admin);

        // Sebelum diberi akses: siswa membuka exam gate -> dilarikan ke orders.checkout
        $preResponse = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $preResponse->assertRedirect(route('orders.checkout', $assessment));

        // Admin memberikan 1x kesempatan
        $this->actingAs($admin)->post(route('dashboard.users.grant-assessment-access', $student), [
            'assessment_id' => $assessment->id,
        ]);

        // Setelah diberi akses: siswa langsung bisa membuka exam gate (HTTP 200) tanpa checkout!
        $postResponse = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $postResponse->assertOk();
        $postResponse->assertSee($assessment->title);
    }

    public function test_admin_tenant_can_grant_additional_attempt_to_student(): void
    {
        [$tenant, $admin, $student] = $this->createTenantWithAdminAndStudent();
        $assessment = $this->createPaidAssessment($tenant, $admin);

        // Pemberian pertama
        $this->actingAs($admin)->post(route('dashboard.users.grant-assessment-access', $student), [
            'assessment_id' => $assessment->id,
        ]);

        // Pemberian kedua (fleksibel sesuai keputusan user)
        $this->actingAs($admin)->post(route('dashboard.users.grant-assessment-access', $student), [
            'assessment_id' => $assessment->id,
        ]);

        $access = UserAssessmentAccess::where('user_id', $student->id)
            ->where('assessment_id', $assessment->id)
            ->first();

        $this->assertNotNull($access);
        $this->assertEquals(2, $access->quota_attempts);
        $this->assertEquals(0, $access->attempts_used);
        $this->assertEquals(2, $access->availableAttempts());
    }

    public function test_multi_tenant_isolation_prevents_granting_access_to_other_tenant_student(): void
    {
        [$tenantA, $adminA, $studentA] = $this->createTenantWithAdminAndStudent();
        [$tenantB, $adminB, $studentB] = $this->createTenantWithAdminAndStudent();

        $assessmentA = $this->createPaidAssessment($tenantA, $adminA);

        // Admin A mencoba memberikan akses kepada Student B (siswa tenant lain)
        $response = $this->actingAs($adminA)->post(route('dashboard.users.grant-assessment-access', $studentB), [
            'assessment_id' => $assessmentA->id,
        ]);

        $response->assertForbidden();

        $this->assertDatabaseMissing('user_assessment_accesses', [
            'user_id' => $studentB->id,
            'assessment_id' => $assessmentA->id,
        ]);
    }

    public function test_student_cannot_grant_access(): void
    {
        [$tenant, $admin, $student] = $this->createTenantWithAdminAndStudent();
        $assessment = $this->createPaidAssessment($tenant, $admin);

        // Siswa mencoba menembak endpoint grant access
        $response = $this->actingAs($student)->post(route('dashboard.users.grant-assessment-access', $student), [
            'assessment_id' => $assessment->id,
        ]);

        $response->assertForbidden();
    }
}
