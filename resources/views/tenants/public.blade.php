<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    @php
        $isEnterprise = $tenant->isEnterprise();
        $tenantTitle = $isEnterprise ? $tenant->name : "{$tenant->name} - ADZKIA";
        $currentThemePalette = $themePalette ?? $tenant->getThemePalette();
        $palettesList = \App\Http\Controllers\TenantBrandingController::getThemePalettes();
        $activePaletteConfig = $palettesList[$currentThemePalette] ?? $palettesList['light'];
        $activeGrade = $schoolGrade ?? $tenant->getSchoolGrade();
        $activeProGroups = $proGroups ?? $tenant->getProGroups();
        $loginBtnColor = ($isEnterprise && !empty($tenant->theme_color)) ? $tenant->theme_color : '#16a34a';
    @endphp
    <title>Portal Asesmen {{ $tenant->name }}</title>
    
    @php
        $tenantFavicon = ($tenant->favicon_path) ? $tenant->favicon_url : asset('images/icon-adzkia.png');
    @endphp
    <link rel="icon" href="{{ $tenantFavicon }}">
    <link rel="shortcut icon" href="{{ $tenantFavicon }}">
    <link rel="apple-touch-icon" href="{{ $tenantFavicon }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js untuk tema interaktif & kontrol -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    
    <!-- Google Fonts: Plus Jakarta Sans & JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    maxWidth: {
                        '7xl': '60rem',
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        // Open Color
                        'oc-gray': {
                            0: '#f8f9fa',
                            1: '#f1f3f5',
                            2: '#e9ecef',
                            3: '#dee2e6',
                            4: '#ced4da',
                            5: '#adb5bd',
                            6: '#868e96',
                            7: '#495057',
                            8: '#343a40',
                            9: '#212529',
                        },
                        'oc-blue': {
                            0: '#e7f5ff',
                            1: '#d0ebff',
                            2: '#a5d8ff',
                            3: '#74c0fc',
                            4: '#4dabf7',
                            5: '#339af0',
                            6: '#228be6',
                            7: '#1c7ed6',
                            8: '#1971c2',
                            9: '#1864ab',
                        },
                        'oc-red': {
                            0: '#fff5f5',
                            1: '#ffe3e3',
                            2: '#ffc9c9',
                            3: '#ffa8a8',
                            4: '#ff8787',
                            5: '#ff6b6b',
                            6: '#fa5252',
                            7: '#f03e3e',
                            8: '#e03131',
                            9: '#c92a2a',
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        :root {
            --theme-bg: {{ $activePaletteConfig['bg'] }};
            --theme-card-bg: {{ $activePaletteConfig['card_bg'] }};
            --theme-inner-bg: {{ $activePaletteConfig['is_dark'] ? ($activePaletteConfig['card_bg'] === '#212529' ? '#2b3035' : $activePaletteConfig['card_bg']) : '#f8f9fa' }};
            --theme-border: {{ $activePaletteConfig['border'] }};
            --theme-text: {{ $activePaletteConfig['text'] }};
            --theme-subtext: {{ $activePaletteConfig['subtext'] }};
            --theme-primary: {{ $activePaletteConfig['primary'] }};
            --theme-hex: {{ $activePaletteConfig['hex'] }};
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--theme-bg, #f1f3f5);
            color: var(--theme-text, #212529);
            -webkit-tap-highlight-color: transparent;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .font-mono { font-family: 'JetBrains Mono', monospace; }
        
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .spring-ease {
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .pro-scroll-track::-webkit-scrollbar {
            height: 6px;
        }
        .pro-scroll-track::-webkit-scrollbar-track {
            background: #e9ecef;
            border-radius: 999px;
        }
        .pro-scroll-track::-webkit-scrollbar-thumb {
            background: #ced4da;
            border-radius: 999px;
        }
        [x-cloak] { display: none !important; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

        .max-w-7xl {
            max-width: 60rem !important;
        }

        .theme-card {
            background-color: var(--theme-card-bg, #ffffff) !important;
            border-color: var(--theme-border, #dee2e6) !important;
            color: var(--theme-text, #212529);
            transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
        }
        .theme-card:hover {
            border-color: var(--theme-primary, #1c7ed6) !important;
        }
        .theme-inner {
            background-color: var(--theme-inner-bg, #f1f3f5) !important;
            border-color: var(--theme-border, #dee2e6) !important;
            color: var(--theme-text, #212529);
            transition: background-color 0.3s ease, border-color 0.3s ease, color 0.3s ease;
        }
        .theme-border {
            border-color: var(--theme-border, #dee2e6) !important;
            transition: border-color 0.3s ease;
        }
        .theme-heading {
            color: var(--theme-text, #212529) !important;
            transition: color 0.3s ease;
        }
        .theme-subtext {
            color: var(--theme-subtext, #495057) !important;
            transition: color 0.3s ease;
        }
    </style>
</head>
<body x-data="schoolApp()"
      style="
          --theme-bg: {{ $activePaletteConfig['bg'] }};
          --theme-card-bg: {{ $activePaletteConfig['card_bg'] }};
          --theme-inner-bg: {{ $activePaletteConfig['is_dark'] ? ($activePaletteConfig['card_bg'] === '#212529' ? '#2b3035' : $activePaletteConfig['card_bg']) : '#f8f9fa' }};
          --theme-border: {{ $activePaletteConfig['border'] }};
          --theme-text: {{ $activePaletteConfig['text'] }};
          --theme-subtext: {{ $activePaletteConfig['subtext'] }};
          --theme-primary: {{ $activePaletteConfig['primary'] }};
          --theme-hex: {{ $activePaletteConfig['hex'] }};
          background-color: {{ $activePaletteConfig['bg'] }};
          color: {{ $activePaletteConfig['text'] }};
      "
      :style="{
          '--theme-bg': currentTheme.bg,
          '--theme-card-bg': currentTheme.cardBg,
          '--theme-inner-bg': currentTheme.innerBg,
          '--theme-border': currentTheme.border,
          '--theme-text': currentTheme.text,
          '--theme-subtext': currentTheme.subtext,
          '--theme-primary': currentTheme.primary,
          '--theme-hex': currentTheme.hex,
          backgroundColor: currentTheme.bg,
          color: currentTheme.text
      }"
      class="min-h-screen antialiased selection:bg-oc-blue-6 selection:text-white p-3 sm:p-6 lg:p-8 transition-colors duration-300">

    <!-- ================= MAIN CONTAINER (Max Width 60rem / 960px) ================= -->
    <main class="max-w-7xl max-w-[60rem] w-full mx-auto space-y-8 sm:space-y-10">
        
        <!-- ================= 1. CARD PROFILE SEKOLAH ================= -->
        <section class="theme-card rounded-3xl border shadow-sm relative transition-colors duration-300">
            <!-- Cover Banner: Foto Sekolah + Tint Overlay Halus & Kontrol -->
            <div class="h-36 sm:h-48 md:h-52 w-full relative select-none rounded-t-3xl">
                <!-- Background Layer Terisolasi (Foto Cover Sekolah dari Admin) -->
                <div class="absolute inset-0 rounded-t-3xl overflow-hidden pointer-events-none">
                    <img src="{{ $tenant->cover_photo_url }}" 
                         alt="Foto Gedung {{ $tenant->name }}" 
                         class="w-full h-full object-cover"
                         loading="lazy"
                         onerror="this.onerror=null; this.src='https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80&w=2000';">
                    
                    <!-- Overlay Gradasi Gelap & Tint Halus Mengikuti Warna Tema -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/45 to-black/25"></div>
                    <div class="absolute inset-0 opacity-25 transition-all duration-500"
                         :style="{ backgroundColor: currentTheme.hex }"></div>
                    <!-- Watermark Pola Garis Arsitektur Halus -->
                    <div class="absolute inset-0 opacity-15 bg-[radial-gradient(#ffffff_1.2px,transparent_1.2px)] [background-size:18px_18px]"></div>
                </div>

                <!-- TOP CONTROLS DI ATAS COVER: TOMBOL LOGIN/DASHBOARD (Kanan) -->
                <div class="absolute top-3 right-3 sm:top-4 sm:right-4 z-30 flex items-center gap-2">
                    <!-- Tombol Login / Masuk Dashboard -->
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           class="px-3 sm:px-4 py-1.5 rounded-full text-xs font-bold backdrop-blur-md bg-emerald-600/90 hover:bg-emerald-600 text-white border border-emerald-400/30 flex items-center gap-1.5 shadow-sm active:scale-95 transition-all">
                            <span>Dashboard</span>
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </a>
                    @else
                        <a href="{{ route('login', ['tenant' => $tenant->subdomain]) }}" 
                           style="background-color: {{ $loginBtnColor }};"
                           class="px-3.5 sm:px-4 py-1.5 rounded-full text-xs font-bold text-white border border-white/30 flex items-center gap-1.5 shadow-sm active:scale-95 transition-all">
                            <span>LOGIN</span>
                        </a>
                        <a href="{{ route('register', ['tenant' => $tenant->subdomain]) }}" 
                           class="hidden sm:inline-flex px-3 py-1.5 rounded-full text-xs font-bold backdrop-blur-md bg-emerald-600/85 hover:bg-emerald-600 text-white border border-emerald-400/30 shadow-sm active:scale-95 transition-all">
                            <span>Daftar</span>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Profile Info Body -->
            <div class="px-4 sm:px-6 md:px-8 pb-5 sm:pb-6 md:pb-8 pt-0 sm:pt-0 md:pt-0">
                <!-- Top Block: Logo 1:1 + Nama Sekolah + Deskripsi -->
                <div class="flex flex-col gap-3.5 sm:gap-4 mb-5">
                    
                    <!-- Logo Sekolah (1:1 Aspect Ratio: Presisi 50% di Cover & 50% di Bawah Cover) -->
                    <div class="-mt-10 sm:-mt-12 w-20 h-20 sm:w-24 sm:h-24 aspect-square rounded-2xl sm:rounded-3xl bg-white p-1.5 shadow-md border border-oc-gray-2 flex items-center justify-center shrink-0 relative z-10 overflow-hidden">
                        @if($tenant->logo_path)
                            <img src="{{ $tenant->logo_url }}" alt="Logo {{ $tenant->name }}" class="w-full h-full object-contain rounded-xl sm:rounded-2xl" loading="lazy" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($tenant->name) }}&color=10B981&background=D1FAE5';">
                        @else
                            <div class="w-full h-full aspect-square rounded-xl sm:rounded-2xl bg-gradient-to-br from-oc-gray-1 to-oc-blue-0 border border-oc-gray-3 flex flex-col items-center justify-center transition-colors duration-300" :style="{ color: currentTheme.hex }">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m4 6 8-4 8 4"/>
                                    <path d="m18 10 4 2v8a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-8l4-2"/>
                                    <path d="M14 22v-4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v4"/>
                                    <path d="M18 5v17"/>
                                    <path d="M6 5v17"/>
                                    <circle cx="12" cy="9" r="2"/>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Nama Sekolah & Deskripsi Singkat -->
                    <div class="space-y-1 sm:space-y-1.5 min-w-0">
                        <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold theme-heading tracking-tight leading-tight">
                            {{ $tenant->name }}
                        </h1>
                        <p class="text-xs sm:text-sm theme-subtext max-w-3xl leading-relaxed">
                            {{ $tenant->tagline ?: 'Portal evaluasi digital terpadu, asesmen sumatif harian, dan latihan simulasi UTBK SNBT bagi seluruh civitas akademika.' }}
                        </p>
                    </div>
                </div>

                <!-- Info Statistik Ringkas & Kompak (Proporsional di Mobile & Desktop) -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 sm:gap-3 pt-3 border-t theme-border">
                    
                    <!-- Stat 1: Siswa -->
                    <div class="flex items-center gap-2.5 p-2 sm:p-2.5 rounded-xl theme-inner border theme-border hover:border-oc-blue-4 transition">
                        <div class="w-8 h-8 aspect-square rounded-lg theme-card border theme-border flex items-center justify-center text-oc-blue-7 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <span class="font-mono text-xs sm:text-sm font-extrabold theme-heading leading-tight block">
                                {{ $totalStudents > 0 ? number_format($totalStudents, 0, ',', '.') : '1.420' }}
                            </span>
                            <span class="text-[10px] sm:text-[11px] font-semibold theme-subtext truncate block mt-0.5">Siswa Aktif</span>
                        </div>
                    </div>

                    <!-- Stat 2: Guru -->
                    <div class="flex items-center gap-2.5 p-2 sm:p-2.5 rounded-xl theme-inner border theme-border hover:border-oc-blue-4 transition">
                        <div class="w-8 h-8 aspect-square rounded-lg theme-card border theme-border flex items-center justify-center theme-heading shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.42 10.922a1 1 0 0 0-.019-.838L12.83 3.18a2 2 0 0 0-1.66 0L2.6 10.084a1 1 0 0 0 0 1.832l8.57 6.908a2 2 0 0 0 1.66 0l8.57-6.908a1 1 0 0 0 .02-.994z"/>
                                <path d="M6 13.5V19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-5.5"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <span class="font-mono text-xs sm:text-sm font-extrabold theme-heading leading-tight block">
                                {{ $totalTeachers > 0 ? number_format($totalTeachers, 0, ',', '.') : '84' }}
                            </span>
                            <span class="text-[10px] sm:text-[11px] font-semibold theme-subtext truncate block mt-0.5">Guru & Staf</span>
                        </div>
                    </div>

                    <!-- Stat 3: Bank Soal -->
                    <div class="flex items-center gap-2.5 p-2 sm:p-2.5 rounded-xl theme-inner border theme-border hover:border-oc-blue-4 transition">
                        <div class="w-8 h-8 aspect-square rounded-lg theme-card border theme-border flex items-center justify-center text-oc-blue-7 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/>
                                <path d="M14 2v4a2 2 0 0 0 2 2h4"/>
                                <path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <span class="font-mono text-xs sm:text-sm font-extrabold theme-heading leading-tight block">
                                {{ $totalAssessments > 0 ? number_format($totalAssessments, 0, ',', '.') : '156' }}
                            </span>
                            <span class="text-[10px] sm:text-[11px] font-semibold theme-subtext truncate block mt-0.5">Paket Soal</span>
                        </div>
                    </div>

                    <!-- Stat 4: Lulus PTN -->
                    <div class="flex items-center gap-2.5 p-2 sm:p-2.5 rounded-xl theme-inner border theme-border hover:border-emerald-400 transition">
                        <div class="w-8 h-8 aspect-square rounded-lg theme-card border theme-border flex items-center justify-center text-emerald-500 shrink-0">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/>
                                <polyline points="16 7 22 7 22 13"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <span class="font-mono text-xs sm:text-sm font-extrabold theme-heading leading-tight block">98.8%</span>
                            <span class="text-[10px] sm:text-[11px] font-semibold theme-subtext truncate block mt-0.5">Lulus PTN</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- ================= 2. BAGIAN KEDUA: "PRO" ================= -->
        <!-- Judul "PRO". Card square 1:1. Di mobile w-[84vw] agar kartu berikutnya mengintip (peek affordance). -->
        <section class="space-y-4">
            
            <!-- Section Header: Hanya "PRO" & Tombol Geser Kiri-Kanan -->
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <h2 class="text-xl sm:text-2xl font-black theme-heading tracking-tight">PRO</h2>
                    <span class="px-2 py-0.5 rounded-full bg-oc-blue-1 text-oc-blue-7 text-[10px] font-mono font-bold uppercase border border-oc-blue-2">Eksklusif</span>
                </div>

                <!-- Slide Buttons (Kiri - Kanan) -->
                <div class="flex items-center gap-2">
                    <button onclick="slideProCards('left')" aria-label="Slide Kiri" class="w-9 h-9 aspect-square rounded-full border theme-border theme-card hover:opacity-85 theme-heading flex items-center justify-center shadow-xs spring-ease active:scale-95">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m15 18-6-6 6-6"/>
                        </svg>
                    </button>
                    <button onclick="slideProCards('right')" aria-label="Slide Kanan" class="w-9 h-9 aspect-square rounded-full border theme-border theme-card hover:opacity-85 theme-heading flex items-center justify-center shadow-xs spring-ease active:scale-95">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Horizontal Scroll Container (Slide Kanan-Kiri) -->
            <div id="proScrollContainer" class="pro-scroll-track flex gap-4 sm:gap-5 overflow-x-auto pb-4 pt-1 snap-x snap-mandatory scroll-smooth hide-scrollbar">
                
                @php
                    $availableProCards = [
                        'PRO' => [
                            'tag' => 'PRO',
                            'title' => 'Soal Asli dan Prediksi untuk PROFESIONAL',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'PRO']),
                            'items' => [
                                ['name' => 'Simulasi Skolastik Lanjut', 'desc' => 'Penalaran Analitis & Pemecahan Masalah', 'badge' => 'TPS'],
                                ['name' => 'Drill Logika & Numerasi Cepat', 'desc' => 'Trik Algoritma & Aritmetika Praktis', 'badge' => 'NUM'],
                                ['name' => 'Literasi Analisis Komprehensif', 'desc' => 'Interpretasi Teks & Data Statistik', 'badge' => 'LIT'],
                            ]
                        ],
                        'UTBK' => [
                            'tag' => 'UTBK SNBT',
                            'title' => 'Soal ASLI dan PEMBAHASAN Sejak 2019',
                            'badge' => '',
                            'ready' => '4 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'UTBK']),
                            'items' => [
                                ['name' => 'Penalaran Umum (PU)', 'desc' => 'Silogisme, Induktif & Penalaran Analitis', 'badge' => 'PU'],
                                ['name' => 'Pengetahuan Kuantitatif', 'desc' => 'Aljabar, Bilangan, Geometri & Peluang', 'badge' => 'PK'],
                                ['name' => 'Literasi B. Indonesia & Inggris', 'desc' => 'Pemahaman Bacaan Kritis & Literasi Analitis', 'badge' => 'LIT'],
                            ]
                        ],
                        'SKD' => [
                            'tag' => 'SKD KEDINASAN & CPNS',
                            'title' => 'Soal ASLI dan PREDIKSI dilengkapi PEMBAHASAN',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'SKD']),
                            'items' => [
                                ['name' => 'Tes Wawasan Kebangsaan (TWK)', 'desc' => 'Pancasila, UUD 1945, NKRI & Bhinneka Tunggal Ika', 'badge' => 'TWK'],
                                ['name' => 'Tes Inteligensi Umum (TIU)', 'desc' => 'Kemampuan Verbal, Numerik & Figural Sistem CAT', 'badge' => 'TIU'],
                                ['name' => 'Tes Karakteristik Pribadi (TKP)', 'desc' => 'Pelayanan Publik, Jejaring Kerja & Profesionalisme', 'badge' => 'TKP'],
                            ]
                        ],
                        'pro_utbk' => [
                            'tag' => 'UTBK SNBT',
                            'title' => 'Soal ASLI dan PEMBAHASAN Sejak 2019',
                            'badge' => '',
                            'ready' => '4 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'UTBK']),
                            'items' => [
                                ['name' => 'Penalaran Umum (PU)', 'desc' => 'Silogisme & Penalaran Analitis', 'badge' => 'PU'],
                                ['name' => 'Pengetahuan Kuantitatif', 'desc' => 'Aljabar, Aritmetika & Geometri', 'badge' => 'PK'],
                                ['name' => 'Literasi B. Inggris', 'desc' => 'Reading & Context Analysis', 'badge' => 'ENG'],
                            ]
                        ],
                        'pro_kedinasan' => [
                            'tag' => 'SKD KEDINASAN & CPNS',
                            'title' => 'Soal ASLI dan PREDIKSI dilengkapi PEMBAHASAN',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'SKD']),
                            'items' => [
                                ['name' => 'Simulasi SKD Kedinasan', 'desc' => 'TWK, TIU, TKP Sistem CAT', 'badge' => 'SKD'],
                                ['name' => 'TKA Saintek & Soshum', 'desc' => 'Pendalaman Soal Analitis Lanjut', 'badge' => 'TKA'],
                                ['name' => 'Drill Penalaran MTK', 'desc' => 'Trik Cepat & Pembahasan Video', 'badge' => 'NUM'],
                            ]
                        ],
                        'pro_kelas_10' => [
                            'tag' => 'KELAS 10',
                            'title' => 'Asesmen Pilihan Kelas X',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => '10 SMA']),
                            'items' => [
                                ['name' => 'Simulasi TPS Skolastik', 'desc' => 'Penalaran Umum & Skolastik', 'badge' => 'TPS'],
                                ['name' => 'Matematika Wajib', 'desc' => 'Fungsi Kuadrat & Polinomial', 'badge' => 'MTK'],
                                ['name' => 'Literasi B. Indonesia', 'desc' => 'Analisis Teks Ide Pokok', 'badge' => 'IND'],
                            ]
                        ],
                        'pro_kelas_11' => [
                            'tag' => 'KELAS 11',
                            'title' => 'Asesmen Pilihan Kelas XI',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => '11 SMA']),
                            'items' => [
                                ['name' => 'Kimia: Laju Reaksi', 'desc' => 'Termokimia & Kesetimbangan', 'badge' => 'KIM'],
                                ['name' => 'Fisika Fluida & Termo', 'desc' => 'Hukum Bernoulli & Viskositas', 'badge' => 'FIS'],
                                ['name' => 'Ekonomi & Bisnis', 'desc' => 'Pendapatan Nasional & Inflasi', 'badge' => 'EKO'],
                            ]
                        ],
                        'pro_kelas_12' => [
                            'tag' => 'KELAS 12',
                            'title' => 'Asesmen Pilihan Kelas XII',
                            'badge' => 'Persiapan Akhir Siswa',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => '12 SMA']),
                            'items' => [
                                ['name' => 'TryOut Akbar UTBK 2026', 'desc' => 'TPS, Literasi & Penalaran MTK', 'badge' => 'UTBK'],
                                ['name' => 'Ujian Sekolah Kelulusan', 'desc' => 'Standar USBN Nasional 2026', 'badge' => 'USBN'],
                                ['name' => 'Biologi: Genetika', 'desc' => 'Hereditas & Sintesis Protein', 'badge' => 'BIO'],
                            ]
                        ],
                        'pro_tka' => [
                            'tag' => 'TKA AKADEMIK',
                            'title' => 'Tes Kemampuan Akademik',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'TKASMA']),
                            'items' => [
                                ['name' => 'Fisika Modern & Optik', 'desc' => 'Kuantum, Atom & Gelombang', 'badge' => 'FIS'],
                                ['name' => 'Kimia Organik & Polimer', 'desc' => 'Gugus Fungsi & Makromolekul', 'badge' => 'KIM'],
                                ['name' => 'Kalkulus & Matriks', 'desc' => 'Integral & Vektor Ruang Dimensi', 'badge' => 'MTK'],
                            ]
                        ],
                        'pro_smp_unggul' => [
                            'tag' => 'SMP PRO',
                            'title' => 'SMP Akselerasi Favorit',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'TKASMP']),
                            'items' => [
                                ['name' => 'Matematika Olimpiade SMP', 'desc' => 'Teori Bilangan & Kombinatorika', 'badge' => 'MTK'],
                                ['name' => 'IPA Terpadu Lanjut', 'desc' => 'Mekanika Fisika & Sel Tubuh', 'badge' => 'IPA'],
                                ['name' => 'English Proficiency Junior', 'desc' => 'Grammar & Listening Prep', 'badge' => 'ENG'],
                            ]
                        ],
                        'pro_sd_olimpiade' => [
                            'tag' => 'SD PRO',
                            'title' => 'SD Berprestasi & AKM',
                            'badge' => '',
                            'ready' => '3 Paket',
                            'url' => route('assessments.index', ['grade_level' => 'TKASD']),
                            'items' => [
                                ['name' => 'Olimpiade Sains Kuark SD', 'desc' => 'Eksperimen & Alam Sekitar', 'badge' => 'IPA'],
                                ['name' => 'Matematika Nalaria Realistik', 'desc' => 'Problem Solving & Logika Dasar', 'badge' => 'MTK'],
                                ['name' => 'Literasi Membaca Ceria', 'desc' => 'Pemahaman Cerita & Dongeng', 'badge' => 'IND'],
                            ]
                        ],
                    ];
                @endphp

                @php
                    $renderedCards = !empty($proCardsData) ? $proCardsData : $availableProCards;
                @endphp

                @foreach($activeProGroups as $pKey)
                    @if(isset($renderedCards[$pKey]))
                        @php $card = $renderedCards[$pKey]; @endphp
                        <div class="w-[84vw] sm:w-[360px] aspect-square rounded-3xl theme-card border theme-border shadow-sm hover:shadow-md spring-ease p-5 sm:p-6 flex flex-col justify-between shrink-0 snap-start cursor-pointer group/card"
                             onclick="if (!event.target.closest('a, button')) window.location.href = '{{ $card['url'] ?? route('assessments.index') }}'">
                            <a href="{{ $card['url'] ?? route('assessments.index') }}" class="block group/title hover:opacity-85 transition-opacity">
                                <span class="text-[11px] font-extrabold uppercase tracking-widest theme-subtext block">{{ $card['tag'] }}</span>
                                <h3 class="text-lg sm:text-2xl font-black theme-heading tracking-tight leading-tight mt-0.5 group-hover/title:underline decoration-2 underline-offset-2">{{ $card['title'] }}</h3>
                                @if(!empty($card['badge']))
                                    <p class="text-[11px] sm:text-xs text-amber-500 font-semibold mt-1 line-clamp-1">{{ $card['badge'] }}</p>
                                @endif
                            </a>

                            <div class="space-y-3 my-auto">
                                @foreach($card['items'] as $item)
                                    @php
                                        $isPaidItem = ($item['price_type'] ?? '') === 'paid';
                                    @endphp
                                    <div class="flex items-center justify-between gap-3 group/item">
                                        <div class="flex items-center gap-3 min-w-0">
                                            <div class="w-10 h-10 aspect-square rounded-xl {{ $isPaidItem ? 'bg-[#ffd43b] text-[#e67700] border border-[#fcc419]' : 'theme-inner border theme-border text-current' }} flex items-center justify-center font-mono font-bold text-xs shrink-0 group-hover/item:scale-105 spring-ease shadow-xs">
                                                {{ $item['badge'] ?? strtoupper(substr($item['name'] ?? 'PRO', 0, 3)) }}
                                            </div>
                                            <div class="min-w-0">
                                                <h4 class="font-extrabold text-xs sm:text-[15px] theme-heading truncate leading-snug">{{ $item['name'] }}</h4>
                                                <p class="text-[11px] sm:text-xs theme-subtext truncate mt-0.5">{{ $item['desc'] }}</p>
                                            </div>
                                        </div>
                                        <a href="{{ $item['url'] ?? route('login', ['tenant' => $tenant->subdomain]) }}" class="px-3.5 sm:px-4 py-1.5 rounded-full {{ $isPaidItem ? 'bg-[#ffd43b] text-[#e67700] hover:bg-[#fcc419] border-[#fcc419]' : 'bg-[#a5d8ff] text-[#071524] hover:bg-[#74c0fc] border-[#74c0fc]/60' }} font-extrabold text-xs spring-ease shrink-0 shadow-xs border">
                                            Mulai
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="pt-2 border-t theme-border flex items-center justify-between text-[11px] theme-subtext">
                                <a href="{{ $card['url'] ?? route('assessments.index') }}" class="truncate max-w-[200px] hover:underline">{{ $card['badge'] ?: $card['tag'] }}</a>
                                <a href="{{ $card['url'] ?? route('assessments.index') }}" 
                                   class="font-mono font-bold theme-heading shrink-0 hover:underline inline-flex items-center gap-1 group/pkg py-0.5 px-1.5 rounded-lg hover:bg-black/5 dark:hover:bg-white/10 transition-colors"
                                   title="Lihat semua paket asesmen {{ $card['tag'] }}">
                                    <span>{{ $card['ready'] }}</span>
                                    <svg class="w-3.5 h-3.5 opacity-70 group-hover/pkg:translate-x-0.5 group-hover/pkg:-translate-y-0.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17L17 7M17 7H7M17 7V17"/></svg>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </section>

        <!-- ================= 3. KATALOG MATA PELAJARAN (SESUAI JENJANG SEKOLAH) ================= -->
        <!-- Menampilkan hanya jenjang yang dipilih sekolah (SMA, SMP, atau SD) -->
        <section class="space-y-6">
            
            <!-- Quick Search Bar Interaktif -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b theme-border pb-4">
                <div>
                    <h3 class="text-lg sm:text-xl font-black theme-heading tracking-tight">Katalog Mata Pelajaran</h3>
                    <p class="text-xs theme-subtext">
                        Jelajahi materi pembelajaran, bank soal, dan evaluasi berkala siswa.
                    </p>
                </div>

                <!-- Input Pencarian Cepat -->
                <div class="relative w-full sm:w-72 md:w-80">
                    <svg class="w-4 h-4 theme-subtext absolute left-3.5 top-1/2 -translate-y-1/2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
                    </svg>
                    <input type="text" id="catalogSearchInput" oninput="handleCatalogSearch()" placeholder="Cari mata pelajaran atau ujian..." class="w-full pl-10 pr-4 py-2 theme-card border theme-border rounded-2xl text-xs sm:text-sm theme-heading placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-oc-blue-4 shadow-2xs spring-ease">
                </div>
            </div>

            @if($studentTargetGrade)
                <div class="px-4 py-3 rounded-2xl bg-amber-500/10 border border-amber-500/30 flex items-center justify-between gap-3 text-xs theme-heading mb-2">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></span>
                        <span>Asesmen terfilter otomatis sesuai target kelas profil Anda: <strong>Kelas {{ $studentTargetGrade }}</strong></span>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="text-[11px] font-bold text-amber-600 hover:underline shrink-0">Ubah Jenjang</a>
                </div>
            @endif

            <!-- TAMPILKAN JENJANG SEKOLAH SESUAI FILTER ATAU PILIHAN ADMIN TENANT -->
            <div class="space-y-8">
                @if(in_array('sma', $schoolGrades) && (!$studentTargetGrade || ($studentTargetGrade >= 10 && $studentTargetGrade <= 12)))
                    <!-- ---------------- A. KATALOG SMA (OPEN COLOR: GRAY) ---------------- -->
                    <div class="space-y-3.5">
                        <div class="flex flex-wrap items-center justify-between gap-2.5">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-md bg-oc-gray-8 text-white font-mono font-bold text-xs uppercase">
                                    SMA
                                </span>
                                <span class="text-sm sm:text-base font-extrabold theme-heading">Fase E &amp; F</span>
                            </div>

                            <!-- Tab Switcher Kelas SMA: GRAY | Font & Border: #212529 | Body: #ced4da -->
                            <div class="inline-flex p-1 rounded-xl bg-[#ced4da] border border-[#212529]">
                                @if($studentTargetGrade && $studentTargetGrade >= 10 && $studentTargetGrade <= 12)
                                    <button onclick="switchSmaGrade('{{ $studentTargetGrade }}')" id="tabBtnSma{{ $studentTargetGrade }}" class="tab-sma px-3 sm:px-4 py-1 rounded-lg text-xs font-bold bg-white text-[#212529] border border-[#212529] shadow-xs spring-ease">
                                        <span class="hidden sm:inline">Kelas </span>{{ $studentTargetGrade }}
                                    </button>
                                @else
                                    <button onclick="switchSmaGrade('10')" id="tabBtnSma10" class="tab-sma px-3 sm:px-4 py-1 rounded-lg text-xs font-bold bg-white text-[#212529] border border-[#212529] shadow-xs spring-ease">
                                        <span class="hidden sm:inline">Kelas </span>10
                                    </button>
                                    <button onclick="switchSmaGrade('11')" id="tabBtnSma11" class="tab-sma px-3 sm:px-4 py-1 rounded-lg text-xs font-semibold text-[#212529]/75 hover:text-[#212529] spring-ease border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>11
                                    </button>
                                    <button onclick="switchSmaGrade('12')" id="tabBtnSma12" class="tab-sma px-3 sm:px-4 py-1 rounded-lg text-xs font-semibold text-[#212529]/75 hover:text-[#212529] spring-ease border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>12
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Grid Kompak SMA -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3" id="smaGradeContainer">
                            <!-- Terisi via JavaScript -->
                        </div>
                    </div>
                @endif

                @if(in_array('smp', $schoolGrades) && (!$studentTargetGrade || ($studentTargetGrade >= 7 && $studentTargetGrade <= 9)))
                    <!-- ---------------- B. KATALOG SMP (OPEN COLOR: BLUE) ---------------- -->
                    <div class="space-y-3.5">
                        <div class="flex flex-wrap items-center justify-between gap-2.5">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-md bg-oc-blue-6 text-white font-mono font-bold text-xs uppercase">
                                    SMP
                                </span>
                                <span class="text-sm sm:text-base font-extrabold theme-heading">Fase D</span>
                            </div>

                            <!-- Tab Switcher Kelas SMP: BLUE | Font & Border: #1864ab | Body: #a5d8ff -->
                            <div class="inline-flex p-1 rounded-xl bg-[#a5d8ff] border border-[#1864ab]">
                                @if($studentTargetGrade && $studentTargetGrade >= 7 && $studentTargetGrade <= 9)
                                    <button onclick="switchSmpGrade('{{ $studentTargetGrade }}')" id="tabBtnSmp{{ $studentTargetGrade }}" class="tab-smp px-3 sm:px-4 py-1 rounded-lg text-xs font-bold bg-white text-[#1864ab] border border-[#1864ab] shadow-xs spring-ease">
                                        <span class="hidden sm:inline">Kelas </span>{{ $studentTargetGrade }}
                                    </button>
                                @else
                                    <button onclick="switchSmpGrade('7')" id="tabBtnSmp7" class="tab-smp px-3 sm:px-4 py-1 rounded-lg text-xs font-bold bg-white text-[#1864ab] border border-[#1864ab] shadow-xs spring-ease">
                                        <span class="hidden sm:inline">Kelas </span>7
                                    </button>
                                    <button onclick="switchSmpGrade('8')" id="tabBtnSmp8" class="tab-smp px-3 sm:px-4 py-1 rounded-lg text-xs font-semibold text-[#1864ab]/75 hover:text-[#1864ab] spring-ease border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>8
                                    </button>
                                    <button onclick="switchSmpGrade('9')" id="tabBtnSmp9" class="tab-smp px-3 sm:px-4 py-1 rounded-lg text-xs font-semibold text-[#1864ab]/75 hover:text-[#1864ab] spring-ease border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>9
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Grid Kompak SMP -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3" id="smpGradeContainer">
                            <!-- Terisi via JavaScript -->
                        </div>
                    </div>
                @endif

                @if(in_array('sd', $schoolGrades) && (!$studentTargetGrade || ($studentTargetGrade >= 1 && $studentTargetGrade <= 6)))
                    <!-- ---------------- C. KATALOG SD (OPEN COLOR: RED) ---------------- -->
                    <div class="space-y-3.5">
                        <div class="flex flex-wrap items-center justify-between gap-2.5">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-md bg-oc-red-6 text-white font-mono font-bold text-xs uppercase">
                                    SD
                                </span>
                                <span class="text-sm sm:text-base font-extrabold theme-heading">Fase A, B &amp; C</span>
                            </div>

                            <!-- Tab Switcher Kelas SD: RED | Font & Border: #c92a2a | Body: #ffc9c9 -->
                            <div class="inline-flex p-1 rounded-xl bg-[#ffc9c9] border border-[#c92a2a] overflow-x-auto max-w-full">
                                @if($studentTargetGrade && $studentTargetGrade <= 6)
                                    <button onclick="switchSdGrade('{{ $studentTargetGrade }}')" id="tabBtnSd{{ $studentTargetGrade }}" class="tab-sd px-3 py-1 rounded-lg text-xs font-bold bg-white text-[#c92a2a] border border-[#c92a2a] shadow-xs spring-ease shrink-0">
                                        <span class="hidden sm:inline">Kelas </span>{{ $studentTargetGrade }}
                                    </button>
                                @else
                                    <button onclick="switchSdGrade('1')" id="tabBtnSd1" class="tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold bg-white text-[#c92a2a] border border-[#c92a2a] shadow-xs spring-ease shrink-0">
                                        <span class="hidden sm:inline">Kelas </span>1
                                    </button>
                                    <button onclick="switchSdGrade('2')" id="tabBtnSd2" class="tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-semibold text-[#c92a2a]/75 hover:text-[#c92a2a] spring-ease shrink-0 border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>2
                                    </button>
                                    <button onclick="switchSdGrade('3')" id="tabBtnSd3" class="tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-semibold text-[#c92a2a]/75 hover:text-[#c92a2a] spring-ease shrink-0 border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>3
                                    </button>
                                    <button onclick="switchSdGrade('4')" id="tabBtnSd4" class="tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-semibold text-[#c92a2a]/75 hover:text-[#c92a2a] spring-ease shrink-0 border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>4
                                    </button>
                                    <button onclick="switchSdGrade('5')" id="tabBtnSd5" class="tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-semibold text-[#c92a2a]/75 hover:text-[#c92a2a] spring-ease shrink-0 border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>5
                                    </button>
                                    <button onclick="switchSdGrade('6')" id="tabBtnSd6" class="tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-semibold text-[#c92a2a]/75 hover:text-[#c92a2a] spring-ease shrink-0 border border-transparent">
                                        <span class="hidden sm:inline">Kelas </span>6
                                    </button>
                                @endif
                            </div>
                        </div>

                        <!-- Grid Kompak SD -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3" id="sdGradeContainer">
                            <!-- Terisi via JavaScript -->
                        </div>
                    </div>
                @endif
            </div>

        </section>

        <!-- ================= 4. DUA BILAH RUANG GURU & RUANG MURID ================= -->
        <section class="grid grid-cols-1 md:grid-cols-2 gap-5 pt-2">
            
            <!-- BILAH KIRI: RUANG GURU -->
            <div class="theme-card rounded-3xl border p-5 sm:p-7 flex flex-col justify-between hover:shadow-md hover:border-oc-blue-4 spring-ease group">
                <div class="space-y-4">
                    
                    <div class="flex items-center justify-between">
                        <!-- Icon Guru 1:1 Aspect-Square -->
                        <div class="w-16 h-16 sm:w-18 sm:h-18 aspect-square rounded-2xl sm:rounded-3xl bg-gradient-to-br from-oc-blue-6 to-indigo-700 text-white flex items-center justify-center shadow-md shadow-oc-blue-6/20 group-hover:scale-105 spring-ease shrink-0">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21.42 10.922a1 1 0 0 0-.019-.838L12.83 3.18a2 2 0 0 0-1.66 0L2.6 10.084a1 1 0 0 0 0 1.832l8.57 6.908a2 2 0 0 0 1.66 0l8.57-6.908a1 1 0 0 0 .02-.994z"/>
                                <path d="M6 13.5V19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-5.5"/>
                            </svg>
                        </div>

                        <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-oc-blue-0 border border-oc-blue-2 text-oc-blue-7 uppercase tracking-wider">
                            Pendidik
                        </span>
                    </div>

                    <div>
                        <h4 class="text-lg sm:text-xl font-black theme-heading tracking-tight group-hover:text-oc-blue-7 spring-ease">
                            Ruang Guru & Pengajar
                        </h4>
                        <p class="text-xs sm:text-sm theme-subtext mt-1 leading-relaxed">
                            Akses pembuatan bank soal, penjadwalan ujian CBT, pengawasan langsung, dan rekapitulasi nilai siswa.
                        </p>
                    </div>

                    <!-- Chip Menu Fleksibel -->
                    <div class="flex flex-wrap gap-2 pt-1 text-[11px] sm:text-xs font-semibold theme-subtext">
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-oc-blue-6 shrink-0"></span>
                            <span>Buat Butir Soal</span>
                        </div>
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-oc-blue-6 shrink-0"></span>
                            <span>Monitoring Realtime</span>
                        </div>
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-oc-blue-6 shrink-0"></span>
                            <span>Analisis Butir</span>
                        </div>
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-oc-blue-6 shrink-0"></span>
                            <span>Rekap Nilai</span>
                        </div>
                    </div>
                </div>

                <div class="pt-5 mt-4 border-t theme-border">
                    <a href="{{ route('login', ['role' => 'T', 'tenant' => $tenant->subdomain]) }}" class="w-full py-3 px-4 rounded-xl bg-[#1c7ed6] hover:bg-[#1864ab] text-white font-bold text-xs sm:text-sm flex items-center justify-center gap-2 spring-ease shadow-xs">
                        <span>Buka Ruang Guru</span>
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- BILAH KANAN: RUANG MURID -->
            <div class="theme-card rounded-3xl border p-5 sm:p-7 flex flex-col justify-between hover:shadow-md hover:border-emerald-400 spring-ease group">
                <div class="space-y-4">
                    
                    <div class="flex items-center justify-between">
                        <!-- Icon Murid 1:1 Aspect-Square -->
                        <div class="w-16 h-16 sm:w-18 sm:h-18 aspect-square rounded-2xl sm:rounded-3xl bg-gradient-to-br from-emerald-500 to-teal-700 text-white flex items-center justify-center shadow-md shadow-emerald-500/20 group-hover:scale-105 spring-ease shrink-0">
                            <svg class="w-8 h-8 sm:w-9 sm:h-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <polyline points="16 11 18 13 22 9"/>
                            </svg>
                        </div>

                        <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold bg-emerald-50 border border-emerald-200 text-emerald-700 uppercase tracking-wider">
                            Siswa
                        </span>
                    </div>

                    <div>
                        <h4 class="text-lg sm:text-xl font-black theme-heading tracking-tight group-hover:text-emerald-700 spring-ease">
                            Ruang Murid & CBT
                        </h4>
                        <p class="text-xs sm:text-sm theme-subtext mt-1 leading-relaxed">
                            Mulai pengerjaan latihan mandiri, ikuti evaluasi terjadwal, dan unduh lembar pembahasan komprehensif.
                        </p>
                    </div>

                    <!-- Chip Menu Fleksibel -->
                    <div class="flex flex-wrap gap-2 pt-1 text-[11px] sm:text-xs font-semibold theme-subtext">
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                            <span>Mulai Ujian Aktif</span>
                        </div>
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                            <span>Riwayat & Rapor</span>
                        </div>
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                            <span>Pembahasan Soal</span>
                        </div>
                        <div class="theme-inner px-2.5 py-1.5 rounded-xl border flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shrink-0"></span>
                            <span>Peringkat Skor</span>
                        </div>
                    </div>
                </div>

                <div class="pt-5 mt-4 border-t theme-border">
                    <a href="{{ route('login', ['role' => 'U', 'tenant' => $tenant->subdomain]) }}" class="w-full py-3 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm flex items-center justify-center gap-2 spring-ease shadow-xs">
                        <span>Masuk Ruang Siswa</span>
                        <svg class="w-4 h-4 text-emerald-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

        </section>

    </main>

    <!-- ================= JAVASCRIPT: DATA & INTERAKTIVITAS ================= -->
    <script>
        // 1. Slider Kiri-Kanan PRO Cards
        function slideProCards(direction) {
            const container = document.getElementById('proScrollContainer');
            if (!container) return;
            const cardWidth = 360;
            const scrollDistance = direction === 'left' ? -cardWidth : cardWidth;
            container.scrollBy({
                left: scrollDistance,
                behavior: 'smooth'
            });
        }

        // 2. Data Kurikulum Lengkap & Asesmen Riil: SMA, SMP, dan SD
        const catalogDataset = @json($catalogDataset);
        const targetLoginUrl = @json(route('login', ['tenant' => $tenant->subdomain]));

        // Template Card Render
        function createSubjectCard(item, colorClass = 'oc-gray') {
            const itemUrl = item.url && item.url !== '#' ? item.url : targetLoginUrl;
            const isPaid = item.price_type === 'paid';
            
            const badgeClass = isPaid
                ? 'w-10 h-10 aspect-square rounded-xl bg-[#ffd43b] text-[#e67700] border border-[#fcc419] flex items-center justify-center font-mono font-bold text-xs shrink-0 group-hover:scale-105 spring-ease shadow-xs'
                : 'w-10 h-10 aspect-square rounded-xl theme-inner border theme-border flex items-center justify-center font-mono font-bold text-xs theme-heading shrink-0 group-hover:scale-105 spring-ease';

            const buttonClass = isPaid
                ? 'px-3.5 py-1.5 rounded-xl bg-[#ffd43b] text-[#e67700] hover:bg-[#fcc419] font-extrabold text-xs spring-ease shrink-0 shadow-xs border border-[#fcc419]'
                : 'px-3.5 py-1.5 rounded-xl bg-[#a5d8ff] text-[#071524] hover:bg-[#74c0fc] font-extrabold text-xs spring-ease shrink-0 shadow-xs border border-[#74c0fc]/60';

            return `
                <div class="catalog-item theme-card p-3.5 sm:p-4 rounded-2xl border theme-border shadow-2xs hover:shadow-sm spring-ease flex items-center justify-between gap-3 group">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="${badgeClass}">
                            ${item.badge}
                        </div>
                        <div class="min-w-0">
                            <h4 class="item-title font-extrabold text-xs sm:text-sm theme-heading truncate leading-snug">${item.title}</h4>
                            <div class="flex items-center gap-2 mt-0.5">
                                <span class="item-subject text-[10px] sm:text-[11px] theme-subtext truncate">${item.subject}</span>
                                <span class="text-[10px] theme-subtext opacity-50">•</span>
                                <span class="text-[10px] font-mono theme-subtext shrink-0">${item.count}</span>
                            </div>
                        </div>
                    </div>
                    <a href="${itemUrl}" class="${buttonClass}">
                        Mulai
                    </a>
                </div>
            `;
        }

        // 3. Render Katalog SMA
        function switchSmaGrade(grade) {
            const container = document.getElementById('smaGradeContainer');
            if (!container) return;
            const items = catalogDataset.sma[grade] || [];
            
            document.querySelectorAll('.tab-sma').forEach(btn => {
                btn.className = 'tab-sma px-3 sm:px-4 py-1 rounded-lg text-xs font-semibold text-[#212529]/75 hover:text-[#212529] spring-ease border border-transparent';
            });
            const activeBtn = document.getElementById('tabBtnSma' + grade);
            if (activeBtn) {
                activeBtn.className = 'tab-sma px-3 sm:px-4 py-1 rounded-lg text-xs font-bold bg-white text-[#212529] border border-[#212529] shadow-xs spring-ease';
            }

            container.innerHTML = items.map(item => createSubjectCard(item)).join('');
        }

        // 4. Render Katalog SMP
        function switchSmpGrade(grade) {
            const container = document.getElementById('smpGradeContainer');
            if (!container) return;
            const items = catalogDataset.smp[grade] || [];
            
            document.querySelectorAll('.tab-smp').forEach(btn => {
                btn.className = 'tab-smp px-3 sm:px-4 py-1 rounded-lg text-xs font-semibold text-[#1864ab]/75 hover:text-[#1864ab] spring-ease border border-transparent';
            });
            const activeBtn = document.getElementById('tabBtnSmp' + grade);
            if (activeBtn) {
                activeBtn.className = 'tab-smp px-3 sm:px-4 py-1 rounded-lg text-xs font-bold bg-white text-[#1864ab] border border-[#1864ab] shadow-xs spring-ease';
            }

            container.innerHTML = items.map(item => createSubjectCard(item)).join('');
        }

        // 5. Render Katalog SD
        function switchSdGrade(grade) {
            const container = document.getElementById('sdGradeContainer');
            if (!container) return;
            const items = catalogDataset.sd[grade] || [];
            
            document.querySelectorAll('.tab-sd').forEach(btn => {
                btn.className = 'tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-semibold text-[#c92a2a]/75 hover:text-[#c92a2a] spring-ease shrink-0 border border-transparent';
            });
            const activeBtn = document.getElementById('tabBtnSd' + grade);
            if (activeBtn) {
                activeBtn.className = 'tab-sd px-2.5 sm:px-3 py-1 rounded-lg text-xs font-bold bg-white text-[#c92a2a] border border-[#c92a2a] shadow-xs spring-ease shrink-0';
            }

            container.innerHTML = items.map(item => createSubjectCard(item)).join('');
        }

        // 6. Live Filter Search
        function handleCatalogSearch() {
            const input = document.getElementById('catalogSearchInput');
            if (!input) return;
            const query = input.value.toLowerCase().trim();
            const items = document.querySelectorAll('.catalog-item');

            items.forEach(item => {
                const title = item.querySelector('.item-title')?.textContent.toLowerCase() || '';
                const subject = item.querySelector('.item-subject')?.textContent.toLowerCase() || '';
                
                if (!query || title.includes(query) || subject.includes(query)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        // 7. Alpine.js School App Theme State (Diterapkan dari Pengaturan Branding)
        function schoolApp() {
            const currentThemeKey = @json($currentThemePalette) || 'light';
            const tenantId = @json($tenant->id);

            // Bersihkan data lama jika ada di localStorage browser pengunjung
            try {
                localStorage.removeItem('adzkia_school_theme_' + tenantId);
            } catch (e) {}

            return {
                themeKey: currentThemeKey,
                activeJenjang: @json($activeGrade ?? ($schoolGrades[0] ?? 'sma')),
                
                themes: {
                    'light': {
                        name: 'Light',
                        hex: '#f1f3f5',
                        bg: '#f1f3f5',
                        cardBg: '#ffffff',
                        innerBg: '#f8f9fa',
                        border: '#dee2e6',
                        text: '#212529',
                        subtext: '#495057',
                        primary: '#1c7ed6',
                        gradient: 'linear-gradient(135deg, #e9ecef 0%, #dee2e6 50%, #ced4da 100%)',
                        isDark: false
                    },
                    'gray': {
                        name: 'Gray',
                        hex: '#868e96',
                        bg: '#343a40',
                        cardBg: '#212529',
                        innerBg: '#2b3035',
                        border: '#495057',
                        text: '#f8f9fa',
                        subtext: '#ced4da',
                        primary: '#adb5bd',
                        gradient: 'linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #343a40 100%)',
                        isDark: true
                    },
                    'blue': {
                        name: 'Blue',
                        hex: '#228be6',
                        bg: '#071524',
                        cardBg: '#0c1f33',
                        innerBg: '#122b46',
                        border: '#1971c2',
                        text: '#f8f9fa',
                        subtext: '#a5d8ff',
                        primary: '#339af0',
                        gradient: 'linear-gradient(135deg, #0f172a 0%, #1e293b 40%, #1864ab 100%)',
                        isDark: true
                    },
                    'indigo': {
                        name: 'Indigo',
                        hex: '#4c6ef5',
                        bg: '#0a0f24',
                        cardBg: '#121838',
                        innerBg: '#1a224d',
                        border: '#3b5bdb',
                        text: '#f8f9fa',
                        subtext: '#bac8ff',
                        primary: '#5c7cfa',
                        gradient: 'linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #364fc7 100%)',
                        isDark: true
                    },
                    'teal': {
                        name: 'Teal',
                        hex: '#12b886',
                        bg: '#051a14',
                        cardBg: '#092920',
                        innerBg: '#0e382c',
                        border: '#0ca678',
                        text: '#f8f9fa',
                        subtext: '#96f2d7',
                        primary: '#20c997',
                        gradient: 'linear-gradient(135deg, #064e3b 0%, #042f2e 40%, #087f5b 100%)',
                        isDark: true
                    },
                    'cyan': {
                        name: 'Cyan',
                        hex: '#15aabf',
                        bg: '#05181c',
                        cardBg: '#0a262d',
                        innerBg: '#0f353f',
                        border: '#0c8599',
                        text: '#f8f9fa',
                        subtext: '#99e9f2',
                        primary: '#22b8cf',
                        gradient: 'linear-gradient(135deg, #083344 0%, #0e7490 50%, #0b7285 100%)',
                        isDark: true
                    },
                    'green': {
                        name: 'Green',
                        hex: '#40c057',
                        bg: '#081a0c',
                        cardBg: '#0f2916',
                        innerBg: '#15381f',
                        border: '#2f9e44',
                        text: '#f8f9fa',
                        subtext: '#b2f2bb',
                        primary: '#51cf66',
                        gradient: 'linear-gradient(135deg, #14532d 0%, #166534 50%, #2b8a3e 100%)',
                        isDark: true
                    },
                    'lime': {
                        name: 'Lime',
                        hex: '#82c91e',
                        bg: '#121a05',
                        cardBg: '#1b270a',
                        innerBg: '#25350f',
                        border: '#66a80f',
                        text: '#f8f9fa',
                        subtext: '#d8f5a2',
                        primary: '#94d82d',
                        gradient: 'linear-gradient(135deg, #365314 0%, #4d7c0f 50%, #5c940d 100%)',
                        isDark: true
                    },
                    'yellow': {
                        name: 'Yellow',
                        hex: '#f59f00',
                        bg: '#1c1404',
                        cardBg: '#291e07',
                        innerBg: '#382a0b',
                        border: '#f08c00',
                        text: '#f8f9fa',
                        subtext: '#ffec99',
                        primary: '#fcc419',
                        gradient: 'linear-gradient(135deg, #713f12 0%, #a16207 50%, #e67700 100%)',
                        isDark: true
                    },
                    'orange': {
                        name: 'Orange',
                        hex: '#fd7e14',
                        bg: '#1f0d05',
                        cardBg: '#2d1408',
                        innerBg: '#3d1d0c',
                        border: '#e8590c',
                        text: '#f8f9fa',
                        subtext: '#ffd8a8',
                        primary: '#ff922b',
                        gradient: 'linear-gradient(135deg, #7c2d12 0%, #c2410c 50%, #d9480f 100%)',
                        isDark: true
                    },
                    'red': {
                        name: 'Red',
                        hex: '#fa5252',
                        bg: '#1a0909',
                        cardBg: '#280f0f',
                        innerBg: '#381616',
                        border: '#e03131',
                        text: '#f8f9fa',
                        subtext: '#ffc9c9',
                        primary: '#ff6b6b',
                        gradient: 'linear-gradient(135deg, #7f1d1d 0%, #991b1b 50%, #c92a2a 100%)',
                        isDark: true
                    },
                    'pink': {
                        name: 'Pink',
                        hex: '#e64980',
                        bg: '#1c0812',
                        cardBg: '#2a0e1c',
                        innerBg: '#3a1528',
                        border: '#c2255c',
                        text: '#f8f9fa',
                        subtext: '#fcc2d7',
                        primary: '#f06595',
                        gradient: 'linear-gradient(135deg, #831843 0%, #9d174d 50%, #a61e4d 100%)',
                        isDark: true
                    },
                    'grape': {
                        name: 'Grape',
                        hex: '#be4bdb',
                        bg: '#18081f',
                        cardBg: '#240d2f',
                        innerBg: '#321340',
                        border: '#9c36b5',
                        text: '#f8f9fa',
                        subtext: '#eebefa',
                        primary: '#cc5de8',
                        gradient: 'linear-gradient(135deg, #581c87 0%, #701a75 50%, #862e9c 100%)',
                        isDark: true
                    },
                    'violet': {
                        name: 'Violet',
                        hex: '#7950f2',
                        bg: '#120a22',
                        cardBg: '#1b1033',
                        innerBg: '#261747',
                        border: '#6741d9',
                        text: '#f8f9fa',
                        subtext: '#d0bfff',
                        primary: '#845ef7',
                        gradient: 'linear-gradient(135deg, #3b0764 0%, #4c1d95 50%, #5f3dc4 100%)',
                        isDark: true
                    }
                },

                get currentTheme() {
                    return this.themes[this.themeKey] || this.themes['light'];
                }
            };
        }

        // Inisialisasi awal jenjang aktif (otomatis ke kelas target murid jika ada)
        const studentTargetGrade = @json($studentTargetGrade ?? null);
        if (studentTargetGrade) {
            if (studentTargetGrade >= 10 && studentTargetGrade <= 12) {
                if (catalogDataset.sma) switchSmaGrade(String(studentTargetGrade));
            } else if (studentTargetGrade >= 7 && studentTargetGrade <= 9) {
                if (catalogDataset.smp) switchSmpGrade(String(studentTargetGrade));
            } else if (studentTargetGrade >= 1 && studentTargetGrade <= 6) {
                if (catalogDataset.sd) switchSdGrade(String(studentTargetGrade));
            }
        } else {
            if (catalogDataset.sma) switchSmaGrade('10');
            if (catalogDataset.smp) switchSmpGrade('7');
            if (catalogDataset.sd) switchSdGrade('1');
        }
    </script>
</body>
</html>
