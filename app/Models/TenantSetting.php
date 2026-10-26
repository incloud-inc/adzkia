<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class TenantSetting extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tenant_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tenant_id',
        'show_grade_sd',
        'show_grade_smp',
        'show_grade_sma',
        'show_grade_tka_sd',
        'show_grade_tka_smp',
        'show_grade_tka_sma',
        'show_grade_utbk',
        'show_grade_skd',
        'hide_adzkia_branding',
        'app_name',
        'theme_color',
        'theme_palette',
        'sender_email',
        'sender_name',
        'certificate_title',
        'certificate_subtitle',
        'adzkia_assessments_enabled',
        'extra_settings',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'show_grade_sd' => 'boolean',
            'show_grade_smp' => 'boolean',
            'show_grade_sma' => 'boolean',
            'show_grade_tka_sd' => 'boolean',
            'show_grade_tka_smp' => 'boolean',
            'show_grade_tka_sma' => 'boolean',
            'show_grade_utbk' => 'boolean',
            'show_grade_skd' => 'boolean',
            'hide_adzkia_branding' => 'boolean',
            'adzkia_assessments_enabled' => 'array',
            'extra_settings' => 'array',
        ];
    }

    /**
     * Boot the model. Automatically flush distributed cache on change.
     */
    protected static function booted(): void
    {
        static::saved(function (TenantSetting $setting) {
            if ($setting->tenant_id) {
                Cache::forget("tenant:model:{$setting->tenant_id}");
                TenantScope::clearCache();
            }
        });

        static::deleted(function (TenantSetting $setting) {
            if ($setting->tenant_id) {
                Cache::forget("tenant:model:{$setting->tenant_id}");
                TenantScope::clearCache();
            }
        });
    }

    /**
     * The tenant that owns the settings.
     *
     * @return BelongsTo<Tenant, $this>
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * Check whether an assessment grade group (SD, SMP, SMA, etc.) is enabled.
     */
    public function showGrade(string $grade): bool
    {
        $normalized = strtolower(trim($grade));
        $prop = 'show_grade_'.$normalized;

        if (array_key_exists($prop, $this->attributes)) {
            return (bool) $this->{$prop};
        }

        // Special handling for legacy aliases if any
        $cleaned = str_replace('_', '', $normalized);
        foreach (['sd', 'smp', 'sma', 'tkasd', 'tkasmp', 'tkasma', 'utbk', 'skd'] as $known) {
            if ($cleaned === $known) {
                $candidate = match ($known) {
                    'tkasd' => 'show_grade_tka_sd',
                    'tkasmp' => 'show_grade_tka_smp',
                    'tkasma' => 'show_grade_tka_sma',
                    default => 'show_grade_'.$known,
                };
                if (array_key_exists($candidate, $this->attributes)) {
                    return (bool) $this->{$candidate};
                }
            }
        }

        return true;
    }
}
