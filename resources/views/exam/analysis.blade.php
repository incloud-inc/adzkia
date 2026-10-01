{{-- resources/views/exam/analysis.blade.php --}}
<x-layouts.app title="Analisa Ujian — {{ $assessment->title }}">
    <div class="min-h-screen bg-slate-50/60 pb-16">

        {{-- Top Header / Hero Section --}}
        <div class="border-b border-blue-100 bg-gradient-to-b from-blue-50/80 via-white to-slate-50/50 py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                {{-- Breadcrumbs --}}
                <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500 mb-3">
                    <a href="{{ route('dashboard') }}" class="hover:text-blue-700 transition">Dashboard</a>
                    <span>/</span>
                    <a href="{{ route('exam.history') }}" class="hover:text-blue-700 transition">Riwayat Ujian</a>
                    <span>/</span>
                    <span class="text-blue-700 font-bold">Analisa Ujian</span>
                </nav>

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="flex items-center gap-2.5 mb-2">
                            <span class="px-2.5 py-1 rounded-full text-[11px] font-extrabold uppercase bg-blue-100 text-blue-700 border border-blue-200">
                                {{ $assessment->subject?->name ?? 'Mata Pelajaran Umum' }}
                            </span>
                            @if($assessment->grade_level)
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-slate-100 text-slate-700 border border-slate-200">
                                    Kelas {{ $assessment->grade_level }}
                                </span>
                            @endif
                            <span class="text-xs text-slate-500 font-medium">
                                Selesai pada: {{ $summary['completed_at_formatted'] ?? '-' }}
                            </span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-display font-black text-slate-900 tracking-tight">
                            Analisa Hasil: {{ $assessment->title }}
                        </h1>
                        <p class="text-xs sm:text-sm text-slate-600 mt-1 max-w-2xl">
                            Laporan diagnosis komprehensif ketuntasan kompetensi, akurasi per sub-tes, dan rekomendasi personal perbaikan belajar mandiri.
                        </p>
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-wrap items-center gap-2.5 shrink-0">
                        <a href="{{ route('exam.result', $session->uuid) }}"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold shadow-sm transition active:scale-95">
                            <x-radix-icon name="eye-open" class="w-4 h-4" />
                            <span>Lihat Pembahasan Lengkap</span>
                        </a>
                        <a href="{{ route('exam.history') }}"
                           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-bold transition shadow-2xs">
                            <x-radix-icon name="arrow-left" class="w-4 h-4" />
                            <span>Riwayat Ujian</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Analytics Content --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 space-y-8">

            {{-- 1. KPI Cards Strip --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                
                {{-- KPI 1: Skor Akhir --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-display">Skor Akhir</span>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold ring-1 {{ $summary['is_passed'] ? 'bg-emerald-50 text-emerald-700 ring-emerald-200' : 'bg-rose-50 text-rose-700 ring-rose-200' }}">
                            {{ $summary['is_passed'] ? 'Lulus KKM' : 'Belum Tuntas' }}
                        </span>
                    </div>
                    <div class="my-4">
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-4xl font-black font-display text-slate-900 tabular-nums">
                                {{ number_format($summary['final_score'], 1) }}
                            </span>
                            <span class="text-xs text-slate-500 font-medium">/ 100</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden mt-3">
                            <div class="h-full rounded-full bg-gradient-to-r from-blue-400 to-blue-600 transition-all duration-500"
                                 style="width: {{ min(max($summary['final_score'], 0), 100) }}%"></div>
                        </div>
                    </div>
                    <div class="text-[11px] text-slate-500 flex items-center justify-between">
                        <span>KKM: <strong class="text-slate-700">{{ $summary['passing_grade']['min_score'] ?? 75 }}</strong></span>
                        <span>Poin: <strong class="text-slate-700">{{ $summary['earned_points'] }}</strong> / {{ $summary['total_points'] }}</span>
                    </div>
                </div>

                {{-- KPI 2: Akurasi Jawaban --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-display">Tingkat Akurasi</span>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-blue-50 text-blue-700 ring-1 ring-blue-200">
                            {{ $summary['total_correct'] }} Benar
                        </span>
                    </div>
                    <div class="my-4">
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-4xl font-black font-display text-slate-900 tabular-nums">
                                {{ $summary['overall_accuracy'] }}%
                            </span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden mt-3">
                            <div class="h-full rounded-full bg-gradient-to-r from-emerald-400 to-emerald-600 transition-all duration-500"
                                 style="width: {{ min(max($summary['overall_accuracy'], 0), 100) }}%"></div>
                        </div>
                    </div>
                    <div class="text-[11px] text-slate-500 flex items-center justify-between">
                        <span>Salah: <strong class="text-rose-600">{{ $summary['total_incorrect'] }}</strong></span>
                        <span>Kosong: <strong class="text-slate-600">{{ $summary['total_unanswered'] }}</strong></span>
                    </div>
                </div>

                {{-- KPI 3: Waktu Pengerjaan --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-display">Waktu Pengerjaan</span>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-700 ring-1 ring-indigo-200">
                            Tepat Waktu
                        </span>
                    </div>
                    <div class="my-4">
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-2xl sm:text-3xl font-extrabold font-display text-slate-900">
                                {{ $summary['duration_formatted'] }}
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 mt-2">
                            Rata-rata: <strong class="text-slate-800 font-semibold font-mono">{{ $summary['avg_seconds_per_q'] }} detik</strong> per soal
                        </p>
                    </div>
                    <div class="text-[11px] text-slate-500">
                        Total Alokasi Soal: <strong class="text-slate-700">{{ $summary['total_questions'] }} butir</strong>
                    </div>
                </div>

                {{-- KPI 4: Kelengkapan Pengerjaan --}}
                <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500 font-display">Kelengkapan</span>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-slate-100 text-slate-700 ring-1 ring-slate-200">
                            {{ $summary['total_questions'] - $summary['total_unanswered'] }} / {{ $summary['total_questions'] }}
                        </span>
                    </div>
                    <div class="my-4">
                        <div class="flex items-baseline gap-1.5">
                            <span class="text-4xl font-black font-display text-slate-900 tabular-nums">
                                {{ $summary['completion_rate'] }}%
                            </span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden mt-3">
                            <div class="h-full rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 transition-all duration-500"
                                 style="width: {{ min(max($summary['completion_rate'], 0), 100) }}%"></div>
                        </div>
                    </div>
                    <div class="text-[11px] text-slate-500 flex items-center justify-between">
                        <span>Status: <strong class="{{ $summary['total_unanswered'] === 0 ? 'text-emerald-600' : 'text-amber-600' }}">{{ $summary['total_unanswered'] === 0 ? 'Semua Terjawab' : 'Ada Soal Dilewati' }}</strong></span>
                    </div>
                </div>

            </div>

            {{-- 2. Komposisi Jawaban Visual Strip --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-800 font-display mb-3">
                    Komposisi Jawaban Keseluruhan
                </h2>
                <div class="w-full h-4 rounded-full overflow-hidden flex bg-slate-100">
                    @php
                        $totalQ = max($summary['total_questions'], 1);
                        $pctCorrect = ($summary['total_correct'] / $totalQ) * 100;
                        $pctIncorrect = ($summary['total_incorrect'] / $totalQ) * 100;
                        $pctUnanswered = ($summary['total_unanswered'] / $totalQ) * 100;
                    @endphp
                    @if($pctCorrect > 0)
                        <div class="bg-emerald-500 h-full transition-all" style="width: {{ $pctCorrect }}%" title="Benar: {{ $summary['total_correct'] }}"></div>
                    @endif
                    @if($pctIncorrect > 0)
                        <div class="bg-rose-500 h-full transition-all" style="width: {{ $pctIncorrect }}%" title="Salah: {{ $summary['total_incorrect'] }}"></div>
                    @endif
                    @if($pctUnanswered > 0)
                        <div class="bg-slate-300 h-full transition-all" style="width: {{ $pctUnanswered }}%" title="Kosong: {{ $summary['total_unanswered'] }}"></div>
                    @endif
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4 pt-3 border-t border-slate-100 text-center">
                    <div class="flex items-center justify-center gap-2 text-xs">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 shrink-0"></span>
                        <span class="font-bold text-slate-800">{{ $summary['total_correct'] }} Benar</span>
                        <span class="text-slate-500 font-mono">({{ round($pctCorrect, 1) }}%)</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 text-xs">
                        <span class="w-3 h-3 rounded-full bg-rose-500 shrink-0"></span>
                        <span class="font-bold text-slate-800">{{ $summary['total_incorrect'] }} Salah</span>
                        <span class="text-slate-500 font-mono">({{ round($pctIncorrect, 1) }}%)</span>
                    </div>
                    <div class="flex items-center justify-center gap-2 text-xs">
                        <span class="w-3 h-3 rounded-full bg-slate-300 shrink-0"></span>
                        <span class="font-bold text-slate-800">{{ $summary['total_unanswered'] }} Kosong</span>
                        <span class="text-slate-500 font-mono">({{ round($pctUnanswered, 1) }}%)</span>
                    </div>
                </div>
            </div>            {{-- 3. GABUNGAN: 1 Card, 1 Tabel Komprehensif Evaluasi Performa, Tipe Soal & Rencana Tindak Lanjut --}}
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
                {{-- Header Card --}}
                <div class="px-6 py-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-white via-blue-50/20 to-white">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="p-1.5 rounded-lg bg-blue-100 text-blue-700">
                                <x-radix-icon name="bar-chart" class="w-4 h-4" />
                            </span>
                            <h2 class="text-base sm:text-lg font-bold text-slate-900 font-display">
                                Pemetaan Capaian Materi, Tipe Soal &amp; Rencana Tindak Lanjut Belajar
                            </h2>
                        </div>
                        <p class="text-xs text-slate-500 max-w-3xl">
                            Evaluasi terpadu per sub-tes, ketepatan menjawab pada setiap variasi tipe soal, serta diagnosis kelemahan untuk memandu peningkatan belajar mandiri siswa.
                        </p>
                    </div>
                    <div class="flex items-center gap-2 shrink-0">
                        <span class="px-3 py-1.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-bold border border-slate-200">
                            {{ count($sectionsData) }} Sub-Tes Teruji
                        </span>
                    </div>
                </div>

                {{-- Mini Bar Ringkasan Global Tipe Soal di dalam Card --}}
                @if(!empty($questionTypesAnalysis))
                    <div class="px-6 py-3 bg-slate-50/70 border-b border-slate-200/70 flex flex-wrap items-center gap-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 font-display mr-1 flex items-center gap-1">
                            <x-radix-icon name="layers" class="w-3.5 h-3.5" />
                            Ringkasan Tipe Soal Global:
                        </span>
                        @foreach($questionTypesAnalysis as $qt)
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-white border border-slate-200 text-xs shadow-2xs">
                                <span class="font-medium text-slate-700">{{ $qt['name'] }}:</span>
                                <span class="font-mono font-bold text-slate-900">{{ $qt['correct'] }}/{{ $qt['total'] }}</span>
                                <span class="font-mono font-bold text-[11px] {{ $qt['accuracy'] >= 80 ? 'text-emerald-700' : ($qt['accuracy'] >= 60 ? 'text-amber-700' : 'text-rose-700') }}">
                                    ({{ $qt['accuracy'] }}%)
                                </span>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Unified 1 Table --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead class="bg-slate-50/90 border-b border-slate-200 text-slate-600 font-bold uppercase tracking-wider font-display">
                            <tr>
                                <th class="py-3.5 px-5 w-[24%] min-w-[200px]">Sub-Tes &amp; Materi</th>
                                <th class="py-3.5 px-4 w-[20%] min-w-[170px]">Capaian &amp; Akurasi</th>
                                <th class="py-3.5 px-4 w-[22%] min-w-[190px]">Tipe Soal yang Diujikan</th>
                                <th class="py-3.5 px-5 w-[26%] min-w-[240px]">Diagnosis &amp; Rencana Tindak Lanjut</th>
                                <th class="py-3.5 px-4 text-center w-[8%] min-w-[90px]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium">
                            @foreach($sectionsData as $sec)
                                <tr class="hover:bg-slate-50/70 transition-colors align-top">
                                    {{-- 1. Bagian / Materi --}}
                                    <td class="py-4 px-5">
                                        <div class="font-bold text-slate-900 text-sm font-display leading-snug">
                                            {{ $sec['title'] }}
                                        </div>
                                        <div class="mt-2">
                                            @if($sec['accuracy'] >= 80)
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200">
                                                    <x-radix-icon name="check" class="w-3 h-3" />
                                                    Sangat Kuat (Tuntas)
                                                </span>
                                            @elseif($sec['accuracy'] >= 60)
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 ring-1 ring-amber-200">
                                                    <x-radix-icon name="timer" class="w-3 h-3" />
                                                    Cukup (Perlu Latihan)
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 ring-1 ring-rose-200">
                                                    <x-radix-icon name="cross-2" class="w-3 h-3" />
                                                    Perlu Remedial
                                                </span>
                                            @endif
                                        </div>
                                        @if($sec['instructions'])
                                            <p class="text-[11px] text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                                {{ $sec['instructions'] }}
                                            </p>
                                        @endif
                                    </td>

                                    {{-- 2. Capaian & Akurasi --}}
                                    <td class="py-4 px-4">
                                        <div class="flex items-baseline justify-between mb-1">
                                            <span class="text-base font-black font-display text-slate-900 tabular-nums">
                                                {{ $sec['accuracy'] }}%
                                            </span>
                                            <span class="text-[11px] text-slate-500 font-mono">
                                                {{ $sec['earned_points'] }}/{{ $sec['total_points'] }} Poin
                                            </span>
                                        </div>
                                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden mb-2.5">
                                            <div class="h-full rounded-full transition-all duration-500 {{ $sec['accuracy'] >= 80 ? 'bg-emerald-500' : ($sec['accuracy'] >= 60 ? 'bg-amber-500' : 'bg-rose-500') }}"
                                                 style="width: {{ min(max($sec['accuracy'], 0), 100) }}%"></div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-1 text-[11px] pt-1 border-t border-slate-100 text-center font-mono">
                                            <span class="text-emerald-700 font-bold bg-emerald-50/60 py-0.5 rounded" title="Benar">
                                                {{ $sec['correct'] }} B
                                            </span>
                                            <span class="text-rose-700 font-bold bg-rose-50/60 py-0.5 rounded" title="Salah">
                                                {{ $sec['incorrect'] }} S
                                            </span>
                                            <span class="text-slate-500 font-bold bg-slate-100/70 py-0.5 rounded" title="Kosong">
                                                {{ $sec['unanswered'] }} K
                                            </span>
                                        </div>
                                        <div class="text-[10px] text-slate-400 mt-1 text-center font-sans">
                                            Total: {{ $sec['total_questions'] }} butir soal
                                        </div>
                                    </td>

                                    {{-- 3. Tipe Soal yang Diujikan --}}
                                    <td class="py-4 px-4">
                                        <div class="space-y-1.5">
                                            @if(!empty($sec['type_breakdown']))
                                                @foreach($sec['type_breakdown'] as $tb)
                                                    <div class="flex items-center justify-between text-[11px] bg-slate-50/80 hover:bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200/60 transition">
                                                        <span class="font-medium text-slate-700 truncate mr-2" title="{{ $tb['label'] }}">
                                                            {{ $tb['label'] }}
                                                        </span>
                                                        <div class="flex items-center gap-1.5 shrink-0">
                                                            <span class="font-mono text-slate-500 text-[10px]">
                                                                {{ $tb['correct'] }}/{{ $tb['total'] }}
                                                            </span>
                                                            <span class="font-mono font-bold px-1.5 py-0.5 rounded text-[10px] {{ $tb['accuracy'] >= 80 ? 'bg-emerald-100 text-emerald-800' : ($tb['accuracy'] >= 60 ? 'bg-amber-100 text-amber-800' : 'bg-rose-100 text-rose-800') }}">
                                                                {{ $tb['accuracy'] }}%
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-xs text-slate-400 italic">Pilihan Ganda</span>
                                            @endif
                                        </div>
                                    </td>

                                    {{-- 4. Diagnosis & Rencana Tindak Lanjut --}}
                                    <td class="py-4 px-5">
                                        <div class="mb-1.5">
                                            @if(($sec['priority'] ?? '') === 'Tinggi')
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase bg-rose-50 text-rose-700 ring-1 ring-rose-200">
                                                    <x-radix-icon name="lightning-bolt" class="w-3 h-3 text-rose-600" />
                                                    Prioritas: Segera Perbaiki
                                                </span>
                                            @elseif(($sec['priority'] ?? '') === 'Sedang')
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase bg-amber-50 text-amber-700 ring-1 ring-amber-200">
                                                    <x-radix-icon name="timer" class="w-3 h-3 text-amber-600" />
                                                    Prioritas: Sedang
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-extrabold uppercase bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200">
                                                    <x-radix-icon name="check-circled" class="w-3 h-3 text-emerald-600" />
                                                    Prioritas: Pemantapan
                                                </span>
                                            @endif
                                        </div>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            {{ $sec['advice'] ?? 'Tingkatkan latihan mandiri dan telaah kembali pembahasan butir soal.' }}
                                        </p>
                                    </td>

                                    {{-- 5. Tombol Aksi --}}
                                    <td class="py-4 px-4 text-center">
                                        <a href="{{ route('exam.result', $session->uuid) }}"
                                           class="inline-flex items-center justify-center gap-1 px-3 py-2 rounded-xl bg-blue-50 hover:bg-blue-600 text-blue-700 hover:text-white border border-blue-200 hover:border-blue-600 text-xs font-bold transition-all shadow-2xs group whitespace-nowrap"
                                           title="Buka Pembahasan Lengkap">
                                            <x-radix-icon name="file-text" class="w-3.5 h-3.5 group-hover:scale-110 transition-transform" />
                                            <span>Bahas</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- 6. Bottom Banner / CTA --}}
            <div class="rounded-2xl bg-gradient-to-r from-blue-700 via-blue-600 to-indigo-700 p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-md">
                <div>
                    <h3 class="text-lg sm:text-xl font-bold font-display">Siap Memperbaiki dan Mendalami Pembahasan?</h3>
                    <p class="text-xs sm:text-sm text-blue-100 mt-1 max-w-xl">
                        Buka lembar ulasan pembahasan lengkap untuk menelaah kunci jawaban sistem, wacana, dan tips pengerjaan butir per butir soal.
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('exam.result', $session->uuid) }}"
                       class="px-5 py-2.5 rounded-xl bg-white hover:bg-blue-50 text-blue-700 text-xs font-bold shadow-sm transition active:scale-95">
                        Buka Pembahasan Soal
                    </a>
                    <a href="{{ route('exam.history') }}"
                       class="px-4 py-2.5 rounded-xl bg-blue-800/60 hover:bg-blue-800 text-white text-xs font-bold border border-white/20 transition">
                        Riwayat Ujian
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
