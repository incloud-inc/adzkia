{{-- resources/views/exam/result.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        $examTenant = ($session->tenant ?? null) ?? ($assessment->tenant ?? null) ?? auth()->user()?->currentTenant ?? auth()->user()?->tenants()->first();
        $examFavicon = ($examTenant && $examTenant->favicon_path) ? $examTenant->favicon_url : asset('adzkia black app.png');
    @endphp
    <title>{{ \App\Support\PageTitleResolver::resolve("Hasil Ujian — {$assessment->title}", $examTenant, auth()->user()) }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ $examFavicon }}">
    <link rel="apple-touch-icon" href="{{ $examFavicon }}">

    <!-- Font Open Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- KaTeX --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"></script>
    {{-- Marked (Markdown → HTML) --}}
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <script>
        window.__reviewData = {!! json_encode([
            'sessionUuid' => $session->uuid,
            'questions' => $allQuestionsReview,
            'summary' => $summary,
            'assessment' => [
                'id' => $assessment->id,
                'title' => $assessment->title,
                'subject' => $assessment->subject?->name ?? 'Mata Pelajaran Umum',
                'grade_level' => $assessment->grade_level ?? '-',
            ]
        ], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!};
    </script>

    <style>
        body { font-family: 'Open Sans', sans-serif; background-color: #f4f5f7 !important; }
        .font-display { font-family: 'Outfit', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display: none !important; }

        .prose-q { font-family: 'Open Sans', sans-serif; line-height: 1.7; color: #212529; }
        .prose-q p { margin-bottom: 0.75rem; }
        .prose-q p:last-child { margin-bottom: 0; }
        .prose-q strong { color: #212529; font-weight: 700; }
        .prose-q code { background: rgba(0,0,0,0.06); padding: 0.15rem 0.35rem; border-radius: 0.25rem; font-size: 0.9em; font-family: monospace; }
        .prose-q pre { background: #212529; color: #f8fafc; padding: 0.875rem; border-radius: 0.5rem; overflow-x: auto; margin: 0.5rem 0; }
        .prose-q table { width: 100%; border-collapse: collapse; margin: 0.85rem 0; font-size: 0.875rem; border: 1px solid #ced4da; }
        .prose-q th { background: #f1f3f5; color: #212529; padding: 0.6rem 0.85rem; border: 1px solid #ced4da; font-weight: 700; text-align: left; }
        .prose-q td { padding: 0.6rem 0.85rem; border: 1px solid #ced4da; }
        .prose-q tr:nth-child(even) { background: #f8f9fa; }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden bg-[#a5d8ff] flex justify-center text-[#212529] antialiased"
      x-data="examReview(window.__reviewData)" x-cloak>

    <main class="w-full h-full lg:h-screen lg:max-w-4xl bg-white flex flex-col relative lg:shadow-2xl lg:border-x border-blue-200/60">

        <!-- OVERLAY GRADING PENDING -->
        <div x-show="gradingStatus === 'pending' || gradingStatus === 'processing'" class="absolute inset-0 z-50 bg-white/95 backdrop-blur-xs flex flex-col items-center justify-center p-6 text-center space-y-5">
            <div class="w-16 h-16 border-4 border-[#2b8a3e] border-t-transparent rounded-full animate-spin"></div>
            <div class="space-y-2 max-w-md">
                <h2 class="text-2xl font-bold text-[#212529] font-display">Sedang Menilai Jawaban...</h2>
                <p class="text-gray-600 text-sm">Mohon tunggu sebentar, sistem sedang merekap hasil ujian Anda. Halaman ini akan termuat otomatis setelah selesai.</p>
            </div>
            <div class="pt-3 flex flex-col sm:flex-row items-center gap-3">
                <a href="{{ route('exam.history') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-[#2b8a3e] hover:bg-[#237032] text-white text-sm font-semibold transition shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    <span>Tunggu di Dashboard (Riwayat Ujian)</span>
                </a>
                <button type="button" @click="window.location.reload()" class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-medium transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    <span>Coba Muat Ulang</span>
                </button>
            </div>
        </div>

        @php
            $tenant = $session->tenant ?? $session->assessment->tenant ?? auth()->user()->currentTenant ?? (app()->has('currentTenant') ? app('currentTenant') : null);
            $authUser = auth()->user();

            $titleWords = preg_split('/[\s\-_]+/', trim($assessment->title));
            $assessmentInitials = '';
            foreach (array_slice($titleWords, 0, 4) as $w) {
                if (!empty($w)) {
                    $assessmentInitials .= mb_strtoupper(mb_substr($w, 0, 1));
                }
            }
            if (empty($assessmentInitials)) {
                $assessmentInitials = mb_strtoupper(mb_substr($assessment->title, 0, 3));
            }
        @endphp

        <!-- HEADER (WARNA #339af0, LOGO ADZKIA BULAT + TENANT + FOTO PROFIL, PEMBAHASAN DI TENGAH) -->
        <header class="bg-[#339af0] text-white px-3 sm:px-5 py-2.5 sm:py-3 flex items-center justify-between z-10 shrink-0 shadow-xs border-b border-blue-400/30">
            <!-- Left: Trio Avatars (Logo ADZKIA Bulat, Logo Tenant, Foto Profil Peserta) -->
            <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                <!-- 1. Logo ADZKIA Bulat -->
                <x-adzkia-logo-round size="w-8 h-8 sm:w-9 sm:h-9" />

                <!-- 2. Logo Tenant -->
                @if($tenant && $tenant->logo_url)
                    <img src="{{ $tenant->logo_url }}"
                         alt="{{ $tenant->name }}"
                         title="Tenant: {{ $tenant->name }}"
                         class="w-8 h-8 sm:w-9 sm:h-9 rounded-full object-cover bg-white ring-2 ring-white/80 shadow-xs shrink-0"
                         onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';" />
                    <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/20 border border-white/40 text-white font-bold text-xs items-center justify-center shadow-xs shrink-0 hidden" title="Tenant: {{ $tenant->name }}">
                        {{ substr($tenant->name, 0, 1) }}
                    </div>
                @endif

                <!-- 3. Foto Profil Peserta Ujian -->
                <div class="relative shrink-0">
                    <img src="{{ $authUser->profile_photo_url }}"
                         alt="{{ $authUser->name }}"
                         title="Peserta: {{ $authUser->name }}"
                         class="w-8 h-8 sm:w-9 sm:h-9 rounded-full object-cover bg-white ring-2 ring-white/80 shadow-xs shrink-0"
                         onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';" />
                    <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white text-[#339af0] font-bold text-xs items-center justify-center shadow-xs shrink-0 hidden" title="Peserta: {{ $authUser->name }}">
                        {{ substr($authUser->name, 0, 1) }}
                    </div>
                </div>
            </div>

            <!-- Center: NAMA ASESMEN (Tengah Header, Truncate jika panjang) -->
            <div class="flex-1 min-w-0 px-2 sm:px-4 text-center">
                <!-- Desktop & Tablet (sm and above): Full Title with Truncate -->
                <div class="hidden sm:block min-w-0">
                    <h1 class="font-display font-extrabold text-sm sm:text-base text-white leading-tight truncate mx-auto max-w-xs md:max-w-md lg:max-w-lg"
                        title="{{ $assessment->title }}">
                        {{ $assessment->title }}
                    </h1>
                </div>

                <!-- Mobile (< sm): Hide full names, show assessment initials -->
                <div class="sm:hidden flex items-center justify-center gap-1.5 min-w-0">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-white/20 border border-white/30 text-white font-display font-black text-xs tracking-wider"
                          title="{{ $assessment->title }}">
                        {{ $assessmentInitials }}
                    </span>
                </div>
            </div>

            <!-- Right: Skor Ringkas -->
            <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                <div class="flex items-center gap-1.5 bg-white/15 px-2.5 sm:px-3 py-1.5 rounded-xl border border-white/20 text-xs text-white">
                    <span class="text-blue-100 font-medium hidden sm:inline text-[11px]">Nilai:</span>
                    <strong class="font-display font-extrabold text-xs sm:text-sm text-white">{{ $summary['final_score'] }}</strong>
                    <span class="text-[10px] text-white/70">/ 100</span>
                </div>
            </div>
        </header>

        <!-- AREA SOAL & PEMBAHASAN -->
        <section class="flex-1 overflow-y-auto p-5 md:p-8 space-y-6">

            <template x-if="!questions || questions.length === 0">
                <div class="rounded-2xl border border-[#ced4da] bg-white p-8 text-center text-[#212529]">
                    <p class="font-bold text-lg mb-1 font-display">Belum ada butir soal pada hasil ujian ini.</p>
                </div>
            </template>

            <!-- Loop Kartu Tampilan (Masing-masing kartu menampung Soal Tunggal atau Kelompok Soal Berstimulus Sama) -->
            <template x-for="(card, cardIdx) in displayItems" :key="card.card_index">
                <article x-show="currentCardIndex === cardIdx" :data-card-index="cardIdx" class="space-y-6">

                    <!-- Stimulus / Wacana (Jika Ada pada Kartu Ini) -->
                    <template x-if="card.stimulus && card.stimulus.content">
                        <div class="rounded-2xl border-2 border-blue-300/80 bg-blue-50/70 p-5 md:p-6 space-y-3 shadow-xs">
                            <div class="flex flex-wrap items-center justify-between gap-2 border-b border-blue-200 pb-2.5">
                                <div class="flex items-center gap-2">
                                    <span class="rounded bg-blue-600 text-white px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider font-display shadow-2xs">
                                        Wacana Stimulus
                                    </span>
                                    <span class="text-xs md:text-sm font-bold text-[#212529]" x-text="card.stimulus.title || 'Teks Bacaan'"></span>
                                </div>
                                <template x-if="card.is_group && card.questions.length > 1">
                                    <span class="px-2.5 py-0.5 rounded-full bg-blue-100 border border-blue-300 text-blue-900 text-xs font-extrabold font-display">
                                        📖 Menaungi <span x-text="card.questions.length"></span> Butir Soal Sekaligus
                                    </span>
                                </template>
                            </div>
                            <div class="prose-q text-sm md:text-base text-[#212529] leading-relaxed font-serif text-justify"
                                 x-html="renderStimulusHtml(card.stimulus)"></div>
                        </div>
                    </template>

                    <!-- Header Pembagi jika Kartu Menaungi Banyak Soal Sekaligus -->
                    <template x-if="card.is_group && card.questions.length > 1">
                        <div class="flex items-center justify-between pt-1 pb-1 border-b border-blue-200/80">
                            <h3 class="font-display font-extrabold text-xs sm:text-sm text-blue-950 uppercase tracking-wider flex items-center gap-2">
                                <span>Butir-Butir Soal &amp; Pembahasan Berdasarkan Wacana Di Atas</span>
                                <span class="text-xs font-bold text-blue-700 bg-blue-100 border border-blue-300 px-2 py-0.5 rounded-md" x-text="'(' + card.questions.length + ' Soal)'"></span>
                            </h3>
                        </div>
                    </template>

                    <!-- Loop Seluruh Soal di dalam Kartu Ini (Soal Tunggal atau Seluruh Soal di Bawah Stimulus) -->
                    <div class="space-y-6">
                        <template x-for="q in card.questions" :key="q.id">
                            <div :id="'review-question-block-' + q.id" class="p-5 md:p-6 rounded-2xl border border-[#ced4da] bg-white space-y-4 shadow-xs transition-all">

                                <!-- Header Butir Soal & Status Jawaban -->
                                <div class="flex flex-wrap justify-between items-center gap-2 pb-2.5 border-b border-[#ced4da]/60">
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center justify-center min-w-[28px] h-7 px-2.5 rounded-lg text-xs font-black font-mono text-white shadow-2xs"
                                              :class="getQuestionStatusBadgeClass(q)">
                                            <span x-text="'No. ' + q.number"></span>
                                        </span>
                                        <span class="px-2 py-0.5 rounded-md bg-[#ced4da]/40 text-[10px] font-bold uppercase tracking-wider text-[#212529]/80"
                                              x-text="typeLabel(q.type)"></span>
                                        <span class="text-xs text-[#212529]/70 font-semibold"
                                              x-text="'(' + (q.points || 1) + ' Poin)'"></span>
                                    </div>

                                    <!-- Label Skor / Hasil Evaluasi -->
                                    <div>
                                        <template x-if="q.is_essay">
                                            <span class="text-white text-xs font-bold px-2.5 py-1 rounded-md uppercase font-display shadow-2xs"
                                                  :class="q.points_awarded === null ? 'bg-amber-500' : (parseFloat(q.points_awarded) >= (q.essay_max_points || q.points) ? 'bg-emerald-600' : (parseFloat(q.points_awarded) > 0 ? 'bg-orange-500' : 'bg-rose-600'))">
                                                <span x-text="q.points_awarded !== null ? (parseFloat(q.points_awarded) > 0 && parseFloat(q.points_awarded) < (q.essay_max_points || q.points) ? 'Sebagian (' + q.points_awarded + ' Poin)' : (parseFloat(q.points_awarded) >= (q.essay_max_points || q.points) ? 'Benar (+' + q.points_awarded + ' Poin)' : 'Salah (0 Poin)')) : 'Essay: Diperiksa Guru'"></span>
                                            </span>
                                        </template>
                                        <template x-if="!q.is_essay && !q.is_answered">
                                            <span class="bg-slate-700 text-white text-xs font-bold px-2.5 py-1 rounded-md uppercase font-display shadow-2xs">
                                                Tidak Dijawab (0 Poin)
                                            </span>
                                        </template>
                                        <template x-if="!q.is_essay && q.is_answered && isFullyCorrect(q)">
                                            <span class="bg-emerald-600 text-white text-xs font-bold px-2.5 py-1 rounded-md uppercase font-display shadow-2xs">
                                                Benar (+<span x-text="q.points_awarded !== undefined && q.points_awarded !== null ? q.points_awarded : q.points"></span> Poin)
                                            </span>
                                        </template>
                                        <template x-if="!q.is_essay && q.is_answered && isPartialPoints(q)">
                                            <span class="bg-orange-500 text-white text-xs font-bold px-2.5 py-1 rounded-md uppercase font-display shadow-2xs ring-1 ring-orange-300">
                                                Sebagian Benar (+<span x-text="q.points_awarded"></span> / <span x-text="q.points || 1"></span> Poin)
                                            </span>
                                        </template>
                                        <template x-if="!q.is_essay && q.is_answered && !isFullyCorrect(q) && !isPartialPoints(q)">
                                            <span class="bg-rose-600 text-white text-xs font-bold px-2.5 py-1 rounded-md uppercase font-display shadow-2xs">
                                                Salah (0 Poin)
                                            </span>
                                        </template>
                                    </div>
                                </div>

                                <!-- Teks Paragraf / Soal (Stem) -->
                                <div class="text-[#212529] text-base md:text-lg leading-relaxed prose-q font-medium"
                                     x-html="q.rendered_prompt || renderRich(q.prompt || '')"></div>

                                <!-- ── 1. PILIHAN JAWABAN MCQ (MODE PEMBAHASAN) ── -->
                                <template x-if="['mcq_single', 'mcq_multiple', 'mcq_weighted'].includes(q.type)">
                                    <div class="space-y-3 pb-2 mt-3">
                                        <template x-for="opt in (q.options || [])" :key="opt.id">
                                            <div>
                                                <!-- Kasus 1: Pilihan Benar (Correct Answer) - Frame Emerald, BG Emerald Lembut -->
                                                <template x-if="isOptionCorrect(opt)">
                                                    <div class="relative flex items-start gap-3 p-4 rounded-xl border-2 border-emerald-600 bg-emerald-50/70 shadow-xs">
                                                        <div class="absolute -top-3 right-4 bg-emerald-600 text-white text-xs font-bold px-2.5 py-0.5 rounded-md border border-white shadow-2xs font-display">
                                                            <span x-text="isOptionChosenByStudent(q, opt) ? 'Jawabanmu — Benar' : 'Kunci Benar'"></span>
                                                        </div>
                                                        <div class="mt-0.5 w-4 h-4 rounded-full bg-emerald-600 flex items-center justify-center shrink-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                                        </div>
                                                        <span class="text-[#212529] text-sm md:text-base font-semibold leading-snug prose-q"
                                                              x-html="renderRich(opt.content)"></span>
                                                    </div>
                                                </template>

                                                <!-- Kasus 2: Pilihan Salah Jawaban Siswa - Frame Rose, BG Rose Lembut -->
                                                <template x-if="!isOptionCorrect(opt) && isOptionChosenByStudent(q, opt)">
                                                    <div class="relative flex items-start gap-3 p-4 rounded-xl border-2 border-rose-500 bg-rose-50/80 shadow-xs">
                                                        <div class="absolute -top-3 right-4 bg-rose-600 text-white text-xs font-bold px-2.5 py-0.5 rounded-md border border-white shadow-2xs font-display">
                                                            Jawabanmu — Salah
                                                        </div>
                                                        <div class="mt-0.5 w-4 h-4 rounded-full bg-rose-600 flex items-center justify-center shrink-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                                                        </div>
                                                        <span class="text-[#212529] text-sm md:text-base font-semibold leading-snug prose-q"
                                                              x-html="renderRich(opt.content)"></span>
                                                    </div>
                                                </template>

                                                <!-- Kasus 3: Pilihan Lainnya (Bukan Kunci & Tidak Dipilih) - Opacity 60% -->
                                                <template x-if="!isOptionCorrect(opt) && !isOptionChosenByStudent(q, opt)">
                                                    <div class="flex items-start gap-3 p-4 rounded-xl border border-[#ced4da] bg-white opacity-60">
                                                        <div class="mt-0.5 w-4 h-4 rounded-full border border-[#ced4da] shrink-0"></div>
                                                        <span class="text-[#212529]/80 text-sm md:text-base leading-snug font-medium prose-q"
                                                              x-html="renderRich(opt.content)"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>
                                    </div>
                                </template>

                                <!-- ── 2. REVIEW SOAL NON-MCQ ── -->
                                <template x-if="!['mcq_single', 'mcq_multiple', 'mcq_weighted'].includes(q.type)">
                                    <div class="space-y-4 pb-2 mt-3">

                                        <!-- A. SOAL ESSAY / URAIAN -->
                                        <template x-if="q.is_essay">
                                            <div class="space-y-3">
                                                <template x-if="q.is_essay_pending">
                                                    <div class="p-4 rounded-xl bg-amber-50 border-2 border-amber-300 text-amber-900 flex items-start gap-3 shadow-2xs">
                                                        <svg class="w-6 h-6 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        <div>
                                                            <h4 class="font-bold text-sm text-amber-950 font-display">Jawabanmu belum dikoreksi, tunggu yaa...</h4>
                                                            <p class="text-xs text-amber-800 mt-1 leading-relaxed">
                                                                Soal uraian ini memerlukan penilaian manual dari guru (Skor maksimal: <span class="font-bold" x-text="(q.essay_max_points || q.points || 1) + ' poin'"></span>). Nilai total ujianmu akan diperbarui setelah guru selesai memeriksa dan memberikan feedback pada jawabanmu.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </template>

                                                <div class="p-4 rounded-xl border border-slate-200 bg-slate-50/70 shadow-2xs">
                                                    <div class="flex items-center justify-between mb-2">
                                                        <span class="text-xs font-bold uppercase tracking-wider text-slate-700 font-display">
                                                            Jawaban Anda (Uraian):
                                                        </span>
                                                        <template x-if="!q.is_essay_pending">
                                                            <span class="text-xs font-bold px-2 py-0.5 rounded-md"
                                                                  :class="q.is_correct ? 'bg-emerald-100 text-emerald-800 border border-emerald-300' : 'bg-slate-200 text-slate-700'">
                                                                Skor: <span x-text="q.points_awarded || 0"></span> / <span x-text="q.essay_max_points || q.points || 1"></span> Poin
                                                            </span>
                                                        </template>
                                                    </div>
                                                    <div class="p-4 rounded-lg bg-white border border-slate-200 text-sm text-slate-800 leading-relaxed prose-q overflow-x-auto min-h-[70px]"
                                                         x-html="q.student_rendered_text || renderRich(q.student_text || 'Tidak ada jawaban tertulis.')">
                                                    </div>

                                                    <template x-if="q.teacher_feedback">
                                                        <div class="mt-3 p-3 bg-amber-50/80 rounded-lg border border-amber-200 text-xs text-slate-800">
                                                            <span class="font-bold text-amber-900 block mb-1 font-display flex items-center gap-1.5">
                                                                <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                                                                Catatan &amp; Koreksi Guru:
                                                            </span>
                                                            <p class="leading-relaxed" x-text="q.teacher_feedback"></p>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- B. SOAL BENAR / SALAH (DIKOTOMI / MATRIX) -->
                                        <template x-if="['binary_matrix', 'boolean_matrix'].includes(q.type)">
                                            <div class="space-y-2">
                                                <div class="text-xs font-bold uppercase tracking-wider text-slate-700 font-display flex items-center justify-between">
                                                    <span>Hasil Evaluasi Pernyataan (Benar / Salah):</span>
                                                    <span class="text-xs font-semibold px-2 py-0.5 rounded"
                                                          :class="isFullyCorrect(q) ? 'bg-emerald-100 text-emerald-800' : (isPartialPoints(q) ? 'bg-orange-100 text-orange-800 border border-orange-200' : 'bg-rose-100 text-rose-800')"
                                                          x-text="isFullyCorrect(q) ? 'Semua Pernyataan Tepat' : (isPartialPoints(q) ? 'Sebagian Pernyataan Tepat (+' + q.points_awarded + ' Poin)' : 'Ada yang Kurang Tepat')"></span>
                                                </div>

                                                <div class="overflow-x-auto border border-slate-200 rounded-xl shadow-2xs bg-white">
                                                    <table class="w-full text-left text-xs md:text-sm border-collapse">
                                                        <thead>
                                                            <tr class="bg-slate-100/80 text-slate-700 border-b border-slate-200 font-display">
                                                                <th class="py-2.5 px-3 font-bold w-12 text-center">No</th>
                                                                <th class="py-2.5 px-3 font-bold">Pernyataan</th>
                                                                <th class="py-2.5 px-3 font-bold text-center w-32">Jawaban Anda</th>
                                                                <th class="py-2.5 px-3 font-bold text-center w-32">Kunci Sistem</th>
                                                                <th class="py-2.5 px-3 font-bold text-center w-24">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-slate-200">
                                                            <template x-for="(row, rIdx) in (q.matrix_rows || [])" :key="rIdx">
                                                                <tr :class="row.is_correct ? 'bg-emerald-50/20' : 'bg-rose-50/20'">
                                                                    <td class="py-2.5 px-3 text-center font-bold text-slate-600" x-text="rIdx + 1"></td>
                                                                    <td class="py-2.5 px-3 text-slate-800 prose-q" x-html="renderRich(row.statement)"></td>
                                                                    <td class="py-2.5 px-3 text-center font-bold"
                                                                        :class="row.is_correct ? 'text-emerald-700' : 'text-rose-700'"
                                                                        x-text="row.student_label"></td>
                                                                    <td class="py-2.5 px-3 text-center font-bold text-blue-700 bg-blue-50/30"
                                                                        x-text="row.correct_label"></td>
                                                                    <td class="py-2.5 px-3 text-center">
                                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold"
                                                                              :class="row.is_correct ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800'">
                                                                            <span x-text="row.is_correct ? '✓ Tepat' : '✗ Salah'"></span>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- C. SOAL MENCOCOKKAN / MENJODOHKAN (MATCHING) -->
                                        <template x-if="q.type === 'matching'">
                                            <div class="space-y-2">
                                                <div class="text-xs font-bold uppercase tracking-wider text-slate-700 font-display flex items-center justify-between">
                                                    <span>Hasil Pasangan Menjodohkan:</span>
                                                    <span class="text-xs font-semibold px-2 py-0.5 rounded"
                                                          :class="isFullyCorrect(q) ? 'bg-emerald-100 text-emerald-800' : (isPartialPoints(q) ? 'bg-orange-100 text-orange-800 border border-orange-200' : 'bg-rose-100 text-rose-800')"
                                                          x-text="isFullyCorrect(q) ? 'Semua Pasangan Cocok' : (isPartialPoints(q) ? 'Sebagian Pasangan Cocok (+' + q.points_awarded + ' Poin)' : 'Ada Pasangan yang Salah')"></span>
                                                </div>

                                                <div class="overflow-x-auto border border-slate-200 rounded-xl shadow-2xs bg-white">
                                                    <table class="w-full text-left text-xs md:text-sm border-collapse">
                                                        <thead>
                                                            <tr class="bg-slate-100/80 text-slate-700 border-b border-slate-200 font-display">
                                                                <th class="py-2.5 px-3 font-bold w-12 text-center">No</th>
                                                                <th class="py-2.5 px-3 font-bold">Premis / Pertanyaan</th>
                                                                <th class="py-2.5 px-3 font-bold">Pasangan Anda</th>
                                                                <th class="py-2.5 px-3 font-bold text-blue-700">Kunci Pasangan</th>
                                                                <th class="py-2.5 px-3 font-bold text-center w-24">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-slate-200">
                                                            <template x-for="(row, rIdx) in (q.matching_rows || [])" :key="rIdx">
                                                                <tr :class="row.is_correct ? 'bg-emerald-50/20' : 'bg-rose-50/20'">
                                                                    <td class="py-2.5 px-3 text-center font-bold text-slate-600" x-text="rIdx + 1"></td>
                                                                    <td class="py-2.5 px-3 text-slate-800 font-medium prose-q" x-html="renderRich(row.premise)"></td>
                                                                    <td class="py-2.5 px-3 font-semibold"
                                                                        :class="row.is_correct ? 'text-emerald-700' : 'text-rose-700'"
                                                                        x-text="row.student_pair"></td>
                                                                    <td class="py-2.5 px-3 font-semibold text-blue-800 bg-blue-50/30"
                                                                        x-text="row.correct_pair"></td>
                                                                    <td class="py-2.5 px-3 text-center">
                                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-bold"
                                                                              :class="row.is_correct ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800'">
                                                                            <span x-text="row.is_correct ? '✓ Cocok' : '✗ Salah'"></span>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- D. SOAL MENGURUTKAN (ORDERING / REORDER) -->
                                        <template x-if="['ordering', 'reorder'].includes(q.type)">
                                            <div class="space-y-3">
                                                <div class="text-xs font-bold uppercase tracking-wider text-slate-700 font-display">
                                                    Perbandingan Urutan:
                                                </div>

                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div class="p-4 rounded-xl border-2 bg-white"
                                                         :class="q.ordering_data?.is_correct ? 'border-emerald-400 bg-emerald-50/20' : 'border-rose-300 bg-rose-50/20'">
                                                        <div class="text-xs font-bold uppercase tracking-wider mb-2 font-display flex items-center justify-between"
                                                             :class="q.ordering_data?.is_correct ? 'text-emerald-700' : 'text-rose-700'">
                                                            <span>Urutan Jawaban Anda:</span>
                                                            <span x-text="q.ordering_data?.is_correct ? '✓ Tepat' : '✗ Salah'"></span>
                                                        </div>
                                                        <ol class="list-decimal list-inside space-y-1.5 text-xs md:text-sm text-slate-800">
                                                            <template x-for="(item, sIdx) in (q.ordering_data?.student_order || [])" :key="sIdx">
                                                                <li class="p-2 rounded-lg bg-white border border-slate-200 font-medium shadow-2xs" x-text="item"></li>
                                                            </template>
                                                            <template x-if="!q.ordering_data?.student_order || q.ordering_data.student_order.length === 0">
                                                                <li class="italic text-slate-400">Tidak ada urutan yang dijawab.</li>
                                                            </template>
                                                        </ol>
                                                    </div>

                                                    <div class="p-4 rounded-xl border-2 border-blue-400 bg-blue-50/30">
                                                        <div class="text-xs font-bold uppercase tracking-wider text-blue-800 mb-2 font-display">
                                                            Kunci Urutan Benar (Sistem):
                                                        </div>
                                                        <ol class="list-decimal list-inside space-y-1.5 text-xs md:text-sm text-blue-950">
                                                            <template x-for="(item, cIdx) in (q.ordering_data?.correct_order || [])" :key="cIdx">
                                                                <li class="p-2 rounded-lg bg-white border border-blue-200 font-semibold shadow-2xs" x-text="item"></li>
                                                            </template>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>

                                        <!-- E. SOAL ISIAN SINGKAT / TIPE LAINNYA -->
                                        <template x-if="!q.is_essay && !['binary_matrix', 'boolean_matrix', 'matching', 'ordering', 'reorder'].includes(q.type)">
                                            <div class="space-y-3">
                                                <div class="p-4 rounded-xl border-2"
                                                     :class="q.is_correct ? 'border-emerald-500 bg-emerald-50/50' : 'border-rose-400 bg-rose-50/60'">
                                                    <div class="text-xs font-bold uppercase tracking-wider mb-1 font-display"
                                                         :class="q.is_correct ? 'text-emerald-700' : 'text-rose-700'">
                                                        Jawaban Anda:
                                                    </div>
                                                    <div class="text-sm font-semibold text-[#212529]">
                                                        <span x-text="formatStudentAnswer(q)"></span>
                                                    </div>
                                                </div>

                                                <div class="p-4 rounded-xl border-2 border-blue-500 bg-blue-50/40">
                                                    <div class="text-xs font-bold uppercase tracking-wider text-blue-700 mb-1 font-display">
                                                        Kunci Jawaban Sistem:
                                                    </div>
                                                    <div class="text-sm font-semibold text-[#212529]">
                                                        <span x-text="formatCorrectAnswer(q)"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>

                                    </div>
                                </template>

                                <!-- TOMBOL SHOW / HIDE PEMBAHASAN & PEMBAHASAN AI (DI BAWAH SETIAP SOAL) -->
                                <div class="flex flex-wrap items-center justify-between gap-2.5 pt-3.5 border-t border-slate-200">
                                    <div class="flex items-center gap-2">
                                        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider font-display mr-1">Tampilkan:</span>

                                        <!-- Tombol Pembahasan Resmi (Hanya tampil jika guru mengisi pembahasan) -->
                                        <template x-if="q.has_official_explanation">
                                            <button type="button" @click="toggleOfficial(q.id)"
                                                    :class="showOfficialMap[q.id] ? 'bg-blue-600 text-white shadow-xs ring-2 ring-blue-300' : 'bg-white text-slate-700 border border-slate-300 hover:bg-slate-50'"
                                                    class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                    <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                                <span>PEMBAHASAN</span>
                                                <span x-text="showOfficialMap[q.id] ? 'HIDE' : 'SHOW'"
                                                      :class="showOfficialMap[q.id] ? 'bg-white/20 text-white' : 'bg-slate-100 text-slate-500'"
                                                      class="text-[10px] font-mono px-1.5 py-0.5 rounded font-extrabold"></span>
                                            </button>
                                        </template>

                                        <!-- Tombol Pembahasan AI (DeepSeek Reasoner) -->
                                        <button type="button" @click="toggleAiExplanation(q)"
                                                :disabled="aiLoadingMap[q.id]"
                                                :class="showAiMap[q.id] ? 'bg-violet-600 text-white shadow-xs ring-2 ring-violet-300' : 'bg-white text-violet-800 border border-violet-300 hover:bg-violet-50'"
                                                class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5 cursor-pointer disabled:opacity-50">
                                            <template x-if="aiLoadingMap[q.id]">
                                                <svg class="w-4 h-4 animate-spin text-violet-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" opacity=".2"/><path d="M12 2a10 10 0 0 1 10 10"/></svg>
                                            </template>
                                            <template x-if="!aiLoadingMap[q.id]">
                                                <svg class="w-4 h-4 text-amber-300" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2L14.4 7.6L20 8.4L16 12.4L17.2 18L12 15.2L6.8 18L8 12.4L4 8.4L9.6 7.6L12 2Z"/>
                                                </svg>
                                            </template>
                                            <span x-text="aiLoadingMap[q.id] ? 'Men-generate AI...' : 'PEMBAHASAN AI'"></span>
                                            <span x-text="showAiMap[q.id] ? 'HIDE' : 'SHOW'"
                                                  :class="showAiMap[q.id] ? 'bg-white/20 text-white' : 'bg-violet-100 text-violet-700'"
                                                  class="text-[10px] font-mono px-1.5 py-0.5 rounded font-extrabold"></span>
                                        </button>
                                    </div>
                                </div>

                                <!-- KOTAK 1: PEMBAHASAN RESMI (PER BUTIR SOAL) -->
                                <div x-show="showOfficialMap[q.id] && q.has_official_explanation" x-transition.opacity class="p-5 bg-white border border-blue-200/90 rounded-xl shadow-xs mt-3">
                                    <div class="flex items-center justify-between border-b border-blue-100 pb-2.5 mb-3">
                                        <h3 class="font-bold text-base md:text-lg text-blue-950 flex items-center gap-2 font-display border-l-4 border-blue-600 pl-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600">
                                                <path d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 1.98-3A2.5 2.5 0 0 1 9.5 2Z"/>
                                                <path d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-1.98-3A2.5 2.5 0 0 0 14.5 2Z"/>
                                            </svg>
                                            <span title="Pembahasan Resmi">Pembahasan Soal Nomor <span x-text="q.number"></span></span>
                                        </h3>
                                        <span class="text-xs font-semibold text-blue-900 bg-blue-100 border border-blue-200 px-2.5 py-0.5 rounded-md">
                                            Kurikulum &amp; Guru
                                        </span>
                                    </div>
                                    <div class="text-base text-[#212529] leading-relaxed prose-q
                                                prose-headings:text-slate-900 prose-headings:font-bold
                                                prose-h3:text-sm prose-h3:font-black prose-h3:text-blue-900 prose-h3:mt-3 prose-h3:mb-1.5
                                                prose-p:my-1.5 prose-p:text-xs sm:prose-p:text-sm
                                                prose-ul:my-1.5 prose-li:my-0.5 prose-li:text-xs sm:prose-li:text-sm
                                                prose-strong:text-slate-950 prose-strong:font-bold"
                                         x-html="q.rendered_explanation || renderRich(q.explanation || '')"></div>
                                </div>

                                <!-- KOTAK 2: PEMBAHASAN AI (PER BUTIR SOAL) -->
                                <div x-show="showAiMap[q.id]" x-transition.opacity class="p-5 bg-gradient-to-br from-violet-50/70 via-white to-purple-50/50 border border-violet-200/90 rounded-xl shadow-xs mt-3">
                                    <div class="flex items-center justify-between border-b border-violet-100 pb-2.5 mb-3">
                                        <h3 class="font-bold text-base md:text-lg text-violet-950 flex items-center gap-2 font-display border-l-4 border-violet-600 pl-3">
                                            <svg class="w-5 h-5 text-violet-600" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2L14.4 7.6L20 8.4L16 12.4L17.2 18L12 15.2L6.8 18L8 12.4L4 8.4L9.6 7.6L12 2Z"/>
                                            </svg>
                                            <span>Pembahasan AI — DeepSeek Tutor AI</span>
                                        </h3>
                                        <span class="text-xs font-bold text-violet-900 bg-violet-100 border border-violet-300 px-2.5 py-0.5 rounded-md flex items-center gap-1.5 shadow-2xs">
                                            <span class="w-2 h-2 rounded-full bg-violet-600 animate-pulse"></span>
                                            <span x-text="q.ai_model || 'DeepSeek Reasoner'"></span>
                                        </span>
                                    </div>
                                    <div class="text-base text-[#212529] leading-relaxed prose-q
                                                prose-headings:text-slate-900 prose-headings:font-bold
                                                prose-h3:text-sm prose-h3:font-black prose-h3:text-violet-900 prose-h3:mt-3 prose-h3:mb-1.5
                                                prose-p:my-1.5 prose-p:text-xs sm:prose-p:text-sm
                                                prose-ul:my-1.5 prose-li:my-0.5 prose-li:text-xs sm:prose-li:text-sm
                                                prose-strong:text-slate-950 prose-strong:font-bold"
                                         x-html="q.rendered_ai_explanation || renderRich(q.ai_explanation || '')"></div>
                                </div>

                                <!-- KETIKA KEDUANYA DI-HIDE -->
                                <div x-show="!showOfficialMap[q.id] && !showAiMap[q.id]" x-transition.opacity
                                     class="p-3.5 rounded-xl border border-dashed border-slate-300 bg-slate-50 text-center text-xs text-slate-500 mt-2 flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                    <span>Pembahasan nomor ini disembunyikan. Klik tombol <strong>PEMBAHASAN</strong> atau <strong>PEMBAHASAN AI</strong> di atas untuk membaca penjelasan.</span>
                                </div>

                            </div>
                        </template>
                    </div>

                </article>
            </template>

        </section>

        <!-- FOOTER / NAVIGASI NOMOR SOAL (PERSIS DENGAN WORKSPACE CBT) -->
        <footer class="shrink-0 bg-[#d0ebff] border-t border-blue-200/80 flex flex-col z-10 shadow-[0_-10px_15px_-3px_rgba(0,0,0,0.05)]">
            <!-- Mini Keterangan Warna / Legenda Soal -->
            <div class="px-4 py-1.5 border-b border-blue-200/60 flex flex-wrap items-center justify-between text-[11px] font-bold text-slate-700 gap-x-4 gap-y-1 bg-blue-100/40">
                <div class="flex items-center gap-3 flex-wrap">
                    <span class="text-slate-500 text-[10px] uppercase tracking-wider font-extrabold font-display">Keterangan:</span>
                    <span class="inline-flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-emerald-600 inline-block shadow-2xs"></span> Benar Penuh</span>
                    <span class="inline-flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-orange-500 inline-block shadow-2xs"></span> Poin Sebagian / Parsial</span>
                    <span class="inline-flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-rose-600 inline-block shadow-2xs"></span> Salah (0 Poin)</span>
                    <span class="inline-flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded bg-slate-700 inline-block shadow-2xs"></span> Kosong</span>
                </div>
            </div>

            <div class="w-full flex items-center overflow-x-auto hide-scrollbar gap-2 px-4 py-3 bg-[#d0ebff]">

                <!-- Navigasi Prev Card -->
                <button type="button" @click="prevCard()"
                        :disabled="currentCardIndex <= 0"
                        class="h-9 px-3 rounded-md bg-white border border-blue-300 text-blue-900 font-bold text-xs flex items-center gap-1 hover:bg-blue-50 disabled:opacity-40 disabled:cursor-not-allowed shrink-0 cursor-pointer shadow-2xs font-display">
                    ← Prev
                </button>

                <!-- Daftar Nomor Soal (Kelompok Stimulus dalam Kapsul, Soal Tunggal sebagai Tombol Mandiri) -->
                <template x-for="(card, cIdx) in displayItems" :key="card.card_index">
                    <div class="shrink-0 flex items-center">

                        <!-- JIKA KARTU GRUP (STIMULUS > 1 SOAL) -->
                        <template x-if="card.is_group && card.questions.length > 1">
                            <div class="inline-flex items-center p-1 rounded-xl bg-blue-100/90 border-2 border-blue-300 gap-1 shadow-2xs">
                                <div class="px-1.5 py-0.5 bg-blue-600 text-white rounded text-[10px] font-extrabold uppercase font-display flex items-center gap-1 select-none"
                                     title="Soal dinaungi stimulus wacana yang sama">
                                    <span>📖</span>
                                    <span x-text="card.questions.length"></span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <template x-for="q in card.questions" :key="q.id">
                                        <button type="button" @click="goToQuestion(q.id)"
                                                :title="'Buka Soal Nomor ' + q.number"
                                                class="font-display shrink-0 flex items-center justify-center transition-all cursor-pointer select-none"
                                                :class="getQuestionBtnClass(q, cIdx)">
                                            <span x-text="q.number"></span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <!-- JIKA KARTU STANDALONE (TUNGGAL) -->
                        <template x-if="!card.is_group || card.questions.length === 1">
                            <button type="button" @click="goToQuestion(card.questions[0].id)"
                                    :title="'Buka Soal Nomor ' + card.questions[0].number"
                                    class="font-display shrink-0 flex items-center justify-center transition-all cursor-pointer select-none"
                                    :class="getQuestionBtnClass(card.questions[0], cIdx)">
                                <span x-text="card.questions[0].number"></span>
                            </button>
                        </template>

                    </div>
                </template>

                <!-- Navigasi Next Card -->
                <button type="button" @click="nextCard()"
                        :disabled="currentCardIndex >= displayItems.length - 1"
                        class="h-9 px-3 rounded-md bg-white border border-blue-300 text-blue-900 font-bold text-xs flex items-center gap-1 hover:bg-blue-50 disabled:opacity-40 disabled:cursor-not-allowed shrink-0 cursor-pointer shadow-2xs font-display">
                    Next →
                </button>

                <!-- Tombol Aksi Kanan -->
                <div class="flex items-center gap-2 ml-auto shrink-0 pl-2">
                    <a href="{{ route('exam.analysis', $session->uuid) }}"
                       class="font-display h-9 px-3.5 rounded-md text-xs font-bold bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 transition-colors shadow-sm whitespace-nowrap">
                        ANALISA UJIAN
                    </a>
                    <a href="{{ route('dashboard') }}"
                       class="font-display h-9 px-3.5 rounded-md text-xs font-bold bg-slate-800 text-white flex items-center justify-center hover:bg-slate-900 transition-colors shadow-sm whitespace-nowrap">
                        KEMBALI KE DASHBOARD
                    </a>
                </div>
            </div>
        </footer>

    </main>

    <script>
    function examReview(data) {
        const payload = data || window.__reviewData || {};
        const qList = Array.isArray(payload.questions) ? payload.questions : [];

        return {
            questions: qList,
            summary: payload.summary || {},
            currentCardIndex: 0,
            activeQuestionId: qList.length > 0 ? qList[0].id : null,
            showOfficialMap: {},
            showAiMap: {},
            aiLoadingMap: {},

            get displayItems() {
                if (!Array.isArray(this.questions) || this.questions.length === 0) return [];

                const items = [];
                let currentGroup = null;

                for (let i = 0; i < this.questions.length; i++) {
                    const q = this.questions[i];
                    const groupId = q.question_group_id;

                    if (groupId) {
                        if (currentGroup && currentGroup.group_id === groupId) {
                            currentGroup.questions.push(q);
                        } else {
                            currentGroup = {
                                card_index: items.length,
                                is_group: true,
                                group_id: groupId,
                                section_id: q.section_id,
                                section_number: q.section_number,
                                section_title: q.section_title,
                                stimulus: q.stimulus || null,
                                questions: [q]
                            };
                            items.push(currentGroup);
                        }
                    } else {
                        currentGroup = null;
                        items.push({
                            card_index: items.length,
                            is_group: false,
                            group_id: null,
                            section_id: q.section_id,
                            section_number: q.section_number,
                            section_title: q.section_title,
                            stimulus: q.stimulus || null,
                            questions: [q]
                        });
                    }
                }
                return items;
            },

            get currentCard() {
                return this.displayItems[this.currentCardIndex] || null;
            },

            typeLabel(type) {
                const labels = {
                    'mcq_single': 'Pilihan Ganda',
                    'mcq_multiple': 'Pilihan Ganda Kompleks',
                    'mcq_weighted': 'Pilihan Berbobot',
                    'binary_matrix': 'Benar / Salah',
                    'boolean_matrix': 'Benar / Salah',
                    'matching': 'Menjodohkan',
                    'ordering': 'Mengurutkan',
                    'reorder': 'Mengurutkan',
                    'short_answer': 'Isian Singkat',
                    'fill_blank': 'Isian Singkat',
                    'essay': 'Uraian',
                };
                return labels[type] || 'Soal';
            },

            goToQuestion(qid) {
                const cardIdx = this.displayItems.findIndex(c => c.questions.some(q => q.id === qid));
                if (cardIdx === -1) return;
                this.currentCardIndex = cardIdx;
                this.activeQuestionId = qid;

                this.$nextTick(() => {
                    this.renderMath();
                    const targetEl = document.getElementById('review-question-block-' + qid);
                    if (targetEl) {
                        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            },

            prevCard() {
                if (this.currentCardIndex > 0) {
                    this.currentCardIndex--;
                    this.activeQuestionId = this.displayItems[this.currentCardIndex]?.questions[0]?.id;
                    this.$nextTick(() => this.renderMath());
                }
            },

            nextCard() {
                if (this.currentCardIndex < this.displayItems.length - 1) {
                    this.currentCardIndex++;
                    this.activeQuestionId = this.displayItems[this.currentCardIndex]?.questions[0]?.id;
                    this.$nextTick(() => this.renderMath());
                }
            },

            isFullyCorrect(q) {
                if (!q) return false;
                if (q.is_essay) {
                    return q.points_awarded !== null && q.points_awarded !== undefined && parseFloat(q.points_awarded) >= (parseFloat(q.essay_max_points || q.points) || 1);
                }
                if (q.is_correct === true) return true;
                const maxPts = parseFloat(q.points) || 1;
                return q.is_answered && q.points_awarded !== null && q.points_awarded !== undefined && parseFloat(q.points_awarded) >= maxPts;
            },

            isPartialPoints(q) {
                if (!q) return false;
                if (q.is_essay) {
                    const maxPts = parseFloat(q.essay_max_points || q.points) || 1;
                    return q.points_awarded !== null && q.points_awarded !== undefined && parseFloat(q.points_awarded) > 0 && parseFloat(q.points_awarded) < maxPts;
                }
                if (this.isFullyCorrect(q)) return false;
                return q.is_answered && q.points_awarded !== null && q.points_awarded !== undefined && parseFloat(q.points_awarded) > 0;
            },

            getQuestionStatusBadgeClass(q) {
                if (!q) return 'bg-slate-700';
                if (q.is_essay) {
                    if (q.points_awarded === null || q.points_awarded === undefined) return 'bg-amber-500';
                    return this.isFullyCorrect(q) ? 'bg-emerald-600' : (this.isPartialPoints(q) ? 'bg-orange-500' : 'bg-rose-600');
                }
                if (!q.is_answered) return 'bg-slate-700';
                if (this.isFullyCorrect(q)) return 'bg-emerald-600';
                if (this.isPartialPoints(q)) return 'bg-orange-500';
                return 'bg-rose-600';
            },

            getQuestionBtnClass(q, cIdx) {
                const isCurrentCard = this.currentCardIndex === cIdx;
                const isExactActive = isCurrentCard && (this.activeQuestionId === q.id || (!this.activeQuestionId && this.currentCard?.questions[0]?.id === q.id));

                let base = 'rounded-md text-xs font-bold w-9 h-9 ';
                if (isExactActive) {
                    base = 'rounded-lg text-sm font-extrabold w-10 h-10 shadow-md mx-0.5 border-2 border-blue-600 ring-2 ring-blue-300 ';
                }

                if (q.is_essay) {
                    if (q.points_awarded === null || q.points_awarded === undefined) {
                        return base + 'bg-amber-500 text-white';
                    }
                    if (this.isFullyCorrect(q)) {
                        return base + 'bg-emerald-600 text-white';
                    }
                    if (this.isPartialPoints(q)) {
                        return base + 'bg-orange-500 text-white shadow-xs';
                    }
                    return base + 'bg-rose-600 text-white';
                }
                if (!q.is_answered) {
                    return base + 'bg-slate-700 text-white';
                }
                if (this.isFullyCorrect(q)) {
                    return base + 'bg-emerald-600 text-white';
                }
                if (this.isPartialPoints(q)) {
                    return base + 'bg-orange-500 text-white shadow-xs';
                }
                return base + 'bg-rose-600 text-white';
            },

            toggleOfficial(qId) {
                this.showOfficialMap[qId] = !this.showOfficialMap[qId];
                this.$nextTick(() => this.renderMath());
            },

            async toggleAiExplanation(q) {
                if (!q) return;

                if (this.showAiMap[q.id]) {
                    this.showAiMap[q.id] = false;
                    return;
                }

                if (q.rendered_ai_explanation || q.ai_explanation) {
                    this.showAiMap[q.id] = true;
                    this.$nextTick(() => this.renderMath());
                    return;
                }

                this.aiLoadingMap[q.id] = true;
                try {
                    const sessionUuid = payload.sessionUuid || '';
                    const questionId = q.id;
                    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                    
                    const res = await fetch(`/exam/session/${sessionUuid}/question/${questionId}/ai-explanation`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        }
                    });
                    const resData = await res.json();
                    const aiContent = resData.ai_explanation || resData.content;
                    if ((resData.success || resData.ok) && aiContent) {
                        q.ai_explanation = aiContent;
                        q.rendered_ai_explanation = resData.rendered_ai_explanation || resData.rendered || null;
                        q.ai_model = resData.ai_model || resData.model || 'DEEPSEEK V4 Pro Reasoner';
                        this.showAiMap[q.id] = true;
                        this.$nextTick(() => this.renderMath());
                    } else {
                        alert(resData.message || resData.error || 'Gagal memuat pembahasan AI.');
                    }
                } catch (err) {
                    console.error('AI Explanation Error:', err);
                    alert('Terjadi kesalahan saat memuat pembahasan AI.');
                } finally {
                    this.aiLoadingMap[q.id] = false;
                }
            },

            isOptionCorrect(opt) {
                return !!opt.is_correct;
            },

            isOptionChosenByStudent(q, opt) {
                if (!q || !opt) return false;
                const p = q.answer_payload;
                if (!p) return false;
                if (p.option_id !== undefined) return p.option_id === opt.id;
                if (Array.isArray(p.option_ids)) return p.option_ids.includes(opt.id);
                return false;
            },

            formatStudentAnswer(q) {
                if (q.formatted_student_answer !== undefined && q.formatted_student_answer !== null && q.formatted_student_answer !== '') {
                    return q.formatted_student_answer;
                }
                if (!q.is_answered) return 'Tidak dijawab.';
                if (q.is_essay) return q.student_text || '(Tidak ada teks jawaban)';
                if (q.selected_option) return q.selected_option;
                const p = q.answer_payload || {};
                if (p.value) return p.value;
                if (p.answers) return JSON.stringify(p.answers);
                if (p.pairs) return JSON.stringify(p.pairs);
                if (p.order) return 'Urutan: ' + p.order.join(' → ');
                return 'Jawaban tersimpan.';
            },

            formatCorrectAnswer(q) {
                if (q.formatted_correct_answer !== undefined && q.formatted_correct_answer !== null && q.formatted_correct_answer !== '') {
                    return q.formatted_correct_answer;
                }
                if (q.type === 'short_answer' || q.type === 'fill_blank') {
                    return q.options?.map(o => o.content).join(', ') || 'Sesuai kunci guru';
                }
                if (q.type === 'binary_matrix') {
                    return q.options?.map(o => (o.content || o.label) + ': ' + (o.match_key || 'Benar')).join(' | ');
                }
                if (q.type === 'matching') {
                    return q.options?.map(o => o.content + ' ➔ ' + o.match_key).join(' | ');
                }
                if (q.type === 'ordering') {
                    return q.options?.map((o, i) => (i+1) + '. ' + o.content).join(' → ');
                }
                return 'Sesuai kunci sistem.';
            },

            renderStimulusHtml(stimulus) {
                if (!stimulus) return '';
                let html = '';
                if (stimulus.rendered) {
                    html += stimulus.rendered;
                } else if (stimulus.content) {
                    html += this.renderRich(stimulus.content);
                }
                return html;
            },

            // Polling State
            gradingStatus: '{{ $session->grading_status }}',
            sessionUuid: '{{ $session->uuid }}',

            init() {
                if (this.gradingStatus === 'pending' || this.gradingStatus === 'processing') {
                    this.startPolling();
                }

                this.$watch('currentCardIndex', () => {
                    this.renderMath();
                });
                this.$nextTick(() => {
                    this.renderMath();
                });
            },

            startPolling() {
                const interval = setInterval(async () => {
                    try {
                        const res = await fetch(`/exam/session/${this.sessionUuid}/grading-status`, {
                            headers: { 'Accept': 'application/json' }
                        });
                        const data = await res.json();
                        if (data.is_ready || data.status === 'completed' || data.status === 'failed') {
                            clearInterval(interval);
                            window.location.reload();
                        }
                    } catch (e) {}
                }, 3000); // Polling setiap 3 detik untuk mengurangi beban di Cloudflare & VPS
            },

            renderMath() {
                this.$nextTick(() => {
                    if (window.renderMathInElement) {
                        document.querySelectorAll('.prose-q').forEach(el => {
                            try {
                                window.renderMathInElement(el, {
                                    delimiters: [
                                        { left: '$$', right: '$$', display: true },
                                        { left: '$', right: '$', display: false },
                                        { left: '\\(', right: '\\)', display: false },
                                        { left: '\\[', right: '\\]', display: true },
                                    ],
                                    ignoredTags: ['script','noscript','style','textarea','pre','code'],
                                    throwOnError: false,
                                });
                            } catch(_) {}
                        });
                    }
                });
            },

            renderRich(text) {
                if (!text) return '';
                let raw = text;
                if (window.marked && typeof window.marked.parse === 'function') {
                    try { raw = window.marked.parse(raw, { gfm: true, breaks: true }); } catch(_) {}
                }
                this.renderMath();
                return raw;
            }
        };
    }

    window.examReview = examReview;
    if (window.Alpine) {
        window.Alpine.data('examReview', (data) => examReview(data || window.__reviewData));
    } else {
        document.addEventListener('alpine:init', () => {
            window.Alpine.data('examReview', (data) => examReview(data || window.__reviewData));
        });
    }
    </script>
</body>
</html>
