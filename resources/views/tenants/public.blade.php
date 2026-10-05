<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $isEnterprise = $tenant->isEnterprise();
        $tenantTitle = $isEnterprise ? $tenant->name : "{$tenant->name} - ADZKIA";
    @endphp
    <title>{{ $tenantTitle }}</title>
    
    @if($tenant->favicon_path)
        <link rel="icon" href="{{ $tenant->favicon_url }}">
        <link rel="apple-touch-icon" href="{{ $tenant->favicon_url }}">
    @else
        <link rel="icon" type="image/png" href="{{ asset('images/icon-adzkia.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/icon-adzkia.png') }}">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Tenant Portal Data & Alpine Functions Definition -->
    <script>
        window.tenantPortalData = {
            teachers: @json($allTeachers),
            students: @json($allStudents),
            sd: @json($sdAssessments),
            smp: @json($smpAssessments),
            sma: @json($smaAssessments)
        };

        function tenantGuruList(items) {
            return {
                items: Array.isArray(items) ? items : [],
                searchQuery: '',

                get filteredGurus() {
                    const q = this.searchQuery.trim().toLowerCase();
                    if (q.length >= 5) {
                        return this.items.filter(guru => {
                            const name = (guru.name || '').toLowerCase();
                            const bio = (guru.bio || '').toLowerCase();
                            return name.includes(q) || bio.includes(q);
                        });
                    }
                    return this.items.slice(0, 3);
                }
            };
        }

        function tenantSiswaList(items) {
            return {
                items: Array.isArray(items) ? items : [],
                searchQuery: '',

                get filteredMurids() {
                    const q = this.searchQuery.trim().toLowerCase();
                    if (q.length >= 5) {
                        return this.items.filter(murid => {
                            const name = (murid.name || '').toLowerCase();
                            const bio = (murid.bio || '').toLowerCase();
                            const username = (murid.username || '').toLowerCase();
                            return name.includes(q) || bio.includes(q) || username.includes(q);
                        });
                    }
                    return this.items.slice(0, 3);
                }
            };
        }

        function appStoreList(items) {
            return {
                items: Array.isArray(items) ? items : [],
                searchQuery: '',

                get filteredItems() {
                    const q = this.searchQuery.trim().toLowerCase();
                    if (q.length >= 5) {
                        return this.items.filter(item => {
                            const title = (item.title || '').toLowerCase();
                            const subject = (item.subject || '').toLowerCase();
                            return title.includes(q) || subject.includes(q);
                        });
                    }
                    return this.items.slice(0, 5);
                }
            };
        }
    </script>
</head>
<body class="bg-gray-2 text-gray-12 font-sans antialiased min-h-screen py-8 px-4 sm:px-6 flex flex-col items-center">

    @php
        $baseDomain = config('app.url_base_domain', 'localhost');
        $port = request()->getPort();
        $portSuffix = ($port && $port != 80 && $port != 443) ? ':'.$port : '';
        $displayPortalUrl = $tenant->subdomain . '.' . $baseDomain . $portSuffix;
        $httpPortalUrl = (request()->isSecure() ? 'https://' : 'http://') . $displayPortalUrl;
    @endphp

    <div x-data="{
        copied: false,
        copyUrl(url) {
            navigator.clipboard.writeText(url).then(() => {
                this.copied = true;
                setTimeout(() => { this.copied = false; }, 2500);
            }).catch(() => {
                alert('Gagal menyalin URL');
            });
        }
    }" class="w-full max-w-xl flex flex-col gap-6">

        <!-- Toast Salin URL -->
        <div x-show="copied" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             style="display: none;" 
             class="fixed bottom-6 right-6 z-50 bg-gray-12 text-gray-1 px-4 py-3 rounded-2xl shadow-xl flex items-center gap-2.5 text-xs font-semibold border border-gray-11">
            <span class="w-5 h-5 rounded-full bg-green-9 text-white flex items-center justify-center font-bold">✓</span>
            <span>Tautan portal publik sekolah berhasil disalin!</span>
        </div>

        <!-- ========================================================= -->
        <!-- CARD 1: IDENTITAS LEMBAGA PENDIDIKAN (TENANT)            -->
        <!-- ========================================================= -->
        <article class="bg-white rounded-3xl border border-gray-6 shadow-sm overflow-hidden flex flex-col">
            <!-- Cover Banner: Tinggi, Megah & Proporsional -->
            <div class="relative h-56 sm:h-64 w-full overflow-hidden" style="min-height: 224px; background: linear-gradient(135deg, #0284c7, #0369a1);">
                <img src="{{ $tenant->cover_photo_url }}" alt="Cover {{ $tenant->name }}" class="absolute inset-0 h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-black/10 pointer-events-none"></div>

                <!-- Tombol LOGIN & DAFTAR di Pojok Kanan Atas Cover -->
                @php
                    $isEnterprise = $tenant->isEnterprise();
                    $loginBtnColor = ($isEnterprise && !empty($tenant->theme_color)) ? $tenant->theme_color : '#16a34a';
                @endphp
                <div class="absolute top-4 right-4 z-20 flex items-center gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" 
                           style="background-color: {{ $loginBtnColor }};"
                           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-white text-xs sm:text-sm font-bold shadow-lg hover:brightness-110 active:scale-95 transition-all duration-200 backdrop-blur-xs">
                            <x-radix-icon name="dashboard" class="w-4 h-4" />
                            <span>Dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           style="background-color: {{ $loginBtnColor }};"
                           class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-white text-xs sm:text-sm font-bold shadow-lg hover:brightness-110 active:scale-95 transition-all duration-200 backdrop-blur-xs">
                            <x-radix-icon name="enter" class="w-4 h-4" />
                            <span>LOGIN</span>
                        </a>
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white/90 hover:bg-white text-gray-900 text-xs sm:text-sm font-bold shadow-lg backdrop-blur-md hover:brightness-105 active:scale-95 transition-all duration-200">
                            <span>Daftar</span>
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Body: Grid Bulletproof untuk Overlap Logo 50/50 & Identitas Sekolah -->
            <div class="relative z-10 px-5 pb-6 sm:px-6">
                <div class="grid grid-cols-1 items-start gap-x-4 gap-y-3 sm:grid-cols-[auto_1fr]">
                    <!-- Radix Avatar Profile: 50% Overlap di Cover, Pola Squircle Radix Themes yang Mewah & Bersih -->
                    <div class="relative z-20 shrink-0 -mt-12 sm:-mt-14 w-24 h-24 sm:w-28 sm:h-28 rounded-2xl sm:rounded-3xl bg-white p-1 shadow-xl ring-4 ring-white border border-gray-4 flex items-center justify-center overflow-hidden transition-transform duration-200 hover:scale-[1.02]">
                        <img src="{{ $tenant->logo_url }}" 
                             alt="Logo {{ $tenant->name }}" 
                             class="w-full h-full object-contain rounded-xl sm:rounded-2xl bg-white"
                             onerror="this.style.display='none'; if(this.nextElementSibling) { this.nextElementSibling.classList.remove('hidden'); this.nextElementSibling.classList.add('flex'); }">
                        
                        <!-- Radix Fallback Avatar Token (jika gambar kosong/error) -->
                        <div class="hidden w-full h-full items-center justify-center rounded-xl sm:rounded-2xl bg-gray-3 text-gray-11 font-display font-black text-xl sm:text-2xl select-none">
                            <span>{{ strtoupper(substr($tenant->name, 0, 2)) }}</span>
                        </div>
                    </div>

                    <!-- Nama Sekolah & Tagline: Selalu Muncul & Nyaman Dibaca di Area Putih -->
                    <div class="min-w-0 sm:pt-2">
                        <div class="flex flex-wrap items-center gap-x-2 gap-y-1">
                            <h1 class="font-display font-black text-xl sm:text-2xl text-gray-12 tracking-tight">
                                {{ $tenant->name }}
                            </h1>
                            <span class="inline-flex shrink-0 items-center text-blue-9 bg-blue-2 px-2.5 py-0.5 rounded-full text-xs font-semibold border border-blue-4" title="Institusi Terverifikasi Resmi">
                                <x-radix-icon name="check-circled" class="w-3.5 h-3.5 mr-1 text-blue-9" />
                                Terverifikasi
                            </span>
                        </div>

                        <!-- Tagline Tepat di Bawah Nama Sekolah -->
                        <p class="font-sans text-xs sm:text-sm text-gray-11 font-medium mt-1 leading-relaxed">
                            {{ $tenant->tagline ?: 'Lembaga pendidikan dan institusi mitra terverifikasi resmi pada ekosistem platform Adzkia.' }}
                        </p>
                    </div>
                </div>

                <!-- Panel 3-Kolom Statistik Valid: Asesmen, Guru, Siswa -->
                <dl class="mt-5 grid grid-cols-3 divide-x divide-gray-5 rounded-2xl border border-gray-6 bg-gray-1/80 p-3 sm:p-4 text-center shadow-2xs sm:mt-6">
                    <div class="px-2">
                        <dd class="font-display font-black text-xl sm:text-2xl text-gray-12 tabular-nums">{{ $jenjangAssessmentsCount }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">Asesmen</dt>
                    </div>
                    <div class="px-2">
                        <dd class="font-display font-black text-xl sm:text-2xl text-gray-12 tabular-nums">{{ $totalTeachers }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">Tenaga Pendidik</dt>
                    </div>
                    <div class="px-2">
                        <dd class="font-display font-black text-xl sm:text-2xl text-gray-12 tabular-nums">{{ $totalStudents }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">Siswa Terdaftar</dt>
                    </div>
                </dl>
            </div>
        </article>

        <!-- ========================================================= -->
        <!-- URUTAN 1: ASESMEN UMUM & TRY OUT TERBUKA                  -->
        <!-- ========================================================= -->
        <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                        <x-radix-icon name="file-text" class="w-4 h-4" />
                    </span>
                    <span>Asesmen Umum &amp; Try Out Terbuka</span>
                </h2>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-blue-3 text-blue-11 border border-blue-6/60">
                    Geser →
                </span>
            </div>

            <!-- Radix Horizontal Scroll Area -->
            <div class="overflow-x-auto pb-2 pt-1 -mx-2 px-2 scroll-smooth hide-scrollbar flex gap-3.5 snap-x snap-mandatory">
                @forelse($umumAssessments as $exam)
                    <a href="{{ route('assessments.show', $exam->id) }}" target="_blank" class="w-[220px] shrink-0 bg-white border border-gray-6 rounded-2xl p-4 shadow-xs hover:border-blue-6 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 flex flex-col justify-between snap-start">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                                    <x-radix-icon name="file-text" class="w-4 h-4" />
                                </div>
                                <span class="text-[10px] font-bold bg-green-3 text-green-11 border border-green-6/60 px-2.5 py-0.5 rounded-full uppercase">
                                    {{ $exam->subject?->name ?? 'Umum' }}
                                </span>
                            </div>
                            <h3 class="font-display font-bold text-sm text-gray-12 line-clamp-2 leading-snug">
                                {{ $exam->title }}
                            </h3>
                            <p class="font-sans text-xs text-gray-11 mt-1 line-clamp-2">
                                {{ Str::limit($exam->description ?: 'Ujian evaluasi dan asesmen terstruktur CBT.', 50) }}
                            </p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-dashed border-gray-5 flex items-center justify-between text-xs text-gray-11">
                            <span class="flex items-center gap-1 font-mono">
                                <x-radix-icon name="timer" class="w-3.5 h-3.5 text-gray-10" />
                                <span>{{ $exam->duration_minutes ?: 60 }} mnt</span>
                            </span>
                            <span class="font-bold text-blue-11 flex items-center gap-1">
                                <span>Buka</span>
                                <x-radix-icon name="arrow-right" class="w-3 h-3" />
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="p-6 text-gray-11 text-xs w-full text-center">Belum ada asesmen umum yang aktif.</div>
                @endforelse
            </div>
        </article>

        <!-- ========================================================= -->
        <!-- URUTAN 2: ASESMEN YANG DIPILIH TENANT (SD, SMP, SMA)      -->
        <!-- ========================================================= -->
        @if($showGradeSd)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.tenantPortalData.sd)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="backpack" class="w-4 h-4" />
                        </span>
                        <span>Asesmen Jenjang SD / MI</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-amber-3 text-amber-11 border border-amber-6/60">
                        {{ count($sdAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari asesmen SD (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
                    <button type="button" x-show="searchQuery.length > 0" @click="searchQuery = ''" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-gray-4 text-gray-11 hover:bg-gray-5 flex items-center justify-center text-[10px] cursor-pointer" style="display: none;">
                        <x-radix-icon name="cross-2" class="w-3 h-3" />
                    </button>
                </div>
                <div class="font-sans text-[11px] text-amber-11 italic mb-2.5 flex items-center gap-1.5" x-show="searchQuery.length > 0 && searchQuery.length < 5" style="display: none;">
                    <span>Ketik min. 5 huruf untuk menampilkan semua hasil</span>
                </div>

                <!-- Play Store / App Store List -->
                <div class="flex flex-col gap-2.5">
                    <!-- Default List: 5 Asesmen SD Terbaru (SSR) -->
                    <div x-show="searchQuery.trim().length < 5" class="flex flex-col gap-2.5">
                        @forelse(collect($sdAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-amber-3 text-amber-11 border border-amber-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="pencil1" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $item['title'] }}</h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-amber-3 text-amber-11 font-semibold text-[10px]">{{ $item['subject'] }}</span>
                                            <span>{{ $item['sections_count'] }} Bagian</span>
                                            <span>•</span>
                                            <span>{{ $item['questions_count'] }} Soal</span>
                                            <span>•</span>
                                            <span class="font-mono">⏱ {{ $item['duration_minutes'] }} mnt</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ $item['url'] }}" target="_blank" class="px-4 py-1.5 rounded-full text-xs font-bold bg-gray-2 text-blue-11 border border-gray-6 hover:bg-blue-9 hover:text-white hover:border-blue-9 transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    BUKA
                                </a>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen SD yang tersedia.</div>
                        @endforelse
                    </div>

                    <!-- Search Result List -->
                    <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                        <template x-for="item in filteredItems" :key="item.id">
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-amber-3 text-amber-11 border border-amber-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="pencil1" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="item.title"></h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-amber-3 text-amber-11 font-semibold text-[10px]" x-text="item.subject"></span>
                                            <span x-text="item.sections_count + ' Bagian'"></span>
                                            <span>•</span>
                                            <span x-text="item.questions_count + ' Soal'"></span>
                                            <span>•</span>
                                            <span class="font-mono" x-text="'⏱ ' + item.duration_minutes + ' mnt'"></span>
                                        </div>
                                    </div>
                                </div>
                                <a :href="item.url" target="_blank" class="px-4 py-1.5 rounded-full text-xs font-bold bg-gray-2 text-blue-11 border border-gray-6 hover:bg-blue-9 hover:text-white hover:border-blue-9 transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    BUKA
                                </a>
                            </div>
                        </template>
                        <div x-show="filteredItems.length === 0" class="p-6 text-center text-gray-11 text-xs">
                            Tidak ada asesmen SD yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif

        @if($showGradeSmp)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.tenantPortalData.smp)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-indigo-3 text-indigo-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="backpack" class="w-4 h-4" />
                        </span>
                        <span>Asesmen Jenjang SMP / MTs</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-indigo-3 text-indigo-11 border border-indigo-6/60">
                        {{ count($smpAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari asesmen SMP (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
                    <button type="button" x-show="searchQuery.length > 0" @click="searchQuery = ''" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-gray-4 text-gray-11 hover:bg-gray-5 flex items-center justify-center text-[10px] cursor-pointer" style="display: none;">
                        <x-radix-icon name="cross-2" class="w-3 h-3" />
                    </button>
                </div>
                <div class="font-sans text-[11px] text-amber-11 italic mb-2.5 flex items-center gap-1.5" x-show="searchQuery.length > 0 && searchQuery.length < 5" style="display: none;">
                    <span>Ketik min. 5 huruf untuk menampilkan semua hasil</span>
                </div>

                <!-- Play Store / App Store List -->
                <div class="flex flex-col gap-2.5">
                    <!-- Default List: 5 Asesmen SMP Terbaru (SSR) -->
                    <div x-show="searchQuery.trim().length < 5" class="flex flex-col gap-2.5">
                        @forelse(collect($smpAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-indigo-3 text-indigo-11 border border-indigo-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $item['title'] }}</h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-indigo-3 text-indigo-11 font-semibold text-[10px]">{{ $item['subject'] }}</span>
                                            <span>{{ $item['sections_count'] }} Bagian</span>
                                            <span>•</span>
                                            <span>{{ $item['questions_count'] }} Soal</span>
                                            <span>•</span>
                                            <span class="font-mono">⏱ {{ $item['duration_minutes'] }} mnt</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ $item['url'] }}" target="_blank" class="px-4 py-1.5 rounded-full text-xs font-bold bg-gray-2 text-blue-11 border border-gray-6 hover:bg-blue-9 hover:text-white hover:border-blue-9 transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    BUKA
                                </a>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen SMP yang tersedia.</div>
                        @endforelse
                    </div>

                    <!-- Search Result List -->
                    <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                        <template x-for="item in filteredItems" :key="item.id">
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-indigo-3 text-indigo-11 border border-indigo-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="item.title"></h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-indigo-3 text-indigo-11 font-semibold text-[10px]" x-text="item.subject"></span>
                                            <span x-text="item.sections_count + ' Bagian'"></span>
                                            <span>•</span>
                                            <span x-text="item.questions_count + ' Soal'"></span>
                                            <span>•</span>
                                            <span class="font-mono" x-text="'⏱ ' + item.duration_minutes + ' mnt'"></span>
                                        </div>
                                    </div>
                                </div>
                                <a :href="item.url" target="_blank" class="px-4 py-1.5 rounded-full text-xs font-bold bg-gray-2 text-blue-11 border border-gray-6 hover:bg-blue-9 hover:text-white hover:border-blue-9 transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    BUKA
                                </a>
                            </div>
                        </template>
                        <div x-show="filteredItems.length === 0" class="p-6 text-center text-gray-11 text-xs">
                            Tidak ada asesmen SMP yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif

        @if($showGradeSma)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.tenantPortalData.sma)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-purple-3 text-purple-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="layers" class="w-4 h-4" />
                        </span>
                        <span>Asesmen Jenjang SMA / MA / SMK</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-purple-3 text-purple-11 border border-purple-6/60">
                        {{ count($smaAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari asesmen SMA (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
                    <button type="button" x-show="searchQuery.length > 0" @click="searchQuery = ''" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-gray-4 text-gray-11 hover:bg-gray-5 flex items-center justify-center text-[10px] cursor-pointer" style="display: none;">
                        <x-radix-icon name="cross-2" class="w-3 h-3" />
                    </button>
                </div>
                <div class="font-sans text-[11px] text-amber-11 italic mb-2.5 flex items-center gap-1.5" x-show="searchQuery.length > 0 && searchQuery.length < 5" style="display: none;">
                    <span>Ketik min. 5 huruf untuk menampilkan semua hasil</span>
                </div>

                <!-- Play Store / App Store List -->
                <div class="flex flex-col gap-2.5">
                    <!-- Default List: 5 Asesmen SMA Terbaru (SSR) -->
                    <div x-show="searchQuery.trim().length < 5" class="flex flex-col gap-2.5">
                        @forelse(collect($smaAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-purple-3 text-purple-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $item['title'] }}</h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-purple-3 text-purple-11 font-semibold text-[10px]">{{ $item['subject'] }}</span>
                                            <span>{{ $item['sections_count'] }} Bagian</span>
                                            <span>•</span>
                                            <span>{{ $item['questions_count'] }} Soal</span>
                                            <span>•</span>
                                            <span class="font-mono">⏱ {{ $item['duration_minutes'] }} mnt</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ $item['url'] }}" target="_blank" class="px-4 py-1.5 rounded-full text-xs font-bold bg-gray-2 text-blue-11 border border-gray-6 hover:bg-blue-9 hover:text-white hover:border-blue-9 transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    BUKA
                                </a>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen SMA yang tersedia.</div>
                        @endforelse
                    </div>

                    <!-- Search Result List -->
                    <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                        <template x-for="item in filteredItems" :key="item.id">
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-purple-3 text-purple-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="item.title"></h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-purple-3 text-purple-11 font-semibold text-[10px]" x-text="item.subject"></span>
                                            <span x-text="item.sections_count + ' Bagian'"></span>
                                            <span>•</span>
                                            <span x-text="item.questions_count + ' Soal'"></span>
                                            <span>•</span>
                                            <span class="font-mono" x-text="'⏱ ' + item.duration_minutes + ' mnt'"></span>
                                        </div>
                                    </div>
                                </div>
                                <a :href="item.url" target="_blank" class="px-4 py-1.5 rounded-full text-xs font-bold bg-gray-2 text-blue-11 border border-gray-6 hover:bg-blue-9 hover:text-white hover:border-blue-9 transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    BUKA
                                </a>
                            </div>
                        </template>
                        <div x-show="filteredItems.length === 0" class="p-6 text-center text-gray-11 text-xs">
                            Tidak ada asesmen SMA yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif

        <!-- ========================================================= -->
        <!-- URUTAN 3: TENAGA PENDIDIK DAN KEPENDIDIKAN (GURU)         -->
        <!-- ========================================================= -->
        <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="tenantGuruList(window.tenantPortalData.teachers)">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-xl bg-green-3 text-green-11 flex items-center justify-center shadow-xs">
                        <x-radix-icon name="person" class="w-4 h-4" />
                    </span>
                    <span>Tenaga Pendidik &amp; Guru</span>
                </h2>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-green-3 text-green-11 border border-green-6/60">
                    {{ $totalTeachers }} Guru
                </span>
            </div>

            <!-- Search Bar Guru (Ketik min. 5 huruf) -->
            <div class="relative mb-3">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                    <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                </span>
                <input type="text" x-model="searchQuery" placeholder="Cari guru (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
                <button type="button" x-show="searchQuery.length > 0" @click="searchQuery = ''" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-gray-4 text-gray-11 hover:bg-gray-5 flex items-center justify-center text-[10px] cursor-pointer" style="display: none;">
                    <x-radix-icon name="cross-2" class="w-3 h-3" />
                </button>
            </div>
            <div class="font-sans text-[11px] text-amber-11 italic mb-2.5 flex items-center gap-1.5" x-show="searchQuery.length > 0 && searchQuery.length < 5" style="display: none;">
                <span>Ketik min. 5 huruf untuk mencari seluruh daftar guru</span>
            </div>

            <!-- List Guru -->
            <div class="flex flex-col gap-2.5">
                <!-- Default SSR List: 3 Guru Paling Update -->
                <div x-show="searchQuery.trim().length < 5" class="flex flex-col gap-2.5">
                    @forelse(collect($allTeachers)->take(3) as $teacher)
                        <div class="flex items-center justify-between p-3 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img src="{{ $teacher['photo_url'] }}" alt="{{ $teacher['name'] }}" class="w-10 h-10 rounded-full object-cover border border-gray-5 shrink-0 bg-gray-2">
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $teacher['name'] }}</h3>
                                    <p class="font-sans text-xs text-gray-11 truncate">{{ $teacher['bio'] }}</p>
                                </div>
                            </div>
                            @if($teacher['profile_url'])
                                <a href="{{ $teacher['profile_url'] }}" target="_blank" class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-3 text-blue-11 border border-blue-6/60 hover:bg-blue-4 transition-all duration-200 shrink-0 active:scale-95 flex items-center gap-1">
                                    <span>Profil</span>
                                    <x-radix-icon name="arrow-right" class="w-3 h-3" />
                                </a>
                            @else
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold text-gray-10 bg-gray-2 shrink-0">Guru</span>
                            @endif
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-11 text-xs">Belum ada data tenaga pendidik terdaftar.</div>
                    @endforelse
                </div>

                <!-- Dynamic Search List -->
                <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                    <template x-for="guru in filteredGurus" :key="guru.id">
                        <div class="flex items-center justify-between p-3 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img :src="guru.photo_url" :alt="guru.name" class="w-10 h-10 rounded-full object-cover border border-gray-5 shrink-0 bg-gray-2">
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="guru.name"></h3>
                                    <p class="font-sans text-xs text-gray-11 truncate" x-text="guru.bio"></p>
                                </div>
                            </div>
                            <template x-if="guru.profile_url">
                                <a :href="guru.profile_url" target="_blank" class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-3 text-blue-11 border border-blue-6/60 hover:bg-blue-4 transition-all duration-200 shrink-0 active:scale-95 flex items-center gap-1">
                                    <span>Profil</span>
                                    <x-radix-icon name="arrow-right" class="w-3 h-3" />
                                </a>
                            </template>
                            <template x-if="!guru.profile_url">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold text-gray-10 bg-gray-2 shrink-0">Guru</span>
                            </template>
                        </div>
                    </template>
                    <div x-show="filteredGurus.length === 0" class="p-6 text-center text-gray-11 text-xs">
                        Tidak ada guru yang cocok dengan pencarian.
                    </div>
                </div>
            </div>
        </article>

        <!-- ========================================================= -->
        <!-- URUTAN 4: SISWA & PESERTA DIDIK (LINK KE PROFIL BIO)      -->
        <!-- ========================================================= -->
        <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="tenantSiswaList(window.tenantPortalData.students)">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                    <span class="w-8 h-8 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                        <x-radix-icon name="avatar" class="w-4 h-4" />
                    </span>
                    <span>Siswa &amp; Peserta Didik</span>
                </h2>
                <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-amber-3 text-amber-11 border border-amber-6/60">
                    {{ $totalStudents }} Siswa
                </span>
            </div>

            <!-- Search Bar Siswa (Ketik min. 5 huruf) -->
            <div class="relative mb-3">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                    <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                </span>
                <input type="text" x-model="searchQuery" placeholder="Cari siswa (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
                <button type="button" x-show="searchQuery.length > 0" @click="searchQuery = ''" class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 rounded-full bg-gray-4 text-gray-11 hover:bg-gray-5 flex items-center justify-center text-[10px] cursor-pointer" style="display: none;">
                    <x-radix-icon name="cross-2" class="w-3 h-3" />
                </button>
            </div>
            <div class="font-sans text-[11px] text-amber-11 italic mb-2.5 flex items-center gap-1.5" x-show="searchQuery.length > 0 && searchQuery.length < 5" style="display: none;">
                <span>Ketik min. 5 huruf untuk mencari seluruh daftar siswa</span>
            </div>

            <!-- List Siswa -->
            <div class="flex flex-col gap-2.5">
                <!-- Default SSR List: 3 Siswa Paling Update -->
                <div x-show="searchQuery.trim().length < 5" class="flex flex-col gap-2.5">
                    @forelse(collect($allStudents)->take(3) as $student)
                        <a href="{{ $student['profile_url'] }}" target="_blank" class="flex items-center justify-between p-3 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group active:scale-[0.99]">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img src="{{ $student['photo_url'] }}" alt="{{ $student['name'] }}" class="w-10 h-10 rounded-full object-cover border border-gray-5 shrink-0 bg-gray-2">
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-display font-bold text-sm text-gray-12 truncate group-hover:text-blue-11 transition-colors">{{ $student['name'] }}</h3>
                                    <p class="font-sans text-xs text-gray-11 truncate">{{ $student['bio'] }}</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-3 text-amber-11 border border-amber-6/60 group-hover:bg-amber-4 transition-all duration-200 shrink-0 flex items-center gap-1">
                                <span>Profil</span>
                                <x-radix-icon name="arrow-right" class="w-3 h-3" />
                            </span>
                        </a>
                    @empty
                        <div class="p-6 text-center text-gray-11 text-xs">Belum ada data siswa terdaftar.</div>
                    @endforelse
                </div>

                <!-- Dynamic Search List -->
                <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                    <template x-for="murid in filteredMurids" :key="murid.id">
                        <a :href="murid.profile_url" target="_blank" class="flex items-center justify-between p-3 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group active:scale-[0.99]">
                            <div class="flex items-center gap-3 min-w-0 flex-1">
                                <img :src="murid.photo_url" :alt="murid.name" class="w-10 h-10 rounded-full object-cover border border-gray-5 shrink-0 bg-gray-2">
                                <div class="min-w-0 flex-1">
                                    <h3 class="font-display font-bold text-sm text-gray-12 truncate group-hover:text-blue-11 transition-colors" x-text="murid.name"></h3>
                                    <p class="font-sans text-xs text-gray-11 truncate" x-text="murid.bio"></p>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-amber-3 text-amber-11 border border-amber-6/60 group-hover:bg-amber-4 transition-all duration-200 shrink-0 flex items-center gap-1">
                                <span>Profil</span>
                                <x-radix-icon name="arrow-right" class="w-3 h-3" />
                            </span>
                        </a>
                    </template>
                    <div x-show="filteredMurids.length === 0" class="p-6 text-center text-gray-11 text-xs">
                        Tidak ada siswa yang cocok dengan pencarian.
                    </div>
                </div>
            </div>
        </article>

        <!-- Footer -->
        <footer class="text-center font-sans text-xs text-gray-11 py-4">
            @if($tenant->showsPoweredByAdzkia())
                <p>&copy; {{ date('Y') }} {{ $tenant->app_name }} • Powered by Aplikasi Ujian <strong class="font-black tracking-wide"><span style="color: #1c7ed6;">A</span><span style="color: #37b24d;">D</span><span style="color: #f76707;">Z</span><span style="color: #1c7ed6;">K</span><span style="color: #37b24d;">I</span><span style="color: #f76707;">A</span></strong></p>
            @else
                <p>&copy; {{ date('Y') }} {{ $tenant->app_name }}. Seluruh Hak Cipta Dilindungi.</p>
            @endif
        </footer>

    </div>

</body>
</html>
