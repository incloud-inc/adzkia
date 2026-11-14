<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Models\UserAssessmentAccess;
use App\Services\CouponService;
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
        $driver = config('payment.default', 'ipaymu');
        $methodConfig = config("payment.methods.{$methodCode}");

        $effectivePrice = max(0.00, (float) $order->price_amount - (float) $order->discount_amount);
        $adminFee = $this->calculateAdminFee($methodCode, $effectivePrice);
        $totalAmount = $effectivePrice + $adminFee;
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
                return [
                    'success' => false,
                    'message' => 'Kredensial TriPay (Merchant Code, API Key, Private Key) belum dikonfigurasi lengkap di Pengaturan sistem.',
                ];
            }

            return $this->createTripayPayment($order, $methodCode, $methodConfig);
        }

        if ($driver === 'kaserapay') {
            $apiKey = config('payment.gateways.kaserapay.api_key');

            if (blank($apiKey)) {
                return [
                    'success' => false,
                    'message' => 'Kredensial Kasera Pay (API Key) belum dikonfigurasi lengkap di Pengaturan sistem.',
                ];
            }

            return $this->createKaseraPayment($order, $methodCode, $methodConfig);
        }

        // Default & Primary Gateway: iPaymu
        $va = config('payment.gateways.ipaymu.va');
        $apiKey = config('payment.gateways.ipaymu.api_key');

        if (blank($va) || blank($apiKey)) {
            return [
                'success' => false,
                'message' => 'Kredensial iPaymu (Virtual Account & API Key) belum dikonfigurasi lengkap di Pengaturan sistem.',
            ];
        }

        return $this->createIpaymuPayment($order, $methodCode, $methodConfig);
    }

    /**
     * Create payment using iPaymu API v2 (Direct Payment with seamless fallback to Redirect Payment).
     */
    protected function createIpaymuPayment(Order $order, string $methodCode, ?array $methodConfig): array
    {
        $va = (string) config('payment.gateways.ipaymu.va');
        $apiKey = (string) config('payment.gateways.ipaymu.api_key');
        $baseUrl = rtrim((string) config('payment.gateways.ipaymu.base_url', 'https://my.ipaymu.com/api/v2/'), '/').'/';
        $paymentAmount = (int) round($order->total_amount);

        // Format customer phone
        $customerPhone = preg_replace('/[^0-9]/', '', (string) ($order->user?->whatsapp_number ?: ($order->user?->phone ?? '081329983555')));
        if (strlen($customerPhone) < 10) {
            $customerPhone = '081329983555';
        }

        $customerEmail = $order->user?->email ?: 'adzkia.tryout@gmail.com';
        $customerName = $order->user?->name ?: 'Siswa ADZKIA';

        // Canonical webhook callback URL
        $appUrl = config('app.url');
        $callbackUrl = (! empty($appUrl) && ! str_contains($appUrl, 'localhost') && ! str_contains($appUrl, '127.0.0.1'))
            ? rtrim($appUrl, '/').'/api/webhooks/payment/ipaymu'
            : route('payment.webhook.ipaymu');

        $channel = $methodConfig['channel_ipaymu'] ?? 'bni';
        $method = $methodConfig['method_ipaymu'] ?? 'va';

        // TAHAP 1: Coba Direct Payment (/api/v2/payment/direct)
        $directPayload = [
            'name' => substr($customerName, 0, 50),
            'phone' => $customerPhone,
            'email' => $customerEmail,
            'amount' => $paymentAmount,
            'comments' => 'Pembelian Asesmen CBT #'.$order->order_number,
            'notifyUrl' => $callbackUrl,
            'returnUrl' => route('orders.show', $order),
            'cancelUrl' => route('orders.show', $order),
            'referenceId' => $order->order_number,
            'paymentMethod' => $method,
            'paymentChannel' => $channel,
        ];

        try {
            $timestamp = date('YmdHis');
            $jsonBody = json_encode($directPayload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            $bodyHash = strtolower(hash('sha256', $jsonBody));
            $stringToSign = 'POST:'.$va.':'.$bodyHash.':'.$apiKey;
            $signature = hash_hmac('sha256', $stringToSign, $apiKey);

            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'va' => $va,
                'signature' => $signature,
                'timestamp' => $timestamp,
            ];

            $directUrl = $baseUrl.'payment/direct';
            $response = Http::withHeaders($headers)->timeout(20)->post($directUrl, $directPayload);
            $data = $response->json();

            if ($response->successful() && ($data['Status'] ?? null) == 200 && isset($data['Data'])) {
                $trx = $data['Data'];

                $isQris = strtolower((string) $method) === 'qris' || strtolower((string) $channel) === 'qris';
                $paymentNo = isset($trx['PaymentNo']) ? (string) $trx['PaymentNo'] : null;
                // Pada QRIS, PaymentNo dari iPaymu adalah raw QR code string, bukan nomor VA rekening
                $vaNumber = (! $isQris && $paymentNo && strlen($paymentNo) <= 50) ? $paymentNo : null;
                $qrCodeUrl = $trx['QrTemplate'] ?? ($trx['QrString'] ?? ($isQris ? $paymentNo : null));
                $paymentUrl = $trx['Url'] ?? null;

                $order->update([
                    'payment_gateway' => 'ipaymu',
                    'payment_reference' => (string) ($trx['TransactionId'] ?? $trx['SessionID'] ?? $order->order_number),
                    'payment_url' => $paymentUrl,
                    'va_number' => $vaNumber,
                    'qr_code_url' => $qrCodeUrl,
                    'gateway_payload' => $data,
                ]);

                return [
                    'success' => true,
                    'gateway' => 'ipaymu',
                    'payment_url' => $paymentUrl,
                    'va_number' => $vaNumber,
                    'qr_code' => $qrCodeUrl,
                    'reference' => (string) ($trx['TransactionId'] ?? $trx['SessionID'] ?? null),
                    'instructions' => $trx['instructions'] ?? [],
                ];
            }

            Log::info('iPaymu Direct Payment not returned 200, trying Redirect Payment fallback', [
                'order' => $order->order_number,
                'status' => $response->status(),
                'response' => $data ?? $response->body(),
            ]);
        } catch (\Throwable $e) {
            $order->refresh();
            Log::warning('iPaymu Direct Payment attempt error: '.$e->getMessage().', trying Redirect Payment');
        }

        // TAHAP 2: Seamless Fallback ke Redirect Payment (/api/v2/payment)
        $redirectPayload = [
            'product' => [substr($order->assessment?->title ?? 'Asesmen CBT', 0, 100)],
            'qty' => ['1'],
            'price' => [(string) $paymentAmount],
            'returnUrl' => route('orders.show', $order),
            'notifyUrl' => $callbackUrl,
            'cancelUrl' => route('orders.show', $order),
            'referenceId' => $order->order_number,
            'buyerName' => substr($customerName, 0, 50),
            'buyerEmail' => $customerEmail,
            'buyerPhone' => $customerPhone,
            'amount' => (string) $paymentAmount,
            'paymentMethod' => $method,
            'paymentChannel' => $channel,
        ];

        try {
            $timestamp = date('YmdHis');
            $jsonBodyRed = json_encode($redirectPayload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            $bodyHashRed = strtolower(hash('sha256', $jsonBodyRed));
            $stringToSignRed = 'POST:'.$va.':'.$bodyHashRed.':'.$apiKey;
            $signatureRed = hash_hmac('sha256', $stringToSignRed, $apiKey);

            $headersRed = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'va' => $va,
                'signature' => $signatureRed,
                'timestamp' => $timestamp,
            ];

            $redirectUrl = $baseUrl.'payment';
            $responseRed = Http::withHeaders($headersRed)->timeout(20)->post($redirectUrl, $redirectPayload);
            $dataRed = $responseRed->json();

            if ($responseRed->successful() && ($dataRed['Status'] ?? null) == 200 && isset($dataRed['Data'])) {
                $trxRed = $dataRed['Data'];

                $order->update([
                    'payment_gateway' => 'ipaymu',
                    'payment_reference' => (string) ($trxRed['SessionID'] ?? null),
                    'payment_url' => $trxRed['Url'] ?? null,
                    'gateway_payload' => $dataRed,
                ]);

                return [
                    'success' => true,
                    'gateway' => 'ipaymu',
                    'payment_url' => $trxRed['Url'] ?? null,
                    'reference' => (string) ($trxRed['SessionID'] ?? null),
                ];
            }

            $errorMessage = $dataRed['Message'] ?? ($data['Message'] ?? 'Gagal membuat pembayaran di iPaymu');
            Log::error('iPaymu Redirect Payment also failed', [
                'order' => $order->order_number,
                'response' => $dataRed ?? $responseRed->body(),
            ]);

            return [
                'success' => false,
                'message' => 'iPaymu Error: '.$errorMessage,
            ];
        } catch (\Throwable $e) {
            Log::error('iPaymu connection failed: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Gagal terhubung ke gateway iPaymu: '.$e->getMessage(),
            ];
        }
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

        // Format customer phone
        $customerPhone = preg_replace('/[^0-9]/', '', (string) ($order->user?->whatsapp_number ?: ($order->user?->phone ?? '081234567890')));
        if (strlen($customerPhone) < 10) {
            $customerPhone = '081234567890';
        }

        $effectivePrice = max(0, (int) round((float) $order->price_amount - (float) $order->discount_amount));
        $adminFee = (int) round((float) $order->admin_fee);

        $orderItems = [];
        if ($effectivePrice > 0) {
            $orderItems[] = [
                'sku' => 'ASSESSMENT-'.$order->assessment_id,
                'name' => substr($order->assessment?->title ?? 'Asesmen CBT', 0, 100),
                'price' => $effectivePrice,
                'quantity' => 1,
            ];
        }
        if ($adminFee > 0) {
            $orderItems[] = [
                'sku' => 'FEE-ADMIN',
                'name' => 'Biaya Layanan Pembayaran',
                'price' => $adminFee,
                'quantity' => 1,
            ];
        }

        $itemsSum = array_sum(array_map(fn ($item) => $item['price'] * $item['quantity'], $orderItems));
        if ($itemsSum !== $paymentAmount || empty($orderItems)) {
            $orderItems = [
                [
                    'sku' => 'ORDER-'.$order->order_number,
                    'name' => substr($order->assessment?->title ?? 'Pembelian Asesmen CBT', 0, 100),
                    'price' => $paymentAmount,
                    'quantity' => 1,
                ],
            ];
        }

        // Canonical webhook callback URL
        $appUrl = config('app.url');
        $callbackUrl = (! empty($appUrl) && ! str_contains($appUrl, 'localhost') && ! str_contains($appUrl, '127.0.0.1'))
            ? rtrim($appUrl, '/').'/api/webhooks/payment/tripay'
            : route('payment.webhook.tripay');

        $payload = [
            'method' => $channel,
            'merchant_ref' => $merchantRef,
            'amount' => $paymentAmount,
            'customer_name' => substr($order->user?->name ?? 'Siswa ADZKIA', 0, 50),
            'customer_email' => $order->user?->email ?? 'student@adzkia.test',
            'customer_phone' => $customerPhone,
            'order_items' => $orderItems,
            'callback_url' => $callbackUrl,
            'return_url' => route('orders.show', $order),
            'expired_time' => now()->addMinutes(config('payment.gateways.tripay.expiry_period', 1440))->timestamp,
            'signature' => $signature,
        ];

        try {
            $url = rtrim(config('payment.gateways.tripay.base_url', 'https://tripay.co.id/api/'), '/').'/transaction/create';
            $response = Http::withToken($apiKey)->timeout(20)->post($url, $payload);
            $data = $response->json();

            if ($response->successful() && ($data['success'] ?? false) && isset($data['data'])) {
                $trx = $data['data'];

                $order->update([
                    'payment_gateway' => 'tripay',
                    'payment_reference' => $trx['reference'] ?? null,
                    'payment_url' => $trx['checkout_url'] ?? $trx['pay_url'] ?? null,
                    'va_number' => $trx['pay_code'] ?? null,
                    'qr_code_url' => $trx['qr_url'] ?? $trx['qr_string'] ?? null,
                    'gateway_payload' => $data,
                ]);

                return [
                    'success' => true,
                    'payment_url' => $trx['checkout_url'] ?? $trx['pay_url'] ?? null,
                    'va_number' => $trx['pay_code'] ?? null,
                    'qr_code' => $trx['qr_url'] ?? $trx['qr_string'] ?? null,
                    'reference' => $trx['reference'] ?? null,
                    'instructions' => $trx['instructions'] ?? [],
                ];
            }

            $errorMessage = $data['message'] ?? 'Respons tidak terduga dari TriPay';
            Log::warning('Tripay API returned error', [
                'order' => $order->order_number,
                'channel' => $channel,
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return [
                'success' => false,
                'message' => 'TriPay Error: '.$errorMessage,
            ];
        } catch (\Throwable $e) {
            Log::error('Tripay API connection failed: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Gagal terhubung ke gateway TriPay: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Create payment using Kasera Pay API v1 (/v1/transactions).
     */
    protected function createKaseraPayment(Order $order, string $methodCode, ?array $methodConfig): array
    {
        $apiKey = (string) config('payment.gateways.kaserapay.api_key');
        $baseUrl = rtrim((string) config('payment.gateways.kaserapay.base_url', 'https://pay.kasera.id/v1/'), '/').'/';
        $paymentAmount = (int) round($order->total_amount);

        // Format customer phone
        $customerPhone = preg_replace('/[^0-9]/', '', (string) ($order->user?->whatsapp_number ?: ($order->user?->phone ?? '081329983555')));
        if (strlen($customerPhone) < 10) {
            $customerPhone = '081329983555';
        }

        $customerEmail = $order->user?->email ?: 'adzkia.tryout@gmail.com';
        $customerName = $order->user?->name ?: 'Siswa ADZKIA';

        // Canonical webhook callback URL
        $appUrl = config('app.url');
        $callbackUrl = (! empty($appUrl) && ! str_contains($appUrl, 'localhost') && ! str_contains($appUrl, '127.0.0.1'))
            ? rtrim($appUrl, '/').'/api/webhooks/payment/kaserapay'
            : route('payment.webhook.kaserapay');

        $returnUrl = (! empty($appUrl) && ! str_contains($appUrl, 'localhost') && ! str_contains($appUrl, '127.0.0.1'))
            ? rtrim($appUrl, '/')."/orders/{$order->id}"
            : route('orders.show', $order);

        $channel = $methodConfig['channel_kaserapay'] ?? strtolower($methodCode);

        $payload = [
            'amount' => $paymentAmount,
            'external_id' => $order->order_number,
            'description' => substr('Pembayaran '.($order->assessment?->title ?: 'Tryout ADZKIA'), 0, 100),
            'payment_methods' => [$channel],
            'return_url' => $returnUrl,
            'customer' => [
                'name' => substr($customerName, 0, 50),
                'email' => $customerEmail,
                'phone' => $customerPhone,
            ],
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$apiKey,
                'Idempotency-Key' => $order->order_number,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ])->timeout(15)->post($baseUrl.'transactions', $payload);

            $data = $response->json();

            if ($response->successful()) {
                $transactionId = $data['id'] ?? ($data['data']['id'] ?? null);
                $checkoutUrl = $data['checkout_url']
                    ?? $data['payment']['redirect_url']
                    ?? ($data['data']['checkout_url'] ?? ($data['data']['payment']['redirect_url'] ?? null));
                $qrString = $data['payment']['qr_string']
                    ?? ($data['data']['payment']['qr_string'] ?? null);
                $qrUrl = $data['payment']['qr_url']
                    ?? ($data['data']['payment']['qr_url'] ?? null);
                $vaNumber = $data['payment']['va_number']
                    ?? ($data['data']['payment']['va_number'] ?? null);

                $order->update([
                    'payment_reference' => $transactionId ?: $order->payment_reference,
                    'gateway_payload' => $data,
                ]);

                return [
                    'success' => true,
                    'checkout_url' => $checkoutUrl,
                    'qr_string' => $qrString,
                    'qr_url' => $qrUrl,
                    'va_number' => $vaNumber,
                    'data' => $data,
                ];
            }

            $errorObj = $data['error'] ?? null;
            if (is_array($errorObj)) {
                $errorMessage = $errorObj['message'] ?? ($errorObj['code'] ?? json_encode($errorObj));
            } elseif (is_string($errorObj)) {
                $errorMessage = $errorObj;
            } elseif (! empty($data['message']) && is_string($data['message'])) {
                $errorMessage = $data['message'];
            } else {
                $errorMessage = $response->body();
            }

            Log::error('Kasera Pay transaction creation failed', [
                'order' => $order->order_number,
                'status' => $response->status(),
                'response' => $response->body(),
            ]);

            return [
                'success' => false,
                'message' => 'Kasera Pay Error: '.$errorMessage,
            ];
        } catch (\Throwable $e) {
            Log::error('Kasera Pay API connection failed: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Gagal terhubung ke gateway Kasera Pay: '.$e->getMessage(),
            ];
        }
    }

    /**
     * Hitung biaya layanan (admin fee) secara dinamis sesuai skema flat / persentase / minimal biaya.
     */
    public function calculateAdminFee(string $methodCode, float $baseAmount): float
    {
        $driver = config('payment.default', 'ipaymu');
        $methodConfig = config("payment.methods.{$methodCode}", []);

        // Khusus kanal Tripay QRIS menggunakan skema biaya Tripay (Rp 750 + 0.70%)
        if ($driver === 'tripay' && $methodCode === 'QRIS') {
            $flat = 750.0;
            $percent = 0.70;
            $min = 750.0;
        } else {
            $flat = (float) ($methodConfig['fee_flat'] ?? ($methodConfig['fee'] ?? 0));
            $percent = (float) ($methodConfig['fee_percent'] ?? 0);
            $min = (float) ($methodConfig['fee_min'] ?? 0);
        }

        $percentFee = ($percent > 0) ? ($baseAmount * ($percent / 100)) : 0;
        $totalCalculatedFee = $flat + $percentFee;

        if ($min > 0 && $totalCalculatedFee < $min) {
            $totalCalculatedFee = $min;
        }

        return (float) round($totalCalculatedFee);
    }

    /**
     * Verify iPaymu webhook callback signature.
     */
    public function verifyIpaymuWebhook(Request $request): bool
    {
        $orderNumber = $request->input('reference_id') ?? $request->input('referenceId');
        if (! $orderNumber) {
            return false;
        }

        // If X-Signature header is provided, verify against merchant VA / API Key
        $callbackSignature = $request->header('X-Signature') ?? $request->header('signature');
        if ($callbackSignature) {
            $va = (string) config('payment.gateways.ipaymu.va');
            $expectedSignature = hash_hmac('sha256', $request->getContent(), $va);
            if (! hash_equals($expectedSignature, (string) $callbackSignature)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Verify Tripay webhook callback signature.
     * Formula: HMAC-SHA256(rawBody, privateKey) matched with header X-Callback-Signature
     */
    public function verifyTripayWebhook(Request $request): bool
    {
        $privateKey = config('payment.gateways.tripay.private_key');

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
     * Verify Kasera Pay webhook signature.
     * Header Kasera-Signature-V1 format: t=<timestamp>,v1=<signature>
     * Signature: HMAC-SHA256(timestamp . "." . rawBody, signingSecret)
     */
    public function verifyKaseraWebhook(Request $request): bool
    {
        $signingSecret = config('payment.gateways.kaserapay.signing_secret');

        if (blank($signingSecret) && app()->environment('local', 'testing')) {
            return true;
        }

        $headerSignature = $request->header('Kasera-Signature-V1')
            ?? $request->header('X-Kasera-Signature')
            ?? $request->header('Signature');

        if (! $headerSignature) {
            return blank($signingSecret);
        }

        $rawBody = $request->getContent();

        // Check if format is t=...,v1=...
        if (preg_match('/t=(\d+),v1=([a-f0-9]+)/i', $headerSignature, $matches)) {
            $timestamp = (int) $matches[1];
            $providedSignature = $matches[2];

            // Verify timestamp tolerance (within 5 minutes / 300 seconds)
            if (abs(time() - $timestamp) > 300) {
                Log::warning('Kasera Pay Webhook timestamp expired', [
                    'timestamp' => $timestamp,
                    'now' => time(),
                ]);

                return false;
            }

            $payloadToSign = $timestamp.'.'.$rawBody;
            $expectedSignature = hash_hmac('sha256', $payloadToSign, (string) $signingSecret);

            return hash_equals($expectedSignature, $providedSignature);
        }

        // Direct raw HMAC check fallback
        $expectedSignature = hash_hmac('sha256', $rawBody, (string) $signingSecret);

        return hash_equals($expectedSignature, (string) $headerSignature);
    }

    /**
     * Process webhook notification from iPaymu, Tripay, Kasera Pay, or generic gateway.
     */
    public function processWebhook(array $payload): array
    {
        $data = $payload['data'] ?? [];
        $orderNumber = $payload['reference_id']
            ?? $payload['referenceId']
            ?? $payload['merchant_ref']
            ?? $payload['external_id']
            ?? ($data['external_id'] ?? null)
            ?? ($data['order_number'] ?? null)
            ?? $payload['order_id']
            ?? $payload['order_number']
            ?? null;

        $event = strtolower((string) ($payload['event'] ?? ''));
        $status = strtoupper((string) ($payload['status'] ?? ($data['status'] ?? '')));
        $statusCode = (string) ($payload['status_code'] ?? ($data['status_code'] ?? ''));
        $trxStatus = strtolower((string) ($payload['transaction_status'] ?? ($data['transaction_status'] ?? '')));
        $reference = $payload['trx_id'] ?? $payload['trscode'] ?? $payload['reference'] ?? ($data['id'] ?? ($payload['id'] ?? null));

        if (! $orderNumber) {
            return ['status' => 'error', 'message' => 'Missing order reference'];
        }

        $order = Order::where('order_number', $orderNumber)->first();
        if (! $order) {
            return ['status' => 'error', 'message' => "Order {$orderNumber} not found"];
        }

        // Success condition:
        // iPaymu: status === 'berhasil' or 'success' or status_code === '1'
        // Tripay / Kasera Pay / Generic: status === 'PAID' or 'SUCCESS' or 'SETTLED' or event === 'payment.paid'
        $isSuccess = in_array($status, ['BERHASIL', 'SUCCESS', 'PAID', 'SETTLED', 'SETTLEMENT'], true)
            || $statusCode === '1'
            || $trxStatus === 'settlement'
            || in_array($event, ['payment.paid', 'transaction.paid', 'payment.success'], true);

        if ($isSuccess) {
            if ($order->status !== 'settled') {
                $order->update([
                    'status' => 'settled',
                    'paid_at' => now(),
                    'payment_reference' => $reference ?: $order->payment_reference,
                    'gateway_payload' => $payload,
                ]);

                // Automatically distribute revenue split to tenant wallet
                $this->distributionService->distribute($order);

                // Grant / accumulate assessment access quota & validity
                $this->grantAssessmentAccess($order);

                // Record coupon usage if applied
                if ($order->coupon_id) {
                    app(CouponService::class)->recordUsage($order);
                }

                Log::info("Order {$order->order_number} marked as settled, distributed, and assessment access granted.");
            }

            return ['status' => 'success', 'message' => 'Payment settled'];
        }

        // Check if transaction is still pending / unpaid
        if (in_array(strtolower($status), ['pending', 'unpaid'], true) || $trxStatus === 'pending') {
            return ['status' => 'success', 'message' => 'Payment still pending'];
        }

        // Failed / Expired condition
        $isExpired = in_array(strtolower($status), ['expired', 'expire', 'cancel', 'batal', 'gagal'], true);
        $newStatus = $isExpired ? 'expired' : 'failed';
        $order->update([
            'status' => $newStatus,
            'gateway_payload' => $payload,
        ]);

        return ['status' => 'success', 'message' => "Order marked as {$newStatus}"];
    }

    /**
     * Simulate instant settlement (useful for tests and admin manual settlement).
     */
    public function simulateSettlement(Order $order): bool
    {
        $order->update([
            'status' => 'settled',
            'paid_at' => now(),
            'gateway_payload' => array_merge($order->gateway_payload ?? [], [
                'settled_via' => 'admin_simulation',
                'settled_at' => now()->toIso8601String(),
            ]),
        ]);

        $this->grantAssessmentAccess($order);

        if ($order->coupon_id) {
            app(CouponService::class)->recordUsage($order);
        }

        return $this->distributionService->distribute($order);
    }

    /**
     * Grant or accumulate assessment access quota and extend validity days.
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

        $access->quota_attempts = ($access->quota_attempts ?? 0) + $packageAttempts;

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
