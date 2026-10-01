<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to Google's OAuth consent screen.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google OAuth.
     */
    public function handleGoogleCallback(): RedirectResponse
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

        $user = DB::transaction(function () use ($googleId, $email, $name, $avatar): User {
            // 1) Existing user by google_id
            $existing = User::query()->where('google_id', $googleId)->first();

            if ($existing !== null) {
                if ($avatar !== null && $existing->avatar_url !== $avatar) {
                    $existing->forceFill(['avatar_url' => $avatar])->save();
                }

                return $existing;
            }

            // 2) Existing user by email -> link Google
            $byEmail = User::query()->where('email', $email)->first();

            if ($byEmail !== null) {
                $attributes = [
                    'google_id' => $googleId,
                    'avatar_url' => $avatar ?? $byEmail->avatar_url,
                ];

                if ($byEmail->email_verified_at === null) {
                    $attributes['email_verified_at'] = now();
                }

                $byEmail->forceFill($attributes)->save();

                return $byEmail;
            }

            // 3) Brand new user via Google
            $newUser = User::query()->create([
                'name' => $name,
                'email' => $email,
                'password' => null,
                'google_id' => $googleId,
                'avatar_url' => $avatar,
                'email_verified_at' => now(),
            ]);

            $tenant = Tenant::query()->where('subdomain', 'kemendik')->first();

            if ($tenant !== null) {
                $newUser->tenants()->syncWithoutDetaching([
                    $tenant->getKey() => ['role' => 'U'],
                ]);
            }

            return $newUser;
        });

        Auth::login($user, remember: true);

        request()->session()->regenerate();

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

        $tenants = $user->tenants()->get();

        if ($tenants->isEmpty()) {
            $tenant = Tenant::query()->where('subdomain', 'kemendik')->first();

            if ($tenant !== null) {
                $user->tenants()->syncWithoutDetaching([
                    $tenant->getKey() => ['role' => 'U'],
                ]);

                $user->switchTenant($tenant);

                return redirect()->intended(route('dashboard'));
            }

            return redirect()->route('tenant.select');
        }

        if ($tenants->count() === 1) {
            $user->switchTenant($tenants->first());

            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('tenant.select');
    }
}
