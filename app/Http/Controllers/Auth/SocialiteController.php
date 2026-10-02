<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to Google's OAuth consent screen.
     */
    public function redirectToGoogle(Request $request): RedirectResponse
    {
        $currentTenant = app()->has('currentTenant') ? app('currentTenant') : null;

        if (! $currentTenant) {
            $host = $request->getHost();
            $centralDomains = ['adzkia.test', 'adzkia.id', 'localhost', '127.0.0.1'];
            if (! in_array($host, $centralDomains, true)) {
                $parts = explode('.', $host);
                if (count($parts) >= 2) {
                    $currentTenant = Tenant::where('subdomain', $parts[0])->first();
                }
            }
        }

        if ($currentTenant) {
            $request->session()->put('google_oauth_tenant_id', $currentTenant->id);
        } else {
            $request->session()->forget('google_oauth_tenant_id');
        }

        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google OAuth.
     */
    public function handleGoogleCallback(Request $request): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            Log::warning('Google OAuth callback failed', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('login')
                ->with('error', 'Gagal melakukan autentikasi dengan Google. Silakan coba lagi.');
        }

        $googleId = (string) $googleUser->getId();
        $email = (string) $googleUser->getEmail();
        $name = (string) ($googleUser->getName() ?? $googleUser->getNickname() ?? $email);
        $avatar = $googleUser->getAvatar();

        if ($email === '') {
            return redirect()
                ->route('login')
                ->with('error', 'Akun Google tidak menyediakan alamat email.');
        }

        // Resolusi Target Tenant (Subdomain vs Domain Utama)
        $targetTenant = null;
        if (app()->has('currentTenant')) {
            $targetTenant = app('currentTenant');
        } elseif ($request->session()->has('google_oauth_tenant_id')) {
            $targetTenant = Tenant::find($request->session()->get('google_oauth_tenant_id'));
        }

        if (! $targetTenant) {
            $host = $request->getHost();
            $centralDomains = ['adzkia.test', 'adzkia.id', 'localhost', '127.0.0.1'];
            if (! in_array($host, $centralDomains, true)) {
                $parts = explode('.', $host);
                if (count($parts) >= 2) {
                    $targetTenant = Tenant::where('subdomain', $parts[0])->first();
                }
            }
        }

        // Jika pendaftaran di domain utama, otomatis masuk tenant ID 1
        if (! $targetTenant) {
            $targetTenant = Tenant::find(1) ?? Tenant::first();
        }

        $user = DB::transaction(function () use ($googleId, $email, $name, $avatar, $targetTenant): User {
            // 1) Pengguna sudah ada berdasarkan google_id
            $existing = User::query()->where('google_id', $googleId)->first();

            if ($existing !== null) {
                if ($avatar !== null && $existing->avatar_url !== $avatar) {
                    $existing->forceFill(['avatar_url' => $avatar])->save();
                }

                if ($targetTenant && ! $existing->tenants()->where('tenant_id', $targetTenant->id)->exists()) {
                    $existing->tenants()->attach($targetTenant->id, ['role' => 'U']);
                }

                if ($targetTenant && ! $existing->current_tenant_id) {
                    $existing->forceFill(['current_tenant_id' => $targetTenant->id])->save();
                }

                return $existing;
            }

            // 2) Pengguna sudah ada berdasarkan email -> tautkan Google
            $byEmail = User::query()->where('email', $email)->first();

            if ($byEmail !== null) {
                $attributes = [
                    'google_id' => $googleId,
                    'avatar_url' => $avatar ?? $byEmail->avatar_url,
                ];

                if ($byEmail->email_verified_at === null) {
                    $attributes['email_verified_at'] = now();
                }

                if ($targetTenant && ! $byEmail->tenants()->where('tenant_id', $targetTenant->id)->exists()) {
                    $byEmail->tenants()->attach($targetTenant->id, ['role' => 'U']);
                }

                if ($targetTenant && ! $byEmail->current_tenant_id) {
                    $attributes['current_tenant_id'] = $targetTenant->id;
                }

                $byEmail->forceFill($attributes)->save();

                return $byEmail;
            }

            // 3) Pendaftar baru via Google
            $newUser = User::query()->create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make(Str::random(32)),
                'google_id' => $googleId,
                'avatar_url' => $avatar,
                'email_verified_at' => now(),
                'must_change_password' => false,
                'current_tenant_id' => $targetTenant?->id,
            ]);

            if ($targetTenant !== null) {
                $newUser->tenants()->syncWithoutDetaching([
                    $targetTenant->getKey() => ['role' => 'U'],
                ]);
            }

            return $newUser;
        });

        if ($targetTenant && $user->tenants()->where('tenant_id', $targetTenant->id)->exists()) {
            $user->switchTenant($targetTenant->id);
        }

        Auth::login($user, remember: true);

        $request->session()->regenerate();
        $request->session()->forget('google_oauth_tenant_id');

        return $this->redirectAfterLogin($user);
    }

    /**
     * Determine the post-login redirect target based on tenant membership.
     */
    protected function redirectAfterLogin(User $user): RedirectResponse
    {
        if ($user->isSuperUser()) {
            return redirect()->intended(route('dashboard'));
        }

        if ($user->current_tenant_id) {
            $current = $user->tenants()->where('tenant_id', $user->current_tenant_id)->first();
            if ($current) {
                return redirect()->intended(route('dashboard'));
            }
        }

        $tenants = $user->tenants()->get();

        if ($tenants->count() === 1) {
            $user->switchTenant($tenants->first());

            return redirect()->intended(route('dashboard'));
        }

        if ($tenants->count() > 1) {
            return redirect()->route('tenant.select');
        }

        return redirect()->intended(route('dashboard'));
    }
}
