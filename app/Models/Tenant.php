<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cache;

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
        'status',
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
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (Tenant $tenant) {
            $tenant->setting()->firstOrCreate([], [
                'show_grade_sd' => true,
                'show_grade_smp' => true,
                'show_grade_sma' => true,
                'show_grade_tka_sd' => true,
                'show_grade_tka_smp' => true,
                'show_grade_tka_sma' => true,
                'show_grade_utbk' => true,
                'show_grade_skd' => true,
                'hide_adzkia_branding' => true,
            ]);
            $tenant->unsetRelation('setting');
        });

        static::saved(function (Tenant $tenant) {
            Cache::forget("tenant:model:{$tenant->id}");
            Cache::forget("tenant:slug:{$tenant->slug}");
            if (! empty($tenant->domain)) {
                Cache::forget("tenant:domain:{$tenant->domain}");
            }
            TenantScope::clearCache();

            // Sync legacy JSON settings to relational setting if provided in array
            if (is_array($tenant->settings) && ! empty($tenant->settings)) {
                $settings = $tenant->settings;
                $existing = $tenant->setting;

                $data = [
                    'extra_settings' => $settings,
                ];

                $booleanKeys = [
                    'show_grade_sd',
                    'show_grade_smp',
                    'show_grade_sma',
                    'show_grade_tka_sd',
                    'show_grade_tka_smp',
                    'show_grade_tka_sma',
                    'show_grade_utbk',
                    'show_grade_skd',
                    'hide_adzkia_branding',
                ];

                foreach ($booleanKeys as $key) {
                    if (array_key_exists($key, $settings)) {
                        $data[$key] = (bool) $settings[$key];
                    } elseif (! $existing) {
                        $data[$key] = true;
                    }
                }

                $stringKeys = [
                    'app_name',
                    'theme_color',
                    'theme_palette',
                    'sender_email',
                    'sender_name',
                    'certificate_title',
                    'certificate_subtitle',
                ];

                foreach ($stringKeys as $key) {
                    if (array_key_exists($key, $settings)) {
                        $data[$key] = $settings[$key];
                    }
                }

                if (array_key_exists('adzkia_assessments_enabled', $settings)) {
                    $data['adzkia_assessments_enabled'] = $settings['adzkia_assessments_enabled'];
                }

                $tenant->setting()->updateOrCreate([], $data);
                $tenant->unsetRelation('setting');
            }
        });

        static::deleted(function (Tenant $tenant) {
            Cache::forget("tenant:model:{$tenant->id}");
            Cache::forget("tenant:slug:{$tenant->slug}");
            if (! empty($tenant->domain)) {
                Cache::forget("tenant:domain:{$tenant->domain}");
            }
            TenantScope::clearCache();
        });
    }

    /**
     * Settings profile associated with this tenant.
     *
     * @return HasOne<TenantSetting, $this>
     */
    public function setting(): HasOne
    {
        return $this->hasOne(TenantSetting::class);
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

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    /* =========================================================================
     * TIER / LEVEL BISNIS
     * ========================================================================= */

    public function isStarter(): bool
    {
        return ! $this->isInactive() && (empty($this->plan) || $this->plan === 'gratis');
    }

    public function isPro(): bool
    {
        return ! $this->isInactive() && $this->plan === 'premium';
    }

    public function isEnterprise(): bool
    {
        return ! $this->isInactive() && ($this->plan === 'whitelabel' || $this->plan === 'enterprise');
    }

    public function isInactive(): bool
    {
        return ($this->status ?? 'active') === 'inactive' || in_array($this->plan, ['nonaktif', 'inactive'], true);
    }

    public function isActive(): bool
    {
        return ! $this->isInactive();
    }

    public function getLevelLabelAttribute(): string
    {
        if ($this->isInactive()) {
            return 'NONAKTIF';
        }

        return match ($this->plan) {
            'whitelabel', 'enterprise' => 'ENTERPRISE',
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
     * - NONAKTIF: 0%
     */
    public function getRevenueSharePlatformPct(): int
    {
        if ($this->isInactive()) {
            return 0;
        }

        return match ($this->plan) {
            'whitelabel', 'enterprise' => 25,
            'premium' => 50,
            default => 75,
        };
    }

    /**
     * Persentase bagi hasil untuk TENANT.
     * - STARTER: 25%
     * - PRO: 50%
     * - ENTERPRISE: 75%
     * - NONAKTIF: 0%
     */
    public function getRevenueShareTenantPct(): int
    {
        if ($this->isInactive()) {
            return 0;
        }

        return match ($this->plan) {
            'whitelabel', 'enterprise' => 75,
            'premium' => 50,
            default => 25,
        };
    }

    public function getRevenueShareRatioAttribute(): string
    {
        if ($this->isInactive()) {
            return '-';
        }

        return match ($this->plan) {
            'whitelabel', 'enterprise' => '25:75',
            'premium' => '50:50',
            default => '75:25',
        };
    }

    /* =========================================================================
     * ATURAN & HAK KELOLA ASESMEN DAN STUDIO AI
     * ========================================================================= */

    /**
     * Fasilitas pembuatan asesmen mandiri HANYA untuk Level ENTERPRISE.
     * Level STARTER dan PRO berfokus pada Pengawasan Ujian kurasi ADZKIA.
     */
    public function canCreateAssessments(): bool
    {
        return $this->isEnterprise();
    }

    /**
     * Fasilitas Studio Pembuat Soal AI (DeepSeek Engine) HANYA untuk Level ENTERPRISE.
     */
    public function canAccessStudioAi(): bool
    {
        return $this->isEnterprise();
    }

    /**
     * Hanya Level 3 (Enterprise) yang bisa ON/OFF katalog asesmen ADZKIA.
     */
    public function canToggleAdzkiaAssessments(): bool
    {
        return $this->isEnterprise();
    }

    /**
     * Fasilitas pembuatan kupon diskon murid HANYA untuk Level ENTERPRISE.
     * Biaya diskon ditanggung sepenuhnya oleh tenant (mengurangi jatah bagi hasil tenant).
     */
    public function canManageCoupons(): bool
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
        $isUmum = empty($grade) || str_contains($grade, 'UMUM') || str_contains($grade, 'PRO') || $assessment->type === 'custom' || $assessment->type === 'umum';

        if (! $isUmum) {
            $isSd = str_contains($grade, 'SD') || str_contains($grade, 'MI') || in_array($grade, ['1', '2', '3', '4', '5', '6']);
            $isSmp = str_contains($grade, 'SMP') || str_contains($grade, 'MTS') || in_array($grade, ['7', '8', '9']);
            $isSma = str_contains($grade, 'SMA') || str_contains($grade, 'SMK') || str_contains($grade, 'MA') || in_array($grade, ['10', '11', '12']);

            if ($isSd && ! $this->showGrade('sd')) {
                return false;
            }
            if ($isSmp && ! $this->showGrade('smp')) {
                return false;
            }
            if ($isSma && ! $this->showGrade('sma')) {
                return false;
            }

            if ($assessment->type === 'tka') {
                if ($isSd && ! $this->showGrade('tka_sd')) {
                    return false;
                }
                if ($isSmp && ! $this->showGrade('tka_smp')) {
                    return false;
                }
                if (($isSma || empty($grade)) && ! $this->showGrade('tka_sma')) {
                    return false;
                }
            }

            if ($assessment->type === 'utbk' && ! $this->showGrade('utbk')) {
                return false;
            }

            if ($assessment->type === 'skd' && ! $this->showGrade('skd')) {
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

    /**
     * Dapatkan domain pribadi (custom domain) utama tenant jika ada.
     */
    public function getPrimaryCustomDomain(): ?string
    {
        if (! $this->allowsCustomDomain()) {
            return null;
        }

        // 1. Cek dari domain primer terverifikasi di relasi domains
        $customDomain = $this->domains()
            ->where('is_primary', true)
            ->where('is_verified', true)
            ->value('domain');

        if ($customDomain) {
            return $customDomain;
        }

        // 2. Cek dari domain primer di relasi domains (tanpa filter is_verified)
        $primaryDomain = $this->domains()
            ->where('is_primary', true)
            ->value('domain');

        if ($primaryDomain) {
            return $primaryDomain;
        }

        // 3. Fallback ke relasi domains terverifikasi apapun
        $verifiedDomain = $this->domains()
            ->where('is_verified', true)
            ->value('domain');

        if ($verifiedDomain) {
            return $verifiedDomain;
        }

        // 4. Fallback ke relasi domains apapun
        $anyDomain = $this->domains()
            ->value('domain');

        if ($anyDomain) {
            return $anyDomain;
        }

        // 5. Fallback ke kolom domain pada tabel tenants
        if (! empty($this->domain)) {
            return $this->domain;
        }

        return null;
    }

    /**
     * Dapatkan host utama tenant (domain pribadi jika ada, atau {subdomain}.{baseDomain}).
     */
    public function getPrimaryHost(): ?string
    {
        $customDomain = $this->getPrimaryCustomDomain();
        if ($customDomain) {
            return $customDomain;
        }

        if ($this->subdomain) {
            $baseDomain = config('app.url_base_domain', 'localhost');

            return "{$this->subdomain}.{$baseDomain}";
        }

        return null;
    }

    /**
     * Dapatkan URL portal lengkap untuk tenant (memperhitungkan domain pribadi / subdomain dan port).
     */
    public function getPortalUrl(): string
    {
        $scheme = request()->getScheme() ?: 'http';
        $port = (request()->getPort() && request()->getPort() != 80 && request()->getPort() != 443) ? ':'.request()->getPort() : '';
        $host = $this->getPrimaryHost() ?: config('app.url_base_domain', 'localhost');

        return "{$scheme}://{$host}{$port}";
    }

    /**
     * Dapatkan URL profil murid lengkap untuk tenant (memperhitungkan domain pribadi / subdomain dan port).
     */
    public function getStudentProfileUrl(string $username): string
    {
        return rtrim($this->getPortalUrl(), '/')."/@{$username}";
    }

    /**
     * Hasilkan URL transfer SSO berpenandatangan aman untuk berpindah ke domain pribadi tanpa login ulang.
     */
    public function generateSsoLoginUrl(User $user, string $redirect = '/'): string
    {
        $expires = now()->addMinutes(3)->timestamp;
        $portalUrl = rtrim($this->getPortalUrl(), '/');
        $signature = hash_hmac('sha256', "{$user->id}:{$this->id}:{$expires}", (string) config('app.key'));

        $query = http_build_query([
            'user_id' => $user->id,
            'expires' => $expires,
            'signature' => $signature,
            'redirect' => $redirect,
        ]);

        return "{$portalUrl}/sso/verify?{$query}";
    }

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

        if ($this->relationLoaded('setting') && $this->setting) {
            return (bool) $this->setting->hide_adzkia_branding;
        }

        if ($this->setting) {
            return (bool) $this->setting->hide_adzkia_branding;
        }

        return (bool) ($this->settings['hide_adzkia_branding'] ?? true);
    }

    public function showsPoweredByAdzkia(): bool
    {
        return ! $this->isWhiteLabel();
    }

    public function getAppNameAttribute(): string
    {
        if ($this->isEnterprise()) {
            if ($this->relationLoaded('setting') && $this->setting && ! empty($this->setting->app_name)) {
                return $this->setting->app_name;
            }
            if ($this->setting && ! empty($this->setting->app_name)) {
                return $this->setting->app_name;
            }
            if (! empty($this->settings['app_name'])) {
                return $this->settings['app_name'];
            }
        }

        return $this->name;
    }

    public function getThemeColorAttribute(): string
    {
        if ($this->isEnterprise()) {
            if ($this->relationLoaded('setting') && $this->setting && ! empty($this->setting->theme_color)) {
                return $this->setting->theme_color;
            }
            if ($this->setting && ! empty($this->setting->theme_color)) {
                return $this->setting->theme_color;
            }
            if (! empty($this->settings['theme_color'])) {
                return $this->settings['theme_color'];
            }
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
     * Dapatkan palet tema warna Open Color tenant (default 'light').
     */
    public function getThemePalette(): string
    {
        if ($this->relationLoaded('setting') && $this->setting && ! empty($this->setting->theme_palette)) {
            return $this->setting->theme_palette;
        }
        if ($this->setting && ! empty($this->setting->theme_palette)) {
            return $this->setting->theme_palette;
        }

        return $this->settings['theme_palette'] ?? 'light';
    }

    /**
     * Dapatkan daftar jenjang resmi sekolah tenant (minimal 1, default checklist semua: ['sma', 'smp', 'sd']).
     *
     * @return array<int, string>
     */
    public function getSchoolGrades(): array
    {
        $grades = $this->settings['school_grades'] ?? null;
        if (is_array($grades) && ! empty($grades)) {
            return array_values($grades);
        }

        if (! empty($this->settings['school_grade'])) {
            return [(string) $this->settings['school_grade']];
        }

        // Default: checklist semua jenjang aktif
        return ['sma', 'smp', 'sd'];
    }

    /**
     * Helper kompatibilitas untuk jenjang pertama/aktif utama ('sma', 'smp', 'sd').
     */
    public function getSchoolGrade(): string
    {
        $grades = $this->getSchoolGrades();

        return $grades[0] ?? 'sma';
    }

    /**
     * Dapatkan daftar grup PRO aktif tenant (minimal 3 item).
     *
     * @return array<int, string>
     */
    public function getProGroups(): array
    {
        $groups = $this->settings['pro_groups'] ?? [];
        if (! is_array($groups) || count($groups) < 3) {
            return ['PRO', 'UTBK', 'SKD', 'TKASD', 'TKASMP', 'TKASMA'];
        }

        // Jika tersimpan format lama bertipe pro_kelas_*, petakan ke master kelas
        $hasLegacyKey = false;
        foreach ($groups as $g) {
            if (str_starts_with($g, 'pro_')) {
                $hasLegacyKey = true;
                break;
            }
        }

        if ($hasLegacyKey) {
            return ['PRO', 'UTBK', 'SKD', 'TKASD', 'TKASMP', 'TKASMA'];
        }

        return $groups;
    }

    /**
     * Check whether an assessment grade group (SD, SMP, SMA) is enabled.
     */
    public function showGrade(string $grade): bool
    {
        if ($this->relationLoaded('setting') && $this->setting) {
            return $this->setting->showGrade($grade);
        }

        if ($this->setting) {
            return $this->setting->showGrade($grade);
        }

        $settings = $this->settings ?? [];
        $lower = strtolower(str_replace('_', '', $grade));
        $key = 'show_grade_'.strtolower($grade);

        if (isset($settings[$key])) {
            return (bool) $settings[$key];
        }

        $allGrades = array_merge((array) $this->getSchoolGrades(), (array) $this->getProGroups());
        $activeGrades = array_map(fn ($g) => strtolower(str_replace('_', '', (string) $g)), $allGrades);

        return in_array($lower, $activeGrades, true);
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
                asset('adzkia black app.png')
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
