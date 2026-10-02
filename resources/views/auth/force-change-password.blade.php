<x-layouts.guest>
    <!-- HEADER -->
    @php
        $currentTenant = app()->has('currentTenant') ? app('currentTenant') : null;
        $headerLogo = ($currentTenant && $currentTenant->logo_path) 
            ? $currentTenant->logo_url 
            : asset('images/logo-adzkia.png');
        $headerTitle = ($currentTenant && $currentTenant->logo_path) 
            ? $currentTenant->name 
            : 'ADZKIA';
    @endphp
    <header class="text-white px-6 py-4 flex items-center justify-between z-10 shrink-0 shadow-xs" style="background-color: #212529;">
        <div class="flex items-center">
            <span class="inline-flex items-center">
                <img src="{{ $headerLogo }}" alt="{{ $headerTitle }}" class="h-10 sm:h-12 w-auto max-h-12 object-contain">
            </span>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="text-xs text-gray-8 hover:text-white transition-colors flex items-center gap-1.5 cursor-pointer">
                <x-radix-icon name="exit" class="w-4 h-4" />
                <span>Keluar</span>
            </button>
        </form>
    </header>

    <!-- CONTENT -->
    <section class="flex-1 flex flex-col justify-center p-6 sm:p-12 overflow-y-auto">
        <div class="w-full max-w-sm mx-auto">
            
            <div class="mb-6 text-center">
                <div class="w-12 h-12 rounded-2xl bg-amber-3 text-amber-11 border border-amber-6 flex items-center justify-center mx-auto mb-3 shadow-xs">
                    <x-radix-icon name="lock-closed" class="w-6 h-6" />
                </div>
                <h2 class="font-display font-bold text-2xl text-gray-12 tracking-tight">Wajib Ganti Password</h2>
                <p class="text-xs text-gray-11 font-normal mt-1.5 leading-relaxed">
                    Akun Anda saat ini menggunakan password default sistem. Demi perlindungan akun, Anda wajib membuat password baru sebelum dapat melanjutkan.
                </p>
            </div>

            <!-- Warning Notice -->
            <div class="mb-6 p-3.5 rounded-xl bg-amber-2 border border-amber-6/60 text-amber-12 text-xs leading-relaxed flex items-start gap-2.5">
                <x-radix-icon name="exclamation-triangle" class="w-4 h-4 text-amber-9 shrink-0 mt-0.5" />
                <div>
                    <strong>Penting:</strong> Setelah password berhasil diubah, sistem akan otomatis mengeluarkan sesi Anda dan Anda diminta untuk <strong>login kembali (re-login)</strong> dengan password baru.
                </div>
            </div>

            @if(session('warning'))
                <div class="mb-4 p-3 rounded-xl bg-amber-3 border border-amber-6/50 text-amber-11 text-xs font-semibold">
                    {{ session('warning') }}
                </div>
            @endif

            <form id="force-password-form" method="POST" action="{{ route('password.force_change.update') }}" class="space-y-4">
                @csrf

                <!-- Password Baru -->
                <div class="flex flex-col gap-1.5">
                    <label for="password" class="font-medium text-xs text-gray-11">Password Baru</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="lock-closed" class="w-4 h-4" />
                        </span>
                        <input id="password" type="password" name="password" required autofocus autocomplete="new-password" 
                               placeholder="Minimal 8 karakter baru"
                               class="w-full rounded-lg border border-gray-7 bg-white pl-9 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none @error('password') border-red-8 focus:border-red-8 focus:ring-red-8 @enderror" />
                    </div>
                    @error('password')
                        <p class="text-red-11 text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password Baru -->
                <div class="flex flex-col gap-1.5">
                    <label for="password_confirmation" class="font-medium text-xs text-gray-11">Konfirmasi Password Baru</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="lock-closed" class="w-4 h-4" />
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" 
                               placeholder="Ulangi password baru"
                               class="w-full rounded-lg border border-gray-7 bg-white pl-9 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none" />
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full h-10 px-4 rounded-xl text-xs font-bold bg-green-9 hover:bg-green-10 active:bg-green-11 text-white flex items-center justify-center gap-2 transition-all shadow-xs cursor-pointer active:scale-98">
                        <x-radix-icon name="check" class="w-4 h-4" />
                        <span>Simpan Password &amp; Relogin</span>
                    </button>
                </div>
            </form>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="shrink-0 bg-white border-t border-gray-6 flex flex-col z-10">
        <div class="w-full flex items-center justify-between px-6 py-3 bg-gray-2/70 text-xs text-gray-11">
            <span>Siswa / Murid: <strong class="text-gray-12">{{ $user->email }}</strong></span>
            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="text-red-11 hover:underline font-semibold cursor-pointer">Batal &amp; Keluar</button>
            </form>
        </div>
    </footer>
</x-layouts.guest>
