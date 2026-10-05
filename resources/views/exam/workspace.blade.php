{{-- resources/views/exam/workspace.blade.php --}}
<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $assessment->title }} — ADZKIA CBT</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('adzkia black app.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('adzkia black app.png') }}">

    <!-- Font Open Sans (Body) & Outfit (Heading/Aksen) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- KaTeX --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/contrib/auto-render.min.js"></script>
    {{-- Marked (Markdown → HTML) --}}
    <script src="https://cdn.jsdelivr.net/npm/marked@12.0.0/marked.min.js"></script>

    {{-- CBT Exam Payload Object (Safe native JS script) --}}
    <script>
        window.__cbtPayload = {!! json_encode($payload, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE) !!};
    </script>

    <style>
        body { font-family: 'Open Sans', sans-serif; background-color: #f4f5f7 !important; }
        .font-display { font-family: 'Outfit', sans-serif; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        [x-cloak] { display:none !important; }

        /* Prose styles */
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

        /* Animation */
        @keyframes timer-blink { 0%,100%{opacity:1} 50%{opacity:.35} }
        .timer-critical { animation: timer-blink 1s ease-in-out infinite; }
    </style>
</head>

<body class="h-screen w-screen overflow-hidden bg-[#a5d8ff] flex justify-center text-[#212529] antialiased"
      x-data="examWorkspace(window.__cbtPayload)" x-cloak>

    <main class="w-full h-full lg:h-screen lg:max-w-4xl bg-white flex flex-col relative lg:shadow-2xl lg:border-x border-blue-200/60">

        @php
            $tenant = $session->tenant ?? $session->assessment->tenant ?? auth()->user()->currentTenant ?? (app()->has('currentTenant') ? app('currentTenant') : null);
            $authUser = auth()->user();

            // Kalkulasi inisial nama asesmen untuk mobile view
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

        <!-- HEADER (WARNA #339af0, LOGO ADZKIA BULAT + TENANT + FOTO PROFIL, NAMA & SECTION DI TENGAH) -->
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

            <!-- Center: NAMA ASESMEN & SECTION (Tengah Header, Truncate jika panjang) -->
            <div class="flex-1 min-w-0 px-2 sm:px-4 text-center">
                <!-- Desktop & Tablet (sm and above): Full Title and Section with Truncate -->
                <div class="hidden sm:block min-w-0">
                    <h1 class="font-display font-extrabold text-sm sm:text-base text-white leading-tight truncate mx-auto max-w-xs md:max-w-md lg:max-w-lg"
                        title="{{ $assessment->title }}">
                        {{ $assessment->title }}
                    </h1>
                    <template x-if="currentSectionTitle">
                        <p class="font-display text-[11px] sm:text-xs text-blue-100 font-semibold truncate mx-auto max-w-xs md:max-w-sm lg:max-w-md mt-0.5 tracking-wide"
                           :title="currentSectionTitle"
                           x-text="currentSectionTitle">
                        </p>
                    </template>
                </div>

                <!-- Mobile (< sm): Hide full names, show assessment initials + optional section badge -->
                <div class="sm:hidden flex items-center justify-center gap-1.5 min-w-0">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-md bg-white/20 border border-white/30 text-white font-display font-black text-xs tracking-wider"
                          title="{{ $assessment->title }}">
                        {{ $assessmentInitials }}
                    </span>
                    <template x-if="currentSectionTitle">
                        <span class="text-[10px] text-blue-100 font-bold truncate max-w-[110px] bg-black/15 px-1.5 py-0.5 rounded"
                              :title="currentSectionTitle"
                              x-text="currentSectionTitle">
                        </span>
                    </template>
                </div>
            </div>

            <!-- Right: Timer Section (jika ada), Timer Utama, Status Simpan -->
            <div class="flex items-center gap-1.5 sm:gap-2 shrink-0">
                <!-- Save state indicator -->
                <div class="hidden md:flex items-center gap-1 bg-white/15 px-2.5 py-1.5 rounded-xl border border-white/20 text-[11px] text-blue-50">
                    <template x-if="saveState === 'saving'">
                        <span class="flex items-center gap-1 text-amber-200 font-semibold">
                            <svg class="h-3 w-3 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" opacity=".2"/><path d="M12 2a10 10 0 0 1 10 10"/></svg>
                            Simpan…
                        </span>
                    </template>
                    <template x-if="saveState === 'saved'">
                        <span class="text-white font-medium flex items-center gap-1">
                            <svg class="h-3.5 w-3.5 text-blue-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            Tersimpan
                        </span>
                    </template>
                    <template x-if="saveState === 'error'">
                        <span class="text-rose-200 font-bold">Offline / Pending</span>
                    </template>
                    <template x-if="saveState === 'idle'">
                        <span>Auto-save</span>
                    </template>
                </div>

                <!-- Timer Section (Hanya Tampil Jika Section Memiliki Durasi) -->
                <template x-if="hasSectionTimer">
                    <div class="flex items-center gap-1.5 bg-amber-400/25 px-2 sm:px-2.5 py-1.5 rounded-xl border border-amber-200/40 text-white shadow-inner"
                         :class="sectionRemainingSeconds <= 60 ? 'bg-rose-500/80 border-rose-300 timer-critical animate-pulse' : ''"
                         title="Sisa Waktu Bagian/Section Ini">
                        <svg class="w-3.5 h-3.5 text-amber-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="text-[10px] font-extrabold uppercase tracking-wider text-amber-100 shrink-0">Bagian <span x-text="activeSectionNumber"></span>:</span>
                        <span class="font-display text-xs sm:text-sm font-bold tabular-nums tracking-wider text-white shrink-0" x-text="formattedSectionTime">--:--</span>
                    </div>
                </template>

                <!-- Timer Ujian Utama -->
                <div class="flex items-center gap-1.5 sm:gap-2 bg-white/20 px-2.5 sm:px-3 py-1.5 rounded-xl border border-white/30 shadow-inner"
                     :class="remainingSeconds <= 300 ? 'bg-red-500/80 border-red-300 timer-critical' : ''"
                     title="Sisa Waktu Total Ujian">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="text-blue-100 shrink-0">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <span class="font-display text-xs sm:text-sm font-bold tabular-nums tracking-wider text-white" x-text="formattedTime">--:--</span>
                </div>
            </div>
        </header>

        <!-- PROGRESS BAR -->
        <div class="h-2 w-full bg-slate-200/90 shadow-inner shrink-0 overflow-hidden">
            <div class="h-full transition-all duration-500 rounded-r-full shadow-sm"
                 :style="'width:' + Math.round(answeredCount / Math.max(questions.length, 1) * 100) + '%; background: linear-gradient(to right, #ff922b, #d9480f);'"></div>
        </div>

        <!-- WARNING BANNER -->
        <div x-show="warningBanner" x-transition
             class="shrink-0 z-20 flex items-center justify-between gap-3 border-b border-[#f59f00]/40 bg-[#ffec99] px-4 py-2 text-xs text-[#212529] font-medium">
            <div class="flex items-center gap-2">
                <span>⚠️</span>
                <span x-text="warningMessage"></span>
            </div>
            <button @click="warningBanner = false" class="text-[#212529] hover:text-black font-bold">✕</button>
        </div>

        <!-- AREA SOAL & JAWABAN -->
        <section class="flex-1 overflow-y-auto p-5 md:p-8 space-y-5">

            <template x-if="!questions || questions.length === 0">
                <div class="rounded-2xl border border-[#ced4da] bg-white p-8 text-center text-[#212529]">
                    <p class="font-bold text-lg mb-1 font-display">Belum ada butir soal pada ujian ini.</p>
                    <p class="text-sm text-neutral/70">Silakan hubungi pengawas atau guru pengampu ujian.</p>
                </div>
            </template>

            <template x-for="(card, cardIdx) in displayItems" :key="card.card_index">
                <article x-show="currentCardIndex === cardIdx" :data-card-index="cardIdx" class="space-y-6">

                    <!-- Banner jika Section telah habis waktunya (Terkunci) -->
                    <template x-if="isCardLocked(card)">
                        <div class="rounded-2xl border-2 border-red-200 bg-red-50/80 p-8 text-center text-red-950 space-y-3 shadow-xs my-4">
                            <div class="w-14 h-14 mx-auto rounded-full bg-red-100 border border-red-300 flex items-center justify-center text-3xl shadow-xs">
                                🔒
                            </div>
                            <h3 class="font-display font-extrabold text-lg text-red-950">Waktu Bagian Ini Telah Habis</h3>
                            <p class="text-sm font-medium text-red-800/90 max-w-md mx-auto leading-relaxed">
                                Waktu pengerjaan untuk bagian ini telah berakhir. Sesuai ketentuan ujian, soal dan jawaban pada bagian yang telah selesai dikunci dan tidak dapat dilihat maupun diubah kembali.
                            </p>
                        </div>
                    </template>

                    <div x-show="!isCardLocked(card)" class="space-y-6">
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
                                <div class="prose-q text-sm md:text-base text-[#212529] leading-relaxed"
                                     x-html="renderStimulusHtml(card.stimulus)"></div>
                            </div>
                        </template>

                        <!-- Header Pembagi jika Kartu Menaungi Banyak Soal Sekaligus -->
                        <template x-if="card.is_group && card.questions.length > 1">
                            <div class="flex items-center justify-between pt-1 pb-1 border-b border-blue-200/80">
                                <h3 class="font-display font-extrabold text-xs sm:text-sm text-blue-950 uppercase tracking-wider flex items-center gap-2">
                                    <span>Butir-Butir Soal Berdasarkan Wacana Di Atas</span>
                                    <span class="text-xs font-bold text-blue-700 bg-blue-100 border border-blue-300 px-2 py-0.5 rounded-md" x-text="'(' + card.questions.length + ' Soal)'"></span>
                                </h3>
                            </div>
                        </template>

                        <!-- Loop Seluruh Soal di dalam Kartu Ini (Soal Tunggal atau Anak Soal Stimulus) -->
                        <div class="space-y-6">
                            <template x-for="q in card.questions" :key="q.id">
                                <div :id="'question-block-' + q.id" class="p-5 md:p-6 rounded-2xl border border-[#ced4da] bg-white space-y-4 shadow-xs transition-all">
                                    <!-- Header nomor soal & aksi ragu-ragu -->
                                    <div class="flex items-center justify-between gap-3 pb-2 border-b border-[#ced4da]/50">
                                        <div class="flex items-center gap-2.5">
                                            <span class="font-display text-base md:text-lg font-bold text-[#212529]"
                                                  x-text="'Soal Nomor ' + q.number"></span>
                                            <span class="px-2 py-0.5 rounded-md bg-[#ced4da]/30 text-[10px] font-bold uppercase tracking-wider text-[#212529]/70"
                                                  x-text="typeLabel(q.type)"></span>
                                            <span class="text-xs text-[#212529]/60 font-semibold"
                                                  x-text="q.points + ' Poin'"></span>
                                        </div>

                                        <button type="button" @click="toggleFlag(q.id)"
                                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg border text-xs font-bold transition-all cursor-pointer font-display"
                                                :class="isFlagged(q.id)
                                                    ? 'border-[#f59f00] bg-[#ffec99] text-[#f76707]'
                                                    : 'border-[#ced4da] bg-white text-[#212529]/70 hover:border-[#f59f00]/60 hover:text-[#f76707]'">
                                            <span x-text="isFlagged(q.id) ? '⚑ Ragu-ragu' : 'Tandai Ragu'"></span>
                                        </button>
                                    </div>

                                    <!-- Teks Paragraf / Soal (Stem) -->
                                    <div class="text-[#212529] text-base md:text-lg leading-relaxed prose-q font-medium"
                                         x-html="q.rendered_stem || renderRich(q.stem)"></div>

                                    <!-- ── 1. mcq_single, mcq_multiple, mcq_weighted ── -->
                                    <div x-show="['mcq_single','mcq_multiple','mcq_weighted'].includes(q.type)" class="space-y-3 pb-2">
                                        <template x-for="opt in q.options" :key="opt.id">
                                            <label class="flex items-start gap-3 p-4 rounded-xl border cursor-pointer transition-all group"
                                                   :class="isChosen(q, opt)
                                                       ? 'border-2 border-[#339af0] bg-blue-50/70 shadow-xs ring-1 ring-[#339af0]/20'
                                                       : 'border-[#ced4da] bg-white hover:border-[#339af0]/60 hover:bg-blue-50/30'">
                                                <input :type="q.type === 'mcq_multiple' ? 'checkbox' : 'radio'"
                                                       :name="'mcq_choice_' + q.id"
                                                       class="mt-0.5 w-4 h-4 text-[#339af0] shrink-0 focus:ring-[#339af0] accent-[#339af0] cursor-pointer"
                                                       :checked="isChosen(q, opt)"
                                                       @change="toggleOption(q, opt)">
                                                <span class="text-sm md:text-base leading-snug flex-1 prose-q"
                                                      :class="isChosen(q, opt) ? 'text-[#212529] font-semibold' : 'text-[#212529]/80 font-medium group-hover:text-[#212529]'"
                                                      x-html="opt.rendered_content || renderRich(opt.content)"></span>
                                            </label>
                                        </template>
                                    </div>

                                    <!-- ── 2. short_answer / fill_blank ── -->
                                    <div x-show="['short_answer', 'fill_blank'].includes(q.type)" class="space-y-2 pb-2">
                                        <label class="block font-display text-xs font-bold uppercase tracking-wider text-[#212529]/70">Jawaban Singkat:</label>
                                        <input type="text"
                                                :value="getAnswerPayload(q.id)?.value ?? ''"
                                                @input.debounce.400ms="setFillBlank(q.id, $event.target.value)"
                                                placeholder="Ketikkan jawaban Anda di sini…"
                                                class="w-full p-4 rounded-xl border border-[#ced4da] bg-white text-[#212529] text-base outline-none focus:border-2 focus:border-blue-600 focus:bg-blue-50/10 transition-all font-medium">
                                        <p class="text-xs text-[#212529]/60">Perhatikan penulisan ejaan saat mengetik jawaban.</p>
                                    </div>

                                    <!-- ── 3. binary_matrix / boolean_matrix ── -->
                                    <div x-show="['binary_matrix', 'boolean_matrix'].includes(q.type)" class="overflow-x-auto rounded-xl border-2 border-blue-200 bg-white shadow-xs pb-1">
                                        <table class="w-full text-sm border-collapse bg-white">
                                            <thead class="bg-blue-50/80 border-b-2 border-blue-200">
                                                <tr>
                                                    <th class="py-3.5 px-4 text-left font-display text-xs uppercase tracking-wider text-blue-950 font-bold border-r border-blue-200">Pernyataan</th>
                                                    <th class="py-3.5 px-4 text-center font-display text-xs uppercase tracking-wider text-blue-700 bg-blue-100/40 font-bold w-28 border-r border-blue-200">Benar</th>
                                                    <th class="py-3.5 px-4 text-center font-display text-xs uppercase tracking-wider text-rose-600 bg-rose-50/40 font-bold w-28">Salah</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-blue-200">
                                                <template x-for="(opt, ri) in q.options" :key="opt.id">
                                                    <tr class="divide-x divide-blue-200 hover:bg-blue-50/30 transition">
                                                        <td class="py-3.5 px-4 text-[#212529] prose-q leading-relaxed font-medium" x-html="opt.rendered_content || renderRich(opt.content)"></td>
                                                        <td class="py-3.5 px-4 text-center bg-blue-50/10">
                                                            <label class="p-2 inline-flex items-center justify-center cursor-pointer">
                                                                <input type="radio"
                                                                       :name="'bool_'+q.id+'_'+ri"
                                                                       :checked="getBoolAnswer(q.id, opt.id) === true"
                                                                       @change="setBoolAnswer(q.id, opt.id, true)"
                                                                       class="w-4 h-4 text-blue-600 accent-blue-600 cursor-pointer">
                                                            </label>
                                                        </td>
                                                        <td class="py-3.5 px-4 text-center bg-rose-50/10">
                                                            <label class="p-2 inline-flex items-center justify-center cursor-pointer">
                                                                <input type="radio"
                                                                       :name="'bool_'+q.id+'_'+ri"
                                                                       :checked="getBoolAnswer(q.id, opt.id) === false"
                                                                       @change="setBoolAnswer(q.id, opt.id, false)"
                                                                       class="w-4 h-4 text-[#f03e3e] accent-[#f03e3e] cursor-pointer">
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- ── 4. matching ── -->
                                    <div x-show="q.type === 'matching'" class="space-y-3 pb-2">
                                        <p class="text-xs text-[#212529]/70 font-medium">Pasangkan pernyataan di sebelah kiri dengan pilihan yang tepat di sebelah kanan (setiap pilihan hanya dapat digunakan satu kali):</p>
                                        <template x-for="opt in q.options" :key="opt.id">
                                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl border border-[#ced4da] bg-white hover:border-[#339af0] transition">
                                                <span class="prose-q flex-1 text-sm md:text-base font-semibold text-[#212529]" x-html="opt.rendered_content || renderRich(opt.content)"></span>
                                                <div class="sm:w-64 shrink-0">
                                                    <select class="w-full p-2.5 rounded-lg border border-[#ced4da] bg-white text-sm text-[#212529] font-medium outline-none focus:border-2 focus:border-[#339af0] transition cursor-pointer"
                                                            @change="setMatchPair(q.id, opt.id, $event.target.value)">
                                                        <option value="">— Pilih Pasangan —</option>
                                                        <template x-for="target in getMatchingTargets(q)" :key="target">
                                                            <option :value="target"
                                                                    :selected="getMatchAnswer(q.id, opt.id) === target"
                                                                    :disabled="isMatchTargetTaken(q.id, opt.id, target)"
                                                                    x-text="target + (isMatchTargetTaken(q.id, opt.id, target) ? ' (Sudah dipilih)' : '')"></option>
                                                        </template>
                                                    </select>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                    <!-- ── 5. ordering / reorder ── -->
                                    <div x-show="['ordering', 'reorder'].includes(q.type)" class="space-y-3 pb-2">
                                        <p class="text-xs text-[#212529]/70 font-medium">Urutkan tahapan dari yang paling awal hingga akhir dengan tombol Naik atau Turun:</p>
                                        <div class="space-y-2">
                                            <template x-for="(opt, oIdx) in getOrderItems(q)" :key="opt.id">
                                                <div class="flex items-center gap-3 p-3.5 rounded-xl border border-[#ced4da] bg-white shadow-2xs">
                                                    <span class="font-display h-7 w-7 rounded-lg bg-blue-100 text-blue-900 border border-blue-300 font-extrabold flex items-center justify-center text-xs shrink-0"
                                                          x-text="oIdx + 1"></span>
                                                    <span class="prose-q flex-1 text-sm font-medium text-[#212529]" x-html="opt.rendered_content || renderRich(opt.content)"></span>
                                                    <div class="flex items-center gap-1 shrink-0">
                                                        <button type="button"
                                                                @click="moveOrderItem(q, oIdx, oIdx - 1)"
                                                                :disabled="oIdx === 0"
                                                                class="px-2.5 py-1 rounded-md border border-[#ced4da] bg-[#f4f5f7] text-xs font-bold text-[#212529] hover:bg-blue-50 active:scale-95 disabled:opacity-30 disabled:pointer-events-none transition cursor-pointer">
                                                            ▲ Naik
                                                        </button>
                                                        <button type="button"
                                                                @click="moveOrderItem(q, oIdx, oIdx + 1)"
                                                                :disabled="oIdx === getOrderItems(q).length - 1"
                                                                class="px-2.5 py-1 rounded-md border border-[#ced4da] bg-[#f4f5f7] text-xs font-bold text-[#212529] hover:bg-blue-50 active:scale-95 disabled:opacity-30 disabled:pointer-events-none transition cursor-pointer">
                                                            ▼ Turun
                                                        </button>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>

                                    <!-- ── 6. essay ── -->
                                    <div x-show="q.type === 'essay'" class="space-y-3 pb-2">
                                        <div class="rounded-xl border border-[#ced4da] bg-[#f4f5f7] p-3 text-xs text-[#212529]">
                                            <span class="font-bold block mb-1">Petunjuk Jawaban Uraian / Essay:</span>
                                            Tuliskan uraian Anda secara runtut dan jelas. Gunakan tombol pemformat untuk teks <code class="px-1 py-0.5 rounded bg-white">**tebal**</code>, <code class="px-1 py-0.5 rounded bg-white">*miring*</code>, dan rumus <code class="px-1 py-0.5 rounded bg-white font-mono">$f(x)$</code>.
                                        </div>

                                        <div class="flex items-center gap-1.5 p-2 rounded-xl bg-white border border-[#ced4da]">
                                            <span class="text-[11px] font-bold text-[#212529]/60 mr-1 hidden sm:inline">Pintasan:</span>
                                            <button type="button" @mousedown.prevent="" @click="insertEssayFormat(q.id, '**', '**')" class="px-2.5 py-1 rounded bg-[#f4f5f7] hover:bg-[#ced4da] text-xs font-bold text-[#212529] cursor-pointer">B</button>
                                            <button type="button" @mousedown.prevent="" @click="insertEssayFormat(q.id, '*', '*')" class="px-2.5 py-1 rounded bg-[#f4f5f7] hover:bg-[#ced4da] text-xs italic font-serif text-[#212529] cursor-pointer">I</button>
                                            <button type="button" @mousedown.prevent="" @click="insertEssayFormat(q.id, '<u>', '</u>')" class="px-2.5 py-1 rounded bg-[#f4f5f7] hover:bg-[#ced4da] text-xs underline text-[#212529] cursor-pointer">U</button>
                                            <button type="button" @mousedown.prevent="" @click="insertEssayFormat(q.id, '$', '$')" class="px-2.5 py-1 rounded bg-blue-50 hover:bg-blue-100 text-xs font-mono font-bold text-blue-700 border border-blue-200 cursor-pointer">$f(x)$</button>
                                        </div>

                                        <textarea
                                            :id="'essay_input_' + q.id"
                                            rows="7"
                                            :value="getAnswerPayload(q.id)?.text ?? ''"
                                            @input.debounce.500ms="setEssay(q.id, $event.target.value)"
                                            placeholder="Ketik uraian jawaban Anda di sini…"
                                            class="w-full p-4 rounded-xl border border-[#ced4da] bg-white text-sm text-[#212529] outline-none focus:border-2 focus:border-blue-600 focus:bg-blue-50/10 transition min-h-[180px]"></textarea>
                                    </div>

                                </div>
                            </template>
                        </div>

                        <!-- Tombol Navigasi Bawah Kartu (Sebelumnya / Selanjutnya) -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <button type="button" @click="prevCard()" :disabled="currentCardIndex === 0"
                                    class="px-4 py-2 rounded-xl border border-gray-300 bg-white hover:bg-gray-50 active:scale-95 disabled:opacity-40 disabled:pointer-events-none text-xs font-bold text-gray-800 transition cursor-pointer flex items-center gap-1.5 font-display">
                                ← Bagian Sebelumnya
                            </button>
                            <button type="button" @click="nextCard()" :disabled="currentCardIndex === displayItems.length - 1"
                                    class="px-4 py-2 rounded-xl bg-blue-600 hover:bg-blue-700 active:scale-95 disabled:opacity-40 disabled:pointer-events-none text-xs font-bold text-white shadow-xs transition cursor-pointer flex items-center gap-1.5 font-display">
                                Bagian Selanjutnya →
                            </button>
                        </div>
                    </div>
                </article>
            </template>

        </section>

        <!-- FOOTER / NAVIGASI NOMOR SOAL -->
        <footer class="shrink-0 bg-[#d0ebff] border-t border-blue-200/80 flex items-center z-10 shadow-[0_-10px_15px_-3px_rgba(0,0,0,0.05)] px-3 py-2.5 gap-2">
            <!-- Container Nomor Soal (Scrollable secara horizontal) -->
            <div class="flex-1 flex items-center overflow-x-auto hide-scrollbar gap-2 py-0.5">
                <template x-for="(card, cIdx) in displayItems" :key="card.card_index">
                    <div class="shrink-0 flex items-center">
                        <!-- JIKA KARTU MULTI-SOAL (GROUP) -->
                        <template x-if="card.is_group && card.questions.length > 1">
                            <div class="inline-flex items-center gap-1.5 p-1 rounded-xl transition-all"
                                 :class="currentCardIndex === cIdx
                                     ? 'bg-blue-300/70 border-2 border-blue-600 shadow-sm ring-2 ring-blue-500/20'
                                     : 'bg-white/70 border border-blue-200/90'">
                                <div class="px-1.5 py-0.5 rounded bg-blue-700 text-white text-[9px] font-black uppercase tracking-wider shrink-0 select-none">
                                    <span x-text="card.questions.length + ' Soal'"></span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <template x-for="q in card.questions" :key="q.id">
                                        <button type="button" @click="goToQuestion(q.id)"
                                                :disabled="isQuestionLocked(q)"
                                                :title="isQuestionLocked(q) ? 'Waktu bagian ini telah habis (Terkunci)' : 'Soal nomor ' + q.number"
                                                class="font-display shrink-0 flex items-center justify-center transition-all select-none"
                                                :class="{
                                                    'w-8 h-8 rounded-md text-xs font-bold bg-slate-200/90 text-slate-400 border border-slate-300/80 opacity-60 cursor-not-allowed': isQuestionLocked(q),
                                                    'w-8 h-8 rounded-md text-xs font-bold bg-[#f59f00] text-white cursor-pointer': !isQuestionLocked(q) && isFlagged(q.id),
                                                    'w-8 h-8 rounded-md text-xs font-bold bg-blue-600 text-white shadow-xs cursor-pointer': !isQuestionLocked(q) && !isFlagged(q.id) && isAnsweredQ(q.id),
                                                    'w-8 h-8 rounded-md text-xs font-bold bg-slate-800 text-white cursor-pointer': !isQuestionLocked(q) && !isFlagged(q.id) && !isAnsweredQ(q.id) && visited[q.id],
                                                    'w-8 h-8 rounded-md text-xs font-bold bg-slate-200 text-slate-700 cursor-pointer': !isQuestionLocked(q) && !isFlagged(q.id) && !isAnsweredQ(q.id) && !visited[q.id],
                                                }">
                                            <span x-text="q.number"></span>
                                            <span x-show="isQuestionLocked(q)" class="text-[8px] ml-0.5">🔒</span>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <!-- JIKA KARTU STANDALONE (TUNGGAL) -->
                        <template x-if="!card.is_group || card.questions.length === 1">
                            <button type="button" @click="goToQuestion(card.questions[0].id)"
                                    :disabled="isQuestionLocked(card.questions[0])"
                                    :title="isQuestionLocked(card.questions[0]) ? 'Waktu bagian ini telah habis (Terkunci)' : 'Soal nomor ' + card.questions[0].number"
                                    class="font-display shrink-0 flex items-center justify-center transition-all select-none"
                                    :class="{
                                        'w-9 h-9 rounded-md text-xs font-bold bg-slate-200/90 text-slate-400 border border-slate-300/80 opacity-60 cursor-not-allowed': isQuestionLocked(card.questions[0]),
                                        'w-10 h-10 rounded-lg text-sm font-extrabold bg-blue-100 text-blue-900 shadow-md mx-1 border-2 border-blue-500 cursor-pointer': !isQuestionLocked(card.questions[0]) && currentCardIndex === cIdx,
                                        'w-9 h-9 rounded-md text-xs font-bold bg-[#f59f00] text-white cursor-pointer': !isQuestionLocked(card.questions[0]) && currentCardIndex !== cIdx && isFlagged(card.questions[0].id),
                                        'w-9 h-9 rounded-md text-xs font-bold bg-blue-600 text-white shadow-xs cursor-pointer': !isQuestionLocked(card.questions[0]) && currentCardIndex !== cIdx && !isFlagged(card.questions[0].id) && isAnsweredQ(card.questions[0].id),
                                        'w-9 h-9 rounded-md text-xs font-bold bg-slate-800 text-white cursor-pointer': !isQuestionLocked(card.questions[0]) && currentCardIndex !== cIdx && !isFlagged(card.questions[0].id) && !isAnsweredQ(card.questions[0].id) && visited[card.questions[0].id],
                                        'w-9 h-9 rounded-md text-xs font-bold bg-slate-200 text-slate-700 cursor-pointer': !isQuestionLocked(card.questions[0]) && currentCardIndex !== cIdx && !isFlagged(card.questions[0].id) && !isAnsweredQ(card.questions[0].id) && !visited[card.questions[0].id],
                                    }">
                                <span x-text="card.questions[0].number"></span>
                                <span x-show="isQuestionLocked(card.questions[0])" class="text-[9px] ml-0.5">🔒</span>
                            </button>
                        </template>
                    </div>
                </template>
            </div>

            <!-- Tombol SUBMIT (Selalu Terlihat & Bisa Dikumpulkan Kapan Saja) -->
            <div class="shrink-0 pl-1 border-l border-blue-300/70 flex items-center">
                <button type="button" @click="openSubmitModal()"
                        class="font-display h-9 px-4 rounded-md text-xs font-bold bg-[#f03e3e] text-white flex items-center gap-1.5 hover:bg-red-600 active:scale-95 transition-all shadow-sm cursor-pointer whitespace-nowrap"
                        title="Kumpulkan lembar ujian sekarang">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    <span>SUBMIT</span>
                </button>
            </div>
        </footer>

    </main>

    <!-- MODAL WAKTU HABIS (AUTO-SUBMIT 3 DETIK KE ANALISA) -->
    <div x-show="timeUpModal" x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-slate-900/80 backdrop-blur-xs"></div>
        <div class="relative w-full max-w-md rounded-2xl border border-blue-200 bg-white p-6 shadow-2xl text-center">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-3xl shadow-inner animate-pulse">
                ⏰
            </div>
            <h2 class="font-display text-xl font-bold text-[#212529] mb-2">Waktu Ujian Telah Habis!</h2>
            <p class="text-sm font-medium text-slate-700 leading-relaxed mb-4">
                Jawaban Anda dikumpulkan secara otomatis.
            </p>
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[#d0ebff] text-blue-900 text-xs font-bold">
                <svg class="h-4 w-4 animate-spin text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke-width="4" opacity=".2"/><path stroke-width="4" d="M12 2a10 10 0 0 1 10 10"/>
                </svg>
                <span>Membuka halaman Analisa dalam <span class="text-blue-800 text-sm font-extrabold" x-text="timeUpCountdown">3</span> detik...</span>
            </div>
        </div>
    </div>

    <!-- MODAL KONFIRMASI SUBMIT -->
    <div x-show="showSubmitModal" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
         class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60 backdrop-blur-xs" @click="showSubmitModal = false"></div>
        <div class="relative w-full max-w-md rounded-2xl border border-[#ced4da] bg-white p-6 shadow-2xl">
            <h2 class="font-display text-xl font-bold text-[#212529] mb-1">Kumpulkan Ujian (SUBMIT)?</h2>
            <p class="text-xs text-[#212529]/70 leading-relaxed">
                Pastikan seluruh jawaban telah Anda periksa dengan seksama. Setelah menekan tombol <strong>SUBMIT</strong>, Anda akan diarahkan ke halaman pembahasan dan hasil pengerjaan.
            </p>

            <div class="mt-4 space-y-2 rounded-xl border border-[#ced4da]/50 bg-[#f4f5f7] p-4 text-xs font-semibold text-[#212529]">
                <div class="flex justify-between">
                    <span class="text-[#212529]/70">Total Soal</span>
                    <span x-text="questions.length"></span>
                </div>
                <div class="flex justify-between text-blue-600">
                    <span>Sudah Terjawab</span>
                    <span x-text="answeredCount"></span>
                </div>
                <div class="flex justify-between" :class="(questions.length - answeredCount) > 0 ? 'text-[#f03e3e]' : 'text-[#212529]'">
                    <span>Belum Dijawab</span>
                    <span x-text="questions.length - answeredCount"></span>
                </div>
                <div class="flex justify-between text-[#f59f00]" x-show="flaggedCount > 0">
                    <span>Ditandai Ragu</span>
                    <span x-text="flaggedCount"></span>
                </div>
            </div>

            <div x-show="questions.length - answeredCount > 0"
                 class="mt-3 rounded-lg border border-[#f59f00]/40 bg-[#ffec99] px-3.5 py-2.5 text-xs text-[#f76707] font-bold">
                ⚠️ Masih ada <span x-text="questions.length - answeredCount"></span> butir soal yang belum dijawab.
            </div>

            <div class="mt-5 flex gap-3">
                <button type="button" @click="showSubmitModal = false"
                        class="font-display flex-1 rounded-xl border border-[#ced4da] bg-white py-2.5 text-xs font-bold text-[#212529] hover:bg-[#f4f5f7] transition cursor-pointer">
                    Periksa Lagi
                </button>
                <button type="button" @click="doSubmit()" :disabled="submitting"
                        class="font-display flex flex-1 items-center justify-center gap-1.5 rounded-xl bg-[#f03e3e] py-2.5 text-xs font-bold text-white hover:bg-red-600 transition shadow-sm disabled:opacity-60 cursor-pointer">
                    <svg x-show="submitting" class="h-3.5 w-3.5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" opacity=".2"/><path d="M12 2a10 10 0 0 1 10 10"/>
                    </svg>
                    <span x-text="submitting ? 'Mengumpulkan…' : 'SUBMIT'"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- LOCK SCREEN OVERLAY (Dengan Pengawas: Pelanggaran Terdeteksi) -->
    <div x-show="isViolatedLocked" 
         x-transition.opacity
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-12/90 backdrop-blur-md"
         style="display: none;">
        <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl border-2 border-red-500 overflow-hidden">
            <!-- Header Banner -->
            <div class="bg-gradient-to-r from-red-600 via-rose-600 to-red-700 p-6 text-white text-center relative">
                <div class="w-16 h-16 mx-auto rounded-2xl bg-white/20 backdrop-blur-xs flex items-center justify-center mb-3 shadow-inner">
                    <svg class="w-9 h-9 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h2 class="font-display font-black text-xl tracking-tight uppercase">
                    MENUNGGU KEPUTUSAN PENGAWAS UJIAN
                </h2>
                <p class="text-xs text-red-100 mt-1 font-medium">
                    Sistem mendeteksi aktivitas berpindah tab, keluar jendela, atau keluar layar penuh.
                </p>
            </div>

            <!-- Body -->
            <div class="p-6 space-y-5">
                <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 text-xs flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-ping"></span>
                        <span class="font-semibold">Waktu ujian tetap berjalan:</span>
                    </div>
                    <span class="font-mono font-black text-sm text-amber-950 px-2.5 py-1 rounded-lg bg-amber-200/70" x-text="formatTime(remainingSeconds)"></span>
                </div>

                <div class="text-center space-y-1">
                    <p class="text-xs text-gray-11">
                        Hubungi pengawas di ruangan ujian Anda untuk mendapatkan <strong>PIN Buka Kunci</strong> atau menunggu pengawas mengambil tindakan (potong waktu / penalti / reset).
                    </p>
                </div>

                <!-- Input PIN Form -->
                <form @submit.prevent="submitPin()" class="space-y-3 pt-2">
                    <div>
                        <label class="block text-xs font-bold text-gray-11 uppercase tracking-wider text-center mb-2">
                            Masukkan PIN Buka Kunci (6 Digit):
                        </label>
                        <input type="text" 
                               x-model="enteredPin" 
                               maxlength="10" 
                               placeholder="Contoh: 849201"
                               autocomplete="off"
                               class="w-full text-center tracking-[0.3em] font-mono text-2xl font-black py-3 rounded-2xl border-2 border-gray-6 focus:border-red-500 focus:ring-4 focus:ring-red-100 outline-none transition-all">
                    </div>

                    <template x-if="pinError">
                        <p class="text-xs text-red-600 font-semibold text-center" x-text="pinError"></p>
                    </template>

                    <button type="submit" 
                            :disabled="isVerifyingPin"
                            class="w-full py-3 rounded-2xl bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 active:scale-[0.99] text-white font-bold text-sm shadow-lg shadow-red-500/25 transition-all flex items-center justify-center gap-2 cursor-pointer disabled:opacity-50">
                        <svg x-show="isVerifyingPin" class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                        <span x-text="isVerifyingPin ? 'Memverifikasi PIN...' : 'Buka Kunci Layar'"></span>
                    </button>
                </form>

                <p class="text-[11px] text-gray-9 text-center">
                    Jika pengawas mengambil tindakan potong waktu/nilai dari layarnya, tampilan ini akan otomatis terbuka.
                </p>
            </div>
        </div>
    </div>

    {{-- ═══════════════ DATA & SCRIPT ═══════════════ --}}
    <script>
    function examWorkspace(payload) {
        const safePayload = payload || window.__cbtPayload || {};
        return {
            payload: safePayload,
            questions: Array.isArray(safePayload.questions) ? safePayload.questions : [],
            endpoints: safePayload.endpoints || {},
            currentIndex: 0,
            currentCardIndex: 0,
            remainingSeconds: Number(safePayload.session?.remaining_seconds) || 0,
            online: navigator.onLine,
            saveState: 'idle', // idle | saving | saved | error
            showSubmitModal: false,
            timeUpModal: false,
            timeUpCountdown: 3,
            submitting: false,
            warningBanner: false,
            warningMessage: '',

            // Proctoring & Lock Screen State
            isViolatedLocked: safePayload.session?.is_locked || false,
            lockMessage: safePayload.session?.lock_reason || 'Menunggu keputusan pengawas ujian',
            enteredPin: '',
            pinError: '',
            isVerifyingPin: false,
            proctorPollInterval: null,
            lastHandledResetCount: Number(safePayload.session?.reset_count || 0),

            sections: [],
            // Local answers state (question_id → {answer_payload, is_flagged})
            answers: {},
            // Track which questions student has opened/visited
            visited: {},
            // Section timers state (section_id -> remaining seconds)
            sectionTimers: {},
            // Dedicated scalar for rock-solid Alpine reactivity
            currentSectionRemainingSeconds: 0,
            // List of expired section IDs (locked sections)
            expiredSections: [],

            // Kelompokkan butir-butir soal yang dinaungi oleh stimulus / question_group yang sama
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
                                section_duration_minutes: q.section_duration_minutes,
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
                            section_duration_minutes: q.section_duration_minutes,
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

            isCardLocked(card) {
                if (!card) return false;
                if (card.section_id && this.isSectionExpired(card.section_id)) return true;
                if (Array.isArray(card.questions) && card.questions.length > 0) {
                    return card.questions.every(q => this.isQuestionLocked(q));
                }
                return false;
            },

            isSectionExpired(secId) {
                if (!secId) return false;
                if (this.expiredSections.includes(secId) || this.expiredSections.includes(Number(secId)) || this.expiredSections.includes(String(secId))) return true;
                if (this.sectionTimers[secId] !== undefined && this.sectionTimers[secId] <= 0) {
                    const hasDuration = this.sections.some(s => (s.id == secId) && Number(s.duration_minutes) > 0)
                        || this.questions.some(q => (q.section_id == secId) && Number(q.section_duration_minutes) > 0);
                    if (hasDuration) return true;
                }
                return false;
            },

            isQuestionLocked(q) {
                if (!q || !q.section_id) return false;
                if (!Number(q.section_duration_minutes)) return false;
                return this.isSectionExpired(q.section_id);
            },

            get activeSection() {
                // Section pertama yang belum expired dan memiliki durasi > 0
                if (Array.isArray(this.sections) && this.sections.length > 0) {
                    return this.sections.find(s => !this.isSectionExpired(s.id) && Number(s.duration_minutes) > 0) || null;
                }
                for (const q of this.questions) {
                    if (q.section_id && Number(q.section_duration_minutes) > 0 && !this.isSectionExpired(q.section_id)) {
                        return {
                            id: q.section_id,
                            number: q.section_number || 1,
                            title: q.section_title || '',
                            duration_minutes: Number(q.section_duration_minutes),
                        };
                    }
                }
                return null;
            },

            get activeSectionNumber() {
                return this.activeSection?.number ?? (this.currentQuestion?.section_number ?? 1);
            },

            get activeSectionTitle() {
                return this.activeSection?.title ?? (this.currentQuestion?.section_title ?? '');
            },

            get currentQuestion() {
                const card = this.currentCard;
                if (card && card.questions && card.questions.length > 0) {
                    return card.questions[0];
                }
                return this.questions[this.currentIndex] || null;
            },
            get currentSectionTitle() {
                const card = this.currentCard;
                const title = card?.section_title || this.currentQuestion?.section_title;
                const num = card?.section_number || this.currentQuestion?.section_number;
                if (!title) return '';
                return num ? `Bagian ${num}: ${title}` : title;
            },
            get currentSectionDuration() {
                return Number(this.activeSection?.duration_minutes) || Number(this.currentQuestion?.section_duration_minutes) || 0;
            },
            get hasSectionTimer() {
                return !!this.activeSection;
            },
            get sectionRemainingSeconds() {
                return this.currentSectionRemainingSeconds;
            },
            get formattedSectionTime() {
                const s = this.currentSectionRemainingSeconds;
                const h = Math.floor(s / 3600);
                const m = Math.floor((s % 3600) / 60);
                const sec = s % 60;
                if (h > 0) return `${String(h).padStart(2,'0')}:${String(m).padStart(2,'0')}:${String(sec).padStart(2,'0')}`;
                return `${String(m).padStart(2,'0')}:${String(sec).padStart(2,'0')}`;
            },

            updateCurrentSectionTimer() {
                const activeSec = this.activeSection;
                if (activeSec) {
                    const secId = activeSec.id;
                    if (this.sectionTimers[secId] === undefined) {
                        const storedSec = this.lsGetSection(secId);
                        const totalSec = Number(activeSec.duration_minutes) * 60;
                        this.sectionTimers[secId] = storedSec !== null ? Math.min(storedSec, totalSec) : totalSec;
                    }
                    this.currentSectionRemainingSeconds = this.sectionTimers[secId];
                    if (this.currentSectionRemainingSeconds <= 0) {
                        this.handleSectionExpired(secId);
                    }
                } else {
                    this.currentSectionRemainingSeconds = 0;
                }
            },

            init() {
                // Restore expired sections from server / localStorage
                const savedExpired = this.lsGetExpiredSections();
                const serverExpired = Array.isArray(safePayload.session?.expired_sections) ? safePayload.session.expired_sections : [];
                this.expiredSections = [...new Set([...(savedExpired || []), ...serverExpired])];

                // Initialize sections list
                this.sections = Array.isArray(safePayload.sections) && safePayload.sections.length > 0
                    ? safePayload.sections
                    : [];

                if (this.sections.length === 0) {
                    const seen = new Set();
                    this.questions.forEach(q => {
                        if (q.section_id && !seen.has(q.section_id)) {
                            seen.add(q.section_id);
                            this.sections.push({
                                id: q.section_id,
                                number: q.section_number || (this.sections.length + 1),
                                title: q.section_title || '',
                                duration_minutes: Number(q.section_duration_minutes) || 0,
                            });
                        }
                    });
                }

                // Sort sections by number
                this.sections.sort((a, b) => (Number(a.number) || 0) - (Number(b.number) || 0));

                // Initialize section timers for all sections
                this.sections.forEach(s => {
                    if (Number(s.duration_minutes) > 0 && this.sectionTimers[s.id] === undefined) {
                        const storedSec = this.lsGetSection(s.id);
                        const totalSec = Number(s.duration_minutes) * 60;
                        this.sectionTimers[s.id] = storedSec !== null ? Math.min(storedSec, totalSec) : totalSec;
                        if (this.sectionTimers[s.id] <= 0) {
                            if (!this.expiredSections.includes(s.id) && !this.expiredSections.includes(Number(s.id)) && !this.expiredSections.includes(String(s.id))) {
                                this.expiredSections.push(s.id);
                            }
                        }
                    }
                });

                // Cek apakah ada tindakan RESET dari pengawas sebelum load / saat refresh
                const serverResetCount = Number(safePayload.session?.reset_count || 0);
                const localResetCount = Number(localStorage.getItem(`exam_${safePayload.session?.uuid}_reset_count`) || 0);

                if (serverResetCount > localResetCount) {
                    (this.questions || []).forEach(q => {
                        try { localStorage.removeItem(this.lsKey(q.id)); } catch(_) {}
                    });
                    (this.sections || []).forEach(s => {
                        try { localStorage.removeItem(this.lsKeySection(s.id)); } catch(_) {}
                    });
                    try { localStorage.removeItem(this.lsKeyExpired()); } catch(_) {}
                    try { localStorage.setItem(`exam_${safePayload.session?.uuid}_reset_count`, String(serverResetCount)); } catch(_) {}
                    this.lastHandledResetCount = serverResetCount;
                }

                // Restore answers from server / localStorage
                (this.questions || []).forEach((q, idx) => {
                    const stored = this.lsGet(q.id);
                    const server = q.existing;
                    this.answers[q.id] = stored ?? {
                        answer_payload: server?.answer_payload ?? null,
                        is_flagged: server?.is_flagged ?? false,
                    };
                });

                // Cari kartu soal pertama yang TIDAK terkunci
                const firstCardIdx = this.displayItems.findIndex(c => !this.isCardLocked(c));
                if (firstCardIdx >= 0) {
                    this.currentCardIndex = firstCardIdx;
                    const card = this.displayItems[firstCardIdx];
                    if (card && card.questions) {
                        card.questions.forEach(q => { this.visited[q.id] = true; });
                        const q0 = card.questions[0];
                        const qIdx = this.questions.findIndex(q => q.id === q0.id);
                        if (qIdx >= 0) this.currentIndex = qIdx;
                    }
                } else if (this.questions.length > 0) {
                    // Semua bagian telah habis waktunya
                    this.autoSubmit();
                    return;
                }

                this.updateCurrentSectionTimer();
                this.startTimer();
                this.attachAntiCheat();

                // Aktifkan pemantauan tindakan pengawas (real-time proctor sync)
                this.startProctorPolling();

                setInterval(() => this.logEvent('heartbeat'), 60000);

                try {
                    const el = document.documentElement;
                    if (el.requestFullscreen) el.requestFullscreen().catch(() => {});
                    else if (el.webkitRequestFullscreen) el.webkitRequestFullscreen();
                } catch (_) {}

                this.$nextTick(() => {
                    this.renderKatex();
                    this.triggerQuestionMediaAutoplay();
                });
            },

            startTimer() {
                const interval = setInterval(() => {
                    // Main exam timer
                    this.remainingSeconds = Math.max(0, this.remainingSeconds - 1);
                    if (this.remainingSeconds === 300) {
                        this.warn('⏰ Sisa waktu ujian tinggal 5 menit!');
                    }
                    if (this.remainingSeconds <= 0) {
                        clearInterval(interval);
                        this.autoSubmit();
                        return;
                    }

                    // Section timer (sequential countdown: always countdown the earliest active unexpired section)
                    const activeSec = this.activeSection;
                    if (activeSec) {
                        const secId = activeSec.id;
                        if (this.sectionTimers[secId] === undefined) {
                            const storedSec = this.lsGetSection(secId);
                            const totalSec = Number(activeSec.duration_minutes) * 60;
                            this.sectionTimers[secId] = storedSec !== null ? Math.min(storedSec, totalSec) : totalSec;
                        }
                        const nextSec = Math.max(0, this.sectionTimers[secId] - 1);
                        this.sectionTimers[secId] = nextSec;
                        this.currentSectionRemainingSeconds = nextSec;
                        this.lsSetSection(secId, nextSec);

                        if (nextSec === 60) {
                            this.warn(`⚠️ Sisa waktu untuk Bagian ${activeSec.number} tinggal 1 menit!`);
                        }
                        if (nextSec <= 0) {
                            this.handleSectionExpired(secId);
                        }
                    } else {
                        this.currentSectionRemainingSeconds = 0;
                    }
                }, 1000);
            },

            handleSectionExpired(secId) {
                if (!this.expiredSections.includes(secId) && !this.expiredSections.includes(Number(secId)) && !this.expiredSections.includes(String(secId))) {
                    this.expiredSections.push(secId);
                }
                this.lsSetExpiredSections(this.expiredSections);
                this.logEvent('section_expired', { section_id: secId });

                const expiredSecObj = this.sections.find(s => s.id == secId);
                const expiredSecNumber = expiredSecObj?.number || '';

                this.warn(`⏰ Waktu untuk Bagian ${expiredSecNumber} telah habis! Soal pada bagian ini telah dikunci.`);

                // Cari kartu berikutnya yang TIDAK terkunci (mulai dari currentCardIndex + 1 ke depan)
                let nextCardIdx = this.displayItems.findIndex((c, i) => i > this.currentCardIndex && !this.isCardLocked(c));
                if (nextCardIdx === -1) {
                    // Cari dari awal
                    nextCardIdx = this.displayItems.findIndex((c) => !this.isCardLocked(c));
                }

                if (nextCardIdx !== -1) {
                    if (this.currentCard && this.isCardLocked(this.currentCard)) {
                        this.goToCard(nextCardIdx);
                    }
                } else {
                    // Semua section sudah habis waktunya
                    this.autoSubmit();
                }

                // Perbarui timer section untuk section berikutnya yang aktif
                this.updateCurrentSectionTimer();
            },

            get formattedTime() {
                const s = this.remainingSeconds;
                const h = Math.floor(s / 3600);
                const m = Math.floor((s % 3600) / 60);
                const sec = s % 60;
                if (h > 0) return `${String(h).padStart(2,'0')}:${String(m).padStart(2,'0')}:${String(sec).padStart(2,'0')}`;
                return `${String(m).padStart(2,'0')}:${String(sec).padStart(2,'0')}`;
            },

            goToCard(cardIdx) {
                const card = this.displayItems[cardIdx];
                if (!card) return;
                if (this.isCardLocked(card)) {
                    this.warn('Waktu untuk bagian soal ini telah habis. Soal dan jawaban telah terkunci.');
                    return;
                }
                this.currentCardIndex = cardIdx;
                if (card.questions) {
                    card.questions.forEach(q => { this.visited[q.id] = true; });
                    const q0 = card.questions[0];
                    const qIdx = this.questions.findIndex(q => q.id === q0.id);
                    if (qIdx >= 0) this.currentIndex = qIdx;
                }
                this.updateCurrentSectionTimer();
                this.$nextTick(() => {
                    this.renderKatex();
                    this.triggerQuestionMediaAutoplay();
                });
            },

            goToQuestion(qid) {
                const cardIdx = this.displayItems.findIndex(c => c.questions.some(q => q.id === qid));
                if (cardIdx === -1) return;
                const card = this.displayItems[cardIdx];
                if (this.isCardLocked(card)) {
                    this.warn('Waktu untuk bagian soal ini telah habis. Soal dan jawaban telah terkunci.');
                    return;
                }
                this.currentCardIndex = cardIdx;
                this.visited[qid] = true;
                if (card.questions) {
                    card.questions.forEach(q => { this.visited[q.id] = true; });
                }
                const qIdx = this.questions.findIndex(q => q.id === qid);
                if (qIdx >= 0) this.currentIndex = qIdx;

                this.updateCurrentSectionTimer();
                this.$nextTick(() => {
                    this.renderKatex();
                    const targetEl = document.getElementById('question-block-' + qid);
                    if (targetEl) {
                        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                    this.triggerQuestionMediaAutoplay();
                });
            },

            goTo(idx) {
                const q = this.questions[idx];
                if (!q) return;
                this.goToQuestion(q.id);
            },

            prevCard() {
                for (let i = this.currentCardIndex - 1; i >= 0; i--) {
                    if (!this.isCardLocked(this.displayItems[i])) {
                        this.goToCard(i);
                        return;
                    }
                }
            },

            nextCard() {
                for (let i = this.currentCardIndex + 1; i < this.displayItems.length; i++) {
                    if (!this.isCardLocked(this.displayItems[i])) {
                        this.goToCard(i);
                        return;
                    }
                }
            },

            prevQuestion() {
                this.prevCard();
            },

            nextQuestion() {
                this.nextCard();
            },

            get answeredCount() {
                return this.questions.filter(q => this.isAnsweredQ(q.id)).length;
            },
            get flaggedCount() {
                return this.questions.filter(q => this.answers[q.id]?.is_flagged).length;
            },
            isAnsweredQ(qid) {
                const p = this.answers[qid]?.answer_payload;
                if (!p) return false;
                if (p.option_id !== undefined) return p.option_id !== null && p.option_id !== '';
                if (p.option_ids !== undefined) return (p.option_ids?.length ?? 0) > 0;
                if (p.value !== undefined) return (p.value?.trim?.() ?? '') !== '';
                if (p.text !== undefined) return (p.text?.trim?.() ?? '') !== '';
                if (p.answers !== undefined) return Object.keys(p.answers ?? {}).length > 0;
                if (p.pairs !== undefined) return Object.values(p.pairs ?? {}).some(v => v !== null && v !== '');
                if (p.order !== undefined) return (p.order?.length ?? 0) > 0;
                return false;
            },

            isChosen(q, opt) {
                const p = this.answers[q.id]?.answer_payload;
                if (!p) return false;
                if (q.type === 'mcq_single' || q.type === 'mcq_weighted') return p.option_id === opt.id;
                if (q.type === 'mcq_multiple') return (p.option_ids ?? []).includes(opt.id);
                return false;
            },
            toggleOption(q, opt) {
                if (this.isQuestionLocked(q)) return;
                const cur = this.answers[q.id]?.answer_payload ?? {};
                if (q.type === 'mcq_single' || q.type === 'mcq_weighted') {
                    this.setAnswer(q.id, { option_id: opt.id });
                    const card = this.currentCard;
                    if (card && (!card.is_group || card.questions.length <= 1)) {
                        setTimeout(() => {
                            this.nextCard();
                        }, 250);
                    }
                } else {
                    const ids = [...(cur.option_ids ?? [])];
                    const idx = ids.indexOf(opt.id);
                    if (idx >= 0) ids.splice(idx, 1); else ids.push(opt.id);
                    this.setAnswer(q.id, { option_ids: ids });
                }
            },

            setFillBlank(qid, val) {
                const q = this.questions.find(x => x.id === qid);
                if (q && this.isQuestionLocked(q)) return;
                this.setAnswer(qid, { value: val });
            },
            setEssay(qid, val) {
                const q = this.questions.find(x => x.id === qid);
                if (q && this.isQuestionLocked(q)) return;
                this.setAnswer(qid, { text: val });
            },

            insertEssayFormat(qid, prefix, suffix) {
                const q = this.questions.find(x => x.id === qid);
                if (q && this.isQuestionLocked(q)) return;
                const el = document.getElementById('essay_input_' + qid);
                if (!el) return;
                const start = el.selectionStart ?? 0;
                const end = el.selectionEnd ?? 0;
                const val = el.value || '';
                const selected = val.substring(start, end);
                const innerText = selected || 'teks';
                const replacement = prefix + innerText + suffix;
                el.value = val.substring(0, start) + replacement + val.substring(end);
                this.setEssay(qid, el.value);
                el.focus();
                el.setSelectionRange(start + prefix.length, start + prefix.length + innerText.length);
            },

            getBoolAnswer(qid, optId) {
                return (this.answers[qid]?.answer_payload?.answers ?? {})[optId] ?? null;
            },
            setBoolAnswer(qid, optId, val) {
                const q = this.questions.find(x => x.id === qid);
                if (q && this.isQuestionLocked(q)) return;
                const cur = {...(this.answers[qid]?.answer_payload?.answers ?? {})};
                cur[optId] = val;
                this.setAnswer(qid, { answers: cur });
            },

            getMatchingTargets(q) {
                if (!q) return [];
                if (Array.isArray(q.matching_targets) && q.matching_targets.length > 0) {
                    return q.matching_targets;
                }
                if (!q.options) return [];
                const keys = q.options.map(o => o.meta?.match_key).filter(Boolean);
                return [...new Set(keys)];
            },
            getMatchAnswer(qid, optId) {
                return (this.answers[qid]?.answer_payload?.pairs ?? {})[optId] ?? '';
            },
            isMatchTargetTaken(qid, optId, targetVal) {
                if (!targetVal) return false;
                const pairs = this.answers[qid]?.answer_payload?.pairs ?? {};
                for (const [key, val] of Object.entries(pairs)) {
                    if (String(key) !== String(optId) && val === targetVal) {
                        return true;
                    }
                }
                return false;
            },
            setMatchPair(qid, optId, targetVal) {
                const q = this.questions.find(x => x.id === qid);
                if (q && this.isQuestionLocked(q)) return;
                const cur = {...(this.answers[qid]?.answer_payload?.pairs ?? {})};
                // Pastikan opsi yang sama tidak bisa dipilih di pernyataan lain
                if (targetVal) {
                    for (const k of Object.keys(cur)) {
                        if (String(k) !== String(optId) && cur[k] === targetVal) {
                            cur[k] = null;
                        }
                    }
                }
                cur[optId] = targetVal || null;
                this.setAnswer(qid, { pairs: cur });
            },

            getOrderItems(q) {
                if (!q || !Array.isArray(q.options)) return [];
                const savedOrder = this.answers[q.id]?.answer_payload?.order;
                if (Array.isArray(savedOrder) && savedOrder.length > 0) {
                    const optMap = new Map(q.options.map(o => [String(o.id), o]));
                    const resolved = savedOrder.map(id => optMap.get(String(id))).filter(Boolean);
                    if (resolved.length === q.options.length) return resolved;
                }
                return [...q.options];
            },
            moveOrderItem(q, fromIdx, toIdx) {
                if (this.isQuestionLocked(q)) return;
                const items = [...this.getOrderItems(q)];
                if (toIdx < 0 || toIdx >= items.length) return;
                const [moved] = items.splice(fromIdx, 1);
                items.splice(toIdx, 0, moved);
                const newOrder = items.map(o => o.id);
                this.setAnswer(q.id, { order: newOrder });
            },

            isFlagged(qid) { return !!(this.answers[qid]?.is_flagged); },
            toggleFlag(qid) {
                const q = this.questions.find(x => x.id === qid);
                if (q && this.isQuestionLocked(q)) return;
                if (!this.answers[qid]) this.answers[qid] = { answer_payload: null, is_flagged: false };
                this.answers[qid].is_flagged = !this.answers[qid].is_flagged;
                this.scheduleSave(qid);
            },

            getAnswerPayload(qid) {
                return this.answers[qid]?.answer_payload ?? null;
            },

            setAnswer(qid, payload) {
                const q = this.questions.find(x => x.id === qid);
                if (q && this.isQuestionLocked(q)) return;
                if (!this.answers[qid]) this.answers[qid] = { answer_payload: null, is_flagged: false };
                this.answers[qid].answer_payload = payload;
                this.lsSet(qid, this.answers[qid]);
                this.scheduleSave(qid);
            },

            _saveTimers: {},
            scheduleSave(qid) {
                clearTimeout(this._saveTimers[qid]);
                this._saveTimers[qid] = setTimeout(() => this.pushSave(qid), 2000);
            },

            async pushSave(qid) {
                this.saveState = 'saving';
                try {
                    const res = await fetch(this.endpoints.save, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({
                            question_id: qid,
                            answer_payload: this.answers[qid]?.answer_payload ?? null,
                            is_flagged: this.answers[qid]?.is_flagged ?? false,
                        }),
                    });
                    if (!res.ok) throw new Error(res.status);
                    this.saveState = 'saved';
                    setTimeout(() => { if (this.saveState === 'saved') this.saveState = 'idle'; }, 2000);
                } catch {
                    this.saveState = 'error';
                    setTimeout(() => { if (this.saveState === 'error') this.saveState = 'idle'; }, 4000);
                }
            },

            lsKey(qid) { return `exam_${safePayload.session?.uuid}_q_${qid}`; },
            lsSet(qid, val) { try { localStorage.setItem(this.lsKey(qid), JSON.stringify(val)); } catch(_) {} },
            lsGet(qid) { try { const s = localStorage.getItem(this.lsKey(qid)); return s ? JSON.parse(s) : null; } catch(_) { return null; } },

            lsKeySection(secId) { return `exam_${safePayload.session?.uuid}_sec_${secId}`; },
            lsSetSection(secId, val) { try { localStorage.setItem(this.lsKeySection(secId), String(val)); } catch(_) {} },
            lsGetSection(secId) {
                try {
                    const val = localStorage.getItem(this.lsKeySection(secId));
                    return val !== null ? parseInt(val, 10) : null;
                } catch(_) { return null; }
            },

            lsKeyExpired() { return `exam_${safePayload.session?.uuid}_expired_sections`; },
            lsSetExpiredSections(list) { try { localStorage.setItem(this.lsKeyExpired(), JSON.stringify(list)); } catch(_) {} },
            lsGetExpiredSections() {
                try {
                    const s = localStorage.getItem(this.lsKeyExpired());
                    return s ? JSON.parse(s) : null;
                } catch(_) { return null; }
            },

            attachAntiCheat() {
                const isProctored = this.payload.assessment?.proctoring_mode === 'proctored';

                document.addEventListener('visibilitychange', () => {
                    const type = document.hidden ? 'tab_hidden' : 'tab_visible';
                    if (document.hidden) {
                        if (isProctored) {
                            this.triggerViolatedLock('Berpindah tab atau membuka aplikasi lain');
                        } else {
                            this.warn('⚠️ Berpindah tab dicatat sebagai pelanggaran!');
                        }
                    }
                    this.logEvent(type);
                });

                window.addEventListener('blur', () => {
                    if (isProctored) {
                        this.triggerViolatedLock('Fokus jendela beralih keluar');
                    }
                    this.logEvent('window_blur');
                });

                window.addEventListener('focus', () => this.logEvent('window_focus'));

                document.addEventListener('fullscreenchange', () => {
                    if (!document.fullscreenElement) {
                        if (isProctored) {
                            this.triggerViolatedLock('Keluar dari mode layar penuh (fullscreen)');
                        } else {
                            this.warn('⚠️ Keluar dari mode layar penuh dicatat!');
                        }
                        this.logEvent('fullscreen_exit');
                    } else {
                        this.logEvent('fullscreen_enter');
                    }
                });

                window.addEventListener('offline', () => {
                    this.online = false;
                    this.warn('⚡ Koneksi internet terputus. Jawaban tersimpan di perangkat Anda.');
                    this.logEvent('offline');
                });

                window.addEventListener('online', () => {
                    this.online = true;
                    this.warningBanner = false;
                    this.logEvent('online');
                });

                document.addEventListener('copy', () => this.logEvent('copy'));
                document.addEventListener('contextmenu', (e) => { e.preventDefault(); this.logEvent('contextmenu'); });

                window.addEventListener('pagehide', () => {
                    if (!this.submitting) {
                        this.logEvent('page_exit');
                    }
                });
                window.addEventListener('beforeunload', () => {
                    if (!this.submitting) {
                        this.logEvent('page_exit');
                    }
                });
            },

            triggerViolatedLock(reason) {
                if (this.isViolatedLocked || this.submitting) return;
                this.isViolatedLocked = true;
                this.lockMessage = reason || 'Menunggu keputusan pengawas ujian';
            },

            startProctorPolling() {
                if (this.proctorPollInterval) return;
                this.proctorPollInterval = setInterval(async () => {
                    if (this.submitting) return;
                    try {
                        const token = document.querySelector('meta[name="csrf-token"]')?.content ?? '';
                        const res = await fetch(this.endpoints.lock_status, {
                            headers: { 
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': token
                            }
                        });
                        if (res.ok) {
                            const data = await res.json();
                            this.handleProctorStatusData(data);
                        }
                    } catch (_) {}
                }, 2500);
            },

            handleProctorStatusData(data) {
                if (!data) return;

                // 1. Sesi dibatalkan pengawas (CANCEL)
                if (data.status === 'cancelled') {
                    if (this.proctorPollInterval) {
                        clearInterval(this.proctorPollInterval);
                        this.proctorPollInterval = null;
                    }
                    alert(data.message || 'Sesi ujian Anda telah dihentikan oleh pengawas.');
                    window.location.href = data.redirect_url || '/';
                    return;
                }

                // 2. Sinkronisasi sisa waktu ujian (Waktu tetap berjalan normal)
                if (data.remaining_seconds !== undefined) {
                    const diff = Math.abs(this.remainingSeconds - data.remaining_seconds);
                    if (diff > 3) {
                        this.remainingSeconds = data.remaining_seconds;
                    }
                }

                // 3. Deteksi Perintah RESET Pengawas
                const incomingResetCount = Number(data.reset_count || 0);
                if (incomingResetCount > this.lastHandledResetCount || (data.proctor_action === 'reset' && incomingResetCount > this.lastHandledResetCount)) {
                    this.lastHandledResetCount = incomingResetCount;
                    try { localStorage.setItem(`exam_${safePayload.session?.uuid}_reset_count`, String(incomingResetCount)); } catch(_) {}
                    this.executeProctorReset(data);
                    return;
                }

                // 4. Deteksi Status Kunci (LOCK / UNLOCK)
                if (data.is_locked && !this.isViolatedLocked) {
                    this.triggerViolatedLock(data.lock_reason || 'Menunggu keputusan pengawas ujian');
                } else if (!data.is_locked && this.isViolatedLocked) {
                    this.isViolatedLocked = false;
                    if (data.proctor_action === 'time_cut') {
                        this.warn(`⏱️ Waktu ujian dikurangi ${data.time_penalty_minutes} menit oleh pengawas. Layar ujian telah dibuka kembali.`);
                    } else if (data.proctor_action === 'point_cut') {
                        this.warn(`⚠️ Nilai ujian Anda dipotong ${data.score_penalty} poin oleh pengawas. Layar ujian telah dibuka kembali.`);
                    } else if (data.proctor_action !== 'reset') {
                        this.warn('✅ Layar ujian telah dibuka oleh pengawas. Silakan lanjutkan pengerjaan.');
                    }
                }
            },

            executeProctorReset(data) {
                // 1. Batalkan semua pending debounce simpan jawaban
                if (this._saveTimers) {
                    Object.keys(this._saveTimers).forEach(qid => {
                        clearTimeout(this._saveTimers[qid]);
                    });
                    this._saveTimers = {};
                }

                // 2. Kosongkan state answers di memori Alpine
                const freshAnswers = {};
                (this.questions || []).forEach(q => {
                    freshAnswers[q.id] = {
                        answer_payload: null,
                        is_flagged: false,
                    };
                    if (q.existing) {
                        q.existing.answer_payload = null;
                        q.existing.is_flagged = false;
                    }
                });
                this.answers = freshAnswers;

                // 3. Bersihkan seluruh data localStorage untuk sesi ujian ini
                (this.questions || []).forEach(q => {
                    try { localStorage.removeItem(this.lsKey(q.id)); } catch(_) {}
                });
                (this.sections || []).forEach(s => {
                    try { localStorage.removeItem(this.lsKeySection(s.id)); } catch(_) {}
                });
                try { localStorage.removeItem(this.lsKeyExpired()); } catch(_) {}

                // 4. Buka kembali kunci section agar soal nomor 1 dapat diakses
                this.expiredSections = [];
                this.lsSetExpiredSections([]);
                (this.sections || []).forEach(s => {
                    if (Number(s.duration_minutes) > 0) {
                        this.sectionTimers[s.id] = Number(s.duration_minutes) * 60;
                    }
                });

                // 5. Kosongkan nilai form inputs (DOM)
                this.$nextTick(() => {
                    document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(el => {
                        el.checked = false;
                    });
                    document.querySelectorAll('input[type="text"], textarea').forEach(el => {
                        el.value = '';
                    });
                    document.querySelectorAll('select').forEach(el => {
                        el.selectedIndex = 0;
                    });
                });

                // 6. Kembalikan navigasi ke Soal Nomor 1 (Card 0)
                this.visited = {};
                this.isViolatedLocked = false;
                this.currentCardIndex = 0;
                this.currentIndex = 0;

                if (this.questions.length > 0) {
                    this.visited[this.questions[0].id] = true;
                }

                this.updateCurrentSectionTimer();

                // 7. Waktu ujian tetap berjalan
                if (data && data.remaining_seconds !== undefined) {
                    this.remainingSeconds = data.remaining_seconds;
                }

                // 8. Scroll ke atas soal
                window.scrollTo({ top: 0, behavior: 'smooth' });
                this.$nextTick(() => {
                    this.renderKatex();
                    const targetEl = document.getElementById('question-block-' + (this.questions[0]?.id || ''));
                    if (targetEl) {
                        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });

                // 9. Berikan peringatan / alert kepada siswa
                this.warn('🔄 SANKSI PENGAWAS: Seluruh jawaban Anda telah dikosongkan dan posisi kembali ke Soal No. 1. Sisa waktu ujian tetap berjalan!');
                alert('⚠️ PERINGATAN PENGAWAS UJIAN:\n\nSeluruh nilai dan jawaban Anda telah DIKOSONGKAN oleh pengawas ujian, dan pengerjaan Anda DILEMPAR KEMBALI KE SOAL NOMOR 1.\n\nSisa waktu ujian Anda TETAP BERJALAN!');
            },

            async submitPin() {
                if (!this.enteredPin || this.enteredPin.trim().length === 0) {
                    this.pinError = 'Silakan masukkan 6 digit PIN dari pengawas.';
                    return;
                }
                this.isVerifyingPin = true;
                this.pinError = '';
                try {
                    const token = document.querySelector('meta[name="csrf-token"]')?.content ?? '';
                    const res = await fetch(this.endpoints.verify_pin, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ pin: this.enteredPin.trim() })
                    });
                    const data = await res.json();
                    if (res.ok && data.ok) {
                        this.isViolatedLocked = false;
                        this.enteredPin = '';
                        this.warn('✅ PIN valid. Layar ujian dibuka kembali.');
                    } else {
                        this.pinError = data.message || 'PIN yang dimasukkan salah.';
                    }
                } catch (_) {
                    this.pinError = 'Terjadi kesalahan koneksi saat verifikasi PIN.';
                } finally {
                    this.isVerifyingPin = false;
                }
            },

            async logEvent(type, extra = {}) {
                try {
                    const token = document.querySelector('meta[name="csrf-token"]')?.content ?? '';
                    const body = JSON.stringify({ event_type: type, payload: extra, occurred_at: new Date().toISOString() });
                    if (type === 'page_exit' && navigator.sendBeacon) {
                        const blob = new Blob([body], { type: 'application/json' });
                        navigator.sendBeacon(this.endpoints.event + '?_token=' + encodeURIComponent(token), blob);
                    }
                    const res = await fetch(this.endpoints.event, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json',
                        },
                        body: body,
                    });
                    if (res.ok) {
                        const data = await res.json();
                        this.handleProctorStatusData(data);
                    }
                } catch(_) {}
            },

            warn(msg) {
                this.warningMessage = msg;
                this.warningBanner = true;
            },

            openSubmitModal() {
                this.showSubmitModal = true;
            },

            async autoSubmit() {
                if (this.timeUpModal) return;
                this.timeUpModal = true;
                this.timeUpCountdown = 3;
                this.submitting = true;
                this.showSubmitModal = false;

                // Flush sisa timer autosave lokal
                const flushPromises = Object.keys(this._saveTimers).map(qid => {
                    clearTimeout(this._saveTimers[qid]);
                    return this.pushSave(parseInt(qid));
                });
                await Promise.allSettled(flushPromises);

                // CLIENT JITTERING: Acak request antara 0 - 2500ms untuk meratakan kurva spike
                const jitterMs = Math.floor(Math.random() * 2500);
                await new Promise(resolve => setTimeout(resolve, jitterMs));

                const submitPromise = (async () => {
                    try {
                        const res = await fetch(this.endpoints.submit, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({ reason: 'time_up' }),
                        });
                        let data = null;
                        try { data = await res.json(); } catch (_) {}
                        return data?.redirect || this.endpoints.analysis || this.endpoints.result;
                    } catch (_) {
                        return this.endpoints.analysis || this.endpoints.result;
                    }
                })();

                const redirectUrl = await submitPromise;

                const countdownInterval = setInterval(() => {
                    this.timeUpCountdown = Math.max(0, this.timeUpCountdown - 1);
                    if (this.timeUpCountdown <= 0) {
                        clearInterval(countdownInterval);
                        window.location.href = redirectUrl || this.endpoints.analysis || this.endpoints.result;
                    }
                }, 1000);
            },

            async doSubmit() {
                if (this.submitting) return;
                this.submitting = true;

                // 1. Flush sisa timer auto-save jawaban lokal
                const flushPromises = Object.keys(this._saveTimers).map(qid => {
                    clearTimeout(this._saveTimers[qid]);
                    return this.pushSave(parseInt(qid));
                });
                await Promise.allSettled(flushPromises);

                try {
                    const res = await fetch(this.endpoints.submit, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content ?? '',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ reason: 'student_submit' }),
                    });

                    let data = null;
                    try {
                        data = await res.json();
                    } catch (_) {}

                    // Jika sesi sudah completed sebelumnya (409) atau waktu habis (410)
                    if (res.status === 409 || res.status === 410) {
                        const fallbackUrl = data?.redirect || this.endpoints.result || this.endpoints.analysis;
                        if (fallbackUrl) {
                            window.location.href = fallbackUrl;
                            return;
                        }
                    }

                    if (!res.ok) {
                        this.submitting = false;
                        this.showSubmitModal = false;
                        const errMsg = data?.message || ('Gagal mengirim ujian (HTTP ' + res.status + '). Silakan coba lagi atau hubungi pengawas.');
                        this.warn(errMsg);
                        return;
                    }

                    const targetUrl = data?.redirect || this.endpoints.result || this.endpoints.analysis;
                    if (targetUrl) {
                        window.location.href = targetUrl;
                    } else {
                        window.location.reload();
                    }
                } catch (err) {
                    this.submitting = false;
                    this.showSubmitModal = false;
                    this.warn('Koneksi terputus saat mengumpulkan ujian. Silakan periksa jaringan Anda lalu coba lagi.');
                }
            },

            buildListeningPlayer(url, isVideo = false, title = '') {
                const cleanUrl = url.trim();
                const cleanTitle = (title || (isVideo ? 'Video Stimulus' : 'Audio Stimulus')).replace(/"/g, '&quot;');
                return `
                <div class="cbt-listening-card my-4 rounded-xl border border-blue-300 bg-blue-50/70 p-4 shadow-xs"
                     data-media-url="${cleanUrl}">
                    <div class="flex items-center justify-between gap-3 mb-2">
                        <span class="font-display text-xs font-bold text-blue-950">${isVideo ? '🎬' : '🎧'} ${cleanTitle}</span>
                        <span class="cbt-play-badge text-[11px] font-bold text-blue-600">Sedang Memutar...</span>
                    </div>
                    ${isVideo ? `<video class="cbt-media-element w-full max-h-72 object-contain bg-black rounded-lg mb-2" src="${cleanUrl}" controls autoplay playsinline preload="auto"></video>`
                              : `<audio class="cbt-media-element w-full" src="${cleanUrl}" controls autoplay preload="auto"></audio>`}
                    <div class="flex items-center gap-2 mt-2">
                        <button type="button" class="btn-media-toggle px-3 py-1.5 rounded-lg bg-blue-600 text-white font-bold text-xs cursor-pointer hover:bg-blue-700 transition">⏸ Jeda</button>
                        <button type="button" class="btn-media-replay px-3 py-1.5 rounded-lg bg-white border border-[#ced4da] text-xs font-bold text-[#212529] cursor-pointer hover:bg-slate-100 transition">↺ Putar Ulang</button>
                    </div>
                </div>`;
            },

            renderStimulusHtml(stimulus) {
                if (!stimulus) return '';
                let html = '';

                // If stimulus has media_url or stimulus_type is audio/video
                if (stimulus.media_url) {
                    const isVid = stimulus.type === 'video' || stimulus.stimulus_type === 'video' || /\.(mp4|webm|ogg|mov)(\?|$)/i.test(stimulus.media_url);
                    html += this.buildListeningPlayer(stimulus.media_url, isVid, stimulus.title || (isVid ? 'Video Stimulus' : 'Audio Stimulus'));
                }

                // If stimulus already has pre-rendered HTML from backend
                if (stimulus.rendered) {
                    html += stimulus.rendered;
                } else if (stimulus.content) {
                    html += this.renderRich(stimulus.content);
                }

                return html;
            },

            renderRich(text) {
                if (!text) return '';
                let raw = text;

                raw = raw.replace(/\[(?:listening|audio):([^\|\]]+)(?:\|([^\]]+))?\]/gi, (match, url, title) => {
                    return this.buildListeningPlayer(url, false, title);
                });
                raw = raw.replace(/\[video:([^\|\]]+)(?:\|([^\]]+))?\]/gi, (match, url, title) => {
                    return this.buildListeningPlayer(url, true, title);
                });

                if (window.marked && typeof window.marked.parse === 'function') {
                    try { raw = window.marked.parse(raw, { gfm: true, breaks: true }); } catch(_) {}
                }

                this.$nextTick(() => {
                    this.renderKatex();
                });

                return raw;
            },

            attachListeningPlayer(cardEl) {
                if (!cardEl || cardEl.__cbtPlayer) return cardEl?.__cbtPlayer;
                const mediaEl = cardEl.querySelector('.cbt-media-element');
                const playToggleBtn = cardEl.querySelector('.btn-media-toggle');
                const replayBtn = cardEl.querySelector('.btn-media-replay');
                const badge = cardEl.querySelector('.cbt-play-badge');
                if (!mediaEl) return null;

                const updateState = () => {
                    if (mediaEl.paused) {
                        if (playToggleBtn) playToggleBtn.textContent = '▶ Putar';
                        if (badge) { badge.textContent = 'Jeda'; badge.className = 'cbt-play-badge text-[11px] font-bold text-amber-600'; }
                    } else {
                        if (playToggleBtn) playToggleBtn.textContent = '⏸ Jeda';
                        if (badge) { badge.textContent = 'Sedang Memutar...'; badge.className = 'cbt-play-badge text-[11px] font-bold text-blue-600 animate-pulse'; }
                    }
                };

                mediaEl.addEventListener('play', updateState);
                mediaEl.addEventListener('pause', updateState);
                mediaEl.addEventListener('ended', () => {
                    if (playToggleBtn) playToggleBtn.textContent = '▶ Putar';
                    if (badge) { badge.textContent = 'Selesai'; badge.className = 'cbt-play-badge text-[11px] font-bold text-green-600'; }
                });

                playToggleBtn?.addEventListener('click', () => {
                    if (mediaEl.paused) {
                        mediaEl.play().catch(() => {});
                    } else {
                        mediaEl.pause();
                    }
                });

                replayBtn?.addEventListener('click', () => {
                    mediaEl.currentTime = 0;
                    mediaEl.play().catch(() => {});
                });

                cardEl.__cbtPlayer = {
                    mediaEl,
                    play: () => {
                        try {
                            const p = mediaEl.play();
                            if (p && typeof p.catch === 'function') {
                                p.catch(() => {
                                    if (badge) badge.textContent = 'Klik ▶ Putar';
                                });
                            }
                        } catch(_) {}
                    },
                    pause: () => { try { mediaEl.pause(); } catch(_) {} }
                };
                return cardEl.__cbtPlayer;
            },

            triggerQuestionMediaAutoplay() {
                this.$nextTick(() => {
                    setTimeout(() => {
                        document.querySelectorAll('article[data-card-index]').forEach(art => {
                            const isCurrent = art.getAttribute('data-card-index') === String(this.currentCardIndex);
                            art.querySelectorAll('.cbt-listening-card').forEach(card => {
                                const player = this.attachListeningPlayer(card);
                                if (player) {
                                    if (isCurrent) {
                                        player.play();
                                    } else {
                                        player.pause();
                                    }
                                }
                            });
                        });
                    }, 120);
                });
            },

            renderKatex() {
                this.$nextTick(() => {
                    setTimeout(() => {
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
                    }, 80);
                });
            },

            typeLabel(type) {
                return {
                    mcq_single:      'Pilihan Ganda',
                    mcq_multiple:    'Pilihan Ganda Kompleks',
                    mcq_weighted:    'Pilihan Ganda Berbobot',
                    binary_matrix:   'Tabel Benar / Salah',
                    boolean_matrix:  'Tabel Benar / Salah',
                    matching:        'Menjodohkan',
                    short_answer:    'Isian Singkat',
                    fill_blank:      'Isian Singkat',
                    ordering:        'Mengurutkan Tahapan',
                    reorder:         'Mengurutkan Tahapan',
                    essay:           'Uraian / Essay',
                }[type] || type;
            },
        };
    }

    window.examWorkspace = examWorkspace;
    if (window.Alpine) {
        window.Alpine.data('examWorkspace', (payload) => examWorkspace(payload || window.__cbtPayload));
    } else {
        document.addEventListener('alpine:init', () => {
            window.Alpine.data('examWorkspace', (payload) => examWorkspace(payload || window.__cbtPayload));
        });
    }
    </script>
</body>
</html>
