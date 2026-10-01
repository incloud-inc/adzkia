<?php

namespace App\Policies;

use App\Models\Tenant;
use App\Models\User;

class TenantPolicy
{
    /**
     * Determine whether the user can view any tenants.
     */
    public function viewAny(User $user): bool
    {
        return $user->isSuperUser();
    }

    /**
     * Determine whether the user can view the tenant.
     */
    public function view(User $user, Tenant $tenant): bool
    {
        return $user->isSuperUser() || ($user->isAdmin() && $user->current_tenant_id === $tenant->id);
    }

    /**
     * Determine whether the user can create tenants.
     */
    public function create(User $user): bool
    {
        return $user->isSuperUser();
    }

    /**
     * Determine whether the user can update the tenant.
     */
    public function update(User $user, Tenant $tenant): bool
    {
        return $user->isSuperUser() || ($user->isAdmin() && (
            $user->current_tenant_id === $tenant->id ||
            $user->tenants()->where('tenant_id', $tenant->id)->wherePivot('role', 'A')->exists()
        ));
    }

    /**
     * Determine whether the user can delete the tenant.
     */
    public function delete(User $user, Tenant $tenant): bool
    {
        return $user->isSuperUser();
    }
}
