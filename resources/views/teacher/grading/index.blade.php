<x-layouts.app>
    <x-slot:title>Panel Koreksi & Penilaian - {{ $assessment->title }}</x-slot:title>

    <div class="space-y-6 pb-16">
        <!-- Top Navigation Bar & Meta -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('assessments.show', $assessment) }}" class="p-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer" title="Kembali ke Detail Asesmen">
                    <x-radix-icon name="arrow-left" class="w-4 h-4" />
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-purple-3 text-purple-11 border border-purple-6/50">
                            Teacher Grading & Review
                        </span>
                        <span class="text-xs font-mono text-gray-11">
                            {{ $assessment->subject?->name ?? 'Mata Pelajaran Umum' }} • Kelas {{ $assessment->grade_level ?? '-' }}
                        </span>
                    </div>
                    <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight mt-1">
                        Koreksi &amp; Penilaian: {{ $assessment->title }}
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-2.5">
                <a href="{{ route('assessments.analytics', $assessment) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="bar-chart" class="w-4 h-4" />
                    <span>Analisis & Rekap Nilai</span>
                </a>
                <a href="{{ route('assessments.proctoring', $assessment) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-gray-12 hover:bg-black text-white text-xs font-semibold transition-all shadow-xs cursor-pointer">
                    <x-radix-icon name="dashboard" class="w-4 h-4" />
                    <span>Ruang Pengawasan</span>
                </a>
                <a href="{{ route('assessments.show', $assessment) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-gray-6 hover:bg-gray-2 text-gray-12 text-xs font-semibold transition-colors shadow-2xs cursor-pointer">
                    <x-radix-icon name="info-circled" class="w-4 h-4" />
                    <span>Detail Ujian</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 rounded-xl bg-green-3 border border-green-6/50 text-green-11 text-sm font-semibold flex items-center justify-between shadow-2xs">
                <div class="flex items-center gap-2.5">
                    <x-radix-icon name="check-circled" class="w-5 h-5" />
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" @click="$el.parentElement.remove()" class="text-green-9 hover:text-green-11 cursor-pointer">
                    <x-radix-icon name="cross-2" class="w-4 h-4" />
                </button>
            </div>
        @endif

        <!-- Summary Metric Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3.5">
            <!-- Total Peserta Sesi -->
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1">
                <div class="flex items-center justify-between text-gray-10">
                    <span class="text-xs font-semibold">Total Sesi Peserta</span>
                    <x-radix-icon name="person" class="w-4 h-4 text-gray-9" />
                </div>
                <p class="text-2xl font-extrabold font-mono text-gray-12">{{ count($filteredList) }}</p>
                <span class="text-[11px] text-gray-9 font-medium block">
                    {{ $hasEssay ? $essayCount.' butir soal essay' : 'Soal objektif otomatis' }}
                </span>
            </div>

            <!-- Perlu Dikoreksi Segera -->
            <div class="bg-white p-4 rounded-2xl border {{ $needsReviewCount > 0 ? 'border-amber-6/80 bg-amber-1/30 ring-1 ring-amber-5' : 'border-gray-6' }} shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1">
                <div class="flex items-center justify-between {{ $needsReviewCount > 0 ? 'text-amber-11' : 'text-gray-10' }}">
                    <span class="text-xs font-semibold">Perlu Dikoreksi</span>
                    <x-radix-icon name="pencil-2" class="w-4 h-4" />
                </div>
                <p class="text-2xl font-extrabold font-mono {{ $needsReviewCount > 0 ? 'text-amber-12' : 'text-gray-12' }}">
                    {{ $needsReviewCount }}
                </p>
                <span class="text-[11px] {{ $needsReviewCount > 0 ? 'text-amber-11 font-semibold' : 'text-gray-9' }} block">
                    {{ $needsReviewCount > 0 ? 'Menunggu koreksi essay' : 'Semua telah dikoreksi' }}
                </span>
            </div>

            <!-- Sedang Mengerjakan -->
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1">
                <div class="flex items-center justify-between text-gray-10">
                    <span class="text-xs font-semibold">Sedang Mengerjakan</span>
                    <x-radix-icon name="timer" class="w-4 h-4 text-gray-9" />
                </div>
                <p class="text-2xl font-extrabold font-mono text-gray-12">{{ $inProgressCount }}</p>
                <span class="text-[11px] text-gray-9 font-medium block">Sesi aktif di browser</span>
            </div>

            <!-- Rata-rata Nilai & KKM -->
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1">
                <div class="flex items-center justify-between text-gray-10">
                    <span class="text-xs font-semibold">Rata-rata Skor Selesai</span>
                    <x-radix-icon name="bar-chart" class="w-4 h-4 text-gray-9" />
                </div>
                <div class="flex items-baseline gap-2">
                    <p class="text-2xl font-extrabold font-mono text-gray-12">{{ $avgScore }}</p>
                    <span class="text-[11px] font-mono text-gray-9">/ 100</span>
                </div>
                <span class="text-[11px] text-gray-9 font-medium block">
                    {{ $kkmEnabled ? "Target KKM: {$kkm} ({$passRate}% Tuntas)" : 'Tanpa KKM' }}
                </span>
            </div>
        </div>

        <!-- Filter Tabs & Search -->
        <div class="bg-white p-3 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex flex-col md:flex-row md:items-center justify-between gap-3">
            <!-- Tabs -->
            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0">
                <a href="{{ route('assessments.grading', array_merge(['assessment' => $assessment->id], request()->except('tab'))) }}"
                   class="px-3.5 py-1.5 rounded-xl text-xs font-semibold transition-colors cursor-pointer {{ $tab === 'all' ? 'bg-gray-12 text-white shadow-2xs' : 'bg-gray-2 hover:bg-gray-3 text-gray-11' }}">
                    Semua Peserta ({{ count($filteredList) }})
                </a>
                <a href="{{ route('assessments.grading', array_merge(['assessment' => $assessment->id, 'tab' => 'needs_review'], request()->except('tab'))) }}"
                   class="px-3.5 py-1.5 rounded-xl text-xs font-semibold transition-colors cursor-pointer flex items-center gap-1.5 {{ $tab === 'needs_review' ? 'bg-amber-9 text-white shadow-2xs' : 'bg-gray-2 hover:bg-gray-3 text-gray-11' }}">
                    <span>Perlu Dikoreksi</span>
                    @if($needsReviewCount > 0)
                        <span class="px-1.5 py-0.2 rounded-full text-[10px] font-extrabold {{ $tab === 'needs_review' ? 'bg-white text-amber-10' : 'bg-amber-4 text-amber-12' }}">
                            {{ $needsReviewCount }}
                        </span>
                    @endif
                </a>
                <a href="{{ route('assessments.grading', array_merge(['assessment' => $assessment->id, 'tab' => 'in_progress'], request()->except('tab'))) }}"
                   class="px-3.5 py-1.5 rounded-xl text-xs font-semibold transition-colors cursor-pointer {{ $tab === 'in_progress' ? 'bg-blue-9 text-white shadow-2xs' : 'bg-gray-2 hover:bg-gray-3 text-gray-11' }}">
                    Sedang Ujian ({{ $inProgressCount }})
                </a>
                <a href="{{ route('assessments.grading', array_merge(['assessment' => $assessment->id, 'tab' => 'final_released'], request()->except('tab'))) }}"
                   class="px-3.5 py-1.5 rounded-xl text-xs font-semibold transition-colors cursor-pointer {{ $tab === 'final_released' ? 'bg-green-9 text-white shadow-2xs' : 'bg-gray-2 hover:bg-gray-3 text-gray-11' }}">
                    Selesai & Final ({{ $finalCount }})
                </a>
            </div>

            <!-- Search input -->
            <form method="GET" action="{{ route('assessments.grading', $assessment) }}" class="relative min-w-[240px]">
                <input type="hidden" name="tab" value="{{ $tab }}">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-9 pointer-events-none">
                    <x-radix-icon name="magnifying-glass" class="w-3.5 h-3.5" />
                </span>
                <input type="text" name="search" value="{{ $search }}"
                       placeholder="Cari nama peserta..."
                       class="w-full rounded-xl border border-gray-7 bg-white pl-8 pr-3 py-1.5 text-xs text-gray-12 placeholder:text-gray-8 transition-colors focus:border-purple-8 focus:ring-1 focus:ring-purple-8 outline-none">
            </form>
        </div>

        <!-- Peserta Table -->
        <div class="bg-white border border-gray-6 rounded-2xl shadow-[0_1px_3px_rgba(0,0,0,0.03)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-gray-6 bg-gray-2/60 text-gray-10 font-bold uppercase tracking-wider text-[10px]">
                            <th class="py-3.5 px-5">Nama Siswa</th>
                            <th class="py-3.5 px-4">Status Pengerjaan</th>
                            <th class="py-3.5 px-4 text-center">Skor Diperoleh</th>
                            <th class="py-3.5 px-4 text-center">Status KKM</th>
                            <th class="py-3.5 px-4">Waktu Selesai</th>
                            <th class="py-3.5 px-5 text-right">Aksi Penilaian</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-5">
                        @forelse($filteredList as $item)
                            @php
                                $s = $item['session'];
                                $student = $s->user;
                            @endphp
                            <tr class="hover:bg-gray-2/40 transition-colors">
                                <!-- Student Info -->
                                <td class="py-3.5 px-5">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-xl bg-purple-2 border border-purple-5 text-purple-11 flex items-center justify-center font-bold text-xs shrink-0">
                                            {{ strtoupper(substr($student?->name ?? 'S', 0, 1)) }}
                                        </div>
                                        <div>
                                            <span class="font-bold text-gray-12 text-xs block">{{ $student?->name ?? 'Siswa Tanpa Nama' }}</span>
                                            <span class="text-[11px] text-gray-9 font-mono">{{ $student?->email ?? '-' }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Status Pengerjaan -->
                                <td class="py-3.5 px-4">
                                    @if($item['category'] === 'in_progress')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-3 text-blue-11 border border-blue-6">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-9 animate-pulse"></span>
                                            Sedang Ujian
                                        </span>
                                    @elseif($item['category'] === 'needs_review')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-amber-3 text-amber-12 border border-amber-6">
                                            <x-radix-icon name="pencil-2" class="w-3 h-3 text-amber-11" />
                                            Perlu Koreksi Essay
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-3 text-green-11 border border-green-6">
                                            <x-radix-icon name="check" class="w-3 h-3 text-green-11" />
                                            Nilai Final Diterbitkan
                                        </span>
                                    @endif
                                </td>

                                <!-- Skor -->
                                <td class="py-3.5 px-4 text-center">
                                    @if($s->isCompleted())
                                        <div class="font-mono">
                                            <span class="font-extrabold text-sm text-gray-12">{{ $item['score_pct'] }}</span>
                                            <span class="text-[11px] text-gray-9">/ 100</span>
                                        </div>
                                        <span class="text-[10px] text-gray-9 block font-mono">({{ (float)$s->score }} / {{ (float)$s->max_score }} Poin)</span>
                                    @else
                                        <span class="text-gray-9 text-xs">-</span>
                                    @endif
                                </td>

                                <!-- Status KKM -->
                                <td class="py-3.5 px-4 text-center">
                                    @if($s->isCompleted())
                                        <span class="px-2 py-0.5 rounded-md font-bold text-[10px] {{ $item['is_passed'] ? 'bg-green-3 text-green-11 border border-green-6' : 'bg-red-3 text-red-11 border border-red-6' }}">
                                            {{ $item['is_passed'] ? 'TUNTAS' : 'REMEDIAL' }}
                                        </span>
                                    @else
                                        <span class="text-gray-8 text-[11px]">Belum selesai</span>
                                    @endif
                                </td>

                                <!-- Waktu Selesai -->
                                <td class="py-3.5 px-4 text-gray-11 text-[11px]">
                                    @if($s->completed_at)
                                        <span class="font-medium text-gray-12 block">{{ $s->completed_at->translatedFormat('d M Y, H:i') }}</span>
                                        <span class="text-[10px] text-gray-9">IP: {{ $s->submitted_ip ?? $s->ip_address ?? '-' }}</span>
                                    @elseif($s->started_at)
                                        <span class="text-gray-9 italic">Mulai: {{ $s->started_at->translatedFormat('H:i') }} WIB</span>
                                    @else
                                        <span class="text-gray-8">-</span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="py-3.5 px-5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        @if($hasEssay && $s->isCompleted())
                                            <a href="{{ route('assessments.grading.session', ['assessment' => $assessment->id, 'session' => $s->uuid]) }}"
                                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold transition-colors cursor-pointer {{ $item['category'] === 'needs_review' ? 'bg-amber-9 hover:bg-amber-10 text-white shadow-2xs' : 'bg-purple-3 hover:bg-purple-4 text-purple-11 border border-purple-6/50' }}">
                                                <x-radix-icon name="pencil-2" class="w-3.5 h-3.5" />
                                                <span>{{ $item['category'] === 'needs_review' ? 'Koreksi Essay' : 'Edit Koreksi' }}</span>
                                            </a>
                                        @endif

                                        @if($s->isCompleted())
                                            <a href="{{ route('exam.result', ['session' => $s->uuid]) }}"
                                               target="_blank"
                                               class="p-1.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer"
                                               title="Buka Lembar Rekap Hasil Siswa">
                                                <x-radix-icon name="external-link" class="w-4 h-4" />
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-gray-11">
                                    <div class="max-w-sm mx-auto space-y-2">
                                        <x-radix-icon name="reader" class="w-8 h-8 text-gray-8 mx-auto" />
                                        <p class="font-semibold text-sm text-gray-12">Tidak ada data peserta ujian</p>
                                        <p class="text-xs text-gray-9">
                                            {{ $search !== '' ? 'Tidak ditemukan peserta dengan kata kunci pencarian tersebut.' : 'Belum ada siswa yang mengerjakan asesmen ini.' }}
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
