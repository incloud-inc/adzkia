<x-layouts.student>
    @php
        $baseDomain = config('app.url_base_domain', 'localhost');
        $portalUrl = $tenant ? 'http://' . $tenant->subdomain . '.' . $baseDomain . (request()->getPort() && request()->getPort() != 80 ? ':'.request()->getPort() : '') : '#';
    @endphp

    <!-- ============================================== -->
    <!-- TAB 1: HOME (GRATIS) -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'home'" x-transition.opacity.duration.300ms class="space-y-6 p-4">
        <!-- Hero Profil Public View injected here -->
        <div x-data="{ searchQuery: '' }" class="w-full flex flex-col gap-6 pt-4 pb-8">
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
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">{{ $isTeacher ? 'Ujian Dibuat' : 'kali ASESMEN' }}</dt>
                    </div>
                    <div class="px-2">
                        <dd class="font-display font-black text-2xl text-gray-12">{{ $totalScore }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">{{ $isTeacher ? 'Total Soal' : 'TOTAL NILAI' }}</dt>
                    </div>
                    <div class="px-2">
                        <dd class="font-display font-black text-2xl text-gray-12">{{ $rank ? '#'.$rank : '-' }}</dd>
                        <dt class="font-sans text-[10.5px] font-bold text-gray-11 uppercase tracking-wider mt-0.5">{{ $isTeacher ? 'Peringkat Guru' : 'RANK' }}</dt>
                    </div>
                </dl>

                <!-- Tombol Aksi (WhatsApp jika nomor tersedia) -->
                @if($user->whatsapp_number)
                    <div class="flex justify-center mt-1">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $user->whatsapp_number) }}" target="_blank" class="w-full max-w-xs py-2.5 px-4 rounded-full text-xs font-bold bg-green-9 hover:bg-green-10 text-white shadow-xs transition-all duration-200 active:scale-[0.98] flex items-center justify-center gap-2">
                            <span>💬</span>
                            <span>{{ $isTeacher ? 'Konsultasi Guru' : 'Hubungi WhatsApp' }}</span>
                        </a>
                    </div>
                @endif
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
                    <a href="{{ route('exam.gate.show', $exam) }}" target="_blank" class="w-[220px] shrink-0 bg-white border border-gray-6 rounded-2xl p-4 shadow-xs hover:border-blue-6 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 flex flex-col justify-between snap-start">
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

        <!-- ========================================================= -->
        <!-- CARD 6: TKA SD         -->
        <!-- ========================================================= -->
        @if($showGradeTkaSd)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.tkaSd)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="layers" class="w-4 h-4" />
                        </span>
                        <span>TKA SD / MI</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-blue-3 text-blue-11 border border-blue-6/60">
                        {{ count($tkaSdAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari Asesmen TKA SD (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
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
                        @forelse(collect($tkaSdAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-blue-3 text-blue-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $item['title'] }}</h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 font-semibold text-[10px]">{{ $item['subject'] }}</span>
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
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen tka sd yang tersedia.</div>
                        @endforelse
                    </div>

                    <!-- Search Result List -->
                    <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                        <template x-for="item in filteredItems" :key="item.id">
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-blue-3 text-blue-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="item.title"></h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 font-semibold text-[10px]" x-text="item.subject"></span>
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
                            Tidak ada asesmen tka sd yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif

        <!-- ========================================================= -->
        <!-- CARD 7: TKA SMP         -->
        <!-- ========================================================= -->
        @if($showGradeTkaSmp)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.tkaSmp)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="layers" class="w-4 h-4" />
                        </span>
                        <span>TKA SMP / MTs</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-blue-3 text-blue-11 border border-blue-6/60">
                        {{ count($tkaSmpAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari Asesmen TKA SMP (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
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
                        @forelse(collect($tkaSmpAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-blue-3 text-blue-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $item['title'] }}</h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 font-semibold text-[10px]">{{ $item['subject'] }}</span>
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
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen tka smp yang tersedia.</div>
                        @endforelse
                    </div>

                    <!-- Search Result List -->
                    <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                        <template x-for="item in filteredItems" :key="item.id">
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-blue-3 text-blue-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="item.title"></h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 font-semibold text-[10px]" x-text="item.subject"></span>
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
                            Tidak ada asesmen tka smp yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif

        <!-- ========================================================= -->
        <!-- CARD 8: TKA SMA         -->
        <!-- ========================================================= -->
        @if($showGradeTkaSma)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.tkaSma)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="layers" class="w-4 h-4" />
                        </span>
                        <span>TKA SMA / MA</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-blue-3 text-blue-11 border border-blue-6/60">
                        {{ count($tkaSmaAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari Asesmen TKA SMA (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
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
                        @forelse(collect($tkaSmaAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-blue-3 text-blue-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $item['title'] }}</h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 font-semibold text-[10px]">{{ $item['subject'] }}</span>
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
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen tka sma yang tersedia.</div>
                        @endforelse
                    </div>

                    <!-- Search Result List -->
                    <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                        <template x-for="item in filteredItems" :key="item.id">
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-blue-3 text-blue-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="item.title"></h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 font-semibold text-[10px]" x-text="item.subject"></span>
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
                            Tidak ada asesmen tka sma yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif

        <!-- ========================================================= -->
        <!-- CARD 9: UTBK         -->
        <!-- ========================================================= -->
        @if($showGradeUtbk)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.utbk)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-purple-3 text-purple-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="layers" class="w-4 h-4" />
                        </span>
                        <span>UTBK SNBT</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-purple-3 text-purple-11 border border-purple-6/60">
                        {{ count($utbkAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari Asesmen UTBK (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
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
                        @forelse(collect($utbkAssessments)->take(5) as $item)
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
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen utbk yang tersedia.</div>
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
                            Tidak ada asesmen utbk yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif

        <!-- ========================================================= -->
        <!-- CARD 10: SKD         -->
        <!-- ========================================================= -->
        @if($showGradeSkd)
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.assessmentsData.skd)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-teal-3 text-teal-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="layers" class="w-4 h-4" />
                        </span>
                        <span>SKD Kedinasan & CPNS</span>
                    </h2>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-teal-3 text-teal-11 border border-teal-6/60">
                        {{ count($skdAssessments) }} Ujian
                    </span>
                </div>

                <!-- Search Bar -->
                <div class="relative mb-3">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                    </span>
                    <input type="text" x-model="searchQuery" placeholder="Cari Asesmen SKD (ketik min. 5 huruf)..." class="w-full bg-gray-1 border border-gray-6 rounded-full py-2 pl-9 pr-9 text-xs text-gray-12 placeholder:text-gray-9 focus:bg-white focus:border-blue-8 focus:ring-2 focus:ring-blue-8/20 outline-none transition-all duration-200">
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
                        @forelse(collect($skdAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-teal-3 text-teal-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate">{{ $item['title'] }}</h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-teal-3 text-teal-11 font-semibold text-[10px]">{{ $item['subject'] }}</span>
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
                            <div class="p-6 text-center text-gray-11 text-xs">Belum ada asesmen skd yang tersedia.</div>
                        @endforelse
                    </div>

                    <!-- Search Result List -->
                    <div x-show="searchQuery.trim().length >= 5" style="display: none;" class="flex flex-col gap-2.5">
                        <template x-for="item in filteredItems" :key="item.id">
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-teal-3 text-teal-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-5 h-5" />
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h3 class="font-display font-bold text-sm text-gray-12 truncate" x-text="item.title"></h3>
                                        <div class="flex items-center gap-1.5 text-[11px] text-gray-11 mt-1 flex-wrap font-sans">
                                            <span class="px-2 py-0.5 rounded-md bg-teal-3 text-teal-11 font-semibold text-[10px]" x-text="item.subject"></span>
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
                            Tidak ada asesmen skd yang cocok dengan pencarian.
                        </div>
                    </div>
                </div>
            </article>
        @endif


        </div>

    <!-- ============================================== -->
    <!-- TAB 2: ASESMEN (BERBAYAR) -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'assessment'" x-transition.opacity.duration.300ms style="display: none;" class="space-y-6 p-4">
        <header class="pt-6 pb-2 px-1">
            <h1 class="font-display font-black text-2xl text-gray-12 tracking-tight">Asesmen Premium</h1>
            <p class="font-sans text-[13px] text-gray-11 mt-1">Ujian Tryout, SKD, dan evaluasi berbayar</p>
        </header>

        @if($paidAssessments && $paidAssessments->count() > 0)
            <div class="space-y-4">
                @foreach($paidAssessments as $exam)
                    @php
                        $access = $exam->accesses?->first();
                        $isPurchased = !is_null($access);
                    @endphp
                    <article class="bg-gradient-to-b from-[#FFFDF8] to-white p-4 rounded-[24px] shadow-sm border {{ $isPurchased ? 'border-amber-300 shadow-[0_4px_20px_rgba(251,191,36,0.15)]' : 'border-amber-200/60' }} relative overflow-hidden">
                        <!-- Premium Badge Sparkle -->
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-400/20 rounded-full blur-xl"></div>
                        
                        <div class="relative z-10">
                            <div class="flex justify-between items-start mb-3">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase bg-gradient-to-r from-amber-200 to-amber-300 text-amber-900 shadow-sm border border-amber-400/50">
                                    {{ $exam->subject?->name ?? 'Premium' }}
                                </span>
                                @if($isPurchased)
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold bg-green-500 text-white shadow-sm flex items-center gap-1 border border-green-600">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        DIMILIKI
                                    </span>
                                @else
                                    <span class="text-[11px] text-amber-700 font-bold bg-amber-100 px-2.5 py-1 rounded-lg border border-amber-200">
                                        Rp {{ number_format((float)($exam->price ?? 0), 0, ',', '.') }}
                                    </span>
                                @endif
                            </div>
                            
                            <h3 class="font-display font-bold text-base text-gray-12 leading-snug mb-1.5">
                                {{ $exam->title }}
                            </h3>
                            <p class="font-sans text-xs text-gray-11 line-clamp-2 leading-relaxed mb-4">
                                {{ $exam->description ?: 'Ujian premium dengan standar CBT.' }}
                            </p>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-amber-200/50">
                                <span class="text-xs text-gray-11 font-medium">{{ $exam->questions_count }} Soal</span>
                                
                                @if($isPurchased)
                                    <a href="{{ route('exam.gate.show', $exam) }}" class="px-5 py-2 rounded-full bg-amber-500 text-white text-xs font-bold transition-transform active:scale-95 shadow-md shadow-amber-500/25 inline-flex items-center gap-2">
                                        <span>Buka Ujian</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                @else
                                    <a href="{{ route('assessments.show', $exam) }}" class="px-5 py-2 rounded-full bg-gray-12 hover:bg-black text-white text-xs font-bold transition-transform active:scale-95 shadow-sm inline-flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                        <span>Beli</span>
                                    </a>
                                @endif
                            </div>
                            
                            @if($isPurchased)
                                <div class="mt-3 text-[10px] text-center text-amber-700/80 font-medium bg-amber-50 rounded-lg py-1 border border-amber-100">
                                    Sisa: {{ $access->daysRemaining() }} Hari | {{ $access->availableAttempts() }}x Akses
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-[24px] border border-gray-5 shadow-sm mt-4">
                <div class="w-14 h-14 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center mx-auto mb-4 border border-amber-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h4 class="font-display font-bold text-sm text-gray-12">Tidak ada asesmen premium</h4>
                <p class="font-sans text-xs text-gray-11 mt-1.5 max-w-[250px] mx-auto">Saat ini belum ada daftar asesmen berbayar yang ditawarkan.</p>
            </div>
        @endif
    </div>

    <!-- ============================================== -->
    <!-- TAB 3: RIWAYAT -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'history'" x-transition.opacity.duration.300ms style="display: none;" class="space-y-6 p-4">
        <header class="pt-6 pb-2 px-1">
            <h1 class="font-display font-black text-2xl text-gray-12 tracking-tight">Riwayat Ujian</h1>
            <p class="font-sans text-[13px] text-gray-11 mt-1">Hasil pengerjaan asesmen Anda</p>
        </header>

        <div class="text-center py-16 bg-white rounded-[24px] border border-gray-5 shadow-sm mt-4">
            <div class="w-14 h-14 bg-gray-2 text-gray-11 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
            </div>
            <h4 class="font-display font-bold text-sm text-gray-12">Modul Riwayat Belum Tersedia</h4>
            <p class="font-sans text-xs text-gray-11 mt-1.5 max-w-[250px] mx-auto">Tampilan pengelompokan per asesmen dan evaluasi sedang dalam pengembangan.</p>
        </div>
    </div>

    <!-- ============================================== -->
    <!-- TAB 4: PROFIL -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'profile'" x-transition.opacity.duration.300ms style="display: none;" class="space-y-4 p-4">
        <header class="pt-6 pb-2 px-1 text-center">
            <h1 class="font-display font-black text-2xl text-gray-12 tracking-tight">Profil Saya</h1>
        </header>

        <div class="bg-white rounded-[24px] p-6 text-center border border-gray-5 shadow-sm">
            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-gray-3 shadow-md mb-4">
            <h2 class="font-display font-bold text-lg text-gray-12">{{ $user->name }}</h2>
            <p class="text-sm text-gray-11 font-mono mb-4">{{ $user->email }}</p>
            
            <a href="{{ route('profile.edit') }}" class="w-full inline-flex justify-center items-center gap-2 py-3 bg-gray-12 text-white rounded-xl font-bold text-sm hover:bg-black transition-colors active:scale-95 shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                <span>Edit Profil & Password</span>
            </a>
        </div>

        <div class="bg-white rounded-[24px] overflow-hidden border border-gray-5 shadow-sm divide-y divide-gray-4">
            @if($tenant)
                <div class="p-4 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-1 text-green-11 rounded-full flex items-center justify-center border border-green-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-11 font-semibold uppercase tracking-wider">Mitra Sekolah/Bimbel</p>
                            <p class="font-bold text-sm text-gray-12">{{ $tenant->name }}</p>
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="p-4 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-blue-1 text-blue-11 rounded-full flex items-center justify-center border border-blue-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-11 font-semibold uppercase tracking-wider">Kontak WhatsApp</p>
                        <p class="font-bold text-sm text-gray-12">{{ $user->whatsapp_number ?? 'Belum ditambahkan' }}</p>
                    </div>
                </div>
            </div>
            
            <div class="p-4">
                <form method="POST" action="{{ route('logout') }}" class="m-0 w-full">
                    @csrf
                    <button type="submit" class="w-full inline-flex justify-center items-center gap-2 py-3 bg-red-1 text-red-11 rounded-xl font-bold text-sm hover:bg-red-2 border border-red-4 transition-colors active:scale-95 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Keluar Akun</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.student>
