<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MathStudioController extends Controller
{
    /**
     * Pastikan hanya Owner (Super User) dan Tenant level ENTERPRISE yang bisa mengakses.
     */
    protected function authorizeAccess(): void
    {
        $user = Auth::user();
        if (! $user) {
            abort(401);
        }

        // 1. Super User (Owner) selalu diizinkan
        if ($user->isSuperUser()) {
            return;
        }

        // 2. Siswa tidak memiliki izin
        if ($user->isStudent()) {
            abort(403, 'Akses Kamus Rumus terbatas untuk Pengelola dan Tenant level ENTERPRISE.');
        }

        // 3. Tenant harus berlevel Enterprise
        $tenant = $user->currentTenant ?? $user->tenants()->first();
        if (! $tenant || ! $tenant->isEnterprise()) {
            abort(403, 'Fitur Kamus Rumus & KaTeX Studio hanya tersedia untuk Pengelola (Owner) dan Tenant level ENTERPRISE.');
        }
    }

    /**
     * Tampilkan antarmuka Kamus Rumus & KaTeX Playground 2 Sisi.
     */
    public function index(Request $request): View
    {
        $this->authorizeAccess();

        return view('math.studio');
    }
}
