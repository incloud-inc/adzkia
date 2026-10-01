<x-layouts.app>
    <x-slot:title>Riwayat Ujian &amp; Hasil Belajar Siswa</x-slot:title>

    <div class="max-w-6xl mx-auto space-y-6 pb-12">
        <!-- Page Header -->
        <header class="bg-white border border-gray-6 rounded-2xl p-6 sm:p-8 shadow-xs relative overflow-hidden">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 relative z-10">
                <div>
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-blue-3 text-blue-11 border border-blue-6/60">
                            CBT Engine
                        </span>
                        <span class="text-xs text-gray-11 font-medium">
                            • Evaluasi Mandiri
                        </span>
                    </div>
                    <h1 class="font-display font-black text-2xl sm:text-3xl text-gray-12 tracking-tight">
                        Riwayat &amp; Hasil Ujian Siswa
                    </h1>
                    <p class="font-sans text-xs sm:text-sm text-gray-11 mt-1 max-w-xl">
                        Daftar lengkap ujian berbasis komputer (CBT) yang pernah Anda ikuti beserta status, perolehan nilai, dan pembahasan butir soal.
                    </p>
                </div>

                <a href="{{ route('assessments.index') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-blue-9 hover:bg-blue-10 text-white text-xs font-bold transition-all duration-200 shadow-xs active:scale-[0.98] shrink-0">
                    <x-radix-icon name="pencil1" class="w-4 h-4" />
                    <span>Ikuti Ujian Baru</span>
                </a>
            </div>
        </header>

        <!-- Metric Summary Cards -->
        <section class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <article class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-blue-7 transition-all">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Total Sesi Ujian</span>
                    <div class="w-9 h-9 rounded-xl bg-blue-3 text-blue-11 flex items-center justify-center">
                        <x-radix-icon name="file-text" class="w-4 h-4" />
                    </div>
                </div>
                <div class="font-display font-black text-3xl text-gray-12">{{ $totalSessions }}</div>
                <div class="font-sans text-xs text-gray-11 mt-1">Seluruh percobaan ujian</div>
            </article>

            <article class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-green-7 transition-all">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Ujian Selesai</span>
                    <div class="w-9 h-9 rounded-xl bg-green-3 text-green-11 flex items-center justify-center">
                        <x-radix-icon name="check-circled" class="w-4 h-4" />
                    </div>
                </div>
                <div class="font-display font-black text-3xl text-green-11">{{ $completedSessions }}</div>
                <div class="font-sans text-xs text-green-11 font-medium mt-1">Sudah dinilai &amp; tuntas</div>
            </article>

            <article class="bg-white p-5 rounded-2xl border border-gray-6 shadow-xs hover:border-amber-7 transition-all">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-sans text-xs font-semibold text-gray-11 uppercase tracking-wider">Sedang Berlangsung</span>
                    <div class="w-9 h-9 rounded-xl bg-amber-3 text-amber-11 flex items-center justify-center">
                        <x-radix-icon name="timer" class="w-4 h-4" />
                    </div>
                </div>
                <div class="font-display font-black text-3xl text-amber-11">{{ $inProgressSessions }}</div>
                <div class="font-sans text-xs text-amber-11 font-medium mt-1">Dapat dilanjutkan</div>
            </article>
        </section>

        <!-- Filters & Search Toolbar -->
        <div class="bg-white border border-gray-6 rounded-2xl p-4 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar pb-1 md:pb-0">
                <a href="{{ route('exam.history') }}" 
                   class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all shrink-0 {{ !request('filter') ? 'bg-blue-9 text-white shadow-xs' : 'bg-gray-3 text-gray-11 hover:text-gray-12 hover:bg-gray-4' }}">
                    Semua ({{ $totalSessions }})
                </a>
                <a href="{{ route('exam.history', ['filter' => 'completed']) }}" 
                   class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all shrink-0 {{ request('filter') === 'completed' ? 'bg-green-9 text-white shadow-xs' : 'bg-gray-3 text-gray-11 hover:text-gray-12 hover:bg-gray-4' }}">
                    Telah Selesai ({{ $completedSessions }})
                </a>
                <a href="{{ route('exam.history', ['filter' => 'in_progress']) }}" 
                   class="px-3 py-1.5 rounded-xl text-xs font-semibold transition-all shrink-0 {{ request('filter') === 'in_progress' ? 'bg-amber-9 text-white shadow-xs' : 'bg-gray-3 text-gray-11 hover:text-gray-12 hover:bg-gray-4' }}">
                    Sedang Berlangsung ({{ $inProgressSessions }})
                </a>
            </div>

            <form method="GET" action="{{ route('exam.history') }}" class="flex items-center gap-2 m-0 w-full md:w-auto">
                @if(request('filter'))
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                @endif
                <div class="relative w-full md:w-64">
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Cari nama ujian..." 
                           class="w-full text-xs font-medium pl-8 pr-3 py-2 rounded-xl border border-gray-6 focus:border-blue-8 focus:ring-1 focus:ring-blue-8 outline-none bg-gray-1 focus:bg-white transition-all">
                    <x-radix-icon name="magnifying-glass" class="w-4 h-4 text-gray-9 absolute left-2.5 top-1/2 -translate-y-1/2 pointer-events-none" />
                </div>
                @if(request('search'))
                    <a href="{{ route('exam.history', request('filter') ? ['filter' => request('filter')] : []) }}" class="p-2 rounded-xl border border-gray-6 text-gray-11 hover:bg-gray-3 transition-colors shrink-0" title="Reset Pencarian">
                        <x-radix-icon name="cross-2" class="w-4 h-4" />
                    </a>
                @endif
            </form>
        </div>

        <!-- Exam Sessions Table / Cards -->
        <div class="bg-white border border-gray-6 rounded-2xl shadow-xs overflow-hidden">
            @if($sessions->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="border-b border-gray-6 bg-gray-2/50 text-gray-11 uppercase tracking-wider font-semibold">
                                <th class="py-3.5 px-5">Nama Asesmen</th>
                                <th class="py-3.5 px-4">Waktu Mulai</th>
                                <th class="py-3.5 px-4 text-center">Status</th>
                                <th class="py-3.5 px-4 text-center">Nilai Akhir</th>
                                <th class="py-3.5 px-5 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-5">
                            @foreach($sessions as $session)
                                <tr class="hover:bg-gray-2/40 transition-colors">
                                    <td class="py-4 px-5">
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase bg-blue-3 text-blue-11 border border-blue-6/50">
                                                {{ $session->assessment?->subject?->name ?? 'Umum' }}
                                            </span>
                                            <span class="text-[11px] text-gray-9">
                                                {{ $session->assessment?->grade_level ? 'Kelas ' . $session->assessment->grade_level : '' }}
                                            </span>
                                        </div>
                                        <h3 class="font-display font-bold text-sm text-gray-12">
                                            {{ $session->assessment?->title ?? 'Ujian CBT' }}
                                        </h3>
                                    </td>
                                    <td class="py-4 px-4 text-gray-11 font-medium whitespace-nowrap">
                                        <div>{{ $session->started_at ? $session->started_at->translatedFormat('d M Y, H:i') : '-' }}</div>
                                        @if($session->completed_at)
                                            <div class="text-[11px] text-gray-9 mt-0.5">Selesai: {{ $session->completed_at->format('H:i') }}</div>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-center whitespace-nowrap">
                                        @if($session->isCompleted())
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-3 text-green-11 border border-green-6/50">
                                                <x-radix-icon name="check" class="w-3.5 h-3.5 text-green-11" />
                                                <span>Selesai</span>
                                            </span>
                                        @elseif($session->isExpired())
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-amber-3 text-amber-11 border border-amber-6/50">
                                                <x-radix-icon name="timer" class="w-3.5 h-3.5 text-amber-11" />
                                                <span>Waktu Habis</span>
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-3 text-blue-11 border border-blue-6/50">
                                                <span class="w-2 h-2 rounded-full bg-blue-9 animate-pulse"></span>
                                                <span>Aktif</span>
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-center whitespace-nowrap">
                                        @if($session->isCompleted() || $session->isExpired())
                                            <div class="font-display font-bold text-base text-gray-12">
                                                {{ $session->score !== null ? number_format($session->score, 1) : '-' }}
                                            </div>
                                            <div class="text-[10px] text-gray-9">Skor Resmi</div>
                                        @else
                                            <span class="text-xs text-gray-9 italic">Sedang berjalan</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-5 text-right whitespace-nowrap">
                                        @if($session->isCompleted() || $session->isExpired())
                                            <div class="flex items-center justify-end gap-2">
                                                <a href="{{ route('exam.analysis', $session->uuid) }}" 
                                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-blue-50 hover:bg-blue-100 text-blue-700 border border-blue-200 transition-colors shadow-2xs">
                                                    <x-radix-icon name="bar-chart" class="w-3.5 h-3.5" />
                                                    <span>Analisa Ujian</span>
                                                </a>
                                                <a href="{{ route('exam.result', $session->uuid) }}" 
                                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200 transition-colors shadow-2xs">
                                                    <x-radix-icon name="eye-open" class="w-3.5 h-3.5" />
                                                    <span>Lihat Hasil</span>
                                                </a>
                                            </div>
                                        @else
                                            <a href="{{ route('exam.workspace', $session->uuid) }}" 
                                               class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-bold bg-blue-9 hover:bg-blue-10 text-white transition-all shadow-xs active:scale-95">
                                                <x-radix-icon name="play" class="w-3.5 h-3.5" />
                                                <span>Lanjutkan Ujian</span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($sessions->hasPages())
                    <div class="p-4 border-t border-gray-6">
                        {{ $sessions->links() }}
                    </div>
                @endif
            @else
                <div class="text-center py-16 px-4">
                    <div class="w-14 h-14 bg-blue-3 text-blue-11 rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-xs">
                        <x-radix-icon name="file-text" class="w-6 h-6" />
                    </div>
                    <h3 class="font-display font-bold text-base text-gray-12">Belum ada riwayat pengerjaan ujian</h3>
                    <p class="font-sans text-xs text-gray-11 mt-1 max-w-sm mx-auto">
                        Anda belum pernah memulai atau menyelesaikan ujian di sistem. Pilih ujian yang tersedia untuk memulai evaluasi belajar mandiri.
                    </p>
                    <a href="{{ route('assessments.index') }}" class="mt-4 inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-9 hover:bg-blue-10 text-white text-xs font-bold transition-all shadow-xs">
                        <span>Pilih Ujian Sekarang</span>
                        <x-radix-icon name="arrow-right" class="w-4 h-4" />
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
