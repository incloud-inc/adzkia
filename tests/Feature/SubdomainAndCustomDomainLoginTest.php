<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\TenantDomain;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubdomainAndCustomDomainLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_subdomain_login_for_student_teacher_and_admin_routes_to_respective_dashboards(): void
    {
        $tenant = Tenant::create([
            'name' => 'SMKN 1 Cimahi',
            'subdomain' => 'smkn1',
            'plan' => 'premium',
        ]);

        $password = 'password123';

        // 1. Student
        $student = User::factory()->create([
            'name' => 'Budi Siswa',
            'email' => 'student@smkn1.test',
            'password' => bcrypt($password),
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        $responseStudent = $this->post('http://smkn1.localhost:8000/login', [
            'email' => 'student@smkn1.test',
            'password' => $password,
        ]);
        $responseStudent->assertRedirect('http://smkn1.localhost:8000/dashboard');

        $this->assertAuthenticatedAs($student);
        $this->assertEquals($tenant->id, $student->fresh()->current_tenant_id);
        $this->assertTrue($student->fresh()->isStudent());

        $dashStudent = $this->get('http://smkn1.localhost:8000/dashboard');
        $dashStudent->assertOk();
        $dashStudent->assertSee('Budi Siswa');
        $dashStudent->assertSee('SISWA TERDAFTAR');

        // Logout
        $this->post('http://smkn1.localhost:8000/logout');
        $this->assertGuest();

        // 2. Teacher
        $teacher = User::factory()->create([
            'name' => 'Pak Guru Bambang',
            'email' => 'teacher@smkn1.test',
            'password' => bcrypt($password),
        ]);
        $tenant->users()->attach($teacher->id, ['role' => 'T']);

        $responseTeacher = $this->post('http://smkn1.localhost:8000/login', [
            'email' => 'teacher@smkn1.test',
            'password' => $password,
        ]);
        $responseTeacher->assertRedirect('http://smkn1.localhost:8000/dashboard');

        $this->assertAuthenticatedAs($teacher);
        $this->assertEquals($tenant->id, $teacher->fresh()->current_tenant_id);
        $this->assertTrue($teacher->fresh()->isTeacher());

        $dashTeacher = $this->get('http://smkn1.localhost:8000/dashboard');
        $dashTeacher->assertOk();
        $dashTeacher->assertSee('Pak Guru Bambang');
        $dashTeacher->assertSee('TENAGA PENDIDIK');

        // Logout
        $this->post('http://smkn1.localhost:8000/logout');
        $this->assertGuest();

        // 3. Admin
        $admin = User::factory()->create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@smkn1.test',
            'password' => bcrypt($password),
        ]);
        $tenant->users()->attach($admin->id, ['role' => 'A']);

        $responseAdmin = $this->post('http://smkn1.localhost:8000/login', [
            'email' => 'admin@smkn1.test',
            'password' => $password,
        ]);
        $responseAdmin->assertRedirect('http://smkn1.localhost:8000/dashboard');

        $this->assertAuthenticatedAs($admin);
        $this->assertEquals($tenant->id, $admin->fresh()->current_tenant_id);
        $this->assertTrue($admin->fresh()->isAdmin());

        $dashAdmin = $this->get('http://smkn1.localhost:8000/dashboard');
        $dashAdmin->assertOk();
        $dashAdmin->assertSee('SMKN 1 Cimahi');
        $dashAdmin->assertSee('Dewan Guru');
    }

    public function test_custom_domain_login_for_student_teacher_and_admin_routes_to_respective_dashboards(): void
    {
        $tenant = Tenant::create([
            'name' => 'Bimbel Prestasi Unggul',
            'subdomain' => 'prestasiunggul',
            'domain' => 'cbt.prestasiunggul.sch.id',
            'plan' => 'whitelabel',
        ]);

        TenantDomain::create([
            'tenant_id' => $tenant->id,
            'domain' => 'cbt.prestasiunggul.sch.id',
            'is_primary' => true,
            'is_verified' => true,
        ]);

        $password = 'password123';

        // 1. Student on Custom Domain
        $student = User::factory()->create([
            'name' => 'Citra Siswi',
            'email' => 'citra@prestasiunggul.test',
            'password' => bcrypt($password),
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        $responseStudent = $this->post('http://cbt.prestasiunggul.sch.id:8000/login', [
            'email' => 'citra@prestasiunggul.test',
            'password' => $password,
        ]);
        $responseStudent->assertRedirect('http://cbt.prestasiunggul.sch.id:8000/dashboard');

        $this->assertAuthenticatedAs($student);
        $this->assertEquals($tenant->id, $student->fresh()->current_tenant_id);

        $dashStudent = $this->get('http://cbt.prestasiunggul.sch.id:8000/dashboard');
        $dashStudent->assertOk();
        $dashStudent->assertSee('Citra Siswi');

        // Logout
        $this->post('http://cbt.prestasiunggul.sch.id:8000/logout');
        $this->assertGuest();

        // 2. Admin on Custom Domain
        $admin = User::factory()->create([
            'name' => 'Admin Prestasi',
            'email' => 'admin@prestasiunggul.test',
            'password' => bcrypt($password),
        ]);
        $tenant->users()->attach($admin->id, ['role' => 'A']);

        $responseAdmin = $this->post('http://cbt.prestasiunggul.sch.id:8000/login', [
            'email' => 'admin@prestasiunggul.test',
            'password' => $password,
        ]);
        $responseAdmin->assertRedirect('http://cbt.prestasiunggul.sch.id:8000/dashboard');

        $dashAdmin = $this->get('http://cbt.prestasiunggul.sch.id:8000/dashboard');
        $dashAdmin->assertOk();
        $dashAdmin->assertSee('Bimbel Prestasi Unggul');
    }

    public function test_login_from_subdomain_rejects_user_from_different_tenant(): void
    {
        $tenantA = Tenant::create([
            'name' => 'Sekolah A',
            'subdomain' => 'sekolaha',
            'plan' => 'gratis',
        ]);

        $tenantB = Tenant::create([
            'name' => 'Sekolah B',
            'subdomain' => 'sekolahb',
            'plan' => 'gratis',
        ]);

        $password = 'password123';
        $userA = User::factory()->create([
            'email' => 'siswa@sekolaha.test',
            'password' => bcrypt($password),
        ]);
        $tenantA->users()->attach($userA->id, ['role' => 'U']);

        // User A attempts to login on Sekolah B subdomain
        $response = $this->from('http://sekolahb.localhost:8000/login')
            ->post('http://sekolahb.localhost:8000/login', [
                'email' => 'siswa@sekolaha.test',
                'password' => $password,
            ]);

        $response->assertRedirect('http://sekolahb.localhost:8000/login');
        $response->assertSessionHasErrors(['email']);
        $this->assertGuest();
    }

    public function test_authenticated_user_accessing_different_tenant_subdomain_dashboard_is_safely_redirected(): void
    {
        $tenantA = Tenant::create([
            'name' => 'Sekolah A',
            'subdomain' => 'sekolaha',
            'plan' => 'gratis',
        ]);

        $tenantB = Tenant::create([
            'name' => 'Sekolah B',
            'subdomain' => 'sekolahb',
            'plan' => 'gratis',
        ]);

        $studentA = User::factory()->create([
            'current_tenant_id' => $tenantA->id,
        ]);
        $tenantA->users()->attach($studentA->id, ['role' => 'U']);

        // Student A visits Sekolah B's dashboard
        $response = $this->actingAs($studentA)->get('http://sekolahb.localhost:8000/dashboard');

        // Should be redirected to Student A's portal with an error, not showing Sekolah B's dashboard
        $response->assertRedirect($tenantA->getPortalUrl());
    }

    public function test_owner_login_on_subdomain_switches_to_that_tenant(): void
    {
        $tenant = Tenant::create([
            'name' => 'SMKN 1 Cimahi',
            'subdomain' => 'smkn1',
            'plan' => 'premium',
        ]);

        $password = 'password123';
        $owner = User::factory()->create([
            'email' => 'owner@adzkia.id',
            'password' => bcrypt($password),
        ]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        // Owner logs in on subdomain
        $response = $this->post('http://smkn1.localhost:8000/login', [
            'email' => 'owner@adzkia.id',
            'password' => $password,
        ]);

        $response->assertRedirect('http://smkn1.localhost:8000/dashboard');
        $this->assertEquals($tenant->id, $owner->fresh()->current_tenant_id);

        $dash = $this->get('http://smkn1.localhost:8000/dashboard');
        $dash->assertOk();
        $dash->assertSee('SMKN 1 Cimahi');
    }

    public function test_only_owner_stays_on_central_domain_while_teacher_and_admin_are_redirected_to_tenant(): void
    {
        $tenant = Tenant::create([
            'name' => 'Bimbel Hebat',
            'subdomain' => 'bimbelhebat',
            'plan' => 'premium',
        ]);

        $password = 'password123';

        // 1. Owner stays on central domain
        $owner = User::factory()->create([
            'email' => 'owner@adzkia.id',
            'current_tenant_id' => null,
        ]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $ownerResponse = $this->actingAs($owner)->get('http://localhost:8000/dashboard');
        $ownerResponse->assertOk();
        $ownerResponse->assertSee('Dashboard Pemilik ADZKIA');

        // 2. Admin is redirected to tenant portal from central domain
        $admin = User::factory()->create([
            'email' => 'admin@bimbelhebat.test',
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($admin->id, ['role' => 'A']);

        $adminResponse = $this->actingAs($admin)->get('http://localhost:8000/dashboard');
        $adminResponse->assertRedirect('http://bimbelhebat.localhost:8000');

        // 3. Teacher is redirected to tenant portal from central domain
        $teacher = User::factory()->create([
            'email' => 'guru@bimbelhebat.test',
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($teacher->id, ['role' => 'T']);

        $teacherResponse = $this->actingAs($teacher)->get('http://localhost:8000/dashboard');
        $teacherResponse->assertRedirect('http://bimbelhebat.localhost:8000');

        // 4. Student is redirected to tenant portal from central domain
        $student = User::factory()->create([
            'email' => 'murid@bimbelhebat.test',
            'username' => 'murid_hebat',
            'current_tenant_id' => $tenant->id,
        ]);
        $tenant->users()->attach($student->id, ['role' => 'U']);

        $studentResponse = $this->actingAs($student)->get('http://localhost:8000/dashboard');
        $studentResponse->assertRedirect('http://bimbelhebat.localhost:8000');

        // 5. Teacher profile on central domain redirects to tenant profile
        $teacherProfile = $this->actingAs($teacher)->get('http://localhost:8000/profile');
        $teacherProfile->assertRedirect('http://bimbelhebat.localhost:8000/profile');
    }
}
