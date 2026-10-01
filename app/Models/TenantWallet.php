<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TenantWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'balance',
        'held_balance',
        'total_earned',
        'total_withdrawn',
    ];

    protected function casts(): array
    {
        return [
            'balance' => 'decimal:2',
            'held_balance' => 'decimal:2',
            'total_earned' => 'decimal:2',
            'total_withdrawn' => 'decimal:2',
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class)->orderByDesc('id');
    }

    /**
     * Get or create wallet for a given tenant.
     */
    public static function getOrCreate(int $tenantId): self
    {
        return static::firstOrCreate(
            ['tenant_id' => $tenantId],
            [
                'balance' => 0,
                'held_balance' => 0,
                'total_earned' => 0,
                'total_withdrawn' => 0,
            ]
        );
    }
}
