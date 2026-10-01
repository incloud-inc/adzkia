<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAssessmentAccess extends Model
{
    use HasFactory;

    protected $table = 'user_assessment_accesses';

    protected $fillable = [
        'user_id',
        'assessment_id',
        'quota_attempts',
        'attempts_used',
        'expires_at',
        'last_purchased_at',
        'last_order_id',
    ];

    protected function casts(): array
    {
        return [
            'quota_attempts' => 'integer',
            'attempts_used' => 'integer',
            'expires_at' => 'datetime',
            'last_purchased_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class);
    }

    public function lastOrder(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'last_order_id');
    }

    /**
     * Sisa percobaan yang masih dapat digunakan.
     */
    public function availableAttempts(): int
    {
        return max(0, $this->quota_attempts - $this->attempts_used);
    }

    /**
     * Cek apakah masa berlaku pengerjaan sudah habis (misal 35 hari).
     */
    public function isExpired(): bool
    {
        return $this->expires_at ? $this->expires_at->isPast() : false;
    }

    /**
     * Cek apakah akses pengerjaan masih aktif dan masih ada kuota percobaan.
     */
    public function isValid(): bool
    {
        return ! $this->isExpired() && $this->availableAttempts() > 0;
    }

    /**
     * Sisa hari masa aktif.
     */
    public function daysRemaining(): int
    {
        if (! $this->expires_at || $this->isExpired()) {
            return 0;
        }

        return (int) ceil(now()->diffInSeconds($this->expires_at, false) / 86400);
    }
}
