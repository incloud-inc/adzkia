<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantLoginAndFaviconTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login header displays ADZKIA logo on left and tenant photo on right when on tenant portal.
     */
    public function test_login_header_displays_adzkia_logo_on_left_and_tenant_photo_on_right(): void
    {
        $tenant = Tenant::create([
            'name' => 'BIMBEL Juara Pintar',
            'subdomain' => 'juarapintar',
            'logo_path' => 'tenants/logos/juarapintar.png',
            'favicon_path' => 'tenants/favicons/juarapintar.ico',
        ]);

        // Kunjungi login dengan tenant context
        $response = $this->get('/login?tenant=juarapintar');

        $response->assertStatus(200);

        // Header kiri: Logo ADZKIA
        $response->assertSee('logo-adzkia.png');

        // Header kanan: Identitas Tenant (foto/logo profil tenant & nama)
        $response->assertSee('BIMBEL Juara Pintar');
        $response->assertSee('Portal Institusi');
    }

    /**
     * Test global login header displays ADZKIA logo on left and no tenant photo on right.
     */
    public function test_global_login_header_displays_adzkia_logo(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('logo-adzkia.png');
        $response->assertDontSee('Portal Institusi');
    }

    /**
     * Test Owner in platform-mode uses ADZKIA favicon, NOT tenant favicon.
     */
    public function test_owner_in_platform_mode_uses_adzkia_favicon(): void
    {
        // Buat tenant dengan custom favicon (misal Dikdasmen)
        $dikdasmen = Tenant::create([
            'name' => 'Dikdasmen Kemenag',
            'subdomain' => 'dikdasmen',
            'favicon_path' => 'tenants/favicons/dikdasmen.ico',
        ]);

        // Buat owner yang terafiliasi dengan Dikdasmen sebagai superuser (role S)
        $owner = User::factory()->create([
            'current_tenant_id' => null, // platform-mode (global overview)
        ]);
        $owner->tenants()->attach($dikdasmen->id, ['role' => 'S']);

        $response = $this->actingAs($owner)->get('/dashboard');

        $response->assertStatus(200);

        // Favicon harus ADZKIA ('adzkia black app.png'), TIDAK boleh Dikdasmen
        $response->assertSee('adzkia black app.png');
        $response->assertDontSee('tenants/favicons/dikdasmen.ico');
    }
}
