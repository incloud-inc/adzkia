<x-layouts.app>
    <x-slot:title>Analisis Soal & Rekap Nilai — {{ $assessment->title }}</x-slot:title>

    <div class="max-w-7xl mx-auto space-y-6 pb-20">

        <!-- Top Header & Breadcrumb -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center gap-2">
                    <a href="{{ route('assessments.index') }}" class="text-xs text-gray-10 hover:text-gray-12 transition">
                        Daftar Asesmen
                    </a>
                    <span class="text-gray-7 text-xs">/</span>
                    <span class="text-xs font-semibold text-gray-12">Analisis Butir Soal & Rekapitulasi</span>
                </div>
                <h1 class="text-2xl font-display font-extrabold text-gray-12 tracking-tight flex items-center gap-3">
                    <span>{{ $assessment->title }}</span>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-indigo-2 text-indigo-11 border border-indigo-5">
                        {{ $assessment->subject?->name ?? 'Umum' }} • Kelas {{ $assessment->grade_level ?? '-' }}
                    </span>
                </h1>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center gap-2.5">
                <a href="{{ route('assessments.grading', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-2 text-xs font-semibold text-gray-12 transition shadow-2xs">
                    <x-radix-icon name="pencil-2" class="w-4 h-4 text-amber-10" />
                    <span>Panel Koreksi Guru</span>
                </a>
                <a href="{{ route('assessments.analytics.export', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-xs font-semibold text-white transition shadow-sm">
                    <x-radix-icon name="download" class="w-4 h-4" />
                    <span>Ekspor Excel (.csv)</span>
                </a>
                <a href="{{ route('assessments.analytics.print', $assessment) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gray-12 hover:bg-black text-xs font-semibold text-white transition shadow-sm">
                    <x-radix-icon name="printer" class="w-4 h-4" />
                    <span>Cetak / PDF Resmi</span>
                </a>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- 1. SUMMARY STATISTIC CARDS                                     -->
        <!-- ============================================================== -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3.5">
            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Total Peserta</span>
                <p class="text-2xl font-extrabold text-gray-12 mt-1 font-mono">{{ $sessions->count() }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">{{ $analysis['total_participants'] }} selesai dinilai</span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Rata-Rata Nilai</span>
                <p class="text-2xl font-extrabold text-indigo-11 mt-1 font-mono">{{ $avgScore }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">Skala 0 - 100</span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Tertinggi / Terendah</span>
                <p class="text-lg font-extrabold text-gray-12 mt-1 font-mono">{{ $maxScore }} <span class="text-xs font-normal text-gray-9">/ {{ $minScore }}</span></p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">Rentang sebaran skor</span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Kelulusan KKM</span>
                <p class="text-2xl font-extrabold text-emerald-11 mt-1 font-mono">{{ $passRate }}%</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">{{ $passedCount }} siswa tuntas KKM ({{ $kkm }})</span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Tingkat Kesukaran (p)</span>
                <p class="text-2xl font-extrabold text-amber-11 mt-1 font-mono">{{ $analysis['avg_difficulty'] }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">
                    {{ $analysis['avg_difficulty'] >= 0.7 ? 'Cenderung Mudah' : ($analysis['avg_difficulty'] >= 0.3 ? 'Kategori Sedang' : 'Cenderung Sukar') }}
                </span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Reliabilitas (KR-20)</span>
                <p class="text-2xl font-extrabold text-purple-11 mt-1 font-mono">{{ $analysis['reliability_kr20'] ?? '-' }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">
                    @if($analysis['reliability_kr20'] >= 0.7)
                        Konsistensi Tinggi
                    @elseif($analysis['reliability_kr20'] !== null)
                        Cukup / Perlu Evaluasi
                    @else
                        Sampel Belum Cukup
                    @endif
                </span>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- 2. TAB NAVIGATION (REKAP NILAI vs ANALISIS BUTIR SOAL)         -->
        <!-- ============================================================== -->
        <div x-data="{ activeTab: 'recap' }" class="space-y-5">
            <div class="flex items-center gap-2 border-b border-gray-6">
                <button type="button" @click="activeTab = 'recap'"
                        class="px-4 py-2.5 text-xs font-bold border-b-2 transition -mb-px flex items-center gap-2 cursor-pointer"
                        :class="activeTab === 'recap' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-10 hover:text-gray-12'">
                    <x-radix-icon name="table" class="w-4 h-4" />
                    <span>Rekap Nilai Siswa / Kelas</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] bg-gray-3 text-gray-11">{{ $sessions->count() }}</span>
                </button>
                <button type="button" @click="activeTab = 'analysis'"
                        class="px-4 py-2.5 text-xs font-bold border-b-2 transition -mb-px flex items-center gap-2 cursor-pointer"
                        :class="activeTab === 'analysis' ? 'border-indigo-600 text-indigo-600' : 'border-transparent text-gray-10 hover:text-gray-12'">
                    <x-radix-icon name="bar-chart" class="w-4 h-4" />
                    <span>Statistik Analisis Butir Soal (Psikometri)</span>
                    <span class="px-2 py-0.5 rounded-full text-[10px] bg-indigo-2 text-indigo-11 font-mono">{{ $analysis['total_questions'] }}</span>
                </button>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 1: REKAPITULASI NILAI SISWA                                -->
            <!-- ============================================================== -->
            <div x-show="activeTab === 'recap'" class="space-y-4">
                <div class="rounded-2xl border border-gray-6 bg-white overflow-hidden shadow-2xs">
                    <div class="p-4 border-b border-gray-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gray-2/50">
                        <div>
                            <h3 class="text-sm font-bold text-gray-12">Rekap Hasil Pengerjaan Peserta Ujian</h3>
                            <p class="text-xs text-gray-10">Daftar peringkat berdasarkan perolehan skor tertinggi</p>
                        </div>
                        <div class="flex items-center gap-2 text-xs text-gray-11">
                            <span class="inline-flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Lulus KKM</span>
                            <span class="inline-flex items-center gap-1.5 ml-2"><span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span> Belum Tuntas</span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-xs text-left border-collapse">
                            <thead>
                                <tr class="border-b border-gray-5 bg-gray-3/70 text-gray-11 uppercase font-semibold text-[11px] tracking-wider">
                                    <th class="py-3 px-4 w-12 text-center">Rank</th>
                                    <th class="py-3 px-4">Nama Siswa</th>
                                    <th class="py-3 px-4">Email / Akun</th>
                                    <th class="py-3 px-4">Lembaga / Tenant</th>
                                    <th class="py-3 px-4 text-center">Durasi</th>
                                    <th class="py-3 px-4 text-center">Status</th>
                                    <th class="py-3 px-4 text-right">Skor Asli</th>
                                    <th class="py-3 px-4 text-right">Nilai (100)</th>
                                    <th class="py-3 px-4 text-center">Kelulusan KKM</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-4 text-gray-12">
                                @forelse($sessions as $index => $session)
                                    @php
                                        $max = (float) ($session->max_score > 0 ? $session->max_score : 100);
                                        $pct = round(((float) $session->score / $max) * 100, 1);
                                        $isPassed = $kkmEnabled ? ($pct >= $kkm) : true;
                                        $duration = ($session->started_at && $session->completed_at)
                                            ? round($session->completed_at->diffInMinutes($session->started_at))
                                            : null;
                                    @endphp
                                    <tr class="hover:bg-gray-2/50 transition">
                                        <td class="py-3 px-4 text-center font-bold text-gray-10 font-mono">
                                            @if($index === 0)
                                                <span class="w-6 h-6 rounded-full bg-amber-4 text-amber-12 inline-flex items-center justify-center font-bold">1</span>
                                            @elseif($index === 1)
                                                <span class="w-6 h-6 rounded-full bg-slate-3 text-slate-11 inline-flex items-center justify-center font-bold">2</span>
                                            @elseif($index === 2)
                                                <span class="w-6 h-6 rounded-full bg-amber-2 text-amber-11 inline-flex items-center justify-center font-bold">3</span>
                                            @else
                                                {{ $index + 1 }}
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 font-semibold text-gray-12">
                                            {{ $session->user?->name ?? 'Anonim' }}
                                        </td>
                                        <td class="py-3 px-4 font-mono text-gray-10 text-[11px]">
                                            {{ $session->user?->email ?? '-' }}
                                        </td>
                                        <td class="py-3 px-4 text-gray-11">
                                            {{ $session->tenant?->name ?? '-' }}
                                        </td>
                                        <td class="py-3 px-4 text-center text-gray-11 font-mono">
                                            {{ $duration !== null ? $duration . ' m' : '-' }}
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            @if($session->status === 'completed')
                                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-2 text-emerald-11 border border-emerald-5">
                                                    Selesai
                                                </span>
                                            @elseif($session->status === 'in_progress')
                                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-2 text-amber-11 border border-amber-5 animate-pulse">
                                                    Ujian
                                                </span>
                                            @else
                                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-gray-3 text-gray-11">
                                                    {{ $session->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4 text-right font-mono font-semibold text-gray-11">
                                            {{ $session->score }} <span class="text-[10px] text-gray-8">/ {{ $session->max_score }}</span>
                                        </td>
                                        <td class="py-3 px-4 text-right font-mono font-extrabold text-sm {{ $isPassed ? 'text-emerald-11' : 'text-rose-11' }}">
                                            {{ $pct }}
                                        </td>
                                        <td class="py-3 px-4 text-center">
                                            @if($session->status === 'completed')
                                                @if($isPassed)
                                                    <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-11">
                                                        <x-radix-icon name="check-circled" class="w-3.5 h-3.5" />
                                                        <span>Lulus</span>
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1 text-[11px] font-bold text-rose-11">
                                                        <x-radix-icon name="cross-circled" class="w-3.5 h-3.5" />
                                                        <span>Remidial</span>
                                                    </span>
                                                @endif
                                            @else
                                                <span class="text-gray-8 text-[11px]">—</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="py-12 text-center text-gray-10 text-xs">
                                            Belum ada peserta yang mengikuti atau menyelesaikan ujian ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- TAB 2: ANALISIS BUTIR SOAL PSIKOMETRI                          -->
            <!-- ============================================================== -->
            <div x-show="activeTab === 'analysis'" class="space-y-4">

                <!-- Panduan Indikator Klasik -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-4 rounded-xl border border-indigo-400/20 bg-indigo-50/50 text-xs text-indigo-950 space-y-1.5">
                        <p class="font-bold flex items-center gap-1.5 text-indigo-900">
                            <x-radix-icon name="info-circled" class="w-4 h-4 text-indigo-600" />
                            <span>Kriteria Tingkat Kesukaran (Facility Value, p):</span>
                        </p>
                        <ul class="list-disc list-inside space-y-0.5 text-indigo-800 text-[11px]">
                            <li><strong>p &ge; 0.70</strong>: Soal Mudah (banyak dijawab benar oleh peserta)</li>
                            <li><strong>0.30 &le; p &lt; 0.70</strong>: Soal Sedang (ideal dan proporsional)</li>
                            <li><strong>p &lt; 0.30</strong>: Soal Sukar (tingkat kesulitan tinggi)</li>
                        </ul>
                    </div>

                    <div class="p-4 rounded-xl border border-purple-400/20 bg-purple-50/50 text-xs text-purple-950 space-y-1.5">
                        <p class="font-bold flex items-center gap-1.5 text-purple-900">
                            <x-radix-icon name="info-circled" class="w-4 h-4 text-purple-600" />
                            <span>Kriteria Daya Pembeda (Discrimination Index, D):</span>
                        </p>
                        <ul class="list-disc list-inside space-y-0.5 text-purple-800 text-[11px]">
                            <li><strong>D &ge; 0.40</strong>: Sangat Baik (membedakan kelompok mampu & kurang)</li>
                            <li><strong>0.30 &le; D &lt; 0.40</strong>: Baik (dapat langsung digunakan)</li>
                            <li><strong>0.20 &le; D &lt; 0.30</strong>: Cukup (perlu sedikit perbaikan opsi)</li>
                            <li><strong>D &lt; 0.20 atau Negatif</strong>: Buruk (soal bermasalah / buang)</li>
                        </ul>
                    </div>
                </div>

                <!-- Tabel Butir Soal -->
                <div class="space-y-3">
                    @forelse($analysis['questions'] as $qStat)
                        <div x-data="{ expanded: false }" class="rounded-2xl border border-gray-6 bg-white overflow-hidden shadow-2xs transition">
                            <!-- Question Bar -->
                            <div class="p-4 flex flex-col md:flex-row md:items-center justify-between gap-3 bg-white hover:bg-gray-2/40 cursor-pointer"
                                 @click="expanded = !expanded">
                                <div class="flex items-start gap-3 flex-1 min-w-0">
                                    <span class="w-8 h-8 rounded-xl bg-gray-12 text-white text-xs font-bold flex items-center justify-center shrink-0">
                                        {{ $qStat['number'] }}
                                    </span>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded bg-gray-3 text-gray-11">
                                                {{ $qStat['type'] }}
                                            </span>
                                            <span class="text-xs text-gray-10">• {{ $qStat['section_title'] }}</span>
                                            <span class="text-xs text-gray-10">• {{ $qStat['points'] }} poin</span>
                                        </div>
                                        <p class="text-xs font-medium text-gray-12 line-clamp-2">
                                            {{ strip_tags($qStat['prompt']) }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Metric Badges -->
                                <div class="flex items-center gap-4 shrink-0 border-t md:border-t-0 pt-2 md:pt-0">
                                    <!-- Kesukaran -->
                                    <div class="text-right">
                                        <span class="text-[10px] text-gray-10 block font-semibold">Tingkat Kesukaran (p)</span>
                                        <div class="flex items-center justify-end gap-1.5 mt-0.5">
                                            <span class="font-mono font-bold text-xs text-gray-12">{{ $qStat['difficulty_index'] }}</span>
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold
                                                {{ $qStat['difficulty_category'] === 'Mudah' ? 'bg-emerald-2 text-emerald-11 border border-emerald-5' : ($qStat['difficulty_category'] === 'Sedang' ? 'bg-amber-2 text-amber-11 border border-amber-5' : 'bg-rose-2 text-rose-11 border border-rose-5') }}">
                                                {{ $qStat['difficulty_category'] }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Daya Pembeda -->
                                    <div class="text-right">
                                        <span class="text-[10px] text-gray-10 block font-semibold">Daya Pembeda (D)</span>
                                        <div class="flex items-center justify-end gap-1.5 mt-0.5">
                                            <span class="font-mono font-bold text-xs text-gray-12">{{ $qStat['discrimination_index'] }}</span>
                                            <span class="px-2 py-0.5 rounded text-[10px] font-bold
                                                {{ $qStat['discrimination_category'] === 'Sangat Baik' ? 'bg-emerald-2 text-emerald-11 border border-emerald-5' : ($qStat['discrimination_category'] === 'Baik' ? 'bg-indigo-2 text-indigo-11 border border-indigo-5' : ($qStat['discrimination_category'] === 'Cukup (Revisi)' ? 'bg-amber-2 text-amber-11 border border-amber-5' : 'bg-rose-2 text-rose-11 border border-rose-5')) }}">
                                                {{ $qStat['discrimination_category'] }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="pl-2 text-gray-10">
                                        <svg class="w-4 h-4 transform transition-transform" :class="expanded ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Expanded Distractor Analysis -->
                            <div x-show="expanded" x-collapse class="p-5 border-t border-gray-6 bg-gray-2/40 space-y-4">
                                <div class="text-xs text-gray-11 space-y-1">
                                    <p class="font-bold text-gray-12">Teks Soal Lengkap:</p>
                                    <div class="p-3 bg-white rounded-xl border border-gray-5 prose prose-xs max-w-none">
                                        {!! nl2br(e($qStat['prompt'])) !!}
                                    </div>
                                </div>

                                @if(!empty($qStat['options']))
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between">
                                            <p class="text-xs font-bold text-gray-12">Distribusi Jawaban & Analisis Pengecoh (Distraktor):</p>
                                            <span class="text-[11px] text-gray-10">Total Sampel: {{ $qStat['total_answers'] }} jawaban</span>
                                        </div>

                                        <div class="grid grid-cols-1 gap-2">
                                            @foreach($qStat['options'] as $opt)
                                                <div class="p-3 rounded-xl border {{ $opt['is_correct'] ? 'border-emerald-5 bg-emerald-2/50' : 'border-gray-5 bg-white' }} flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                                    <div class="flex items-center gap-3">
                                                        <span class="w-6 h-6 rounded-lg text-xs font-bold flex items-center justify-center shrink-0
                                                            {{ $opt['is_correct'] ? 'bg-emerald-600 text-white' : 'bg-gray-3 text-gray-12 border border-gray-5' }}">
                                                            {{ $opt['label'] }}
                                                        </span>
                                                        <div>
                                                            <p class="text-xs font-medium text-gray-12">{{ $opt['option_text'] }}</p>
                                                            <p class="text-[10px] text-gray-10 mt-0.5">
                                                                Kelompok Atas (27%): <strong>{{ $opt['upper_chosen'] }}</strong> • Kelompok Bawah (27%): <strong>{{ $opt['lower_chosen'] }}</strong>
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center gap-3 shrink-0">
                                                        <!-- Bar Pemilih -->
                                                        <div class="w-28 bg-gray-3 h-2 rounded-full overflow-hidden">
                                                            <div class="h-full {{ $opt['is_correct'] ? 'bg-emerald-500' : 'bg-indigo-500' }}" style="width: {{ min(100, $opt['pct']) }}%"></div>
                                                        </div>
                                                        <span class="font-mono text-xs font-bold text-gray-12 w-14 text-right">{{ $opt['pct'] }}%</span>
                                                        <span class="px-2.5 py-0.5 rounded text-[10px] font-bold w-32 text-center
                                                            {{ $opt['is_correct'] ? 'bg-emerald-1 text-emerald-11 border border-emerald-6' : ($opt['status'] === 'Berfungsi Baik' ? 'bg-indigo-1 text-indigo-11 border border-indigo-6' : ($opt['status'] === 'Kurang Efektif (<5%)' ? 'bg-amber-1 text-amber-11 border border-amber-6' : 'bg-rose-1 text-rose-11 border border-rose-6')) }}">
                                                            {{ $opt['status'] }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <p class="text-xs text-gray-10 italic">Soal ini bukan tipe pilihan ganda (tidak memerlukan analisis distraktor opsi tunggal).</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center bg-white rounded-2xl border border-gray-6 text-gray-10 text-xs">
                            Belum ada butir soal pada asesmen ini.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
