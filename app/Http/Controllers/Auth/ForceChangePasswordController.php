<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ForceChangePasswordController extends Controller
{
    /**
     * Show the mandatory password change form.
     */
    public function show(Request $request): View|RedirectResponse
    {
        $user = $request->user();

        if (! $user?->must_change_password) {
            return redirect()->route('dashboard');
        }

        return view('auth.force-change-password', [
            'user' => $user,
        ]);
    }

    /**
     * Update password, clear mandatory flag, and force relogin.
     */
    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        if (! $user?->must_change_password) {
            return redirect()->route('dashboard');
        }

        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'not_in:Masuk123!',
            ],
        ], [
            'password.not_in' => 'Password baru tidak boleh sama dengan password default (Masuk123!). Silakan buat password baru yang unik.',
            'password.min' => 'Password baru minimal harus terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok dengan password baru.',
        ]);

        $user->forceFill([
            'password' => Hash::make($request->password),
            'must_change_password' => false,
        ])->save();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('status', 'Password berhasil diperbarui! Silakan login kembali dengan password baru Anda.');
    }
}
