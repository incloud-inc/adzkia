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

        Config::set('payment.default', 'ipaymu');
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

    public function test_ipaymu_direct_qris_handles_long_raw_qr_string_without_overflowing_va_number(): void
    {
        $longQrString = '00020101021226670016COM.NOBUBANK.WWW01189360050300000870180214051200006859390303UBE51440014ID.CO.QRIS.WWW0303UBE0215ID202217302217152045111530336054074275.005802ID5906IPAYMU6015JAKARTA SELATAN61051219062730108MBEFQU1K0620202611041313478595360703A010804POSP99180002000108202611046304F7C7';

        Http::fake([
            'https://my.ipaymu.com/api/v2/payment/direct' => Http::response([
                'Status' => 200,
                'Success' => true,
                'Message' => 'Success',
                'Data' => [
                    'SessionID' => 'SESSION-QRIS-LONG-123',
                    'TransactionId' => 887766,
                    'PaymentNo' => $longQrString,
                    'QrTemplate' => 'https://my.ipaymu.com/qris/261104-qris-test',
                    'QrString' => $longQrString,
                    'Url' => 'https://payment.ipaymu.com/#/SESSION-QRIS-LONG-123',
                ],
            ], 200),
        ]);

        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 3000.00,
        ]);

        $order = Order::create([
            'order_number' => 'ORD-QRIS-LONG-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'price_amount' => 3000.00,
            'total_amount' => 3750.00,
            'payment_gateway' => 'ipaymu',
            'payment_method' => 'QRIS',
            'status' => 'pending',
            'tenant_tier_snapshot' => 'starter',
            'revenue_share_tenant_pct' => 25,
            'revenue_share_platform_pct' => 75,
            'tenant_revenue_amount' => 750.00,
            'platform_revenue_amount' => 2250.00,
        ]);

        $service = app(PaymentGatewayService::class);
        $result = $service->createPayment($order, 'QRIS');

        $this->assertTrue($result['success']);
        $order->refresh();
        $this->assertNull($order->va_number, 'QRIS PaymentNo must not be saved into va_number column.');
        $this->assertEquals('https://my.ipaymu.com/qris/261104-qris-test', $order->qr_code_url);
        $this->assertEquals('https://payment.ipaymu.com/#/SESSION-QRIS-LONG-123', $order->payment_url);
    }

    public function test_checkout_store_works_for_student_across_tenants_and_subdomains(): void
    {
        Http::fake([
            'https://my.ipaymu.com/api/v2/payment/direct' => Http::response([
                'Status' => 200,
                'Success' => true,
                'Message' => 'Success',
                'Data' => [
                    'SessionID' => 'SESSION-SUBDOMAIN-777',
                    'TransactionId' => 777111,
                    'PaymentNo' => '00020101021226670016COM.NOBUBANK.WWW01189360050300000870180214051200006859390303UBE51440014ID.CO.QRIS.WWW0303UBE0215ID202217302217152045111530336054074275.005802ID5906IPAYMU6015JAKARTA',
                    'QrTemplate' => 'https://my.ipaymu.com/qris/subdomain-test',
                    'Url' => 'https://payment.ipaymu.com/#/SESSION-SUBDOMAIN-777',
                ],
            ], 200),
        ]);

        $tenantA = Tenant::factory()->create(['subdomain' => 'pcn']);
        $tenantB = Tenant::factory()->create(['subdomain' => 'bimbel']);

        $studentA = User::factory()->create(['current_tenant_id' => $tenantA->id]);
        $studentA->tenants()->attach($tenantA->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenantB->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'status' => 'published',
            'price' => 3000.00,
        ]);

        // Student from Tenant A checks out assessment of Tenant B on pcn subdomain
        $response = $this->actingAs($studentA)
            ->withHeaders(['Host' => 'pcn.adzkia.test'])
            ->post(route('orders.store', $assessment), [
                'payment_method' => 'QRIS',
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $order = Order::where('user_id', $studentA->id)->where('assessment_id', $assessment->id)->first();
        $this->assertNotNull($order);
        $this->assertEquals('pending', $order->status);
        $this->assertEquals('https://payment.ipaymu.com/#/SESSION-SUBDOMAIN-777', $order->payment_url);
    }
}
