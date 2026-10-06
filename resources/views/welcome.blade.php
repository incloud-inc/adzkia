<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Primary SEO Meta Tags -->
    <title>Aplikasi Ujian/Asesmen - ADZKIA CBT | Bank Soal ASLI & Pembahasan AI</title>
    <meta name="title" content="Aplikasi Ujian/Asesmen - ADZKIA CBT | Bank Soal ASLI & Pembahasan AI">
    <meta name="description" content="ADZKIA CBT adalah platform ujian dan asesmen untuk Sekolah dan BIMBEL dengan Bank Soal ASLI TKA, UTBK, dan SKD Kedinasan & CPNS. Soal Asli 2024, 2025, 2026 dan Prediksi 2027.">
    <meta name="keywords" content="Aplikasi Ujian Asesmen, ADZKIA CBT, CBT Sekolah, CBT Bimbel, TryOut UTBK 2025, TKA 2026, Prediksi 2027, Soal Asli, Pembahasan AI, Ujian Kedinasan, SKD CPNS">
    <meta name="author" content="ADZKIA Assessment Engine">
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Aplikasi Ujian/Asesmen - ADZKIA CBT | Bank Soal ASLI & Pembahasan AI">
    <meta property="og:description" content="ADZKIA CBT adalah platform ujian dan asesmen untuk Sekolah dan BIMBEL dengan Bank Soal ASLI TKA, UTBK, dan SKD Kedinasan & CPNS. Soal Asli 2024, 2025, 2026 dan Prediksi 2027.">
    <meta property="og:image" content="{{ asset('images/logo-adzkia.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="Aplikasi Ujian/Asesmen - ADZKIA CBT | Bank Soal ASLI & Pembahasan AI">
    <meta property="twitter:description" content="ADZKIA CBT adalah platform ujian dan asesmen untuk Sekolah dan BIMBEL dengan Bank Soal ASLI TKA, UTBK, dan SKD Kedinasan & CPNS. Soal Asli 2024, 2025, 2026 dan Prediksi 2027.">
    <meta property="twitter:image" content="{{ asset('images/logo-adzkia.png') }}">

    <!-- Structured Data: JSON-LD for GEO & Search Engines -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": "SoftwareApplication",
          "@@id": "{{ url('/') }}#software",
          "name": "Aplikasi Ujian & Asesmen ADZKIA CBT",
          "applicationCategory": "EducationalApplication",
          "operatingSystem": "Web, Android, iOS, Windows",
          "url": "{{ url('/') }}",
          "description": "ADZKIA CBT adalah platform ujian dan asesmen untuk Sekolah dan BIMBEL dengan Bank Soal ASLI TKA, UTBK, dan SKD Kedinasan & CPNS. Soal Asli 2024, 2025, 2026 dan Prediksi 2027.",
          "offers": {
            "@@type": "Offer",
            "price": "0",
            "priceCurrency": "IDR",
            "description": "Sesi demo dan konsultasi gratis untuk pimpinan Sekolah dan pemilik BIMBEL."
          },
          "featureList": [
            "Bank Soal Asli dan Prediksi TKA, UTBK dan SKD Kedinasan CPNS (Soal Asli 2024, 2025, 2026 dan Prediksi 2027)",
            "Generator Pembahasan AI Otomatis Langkah demi Langkah",
            "Sistem Pengawasan CBT Anti-Curang (Proctoring & Single Device Lock)",
            "Portal Ujian White-Label Mandiri (Custom Subdomain untuk Sekolah & Bimbel)",
            "Analisis Butir Soal dan Rekap Nilai Otomatis"
          ]
        },
        {
          "@@type": "EducationalOrganization",
          "@@id": "{{ url('/') }}#organization",
          "name": "ADZKIA CBT",
          "url": "{{ url('/') }}",
          "logo": "{{ asset('images/logo-adzkia.png') }}",
          "contactPoint": {
            "@@type": "ContactPoint",
            "telephone": "+62 813-2998-3555",
            "contactType": "customer service",
            "areaServed": "ID",
            "availableLanguage": "Indonesian"
          }
        },
        {
          "@@type": "FAQPage",
          "@@id": "{{ url('/') }}#faq",
          "mainEntity": [
            {
              "@@type": "Question",
              "name": "Apakah ADZKIA CBT membutuhkan server fisik lokal di sekolah?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Tidak perlu. ADZKIA CBT berbasis cloud server dengan auto-scaling sehingga sekolah tidak memerlukan server fisik di laboratorium dan bebas dari risiko server down saat ujian serentak."
              }
            },
            {
              "@@type": "Question",
              "name": "Apakah lembaga BIMBEL bisa menggunakan branding dan logo sendiri?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "Bisa. ADZKIA CBT mendukung multi-tenant dengan portal mandiri dan custom subdomain sehingga nama serta logo lembaga BIMBEL Anda tampil secara eksklusif."
              }
            },
            {
              "@@type": "Question",
              "name": "Materi dan jenjang apa saja yang tercakup dalam Bank Soal ADZKIA CBT?",
              "acceptedAnswer": {
                "@@type": "Answer",
                "text": "ADZKIA CBT menyediakan Bank Soal Asli dan Prediksi TKA, UTBK dan SKD Kedinasan CPNS (Soal Asli 2024, 2025, 2026 dan Prediksi 2027), serta asesmen lengkap untuk Kelas 1 SD hingga 12 SMA dan sertifikasi TOEIC, TOEFL, IELTS."
              }
            }
          ]
        }
      ]
    }
    </script>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('adzkia black app.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('adzkia black app.png') }}">

    <!-- Google / Bunny Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|outfit:500,600,700,800,900" rel="stylesheet" />

    <!-- Styles & Tailwind -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        :root {
            --brand-green: #2b8a3e;
            --brand-green-hover: #237032;
            --brand-accent: #51cf66;
            --brand-dark: #0f172a;
        }
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
        .mesh-gradient-bg {
            background-color: #f8fafc;
            background-image: 
                radial-gradient(at 0% 0%, rgba(43, 138, 62, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(14, 165, 233, 0.08) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(16, 185, 129, 0.04) 0px, transparent 50%);
        }
        .subtle-grid {
            background-size: 36px 36px;
            background-image: 
                linear-gradient(to right, rgba(0, 0, 0, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(0, 0, 0, 0.03) 1px, transparent 1px);
            -webkit-mask-image: linear-gradient(to bottom, black 0%, black 85%, transparent 100%);
            mask-image: linear-gradient(to bottom, black 0%, black 85%, transparent 100%);
        }
    </style>
</head>
<body class="mesh-gradient-bg min-h-screen text-slate-800 antialiased selection:bg-emerald-100 selection:text-emerald-900">

    <!-- FLOATING ISLAND NAVBAR -->
    <header class="fixed top-4 inset-x-0 z-50 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto">
            <nav class="bg-white/85 backdrop-blur-xl border border-slate-200/80 shadow-[0_8px_30px_rgb(0,0,0,0.06)] rounded-2xl px-4 sm:px-6 py-3 flex items-center justify-between transition-all duration-300">
                <!-- Logo ADZKIA -->
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group" title="Aplikasi Ujian ADZKIA">
                    <img src="{{ asset('images/logo-adzkia.png') }}" 
                         alt="Logo ADZKIA" 
                         class="h-8 sm:h-9 w-auto object-contain transition-transform group-hover:scale-[1.02]"
                         onerror="this.src='{{ asset('logo-adzkia.png') }}'">
                </a>

                <!-- Nav Anchors (Desktop) -->
                <div class="hidden lg:flex items-center gap-7 text-xs font-semibold text-slate-600">
                    <a href="#cakupan" class="hover:text-emerald-700 transition-colors">Cakupan Asesmen</a>
                    <a href="#solusi" class="hover:text-emerald-700 transition-colors">Solusi</a>
                    <a href="#keunggulan" class="hover:text-emerald-700 transition-colors">Kurikulum Lengkap</a>
                    <a href="#kontak" class="hover:text-emerald-700 transition-colors">Konsultasi</a>
                </div>

                <!-- Auth Action Buttons -->
                <div class="flex items-center gap-2.5">
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold transition-all shadow-sm shadow-emerald-700/20 active:scale-[0.98]">
                            <span>Buka Dashboard</span>
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="px-3.5 py-1.5 rounded-xl text-xs font-bold text-slate-700 hover:text-emerald-700 hover:bg-slate-100/80 transition-colors">
                            Masuk
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-slate-900 hover:bg-emerald-700 text-white text-xs font-bold transition-all shadow-sm active:scale-[0.98]">
                                <span>Daftar</span>
                                <span class="text-emerald-400">↗</span>
                            </a>
                        @endif
                    @endauth
                </div>
            </nav>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="relative pt-32 pb-20 sm:pt-40 sm:pb-28 overflow-hidden subtle-grid">
        <!-- Ambient Decorative Glow -->
        <div class="absolute -top-24 left-1/2 -translate-x-1/2 w-[680px] h-[340px] bg-gradient-to-tr from-emerald-400/20 via-teal-300/15 to-transparent blur-3xl pointer-events-none rounded-full"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative">
            <div class="text-center max-w-4xl mx-auto">
                
                <!-- Eyebrow Pill -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/95 border border-emerald-200/80 shadow-xs mb-6 text-xs font-semibold text-slate-800">
                    <span class="inline-flex items-center justify-center w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Sekolah & BIMBEL Optimalkan Pembelajaran, ADZKIA CBT Sempurnakan Pencapaian</span>
                </div>

                <!-- Judul LP: Aplikasi Ujian/Asesmen -->
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight text-slate-950 font-display leading-[1.08] mb-5">
                    Aplikasi Ujian/Asesmen<span class="text-emerald-700">.</span>
                </h1>

                <!-- Tagline: Soal ASLI, Pembahasan AI. -->
                <div class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight bg-gradient-to-r from-emerald-800 via-teal-700 to-slate-900 bg-clip-text text-transparent font-display mb-6">
                    Soal ASLI, Pembahasan AI.
                </div>

                <!-- Description / Hook -->
                <p class="text-base sm:text-lg lg:text-xl text-slate-600 font-normal leading-relaxed max-w-3xl mx-auto mb-10">
                    <span class="font-bold text-slate-900">ADZKIA CBT</span> adalah platform ujian dan asesmen untuk Sekolah dan BIMBEL dengan <span class="font-semibold text-slate-800">Bank Soal ASLI TKA, UTBK, dan SKD Kedinasan & CPNS</span>.
                </p>

                <!-- Hero CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 mb-14">
                    <a href="{{ Route::has('register') ? route('register') : route('login') }}" 
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-7 py-3.5 rounded-2xl bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-bold shadow-lg shadow-emerald-700/25 transition-all duration-200 active:scale-[0.98] group">
                        <span>Mulai Asesmen Sekarang</span>
                        <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center transition-transform group-hover:translate-x-0.5">
                            <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </div>
                    </a>

                    <a href="https://wa.me/6281329983555?text=Halo%20Tim%20ADZKIA%20CBT%2C%20saya%20tertarik%20untuk%20berkonsultasi%20mengenai%20platform%20ujian%20dan%20asesmen%20ADZKIA%20CBT%20untuk%20Sekolah%2FBIMBEL%20kami." 
                       target="_blank" 
                       rel="noopener noreferrer"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-2xl bg-white hover:bg-slate-50 text-slate-700 border border-slate-200/90 text-sm font-semibold shadow-xs transition-all duration-200 group">
                        <svg class="w-4 h-4 text-emerald-600 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span>Konsultasi Demo Sekolah / Bimbel</span>
                    </a>
                </div>

                <!-- Interactive Hero Teaser Card: Double Bezel Machined Look -->
                <div class="p-2 sm:p-3 rounded-3xl bg-slate-900/5 ring-1 ring-slate-900/10 shadow-2xl shadow-slate-900/10 max-w-3xl mx-auto">
                    <div class="bg-white rounded-2xl p-5 sm:p-7 border border-slate-100 text-left relative overflow-hidden">
                        
                        <!-- Top status line -->
                        <div class="flex flex-wrap items-center justify-between gap-3 pb-4 mb-4 border-b border-slate-100">
                            <div class="flex items-center gap-2.5">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                <span class="text-xs font-bold text-slate-900">Simulasi Asesmen & Pembahasan Soal</span>
                            </div>
                            <span class="text-[11px] font-bold text-emerald-800 bg-emerald-50 border border-emerald-200 px-2.5 py-0.5 rounded-full">
                                CBT Anti-Curang
                            </span>
                        </div>

                        <!-- Sample Question Body -->
                        <div class="space-y-3">
                            <p class="text-sm sm:text-base font-semibold text-slate-800 leading-snug">
                                <span class="text-emerald-800 font-bold">(PM UTBK 2025)</span> Untuk keperluan pengairan tanaman, sawah dilengkapi parit pemisah yang letaknya di antara tiap-tiap petak kecil. Sawah tersusun atas <strong>2 baris</strong> petak, masing-masing terdiri atas <strong>18 petak</strong> persegi panjang berukuran panjang <strong>4 m</strong> dan lebar <strong>3 m</strong>. Jika lebar setiap parit adalah <strong>0,5 m</strong>, luas total sawah beserta seluruh parit di dalamnya adalah … m².
                            </p>

                            <!-- Pilihan Ganda -->
                            <div class="grid grid-cols-2 sm:grid-cols-5 gap-2 pt-1 text-xs font-semibold text-slate-600">
                                <div class="p-2 rounded-xl bg-slate-50 border border-slate-200 text-center">A. 486,00 m²</div>
                                <div class="p-2 rounded-xl bg-slate-50 border border-slate-200 text-center">B. 504,50 m²</div>
                                <div class="p-2 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-900 font-bold text-center">C. 523,25 m²</div>
                                <div class="p-2 rounded-xl bg-slate-50 border border-slate-200 text-center">D. 542,00 m²</div>
                                <div class="p-2 rounded-xl bg-slate-50 border border-slate-200 text-center">E. 560,75 m²</div>
                            </div>

                            <!-- Kotak Pembahasan AI: Simulasi Aman Tanpa API Key -->
                            <div id="ai-simulation-wrapper" class="mt-4 pt-4 border-t border-slate-100">
                                <!-- Tombol Simulasi Generate Pembahasan AI -->
                                <div id="ai-btn-container" class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <button type="button" 
                                            id="btn-simulate-ai"
                                            onclick="simulateAiExplanation()"
                                            class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold shadow-xs hover:shadow-md transition-all active:scale-[0.98] cursor-pointer group">
                                        <span class="w-2 h-2 rounded-full bg-emerald-300 animate-ping"></span>
                                        <span>✨ Generate Pembahasan AI</span>
                                        <span class="text-emerald-200 text-xs transition-transform group-hover:translate-x-0.5">→</span>
                                    </button>
                                    <span class="text-[11px] text-slate-400 font-medium italic">Klik untuk melihat simulasi penjelasan cerdas step-by-step</span>
                                </div>

                                <!-- Status Loading Simulasi -->
                                <div id="ai-loading-box" class="hidden p-4 rounded-xl bg-emerald-50/60 border border-emerald-100 text-xs text-emerald-900 items-center gap-3">
                                    <svg class="animate-spin h-4 w-4 text-emerald-700 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                    <span class="font-semibold">Menganalisis konsep geometri dan langkah kalkulasi penalaran matematika...</span>
                                </div>

                                <!-- Hasil Pembahasan AI (Mode Markdown View) -->
                                <div id="ai-result-box" class="hidden p-4 sm:p-5 rounded-2xl bg-gradient-to-br from-slate-50 to-emerald-50/40 border border-emerald-200/90 shadow-sm relative overflow-hidden transition-all duration-300">
                                    <div class="flex flex-wrap items-center justify-between gap-2 pb-3 mb-3.5 border-b border-slate-200">
                                        <div class="flex items-center gap-2">
                                            <div class="w-6 h-6 rounded-lg bg-emerald-700 text-white flex items-center justify-center shrink-0 shadow-xs text-xs font-bold">
                                                ✦
                                            </div>
                                            <span class="text-xs font-bold text-slate-900">Pembahasan AI: Penalaran Matematika</span>
                                            <span class="text-[10px] font-bold bg-emerald-100 text-emerald-800 px-2.5 py-0.5 rounded-full border border-emerald-200 flex items-center gap-1">
                                                <svg class="w-3 h-3 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                                <span>Mode Markdown View</span>
                                            </span>
                                        </div>

                                        <!-- Tab Selector: Markdown Rendered vs Raw Markdown (.md) -->
                                        <div class="flex items-center gap-2">
                                            <div class="inline-flex items-center bg-slate-100 rounded-lg p-0.5 text-[11px]">
                                                <button type="button" 
                                                        id="tab-btn-rendered"
                                                        onclick="setMarkdownTab('rendered')"
                                                        class="px-2.5 py-1 rounded-md bg-white text-emerald-800 font-bold shadow-2xs border border-emerald-200/60 cursor-pointer transition-all">
                                                    📄 Markdown Rendered
                                                </button>
                                                <button type="button" 
                                                        id="tab-btn-raw"
                                                        onclick="setMarkdownTab('raw')"
                                                        class="px-2.5 py-1 rounded-md text-slate-500 hover:text-slate-800 font-semibold cursor-pointer transition-all">
                                                    💻 Raw .md
                                                </button>
                                            </div>
                                            <button type="button" onclick="resetAiExplanation()" class="text-[11px] text-slate-400 hover:text-slate-700 font-medium underline cursor-pointer ml-1">
                                                Tutup
                                            </button>
                                        </div>
                                    </div>

                                    <!-- 1. TAB: MARKDOWN RENDERED VIEW -->
                                    <div id="md-rendered-view" class="space-y-3.5 text-xs text-slate-700 font-sans leading-relaxed">
                                        
                                        <!-- Heading 1 Markdown -->
                                        <div class="bg-white/95 rounded-xl p-3.5 border border-slate-200/80 shadow-2xs">
                                            <h4 class="text-xs font-extrabold text-slate-900 mb-1.5 flex items-center gap-1.5 font-display">
                                                <span class="text-emerald-700 font-bold">###</span>
                                                <span>1. Identifikasi Jumlah Petak & Sekat Parit</span>
                                            </h4>
                                            <p class="text-slate-600 pl-4 leading-relaxed">
                                                Sawah memiliki <strong>2 baris</strong> petak dan masing-masing berisi <strong>18 petak</strong> (panjang tiap petak <code class="px-1.5 py-0.5 rounded bg-slate-100 font-mono text-[11px] text-emerald-800 font-semibold">p = 4 m</code>, lebar <code class="px-1.5 py-0.5 rounded bg-slate-100 font-mono text-[11px] text-emerald-800 font-semibold">l = 3 m</code>, lebar parit <code class="px-1.5 py-0.5 rounded bg-slate-100 font-mono text-[11px] text-emerald-800 font-semibold">0,5 m</code>).
                                            </p>
                                            <p class="text-slate-600 pl-4 mt-1">
                                                Karena parit hanya terletak di antara petak (bukan keliling terluar), maka jumlah celah pemisah adalah <code class="px-1.5 py-0.5 rounded bg-slate-100 font-mono text-[11px] text-slate-800 font-semibold">(n - 1)</code>:
                                            </p>
                                            <ul class="list-disc list-inside pl-6 mt-1 space-y-0.5 text-slate-700 font-medium">
                                                <li><strong>Arah Memanjang (18 petak):</strong> <span class="text-slate-600">(18 - 1) =</span> <strong class="text-emerald-800">17 parit pemisah</strong></li>
                                                <li><strong>Arah Melebar (2 baris):</strong> <span class="text-slate-600">(2 - 1) =</span> <strong class="text-emerald-800">1 parit pemisah</strong></li>
                                            </ul>
                                        </div>

                                        <!-- Heading 2 Markdown -->
                                        <div class="bg-white/95 rounded-xl p-3.5 border border-slate-200/80 shadow-2xs">
                                            <h4 class="text-xs font-extrabold text-slate-900 mb-1.5 flex items-center gap-1.5 font-display">
                                                <span class="text-emerald-700 font-bold">###</span>
                                                <span>2. Dimensi Total Sawah Beserta Parit</span>
                                            </h4>
                                            <div class="pl-4 space-y-1.5">
                                                <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-200/70 font-mono text-[11px] text-slate-800">
                                                    <div>• <strong>Panjang Total</strong> = (18 × 4 m) + (17 × 0,5 m) = 72 m + 8,5 m = <strong class="text-emerald-700">80,5 meter</strong></div>
                                                    <div>• <strong>Lebar Total</strong>   = (2 × 3 m) + (1 × 0,5 m) = 6 m + 0,5 m = <strong class="text-emerald-700">6,5 meter</strong></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Heading 3 Markdown: Formula & Kalkulasi -->
                                        <div class="bg-white/95 rounded-xl p-3.5 border border-slate-200/80 shadow-2xs">
                                            <h4 class="text-xs font-extrabold text-slate-900 mb-1.5 flex items-center gap-1.5 font-display">
                                                <span class="text-emerald-700 font-bold">###</span>
                                                <span>3. Kalkulasi Luas Total Sawah Beserta Parit</span>
                                            </h4>
                                            <div class="pl-4">
                                                <div class="p-2.5 rounded-lg bg-slate-900 text-emerald-300 font-mono text-xs shadow-inner">
                                                    Luas Total = Panjang Total × Lebar Total<br>
                                                    Luas Total = 80,5 m × 6,5 m = <strong class="text-emerald-200 underline">523,25 m²</strong>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Final Result Callout Card -->
                                        <div class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-300 text-center shadow-xs">
                                            <div class="text-[11px] uppercase tracking-wider font-bold text-emerald-800 mb-0.5">### Kunci Jawaban Akhir</div>
                                            <div class="text-base sm:text-lg font-extrabold text-emerald-950 font-display">
                                                ✅ Kunci Jawaban: C (523,25 m²)
                                            </div>
                                        </div>

                                        <!-- Markdown Blockquote: Tips Cepat AI -->
                                        <blockquote class="border-l-4 border-emerald-600 pl-3.5 py-2 bg-emerald-50/70 text-slate-700 rounded-r-xl shadow-2xs">
                                            <div class="font-bold text-emerald-950 text-xs flex items-center gap-1.5 mb-1">
                                                <span>💡 Tips Cepat AI:</span>
                                            </div>
                                            <p class="text-[11px] text-slate-600 leading-relaxed">
                                                Formula cepat: <code class="px-1 py-0.5 rounded bg-white text-emerald-800 font-semibold border border-emerald-200 font-mono">Luas = (18p + 8,5) × (2l + 0,5)</code>. Substitusi langsung <code class="px-1 py-0.5 rounded bg-white text-emerald-800 font-semibold border border-emerald-200 font-mono">p = 4</code> dan <code class="px-1 py-0.5 rounded bg-white text-emerald-800 font-semibold border border-emerald-200 font-mono">l = 3</code> menghasilkan <strong class="text-emerald-900">80,5 × 6,5 = 523,25 m²</strong> tanpa risiko salah hitung aljabar. Pembahasan AI membimbing murid memahami alur logika secara visual dan terstruktur!
                                            </p>
                                        </blockquote>

                                    </div>

                                    <!-- 2. TAB: RAW MARKDOWN SOURCE CODE VIEW (.md) -->
                                    <div id="md-raw-view" class="hidden rounded-xl bg-slate-950 p-4 font-mono text-[11px] leading-relaxed text-slate-300 overflow-x-auto border border-slate-800 shadow-inner">
                                        <div class="flex items-center justify-between pb-2 mb-3 border-b border-slate-800 text-[10px] text-slate-400">
                                            <span class="flex items-center gap-1.5">
                                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                                <span class="font-semibold text-slate-200">pembahasan-utbk-pm2025.md</span>
                                            </span>
                                            <span class="bg-slate-800 text-slate-300 px-2 py-0.5 rounded text-[10px]">GFM Markdown</span>
                                        </div>
<pre class="text-slate-300 whitespace-pre-wrap font-mono select-all">### 1. Identifikasi Jumlah Petak & Sekat Parit
* Sawah memiliki **2 baris** petak, masing-masing berisi **18 petak**.
* Dimensi tiap petak: panjang `p = 4 m`, lebar `l = 3 m`, serta lebar parit `0,5 m`.
* Karena parit hanya berada *di antara* petak (bukan keliling terluar), jumlah celah sekat pemisah selalu `(n - 1)`:
  - **Arah Memanjang (18 petak):** `(18 - 1) = 17 parit pemisah`
  - **Arah Melebar (2 baris):** `(2 - 1) = 1 parit pemisah`

### 2. Dimensi Total Sawah Beserta Parit
* **Panjang Total** = `(18 × 4 m) + (17 × 0,5 m) = 72 m + 8,5 m = 80,5 meter`
* **Lebar Total**   = `(2 × 3 m) + (1 × 0,5 m) = 6 m + 0,5 m = 6,5 meter`

### 3. Kalkulasi Luas Total Sawah Beserta Parit
$$\text{Luas Total} = \text{Panjang Total} \times \text{Lebar Total}$$
$$\text{Luas Total} = 80,5\text{ m} \times 6,5\text{ m} = \mathbf{523,25\text{ m}^2}$$

### 🏆 Kunci Jawaban Akhir
**✅ Kunci Jawaban: C (523,25 m²)**

> **💡 Tips Cepat AI:**
> Formula cepat: `Luas = (18p + 8,5) × (2l + 0,5)`.
> Substitusi langsung `p = 4` dan `l = 3` menghasilkan `80,5 × 6,5 = 523,25 m²` tanpa risiko salah hitung aljabar.</pre>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <script>
                    function simulateAiExplanation() {
                        const btn = document.getElementById('ai-btn-container');
                        const loading = document.getElementById('ai-loading-box');
                        const result = document.getElementById('ai-result-box');

                        if (!btn || !loading || !result) return;
                        btn.classList.add('hidden');
                        loading.classList.remove('hidden');
                        loading.classList.add('flex');

                        setTimeout(function() {
                            loading.classList.add('hidden');
                            loading.classList.remove('flex');
                            result.classList.remove('hidden');
                            setMarkdownTab('rendered');
                        }, 400);
                    }

                    function resetAiExplanation() {
                        const btn = document.getElementById('ai-btn-container');
                        const loading = document.getElementById('ai-loading-box');
                        const result = document.getElementById('ai-result-box');

                        if (!btn || !loading || !result) return;
                        result.classList.add('hidden');
                        loading.classList.add('hidden');
                        btn.classList.remove('hidden');
                    }

                    function setMarkdownTab(mode) {
                        const rendered = document.getElementById('md-rendered-view');
                        const raw = document.getElementById('md-raw-view');
                        const tabRendered = document.getElementById('tab-btn-rendered');
                        const tabRaw = document.getElementById('tab-btn-raw');

                        if (!rendered || !raw || !tabRendered || !tabRaw) return;

                        if (mode === 'rendered') {
                            rendered.classList.remove('hidden');
                            raw.classList.add('hidden');
                            tabRendered.className = "px-2.5 py-1 rounded-md bg-white text-emerald-800 font-bold shadow-2xs border border-emerald-200/60 cursor-pointer transition-all";
                            tabRaw.className = "px-2.5 py-1 rounded-md text-slate-500 hover:text-slate-800 font-semibold cursor-pointer transition-all";
                        } else {
                            rendered.classList.add('hidden');
                            raw.classList.remove('hidden');
                            tabRendered.className = "px-2.5 py-1 rounded-md text-slate-500 hover:text-slate-800 font-semibold cursor-pointer transition-all";
                            tabRaw.className = "px-2.5 py-1 rounded-md bg-slate-900 text-emerald-400 font-bold shadow-2xs border border-slate-700 cursor-pointer transition-all";
                        }
                    }
                </script>

            </div>
        </div>
    </section>


    <!-- SECTION: CARD INFO MENDATAR -->
    <section id="cakupan" class="py-20 sm:py-28 bg-white border-y border-slate-200/80 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            
            <!-- Section Header -->
            <div class="max-w-3xl mb-12 sm:mb-16">
                <div class="inline-flex items-center gap-2 text-xs font-bold text-emerald-800 bg-emerald-50 border border-emerald-200/80 px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                    Cakupan & Indikator Layanan
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-display tracking-tight leading-tight">
                    Ekosistem Lengkap untuk Semua Jenjang & Kebutuhan Asesmen
                </h2>
                <p class="text-sm sm:text-base text-slate-600 mt-2.5 leading-relaxed">
                    Setiap modul dirancang spesifik untuk mendukung sekolah, bimbingan belajar, dan jutaan pelajar di seluruh Indonesia.
                </p>
            </div>

            <!-- 9 CARDS INFO MENDATAR (HORIZONTAL CARDS) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                <!-- CARD 1: x Sekolah dan BIMBEL Menggunakan ADZKIA -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0 text-emerald-700 group-hover:scale-105 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50/80 border border-emerald-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Mitra Terpercaya
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            {{ $stats['tenants']['count'] ?? '50+' }}
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Sekolah dan BIMBEL Menggunakan ADZKIA
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Portal mandiri, logo custom, dan bank soal terisolasi.
                        </p>
                    </div>
                </div>

                <!-- CARD 2: x Murid (Siswa) Asesmen di ADZKIA -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-sky-50 border border-sky-100 flex items-center justify-center shrink-0 text-sky-700 group-hover:scale-105 group-hover:bg-sky-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-sky-800 bg-sky-50 border border-sky-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Peserta Didik
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            {{ $stats['students']['count'] ?? '15.000+' }}
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Murid (Siswa) melaksanakan Asesmen di ADZKIA
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Mengerjakan kuis, tryout, dan latihan dengan nyaman di mobile & PC.
                        </p>
                    </div>
                </div>

                <!-- CARD 3: x Asesmen untuk Kelas 1 SD sampai 12 SMA -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-50 border border-indigo-100 flex items-center justify-center shrink-0 text-indigo-700 group-hover:scale-105 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-800 bg-indigo-50 border border-indigo-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Semua Tingkat
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            12 Jenjang
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Asesmen untuk Kelas 1 SD sampai 12 SMA
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Kurikulum Merdeka & K-13 dengan kisi-kisi per fase belajar.
                        </p>
                    </div>
                </div>

                <!-- CARD 4: x Asesmen untuk TKA, UTBK, dan SKD Kedinasan CPNS -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-amber-50 border border-amber-100 flex items-center justify-center shrink-0 text-amber-700 group-hover:scale-105 group-hover:bg-amber-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-amber-800 bg-amber-50 border border-amber-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Seleksi Nasional
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            TKA • UTBK • SKD
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Asesmen untuk TKA, UTBK, dan SKD Kedinasan CPNS
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">
                            Soal Asli 2024, 2025, 2026 dan Prediksi 2027. Format tes CAT resmi: TWK, TIU, TKP, Penalaran Umum, & Kuantitatif.
                        </p>
                    </div>
                </div>

                <!-- CARD 5: x TOEIC, x TOEFL, x IELTS -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-purple-50 border border-purple-100 flex items-center justify-center shrink-0 text-purple-700 group-hover:scale-105 group-hover:bg-purple-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-purple-800 bg-purple-50 border border-purple-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Sertifikasi Bahasa
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            Global Test
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            TOEIC, TOEFL, dan IELTS
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Listening audio player, reading comprehension, dan konversi skor akurat.
                        </p>
                    </div>
                </div>

                <!-- CARD 6: xxx Bank Soal Tersedia di ADZKIA -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-teal-50 border border-teal-100 flex items-center justify-center shrink-0 text-teal-700 group-hover:scale-105 group-hover:bg-teal-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-teal-800 bg-teal-50 border border-teal-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Repositori Butir Soal
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            {{ $stats['question_bank']['count'] ?? '25.000+' }}
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Bank Soal Tersedia di ADZKIA
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Klasifikasi HOTS, persamaan LaTeX, tabel, dan gambar visual resolusi tinggi.
                        </p>
                    </div>
                </div>

                <!-- CARD 7: Sudah x Total Asesmen dilaksanakan -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0 text-emerald-700 group-hover:scale-105 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Akumulasi CBT
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            {{ $stats['total_exams']['count'] ?? '120.000+' }}
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Sesi Asesmen dilaksanakan
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Teruji melayani sesi paralel skala besar dengan zero server lag.
                        </p>
                    </div>
                </div>

                <!-- CARD 8: Sudah x Asesmen dilaksanakan bulan ini -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-rose-50 border border-rose-100 flex items-center justify-center shrink-0 text-rose-700 group-hover:scale-105 group-hover:bg-rose-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-rose-800 bg-rose-50 border border-rose-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Aktivitas Bulanan
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            {{ $stats['month_exams']['count'] ?? '8.450+' }}
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Sesi Asesmen dilaksanakan bulan ini
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Penilaian harian, tryout periodik, dan evaluasi bulanan berjalan lancar.
                        </p>
                    </div>
                </div>

                <!-- CARD 9: Sudah x Asesmen dilaksanakan pekan ini -->
                <div class="p-5 rounded-2xl bg-white border border-slate-200 hover:border-emerald-500 shadow-xs hover:shadow-md transition-all duration-200 flex flex-row items-center gap-4 group">
                    <div class="w-14 h-14 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center shrink-0 text-emerald-700 group-hover:scale-105 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div class="min-w-0 flex-1">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 border border-emerald-100 px-2 py-0.5 rounded-md inline-block mb-1">
                            Aktivitas Pekanan
                        </span>
                        <div class="text-2xl font-black text-slate-900 tracking-tight font-display">
                            {{ $stats['week_exams']['count'] ?? '2.180+' }}
                        </div>
                        <h3 class="text-xs sm:text-sm font-bold text-slate-800 leading-snug">
                            Sesi Asesmen dilaksanakan pekan ini
                        </h3>
                        <p class="text-[11px] text-slate-500 mt-0.5 truncate">
                            Kuis adaptif dan tes terformat intensif dalam 7 hari terakhir.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- SECTION: SOLUSI UNGGULAN & AI DEEP DIVE -->
    <section id="solusi" class="py-20 sm:py-28 subtle-grid relative overflow-hidden isolate">
        <!-- Target Anchor untuk Navigasi Kurikulum Lengkap & Solusi -->
        <div id="keunggulan" class="absolute -top-24 left-0"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold text-emerald-800 bg-emerald-50 border border-emerald-200/80 px-3 py-1 rounded-full uppercase tracking-wider">
                    Keunggulan Arsitektur
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-950 font-display tracking-tight mt-3">
                    Mengapa Sekolah & BIMBEL Memilih ADZKIA?
                </h2>
                <p class="text-slate-600 text-sm sm:text-base mt-2">
                    Kombinasi bank soal terverifikasi, kecerdasan buatan, dan keamanan CBT tanpa kompromi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                
                <!-- Solusi 1: Soal ASLI & Variatif -->
                <div class="p-7 rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center mb-5 font-bold">
                            01
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Soal ASLI Terstandarisasi</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Bukan sekadar soal acak buatan mesin yang tidak relevan. Butir soal disesuaikan kisi-kisi resmi BSKAP Kemendikbudristek, BKN, dan ETS internasional.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 text-xs font-semibold text-emerald-800 flex items-center gap-1">
                        <span>Pilihan Ganda, Asosiasi, Benar-Salah, & Esai</span>
                    </div>
                </div>

                <!-- Solusi 2: Pembahasan AI Interaktif -->
                <div class="p-7 rounded-3xl bg-white border border-emerald-200/90 shadow-md shadow-emerald-700/5 relative flex flex-col justify-between ring-2 ring-emerald-500/10">
                    <div class="absolute -top-3 right-6 bg-emerald-700 text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full">
                        AI Powered
                    </div>
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-700 text-white flex items-center justify-center mb-5 font-bold shadow-sm">
                            02
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Pembahasan Berbasis AI</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Setiap nomor soal dilengkapi pembahasan cerdas instan. Murid memahami bukan hanya kunci jawaban, tetapi alur berpikir logis dan konsep dasarnya.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 text-xs font-semibold text-emerald-800 flex items-center gap-1">
                        <span>Guru menjelaskan singkat,<br>AI menjabarkan sampai jelas.</span>
                    </div>
                </div>

                <!-- Solusi 3: Integritas Ujian & Proctoring -->
                <div class="p-7 rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-800 flex items-center justify-center mb-5 font-bold">
                            03
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Sistem Anti-Curang Tegas</h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Enforcement single device, auto-lock saat ganti tab, pemangkasan durasi atau poin otomatis oleh pengawas, serta PIN darurat verifikasi murid.
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 text-xs font-semibold text-slate-700 flex items-center gap-1">
                        <span>Keamanan ujian CBT kelas enterprise</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <!-- FOOTER & CALL TO ACTION (MODERN WEB GUIDANCE) -->
    <footer id="kontak" role="contentinfo" class="bg-slate-950 text-slate-300 pt-20 pb-12 relative overflow-hidden -mt-px isolate">
        
        <!-- Subtle Ambient Glow Terisolasi -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
            <div class="absolute bottom-0 right-1/4 w-[500px] h-[300px] bg-emerald-600/10 blur-[130px] rounded-full"></div>
            <div class="absolute top-1/4 left-10 w-[400px] h-[250px] bg-slate-800/20 blur-[100px] rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 relative">
            
            <!-- SOFT SELLING CTA CARD -->
            <div class="rounded-3xl bg-gradient-to-br from-slate-900 via-slate-900/95 to-emerald-950/70 border border-slate-800/90 p-8 sm:p-12 mb-16 shadow-2xl relative overflow-hidden group">

                <div class="max-w-3xl">
                    <!-- Slogan Badge Penutup -->
                    <div class="inline-flex items-center gap-2 text-xs font-semibold text-emerald-300 bg-emerald-950/80 border border-emerald-800/70 px-4 py-1.5 rounded-full mb-5 shadow-inner">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span>Pembelajaran Terbaik dari Guru &amp; Tutor Anda. Evaluasi Sempurna bersama ADZKIA CBT</span>
                    </div>

                    <h2 class="text-2xl sm:text-4xl font-extrabold text-white font-display tracking-tight leading-tight mb-4">
                        Siap Menghadirkan Standar Asesmen Terbaik untuk Murid Anda?
                    </h2>
                    <p class="text-sm sm:text-base text-slate-400 leading-relaxed mb-8 max-w-2xl font-normal">
                        Kami percaya bahwa setiap sekolah dan lembaga bimbingan belajar memiliki ritme serta tantangan evaluasi yang unik. Anda tidak perlu langsung berlangganan—mari berdiskusi santai, mengeksplorasi contoh bank soal kami, atau mencoba fitur AI kami secara cuma-cuma.
                    </p>

                    <!-- Soft Selling Action Row -->
                    <div class="flex flex-wrap items-center gap-4">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                                class="inline-flex min-h-[48px] items-center gap-2.5 px-6 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white text-xs sm:text-sm font-bold shadow-lg shadow-emerald-700/25 transition-all duration-200 hover:-translate-y-0.5 active:scale-[0.98]">
                                <span>Coba Gratis Tanpa Komitmen</span>
                                <span class="text-emerald-200">↗</span>
                            </a>
                        @endif

                        <!-- Tombol WhatsApp tanpa menampilkan nomor telepon di teks -->
                        <a href="https://wa.me/6281329983555?text=Halo%20Tim%20ADZKIA%20CBT%2C%20saya%20tertarik%20untuk%20berkonsultasi%20mengenai%20platform%20ujian%20dan%20asesmen%20ADZKIA%20CBT%20untuk%20Sekolah%2FBIMBEL%20kami." 
                           target="_blank" 
                           rel="noopener noreferrer"
                           aria-label="Konsultasi Kemitraan via WhatsApp"
                           class="inline-flex min-h-[48px] items-center gap-2.5 px-5 py-3 rounded-xl bg-emerald-700/90 hover:bg-emerald-600 text-white border border-emerald-500/50 text-xs sm:text-sm font-semibold transition-all duration-200 hover:-translate-y-0.5 shadow-md shadow-emerald-950/40">
                            <svg class="w-4.5 h-4.5 text-white shrink-0" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            <span>Konsultasi via WhatsApp</span>
                        </a>

                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" 
                               class="text-xs text-slate-400 hover:text-white transition-colors ml-auto sm:ml-auto">
                                Sudah punya akun? Masuk di sini →
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- FOOTER LINKS & BRANDING (3-COLUMN RESPONSIVE GRID) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-14 border-b border-slate-800/80 text-xs">
                
                <!-- Col 1: Brand Info & Value Proposition -->
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
                    <p class="text-[11px] text-emerald-400 font-medium italic mb-4 leading-normal">
                        "Pembelajaran Terbaik dari Guru &amp; Tutor Anda. Evaluasi Sempurna bersama ADZKIA CBT"
                    </p>
                    <div class="inline-flex items-center gap-2 text-[11px] text-slate-400 bg-slate-900/90 border border-slate-800 px-3 py-1.5 rounded-full">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span>
                        </span>
                        <span>Sistem CBT Aktif &amp; Terlindungi</span>
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
                            <span>TKA &amp; UTBK SNBT (Asli 2024–2026 &amp; Prediksi 2027)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>SKD CPNS &amp; Kedinasan</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>TOEIC, TOEFL, &amp; IELTS</span>
                        </li>
                    </ul>
                </nav>

                <!-- Col 3: Solusi Platform -->
                <nav aria-label="Solusi Platform" class="lg:col-span-4 md:col-span-1">
                    <h3 class="font-bold text-white uppercase tracking-wider mb-4 text-xs">Solusi Platform</h3>
                    <ul class="space-y-2.5 text-slate-400">
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Bank Soal Asli Terstandarisasi</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Pembahasan AI Langkah demi Langkah</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Anti-Curang (Proctoring Mandiri)</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Portal Multi-Tenant White-Label</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500/60 shrink-0"></span>
                            <span>Analisis Butir Soal &amp; Rekap Nilai</span>
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
