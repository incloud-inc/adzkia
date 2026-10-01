<?php

namespace App\Http\Controllers;

use App\Services\Payment\PaymentGatewayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PaymentWebhookController extends Controller
{
    public function __construct(
        protected PaymentGatewayService $paymentService
    ) {}

    /**
     * Webhook handler for Duitku payment gateway.
     */
    public function duitku(Request $request): Response|JsonResponse
    {
        Log::info('Duitku Webhook Received', $request->except(['signature', 'token', 'customer_phone', 'customer_email']));

        // Verify webhook signature
        if (! $this->paymentService->verifyDuitkuWebhook($request)) {
            Log::warning('Duitku Webhook Invalid Signature', [
                'ip' => $request->ip(),
                'merchantOrderId' => $request->input('merchantOrderId'),
            ]);

            return response('Bad Signature', 400);
        }

        $result = $this->paymentService->processWebhook($request->all());

        if (($result['status'] ?? '') === 'error') {
            return response($result['message'] ?? 'Error', 422);
        }

        // Duitku expects HTTP 200 with text 'SUCCESS' or JSON
        return response('SUCCESS', 200)->header('Content-Type', 'text/plain');
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
     * Generic webhook handler for fallback / other gateways.
     */
    public function generic(Request $request): JsonResponse
    {
        Log::info('Generic Payment Webhook Received', $request->all());

        $result = $this->paymentService->processWebhook($request->all());

        return response()->json($result, ($result['status'] ?? '') === 'success' ? 200 : 400);
    }
}
