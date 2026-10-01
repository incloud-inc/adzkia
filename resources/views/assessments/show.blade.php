<x-layouts.app>
    <x-slot:title>{{ $assessment->title }} - Detail Ujian</x-slot:title>

    @php
        $user = auth()->user();
        $canManage = $user && ($user->isTeacher() || $user->isAdmin() || $user->isSuperUser());
        $currentTenant = $user?->currentTenant;
        $canCreate = $user && ($user->isSuperUser() || ($currentTenant && $currentTenant->canCreateAssessments()));
    @endphp

    <div class="max-w-6xl mx-auto space-y-6 pb-12">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs sm:text-sm font-semibold flex items-center gap-3 shadow-xs">
                <span class="w-6 h-6 rounded-full bg-emerald-600 text-white flex items-center justify-center text-xs font-bold shrink-0">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-900 text-xs sm:text-sm font-semibold flex items-center gap-3 shadow-xs">
                <span class="w-6 h-6 rounded-full bg-rose-600 text-white flex items-center justify-center text-xs font-bold shrink-0">!</span>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Back Navigation & Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('assessments.index') }}" class="p-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer" title="Kembali ke Daftar">
                    <x-radix-icon name="arrow-left" class="w-4 h-4" />
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-blue-3 text-blue-11 border border-blue-6/50">
                            {{ $assessment->type }}
                        </span>
                        <span class="text-xs font-semibold px-2 py-0.5 rounded-md {{ $assessment->status === 'published' ? 'bg-green-3 text-green-11 border border-green-6/50' : 'bg-gray-3 text-gray-11 border border-gray-6' }}">
                            {{ $assessment->status === 'published' ? 'Published' : 'Draf' }}
                        </span>
                        @if($assessment->price_type === 'paid' && (float) $assessment->price > 0)
                            <span class="text-xs font-bold px-2 py-0.5 rounded-md bg-amber-3 text-amber-11 border border-amber-6/50">
                                Rp {{ number_format($assessment->price, 0, ',', '.') }}
                            </span>
                        @else
                            <span class="text-xs font-semibold px-2 py-0.5 rounded-md bg-gray-3 text-gray-11 border border-gray-6">
                                Gratis
                            </span>
                        @endif
                    </div>
                    <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight mt-1">
                        {{ $assessment->title }}
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-2 flex-wrap">
                @if($canManage)
                    <a href="{{ route('assessments.grading', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold transition-all shadow-xs cursor-pointer active:scale-95" title="Koreksi Lembar Jawaban & Nilai Final Siswa">
                        <x-radix-icon name="pencil-2" class="w-4 h-4 text-white" />
                        <span>Koreksi & Nilai</span>
                    </a>
                    <a href="{{ route('assessments.proctoring', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-slate-900 hover:bg-black text-white text-xs font-bold transition-all shadow-xs cursor-pointer active:scale-95" title="Masuk ke Ruang Pengawasan Ujian Real-Time">
                        <x-radix-icon name="desktop" class="w-4 h-4 text-white" />
                        <span>Ruang Pengawasan</span>
                    </a>
                    <a href="{{ route('assessments.result-preview', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 text-xs font-semibold transition-colors cursor-pointer" title="Lihat Tampilan Hasil Ujian Pasca Pengerjaan Siswa">
                        <x-radix-icon name="eye-open" class="w-4 h-4 text-emerald-700" />
                        <span>Pratinjau Hasil</span>
                    </a>
                    <form method="POST" action="{{ route('assessments.generate-explanations', $assessment) }}" class="inline"
                          x-data="{ submitting: false }" @submit="submitting = true">
                        @csrf
                        <button type="submit" :disabled="submitting" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-700 hover:to-indigo-700 text-white text-xs font-bold transition-all shadow-xs cursor-pointer disabled:opacity-75 active:scale-95" title="Generate Pembahasan AI untuk semua butir soal dengan DeepSeek Reasoner">
                            <svg x-show="submitting" class="w-3.5 h-3.5 animate-spin text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="4" opacity=".2"/><path stroke-width="4" d="M12 2a10 10 0 0 1 10 10"/></svg>
                            <x-radix-icon x-show="!submitting" name="magic-wand" class="w-4 h-4 text-white" />
                            <span x-text="submitting ? 'Memproses...' : 'Pembahasan AI'">Pembahasan AI</span>
                        </button>
                    </form>
                    @if($canCreate)
                        <a href="{{ route('assessments.wizard') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-800 border border-gray-300 text-xs font-semibold transition-colors cursor-pointer">
                            <x-radix-icon name="plus" class="w-4 h-4 text-gray-700" />
                            <span>Buat Ujian Lain</span>
                        </a>
                    @endif
                @else
                    @if($assessment->price_type === 'paid' && (float) $assessment->price > 0 && ! ($user && $user->hasPurchasedAssessment($assessment)))
                        <a href="{{ route('orders.checkout', $assessment) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white text-xs font-bold transition-all shadow-md cursor-pointer">
                            <x-radix-icon name="tokens" class="w-4 h-4" />
                            <span>Beli Asesmen (Rp {{ number_format($assessment->price, 0, ',', '.') }})</span>
                        </a>
                    @else
                        <a href="{{ route('exam.gate.show', $assessment) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold transition-all shadow-md cursor-pointer">
                            <x-radix-icon name="timer" class="w-4 h-4" />
                            <span>Mulai Kerjakan Ujian</span>
                        </a>
                    @endif
                @endif
            </div>
        </div>

        @if($user && $user->isSuperUser())
            <!-- Hak Prerogatif OWNER ADZKIA (Super User Control) -->
            <div class="p-4 rounded-2xl border {{ $assessment->is_mandatory ? 'bg-amber-50 border-amber-200' : 'bg-gray-50 border-gray-200' }} flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-start gap-3">
                    <div class="p-2 rounded-xl {{ $assessment->is_mandatory ? 'bg-amber-500 text-white' : 'bg-gray-300 text-gray-700' }} shrink-0">
                        <x-radix-icon name="lock-closed" class="w-4 h-4" />
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs font-bold uppercase tracking-wider px-2 py-0.5 rounded {{ $assessment->is_mandatory ? 'bg-amber-200 text-amber-900' : 'bg-gray-200 text-gray-800' }}">
                                Hak Prerogatif Owner Adzkia
                            </span>
                            @if($assessment->is_mandatory)
                                <span class="text-xs font-extrabold text-amber-700">🔒 WAJIB TAYANG NASIONAL</span>
                            @else
                                <span class="text-xs font-semibold text-gray-600">Asesmen Pilihan (Bisa di-toggle oleh Tenant Enterprise)</span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-600 mt-1">
                            @if($assessment->is_mandatory)
                                Asesmen ini dikunci permanen pada posisi <strong>ON</strong>. Seluruh tenant (termasuk Enterprise) <strong>tidak dapat mematikan</strong> asesmen ini dari portal mereka.
                            @else
                                Asesmen ini berstatus opsional. Tenant Enterprise memiliki wewenang untuk menampilkan atau menyembunyikan asesmen ini di portal branding mereka.
                            @endif
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('assessments.toggle-mandatory', $assessment) }}" class="shrink-0">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="px-4 py-2 rounded-xl text-xs font-bold transition-all shadow-sm cursor-pointer {{ $assessment->is_mandatory ? 'bg-white hover:bg-gray-100 text-amber-800 border border-amber-300' : 'bg-amber-600 hover:bg-amber-700 text-white' }}">
                        {{ $assessment->is_mandatory ? 'Ubah Jadi Asesmen Pilihan' : 'Kunci Jadi Wajib Tayang Nasional' }}
                    </button>
                </form>
            </div>
        @endif

        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-3 border border-green-6/50 text-green-11 text-sm font-semibold flex items-center justify-between">
                <span>{{ session('success') }}</span>
                <button type="button" @click="$el.parentElement.remove()" class="text-green-9 hover:text-green-11 cursor-pointer">
                    <x-radix-icon name="cross-2" class="w-4 h-4" />
                </button>
            </div>
        @endif

        <!-- Metadata Summary Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                <span class="text-xs text-gray-11">Mata Pelajaran</span>
                <p class="text-sm font-bold text-gray-12 mt-1">{{ $assessment->subject?->name ?? 'Umum' }}</p>
                <span class="text-[11px] text-gray-9 font-mono">Kelas {{ $assessment->grade_level ?? '-' }}</span>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                <span class="text-xs text-gray-11">Durasi Pengerjaan</span>
                <p class="text-sm font-bold text-gray-12 mt-1">{{ $assessment->duration_minutes }} Menit</p>
                <span class="text-[11px] text-gray-9">Metode: {{ $assessment->scoring_type }}</span>
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                @if($canManage)
                    <span class="text-xs text-gray-11">Token Akses CBT</span>
                    <p class="text-sm font-mono font-extrabold text-green-11 mt-1">{{ $assessment->settings['token'] ?? 'AUTO' }}</p>
                    <span class="text-[11px] text-gray-9">Diperlukan untuk masuk</span>
                @else
                    @php
                        $userAccess = auth()->user()?->getAssessmentAccess($assessment);
                        $daysLeft = $userAccess ? $userAccess->daysRemaining() : 0;
                        $attemptsLeft = $userAccess ? $userAccess->availableAttempts() : 0;
                        $isFree = ($assessment->price_type === 'free' || (float) $assessment->price <= 0);
                        $isUnlimited = empty($assessment->max_attempts) || (int) $assessment->max_attempts <= 0;
                    @endphp
                    <span class="text-xs text-gray-11 font-medium">Sisa Waktu &amp; Percobaan</span>
                    <p class="text-sm font-extrabold mt-1">
                        @if($isFree && $isUnlimited)
                            <span class="text-emerald-700 font-extrabold">Free. Forever. For YOU.</span>
                        @elseif($userAccess)
                            <span class="text-amber-11">{{ $daysLeft }} Hari Tersisa</span>
                        @elseif($isFree)
                            <span class="text-emerald-700 font-extrabold">Free. Forever. For YOU.</span>
                        @else
                            <span class="text-amber-11">Akses Belum Aktif</span>
                        @endif
                    </p>
                    <span class="text-[11px] font-semibold {{ ($isFree || $userAccess) ? 'text-gray-12' : 'text-gray-9' }}">
                        @if($isFree && $isUnlimited)
                            Percobaan Tanpa Batas
                        @elseif($userAccess)
                            {{ $attemptsLeft }}x Sisa Percobaan
                        @elseif($isFree)
                            {{ $assessment->max_attempts }}x Percobaan
                        @else
                            Perlu Pembelian Paket
                        @endif
                    </span>
                @endif
            </div>
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                <span class="text-xs text-gray-11">Total Bagian / Soal</span>
                <p class="text-sm font-bold text-gray-12 mt-1">{{ $assessment->sections->count() }} Bagian</p>
                <span class="text-[11px] text-gray-9">{{ $assessment->sections->sum(fn($s) => $s->questions->count() + $s->questionGroups->sum(fn($g) => $g->questions->count())) }} Butir Soal</span>
            </div>
        </div>

        @if($assessment->description)
            <div class="p-5 rounded-2xl border border-gray-6 bg-white text-xs text-gray-11 leading-relaxed shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                <span class="font-bold text-gray-12 block mb-1 text-sm">Petunjuk Umum & Arahan Pengerjaan:</span>
                <div class="prose prose-sm text-gray-11">
                    {!! Str::markdown($assessment->description) !!}
                </div>
            </div>
        @endif

        <!-- LEADERBOARD LINTAS TENANT (AKTIF JIKA TELAH DIKERJAKAN MINIMAL 10 KALI) -->
        @if(! $isLeaderboardActive)
            <!-- State: Leaderboard Belum Aktif -->
            <div class="rounded-2xl border border-dashed border-blue-300 bg-gradient-to-r from-blue-50/60 to-indigo-50/40 p-6 text-center space-y-3 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                <div class="w-12 h-12 mx-auto rounded-full bg-blue-100 border border-blue-200 flex items-center justify-center text-2xl shadow-xs">
                    🏆
                </div>
                <div>
                    <h3 class="font-display font-bold text-base text-gray-12">Leaderboard &amp; Klasemen Nasional</h3>
                    <p class="text-xs text-gray-11 max-w-md mx-auto leading-relaxed mt-1">
                        Klasemen peringkat (Top 10 &amp; Peringkat Lanjutan) akan otomatis diaktifkan setelah asesmen ini diselesaikan minimal <strong>10 kali</strong> oleh peserta ujian (lintas tenant).
                    </p>
                </div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-blue-200 text-blue-900 text-xs font-bold shadow-2xs">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    <span>Progres Saat Ini: {{ $totalCompletedCount }} / 10 Pengerjaan Selesai</span>
                </div>
            </div>
        @else
            <!-- State: Leaderboard Aktif (2 DIV: DIV 1 Top 10 & DIV 2 Rank 11+) -->
            <div class="space-y-3">
                <div class="flex items-center justify-between border-b border-gray-6 pb-2">
                    <div class="flex items-center gap-2">
                        <span class="text-lg">🏆</span>
                        <h2 class="font-display font-bold text-lg text-gray-12 tracking-tight">Leaderboard Asesmen Nasional</h2>
                    </div>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-md bg-blue-50 text-blue-800 border border-blue-200">
                        {{ $totalCompletedCount }} Sesi Selesai (Lintas Tenant)
                    </span>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-stretch">
                    <!-- DIV 1: 10 BESAR (TOP 10) -->
                    <div class="bg-white rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex flex-col h-[520px] overflow-hidden">
                        <!-- Header DIV 1 -->
                        <div class="p-4 bg-gradient-to-r from-amber-500/10 via-amber-500/5 to-transparent border-b border-gray-6 flex items-center justify-between shrink-0">
                            <div class="flex items-center gap-2.5">
                                <span class="w-7 h-7 rounded-lg bg-amber-500 text-white flex items-center justify-center font-bold text-sm shadow-xs">
                                    🥇
                                </span>
                                <div>
                                    <h3 class="font-display font-extrabold text-sm text-gray-12">10 Besar (Top 10)</h3>
                                    <p class="text-[11px] text-gray-11">Peserta dengan skor tertinggi di asesmen ini</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded bg-amber-100 text-amber-900 border border-amber-300">
                                Peringkat 1 - 10
                            </span>
                        </div>

                        <!-- Content List DIV 1 (Scroll di dalam div saja) -->
                        <div class="flex-1 overflow-y-auto p-4 space-y-2.5 divide-y divide-gray-100">
                            @foreach($top10Sessions as $rankIndex => $s)
                                @php
                                    $rank = $rankIndex + 1;
                                    $studentName = $s->user?->name ?? 'Peserta CBT';
                                    $studentUsername = $s->user?->username;
                                    $studentUrl = $studentUsername ? route('global.student.profile', ['username' => $studentUsername]) : '#';
                                    $tenantName = $s->tenant?->name ?? 'Adzkia Pusat';
                                    $tenantSubdomain = $s->tenant?->subdomain;
                                    $tenantUrl = $tenantSubdomain ? route('tenant.portal.direct', ['subdomain' => $tenantSubdomain]) : '#';
                                    $scoreFormatted = (fmod((float) $s->score, 1) !== 0.0) ? number_format((float) $s->score, 1, ',', '.') : number_format((float) $s->score, 0, ',', '.');
                                @endphp
                                <div class="pt-2.5 first:pt-0 flex items-center justify-between gap-3">
                                    <!-- Rank Badge & Peserta Info -->
                                    <div class="flex items-center gap-3 min-w-0">
                                        <!-- Rank Badge -->
                                        @if($rank === 1)
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-amber-500 to-yellow-300 text-white font-black text-xs flex items-center justify-center shadow-xs shrink-0 ring-2 ring-amber-400" title="Juara 1">
                                                🥇
                                            </div>
                                        @elseif($rank === 2)
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-slate-400 to-gray-200 text-slate-800 font-black text-xs flex items-center justify-center shadow-xs shrink-0 ring-2 ring-slate-300" title="Juara 2">
                                                🥈
                                            </div>
                                        @elseif($rank === 3)
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-amber-700 to-orange-400 text-white font-black text-xs flex items-center justify-center shadow-xs shrink-0 ring-2 ring-amber-600" title="Juara 3">
                                                🥉
                                            </div>
                                        @else
                                            <div class="w-8 h-8 rounded-full bg-gray-100 border border-gray-300 text-gray-700 font-extrabold text-xs flex items-center justify-center shrink-0">
                                                #{{ $rank }}
                                            </div>
                                        @endif

                                        <!-- Avatar Siswa -->
                                        <div class="relative shrink-0">
                                            <img src="{{ $s->user?->profile_photo_url }}"
                                                 alt="{{ $studentName }}"
                                                 class="w-9 h-9 rounded-full object-cover bg-gray-100 border border-gray-200"
                                                 onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';" />
                                            <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-800 font-bold text-xs items-center justify-center hidden">
                                                {{ substr($studentName, 0, 1) }}
                                            </div>
                                        </div>

                                        <!-- Nama Siswa & Tenant -->
                                        <div class="min-w-0">
                                            <a href="{{ $studentUrl }}" target="{{ $studentUsername ? '_blank' : '_self' }}"
                                               class="font-display font-bold text-xs sm:text-sm text-gray-12 hover:text-blue-600 transition-colors block truncate"
                                               title="Buka profil siswa">
                                                {{ $studentName }}
                                            </a>
                                            <div class="flex items-center gap-1.5 mt-0.5">
                                                <span class="text-[10px] text-gray-9">Bimbel/Tenant:</span>
                                                <a href="{{ $tenantUrl }}" target="{{ $tenantSubdomain ? '_blank' : '_self' }}"
                                                   class="text-[11px] font-semibold text-blue-700 hover:text-blue-900 transition-colors truncate"
                                                   title="Kunjungi tenant/bimbel">
                                                    {{ $tenantName }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nilai Total -->
                                    <div class="shrink-0 text-right">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-lg {{ $rank <= 3 ? 'bg-amber-50 text-amber-900 border border-amber-300 font-black' : 'bg-gray-50 text-gray-900 border border-gray-200 font-bold' }} font-mono text-sm sm:text-base">
                                            {{ $scoreFormatted }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- DIV 2: DILUAR 10 BESAR (RANK 11+) -->
                    <div class="bg-white rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex flex-col h-[520px] overflow-hidden">
                        <!-- Header DIV 2 -->
                        <div class="p-4 bg-gradient-to-r from-blue-500/10 via-blue-500/5 to-transparent border-b border-gray-6 flex items-center justify-between shrink-0">
                            <div class="flex items-center gap-2.5">
                                <span class="w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold text-sm shadow-xs">
                                    📊
                                </span>
                                <div>
                                    <h3 class="font-display font-extrabold text-sm text-gray-12">Peringkat Lanjutan (Rank 11+)</h3>
                                    <p class="text-[11px] text-gray-11">Klasemen kompetisi di luar 10 besar</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded bg-blue-100 text-blue-900 border border-blue-300">
                                Rank 11 Ke Atas
                            </span>
                        </div>

                        <!-- Content Table DIV 2 (Tabel yang lebih rapat, scroll di dalam div saja) -->
                        <div class="flex-1 overflow-y-auto">
                            @if($remainingSessions->isEmpty())
                                <div class="h-full flex flex-col items-center justify-center p-6 text-center text-gray-11">
                                    <span class="text-3xl mb-2">🏅</span>
                                    <p class="font-semibold text-xs text-gray-12">Belum ada peserta di luar 10 besar</p>
                                    <p class="text-[11px] text-gray-9 mt-0.5">Seluruh peserta yang selesai saat ini berada di dalam Top 10.</p>
                                </div>
                            @else
                                <table class="w-full text-left text-xs border-collapse">
                                    <thead class="sticky top-0 bg-gray-50/95 backdrop-blur-xs border-b border-gray-200 z-10 font-display">
                                        <tr>
                                            <th class="py-2.5 px-3 font-bold w-12 text-center text-gray-11">Rank</th>
                                            <th class="py-2.5 px-3 font-bold text-gray-12">Nama Siswa</th>
                                            <th class="py-2.5 px-3 font-bold text-gray-12">Nama Tenant</th>
                                            <th class="py-2.5 px-3 font-bold text-right text-gray-12 w-20">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach($remainingSessions as $rIdx => $rem)
                                            @php
                                                $rankNum = 11 + $rIdx;
                                                $rStudentName = $rem->user?->name ?? 'Peserta CBT';
                                                $rStudentUsername = $rem->user?->username;
                                                $rStudentUrl = $rStudentUsername ? route('global.student.profile', ['username' => $rStudentUsername]) : '#';
                                                $rTenantName = $rem->tenant?->name ?? 'Adzkia Pusat';
                                                $rTenantSubdomain = $rem->tenant?->subdomain;
                                                $rTenantUrl = $rTenantSubdomain ? route('tenant.portal.direct', ['subdomain' => $rTenantSubdomain]) : '#';
                                                $rScoreFormatted = (fmod((float) $rem->score, 1) !== 0.0) ? number_format((float) $rem->score, 1, ',', '.') : number_format((float) $rem->score, 0, ',', '.');
                                            @endphp
                                            <tr class="hover:bg-blue-50/30 transition-colors">
                                                <td class="py-2 px-3 text-center font-mono font-bold text-gray-500">
                                                    {{ $rankNum }}
                                                </td>
                                                <td class="py-2 px-3 min-w-0">
                                                    <a href="{{ $rStudentUrl }}" target="{{ $rStudentUsername ? '_blank' : '_self' }}"
                                                       class="font-semibold text-gray-12 hover:text-blue-600 transition-colors truncate block"
                                                       title="{{ $rStudentName }}">
                                                        {{ $rStudentName }}
                                                    </a>
                                                </td>
                                                <td class="py-2 px-3 min-w-0">
                                                    <a href="{{ $rTenantUrl }}" target="{{ $rTenantSubdomain ? '_blank' : '_self' }}"
                                                       class="text-gray-11 hover:text-blue-700 transition-colors truncate block"
                                                       title="{{ $rTenantName }}">
                                                        {{ $rTenantName }}
                                                    </a>
                                                </td>
                                                <td class="py-2 px-3 text-right font-mono font-extrabold text-gray-900">
                                                    {{ $rScoreFormatted }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($canManage)
            <!-- SISI GURU / ADMIN: Review Soal & Konfigurasi -->
            <div class="space-y-6">
                <div class="flex items-center justify-between border-b border-gray-6 pb-2">
                    <h2 class="font-display font-bold text-lg text-gray-12 tracking-tight">Struktur Bagian & Butir Soal Ujian</h2>
                    <span class="text-xs text-gray-11">Pratinjau struktur lembar ujian guru</span>
                </div>

                @foreach($assessment->sections as $secIndex => $section)
                    <div class="bg-white border border-gray-6 rounded-2xl overflow-hidden shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                        <!-- Section Header -->
                        <div class="bg-gray-50/80 px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white flex items-center justify-center font-bold text-xs shadow-xs">
                                    {{ $secIndex + 1 }}
                                </span>
                                <div>
                                    <h3 class="font-display font-bold text-base text-gray-900">{{ $section->title }}</h3>
                                    @if($section->instructions)
                                        <p class="text-xs text-gray-600 mt-0.5">{{ $section->instructions }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                @if(!empty($assessment->settings['section_weights'][$section->id]))
                                    <span class="text-xs font-mono font-bold text-teal-800 bg-teal-100 px-3 py-1 rounded-lg border border-teal-300">
                                        Bobot: {{ $assessment->settings['section_weights'][$section->id] }}%
                                    </span>
                                @endif
                                @if($section->duration_minutes)
                                    <span class="text-xs font-mono font-bold text-gray-700 bg-white px-3 py-1 rounded-lg border border-gray-300">
                                        {{ $section->duration_minutes }} menit
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 space-y-6">
                            <!-- 1. Question Groups (Stimulus / Narasi Berseri) -->
                            @foreach($section->questionGroups as $gIndex => $group)
                                <div class="border border-emerald-300/80 bg-emerald-50/40 rounded-2xl p-5 space-y-4">
                                    <div class="flex items-center gap-2">
                                        <span class="px-2.5 py-1 rounded-md bg-emerald-700 text-white font-bold text-xs uppercase tracking-wider shadow-2xs">
                                            Stimulus Narasi: {{ $group->title ?? 'Wacana' }}
                                        </span>
                                    </div>
                                    <div class="p-4 rounded-xl border border-emerald-200 bg-white text-xs text-gray-900 leading-relaxed whitespace-pre-line font-serif text-justify shadow-2xs">
                                        {!! Str::markdown($group->stimulus_content) !!}
                                    </div>

                                    <!-- Child Questions -->
                                    <div class="space-y-4 pl-4 border-l-2 border-emerald-500/60">
                                        <h4 class="text-xs font-bold text-gray-600 uppercase tracking-wider">Anak Soal Berdasarkan Narasi Di Atas:</h4>
                                        @foreach($group->questions as $cqIndex => $childQ)
                                            <div class="bg-white border border-gray-200 rounded-xl p-4 space-y-3 shadow-2xs">
                                                <div class="flex items-center justify-between border-b border-gray-200 pb-2">
                                                    <div class="flex items-center gap-2">
                                                        <span class="w-6 h-6 rounded-md bg-slate-900 text-white flex items-center justify-center text-xs font-bold">{{ $cqIndex + 1 }}</span>
                                                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-100 border border-emerald-300 px-2 py-0.5 rounded-md">
                                                            {{ $childQ->type }}
                                                        </span>
                                                    </div>
                                                    <span class="text-xs font-bold text-gray-700">Bobot: {{ $childQ->points }} poin</span>
                                                </div>

                                                <div class="prose prose-sm max-w-none text-gray-900 font-semibold p-3.5 rounded-lg bg-gray-50 border border-gray-200">
                                                    {!! Str::markdown($childQ->prompt) !!}
                                                </div>

                                                <!-- Render Options by Type -->
                                                @include('assessments.partials.options-render', ['question' => $childQ])
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            <!-- 2. Standalone Questions -->
                            @foreach($section->questions->whereNull('question_group_id') as $qIndex => $question)
                                <div class="border border-gray-200 rounded-2xl p-5 space-y-3 shadow-2xs bg-white">
                                    <div class="flex items-center justify-between border-b border-gray-200 pb-2.5">
                                        <div class="flex items-center gap-2">
                                            <span class="w-6 h-6 rounded-md bg-slate-900 text-white flex items-center justify-center text-xs font-bold">{{ $qIndex + 1 }}</span>
                                            <span class="text-xs font-bold uppercase tracking-wider text-emerald-800 bg-emerald-100 border border-emerald-300 px-2 py-0.5 rounded-md">
                                                {{ $question->type }}
                                            </span>
                                        </div>
                                        <span class="text-xs font-bold text-gray-700">Bobot: {{ $question->points }} poin</span>
                                    </div>

                                    <div class="prose prose-sm max-w-none text-gray-900 font-semibold p-3.5 rounded-lg bg-gray-50 border border-gray-200">
                                        {!! Str::markdown($question->prompt) !!}
                                    </div>

                                    <!-- Render Options by Type -->
                                    @include('assessments.partials.options-render', ['question' => $question])
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- SISI MURID / SISWA: Ruang Masuk CBT & Konfirmasi Pengerjaan -->
            <div class="bg-white border border-gray-6 rounded-3xl p-6 sm:p-8 shadow-[0_4px_16px_rgba(0,0,0,0.03)] space-y-6">
                <div class="flex items-center gap-3 border-b border-gray-6 pb-4">
                    <div class="w-10 h-10 rounded-xl bg-sky-3 text-sky-11 flex items-center justify-center">
                        <x-radix-icon name="timer" class="w-5 h-5" />
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-lg text-gray-12">Konfirmasi & Tata Tertib Pengerjaan</h3>
                        <p class="text-xs text-gray-11 mt-0.5">Harap membaca petunjuk sebelum memulai sesi ujian interaktif CBT.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-gray-11">
                    <div class="p-4 rounded-xl bg-gray-2/50 border border-gray-5 space-y-2">
                        <div class="font-bold text-gray-12 flex items-center gap-2">
                            <x-radix-icon name="check-circled" class="w-4 h-4 text-green-10" />
                            <span>Koneksi & Perangkat</span>
                        </div>
                        <p>Pastikan koneksi internet stabil. Anda diperbolehkan menggunakan smartphone, tablet, atau komputer jinjing.</p>
                    </div>

                    <div class="p-4 rounded-xl bg-gray-2/50 border border-gray-5 space-y-2">
                        <div class="font-bold text-gray-12 flex items-center gap-2">
                            <x-radix-icon name="timer" class="w-4 h-4 text-sky-10" />
                            <span>Pewaktuan Otomatis</span>
                        </div>
                        <p>Penghitung mundur akan aktif otomatis selama <strong>{{ $assessment->duration_minutes }} menit</strong> setelah tombol mulai ditekan.</p>
                    </div>
                </div>

                <div class="pt-5 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-gray-5">
                    <div class="inline-flex items-center gap-3 px-4 py-2.5 rounded-2xl bg-green-2 border border-green-6/60 shadow-2xs">
                        <span class="text-sm font-bold text-gray-11 uppercase tracking-wider">Token Ujian:</span>
                        <span class="font-mono font-black text-2xl text-green-11 tracking-wider">{{ $assessment->settings['token'] ?? 'AUTO' }}</span>
                    </div>

                    <a href="{{ route('exam.gate.show', $assessment) }}" class="w-full sm:w-auto px-6 py-3 rounded-full bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-sm font-bold transition-all shadow-md flex items-center justify-center gap-2 cursor-pointer">
                        <x-radix-icon name="play" class="w-4 h-4" />
                        <span>Mulai Pengerjaan Ujian Sekarang</span>
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
