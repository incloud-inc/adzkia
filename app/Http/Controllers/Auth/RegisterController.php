<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
     * Show the registration form (invite-only).
     */
    public function create(Request $request): View|RedirectResponse
    {
        $token = $request->query('invite');

        if (! is_string($token) || $token === '') {
            return redirect()
                ->route('login')
                ->with('error', 'Registrasi hanya tersedia melalui undangan. Silakan minta undangan terlebih dahulu.');
        }

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
            'tenantName' => $invitation->tenant?->name,
            'role' => $invitation->role,
        ]);
    }

    /**
     * Handle a registration request.
     */
    public function store(Request $request): RedirectResponse
    {
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
}
