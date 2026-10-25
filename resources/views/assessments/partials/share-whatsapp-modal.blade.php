{{-- resources/views/assessments/partials/share-whatsapp-modal.blade.php --}}
<div x-data="shareWhatsAppModal()"
     x-cloak
     x-show="isOpen"
     @keydown.escape.window="closeModal()"
     @open-share-whatsapp-modal.window="openModal($event.detail)"
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="modal-title"
     role="dialog"
     aria-modal="true">

    {{-- Backdrop dengan Blur --}}
    <div x-show="isOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="closeModal()"
         class="fixed inset-0 bg-slate-950/60 backdrop-blur-sm transition-opacity"></div>

    {{-- Dialog Box --}}
    <div class="flex min-h-full items-center justify-center p-3 sm:p-6 text-center">
        <div x-show="isOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             @click.stop
             class="relative w-full max-w-4xl transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl ring-1 ring-slate-900/10 transition-all flex flex-col max-h-[92vh]">

            {{-- Header Modal (Kompak, Rapi, Seimbang) --}}
            <div class="border-b border-slate-200/80 bg-slate-50/90 px-6 py-3.5 sm:px-8 sm:py-4 flex items-center justify-between shrink-0"
                 style="padding-top: 14px !important; padding-bottom: 14px !important;">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700 ring-1 ring-emerald-600/20 shadow-2xs shrink-0"
                         style="background-color: #dcfce7 !important; color: #15803d !important;">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.27-2.42 5.82-1.56 1.55-3.63 2.41-5.83 2.41-1.42 0-2.82-.37-4.06-1.07l-.29-.17-3.02.79.81-2.94-.19-.3a8.216 8.216 0 0 1-1.26-4.54c0-4.54 3.7-8.24 8.24-8.24m4.51 11.66c-.25-.12-1.47-.72-1.7-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.5.11-.11.25-.29.37-.43.12-.14.17-.25.25-.41.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.22.25-.86.84-.86 2.05s.88 2.38 1 2.54c.12.17 1.73 2.64 4.2 3.7 2.46 1.07 2.46.71 2.9.67.44-.04 1.47-.6 1.68-1.18.2-.59.2-1.09.14-1.19-.06-.1-.23-.16-.48-.28"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-base sm:text-lg font-bold text-slate-900 tracking-tight" id="modal-title">
                            Bagikan Link Asesmen ke WhatsApp
                        </h2>
                    </div>
                </div>

                <button type="button"
                        @click="closeModal()"
                        class="rounded-xl p-2 text-slate-400 hover:bg-slate-200/70 hover:text-slate-700 transition-colors cursor-pointer"
                        aria-label="Tutup Modal">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Body Modal (Grid: Kiri Form & Pilihan, Kanan Live WhatsApp Preview) --}}
            <div class="overflow-y-auto px-6 py-6 sm:px-8 space-y-6">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

                    {{-- KOLOM KIRI (7 Kolom): Konfigurasi & Template --}}
                    <div class="lg:col-span-7 space-y-5 text-left">

                        {{-- Metadata Asesmen --}}
                        <div class="rounded-2xl border border-slate-200/80 bg-slate-50/70 p-3.5">
                            <h3 class="text-sm font-bold text-slate-900 truncate" x-text="assessment.title"></h3>
                            <p class="text-xs text-slate-500 mt-1 flex items-center gap-2 flex-wrap">
                                <span class="font-medium text-slate-700" x-text="assessment.subject"></span>
                                <span>•</span>
                                <span x-text="assessment.grade"></span>
                                <span>•</span>
                                <span x-text="assessment.duration + ' Menit'"></span>
                                <span>•</span>
                                <span x-text="assessment.questions_count + ' Soal'"></span>
                            </p>
                        </div>

                        {{-- 1. Pilihan Gaya Pesan WhatsApp --}}
                        <div>
                            <label class="text-xs font-bold uppercase tracking-wider text-slate-700 block mb-2">
                                Pilih Gaya Pesan WhatsApp
                            </label>
                            <div class="grid grid-cols-3 gap-2">
                                <button type="button"
                                        @click="selectedTemplate = 'resmi'"
                                        :class="selectedTemplate === 'resmi' ? 'border-emerald-600 bg-emerald-50 text-emerald-800 font-bold ring-2 ring-emerald-500/20 shadow-xs' : 'border-slate-200 hover:border-slate-300 bg-white text-slate-600 font-semibold'"
                                        class="flex items-center justify-center py-2.5 px-2 rounded-xl border text-xs transition cursor-pointer text-center">
                                    FORMAL
                                </button>
                                <button type="button"
                                        @click="selectedTemplate = 'santai'"
                                        :class="selectedTemplate === 'santai' ? 'border-emerald-600 bg-emerald-50 text-emerald-800 font-bold ring-2 ring-emerald-500/20 shadow-xs' : 'border-slate-200 hover:border-slate-300 bg-white text-slate-600 font-semibold'"
                                        class="flex items-center justify-center py-2.5 px-2 rounded-xl border text-xs transition cursor-pointer text-center">
                                    EASY GOING
                                </button>
                                <button type="button"
                                        @click="selectedTemplate = 'wali'"
                                        :class="selectedTemplate === 'wali' ? 'border-emerald-600 bg-emerald-50 text-emerald-800 font-bold ring-2 ring-emerald-500/20 shadow-xs' : 'border-slate-200 hover:border-slate-300 bg-white text-slate-600 font-semibold'"
                                        class="flex items-center justify-center py-2.5 px-2 rounded-xl border text-xs transition cursor-pointer text-center">
                                    KHUSUS ORTU
                                </button>
                            </div>
                        </div>

                        {{-- 2. Form Isian Tambahan (Note & CTA) --}}
                        <div class="rounded-2xl border border-slate-200 bg-white p-3.5 space-y-2">
                            <label for="custom-cta-input" class="text-xs font-bold text-slate-700 block">
                                Note & CTA
                            </label>
                            <textarea id="custom-cta-input"
                                      x-model="customCta"
                                      rows="2"
                                      placeholder="Contoh: Batas pengerjaan pukul 12.00 WIB. Bagi yang mengalami kendala teknis segera hubungi wali kelas."
                                      class="w-full rounded-xl border border-slate-200 bg-slate-50/60 p-3 text-xs text-slate-900 placeholder:text-slate-400 outline-none transition-colors focus:border-emerald-500 focus:bg-white focus:ring-1 focus:ring-emerald-500 resize-none"></textarea>
                        </div>

                    </div>

                    {{-- KOLOM KANAN (5 Kolom): Live WhatsApp Simulation Preview (TERANG, HIGH CONTRAST, SANGAT JELAS) --}}
                    <div class="lg:col-span-5 flex flex-col items-center">
                        <div class="w-full max-w-sm rounded-3xl border border-slate-200/90 bg-white shadow-xl overflow-hidden ring-1 ring-slate-900/5">

                            {{-- WhatsApp App Bar (Hijau Khas WhatsApp #008069) --}}
                            <div class="px-4 py-3.5 text-white flex items-center justify-between shrink-0"
                                 style="background-color: #008069 !important; color: #ffffff !important;">
                                <div class="flex items-center gap-2.5">
                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white font-bold text-xs ring-1 ring-white/30 shrink-0 overflow-hidden">
                                        <template x-if="assessment.tenant_logo">
                                            <img :src="assessment.tenant_logo" class="w-full h-full object-cover rounded-full" alt="Tenant Logo" />
                                        </template>
                                        <template x-if="!assessment.tenant_logo">
                                            <x-radix-icon name="backpack" class="w-5 h-5 text-white" />
                                        </template>
                                    </div>
                                    <div class="text-left">
                                        <p class="text-xs font-bold leading-tight truncate max-w-[170px]"
                                           style="color: #ffffff !important;"
                                           x-text="assessment.tenant_name || 'ADZKIA CBT'"></p>
                                        <p class="text-[10px] text-emerald-100 leading-none mt-0.5">online • pratinjau pesan</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-white/80">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                                </div>
                            </div>

                            {{-- WhatsApp Chat Area (Wallpaper Cerah Autentik #efeae2) --}}
                            <div class="p-3.5 min-h-[400px] max-h-[480px] overflow-y-auto space-y-3 flex flex-col justify-start text-left"
                                 style="background-color: #efeae2 !important; background-image: radial-gradient(#d3cbbe 1px, transparent 1px); background-size: 16px 16px;">

                                {{-- Date Chip --}}
                                <div class="text-center my-1">
                                    <span class="rounded-lg bg-white/90 backdrop-blur-2xs px-3 py-0.5 text-[10px] font-semibold text-slate-700 shadow-2xs border border-slate-200/50">
                                        HARI INI
                                    </span>
                                </div>

                                {{-- Chat Bubble (Outgoing Hijau Cerah #d9fdd3 dengan teks hitam legam terbaca jelas) --}}
                                <div class="self-end max-w-[96%] rounded-2xl rounded-tr-xs p-3.5 shadow-xs text-[11px] leading-relaxed"
                                     style="background-color: #d9fdd3 !important; border: 1px solid #bceab4 !important; color: #111b21 !important;">
                                    
                                    {{-- Embedded WhatsApp Link Card Preview (Putih Bersih) --}}
                                    <div class="mb-3 rounded-xl overflow-hidden shadow-2xs"
                                         style="background-color: #ffffff !important; border: 1px solid #d1d5db !important;">
                                        <div class="h-20 p-2.5 flex flex-col justify-end relative overflow-hidden"
                                             style="background: linear-gradient(135deg, #059669 0%, #0d9488 100%) !important;">
                                            <div class="absolute inset-0 opacity-15" style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 8px 8px;"></div>
                                            <span class="relative inline-flex items-center gap-1 rounded bg-black/40 px-2 py-0.5 text-[9px] font-bold text-white uppercase tracking-wider backdrop-blur-xs w-max">
                                                CBT Portal Ujian
                                            </span>
                                        </div>
                                        <div class="p-2.5" style="background-color: #ffffff !important;">
                                            <p class="font-bold text-[11px] line-clamp-1"
                                               style="color: #0f172a !important; font-weight: 700;"
                                               x-text="'Ujian CBT: ' + assessment.title"></p>
                                            <p class="text-[9px] mt-0.5 line-clamp-1 font-mono font-medium"
                                               style="color: #0284c7 !important;"
                                               x-text="assessment.url"></p>
                                        </div>
                                    </div>

                                    {{-- Text Content with Realtime Paragraph Formatting (Setiap paragraf terpisah rapi) --}}
                                    <div class="font-sans text-[11.5px] break-words"
                                         style="color: #111b21 !important; line-height: 1.6 !important;"
                                         x-html="formattedPreview"></div>

                                    {{-- Timestamp & Read Receipt Checkmarks (Biru WhatsApp) --}}
                                    <div class="mt-2 flex items-center justify-end gap-1 text-[9px]" style="color: #64748b !important;">
                                        <span>Sekarang</span>
                                        <svg class="h-3.5 w-3.5 text-[#53bdeb]" viewBox="0 0 16 15" fill="currentColor">
                                            <path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.879a.32.32 0 0 1-.484.033l-.358-.325a.319.319 0 0 0-.484.032l-.378.483a.418.418 0 0 0 .036.541l1.32 1.266c.143.14.361.125.484-.033l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.879a.32.32 0 0 1-.484.033L1.891 7.769a.366.366 0 0 0-.515.006l-.423.433a.364.364 0 0 0 .006.514l3.258 3.185c.143.14.361.125.484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Footer Action Buttons (Lebar sama persis dengan header) --}}
            <div class="border-t border-slate-200/80 bg-slate-50/90 px-6 py-3.5 sm:px-8 sm:py-4 flex flex-col-reverse sm:flex-row items-center justify-between gap-3 shrink-0"
                 style="padding-top: 14px !important; padding-bottom: 14px !important;">
                <div class="flex items-center gap-2.5 w-full sm:w-auto flex-wrap sm:flex-nowrap">
                    {{-- Tombol Salin Link --}}
                    <button type="button"
                            @click="copyUrl()"
                            class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-1.5 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-xs font-semibold text-slate-700 shadow-xs hover:bg-slate-100 hover:text-slate-900 transition active:scale-95 cursor-pointer">
                        <svg class="h-4 w-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
                        <span x-text="copiedUrl ? 'Tautan Tersalin!' : 'Salin Link'"></span>
                    </button>

                    {{-- Tombol Salin Pesan (Lebar, Prominen) --}}
                    <button type="button"
                            @click="copyFullMessage()"
                            class="flex-1 sm:flex-initial min-w-[200px] sm:min-w-[240px] inline-flex items-center justify-center gap-2 rounded-xl border border-emerald-400 bg-emerald-50 px-8 py-2.5 text-xs font-bold text-emerald-800 shadow-xs hover:bg-emerald-100 transition active:scale-95 cursor-pointer">
                        <svg class="h-4 w-4 text-emerald-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        <span x-text="copiedMessage ? 'Pesan Tersalin!' : 'Salin Pesan'"></span>
                    </button>
                </div>

                {{-- Primary Button: Buka WhatsApp Web / App --}}
                <div class="flex items-center w-full sm:w-auto justify-end">
                    <button type="button"
                            @click="sendToWhatsApp()"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 rounded-xl px-6 py-2.5 sm:py-3 text-xs sm:text-sm font-bold text-white shadow-md transition-all active:scale-95 cursor-pointer hover:brightness-105"
                            style="background-color: #25D366 !important; color: #ffffff !important; box-shadow: 0 4px 14px 0 rgba(37, 211, 102, 0.42) !important;">
                        <svg class="h-4.5 w-4.5 fill-current" viewBox="0 0 24 24">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2m.01 1.67c4.54 0 8.24 3.7 8.24 8.24 0 2.2-.86 4.27-2.42 5.82-1.56 1.55-3.63 2.41-5.83 2.41-1.42 0-2.82-.37-4.06-1.07l-.29-.17-3.02.79.81-2.94-.19-.3a8.216 8.216 0 0 1-1.26-4.54c0-4.54 3.7-8.24 8.24-8.24m4.51 11.66c-.25-.12-1.47-.72-1.7-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.23-1.47-1.38-1.72-.14-.25-.02-.38.11-.5.11-.11.25-.29.37-.43.12-.14.17-.25.25-.41.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31-.22.25-.86.84-.86 2.05s.88 2.38 1 2.54c.12.17 1.73 2.64 4.2 3.7 2.46 1.07 2.46.71 2.9.67.44-.04 1.47-.6 1.68-1.18.2-.59.2-1.09.14-1.19-.06-.1-.23-.16-.48-.28"/>
                        </svg>
                        <span>Buka WhatsApp Web / App</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
function shareWhatsAppModal() {
    return {
        isOpen: false,
        selectedTemplate: 'resmi',
        customCta: '',
        copiedMessage: false,
        copiedUrl: false,
        assessment: {
            id: null,
            title: '',
            tenant_name: '',
            tenant_logo: null,
            subject: '',
            grade: '',
            duration: 60,
            questions_count: 0,
            token: '',
            url: '',
            price_formatted: 'Gratis'
        },

        openModal(payload) {
            if (payload) {
                this.assessment = Object.assign({}, this.assessment, payload);
            }
            this.customCta = '';
            this.copiedMessage = false;
            this.copiedUrl = false;
            this.isOpen = true;
        },

        closeModal() {
            this.isOpen = false;
        },

        get currentRawMessage() {
            const a = this.assessment;
            const cta = this.customCta.trim();
            const ctaBlock = cta ? `\n\n📢 *Catatan Tambahan:*\n${cta}` : '';

            if (this.selectedTemplate === 'santai') {
                return `Halo teman-teman semua! 👋

Ujian CBT *${a.title}* sudah siap diakses yaa. Yuk segera buka tautan resmi di bawah ini:

🔗 *Link Ujian:*
${a.url}

📋 *Detail Singkat Ujian:*
• Mata Pelajaran: *${a.subject}* (${a.grade})
• Waktu Pengerjaan: *${a.duration} Menit* (${a.questions_count} Soal)
• Token Ujian: *${a.token}*
${ctaBlock}
💡 *Tips Pengerjaan:*
Pastikan baterai HP/laptop mencukupi dan koneksi internet stabil ya.

Semangat berjuang semuanya, semoga sukses! 💪🔥`;
            }

            if (this.selectedTemplate === 'wali') {
                return `*Yth. Bapak/Ibu Orang Tua / Wali Murid*
*${a.tenant_name}*

Assalamu’alaikum Wr. Wb. / Salam Sejahtera,

Diberitahukan bahwa ananda dijadwalkan untuk mengikuti evaluasi belajar daring berbasis CBT dengan rincian berikut:

📋 *Rincian Ujian:*
• Nama Ujian: *${a.title}*
• Mata Pelajaran: *${a.subject}* (${a.grade})
• Alokasi Waktu: *${a.duration} Menit* (${a.questions_count} Soal)
• Token Akses: *${a.token}*

🔗 *Tautan Pengerjaan Ujian:*
${a.url}
${ctaBlock}
Mohon bantuan Bapak/Ibu untuk mendampingi dan memastikan ananda dapat mengerjakan ujian dengan tertib dan tepat waktu di rumah.

Terima kasih atas perhatian, kerja sama, dan dukungan Bapak/Ibu sekalian. 🙏`;
            }

            // Default: 'resmi'
            return `*PENGUMUMAN PELAKSANAAN UJIAN CBT*
*${a.tenant_name}*

Kepada Seluruh Siswa/i Peserta Ujian,
Berikut informasi resmi mengenai pelaksanaan evaluasi pembelajaran berbasis CBT:

📌 *INFORMASI UJIAN:*
• Nama Ujian: *${a.title}*
• Mata Pelajaran: *${a.subject}*
• Jenjang / Kelas: *${a.grade}*
• Alokasi Waktu: *${a.duration} Menit*
• Total Soal: *${a.questions_count} Butir*
• Token Ujian: *${a.token}*

🔗 *LINK AKSES UJIAN:*
${a.url}
${ctaBlock}
📝 *TATA TERTIB & PETUNJUK:*
1. Gunakan perangkat dengan daya baterai dan jaringan internet stabil.
2. Klik link di atas, lalu masuk menggunakan akun siswa masing-masing.
3. Kerjakan secara mandiri, jujur, dan teliti sebelum batas waktu berakhir.

Selamat menempuh ujian, semoga sukses! ✨`;
        },

        get formattedPreview() {
            let text = this.currentRawMessage;
            // Escape HTML characters
            text = text.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            // WhatsApp Bold: *text* -> <strong>text</strong> (High contrast black)
            text = text.replace(/\*([^\*]+)\*/g, '<strong style="color: #000000 !important; font-weight: 700;">$1</strong>');
            // WhatsApp Italic: _text_ -> <em>text</em>
            text = text.replace(/_([^_]+)_/g, '<em style="color: #334155 !important; font-style: italic;">$1</em>');
            // WhatsApp Monospace: `text` -> <code>text</code>
            text = text.replace(/`([^`]+)`/g, '<code style="background-color: rgba(0,0,0,0.08) !important; color: #047857 !important; font-weight: 700; padding: 2px 6px; border-radius: 4px; font-family: monospace;">$1</code>');
            // WhatsApp URL highlight
            text = text.replace(/(https?:\/\/[^\s]+)/g, '<span style="color: #0284c7 !important; text-decoration: underline; font-weight: 600; word-break: break-all;">$1</span>');

            // Split into paragraphs by double newlines to guarantee clean paragraph separation
            const paragraphs = text.split(/\r?\n\r?\n+/);
            return paragraphs.map((para, idx) => {
                const lines = para.split(/\r?\n/).join('<br>');
                const isLast = idx === paragraphs.length - 1;
                const marginBottom = isLast ? '0' : '0.75rem';
                return `<p style="margin: 0 0 ${marginBottom} 0 !important; line-height: 1.6 !important;">${lines}</p>`;
            }).join('');
        },

        async copyFullMessage() {
            try {
                await navigator.clipboard.writeText(this.currentRawMessage);
                this.copiedMessage = true;
                setTimeout(() => { this.copiedMessage = false; }, 2500);
            } catch (e) {
                // Fallback for older browsers
                const el = document.createElement('textarea');
                el.value = this.currentRawMessage;
                document.body.appendChild(el);
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
                this.copiedMessage = true;
                setTimeout(() => { this.copiedMessage = false; }, 2500);
            }
        },

        async copyUrl() {
            try {
                await navigator.clipboard.writeText(this.assessment.url);
                this.copiedUrl = true;
                setTimeout(() => { this.copiedUrl = false; }, 2000);
            } catch (e) {
                /* fallback */
            }
        },

        sendToWhatsApp() {
            const encoded = encodeURIComponent(this.currentRawMessage);
            window.open(`https://api.whatsapp.com/send?text=${encoded}`, '_blank');
        }
    };
}
</script>
