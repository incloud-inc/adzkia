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

class MidtransPaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('payment.gateways.midtrans.server_key', 'SB-Mid-server-TESTKEY123');
        Config::set('payment.gateways.midtrans.client_key', 'SB-Mid-client-TESTKEY123');
        Config::set('payment.gateways.midtrans.merchant_id', 'G123456');
        Config::set('payment.gateways.midtrans.sandbox', true);
    }

    public function test_midtrans_payment_service_generates_snap_token_and_redirect_url(): void
    {
        Http::fake([
            'https://app.sandbox.midtrans.com/snap/v1/transactions' => Http::response([
                'token' => 'mock-snap-token-xyz-123',
                'redirect_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/mock-snap-token-xyz-123',
            ], 201),
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
            'order_number' => 'ORD-TEST-MIDTRANS-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 75000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0,
            'total_amount' => 75000.00,
            'payment_gateway' => 'midtrans',
            'payment_method' => 'channel_midtrans',
            'status' => 'pending',
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 37500.00,
            'platform_revenue_amount' => 37500.00,
        ]);

        Config::set('payment.default', 'midtrans');
        $service = app(PaymentGatewayService::class);
        $result = $service->createPayment($order, 'channel_midtrans');

        $this->assertTrue($result['success']);
        $this->assertEquals('midtrans', $result['gateway']);
        $this->assertEquals('mock-snap-token-xyz-123', $result['token']);
        $this->assertEquals('https://app.sandbox.midtrans.com/snap/v2/vtweb/mock-snap-token-xyz-123', $result['payment_url']);

        $order->refresh();
        $this->assertEquals('mock-snap-token-xyz-123', $order->payment_reference);
        $this->assertEquals('https://app.sandbox.midtrans.com/snap/v2/vtweb/mock-snap-token-xyz-123', $order->payment_url);
    }

    public function test_midtrans_webhook_settlement_updates_order_and_grants_assessment_access(): void
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
            'order_number' => 'ORD-MIDTRANS-SETTLE-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0,
            'total_amount' => 50000.00,
            'payment_gateway' => 'midtrans',
            'payment_method' => 'channel_midtrans',
            'status' => 'pending',
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 25000.00,
            'platform_revenue_amount' => 25000.00,
        ]);

        $orderId = 'ORD-MIDTRANS-SETTLE-001';
        $statusCode = '200';
        $grossAmount = '50000.00';
        $serverKey = 'SB-Mid-server-TESTKEY123';
        $validSignature = hash('sha512', $orderId.$statusCode.$grossAmount.$serverKey);

        $payload = [
            'order_id' => $orderId,
            'status_code' => $statusCode,
            'gross_amount' => $grossAmount,
            'signature_key' => $validSignature,
            'transaction_status' => 'settlement',
            'fraud_status' => 'accept',
            'payment_type' => 'gopay',
            'transaction_time' => '2026-10-27 10:00:00',
        ];

        $response = $this->postJson(route('payment.webhook.midtrans'), $payload);

        $response->assertOk()
            ->assertJson(['success' => true]);

        $order->refresh();
        $this->assertEquals('settled', $order->status);
        $this->assertNotNull($order->paid_at);

        // Access check
        $this->assertTrue($student->hasPurchasedAssessment($assessment));
    }

    public function test_midtrans_webhook_rejects_invalid_signature(): void
    {
        $payload = [
            'order_id' => 'ORD-FAKE-999',
            'status_code' => '200',
            'gross_amount' => '50000.00',
            'signature_key' => 'invalid-signature-hash',
            'transaction_status' => 'settlement',
        ];

        $response = $this->postJson(route('payment.webhook.midtrans'), $payload);

        $response->assertStatus(400)
            ->assertJson(['success' => false, 'message' => 'Invalid signature']);
    }

    public function test_orders_show_displays_midtrans_snap_link_when_payment_url_present(): void
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
            'order_number' => 'ORD-SNAP-DISPLAY-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0,
            'total_amount' => 50000.00,
            'payment_gateway' => 'midtrans',
            'payment_method' => 'channel_midtrans',
            'payment_url' => 'https://app.sandbox.midtrans.com/snap/v2/vtweb/test-url-123',
            'status' => 'pending',
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 25000.00,
            'platform_revenue_amount' => 25000.00,
        ]);

        $response = $this->actingAs($student)->get(route('orders.show', $order));

        $response->assertOk();
        $response->assertSeeText('Portal Pembayaran Digital (Snap Midtrans)');
        $response->assertSee('https://app.sandbox.midtrans.com/snap/v2/vtweb/test-url-123');
    }
}
