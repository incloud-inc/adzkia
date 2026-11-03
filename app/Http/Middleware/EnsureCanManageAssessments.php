<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCanManageAssessments
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || $user->isStudent() || ! $user->canManageAssessments()) {
            abort(403, 'Akses ditolak: Siswa tidak diizinkan mengakses panel pengelolaan atau pembuatan asesmen.');
        }

        return $next($request);
    }
}
