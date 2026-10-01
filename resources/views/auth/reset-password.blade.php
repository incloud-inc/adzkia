<x-layouts.guest>
    {{-- HEADER --}}
    <header class="bg-green-9 text-white px-6 py-4 flex justify-between items-center z-10 shrink-0">
        <div>
            <h1 class="font-display font-extrabold text-2xl tracking-tight leading-none mb-1">ADZKIA</h1>
            <p class="font-display text-xs text-green-3 font-semibold tracking-widest uppercase">Reset Password</p>
        </div>
    </header>

    {{-- KONTEN FORM --}}
    <section class="flex-1 flex flex-col justify-center p-6 sm:p-12 overflow-y-auto">
        <div class="w-full max-w-sm mx-auto">

            <div class="mb-8 text-center">
                <h2 class="font-display font-bold text-2xl text-gray-12 tracking-tight">Atur Password Baru</h2>
                <p class="text-sm text-gray-11 font-normal mt-1.5">Silakan buat password baru untuk akun Anda.</p>
            </div>

            <form id="reset-form" method="POST" action="{{ route('password.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email (readonly) --}}
                <div class="flex flex-col gap-1.5">
                    <label for="email" class="font-medium text-xs text-gray-11">Email</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="envelope-closed" class="w-4 h-4" />
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" readonly autocomplete="username"
                               class="w-full rounded-lg border border-gray-6 bg-gray-2 pl-9 pr-3.5 py-2 text-sm text-gray-11 cursor-not-allowed outline-none" />
                    </div>
                    @error('email')
                        <p class="text-red-11 text-xs font-medium">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password Baru --}}
                <div class="flex flex-col gap-1.5">
                    <label for="password" class="font-medium text-xs text-gray-11">Password Baru</label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3 text-gray-9 pointer-events-none">
                            <x-radix-icon name="lock-closed" class="w-4 h-4" />
                        </span>
                        <input id="password" type="password" name="password" required autofocus autocomplete="new-password"
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
                               placeholder="Ulangi password baru"
                               class="w-full rounded-lg border border-gray-7 bg-white pl-9 pr-3.5 py-2 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none" />
                    </div>
                </div>
            </form>

        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="shrink-0 bg-white border-t border-gray-6 flex flex-col z-10 shadow-[0_-4px_12px_rgba(0,0,0,0.03)]">
        <div class="w-full flex items-center justify-between px-6 py-3 bg-gray-2/70">
            <div class="text-xs font-medium text-gray-11">
                <a href="{{ route('login') }}" class="text-green-11 hover:text-green-12 hover:underline font-semibold">&larr; Kembali ke Masuk</a>
            </div>

            <button onclick="document.getElementById('reset-form').submit()" class="shrink-0 h-9 px-5 rounded-lg text-xs font-semibold bg-green-9 hover:bg-green-10 active:bg-green-11 text-white flex items-center justify-center gap-1.5 transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer">
                <span>RESET PASSWORD</span>
                <x-radix-icon name="arrow-right" class="w-3.5 h-3.5" />
            </button>
        </div>
    </footer>
</x-layouts.guest>
