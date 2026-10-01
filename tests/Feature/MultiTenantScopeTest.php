<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MultiTenantScopeTest extends TestCase
{
    use RefreshDatabase;

    public function test_tenant_membership_filters_users_by_tenant(): void
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user1 = User::factory()->create(['current_tenant_id' => $tenant1->id]);
        $user2 = User::factory()->create(['current_tenant_id' => $tenant1->id]);
        $user3 = User::factory()->create(['current_tenant_id' => $tenant2->id]);

        $user1->tenants()->attach($tenant1->id, ['role' => 'U']);
        $user2->tenants()->attach($tenant1->id, ['role' => 'T']);
        $user3->tenants()->attach($tenant2->id, ['role' => 'A']);

        // All users exist
        $this->assertCount(3, User::all());

        // Tenant 1 only has users 1 and 2
        $tenant1Users = $tenant1->users;
        $this->assertCount(2, $tenant1Users);
        $this->assertTrue($tenant1Users->contains($user1));
        $this->assertTrue($tenant1Users->contains($user2));
        $this->assertFalse($tenant1Users->contains($user3));

        // Tenant 2 only has user 3
        $tenant2Users = $tenant2->users;
        $this->assertCount(1, $tenant2Users);
        $this->assertTrue($tenant2Users->contains($user3));
    }

    public function test_user_can_switch_active_tenant(): void
    {
        $tenant1 = Tenant::factory()->create();
        $tenant2 = Tenant::factory()->create();

        $user = User::factory()->create(['current_tenant_id' => $tenant1->id]);
        $user->tenants()->attach([$tenant1->id => ['role' => 'U'], $tenant2->id => ['role' => 'A']]);

        $this->assertEquals($tenant1->id, $user->current_tenant_id);

        $user->switchTenant($tenant2);

        $this->assertEquals($tenant2->id, $user->fresh()->current_tenant_id);
    }
}
