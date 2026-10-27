<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MathStudioTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_math_studio(): void
    {
        $response = $this->get(route('math.studio.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_student_cannot_access_math_studio(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $student = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $student->tenants()->attach($tenant->id, ['role' => 'U']);

        $response = $this->actingAs($student)->get(route('math.studio.index'));
        $response->assertForbidden();
    }

    public function test_non_enterprise_tenant_user_cannot_access_math_studio(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'gratis']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get(route('math.studio.index'));
        $response->assertForbidden();
    }

    public function test_enterprise_tenant_admin_can_access_math_studio(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $admin = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $admin->tenants()->attach($tenant->id, ['role' => 'A']);

        $response = $this->actingAs($admin)->get(route('math.studio.index'));
        $response->assertOk()
            ->assertSee('Kamus Rumus KaTeX')
            ->assertSee('Pustaka Formula')
            ->assertSee('Editor & Live Preview', false);
    }

    public function test_owner_super_user_can_access_math_studio(): void
    {
        $tenant = Tenant::factory()->create(['plan' => 'gratis']);
        $owner = User::factory()->create(['current_tenant_id' => $tenant->id]);
        $owner->tenants()->attach($tenant->id, ['role' => 'S']);

        $response = $this->actingAs($owner)->get(route('math.studio.index'));
        $response->assertOk()
            ->assertSee('Kamus Rumus KaTeX');
    }

    public function test_sidebar_shows_kamus_rumus_for_enterprise_tenant_and_hides_for_non_enterprise(): void
    {
        // 1. Enterprise Tenant -> sees KAMUS RUMUS in sidebar
        $enterpriseTenant = Tenant::factory()->create(['plan' => 'whitelabel']);
        $enterpriseAdmin = User::factory()->create(['current_tenant_id' => $enterpriseTenant->id]);
        $enterpriseAdmin->tenants()->attach($enterpriseTenant->id, ['role' => 'A']);

        $responseEnterprise = $this->actingAs($enterpriseAdmin)->get(route('dashboard'));
        $responseEnterprise->assertOk()
            ->assertSee('KAMUS RUMUS');

        // 2. Non-Enterprise Tenant -> does NOT see KAMUS RUMUS in sidebar
        $freeTenant = Tenant::factory()->create(['plan' => 'gratis']);
        $freeAdmin = User::factory()->create(['current_tenant_id' => $freeTenant->id]);
        $freeAdmin->tenants()->attach($freeTenant->id, ['role' => 'A']);

        $responseFree = $this->actingAs($freeAdmin)->get(route('dashboard'));
        $responseFree->assertOk()
            ->assertDontSee('KAMUS RUMUS');
    }
}
