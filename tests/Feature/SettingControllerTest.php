<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_user_can_access_settings_page(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $owner = User::factory()->create();
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($owner)->get(route('settings.index'));

        $response->assertOk();
        $response->assertSeeText('Pengaturan Sistem & Gerbang Pembayaran');
        $response->assertSeeText('Tripay Payment Gateway');
        $response->assertSeeText('Duitku Web API v2');
    }

    public function test_non_super_user_is_forbidden_from_settings_page(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'premium']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get(route('settings.index'));

        $response->assertForbidden();
    }
}
