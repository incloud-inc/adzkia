<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantSsoController extends Controller
{
    /**
     * Consume a signed Single Sign-On (SSO) token to authenticate across custom domains.
     */
    public function verify(Request $request): RedirectResponse
    {
        $userId = (int) $request->query('user_id');
        $expires = (int) $request->query('expires');
        $signature = (string) $request->query('signature');
        $redirect = (string) $request->query('redirect', '/');

        if ($expires < now()->timestamp) {
            return redirect()->to('/login')->with('error', 'Sesi tautan masuk otomatis telah kedaluwarsa. Silakan masuk kembali.');
        }

        $currentTenant = app()->bound('currentTenant') ? app('currentTenant') : null;
        $tenantId = $currentTenant?->id ?? 0;

        $expected1 = hash_hmac('sha256', "{$userId}:{$tenantId}:{$expires}", (string) config('app.key'));
        $expected2 = hash_hmac('sha256', "{$userId}:0:{$expires}", (string) config('app.key'));

        if (! hash_equals($expected1, $signature) && ! hash_equals($expected2, $signature)) {
            return redirect()->to('/login')->with('error', 'Tanda tangan otentikasi domain tidak valid.');
        }

        $user = User::find($userId);
        if (! $user) {
            return redirect()->to('/login');
        }

        Auth::login($user);
        $request->session()->regenerate();

        if ($currentTenant && $user->current_tenant_id !== $currentTenant->id) {
            $hasAccess = $user->isSuperUser() || $user->tenants()->where('tenant_id', $currentTenant->id)->exists();
            if ($hasAccess) {
                $user->switchTenant($currentTenant->id);
            }
        }

        if (! str_starts_with($redirect, '/')) {
            $redirect = '/';
        }

        return redirect()->to($redirect);
    }
}
