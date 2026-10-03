<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Logout dari device lain untuk memastikan hanya 1 device aktif per user
        Auth::logoutOtherDevices($request->password);

        $user = Auth::user();

        // 1. Super User / OWNER directly enters dashboard without choosing a tenant
        if ($user->isSuperUser()) {
            $user->update(['current_tenant_id' => null]);

            return redirect()->intended(route('dashboard', absolute: false));
        }

        // If a tenant was matched via domain (IdentifyTenantByDomain middleware),
        // the user's current_tenant_id should already be switched.
        if (app()->has('currentTenant')) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $tenantsCount = $user->tenants()->count();

        if ($tenantsCount === 0) {
            // User doesn't belong to any specific school/bimbel.
            // Assign them to the default KEMENDIK tenant
            $kemendik = Tenant::where('subdomain', 'kemendik')->first();
            if ($kemendik) {
                $user->switchTenant($kemendik);
            }

            return redirect()->intended(route('dashboard', absolute: false));
        } elseif ($tenantsCount === 1) {
            // If they only have one tenant, auto-switch to it.
            $tenant = $user->tenants()->first();
            $user->switchTenant($tenant);

            return redirect()->intended(route('dashboard', absolute: false));
        }

        // Multiple tenants, go to selector
        return redirect()->route('tenant.select');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
