<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_user_can_view_tenants_list(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'SMAN 1 Test', 'subdomain' => 'sman1test']);
        $superUser = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $superUser->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($superUser)->get(route('tenants.index'));

        $response->assertStatus(200);
        $response->assertSee('SMAN 1 Test');
        $response->assertSee('Manajemen Tenant');
        $response->assertSee('Manajemen Institusi / Tenant');
    }

    public function test_super_user_can_create_new_tenant(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Default Tenant', 'subdomain' => 'default']);
        $superUser = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $superUser->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($superUser)->post(route('tenants.store'), [
            'name' => 'SMAN 5 Padang',
            'subdomain' => 'sman5padang',
            'plan' => 'premium',
            'admin_name' => 'Admin SMAN 5',
            'admin_email' => 'admin@sman5padang.sch.id',
            'admin_password' => 'password123',
        ]);

        $response->assertRedirect(route('tenants.index'));
        $this->assertDatabaseHas('tenants', [
            'name' => 'SMAN 5 Padang',
            'subdomain' => 'sman5padang',
            'plan' => 'premium',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Admin SMAN 5',
            'email' => 'admin@sman5padang.sch.id',
        ]);
    }

    public function test_super_user_can_update_and_delete_tenant(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'Old Tenant Name',
            'subdomain' => 'oldtenant',
            'plan' => 'gratis',
        ]);
        $superUser = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $superUser->tenants()->attach($tenant->id, ['role' => 'S']);

        $updateResponse = $this->actingAs($superUser)->put(route('tenants.update', $tenant), [
            'name' => 'Updated Tenant Name',
            'subdomain' => 'updatedtenant',
            'plan' => 'whitelabel',
        ]);

        $updateResponse->assertRedirect(route('tenants.index'));
        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'name' => 'Updated Tenant Name',
            'subdomain' => 'updatedtenant',
            'plan' => 'whitelabel',
        ]);

        $deleteResponse = $this->actingAs($superUser)->delete(route('tenants.destroy', $tenant));
        $deleteResponse->assertRedirect(route('tenants.index'));
        $this->assertDatabaseMissing('tenants', [
            'id' => $tenant->id,
        ]);
    }

    public function test_tenant_admin_can_only_view_and_edit_their_own_tenant(): void
    {
        $tenant1 = Tenant::factory()->create(['name' => 'Tenant 1', 'subdomain' => 'tenant1']);
        $tenant2 = Tenant::factory()->create(['name' => 'Tenant 2', 'subdomain' => 'tenant2']);

        $admin = User::factory()->create(['current_tenant_id' => $tenant1->id]);
        $admin->tenants()->attach($tenant1->id, ['role' => 'A']);

        // Admin cannot view global tenants list
        $response = $this->actingAs($admin)->get(route('tenants.index'));
        $response->assertStatus(403);

        // Admin cannot create a new tenant
        $createResponse = $this->actingAs($admin)->get(route('tenants.create'));
        $createResponse->assertStatus(403);

        // Admin can view their own tenant profile
        $viewOwnResponse = $this->actingAs($admin)->get(route('tenants.show', $tenant1));
        $viewOwnResponse->assertStatus(200);
        $viewOwnResponse->assertSee('Tenant 1');

        // Admin cannot view another tenant profile
        $viewOtherResponse = $this->actingAs($admin)->get(route('tenants.show', $tenant2));
        $viewOtherResponse->assertStatus(403);

        // Admin can edit their own tenant
        $editOwnResponse = $this->actingAs($admin)->get(route('tenants.edit', $tenant1));
        $editOwnResponse->assertStatus(200);

        // Admin cannot delete their tenant
        $deleteResponse = $this->actingAs($admin)->delete(route('tenants.destroy', $tenant1));
        $deleteResponse->assertStatus(403);
    }

    public function test_teacher_and_student_cannot_access_tenant_management(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Tenant SMAN', 'subdomain' => 'tenantsman']);

        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);

        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        // Teacher
        $this->actingAs($teacher)->get(route('tenants.index'))->assertStatus(403);
        $this->actingAs($teacher)->get(route('tenants.show', $tenant))->assertStatus(403);

        // Student
        $this->actingAs($student)->get(route('tenants.index'))->assertStatus(403);
        $this->actingAs($student)->get(route('tenants.show', $tenant))->assertStatus(403);
    }

    public function test_sidebar_displays_correct_menus_for_each_role(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Bimbel Adzkia', 'subdomain' => 'adzkia-bimbel']);

        // Super User
        $superUser = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $superUser->tenants()->attach($tenant->id, ['role' => 'S']);
        $responseS = $this->actingAs($superUser)->get(route('dashboard'));
        $responseS->assertStatus(200);
        $responseS->assertSee('Manajemen Tenant');
        $responseS->assertSee('Tingkat Kelas/Jenjang');
        $responseS->assertSee('Bank Soal Global');
        $responseS->assertDontSee('Ujian Aktif / CBT');

        // Admin Tenant (Sidebar: Only Dashboard & Bank Soal)
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);
        $responseA = $this->actingAs($admin)->get(route('dashboard'));
        $responseA->assertStatus(200);
        $responseA->assertSee('Alamat Portal Publik:');
        $responseA->assertSee('Dewan Guru');
        $responseA->assertSee('Siswa Terdaftar');
        $responseA->assertSee('Bank Soal');
        $responseA->assertDontSee('Bank Soal Global');

        // Teacher
        $teacher = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $teacher->tenants()->attach($tenant->id, ['role' => 'T']);
        $responseT = $this->actingAs($teacher)->get(route('dashboard'));
        $responseT->assertStatus(200);
        $responseT->assertSee('Dashboard Guru');
        $responseT->assertSee('Bank Soal', false);
        $responseT->assertDontSee('Bank Soal & Materi');
        $responseT->assertDontSee('Manajemen Tenant');

        // Student
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);
        $responseU = $this->actingAs($student)->get(route('dashboard'));
        $responseU->assertStatus(200);
        $responseU->assertSee('Dashboard Siswa');
        $responseU->assertSee('Ujian Aktif / CBT');
        $responseU->assertSee('Riwayat Ujian');
        $responseU->assertDontSee('Manajemen Tenant');
    }
}
