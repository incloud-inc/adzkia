    isOpen: false,
    loading: false,
    uploadingImage: false,
    r2PickerOpen: false,
    loadingR2: false,
    r2Search: '',
    r2Filter: 'all',
    r2Files: [],
    questionId: null,
    type: 'mcq_single',
    prompt: '',
    points: 1,
    explanation: '',
    options: [],
    shortAnswer: '',
    correctOptionIndex: 0,
    errorMessage: '',
    successMessage: '',

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
            this.prompt += `\n![${item.name}](${item.url})\n`;
        } else if (item.is_audio) {
            this.prompt += `\n<audio controls src="${item.url}"></audio>\n`;
        } else {
            this.prompt += `\n[${item.name}](${item.url})\n`;
        }
        this.r2PickerOpen = false;
    },


    openEditModal(data) {
        this.questionId = data.id;
        this.type = data.type || 'mcq_single';
        this.prompt = data.prompt || '';
        this.points = data.points || 1;
        this.explanation = data.explanation || '';
        this.shortAnswer = data.short_answer || '';
        this.errorMessage = '';
        this.successMessage = '';

        if (Array.isArray(data.options) && data.options.length > 0) {
            this.options = data.options.map((opt, i) => ({
                id: opt.id || null,
                label: opt.label || String.fromCharCode(65 + i),
                option_text: opt.option_text || '',
                is_correct: !!opt.is_correct
            }));
            const correctIdx = this.options.findIndex(o => o.is_correct);
            this.correctOptionIndex = correctIdx !== -1 ? correctIdx : 0;
        } else {
            this.options = [
                { id: null, label: 'A', option_text: '', is_correct: true },
                { id: null, label: 'B', option_text: '', is_correct: false },
                { id: null, label: 'C', option_text: '', is_correct: false },
            ];
            this.correctOptionIndex = 0;
        }

        this.isOpen = true;
    },

    closeModal() {
        this.isOpen = false;
        this.errorMessage = '';
        this.successMessage = '';
    },

    addOption() {
        const nextLetter = String.fromCharCode(65 + this.options.length);
        this.options.push({
            id: null,
            label: nextLetter,
            option_text: '',
            is_correct: false
        });
    },

    removeOption(index) {
        if (this.options.length <= 2) {
            alert('Minimal harus memiliki 2 pilihan jawaban.');
            return;
        }
        this.options.splice(index, 1);
        this.options.forEach((opt, idx) => {
            opt.label = String.fromCharCode(65 + idx);
        });
        if (this.correctOptionIndex >= this.options.length) {
            this.correctOptionIndex = 0;
        }
    },

    insertImagePlaceholder() {
        const template = '\n[Keterangan Gambar: Ilustrasi gambar benda/hewan di sini]\n';
        this.prompt += template;
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
                const imgMarkdown = `\n![Gambar Soal](${data.url})\n`;
                this.prompt += imgMarkdown;
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

    async saveQuestion() {
        if (!this.prompt.trim()) {
            this.errorMessage = 'Teks pertanyaan (prompt) tidak boleh kosong.';
            return;
        }

        this.loading = true;
        this.errorMessage = '';
        this.successMessage = '';

        const payload = {
            prompt: this.prompt,
            points: parseFloat(this.points) || 1,
            explanation: this.explanation,
            type: this.type,
            _token: '{{ csrf_token() }}',
            _method: 'PUT'
        };

        if (this.type === 'short_answer') {
            payload.short_answer = this.shortAnswer;
        } else if (['mcq_single', 'mcq_multiple', 'mcq_weighted'].includes(this.type)) {
            payload.options = this.options.map((opt, idx) => ({
                id: opt.id,
                label: opt.label,
                option_text: opt.option_text,
                is_correct: this.type === 'mcq_single' ? (idx === parseInt(this.correctOptionIndex)) : opt.is_correct
            }));
            payload.correct_option = this.correctOptionIndex;
        }

        try {
            const res = await fetch(`/questions/${this.questionId}`, {
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
                this.successMessage = 'Butir soal berhasil diperbarui!';
                setTimeout(() => {
                    window.location.reload();
                }, 700);
            } else {
                this.errorMessage = data.message || 'Gagal menyimpan perubahan soal.';
            }
        } catch (err) {
            this.errorMessage = 'Gagal menyimpan butir soal: ' + err.message;
        } finally {
            this.loading = false;
        }
    }
}"
@open-edit-question-modal.window="openEditModal($event.detail)"
x-show="isOpen"
x-cloak
class="fixed inset-0 z-50 overflow-y-auto"
aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div x-show="isOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs transition-opacity"
         @click="closeModal()"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <!-- Modal Dialog -->
        <div x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:my-8 w-full max-w-3xl border border-gray-200">

            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-slate-900 to-slate-800 px-6 py-4 flex items-center justify-between text-white">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-lg bg-sky-500/20 border border-sky-400/30 flex items-center justify-center text-sky-400">
                        <x-radix-icon name="pencil-2" class="w-4 h-4" />
                    </div>
                    <div>
                        <h3 class="font-display font-bold text-base text-white" id="modal-title">
                            Edit Butir Soal
                        </h3>
                        <p class="text-[11px] text-slate-300">
                            Tipe Soal: <span class="font-mono font-bold uppercase text-sky-300" x-text="type"></span>
                        </p>
                    </div>
                </div>
                <button type="button" @click="closeModal()" class="rounded-lg p-1.5 text-slate-400 hover:text-white hover:bg-slate-700/60 transition-colors cursor-pointer">
                    <x-radix-icon name="cross-2" class="w-5 h-5" />
                </button>
            </div>

            <!-- Modal Body -->
            <div class="p-6 space-y-5 max-h-[75vh] overflow-y-auto">
                <!-- Notifications -->
                <div x-show="errorMessage" x-cloak class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-2">
                    <x-radix-icon name="exclamation-triangle" class="w-4 h-4 shrink-0 text-rose-600" />
                    <span x-text="errorMessage"></span>
                </div>
                <div x-show="successMessage" x-cloak class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold flex items-center gap-2">
                    <x-radix-icon name="check-circled" class="w-4 h-4 shrink-0 text-emerald-600" />
                    <span x-text="successMessage"></span>
                </div>

                <!-- Info Bar Soal Gambar -->
                <div class="p-3.5 rounded-xl bg-sky-50 border border-sky-200 text-sky-900 text-xs flex items-start gap-3">
                    <x-radix-icon name="info-circled" class="w-4 h-4 text-sky-700 shrink-0 mt-0.5" />
                    <div class="space-y-1">
                        <p class="font-bold">Panduan Soal Bergambar & Kosakata Dasar:</p>
                        <p class="text-sky-800 text-[11px]">
                            Anda dapat menambahkan keterangan tempat gambar dengan format <code class="bg-sky-200/70 px-1 py-0.5 rounded text-sky-950 font-mono">[Keterangan Gambar: Deskripsi]</code>, atau langsung mengunggah file gambar ke soal via tombol di bawah.
                        </p>
                    </div>
                </div>

                <!-- Pertanyaan (Prompt) -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Isi Teks Pertanyaan / Soal <span class="text-rose-500">*</span>
                        </label>
                        <div class="flex items-center gap-2">
                            <!-- Select from Cloudflare R2 Gallery -->
                            <button type="button" @click="openR2Picker()" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 text-[11px] font-bold transition-colors cursor-pointer" title="Pilih gambar yang sudah ada dari Galeri R2">
                                <x-radix-icon name="image" class="w-3.5 h-3.5 text-emerald-700" />
                                <span>Pilih dari Galeri R2</span>
                            </button>

                            <!-- Quick Insert Keterangan Gambar -->
                            <button type="button" @click="insertImagePlaceholder()" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-[11px] font-semibold transition-colors cursor-pointer" title="Sisipkan tanda placeholder gambar">
                                <x-radix-icon name="text" class="w-3.5 h-3.5 text-gray-600" />
                                <span>+ Sisipkan Keterangan Gambar</span>
                            </button>

                            <!-- Direct Image Upload -->
                            <label class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-sky-100 hover:bg-sky-200 text-sky-800 text-[11px] font-bold transition-colors cursor-pointer">
                                <x-radix-icon name="upload" class="w-3.5 h-3.5 text-sky-700" />
                                <span x-text="uploadingImage ? 'Mengunggah...' : 'Unggah Gambar'">Unggah Gambar</span>
                                <input type="file" accept="image/*" class="hidden" @change="handleUploadImage($event)" :disabled="uploadingImage">
                            </label>
                        </div>
                    </div>
                    <textarea x-model="prompt" rows="4" class="w-full rounded-xl border border-gray-300 p-3 text-xs text-gray-900 focus:border-sky-500 focus:ring-1 focus:ring-sky-500 font-sans leading-relaxed" placeholder="Tuliskan teks pertanyaan..."></textarea>
                </div>

                <!-- Bobot Poin -->
                <div class="w-48 space-y-1.5">
                    <label class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Bobot Poin
                    </label>
                    <div class="relative">
                        <input type="number" step="0.5" min="0" x-model="points" class="w-full rounded-xl border border-gray-300 py-2 px-3 text-xs font-mono font-bold text-gray-900 focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                        <span class="absolute right-3 top-2 text-xs text-gray-500 font-semibold">poin</span>
                    </div>
                </div>

                <!-- Bagian Pilihan Jawaban (Untuk Pilihan Ganda: MCQ Single) -->
                <template x-if="type === 'mcq_single'">
                    <div class="space-y-3 pt-2 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <label class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                                    Pilihan Jawaban (Opsi A, B, C)
                                </label>
                                <p class="text-[11px] text-gray-500">Pilih radio button lingkaran hijau di samping opsi yang merupakan <strong>kunci jawaban benar</strong>.</p>
                            </div>
                            <button type="button" @click="addOption()" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-emerald-50 hover:bg-emerald-100 text-emerald-800 border border-emerald-300 text-[11px] font-bold cursor-pointer transition-colors">
                                <x-radix-icon name="plus" class="w-3.5 h-3.5 text-emerald-700" />
                                <span>Tambah Opsi</span>
                            </button>
                        </div>

                        <div class="space-y-2.5">
                            <template x-for="(opt, idx) in options" :key="idx">
                                <div class="flex items-center gap-2.5 p-2.5 rounded-xl border transition-colors"
                                     :class="parseInt(correctOptionIndex) === idx ? 'border-emerald-400 bg-emerald-50/50' : 'border-gray-200 bg-gray-50/50'">
                                    <!-- Radio Button Kunci -->
                                    <label class="flex items-center gap-1.5 cursor-pointer shrink-0" :title="'Jadikan ' + opt.label + ' sebagai kunci jawaban benar'">
                                        <input type="radio" :name="'correct_opt_' + questionId" :value="idx"
                                               x-model="correctOptionIndex"
                                               class="w-4 h-4 text-emerald-600 focus:ring-emerald-500 cursor-pointer">
                                        <span class="w-6 h-6 rounded-md font-mono font-bold text-xs flex items-center justify-center shrink-0"
                                              :class="parseInt(correctOptionIndex) === idx ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-700'"
                                              x-text="opt.label"></span>
                                    </label>

                                    <!-- Option Text Input -->
                                    <input type="text" x-model="opt.option_text"
                                           class="flex-1 rounded-lg border border-gray-300 py-1.5 px-3 text-xs text-gray-900 focus:border-sky-500 focus:ring-1 focus:ring-sky-500 bg-white"
                                           :placeholder="'Teks pilihan ' + opt.label">

                                    <!-- Status Kunci Badge -->
                                    <span x-show="parseInt(correctOptionIndex) === idx" class="px-2 py-0.5 rounded text-[10px] font-extrabold bg-emerald-600 text-white uppercase shrink-0">
                                        Kunci
                                    </span>

                                    <!-- Delete Button -->
                                    <button type="button" @click="removeOption(idx)" class="p-1 rounded text-gray-400 hover:text-rose-600 transition-colors cursor-pointer shrink-0" title="Hapus opsi ini">
                                        <x-radix-icon name="trash" class="w-4 h-4" />
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

                <!-- Bagian Kunci Jawaban (Untuk Isian Singkat) -->
                <template x-if="type === 'short_answer'">
                    <div class="space-y-2 pt-2 border-t border-gray-200">
                        <label class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Kunci Jawaban Isian Singkat <span class="text-rose-500">*</span>
                        </label>
                        <p class="text-[11px] text-gray-500">Tuliskan kata atau jawaban yang tepat (contoh: bebek, mencuci tangan, 2 suku kata).</p>
                        <input type="text" x-model="shortAnswer" class="w-full rounded-xl border border-gray-300 py-2 px-3 text-xs font-mono font-bold text-emerald-800 bg-emerald-50/30 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500" placeholder="Kunci jawaban benar...">
                    </div>
                </template>

                <!-- Bagian Jawaban (Untuk Uraian / Essay) -->
                <template x-if="type === 'essay'">
                    <div class="space-y-2 pt-2 border-t border-gray-200">
                        <label class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Panduan / Kunci Jawaban Uraian
                        </label>
                        <p class="text-[11px] text-gray-500">Tuliskan rujukan jawaban yang diharapkan dan pedoman pemberian nilai oleh guru.</p>
                        <textarea x-model="explanation" rows="3" class="w-full rounded-xl border border-gray-300 p-3 text-xs text-gray-900 focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Pedoman jawaban siswa..."></textarea>
                    </div>
                </template>

                <!-- Pembahasan Soal (Explanation) -->
                <div class="space-y-2 pt-2 border-t border-gray-200">
                    <label class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                        Pembahasan Soal & Keterangan Belajar
                    </label>
                    <textarea x-model="explanation" rows="3" class="w-full rounded-xl border border-gray-300 p-3 text-xs text-gray-900 focus:border-sky-500 focus:ring-1 focus:ring-sky-500" placeholder="Tuliskan penjelasan atau langkah penyelesaian soal..."></textarea>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="bg-gray-50 px-6 py-4 flex items-center justify-end gap-3 border-t border-gray-200">
                <button type="button" @click="closeModal()" :disabled="loading" class="px-4 py-2 rounded-xl border border-gray-300 bg-white hover:bg-gray-100 text-gray-700 text-xs font-semibold transition-colors cursor-pointer">
                    Batal
                </button>
                <button type="button" @click="saveQuestion()" :disabled="loading" class="inline-flex items-center gap-1.5 px-5 py-2 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-xs font-bold transition-all shadow-sm cursor-pointer disabled:opacity-50">
                    <svg x-show="loading" class="w-3.5 h-3.5 animate-spin text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="4" opacity=".2"/><path stroke-width="4" d="M12 2a10 10 0 0 1 10 10"/></svg>
                    <x-radix-icon x-show="!loading" name="check" class="w-3.5 h-3.5 text-white" />
                    <span x-text="loading ? 'Menyimpan...' : 'Simpan Perubahan'">Simpan Perubahan</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Sub-Modal: R2 Media Picker -->
    <div x-show="r2PickerOpen" x-cloak class="fixed inset-0 z-60 overflow-y-auto" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-950/75 backdrop-blur-xs transition-opacity" @click="r2PickerOpen = false"></div>
        <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-4xl border border-gray-200 flex flex-col max-h-[85vh]">
                <!-- Header -->
                <div class="bg-gradient-to-r from-emerald-800 to-teal-900 px-6 py-4 flex items-center justify-between text-white shrink-0">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-white/10 border border-white/20 flex items-center justify-center text-emerald-300">
                            <x-radix-icon name="image" class="w-5 h-5" />
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-base text-white">
                                Galeri Media R2 (Cloudflare)
                            </h3>
                            <p class="text-xs text-emerald-200/80">
                                Klik media untuk langsung menautkan ke teks pertanyaan soal.
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('media.gallery.index') }}" target="_blank" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs font-semibold transition-colors" title="Buka Pengelola Galeri Penuh di Tab Baru">
                            <x-radix-icon name="external-link" class="w-3.5 h-3.5" />
                            <span>Buka Galeri Penuh</span>
                        </a>
                        <button type="button" @click="r2PickerOpen = false" class="rounded-lg p-1.5 text-white/70 hover:text-white hover:bg-white/10 transition-colors cursor-pointer">
                            <x-radix-icon name="cross-2" class="w-5 h-5" />
                        </button>
                    </div>
                </div>

                <!-- Search & Filter Controls -->
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
                            <x-radix-icon name="reload" class="w-3.5 h-3.5" :class="loadingR2 ? 'animate-spin' : ''" />
                        </button>
                    </div>
                </div>

                <!-- Media Grid -->
                <div class="p-5 overflow-y-auto flex-1 bg-slate-50/50">
                    <!-- Loading State -->
                    <div x-show="loadingR2" class="py-12 flex flex-col items-center justify-center text-center">
                        <svg class="w-8 h-8 animate-spin text-emerald-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="4" opacity=".2"/><path stroke-width="4" d="M12 2a10 10 0 0 1 10 10"/></svg>
                        <p class="text-xs font-medium text-gray-600">Memuat berkas dari Cloudflare R2...</p>
                    </div>

                    <!-- Empty State -->
                    <div x-show="!loadingR2 && filteredR2Files.length === 0" class="py-12 text-center">
                        <x-radix-icon name="image" class="w-10 h-10 text-gray-400 mx-auto mb-2 opacity-50" />
                        <p class="text-sm font-semibold text-gray-700">Tidak ada berkas yang ditemukan</p>
                        <p class="text-xs text-gray-500 mt-1">Coba sesuaikan kata kunci pencarian atau unggah gambar terlebih dahulu.</p>
                    </div>

                    <!-- Cards -->
                    <div x-show="!loadingR2 && filteredR2Files.length > 0" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2.5">
                        <template x-for="item in filteredR2Files" :key="item.path">
                            <div @click="insertR2Item(item)" class="group bg-white rounded-xl border border-slate-200/80 hover:border-slate-800 hover:shadow-md transition-all duration-150 cursor-pointer overflow-hidden flex flex-col relative text-left">
                                <!-- Thumbnail -->
                                <div class="h-24 bg-slate-50 flex items-center justify-center overflow-hidden relative border-b border-slate-100">
                                    <template x-if="item.is_image">
                                        <img :src="item.url" :alt="item.name" loading="lazy" class="w-full h-full object-contain p-1.5 group-hover:scale-105 transition-transform duration-200">
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
                                        <span class="bg-emerald-600 text-white text-[10px] font-bold px-2 py-1 rounded-md shadow-sm">Pilih Gambar</span>
                                    </div>
                                </div>
                                <!-- Metadata -->
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

