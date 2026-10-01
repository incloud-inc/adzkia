<x-layouts.app>
    <x-slot:title>Hasil Ujian CBT - {{ $assessment->title }}</x-slot:title>

    <div class="max-w-5xl mx-auto space-y-6 pb-16">
        <!-- Top Navigation Bar & Meta -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('assessments.show', $assessment) }}" class="p-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer" title="Kembali ke Detail Asesmen">
                    <x-radix-icon name="arrow-left" class="w-4 h-4" />
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-green-3 text-green-11 border border-green-6/50">
                            CBT Post-Exam Result
                        </span>
                        <span class="text-xs font-mono text-gray-11">
                            {{ $assessment->subject?->name ?? 'Mata Pelajaran Umum' }} • Kelas {{ $assessment->grade_level ?? '-' }}
                        </span>
                    </div>
                    <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight mt-1">
                        {{ $assessment->title }}
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button type="button" onclick="window.print()" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-gray-6 hover:bg-gray-2 text-gray-12 text-xs font-semibold transition-colors shadow-2xs cursor-pointer">
                    <x-radix-icon name="download" class="w-4 h-4" />
                    <span>Cetak / Simpan PDF</span>
                </button>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-green-9 hover:bg-green-10 text-white text-xs font-semibold transition-colors shadow-xs cursor-pointer">
                    <x-radix-icon name="home" class="w-4 h-4" />
                    <span>Dashboard CBT</span>
                </a>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- 1. TEACHER REVIEW NOTICE BANNER (TASTE-SKILL)                 -->
        <!-- ============================================================== -->
        @if($summary['teacher_review_required'])
            <div class="relative overflow-hidden rounded-2xl border border-amber-6/70 bg-gradient-to-r from-amber-2/80 via-amber-1/50 to-orange-2/60 p-6 shadow-xs">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-2xl bg-amber-4 text-amber-12 flex items-center justify-center shrink-0 shadow-xs ring-4 ring-amber-3/50">
                            <x-radix-icon name="pencil-2" class="w-6 h-6" />
                        </div>
                        <div class="space-y-1">
                            <div class="flex items-center gap-2.5">
                                <h3 class="font-display font-bold text-base text-gray-12">
                                    Status Ujian: Menunggu Pemeriksaan Guru
                                </h3>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold tracking-wider uppercase bg-amber-4 text-amber-12 border border-amber-6">
                                    Sedang Dikoreksi
                                </span>
                            </div>
                            <p class="text-xs text-gray-11 leading-relaxed max-w-2xl">
                                Ujian ini memuat butir soal <strong class="text-gray-12 font-semibold">Essay / Uraian Bebas</strong> yang membutuhkan penilaian manusia secara seksama. Guru pengampu akan memeriksa jawaban Anda dan merilis nilai akhir serta rapor evaluasi resmi.
                            </p>
                            <div class="pt-1 flex items-center gap-3 text-[11px] text-amber-11 font-medium">
                                <span class="flex items-center gap-1">
                                    <x-radix-icon name="check-circled" class="w-3.5 h-3.5" />
                                    Jawaban tersimpan aman di server
                                </span>
                                <span>•</span>
                                <span class="flex items-center gap-1">
                                    <x-radix-icon name="bell" class="w-3.5 h-3.5" />
                                    Notifikasi akan dikirim setelah nilai dirilis
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="shrink-0 bg-white/80 backdrop-blur-xs border border-amber-5/80 rounded-xl p-3.5 text-center min-w-[170px] shadow-2xs">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-10 block">Nilai Objektif Sementara</span>
                        <p class="text-2xl font-extrabold font-mono text-gray-12 mt-0.5">
                            {{ $summary['final_score'] }}<span class="text-xs text-gray-9 font-normal"> / 100</span>
                        </p>
                        <span class="text-[10px] text-amber-11 font-semibold block mt-0.5">Belum termasuk nilai essay</span>
                    </div>
                </div>
            </div>
        @else
            <div class="rounded-2xl border border-green-6/70 bg-gradient-to-r from-green-2/80 to-emerald-1/50 p-5 flex items-center justify-between gap-4">
                <div class="flex items-center gap-3.5">
                    <span class="w-10 h-10 rounded-xl bg-green-4 text-green-11 flex items-center justify-center">
                        <x-radix-icon name="check" class="w-5 h-5" />
                    </span>
                    <div>
                        <h3 class="font-display font-bold text-sm text-gray-12">Ujian Selesai & Terkalkulasi Otomatis</h3>
                        <p class="text-xs text-gray-11">Seluruh butir soal telah dinilai oleh sistem CBT ADZKIA.</p>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-bold text-gray-10 uppercase block">Nilai Akhir</span>
                    <span class="text-2xl font-extrabold font-mono text-green-11">{{ $summary['final_score'] }}</span>
                </div>
            </div>
        @endif

        <!-- ============================================================== -->
        <!-- 2. OVERALL STATISTIC HERO METRIC CARDS                        -->
        <!-- ============================================================== -->
        <div class="grid grid-cols-2 sm:grid-cols-5 gap-3.5">
            <!-- Total Soal -->
            <div class="bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1">
                <div class="flex items-center justify-between text-gray-10">
                    <span class="text-xs font-semibold">Total Soal</span>
                    <x-radix-icon name="stack" class="w-4 h-4 text-gray-9" />
                </div>
                <p class="text-2xl font-extrabold font-mono text-gray-12">{{ $summary['total_questions'] }}</p>
                <span class="text-[11px] text-gray-9 font-medium block">Semua bagian</span>
            </div>

            <!-- Jawaban Benar -->
            <div class="bg-white p-4 rounded-2xl border border-green-6/60 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1 bg-green-1/20">
                <div class="flex items-center justify-between text-green-11">
                    <span class="text-xs font-semibold">Jawaban Benar</span>
                    <x-radix-icon name="check-circled" class="w-4 h-4 text-green-9" />
                </div>
                <p class="text-2xl font-extrabold font-mono text-green-11">{{ $summary['total_correct'] }}</p>
                <span class="text-[11px] text-green-10 font-medium block">
                    {{ $summary['total_questions'] > 0 ? round(($summary['total_correct'] / $summary['total_questions']) * 100, 1) : 0 }}% Akurasi
                </span>
            </div>

            <!-- Jawaban Salah -->
            <div class="bg-white p-4 rounded-2xl border border-red-6/60 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1 bg-red-1/20">
                <div class="flex items-center justify-between text-red-11">
                    <span class="text-xs font-semibold">Jawaban Salah</span>
                    <x-radix-icon name="cross-circled" class="w-4 h-4 text-red-9" />
                </div>
                <p class="text-2xl font-extrabold font-mono text-red-11">{{ $summary['total_incorrect'] }}</p>
                <span class="text-[11px] text-red-10 font-medium block">Pilihan kurang tepat</span>
            </div>

            <!-- Tidak Dijawab (Kosong) -->
            <div class="bg-white p-4 rounded-2xl border border-amber-6/60 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1 bg-amber-1/20">
                <div class="flex items-center justify-between text-amber-11">
                    <span class="text-xs font-semibold">Tidak Dijawab</span>
                    <x-radix-icon name="dash" class="w-4 h-4 text-amber-9" />
                </div>
                <p class="text-2xl font-extrabold font-mono text-amber-11">{{ $summary['total_unanswered'] }}</p>
                <span class="text-[11px] text-amber-10 font-medium block">Kosong / Terlewat</span>
            </div>

            <!-- KKM & Status Kelulusan -->
            <div class="col-span-2 sm:col-span-1 bg-white p-4 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-1">
                <div class="flex items-center justify-between text-gray-10">
                    <span class="text-xs font-semibold">Target KKM</span>
                    <x-radix-icon name="target" class="w-4 h-4 text-gray-9" />
                </div>
                <div class="flex items-baseline gap-2">
                    <p class="text-2xl font-extrabold font-mono text-gray-12">
                        {{ $summary['passing_grade']['enabled'] ? $summary['passing_grade']['min_score'] : '-' }}
                    </p>
                    @if($summary['passing_grade']['enabled'])
                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-md {{ $summary['is_passed'] ? 'bg-green-3 text-green-11 border border-green-6/60' : 'bg-red-3 text-red-11 border border-red-6/60' }}">
                            {{ $summary['is_passed'] ? ($summary['passing_grade']['pass_label'] ?? 'Lulus') : ($summary['passing_grade']['fail_label'] ?? 'Remedial') }}
                        </span>
                    @endif
                </div>
                <span class="text-[11px] text-gray-9 font-medium block">
                    {{ $summary['passing_grade']['enabled'] ? 'Kriteria Ketuntasan' : 'Tanpa KKM' }}
                </span>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- 3. SECTION BREAKDOWN CARDS (RINGKASAN TIAP SECTION)           -->
        <!-- ============================================================== -->
        <div class="space-y-4">
            <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                <div>
                    <h2 class="font-display font-bold text-base text-gray-12">Rincian Hasil Pengerjaan per Bagian (Section)</h2>
                    <p class="text-xs text-gray-11">Performa siswa dikelompokkan berdasarkan masing-masing bagian ujian.</p>
                </div>
                <span class="text-xs font-mono font-semibold text-gray-11 bg-gray-2 px-3 py-1 rounded-lg border border-gray-5">
                    {{ count($sectionsData) }} Bagian Terdaftar
                </span>
            </div>

            <div class="space-y-4">
                @foreach($sectionsData as $sIndex => $sec)
                    <div class="bg-white border border-gray-6 rounded-2xl p-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-4">
                        <!-- Section Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-gray-5 pb-3">
                            <div class="flex items-center gap-3">
                                <span class="w-8 h-8 rounded-xl bg-gray-12 text-white flex items-center justify-center font-bold text-xs">
                                    {{ $sIndex + 1 }}
                                </span>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="font-display font-bold text-sm text-gray-12">{{ $sec['title'] }}</h3>
                                        @if($sec['essay_count'] > 0)
                                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-amber-3 text-amber-12 border border-amber-6">
                                                Ada {{ $sec['essay_count'] }} Soal Essay
                                            </span>
                                        @endif
                                    </div>
                                    @if($sec['instructions'])
                                        <p class="text-xs text-gray-11 mt-0.5">{{ $sec['instructions'] }}</p>
                                    @endif
                                </div>
                            </div>

                            <!-- Section Score Badge -->
                            <div class="flex items-center gap-3">
                                <div class="text-right">
                                    <span class="text-[10px] font-bold uppercase tracking-wider text-gray-10 block">Skor Bagian</span>
                                    <span class="text-sm font-mono font-bold text-gray-12">{{ $sec['earned_points'] }} / {{ $sec['total_points'] }} Poin</span>
                                </div>
                                <div class="w-11 h-11 rounded-xl bg-gray-2 border border-gray-5 flex items-center justify-center font-mono font-extrabold text-sm text-gray-12">
                                    {{ round($sec['score_percentage']) }}%
                                </div>
                            </div>
                        </div>

                        <!-- 4 Stat Badges per Section -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <!-- Total Soal Section -->
                            <div class="p-3 rounded-xl bg-gray-2/60 border border-gray-5">
                                <span class="text-[11px] font-medium text-gray-11 block">Jumlah Soal</span>
                                <div class="flex items-center justify-between mt-1">
                                    <span class="text-lg font-bold font-mono text-gray-12">{{ $sec['total_questions'] }}</span>
                                    <span class="text-[11px] text-gray-9 font-mono">100%</span>
                                </div>
                            </div>

                            <!-- Benar Section -->
                            <div class="p-3 rounded-xl bg-green-2/40 border border-green-6/50">
                                <span class="text-[11px] font-semibold text-green-11 block flex items-center gap-1">
                                    <x-radix-icon name="check" class="w-3.5 h-3.5" />
                                    Jawaban Benar
                                </span>
                                <div class="flex items-center justify-between mt-1">
                                    <span class="text-lg font-bold font-mono text-green-11">{{ $sec['correct'] }}</span>
                                    <span class="text-[11px] text-green-10 font-mono font-semibold">
                                        {{ $sec['total_questions'] > 0 ? round(($sec['correct'] / $sec['total_questions']) * 100) : 0 }}%
                                    </span>
                                </div>
                            </div>

                            <!-- Salah Section -->
                            <div class="p-3 rounded-xl bg-red-2/40 border border-red-6/50">
                                <span class="text-[11px] font-semibold text-red-11 block flex items-center gap-1">
                                    <x-radix-icon name="cross-2" class="w-3.5 h-3.5" />
                                    Jawaban Salah
                                </span>
                                <div class="flex items-center justify-between mt-1">
                                    <span class="text-lg font-bold font-mono text-red-11">{{ $sec['incorrect'] }}</span>
                                    <span class="text-[11px] text-red-10 font-mono font-semibold">
                                        {{ $sec['total_questions'] > 0 ? round(($sec['incorrect'] / $sec['total_questions']) * 100) : 0 }}%
                                    </span>
                                </div>
                            </div>

                            <!-- Kosong Section -->
                            <div class="p-3 rounded-xl bg-amber-2/40 border border-amber-6/50">
                                <span class="text-[11px] font-semibold text-amber-11 block flex items-center gap-1">
                                    <x-radix-icon name="dash" class="w-3.5 h-3.5" />
                                    Tidak Dijawab
                                </span>
                                <div class="flex items-center justify-between mt-1">
                                    <span class="text-lg font-bold font-mono text-amber-11">{{ $sec['unanswered'] }}</span>
                                    <span class="text-[11px] text-amber-10 font-mono font-semibold">
                                        {{ $sec['total_questions'] > 0 ? round(($sec['unanswered'] / $sec['total_questions']) * 100) : 0 }}%
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Linear Visual Proportion Bar -->
                        <div class="space-y-1.5 pt-1">
                            <div class="flex items-center justify-between text-[11px] text-gray-10">
                                <span>Distribusi Jawaban:</span>
                                <div class="flex items-center gap-3">
                                    <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-green-9"></span> Benar</span>
                                    <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-red-9"></span> Salah</span>
                                    <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-amber-9"></span> Kosong</span>
                                </div>
                            </div>
                            <div class="w-full h-2.5 bg-gray-4 rounded-full overflow-hidden flex">
                                @if($sec['total_questions'] > 0)
                                    <div class="h-full bg-green-9" style="width: {{ ($sec['correct'] / $sec['total_questions']) * 100 }}%"></div>
                                    <div class="h-full bg-red-9" style="width: {{ ($sec['incorrect'] / $sec['total_questions']) * 100 }}%"></div>
                                    <div class="h-full bg-amber-9" style="width: {{ ($sec['unanswered'] / $sec['total_questions']) * 100 }}%"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- 4. RANKING & PERCENTILE CARD (OPTIONAL / TRY OUT)              -->
        <!-- ============================================================== -->
        @if($summary['post_exam_policy']['show_ranking'] ?? false)
            <div class="bg-white border border-gray-6 rounded-2xl p-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-3 text-indigo-11 flex items-center justify-center font-bold">
                        <x-radix-icon name="bar-chart" class="w-6 h-6" />
                    </div>
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-11 bg-indigo-2 px-2 py-0.5 rounded-md border border-indigo-5">
                            Standar Pemeringkatan CBT
                        </span>
                        <h3 class="font-display font-bold text-base text-gray-12 mt-1">Peringkat & Persentil Siswa</h3>
                        <p class="text-xs text-gray-11">Posisi Anda di antara seluruh peserta yang telah menyelesaikan ujian ini.</p>
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <span class="text-[11px] text-gray-10 block">Peringkat Saat Ini</span>
                        <p class="text-xl font-extrabold font-mono text-gray-12">
                            #{{ $summary['ranking'] }} <span class="text-xs text-gray-9 font-normal">/ {{ $summary['total_participants'] }}</span>
                        </p>
                    </div>
                    <div class="h-8 w-px bg-gray-5"></div>
                    <div class="text-right">
                        <span class="text-[11px] text-gray-10 block">Persentil Capaian</span>
                        <p class="text-xl font-extrabold font-mono text-indigo-11">
                            {{ $summary['percentile'] }}%
                        </p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Bottom Action Bar -->
        <div class="pt-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-t border-gray-5">
            <span class="text-xs text-gray-10">
                Dokumen hasil pengerjaan CBT ini dihasilkan secara otomatis oleh sistem ADZKIA pada {{ now()->translatedFormat('d F Y, H:i') }} WIB.
            </span>
            <div class="flex items-center gap-3">
                <a href="{{ route('assessments.show', $assessment) }}" class="px-5 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors cursor-pointer">
                    Kembali ke Detail Asesmen
                </a>
                <a href="{{ route('dashboard') }}" class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 text-white text-xs font-bold transition-all shadow-xs cursor-pointer">
                    Selesai & Ke Dashboard
                </a>
            </div>
        </div>
    </div>
</x-layouts.app>
