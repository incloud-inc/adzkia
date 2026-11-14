<?php

namespace App\Http\Controllers;

use App\Services\Payment\PaymentGatewayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentWebhookController extends Controller
{
    public function __construct(
        protected PaymentGatewayService $paymentService
    ) {}

    /**
     * Webhook handler for iPaymu payment gateway.
     */
    public function ipaymu(Request $request): JsonResponse
    {
        Log::info('iPaymu Webhook Received', [
            'payload' => $request->except(['signature', 'token', 'buyer_phone', 'buyer_email']),
        ]);

        // Verify webhook signature (if present)
        if (! $this->paymentService->verifyIpaymuWebhook($request)) {
            Log::warning('iPaymu Webhook Invalid Signature', [
                'ip' => $request->ip(),
                'reference_id' => $request->input('reference_id') ?? $request->input('referenceId'),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid signature',
            ], 400);
        }

        $result = $this->paymentService->processWebhook($request->all());

        if (($result['status'] ?? '') === 'error') {
            return response()->json([
                'success' => false,
                'message' => $result['message'] ?? 'Error processing payment',
            ], 422);
        }

        // iPaymu expects HTTP 200 with JSON or success text
        return response()->json([
            'status' => 'OK',
            'success' => true,
            'message' => 'Notification handled',
        ], 200);
    }

    /**
     * Webhook handler for Tripay payment gateway.
     */
    public function tripay(Request $request): JsonResponse
    {
        Log::info('Tripay Webhook Received', [
            'header_event' => $request->header('X-Callback-Event'),
            'payload' => $request->except(['signature', 'token', 'customer_phone', 'customer_email']),
        ]);

        // Verify webhook signature (HMAC-SHA256 with private key)
        if (! $this->paymentService->verifyTripayWebhook($request)) {
            Log::warning('Tripay Webhook Invalid Signature', [
                'ip' => $request->ip(),
                'merchant_ref' => $request->input('merchant_ref'),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid signature',
            ], 400);
        }

        $result = $this->paymentService->processWebhook($request->all());

        if (($result['status'] ?? '') === 'error') {
            return response()->json([
                'success' => false,
                'message' => $result['message'] ?? 'Error processing payment',
            ], 422);
        }

        // Tripay expects JSON response: {"success": true}
        return response()->json([
            'success' => true,
        ], 200);
    }

    /**
     * Webhook handler for Kasera Pay payment gateway.
     */
    public function kaserapay(Request $request): JsonResponse
    {
        Log::info('Kasera Pay Webhook Received', [
            'header_signature' => $request->header('Kasera-Signature-V1') ?? $request->header('X-Kasera-Signature'),
            'header_event' => $request->header('Kasera-Event-Id'),
            'payload' => $request->all(),
        ]);

        // Verify webhook signature (Kasera-Signature-V1 HMAC-SHA256 with signing secret)
        if (! $this->paymentService->verifyKaseraWebhook($request)) {
            Log::warning('Kasera Pay Webhook Invalid Signature', [
                'ip' => $request->ip(),
                'external_id' => $request->input('external_id') ?? $request->input('data.external_id'),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Invalid signature',
            ], 400);
        }

        $result = $this->paymentService->processWebhook($request->all());

        if (($result['status'] ?? '') === 'error') {
            return response()->json([
                'success' => false,
                'message' => $result['message'] ?? 'Error processing payment',
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Notification handled',
        ], 200);
    }

    /**
     * Generic webhook handler for fallback / other gateways.
     */
    public function generic(Request $request): JsonResponse
    {
        Log::info('Generic Payment Webhook Received', $request->all());

        $result = $this->paymentService->processWebhook($request->all());

        return response()->json($result, ($result['status'] ?? '') === 'success' ? 200 : 400);
    }
}
