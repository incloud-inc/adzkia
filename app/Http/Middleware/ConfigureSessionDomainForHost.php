<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfigureSessionDomainForHost
{
    /**
     * Dynamically configure session cookie domain based on the request host.
     * Central domains & subdomains use the shared wildcard session domain (e.g. .localhost or .adzkia.id).
     * Custom domains (e.g. cbt.bimbelhebat.sch.id) use null to bind cookies to the host and prevent browser rejection.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $baseDomain = config('app.url_base_domain', 'localhost');
        $sessionDomain = env('SESSION_DOMAIN', '.'.$baseDomain);

        $isCentral = in_array($host, ['localhost', '127.0.0.1', 'adzkia.test', 'adzkia.id'], true)
            || str_ends_with($host, '.'.$baseDomain)
            || str_ends_with($host, '.localhost')
            || str_ends_with($host, '.adzkia.id')
            || str_ends_with($host, '.adzkia.test');

        if (! $isCentral) {
            // Custom domain: bind session cookie to this host
            config(['session.domain' => null]);
        } else {
            config(['session.domain' => $sessionDomain]);
        }

        return $next($request);
    }
}
