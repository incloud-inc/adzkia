@props([
    'question',
    'canManage' => false,
])

@php
    $status = $question->explanation_status ?? ($question->explanation ? 'completed' : 'idle');
    $hasExplanation = filled($question->explanation);
@endphp

<div x-data="{
    status: '{{ $status }}',
    explanation: @js($question->explanation ?? ''),
    draft: @js($question->explanation ?? ''),
    editing: false,
    previewMode: 'edit', // 'edit' or 'preview'
    loading: false,
    saving: false,
    savedMessage: '',
    error: @js($question->explanation_error),
    generatedAt: @js($question->explanation_generated_at?->diffForHumans() ?? ''),
    pollTimer: null,

    get isDirty() {
        return (this.draft || '').trim() !== (this.explanation || '').trim();
    },

    get renderedMarkdown() {
        const text = this.explanation || '';
        if (!text) return '';
        if (typeof marked !== 'undefined' && marked.parse) {
            return marked.parse(text);
        }
        return text.replace(/\n/g, '<br>');
    },

    get renderedDraftMarkdown() {
        const text = this.draft || '';
        if (!text) return '<p class=\'text-gray-400 italic\'>Belum ada teks pembahasan yang ditulis...</p>';
        if (typeof marked !== 'undefined' && marked.parse) {
            return marked.parse(text);
        }
        return text.replace(/\n/g, '<br>');
    },

    insertSnippet(before, after = '') {
        const textarea = this.$refs.explanationTextarea;
        if (!textarea) return;
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const current = this.draft || '';
        const selected = current.substring(start, end);
        const replacement = before + (selected || 'teks') + after;
        this.draft = current.substring(0, start) + replacement + current.substring(end);
        this.$nextTick(() => {
            textarea.focus();
            textarea.setSelectionRange(start + before.length, start + before.length + (selected ? selected.length : 4));
        });
    },

    startEdit() {
        this.draft = this.explanation || '';
        this.editing = true;
        this.previewMode = 'edit';
        this.$nextTick(() => {
            if (this.$refs.explanationTextarea) {
                this.$refs.explanationTextarea.focus();
            }
        });
    },

    cancelEdit() {
        if (this.isDirty && !confirm('Perubahan belum disimpan. Yakin ingin membatalkan?')) {
            return;
        }
        this.draft = this.explanation || '';
        this.editing = false;
        this.previewMode = 'edit';
    },

    async saveExplanation() {
        if (this.saving) return;
        this.saving = true;
        this.savedMessage = '';

        try {
            const res = await fetch('{{ route('questions.explanation.update', $question) }}', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ explanation: this.draft })
            });

            const data = await res.json();
            if (res.ok && data.status === 'success') {
                this.explanation = data.explanation || '';
                this.draft = this.explanation;
                this.status = this.explanation ? 'completed' : 'idle';
                this.editing = false;
                this.generatedAt = 'Baru saja disimpan';
                this.savedMessage = data.message || 'Pembahasan berhasil disimpan!';
                setTimeout(() => { this.savedMessage = ''; }, 4500);
            } else {
                alert(data.message || 'Gagal menyimpan pembahasan.');
            }
        } catch (err) {
            console.error('Save explanation error:', err);
            alert('Terjadi kendala jaringan saat menyimpan. Silakan coba lagi.');
        } finally {
            this.saving = false;
        }
    },

    async regenerate() {
        if (this.loading) return;
        this.loading = true;
        this.status = 'processing';
        this.error = null;
        this.savedMessage = '';

        try {
            const res = await fetch('{{ route('questions.regenerate-explanation', $question) }}?sync=1', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            const data = await res.json();
            if (res.ok && data.status === 'success') {
                this.status = 'completed';
                this.explanation = data.explanation || '';
                this.draft = this.explanation;
                this.generatedAt = data.generated_at || 'Baru saja digenerate';
                this.savedMessage = '✨ DeepSeek AI berhasil men-generate pembahasan baru!';
                this.editing = false;
                setTimeout(() => { this.savedMessage = ''; }, 5000);
            } else {
                this.status = 'failed';
                this.error = data.message || 'Gagal menghasilkan pembahasan AI.';
            }
        } catch (err) {
            console.error('Regenerate error:', err);
            this.status = 'failed';
            this.error = err.message || 'Koneksi ke AI bermasalah.';
        } finally {
            this.loading = false;
        }
    }
}" class="mt-4">

    <!-- Notifikasi Sukses Simpan / Generate -->
    <div x-show="savedMessage" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="mb-3 p-3 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-900 text-xs font-semibold flex items-center justify-between shadow-xs">
        <div class="flex items-center gap-2">
            <span class="w-5 h-5 rounded-full bg-emerald-600 text-white flex items-center justify-center font-bold text-[11px] shrink-0">✓</span>
            <span x-text="savedMessage"></span>
        </div>
        <button type="button" @click="savedMessage = ''" class="text-emerald-700 hover:text-emerald-950 text-xs font-bold px-1.5 py-0.5 rounded cursor-pointer">✕</button>
    </div>

    <!-- 1. Kondisi Sukses: Pembahasan Tersedia (View & Edit Mode) -->
    <div x-show="(status === 'completed' && (explanation || editing)) || (status !== 'processing' && editing)"
         class="relative rounded-2xl border border-violet-200 bg-gradient-to-br from-violet-50/60 via-white to-indigo-50/40 p-4 sm:p-5 shadow-xs transition-all">
        
        <!-- Header Bar Pembahasan -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-violet-100 pb-3 mb-3.5">
            <!-- Label & Meta -->
            <div class="flex items-center gap-2 flex-wrap">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold text-white bg-gradient-to-r from-violet-600 to-indigo-600 shadow-xs">
                    <x-radix-icon name="magic-wand" class="w-3.5 h-3.5 text-white" />
                    <span>Pembahasan AI &amp; Kunci</span>
                </span>

                <span class="text-xs font-semibold text-violet-900 bg-violet-100 border border-violet-200 px-2 py-0.5 rounded-md">
                    Kak Tutor (DeepSeek)
                </span>

                <span x-show="generatedAt" x-text="generatedAt" class="text-[11px] text-gray-500 font-medium"></span>

                <!-- Status Perubahan Belum Disimpan -->
                <span x-show="isDirty" class="inline-flex items-center gap-1 text-[11px] font-bold text-amber-800 bg-amber-100 border border-amber-300 px-2 py-0.5 rounded-md animate-pulse">
                    <span>⚠️ Belum disimpan</span>
                </span>
            </div>

            <!-- Action Toolbar (Simpan, Edit, Regenerate) -->
            @if($canManage)
                <div class="flex items-center gap-2 flex-wrap">
                    <!-- Tombol Simpan Pembahasan (Selalu tampil saat edit atau ada perubahan yang belum disimpan) -->
                    <button type="button"
                            x-show="editing || isDirty"
                            @click="saveExplanation()"
                            :disabled="saving"
                            class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 shadow-xs transition-all cursor-pointer disabled:opacity-60"
                            title="Simpan pembahasan ke database">
                        <svg x-show="saving" class="w-3.5 h-3.5 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <x-radix-icon x-show="!saving" name="check" class="w-3.5 h-3.5 text-white" />
                        <span x-text="saving ? 'Menyimpan...' : 'Simpan Pembahasan'">Simpan Pembahasan</span>
                    </button>

                    <!-- Tombol Edit / Batal Edit -->
                    <template x-if="!editing">
                        <button type="button"
                                @click="startEdit()"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 border border-gray-300 shadow-2xs transition-all cursor-pointer"
                                title="Edit teks pembahasan ini">
                            <x-radix-icon name="pencil-1" class="w-3 h-3 text-gray-600" />
                            <span>Edit Teks</span>
                        </button>
                    </template>
                    <template x-if="editing">
                        <button type="button"
                                @click="cancelEdit()"
                                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 rounded-xl text-xs font-semibold text-rose-700 bg-white hover:bg-rose-50 border border-rose-200 shadow-2xs transition-all cursor-pointer"
                                title="Batalkan perubahan">
                            <x-radix-icon name="cross-2" class="w-3 h-3 text-rose-600" />
                            <span>Batal</span>
                        </button>
                    </template>

                    <!-- Tombol Regenerate AI -->
                    <button type="button" 
                            @click="regenerate()" 
                            :disabled="loading || saving"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-violet-800 bg-white hover:bg-violet-100 border border-violet-300 shadow-2xs active:scale-95 transition-all cursor-pointer disabled:opacity-60"
                            title="Generate ulang pembahasan dengan AI DeepSeek">
                        <svg x-show="loading" class="w-3 h-3 animate-spin text-violet-700" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <x-radix-icon x-show="!loading" name="reload" class="w-3 h-3 text-violet-700" />
                        <span x-text="loading ? 'Membuat AI...' : 'Regenerate AI'">Regenerate AI</span>
                    </button>
                </div>
            @endif
        </div>

        <!-- MODE 1: Preview Markdown Terformat (Read Mode) -->
        <div x-show="!editing">
            <div class="prose prose-sm max-w-none text-slate-800 font-medium leading-relaxed 
                        prose-headings:text-slate-900 prose-headings:font-bold
                        prose-h3:text-sm prose-h3:font-black prose-h3:text-violet-900 prose-h3:mt-3 prose-h3:mb-1.5
                        prose-p:my-1.5 prose-p:text-xs sm:prose-p:text-sm
                        prose-ul:my-1.5 prose-li:my-0.5 prose-li:text-xs sm:prose-li:text-sm
                        prose-strong:text-slate-950 prose-strong:font-bold
                        prose-code:text-violet-800 prose-code:bg-violet-100 prose-code:px-1 prose-code:py-0.5 prose-code:rounded">
                <template x-if="explanation">
                    <div x-html="renderedMarkdown"></div>
                </template>
                @if($question->explanation)
                    <template x-if="!renderedMarkdown">
                        <div>{!! Str::markdown($question->explanation) !!}</div>
                    </template>
                @endif
            </div>
        </div>

        <!-- MODE 2: Editor Teks & Live Preview (Edit Mode) -->
        <div x-show="editing" class="space-y-3">
            <!-- Toolbar Shortcut Formatting -->
            <div class="flex items-center justify-between flex-wrap gap-2 p-1.5 rounded-xl bg-gray-100/80 border border-gray-200">
                <div class="flex items-center gap-1 flex-wrap">
                    <button type="button" @click="insertSnippet('**', '**')" class="px-2 py-1 rounded bg-white hover:bg-gray-200 text-xs font-bold text-gray-800 border border-gray-300 cursor-pointer" title="Tebal (Bold)">
                        B
                    </button>
                    <button type="button" @click="insertSnippet('*', '*')" class="px-2 py-1 rounded bg-white hover:bg-gray-200 text-xs italic text-gray-800 border border-gray-300 cursor-pointer" title="Miring (Italic)">
                        I
                    </button>
                    <button type="button" @click="insertSnippet('### ')" class="px-2 py-1 rounded bg-white hover:bg-gray-200 text-xs font-semibold text-gray-800 border border-gray-300 cursor-pointer" title="Heading 3">
                        H3
                    </button>
                    <button type="button" @click="insertSnippet('- ')" class="px-2 py-1 rounded bg-white hover:bg-gray-200 text-xs text-gray-800 border border-gray-300 cursor-pointer" title="Bullet List">
                        • Daftar
                    </button>
                    <button type="button" @click="insertSnippet('$$\n', '\n$$')" class="px-2 py-1 rounded bg-white hover:bg-gray-200 text-xs font-mono text-gray-800 border border-gray-300 cursor-pointer" title="Rumus Matematika">
                        $$ Rumus
                    </button>
                </div>

                <div class="flex items-center bg-gray-200 rounded-lg p-0.5 text-xs font-semibold">
                    <button type="button" 
                            @click="previewMode = 'edit'"
                            :class="previewMode === 'edit' ? 'bg-white text-gray-900 shadow-2xs' : 'text-gray-600 hover:text-gray-900'"
                            class="px-2.5 py-1 rounded-md transition-all cursor-pointer">
                        Tulis Markdown
                    </button>
                    <button type="button" 
                            @click="previewMode = 'preview'"
                            :class="previewMode === 'preview' ? 'bg-white text-gray-900 shadow-2xs' : 'text-gray-600 hover:text-gray-900'"
                            class="px-2.5 py-1 rounded-md transition-all cursor-pointer">
                        Live Preview
                    </button>
                </div>
            </div>

            <!-- Area Teks Editor -->
            <div x-show="previewMode === 'edit'">
                <textarea x-ref="explanationTextarea"
                          x-model="draft"
                          rows="7"
                          placeholder="Tuliskan pembahasan soal secara lengkap dan terstruktur. Dukung format Markdown seperti **tebal**, bullet point, atau rumus..."
                          class="w-full p-3.5 rounded-xl border border-gray-300 focus:border-violet-500 focus:ring-2 focus:ring-violet-200 text-xs sm:text-sm font-sans text-gray-900 bg-white shadow-inner resize-y transition-all leading-relaxed"></textarea>
                <div class="flex items-center justify-between text-[11px] text-gray-500 mt-1">
                    <span>Mendukung sintaks Markdown standar.</span>
                    <span x-text="(draft || '').length + ' karakter'"></span>
                </div>
            </div>

            <!-- Area Live Preview -->
            <div x-show="previewMode === 'preview'" class="p-4 rounded-xl border border-gray-200 bg-white min-h-[160px]">
                <div class="prose prose-sm max-w-none text-slate-800 font-medium leading-relaxed 
                            prose-h3:text-sm prose-h3:font-black prose-h3:text-violet-900 prose-h3:mt-2 prose-h3:mb-1
                            prose-p:my-1 prose-p:text-xs sm:prose-p:text-sm
                            prose-ul:my-1 prose-li:my-0.5 prose-li:text-xs sm:prose-li:text-sm"
                     x-html="renderedDraftMarkdown">
                </div>
            </div>

            <!-- Footer Simpan Editor -->
            <div class="flex items-center justify-end gap-2.5 pt-2 border-t border-violet-100">
                <button type="button" 
                        @click="cancelEdit()" 
                        class="px-3.5 py-1.5 rounded-xl text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 border border-gray-300 cursor-pointer">
                    Batal
                </button>
                <button type="button" 
                        @click="saveExplanation()" 
                        :disabled="saving"
                        class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 shadow-sm cursor-pointer disabled:opacity-60">
                    <svg x-show="saving" class="w-3.5 h-3.5 animate-spin text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    <x-radix-icon x-show="!saving" name="check" class="w-3.5 h-3.5 text-white" />
                    <span x-text="saving ? 'Menyimpan...' : 'Simpan Pembahasan'">Simpan Pembahasan</span>
                </button>
            </div>
        </div>

    </div>

    <!-- 2. Kondisi Loading / Sedang Diproses oleh AI -->
    <div x-show="status === 'pending' || status === 'processing'"
         class="flex items-center justify-between gap-3 p-4 rounded-2xl border border-violet-300 bg-violet-50 text-violet-950 text-xs shadow-xs">
        <div class="flex items-center gap-3">
            <svg class="animate-spin h-5 w-5 text-violet-700 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <div>
                <p class="font-bold text-slate-900">Kak Tutor sedang menganalisis soal &amp; meracik trik pembahasan…</p>
                <p class="text-[11px] text-violet-800 mt-0.5">Menggunakan DeepSeek Reasoner untuk langkah penyelesaian logis &amp; presisi.</p>
            </div>
        </div>
        <span class="text-xs font-bold text-violet-700 animate-pulse shrink-0">Menghubungkan AI...</span>
    </div>

    <!-- 3. Kondisi Gagal -->
    <div x-show="status === 'failed' && !editing"
         class="flex items-center justify-between gap-3 p-4 rounded-2xl border border-rose-300 bg-rose-50 text-rose-950 text-xs shadow-xs">
        <div class="flex items-center gap-2.5 min-w-0">
            <x-radix-icon name="exclamation-triangle" class="w-5 h-5 shrink-0 text-rose-600" />
            <div class="truncate">
                <p class="font-bold text-rose-900">Gagal generate pembahasan:</p>
                <p x-text="error || 'Terjadi kesalahan sistem saat menghubungi server AI.'" class="text-rose-700 text-[11px] truncate"></p>
            </div>
        </div>
        @if($canManage)
            <div class="flex items-center gap-2 shrink-0">
                <button type="button" 
                        @click="startEdit()" 
                        class="px-3 py-1.5 rounded-xl bg-white hover:bg-gray-100 text-gray-800 border border-gray-300 font-bold text-xs cursor-pointer shadow-2xs">
                    Tulis Manual
                </button>
                <button type="button" 
                        @click="regenerate()" 
                        :disabled="loading"
                        class="px-3 py-1.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white font-bold text-xs cursor-pointer shadow-xs">
                    Coba Lagi
                </button>
            </div>
        @endif
    </div>

    <!-- 4. Kondisi Belum Ada Pembahasan (Idle / Skipped) -->
    <div x-show="!explanation && !editing && status !== 'processing' && status !== 'pending' && status !== 'failed'"
         class="p-4 rounded-2xl border border-dashed border-gray-300 bg-gray-50/80 text-xs text-gray-600 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-xl bg-violet-100 text-violet-700 flex items-center justify-center shrink-0">
                <x-radix-icon name="magic-wand" class="w-4 h-4 text-violet-700" />
            </div>
            <div>
                <p class="font-bold text-gray-800">Belum ada pembahasan untuk butir soal ini.</p>
                <p class="text-[11px] text-gray-500">Anda dapat membuat otomatis dengan AI atau mengetik pembahasan manual.</p>
            </div>
        </div>
        @if($canManage)
            <div class="flex items-center gap-2 shrink-0">
                <button type="button" 
                        @click="startEdit()"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-semibold text-gray-700 bg-white hover:bg-gray-100 border border-gray-300 shadow-2xs transition-all cursor-pointer">
                    <x-radix-icon name="pencil-1" class="w-3.5 h-3.5 text-gray-600" />
                    <span>Tulis Manual</span>
                </button>
                <button type="button" 
                        @click="regenerate()" 
                        :disabled="loading"
                        class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-violet-600 to-indigo-600 hover:from-violet-700 hover:to-indigo-700 shadow-xs cursor-pointer active:scale-95 transition-all">
                    <x-radix-icon name="plus" class="w-3.5 h-3.5 text-white" />
                    <span>Generate AI</span>
                </button>
            </div>
        @endif
    </div>

</div>
