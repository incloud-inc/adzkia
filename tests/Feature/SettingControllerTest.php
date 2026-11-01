<?php

namespace Tests\Feature;

use App\Models\SystemSetting;
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
        $response->assertSeeText('Pengaturan Sistem, Storage & Gerbang Pembayaran');
        $response->assertSeeText('Tripay');
        $response->assertSeeText('Duitku');
        $response->assertSeeText('Midtrans');
        $response->assertSeeText('Google OAuth & SSO');
    }

    public function test_super_user_can_update_gateway_to_midtrans(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $owner = User::factory()->create();
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($owner)->post(route('settings.update'), [
            'payment_driver' => 'midtrans',
            'upload_disk' => 'r2',
            'midtrans_server_key' => 'SB-Mid-server-test12345',
            'midtrans_client_key' => 'SB-Mid-client-test12345',
            'midtrans_merchant_id' => 'G123456789',
            'midtrans_sandbox' => '1',
        ]);

        $response->assertRedirect(route('settings.index').'#storage');
        $response->assertSessionHas('success');
    }

    public function test_super_user_can_update_google_oauth_credentials(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $owner = User::factory()->create();
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($owner)->post(route('settings.update'), [
            'payment_driver' => 'tripay',
            'upload_disk' => 'r2',
            'active_tab' => 'auth',
            'google_client_id' => '12345-test.apps.googleusercontent.com',
            'google_client_secret' => 'GOCSPX-secret123',
            'google_redirect_uri' => 'https://adzkia.id/auth/google/callback',
        ]);

        $response->assertRedirect(route('settings.index').'#auth');
        $response->assertSessionHas('success');
        $this->assertSame('12345-test.apps.googleusercontent.com', SystemSetting::get('GOOGLE_CLIENT_ID'));
        $this->assertSame('GOCSPX-secret123', SystemSetting::get('GOOGLE_CLIENT_SECRET'));
        $this->assertSame('https://adzkia.id/auth/google/callback', SystemSetting::get('GOOGLE_REDIRECT_URI'));
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
