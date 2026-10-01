<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenantDomain extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'domain',
        'is_primary',
        'is_verified',
    ];

    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
            'is_verified' => 'boolean',
        ];
    }

    /**
     * Mutator to always store domain in lowercase and trimmed.
     */
    public function setDomainAttribute(string $value): void
    {
        $domain = strtolower(trim($value));
        // Remove scheme if entered
        $domain = preg_replace('#^https?://#i', '', $domain);
        // Remove path and trailing slash if entered
        $domain = explode('/', $domain)[0];

        $this->attributes['domain'] = $domain;
    }

    /**
     * Get the tenant that owns the domain.
     *
     * @return BelongsTo<Tenant, $this>
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
