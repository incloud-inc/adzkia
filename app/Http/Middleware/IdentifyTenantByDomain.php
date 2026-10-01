<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Models\TenantDomain;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IdentifyTenantByDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();

        // Base domains for the central portal
        $centralDomains = ['adzkia.test', 'adzkia.id', 'localhost', '127.0.0.1'];

        if (! in_array($host, $centralDomains)) {
            // 1. Find tenant by custom domain in tenant_domains table (Multi-domain Enterprise / Pro)
            $tenantDomain = TenantDomain::where('domain', $host)->first();
            $tenant = $tenantDomain?->tenant;

            // 2. Fallback to exact domain match in tenants table
            if (! $tenant) {
                $tenant = Tenant::where('domain', $host)->first();
            }

            // 3. Fallback to subdomain check (e.g. subdomain.adzkia.id or subdomain.localhost)
            if (! $tenant) {
                $parts = explode('.', $host);
                if (count($parts) >= 2) {
                    $subdomain = $parts[0];
                    $tenant = Tenant::where('subdomain', $subdomain)->first();
                }
            }

            if ($tenant) {
                // If a user is logged in, switch to this tenant if they have access
                if (Auth::check()) {
                    $hasAccess = Auth::user()->tenants()->where('tenant_id', $tenant->id)->exists();
                    if ($hasAccess && Auth::user()->current_tenant_id !== $tenant->id) {
                        Auth::user()->switchTenant($tenant->id);
                    }
                }

                // Share tenant info for views
                app()->instance('currentTenant', $tenant);
            }
        }

        return $next($request);
    }
}
