<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Order;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\User;
use App\Services\Payment\PaymentGatewayService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class KaseraPaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Config::set('payment.default', 'kaserapay');
        Config::set('payment.gateways.kaserapay.api_key', 'kp_test_kaserapay_sample_key_123');
        Config::set('payment.gateways.kaserapay.signing_secret', 'whsec_sample_secret_key_456');
        Config::set('payment.gateways.kaserapay.sandbox', true);
        Config::set('payment.gateways.kaserapay.base_url', 'https://pay.kasera.id/v1/');
    }

    public function test_kaserapay_payment_creates_transaction_successfully(): void
    {
        Http::fake([
            'https://pay.kasera.id/v1/transactions' => function (ClientRequest $request) {
                $payload = $request->data();

                $this->assertEquals('Bearer kp_test_kaserapay_sample_key_123', $request->header('Authorization')[0]);
                $this->assertEquals('ORD-KASERA-001', $payload['external_id']);
                $this->assertEquals(['qris'], $payload['payment_methods']);

                return Http::response([
                    'id' => 'payreq_test_123456789',
                    'status' => 'pending',
                    'amount' => $payload['amount'],
                    'external_id' => $payload['external_id'],
                    'payment_method' => 'qris',
                    'payment' => [
                        'type' => 'qr',
                        'qr_string' => '00020101021226680016ID.CO.KASERA.WWW0118936000000000000001...',
                        'qr_url' => 'https://pay.kasera.id/qr/payreq_test_123456789.png',
                    ],
                    'checkout_url' => 'https://pay.kasera.id/checkout/payreq_test_123456789',
                    'expires_at' => now()->addMinutes(1440)->toISOString(),
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
            'order_number' => 'ORD-KASERA-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0.00,
            'total_amount' => 50000.00,
            'status' => 'pending',
            'payment_method' => 'QRIS',
        ]);

        $service = app(PaymentGatewayService::class);
        $result = $service->createPayment($order, 'QRIS');

        $this->assertTrue($result['success']);
        $this->assertEquals('https://pay.kasera.id/checkout/payreq_test_123456789', $result['checkout_url']);
        $this->assertNotEmpty($result['qr_string']);

        $order->refresh();
        $this->assertEquals('kaserapay', $order->payment_gateway);
        $this->assertEquals('payreq_test_123456789', $order->payment_reference);
    }

    public function test_kaserapay_handles_api_error_response_object_gracefully(): void
    {
        Http::fake([
            'https://pay.kasera.id/v1/transactions' => Http::response([
                'error' => [
                    'code' => 'unknown_field',
                    'message' => 'unknown field "callback_url" — check the spelling against the API reference',
                ],
            ], 422),
        ]);

        $tenant = Tenant::factory()->create();
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'whatsapp_number' => '081299998888',
        ]);
        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 50000.00,
        ]);

        $order = Order::create([
            'order_number' => 'ORD-KASERA-ERR-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0.00,
            'total_amount' => 50000.00,
            'status' => 'pending',
            'payment_method' => 'QRIS',
        ]);

        $service = app(PaymentGatewayService::class);
        $result = $service->createPayment($order, 'QRIS');

        $this->assertFalse($result['success']);
        $this->assertStringContainsString('unknown field "callback_url"', $result['message']);
        $this->assertStringNotContainsString('Array to string conversion', $result['message']);
    }

    public function test_kaserapay_webhook_signature_verification(): void
    {
        $service = app(PaymentGatewayService::class);
        $secret = 'whsec_sample_secret_key_456';
        $timestamp = time();
        $rawPayload = json_encode([
            'event' => 'payment.paid',
            'data' => [
                'id' => 'payreq_test_123456789',
                'external_id' => 'ORD-KASERA-001',
                'status' => 'paid',
                'amount' => 50000,
            ],
        ]);

        $signature = hash_hmac('sha256', $timestamp.'.'.$rawPayload, $secret);

        // 1. Valid signature
        $request = Request::create(
            '/api/webhooks/payment/kaserapay',
            'POST',
            [],
            [],
            [],
            [
                'HTTP_KASERA_SIGNATURE_V1' => "t={$timestamp},v1={$signature}",
                'CONTENT_TYPE' => 'application/json',
            ],
            $rawPayload
        );
        $this->assertTrue($service->verifyKaseraWebhook($request));

        // 2. Invalid signature
        $invalidRequest = Request::create(
            '/api/webhooks/payment/kaserapay',
            'POST',
            [],
            [],
            [],
            [
                'HTTP_KASERA_SIGNATURE_V1' => "t={$timestamp},v1=invalidsignaturehash123",
                'CONTENT_TYPE' => 'application/json',
            ],
            $rawPayload
        );
        $this->assertFalse($service->verifyKaseraWebhook($invalidRequest));

        // 3. Expired timestamp (> 300 seconds)
        $expiredTimestamp = time() - 360;
        $expiredSig = hash_hmac('sha256', $expiredTimestamp.'.'.$rawPayload, $secret);
        $expiredRequest = Request::create(
            '/api/webhooks/payment/kaserapay',
            'POST',
            [],
            [],
            [],
            [
                'HTTP_KASERA_SIGNATURE_V1' => "t={$expiredTimestamp},v1={$expiredSig}",
                'CONTENT_TYPE' => 'application/json',
            ],
            $rawPayload
        );
        $this->assertFalse($service->verifyKaseraWebhook($expiredRequest));
    }

    public function test_kaserapay_webhook_endpoint_settles_order(): void
    {
        $tenant = Tenant::factory()->create();
        $student = User::factory()->create([
            'current_tenant_id' => $tenant->id,
            'whatsapp_number' => '081299998888',
        ]);
        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 50000.00,
            'status' => 'published',
        ]);

        $order = Order::create([
            'order_number' => 'ORD-KASERA-SETTLE-001',
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'package_attempts' => 1,
            'package_validity_days' => 30,
            'price_amount' => 50000.00,
            'discount_amount' => 0.00,
            'admin_fee' => 0.00,
            'total_amount' => 50000.00,
            'status' => 'pending',
            'payment_gateway' => 'kaserapay',
            'payment_method' => 'QRIS',
        ]);

        $timestamp = time();
        $payloadArray = [
            'event' => 'payment.paid',
            'data' => [
                'id' => 'payreq_settle_999',
                'external_id' => 'ORD-KASERA-SETTLE-001',
                'status' => 'paid',
                'amount' => 50000,
            ],
        ];
        $rawPayload = json_encode($payloadArray);
        $secret = config('payment.gateways.kaserapay.signing_secret');
        $signature = hash_hmac('sha256', $timestamp.'.'.$rawPayload, $secret);

        $response = $this->call(
            'POST',
            '/api/webhooks/payment/kaserapay',
            [],
            [],
            [],
            [
                'HTTP_KASERA_SIGNATURE_V1' => "t={$timestamp},v1={$signature}",
                'CONTENT_TYPE' => 'application/json',
            ],
            $rawPayload
        );

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $order->refresh();
        $this->assertEquals('settled', $order->status);
        $this->assertNotNull($order->paid_at);
        $this->assertEquals('payreq_settle_999', $order->payment_reference);
    }
}
