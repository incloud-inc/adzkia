<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class DashboardUserController extends Controller
{
    /**
     * Store a new user (guru/siswa/admin) under the target/current tenant.
     */
    public function store(Request $request): RedirectResponse
    {
        $authUser = Auth::user();
        abort_unless($authUser && ($authUser->isAdmin() || $authUser->isSuperUser()), 403);

        $tenantId = $request->input('tenant_id');
        $tenant = $tenantId ? Tenant::find($tenantId) : ($authUser->currentTenant ?? $authUser->tenants()->first() ?? Tenant::first());
        abort_unless($tenant, 403, 'Institusi / Tenant belum tersedia.');

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|string|in:T,U,A',
            'whatsapp_number' => 'nullable|string|max:20',
            'tenant_id' => 'nullable|exists:tenants,id',
        ]);

        $newUser = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'whatsapp_number' => $validated['whatsapp_number'] ?? null,
            'password' => Hash::make('Masuk123!'),
            'current_tenant_id' => $tenant->id,
        ]);

        $newUser->tenants()->attach($tenant->id, ['role' => $validated['role']]);

        $roleLabels = ['T' => 'Guru', 'U' => 'Siswa', 'A' => 'Admin'];

        return redirect()->route('dashboard')
            ->with('success', $roleLabels[$validated['role']].' '.$newUser->name.' berhasil ditambahkan ke '.$tenant->name.'. Password default: Masuk123!');
    }

    /**
     * Show user detail (JSON or view).
     */
    public function show(Request $request, User $user): JsonResponse|View
    {
        $authUser = Auth::user();
        abort_unless($authUser && ($authUser->isAdmin() || $authUser->isSuperUser()), 403);

        $tenant = $authUser->currentTenant ?? $authUser->tenants()->first() ?? $user->tenants()->first() ?? Tenant::first();

        $pivotRole = $user->tenants()->where('tenant_id', $tenant?->id)->first()?->pivot?->role
            ?? $user->tenants()->first()?->pivot?->role
            ?? ($user->isTeacher() ? 'T' : ($user->isAdmin() ? 'A' : 'U'));

        $roleLabels = ['T' => 'Guru & Pengawas', 'U' => 'Siswa / Murid', 'A' => 'Administrator', 'S' => 'Super User'];

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $pivotRole,
                'role_label' => $roleLabels[$pivotRole] ?? $pivotRole,
                'username' => $user->username ? '@'.$user->username : '-',
                'whatsapp_number' => $user->whatsapp_number ?? '-',
                'tenant_name' => $user->tenants()->first()?->name ?? $tenant?->name ?? 'Global',
                'created_at' => $user->created_at?->format('d M Y') ?? '-',
            ]);
        }

        return redirect()->route('dashboard');
    }

    /**
     * Update a user's name, email, and role.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $authUser = Auth::user();
        abort_unless($authUser && ($authUser->isAdmin() || $authUser->isSuperUser()), 403);

        $tenant = $authUser->currentTenant ?? $authUser->tenants()->first() ?? $user->tenants()->first() ?? Tenant::first();
        abort_unless($tenant, 403);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'role' => 'required|string|in:T,U,A',
            'whatsapp_number' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'whatsapp_number' => $validated['whatsapp_number'] ?? $user->whatsapp_number,
        ]);

        if ($user->tenants()->where('tenant_id', $tenant->id)->exists()) {
            $user->tenants()->updateExistingPivot($tenant->id, ['role' => $validated['role']]);
        } else {
            $user->tenants()->syncWithoutDetaching([$tenant->id => ['role' => $validated['role']]]);
        }

        return redirect()->route('dashboard')
            ->with('success', 'Data '.$user->name.' berhasil diperbarui.');
    }

    /**
     * Remove user from tenant or platform.
     */
    public function destroy(User $user): RedirectResponse
    {
        $authUser = Auth::user();
        abort_unless($authUser && ($authUser->isAdmin() || $authUser->isSuperUser()), 403);

        abort_if($user->id === $authUser->id, 403, 'Anda tidak dapat menghapus akun Anda sendiri.');

        $tenant = $authUser->currentTenant ?? $authUser->tenants()->first() ?? $user->tenants()->first();

        $name = $user->name;
        if ($tenant && $user->tenants()->where('tenant_id', $tenant->id)->exists()) {
            $user->tenants()->detach($tenant->id);
        } else {
            $user->delete();
        }

        return redirect()->route('dashboard')
            ->with('success', 'Anggota '.$name.' berhasil dihapus.');
    }
}
