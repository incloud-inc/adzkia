<script>
    function editStimulusModal() {
        return {
            isOpen: false,
            loading: false,
            uploadingImage: false,
            r2PickerOpen: false,
            loadingR2: false,
            r2Search: '',
            r2Filter: 'all',
            r2Files: [],
            groupId: null,
            title: '',
            stimulusContent: '',
            activeTab: 'edit',
            errorMessage: '',
            successMessage: '',

            openEditModal(data) {
                this.groupId = data.id;
                this.title = data.title || '';
                this.stimulusContent = data.stimulus_content || '';
                this.activeTab = 'edit';
                this.errorMessage = '';
                this.successMessage = '';
                this.isOpen = true;

                this.$nextTick(() => {
                    if (this.$refs.stimulusTextarea) {
                        this.$refs.stimulusTextarea.focus();
                    }
                });
            },

            closeModal() {
                this.isOpen = false;
                this.errorMessage = '';
                this.successMessage = '';
                this.r2PickerOpen = false;
            },

            setTab(tab) {
                this.activeTab = tab;
                if (tab === 'preview') {
                    this.$nextTick(() => {
                        if (window.triggerKaTeX && this.$refs.previewBox) {
                            window.triggerKaTeX(this.$refs.previewBox);
                        }
                    });
                }
            },

            getRenderedPreview() {
                if (!this.stimulusContent || !this.stimulusContent.trim()) {
                    return '<p class="text-gray-400 italic">Belum ada teks stimulus/wacana yang ditulis...</p>';
                }
                if (window.marked && typeof window.marked.parse === 'function') {
                    try {
                        return window.marked.parse(this.stimulusContent);
                    } catch (e) {
                        return this.stimulusContent;
                    }
                }
                return this.stimulusContent.replace(/\n/g, '<br>');
            },

            wrapText(before, after) {
                const textarea = this.$refs.stimulusTextarea;
                if (!textarea) {
                    this.stimulusContent += before + after;
                    return;
                }
                const start = textarea.selectionStart;
                const end = textarea.selectionEnd;
                const text = this.stimulusContent;
                const selected = text.substring(start, end);
                this.stimulusContent = text.substring(0, start) + before + selected + after + text.substring(end);
                this.$nextTick(() => {
                    textarea.focus();
                    textarea.setSelectionRange(start + before.length, end + before.length);
                });
            },

            insertTable() {
                const template = "\n\n| Kolom 1 | Kolom 2 | Kolom 3 |\n| :--- | :--- | :--- |\n| Baris 1 | Data A | Data B |\n| Baris 2 | Data C | Data D |\n\n";
                this.stimulusContent += template;
            },

            insertImagePlaceholder() {
                const template = '\n[Keterangan Gambar: Ilustrasi/grafik stimulus di sini]\n';
                this.stimulusContent += template;
            },

            async openR2Picker() {
                this.r2PickerOpen = true;
                if (this.r2Files.length === 0) {
                    await this.loadR2Files();
                }
            },

            async loadR2Files() {
                this.loadingR2 = true;
                try {
                    const res = await fetch('{{ route('media.gallery.files') }}');
                    const data = await res.json();
                    this.r2Files = data.files || [];
                } catch (e) {
                    console.error('Failed to load R2 files', e);
                } finally {
                    this.loadingR2 = false;
                }
            },

            get filteredR2Files() {
                return this.r2Files.filter(f => {
                    const matchesSearch = !this.r2Search || f.name.toLowerCase().includes(this.r2Search.toLowerCase());
                    const matchesType = this.r2Filter === 'all' || 
                        (this.r2Filter === 'image' && f.is_image) ||
                        (this.r2Filter === 'audio' && f.is_audio) ||
                        (this.r2Filter === 'video' && f.is_video);
                    return matchesSearch && matchesType;
                });
            },

            insertR2Item(item) {
                if (item.is_image) {
                    this.stimulusContent += `\n![${item.name}](${item.url})\n`;
                } else if (item.is_audio) {
                    this.stimulusContent += `\n<audio controls src="${item.url}"></audio>\n`;
                } else if (item.is_video) {
                    this.stimulusContent += `\n<video controls class="w-full rounded-xl" src="${item.url}"></video>\n`;
                } else {
                    this.stimulusContent += `\n[${item.name}](${item.url})\n`;
                }
                this.r2PickerOpen = false;
            },

            async handleUploadImage(event) {
                const file = event.target.files[0];
                if (!file) return;

                this.uploadingImage = true;
                this.errorMessage = '';

                const formData = new FormData();
                formData.append('media', file);
                formData.append('_token', '{{ csrf_token() }}');

                try {
                    const res = await fetch('{{ route('assessments.upload-media') }}', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    });

                    const data = await res.json();
                    if (res.ok && data.url) {
                        const imgMarkdown = `\n![Gambar Stimulus](${data.url})\n`;
                        this.stimulusContent += imgMarkdown;
                    } else {
                        this.errorMessage = data.message || 'Gagal mengunggah berkas gambar.';
                    }
                } catch (err) {
                    this.errorMessage = 'Terjadi kesalahan saat mengunggah gambar: ' + err.message;
                } finally {
                    this.uploadingImage = false;
                    event.target.value = '';
                }
            },

            async saveStimulus() {
                if (!this.stimulusContent.trim()) {
                    this.errorMessage = 'Konten stimulus/wacana tidak boleh kosong.';
                    return;
                }

                this.loading = true;
                this.errorMessage = '';
                this.successMessage = '';

                const payload = {
                    title: this.title,
                    stimulus_content: this.stimulusContent,
                    _token: '{{ csrf_token() }}',
                    _method: 'PUT'
                };

                try {
                    const res = await fetch(`/question-groups/${this.groupId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    });

                    const data = await res.json();

                    if (res.ok && data.success) {
                        this.successMessage = 'Stimulus narasi berhasil diperbarui!';
                        setTimeout(() => {
                            window.location.reload();
                        }, 700);
                    } else {
                        this.errorMessage = data.message || 'Gagal menyimpan perubahan stimulus.';
                    }
                } catch (err) {
                    this.errorMessage = 'Gagal menyimpan stimulus: ' + err.message;
                } finally {
                    this.loading = false;
                }
            }
        };
    }

    window.openEditStimulusModal = function(data) {
        window.dispatchEvent(new CustomEvent('open-edit-stimulus-modal', { detail: data }));
    };

    if (window.Alpine) {
        window.Alpine.data('editStimulusModal', editStimulusModal);
    } else {
        document.addEventListener('alpine:init', () => {
            window.Alpine.data('editStimulusModal', editStimulusModal);
        });
    }
</script>

<div x-data="editStimulusModal()"
     @open-edit-stimulus-modal.window="openEditModal($event.detail)"
     @keydown.escape.window="if (!r2PickerOpen) closeModal()"
     x-show="isOpen"
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="stimulus-modal-title" role="dialog" aria-modal="true">

    <!-- Backdrop -->
    <div x-show="isOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs transition-opacity"
         @click="if (!r2PickerOpen) closeModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <!-- Modal Dialog -->
        <div x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 w-full max-w-4xl border border-gray-200">

            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-emerald-900 via-teal-900 to-slate-900 px-6 py-4 flex items-center justify-between text-white border-b border-emerald-800/40">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-500/20 border border-emerald-400/40 flex items-center justify-center text-emerald-300 shadow-inner">
                        <x-radix-icon name="pencil-2" class="w-4 h-4" />
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-base text-white tracking-tight" id="stimulus-modal-title">
                            Edit Stimulus / Narasi Wacana
                        </h3>
                        <p class="text-[11px] text-emerald-200/80">
                            Perbarui teks wacana bacaan berseri, judul stimulus, atau berkas pendukung.
                        </p>
                    </div>
                </div>
                <button type="button" @click="closeModal()" class="rounded-lg p-1.5 text-emerald-300/70 hover:text-white hover:bg-white/10 transition-colors cursor-pointer">
                    <x-radix-icon name="cross-2" class="w-5 h-5" />
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-5 max-h-[78vh] overflow-y-auto">
                <!-- Notifications -->
                <div x-show="errorMessage" x-cloak class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-2">
                    <x-radix-icon name="exclamation-triangle" class="w-4 h-4 shrink-0 text-rose-600" />
                    <span x-text="errorMessage"></span>
                </div>
                <div x-show="successMessage" x-cloak class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2">
                    <x-radix-icon name="check-circled" class="w-4 h-4 shrink-0 text-emerald-600" />
                    <span x-text="successMessage"></span>
                </div>

                <!-- Judul Stimulus -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Judul Stimulus / Wacana (Opsional)
                    </label>
                    <input type="text"
                           x-model="title"
                           placeholder="Contoh: Teks Bacaan 1 / Studi Kasus Pencemaran Lingkungan"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 text-xs font-semibold text-gray-900 placeholder-gray-400 transition-all outline-none" />
                    <p class="text-[11px] text-gray-500">
                        Judul penanda stimulus yang akan terlihat oleh peserta ujian di atas wacana bacaan.
                    </p>
                </div>

                <!-- Konten Stimulus Editor -->
                <div class="space-y-2">
                    <div class="flex flex-wrap items-center justify-between gap-2 border-b border-gray-200 pb-2">
                        <!-- Mode Tabs -->
                        <div class="flex items-center gap-1 bg-gray-100 p-1 rounded-xl">
                            <button type="button"
                                    @click="setTab('edit')"
                                    :class="activeTab === 'edit' ? 'bg-white text-emerald-800 shadow-xs font-bold' : 'text-gray-600 hover:text-gray-900 font-semibold'"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                <x-radix-icon name="pencil-1" class="w-3.5 h-3.5" />
                                <span>Editor Wacana</span>
                            </button>
                            <button type="button"
                                    @click="setTab('preview')"
                                    :class="activeTab === 'preview' ? 'bg-white text-emerald-800 shadow-xs font-bold' : 'text-gray-600 hover:text-gray-900 font-semibold'"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                <x-radix-icon name="eye-open" class="w-3.5 h-3.5" />
                                <span>Pratinjau Tampilan</span>
                            </button>
                        </div>

                        <!-- Media Actions -->
                        <div class="flex items-center gap-2">
                            <!-- R2 Picker -->
                            <button type="button" @click="openR2Picker()" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 text-[11px] font-bold transition-colors cursor-pointer" title="Pilih berkas dari Galeri Cloudflare R2">
                                <x-radix-icon name="image" class="w-3.5 h-3.5 text-emerald-700" />
                                <span>Galeri R2</span>
                            </button>

                            <!-- Placeholder Gambar -->
                            <button type="button" @click="insertImagePlaceholder()" class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-[11px] font-semibold transition-colors cursor-pointer" title="Sisipkan tanda placeholder gambar">
                                <x-radix-icon name="text" class="w-3.5 h-3.5 text-gray-600" />
                                <span>+ Placeholder</span>
                            </button>

                            <!-- Upload Gambar -->
                            <label class="inline-flex items-center gap-1 px-2.5 py-1.5 rounded-lg bg-sky-100 hover:bg-sky-200 text-sky-800 text-[11px] font-bold transition-colors cursor-pointer">
                                <x-radix-icon name="upload" class="w-3.5 h-3.5 text-sky-700" />
                                <span x-text="uploadingImage ? 'Mengunggah...' : 'Unggah Gambar'">Unggah Gambar</span>
                                <input type="file" accept="image/*" class="hidden" @change="handleUploadImage($event)" :disabled="uploadingImage">
                            </label>
                        </div>
                    </div>

                    <!-- Tab 1: Edit Area -->
                    <div x-show="activeTab === 'edit'" class="space-y-2">
                        <!-- Quick Formatting Toolbar -->
                        <div class="flex flex-wrap items-center gap-1 bg-slate-50 p-2 rounded-xl border border-gray-200 text-gray-700">
                            <button type="button" @click="wrapText('# ', '\n')" class="px-2 py-1 rounded hover:bg-gray-200 text-xs font-bold transition-colors" title="Judul Besar (H1)">H1</button>
                            <button type="button" @click="wrapText('## ', '\n')" class="px-2 py-1 rounded hover:bg-gray-200 text-xs font-bold transition-colors" title="Sub Judul (H2)">H2</button>
                            <div class="w-px h-4 bg-gray-300 mx-1"></div>
                            <button type="button" @click="wrapText('**', '**')" class="px-2 py-1 rounded hover:bg-gray-200 text-xs font-bold transition-colors" title="Tebal (Bold)">B</button>
                            <button type="button" @click="wrapText('*', '*')" class="px-2 py-1 rounded hover:bg-gray-200 text-xs italic font-serif transition-colors" title="Miring (Italic)">I</button>
                            <button type="button" @click="wrapText('<u>', '</u>')" class="px-2 py-1 rounded hover:bg-gray-200 text-xs underline transition-colors" title="Garis Bawah (Underline)">U</button>
                            <div class="w-px h-4 bg-gray-300 mx-1"></div>
                            <!-- Quick KaTeX Math -->
                            <button type="button" @click="wrapText('$', '$')" class="px-1.5 py-0.5 rounded hover:bg-emerald-100 text-xs font-mono font-bold text-emerald-800 transition-colors" title="Rumus Inline ($...$)">$</button>
                            <button type="button" @click="wrapText('$$', '$$')" class="px-1.5 py-0.5 rounded hover:bg-emerald-100 text-xs font-mono font-bold text-emerald-800 transition-colors" title="Rumus Display ($$...$$)">$$</button>
                            <button type="button" @click="wrapText('$\\frac{', '}{b}$')" class="px-1.5 py-0.5 rounded hover:bg-gray-200 text-xs font-serif font-bold transition-colors" title="Pecahan">a/b</button>
                            <button type="button" @click="wrapText('$\\sqrt{', '}$')" class="px-1.5 py-0.5 rounded hover:bg-gray-200 text-xs font-serif font-bold transition-colors" title="Akar">√</button>
                            <button type="button" @click="insertTable()" class="px-2 py-1 rounded hover:bg-gray-200 text-xs font-semibold transition-colors flex items-center gap-1" title="Sisipkan Tabel">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-10v16M4 4h16a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V5a1 1 0 011-1z"/></svg>
                                <span>Tabel</span>
                            </button>
                            <button type="button" @click="wrapText('> ', '\n')" class="px-2 py-1 rounded hover:bg-gray-200 text-xs font-serif transition-colors" title="Kutipan (Quote)">”</button>

                            <button type="button" @click="window.dispatchEvent(new CustomEvent('open-math-cheatsheet', { detail: { textarea: $refs.stimulusTextarea } }))" class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 text-[11px] font-bold transition-colors cursor-pointer ml-auto" title="Buka Kamus Rumus KaTeX">
                                <span>📐</span>
                                <span>Kamus Rumus</span>
                            </button>
                        </div>

                        <!-- Textarea -->
                        <textarea x-ref="stimulusTextarea"
                                  x-model="stimulusContent"
                                  rows="12"
                                  placeholder="Ketik atau tempelkan narasi/wacana wacana berseri di sini... (Mendukung Markdown, tabel, paragraf, dialog, LaTeX $$...$$, gambar, audio, dan video)"
                                  class="w-full rounded-xl border border-gray-300 p-4 text-xs text-gray-900 focus:border-emerald-600 focus:ring-2 focus:ring-emerald-100 font-sans leading-relaxed transition-all outline-none resize-y"></textarea>
                    </div>

                    <!-- Tab 2: Preview Area -->
                    <div x-show="activeTab === 'preview'" x-cloak class="space-y-2">
                        <div class="rounded-xl border border-emerald-300 bg-emerald-50/30 p-5 min-h-[300px] max-h-[500px] overflow-y-auto shadow-inner">
                            <div class="text-xs font-bold text-emerald-800 uppercase tracking-wider mb-2" x-text="title ? ('Stimulus Narasi: ' + title) : 'Stimulus Narasi: Wacana'"></div>
                            <div x-ref="previewBox"
                                 class="p-4 rounded-xl border border-emerald-200 bg-white text-sm text-gray-900 leading-relaxed prose prose-sm max-w-none shadow-2xs"
                                 x-html="getRenderedPreview()"></div>
                        </div>
                    </div>

                    <p class="text-[11px] text-gray-500">
                        💡 Mendukung teks narasi panjang, pemisah paragraf, tabel perbandingan, gambar, audio listening, dan rumus matematika LaTeX.
                    </p>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end gap-3 rounded-b-2xl">
                <button type="button"
                        @click="closeModal()"
                        :disabled="loading"
                        class="px-4 py-2 rounded-xl border border-gray-300 bg-white hover:bg-gray-100 text-gray-700 font-bold text-xs transition-colors cursor-pointer disabled:opacity-50">
                    Batal
                </button>
                <button type="button"
                        @click="saveStimulus()"
                        :disabled="loading || !stimulusContent.trim()"
                        class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs shadow-md transition-all cursor-pointer active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg x-show="loading" class="w-3.5 h-3.5 animate-spin text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" stroke-width="4" opacity=".2"/>
                        <path stroke-width="4" d="M12 2a10 10 0 0 1 10 10"/>
                    </svg>
                    <x-radix-icon x-show="!loading" name="check" class="w-4 h-4 text-white" />
                    <span x-text="loading ? 'Menyimpan...' : 'Simpan Stimulus'">Simpan Stimulus</span>
                </button>
            </div>
        </div>
    </div>

    <!-- R2 Media Gallery Picker Modal -->
    <div x-show="r2PickerOpen"
         x-cloak
         class="fixed inset-0 z-60 overflow-y-auto"
         aria-labelledby="stimulus-r2-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs transition-opacity" @click="r2PickerOpen = false"></div>
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-4xl border border-gray-200 flex flex-col max-h-[85vh]">
                <!-- Header -->
                <div class="bg-gradient-to-r from-emerald-900 to-teal-900 px-6 py-4 flex items-center justify-between text-white shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/20 border border-emerald-400/30 flex items-center justify-center text-emerald-300">
                            <x-radix-icon name="image" class="w-4 h-4" />
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-base text-white" id="stimulus-r2-title">
                                Galeri Media R2 (Cloudflare)
                            </h3>
                            <p class="text-xs text-emerald-200/80">
                                Klik media untuk langsung menautkan ke teks wacana stimulus.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('media.gallery.index') }}" target="_blank" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs font-semibold transition-colors" title="Buka Pengelola Galeri Penuh di Tab Baru">
                            <x-radix-icon name="external-link" class="w-3.5 h-3.5" />
                            <span>Buka Galeri</span>
                        </a>
                        <button type="button" @click="r2PickerOpen = false" class="rounded-lg p-1.5 text-white/70 hover:text-white hover:bg-white/10 transition-colors cursor-pointer">
                            <x-radix-icon name="cross-2" class="w-5 h-5" />
                        </button>
                    </div>
                </div>

                <!-- Search & Filters -->
                <div class="p-4 bg-gray-50 border-b border-gray-200 flex flex-wrap items-center justify-between gap-3 shrink-0">
                    <div class="relative flex-1 min-w-[220px]">
                        <x-radix-icon name="magnifying-glass" class="w-4 h-4 absolute left-3 top-2.5 text-gray-400" />
                        <input type="text" x-model="r2Search" placeholder="Cari nama berkas..." class="w-full pl-9 pr-3 py-1.5 rounded-lg border border-gray-300 text-xs focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 bg-white">
                    </div>
                    <div class="flex items-center gap-1.5">
                        <button type="button" @click="r2Filter = 'all'" :class="r2Filter === 'all' ? 'bg-emerald-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'" class="px-2.5 py-1 rounded-lg text-xs font-semibold cursor-pointer transition-colors">Semua</button>
                        <button type="button" @click="r2Filter = 'image'" :class="r2Filter === 'image' ? 'bg-emerald-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'" class="px-2.5 py-1 rounded-lg text-xs font-semibold cursor-pointer transition-colors">Gambar</button>
                        <button type="button" @click="r2Filter = 'audio'" :class="r2Filter === 'audio' ? 'bg-emerald-600 text-white' : 'bg-white text-gray-700 hover:bg-gray-100 border border-gray-300'" class="px-2.5 py-1 rounded-lg text-xs font-semibold cursor-pointer transition-colors">Audio</button>
                        <button type="button" @click="loadR2Files()" class="p-1.5 rounded-lg bg-white hover:bg-gray-100 border border-gray-300 text-gray-600 cursor-pointer transition-colors ml-1" title="Muat Ulang Berkas">
                            <x-radix-icon name="reload" class="w-3.5 h-3.5" ::class="loadingR2 ? 'animate-spin' : ''" />
                        </button>
                    </div>
                </div>

                <!-- Media Grid -->
                <div class="p-5 overflow-y-auto flex-1 bg-slate-50/50">
                    <div x-show="loadingR2" class="py-12 flex flex-col items-center justify-center text-center">
                        <svg class="w-8 h-8 animate-spin text-emerald-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="4" opacity=".2"/><path stroke-width="4" d="M12 2a10 10 0 0 1 10 10"/></svg>
                        <p class="text-xs font-medium text-gray-600">Memuat berkas dari Cloudflare R2...</p>
                    </div>

                    <div x-show="!loadingR2 && filteredR2Files.length === 0" class="py-12 text-center">
                        <x-radix-icon name="image" class="w-10 h-10 text-gray-400 mx-auto mb-2 opacity-50" />
                        <p class="text-sm font-semibold text-gray-700">Tidak ada berkas yang ditemukan</p>
                        <p class="text-xs text-gray-500 mt-1">Coba sesuaikan kata kunci pencarian atau unggah media terlebih dahulu.</p>
                    </div>

                    <div x-show="!loadingR2 && filteredR2Files.length > 0" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2.5">
                        <template x-for="item in filteredR2Files" :key="item.path">
                            <div @click="insertR2Item(item)" class="group bg-white rounded-xl border border-slate-200/80 hover:border-slate-800 hover:shadow-md transition-all duration-150 cursor-pointer overflow-hidden flex flex-col relative text-left">
                                <div class="h-24 bg-slate-50 flex items-center justify-center overflow-hidden relative border-b border-slate-100">
                                    <template x-if="item.is_image">
                                        <img :src="item.url" :alt="item.name" loading="lazy" class="w-full h-full object-contain p-1.5 group-hover:scale-105 transition-transform duration-200" onerror="if(!this.dataset.retried && this.src.includes('.r2.dev/')){this.dataset.retried='1';this.src='/media/r2/asesmen/' + (this.src.split('.r2.dev/asesmen/')[1] || '');}">
                                    </template>
                                    <template x-if="item.is_audio">
                                        <div class="flex flex-col items-center text-amber-600">
                                            <x-radix-icon name="speaker-loud" class="w-8 h-8" />
                                            <span class="text-[10px] font-bold mt-1 uppercase">Audio</span>
                                        </div>
                                    </template>
                                    <template x-if="item.is_video">
                                        <div class="flex flex-col items-center text-purple-600">
                                            <x-radix-icon name="video" class="w-8 h-8" />
                                            <span class="text-[10px] font-bold mt-1 uppercase">Video</span>
                                        </div>
                                    </template>
                                    <div class="absolute inset-0 bg-emerald-600/0 group-hover:bg-emerald-600/20 transition-colors flex items-center justify-center opacity-0 group-hover:opacity-100">
                                        <span class="bg-emerald-600 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">Pilih Media</span>
                                    </div>
                                </div>
                                <div class="p-2.5 flex-1 flex flex-col justify-between">
                                    <p class="text-[11px] font-medium text-gray-800 truncate" :title="item.name" x-text="item.name"></p>
                                    <div class="flex items-center justify-between text-[10px] text-gray-500 mt-1 font-mono">
                                        <span x-text="item.size_formatted"></span>
                                        <span class="uppercase font-bold text-gray-400" x-text="item.extension"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-6 py-3 flex items-center justify-between border-t border-gray-200 shrink-0">
                    <span class="text-xs text-gray-500" x-text="filteredR2Files.length + ' berkas ditemukan'"></span>
                    <button type="button" @click="r2PickerOpen = false" class="px-4 py-1.5 rounded-lg border border-gray-300 bg-white hover:bg-gray-100 text-gray-700 text-xs font-semibold transition-colors cursor-pointer">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
