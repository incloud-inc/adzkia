<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Order;
use App\Models\PayoutRequest;
use App\Models\Subject;
use App\Models\Tenant;
use App\Models\TenantWallet;
use App\Models\User;
use App\Models\WalletTransaction;
use App\Services\Payment\PaymentGatewayService;
use App\Services\Payment\RevenueDistributionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class MonetizationAndRevenueShareTest extends TestCase
{
    use RefreshDatabase;

    public function test_revenue_share_snapshot_calculation_matches_b2b2c_tiers(): void
    {
        $service = app(RevenueDistributionService::class);
        $price = 100000.00;

        // 1. Starter Tier (Free plan) -> ADZKIA 75% : Tenant 25%
        $starterTenant = Tenant::factory()->create(['plan' => 'gratis']);
        $starterSnapshot = $service->computeSnapshot($starterTenant, $price);
        $this->assertEquals('starter', $starterSnapshot['tier']);
        $this->assertEquals(25, $starterSnapshot['tenant_pct']);
        $this->assertEquals(75, $starterSnapshot['platform_pct']);
        $this->assertEquals(25000.00, $starterSnapshot['tenant_amount']);
        $this->assertEquals(75000.00, $starterSnapshot['platform_amount']);

        // 2. Pro Tier (Premium plan) -> ADZKIA 50% : Tenant 50%
        $proTenant = Tenant::factory()->create(['plan' => 'premium']);
        $proSnapshot = $service->computeSnapshot($proTenant, $price);
        $this->assertEquals('pro', $proSnapshot['tier']);
        $this->assertEquals(50, $proSnapshot['tenant_pct']);
        $this->assertEquals(50, $proSnapshot['platform_pct']);
        $this->assertEquals(50000.00, $proSnapshot['tenant_amount']);
        $this->assertEquals(50000.00, $proSnapshot['platform_amount']);

        // 3. Enterprise Tier (Whitelabel plan) -> ADZKIA 25% : Tenant 75%
        $entTenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $entSnapshot = $service->computeSnapshot($entTenant, $price);
        $this->assertEquals('enterprise', $entSnapshot['tier']);
        $this->assertEquals(75, $entSnapshot['tenant_pct']);
        $this->assertEquals(25, $entSnapshot['platform_pct']);
        $this->assertEquals(75000.00, $entSnapshot['tenant_amount']);
        $this->assertEquals(25000.00, $entSnapshot['platform_amount']);
    }

    public function test_student_can_checkout_paid_assessment_and_receive_payment_instructions(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'price_type' => 'paid',
            'price' => 150000.00,
            'status' => 'published',
        ]);

        // Access checkout page
        $checkoutResponse = $this->actingAs($student)->get(route('orders.checkout', $assessment));
        $checkoutResponse->assertOk();
        $checkoutResponse->assertSee('Checkout Asesmen');
        $checkoutResponse->assertSee('150.000');

        // Submit checkout form
        $postResponse = $this->actingAs($student)->post(route('orders.store', $assessment), [
            'payment_method' => 'QRIS',
        ]);

        $postResponse->assertRedirect();

        $order = Order::where('user_id', $student->id)->where('assessment_id', $assessment->id)->first();
        $this->assertNotNull($order);
        $this->assertEquals('pending', $order->status);
        $this->assertEquals('pro', $order->tenant_tier_snapshot);
        $this->assertEquals(50, $order->revenue_share_tenant_pct);
        $this->assertEquals(50, $order->revenue_share_platform_pct);
        $this->assertEquals(75000.00, $order->tenant_revenue_amount);
        $this->assertEquals(75000.00, $order->platform_revenue_amount);

        // View order payment page
        $showResponse = $this->actingAs($student)->get(route('orders.show', $order));
        $showResponse->assertOk();
        $showResponse->assertSee($order->order_number);
    }

    public function test_payment_settlement_automatically_distributes_funds_to_tenant_wallet(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']); // Enterprise -> 75% to tenant
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);

        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'price_type' => 'paid',
            'price' => 200000.00,
            'status' => 'published',
        ]);

        $order = Order::create([
            'order_number' => Order::generateOrderNumber(),
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'price_amount' => 200000.00,
            'total_amount' => 201000.00,
            'status' => 'pending',
            'tenant_tier_snapshot' => 'enterprise',
            'revenue_share_tenant_pct' => 75,
            'revenue_share_platform_pct' => 25,
            'tenant_revenue_amount' => 150000.00,
            'platform_revenue_amount' => 50000.00,
        ]);

        $paymentService = app(PaymentGatewayService::class);
        $paymentService->simulateSettlement($order);

        $order->refresh();
        $this->assertEquals('settled', $order->status);
        $this->assertNotNull($order->paid_at);

        // Verify Tenant Wallet
        $wallet = TenantWallet::where('tenant_id', $tenant->id)->first();
        $this->assertNotNull($wallet);
        $this->assertEquals(150000.00, $wallet->balance);
        $this->assertEquals(150000.00, $wallet->total_earned);

        // Verify Wallet Transaction
        $transaction = WalletTransaction::where('tenant_wallet_id', $wallet->id)->first();
        $this->assertNotNull($transaction);
        $this->assertEquals('credit', $transaction->type);
        $this->assertEquals(150000.00, $transaction->amount);
        $this->assertEquals(150000.00, $transaction->balance_after);
        $this->assertEquals('order', $transaction->reference_type);
        $this->assertEquals($order->id, $transaction->reference_id);

        // Idempotency check: invoking distribution again should not double credit
        $distributionService = app(RevenueDistributionService::class);
        $distributionService->distribute($order);

        $wallet->refresh();
        $this->assertEquals(150000.00, $wallet->balance);
        $this->assertEquals(1, WalletTransaction::where('tenant_wallet_id', $wallet->id)->count());
    }

    public function test_paid_assessment_blocks_unpaid_students_from_exam_gate_and_allows_paid_students(): void
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
            'status' => 'published',
        ]);

        // 1. Unpaid student tries to access exam gate -> redirected to checkout
        $responseUnpaid = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $responseUnpaid->assertRedirect(route('orders.checkout', $assessment));

        // 2. Student pays for assessment
        Order::create([
            'order_number' => Order::generateOrderNumber(),
            'user_id' => $student->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'price_amount' => 50000.00,
            'total_amount' => 50000.00,
            'status' => 'settled',
            'paid_at' => now(),
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 25000.00,
            'platform_revenue_amount' => 25000.00,
        ]);

        $this->assertTrue($student->hasPurchasedAssessment($assessment));

        // 3. Paid student accesses exam gate -> access granted (200 OK)
        $responsePaid = $this->actingAs($student)->get(route('exam.gate.show', $assessment));
        $responsePaid->assertOk();
        $responsePaid->assertSee($assessment->title);
    }

    public function test_tenant_can_request_payout_and_owner_can_approve(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $adminTenant = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $adminTenant->tenants()->attach($tenant->id, ['role' => 'A']);

        $owner = User::factory()->create();
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        // Give wallet initial balance of 200,000
        $wallet = TenantWallet::create([
            'tenant_id' => $tenant->id,
            'balance' => 200000.00,
            'held_balance' => 0.00,
            'total_earned' => 200000.00,
            'total_withdrawn' => 0.00,
        ]);

        // Tenant requests payout of 100,000
        $payoutResponse = $this->actingAs($adminTenant)->post(route('wallet.payout.request'), [
            'amount' => 100000.00,
            'bank_name' => 'Bank Mandiri',
            'bank_account_number' => '1234567890',
            'bank_account_name' => 'SMAN 8 Jakarta',
        ]);

        $payoutResponse->assertRedirect();
        $payoutResponse->assertSessionHas('success');

        $wallet->refresh();
        $this->assertEquals(100000.00, $wallet->balance);
        $this->assertEquals(100000.00, $wallet->held_balance);

        $payoutRequest = PayoutRequest::where('tenant_id', $tenant->id)->first();
        $this->assertNotNull($payoutRequest);
        $this->assertEquals('pending', $payoutRequest->status);

        // Owner approves payout
        $approveResponse = $this->actingAs($owner)->post(route('wallet.admin.approve', $payoutRequest));
        $approveResponse->assertRedirect();

        $payoutRequest->refresh();
        $this->assertEquals('approved', $payoutRequest->status);
        $this->assertEquals($owner->id, $payoutRequest->approved_by);

        $wallet->refresh();
        $this->assertEquals(100000.00, $wallet->balance);
        $this->assertEquals(0.00, $wallet->held_balance);
        $this->assertEquals(100000.00, $wallet->total_withdrawn);
    }

    public function test_sales_report_displays_metrics_and_exports_csv(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $owner = User::factory()->create();
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $subject = Subject::factory()->create();
        $assessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'subject_id' => $subject->id,
            'title' => 'Tryout UTBK SNBT 2026',
        ]);

        // Create 2 settled orders
        Order::create([
            'order_number' => 'ORD-TEST-001',
            'user_id' => $owner->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'price_amount' => 100000.00,
            'total_amount' => 100000.00,
            'status' => 'settled',
            'paid_at' => now(),
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 50000.00,
            'platform_revenue_amount' => 50000.00,
        ]);

        Order::create([
            'order_number' => 'ORD-TEST-002',
            'user_id' => $owner->id,
            'tenant_id' => $tenant->id,
            'assessment_id' => $assessment->id,
            'price_amount' => 100000.00,
            'total_amount' => 100000.00,
            'status' => 'settled',
            'paid_at' => now(),
            'tenant_tier_snapshot' => 'pro',
            'revenue_share_tenant_pct' => 50,
            'revenue_share_platform_pct' => 50,
            'tenant_revenue_amount' => 50000.00,
            'platform_revenue_amount' => 50000.00,
        ]);

        // View sales report
        $reportResponse = $this->actingAs($owner)->get(route('reports.sales'));
        $reportResponse->assertOk();
        $reportResponse->assertSee('Laporan Penjualan');
        $reportResponse->assertSee('200.000'); // Total gross
        $reportResponse->assertSee('100.000'); // Total platform
        $reportResponse->assertSee('ORD-TEST-001');

        // Export CSV
        $csvResponse = $this->actingAs($owner)->get(route('reports.sales.export'));
        $csvResponse->assertOk();
        $csvResponse->assertHeader('content-type', 'text/csv; charset=UTF-8');
    }

    public function test_tripay_payment_creation_and_webhook_settlement(): void
    {
        config([
            'payment.default' => 'tripay',
            'payment.gateways.tripay.merchant_code' => 'T12345',
            'payment.gateways.tripay.api_key' => 'tripay-test-api-key',
            'payment.gateways.tripay.private_key' => 'tripay-test-private-key',
            'payment.gateways.tripay.base_url' => 'https://tripay.co.id/api-sandbox',
        ]);

        $tenant = Tenant::factory()->create(['plan' => 'premium']); // Pro -> 50%
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

        Http::fake([
            'tripay.co.id/api-sandbox/transaction/create' => Http::response([
                'success' => true,
                'message' => 'Transaction created',
                'data' => [
                    'reference' => 'DEV-TRIPAY-9999',
                    'merchant_ref' => 'TEMPORARY',
                    'payment_method' => 'BRIVA',
                    'checkout_url' => 'https://tripay.co.id/checkout/DEV-TRIPAY-9999',
                    'pay_code' => '77777000012345',
                    'qr_url' => null,
                    'qr_string' => null,
                    'status' => 'UNPAID',
                ],
            ], 200),
        ]);

        // Student initiates checkout via Tripay BRI VA
        $postResponse = $this->actingAs($student)->post(route('orders.store', $assessment), [
            'payment_method' => 'VA_BRI',
        ]);

        $postResponse->assertRedirect();

        $order = Order::where('user_id', $student->id)->where('assessment_id', $assessment->id)->first();
        $this->assertNotNull($order);
        $this->assertEquals('tripay', $order->payment_gateway);
        $this->assertEquals('pending', $order->status);
        $this->assertEquals('DEV-TRIPAY-9999', $order->payment_reference);
        $this->assertEquals('77777000012345', $order->va_number);

        // 1. Simulate invalid webhook signature
        $webhookPayload = [
            'reference' => 'DEV-TRIPAY-9999',
            'merchant_ref' => $order->order_number,
            'payment_method' => 'BRIVA',
            'payment_method_code' => 'BRIVA',
            'total_amount' => 104000,
            'status' => 'PAID',
            'paid_at' => now()->timestamp,
        ];

        $badResponse = $this->withHeaders([
            'X-Callback-Signature' => 'invalid-signature-hash',
            'X-Callback-Event' => 'payment_status',
        ])->postJson(route('payment.webhook.tripay'), $webhookPayload);

        $badResponse->assertStatus(400);
        $badResponse->assertJson(['success' => false, 'message' => 'Invalid signature']);

        // 2. Simulate valid webhook callback from Tripay
        $rawContent = json_encode($webhookPayload);
        $validSignature = hash_hmac('sha256', $rawContent, 'tripay-test-private-key');

        $validResponse = $this->withHeaders([
            'X-Callback-Signature' => $validSignature,
            'X-Callback-Event' => 'payment_status',
        ])->postJson(route('payment.webhook.tripay'), $webhookPayload);

        $validResponse->assertOk();
        $validResponse->assertJson(['success' => true]);

        // 3. Verify order settlement & wallet distribution
        $order->refresh();
        $this->assertEquals('settled', $order->status);
        $this->assertNotNull($order->paid_at);

        $wallet = TenantWallet::where('tenant_id', $tenant->id)->first();
        $this->assertNotNull($wallet);
        $this->assertEquals(50000.00, $wallet->balance); // 50% of 100k
    }
}
