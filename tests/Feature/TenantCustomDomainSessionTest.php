<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\TenantDomain;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantCustomDomainSessionTest extends TestCase
{
    use RefreshDatabase;

    public function test_session_cookie_domain_is_null_for_custom_domains_and_wildcard_for_subdomains(): void
    {
        // 1. Host subdomain localhost
        $this->get('http://dikdasmen.localhost:8000/');
        $this->assertEquals('.localhost', config('session.domain'));

        // 2. Host custom domain pribadi
        $this->get('http://cbt.bimbelhebat.sch.id:8000/');
        $this->assertNull(config('session.domain'));
    }

    public function test_sso_verify_logs_in_user_and_redirects_to_destination(): void
    {
        $tenant = Tenant::create([
            'name' => 'Bimbel Mandiri Hebat',
            'subdomain' => 'bimbelmandiri',
            'domain' => 'cbt.bimbelmandiri.sch.id',
            'plan' => 'whitelabel',
        ]);

        TenantDomain::create([
            'tenant_id' => $tenant->id,
            'domain' => 'cbt.bimbelmandiri.sch.id',
            'is_primary' => true,
            'is_verified' => true,
        ]);

        $student = User::factory()->create([
            'username' => 'budi_mandiri',
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        $ssoUrl = $tenant->generateSsoLoginUrl($student, '/dashboard');
        $this->assertStringContainsString('cbt.bimbelmandiri.sch.id', $ssoUrl);
        $this->assertStringContainsString('sso/verify', $ssoUrl);

        // Kunjungi URL SSO pada host custom domain
        $response = $this->get($ssoUrl);
        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($student);
    }

    public function test_sso_verify_rejects_tampered_signature(): void
    {
        $tenant = Tenant::create([
            'name' => 'Bimbel Mandiri Hebat',
            'subdomain' => 'bimbelmandiri',
            'domain' => 'cbt.bimbelmandiri.sch.id',
            'plan' => 'whitelabel',
        ]);

        $student = User::factory()->create([
            'username' => 'siswa_palsu',
        ]);

        $invalidUrl = "http://cbt.bimbelmandiri.sch.id:8000/sso/verify?user_id={$student->id}&expires=".(now()->addMinutes(5)->timestamp).'&signature=invalidsignature&redirect=/dashboard';

        $response = $this->get($invalidUrl);
        $response->assertRedirect('/login');
        $this->assertGuest();
    }
}
