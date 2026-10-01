<?php

namespace App\Services\Payment;

use App\Models\Order;
use App\Models\Tenant;
use App\Models\TenantWallet;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RevenueDistributionService
{
    /**
     * Compute revenue share snapshot for an order based on tenant tier.
     *
     * @return array{
     *     tier: string,
     *     tenant_pct: int,
     *     platform_pct: int,
     *     tenant_amount: float,
     *     platform_amount: float
     * }
     */
    public function computeSnapshot(?Tenant $tenant, float $priceAmount): array
    {
        if (! $tenant) {
            return [
                'tier' => 'platform',
                'tenant_pct' => 0,
                'platform_pct' => 100,
                'tenant_amount' => 0.00,
                'platform_amount' => round($priceAmount, 2),
            ];
        }

        $tier = match ($tenant->plan) {
            'whitelabel' => 'enterprise',
            'premium' => 'pro',
            default => 'starter',
        };

        // Revenue Share Ratio based on Task 2.3:
        // - Starter: ADZKIA 75% : Tenant 25%
        // - Pro: ADZKIA 50% : Tenant 50%
        // - Enterprise: ADZKIA 25% : Tenant 75%
        $tenantPct = match ($tier) {
            'enterprise' => 75,
            'pro' => 50,
            default => 25,
        };

        $platformPct = 100 - $tenantPct;

        $tenantAmount = round(($priceAmount * $tenantPct) / 100, 2);
        $platformAmount = round($priceAmount - $tenantAmount, 2);

        return [
            'tier' => $tier,
            'tenant_pct' => $tenantPct,
            'platform_pct' => $platformPct,
            'tenant_amount' => $tenantAmount,
            'platform_amount' => $platformAmount,
        ];
    }

    /**
     * Distribute revenue to tenant wallet upon settlement.
     * Guaranteed idempotent through database transaction and reference checking.
     */
    public function distribute(Order $order): bool
    {
        if ($order->status !== 'settled') {
            Log::info("Cannot distribute unsettled order {$order->order_number}");

            return false;
        }

        if (! $order->tenant_id || $order->tenant_revenue_amount <= 0) {
            Log::info("No tenant revenue to credit for order {$order->order_number}");

            return true;
        }

        return DB::transaction(function () use ($order) {
            // 1. Idempotency check: ensure order has not been credited already
            $alreadyProcessed = WalletTransaction::where('reference_type', 'order')
                ->where('reference_id', $order->id)
                ->exists();

            if ($alreadyProcessed) {
                Log::info("Order {$order->order_number} revenue was already distributed. Skipping.");

                return true;
            }

            // 2. Lock tenant wallet row for update
            $wallet = TenantWallet::where('tenant_id', $order->tenant_id)->lockForUpdate()->first();

            if (! $wallet) {
                $wallet = TenantWallet::create([
                    'tenant_id' => $order->tenant_id,
                    'balance' => 0,
                    'held_balance' => 0,
                    'total_earned' => 0,
                    'total_withdrawn' => 0,
                ]);
            }

            $creditAmount = (float) $order->tenant_revenue_amount;
            $newBalance = (float) $wallet->balance + $creditAmount;
            $newEarned = (float) $wallet->total_earned + $creditAmount;

            $wallet->update([
                'balance' => $newBalance,
                'total_earned' => $newEarned,
            ]);

            $assessmentTitle = $order->assessment?->title ?? 'Asesmen';

            // 3. Record wallet transaction
            WalletTransaction::create([
                'tenant_wallet_id' => $wallet->id,
                'type' => 'credit',
                'amount' => $creditAmount,
                'balance_after' => $newBalance,
                'reference_type' => 'order',
                'reference_id' => $order->id,
                'description' => "Bagi hasil penjualan asesmen #{$order->order_number}: {$assessmentTitle} ({$order->revenue_share_tenant_pct}%)",
            ]);

            Log::info("Successfully credited Rp{$creditAmount} to tenant {$order->tenant_id} wallet for order {$order->order_number}");

            return true;
        });
    }
}
