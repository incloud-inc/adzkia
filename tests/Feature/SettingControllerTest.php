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
        $response->assertSeeText('Midtrans Snap API');
        $response->assertSeeText('Redis Cache & Queue');
    }

    public function test_super_user_can_update_gateway_to_midtrans(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $owner = User::factory()->create();
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($owner)->post(route('settings.update'), [
            'payment_driver' => 'midtrans',
            'midtrans_server_key' => 'SB-Mid-server-test12345',
            'midtrans_client_key' => 'SB-Mid-client-test12345',
            'midtrans_merchant_id' => 'G123456789',
            'midtrans_sandbox' => '1',
        ]);

        $response->assertRedirect(route('settings.index'));
        $response->assertSessionHas('success');
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
