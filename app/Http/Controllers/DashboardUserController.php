<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class DashboardUserController extends Controller
{
    /**
     * Store a new user (guru/siswa/admin) under the target/current tenant.
     * Supports both single creation and comma-separated bulk email creation.
     */
    public function store(Request $request): RedirectResponse
    {
        $authUser = Auth::user();
        abort_unless($authUser && ($authUser->isAdmin() || $authUser->isSuperUser()), 403);

        $tenantId = $request->input('tenant_id');
        $tenant = $tenantId ? Tenant::find($tenantId) : ($authUser->currentTenant ?? $authUser->tenants()->first() ?? Tenant::first());
        abort_unless($tenant, 403, 'Institusi / Tenant belum tersedia.');

        $role = $request->input('role', 'U');
        if (! in_array($role, ['T', 'U', 'A'], true)) {
            $role = 'U';
        }

        $roleLabels = ['T' => 'Guru', 'U' => 'Siswa', 'A' => 'Admin'];
        $roleLabel = $roleLabels[$role] ?? 'Pengguna';

        // ─── 1. Penanganan Mode Bulk Add (Banyak Email Dipisahkan Koma) ───
        if ($request->input('add_type') === 'bulk' || $request->filled('bulk_emails')) {
            $rawInput = (string) $request->input('bulk_emails');

            // Pisahkan berdasarkan koma dan baris baru
            $tokens = preg_split('/[\r\n,]+/', $rawInput);
            $validEmails = [];

            foreach ($tokens as $token) {
                $cleaned = trim($token, " \t\n\r\0\x0B;");
                if ($cleaned !== '' && filter_var($cleaned, FILTER_VALIDATE_EMAIL)) {
                    $validEmails[] = strtolower($cleaned);
                }
            }

            $validEmails = array_values(array_unique($validEmails));

            if (empty($validEmails)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Tidak ada alamat email yang valid ditemukan. Harap masukkan email yang dipisahkan dengan tanda koma (,).');
            }

            $createdCount = 0;
            $attachedCount = 0;

            DB::transaction(function () use ($validEmails, $tenant, $role, &$createdCount, &$attachedCount): void {
                foreach ($validEmails as $email) {
                    $user = User::query()->where('email', $email)->first();

                    if (! $user) {
                        $user = User::create([
                            'name' => $email, // Masuk ke database nama dan email bernilai sama
                            'email' => $email,
                            'password' => Hash::make('Masuk123!'),
                            'must_change_password' => true,
                            'current_tenant_id' => $tenant->id,
                            'email_verified_at' => now(),
                        ]);
                        $createdCount++;
                    }

                    if (! $user->tenants()->where('tenant_id', $tenant->id)->exists()) {
                        $user->tenants()->attach($tenant->id, ['role' => $role]);
                        $attachedCount++;
                    }
                }
            });

            return redirect()->route('dashboard')
                ->with('success', "Berhasil menambahkan massal: {$createdCount} {$roleLabel} baru dibuat (nama & email sama), {$attachedCount} pengguna dikaitkan ke {$tenant->name}. Password default: Masuk123! (Wajib ganti password saat login).");
        }

        // ─── 2. Penanganan Mode Input Tunggal ───────────────────────────
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
            'must_change_password' => true,
            'current_tenant_id' => $tenant->id,
            'email_verified_at' => now(),
        ]);

        $newUser->tenants()->attach($tenant->id, ['role' => $validated['role']]);

        return redirect()->route('dashboard')
            ->with('success', $roleLabels[$validated['role']].' '.$newUser->name.' berhasil ditambahkan ke '.$tenant->name.'. Password default: Masuk123! (Wajib ganti password saat pertama login).');
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
