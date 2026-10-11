<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\TenantDomain;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantCustomDomainRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_profile_redirects_to_tenant_custom_domain_from_main_domain(): void
    {
        // 1. Buat tenant dengan domain pribadi (custom domain) di kolom domain dan relasi tenant_domains
        $tenant = Tenant::create([
            'name' => 'Bimbel Hebat Mandiri',
            'subdomain' => 'bimbelhebat',
            'domain' => 'cbt.bimbelhebat.sch.id',
            'plan' => 'whitelabel',
        ]);

        TenantDomain::create([
            'tenant_id' => $tenant->id,
            'domain' => 'cbt.bimbelhebat.sch.id',
            'is_primary' => true,
            'is_verified' => true,
        ]);

        // 2. Buat murid di tenant tersebut
        $student = User::factory()->create([
            'username' => 'murid_hebat',
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        // Verifikasi helper method Tenant
        $this->assertEquals('cbt.bimbelhebat.sch.id', $tenant->getPrimaryCustomDomain());
        $this->assertEquals('cbt.bimbelhebat.sch.id', $tenant->getPrimaryHost());

        // 3. Mengunjungi profil dari domain utama (localhost:8000) harus redirect ke domain pribadi tenant
        $responseGlobal = $this->get('http://localhost:8000/@murid_hebat');
        $responseGlobal->assertRedirect('http://cbt.bimbelhebat.sch.id:8000/@murid_hebat');

        // 4. Mengunjungi profil dari subdomain tenant (bimbelhebat.localhost:8000) harus redirect ke domain pribadi tenant
        $responseSubdomain = $this->get('http://bimbelhebat.localhost:8000/@murid_hebat');
        $responseSubdomain->assertRedirect('http://cbt.bimbelhebat.sch.id:8000/@murid_hebat');

        // 5. Mengunjungi profil dari tenant lain harus redirect ke domain pribadi tenant milik murid
        $otherTenant = Tenant::create([
            'name' => 'Tenant Lain',
            'subdomain' => 'tenantlain',
            'plan' => 'gratis',
        ]);
        $responseOther = $this->get('http://tenantlain.localhost:8000/@murid_hebat');
        $responseOther->assertRedirect('http://cbt.bimbelhebat.sch.id:8000/@murid_hebat');

        // 6. Mengunjungi profil langsung pada domain pribadi tenant harus berhasil (200 OK)
        $responseCustomDomain = $this->get('http://cbt.bimbelhebat.sch.id:8000/@murid_hebat');
        $responseCustomDomain->assertOk();
        $responseCustomDomain->assertSee('murid_hebat');
    }

    public function test_student_dashboard_and_profile_edit_redirect_to_custom_domain(): void
    {
        $tenant = Tenant::create([
            'name' => 'Akademi Prestasi',
            'subdomain' => 'prestasi',
            'domain' => 'ujian.prestasi.ac.id',
            'plan' => 'whitelabel',
        ]);

        TenantDomain::create([
            'tenant_id' => $tenant->id,
            'domain' => 'ujian.prestasi.ac.id',
            'is_primary' => true,
            'is_verified' => true,
        ]);

        $student = User::factory()->create([
            'username' => 'siswa_prestasi',
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        // 1. Mengunjungi /dashboard dari domain utama harus redirect ke portal domain pribadi
        $responseDashboard = $this->actingAs($student)->get('http://localhost:8000/dashboard');
        $responseDashboard->assertRedirect('http://ujian.prestasi.ac.id:8000');

        // 2. Mengunjungi /profile dari domain utama harus redirect ke profil murid di domain pribadi
        $responseProfile = $this->actingAs($student)->get('http://localhost:8000/profile');
        $responseProfile->assertRedirect('http://ujian.prestasi.ac.id:8000/@siswa_prestasi');

        // 3. Mengunjungi root portal pada custom domain harus menampilkan portal tenant (200 OK)
        $responseRoot = $this->get('http://ujian.prestasi.ac.id:8000/');
        $responseRoot->assertOk();
        $responseRoot->assertSee('Akademi Prestasi');
    }
}
