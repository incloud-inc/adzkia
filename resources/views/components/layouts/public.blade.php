@props([
    'title' => 'ADZKIA CBT - Platform Ujian & Asesmen Terstandarisasi',
    'metaDescription' => 'Platform Ujian dan Asesmen ADZKIA CBT dengan Bank Soal ASLI dan Pembahasan AI. Solusi evaluasi terpadu untuk Sekolah, BIMBEL, Guru, dan Murid.',
])
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:image" content="{{ asset('images/logo-adzkia.png') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('adzkia black app.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('adzkia black app.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|outfit:500,600,700,800,900" rel="stylesheet" />

    <!-- Styles & Tailwind -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    @endif

    <style>
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            color: #1e293b;
            background-color: #f8fafc;
        }
        .font-display {
            font-family: 'Outfit', 'Plus Jakarta Sans', sans-serif;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col bg-slate-50 text-slate-800 antialiased selection:bg-emerald-100 selection:text-emerald-900">

    <!-- TOP NAVIGATION -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-3.5 flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group" title="Kembali ke Beranda ADZKIA CBT">
                <img src="{{ asset('images/logo-adzkia.png') }}" 
                     alt="ADZKIA CBT" 
                     class="h-8 sm:h-9 w-auto object-contain transition-transform group-hover:scale-[1.02]"
                     onerror="this.src='{{ asset('logo-adzkia.png') }}'">
            </a>

            <!-- Nav Links (Desktop) -->
            <nav class="hidden md:flex items-center gap-6 text-xs font-semibold text-slate-600">
                <a href="{{ url('/') }}" class="hover:text-emerald-700 transition-colors">Beranda</a>
                <a href="{{ route('pages.faq') }}" class="{{ request()->routeIs('pages.faq') ? 'text-emerald-700 font-bold' : 'hover:text-emerald-700' }} transition-colors">FAQ</a>
                <a href="{{ route('pages.terms') }}" class="{{ request()->routeIs('pages.terms') ? 'text-emerald-700 font-bold' : 'hover:text-emerald-700' }} transition-colors">Syarat &amp; Ketentuan</a>
                <a href="{{ route('pages.refund-policy') }}" class="{{ request()->routeIs('pages.refund-policy') ? 'text-emerald-700 font-bold' : 'hover:text-emerald-700' }} transition-colors">Refund Policy</a>
                <a href="{{ route('pages.contact') }}" class="{{ request()->routeIs('pages.contact') ? 'text-emerald-700 font-bold' : 'hover:text-emerald-700' }} transition-colors">Kontak</a>
            </nav>

            <!-- Actions -->
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" 
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold transition-all shadow-xs shadow-emerald-700/20 active:scale-[0.98]">
                        <span>Dashboard</span>
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 rounded-xl text-xs font-bold text-slate-700 hover:text-emerald-700 hover:bg-slate-100 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold transition-all shadow-xs shadow-emerald-700/20 active:scale-[0.98]">
                        <span>Daftar Gratis</span>
                    </a>
                @endauth

                <!-- Mobile Menu Button -->
                <button type="button" 
                        onclick="document.getElementById('mobile-nav').classList.toggle('hidden')" 
                        class="md:hidden p-2 rounded-xl text-slate-600 hover:text-emerald-700 hover:bg-slate-100 transition-colors"
                        aria-label="Menu Navigasi">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-nav" class="hidden md:hidden border-t border-slate-200/80 bg-white px-4 py-3 space-y-2 text-xs font-semibold">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg hover:bg-emerald-50 hover:text-emerald-700 transition-colors">Beranda</a>
            <a href="{{ route('pages.faq') }}" class="block px-3 py-2 rounded-lg {{ request()->routeIs('pages.faq') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'hover:bg-emerald-50 hover:text-emerald-700' }} transition-colors">FAQ (Tanya Jawab)</a>
            <a href="{{ route('pages.terms') }}" class="block px-3 py-2 rounded-lg {{ request()->routeIs('pages.terms') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'hover:bg-emerald-50 hover:text-emerald-700' }} transition-colors">Syarat &amp; Ketentuan</a>
            <a href="{{ route('pages.refund-policy') }}" class="block px-3 py-2 rounded-lg {{ request()->routeIs('pages.refund-policy') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'hover:bg-emerald-50 hover:text-emerald-700' }} transition-colors">Kebijakan Pengembalian Dana (Refund)</a>
            <a href="{{ route('pages.contact') }}" class="block px-3 py-2 rounded-lg {{ request()->routeIs('pages.contact') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'hover:bg-emerald-50 hover:text-emerald-700' }} transition-colors">Hubungi Kami (Kontak)</a>
            <a href="{{ route('pages.privacy') }}" class="block px-3 py-2 rounded-lg {{ request()->routeIs('pages.privacy') ? 'bg-emerald-50 text-emerald-700 font-bold' : 'hover:bg-emerald-50 hover:text-emerald-700' }} transition-colors">Kebijakan Privasi</a>
        </div>
    </header>

    <!-- MAIN BODY CONTENT -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- FOOTER (MATCHING LANDING PAGE WITH MANDATORY MERCHANT COMPLIANCE) -->
    <footer class="bg-slate-900 text-slate-300 border-t border-slate-800 mt-20 pt-16 pb-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-14 border-b border-slate-800/80 text-xs">
                
                <!-- Col 1: Brand Info & Mandatory Business Details -->
                <div class="lg:col-span-5 md:col-span-2">
                    <div class="inline-flex items-center gap-3 mb-4">
                        <img src="{{ asset('images/logo-adzkia.png') }}" 
                             alt="ADZKIA CBT" 
                             class="h-8 w-auto brightness-0 invert opacity-90"
                             onerror="this.src='{{ asset('logo-adzkia.png') }}'">
                    </div>
                    <p class="text-slate-400 leading-relaxed mb-4 max-w-md">
                        Aplikasi Ujian &amp; Asesmen ADZKIA CBT dengan Soal ASLI dan Pembahasan AI. Solusi evaluasi terpadu untuk Sekolah, BIMBEL, Guru, dan Murid di seluruh Indonesia.
                    </p>
                    <p class="text-[11px] text-emerald-400 font-medium italic mb-5 leading-normal">
                        "Pembelajaran Terbaik dari Guru &amp; Tutor Anda. Evaluasi Sempurna bersama ADZKIA CBT"
                    </p>

                    <!-- Contact & Business Address Block (Mandatory Merchant Compliance) -->
                    <div class="p-4 rounded-2xl bg-slate-800/80 border border-slate-700/60 space-y-2.5 text-xs text-slate-300">
                        <div class="font-bold text-white text-[11px] uppercase tracking-wider flex items-center gap-1.5 text-emerald-400">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span>Informasi Operasional &amp; Usaha</span>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-slate-300 leading-relaxed">
                                <strong>Alamat:</strong> Jalan Sriwijaya RUSUN BPKP KALTENG NO 314 RT 005 RW 014, Panarung, Pahandut, Kota Palangka Raya, Kalimantan Tengah. 73111
                            </span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span><strong>Telepon / WhatsApp:</strong> <a href="https://wa.me/6281329983555" target="_blank" class="text-emerald-400 hover:underline">081329983555</a></span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span><strong>Email Resmi:</strong> <a href="mailto:adzkia.tryout@gmail.com" class="text-emerald-400 hover:underline">adzkia.tryout@gmail.com</a></span>
                        </div>
                    </div>
                </div>

                <!-- Col 2: Cakupan Asesmen -->
                <nav aria-label="Cakupan Asesmen" class="lg:col-span-3 md:col-span-1">
                    <h3 class="font-bold text-white uppercase tracking-wider mb-4 text-xs">Cakupan Asesmen</h3>
                    <ul class="space-y-2.5 text-slate-400">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Kelas 1 - 6 SD (Fase A-C)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Kelas 7 - 9 SMP (Fase D)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Kelas 10 - 12 SMA/SMK (Fase E-F)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0 mt-1"></span>
                            <span>Soal Asli TKA, UTBK (Sejak 2019), &amp; SKD Kedinasan CPNS lengkap PEMBAHASAN</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>TOEIC Simulation, TOEFL Preparation, &amp; IELTS Mock Test</span>
                        </li>
                    </ul>
                </nav>

                <!-- Col 3: Kebijakan & Informasi -->
                <nav aria-label="Kebijakan & Informasi" class="lg:col-span-4 md:col-span-1">
                    <h3 class="font-bold text-white uppercase tracking-wider mb-4 text-xs">Kebijakan &amp; Informasi</h3>
                    <ul class="space-y-2.5 text-slate-400">
                        <li>
                            <a href="{{ route('pages.terms') }}" 
                               class="group flex items-center gap-2 hover:text-emerald-400 transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 group-hover:bg-emerald-400 group-hover:scale-125 transition-all shrink-0"></span>
                                <span class="hover:underline underline-offset-4 {{ request()->routeIs('pages.terms') ? 'text-emerald-400 font-bold' : '' }}">Syarat &amp; Ketentuan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.refund-policy') }}" 
                               class="group flex items-center gap-2 hover:text-emerald-400 transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 group-hover:bg-emerald-400 group-hover:scale-125 transition-all shrink-0"></span>
                                <span class="hover:underline underline-offset-4 {{ request()->routeIs('pages.refund-policy') ? 'text-emerald-400 font-bold' : '' }}">Kebijakan Pengembalian Dana (Refund Policy)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.faq') }}" 
                               class="group flex items-center gap-2 hover:text-emerald-400 transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 group-hover:bg-emerald-400 group-hover:scale-125 transition-all shrink-0"></span>
                                <span class="hover:underline underline-offset-4 {{ request()->routeIs('pages.faq') ? 'text-emerald-400 font-bold' : '' }}">Tanya Jawab (FAQ)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.contact') }}" 
                               class="group flex items-center gap-2 hover:text-emerald-400 transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 group-hover:bg-emerald-400 group-hover:scale-125 transition-all shrink-0"></span>
                                <span class="hover:underline underline-offset-4 {{ request()->routeIs('pages.contact') ? 'text-emerald-400 font-bold' : '' }}">Hubungi Kami (Kontak)</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pages.privacy') }}" 
                               class="group flex items-center gap-2 hover:text-emerald-400 transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 group-hover:bg-emerald-400 group-hover:scale-125 transition-all shrink-0"></span>
                                <span class="hover:underline underline-offset-4 {{ request()->routeIs('pages.privacy') ? 'text-emerald-400 font-bold' : '' }}">Kebijakan Privasi</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

            <!-- COPYRIGHT & COMPLIANCE BAR -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-slate-500">
                <p>
                    &copy; {{ date('Y') }} ADZKIA CBT. Seluruh hak cipta dilindungi undang-undang.
                </p>
                <div class="flex items-center gap-2 text-slate-400">
                    <svg class="w-3.5 h-3.5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span>Standar Enkripsi &amp; Kepatuhan UU Perlindungan Data Pribadi (UU PDP No. 27/2022)</span>
                </div>
            </div>

        </div>
    </footer>

</body>
</html>
