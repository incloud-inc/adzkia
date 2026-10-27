<?php

namespace App\Models\Scopes;

use App\Models\Assessment;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class TenantScope implements Scope
{
    /**
     * In-memory cache to prevent redundant Tenant::find queries across multiple Eloquent executions.
     *
     * @var array<int, ?Tenant>
     */
    protected static array $tenantCache = [];

    /**
     * Clear the memoized tenant cache (useful for testing or tenant switching).
     */
    public static function clearCache(): void
    {
        static::$tenantCache = [];
    }

    /**
     * Resolve and memoize tenant instance with multi-layer distributed caching.
     * Layer 1: In-memory PHP request cache ($tenantCache) -> 0ms
     * Layer 2: Distributed Cache (Redis / Database / File via Cache facade) -> fast
     * Layer 3: Database query fallback with setting relation eager loaded
     */
    protected function resolveTenant(int $tenantId): ?Tenant
    {
        if (! array_key_exists($tenantId, static::$tenantCache)) {
            $cached = null;
            try {
                $cached = Cache::remember("tenant:model:{$tenantId}", 3600, function () use ($tenantId) {
                    return Tenant::with('setting')->find($tenantId);
                });
            } catch (\Throwable) {
                Cache::forget("tenant:model:{$tenantId}");
            }

            // Self-healing: jika cache mengembalikan __PHP_Incomplete_Class atau data korup
            if (! ($cached instanceof Tenant)) {
                Cache::forget("tenant:model:{$tenantId}");
                $cached = Tenant::with('setting')->find($tenantId);
            }

            static::$tenantCache[$tenantId] = $cached;
        }

        return static::$tenantCache[$tenantId];
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::hasUser() && Auth::user()->current_tenant_id) {
            $tenantId = (int) Auth::user()->current_tenant_id;

            if (get_class($model) === Assessment::class) {
                $tenant = $this->resolveTenant($tenantId);

                $builder->where(function ($query) use ($model, $tenantId, $tenant) {
                    // 1. Asesmen milik tenant sendiri
                    $query->where($model->getTable().'.tenant_id', '=', $tenantId);

                    // 2. Asesmen dari Owner (Adzkia)
                    if ($tenant) {
                        $query->orWhere(function ($q) use ($model, $tenant) {
                            $q->where(function ($subQ) use ($model) {
                                $subQ->where(function ($ownerQ) use ($model) {
                                    $ownerQ->whereNull($model->getTable().'.tenant_id')
                                        ->orWhere($model->getTable().'.tenant_id', 1)
                                        ->orWhereRaw('EXISTS (SELECT 1 FROM tenant_user WHERE tenant_user.tenant_id = '.$model->getTable().'.tenant_id AND tenant_user.role = \'S\')');
                                })->where(function ($mandQ) use ($model) {
                                    $mandQ->where($model->getTable().'.is_mandatory', true)
                                        ->orWhere($model->getTable().'.is_global', true);
                                });
                            });

                            // Jika Enterprise, filter by is_mandatory ATAU yang diaktifkan di settings
                            if ($tenant->isEnterprise()) {
                                $settings = $tenant->settings ?? [];
                                $enabledMap = $settings['adzkia_assessments_enabled'] ?? [];
                                $enabledIds = array_keys(array_filter($enabledMap));

                                $q->where(function ($sub) use ($model, $enabledIds) {
                                    $sub->where($model->getTable().'.is_mandatory', true)
                                        ->orWhereIn($model->getTable().'.id', $enabledIds);
                                });
                            }
                            // Starter & Pro otomatis mendapatkan semua asesmen Owner
                        });
                    }
                });

                // 3. Filter Jenjang berdasarkan Pengaturan Tenant (Bank Soal & Profile)
                if ($tenant) {
                    $showSd = $tenant->showGrade('sd');
                    $showSmp = $tenant->showGrade('smp');
                    $showSma = $tenant->showGrade('sma');
                    $showTkaSd = $tenant->showGrade('tka_sd');
                    $showTkaSmp = $tenant->showGrade('tka_smp');
                    $showTkaSma = $tenant->showGrade('tka_sma');
                    $showUtbk = $tenant->showGrade('utbk');
                    $showSkd = $tenant->showGrade('skd');

                    if (! $showSd || ! $showSmp || ! $showSma || ! $showTkaSd || ! $showTkaSmp || ! $showTkaSma || ! $showUtbk || ! $showSkd) {
                        $builder->where(function ($q) use ($model, $showSd, $showSmp, $showSma, $showTkaSd, $showTkaSmp, $showTkaSma, $showUtbk, $showSkd) {
                            $gradeCol = $model->getTable().'.grade_level';

                            // Tampilkan jika grade kosong (UMUM/PRO) atau Umum / Custom / PRO
                            $q->whereNull($gradeCol)
                                ->orWhere($gradeCol, '')
                                ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%umum%'])
                                ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%pro%']);

                            if ($showSd) {
                                $q->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%sd%'])
                                    ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%mi%'])
                                    ->orWhereIn($gradeCol, ['1', '2', '3', '4', '5', '6']);
                            }
                            if ($showSmp) {
                                $q->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%smp%'])
                                    ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%mts%'])
                                    ->orWhereIn($gradeCol, ['7', '8', '9']);
                            }
                            if ($showSma) {
                                $q->orWhere(function ($sq) use ($gradeCol) {
                                    $sq->whereNotIn('type', ['tka', 'utbk', 'skd'])
                                        ->where(function ($q2) use ($gradeCol) {
                                            $q2->whereRaw("LOWER({$gradeCol}) LIKE ?", ['%sma%'])
                                                ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%smk%'])
                                                ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%ma%'])
                                                ->orWhereIn($gradeCol, ['10', '11', '12']);
                                        });
                                });
                            }
                            if ($showTkaSd) {
                                $q->orWhere(function ($sq) use ($gradeCol) {
                                    $sq->where('type', 'tka')->whereRaw("LOWER({$gradeCol}) LIKE ?", ['%sd%']);
                                });
                            }
                            if ($showTkaSmp) {
                                $q->orWhere(function ($sq) use ($gradeCol) {
                                    $sq->where('type', 'tka')->whereRaw("LOWER({$gradeCol}) LIKE ?", ['%smp%']);
                                });
                            }
                            if ($showTkaSma) {
                                $q->orWhere(function ($sq) use ($gradeCol) {
                                    $sq->where('type', 'tka')->where(function ($q2) use ($gradeCol) {
                                        $q2->whereRaw("LOWER({$gradeCol}) LIKE ?", ['%sma%'])
                                            ->orWhereNull($gradeCol)
                                            ->orWhere($gradeCol, '');
                                    });
                                });
                            }
                            if ($showUtbk) {
                                $q->orWhere('type', 'utbk');
                            }
                            if ($showSkd) {
                                $q->orWhere('type', 'skd');
                            }
                        });
                    }
                }
            } else {
                $builder->where($model->getTable().'.tenant_id', '=', $tenantId);
            }
        }
    }
}
