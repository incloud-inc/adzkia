<?php

namespace Tests\Feature;

use App\Models\Assessment;
use App\Models\Scopes\TenantScope;
use App\Models\Tenant;
use App\Models\TenantSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TenantSettingsAndCacheTest extends TestCase
{
    use RefreshDatabase;

    public function test_tenant_settings_relation_created_and_synced(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'Sekolah Islam Terpadu',
            'subdomain' => 'sit-adzkia',
            'settings' => [
                'show_grade_sd' => true,
                'show_grade_smp' => false,
                'show_grade_sma' => true,
                'app_name' => 'SIT Portal',
                'theme_color' => '#10b981',
            ],
        ]);

        $this->assertDatabaseHas('tenant_settings', [
            'tenant_id' => $tenant->id,
            'show_grade_sd' => true,
            'show_grade_smp' => false,
            'show_grade_sma' => true,
            'app_name' => 'SIT Portal',
            'theme_color' => '#10b981',
        ]);

        $this->assertInstanceOf(TenantSetting::class, $tenant->setting);
        $this->assertTrue($tenant->showGrade('sd'));
        $this->assertFalse($tenant->showGrade('smp'));
        $this->assertTrue($tenant->showGrade('sma'));
    }

    public function test_updating_tenant_settings_relation_directly_updates_database_and_flushes_cache(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Cache Test School', 'subdomain' => 'cache-test']);

        // Prime cache
        Cache::put("tenant:model:{$tenant->id}", $tenant, 3600);
        $this->assertTrue(Cache::has("tenant:model:{$tenant->id}"));

        // Direct update to setting model
        $setting = $tenant->setting;
        $this->assertNotNull($setting);
        $setting->update([
            'show_grade_sd' => false,
            'app_name' => 'Direct Setting Name',
        ]);

        // Assert cache is invalidated
        $this->assertFalse(Cache::has("tenant:model:{$tenant->id}"));

        // Re-read tenant with fresh relation
        $freshTenant = $tenant->fresh('setting');
        $this->assertFalse($freshTenant->showGrade('sd'));
        $this->assertEquals('Direct Setting Name', $freshTenant->setting->app_name);
    }

    public function test_updating_tenant_model_invalidates_cache_and_syncs_settings(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Initial Tenant', 'subdomain' => 'initial-tenant']);

        // Prime cache
        Cache::put("tenant:model:{$tenant->id}", $tenant, 3600);
        $this->assertTrue(Cache::has("tenant:model:{$tenant->id}"));

        // Update tenant
        $tenant->update([
            'name' => 'Updated Tenant Name',
            'settings' => [
                'show_grade_sma' => false,
                'app_name' => 'New Branding Name',
            ],
        ]);

        // Cache must be evicted
        $this->assertFalse(Cache::has("tenant:model:{$tenant->id}"));

        // Database relation should be updated
        $this->assertDatabaseHas('tenant_settings', [
            'tenant_id' => $tenant->id,
            'show_grade_sma' => false,
            'app_name' => 'New Branding Name',
        ]);
    }

    public function test_tenant_scope_uses_multi_layer_caching(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Scoped Tenant', 'subdomain' => 'scoped-tenant']);
        $user = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $this->actingAs($user);

        // Clear in-memory and distributed cache
        TenantScope::clearCache();
        Cache::forget("tenant:model:{$tenant->id}");

        // Initial query: count queries
        DB::enableQueryLog();
        DB::flushQueryLog();

        Assessment::query()->get();

        $queriesAfterFirstRun = count(DB::getQueryLog());
        $this->assertTrue(Cache::has("tenant:model:{$tenant->id}"));

        // Second run: in-memory layer should prevent resolving tenant from DB
        DB::flushQueryLog();
        Assessment::query()->get();
        $queriesAfterSecondRun = count(DB::getQueryLog());

        // Second run must execute fewer or equal queries because tenant lookup was memoized
        $this->assertLessThanOrEqual($queriesAfterFirstRun, $queriesAfterSecondRun);

        DB::disableQueryLog();
    }

    public function test_tenant_grade_settings_filters_assessments_in_scope(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMA Only School', 'subdomain' => 'sma-only']);
        $tenant->setting()->updateOrCreate([], [
            'show_grade_sd' => false,
            'show_grade_smp' => false,
            'show_grade_sma' => true,
        ]);

        $user = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $user->tenants()->attach($tenant->id, ['role' => 'U']);

        $this->actingAs($user);
        TenantScope::clearCache();
        Cache::forget("tenant:model:{$tenant->id}");

        // Create assessments with different grades
        $sdAssessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian SD',
            'grade_level' => 'SD',
            'type' => 'pilihan_ganda',
        ]);

        $smaAssessment = Assessment::factory()->create([
            'tenant_id' => $tenant->id,
            'title' => 'Ujian SMA',
            'grade_level' => 'SMA',
            'type' => 'pilihan_ganda',
        ]);

        $assessments = Assessment::all();

        $this->assertTrue($assessments->contains('id', $smaAssessment->id));
        $this->assertFalse($assessments->contains('id', $sdAssessment->id));
    }
}
