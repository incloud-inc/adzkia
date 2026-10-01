<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'tenant_id',
        'assessment_id',
        'assessment_package_id',
        'package_attempts',
        'package_validity_days',
        'price_amount',
        'admin_fee',
        'total_amount',
        'payment_gateway',
        'payment_method',
        'payment_reference',
        'payment_url',
        'qr_code_url',
        'va_number',
        'status',
        'tenant_tier_snapshot',
        'revenue_share_tenant_pct',
        'revenue_share_platform_pct',
        'tenant_revenue_amount',
        'platform_revenue_amount',
        'paid_at',
        'expired_at',
        'gateway_payload',
    ];

    protected function casts(): array
    {
        return [
            'price_amount' => 'decimal:2',
            'admin_fee' => 'decimal:2',
            'total_amount' => 'decimal:2',
            'tenant_revenue_amount' => 'decimal:2',
            'platform_revenue_amount' => 'decimal:2',
            'revenue_share_tenant_pct' => 'integer',
            'revenue_share_platform_pct' => 'integer',
            'package_attempts' => 'integer',
            'package_validity_days' => 'integer',
            'paid_at' => 'datetime',
            'expired_at' => 'datetime',
            'gateway_payload' => 'array',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(AssessmentPackage::class, 'assessment_package_id');
    }

    public function isSettled(): bool
    {
        return $this->status === 'settled';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function scopeSettled(Builder $query): Builder
    {
        return $query->where('status', 'settled');
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopeForTenant(Builder $query, int $tenantId): Builder
    {
        return $query->where('tenant_id', $tenantId);
    }

    /**
     * Generate unique human-readable order number.
     */
    public static function generateOrderNumber(): string
    {
        return 'ORD-'.now()->format('Ymd').'-'.strtoupper(bin2hex(random_bytes(4)));
    }
}
