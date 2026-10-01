<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

#[Fillable([
    'tenant_id',
    'email',
    'role',
    'token',
    'invited_by',
    'expires_at',
    'accepted_at',
])]
class TenantInvitation extends Model
{
    protected $table = 'tenant_invitations';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'expires_at' => 'datetime',
            'accepted_at' => 'datetime',
        ];
    }

    /**
     * Get the tenant this invitation belongs to.
     *
     * @return BelongsTo<Tenant, $this>
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Get the user who sent this invitation.
     *
     * @return BelongsTo<User, $this>
     */
    public function inviter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invited_by');
    }

    /**
     * Check if the invitation has expired.
     */
    public function isExpired(): bool
    {
        return $this->expires_at !== null && now()->greaterThan($this->expires_at);
    }

    /**
     * Check if the invitation has been accepted.
     */
    public function isAccepted(): bool
    {
        return $this->accepted_at !== null;
    }

    /**
     * Check if the invitation is still pending (valid and not accepted).
     */
    public function isPending(): bool
    {
        return ! $this->isExpired() && ! $this->isAccepted();
    }

    /**
     * Generate a unique invitation token.
     */
    public static function generateToken(): string
    {
        return Str::random(64);
    }

    /**
     * Scope to only pending (unaccepted, unexpired) invitations.
     *
     * @param  Builder<TenantInvitation>  $query
     * @return Builder<TenantInvitation>
     */
    public function scopePending(Builder $query): Builder
    {
        return $query
            ->whereNull('accepted_at')
            ->where('expires_at', '>', now());
    }
}
