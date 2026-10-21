<script>
    function editAssessmentModal() {
        return {
            isOpen: false,
            submitting: false,
            title: @js($assessment->title),
            description: @js($assessment->description ?? ''),
            errorMessage: '',

            openModal(data) {
                if (data && typeof data === 'object') {
                    if (data.title !== undefined) this.title = data.title;
                    if (data.description !== undefined) this.description = data.description || '';
                }
                this.errorMessage = '';
                this.isOpen = true;
                this.$nextTick(() => {
                    const input = this.$refs.titleInput;
                    if (input) {
                        input.focus();
                        input.select();
                    }
                });
            },

            closeModal() {
                this.isOpen = false;
                this.errorMessage = '';
            },

            async submitForm(e) {
                if (!this.title.trim()) {
                    this.errorMessage = 'Judul asesmen tidak boleh kosong.';
                    return;
                }
                this.submitting = true;
                this.errorMessage = '';

                // Kirim form via standard submit jika tidak ingin AJAX, atau fetch
                e.target.submit();
            }
        };
    }

    window.openEditAssessmentModal = function(data) {
        window.dispatchEvent(new CustomEvent('open-edit-assessment-modal', { detail: data }));
    };
</script>

<div x-data="editAssessmentModal()"
     x-cloak
     x-show="isOpen"
     @open-edit-assessment-modal.window="openModal($event.detail)"
     @keydown.escape.window="closeModal()"
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <!-- Backdrop Blur -->
    <div x-show="isOpen"
         x-transition:enter="ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs transition-opacity"
         @click="closeModal()"></div>

    <!-- Modal Content Container -->
    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        <div x-show="isOpen"
             x-transition:enter="ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-xl border border-gray-200">

            <form method="POST" action="{{ route('assessments.update', $assessment) }}" @submit="submitForm($event)">
                @csrf
                @method('PUT')

                <!-- Header -->
                <div class="px-6 py-5 bg-gradient-to-r from-blue-50/80 via-white to-indigo-50/40 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-blue-600 text-white flex items-center justify-center shadow-md">
                            <x-radix-icon name="pencil-2" class="w-5 h-5 text-white" />
                        </div>
                        <div>
                            <h3 class="text-base font-extrabold text-gray-900 font-display tracking-tight" id="modal-title">
                                Edit Judul &amp; Deskripsi Asesmen
                            </h3>
                            <p class="text-xs text-gray-600 mt-0.5">
                                Perbarui informasi utama asesmen tanpa memengaruhi butir soal atau sesi ujian.
                            </p>
                        </div>
                    </div>
                    <button type="button" @click="closeModal()" class="p-2 rounded-xl text-gray-400 hover:text-gray-700 hover:bg-gray-100 transition-colors cursor-pointer">
                        <x-radix-icon name="cross-2" class="w-5 h-5" />
                    </button>
                </div>

                <!-- Body -->
                <div class="p-6 space-y-5">
                    <!-- Error Message Alert -->
                    <div x-show="errorMessage" class="p-3.5 rounded-xl bg-rose-50 border border-rose-200 text-rose-800 text-xs font-semibold flex items-center gap-2">
                        <x-radix-icon name="exclamation-triangle" class="w-4 h-4 text-rose-600 shrink-0" />
                        <span x-text="errorMessage"></span>
                    </div>

                    <!-- Input: Judul Asesmen -->
                    <div class="space-y-1.5">
                        <label for="edit-assessment-title" class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Judul Asesmen <span class="text-rose-600">*</span>
                        </label>
                        <input type="text"
                               id="edit-assessment-title"
                               name="title"
                               x-ref="titleInput"
                               x-model="title"
                               required
                               maxlength="255"
                               placeholder="Contoh: UTBK 2020 [Soal Asli &amp; Latihan]"
                               class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-sm font-semibold text-gray-900 placeholder-gray-400 transition-all outline-none" />
                        <p class="text-[11px] text-gray-500">
                            Nama/judul ujian yang akan terlihat oleh siswa di dashboard dan kartu ujian.
                        </p>
                    </div>

                    <!-- Textarea: Deskripsi & Arahan Pengerjaan -->
                    <div class="space-y-1.5">
                        <label for="edit-assessment-description" class="block text-xs font-bold text-gray-900 uppercase tracking-wider">
                            Petunjuk Umum &amp; Arahan Pengerjaan (Opsional)
                        </label>
                        <textarea id="edit-assessment-description"
                                  name="description"
                                  x-model="description"
                                  rows="6"
                                  placeholder="Tuliskan petunjuk umum, tata cara pengerjaan, atau catatan penting untuk peserta ujian (mendukung Markdown)..."
                                  class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-blue-600 focus:ring-2 focus:ring-blue-100 text-xs font-medium text-gray-900 placeholder-gray-400 transition-all outline-none resize-y leading-relaxed font-sans"></textarea>
                        <p class="text-[11px] text-gray-500 flex items-center gap-1">
                            <span>💡 Mendukung format Markdown:</span>
                            <code class="bg-gray-100 px-1 py-0.5 rounded text-[10px] text-gray-700">**tebal**</code>,
                            <code class="bg-gray-100 px-1 py-0.5 rounded text-[10px] text-gray-700">*miring*</code>,
                            <code class="bg-gray-100 px-1 py-0.5 rounded text-[10px] text-gray-700">- poin</code>
                        </p>
                    </div>
                </div>

                <!-- Footer Actions -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-end gap-3 rounded-b-3xl">
                    <button type="button"
                            @click="closeModal()"
                            :disabled="submitting"
                            class="px-4 py-2.5 rounded-xl border border-gray-300 bg-white hover:bg-gray-100 text-gray-700 font-bold text-xs transition-colors cursor-pointer disabled:opacity-50">
                        Batal
                    </button>
                    <button type="submit"
                            :disabled="submitting || !title.trim()"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs shadow-md transition-all cursor-pointer active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg x-show="submitting" class="w-3.5 h-3.5 animate-spin text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke-width="4" opacity=".2"/>
                            <path stroke-width="4" d="M12 2a10 10 0 0 1 10 10"/>
                        </svg>
                        <x-radix-icon x-show="!submitting" name="check" class="w-4 h-4 text-white" />
                        <span x-text="submitting ? 'Menyimpan...' : 'Simpan Perubahan'">Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
