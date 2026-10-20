<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Payment\PaymentGatewayService;
use App\Services\Payment\RevenueDistributionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantEnterpriseCouponTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test only Enterprise tenants can access coupon management.
     */
    public function test_only_enterprise_tenant_can_manage_coupons(): void
    {
        // 1. Starter tenant: accessing coupons shows upsell view
        $starterTenant = Tenant::factory()->create(['plan' => 'gratis']);
        $starterAdmin = User::factory()->create(['current_tenant_id' => $starterTenant->id]);
        $starterAdmin->tenants()->attach($starterTenant->id, ['role' => 'A']);

        $response = $this->actingAs($starterAdmin)->get(route('tenant.coupons.index'));
        $response->assertOk();
        $response->assertSee('Fitur Eksklusif Enterprise');
        $response->assertSee('Mengapa Kupon Diskon Hanya untuk Level Enterprise?');

        // Starter admin attempting to create coupon is forbidden
        $postResponse = $this->actingAs($starterAdmin)->post(route('tenant.coupons.store'), [
            'code' => 'STARTER10',
            'name' => 'Diskon Starter',
            'discount_type' => 'percentage',
            'discount_amount' => 10,
            'usage_limit_per_user' => 1,
        ]);
        $postResponse->assertForbidden();

        // 2. Enterprise tenant: can access index and see coupon dashboard
        $enterpriseTenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $enterpriseAdmin = User::factory()->create(['current_tenant_id' => $enterpriseTenant->id]);
        $enterpriseAdmin->tenants()->attach($enterpriseTenant->id, ['role' => 'A']);

        $entResponse = $this->actingAs($enterpriseAdmin)->get(route('tenant.coupons.index'));
        $entResponse->assertOk();
        $entResponse->assertSee('Kupon Diskon Murid');
        $entResponse->assertSee('Terbitkan Kupon Baru');
    }

    /**
     * Test Enterprise tenant can create valid coupons within 75% cap.
     */
    public function test_enterprise_tenant_can_create_coupons_and_max_discount_is_enforced(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        // 1. Discount over 75% must fail validation to safeguard ADZKIA platform 25% revenue
        $failResponse = $this->actingAs($admin)->post(route('tenant.coupons.store'), [
            'code' => 'SUPER80',
            'name' => 'Diskon 80%',
            'discount_type' => 'percentage',
            'discount_amount' => 80, // Exceeds 75%
            'usage_limit_per_user' => 1,
        ]);
        $failResponse->assertSessionHasErrors('discount_amount');
        $this->assertDatabaseMissing('coupons', ['code' => 'SUPER80']);

        // 2. Valid 30% discount is successfully saved
        $successResponse = $this->actingAs($admin)->post(route('tenant.coupons.store'), [
            'code' => 'CERDAS30',
            'name' => 'Promo Cerdas 30%',
            'discount_type' => 'percentage',
            'discount_amount' => 30,
            'usage_limit' => 50,
            'usage_limit_per_user' => 1,
            'is_active' => '1',
        ]);
        $successResponse->assertRedirect(route('tenant.coupons.index'));

        $this->assertDatabaseHas('coupons', [
            'tenant_id' => $tenant->id,
            'code' => 'CERDAS30',
            'discount_type' => 'percentage',
            'discount_amount' => 30.00,
            'is_active' => true,
        ]);
    }

    /**
     * Test revenue distribution mathematically guarantees ADZKIA 25% platform revenue
     * and tenant completely absorbs the coupon discount.
     */
    public function test_tenant_absorbs_discount_and_adzkia_platform_revenue_is_safeguarded(): void
    {
        $distributionService = app(RevenueDistributionService::class);
        $enterpriseTenant = Tenant::factory()->create(['plan' => 'whitelabel']); // Enterprise 75:25
        $basePrice = 100000.00;
        $discountAmount = 25000.00; // 25% discount

        $snapshot = $distributionService->computeSnapshot($enterpriseTenant, $basePrice, $discountAmount);

        // ADZKIA platform 25% fee must be based on basePrice and 100% preserved
        $expectedPlatformAmount = 25000.00; // 25% of 100.000
        $this->assertEquals($expectedPlatformAmount, $snapshot['platform_amount']);

        // Enterprise tenant absorbs the 25.000 discount:
        // Base tenant share = 75.000 (75% of 100.000). Tenant amount = 75.000 - 25.000 = 50.000.
        $expectedTenantAmount = 50000.00;
        $this->assertEquals($expectedTenantAmount, $snapshot['tenant_amount']);

        // Student pays: 100.000 - 25.000 = 75.000.
        // Sum of platform and tenant amounts must exactly equal student payment:
        $studentPayment = $basePrice - $discountAmount;
        $this->assertEquals($studentPayment, $snapshot['platform_amount'] + $snapshot['tenant_amount']);
    }

    /**
     * Test student applies coupon at checkout and settlement records usage.
     */
    public function test_student_can_apply_coupon_at_checkout_and_settlement_records_usage(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 100000.00,
            'status' => 'published',
        ]);

        $coupon = Coupon::create([
            'tenant_id' => $tenant->id,
            'code' => 'DISKON20',
            'name' => 'Diskon 20%',
            'discount_type' => 'percentage',
            'discount_amount' => 20.00,
            'usage_limit' => 10,
            'usage_limit_per_user' => 1,
            'is_active' => true,
        ]);

        // 1. Student validates coupon via AJAX apply endpoint
        $applyResponse = $this->actingAs($student)->postJson(route('orders.apply-coupon', $assessment), [
            'coupon_code' => 'DISKON20',
        ]);
        $applyResponse->assertOk();
        $applyResponse->assertJson([
            'success' => true,
            'coupon' => [
                'code' => 'DISKON20',
                'discount_amount' => 20000.00,
                'final_amount' => 80000.00,
            ],
        ]);

        // 2. Student submits order with coupon code
        $postOrderResponse = $this->actingAs($student)->post(route('orders.store', $assessment), [
            'payment_method' => 'QRIS',
            'coupon_code' => 'DISKON20',
        ]);
        $postOrderResponse->assertRedirect();

        $order = Order::where('user_id', $student->id)->where('assessment_id', $assessment->id)->latest()->first();
        $this->assertNotNull($order);
        $this->assertEquals($coupon->id, $order->coupon_id);
        $this->assertEquals('DISKON20', $order->coupon_code_snapshot);
        $this->assertEquals(100000.00, (float) $order->price_amount);
        $this->assertEquals(20000.00, (float) $order->discount_amount);
        $this->assertEquals(1000.00, (float) $order->admin_fee);
        $this->assertEquals(81000.00, (float) $order->total_amount);
        $this->assertEquals(25000.00, (float) $order->platform_revenue_amount);
        $this->assertEquals(55000.00, (float) $order->tenant_revenue_amount);

        // 3. Simulate payment settlement
        $paymentService = app(PaymentGatewayService::class);
        $settled = $paymentService->simulateSettlement($order);
        $this->assertTrue($settled);

        // Verify coupon usage history is recorded
        $this->assertDatabaseHas('coupon_usages', [
            'coupon_id' => $coupon->id,
            'user_id' => $student->id,
            'order_id' => $order->id,
            'discount_amount' => 20000.00,
        ]);

        // Verify coupon used_count incremented
        $coupon->refresh();
        $this->assertEquals(1, $coupon->used_count);

        // 4. Per-user limit enforcement: student cannot reuse coupon because limit is 1x
        $secondApply = $this->actingAs($student)->postJson(route('orders.apply-coupon', $assessment), [
            'coupon_code' => 'DISKON20',
        ]);
        $secondApply->assertStatus(422);
        $secondApply->assertJsonFragment([
            'success' => false,
        ]);
    }
}
