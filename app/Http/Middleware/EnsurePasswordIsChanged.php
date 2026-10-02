<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsurePasswordIsChanged
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user && $user->must_change_password) {
            $allowedRouteNames = [
                'password.force_change',
                'password.force_change.update',
                'logout',
            ];

            $currentRouteName = $request->route()?->getName();

            if (! in_array($currentRouteName, $allowedRouteNames, true)) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Anda wajib mengganti password bawaan sebelum mengakses layanan.',
                    ], 403);
                }

                return redirect()->route('password.force_change');
            }
        }

        return $next($request);
    }
}
