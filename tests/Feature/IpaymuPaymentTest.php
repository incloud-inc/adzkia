<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Payment\PaymentGatewayService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class IpaymuPaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('payment.gateways.ipaymu.va', '1179001329983555');
        Config::set('payment.gateways.ipaymu.api_key', 'CEF02541-DB54-48EE-84C1-B96DD1FF0BB4');
        Config::set('payment.gateways.ipaymu.sandbox', false);
        Config::set('payment.gateways.ipaymu.base_url', 'https://my.ipaymu.com/api/v2/');
    }

    public function test_ipaymu_payment_service_generates_payment_url(): void
    {
        Http::fake([
            'https://my.ipaymu.com/api/v2/payment/direct' => Http::response([
                'Status' => 500,
                'Message' => 'Direct method not available',
            ], 500),
            'https://my.ipaymu.com/api/v2/payment' => Http::response([
                'Status' => 200,
                'Success' => true,
                'Message' => 'Success',
                'Data' => [
                    'SessionID' => 'MOCK-SESSION-IPAYMU-12345',
                    'Url' => 'https://payment.ipaymu.com/#/MOCK-SESSION-IPAYMU-12345',
                ],
            ], 200),
        ]);

        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 75000.00,
        ]);

        $order = Order::create([
            'order_number' => 'ORD-TEST-IPAYMU-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 75000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0,
            'total_amount' => 75000.00,
            'payment_gateway' => 'ipaymu',
            'payment_method' => 'QRIS',
            'status' => 'pending',
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 37500.00,
            'platform_revenue_amount' => 37500.00,
        ]);

        Config::set('payment.default', 'ipaymu');
        $service = app(PaymentGatewayService::class);
        $result = $service->createPayment($order, 'QRIS');

        $this->assertTrue($result['success']);
        $this->assertEquals('ipaymu', $result['gateway']);
        $this->assertEquals('MOCK-SESSION-IPAYMU-12345', $result['reference']);
        $this->assertEquals('https://payment.ipaymu.com/#/MOCK-SESSION-IPAYMU-12345', $result['payment_url']);

        $order->refresh();
        $this->assertEquals('MOCK-SESSION-IPAYMU-12345', $order->payment_reference);
        $this->assertEquals('https://payment.ipaymu.com/#/MOCK-SESSION-IPAYMU-12345', $order->payment_url);
    }

    public function test_ipaymu_webhook_settlement_updates_order_and_grants_assessment_access(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 50000.00,
        ]);

        $order = Order::create([
            'order_number' => 'ORD-IPAYMU-SETTLE-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0,
            'total_amount' => 50000.00,
            'payment_gateway' => 'ipaymu',
            'payment_method' => 'QRIS',
            'status' => 'pending',
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 25000.00,
            'platform_revenue_amount' => 25000.00,
        ]);

        $payload = [
            'reference_id' => 'ORD-IPAYMU-SETTLE-001',
            'trx_id' => '99887766',
            'status' => 'berhasil',
            'status_code' => '1',
            'via' => 'qris',
            'channel' => 'qris',
        ];

        $response = $this->postJson(route('payment.webhook.ipaymu'), $payload);

        $response->assertOk()
            ->assertJson(['success' => true]);

        $order->refresh();
        $this->assertEquals('settled', $order->status);
        $this->assertNotNull($order->paid_at);

        // Access check
        $this->assertTrue($student->hasPurchasedAssessment($assessment));
    }

    public function test_ipaymu_webhook_rejects_invalid_payload(): void
    {
        $payload = [
            'foo' => 'bar',
        ];

        $response = $this->postJson(route('payment.webhook.ipaymu'), $payload);

        $response->assertStatus(400)
            ->assertJson(['success' => false, 'message' => 'Invalid signature']);
    }

    public function test_orders_show_displays_ipaymu_link_when_payment_url_present(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 50000.00,
        ]);

        $order = Order::create([
            'order_number' => 'ORD-IPAYMU-DISPLAY-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0,
            'total_amount' => 50000.00,
            'payment_gateway' => 'ipaymu',
            'payment_method' => 'QRIS',
            'payment_url' => 'https://payment.ipaymu.com/#/test-url-123',
            'status' => 'pending',
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 25000.00,
            'platform_revenue_amount' => 25000.00,
        ]);

        $response = $this->actingAs($student)->get(route('orders.show', $order));

        $response->assertOk();
        $response->assertSeeText('Portal Pembayaran Digital (iPaymu)');
        $response->assertSee('https://payment.ipaymu.com/#/test-url-123');
    }
}
