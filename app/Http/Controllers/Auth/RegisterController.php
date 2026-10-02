<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\TenantInvitation;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create(Request $request): View|RedirectResponse
    {
        $token = $request->query('invite');

        if (is_string($token) && $token !== '') {
            $invitation = TenantInvitation::query()
                ->with('tenant')
                ->where('token', $token)
                ->first();

            if (! $invitation || ! $invitation->isPending()) {
                return redirect()
                    ->route('login')
                    ->with('error', 'Undangan tidak valid atau sudah kedaluwarsa.');
            }

            return view('auth.register', [
                'invitation' => $invitation,
                'inviteToken' => $invitation->token,
                'email' => $invitation->email,
                'tenant' => $invitation->tenant,
                'tenantName' => $invitation->tenant?->name,
                'role' => $invitation->role,
            ]);
        }

        // Jalur pendaftaran mandiri (Self-Registration) Siswa
        $tenant = app()->has('currentTenant') ? app('currentTenant') : null;
        if (! $tenant) {
            $tenant = Tenant::find(1) ?? Tenant::first();
        }

        return view('auth.register', [
            'invitation' => null,
            'inviteToken' => null,
            'email' => old('email', ''),
            'tenant' => $tenant,
            'tenantName' => $tenant?->name ?? 'ADZKIA',
            'role' => 'U',
        ]);
    }

    /**
     * Handle a registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Jika pendaftaran lewat token undangan
        if ($request->filled('invite_token')) {
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'invite_token' => ['required', 'string'],
            ]);

            $invitation = TenantInvitation::query()
                ->with('tenant')
                ->where('token', $validated['invite_token'])
                ->first();

            if (! $invitation || ! $invitation->isPending()) {
                throw ValidationException::withMessages([
                    'invite_token' => 'Undangan tidak valid atau sudah kedaluwarsa.',
                ]);
            }

            $user = DB::transaction(function () use ($validated, $invitation): User {
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                    'email_verified_at' => now(),
                    'must_change_password' => false,
                    'current_tenant_id' => $invitation->tenant_id,
                ]);

                $user->tenants()->attach($invitation->tenant_id, [
                    'role' => $invitation->role,
                ]);

                $invitation->forceFill([
                    'accepted_at' => now(),
                ])->save();

                return $user;
            });

            $user->switchTenant($invitation->tenant_id);

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        // 2. Jalur pendaftaran mandiri siswa / murid
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'whatsapp_number' => ['nullable', 'string', 'max:20'],
        ]);

        $tenant = app()->has('currentTenant') ? app('currentTenant') : null;
        if (! $tenant) {
            $tenant = Tenant::find(1) ?? Tenant::first();
        }

        $user = DB::transaction(function () use ($validated, $tenant): User {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'whatsapp_number' => $validated['whatsapp_number'] ?? null,
                'email_verified_at' => now(),
                'must_change_password' => false,
                'current_tenant_id' => $tenant?->id,
            ]);

            if ($tenant) {
                $user->tenants()->attach($tenant->id, [
                    'role' => 'U',
                ]);
            }

            return $user;
        });

        if ($tenant) {
            $user->switchTenant($tenant->id);
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
