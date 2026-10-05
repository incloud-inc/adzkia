<x-layouts.app>
    <x-slot:title>Pratinjau Matriks Rekap Nilai — {{ $assessment->title }}</x-slot:title>

    <div class="max-w-[1600px] mx-auto space-y-6 pb-24 px-4 sm:px-6" x-data="{ searchQuery: '', selectedSection: 'all' }">

        <!-- Top Header & Breadcrumb -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 pt-2">
            <div class="space-y-1.5">
                <div class="flex items-center gap-2 text-xs text-gray-10">
                    <a href="{{ route('assessments.index') }}" class="hover:text-gray-12 transition">Daftar Asesmen</a>
                    <span class="text-gray-6">/</span>
                    <a href="{{ route('assessments.analytics', $assessment) }}" class="hover:text-gray-12 transition">Analisis & Rekap</a>
                    <span class="text-gray-6">/</span>
                    <span class="font-semibold text-gray-12">Pratinjau Matriks Excel</span>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <h1 class="text-2xl font-display font-extrabold text-gray-12 tracking-tight">
                        {{ $assessment->title }}
                    </h1>
                    <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-indigo-2 text-indigo-11 border border-indigo-5">
                        {{ $assessment->subject?->name ?? 'Umum' }} • Kelas {{ $assessment->grade_level ?? '-' }}
                    </span>
                    @if($isOwner)
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-0.5 rounded-full bg-purple-50 text-purple-700 border border-purple-200">
                            <x-radix-icon name="globe" class="w-3.5 h-3.5" />
                            Akses Owner (Seluruh Tenant)
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-2.5 py-0.5 rounded-full bg-blue-50 text-blue-700 border border-blue-200">
                            <x-radix-icon name="home" class="w-3.5 h-3.5" />
                            Tenant: {{ $currentTenant?->name ?? 'Lokal' }}
                        </span>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center gap-2.5">
                <a href="{{ route('assessments.analytics', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-2 text-xs font-semibold text-gray-12 transition shadow-2xs">
                    <x-radix-icon name="bar-chart" class="w-4 h-4 text-indigo-10" />
                    <span>Statistik & Butir Soal</span>
                </a>
                <a href="{{ route('assessments.grading', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-2 text-xs font-semibold text-gray-12 transition shadow-2xs">
                    <x-radix-icon name="pencil-2" class="w-4 h-4 text-amber-10" />
                    <span>Koreksi Guru</span>
                </a>
                <a href="{{ route('assessments.analytics.export', $assessment) }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 active:scale-95 text-xs font-semibold text-white transition shadow-sm ring-2 ring-emerald-600/20">
                    <x-radix-icon name="download" class="w-4 h-4" />
                    <span>Unduh Excel (.xlsx)</span>
                </a>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- SUMMARY STATISTIC CARDS & LEGEND                               -->
        <!-- ============================================================== -->
        <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-6 gap-3.5">
            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Total Peserta</span>
                <p class="text-2xl font-extrabold text-gray-12 mt-1 font-mono">{{ $matrixData['total_participants'] }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">Siswa terdata</span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Total Section</span>
                <p class="text-2xl font-extrabold text-indigo-11 mt-1 font-mono">{{ count($matrixData['sections']) }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">Bagian ujian</span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Total Butir Soal</span>
                <p class="text-2xl font-extrabold text-gray-12 mt-1 font-mono">{{ $matrixData['total_questions'] }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">Kolom soal</span>
            </div>

            <div class="p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Skor Tertinggi</span>
                @php
                    $highestScore = !empty($matrixData['rows']) ? max(array_column($matrixData['rows'], 'score')) : 0;
                @endphp
                <p class="text-2xl font-extrabold text-emerald-11 mt-1 font-mono">{{ $highestScore }}</p>
                <span class="text-[11px] text-gray-9 mt-0.5 block">Peringkat 1</span>
            </div>

            <!-- Legend Info Card (Spans 2 cols on desktop) -->
            <div class="col-span-2 p-4 rounded-2xl border border-gray-6 bg-white shadow-2xs flex flex-col justify-between">
                <span class="text-[11px] font-semibold text-gray-10 block uppercase tracking-wider">Keterangan Format Warna</span>
                <div class="grid grid-cols-3 gap-2 mt-2">
                    <div class="flex items-center gap-1.5 px-2 py-1 rounded-lg bg-emerald-50 border border-emerald-200 text-[11px] font-semibold text-emerald-800">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 shrink-0"></span>
                        <span class="truncate">Benar (Poin)</span>
                    </div>
                    <div class="flex items-center gap-1.5 px-2 py-1 rounded-lg bg-amber-50 border border-amber-200 text-[11px] font-semibold text-amber-800">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 shrink-0"></span>
                        <span class="truncate">Salah (Poin)</span>
                    </div>
                    <div class="flex items-center gap-1.5 px-2 py-1 rounded-lg bg-gray-100 border border-gray-300 text-[11px] font-semibold text-gray-700">
                        <span class="w-2.5 h-2.5 rounded-full bg-gray-400 shrink-0"></span>
                        <span class="truncate">Kosong (0)</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter & Search Bar -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-3 p-3 bg-white rounded-2xl border border-gray-6 shadow-2xs">
            <div class="relative w-full sm:w-80">
                <input 
                    type="text" 
                    x-model="searchQuery" 
                    placeholder="Cari nama siswa..." 
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-gray-6 focus:border-indigo-8 focus:ring-1 focus:ring-indigo-8 outline-none transition"
                >
                <div class="absolute left-3 top-2.5 text-gray-8 pointer-events-none">
                    <x-radix-icon name="magnifying-glass" class="w-4 h-4" />
                </div>
            </div>

            <div class="flex items-center gap-3 w-full sm:w-auto justify-end">
                <span class="text-xs text-gray-9 hidden sm:inline">Format pratinjau identik dengan file <strong>.xlsx</strong> hasil ekspor.</span>
                <a href="{{ route('assessments.analytics.export', $assessment) }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-xs font-semibold text-white transition shadow-xs shrink-0">
                    <x-radix-icon name="download" class="w-3.5 h-3.5" />
                    <span>Unduh Excel</span>
                </a>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- MATRIX TABLE VIEW                                              -->
        <!-- ============================================================== -->
        <div class="border border-gray-6 rounded-2xl bg-white shadow-2xs overflow-hidden">
            <div class="overflow-x-auto max-h-[750px] relative divide-y divide-gray-6">
                <table class="w-full text-xs text-left border-collapse select-text">
                    <!-- HEADER ROWS (4 Rows matching XLSX specification) -->
                    <thead class="sticky top-0 z-30 bg-[#1c5f2b] text-white shadow-xs">
                        <!-- ROW 1: Master Headers & Section Names -->
                        <tr class="divide-x divide-emerald-800 text-[11px] font-bold uppercase tracking-wider">
                            <th rowspan="4" class="sticky left-0 z-40 bg-[#1c5f2b] px-3 py-3 text-center w-12 min-w-[48px] border-r border-emerald-800 text-white">
                                Rank
                            </th>
                            <th rowspan="4" class="sticky left-[48px] z-40 bg-[#1c5f2b] px-4 py-3 min-w-[200px] border-r border-emerald-800 text-white">
                                Nama Siswa
                            </th>
                            <th rowspan="4" class="px-3 py-3 min-w-[140px] text-emerald-100 bg-[#2b8a3e]">
                                Nama Asesmen
                            </th>

                            @foreach($matrixData['sections'] as $sec)
                                @php
                                    $colSpan = 3 + $sec['question_count'];
                                @endphp
                                <th colspan="{{ $colSpan }}" class="px-3 py-2 text-center bg-[#51cf66] text-[#0f3816] font-extrabold border-b border-emerald-600">
                                    <div class="truncate max-w-xs mx-auto" title="{{ $sec['title'] }}">
                                        {{ $sec['title'] }}
                                    </div>
                                </th>
                            @endforeach

                            <th rowspan="4" class="px-4 py-3 text-center min-w-[100px] bg-[#1c5f2b] text-emerald-100 border-l border-emerald-800">
                                Total Skor
                            </th>
                        </tr>

                        <!-- ROW 2: Jumlah Soal -->
                        <tr class="divide-x divide-emerald-700 text-[10px] font-semibold text-emerald-950">
                            @foreach($matrixData['sections'] as $sec)
                                @php
                                    $colSpan = 3 + $sec['question_count'];
                                @endphp
                                <th colspan="{{ $colSpan }}" class="px-2 py-1.5 text-center bg-[#ebfbee] text-[#1c5f2b] font-bold border-b border-emerald-300">
                                    {{ $sec['question_count'] }} Soal
                                </th>
                            @endforeach
                        </tr>

                        <!-- ROW 3: Benar / Salah / Kosong + Question Range -->
                        <tr class="divide-x divide-slate-700 text-[10px] font-bold">
                            @foreach($matrixData['sections'] as $sec)
                                <th rowspan="2" class="px-2 py-1.5 text-center bg-emerald-950 text-emerald-300 min-w-[46px] border-b border-slate-700" title="Jumlah Jawaban Benar">
                                    Benar
                                </th>
                                <th rowspan="2" class="px-2 py-1.5 text-center bg-amber-950 text-amber-300 min-w-[46px] border-b border-slate-700" title="Jumlah Jawaban Salah">
                                    Salah
                                </th>
                                <th rowspan="2" class="px-2 py-1.5 text-center bg-slate-800 text-slate-300 min-w-[46px] border-b border-slate-700" title="Jumlah Tidak Dijawab">
                                    Kosong
                                </th>

                                @if($sec['question_count'] > 0)
                                    <th colspan="{{ $sec['question_count'] }}" class="px-2 py-1 text-center bg-slate-800 text-slate-300 border-b border-slate-700">
                                        Nomor Soal
                                    </th>
                                @endif
                            @endforeach
                        </tr>

                        <!-- ROW 4: Numbers 1, 2, 3, ... N -->
                        <tr class="divide-x divide-slate-700 text-[10px] font-bold">
                            @foreach($matrixData['sections'] as $sec)
                                @foreach($sec['questions'] as $qIdx => $q)
                                    <th class="px-1.5 py-1 text-center bg-slate-800 text-slate-200 min-w-[34px] border-b border-slate-700" title="Soal No. {{ $qIdx + 1 }} (Bobot: {{ $q->points }} poin)">
                                        {{ $qIdx + 1 }}
                                    </th>
                                @endforeach
                            @endforeach
                        </tr>
                    </thead>

                    <!-- DATA ROWS -->
                    <tbody class="divide-y divide-gray-6 bg-white font-sans text-gray-12">
                        @forelse($matrixData['rows'] as $r)
                            <tr 
                                class="hover:bg-slate-50 transition-colors divide-x divide-gray-5"
                                x-show="!searchQuery || '{{ strtolower(addslashes($r['name'])) }}'.includes(searchQuery.toLowerCase())"
                            >
                                <!-- Rank -->
                                <td class="sticky left-0 z-20 bg-white group-hover:bg-slate-50 px-3 py-2.5 text-center font-mono font-bold text-gray-11 border-r border-gray-6">
                                    @if($r['rank'] === 1)
                                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-100 text-amber-800 font-bold text-xs ring-1 ring-amber-400">1</span>
                                    @elseif($r['rank'] === 2)
                                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-slate-100 text-slate-700 font-bold text-xs ring-1 ring-slate-300">2</span>
                                    @elseif($r['rank'] === 3)
                                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-amber-50 text-amber-900 font-bold text-xs ring-1 ring-amber-300">3</span>
                                    @else
                                        {{ $r['rank'] }}
                                    @endif
                                </td>

                                <!-- Nama Siswa -->
                                <td class="sticky left-[48px] z-20 bg-white group-hover:bg-slate-50 px-4 py-2.5 border-r border-gray-6">
                                    <div class="font-semibold text-gray-12 truncate max-w-[200px]" title="{{ $r['name'] }}">
                                        {{ $r['name'] }}
                                    </div>
                                    <div class="text-[10px] text-gray-8 flex items-center gap-1.5 mt-0.5 truncate">
                                        @if($isOwner && $r['tenant_name'] !== '-')
                                            <span class="px-1.5 py-0.2 rounded bg-gray-2 text-gray-10 font-mono text-[9px] border border-gray-4">{{ $r['tenant_name'] }}</span>
                                        @endif
                                        <span class="truncate">{{ $r['email'] }}</span>
                                    </div>
                                </td>

                                <!-- Nama Asesmen -->
                                <td class="px-3 py-2.5 text-gray-10 truncate max-w-[140px]" title="{{ $r['assessment_name'] }}">
                                    {{ $r['assessment_name'] }}
                                </td>

                                <!-- Sections Data -->
                                @foreach($matrixData['sections'] as $sec)
                                    @php
                                        $breakdown = $r['section_breakdowns'][$sec['id']] ?? null;
                                    @endphp

                                    @if($breakdown)
                                        <!-- Benar Count -->
                                        <td class="px-2 py-2 text-center font-mono font-bold text-emerald-700 bg-emerald-50/50">
                                            {{ $breakdown['correct'] }}
                                        </td>
                                        <!-- Salah Count -->
                                        <td class="px-2 py-2 text-center font-mono font-bold text-amber-700 bg-amber-50/50">
                                            {{ $breakdown['wrong'] }}
                                        </td>
                                        <!-- Kosong Count -->
                                        <td class="px-2 py-2 text-center font-mono font-bold text-gray-500 bg-gray-50/50">
                                            {{ $breakdown['empty'] }}
                                        </td>

                                        <!-- Question items with colored points -->
                                        @foreach($breakdown['items'] as $item)
                                            @if($item['status'] === 'correct')
                                                <td 
                                                    class="px-1 py-1.5 text-center font-mono font-bold text-[11px] bg-emerald-100/80 text-emerald-900 border-x border-emerald-200"
                                                    title="Soal {{ $item['number'] }}: Benar (+{{ $item['points'] }} poin)&#10;{{ $item['prompt_preview'] }}"
                                                >
                                                    {{ $item['points'] }}
                                                </td>
                                            @elseif($item['status'] === 'wrong')
                                                <td 
                                                    class="px-1 py-1.5 text-center font-mono font-semibold text-[11px] bg-amber-100/80 text-amber-900 border-x border-amber-200"
                                                    title="Soal {{ $item['number'] }}: Salah ({{ $item['points'] }} poin)&#10;{{ $item['prompt_preview'] }}"
                                                >
                                                    {{ $item['points'] }}
                                                </td>
                                            @else
                                                <td 
                                                    class="px-1 py-1.5 text-center font-mono text-[11px] bg-gray-100 text-gray-500 border-x border-gray-200"
                                                    title="Soal {{ $item['number'] }}: Kosong / Tidak Dijawab&#10;{{ $item['prompt_preview'] }}"
                                                >
                                                    0
                                                </td>
                                            @endif
                                        @endforeach
                                    @else
                                        <td colspan="{{ 3 + $sec['question_count'] }}" class="px-2 py-2 text-center text-gray-7 italic">
                                            Tidak ada data
                                        </td>
                                    @endif
                                @endforeach

                                <!-- Total Skor -->
                                <td class="px-4 py-2.5 text-center font-mono font-extrabold text-indigo-950 bg-indigo-50/70 border-l border-gray-6">
                                    <div class="text-sm">{{ $r['score'] }}</div>
                                    <div class="text-[10px] font-normal text-indigo-700">({{ $r['final_percentage'] }}%)</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                @php
                                    $allCols = 4;
                                    foreach($matrixData['sections'] as $s) {
                                        $allCols += 3 + $s['question_count'];
                                    }
                                @endphp
                                <td colspan="{{ $allCols }}" class="py-16 text-center text-gray-9">
                                    <div class="max-w-sm mx-auto space-y-3">
                                        <div class="w-12 h-12 mx-auto rounded-2xl bg-gray-2 flex items-center justify-center text-gray-8">
                                            <x-radix-icon name="file-text" class="w-6 h-6" />
                                        </div>
                                        <p class="text-sm font-semibold text-gray-11">Belum ada peserta yang menyelesaikan asesmen ini.</p>
                                        <p class="text-xs text-gray-8">Data akan otomatis muncul dan siap diunduh setelah siswa menyelesaikan pengerjaan ujian.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Footer summary note -->
            <div class="p-3.5 bg-gray-1 border-t border-gray-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-gray-9">
                <div class="flex items-center gap-2">
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>Menampilkan <strong>{{ count($matrixData['rows']) }}</strong> peserta terurut dari skor tertinggi (Rank 1).</span>
                </div>
                <div>
                    <a href="{{ route('assessments.analytics.export', $assessment) }}" class="text-emerald-700 hover:text-emerald-800 font-semibold inline-flex items-center gap-1">
                        Unduh salinan resmi Microsoft Excel (.xlsx) &rarr;
                    </a>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>
