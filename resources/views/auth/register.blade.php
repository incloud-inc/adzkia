<x-layouts.guest>
    {{-- HEADER --}}
    @php
        $targetTenant = $tenant ?? (app()->has('currentTenant') ? app('currentTenant') : null);
        if (! $targetTenant && request()->route('subdomain')) {
            $targetTenant = \App\Models\Tenant::where('subdomain', request()->route('subdomain'))->first();
        }
        if (! $targetTenant && request()->filled('tenant')) {
            $targetTenant = \App\Models\Tenant::where('subdomain', request('tenant'))->orWhere('id', request('tenant'))->first();
        }
    @endphp
    <header class="text-white px-6 py-4 flex items-center justify-between z-10 shrink-0 shadow-xs" style="background-color: #212529;">
        <!-- Kiri: Logo ADZKIA -->
        <div class="flex items-center">
            <a href="/" title="ADZKIA" class="inline-flex items-center gap-2.5">
                <img src="{{ asset('images/logo-adzkia.png') }}" alt="ADZKIA" class="h-9 sm:h-10 w-auto max-h-12 object-contain" onerror="this.src='{{ asset('logo-adzkia.png') }}'">
            </a>
        </div>

        <!-- Kanan: Foto Profil / Identitas Tenant -->
        @if ($targetTenant)
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-semibold text-white leading-tight truncate max-w-[200px]">{{ $targetTenant->name }}</p>
                    <p class="text-[10px] text-gray-400 leading-tight">Portal Institusi</p>
                </div>
                <div class="w-10 h-10 rounded-full ring-2 ring-white/20 p-0.5 overflow-hidden shrink-0 flex items-center justify-center bg-white shadow-xs" title="{{ $targetTenant->name }}">
                    <img src="{{ $targetTenant->logo_url }}" alt="{{ $targetTenant->name }}" class="w-full h-full object-contain rounded-full">
                </div>
            </div>
        @endif
    </header>

    {{-- KONTEN FORM --}}
    <section class="flex-1 flex flex-col justify-center p-6 sm:p-12 overflow-y-auto">
        <div class="w-full max-w-sm mx-auto">

            {{-- Banner Info Tenant / Undangan --}}
            <div class="mb-6 rounded-xl border border-green-6/50 bg-green-3 p-4">
                <div class="flex items-start gap-3">
                    <div class="shrink-0 mt-0.5 text-green-11">
                        @if($inviteToken)
                            <x-radix-icon name="envelope-closed" class="w-5 h-5" />
                        @else
                            <x-radix-icon name="id-card" class="w-5 h-5" />
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-green-11 font-semibold leading-snug">
                            @if($inviteToken)
                                Anda diundang ke <span class="font-bold">{{ $tenantName }}</span>
                            @else
                                Pendaftaran Siswa Baru di <span class="font-bold">{{ $tenantName }}</span>
                            @endif
                        </p>
                        <p class="mt-1 text-xs text-green-11/80">
                            Peran:
                            <span class="inline-flex items-center rounded-full bg-green-9 text-white font-semibold px-2 py-0.5 text-[10px] uppercase tracking-wider ml-1">
                                @switch($role)
                                    @case('A') Administrator @break
                                    @case('T') Guru / Pengawas @break
                                    @case('U') Siswa / Murid @break
                                    @default {{ $role }}
                                @endswitch
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <form id="register-form" method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                @if($inviteToken)
                    <input type="hidden" name="invite_token" value="{{ $inviteToken }}">
                @endif

                {{-- Nama Lengkap --}}
                <div class="flex flex-col gap-1.5">
                    <label for="name" class="font-medium text-xs text-gray-11">Nama Lengkap</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="person" class="w-4 h-4" />
                        </span>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                               placeholder="Masukkan nama lengkap"
                               class="w-full rounded-lg border border-gray-7 bg-white pl-9 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none @error('name') border-red-8 focus:border-red-8 focus:ring-red-8 @enderror" />
                    </div>
                    @error('name')
                        <p class="text-red-11 text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="flex flex-col gap-1.5">
                    <label for="email" class="font-medium text-xs text-gray-11">Email</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="envelope-closed" class="w-4 h-4" />
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email', $email) }}" required autocomplete="username"
                               placeholder="nama@email.com"
                               @if($inviteToken) readonly class="w-full rounded-lg border border-gray-6 bg-gray-2 pl-9 pr-3.5 py-2 text-sm text-gray-11 cursor-not-allowed outline-none"
                               @else class="w-full rounded-lg border border-gray-7 bg-white pl-9 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none @error('email') border-red-8 focus:border-red-8 focus:ring-red-8 @enderror" @endif />
                    </div>
                    @error('email')
                        <p class="text-red-11 text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="flex flex-col gap-1.5">
                    <label for="password" class="font-medium text-xs text-gray-11">Password</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="lock-closed" class="w-4 h-4" />
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                               placeholder="Minimal 8 karakter"
                               class="w-full rounded-lg border border-gray-7 bg-white pl-9 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none @error('password') border-red-8 focus:border-red-8 focus:ring-red-8 @enderror" />
                    </div>
                    @error('password')
                        <p class="text-red-11 text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Konfirmasi Password --}}
                <div class="flex flex-col gap-1.5">
                    <label for="password_confirmation" class="font-medium text-xs text-gray-11">Konfirmasi Password</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="lock-closed" class="w-4 h-4" />
                        </span>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                               placeholder="Ulangi password"
                               class="w-full rounded-lg border border-gray-7 bg-white pl-9 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none" />
                    </div>
                </div>

                {{-- Divider --}}
                <div class="relative flex items-center justify-center my-5">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-5"></div>
                    </div>
                    <div class="relative bg-white px-3 text-[11px] font-semibold text-gray-9 uppercase tracking-wider">
                        Atau
                    </div>
                </div>

                {{-- Google OAuth --}}
                <div>
                    <a href="{{ route('auth.google') }}"
                       class="w-full bg-white border border-gray-7 hover:bg-gray-2 text-gray-12 font-medium text-xs rounded-lg py-2.5 transition-all flex items-center justify-center gap-2 active:scale-[0.99] cursor-pointer shadow-[0_1px_2px_rgba(0,0,0,0.02)]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/></svg>
                        <span>Daftar dengan Google</span>
                    </a>
                </div>
            </form>

        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="shrink-0 bg-white border-t border-gray-6 flex flex-col z-10 shadow-[0_-4px_12px_rgba(0,0,0,0.03)]">
        <div class="w-full flex items-center justify-between px-6 py-3 bg-gray-2/70">
            <div class="text-xs font-medium text-gray-11">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-green-11 hover:text-green-12 hover:underline font-semibold">Masuk</a>
            </div>

            <button onclick="document.getElementById('register-form').submit()" class="shrink-0 h-9 px-5 rounded-lg text-xs font-semibold bg-green-9 hover:bg-green-10 active:bg-green-11 text-white flex items-center justify-center gap-1.5 transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer">
                <span>DAFTAR</span>
                <x-radix-icon name="arrow-right" class="w-3.5 h-3.5" />
            </button>
        </div>
    </footer>
</x-layouts.guest>
