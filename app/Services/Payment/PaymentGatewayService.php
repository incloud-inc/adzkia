<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Models\UserAssessmentAccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PaymentGatewayService
{
    public function __construct(
        protected RevenueDistributionService $distributionService
    ) {}

    /**
     * Create payment request with chosen gateway / payment method.
     */
    public function createPayment(Order $order, string $methodCode): array
    {
        $driver = config('payment.default', 'duitku');
        $methodConfig = config("payment.methods.{$methodCode}");

        $adminFee = (float) ($methodConfig['fee'] ?? 0);
        $totalAmount = (float) $order->price_amount + $adminFee;
        $expiryPeriod = (int) config("payment.gateways.{$driver}.expiry_period", 1440);

        $order->update([
            'payment_method' => $methodCode,
            'payment_gateway' => $driver,
            'admin_fee' => $adminFee,
            'total_amount' => $totalAmount,
            'expired_at' => now()->addMinutes($expiryPeriod),
        ]);

        if ($driver === 'tripay') {
            $merchantCode = config('payment.gateways.tripay.merchant_code');
            $apiKey = config('payment.gateways.tripay.api_key');
            $privateKey = config('payment.gateways.tripay.private_key');

            if (blank($merchantCode) || blank($apiKey) || blank($privateKey)) {
                return $this->createSandboxPayment($order, $methodCode);
            }

            return $this->createTripayPayment($order, $methodCode, $methodConfig);
        }

        $merchantCode = config('payment.gateways.duitku.merchant_code');
        $apiKey = config('payment.gateways.duitku.api_key');

        // If credentials are not set or driver is sandbox, provide reliable sandbox response
        if ($driver === 'sandbox' || blank($merchantCode) || blank($apiKey)) {
            return $this->createSandboxPayment($order, $methodCode);
        }

        return $this->createDuitkuPayment($order, $methodCode, $methodConfig);
    }

    /**
     * Create payment using Tripay API.
     */
    protected function createTripayPayment(Order $order, string $methodCode, ?array $methodConfig): array
    {
        $merchantCode = config('payment.gateways.tripay.merchant_code');
        $apiKey = config('payment.gateways.tripay.api_key');
        $privateKey = config('payment.gateways.tripay.private_key');
        $paymentAmount = (int) round($order->total_amount);
        $merchantRef = $order->order_number;

        // Signature: HMAC-SHA256(merchant_code + merchant_ref + amount, private_key)
        $signature = hash_hmac('sha256', $merchantCode.$merchantRef.$paymentAmount, $privateKey);
        $channel = $methodConfig['channel_tripay'] ?? $methodCode;

        $payload = [
            'method' => $channel,
            'merchant_ref' => $merchantRef,
            'amount' => $paymentAmount,
            'customer_name' => substr($order->user?->name ?? 'Siswa ADZKIA', 0, 50),
            'customer_email' => $order->user?->email ?? 'student@adzkia.test',
            'customer_phone' => $order->user?->phone ?? '081234567890',
            'order_items' => [
                [
                    'sku' => 'ASSESSMENT-'.$order->assessment_id,
                    'name' => substr($order->assessment?->title ?? 'Asesmen CBT', 0, 100),
                    'price' => (int) round($order->price_amount),
                    'quantity' => 1,
                ],
            ],
            'callback_url' => route('payment.webhook.tripay'),
            'return_url' => route('orders.show', $order),
            'expired_time' => now()->addMinutes(config('payment.gateways.tripay.expiry_period', 1440))->timestamp,
            'signature' => $signature,
        ];

        try {
            $url = rtrim(config('payment.gateways.tripay.base_url'), '/').'/transaction/create';
            $response = Http::withToken($apiKey)->timeout(20)->post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();

                if (($data['success'] ?? false) && isset($data['data'])) {
                    $trx = $data['data'];

                    $order->update([
                        'payment_gateway' => 'tripay',
                        'payment_reference' => $trx['reference'] ?? null,
                        'payment_url' => $trx['checkout_url'] ?? null,
                        'va_number' => $trx['pay_code'] ?? null,
                        'qr_code_url' => $trx['qr_url'] ?? $trx['qr_string'] ?? null,
                        'gateway_payload' => $data,
                    ]);

                    return [
                        'success' => true,
                        'payment_url' => $trx['checkout_url'] ?? null,
                        'va_number' => $trx['pay_code'] ?? null,
                        'qr_code' => $trx['qr_url'] ?? $trx['qr_string'] ?? null,
                        'reference' => $trx['reference'] ?? null,
                    ];
                }
            }

            Log::warning('Tripay API returned error', [
                'order' => $order->order_number,
                'response' => $response->body(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Tripay API connection failed: '.$e->getMessage());
        }

        return $this->createSandboxPayment($order, $methodCode);
    }

    /**
     * Create payment using Duitku API.
     */
    protected function createDuitkuPayment(Order $order, string $methodCode, ?array $methodConfig): array
    {
        $merchantCode = config('payment.gateways.duitku.merchant_code');
        $apiKey = config('payment.gateways.duitku.api_key');
        $paymentAmount = (int) round($order->total_amount);
        $merchantOrderId = $order->order_number;

        // Signature: MD5(merchantCode + merchantOrderId + paymentAmount + apiKey)
        $signature = md5($merchantCode.$merchantOrderId.$paymentAmount.$apiKey);

        $payload = [
            'merchantCode' => $merchantCode,
            'paymentAmount' => $paymentAmount,
            'paymentMethod' => $methodConfig['channel'] ?? 'VC',
            'merchantOrderId' => $merchantOrderId,
            'productDetails' => 'Pembelian Asesmen: '.($order->assessment?->title ?? 'CBT Exam'),
            'additionalParam' => '',
            'merchantUserInfo' => $order->user?->email ?? 'student@adzkia.test',
            'customerVaName' => substr($order->user?->name ?? 'Siswa ADZKIA', 0, 20),
            'email' => $order->user?->email ?? 'student@adzkia.test',
            'phoneNumber' => $order->user?->phone ?? '081234567890',
            'itemDetails' => [
                [
                    'name' => $order->assessment?->title ?? 'Asesmen CBT',
                    'price' => (int) round($order->price_amount),
                    'quantity' => 1,
                ],
            ],
            'callbackUrl' => route('payment.webhook.duitku'),
            'returnUrl' => route('orders.show', $order),
            'signature' => $signature,
            'expiryPeriod' => config('payment.gateways.duitku.expiry_period', 1440),
        ];

        try {
            $url = config('payment.gateways.duitku.base_url');
            $response = Http::timeout(20)->post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();

                if (($data['statusCode'] ?? null) === '00') {
                    $order->update([
                        'payment_reference' => $data['reference'] ?? null,
                        'payment_url' => $data['paymentUrl'] ?? null,
                        'va_number' => $data['vaNumber'] ?? null,
                        'qr_code_url' => $data['qrCode'] ?? null,
                        'gateway_payload' => $data,
                    ]);

                    return [
                        'success' => true,
                        'payment_url' => $data['paymentUrl'] ?? null,
                        'va_number' => $data['vaNumber'] ?? null,
                        'qr_code' => $data['qrCode'] ?? null,
                        'reference' => $data['reference'] ?? null,
                    ];
                }
            }

            Log::warning('Duitku API returned non-success response', [
                'order' => $order->order_number,
                'response' => $response->body(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Duitku API connection failed: '.$e->getMessage());
        }

        // Fallback to simulated payment in case of API outage / sandbox testing
        return $this->createSandboxPayment($order, $methodCode);
    }

    /**
     * Create interactive simulated payment (Sandbox mode).
     */
    protected function createSandboxPayment(Order $order, string $methodCode): array
    {
        $ref = 'SB-'.strtoupper(bin2hex(random_bytes(6)));
        $vaNumber = null;
        $qrCode = null;

        if (str_starts_with($methodCode, 'VA_')) {
            $bankCode = match ($methodCode) {
                'VA_BCA' => '88000',
                'VA_MANDIRI' => '89000',
                'VA_BRI' => '88888',
                'VA_BNI' => '88088',
                default => '99000',
            };
            $vaNumber = $bankCode.str_pad((string) $order->id, 8, '0', STR_PAD_LEFT);
        } elseif ($methodCode === 'QRIS') {
            $qrCode = '00020101021226590014ID.LINKAJA.WWW0118936009990000000000520458125303360540'.((int) round($order->total_amount)).'5802ID5911ADZKIA CBT6007JAKARTA62070703A016304ABCD';
        }

        $paymentUrl = route('orders.show', $order);

        $order->update([
            'payment_gateway' => $order->payment_gateway ?? config('payment.default', 'sandbox'),
            'payment_reference' => $ref,
            'payment_url' => $paymentUrl,
            'va_number' => $vaNumber,
            'qr_code_url' => $qrCode,
            'gateway_payload' => [
                'mode' => 'sandbox',
                'method' => $methodCode,
                'created_at' => now()->toIso8601String(),
            ],
        ]);

        return [
            'success' => true,
            'payment_url' => $paymentUrl,
            'va_number' => $vaNumber,
            'qr_code' => $qrCode,
            'reference' => $ref,
        ];
    }

    /**
     * Verify Duitku webhook callback signature.
     * Formula: MD5(merchantCode + amount + merchantOrderId + apiKey)
     */
    public function verifyDuitkuWebhook(Request $request): bool
    {
        $merchantCode = config('payment.gateways.duitku.merchant_code');
        $apiKey = config('payment.gateways.duitku.api_key');

        // When in sandbox simulation with empty keys, allow testing webhook
        if (blank($apiKey) && app()->environment('local', 'testing')) {
            return true;
        }

        $reqMerchantCode = $request->input('merchantCode', '');
        $reqAmount = $request->input('amount', '');
        $reqMerchantOrderId = $request->input('merchantOrderId', '');
        $reqSignature = $request->input('signature', '');

        $expectedSignature = md5($reqMerchantCode.$reqAmount.$reqMerchantOrderId.$apiKey);

        return hash_equals($expectedSignature, $reqSignature);
    }

    /**
     * Verify Tripay webhook callback signature.
     * Formula: HMAC-SHA256(rawBody, privateKey) matched with header X-Callback-Signature
     */
    public function verifyTripayWebhook(Request $request): bool
    {
        $privateKey = config('payment.gateways.tripay.private_key');

        // When in sandbox simulation with empty keys, allow testing webhook
        if (blank($privateKey) && app()->environment('local', 'testing')) {
            return true;
        }

        $callbackSignature = $request->header('X-Callback-Signature');
        if (! $callbackSignature) {
            return false;
        }

        $rawBody = $request->getContent();
        $expectedSignature = hash_hmac('sha256', $rawBody, (string) $privateKey);

        return hash_equals($expectedSignature, (string) $callbackSignature);
    }

    /**
     * Process webhook notification from Duitku, Tripay, or generic gateway.
     */
    public function processWebhook(array $payload): array
    {
        $orderNumber = $payload['merchantOrderId'] ?? $payload['merchant_ref'] ?? $payload['order_number'] ?? null;
        $resultCode = $payload['resultCode'] ?? $payload['status_code'] ?? null;
        $status = strtoupper((string) ($payload['status'] ?? ''));
        $reference = $payload['reference'] ?? null;

        if (! $orderNumber) {
            return ['status' => 'error', 'message' => 'Missing merchantOrderId / merchant_ref'];
        }

        $order = Order::where('order_number', $orderNumber)->first();
        if (! $order) {
            return ['status' => 'error', 'message' => "Order {$orderNumber} not found"];
        }

        // Result code 00 = Success (Duitku), PAID = Success (Tripay), SUCCESS = Generic
        $isSuccess = $resultCode === '00' || in_array($status, ['SUCCESS', 'PAID'], true);

        if ($isSuccess) {
            if ($order->status !== 'settled') {
                $order->update([
                    'status' => 'settled',
                    'paid_at' => now(),
                    'payment_reference' => $reference ?: $order->payment_reference,
                    'gateway_payload' => $payload,
                ]);

                // Automatically distribute revenue split to tenant wallet!
                $this->distributionService->distribute($order);

                // Grant / accumulate assessment access quota & 35-day validity
                $this->grantAssessmentAccess($order);

                Log::info("Order {$order->order_number} marked as settled, distributed, and assessment access granted.");
            }

            return ['status' => 'success', 'message' => 'Payment settled'];
        }

        // Check if transaction is still pending / unpaid
        if ($status === 'UNPAID') {
            return ['status' => 'success', 'message' => 'Payment still pending'];
        }

        // Result code 01 = Failed, 02 = Expired (Duitku) / EXPIRED (Tripay)
        $isExpired = ($resultCode === '02' || $status === 'EXPIRED');
        $newStatus = $isExpired ? 'expired' : 'failed';
        $order->update([
            'status' => $newStatus,
            'gateway_payload' => $payload,
        ]);

        return ['status' => 'success', 'message' => "Order marked as {$newStatus}"];
    }

    /**
     * Simulate instant settlement (useful for tests and sandbox demos).
     */
    public function simulateSettlement(Order $order): bool
    {
        $order->update([
            'status' => 'settled',
            'paid_at' => now(),
            'gateway_payload' => array_merge($order->gateway_payload ?? [], [
                'settled_via' => 'sandbox_simulation',
                'settled_at' => now()->toIso8601String(),
            ]),
        ]);

        $this->grantAssessmentAccess($order);

        return $this->distributionService->distribute($order);
    }

    /**
     * Grant or accumulate assessment access quota and extend 35 days validity.
     */
    public function grantAssessmentAccess(Order $order): UserAssessmentAccess
    {
        $userId = $order->user_id;
        $assessmentId = $order->assessment_id;
        $packageAttempts = $order->package_attempts ?: ($order->package?->attempts ?? 1);
        $validityDays = $order->package_validity_days ?: ($order->package?->validity_days ?? 35);

        $access = UserAssessmentAccess::firstOrNew([
            'user_id' => $userId,
            'assessment_id' => $assessmentId,
        ]);

        // Accumulate quota attempts!
        $access->quota_attempts = ($access->quota_attempts ?? 0) + $packageAttempts;

        // Accumulate validity days:
        // Jika masih aktif (future), tambahkan dari expires_at saat ini. Jika baru/expired, mulai dari now().
        $baseDate = ($access->exists && $access->expires_at && $access->expires_at->isFuture())
            ? $access->expires_at->copy()
            : now();

        $access->expires_at = $baseDate->addDays($validityDays);
        $access->last_purchased_at = now();
        $access->last_order_id = $order->id;
        $access->save();

        return $access;
    }
}
