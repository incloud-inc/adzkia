<x-layouts.student>
    @php
        $errors = $errors ?? new \Illuminate\Support\ViewErrorBag;
        $baseDomain = config('app.url_base_domain', 'localhost');
        $portalUrl = $tenant ? 'http://' . $tenant->subdomain . '.' . $baseDomain . (request()->getPort() && request()->getPort() != 80 ? ':'.request()->getPort() : '') : '#';
        $activeInProgressSession = $historySessions->where('status', 'in_progress')->first();

        $extractSubj = function($it, $def = 'Umum') {
            $s = data_get($it, 'subject');
            if (is_string($s) && $s !== '') {
                return $s;
            }
            return data_get($it, 'subject.name') ?: $def;
        };

        // Satukan seluruh asesmen ke dalam $allAssessmentsList untuk SSR Blade yang instan & zero-blank
        $allAssessmentsList = collect();
        $seenExamIds = [];

        $appendExams = function($items, $category, $defaultSubj) use (&$allAssessmentsList, &$seenExamIds, $extractSubj) {
            if (empty($items)) return;
            foreach ($items as $it) {
                $id = data_get($it, 'id');
                if ($id && !isset($seenExamIds[$id])) {
                    $seenExamIds[$id] = true;
                    $token = is_object($it) ? $it->token : (data_get($it, 'token') ?: data_get($it, 'settings.token'));
                    $allAssessmentsList->push([
                        'id' => $id,
                        'token' => $token ?: $id,
                        'title' => (string) data_get($it, 'title', 'Asesmen CBT'),
                        'subject' => $extractSubj($it, $defaultSubj),
                        'category' => $category,
                        'duration' => (int) data_get($it, 'duration_minutes', 60),
                        'questions' => (int) data_get($it, 'questions_count', 20),
                        'price_type' => (string) data_get($it, 'price_type', 'free'),
                        'price' => (float) data_get($it, 'price', 0),
                        'desc' => (string) (data_get($it, 'description') ?: 'Evaluasi pembelajaran terstruktur CBT format interaktif.'),
                    ]);
                }
            }
        };

        if ($paidAssessments && $paidAssessments->count() > 0) $appendExams($paidAssessments, 'premium', 'Premium');
        if (!empty($umumAssessments)) $appendExams($umumAssessments, 'umum', 'Umum');
        if ($showGradeSd && !empty($sdAssessments)) $appendExams($sdAssessments, 'sd', 'SD / MI');
        if ($showGradeSmp && !empty($smpAssessments)) $appendExams($smpAssessments, 'smp', 'SMP / MTs');
        if ($showGradeSma && !empty($smaAssessments)) $appendExams($smaAssessments, 'sma', 'SMA / SMK');
        if (!empty($tkaSdAssessments)) $appendExams($tkaSdAssessments, 'tka', 'TKA SD');
        if (!empty($tkaSmpAssessments)) $appendExams($tkaSmpAssessments, 'tka', 'TKA SMP');
        if (!empty($tkaSmaAssessments)) $appendExams($tkaSmaAssessments, 'tka', 'TKA SMA');
        if (!empty($utbkAssessments)) $appendExams($utbkAssessments, 'utbk', 'UTBK');
        if (!empty($skdAssessments)) $appendExams($skdAssessments, 'skd', 'SKD');

        // Metrik Ringkasan Riwayat Sesi
        $totalHistoryCount = $historySessions->count();
        $completedSessions = $historySessions->where('status', 'completed');
        $inProgressSessions = $historySessions->where('status', 'in_progress');
        $historyCompletedCount = $completedSessions->count();
        $historyInProgressCount = $inProgressSessions->count();
        $avgScore = $historyCompletedCount > 0 ? round($completedSessions->avg('score'), 1) : 0;
        $isProfileOwner = auth()->check() && (auth()->id() === $user->id || auth()->user()->isSuperUser() || auth()->user()->isAdmin() || auth()->user()->isTeacher());
    @endphp

    <script>
        window.studentPortalData = {
            sd: @json($sdAssessments),
            smp: @json($smpAssessments),
            sma: @json($smaAssessments)
        };
    </script>

    <!-- Flash Messages & Feedback Notifikasi -->
    @if(session('success') || session('success_password') || session('success_contact') || session('info_contact') || session('error') || session('error_contact') || $errors->any())
        <div class="px-4 pt-3 space-y-2">
            @if(session('success'))
                <div class="p-3 rounded-xl bg-green-2 border border-green-6/60 text-green-12 text-xs font-semibold flex items-center justify-between shadow-xs">
                    <span class="flex items-center gap-2"><span>✅</span> <span>{{ session('success') }}</span></span>
                    <button type="button" @click="$el.parentElement.remove()" class="text-green-11 hover:text-green-12 cursor-pointer font-bold">✕</button>
                </div>
            @endif
            @if(session('success_password'))
                <div class="p-3 rounded-xl bg-green-2 border border-green-6/60 text-green-12 text-xs font-semibold flex items-center justify-between shadow-xs">
                    <span class="flex items-center gap-2"><span>🔑</span> <span>{{ session('success_password') }}</span></span>
                    <button type="button" @click="$el.parentElement.remove()" class="text-green-11 hover:text-green-12 cursor-pointer font-bold">✕</button>
                </div>
            @endif
            @if(session('success_contact'))
                <div class="p-3 rounded-xl bg-green-2 border border-green-6/60 text-green-12 text-xs font-semibold flex items-center justify-between shadow-xs">
                    <span class="flex items-center gap-2"><span>💬</span> <span>{{ session('success_contact') }}</span></span>
                    <button type="button" @click="$el.parentElement.remove()" class="text-green-11 hover:text-green-12 cursor-pointer font-bold">✕</button>
                </div>
            @endif
            @if(session('info_contact'))
                <div class="p-3 rounded-xl bg-blue-2 border border-blue-6/60 text-blue-12 text-xs font-semibold flex items-center justify-between shadow-xs">
                    <span class="flex items-center gap-2"><span>ℹ️</span> <span>{{ session('info_contact') }}</span></span>
                    <button type="button" @click="$el.parentElement.remove()" class="text-blue-11 hover:text-blue-12 cursor-pointer font-bold">✕</button>
                </div>
            @endif
            @if(session('error') || session('error_contact'))
                <div class="p-3 rounded-xl bg-red-2 border border-red-6/60 text-red-12 text-xs font-semibold flex items-center justify-between shadow-xs">
                    <span class="flex items-center gap-2"><span>⚠️</span> <span>{{ session('error') ?? session('error_contact') }}</span></span>
                    <button type="button" @click="$el.parentElement.remove()" class="text-red-11 hover:text-red-12 cursor-pointer font-bold">✕</button>
                </div>
            @endif
            @if($errors->any())
                <div class="p-3 rounded-xl bg-red-2 border border-red-6/60 text-red-12 text-xs font-semibold shadow-xs">
                    <p class="font-bold mb-1">Periksa kembali data Anda:</p>
                    <ul class="list-disc pl-4 space-y-0.5 text-[11px]">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    @endif

    <!-- ============================================== -->
    <!-- TAB 1: HOME (BERANDA & RINGKASAN PROFIL)       -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'home'" x-transition.opacity.duration.300ms class="space-y-5 p-4 pb-8">
        
        <!-- CARD 1: IDENTITAS PROFIL SISWA & GURU -->
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
                    @if($user->username)
                        <p class="text-xs font-semibold text-gray-10 mt-0.5 font-mono">{{ '@' . $user->username }}</p>
                    @endif
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

                <!-- Tombol Aksi WhatsApp jika nomor tersedia -->
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

        <!-- BANNER UJIAN SEDANG BERJALAN (JIKA ADA SESI IN-PROGRESS) -->
        @if($activeInProgressSession)
            @php
                $isSessionOverday = ($activeInProgressSession->started_at && $activeInProgressSession->started_at->lessThan(now()->subDay()))
                    || ($activeInProgressSession->created_at && $activeInProgressSession->created_at->lessThan(now()->subDay()));
            @endphp
            <div class="rounded-2xl p-4 sm:p-5 shadow-lg border border-amber-500/40 relative overflow-hidden flex items-center justify-between gap-3.5"
                 style="background: #18181b !important; color: #ffffff !important;">
                <div class="flex items-center gap-3.5 min-w-0">
                    <div class="w-11 h-11 rounded-xl bg-amber-500/20 border border-amber-500/50 text-amber-400 flex items-center justify-center text-xl shrink-0">
                        ⏳
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-amber-400 text-neutral-950 font-mono">
                                Ujian Belum Selesai
                            </span>
                            @if($isSessionOverday)
                                <span class="text-[10px] font-bold text-amber-300 bg-amber-950/60 px-2 py-0.5 rounded-full border border-amber-500/30">
                                    Kadaluarsa (&gt; 24 jam)
                                </span>
                            @endif
                        </div>
                        <h4 class="font-display font-bold text-sm sm:text-base text-white mt-1 leading-snug truncate" style="color: #ffffff !important;">
                            {{ $activeInProgressSession->assessment?->title ?? 'Sesi Ujian CBT' }}
                        </h4>
                        <p class="text-[11px] text-neutral-300 mt-0.5" style="color: #d4d4d8 !important;">
                            {{ $isSessionOverday ? 'Sesi telah melampaui 1 hari. Klik untuk mengumpulkan jawaban otomatis.' : 'Sesi ujian Anda masih aktif. Klik lanjutkan untuk menyelesaikan ujian.' }}
                        </p>
                    </div>
                </div>
                <a href="{{ route('exam.workspace', $activeInProgressSession->uuid ?: $activeInProgressSession->id) }}" 
                   class="px-4 py-2.5 rounded-xl text-xs font-black shadow-md hover:brightness-110 active:scale-95 transition-all shrink-0 flex items-center gap-1.5"
                   style="background-color: #f59e0b !important; color: #09090b !important;">
                    <span>{{ $isSessionOverday ? 'Submit & Selesai' : 'Lanjutkan' }}</span>
                    <span>→</span>
                </a>
            </div>
        @endif

        <!-- PINTASAN NAVIGASI CEPAT (QUICK ACCESS CAPSULES) -->
        <div class="grid grid-cols-3 gap-2.5">
            <button type="button" @click="activeTab = 'assessment'" class="p-3 rounded-2xl bg-white border border-gray-5 shadow-xs hover:border-amber-5 hover:bg-amber-1/30 transition-all text-center flex flex-col items-center gap-1.5 group cursor-pointer active:scale-95">
                <div class="w-9 h-9 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center text-base group-hover:scale-110 transition-transform font-bold">
                    ⭐
                </div>
                <span class="text-xs font-bold text-gray-12 group-hover:text-amber-11">Asesmen Premium</span>
                <span class="text-[10px] text-gray-10">Ujian Berbayar</span>
            </button>

            <button type="button" @click="activeTab = 'history'" class="p-3 rounded-2xl bg-white border border-gray-5 shadow-xs hover:border-blue-5 hover:bg-blue-1/30 transition-all text-center flex flex-col items-center gap-1.5 group cursor-pointer active:scale-95">
                <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center text-base group-hover:scale-110 transition-transform">
                    📊
                </div>
                <span class="text-xs font-bold text-gray-12 group-hover:text-blue-11">Riwayat Nilai</span>
                <span class="text-[10px] text-gray-10">{{ $completedCount }} Selesai</span>
            </button>

            <button type="button" @click="activeTab = 'profile'; if (window.setStudentSubTab) window.setStudentSubTab('edit')" class="p-3 rounded-2xl bg-white border border-gray-5 shadow-xs hover:border-purple-5 hover:bg-purple-1/30 transition-all text-center flex flex-col items-center gap-1.5 group cursor-pointer active:scale-95">
                <div class="w-9 h-9 rounded-xl bg-purple-3 text-purple-11 flex items-center justify-center text-base group-hover:scale-110 transition-transform">
                    ⚙️
                </div>
                <span class="text-xs font-bold text-gray-12 group-hover:text-purple-11">Edit Profil</span>
                <span class="text-[10px] text-gray-10">Data &amp; Sandi</span>
            </button>
        </div>

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

            <!-- Horizontal Scroll Area Snap (Mirip Halaman Depan Tenant) -->
            <div class="overflow-x-auto pb-2 pt-1 -mx-2 px-2 scroll-smooth hide-scrollbar flex gap-3.5 snap-x snap-mandatory">
                @forelse($umumAssessments as $exam)
                    <a href="{{ route('exam.gate.show', is_object($exam) ? $exam : (data_get($exam, 'token') ?: data_get($exam, 'id'))) }}" class="w-[220px] shrink-0 bg-white border border-gray-6 rounded-2xl p-4 shadow-xs hover:border-blue-6 hover:-translate-y-0.5 hover:shadow-md active:translate-y-0 active:scale-[0.99] transition-all duration-200 flex flex-col justify-between snap-start">
                        <div>
                            <div class="flex justify-between items-center mb-3">
                                <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center shadow-xs">
                                    <x-radix-icon name="file-text" class="w-4 h-4" />
                                </div>
                                <span class="text-[10px] font-bold bg-green-3 text-green-11 border border-green-6/60 px-2.5 py-0.5 rounded-full uppercase">
                                    {{ data_get($exam, 'subject.name', data_get($exam, 'subject', 'Umum')) }}
                                </span>
                            </div>
                            <h3 class="font-display font-bold text-sm text-gray-12 line-clamp-2 leading-snug">
                                {{ data_get($exam, 'title') }}
                            </h3>
                            <p class="font-sans text-xs text-gray-11 mt-1 line-clamp-2">
                                {{ Str::limit(data_get($exam, 'description', 'Ujian evaluasi dan asesmen terstruktur CBT.'), 50) }}
                            </p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-dashed border-gray-5 flex items-center justify-between text-xs text-gray-11">
                            <span class="flex items-center gap-1 font-mono">
                                <x-radix-icon name="timer" class="w-3.5 h-3.5 text-gray-10" />
                                <span>{{ data_get($exam, 'duration_minutes', 60) }} mnt</span>
                            </span>
                            <span class="font-bold text-blue-11 flex items-center gap-1">
                                <span>Mulai</span>
                                <x-radix-icon name="arrow-right" class="w-3 h-3" />
                            </span>
                        </div>
                    </a>
                @empty
                    <div class="p-6 text-gray-11 text-xs w-full text-center">Belum ada asesmen umum terbuka.</div>
                @endforelse
            </div>
        </article>

        <!-- ========================================================= -->
        <!-- URUTAN 2: ASESMEN JENJANG SD / MI (SEPERTI PORTAL TENANT) -->
        <!-- ========================================================= -->
        @if($showGradeSd && !empty($sdAssessments))
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.studentPortalData.sd)">
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

                <div class="flex flex-col gap-2.5">
                    <!-- Default List (5 Terbaru) -->
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
                                <a href="{{ route('exam.gate.show', $item['token'] ?? $item['id']) }}" class="px-4 py-1.5 rounded-full text-xs font-bold bg-neutral-900 text-white hover:bg-black transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    MULAI
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
                                <a :href="'/exam/start/' + (item.token || item.id)" class="px-4 py-1.5 rounded-full text-xs font-bold bg-neutral-900 text-white hover:bg-black transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    MULAI
                                </a>
                            </div>
                        </template>
                    </div>
                </div>
            </article>
        @endif

        <!-- ========================================================= -->
        <!-- URUTAN 3: ASESMEN JENJANG SMP / MTs                       -->
        <!-- ========================================================= -->
        @if($showGradeSmp && !empty($smpAssessments))
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.studentPortalData.smp)">
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

                <div class="flex flex-col gap-2.5">
                    <!-- Default List (5 Terbaru) -->
                    <div x-show="searchQuery.trim().length < 5" class="flex flex-col gap-2.5">
                        @forelse(collect($smpAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-indigo-3 text-indigo-11 border border-indigo-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="file-text" class="w-4 h-4" />
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
                                <a href="{{ route('exam.gate.show', $item['token'] ?? $item['id']) }}" class="px-4 py-1.5 rounded-full text-xs font-bold bg-neutral-900 text-white hover:bg-black transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    MULAI
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
                                        <x-radix-icon name="file-text" class="w-4 h-4" />
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
                                <a :href="'/exam/start/' + (item.token || item.id)" class="px-4 py-1.5 rounded-full text-xs font-bold bg-neutral-900 text-white hover:bg-black transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    MULAI
                                </a>
                            </div>
                        </template>
                    </div>
                </div>
            </article>
        @endif

        <!-- ========================================================= -->
        <!-- URUTAN 4: ASESMEN JENJANG SMA / SMK                       -->
        <!-- ========================================================= -->
        @if($showGradeSma && !empty($smaAssessments))
            <article class="bg-white rounded-2xl border border-gray-6 p-5 sm:p-6 shadow-xs" x-data="appStoreList(window.studentPortalData.sma)">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-xl bg-purple-3 text-purple-11 flex items-center justify-center shadow-xs">
                            <x-radix-icon name="backpack" class="w-4 h-4" />
                        </span>
                        <span>Asesmen Jenjang SMA / SMK</span>
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

                <div class="flex flex-col gap-2.5">
                    <!-- Default List (5 Terbaru) -->
                    <div x-show="searchQuery.trim().length < 5" class="flex flex-col gap-2.5">
                        @forelse(collect($smaAssessments)->take(5) as $item)
                            <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-5 bg-white hover:bg-gray-1 hover:border-gray-6 transition-all duration-200 gap-3 group">
                                <div class="flex items-center gap-3.5 min-w-0 flex-1">
                                    <div class="w-11 h-11 rounded-2xl bg-purple-3 text-purple-11 border border-purple-6/50 flex items-center justify-center shrink-0 shadow-xs">
                                        <x-radix-icon name="bookmark" class="w-5 h-5" />
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
                                <a href="{{ route('exam.gate.show', $item['token'] ?? $item['id']) }}" class="px-4 py-1.5 rounded-full text-xs font-bold bg-neutral-900 text-white hover:bg-black transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    MULAI
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
                                        <x-radix-icon name="bookmark" class="w-5 h-5" />
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
                                <a :href="'/exam/start/' + (item.token || item.id)" class="px-4 py-1.5 rounded-full text-xs font-bold bg-neutral-900 text-white hover:bg-black transition-all duration-200 shrink-0 active:scale-95 shadow-xs">
                                    MULAI
                                </a>
                            </div>
                        </template>
                    </div>
                </div>
            </article>
        @endif

        <!-- Informasi Tenant / Sekolah Mitra di Home jika ada -->
        @if($tenant)
            <div class="p-4 rounded-2xl bg-white border border-gray-5 shadow-xs flex items-center gap-3.5">
                <div class="w-10 h-10 rounded-xl bg-gray-2 border border-gray-4 flex items-center justify-center shrink-0 overflow-hidden">
                    <img src="{{ $tenant->logo_url }}" alt="{{ $tenant->name }}" class="w-full h-full object-contain p-1">
                </div>
                <div class="min-w-0 flex-1">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-gray-10">Lembaga Mitra Resmi</p>
                    <h4 class="font-bold text-xs text-gray-12 truncate">{{ $tenant->name }}</h4>
                </div>
                <a href="{{ $portalUrl }}" target="_blank" class="px-3 py-1.5 rounded-xl text-xs font-bold bg-gray-2 hover:bg-gray-3 text-gray-12 border border-gray-5 transition-all">
                    Portal ↗
                </a>
            </div>
        @endif

        <div class="h-28 sm:h-36 w-full shrink-0" aria-hidden="true"></div>
    </div>

    <!-- ============================================== -->
    <!-- TAB 2: ASESMEN (KHUSUS ASESMEN BERBAYAR)       -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'assessment'" x-cloak x-transition.opacity.duration.300ms class="space-y-4 p-4 pb-12"
         x-data="{
             searchQuery: '',
             matches(title, subject) {
                 if (this.searchQuery.trim() === '') return true;
                 const q = this.searchQuery.trim().toLowerCase();
                 return (title && title.toLowerCase().includes(q)) || (subject && subject.toLowerCase().includes(q));
             }
         }">
        <header class="pt-2 pb-1">
            <div class="flex items-center gap-2 mb-1">
                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-amber-100 text-amber-900 border border-amber-300 font-mono">
                    ⭐ Katalog Eksklusif
                </span>
            </div>
            <h1 class="font-display font-black text-2xl text-gray-12 tracking-tight">Asesmen Berbayar (Premium)</h1>
            <p class="font-sans text-[13px] text-gray-11 mt-0.5">Paket evaluasi belajar premium dengan pembahasan materi dan analisis butir soal mendalam</p>
        </header>

        <!-- Search Bar Khusus Asesmen Berbayar -->
        <div class="relative">
            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 pointer-events-none">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </span>
            <input 
                type="text" 
                x-model="searchQuery" 
                placeholder="Cari asesmen berbayar..." 
                class="w-full pl-10 pr-9 py-2.5 bg-white border border-gray-6 rounded-2xl text-xs font-semibold text-gray-12 placeholder:text-gray-9 focus:outline-none focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 transition-all shadow-xs"
            >
            <button type="button" x-show="searchQuery !== ''" @click="searchQuery = ''" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-9 hover:text-gray-12 text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full bg-gray-3 hover:bg-gray-4 transition-colors">
                ✕
            </button>
        </div>

        @if($paidAssessments && $paidAssessments->count() > 0)
            <div class="space-y-3.5">
                @foreach($paidAssessments as $paidItem)
                    @php
                        $userAccess = auth()->check() ? $paidItem->accesses->first() : null;
                        $hasAccess = $userAccess && $userAccess->isValid();
                        $remainingQuota = $userAccess ? max(0, (int)$userAccess->quota_attempts - (int)$userAccess->attempts_used) : 0;
                    @endphp
                    <article 
                        x-show="matches(@js($paidItem->title), @js($paidItem->subject?->name ?? 'Umum'))"
                        x-transition.opacity.duration.200ms
                        class="bg-white rounded-2xl border {{ $hasAccess ? 'border-emerald-300 ring-1 ring-emerald-200' : 'border-amber-200' }} p-4 sm:p-5 shadow-xs hover:shadow-md transition-all flex flex-col justify-between gap-3.5 relative overflow-hidden">
                        
                        <!-- Top Accent Banner -->
                        <div class="flex items-center justify-between gap-2 flex-wrap">
                            <div class="flex items-center gap-2">
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase tracking-wider bg-amber-50 text-amber-900 border border-amber-300 font-mono">
                                    {{ $paidItem->subject?->name ?? 'Umum' }}
                                </span>
                                @if($hasAccess)
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-800 border border-emerald-300 flex items-center gap-1 font-mono">
                                        <span>✓ Akses Aktif</span>
                                        <span>({{ $remainingQuota }}x Kuota)</span>
                                    </span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-neutral-900 text-amber-400 border border-neutral-700">
                                        ⭐ Premium
                                    </span>
                                @endif
                            </div>

                            <span class="font-display font-black text-sm text-neutral-950 font-mono px-3 py-1 rounded-xl bg-amber-50 border border-amber-200">
                                Rp {{ number_format($paidItem->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <div>
                            <h3 class="font-display font-bold text-base text-gray-12 leading-snug">
                                {{ $paidItem->title }}
                            </h3>
                            <p class="font-sans text-xs text-gray-11 mt-1 leading-relaxed">
                                {{ $paidItem->description ?: 'Paket evaluasi soal komprehensif dengan pembahasan berbobot tinggi.' }}
                            </p>
                        </div>

                        <div class="pt-3 border-t border-dashed border-gray-4 flex items-center justify-between text-xs text-gray-11 flex-wrap gap-2">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center gap-1 font-mono font-semibold">
                                    <span>⏱</span>
                                    <span>{{ $paidItem->duration_minutes ?: 60 }} mnt</span>
                                </span>
                                <span>•</span>
                                <span class="font-mono font-semibold">{{ $paidItem->questions_count ?: ($paidItem->questions ? $paidItem->questions->count() : 20) }} Soal</span>
                            </div>

                            @if($hasAccess)
                                <a href="{{ route('exam.gate.show', $paidItem) }}" class="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-xs transition-all active:scale-95 inline-flex items-center gap-1.5 cursor-pointer">
                                    <span>Mulai Kerjakan</span>
                                    <span>→</span>
                                </a>
                            @else
                                <a href="{{ route('exam.gate.show', $paidItem) }}" class="px-4 py-2 rounded-xl bg-neutral-950 hover:bg-neutral-800 text-amber-400 font-bold text-xs shadow-xs transition-all active:scale-95 inline-flex items-center gap-1.5 cursor-pointer border border-neutral-700">
                                    <span>Beli &amp; Buka Akses</span>
                                    <span>→</span>
                                </a>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-2xl border border-gray-5 shadow-xs p-6">
                <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-3.5 border border-amber-200 text-2xl shadow-2xs">
                    ⭐
                </div>
                <h4 class="font-display font-bold text-base text-gray-12">Belum Ada Asesmen Berbayar</h4>
                <p class="font-sans text-xs text-gray-11 mt-1 max-w-sm mx-auto">Saat ini belum ada paket asesmen berbayar yang dipublikasikan. Anda dapat mengerjakan asesmen umum terbuka di tab Beranda.</p>
                <button type="button" @click="activeTab = 'home'" class="mt-4 px-5 py-2.5 rounded-full text-xs font-bold bg-neutral-950 hover:bg-neutral-800 text-white transition-all shadow-xs active:scale-95 cursor-pointer">
                    Kembali ke Beranda
                </button>
            </div>
        @endif

        <div class="h-28 sm:h-36 w-full shrink-0" aria-hidden="true"></div>
    </div>

    <!-- ============================================== -->
    <!-- TAB 3: RIWAYAT (RIWAYAT UJIAN & CBT SISWA)     -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'history'" x-cloak x-transition.opacity.duration.300ms class="space-y-4 p-4 pb-12" x-data="{ historyFilter: 'all', visibleLimit: 5 }">
        @if(! $isProfileOwner)
            <div class="text-center py-16 bg-white rounded-2xl border border-gray-5 shadow-xs p-6 space-y-3">
                <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-2 border border-amber-200 text-2xl shadow-2xs">
                    🔒
                </div>
                <h3 class="font-display font-bold text-base text-gray-12">Riwayat Ujian Rahasia Pribadi</h3>
                <p class="font-sans text-xs text-gray-11 max-w-sm mx-auto leading-relaxed">
                    Data riwayat pengerjaan asesmen, perolehan skor, dan sertifikat bersifat rahasia pribadi murid dan hanya dapat diakses oleh pemilik akun yang bersangkutan.
                </p>
                @guest
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow-xs active:scale-95 transition-all">
                        <span>Masuk ke Akun Anda</span>
                        <span>→</span>
                    </a>
                @endguest
            </div>
        @else
        <header class="pt-2 pb-1">
            <h1 class="font-display font-black text-2xl text-gray-12 tracking-tight">Riwayat Ujian</h1>
            <p class="font-sans text-[13px] text-gray-11 mt-0.5">Hasil pengerjaan, perolehan skor, dan rekam jejak evaluasi belajar Anda</p>
        </header>

        <!-- Banner Ringkasan Performa Belajar -->
        <div class="grid grid-cols-3 gap-2.5 sm:gap-3">
            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-gray-5 shadow-xs text-center flex flex-col justify-between">
                <span class="text-[10px] font-bold text-gray-10 uppercase tracking-wider block">Total Ujian</span>
                <span class="font-display font-black text-2xl sm:text-3xl text-gray-12 mt-1 block">{{ $totalHistoryCount }}</span>
            </div>
            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-gray-5 shadow-xs text-center flex flex-col justify-between">
                <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Selesai</span>
                <span class="font-display font-black text-2xl sm:text-3xl text-emerald-600 mt-1 block">{{ $historyCompletedCount }}</span>
            </div>
            <div class="bg-white p-3.5 sm:p-4 rounded-2xl border border-gray-5 shadow-xs text-center flex flex-col justify-between">
                <span class="text-[10px] font-bold text-blue-600 uppercase tracking-wider block">Rata-Rata</span>
                <span class="font-display font-black text-2xl sm:text-3xl text-blue-600 mt-1 block">{{ $avgScore }}</span>
            </div>
        </div>

        <!-- Filter Status Riwayat Segmented Switcher -->
        <div class="p-1 bg-gray-3 rounded-2xl border border-gray-5 flex gap-1">
            <button 
                type="button" 
                @click="historyFilter = 'all'" 
                :class="historyFilter === 'all' ? 'bg-white text-gray-12 font-bold shadow-xs' : 'text-gray-11 font-semibold hover:text-gray-12'" 
                class="flex-1 py-1.5 px-2 rounded-xl text-xs transition-all cursor-pointer text-center">
                Semua ({{ $totalHistoryCount }})
            </button>
            <button 
                type="button" 
                @click="historyFilter = 'completed'" 
                :class="historyFilter === 'completed' ? 'bg-white text-gray-12 font-bold shadow-xs' : 'text-gray-11 font-semibold hover:text-gray-12'" 
                class="flex-1 py-1.5 px-2 rounded-xl text-xs transition-all cursor-pointer text-center">
                Selesai ({{ $historyCompletedCount }})
            </button>
            <button 
                type="button" 
                @click="historyFilter = 'in_progress'" 
                :class="historyFilter === 'in_progress' ? 'bg-white text-gray-12 font-bold shadow-xs' : 'text-gray-11 font-semibold hover:text-gray-12'" 
                class="flex-1 py-1.5 px-2 rounded-xl text-xs transition-all cursor-pointer text-center">
                Berjalan ({{ $historyInProgressCount }})
            </button>
        </div>

        @php
            $groupedHistory = $historySessions->groupBy(function($item) {
                return $item->assessment_id ?: 'session_'.$item->id;
            });
        @endphp

        @if(isset($groupedHistory) && $groupedHistory->count() > 0)
            <div class="space-y-4">
                @foreach($groupedHistory as $assessmentKey => $sessionsGroup)
                    @php
                        $firstSession = $sessionsGroup->first();
                        $assessment = $firstSession->assessment;
                        $assessmentTitle = $assessment?->title ?? 'Asesmen CBT';
                        $subjectName = $assessment?->subject?->name ?? 'Umum';
                        $attemptsCount = $sessionsGroup->count();
                        $completedAttempts = $sessionsGroup->where('status', 'completed');
                        $bestScore = $completedAttempts->count() > 0 ? $completedAttempts->max('score') : null;
                        $latestScore = $completedAttempts->first()?->score;
                        $hasCompleted = $completedAttempts->isNotEmpty();
                        $hasInProgress = $sessionsGroup->where('status', 'in_progress')->isNotEmpty();
                        $assessmentGateId = $assessment?->token ?: ($firstSession->assessment?->token ?: $assessment ?: $firstSession->assessment_id);
                    @endphp

                    <article 
                        x-show="(historyFilter === 'all' || (historyFilter === 'completed' && {{ $hasCompleted ? 'true' : 'false' }}) || (historyFilter === 'in_progress' && {{ $hasInProgress ? 'true' : 'false' }})) && ({{ $loop->index }} < visibleLimit)" 
                        x-transition.opacity.duration.200ms
                        class="bg-white rounded-2xl shadow-xs border border-gray-5 overflow-hidden transition-all hover:border-gray-6">
                        
                        <!-- Header Asesmen -->
                        <div class="p-4 sm:p-5 bg-gradient-to-r from-gray-50 to-white border-b border-gray-4">
                            <div class="flex items-start justify-between gap-3 flex-wrap mb-2">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="px-2.5 py-0.5 rounded-md text-[10px] font-black uppercase tracking-wider bg-blue-50 text-blue-800 border border-blue-200 font-mono">
                                        {{ $subjectName }}
                                    </span>
                                    <span class="px-2.5 py-0.5 rounded-md text-[10px] font-bold bg-neutral-100 text-neutral-800 border border-neutral-300 font-mono">
                                        {{ $attemptsCount }}x Percobaan
                                    </span>
                                </div>

                                <div class="flex items-center gap-2">
                                    @if($bestScore !== null)
                                        <span class="px-2.5 py-0.5 rounded-lg text-xs font-black bg-emerald-50 text-emerald-800 border border-emerald-300 font-mono shadow-2xs">
                                            ⭐ Skor Terbaik: {{ number_format($bestScore, 1) }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <h3 class="font-display font-black text-base text-gray-12 leading-snug">
                                {{ $assessmentTitle }}
                            </h3>
                        </div>

                        <!-- Daftar Percobaan (Attempts Breakdown) -->
                        <div class="divide-y divide-gray-3 bg-white">
                            @foreach($sessionsGroup as $attemptIndex => $session)
                                @php
                                    $isCompleted = ($session->status === 'completed');
                                    $attemptNumber = $attemptsCount - $attemptIndex;
                                @endphp
                                <div 
                                    x-show="historyFilter === 'all' || (historyFilter === 'completed' && {{ $isCompleted ? 'true' : 'false' }}) || (historyFilter === 'in_progress' && {{ ! $isCompleted ? 'true' : 'false' }})"
                                    class="p-3.5 sm:p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 {{ $loop->first && $attemptsCount > 1 ? 'bg-emerald-50/20' : '' }}">
                                    
                                    <div class="flex items-center gap-3 min-w-0">
                                        <!-- Attempt Badge -->
                                        <span class="w-8 h-8 rounded-xl {{ $isCompleted ? 'bg-neutral-100 text-neutral-900 border border-neutral-300' : 'bg-amber-100 text-amber-900 border border-amber-300 animate-pulse' }} font-mono font-bold text-xs flex items-center justify-center shrink-0">
                                            #{{ $attemptNumber }}
                                        </span>

                                        <div class="min-w-0">
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-bold text-neutral-900">
                                                    Percobaan ke-{{ $attemptNumber }}
                                                </span>
                                                @if($attemptIndex === 0 && $attemptsCount > 1)
                                                    <span class="text-[10px] font-extrabold text-emerald-700 bg-emerald-100 px-1.5 py-0.2 rounded font-mono">
                                                        Terbaru
                                                    </span>
                                                @endif
                                                @if($isCompleted && $session->score == $bestScore && $attemptsCount > 1)
                                                    <span class="text-[10px] font-extrabold text-amber-800 bg-amber-100 px-1.5 py-0.2 rounded font-mono">
                                                        Tertinggi
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="text-[11px] text-gray-10 mt-0.5 flex items-center gap-2 font-sans flex-wrap">
                                                <span>{{ $session->created_at ? $session->created_at->format('d M Y, H:i') : '-' }}</span>
                                                @if($session->completed_at && $session->started_at)
                                                    <span>•</span>
                                                    <span>Durasi: {{ max(1, $session->started_at->diffInMinutes($session->completed_at)) }} mnt</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Score & Action Buttons (High-End Design) -->
                                    <div class="flex items-center gap-2.5 pt-2 sm:pt-0 border-t sm:border-t-0 border-gray-3 justify-between sm:justify-end shrink-0">
                                        @if($isCompleted)
                                            <span class="text-sm font-black font-mono text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200">
                                                {{ number_format($session->score, 1) }}
                                            </span>
                                            <a href="{{ route('exam.result', $session->uuid ?: $session->id) }}" 
                                               class="px-3.5 py-2 rounded-xl bg-neutral-950 hover:bg-neutral-800 text-white text-xs font-bold shadow-xs active:scale-95 transition-all inline-flex items-center gap-1 cursor-pointer">
                                                <span>Hasil</span>
                                                <span>→</span>
                                            </a>
                                            <a href="{{ route('exam.analysis', $session->uuid ?: $session->id) }}" 
                                               class="px-3 py-2 rounded-xl bg-white hover:bg-neutral-50 text-neutral-800 border border-neutral-300 text-xs font-bold shadow-2xs active:scale-95 transition-all cursor-pointer">
                                                Analisis
                                            </a>
                                        @else
                                            <span class="text-xs font-bold text-amber-800 bg-amber-100 px-2.5 py-1 rounded-lg border border-amber-300 animate-pulse">
                                                Sedang Berjalan
                                            </span>
                                            <a href="{{ route('exam.workspace', $session->uuid ?: $session->id) }}" 
                                               class="px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-400 text-neutral-950 font-black text-xs shadow-xs active:scale-95 transition-all inline-flex items-center gap-1 cursor-pointer">
                                                <span>Lanjutkan</span>
                                                <span>→</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Footer: Tombol Uji Ulang Asesmen -->
                        @if($assessmentGateId)
                            <div class="p-3 bg-gray-50/70 border-t border-gray-4 flex items-center justify-between text-xs">
                                <span class="text-gray-10 text-[11px]">Ingin mengasah kemampuan lagi?</span>
                                <a href="{{ route('exam.gate.show', $assessmentGateId) }}" 
                                   class="font-bold text-emerald-700 hover:text-emerald-800 hover:underline inline-flex items-center gap-1.5 cursor-pointer">
                                    <span>Uji Ulang / Mulai Sesi Baru</span>
                                    <span>↺</span>
                                </a>
                            </div>
                        @endif
                    </article>
                @endforeach

                <!-- Tombol Muat Lebih Banyak (Load More Pagination) -->
                @if($groupedHistory->count() > 5)
                    <div class="pt-3 pb-2 text-center" x-show="visibleLimit < {{ $groupedHistory->count() }}">
                        <button 
                            type="button" 
                            @click="visibleLimit += 5"
                            class="w-full py-3.5 px-6 rounded-2xl bg-neutral-900 hover:bg-black text-white font-bold text-xs shadow-md transition-all duration-200 active:scale-95 inline-flex items-center justify-center gap-2.5 cursor-pointer border border-neutral-700">
                            <span>Muat Lebih Banyak Riwayat Asesmen</span>
                            <span class="px-2.5 py-0.5 rounded-full bg-white/20 text-[10px] font-mono" x-text="'Tampil ' + Math.min(visibleLimit, {{ $groupedHistory->count() }}) + ' dari {{ $groupedHistory->count() }}'"></span>
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </div>
                @endif
            </div>
        @else
            <!-- Zero State Riwayat -->
            <div class="text-center py-16 bg-white rounded-2xl border border-gray-5 shadow-xs p-6">
                <div class="w-14 h-14 bg-blue-1 text-blue-11 rounded-2xl flex items-center justify-center mx-auto mb-3.5 border border-blue-4 text-2xl shadow-2xs">
                    📋
                </div>
                <h4 class="font-display font-bold text-sm text-gray-12">Belum Ada Riwayat Ujian</h4>
                <p class="font-sans text-xs text-gray-11 mt-1 max-w-xs mx-auto">Anda belum menyelesaikan asesmen apapun. Pilih salah satu asesmen untuk mulai menguji kemampuan Anda!</p>
                <button type="button" @click="activeTab = 'home'" class="mt-4 px-5 py-2 rounded-full text-xs font-bold bg-neutral-950 hover:bg-neutral-800 text-white transition-all shadow-xs active:scale-95 cursor-pointer">
                    Pilih &amp; Mulai Ujian Sekarang
                </button>
            </div>
        @endif

        <div class="pt-2 text-center">
            <a href="{{ route('exam.history') }}" class="text-xs font-bold text-gray-11 hover:text-emerald-700 underline inline-flex items-center gap-1">
                <span>Buka Halaman Arsip Riwayat Lengkap &amp; Sertifikat</span>
                <span>↗</span>
            </a>
        </div>
        @endif

        <div class="h-28 sm:h-36 w-full shrink-0" aria-hidden="true"></div>
    </div>

    <!-- ============================================== -->
    <!-- TAB 4: PROFIL (DATA AKUN & EDIT PROFIL LENGKAP) -->
    <!-- ============================================== -->
    <div x-show="activeTab === 'profile'" x-cloak x-transition.opacity.duration.300ms class="space-y-4 p-4 pb-12"
         x-data="{
             subTab: '{{ $errors->has('current_password') || $errors->has('password') || session('success_password') ? 'password' : ($errors->any() ? 'edit' : 'view') }}',
             avatarPreview: null,
             coverPreview: null,
             showCurPass: false,
             showNewPass: false,
             showConfPass: false,
             previewAvatar(e) {
                 const file = e.target.files[0];
                 if (file) {
                     const reader = new FileReader();
                     reader.onload = (ev) => { this.avatarPreview = ev.target.result; };
                     reader.readAsDataURL(file);
                 }
             },
             previewCover(e) {
                 const file = e.target.files[0];
                 if (file) {
                     const reader = new FileReader();
                     reader.onload = (ev) => { this.coverPreview = ev.target.result; };
                     reader.readAsDataURL(file);
                 }
             }
         }">
        @if(! $isProfileOwner)
            <div class="text-center py-16 bg-white rounded-2xl border border-gray-5 shadow-xs p-6 space-y-3">
                <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-2 border border-amber-200 text-2xl shadow-2xs">
                    🔒
                </div>
                <h3 class="font-display font-bold text-base text-gray-12">Pengaturan Profil &amp; Keamanan Akun</h3>
                <p class="font-sans text-xs text-gray-11 max-w-sm mx-auto leading-relaxed">
                    Pengubahan profil, identitas, kontak, dan kata sandi akun merupakan privasi pribadi murid dan hanya dapat diakses oleh pemilik akun yang bersangkutan.
                </p>
                @guest
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-xs font-bold shadow-xs active:scale-95 transition-all">
                        <span>Masuk ke Akun Anda</span>
                        <span>→</span>
                    </a>
                @endguest
            </div>
        @else
        <header class="pt-2 pb-1 text-center">
            <h1 class="font-display font-black text-2xl text-gray-12 tracking-tight">Profil &amp; Akun</h1>
            <p class="font-sans text-[13px] text-gray-11 mt-0.5">Kelola identitas diri dan pengaturan keamanan akun belajar Anda</p>
        </header>

        <!-- Segmented Tab Switcher (Informasi vs Edit Profil vs Ganti Sandi) -->
        <div class="flex p-1 bg-gray-3 rounded-2xl border border-gray-5 gap-1">
            <button 
                type="button" 
                @click="subTab = 'view'" 
                :class="subTab === 'view' ? 'bg-white text-gray-12 font-bold shadow-xs' : 'text-gray-11 font-semibold hover:text-gray-12'" 
                class="flex-1 py-2 text-xs rounded-xl transition-all cursor-pointer text-center">
                Informasi
            </button>
            <button 
                type="button" 
                @click="subTab = 'edit'" 
                :class="subTab === 'edit' ? 'bg-white text-gray-12 font-bold shadow-xs' : 'text-gray-11 font-semibold hover:text-gray-12'" 
                class="flex-1 py-2 text-xs rounded-xl transition-all cursor-pointer text-center">
                Edit Profil
            </button>
            <button 
                type="button" 
                @click="subTab = 'password'" 
                :class="subTab === 'password' ? 'bg-white text-gray-12 font-bold shadow-xs' : 'text-gray-11 font-semibold hover:text-gray-12'" 
                class="flex-1 py-2 text-xs rounded-xl transition-all cursor-pointer text-center">
                Ganti Sandi
            </button>
        </div>

        <!-- 1. SUB-TAB VIEW (INFORMASI PROFIL AKUN) -->
        <div x-show="subTab === 'view'" x-transition.opacity.duration.200ms class="space-y-4">
            <div class="bg-white rounded-2xl p-6 text-center border border-gray-5 shadow-xs">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-gray-3 shadow-md mb-3">
                <h2 class="font-display font-bold text-lg text-gray-12">{{ $user->name }}</h2>
                <div class="mt-0.5 mb-1">
                    <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-gray-2 text-gray-11 border border-gray-4">
                        {{ '@' . ($user->username ?? 'username') }}
                    </span>
                </div>
                <p class="text-xs text-gray-11 font-mono mb-4">{{ $user->email }}</p>
                
                <div class="flex gap-2 max-w-sm mx-auto">
                    <button type="button" @click="subTab = 'edit'" class="flex-1 py-2.5 bg-gray-12 text-white rounded-xl font-bold text-xs hover:bg-black transition-colors active:scale-95 shadow-xs flex items-center justify-center gap-1.5 cursor-pointer">
                        <span>✏️</span>
                        <span>Ubah Profil</span>
                    </button>
                    <button type="button" @click="subTab = 'password'" class="flex-1 py-2.5 bg-gray-2 text-gray-12 border border-gray-5 rounded-xl font-bold text-xs hover:bg-gray-3 transition-colors active:scale-95 shadow-xs flex items-center justify-center gap-1.5 cursor-pointer">
                        <span>🔒</span>
                        <span>Ganti Sandi</span>
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden border border-gray-5 shadow-xs divide-y divide-gray-4">
                @if($tenant)
                    <div class="p-4 flex items-center gap-3">
                        <div class="w-9 h-9 bg-green-1 text-green-11 rounded-full flex items-center justify-center border border-green-4 text-base shrink-0">
                            🏫
                        </div>
                        <div class="min-w-0">
                            <p class="text-[10px] text-gray-10 font-bold uppercase tracking-wider">Mitra Sekolah / Lembaga</p>
                            <p class="font-bold text-xs text-gray-12 truncate">{{ $tenant->name }}</p>
                        </div>
                    </div>
                @endif
                
                <div class="p-4 flex items-center gap-3">
                    <div class="w-9 h-9 bg-blue-1 text-blue-11 rounded-full flex items-center justify-center border border-blue-4 text-base shrink-0">
                        💬
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-[10px] text-gray-10 font-bold uppercase tracking-wider">Kontak WhatsApp</p>
                        <p class="font-bold text-xs text-gray-12">{{ $user->whatsapp_number ?? 'Belum ditambahkan' }}</p>
                    </div>
                    @if($user->isWhatsappVerified())
                        <span class="text-[10px] font-bold bg-green-1 text-green-11 px-2.5 py-0.5 rounded-full border border-green-4">Terverifikasi</span>
                    @endif
                </div>

                @if($user->bio)
                    <div class="p-4">
                        <p class="text-[10px] text-gray-10 font-bold uppercase tracking-wider mb-1">Bio / Moto Belajar</p>
                        <p class="text-xs text-gray-12 leading-relaxed">{{ $user->bio }}</p>
                    </div>
                @endif

                @if($user->address)
                    <div class="p-4">
                        <p class="text-[10px] text-gray-10 font-bold uppercase tracking-wider mb-1">Alamat Domisili</p>
                        <p class="text-xs text-gray-12">{{ $user->address }} {{ $user->postal_code ? ' (' . $user->postal_code . ')' : '' }}</p>
                    </div>
                @endif
                
                <div class="p-4">
                    <form method="POST" action="{{ route('logout') }}" class="m-0 w-full">
                        @csrf
                        <button type="submit" class="w-full py-2.5 bg-red-1 text-red-11 rounded-xl font-bold text-xs hover:bg-red-2 border border-red-4 transition-colors active:scale-95 shadow-xs flex items-center justify-center gap-2 cursor-pointer">
                            <span>🚪</span>
                            <span>Keluar dari Akun</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- 2. SUB-TAB EDIT (FORMULIR EDIT PROFIL LENGKAP) -->
        <div x-show="subTab === 'edit'" x-transition.opacity.duration.200ms class="space-y-4">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl p-5 sm:p-6 border border-gray-5 shadow-xs space-y-4">
                @csrf
                @method('PUT')

                <div class="text-center pb-3 border-b border-gray-4">
                    <h3 class="font-display font-bold text-sm text-gray-12">Edit Informasi Pribadi</h3>
                    <p class="text-[11px] text-gray-10 mt-0.5">Perbarui data diri untuk sertifikat dan laporan asesmen</p>
                </div>

                <!-- Foto Sampul (Cover Banner) Uploader dengan Live Preview -->
                <div class="space-y-2.5 p-3.5 bg-gray-2 rounded-xl border border-gray-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs font-bold text-gray-12 flex items-center gap-1.5">
                                <span>🖼️</span>
                                <span>Foto Sampul (Cover Banner)</span>
                            </p>
                            <p class="text-[10px] text-gray-10 mt-0.5">Banner atas profil. Format JPG/PNG/WEBP maks 5MB.</p>
                        </div>
                        <label class="px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-[11px] font-bold cursor-pointer shadow-2xs transition-all active:scale-95 inline-flex items-center gap-1.5">
                            <span>Pilih Cover</span>
                            <input type="file" name="cover_photo" accept="image/*" class="hidden" @change="previewCover">
                        </label>
                    </div>
                    <div class="w-full h-28 sm:h-36 rounded-xl overflow-hidden bg-gray-3 border border-gray-4 relative group">
                        <img :src="coverPreview || '{{ $user->cover_photo_url }}'" alt="Cover Preview" class="w-full h-full object-cover">
                        <label class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white text-xs font-bold gap-2 cursor-pointer backdrop-blur-[2px]">
                            <span>📷 Klik untuk Ganti Cover</span>
                            <input type="file" name="cover_photo" accept="image/*" class="hidden" @change="previewCover">
                        </label>
                    </div>
                </div>

                <!-- Foto Profil Uploader dengan Live Preview -->
                <div class="flex items-center gap-4 p-3.5 bg-gray-2 rounded-xl border border-gray-4">
                    <div class="relative shrink-0">
                        <img :src="avatarPreview || '{{ $user->profile_photo_url }}'" alt="Avatar" class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-xs">
                        <label class="absolute -bottom-1 -right-1 w-6 h-6 bg-emerald-600 text-white rounded-full flex items-center justify-center text-xs cursor-pointer shadow-sm hover:scale-110 transition-transform" title="Ganti Foto Profil">
                            📷
                            <input type="file" name="profile_photo" accept="image/*" class="hidden" @change="previewAvatar">
                        </label>
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-bold text-gray-12">Foto Profil</p>
                        <p class="text-[10px] text-gray-10 mt-0.5">Format JPG/PNG maks 2MB.</p>
                        <label class="mt-1.5 inline-block text-[11px] font-bold text-emerald-600 hover:underline cursor-pointer">
                            Pilih Foto Baru
                            <input type="file" name="profile_photo" accept="image/*" class="hidden" @change="previewAvatar">
                        </label>
                    </div>
                </div>

                <!-- Input Nama Lengkap -->
                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $user->name) }}" 
                        required 
                        class="w-full px-3.5 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs font-semibold text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all"
                        placeholder="Nama lengkap Anda..."
                    >
                </div>

                <!-- Input Username -->
                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Username</label>
                    <div class="relative">
                        <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-10 text-xs font-bold font-mono">@</span>
                        <input 
                            type="text" 
                            name="username" 
                            value="{{ old('username', $user->username) }}" 
                            class="w-full pl-8 pr-3.5 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs font-semibold font-mono text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all"
                            placeholder="username_anda"
                            x-on:input="$event.target.value = $event.target.value.replace(/[@\s]/g, '_').toLowerCase()"
                        >
                    </div>
                    <p class="text-[10px] text-gray-10 mt-1">Gunakan huruf kecil, angka, atau underscore tanpa spasi.</p>
                </div>

                <!-- Input WhatsApp -->
                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Nomor WhatsApp</label>
                    <input 
                        type="text" 
                        name="whatsapp_number" 
                        value="{{ old('whatsapp_number', $user->whatsapp_number) }}" 
                        class="w-full px-3.5 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs font-semibold text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all"
                        placeholder="Contoh: 081234567890"
                    >
                </div>

                <!-- Input Bio -->
                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Bio / Moto Belajar</label>
                    <textarea 
                        name="bio" 
                        rows="2" 
                        class="w-full px-3.5 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all resize-none"
                        placeholder="Tuliskan deskripsi singkat atau moto belajar Anda..."
                    >{{ old('bio', $user->bio) }}</textarea>
                </div>

                <!-- Input Alamat & Kodepos -->
                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Alamat Domisili</label>
                    <textarea 
                        name="address" 
                        rows="2" 
                        class="w-full px-3.5 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all resize-none"
                        placeholder="Nama jalan, RT/RW, Kelurahan, Kecamatan..."
                    >{{ old('address', $user->address) }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Kodepos</label>
                    <input 
                        type="text" 
                        name="postal_code" 
                        value="{{ old('postal_code', $user->postal_code) }}" 
                        class="w-full px-3.5 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs font-semibold text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all"
                        placeholder="Contoh: 12345"
                    >
                </div>

                <!-- Tombol Aksi Simpan & Batal -->
                <div class="pt-2 flex gap-2.5">
                    <button type="submit" class="flex-1 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs shadow-xs active:scale-95 transition-all cursor-pointer">
                        Simpan Perubahan
                    </button>
                    <button type="button" @click="subTab = 'view'" class="px-4 py-2.5 bg-gray-2 hover:bg-gray-3 text-gray-12 rounded-xl font-bold text-xs transition-colors cursor-pointer">
                        Batal
                    </button>
                </div>
            </form>
        </div>

        <!-- 3. SUB-TAB GANTI PASSWORD (FORMULIR GANTI PASSWORD) -->
        <div x-show="subTab === 'password'" x-transition.opacity.duration.200ms class="space-y-4">
            <form action="{{ route('profile.password.update') }}" method="POST" class="bg-white rounded-2xl p-5 sm:p-6 border border-gray-5 shadow-xs space-y-4">
                @csrf
                @method('PUT')

                <div class="text-center pb-3 border-b border-gray-4">
                    <h3 class="font-display font-bold text-sm text-gray-12">Perbarui Kata Sandi</h3>
                    <p class="text-[11px] text-gray-10 mt-0.5">Gunakan minimal 8 karakter dengan kombinasi angka dan huruf</p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Kata Sandi Saat Ini <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input 
                            :type="showCurPass ? 'text' : 'password'" 
                            name="current_password" 
                            required 
                            class="w-full pl-3.5 pr-10 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs font-semibold text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all"
                            placeholder="••••••••"
                        >
                        <button type="button" @click="showCurPass = !showCurPass" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-9 hover:text-gray-12 text-xs font-medium cursor-pointer">
                            <span x-text="showCurPass ? '🙈' : '👁️'"></span>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input 
                            :type="showNewPass ? 'text' : 'password'" 
                            name="password" 
                            required 
                            class="w-full pl-3.5 pr-10 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs font-semibold text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all"
                            placeholder="Minimal 8 karakter..."
                        >
                        <button type="button" @click="showNewPass = !showNewPass" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-9 hover:text-gray-12 text-xs font-medium cursor-pointer">
                            <span x-text="showNewPass ? '🙈' : '👁️'"></span>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-12 mb-1">Konfirmasi Kata Sandi Baru <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input 
                            :type="showConfPass ? 'text' : 'password'" 
                            name="password_confirmation" 
                            required 
                            class="w-full pl-3.5 pr-10 py-2.5 bg-gray-1 border border-gray-5 rounded-xl text-xs font-semibold text-gray-12 focus:outline-none focus:border-emerald-6 focus:ring-2 focus:ring-emerald-6/10 focus:bg-white transition-all"
                            placeholder="Ulangi kata sandi baru..."
                        >
                        <button type="button" @click="showConfPass = !showConfPass" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-9 hover:text-gray-12 text-xs font-medium cursor-pointer">
                            <span x-text="showConfPass ? '🙈' : '👁️'"></span>
                        </button>
                    </div>
                </div>

                <div class="pt-2 flex gap-2.5">
                    <button type="submit" class="flex-1 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl font-bold text-xs shadow-xs active:scale-95 transition-all cursor-pointer">
                        Perbarui Kata Sandi
                    </button>
                    <button type="button" @click="subTab = 'view'" class="px-4 py-2.5 bg-gray-2 hover:bg-gray-3 text-gray-12 rounded-xl font-bold text-xs transition-colors cursor-pointer">
                        Batal
                    </button>
                </div>
            </form>
        </div>
        @endif

        <div class="h-28 sm:h-36 w-full shrink-0" aria-hidden="true"></div>
    </div>
</x-layouts.student>
