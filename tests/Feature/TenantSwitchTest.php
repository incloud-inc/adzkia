<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantSwitchTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_with_multiple_tenants_is_redirected_to_selector(): void
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user = User::factory()->create([
            'current_tenant_id' => null,
        ]);

        $user->tenants()->attach($tenant1->id, ['role' => 'U']);
        $user->tenants()->attach($tenant2->id, ['role' => 'U']);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('tenant.select'));
    }

    public function test_user_can_switch_tenant(): void
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user = User::factory()->create([
            'current_tenant_id' => $tenant1->id,
        ]);

        $user->tenants()->attach($tenant1->id, ['role' => 'U']);
        $user->tenants()->attach($tenant2->id, ['role' => 'U']);

        $this->actingAs($user);

        $response = $this->post(route('tenant.switch', $tenant2->id));

        $response->assertRedirect(route('dashboard'));
        $this->assertEquals($tenant2->id, $user->fresh()->current_tenant_id);
    }
}
