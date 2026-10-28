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

        $isLocalhost = in_array($host, ['localhost', '127.0.0.1'], true) || str_ends_with($host, '.localhost');

        $isCentral = ! $isLocalhost && (
            in_array($host, ['adzkia.test', 'adzkia.id', $baseDomain], true)
            || str_ends_with($host, '.'.$baseDomain)
            || str_ends_with($host, '.adzkia.id')
            || str_ends_with($host, '.adzkia.test')
        );

        if ($isLocalhost) {
            // Localhost does not permit domain-attribute cookies in modern browsers (RFC 6265/RFC 6761).
            // Host-only cookie (domain => null) must be used.
            config(['session.domain' => null]);
        } elseif (! $isCentral) {
            // Custom domain (e.g. cbt.sekolah.sch.id): bind session cookie to this host
            config(['session.domain' => null]);
        } else {
            // Central domain & its subdomains in non-localhost (e.g. *.adzkia.id)
            $configuredDomain = config('session.domain') ?: env('SESSION_DOMAIN');
            $sessionDomain = $configuredDomain ?: ($baseDomain !== 'localhost' ? '.'.$baseDomain : null);
            config(['session.domain' => $sessionDomain]);
        }

        return $next($request);
    }
}
