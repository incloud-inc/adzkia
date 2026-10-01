<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @php
        $role = null;
        if (isset($tenant)) {
            $role = $user->tenants()->where('tenant_id', $tenant->id)->first()?->pivot?->role;
        }
        if (! $role) {
            if ($user->isSuperUser()) {
                $role = 'S';
            } elseif ($user->isAdmin()) {
                $role = 'A';
            } elseif ($user->isTeacher()) {
                $role = 'T';
            } else {
                $role = 'U';
            }
        }

        $isStudent = ($role === 'U');
        $isTeacher = ($role === 'T');
        $isAdmin = ($role === 'A' || $role === 'S');

        $roleTitle = $isTeacher ? 'Profil Tenaga Pendidik' : ($isAdmin ? 'Profil Administrator Lembaga' : 'Profil Siswa');
    @endphp

    <title>{{ $user->name }} ({{ '@' . ($user->username ?? $user->id) }}) - {{ $roleTitle }} | Adzkia</title>
    <link rel="icon" type="image/png" href="{{ isset($tenant) && $tenant->favicon_url ? $tenant->favicon_url : asset('images/icon-adzkia.png') }}">
    <link rel="apple-touch-icon" href="{{ isset($tenant) && $tenant->favicon_url ? $tenant->favicon_url : asset('images/icon-adzkia.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Assessments Data & Alpine Component Definitions -->
    <script>
        window.assessmentsData = {
            sd: @json($sdAssessments),
            smp: @json($smpAssessments),
            sma: @json($smaAssessments)
        };

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

    <div x-data="{
        copied: false,
        copyUrl() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                this.copied = true;
                setTimeout(() => { this.copied = false; }, 2500);
            }).catch(() => {
                alert('Tautan berhasil disalin!');
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
            <span>Tautan profil publik berhasil disalin ke clipboard!</span>
        </div>

        <!-- ========================================================= -->
        <!-- CARD 1: IDENTITAS PROFIL SISWA & GURU                     -->
        <!-- ========================================================= -->
        <article class="bg-white rounded-2xl border border-gray-6 shadow-xs overflow-hidden flex flex-col text-center">
            <!-- Cover Natural -->
            <div class="w-full bg-gray-4 overflow-hidden relative max-h-52">
                <img src="{{ $user->cover_photo_url }}" alt="Cover {{ $user->name }}" class="w-full h-auto object-cover max-h-52 block">
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
            </div>

            <!-- Foto Profil Bulat: Separuh Atas Menutupi Cover -->
            <div class="flex justify-center -mt-14 mb-3 relative z-10">
                <img src="{{ $user->profile_photo_url }}" alt="Foto {{ $user->name }}" class="w-24 h-24 rounded-full bg-white object-cover border-4 border-white shadow-lg">
            </div>

            <div class="px-6 pb-6 pt-0 flex flex-col gap-3.5">
                <div>
                    <!-- Nama Lengkap & Icon Verified -->
                    <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight flex items-center justify-center gap-2">
                        <span>{{ $user->name }}</span>
                        <span class="text-blue-9 inline-flex" title="Akun Terverifikasi">
                            <x-radix-icon name="check-circled" class="w-5 h-5" />
                        </span>
                    </h1>

                    <!-- @username -->
                    <div class="mt-1">
                        <a href="{{ route('global.student.profile', $user->username ?? $user->id) }}" class="font-sans text-xs font-bold text-blue-11 hover:underline">
                            {{ '@' . ($user->username ?? $user->id) }}
                        </a>
                    </div>
                </div>

                <!-- BIO -->
                @if($user->bio)
                    <p class="font-sans text-sm text-gray-11 max-w-md mx-auto leading-relaxed">{{ $user->bio }}</p>
                @else
                    <p class="font-sans text-xs text-gray-10 italic max-w-md mx-auto">
                        {{ $isTeacher ? 'Tenaga pendidik terverifikasi di ekosistem platform Adzkia.' : 'Peserta didik aktif yang mengikuti pembelajaran dan evaluasi Adzkia.' }}
                    </p>
                @endif

                <!-- Statistik Siswa & Guru: Asesmen Dikerjakan, Total Nilai, Ranking -->
                <dl class="grid grid-cols-3 divide-x divide-gray-5 rounded-xl border border-gray-6 bg-gray-1 p-3 text-center mt-1">
                    <div class="px-2">
                        <dd class="font-display font-black text-2xl text-gray-12">{{ $completedCount }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">{{ $isTeacher ? 'Ujian Dibuat' : 'Asesmen Selesai' }}</dt>
                    </div>
                    <div class="px-2">
                        <dd class="font-display font-black text-2xl text-gray-12">{{ $totalScore }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">{{ $isTeacher ? 'Total Soal' : 'Total Nilai' }}</dt>
                    </div>
                    <div class="px-2">
                        <dd class="font-display font-black text-2xl text-gray-12">{{ $rank ? '#'.$rank : 'Top 10' }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">{{ $isTeacher ? 'Peringkat Guru' : 'Ranking Siswa' }}</dt>
                    </div>
                </dl>

                <!-- Tombol Aksi (WhatsApp / Salin Tautan) -->
                <div class="flex items-center gap-3 mt-1">
                    @if($user->whatsapp_number)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $user->whatsapp_number) }}" target="_blank" class="flex-1 py-2.5 px-4 rounded-full text-xs font-bold bg-green-9 hover:bg-green-10 text-white shadow-xs transition-all duration-200 active:scale-[0.98] flex items-center justify-center gap-2">
                            <span>💬</span>
                            <span>{{ $isTeacher ? 'Konsultasi Guru' : 'Hubungi WhatsApp' }}</span>
                        </a>
                    @endif
                    <button type="button" @click="copyUrl()" class="flex-1 py-2.5 px-4 rounded-full text-xs font-bold bg-gray-2 hover:bg-gray-3 text-gray-12 border border-gray-6 shadow-xs transition-all duration-200 active:scale-[0.98] cursor-pointer flex items-center justify-center gap-2">
                        <x-radix-icon name="copy" class="w-4 h-4 text-gray-11" />
                        <span>Bagikan Profil</span>
                    </button>
                </div>
            </div>
        </article>

        <!-- ========================================================= -->
        <!-- CARD 2: SEMUA ASESMEN UMUM (WAJIB - SCROLL KE KANAN)     -->
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
        <!-- CARD 3: ASESMEN JENJANG SD (ON/OFF ADMIN TENANT)          -->
        <!-- ========================================================= -->
        @if($showGradeSd)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.sd)">
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
                                        <x-radix-icon name="pencil-1" class="w-5 h-5" />
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
                                        <x-radix-icon name="pencil-1" class="w-5 h-5" />
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

        <!-- ========================================================= -->
        <!-- CARD 4: ASESMEN JENJANG SMP (ON/OFF ADMIN TENANT)         -->
        <!-- ========================================================= -->
        @if($showGradeSmp)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.smp)">
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

        <!-- ========================================================= -->
        <!-- CARD 5: ASESMEN JENJANG SMA (ON/OFF ADMIN TENANT)         -->
        <!-- ========================================================= -->
        @if($showGradeSma)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.sma)">
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

        <!-- Footer -->
        <footer class="text-center font-sans text-xs text-gray-11 py-4">
            <p>&copy; {{ date('Y') }} {{ $tenant->name ?? 'ADZKIA' }} • Portal Profil Resmi Evaluasi Belajar</p>
        </footer>

    </div>

</body>
</html>
