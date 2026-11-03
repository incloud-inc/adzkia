<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Payment\PaymentGatewayService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TripayPaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('payment.default', 'tripay');
        Config::set('payment.gateways.tripay.merchant_code', 'T53616');
        Config::set('payment.gateways.tripay.api_key', 'test-tripay-api-key-xyz');
        Config::set('payment.gateways.tripay.private_key', 'test-tripay-private-key-xyz');
        Config::set('payment.gateways.tripay.sandbox', false);
        Config::set('payment.gateways.tripay.base_url', 'https://tripay.co.id/api/');
    }

    public function test_tripay_payment_creates_transaction_with_consistent_amount(): void
    {
        Http::fake([
            'https://tripay.co.id/api/transaction/create' => function (Request $request) {
                $payload = $request->data();

                // Validate amount consistency rule from TriPay
                $itemsSum = array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $payload['order_items']));
                if ($itemsSum !== $payload['amount']) {
                    return Http::response([
                        'success' => false,
                        'message' => 'Inconsistent: order_items != amount',
                    ], 400);
                }

                return Http::response([
                    'success' => true,
                    'message' => 'Transaksi berhasil dibuat',
                    'data' => [
                        'reference' => 'DEV-T53616000000001',
                        'merchant_ref' => $payload['merchant_ref'],
                        'payment_method' => $payload['method'],
                        'amount' => $payload['amount'],
                        'pay_code' => '8888812345678',
                        'checkout_url' => 'https://tripay.co.id/checkout/DEV-T53616000000001',
                        'status' => 'UNPAID',
                    ],
                ], 200);
            },
        ]);

        $tenant = Tenant::factory()->create();
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'whatsapp_number' => '081299998888',
        ]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 50000.00,
            'status' => 'published',
        ]);

        $order = Order::create([
            'order_number' => 'ORD-TRIPAY-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 2,
            'package_validity_days' => 35,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 3000.00,
            'total_amount' => 53000.00,
            'status' => 'pending',
            'payment_method' => 'VA_BRI',
        ]);

        $service = app(PaymentGatewayService::class);
        $result = $service->createPayment($order, 'VA_BRI');

        $this->assertTrue($result['success']);
        $this->assertEquals('DEV-T53616000000001', $result['reference']);
        $this->assertEquals('8888812345678', $result['va_number']);
        $this->assertEquals('https://tripay.co.id/checkout/DEV-T53616000000001', $result['payment_url']);

        $order->refresh();
        $this->assertEquals('tripay', $order->payment_gateway);
        $this->assertEquals('DEV-T53616000000001', $order->payment_reference);
    }

    public function test_tripay_error_returns_failure_message_without_silent_sandbox(): void
    {
        Http::fake([
            'https://tripay.co.id/api/transaction/create' => Http::response([
                'success' => false,
                'message' => 'Payment channel is not enabled (QRIS - T53616)',
            ], 400),
        ]);

        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 25000.00,
            'status' => 'published',
        ]);

        $order = Order::create([
            'order_number' => 'ORD-TRIPAY-002',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'price_amount' => 25000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 1000.00,
            'total_amount' => 26000.00,
            'status' => 'pending',
            'payment_method' => 'QRIS',
        ]);

        $service = app(PaymentGatewayService::class);
        $result = $service->createPayment($order, 'QRIS');

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('Payment channel is not enabled', $result['message']);
    }

    public function test_student_from_any_tenant_can_checkout_and_purchase_published_paid_assessment(): void
    {
        Http::fake([
            'https://tripay.co.id/api/transaction/create' => Http::response([
                'success' => true,
                'data' => [
                    'reference' => 'DEV-REF-CROSS-TENANT',
                    'checkout_url' => 'https://tripay.co.id/checkout/DEV-REF-CROSS-TENANT',
                    'pay_code' => '88888000999',
                    'status' => 'UNPAID',
                ],
            ], 200),
        ]);

        // Tenant A (Seller / Creator)
        $tenantA = Tenant::factory()->create(['name' => 'Bimbel Adzkia Pusat']);
        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenantA->id,
            'subject_id' => $subject->id,
            'title' => 'Simulasi UTBK SNBT 2024 Lengkap',
            'price_type' => 'paid',
            'price' => 50000.00,
            'status' => 'published',
        ]);

        // Tenant B (Buyer / Student from another school)
        $tenantB = Tenant::factory()->create(['name' => 'SMA Swasta Teladan']);
        $studentFromB = User::factory()->create(['current_tenant_id' => $tenantB->id]);
        $studentFromB->tenants()->attach($tenantB->id, ['role' => 'U']);

        // Student from Tenant B visits checkout page for Tenant A's assessment
        $response = $this->actingAs($studentFromB)->get(route('orders.checkout', $assessment));
        $response->assertOk();
        $response->assertSee('Simulasi UTBK SNBT 2024 Lengkap');

        // Student submits checkout
        $postResponse = $this->actingAs($studentFromB)->post(route('orders.store', $assessment), [
            'payment_method' => 'VA_BRI',
        ]);

        $order = Order::where('user_id', $studentFromB->id)->where('assessment_id', $assessment->id)->first();
        $this->assertNotNull($order);
        $postResponse->assertRedirect(route('orders.show', $order));
    }

    public function test_tripay_webhook_settles_order_and_grants_access(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 50000.00,
            'status' => 'published',
        ]);

        $order = Order::create([
            'order_number' => 'ORD-TRIPAY-SETTLE-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 3,
            'package_validity_days' => 35,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 3000.00,
            'total_amount' => 53000.00,
            'status' => 'pending',
            'payment_method' => 'VA_BRI',
        ]);

        $payload = [
            'reference' => 'DEV-T53616000000001',
            'merchant_ref' => 'ORD-TRIPAY-SETTLE-001',
            'payment_method' => 'BRIVA',
            'status' => 'PAID',
            'total_amount' => 53000,
        ];

        $rawBody = json_encode($payload);
        $signature = hash_hmac('sha256', $rawBody, 'test-tripay-private-key-xyz');

        $response = $this->call(
            'POST',
            route('payment.webhook.tripay'),
            [],
            [],
            [],
            [
                'HTTP_X-Callback-Event' => 'payment_status',
                'HTTP_X-Callback-Signature' => $signature,
                'CONTENT_TYPE' => 'application/json',
            ],
            $rawBody
        );

        $response->assertOk();
        $response->assertJson(['success' => true]);

        $order->refresh();
        $this->assertEquals('settled', $order->status);
        $this->assertNotNull($order->paid_at);

        // Verify assessment access was granted
        $access = $student->getAssessmentAccess($assessment);
        $this->assertNotNull($access);
        $this->assertEquals(3, $access->quota_attempts);
        $this->assertTrue($access->isValid());
    }
}
