<?php

namespace App\Models;

use App\Models\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;

#[ScopedBy([TenantScope::class])]
class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'subject_id',
        'created_by',
        'title',
        'type',
        'grade_level',
        'description',
        'duration_minutes',
        'max_attempts',
        'access_validity_days',
        'scoring_type',
        'status',
        'is_mandatory',
        'is_global',
        'settings',
        'price_type',
        'price',
        'revenue_share_tenant_pct',
        'revenue_share_platform_pct',
    ];

    protected function casts(): array
    {
        return [
            'settings' => 'array',
            'duration_minutes' => 'integer',
            'max_attempts' => 'integer',
            'access_validity_days' => 'integer',
            'is_mandatory' => 'boolean',
            'is_global' => 'boolean',
            'price' => 'decimal:2',
            'revenue_share_tenant_pct' => 'integer',
            'revenue_share_platform_pct' => 'integer',
        ];
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function sections(): HasMany
    {
        return $this->hasMany(AssessmentSection::class)->orderBy('order');
    }

    public function packages(): HasMany
    {
        return $this->hasMany(AssessmentPackage::class)->orderBy('sort_order');
    }

    public function accesses(): HasMany
    {
        return $this->hasMany(UserAssessmentAccess::class);
    }

    public function questions(): HasManyThrough
    {
        return $this->hasManyThrough(Question::class, AssessmentSection::class);
    }

    public function examSessions(): HasMany
    {
        return $this->hasMany(ExamSession::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Scope untuk asesmen wajib tayang nasional dari Owner.
     */
    public function scopeMandatory(Builder $query): Builder
    {
        return $query->where('is_mandatory', true);
    }

    /**
     * Scope untuk asesmen kurasi platform ADZKIA.
     */
    public function scopeGlobalAdzkia(Builder $query): Builder
    {
        return $query->where('is_global', true);
    }

    /**
     * Ambil asesmen dan kelompokkan ke UMUM (Card 4), SD, SMP, SMA.
     *
     * @return array{umum: Collection, sd: Collection, smp: Collection, sma: Collection}
     */
    public static function getGroupedAssessments(?Tenant $tenant = null): array
    {
        try {
            $query = self::withoutGlobalScopes()
                ->whereIn('status', ['published', 'active'])
                ->with(['subject'])
                ->withCount(['sections', 'questions'])
                ->orderBy('id', 'desc');

            $all = $query->get();
        } catch (\Throwable $e) {
            $all = collect();
        }

        // Terapkan filter visibilitas jika ada tenant tertentu (khusus Level 3 Enterprise ON/OFF, kecuali is_mandatory)
        if ($tenant) {
            $all = $all->filter(fn ($item) => $tenant->isAssessmentVisible($item));
        }

        $formatItem = function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'subject' => $item->subject?->name ?? 'Umum',
                'grade_level' => $item->grade_level ?: 'Umum',
                'sections_count' => (int) ($item->sections_count ?? 1),
                'questions_count' => (int) ($item->questions_count ?? 20),
                'duration_minutes' => (int) ($item->duration_minutes ?? 60),
                'is_mandatory' => (bool) $item->is_mandatory,
                'is_global' => (bool) $item->is_global,
                'url' => route('assessments.show', $item->id),
            ];
        };

        // 1. Asesmen UMUM
        $umum = $all->filter(function ($item) {
            $grade = trim((string) $item->grade_level);

            return empty($grade) || stripos($grade, 'umum') !== false || $item->type === 'custom' || $item->type === 'umum';
        });

        if ($umum->isEmpty()) {
            $umum = $all->take(6);
        }

        // 2. Asesmen SD
        $sd = $all->filter(function ($item) {
            $grade = strtoupper((string) $item->grade_level);

            return str_contains($grade, 'SD') || str_contains($grade, 'MI') || in_array($grade, ['1', '2', '3', '4', '5', '6']);
        });

        // 3. Asesmen SMP
        $smp = $all->filter(function ($item) {
            $grade = strtoupper((string) $item->grade_level);

            return str_contains($grade, 'SMP') || str_contains($grade, 'MTS') || in_array($grade, ['7', '8', '9']);
        });

        // 4. Asesmen SMA
        $sma = $all->filter(function ($item) {
            $grade = strtoupper((string) $item->grade_level);

            return str_contains($grade, 'SMA') || str_contains($grade, 'SMK') || str_contains($grade, 'MA') || in_array($grade, ['10', '11', '12']) || $item->type === 'utbk' || $item->type === 'tka';
        });

        return [
            'umum' => $umum->values(),
            'sd' => $sd->map($formatItem)->values(),
            'smp' => $smp->map($formatItem)->values(),
            'sma' => $sma->map($formatItem)->values(),
        ];
    }
}
