<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'code',
        'name',
        'discount_type',
        'discount_amount',
        'max_discount',
        'min_order_amount',
        'usage_limit',
        'usage_limit_per_user',
        'used_count',
        'valid_from',
        'valid_until',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'discount_amount' => 'decimal:2',
            'max_discount' => 'decimal:2',
            'min_order_amount' => 'decimal:2',
            'usage_limit' => 'integer',
            'usage_limit_per_user' => 'integer',
            'used_count' => 'integer',
            'is_active' => 'boolean',
            'valid_from' => 'datetime',
            'valid_until' => 'datetime',
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function usages(): HasMany
    {
        return $this->hasMany(CouponUsage::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Check if the coupon has started.
     */
    public function hasStarted(): bool
    {
        return ! $this->valid_from || now()->gte($this->valid_from);
    }

    /**
     * Check if the coupon has expired.
     */
    public function isExpired(): bool
    {
        return $this->valid_until && now()->gt($this->valid_until);
    }

    /**
     * Check if the coupon has remaining usage quota.
     */
    public function hasRemainingQuota(): bool
    {
        if ($this->usage_limit === null) {
            return true;
        }

        return $this->used_count < $this->usage_limit;
    }

    /**
     * Check if coupon is currently valid (active, within date range, quota available).
     */
    public function isValidNow(): bool
    {
        return $this->is_active && $this->hasStarted() && ! $this->isExpired() && $this->hasRemainingQuota();
    }

    /**
     * Calculate nominal discount for a given base price.
     * Capped at maximum 75% of base price to guarantee ADZKIA platform 25% revenue.
     */
    public function calculateDiscount(float $basePrice): float
    {
        if ($basePrice <= 0) {
            return 0.00;
        }

        $discount = 0.00;

        if ($this->discount_type === 'percentage') {
            $discount = round(($basePrice * (float) $this->discount_amount) / 100, 2);
            if ($this->max_discount !== null && (float) $this->max_discount > 0) {
                $discount = min($discount, (float) $this->max_discount);
            }
        } else {
            $discount = round((float) $this->discount_amount, 2);
        }

        // Strict platform protection: maximum discount is 75% of base price
        $maxAllowed = round($basePrice * 0.75, 2);

        return max(0.00, min($discount, $maxAllowed));
    }

    /**
     * Format discount for display (e.g. "50%" or "Rp 25.000").
     */
    public function formattedDiscount(): string
    {
        if ($this->discount_type === 'percentage') {
            return ((float) $this->discount_amount == (int) $this->discount_amount ? (int) $this->discount_amount : $this->discount_amount).'%';
        }

        return 'Rp '.number_format((float) $this->discount_amount, 0, ',', '.');
    }
}
