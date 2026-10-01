<?php

namespace App\Models;

use Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    /** @use HasFactory<TenantFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'subdomain',
        'domain',
        'plan',
        'tagline',
        'logo_path',
        'favicon_path',
        'cover_photo_path',
        'settings',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'settings' => 'array',
        ];
    }

    /**
     * Domains associated with this tenant.
     *
     * @return HasMany<TenantDomain, $this>
     */
    public function domains(): HasMany
    {
        return $this->hasMany(TenantDomain::class);
    }

    /**
     * Exam sessions associated with this tenant.
     *
     * @return HasMany<ExamSession, $this>
     */
    public function examSessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(TenantWallet::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function payoutRequests(): HasMany
    {
        return $this->hasMany(PayoutRequest::class);
    }

    /* =========================================================================
     * TIER / LEVEL BISNIS
     * ========================================================================= */

    public function isStarter(): bool
    {
        return empty($this->plan) || $this->plan === 'gratis';
    }

    public function isPro(): bool
    {
        return $this->plan === 'premium';
    }

    public function isEnterprise(): bool
    {
        return $this->plan === 'whitelabel';
    }

    public function getLevelLabelAttribute(): string
    {
        return match ($this->plan) {
            'whitelabel' => 'ENTERPRISE',
            'premium' => 'PRO',
            default => 'STARTER',
        };
    }

    /* =========================================================================
     * SKEMA BAGI HASIL (REVENUE SHARE) ADZKIA : TENANT
     * ========================================================================= */

    /**
     * Persentase bagi hasil untuk Platform ADZKIA.
     * - STARTER: 75%
     * - PRO: 50%
     * - ENTERPRISE: 25%
     */
    public function getRevenueSharePlatformPct(): int
    {
        return match ($this->plan) {
            'whitelabel' => 25,
            'premium' => 50,
            default => 75,
        };
    }

    /**
     * Persentase bagi hasil untuk TENANT.
     * - STARTER: 25%
     * - PRO: 50%
     * - ENTERPRISE: 75%
     */
    public function getRevenueShareTenantPct(): int
    {
        return match ($this->plan) {
            'whitelabel' => 75,
            'premium' => 50,
            default => 25,
        };
    }

    public function getRevenueShareRatioAttribute(): string
    {
        return match ($this->plan) {
            'whitelabel' => '25:75',
            'premium' => '50:50',
            default => '75:25',
        };
    }

    /* =========================================================================
     * ATURAN & HAK KELOLA ASESMEN
     * ========================================================================= */

    /**
     * Level 1 (Starter) TIDAK BISA membuat asesmen sendiri.
     * Level 2 (Pro) dan Level 3 (Enterprise) BISA membuat asesmen sendiri.
     */
    public function canCreateAssessments(): bool
    {
        return $this->isPro() || $this->isEnterprise();
    }

    /**
     * Hanya Level 3 (Enterprise) yang bisa ON/OFF katalog asesmen ADZKIA.
     */
    public function canToggleAdzkiaAssessments(): bool
    {
        return $this->isEnterprise();
    }

    /**
     * Cek apakah asesmen tertentu boleh tayang di portal tenant.
     * Sesuai checklist jenjang yang dipilih di branding (SD, SMP, SMA).
     */
    public function isAssessmentVisible(Assessment $assessment): bool
    {
        // Asesmen milik tenant sendiri selalu terlihat
        if ($assessment->tenant_id === $this->id) {
            return true;
        }

        // Cek filter jenjang dari checklist branding tenant
        $grade = strtoupper(trim((string) $assessment->grade_level));
        $isUmum = empty($grade) || str_contains($grade, 'UMUM') || $assessment->type === 'custom' || $assessment->type === 'umum';

        if (! $isUmum) {
            $isSd = str_contains($grade, 'SD') || str_contains($grade, 'MI') || in_array($grade, ['1', '2', '3', '4', '5', '6']);
            $isSmp = str_contains($grade, 'SMP') || str_contains($grade, 'MTS') || in_array($grade, ['7', '8', '9']);
            $isSma = str_contains($grade, 'SMA') || str_contains($grade, 'SMK') || str_contains($grade, 'MA') || in_array($grade, ['10', '11', '12']) || $assessment->type === 'utbk' || $assessment->type === 'tka';

            if ($isSd && ! $this->showGrade('sd')) {
                return false;
            }
            if ($isSmp && ! $this->showGrade('smp')) {
                return false;
            }
            if ($isSma && ! $this->showGrade('sma')) {
                return false;
            }
        }

        // Asesmen Wajib dari Owner ADZKIA tampil jika jenjangnya aktif
        if ($assessment->is_mandatory) {
            return true;
        }

        // Jika Enterprise dan ada setting toggle custom
        if ($this->isEnterprise()) {
            $enabledMap = $this->settings['adzkia_assessments_enabled'] ?? [];
            if (isset($enabledMap[$assessment->id])) {
                return (bool) $enabledMap[$assessment->id];
            }
        }

        // Default tampil untuk Starter & Pro jika jenjangnya aktif
        return true;
    }

    /* =========================================================================
     * CUSTOM DOMAIN & WHITE LABEL
     * ========================================================================= */

    public function allowsCustomDomain(): bool
    {
        return $this->isPro() || $this->isEnterprise();
    }

    public function allowsMultipleCustomDomains(): bool
    {
        return $this->isEnterprise();
    }

    public function isWhiteLabel(): bool
    {
        if (! $this->isEnterprise()) {
            return false;
        }

        return (bool) ($this->settings['hide_adzkia_branding'] ?? true);
    }

    public function showsPoweredByAdzkia(): bool
    {
        return ! $this->isWhiteLabel();
    }

    public function getAppNameAttribute(): string
    {
        if ($this->isEnterprise() && ! empty($this->settings['app_name'])) {
            return $this->settings['app_name'];
        }

        return $this->name;
    }

    public function getThemeColorAttribute(): string
    {
        if ($this->isEnterprise() && ! empty($this->settings['theme_color'])) {
            return $this->settings['theme_color'];
        }

        return '#0284c7';
    }

    public function getSenderEmailConfig(): array
    {
        if ($this->isEnterprise() && ! empty($this->settings['sender_email'])) {
            return [
                'email' => $this->settings['sender_email'],
                'name' => $this->settings['sender_name'] ?? $this->app_name,
            ];
        }

        return [
            'email' => config('mail.from.address', 'noreply@adzkia.id'),
            'name' => config('mail.from.name', 'ADZKIA'),
        ];
    }

    public function getCertificateConfig(): array
    {
        return [
            'title' => $this->settings['certificate_title'] ?? ('Sertifikat Kelulusan '.$this->name),
            'subtitle' => $this->settings['certificate_subtitle'] ?? 'Diterbitkan resmi oleh institusi',
            'show_adzkia_logo' => ! $this->isWhiteLabel(),
        ];
    }

    /**
     * Check whether an assessment grade group (SD, SMP, SMA) is enabled.
     */
    public function showGrade(string $grade): bool
    {
        $settings = $this->settings ?? [];
        $key = 'show_grade_'.strtolower($grade);

        return isset($settings[$key]) ? (bool) $settings[$key] : true;
    }

    /**
     * Get the users that belong to this tenant.
     *
     * @return BelongsToMany<User, $this>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    /**
     * Get the assessments that belong to this tenant.
     *
     * @return HasMany<Assessment, $this>
     */
    public function assessments(): HasMany
    {
        return $this->hasMany(Assessment::class);
    }

    /**
     * Get the URL to the tenant's logo.
     */
    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => User::getStorageUrl(
                $this->logo_path,
                'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=10B981&background=D1FAE5'
            )
        );
    }

    /**
     * Get the URL to the tenant's favicon.
     */
    protected function faviconUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => User::getStorageUrl(
                $this->favicon_path,
                asset('favicon.ico')
            )
        );
    }

    /**
     * Get the URL to the tenant's cover photo.
     */
    protected function coverPhotoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => User::getStorageUrl(
                $this->cover_photo_path,
                'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2000'
            )
        );
    }
}
