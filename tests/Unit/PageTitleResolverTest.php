<?php

namespace Tests\Unit;

use App\Models\Tenant;
use App\Models\User;
use App\Support\PageTitleResolver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTitleResolverTest extends TestCase
{
    use RefreshDatabase;

    public function test_standard_tenant_appends_adzkia_suffix(): void
    {
        $tenant = Tenant::factory()->create([
            'plan' => 'gratis',
            'name' => 'Bimbel Hebat',
        ]);

        $title = PageTitleResolver::resolve('Katalog Asesmen', $tenant);

        $this->assertSame('Katalog Asesmen - ADZKIA', $title);
    }

    public function test_enterprise_tenant_removes_adzkia_suffix(): void
    {
        $tenant = Tenant::factory()->create([
            'plan' => 'whitelabel',
            'name' => 'Sekolah Internasional',
        ]);

        $title = PageTitleResolver::resolve('Katalog Asesmen', $tenant);

        $this->assertSame('Katalog Asesmen', $title);
    }

    public function test_student_under_enterprise_tenant_omits_adzkia_suffix(): void
    {
        $enterpriseTenant = Tenant::factory()->create([
            'plan' => 'whitelabel',
            'name' => 'SMA Taruna Nusantara',
        ]);

        $student = User::factory()->create([
            'current_tenant_id' => $enterpriseTenant->id,
        ]);
        $student->tenants()->attach($enterpriseTenant->id, ['role' => 'U']);

        $title = PageTitleResolver::resolve('Riwayat Ujian Siswa', null, $student);

        $this->assertSame('Riwayat Ujian Siswa', $title);
    }

    public function test_student_under_standard_tenant_keeps_adzkia_suffix(): void
    {
        $standardTenant = Tenant::factory()->create([
            'plan' => 'premium',
            'name' => 'Bimbel Mandiri',
        ]);

        $student = User::factory()->create([
            'current_tenant_id' => $standardTenant->id,
        ]);
        $student->tenants()->attach($standardTenant->id, ['role' => 'U']);

        $title = PageTitleResolver::resolve('Riwayat Ujian Siswa', null, $student);

        $this->assertSame('Riwayat Ujian Siswa - ADZKIA', $title);
    }

    public function test_strips_existing_laravel_or_adzkia_redundant_suffixes(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);

        $title = PageTitleResolver::resolve('Dashboard | Laravel', $tenant);
        $this->assertSame('Dashboard', $title);

        $title2 = PageTitleResolver::resolve('Dashboard - ADZKIA', $tenant);
        $this->assertSame('Dashboard', $title2);
    }
}
