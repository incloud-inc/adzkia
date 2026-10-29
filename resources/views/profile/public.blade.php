<!DOCTYPE html>
<html lang="id">
<head>
    @php
        $tenantName = $tenant?->name ?? ($user->tenant?->name ?? 'Adzkia');
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $user->name }} - {{ $tenantName }}</title>
    
    @php
        $profileFavicon = ($tenant && $tenant->favicon_path) ? $tenant->favicon_url : asset('images/icon-adzkia.png');
    @endphp
    <link rel="icon" href="{{ $profileFavicon }}">
    <link rel="shortcut icon" href="{{ $profileFavicon }}">
    <link rel="apple-touch-icon" href="{{ $profileFavicon }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js untuk interaktivitas -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    
    <!-- Google Fonts: Plus Jakarta Sans (body modern, crisp & clean) + Outfit (display heading, bold, academic tech) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,600&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['"Outfit"', 'sans-serif']
                    },
                    boxShadow: {
                        'soft': '0 8px 30px rgba(0,0,0,0.06)',
                        'card': '0 4px 20px -2px rgba(0,0,0,0.12)',
                        'floating': '0 25px 70px -15px rgba(0,0,0,0.45)'
                    }
                }
            }
        }
    </script>

    <style>
        [x-cloak] { display: none !important; }
        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            letter-spacing: -0.012em;
            -webkit-tap-highlight-color: transparent;
        }
        .font-display {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.015em;
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .glass-panel {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }

        /* Cetak E-Sertifikat Berkualitas Tinggi */
        @media print {
            body {
                background: #ffffff !important;
                color: #0f172a !important;
            }
            body > *:not(.cert-modal-layer) {
                display: none !important;
            }
            .no-print, [x-cloak] {
                display: none !important;
            }
            .cert-modal-backdrop {
                position: static !important;
                background: transparent !important;
                padding: 0 !important;
                backdrop-filter: none !important;
            }
            .cert-modal-box {
                border: none !important;
                box-shadow: none !important;
                background: transparent !important;
                max-width: 100% !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            #printableCertificate {
                position: static !important;
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 auto !important;
                padding: 2.25rem !important;
                border: 2px solid #0f172a !important;
                border-radius: 14px !important;
                box-shadow: none !important;
                background: #ffffff !important;
                color: #0f172a !important;
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            @page {
                size: A4 portrait;
                margin: 12mm;
            }
        }
    </style>
</head>
<body x-data="biolinkApp()" :style="bodyStyle" class="min-h-screen transition-colors duration-300 antialiased flex justify-center items-start selection:bg-amber-400 selection:text-black">

    <!-- WRAPPER MOBILE CANVAS / DESKTOP ELEVATED CARD (Rekomendasi 4) -->
    <div class="w-full max-w-md sm:max-w-lg min-h-screen md:min-h-0 md:my-4 lg:my-6 md:rounded-[38px] relative flex flex-col pb-8 transition-all duration-300 md:shadow-floating md:border overflow-hidden"
         :style="{ 
             backgroundColor: currentTheme.bg, 
             color: currentTheme.text,
             borderColor: currentTheme.isDark ? 'rgba(255,255,255,0.12)' : 'rgba(0,0,0,0.08)'
         }">

        <!-- ================= HERO COVER & IDENTITAS SISWA (Rekomendasi 3) ================= -->
        <section class="relative px-3 sm:px-4 pt-2.5 sm:pt-3">
            <!-- Cover Banner Card (Lega, sinematik: h-48 sm:h-56) -->
            <div class="w-full h-48 sm:h-56 rounded-[28px] relative border border-white/15 dark:border-white/10 shadow-sm overflow-hidden">
                <!-- Background Layer -->
                <div class="absolute inset-0 overflow-hidden pointer-events-none"
                     :style="{ background: coverGradient }">
                    @if($user->cover_photo_path)
                        <img src="{{ $user->cover_photo_url }}" alt="Cover {{ $user->name }}" class="w-full h-full object-cover" loading="lazy" onerror="this.style.display='none';">
                        <!-- Dual gradient vignette agar kontrol atas dan avatar bawah tetap terbaca jelas -->
                        <div class="absolute inset-0 bg-gradient-to-b from-black/55 via-transparent to-black/45"></div>
                    @else
                        <div class="absolute inset-0 bg-gradient-to-b from-black/25 via-transparent to-black/35"></div>
                        <div class="absolute inset-0 opacity-20 bg-[radial-gradient(#fff_1.2px,transparent_1.2px)] [background-size:16px_16px]"></div>
                    @endif
                </div>
                
                <!-- TOP CONTROLS DI ATAS COVER: BAGIKAN (Kiri) & PENGATURAN / PORTAL (Kanan) -->
                <div class="absolute top-3.5 left-3.5 right-3.5 flex items-center justify-between z-30">
                    <!-- Tombol Bagikan Capsule Glassmorphism -->
                    <button @click="openShareModal = true" 
                            class="px-3.5 py-1.5 rounded-full text-xs font-semibold backdrop-blur-xl bg-black/40 hover:bg-black/60 text-white border border-white/25 flex items-center gap-1.5 shadow-md active:scale-95 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                        <span>Bagikan</span>
                    </button>

                    <!-- Navigasi Cepat Pengaturan (Pemilik/Admin) atau Link Portal Sekolah -->
                    @if(auth()->check() && (auth()->id() === $user->id || auth()->user()->isSuperUser() || auth()->user()->isAdmin()))
                        <a href="{{ route('profile.edit') }}" 
                           class="px-3.5 py-1.5 rounded-full text-xs font-semibold backdrop-blur-xl bg-black/40 hover:bg-black/60 text-white border border-white/25 flex items-center gap-1.5 shadow-md active:scale-95 transition-all"
                           title="Buka Pengaturan Profil & Biolink">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/></svg>
                            <span>Pengaturan</span>
                        </a>
                    @elseif($tenant)
                        @php
                            $baseDomain = config('app.url_base_domain', 'localhost');
                            $tenantPortalLink = 'http://' . $tenant->subdomain . '.' . $baseDomain . (request()->getPort() && request()->getPort() != 80 ? ':'.request()->getPort() : '');
                        @endphp
                        <a href="{{ $tenantPortalLink }}" target="_blank"
                           class="px-3.5 py-1.5 rounded-full text-[11px] font-semibold backdrop-blur-xl bg-black/40 hover:bg-black/60 text-white border border-white/25 flex items-center gap-1.5 shadow-md transition-all"
                           title="Kunjungi Portal {{ $tenant->name }}">
                            <span class="truncate max-w-[130px]">{{ $tenant->name }}</span>
                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Profile Picture (Floating Halus di Bawah Cover - Spacing Bernafas) -->
            <div class="flex flex-col items-center -mt-14 sm:-mt-16 relative z-10 text-center px-2">
                <div class="relative group">
                    <!-- Avatar Frame dengan Double Ring & Gradient Glow -->
                    <div class="w-28 h-28 sm:w-32 sm:h-32 rounded-full p-[3px] shadow-2xl transition-transform duration-300 group-hover:scale-105"
                         :style="{ background: avatarGlow }">
                        <img src="{{ $user->profile_photo_url }}" 
                             alt="{{ $user->name }}" 
                             class="w-full h-full object-cover rounded-full bg-zinc-800 border-2 border-white/90 dark:border-zinc-900 shadow-inner"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name ?: 'Siswa') }}&color=2563EB&background=DBEAFE&size=256';">
                    </div>

                    <!-- Verified Badge Checkmark -->
                    @if($user->whatsapp_verified_at || $user->email_verified_at)
                        <div class="absolute bottom-1 right-1 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-blue-500 text-white flex items-center justify-center shadow-lg border-2 border-white dark:border-zinc-900"
                             title="Akun Siswa Terverifikasi Resmi {{ $tenantName }}">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                    @endif
                </div>

                <!-- Nama Lengkap & Identitas Siswa -->
                <div class="mt-2.5">
                    <h1 class="text-2xl sm:text-3xl font-display font-extrabold tracking-tight leading-tight">
                        {{ $user->name }}
                    </h1>

                    <!-- Bio Personal -->
                    <p class="text-xs sm:text-sm max-w-sm mx-auto mt-1 leading-relaxed opacity-90 font-sans">
                        {{ $user->bio ?: 'Peserta didik aktif yang mengikuti pembelajaran dan evaluasi CBT di platform ' . $tenantName . '.' }}
                    </p>
                </div>

                <!-- Media Sosial & Kontak Quick-Bar -->
                @php
                    $activeSocials = collect($socialLinks ?? [])->filter(fn($val) => !empty($val));
                    // Jika belum ada social links di pengaturan tetapi siswa punya nomor whatsapp, tambahkan whatsapp secara otomatis
                    if ($activeSocials->isEmpty() && $user->whatsapp_number) {
                        $activeSocials['whatsapp'] = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $user->whatsapp_number);
                    }
                @endphp

                @if($activeSocials->isNotEmpty())
                    <div class="flex items-center justify-center gap-2 mt-2.5 flex-wrap">
                        @foreach($activeSocials as $platform => $url)
                            @php
                                $cleanUrl = str_starts_with($url, 'http://') || str_starts_with($url, 'https://') ? $url : 'https://' . $url;
                            @endphp
                            <a href="{{ $cleanUrl }}" target="_blank" rel="noopener noreferrer" 
                               class="w-9 h-9 rounded-xl flex items-center justify-center border transition-all hover:scale-110 active:scale-95 shadow-soft"
                               :class="cardStyle" title="{{ ucfirst($platform) }}">
                                @if($platform === 'instagram')
                                    <svg class="w-4 h-4 text-pink-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                @elseif($platform === 'tiktok')
                                    <svg class="w-4 h-4 text-cyan-400" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1.04-.1z"/></svg>
                                @elseif($platform === 'whatsapp')
                                    <svg class="w-4 h-4 text-emerald-500" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.301-.15-1.777-.877-2.052-.977-.275-.1-.476-.15-.676.15-.2.301-.776.977-.951 1.178-.175.2-.351.226-.652.075-.3-.15-1.27-.468-2.42-1.494-.894-.798-1.497-1.784-1.672-2.084-.176-.301-.019-.464.132-.614.135-.136.301-.351.451-.527.151-.176.201-.301.302-.502.1-.2.05-.376-.026-.526-.075-.151-.676-1.63-.927-2.232-.244-.587-.493-.507-.677-.517-.175-.01-.376-.01-.577-.01-.2 0-.526.075-.802.376-.276.301-1.053 1.028-1.053 2.508 0 1.48 1.079 2.909 1.229 3.109.15.201 2.124 3.243 5.145 4.549.719.311 1.28.497 1.718.636.723.23 1.381.198 1.901.12.579-.087 1.777-.727 2.027-1.43.25-.702.25-1.304.175-1.43-.075-.126-.276-.201-.577-.351zM12.042 21.84c-1.787 0-3.535-.48-5.064-1.388l-.363-.215-3.766.988 1.005-3.67-.236-.375c-.998-1.587-1.526-3.425-1.526-5.31C2.1 6.57 6.562 2.1 12.043 2.1c2.656 0 5.153 1.034 7.03 2.91 1.876 1.877 2.909 4.373 2.909 7.03 0 5.473-4.462 9.943-9.94 9.943z"/></svg>
                                @elseif($platform === 'discord')
                                    <svg class="w-4 h-4 text-indigo-400" viewBox="0 0 24 24" fill="currentColor"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057a.082.082 0 0 0 .031.057 19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03zM8.02 15.33c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.956-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.956 2.418-2.157 2.418zm7.975 0c-1.183 0-2.157-1.085-2.157-2.419 0-1.333.955-2.419 2.157-2.419 1.21 0 2.176 1.096 2.157 2.42 0 1.333-.946 2.418-2.157 2.418z"/></svg>
                                @elseif($platform === 'twitter' || $platform === 'x')
                                    <svg class="w-4 h-4 text-sky-400" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                @elseif($platform === 'spotify')
                                    <svg class="w-4 h-4 text-emerald-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/></svg>
                                @elseif($platform === 'linkedin')
                                    <svg class="w-4 h-4 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                @elseif($platform === 'youtube')
                                    <svg class="w-4 h-4 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><polygon points="10 15 15 12 10 9 10 15"/></svg>
                                @else
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        <!-- ================= BENTO BRAG SHEET: STATISTIK RINGKAS ================= -->
        <!-- Memakai angka nyata tanpa dummy data, jika belum ada data bernilai 0 -->
        <section class="px-4 mt-3.5">
            <div class="flex items-center justify-between mb-1.5 px-1">
                <h2 class="text-xs font-display font-bold uppercase tracking-wider opacity-70 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="currentColor"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    <span>Rapor Kilat &amp; Pencapaian</span>
                </h2>
                <span class="text-[10px] font-display font-bold px-2 py-0.5 rounded-full border shadow-2xs"
                      :style="{ color: currentTheme.primary, borderColor: currentTheme.hex + '40', backgroundColor: currentTheme.hex + '15' }">
                    Terverifikasi CBT
                </span>
            </div>

            <!-- Bento 2x2 Grid -->
            <div class="grid grid-cols-2 gap-2.5">
                <!-- Rata-rata Skor -->
                <div class="p-3.5 rounded-2xl border transition-all duration-200 flex flex-col justify-between" :class="cardStyle">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-display font-bold uppercase tracking-wider opacity-70">Rata-rata Skor</span>
                        <span class="w-6 h-6 rounded-lg flex items-center justify-center" :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                        </span>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-2xl font-display font-bold tracking-tight" :style="{ color: currentTheme.primary }">
                                {{ $avgScore ?? 0 }}
                            </span>
                            @if($highestScore > 0)
                                <span class="text-[11px] font-bold px-1.5 py-0.5 rounded" :style="{ backgroundColor: currentTheme.hex + '25', color: currentTheme.primary }" title="Skor Tertinggi">
                                    Max {{ $highestScore }}
                                </span>
                            @endif
                        </div>
                        <p class="text-[10px] opacity-65 mt-0.5">Dari {{ $completedCount ?? 0 }} evaluasi CBT</p>
                    </div>
                </div>

                <!-- Peringkat -->
                <div class="p-3.5 rounded-2xl border transition-all duration-200 flex flex-col justify-between" :class="cardStyle">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-display font-bold uppercase tracking-wider opacity-70">Peringkat</span>
                        <span class="w-6 h-6 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 4 3 12h14l3-12-6 7-4-7-4 7-6-7zm3 16h14"/></svg>
                        </span>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-display font-bold tracking-tight text-amber-400">
                                {{ $rank ? '#' . $rank : '#0' }}
                            </span>
                            <span class="text-xs font-semibold opacity-65">/ {{ $totalStudents > 0 ? $totalStudents : 1 }} Siswa</span>
                        </div>
                        <p class="text-[10px] opacity-65 mt-0.5">
                            @if($rank && $totalStudents > 0)
                                Top {{ max(1, round(($rank / $totalStudents) * 100)) }}% Angkatan
                            @else
                                Peringkat Kelas Siswa
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Learning Streak -->
                <div class="p-3.5 rounded-2xl border transition-all duration-200 flex flex-col justify-between" :class="cardStyle">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-display font-bold uppercase tracking-wider opacity-70">Study Streak</span>
                        <span class="w-6 h-6 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
                        </span>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-display font-bold tracking-tight text-orange-400">
                                {{ $studyStreak ?? 0 }} Hari
                            </span>
                        </div>
                        <p class="text-[10px] opacity-65 mt-0.5">Latihan tanpa jeda</p>
                    </div>
                </div>

                <!-- Akurasi Soal -->
                <div class="p-3.5 rounded-2xl border transition-all duration-200 flex flex-col justify-between" :class="cardStyle">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-display font-bold uppercase tracking-wider opacity-70">Akurasi Soal</span>
                        <span class="w-6 h-6 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                        </span>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-baseline gap-1">
                            <span class="text-2xl font-display font-bold tracking-tight text-blue-400">
                                {{ $accuracy ?? 0 }}%
                            </span>
                        </div>
                        <p class="text-[10px] opacity-65 mt-0.5">
                            {{ $totalCorrect ?? 0 }} dari {{ $totalAnswered ?? 0 }} benar
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= TAB CONTAINER: HASIL UJIAN | PETA MAPEL | TARGET ================= -->
        <section class="px-4 mt-3.5">
            <!-- TAB BAR HEADER -->
            <div class="p-1 rounded-2xl border flex items-center gap-1 shadow-soft transition-all"
                 :class="tabNavStyle">
                
                <!-- Tab 1: Hasil Ujian -->
                <button @click="activeTab = 'history'" 
                        class="flex-1 py-2.5 px-2 rounded-xl text-xs font-display font-bold transition-all duration-200 flex items-center justify-center gap-1.5"
                        :class="activeTab === 'history' ? tabActiveStyle : tabInactiveStyle">
                    <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/><circle cx="12" cy="8" r="6"/></svg>
                    <span class="truncate">Hasil Ujian</span>
                </button>

                <!-- Tab 2: Peta Mapel -->
                <button @click="activeTab = 'mapel'" 
                        class="flex-1 py-2.5 px-2 rounded-xl text-xs font-display font-bold transition-all duration-200 flex items-center justify-center gap-1.5"
                        :class="activeTab === 'mapel' ? tabActiveStyle : tabInactiveStyle">
                    <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
                    <span class="truncate">Peta Mapel</span>
                </button>

                <!-- Tab 3: Target (Disesuaikan Kategori: UTBK, SKD, atau Lainnya) -->
                @php
                    $targetCategory = $targetConfig['category'] ?? 'utbk';
                    $targetTabTitle = $targetCategory === 'utbk' ? 'Target UTBK' : ($targetCategory === 'skd' ? 'Target SKD' : 'Target Incaran');
                @endphp
                <button @click="activeTab = 'target'" 
                        class="flex-1 py-2.5 px-2 rounded-xl text-xs font-display font-bold transition-all duration-200 flex items-center justify-center gap-1.5"
                        :class="activeTab === 'target' ? tabActiveStyle : tabInactiveStyle">
                    <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
                    <span class="truncate">{{ $targetTabTitle }}</span>
                </button>
            </div>

            <!-- TAB CONTENT 1: HASIL UJIAN TERBARU (DATA RIIL DARI DATABASE) -->
            <!-- Catatan: Mock status kelulusan statis telah dihapus sesuai instruksi user -->
            <div x-show="activeTab === 'history'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="mt-3 space-y-2.5">
                <div class="flex items-center justify-between px-1">
                    <span class="text-xs font-display font-bold opacity-75">Riwayat Evaluasi CBT Siswa</span>
                    <span class="text-[10px] font-sans opacity-60">{{ $historySessions->count() }} Sesi</span>
                </div>

                @forelse($historySessions as $session)
                    @php
                        $exam = $session->assessment;
                        $examTitle = $exam?->title ?? 'Sesi Evaluasi CBT';
                        $subj = $exam?->subject?->name ?? ($exam?->subject ?? 'Umum');
                        $subjAbbr = strtoupper(substr($subj, 0, 3));
                        $isCompleted = $session->status === 'completed';
                        $scoreVal = $isCompleted ? round((float) $session->score, 1) : null;
                        $questionsCount = $session->answers()->count() ?: ($exam?->questions_count ?? 0);
                        $formattedDate = $session->completed_at ? $session->completed_at->translatedFormat('d M Y') : ($session->created_at ? $session->created_at->translatedFormat('d M Y') : 'Hari ini');
                    @endphp
                    <div class="p-3.5 rounded-2xl border transition-all duration-200 flex items-center justify-between" :class="cardStyle">
                        <div class="flex items-center gap-3 min-w-0 pr-2">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center font-display font-bold text-xs shrink-0"
                                 :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                                {{ $subjAbbr }}
                            </div>
                            <div class="min-w-0">
                                <h4 class="font-display font-bold text-xs sm:text-sm truncate">{{ $examTitle }}</h4>
                                <p class="text-[11px] opacity-65 mt-0.5 font-sans">
                                    {{ $formattedDate }} • {{ $subj }}
                                    @if($questionsCount > 0)
                                        • {{ $questionsCount }} Soal
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="text-right shrink-0">
                            @if($isCompleted)
                                <span class="text-base font-display font-bold" :style="{ color: currentTheme.primary }">
                                    {{ $scoreVal }}
                                </span>
                                <span class="text-[9px] font-display font-bold uppercase block px-1.5 py-0.5 rounded"
                                      :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                                    {{ $scoreVal >= 75 ? 'LULUS' : 'SELESAI' }}
                                </span>
                            @else
                                <a href="{{ route('exam.workspace', $session->uuid ?: $session->id) }}" class="text-[11px] font-display font-bold px-2 py-1 rounded-lg bg-amber-400 text-black hover:bg-amber-300">
                                    Lanjut
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="p-6 rounded-2xl border text-center" :class="cardStyle">
                        <div class="w-10 h-10 mx-auto mb-2 rounded-xl flex items-center justify-center opacity-60"
                             :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                        </div>
                        <p class="text-xs font-semibold opacity-75">Belum ada riwayat ujian CBT.</p>
                        <p class="text-[11px] opacity-50 mt-0.5">Siswa belum menyelesaikan evaluasi pembelajaran.</p>
                    </div>
                @endforelse
            </div>

            <!-- TAB CONTENT 2: PETA KEKUATAN MATA PELAJARAN (DATA RIIL) -->
            <div x-show="activeTab === 'mapel'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="mt-3">
                <div class="p-4 rounded-3xl border transition-all duration-200" :class="cardStyle">
                    <div class="flex items-center justify-between mb-3.5">
                        <span class="text-xs font-display font-bold opacity-75">Distribusi Kekuatan Siswa</span>
                        <span class="text-[10px] font-sans opacity-60">Evaluasi Pembelajaran Riil</span>
                    </div>

                    <div class="space-y-3.5">
                        @forelse($subjectStats as $stat)
                            @php
                                $scorePct = min(100, max(0, (float) $stat->avg_score));
                                $statusLabel = $scorePct >= 85 ? 'Sangat Kuat' : ($scorePct >= 70 ? 'Kuat' : ($scorePct >= 50 ? 'Cukup' : 'Perlu Latihan'));
                            @endphp
                            <div>
                                <div class="flex justify-between items-center text-xs font-semibold mb-1">
                                    <span class="flex items-center gap-1.5 font-display font-bold">
                                        <svg class="w-4 h-4 shrink-0" :style="{ color: currentTheme.primary }" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 15 6.5-6.5"/><path d="m22 9-6.5 6.5"/><path d="m15 2-6.5 6.5"/><path d="m9 22 6.5-6.5"/><path d="m17 7-5 5"/><path d="m7 17 5-5"/></svg>
                                        <span>{{ $stat->subject_name }}</span>
                                    </span>
                                    <span class="font-mono font-bold" :style="{ color: currentTheme.primary }">
                                        {{ $stat->avg_score }}% • {{ $statusLabel }}
                                    </span>
                                </div>
                                <div class="w-full h-2 rounded-full overflow-hidden bg-black/15 dark:bg-white/10">
                                    <div class="h-full rounded-full transition-all duration-500" :style="{ width: '{{ $scorePct }}%', backgroundColor: currentTheme.primary }"></div>
                                </div>
                            </div>
                        @empty
                            <div class="py-4 text-center">
                                <p class="text-xs font-semibold opacity-75">Belum ada statistik mata pelajaran.</p>
                                <p class="text-[11px] opacity-50 mt-0.5">Nilai akan terdistribusi secara otomatis saat ujian diselesaikan.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- TAB CONTENT 3: TARGET IMPIAN (UTBK / SKD / KELAS 1-12) -->
            @php
                $targetCat = $targetConfig['category'] ?? 'utbk';
                $isRegular = is_numeric($targetCat) && (int)$targetCat >= 1 && (int)$targetCat <= 12;
                $field1 = $targetConfig['field_1'] ?? '';
                $field2 = $targetConfig['field_2'] ?? '';
                $field3 = (float) ($targetConfig['field_3'] ?? ($isRegular ? 100 : 0));
                
                $targetLabelHeader = $isRegular ? 'Target Akademik & Kelas' : 'Kampus & Jurusan Incaran';
                $targetBadgeLabel = $isRegular ? ('Kelas ' . $targetCat) : strtoupper($targetCat);
                $field1Default = $isRegular ? ('Kelas ' . $targetCat . ' Reguler') : 'Belum ditentukan';
                $field2Default = $isRegular ? 'Mata Pelajaran Unggulan' : 'Target Kampus / Instansi';

                // Singkatan lembaga / kampus untuk badge
                $targetAbbr = '';
                if ($field2) {
                    $words = preg_split('/\s+/', trim($field2));
                    foreach ($words as $w) {
                        if ($w !== '') $targetAbbr .= strtoupper(substr($w, 0, 1));
                    }
                    $targetAbbr = substr($targetAbbr, 0, 4);
                } else {
                    $targetAbbr = $isRegular ? ('K' . $targetCat) : strtoupper($targetCat);
                }

                $targetProgress = $field3 > 0 ? min(100, round(($highestScore / $field3) * 100)) : 0;
            @endphp
            <div x-show="activeTab === 'target'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" class="mt-3 space-y-2.5">
                <div class="flex items-center justify-between px-1">
                    <span class="text-xs font-display font-bold opacity-75">{{ $targetLabelHeader }}</span>
                    <span class="text-[10px] font-display font-bold text-amber-400 bg-amber-400/10 px-2.5 py-0.5 rounded-full border border-amber-400/20 inline-flex items-center gap-1">
                        <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        <span>Target {{ $targetBadgeLabel }}</span>
                    </span>
                </div>

                <!-- Kartu Pilihan Target Siswa -->
                <div class="p-3.5 rounded-2xl border transition-all duration-200" :class="cardStyle">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-amber-500/15 border border-amber-500/30 flex items-center justify-center font-display font-bold text-amber-400 text-sm">
                                {{ $targetAbbr }}
                            </div>
                            <div>
                                <h3 class="font-display font-bold text-sm leading-tight">
                                    {{ $field1 ?: $field1Default }}
                                </h3>
                                <p class="text-xs opacity-65">
                                    {{ $field2 ?: $field2Default }}
                                </p>
                            </div>
                        </div>
                        <span class="px-2.5 py-1 rounded-xl text-xs font-display font-bold {{ $targetProgress >= 80 ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'bg-amber-500/15 text-amber-400 border border-amber-500/30' }}">
                            {{ $targetProgress }}% Peluang
                        </span>
                    </div>

                    <!-- Progress Bar Target Skor -->
                    <div class="mt-2.5">
                        <div class="flex justify-between text-[11px] font-semibold mb-1 opacity-75 font-sans">
                            <span>Skor TO Terbaik: <b class="font-mono text-emerald-400">{{ $highestScore ?? 0 }}</b></span>
                            <span>Passing Target: <b class="font-mono">{{ $field3 > 0 ? $field3 : ($isRegular ? 100 : '-') }}</b></span>
                        </div>
                        <div class="w-full h-2 rounded-full overflow-hidden bg-black/15 dark:bg-white/10">
                            <div class="h-full rounded-full transition-all duration-500" :style="{ width: '{{ $targetProgress }}%', backgroundColor: currentTheme.primary }"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================= BIOLINK ACTION BUTTONS: TAUTAN & AKTIVITAS REKOMENDASI ================= -->
        @php
            $tenantName = $tenant?->name ?? ($user->tenant?->name ?? 'Adzkia');
        @endphp
        <section class="px-4 mt-3.5 pb-6">
            <div class="flex items-center justify-between mb-1.5 px-1">
                <h2 class="text-xs font-display font-bold uppercase tracking-wider opacity-70 flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5 text-blue-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                    <span>Tautan &amp; Aktivitas Rekomendasi</span>
                </h2>
                <span class="text-[10px] font-sans opacity-50">{{ count($customLinks ?? []) }} Tautan</span>
            </div>

            <div class="space-y-3">
                @forelse($customLinks as $link)
                    @php
                        $targetUrl = $link['url'] ?? '#';
                        $isCertTrigger = str_contains($targetUrl, '#cert');
                        $linkIcon = $link['icon'] ?? 'link';
                    @endphp

                    @if($isCertTrigger)
                        <button type="button" @click="openCertModal = true"
                                class="w-full text-left p-4 rounded-2xl border transition-all duration-200 flex items-center justify-between group active:scale-[0.98] shadow-soft cursor-pointer"
                                :class="cardStyle">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform"
                                     :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/></svg>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-display font-bold text-sm transition-colors" :style="{ color: currentTheme.primary }">{{ $link['title'] ?? 'E-Sertifikat CBT' }}</h3>
                                        @if(!empty($link['badge']))
                                            <span class="px-2 py-0.5 rounded-full text-[9px] font-display font-bold uppercase"
                                                  :style="{ backgroundColor: currentTheme.hex + '25', color: currentTheme.primary, border: '1px solid ' + currentTheme.hex + '40' }">{{ $link['badge'] }}</span>
                                        @endif
                                    </div>
                                    <p class="text-xs opacity-65 mt-0.5 font-sans">{{ $link['subtitle'] ?: 'Sertifikat Kelulusan Evaluasi CBT Siswa ' . $tenantName }}</p>
                                </div>
                            </div>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all"
                                 :style="{ color: currentTheme.primary }">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            </div>
                        </button>
                    @else
                        <a href="{{ $targetUrl }}" target="_blank" rel="noopener noreferrer"
                           class="p-4 rounded-2xl border transition-all duration-200 flex items-center justify-between group active:scale-[0.98] shadow-soft"
                           :class="cardStyle">
                            <div class="flex items-center gap-3.5">
                                <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform"
                                     :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                                    @if($linkIcon === 'trophy')
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                    @elseif($linkIcon === 'book')
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/><path d="M6 6h10"/><path d="M6 10h10"/></svg>
                                    @elseif($linkIcon === 'certificate')
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/></svg>
                                    @elseif($linkIcon === 'whatsapp')
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.301-.15-1.777-.877-2.052-.977-.275-.1-.476-.15-.676.15-.2.301-.776.977-.951 1.178-.175.2-.351.226-.652.075-.3-.15-1.27-.468-2.42-1.494-.894-.798-1.497-1.784-1.672-2.084-.176-.301-.019-.464.132-.614.135-.136.301-.351.451-.527.151-.176.201-.301.302-.502.1-.2.05-.376-.026-.526-.075-.151-.676-1.63-.927-2.232-.244-.587-.493-.507-.677-.517-.175-.01-.376-.01-.577-.01-.2 0-.526.075-.802.376-.276.301-1.053 1.028-1.053 2.508 0 1.48 1.079 2.909 1.229 3.109.15.201 2.124 3.243 5.145 4.549.719.311 1.28.497 1.718.636.723.23 1.381.198 1.901.12.579-.087 1.777-.727 2.027-1.43.25-.702.25-1.304.175-1.43-.075-.126-.276-.201-.577-.351zM12.042 21.84c-1.787 0-3.535-.48-5.064-1.388l-.363-.215-3.766.988 1.005-3.67-.236-.375c-.998-1.587-1.526-3.425-1.526-5.31C2.1 6.57 6.562 2.1 12.043 2.1c2.656 0 5.153 1.034 7.03 2.91 1.876 1.877 2.909 4.373 2.909 7.03 0 5.473-4.462 9.943-9.94 9.943z"/></svg>
                                    @elseif($linkIcon === 'coffee')
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8h1a4 4 0 0 1 0 8h-1"/><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"/><line x1="6" x2="6" y1="1" y2="4"/><line x1="10" x2="10" y1="1" y2="4"/><line x1="14" x2="14" y1="1" y2="4"/></svg>
                                    @elseif($linkIcon === 'globe')
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                                    @elseif($linkIcon === 'youtube')
                                        <svg class="w-5 h-5 text-red-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><polygon points="10 15 15 12 10 9 10 15"/></svg>
                                    @else
                                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                                    @endif
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-display font-bold text-sm transition-colors" :style="{ color: currentTheme.primary }">
                                            {{ $link['title'] ?? 'Tautan' }}
                                        </h3>
                                        @if(!empty($link['badge']))
                                            <span class="px-2 py-0.5 rounded-full text-[9px] font-display font-bold uppercase bg-amber-400 text-black">
                                                {{ $link['badge'] }}
                                            </span>
                                        @endif
                                    </div>
                                    @if(!empty($link['subtitle']))
                                        <p class="text-xs opacity-65 mt-0.5 font-sans">{{ $link['subtitle'] }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="w-8 h-8 rounded-full flex items-center justify-center opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all"
                                 :style="{ color: currentTheme.primary }">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </div>
                        </a>
                    @endif
                @empty
                    <!-- Default Link jika murid belum menambahkan tautan custom -->
                    <button type="button" @click="openCertModal = true"
                            class="w-full text-left p-4 rounded-2xl border transition-all duration-200 flex items-center justify-between group active:scale-[0.98] shadow-soft cursor-pointer"
                            :class="cardStyle">
                        <div class="flex items-center gap-3.5">
                            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform"
                                 :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/></svg>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="font-display font-bold text-sm transition-colors" :style="{ color: currentTheme.primary }">Lihat E-Sertifikat Tryout Resmi</h3>
                                    <span class="px-2 py-0.5 rounded-full text-[9px] font-display font-bold uppercase"
                                          :style="{ backgroundColor: currentTheme.hex + '25', color: currentTheme.primary, border: '1px solid ' + currentTheme.hex + '40' }">RESMI</span>
                                </div>
                                <p class="text-xs opacity-65 mt-0.5 font-sans">Sertifikat Kelulusan Evaluasi CBT Siswa {{ $tenantName }}</p>
                            </div>
                        </div>
                        <div class="w-8 h-8 rounded-full flex items-center justify-center opacity-60 group-hover:opacity-100 group-hover:translate-x-1 transition-all"
                             :style="{ color: currentTheme.primary }">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </div>
                    </button>
                @endforelse
            </div>
        </section>

        <!-- ================= MODAL 1: SHARE POPUP ================= -->
        <div x-show="openShareModal" x-cloak class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <div @click.outside="openShareModal = false"
                 class="w-full max-w-sm rounded-3xl p-6 border shadow-2xl space-y-4"
                 :style="{ backgroundColor: currentTheme.bg, color: currentTheme.text, borderColor: currentTheme.hex + '40' }">
                <div class="flex items-center justify-between">
                    <h3 class="font-display font-bold text-lg">Bagikan Biolink</h3>
                    <button @click="openShareModal = false" class="p-1 rounded-full opacity-60 hover:opacity-100 transition-opacity" title="Tutup">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <!-- QR Code Box Aesthetic -->
                <div class="p-4 rounded-2xl flex flex-col items-center justify-center gap-2 border"
                     :class="cardStyle">
                    <div class="w-32 h-32 bg-white p-2 rounded-xl shadow-sm flex items-center justify-center">
                        <svg class="w-full h-full text-zinc-900" viewBox="0 0 100 100" fill="currentColor">
                            <rect x="10" y="10" width="25" height="25" rx="3" fill="#18181b"/>
                            <rect x="15" y="15" width="15" height="15" fill="#ffffff"/>
                            <rect x="18" y="18" width="9" height="9" :fill="currentTheme.primary"/>

                            <rect x="65" y="10" width="25" height="25" rx="3" fill="#18181b"/>
                            <rect x="70" y="15" width="15" height="15" fill="#ffffff"/>
                            <rect x="73" y="18" width="9" height="9" :fill="currentTheme.primary"/>

                            <rect x="10" y="65" width="25" height="25" rx="3" fill="#18181b"/>
                            <rect x="15" y="70" width="15" height="15" fill="#ffffff"/>
                            <rect x="18" y="73" width="9" height="9" :fill="currentTheme.primary"/>

                            <rect x="45" y="15" width="8" height="8" fill="#18181b"/>
                            <rect x="45" y="30" width="8" height="8" fill="#18181b"/>
                            <rect x="45" y="45" width="8" height="8" :fill="currentTheme.primary"/>
                            <rect x="25" y="45" width="8" height="8" fill="#18181b"/>
                            <rect x="65" y="45" width="8" height="8" fill="#18181b"/>
                            <rect x="45" y="65" width="8" height="8" fill="#18181b"/>
                            <rect x="65" y="65" width="8" height="8" fill="#18181b"/>
                            <rect x="80" y="80" width="8" height="8" :fill="currentTheme.primary"/>
                        </svg>
                    </div>
                    <p class="text-[11px] font-mono opacity-65 font-semibold">
                        {{ request()->getHost() }}/{{ '@' . ($user->username ?: $user->id) }}
                    </p>
                </div>

                <!-- Salin URL Box -->
                <div class="flex items-center gap-2">
                    <input type="text" readonly :value="shareUrl" 
                           class="flex-1 px-3 py-2.5 rounded-xl border text-xs font-mono font-semibold outline-none"
                           :class="cardStyle">
                    <button @click="copyFullLink()" class="px-4 py-2.5 rounded-xl text-white font-display font-bold text-xs shrink-0 transition-all active:scale-95 shadow-md"
                            :style="{ backgroundColor: currentTheme.primary }">
                        Salin
                    </button>
                </div>

                <!-- Bagikan ke Sosmed -->
                <div class="grid grid-cols-3 gap-2 pt-1 font-display">
                    <a :href="'https://wa.me/?text=' + encodeURIComponent('Lihat profil biolink belajarku di {{ addslashes($tenantName) }}: ' + shareUrl)" target="_blank"
                       class="py-2.5 px-2 rounded-xl text-xs font-bold text-center border transition-all flex items-center justify-center gap-1.5 hover:text-emerald-500"
                       :class="cardStyle">
                        <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.301-.15-1.777-.877-2.052-.977-.275-.1-.476-.15-.676.15-.2.301-.776.977-.951 1.178-.175.2-.351.226-.652.075-.3-.15-1.27-.468-2.42-1.494-.894-.798-1.497-1.784-1.672-2.084-.176-.301-.019-.464.132-.614.135-.136.301-.351.451-.527.151-.176.201-.301.302-.502.1-.2.05-.376-.026-.526-.075-.151-.676-1.63-.927-2.232-.244-.587-.493-.507-.677-.517-.175-.01-.376-.01-.577-.01-.2 0-.526.075-.802.376-.276.301-1.053 1.028-1.053 2.508 0 1.48 1.079 2.909 1.229 3.109.15.201 2.124 3.243 5.145 4.549.719.311 1.28.497 1.718.636.723.23 1.381.198 1.901.12.579-.087 1.777-.727 2.027-1.43.25-.702.25-1.304.175-1.43-.075-.126-.276-.201-.577-.351zM12.042 21.84c-1.787 0-3.535-.48-5.064-1.388l-.363-.215-3.766.988 1.005-3.67-.236-.375c-.998-1.587-1.526-3.425-1.526-5.31C2.1 6.57 6.562 2.1 12.043 2.1c2.656 0 5.153 1.034 7.03 2.91 1.876 1.877 2.909 4.373 2.909 7.03 0 5.473-4.462 9.943-9.94 9.943z"/></svg>
                        <span>WhatsApp</span>
                    </a>
                    <a :href="'https://twitter.com/intent/tweet?text=' + encodeURIComponent('Cek profil akademik dan capaian CBT {{ $user->name }} di {{ addslashes($tenantName) }}: ' + shareUrl)" target="_blank"
                       class="py-2.5 px-2 rounded-xl text-xs font-bold text-center border transition-all flex items-center justify-center gap-1.5 hover:text-white"
                       :class="cardStyle">
                        <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        <span>Twitter/X</span>
                    </a>
                    <button @click="shareNative()" 
                            class="py-2.5 px-2 rounded-xl text-xs font-bold text-center border transition-all flex items-center justify-center gap-1.5 hover:opacity-100"
                            :class="cardStyle">
                        <svg class="w-3.5 h-3.5 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"/><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"/></svg>
                        <span>Lainnya</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- ================= MODAL 2: E-SERTIFIKAT PREVIEW ULTRA-PREMIUM ================= -->
        @php
            $certNumber = 'ADZ/' . date('Y') . '/CBT-' . strtoupper(substr(md5($user->id . $tenantName . 'cert'), 0, 8));
            $certVerificationId = 'CBT-' . strtoupper(substr(md5($user->id . $tenantName . 'cred'), 0, 10));
            $predikatTitle = ($highestScore >= 80) ? 'DENGAN PUJIAN (DISTINCTION)' : (($highestScore >= 65) ? 'SANGAT MEMUASKAN (MERIT)' : 'LULUS MEMENUHI SYARAT (PASS)');
            $lastCompletedSession = $historySessions->first();
            $issueDate = $lastCompletedSession?->completed_at ? $lastCompletedSession->completed_at->translatedFormat('d F Y') : now()->translatedFormat('d F Y');
        @endphp
        <div x-show="openCertModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-3 sm:p-4 bg-black/85 backdrop-blur-md cert-modal-layer cert-modal-backdrop"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            <div @click.outside="openCertModal = false"
                 class="cert-modal-box w-full max-w-lg rounded-[28px] sm:rounded-[32px] p-4 sm:p-6 border shadow-2xl space-y-3 max-h-[92vh] overflow-y-auto no-scrollbar"
                 :style="{ backgroundColor: currentTheme.bg, color: currentTheme.text, borderColor: currentTheme.hex + '40' }">
                
                <!-- Modal Topbar (Hidden Saat Cetak) -->
                <div class="flex items-center justify-between pb-1 border-b no-print" :style="{ borderColor: currentTheme.hex + '25' }">
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg flex items-center justify-center shrink-0"
                              :style="{ backgroundColor: currentTheme.hex + '20', color: currentTheme.primary }">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/></svg>
                        </span>
                        <div>
                            <span class="text-[10px] font-mono uppercase tracking-wider block opacity-60">Sertifikat Digital Otentik</span>
                            <h3 class="font-display font-bold text-sm leading-tight">Sertifikat Kelulusan Evaluasi CBT Siswa {{ $tenantName }}</h3>
                        </div>
                    </div>
                    <button @click="openCertModal = false" class="p-1.5 rounded-full opacity-60 hover:opacity-100 transition-opacity cursor-pointer" title="Tutup">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <!-- Piagam Desain Diplomatik Modern (Mengikuti Warna Tema) -->
                <div id="printableCertificate" class="p-4 sm:p-6 rounded-2xl relative shadow-2xl overflow-hidden border-2 text-center"
                     :style="{ 
                         background: certBgStyle, 
                         borderColor: currentTheme.primary + '55',
                         color: currentTheme.isDark ? '#f8fafc' : '#0f172a'
                     }">

                    <!-- 4 Ornate Geometric Corner Accents -->
                    <div class="absolute top-2.5 left-2.5 w-4 h-4 border-t-2 border-l-2 pointer-events-none" :style="{ borderColor: currentTheme.primary }"></div>
                    <div class="absolute top-2.5 right-2.5 w-4 h-4 border-t-2 border-r-2 pointer-events-none" :style="{ borderColor: currentTheme.primary }"></div>
                    <div class="absolute bottom-2.5 left-2.5 w-4 h-4 border-b-2 border-l-2 pointer-events-none" :style="{ borderColor: currentTheme.primary }"></div>
                    <div class="absolute bottom-2.5 right-2.5 w-4 h-4 border-b-2 border-r-2 pointer-events-none" :style="{ borderColor: currentTheme.primary }"></div>

                    <!-- Inner Border Padding Box -->
                    <div class="border border-dashed rounded-xl p-3.5 sm:p-5 relative z-10" :style="{ borderColor: currentTheme.hex + '35' }">
                        
                        <!-- Kop Lambang Institusi / Medali Pita Header Bergradasi Tema -->
                        @if($tenant && $tenant->logo_path)
                            <div class="flex items-center justify-center mb-1.5">
                                <img src="{{ $tenant->logo_url }}" alt="{{ $tenantName }}" class="h-10 sm:h-11 max-w-[140px] object-contain drop-shadow" loading="lazy" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($tenantName) }}&color=10B981&background=D1FAE5';">
                            </div>
                        @else
                            <div class="w-11 h-11 mx-auto rounded-full flex items-center justify-center text-white shadow-lg mb-2 relative"
                                 :style="{ background: currentTheme.gradient }">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="8" r="6"/>
                                    <path d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"/>
                                </svg>
                            </div>
                        @endif

                        <!-- Identitas Penerbit Resmi & No Sertifikat -->
                        <div class="mb-2">
                            <h4 class="font-display font-extrabold text-sm sm:text-base uppercase tracking-wider mt-0.5"
                                :style="{ color: currentTheme.primary }">
                                {{ $tenantName }}
                            </h4>
                            <p class="text-[8.5px] sm:text-[9px] font-mono opacity-55 mt-0.5">
                                NO: {{ $certNumber }}
                            </p>
                        </div>

                        <!-- Judul Sertifikat -->
                        <div class="my-2 pt-2 border-t" :style="{ borderColor: currentTheme.hex + '25' }">
                            <p class="text-[9.5px] uppercase tracking-widest font-display font-extrabold" :style="{ color: currentTheme.primary }">
                                SERTIFIKAT KELULUSAN EVALUASI CBT
                            </p>
                            <p class="text-[10px] opacity-70 font-sans mt-0.5">
                                Diberikan sebagai penghargaan kelulusan kompetensi kepada:
                            </p>
                            
                            <!-- Nama Siswa -->
                            <h2 class="font-display font-black text-lg sm:text-2xl tracking-tight mt-1 mb-1"
                                :style="{ color: currentTheme.isDark ? '#ffffff' : '#0f172a' }">
                                {{ $user->name }}
                            </h2>

                            <!-- Deskripsi Singkat Kelulusan Sesuai Tenant -->
                            <p class="text-[10.5px] sm:text-[11px] opacity-80 font-sans max-w-sm mx-auto leading-relaxed mt-1">
                                Telah menyelesaikan evaluasi pembelajaran dan simulasi Computer Based Test (CBT) pada portal resmi <strong>{{ $tenantName }}</strong> dengan capaian kompetensi:
                            </p>

                            @if(!empty($targetConfig['target_class']) || !empty($targetConfig['target_major']))
                                <div class="mt-1.5 inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[8.5px] sm:text-[9px] font-sans border"
                                     :style="{ backgroundColor: currentTheme.hex + '12', borderColor: currentTheme.hex + '30' }">
                                    <span class="opacity-60">Program:</span>
                                    <strong class="font-display" :style="{ color: currentTheme.primary }">
                                        {{ strtoupper($targetConfig['target_class'] ?? 'CBT Reguler') }}
                                        @if(!empty($targetConfig['target_major'])) - {{ $targetConfig['target_major'] }} @endif
                                        @if(!empty($targetConfig['target_ptn'])) ({{ $targetConfig['target_ptn'] }}) @endif
                                    </strong>
                                </div>
                            @endif
                        </div>

                        <!-- Predikat Badge Dinamis -->
                        <div class="my-2">
                            <span class="inline-flex items-center gap-1 px-3 py-0.5 rounded-full text-[9px] sm:text-[9.5px] font-display font-black tracking-wide border shadow-2xs"
                                  :style="{ 
                                      backgroundColor: currentTheme.hex + '20', 
                                      color: currentTheme.primary, 
                                      borderColor: currentTheme.primary + '50' 
                                  }">
                                <svg class="w-3 h-3" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <span>{{ $predikatTitle }}</span>
                            </span>
                        </div>

                        <!-- Data Grid 4-Kolom Pencapaian Siswa Lengkap -->
                        <div class="grid grid-cols-4 gap-1 py-2 px-1.5 rounded-xl my-2 border text-center"
                             :style="{ 
                                 backgroundColor: currentTheme.isDark ? 'rgba(0,0,0,0.35)' : 'rgba(255,255,255,0.7)', 
                                 borderColor: currentTheme.hex + '25' 
                             }">
                            <div class="p-0.5">
                                <span class="block text-[8px] sm:text-[8.5px] font-sans opacity-60">Skor Tertinggi</span>
                                <span class="font-display font-bold text-xs sm:text-sm md:text-base" :style="{ color: currentTheme.primary }">
                                    {{ $highestScore ?? 0 }}
                                </span>
                            </div>
                            <div class="p-0.5 border-l" :style="{ borderColor: currentTheme.hex + '25' }">
                                <span class="block text-[8px] sm:text-[8.5px] font-sans opacity-60">Rata-rata</span>
                                <span class="font-display font-bold text-xs sm:text-sm md:text-base text-emerald-500">
                                    {{ $avgScore ?? 0 }}
                                </span>
                            </div>
                            <div class="p-0.5 border-l" :style="{ borderColor: currentTheme.hex + '25' }">
                                <span class="block text-[8px] sm:text-[8.5px] font-sans opacity-60">Ujian Tuntas</span>
                                <span class="font-display font-bold text-xs sm:text-sm md:text-base" :style="{ color: currentTheme.primary }">
                                    {{ $completedCount }}
                                </span>
                            </div>
                            <div class="p-0.5 border-l" :style="{ borderColor: currentTheme.hex + '25' }">
                                <span class="block text-[8px] sm:text-[8.5px] font-sans opacity-60">Akurasi Soal</span>
                                <span class="font-display font-bold text-xs sm:text-sm md:text-base text-amber-500">
                                    {{ $accuracy ?? 0 }}%
                                </span>
                            </div>
                        </div>

                        <!-- Legalitas, Tanggal & Stempel Digital Resmi Tenant -->
                        <div class="mt-2.5 pt-2 border-t flex items-center justify-between text-left"
                             :style="{ borderColor: currentTheme.hex + '25' }">
                            
                            <!-- Sisi Kiri: Verifikasi QR & Tanggal Terbit -->
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 p-0.5 rounded-lg border bg-white flex items-center justify-center shrink-0 shadow-2xs"
                                     :style="{ borderColor: currentTheme.hex + '40' }">
                                    <svg class="w-full h-full text-zinc-900" viewBox="0 0 24 24" fill="currentColor">
                                        <rect x="2" y="2" width="8" height="8" rx="1.5"/>
                                        <rect x="4" y="4" width="4" height="4" fill="#ffffff"/>
                                        <rect x="14" y="2" width="8" height="8" rx="1.5"/>
                                        <rect x="16" y="4" width="4" height="4" fill="#ffffff"/>
                                        <rect x="2" y="14" width="8" height="8" rx="1.5"/>
                                        <rect x="4" y="16" width="4" height="4" fill="#ffffff"/>
                                        <rect x="14" y="14" width="3" height="3"/>
                                        <rect x="19" y="14" width="3" height="3"/>
                                        <rect x="14" y="19" width="8" height="3"/>
                                    </svg>
                                </div>
                                <div>
                                    <span class="text-[7.5px] sm:text-[8px] font-mono opacity-60 block leading-tight">Digital Verifiable</span>
                                    <span class="text-[8.5px] sm:text-[9.5px] font-mono font-bold" :style="{ color: currentTheme.primary }">
                                        {{ $issueDate }}
                                    </span>
                                </div>
                            </div>

                            <!-- Sisi Kanan: Stempel Digital Resmi -->
                            <div class="text-right">
                                <div class="inline-flex items-center gap-1 text-[7.5px] sm:text-[8px] font-display font-bold px-1.5 py-0.5 rounded border"
                                     :style="{ 
                                         borderColor: currentTheme.primary + '50', 
                                         color: currentTheme.primary,
                                         backgroundColor: currentTheme.hex + '15'
                                     }">
                                    <svg class="w-2.5 h-2.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                                    <span>TERVERIFIKASI RESMI</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Footer Modal Action Buttons (Hidden Saat Cetak) -->
                <div class="flex gap-2 pt-1 no-print">
                    <button @click="showToast('Sertifikat ' + '{{ $user->name }}' + ' siap dicetak/diunduh!'); setTimeout(() => window.print(), 800)" 
                            class="flex-1 py-2.5 rounded-xl text-white font-display font-bold text-xs transition-all active:scale-95 shadow-md flex items-center justify-center gap-2 cursor-pointer"
                            :style="{ background: currentTheme.gradient }">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        <span>Unduh E-Sertifikat</span>
                    </button>
                    <button @click="openCertModal = false" class="px-4 py-2.5 rounded-xl border font-display font-bold text-xs opacity-70 hover:opacity-100 transition-opacity cursor-pointer"
                            :style="{ borderColor: currentTheme.hex + '40' }">
                        Tutup
                    </button>
                </div>

            </div>
        </div>

        <!-- ================= FLOATING TOAST FEEDBACK ================= -->
        <div x-show="toastMessage" x-cloak
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-4"
             class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 px-4 py-2.5 rounded-full bg-zinc-900 text-white dark:bg-white dark:text-zinc-900 text-xs font-display font-bold shadow-2xl flex items-center gap-2 border border-white/20">
             <svg class="w-3.5 h-3.5 text-amber-400 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
            <span x-text="toastMessage"></span>
        </div>

    </div>

    <!-- SCRIPT DATA & THEMES (14 WARNA: LIGHT CLEAN + 13 OPEN COLOR) -->
    <script>
        function biolinkApp() {
            return {
                themeKey: '{{ $biolinkTheme ?: "teal" }}', // Tema disimpan di profil murid
                activeTab: 'history', // 'history', 'mapel', 'target'
                openShareModal: false,
                openCertModal: false,
                toastMessage: '',
                shareUrl: window.location.href,

                // 14 Pilihan Warna: Light + 13 Palet Open Color (https://yeun.github.io/open-color/)
                themes: {
                    'light': {
                        name: 'Light',
                        hex: '#1c7ed6',
                        bg: '#f8fafc',
                        text: '#0f172a',
                        primary: '#1c7ed6',
                        gradient: 'linear-gradient(135deg, #1c7ed6 0%, #12b886 100%)',
                        isDark: false
                    },
                    'gray': {
                        name: 'Gray',
                        hex: '#868e96',
                        bg: '#343a40',
                        text: '#f8f9fa',
                        primary: '#ced4da',
                        gradient: 'linear-gradient(135deg, #343a40 0%, #212529 100%)',
                        isDark: true
                    },
                    'red': {
                        name: 'Red',
                        hex: '#fa5252',
                        bg: '#1a0909',
                        text: '#fff5f5',
                        primary: '#fa5252',
                        gradient: 'linear-gradient(135deg, #c92a2a 0%, #e03131 100%)',
                        isDark: true
                    },
                    'pink': {
                        name: 'Pink',
                        hex: '#e64980',
                        bg: '#1c0812',
                        text: '#fff0f6',
                        primary: '#f06595',
                        gradient: 'linear-gradient(135deg, #a61e4d 0%, #c2255c 100%)',
                        isDark: true
                    },
                    'grape': {
                        name: 'Grape',
                        hex: '#be4bdb',
                        bg: '#18081f',
                        text: '#f8f0fc',
                        primary: '#da77f2',
                        gradient: 'linear-gradient(135deg, #862e9c 0%, #9c36b5 100%)',
                        isDark: true
                    },
                    'violet': {
                        name: 'Violet',
                        hex: '#7950f2',
                        bg: '#120a22',
                        text: '#f3f0ff',
                        primary: '#9775fa',
                        gradient: 'linear-gradient(135deg, #5f3dc4 0%, #6741d9 100%)',
                        isDark: true
                    },
                    'indigo': {
                        name: 'Indigo',
                        hex: '#4c6ef5',
                        bg: '#0a0f24',
                        text: '#edf2ff',
                        primary: '#748ffc',
                        gradient: 'linear-gradient(135deg, #364fc7 0%, #3b5bdb 100%)',
                        isDark: true
                    },
                    'blue': {
                        name: 'Blue',
                        hex: '#228be6',
                        bg: '#071524',
                        text: '#e7f5ff',
                        primary: '#4dabf7',
                        gradient: 'linear-gradient(135deg, #1864ab 0%, #1971c2 100%)',
                        isDark: true
                    },
                    'cyan': {
                        name: 'Cyan',
                        hex: '#15aabf',
                        bg: '#05181c',
                        text: '#e3fafc',
                        primary: '#3bc9db',
                        gradient: 'linear-gradient(135deg, #0b7285 0%, #0c8599 100%)',
                        isDark: true
                    },
                    'teal': {
                        name: 'Teal',
                        hex: '#12b886',
                        bg: '#051a14',
                        text: '#e6fcf5',
                        primary: '#20c997',
                        gradient: 'linear-gradient(135deg, #087f5b 0%, #099268 100%)',
                        isDark: true
                    },
                    'green': {
                        name: 'Green',
                        hex: '#40c057',
                        bg: '#081a0c',
                        text: '#ebfbee',
                        primary: '#51cf66',
                        gradient: 'linear-gradient(135deg, #2b8a3e 0%, #2f9e44 100%)',
                        isDark: true
                    },
                    'lime': {
                        name: 'Lime',
                        hex: '#82c91e',
                        bg: '#121a05',
                        text: '#f4fce3',
                        primary: '#94d82d',
                        gradient: 'linear-gradient(135deg, #5c940d 0%, #66a80f 100%)',
                        isDark: true
                    },
                    'yellow': {
                        name: 'Yellow',
                        hex: '#f59f00',
                        bg: '#1c1404',
                        text: '#fff9db',
                        primary: '#ffd43b',
                        gradient: 'linear-gradient(135deg, #e67700 0%, #f08c00 100%)',
                        isDark: true
                    },
                    'orange': {
                        name: 'Orange',
                        hex: '#fd7e14',
                        bg: '#1f0d05',
                        text: '#fff4e6',
                        primary: '#ffa94d',
                        gradient: 'linear-gradient(135deg, #d9480f 0%, #e8590c 100%)',
                        isDark: true
                    }
                },

                get currentTheme() {
                    return this.themes[this.themeKey] || this.themes['teal'];
                },

                get bodyStyle() {
                    if (this.currentTheme.isDark) {
                        return {
                            backgroundColor: '#07090e',
                            backgroundImage: `radial-gradient(circle at 50% 0%, ${this.currentTheme.hex}18 0%, transparent 60%), radial-gradient(circle at 80% 25%, ${this.currentTheme.hex}0a 0%, transparent 40%)`,
                            color: this.currentTheme.text,
                            minHeight: '100vh'
                        };
                    } else {
                        return {
                            backgroundColor: '#e9ecef',
                            backgroundImage: `radial-gradient(circle at 50% 0%, ${this.currentTheme.hex}20 0%, transparent 65%), radial-gradient(circle at 80% 20%, ${this.currentTheme.hex}10 0%, transparent 40%)`,
                            color: this.currentTheme.text,
                            minHeight: '100vh'
                        };
                    }
                },

                get coverGradient() {
                    return this.currentTheme.gradient;
                },

                get avatarGlow() {
                    return this.currentTheme.gradient;
                },

                get certBgStyle() {
                    if (this.currentTheme.isDark) {
                        return `radial-gradient(ellipse at 50% 15%, ${this.currentTheme.hex}18 0%, #0d1117 75%, #080a0f 100%)`;
                    } else {
                        return `radial-gradient(ellipse at 50% 15%, ${this.currentTheme.hex}12 0%, #ffffff 75%, #f8fafc 100%)`;
                    }
                },

                get cardStyle() {
                    if (this.themeKey === 'light') {
                        return 'bg-white border-zinc-200/90 shadow-soft text-zinc-900';
                    } else {
                        return 'bg-white/5 border-white/10 hover:border-white/20 backdrop-blur-md shadow-card';
                    }
                },

                get pillStyle() {
                    if (this.themeKey === 'light') {
                        return 'bg-zinc-100 hover:bg-zinc-200 border-zinc-200 text-zinc-800';
                    } else {
                        return 'bg-white/10 hover:bg-white/15 border-white/10 text-white';
                    }
                },

                get tabNavStyle() {
                    if (this.themeKey === 'light') {
                        return 'bg-zinc-200/70 border-zinc-300/80';
                    } else {
                        return 'bg-black/30 border-white/10';
                    }
                },

                get tabActiveStyle() {
                    if (this.themeKey === 'light') {
                        return 'bg-white text-zinc-900 shadow-sm border border-zinc-200/80';
                    } else {
                        return 'bg-white/20 text-white shadow-sm border border-white/20';
                    }
                },

                get tabInactiveStyle() {
                    return 'opacity-60 hover:opacity-100';
                },

                copyFullLink() {
                    navigator.clipboard.writeText(this.shareUrl);
                    this.showToast('Tautan Biolink disalin ke clipboard!');
                    this.openShareModal = false;
                },

                shareNative() {
                    if (navigator.share) {
                        navigator.share({
                            title: '{{ addslashes($user->name) }} - Biolink Profil Siswa',
                            text: 'Lihat profil akademik dan capaian evaluasi CBT {{ addslashes($user->name) }} di {{ addslashes($tenantName) }}:',
                            url: this.shareUrl
                        });
                    } else {
                        this.copyFullLink();
                    }
                },

                showToast(msg) {
                    this.toastMessage = msg;
                    setTimeout(() => {
                        this.toastMessage = '';
                    }, 2800);
                }
            }
        }
    </script>
</body>
</html>
