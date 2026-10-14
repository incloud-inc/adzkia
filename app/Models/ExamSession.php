<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class ExamSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'assessment_id',
        'user_id',
        'tenant_id',
        'status',
        'device_fingerprint',
        'ip_address',
        'submitted_ip',
        'lock_reason',
        'unlocked_by',
        'unlocked_at',
        'started_at',
        'expires_at',
        'last_activity_at',
        'completed_at',
        'schedule_snapshot',
        'question_count',
        'meta',
        'score',
        'max_score',
    ];

    protected function casts(): array
    {
        return [
            'schedule_snapshot' => 'array',
            'meta' => 'array',
            'unlocked_at' => 'datetime',
            'started_at' => 'datetime',
            'expires_at' => 'datetime',
            'last_activity_at' => 'datetime',
            'completed_at' => 'datetime',
            'score' => 'decimal:2',
            'max_score' => 'decimal:2',
        ];
    }

    /**
     * Auto-generate UUID on creation.
     */
    protected static function booted(): void
    {
        static::creating(function (self $session) {
            $session->uuid ??= (string) Str::uuid();
        });
    }

    /**
     * Use uuid as the route model binding key.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Retrieve the model for a bound value, supporting both UUID and integer ID.
     * Prevents PostgreSQL invalid text representation errors when integer ID is passed.
     */
    public function resolveRouteBinding($value, $field = null): ?self
    {
        if ($field) {
            return $this->where($field, $value)->first();
        }

        if (is_numeric($value)) {
            return $this->where('id', (int) $value)->first()
                ?? $this->where('uuid', (string) $value)->first();
        }

        return $this->where('uuid', (string) $value)->first();
    }

    // ─── Relationships ──────────────────────────────────────────────

    public function assessment(): BelongsTo
    {
        return $this->belongsTo(Assessment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function proctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'unlocked_by');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(ExamAnswer::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(ExamEvent::class);
    }

    // ─── Status Checks ──────────────────────────────────────────────

    public function isLocked(): bool
    {
        return $this->status === 'interrupted_locked';
    }

    public function isInProgress(): bool
    {
        return $this->status === 'in_progress';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function isExpired(): bool
    {
        return $this->expires_at !== null && $this->expires_at->isPast();
    }

    // ─── Time Helpers ───────────────────────────────────────────────

    /**
     * Remaining seconds until session expires (server-authoritative).
     */
    public function remainingSeconds(): int
    {
        if (! $this->expires_at) {
            return 0;
        }

        return max(0, $this->expires_at->getTimestamp() - now()->getTimestamp());
    }

    /**
     * Remaining minutes (rounded down), for display.
     */
    public function remainingMinutes(): int
    {
        return (int) floor($this->remainingSeconds() / 60);
    }

    // ─── Actions ────────────────────────────────────────────────────

    /**
     * Unlock session by teacher/proctor.
     */
    public function unlockBy(User $proctor): void
    {
        $this->update([
            'status' => 'in_progress',
            'unlocked_by' => $proctor->id,
            'unlocked_at' => now(),
            'lock_reason' => null,
        ]);
    }

    /**
     * Lock session due to network drop or device change.
     */
    public function lock(string $reason = 'Koneksi terputus / pergantian perangkat'): void
    {
        if ($this->isCompleted() || $this->status === 'completed' || $this->completed_at !== null) {
            return;
        }

        $this->update([
            'status' => 'interrupted_locked',
            'lock_reason' => $reason,
        ]);
    }

    /**
     * Scope sesi ujian yang terafiliasi dengan tenant tertentu.
     * Mengaitkan melalui exam_sessions.tenant_id ATAU users.current_tenant_id ATAU keanggotaan users di tenant_user.
     */
    public function scopeAffiliatedWithTenant(Builder $query, int $tenantId): Builder
    {
        return $query->where(function (Builder $q) use ($tenantId) {
            $q->where('tenant_id', $tenantId)
                ->orWhereHas('user', function (Builder $uq) use ($tenantId) {
                    $uq->where('current_tenant_id', $tenantId)
                        ->orWhereHas('tenants', fn (Builder $tq) => $tq->where('tenants.id', $tenantId));
                });
        });
    }

    /**
     * Query builder terpusat untuk mendeteksi seluruh sesi siswa yang sedang aktif ujian.
     * Mencakup status 'in_progress' dan 'interrupted_locked' yang belum selesai dikerjakan.
     */
    public static function activeExamQuery(?int $tenantId = null, ?User $user = null): Builder
    {
        $query = static::query()
            ->whereIn('status', ['in_progress', 'interrupted_locked'])
            ->whereNull('completed_at')
            ->where(function ($q) {
                $q->whereNull('meta->finalize_reason');
            });

        if ($user && ! $user->isSuperUser()) {
            if ($tenantId) {
                $query->where(function ($q) use ($tenantId) {
                    $q->where('tenant_id', $tenantId)
                        ->orWhereHas('user.tenants', fn ($t) => $t->where('tenants.id', $tenantId));
                });
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        return $query;
    }

    /**
     * Query builder terpusat untuk mendeteksi seluruh sesi ujian yang membutuhkan koreksi / review guru.
     * Mencakup:
     * 1. Status grading 'pending_manual'
     * 2. Jawaban essay yang belum dinilai (points_awarded IS NULL)
     * 3. Asesmen yang memiliki butir soal essay namun nilainya belum dirilis (is_score_released != true)
     */
    public static function pendingManualGradingQuery(?int $tenantId = null, ?User $user = null): Builder
    {
        $query = static::query()
            ->where(function ($sq) {
                $sq->where('status', 'completed')
                    ->orWhereNotNull('completed_at')
                    ->orWhereNotNull('meta->finalize_reason');
            })
            ->where(function ($sub) {
                $sub->where('grading_status', 'pending_manual')
                    ->orWhereHas('answers', function ($q) {
                        $q->whereNull('points_awarded')
                            ->whereHas('question', fn ($q2) => $q2->where('type', 'essay'));
                    })
                    ->orWhere(function ($q3) {
                        $q3->whereHas('assessment', function ($aq) {
                            $aq->whereHas('sections.questions', fn ($qq) => $qq->where('type', 'essay'))
                                ->orWhereHas('sections.questionGroups.questions', fn ($qq) => $qq->where('type', 'essay'));
                        })->where(function ($q4) {
                            $q4->whereNull('meta->is_score_released')
                                ->orWhere('meta->is_score_released', false);
                        });
                    });
            });

        if ($user && ! $user->isSuperUser()) {
            if ($tenantId) {
                $query->where(function ($q) use ($tenantId) {
                    $q->where('tenant_id', $tenantId)
                        ->orWhereHas('user.tenants', fn ($t) => $t->where('tenants.id', $tenantId));
                });
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        return $query;
    }
}
