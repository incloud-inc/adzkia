<?php

use App\Http\Middleware\EnsurePasswordIsChanged;
use App\Http\Middleware\IdentifyTenantByDomain;
use App\Http\Middleware\SecurityHeaders;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Percayai IP dari Cloudflare Tunnel / Traefik
        $middleware->trustProxies(at: '*');

        $middleware->web(append: [
            IdentifyTenantByDomain::class,
            SecurityHeaders::class,
            EnsurePasswordIsChanged::class,
            \Illuminate\Session\Middleware\AuthenticateSession::class,
        ]);
        $middleware->validateCsrfTokens(except: [
            'api/webhooks/*',
            'webhooks/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
