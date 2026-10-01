<x-layouts.app>
    <x-slot:title>Koreksi Lembar Essay: {{ $session->user?->name ?? 'Siswa' }} - {{ $assessment->title }}</x-slot:title>

    @php
        $initialScores = [];
        foreach($essayItems as $item) {
            $initialScores[$item['question']->id] = $item['points_awarded'] !== null ? (float)$item['points_awarded'] : 0.0;
        }
        $objectiveScore = (float)$objectivePointsEarned;
        $maxTotalPossible = (float)($objectivePointsMax + $essayItems->sum('max_points'));
    @endphp

    <style>
        .prose-q { font-family: 'Open Sans', sans-serif; line-height: 1.7; color: #1e293b; }
        .prose-q p { margin-bottom: 0.6rem; }
        .prose-q p:last-child { margin-bottom: 0; }
        .prose-q table { width: 100%; border-collapse: collapse; margin: 0.75rem 0; font-size: 0.875rem; border: 1px solid #cbd5e1; }
        .prose-q th { background: #f1f5f9; color: #0f172a; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; font-weight: 700; text-align: left; }
        .prose-q td { padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; }
        .prose-q tr:nth-child(even) { background: #f8fafc; }
        .prose-q code { background: rgba(0,0,0,0.06); padding: 0.15rem 0.35rem; border-radius: 0.25rem; font-size: 0.9em; font-family: monospace; }
        .prose-q pre { background: #1e293b; color: #f8fafc; padding: 0.75rem; border-radius: 0.5rem; overflow-x: auto; margin: 0.5rem 0; }
    </style>

    <div class="max-w-4xl mx-auto space-y-6 pb-24"
         x-data="{
             scores: {{ json_encode($initialScores) }},
             objectiveScore: {{ $objectiveScore }},
             maxTotal: {{ $maxTotalPossible > 0 ? $maxTotalPossible : 100 }},
             get totalEssayScore() {
                 return Object.values(this.scores).reduce((acc, val) => acc + (parseFloat(val) || 0), 0);
             },
             get combinedScore() {
                 return Math.round((this.objectiveScore + this.totalEssayScore) * 10) / 10;
             },
             get combinedPercentage() {
                 if (this.maxTotal <= 0) return 0;
                 return Math.round(((this.combinedScore / this.maxTotal) * 100) * 10) / 10;
             }
         }">
        
        <!-- Header & Nav -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('assessments.grading', $assessment) }}" class="p-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer" title="Kembali ke Daftar Peserta">
                    <x-radix-icon name="arrow-left" class="w-4 h-4" />
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-md bg-purple-3 text-purple-11 border border-purple-6/50">
                            Lembar Koreksi Essay
                        </span>
                        <span class="text-xs font-mono text-gray-11">
                            {{ $assessment->title }}
                        </span>
                    </div>
                    <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight mt-1">
                        {{ $session->user?->name ?? 'Peserta CBT' }}
                    </h1>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('exam.result', ['session' => $session->uuid]) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-white border border-gray-6 hover:bg-gray-2 text-gray-12 text-xs font-semibold transition-colors shadow-2xs cursor-pointer">
                    <x-radix-icon name="external-link" class="w-4 h-4" />
                    <span>Rekap Hasil Siswa</span>
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

        <!-- Student & Assessment Score Hero Banner -->
        <div class="bg-white border border-gray-6 rounded-2xl p-5 shadow-[0_1px_3px_rgba(0,0,0,0.03)] flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-purple-3 text-purple-11 flex items-center justify-center font-bold text-lg shrink-0">
                    {{ strtoupper(substr($session->user?->name ?? 'S', 0, 1)) }}
                </div>
                <div class="space-y-0.5">
                    <div class="flex items-center gap-2">
                        <h2 class="font-display font-bold text-base text-gray-12">{{ $session->user?->name }}</h2>
                        <span class="text-xs text-gray-9 font-mono">({{ $session->user?->email }})</span>
                    </div>
                    <p class="text-xs text-gray-10">
                        Disubmit pada {{ $session->completed_at ? $session->completed_at->translatedFormat('d F Y, H:i') : '-' }} WIB • IP: {{ $session->submitted_ip ?? $session->ip_address }}
                    </p>
                </div>
            </div>

            <!-- Score Pill -->
            <div class="flex items-center gap-3 bg-gray-2/60 p-2.5 px-4 rounded-xl border border-gray-5 shrink-0">
                <div class="text-right">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-gray-9 block">Skor Objektif Sistem</span>
                    <span class="font-mono font-bold text-sm text-gray-12">{{ $objectiveScore }} / {{ $objectivePointsMax }} Poin</span>
                </div>
                <div class="h-8 w-px bg-gray-5"></div>
                <div class="text-left">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-gray-9 block">Status Rilis</span>
                    @if($isScoreReleased)
                        <span class="text-xs font-bold text-green-11 flex items-center gap-1">
                            <x-radix-icon name="check-circled" class="w-3.5 h-3.5" />
                            Final Dirilis
                        </span>
                    @else
                        <span class="text-xs font-bold text-amber-11 flex items-center gap-1">
                            <x-radix-icon name="clock" class="w-3.5 h-3.5" />
                            Draf / Belum Rilis
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Form Koreksi Essay -->
        <form method="POST" action="{{ route('assessments.grading.grade', ['assessment' => $assessment->id, 'session' => $session->uuid]) }}" class="space-y-6">
            @csrf

            <div class="space-y-4">
                <div class="flex items-center justify-between border-b border-gray-5 pb-2.5">
                    <div>
                        <h3 class="font-display font-bold text-base text-gray-12">Daftar Soal Essay ({{ count($essayItems) }} Butir)</h3>
                        <p class="text-xs text-gray-11">Periksa lembar jawaban uraian siswa, masukkan skor berbobot, dan berikan catatan perbaikan.</p>
                    </div>
                </div>

                @forelse($essayItems as $item)
                    @php
                        $qId = $item['question']->id;
                    @endphp
                    <div class="bg-white border border-gray-6 rounded-2xl p-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-4">
                        <!-- Top meta per butir essay -->
                        <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                            <div class="flex items-center gap-2.5">
                                <span class="w-7 h-7 rounded-lg bg-gray-12 text-white flex items-center justify-center font-bold text-xs font-mono">
                                    {{ $item['index'] }}
                                </span>
                                <div>
                                    <span class="font-semibold text-xs text-gray-12">{{ $item['section_title'] }}</span>
                                    @if($item['answered_at'])
                                        <span class="text-[11px] text-gray-9 ml-2 font-mono">Dijawab: {{ $item['answered_at'] }}</span>
                                    @endif
                                </div>
                            </div>
                            <span class="px-2.5 py-1 rounded-lg text-xs font-mono font-bold bg-purple-2 text-purple-11 border border-purple-5">
                                Bobot Maks: {{ $item['max_points'] }} Poin
                            </span>
                        </div>

                        <!-- Stimulus jika ada -->
                        @if($item['stimulus'])
                            <div class="p-3.5 rounded-xl border border-green-6/50 bg-[#b2f2bb]/20 space-y-1.5 text-xs">
                                <div class="flex items-center gap-1.5 font-bold text-green-11">
                                    <x-radix-icon name="file-text" class="w-3.5 h-3.5" />
                                    <span>Stimulus Wacana: {{ $item['stimulus_title'] ?? 'Teks Bacaan' }}</span>
                                </div>
                                <div class="prose-q text-xs text-gray-12 leading-relaxed">
                                    {!! $item['stimulus_rendered'] ?? nl2br(e($item['stimulus'])) !!}
                                </div>
                            </div>
                        @endif

                        <!-- Soal Prompt -->
                        <div class="space-y-1">
                            <span class="text-[11px] font-bold uppercase tracking-wider text-gray-9 block">Pertanyaan Soal:</span>
                            <div class="prose-q text-sm font-medium text-gray-12 leading-relaxed">
                                {!! $item['prompt_rendered'] ?? nl2br(e($item['prompt'])) !!}
                            </div>
                        </div>

                        <!-- Panduan Rubrik / Kunci Guru jika tersedia -->
                        @if($item['rubric_guide'])
                            <div x-data="{ openRubric: false }" class="border border-gray-5 rounded-xl overflow-hidden bg-gray-1/60">
                                <button type="button" @click="openRubric = !openRubric" class="w-full p-2.5 px-3.5 flex items-center justify-between text-xs font-semibold text-gray-11 hover:text-gray-12 transition-colors cursor-pointer">
                                    <span class="flex items-center gap-1.5">
                                        <x-radix-icon name="bookmark" class="w-3.5 h-3.5 text-purple-9" />
                                        Panduan Jawaban / Rubrik Penilaian Guru
                                    </span>
                                    <x-radix-icon name="chevron-down" class="w-3.5 h-3.5 transition-transform" ::class="openRubric ? 'rotate-180' : ''" />
                                </button>
                                <div x-show="openRubric" x-collapse x-cloak class="p-3.5 pt-0 border-t border-gray-4 text-xs text-gray-11 whitespace-pre-wrap leading-relaxed">
                                    {{ $item['rubric_guide'] }}
                                </div>
                            </div>
                        @endif

                        <!-- Jawaban Siswa -->
                        <div class="space-y-1.5 pt-1">
                            <div class="flex items-center justify-between text-xs">
                                <span class="font-bold text-gray-12 flex items-center gap-1.5">
                                    <x-radix-icon name="chat-bubble" class="w-3.5 h-3.5 text-blue-9" />
                                    Jawaban Tertulis Siswa (Markdown View):
                                </span>
                                @if(empty($item['student_answer']))
                                    <span class="text-amber-11 font-semibold text-[11px] italic">Siswa tidak mengisi jawaban (kosong)</span>
                                @endif
                            </div>
                            <div class="prose-q p-4 rounded-xl border border-blue-5/70 bg-blue-1/20 text-xs sm:text-sm text-gray-12 leading-relaxed min-h-[90px] selection:bg-blue-3">
                                @if(filled($item['student_answer']))
                                    {!! $item['student_rendered'] ?? nl2br(e($item['student_answer'])) !!}
                                @else
                                    <span class="text-gray-9 italic">(Tidak ada jawaban dari siswa)</span>
                                @endif
                            </div>
                        </div>

                        <!-- Input Nilai & Catatan Koreksi Guru -->
                        <div class="pt-3 border-t border-gray-5 grid grid-cols-1 sm:grid-cols-4 gap-4 items-start">
                            <!-- Input Skor -->
                            <div class="space-y-1 sm:col-span-1">
                                <label for="score_{{ $qId }}" class="text-xs font-bold text-gray-12 block">
                                    Skor Nilai (Maks. {{ $item['max_points'] }}):
                                </label>
                                <div class="relative">
                                    <input type="number"
                                           id="score_{{ $qId }}"
                                           name="grades[{{ $qId }}]"
                                           step="0.5"
                                           min="0"
                                           max="{{ $item['max_points'] }}"
                                           x-model.number="scores[{{ $qId }}]"
                                           placeholder="0"
                                           class="w-full rounded-xl border border-gray-7 bg-white px-3 py-2 text-sm font-bold font-mono text-gray-12 outline-none focus:border-purple-8 focus:ring-1 focus:ring-purple-8 transition-colors">
                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-xs font-mono text-gray-9 pointer-events-none">
                                        / {{ $item['max_points'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Input Feedback / Catatan Guru -->
                            <div class="space-y-1 sm:col-span-3">
                                <label for="feedback_{{ $qId }}" class="text-xs font-bold text-gray-12 block">
                                    Catatan & Evaluasi untuk Siswa (Opsional):
                                </label>
                                <textarea id="feedback_{{ $qId }}"
                                          name="feedbacks[{{ $qId }}]"
                                          rows="2"
                                          placeholder="Tuliskan umpan balik koreksi, saran perbaikan, atau apresiasi..."
                                          class="w-full rounded-xl border border-gray-7 bg-white p-2.5 text-xs text-gray-12 placeholder:text-gray-8 outline-none focus:border-purple-8 focus:ring-1 focus:ring-purple-8 transition-colors">{{ old("feedbacks.{$qId}", $item['teacher_feedback']) }}</textarea>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center bg-white rounded-2xl border border-gray-6 text-gray-11 space-y-2">
                        <p class="font-semibold text-sm text-gray-12">Tidak Ada Soal Essay pada Asesmen Ini</p>
                        <p class="text-xs text-gray-9">Seluruh butir soal telah dinilai secara otomatis oleh sistem.</p>
                    </div>
                @endforelse
            </div>

            <!-- Sticky Bottom Score & Action Bar -->
            <div class="sticky bottom-4 z-20 bg-white/95 backdrop-blur-md border border-gray-6 rounded-2xl p-4 shadow-lg flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <!-- Real-time Calculated Total -->
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl bg-purple-9 text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-xs">
                        <x-radix-icon name="check" class="w-5 h-5" />
                    </div>
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-10 block">Estimasi Skor Total (Real-time)</span>
                        <div class="flex items-baseline gap-2">
                            <span class="font-mono font-extrabold text-xl text-gray-12" x-text="combinedScore"></span>
                            <span class="text-xs font-mono text-gray-9" x-text="'/ ' + maxTotal + ' Poin (' + combinedPercentage + '%)'"></span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-2.5">
                    <button type="submit"
                            name="action"
                            value="save_draft"
                            class="px-4 py-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-2 text-xs font-bold text-gray-12 transition-colors shadow-2xs cursor-pointer">
                        Simpan Draf Koreksi
                    </button>
                    <button type="submit"
                            name="action"
                            value="release_final"
                            onclick="return confirm('Apakah Anda yakin ingin memfinalisasi dan merilis nilai resmi ini ke siswa? Nilai akhir akan langsung diperbarui di portal hasil siswa.');"
                            class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-xs font-bold text-white transition-all shadow-xs cursor-pointer">
                        <x-radix-icon name="lock-closed" class="w-4 h-4" />
                        <span>Rilis Nilai Final ke Siswa</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                if (typeof window.triggerKaTeX === 'function') {
                    window.triggerKaTeX();
                }
            }, 120);
        });
    </script>
</x-layouts.app>
