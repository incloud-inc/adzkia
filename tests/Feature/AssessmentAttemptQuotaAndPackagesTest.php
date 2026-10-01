<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\AssessmentPackage;
use App\Models\AssessmentSection;
use App\Models\ExamSession;
use App\Models\Order;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Models\UserAssessmentAccess;
use App\Services\Payment\PaymentGatewayService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AssessmentAttemptQuotaAndPackagesTest extends TestCase
{
    use RefreshDatabase;

    private function createTeacherAndTenant(): array
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        return [$teacher, $tenant];
    }

    private function createStudent(Tenant $tenant): User
    {
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        return $student;
    }

    private function createSampleAssessment(Tenant $tenant, User $teacher, array $attrs = []): Assessment
    {
        $subject = Subject::factory()->create();

        $assessment = Assessment::create(array_merge([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'created_by' => $teacher->id,
            'title' => 'Tryout Akbar Matematika CBT',
            'type' => 'ph',
            'duration_minutes' => 60,
            'status' => 'published',
            'price_type' => 'free',
            'price' => 0,
            'max_attempts' => null,
            'access_validity_days' => 35,
            'settings' => [
                'token' => 'ADZ123',
            ],
            'is_mandatory' => false,
            'is_global' => true,
        ], $attrs));

        $section = AssessmentSection::create([
            'assessment_id' => $assessment->id,
            'title' => 'Bagian 1: Pilihan Ganda',
            'order' => 1,
        ]);

        $question = Question::create([
            'assessment_section_id' => $section->id,
            'type' => 'mcq_single',
            'prompt' => 'Berapa 10 + 15?',
            'explanation' => 'Penjelasan kurikulum: 10 + 15 = 25.',
            'explanation_model' => 'deepseek-chat',
            'points' => 10,
            'order' => 1,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'A',
            'option_text' => '25',
            'is_correct' => true,
            'score' => 10,
            'order' => 1,
        ]);

        QuestionOption::create([
            'question_id' => $question->id,
            'label' => 'B',
            'option_text' => '30',
            'is_correct' => false,
            'score' => 0,
            'order' => 2,
        ]);

        return $assessment;
    }

    public function test_assessment_wizard_step_7_stores_max_attempts_and_flexible_packages(): void
    {
        [$teacher, $tenant] = $this->createTeacherAndTenant();
        $subject = Subject::factory()->create();

        $payload = [
            'title' => 'Ujian Berbayar Paket Fleksibel',
            'subject_id' => $subject->id,
            'type' => 'pts',
            'duration_minutes' => 90,
            'status' => 'published',
            'price_type' => 'paid',
            'price' => 10000,
            'max_attempts' => 5,
            'access_validity_days' => 35,
            'packages' => [
                ['name' => 'Paket 1 Percobaan', 'price' => 10000, 'attempts' => 1, 'validity_days' => 35],
                ['name' => 'Paket 3 Percobaan', 'price' => 25000, 'attempts' => 3, 'validity_days' => 35],
                ['name' => 'Paket 7 Percobaan', 'price' => 50000, 'attempts' => 7, 'validity_days' => 35],
            ],
            'sections' => [
                [
                    'title' => 'Bagian A',
                    'items' => [
                        [
                            'type' => 'mcq_single',
                            'prompt' => 'Soal 1',
                            'points' => 5,
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Benar', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Salah', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $response = $this->actingAs($teacher)
            ->postJson(route('assessments.store'), $payload);

        $response->assertStatus(200);

        $assessment = Assessment::where('title', 'Ujian Berbayar Paket Fleksibel')->first();
        $this->assertNotNull($assessment);
        $this->assertEquals(5, $assessment->max_attempts);
        $this->assertEquals(35, $assessment->access_validity_days);
        $this->assertEquals('paid', $assessment->price_type);

        // Check packages created
        $this->assertCount(3, $assessment->packages);
        $pkg1 = $assessment->packages()->where('attempts', 1)->first();
        $this->assertEquals(10000, (int) $pkg1->price);
        $pkg3 = $assessment->packages()->where('attempts', 3)->first();
        $this->assertEquals(25000, (int) $pkg3->price);
        $pkg7 = $assessment->packages()->where('attempts', 7)->first();
        $this->assertEquals(50000, (int) $pkg7->price);
    }

    public function test_free_assessment_with_null_max_attempts_allows_unlimited_retakes(): void
    {
        [$teacher, $tenant] = $this->createTeacherAndTenant();
        $student = $this->createStudent($tenant);
        $assessment = $this->createSampleAssessment($tenant, $teacher, [
            'max_attempts' => null, // unlimited
            'price_type' => 'free',
        ]);

        // Attempt 1: Start & Complete
        $response1 = $this->actingAs($student)
            ->post(route('exam.start', $assessment), ['agree' => 1]);
        $response1->assertRedirect();

        $session1 = ExamSession::where('assessment_id', $assessment->id)->where('user_id', $student->id)->latest('id')->first();
        $this->assertNotNull($session1);
        $session1->update(['status' => 'completed', 'completed_at' => now()]);

        // Gate should NOT block, and allow Attempt 2
        $gateResponse = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $gateResponse->assertStatus(200);

        // Attempt 2: Start
        $response2 = $this->actingAs($student)
            ->post(route('exam.start', $assessment), ['agree' => 1]);
        $response2->assertRedirect();

        $session2 = ExamSession::where('assessment_id', $assessment->id)->where('user_id', $student->id)->latest('id')->first();
        $this->assertNotEquals($session1->id, $session2->id);
        $this->assertEquals(2, $session2->meta['attempt_number']);
    }

    public function test_free_assessment_with_max_attempts_limits_retakes(): void
    {
        [$teacher, $tenant] = $this->createTeacherAndTenant();
        $student = $this->createStudent($tenant);
        $assessment = $this->createSampleAssessment($tenant, $teacher, [
            'max_attempts' => 2, // Only 2 attempts allowed
            'price_type' => 'free',
        ]);

        // Attempt 1
        $this->actingAs($student)->post(route('exam.start', $assessment), ['agree' => 1]);
        $session1 = ExamSession::where('assessment_id', $assessment->id)->where('user_id', $student->id)->latest('id')->first();
        $session1->update(['status' => 'completed', 'completed_at' => now()]);

        // Attempt 2
        $this->actingAs($student)->post(route('exam.start', $assessment), ['agree' => 1]);
        $session2 = ExamSession::where('assessment_id', $assessment->id)->where('user_id', $student->id)->latest('id')->first();
        $session2->update(['status' => 'completed', 'completed_at' => now()]);

        // Attempt 3: Blocked!
        $gateResponse = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $gateResponse->assertRedirect(route('exam.result', ['session' => $session2->uuid]));

        $startResponse = $this->actingAs($student)->post(route('exam.start', $assessment), ['agree' => 1]);
        $startResponse->assertSessionHas('error');
    }

    public function test_order_settlement_grants_access_and_validity_35_days(): void
    {
        [$teacher, $tenant] = $this->createTeacherAndTenant();
        $student = $this->createStudent($tenant);
        $assessment = $this->createSampleAssessment($tenant, $teacher, [
            'price_type' => 'paid',
            'price' => 25000,
        ]);

        $package = AssessmentPackage::create([
            'assessment_id' => $assessment->id,
            'name' => 'Paket 3 Percobaan',
            'price' => 25000,
            'attempts' => 3,
            'validity_days' => 35,
            'is_active' => true,
        ]);

        // Student creates order choosing package
        $response = $this->actingAs($student)->post(route('orders.store', $assessment), [
            'payment_method' => 'QRIS',
            'package_id' => $package->id,
        ]);
        $response->assertRedirect();

        $order = Order::where('assessment_id', $assessment->id)->where('user_id', $student->id)->first();
        $this->assertNotNull($order);
        $this->assertEquals(3, $order->package_attempts);
        $this->assertEquals(35, $order->package_validity_days);
        $this->assertEquals(25000, (int) $order->price_amount);

        // Simulate payment settlement
        $paymentService = app(PaymentGatewayService::class);
        $paymentService->simulateSettlement($order);

        $this->assertEquals('settled', $order->fresh()->status);

        // Check UserAssessmentAccess record
        $access = UserAssessmentAccess::where('user_id', $student->id)->where('assessment_id', $assessment->id)->first();
        $this->assertNotNull($access);
        $this->assertEquals(3, $access->quota_attempts);
        $this->assertEquals(0, $access->attempts_used);
        $this->assertEquals(3, $access->availableAttempts());
        $this->assertTrue($access->isValid());
        $this->assertFalse($access->isExpired());
    }

    public function test_purchasing_new_package_accumulates_previous_leftover_attempts_and_extends_validity(): void
    {
        [$teacher, $tenant] = $this->createTeacherAndTenant();
        $student = $this->createStudent($tenant);
        $assessment = $this->createSampleAssessment($tenant, $teacher, [
            'price_type' => 'paid',
            'price' => 25000,
        ]);

        $package1 = AssessmentPackage::create([
            'assessment_id' => $assessment->id,
            'name' => 'Paket 1 Percobaan',
            'price' => 10000,
            'attempts' => 1,
            'validity_days' => 35,
            'is_active' => true,
        ]);

        $package3 = AssessmentPackage::create([
            'assessment_id' => $assessment->id,
            'name' => 'Paket 3 Percobaan',
            'price' => 25000,
            'attempts' => 3,
            'validity_days' => 35,
            'is_active' => true,
        ]);

        // Student previously had an access record with 5 total quota, 2 used (3 leftover), but expired yesterday!
        $access = UserAssessmentAccess::create([
            'user_id' => $student->id,
            'assessment_id' => $assessment->id,
            'quota_attempts' => 5,
            'attempts_used' => 2,
            'expires_at' => now()->subDay(), // Expired!
        ]);

        $this->assertTrue($access->isExpired());
        $this->assertFalse($access->isValid());
        $this->assertEquals(3, $access->availableAttempts()); // 3 leftover attempts

        // Access is expired so starting exam should redirect to checkout
        $gateResponse = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $gateResponse->assertRedirect(route('orders.checkout', $assessment));

        // Student buys package with 3 attempts
        $order = Order::create([
            'order_number' => Order::generateOrderNumber(),
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'assessment_package_id' => $package3->id,
            'package_attempts' => 3,
            'package_validity_days' => 35,
            'price_amount' => 25000,
            'total_amount' => 25000,
            'payment_gateway' => 'duitku',
            'payment_method' => 'QRIS',
            'status' => 'pending',
        ]);

        $paymentService = app(PaymentGatewayService::class);
        $paymentService->simulateSettlement($order);

        $freshAccess = $access->fresh();
        // Quota is accumulated: 5 (old) + 3 (new) = 8 total quota!
        // Attempts used is still 2.
        // Available attempts = 8 - 2 = 6 attempts! (3 leftover + 3 new accumulated)
        $this->assertEquals(8, $freshAccess->quota_attempts);
        $this->assertEquals(2, $freshAccess->attempts_used);
        $this->assertEquals(6, $freshAccess->availableAttempts());
        $this->assertFalse($freshAccess->isExpired());
        $this->assertTrue($freshAccess->isValid());
        $this->assertTrue($freshAccess->expires_at->isAfter(now()->addDays(30)));
    }

    public function test_result_page_contains_pembahasan_and_pembahasan_ai_buttons(): void
    {
        [$teacher, $tenant] = $this->createTeacherAndTenant();
        $student = $this->createStudent($tenant);
        $assessment = $this->createSampleAssessment($tenant, $teacher, [
            'price_type' => 'free',
        ]);

        $session = ExamSession::create([
            'assessment_id' => $assessment->id,
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'status' => 'completed',
            'started_at' => now()->subMinutes(30),
            'completed_at' => now(),
            'score' => 10,
            'max_score' => 10,
        ]);

        $response = $this->actingAs($student)->get(route('exam.result', ['session' => $session->uuid]));

        $response->assertStatus(200);
        $response->assertSee('PEMBAHASAN');
        $response->assertSee('PEMBAHASAN AI');
        $response->assertSee('toggleOfficial', false);
        $response->assertSee('toggleAiExplanation', false);
    }
}
