<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Order;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CouponService
{
    /**
     * Validate a coupon code for a given tenant, user, and order amount.
     *
     * @return array{
     *     valid: bool,
     *     message: string,
     *     coupon?: Coupon|null,
     *     code?: string,
     *     name?: string,
     *     discount_amount?: float,
     *     formatted_discount?: string,
     *     final_amount?: float
     * }
     */
    public function validateCoupon(string $code, ?Tenant $tenant, ?User $user, float $orderAmount): array
    {
        $cleanCode = strtoupper(trim($code));

        if (empty($cleanCode)) {
            return [
                'valid' => false,
                'message' => 'Silakan masukkan kode kupon diskon.',
            ];
        }

        // 1. Enterprise Tenant check: Only Enterprise tenants can offer discounts
        if (! $tenant || ! $tenant->isEnterprise()) {
            return [
                'valid' => false,
                'message' => 'Kupon diskon hanya dapat diterbitkan oleh institusi mitra tingkat Enterprise.',
            ];
        }

        // 2. Lookup coupon within the tenant scope
        $coupon = Coupon::where('tenant_id', $tenant->id)
            ->whereRaw('UPPER(code) = ?', [$cleanCode])
            ->first();

        if (! $coupon) {
            return [
                'valid' => false,
                'message' => 'Kode kupon "'.$cleanCode.'" tidak ditemukan atau tidak berlaku untuk institusi ini.',
            ];
        }

        // 3. Active status check
        if (! $coupon->is_active) {
            return [
                'valid' => false,
                'message' => 'Kupon "'.$coupon->code.'" saat ini sedang tidak aktif.',
            ];
        }

        // 4. Start date check
        if (! $coupon->hasStarted()) {
            $formattedStart = $coupon->valid_from?->format('d M Y H:i') ?? 'nanti';

            return [
                'valid' => false,
                'message' => 'Kupon "'.$coupon->code.'" baru dapat digunakan mulai '.$formattedStart.'.',
            ];
        }

        // 5. Expiry date check
        if ($coupon->isExpired()) {
            $formattedUntil = $coupon->valid_until?->format('d M Y H:i') ?? 'tanggal tertentu';

            return [
                'valid' => false,
                'message' => 'Kupon "'.$coupon->code.'" telah berakhir pada '.$formattedUntil.'.',
            ];
        }

        // 6. Overall usage limit (quota)
        if (! $coupon->hasRemainingQuota()) {
            return [
                'valid' => false,
                'message' => 'Kuota penggunaan kupon "'.$coupon->code.'" telah habis.',
            ];
        }

        // 7. Minimum order amount check
        if ($coupon->min_order_amount && $orderAmount < (float) $coupon->min_order_amount) {
            $formattedMin = 'Rp '.number_format((float) $coupon->min_order_amount, 0, ',', '.');

            return [
                'valid' => false,
                'message' => 'Minimal total pembelian untuk menggunakan kupon ini adalah '.$formattedMin.'.',
            ];
        }

        // 8. Per-user usage limit check
        if ($user && $coupon->usage_limit_per_user) {
            $userUsageCount = CouponUsage::where('coupon_id', $coupon->id)
                ->where('user_id', $user->id)
                ->count();

            if ($userUsageCount >= $coupon->usage_limit_per_user) {
                return [
                    'valid' => false,
                    'message' => 'Anda telah mencapai batas maksimal penggunaan kupon ini ('.$coupon->usage_limit_per_user.'x).',
                ];
            }
        }

        // 9. Calculate discount (strictly capped at 75% of base price to safeguard ADZKIA 25% revenue)
        $discountAmount = $coupon->calculateDiscount($orderAmount);
        $finalAmount = max(0.00, round($orderAmount - $discountAmount, 2));

        return [
            'valid' => true,
            'message' => 'Kupon berhasil diterapkan! Anda hemat '.$coupon->formattedDiscount().'.',
            'coupon' => $coupon,
            'code' => $coupon->code,
            'name' => $coupon->name,
            'discount_amount' => $discountAmount,
            'formatted_discount' => $coupon->formattedDiscount(),
            'final_amount' => $finalAmount,
        ];
    }

    /**
     * Atomically record coupon usage for a settled order.
     */
    public function recordUsage(Order $order): ?CouponUsage
    {
        if (! $order->coupon_id || (float) $order->discount_amount <= 0) {
            return null;
        }

        return DB::transaction(function () use ($order) {
            // Idempotency: prevent recording twice for same order
            $existing = CouponUsage::where('order_id', $order->id)->first();
            if ($existing) {
                return $existing;
            }

            $usage = CouponUsage::create([
                'coupon_id' => $order->coupon_id,
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'discount_amount' => $order->discount_amount,
            ]);

            Coupon::where('id', $order->coupon_id)->increment('used_count');

            return $usage;
        });
    }
}
