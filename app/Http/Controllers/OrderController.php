<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Order;
use App\Services\CouponService;
use App\Services\Payment\PaymentGatewayService;
use App\Services\Payment\RevenueDistributionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function __construct(
        protected PaymentGatewayService $paymentService,
        protected RevenueDistributionService $distributionService,
        protected CouponService $couponService
    ) {}

    /**
     * Show the checkout page for a paid assessment.
     */
    public function checkout(Assessment $assessment): View|RedirectResponse
    {
        $user = Auth::user();

        // If free, no checkout required
        if ($assessment->price_type !== 'paid' || (float) $assessment->price <= 0) {
            return redirect()->route('assessments.show', $assessment)
                ->with('info', 'Asesmen ini gratis dan dapat diakses langsung.');
        }

        // If student still has valid active access (not expired, and has remaining attempts)
        $access = $user ? $user->getAssessmentAccess($assessment) : null;
        if ($access && $access->isValid()) {
            return redirect()->route('assessments.show', $assessment)
                ->with('info', "Anda masih memiliki akses aktif ({$access->availableAttempts()} sisa percobaan hingga {$access->expires_at?->format('d M Y')}).");
        }

        $packages = $assessment->packages()->where('is_active', true)->orderBy('sort_order')->orderBy('price')->get();
        $paymentMethods = config('payment.methods', []);
        $tenant = $assessment->tenant;

        return view('orders.checkout', compact('assessment', 'packages', 'paymentMethods', 'tenant', 'access'));
    }

    /**
     * Check / validate a coupon code for checkout via AJAX.
     */
    public function applyCoupon(Request $request, Assessment $assessment): JsonResponse
    {
        $validated = $request->validate([
            'coupon_code' => 'required|string|max:50',
            'package_id' => 'nullable|integer|exists:assessment_packages,id',
        ]);

        $package = null;
        if (! empty($validated['package_id'])) {
            $package = $assessment->packages()->where('id', $validated['package_id'])->first();
        }

        if (! $package && $assessment->packages()->where('is_active', true)->exists()) {
            $package = $assessment->packages()->where('is_active', true)->orderBy('sort_order')->orderBy('price')->first();
        }

        $price = $package ? (float) $package->price : (float) $assessment->price;
        $tenant = $assessment->tenant ?? auth()->user()?->currentTenant;

        $result = $this->couponService->validateCoupon(
            $validated['coupon_code'],
            $tenant,
            auth()->user(),
            $price
        );

        if (! $result['valid']) {
            return response()->json([
                'success' => false,
                'message' => $result['message'],
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => $result['message'],
            'coupon' => [
                'code' => $result['code'],
                'name' => $result['name'],
                'formatted_discount' => $result['formatted_discount'],
                'discount_amount' => $result['discount_amount'],
                'discount_amount_formatted' => 'Rp '.number_format($result['discount_amount'], 0, ',', '.'),
                'final_amount' => $result['final_amount'],
                'final_amount_formatted' => 'Rp '.number_format($result['final_amount'], 0, ',', '.'),
            ],
        ]);
    }

    /**
     * Process checkout form submission and create order.
     */
    public function store(Request $request, Assessment $assessment): RedirectResponse|JsonResponse
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        $access = $user->getAssessmentAccess($assessment);
        if ($access && $access->isValid()) {
            return redirect()->route('assessments.show', $assessment)
                ->with('info', "Anda masih memiliki akses aktif ({$access->availableAttempts()} sisa percobaan hingga {$access->expires_at?->format('d M Y')}).");
        }

        $validated = $request->validate([
            'payment_method' => 'required|string|in:'.implode(',', array_keys(config('payment.methods', []))),
            'package_id' => 'nullable|integer|exists:assessment_packages,id',
            'coupon_code' => 'nullable|string|max:50',
        ]);

        $package = null;
        if (! empty($validated['package_id'])) {
            $package = $assessment->packages()->where('id', $validated['package_id'])->first();
        }

        if (! $package && $assessment->packages()->where('is_active', true)->exists()) {
            $package = $assessment->packages()->where('is_active', true)->orderBy('sort_order')->orderBy('price')->first();
        }

        $price = $package ? (float) $package->price : (float) $assessment->price;
        $packageAttempts = $package ? (int) $package->attempts : 1;
        $validityDays = $package ? (int) $package->validity_days : ((int) ($assessment->access_validity_days ?: 35));

        $tenant = $assessment->tenant ?? $user->currentTenant;

        // Process coupon if submitted
        $coupon = null;
        $discountAmount = 0.00;
        $totalAmount = $price;

        if (! empty($validated['coupon_code'])) {
            $couponResult = $this->couponService->validateCoupon(
                $validated['coupon_code'],
                $tenant,
                $user,
                $price
            );

            if (! $couponResult['valid']) {
                if ($request->wantsJson()) {
                    return response()->json([
                        'status' => 'error',
                        'message' => $couponResult['message'],
                    ], 422);
                }

                return redirect()->back()
                    ->withInput()
                    ->withErrors(['coupon_code' => $couponResult['message']]);
            }

            $coupon = $couponResult['coupon'] ?? null;
            $discountAmount = (float) ($couponResult['discount_amount'] ?? 0.00);
            $totalAmount = (float) ($couponResult['final_amount'] ?? $price);
        }

        // Snapshot revenue share according to tenant tier (tenant absorbs discount!)
        $snapshot = $this->distributionService->computeSnapshot($tenant, $price, $discountAmount);

        $order = Order::create([
            'order_number' => Order::generateOrderNumber(),
            'user_id' => $user->id,
            'tenant_id' => $tenant?->id,
            'assessment_id' => $assessment->id,
            'assessment_package_id' => $package?->id,
            'package_attempts' => $packageAttempts,
            'package_validity_days' => $validityDays,
            'price_amount' => $price,
            'discount_amount' => $discountAmount,
            'admin_fee' => 0,
            'total_amount' => $totalAmount,
            'coupon_id' => $coupon?->id,
            'coupon_code_snapshot' => $coupon?->code,
            'payment_gateway' => config('payment.default', 'duitku'),
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'tenant_tier_snapshot' => $snapshot['tier'],
            'revenue_share_tenant_pct' => $snapshot['tenant_pct'],
            'revenue_share_platform_pct' => $snapshot['platform_pct'],
            'tenant_revenue_amount' => $snapshot['tenant_amount'],
            'platform_revenue_amount' => $snapshot['platform_amount'],
        ]);

        // Request payment info from gateway
        $paymentResult = $this->paymentService->createPayment($order, $validated['payment_method']);

        if ($request->wantsJson()) {
            return response()->json([
                'status' => 'success',
                'order' => $order,
                'payment' => $paymentResult,
                'redirect_url' => route('orders.show', $order),
            ]);
        }

        return redirect()->route('orders.show', $order);
    }

    /**
     * Show order payment detail page (VA, QRIS, status).
     */
    public function show(Order $order): View
    {
        $user = Auth::user();
        if ($user && $order->user_id !== $user->id && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403);
        }

        $order->load(['assessment', 'tenant', 'user']);

        return view('orders.show', compact('order'));
    }

    /**
     * Check order status via AJAX polling.
     */
    public function checkStatus(Order $order): JsonResponse
    {
        $user = Auth::user();
        if ($user && $order->user_id !== $user->id && ! $user->isAdmin() && ! $user->isSuperUser()) {
            abort(403, 'Akses ditolak.');
        }

        return response()->json([
            'status' => $order->status,
            'is_settled' => $order->isSettled(),
            'paid_at' => $order->paid_at?->format('d M Y H:i'),
            'redirect_url' => route('assessments.show', $order->assessment_id),
        ]);
    }

    /**
     * Instant settlement simulation for test/sandbox environments.
     */
    public function simulatePayment(Order $order): RedirectResponse
    {
        if (! app()->environment('local', 'testing') && ! auth()->user()?->isSuperUser()) {
            abort(403, 'Simulasi pembayaran dinonaktifkan di lingkungan produksi.');
        }

        $this->paymentService->simulateSettlement($order);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Pembayaran berhasil disimulasikan (Lunas / Settled)! Akses ujian telah dibuka.');
    }
}
