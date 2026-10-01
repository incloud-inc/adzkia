<?php

namespace App\Models\Scopes;

use App\Models\Assessment;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (Auth::hasUser() && Auth::user()->current_tenant_id) {
            $tenantId = Auth::user()->current_tenant_id;

            if (get_class($model) === Assessment::class) {
                $builder->where(function ($query) use ($model, $tenantId) {
                    // 1. Asesmen milik tenant sendiri
                    $query->where($model->getTable().'.tenant_id', '=', $tenantId);

                    // 2. Asesmen dari Owner (Adzkia)
                    $tenant = Tenant::find($tenantId);
                    if ($tenant) {
                        $query->orWhere(function ($q) use ($model, $tenant) {
                            $q->where(function ($subQ) use ($model) {
                                $subQ->where($model->getTable().'.is_mandatory', true)
                                    ->orWhere($model->getTable().'.is_global', true)
                                    ->orWhereNull($model->getTable().'.tenant_id')
                                    ->orWhere(function ($ownerQ) use ($model) {
                                        $ownerQ->where($model->getTable().'.tenant_id', 1)
                                            ->whereRaw('EXISTS (SELECT 1 FROM tenant_user WHERE tenant_user.tenant_id = 1 AND tenant_user.role = \'S\')');
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
                $tenant = Tenant::find($tenantId);
                if ($tenant) {
                    $showSd = $tenant->showGrade('sd');
                    $showSmp = $tenant->showGrade('smp');
                    $showSma = $tenant->showGrade('sma');

                    if (! $showSd || ! $showSmp || ! $showSma) {
                        $builder->where(function ($q) use ($model, $showSd, $showSmp, $showSma) {
                            $gradeCol = $model->getTable().'.grade_level';

                            // Tampilkan jika grade kosong (UMUM) atau Umum / Custom
                            $q->whereNull($gradeCol)
                                ->orWhere($gradeCol, '')
                                ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%umum%']);

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
                                $q->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%sma%'])
                                    ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%smk%'])
                                    ->orWhereRaw("LOWER({$gradeCol}) LIKE ?", ['%ma%'])
                                    ->orWhereIn($gradeCol, ['10', '11', '12']);
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
