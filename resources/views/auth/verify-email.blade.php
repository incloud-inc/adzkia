<x-layouts.guest>
    {{-- HEADER --}}
    <header class="bg-green-9 text-white px-6 py-4 flex justify-between items-center z-10 shrink-0">
        <div>
            <h1 class="font-display font-extrabold text-2xl tracking-tight leading-none mb-1">ADZKIA</h1>
            <p class="font-display text-xs text-green-3 font-semibold tracking-widest uppercase">Verifikasi Email</p>
        </div>
    </header>

    {{-- KONTEN --}}
    <section class="flex-1 flex flex-col justify-center p-6 sm:p-12 overflow-y-auto">
        <div class="w-full max-w-sm mx-auto text-center">

            {{-- Ikon Email --}}
            <div class="mb-6 flex justify-center">
                <div class="flex h-20 w-20 items-center justify-center rounded-full bg-green-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
            </div>

            <h2 class="font-display font-bold text-xl text-gray-12 tracking-tight">Cek Email Anda</h2>
            <p class="text-sm text-gray-11 mt-2">
                Kami telah mengirimkan tautan verifikasi ke email Anda.
            </p>
            <p class="text-xs text-gray-9 mt-1">
                Klik tautan di email untuk mengaktifkan akun Anda.
            </p>

            {{-- Session Status --}}
            @if (session('message'))
                <div class="mt-6 p-3 rounded-xl bg-green-3 border border-green-6/50 text-green-11 text-sm font-semibold">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Tombol Kirim Ulang --}}
            <form method="POST" action="{{ route('verification.send') }}" class="mt-6">
                @csrf
                <button type="submit"
                    class="w-full h-10 px-5 rounded-lg text-xs font-semibold bg-green-9 hover:bg-green-10 active:bg-green-11 text-white flex items-center justify-center gap-1.5 transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer">
                    <x-radix-icon name="envelope-closed" class="w-3.5 h-3.5" />
                    <span>Kirim Ulang Email Verifikasi</span>
                </button>
            </form>

        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="shrink-0 bg-white border-t border-gray-6 flex flex-col z-10 shadow-[0_-4px_12px_rgba(0,0,0,0.03)]">
        <div class="w-full flex items-center justify-between px-6 py-3 bg-gray-2/70">
            <span class="text-xs font-medium text-gray-11">Salah akun?</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="shrink-0 h-9 px-5 rounded-lg text-xs font-semibold bg-gray-3 hover:bg-gray-4 text-gray-12 flex items-center justify-center gap-1.5 transition-all cursor-pointer">
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </footer>
</x-layouts.guest>
