<x-layouts.app>
    <x-slot:title>Studio Pembuat Soal AI (DeepSeek Engine) - ADZKIA</x-slot:title>

    <div x-data="questionGeneratorStudio()" class="max-w-7xl mx-auto space-y-6 pb-16">
        
        <!-- Header & Navigasi -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-5 pb-5">
            <div class="flex items-center gap-3">
                <a href="{{ route('question-banks.index') }}" class="p-2.5 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 transition-colors cursor-pointer shadow-2xs">
                    <x-radix-icon name="arrow-left" class="w-4 h-4" />
                </a>
                <div>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold tracking-wide uppercase bg-gradient-to-r from-emerald-500/10 to-teal-500/10 text-emerald-700 border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                            DeepSeek AI Generator Studio
                        </span>
                        <span class="text-xs text-gray-10 hidden sm:inline">•</span>
                        <span class="text-xs text-gray-11 hidden sm:inline">Kurikulum Nasional, TKA, UTBK SNBT, & SKD</span>
                    </div>
                    <h1 class="font-display font-extrabold text-2xl text-gray-12 tracking-tight mt-1">
                        Studio Pembuat Soal Otomatis (DeepSeek AI)
                    </h1>
                </div>
            </div>

            <!-- Model Badge & Quick Actions -->
            <div class="flex items-center gap-2">
                <button type="button" @click="goToWizard()" :disabled="isSendingToWizard"
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-colors cursor-pointer shadow-2xs disabled:opacity-60">
                    <x-radix-icon name="magic-wand" class="w-3.5 h-3.5 text-indigo-11" />
                    <span x-text="isSendingToWizard ? 'Menyiapkan...' : 'Ke Wizard Ujian'"></span>
                </button>
            </div>
        </div>

        <!-- WORKSPACE GRID: Generator Form (Kiri) vs Live Preview / Result (Kanan) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- PANEL KIRI: Form Konfigurasi Pembuat Soal (7 Kolom di Desktop) -->
            <div class="lg:col-span-7 space-y-6">
                
                <!-- BAGIAN 1: Kategori Asesmen (5 Jalur) -->
                <div class="bg-white border border-gray-6 rounded-2xl p-5 shadow-xs space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-lg bg-blue-3 text-blue-11 flex items-center justify-center font-bold text-xs">1</span>
                            <h2 class="font-display font-bold text-sm text-gray-12">Pilih Jalur & Kategori Asesmen</h2>
                        </div>
                        <span class="text-[11px] font-medium text-gray-10">Wajib dipilih</span>
                    </div>

                    <!-- 5 Jalur Selector Tabs -->
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-2">
                        <button type="button" @click="setCategory('school')"
                                :class="category === 'school' ? 'border-blue-9 bg-blue-2/40 text-blue-11 ring-2 ring-blue-9/20 font-bold' : 'border-gray-6 hover:bg-gray-2 text-gray-11 font-medium'"
                                class="flex flex-col items-center justify-center p-3 rounded-xl border text-center transition-all cursor-pointer">
                            <span class="text-lg mb-1">🎒</span>
                            <span class="text-xs">Siswa Sekolah</span>
                        </button>

                        <button type="button" @click="setCategory('tka')"
                                :class="category === 'tka' ? 'border-purple-9 bg-purple-2/40 text-purple-11 ring-2 ring-purple-9/20 font-bold' : 'border-gray-6 hover:bg-gray-2 text-gray-11 font-medium'"
                                class="flex flex-col items-center justify-center p-3 rounded-xl border text-center transition-all cursor-pointer">
                            <span class="text-lg mb-1">🎯</span>
                            <span class="text-xs">TKA</span>
                        </button>

                        <button type="button" @click="setCategory('utbk')"
                                :class="category === 'utbk' ? 'border-amber-9 bg-amber-2/40 text-amber-11 ring-2 ring-amber-9/20 font-bold' : 'border-gray-6 hover:bg-gray-2 text-gray-11 font-medium'"
                                class="flex flex-col items-center justify-center p-3 rounded-xl border text-center transition-all cursor-pointer">
                            <span class="text-lg mb-1">🎓</span>
                            <span class="text-xs">UTBK SNBT</span>
                        </button>

                        <button type="button" @click="setCategory('skd')"
                                :class="category === 'skd' ? 'border-emerald-9 bg-emerald-2/40 text-emerald-11 ring-2 ring-emerald-9/20 font-bold' : 'border-gray-6 hover:bg-gray-2 text-gray-11 font-medium'"
                                class="flex flex-col items-center justify-center p-3 rounded-xl border text-center transition-all cursor-pointer">
                            <span class="text-lg mb-1">🏛️</span>
                            <span class="text-xs">SKD CPNS</span>
                        </button>

                        <button type="button" @click="setCategory('custom')"
                                :class="category === 'custom' ? 'border-gray-9 bg-gray-3 text-gray-12 ring-2 ring-gray-9/20 font-bold' : 'border-gray-6 hover:bg-gray-2 text-gray-11 font-medium'"
                                class="col-span-2 sm:col-span-1 flex flex-col items-center justify-center p-3 rounded-xl border text-center transition-all cursor-pointer">
                            <span class="text-lg mb-1">⚙️</span>
                            <span class="text-xs">Lain-lain</span>
                        </button>
                    </div>

                    <!-- KONTEN FORM SPESIFIK BERDASARKAN KATEGORI -->
                    
                    <!-- 1. Form Siswa Sekolah -->
                    <div x-show="category === 'school'" class="space-y-4 pt-2">
                        <!-- Kurikulum Radio -->
                        <div>
                            <label class="block text-xs font-bold text-gray-11 mb-1.5">Kurikulum Nasional:</label>
                            <div class="grid grid-cols-2 gap-2">
                                <label :class="curriculum === 'merdeka' ? 'border-blue-9 bg-blue-2/30 text-blue-11 font-bold' : 'border-gray-6 text-gray-12'"
                                       class="flex items-center gap-2 p-2.5 rounded-xl border text-xs cursor-pointer transition-colors">
                                    <input type="radio" value="merdeka" x-model="curriculum" @change="onFilterChange()" class="text-blue-9 focus:ring-0">
                                    <span>Merdeka Belajar</span>
                                </label>
                                <label :class="curriculum === 'k13' ? 'border-blue-9 bg-blue-2/30 text-blue-11 font-bold' : 'border-gray-6 text-gray-12'"
                                       class="flex items-center gap-2 p-2.5 rounded-xl border text-xs cursor-pointer transition-colors">
                                    <input type="radio" value="k13" x-model="curriculum" @change="onFilterChange()" class="text-blue-9 focus:ring-0">
                                    <span>Kurikulum 2013</span>
                                </label>
                            </div>
                        </div>

                        <!-- Dropdown Tingkat Kelas & Dropdown Mata Pelajaran Berdampingan -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Tingkat Kelas (1 - 12):</label>
                                <select x-model="grade_level" @change="onFilterChange()"
                                        class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-blue-9 focus:ring-2 focus:ring-blue-9/20 transition-all">
                                    <optgroup label="Sekolah Dasar (SD)">
                                        <option value="1">Kelas 1 SD</option>
                                        <option value="2">Kelas 2 SD</option>
                                        <option value="3">Kelas 3 SD</option>
                                        <option value="4">Kelas 4 SD</option>
                                        <option value="5">Kelas 5 SD</option>
                                        <option value="6">Kelas 6 SD</option>
                                    </optgroup>
                                    <optgroup label="Sekolah Menengah Pertama (SMP)">
                                        <option value="7">Kelas 7 SMP</option>
                                        <option value="8">Kelas 8 SMP</option>
                                        <option value="9">Kelas 9 SMP</option>
                                    </optgroup>
                                    <optgroup label="Sekolah Menengah Atas (SMA)">
                                        <option value="10">Kelas 10 SMA</option>
                                        <option value="11">Kelas 11 SMA</option>
                                        <option value="12">Kelas 12 SMA</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Mata Pelajaran:</label>
                                <select x-model="subject" @change="onFilterChange()"
                                        class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-blue-9 focus:ring-2 focus:ring-blue-9/20 transition-all">
                                    <option value="matematika">Matematika</option>
                                    <option value="bahasa_indonesia">Bahasa Indonesia</option>
                                    <option value="bahasa_inggris">Bahasa Inggris</option>
                                    <option value="ipa">Ilmu Pengetahuan Alam (IPA)</option>
                                    <option value="ips">Ilmu Pengetahuan Sosial (IPS)</option>
                                    <option value="fisika">Fisika</option>
                                    <option value="biologi">Biologi</option>
                                    <option value="kimia">Kimia</option>
                                    <option value="ekonomi">Ekonomi</option>
                                    <option value="sosiologi">Sosiologi</option>
                                    <option value="geografi">Geografi</option>
                                    <option value="sejarah">Sejarah</option>
                                    <option value="pendidikan_pancasila">Pendidikan Pancasila (PPKn)</option>
                                    <option value="informatika">Informatika</option>
                                </select>
                            </div>
                        </div>

                        <!-- CHECKLIST SEMUA BAB DALAM MAPEL SESUAI KURIKULUM -->
                        <div class="p-3.5 bg-gray-2 rounded-xl border border-gray-5 space-y-2.5">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-gray-12 flex items-center gap-1.5">
                                    <x-radix-icon name="list-bullet" class="w-3.5 h-3.5 text-blue-11" />
                                    <span>Pilih Bab / Kisi-Kisi Materi (Checklist):</span>
                                </span>
                                <div class="flex items-center gap-1 text-[11px]">
                                    <button type="button" @click="selectAllChapters()" class="text-blue-11 hover:underline font-bold px-1.5 py-0.5 cursor-pointer">Pilih Semua</button>
                                    <span class="text-gray-9">|</span>
                                    <button type="button" @click="selectSemester(1)" class="text-blue-11 hover:underline px-1.5 py-0.5 cursor-pointer">Sem. 1</button>
                                    <span class="text-gray-9">|</span>
                                    <button type="button" @click="selectSemester(2)" class="text-blue-11 hover:underline px-1.5 py-0.5 cursor-pointer">Sem. 2</button>
                                    <span class="text-gray-9">|</span>
                                    <button type="button" @click="clearChapters()" class="text-red-11 hover:underline px-1.5 py-0.5 cursor-pointer">Kosongkan</button>
                                </div>
                            </div>

                            <div class="max-h-48 overflow-y-auto space-y-1.5 pr-1">
                                <template x-for="(ch, idx) in availableChapters" :key="ch.id || ch.title || idx">
                                    <label class="flex items-start gap-2.5 p-2 rounded-lg bg-white border border-gray-6/70 text-xs text-gray-12 hover:bg-blue-2/20 cursor-pointer transition-colors">
                                        <input type="checkbox" :value="ch.title" x-model="selectedChapters" class="mt-0.5 text-blue-9 focus:ring-0 rounded">
                                        <div class="flex-1">
                                            <span class="font-medium" x-text="ch.title"></span>
                                            <span class="ml-1 text-[10px] text-gray-10 font-mono" x-text="'(Sem. ' + ch.semester + ')'"></span>
                                        </div>
                                    </label>
                                </template>
                                <template x-if="availableChapters.length === 0">
                                    <p class="text-xs text-gray-10 py-2 italic text-center">Tidak ada data bab untuk kombinasi kelas dan mapel ini.</p>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Form TKA -->
                    <div x-show="category === 'tka'" class="space-y-3 pt-2" style="display: none;">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Jenjang Target TKA:</label>
                                <select x-model="grade_level"
                                        class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-purple-9 focus:ring-2 focus:ring-purple-9/20 transition-all">
                                    <option value="6 SD">Kelas 6 SD (Asesmen Akhir Jenjang SD)</option>
                                    <option value="9 SMP">Kelas 9 SMP (Asesmen Akhir Jenjang SMP)</option>
                                    <option value="12 SMA">Kelas 12 SMA (Asesmen Akhir Jenjang SMA)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Mata Pelajaran TKA:</label>
                                <select x-model="subject"
                                        class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-purple-9 focus:ring-2 focus:ring-purple-9/20 transition-all">
                                    <option value="Matematika Penalaran">Matematika & Penalaran Kuantitatif</option>
                                    <option value="Sains Terpadu (IPA)">Sains Terpadu (Fisika, Kimia, Biologi)</option>
                                    <option value="Sosial Humaniora (IPS)">Sosial Humaniora (Geografi, Ekonomi, Sosiologi)</option>
                                    <option value="Literasi Bahasa Indonesia">Literasi Bahasa Indonesia</option>
                                    <option value="Literasi Bahasa Inggris">Literasi Bahasa Inggris</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Form UTBK SNBT -->
                    <div x-show="category === 'utbk'" class="space-y-3 pt-2" style="display: none;">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Kelompok Subtes UTBK:</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <label :class="utbk_group === 'tps' ? 'border-amber-9 bg-amber-2/40 text-amber-11 font-bold' : 'border-gray-6 text-gray-12'"
                                           class="flex items-center gap-2 p-2.5 rounded-xl border text-xs cursor-pointer transition-colors">
                                        <input type="radio" value="tps" x-model="utbk_group" @change="onUtbkGroupChange()" class="text-amber-9 focus:ring-0">
                                        <span>Tes Potensi Skolastik (TPS)</span>
                                    </label>
                                    <label :class="utbk_group === 'literasi_numerasi' ? 'border-amber-9 bg-amber-2/40 text-amber-11 font-bold' : 'border-gray-6 text-gray-12'"
                                           class="flex items-center gap-2 p-2.5 rounded-xl border text-xs cursor-pointer transition-colors">
                                        <input type="radio" value="literasi_numerasi" x-model="utbk_group" @change="onUtbkGroupChange()" class="text-amber-9 focus:ring-0">
                                        <span>Literasi & Penalaran</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Pilih Subtes Spesifik:</label>
                                <select x-model="subtest"
                                        class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-amber-9 focus:ring-2 focus:ring-amber-9/20 transition-all">
                                    <template x-if="utbk_group === 'tps'">
                                        <optgroup label="Tes Potensi Skolastik (TPS)">
                                            <option value="PU">PU - Penalaran Umum (Induktif, Deduktif, Kuantitatif)</option>
                                            <option value="PPU">PPU - Pengetahuan & Pemahaman Umum</option>
                                            <option value="PBM">PBM - Pemahaman Bacaan & Menulis</option>
                                            <option value="PK">PK - Pengetahuan Kuantitatif (Aljabar & Geometri)</option>
                                        </optgroup>
                                    </template>
                                    <template x-if="utbk_group === 'literasi_numerasi'">
                                        <optgroup label="Literasi & Penalaran">
                                            <option value="LBI">LBI - Literasi dalam Bahasa Indonesia</option>
                                            <option value="LBE">LBE - Literasi dalam Bahasa Inggris</option>
                                            <option value="PM">PM - Penalaran Matematika (Konteks Nyata)</option>
                                        </optgroup>
                                    </template>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Form SKD CPNS / Kedinasan -->
                    <div x-show="category === 'skd'" class="space-y-3 pt-2" style="display: none;">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Jalur Seleksi:</label>
                                <div class="grid grid-cols-2 gap-2">
                                    <label :class="skd_track === 'cpns' ? 'border-emerald-9 bg-emerald-2/40 text-emerald-11 font-bold' : 'border-gray-6 text-gray-12'"
                                           class="flex items-center gap-2 p-2.5 rounded-xl border text-xs cursor-pointer transition-colors">
                                        <input type="radio" value="cpns" x-model="skd_track" class="text-emerald-9 focus:ring-0">
                                        <span>CPNS Resmi BKN</span>
                                    </label>
                                    <label :class="skd_track === 'kedinasan' ? 'border-emerald-9 bg-emerald-2/40 text-emerald-11 font-bold' : 'border-gray-6 text-gray-12'"
                                           class="flex items-center gap-2 p-2.5 rounded-xl border text-xs cursor-pointer transition-colors">
                                        <input type="radio" value="kedinasan" x-model="skd_track" class="text-emerald-9 focus:ring-0">
                                        <span>Sekolah Kedinasan</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-11 mb-1.5">Subtes SKD:</label>
                                <select x-model="subtest" @change="onSkdSubtestChange()"
                                        class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-emerald-9 focus:ring-2 focus:ring-emerald-9/20 transition-all">
                                    <option value="TIU">TIU - Tes Intelegensia Umum (Verbal, Numerik, Figural)</option>
                                    <option value="TWK">TWK - Tes Wawasan Kebangsaan (Nasionalisme, Bela Negara, Pilar)</option>
                                    <option value="TKP">TKP - Tes Karakteristik Pribadi (Bobot Skor 1 - 5)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Alert info khusus TKP -->
                        <div x-show="subtest === 'TKP'" class="p-3 rounded-xl bg-emerald-2/30 border border-emerald-6/50 text-[11px] text-emerald-11 flex items-center gap-2">
                            <x-radix-icon name="info-circled" class="w-4 h-4 shrink-0" />
                            <span><strong>Mode TKP Aktif:</strong> Tipe soal otomatis dikunci ke <em>Pilihan Ganda Berbobot (Skor 1 - 5)</em> sesuai aturan BKN resmi.</span>
                        </div>
                    </div>

                    <!-- 5. Form Lain-lain -->
                    <div x-show="category === 'custom'" class="space-y-3 pt-2" style="display: none;">
                        <div>
                            <label class="block text-xs font-bold text-gray-11 mb-1.5">Topik Ujian / Mata Uji Bebas:</label>
                            <input type="text" x-model="subject" placeholder="Misal: Uji Sertifikasi Profesi Perbankan, Olimpiade Fisika OSN, Tes Masuk BUMN..."
                                   class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-medium text-gray-12 focus:bg-white focus:border-gray-9 focus:ring-2 focus:ring-gray-9/20 transition-all">
                        </div>
                    </div>
                </div>

                <!-- BAGIAN 2: Format & Bentuk Soal + Mode Stimulus (Checklist Multi-Tipe) -->
                <div class="bg-white border border-gray-6 rounded-2xl p-5 shadow-xs space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-lg bg-emerald-3 text-emerald-11 flex items-center justify-center font-bold text-xs">2</span>
                            <div>
                                <h2 class="font-display font-bold text-sm text-gray-12">Format Soal, Stimulus & Tingkat Kognitif</h2>
                                <p class="text-[11px] text-gray-10">Pilih kombinasi tipe soal sesuai kebutuhan asesmen terpadu.</p>
                            </div>
                        </div>

                        <!-- Presets Quick Buttons -->
                        <div class="hidden sm:flex items-center gap-1.5">
                            <span class="text-[10px] font-bold text-gray-10 uppercase tracking-wider mr-1">Preset:</span>
                            <button type="button" @click="applyPreset('standard_pg')" class="px-2 py-1 rounded-md text-[10px] font-bold bg-gray-2 hover:bg-gray-3 text-gray-11 border border-gray-5">Hanya PG</button>
                            <button type="button" @click="applyPreset('akm_mix')" class="px-2 py-1 rounded-md text-[10px] font-bold bg-emerald-2 hover:bg-emerald-3 text-emerald-11 border border-emerald-5">Standar AKM</button>
                            <button type="button" @click="applyPreset('lengkap')" class="px-2 py-1 rounded-md text-[10px] font-bold bg-indigo-2 hover:bg-indigo-3 text-indigo-11 border border-indigo-5">Asesmen Lengkap</button>
                        </div>
                    </div>

                    <!-- CHECKLIST BENTUK / TIPE SOAL & DISTRIBUSI STIMULUS -->
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-gray-11">Centang Tipe Soal & Tentukan Distribusi:</label>
                            <span class="text-[11px] font-bold text-emerald-11 bg-emerald-2 px-2.5 py-0.5 rounded-full border border-emerald-5">
                                Total: <span x-text="getTotalQuestions()"></span> Soal (<span x-text="getTotalStandalone()"></span> Mandiri + <span x-text="getTotalStimulusQuestions()"></span> dari <span x-text="getTotalStimulusTexts()"></span> Wacana)
                            </span>
                        </div>

                        <div class="space-y-2.5">
                            <template x-for="(t, index) in question_types" :key="t.key">
                                <div :class="t.enabled ? 'border-emerald-6 bg-emerald-1/30 shadow-2xs' : 'border-gray-5 bg-gray-1/50 opacity-80'"
                                     class="border rounded-xl p-3 transition-all space-y-2.5">
                                    <div class="flex items-center justify-between flex-wrap gap-2">
                                        <label class="flex items-center gap-2.5 cursor-pointer select-none">
                                            <input type="checkbox" x-model="t.enabled" class="rounded text-emerald-9 focus:ring-emerald-9/20 h-4 w-4">
                                            <span class="text-xs font-bold text-gray-12" x-text="t.icon + ' ' + t.label"></span>
                                        </label>

                                        <span class="text-[10px] text-gray-10 italic" x-text="t.desc"></span>
                                    </div>

                                    <!-- Input Konfigurasi Soal Mandiri & Stimulus (Aktif saat dicentang) -->
                                    <div x-show="t.enabled" x-collapse class="pt-2 border-t border-gray-4/60 grid grid-cols-1 sm:grid-cols-3 gap-2 text-xs">
                                        <div class="flex items-center justify-between bg-white px-2.5 py-1.5 rounded-lg border border-gray-5">
                                            <span class="text-[11px] text-gray-11">Soal Mandiri:</span>
                                            <div class="flex items-center gap-1">
                                                <input type="number" min="0" max="30" x-model.number="t.standalone_count"
                                                       class="w-14 text-center py-1 bg-gray-2 border border-gray-5 rounded-md font-bold text-gray-12 focus:bg-white focus:border-emerald-9">
                                                <span class="text-[10px] text-gray-10">butir</span>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between bg-white px-2.5 py-1.5 rounded-lg border border-gray-5">
                                            <span class="text-[11px] text-gray-11">Jumlah Teks Stimulus:</span>
                                            <div class="flex items-center gap-1">
                                                <input type="number" min="0" max="5" x-model.number="t.stimulus_count"
                                                       class="w-14 text-center py-1 bg-gray-2 border border-gray-5 rounded-md font-bold text-gray-12 focus:bg-white focus:border-emerald-9">
                                                <span class="text-[10px] text-gray-10">teks</span>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between bg-white px-2.5 py-1.5 rounded-lg border border-gray-5">
                                            <span class="text-[11px] text-gray-11">Soal per Stimulus:</span>
                                            <div class="flex items-center gap-1">
                                                <input type="number" min="0" max="10" x-model.number="t.stimulus_questions"
                                                       :disabled="t.stimulus_count === 0"
                                                       class="w-14 text-center py-1 bg-gray-2 border border-gray-5 rounded-md font-bold text-gray-12 focus:bg-white focus:border-emerald-9 disabled:opacity-40">
                                                <span class="text-[10px] text-gray-10">butir</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- SUMBER STIMULUS JIKA MEMILIH TEKS WACANA -->
                    <div x-show="getTotalStimulusTexts() > 0" class="p-3.5 bg-gray-2 rounded-xl border border-gray-5 space-y-3" style="display: none;">
                        <label class="block text-xs font-bold text-gray-11">Sumber Teks Wacana / Stimulus:</label>
                        <div class="grid grid-cols-2 gap-2">
                            <label :class="stimulus_source === 'ai_generate' ? 'border-emerald-9 bg-white text-emerald-11 font-bold shadow-2xs' : 'border-gray-6 text-gray-12'"
                                   class="flex items-center gap-2 p-2 rounded-lg border text-xs cursor-pointer">
                                <input type="radio" value="ai_generate" x-model="stimulus_source" class="text-emerald-9 focus:ring-0">
                                <span>🤖 AI Auto-Generate Wacana</span>
                            </label>
                            <label :class="stimulus_source === 'custom_text' ? 'border-emerald-9 bg-white text-emerald-11 font-bold shadow-2xs' : 'border-gray-6 text-gray-12'"
                                   class="flex items-center gap-2 p-2 rounded-lg border text-xs cursor-pointer">
                                <input type="radio" value="custom_text" x-model="stimulus_source" class="text-emerald-9 focus:ring-0">
                                <span>📋 Tempel Teks Sendiri</span>
                            </label>
                        </div>

                        <div x-show="stimulus_source === 'custom_text'">
                            <textarea x-model="custom_stimulus_text" rows="3" placeholder="Tempelkan artikel berita, wacana literasi, cuplikan studi kasus, atau data di sini..."
                                      class="w-full px-3 py-2 bg-white border border-gray-6 rounded-xl text-xs font-medium text-gray-12 focus:border-emerald-9 focus:ring-2 focus:ring-emerald-9/20 transition-all"></textarea>
                        </div>
                    </div>

                    <!-- Kesulitan & Kognitif (2 Kolom) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div>
                            <label class="block text-xs font-bold text-gray-11 mb-1">Tingkat Kesulitan Dominan:</label>
                            <select x-model="difficulty"
                                    class="w-full px-3 py-2 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-emerald-9 transition-all">
                                <option value="mudah">Mudah (Dasar & Fondasi Konsep)</option>
                                <option value="sedang">Sedang (Standar Asesmen Nasional)</option>
                                <option value="sukar">Sukar (Tantangan Tinggi / Analisis Mendalam)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-11 mb-1">Level Kognitif:</label>
                            <select x-model="cognitive_level"
                                    class="w-full px-3 py-2 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-emerald-9 transition-all">
                                <option value="C1-C2 (LOTS)">C1-C2 (LOTS: Mengingat & Memahami)</option>
                                <option value="C3-C4 (MOTS)">C3-C4 (MOTS: Menerapkan & Menganalisis)</option>
                                <option value="C5-C6 (HOTS)">C5-C6 (HOTS: Evaluasi & Kreasi Logika)</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-gray-5 mt-3">
                        <label class="flex items-start gap-3 cursor-pointer p-3 rounded-xl border border-gray-5 hover:bg-gray-1 transition-colors"
                               :class="include_visuals ? 'bg-blue-1/50 border-blue-5' : 'bg-white'">
                            <input type="checkbox" x-model="include_visuals" class="mt-0.5 rounded text-blue-9 focus:ring-blue-9/20 w-4 h-4">
                            <div>
                                <span class="block text-xs font-bold text-gray-12">Sertakan Diagram / Grafik Visual (Otomatis)</span>
                                <span class="block text-[11px] text-gray-10 mt-0.5">DeepSeek akan mencoba menghasilkan diagram SVG/Mermaid inline secara otomatis. Sangat disarankan untuk Sains, Geometri, dan Ekonomi.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- BAGIAN 3: Kisi-Kisi Khusus & Pilihan Model DeepSeek -->
                <div class="bg-white border border-gray-6 rounded-2xl p-5 shadow-xs space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-lg bg-indigo-3 text-indigo-11 flex items-center justify-center font-bold text-xs">3</span>
                            <h2 class="font-display font-bold text-sm text-gray-12">Kisi-Kisi Khusus & Engine DeepSeek</h2>
                        </div>
                    </div>

                    <!-- Plain Textarea Kisi-Kisi / Pesan Khusus -->
                    <div>
                        <label class="block text-xs font-bold text-gray-11 mb-1">Pesan Khusus / Kisi-Kisi untuk Model AI (Opsional):</label>
                        <textarea x-model="custom_prompt" rows="3" placeholder="Tuliskan petunjuk khusus di sini, misalnya: 'Sertakan studi kasus pelayanan kantor dinas yang ambigu', 'Gunakan rumus kuadrat LaTeX $$ax^2+bx+c$$', 'Fokuskan pada perangkap sinonim kata'..."
                                  class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-medium text-gray-12 focus:bg-white focus:border-indigo-9 focus:ring-2 focus:ring-indigo-9/20 transition-all"></textarea>
                    </div>

                    <!-- Model Selector DeepSeek -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-11">Pilih Model DeepSeek AI Engine:</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <label :class="ai_model === 'deepseek-reasoner' ? 'border-indigo-9 bg-indigo-2/40 text-indigo-11 ring-2 ring-indigo-9/20' : 'border-gray-6 text-gray-12 hover:bg-gray-2'"
                                   class="p-3.5 rounded-xl border text-xs cursor-pointer transition-all flex items-start gap-3">
                                <input type="radio" value="deepseek-reasoner" x-model="ai_model" class="mt-1 text-indigo-9 focus:ring-0">
                                <div>
                                    <div class="flex items-center gap-1.5 font-bold">
                                        <span>🧠 DeepSeek R1 (Reasoner)</span>
                                        <span class="px-1.5 py-0.5 rounded text-[10px] bg-indigo-9 text-white">Sangat Direkomendasikan</span>
                                    </div>
                                    <p class="text-[11px] text-gray-11 font-normal mt-1 leading-relaxed">
                                        Dilengkapi <em>Chain-of-Thought</em> (CoT). Sangat akurat untuk hitungan matematika, soal HOTS, analisis logika TKP/TIU, dan zero-hallucination.
                                    </p>
                                </div>
                            </label>

                            <label :class="ai_model === 'deepseek-chat' ? 'border-indigo-9 bg-indigo-2/40 text-indigo-11 ring-2 ring-indigo-9/20' : 'border-gray-6 text-gray-12 hover:bg-gray-2'"
                                   class="p-3.5 rounded-xl border text-xs cursor-pointer transition-all flex items-start gap-3">
                                <input type="radio" value="deepseek-chat" x-model="ai_model" class="mt-1 text-indigo-9 focus:ring-0">
                                <div>
                                    <div class="font-bold flex items-center gap-1.5">
                                        <span>⚡ DeepSeek V3 (Chat)</span>
                                        <span class="px-1.5 py-0.5 rounded text-[10px] bg-gray-4 text-gray-11">Cepat & Ringan</span>
                                    </div>
                                    <p class="text-[11px] text-gray-11 font-normal mt-1 leading-relaxed">
                                        Generasi ultra cepat dalam hitungan detik. Cocok untuk soal hafalan, definisi, literasi dasar, dan pembuatan draft naskah cepat.
                                    </p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- TOMBOL GENERATE UTAMA -->
                    <div class="pt-2">
                        <button type="button" @click="generateQuestions()" :disabled="generating"
                                class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-indigo-600 hover:from-emerald-700 hover:via-teal-700 hover:to-indigo-700 text-white font-bold text-sm shadow-md hover:shadow-lg transition-all cursor-pointer disabled:opacity-75 disabled:cursor-not-allowed active:scale-[0.99]">
                            <template x-if="!generating">
                                <span class="flex items-center gap-2">
                                    <x-radix-icon name="magic-wand" class="w-4 h-4" />
                                    <span>✨ Generate Butir Soal dengan DeepSeek AI</span>
                                </span>
                            </template>
                            <template x-if="generating">
                                <span class="flex items-center gap-2">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span x-text="generatingText"></span>
                                </span>
                            </template>
                        </button>
                    </div>
                </div>

            </div>

            <!-- PANEL KANAN: Hasil Generate, Live Print-Ready View & Export Studio (5 Kolom di Desktop) -->
            <div class="lg:col-span-5 space-y-4 lg:sticky lg:top-6">
                
                <!-- Card Container Hasil -->
                <div class="bg-white border border-gray-6 rounded-2xl shadow-sm overflow-hidden flex flex-col min-h-[600px]">
                    
                    <!-- Header Tab View: Cetak Kertas vs Import CBT -->
                    <div class="p-3.5 bg-gray-2 border-b border-gray-5 flex items-center justify-between gap-2">
                        <div class="flex items-center gap-1 bg-gray-3 p-1 rounded-xl">
                            <button type="button" @click="resultTab = 'print'"
                                    :class="resultTab === 'print' ? 'bg-white text-gray-12 font-bold shadow-2xs' : 'text-gray-11 hover:text-gray-12 font-medium'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer flex items-center gap-1.5">
                                <x-radix-icon name="file-text" class="w-3.5 h-3.5 text-blue-11" />
                                <span>Format Cetak Kertas</span>
                            </button>
                            <button type="button" @click="resultTab = 'cbt'"
                                    :class="resultTab === 'cbt' ? 'bg-white text-gray-12 font-bold shadow-2xs' : 'text-gray-11 hover:text-gray-12 font-medium'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer flex items-center gap-1.5">
                                <x-radix-icon name="code" class="w-3.5 h-3.5 text-emerald-11" />
                                <span>Format Word CBT (.docx)</span>
                            </button>
                        </div>

                        <!-- Badge Jumlah Butir -->
                        <div x-show="resultPackage" class="text-[11px] font-bold text-gray-11 px-2.5 py-1 rounded-lg bg-white border border-gray-6">
                            <span x-text="(resultPackage?.items?.length || 0) + ' Soal'"></span>
                        </div>
                    </div>

                    <!-- KONTEN HASIL GENERATE -->
                    <div class="p-5 flex-1 overflow-y-auto max-h-[700px] space-y-4">
                        
                        <!-- Empty State Sebelum Generate -->
                        <template x-if="!resultPackage && !generating">
                            <div class="h-96 flex flex-col items-center justify-center text-center p-6 space-y-3">
                                <div class="w-14 h-14 rounded-2xl bg-indigo-3 text-indigo-11 flex items-center justify-center shadow-xs">
                                    <x-radix-icon name="magic-wand" class="w-7 h-7" />
                                </div>
                                <h3 class="font-display font-bold text-sm text-gray-12">Belum Ada Soal yang Di-generate</h3>
                                <p class="text-xs text-gray-11 max-w-sm leading-relaxed">
                                    Pilih kategori ujian, kurikulum/subtes, dan parameter soal di panel sebelah kiri, lalu klik tombol <strong>Generate Butir Soal</strong>.
                                </p>
                            </div>
                        </template>

                        <!-- Loading State -->
                        <template x-if="generating">
                            <div class="h-96 flex flex-col items-center justify-center text-center p-6 space-y-4">
                                <div class="w-12 h-12 rounded-full border-4 border-emerald-3 border-t-emerald-9 animate-spin"></div>
                                <div>
                                    <h4 class="font-bold text-sm text-gray-12" x-text="generatingText"></h4>
                                    <p class="text-xs text-gray-11 mt-1">DeepSeek sedang menyusun butir soal, formula LaTeX, dan kunci jawaban terverifikasi...</p>
                                </div>
                            </div>
                        </template>

                        <!-- HASIL GENERATE SUDAH ADA -->
                        <template x-if="resultPackage && !generating">
                            <div>
                                <!-- TAB 1: FORMAT SIAP CETAK KERTAS (PAPER EXAM READY) -->
                                <div x-show="resultTab === 'print'" class="space-y-6">
                                    
                                    <!-- Print Preview Canvas / Sheet Container -->
                                    <div id="printable-exam-sheet" class="bg-white p-6 rounded-xl border border-gray-6 shadow-2xs space-y-5 text-gray-12 text-xs font-sans leading-relaxed">
                                        
                                        <!-- KOP UJIAN RESMI -->
                                        <div class="border-b-2 border-gray-12 pb-3 text-center space-y-1">
                                            <h2 class="font-bold text-sm tracking-wider uppercase" x-text="resultPackage.assessment_title || 'NASKAH ASESMEN TERSTANDAR'"></h2>
                                            <div class="flex items-center justify-center gap-3 text-[11px] text-gray-11 font-medium">
                                                <span>Jenjang: <strong class="text-gray-12" x-text="grade_level || 'Umum'"></strong></span>
                                                <span>•</span>
                                                <span>Waktu: <strong>60 - 90 Menit</strong></span>
                                                <span>•</span>
                                                <span>Tingkat: <strong class="text-gray-12" x-text="difficulty"></strong></span>
                                            </div>
                                        </div>

                                        <!-- LEMBAR ISIAN SISWA (KOTAK IDENTITAS PESERTA) -->
                                        <div class="grid grid-cols-2 gap-3 p-3 rounded-lg border border-gray-6 bg-gray-1 text-[11px]">
                                            <div>
                                                <span class="text-gray-10 block">Nama Peserta : .................................................</span>
                                                <span class="text-gray-10 block mt-1">Nomor Peserta: .................................................</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-10 block">Kelas / Ruang: .................................................</span>
                                                <span class="text-gray-10 block mt-1">Tanda Tangan : .................................................</span>
                                            </div>
                                        </div>

                                        <!-- PETUNJUK UMUM -->
                                        <div class="text-[11px] text-gray-11 italic border-l-2 border-gray-6 pl-2">
                                            Petunjuk: Pilihlah satu jawaban yang paling tepat atau kerjakan sesuai petunjuk instruksi masing-masing soal.
                                        </div>

                                        <!-- DAFTAR BUTIR SOAL KERTAS (DIKELOMPOKKAN BERDASARKAN STIMULUS ATAU TIPE SOAL) -->
                                        <div class="space-y-6 pt-2">
                                            <template x-for="(sec, sIdx) in getGroupedSections()" :key="sIdx">
                                                <div class="space-y-4">
                                                    <!-- Part Banner & Keterangan Bagian -->
                                                    <div class="pb-2 border-b border-gray-12/40 bg-gray-1 px-3 py-2 rounded-lg">
                                                        <div class="font-bold text-xs text-gray-12 tracking-wider uppercase" x-text="sec.title"></div>
                                                        <div class="text-[11px] text-gray-11 italic mt-0.5" x-text="'Petunjuk: ' + sec.instructions"></div>
                                                    </div>

                                                    <!-- Butir Soal dalam Bagian Ini -->
                                                    <div class="space-y-4">
                                                        <template x-for="(item, idx) in sec.items" :key="item.number">
                                                            <div>
                                                                <!-- WACANA STIMULUS UNTUK GROUP INI (JIKA ADA & PERTAMA KALI MUNCUL) -->
                                                                <template x-if="item.group_stimulus">
                                                                    <div class="p-4 mb-4 rounded-xl bg-blue-1/50 border border-blue-6/70 space-y-2 shadow-2xs">
                                                                        <div class="flex items-center justify-between">
                                                                            <h4 class="font-bold text-xs text-blue-12 uppercase tracking-wide flex items-center gap-1.5">
                                                                                <span>📖</span>
                                                                                <span x-text="item.group_stimulus.title || 'Wacana Stimulus Narasi'"></span>
                                                                            </h4>
                                                                            <span class="text-[10px] font-bold text-blue-11 bg-blue-2 px-2 py-0.5 rounded-full border border-blue-5"
                                                                                  x-text="item.group_stimulus.badge || 'Wacana Narasi / Stimulus'">
                                                                            </span>
                                                                        </div>
                                                                        <div class="mt-2 text-xs text-gray-12 whitespace-pre-wrap leading-relaxed prose prose-sm max-w-none" x-html="renderPreviewMarkdown(item.group_stimulus.content)"></div>
                                                                        <div class="mt-3 border-t border-blue-6/70 pt-2 flex justify-between items-center">
                                                                            <div class="text-[10px] text-blue-11 flex items-center gap-1">
                                                                                <span x-show="isUploading && uploadTarget?.type === 'stimulus' && uploadTarget?.index === item.group_stimulus.index" class="animate-pulse">⏳ Mengunggah...</span>
                                                                            </div>
                                                                            <button @click="$refs.globalFileInput.click(); uploadTarget = { type: 'stimulus', index: item.group_stimulus.index }" class="text-[10px] bg-blue-9 hover:bg-blue-10 text-white font-bold px-2 py-1 rounded shadow-xs transition-colors flex items-center gap-1 cursor-pointer">
                                                                                <x-radix-icon name="image" class="w-3 h-3" />
                                                                                Unggah / Sisipkan Gambar
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </template>

                                                                <div class="space-y-2 pb-3 border-b border-gray-4 last:border-b-0">
                                                                <div class="flex items-start gap-2">
                                                                    <span class="font-bold text-xs" x-text="item.number + '.'"></span>
                                                                    <div class="flex-1 space-y-2">
                                                                        <div class="text-xs text-gray-12 font-medium whitespace-pre-wrap leading-relaxed prose prose-sm max-w-none" x-html="renderPreviewMarkdown(item.prompt)"></div>
                                                                        <div class="flex justify-end pt-1">
                                                                            <div class="text-[10px] text-gray-10 flex items-center gap-1 mr-2">
                                                                                <span x-show="isUploading && uploadTarget?.type === 'item' && uploadTarget?.itemNumber === item.number" class="animate-pulse">⏳ Mengunggah...</span>
                                                                            </div>
                                                                            <button @click="$refs.globalFileInput.click(); uploadTarget = { type: 'item', itemNumber: item.number }" class="text-[9px] bg-gray-3 border border-gray-6 hover:bg-gray-4 text-gray-11 font-bold px-2 py-1 rounded shadow-xs transition-colors flex items-center gap-1 cursor-pointer">
                                                                                <x-radix-icon name="image" class="w-2.5 h-2.5" />
                                                                                Sisipkan Gambar
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Pilihan Ganda & Berbobot -->
                                                                <template x-if="['mcq_single', 'mcq_multiple', 'mcq_weighted'].includes(item.type)">
                                                                    <div class="pl-5 space-y-1.5">
                                                                        <template x-for="opt in item.options" :key="opt.label">
                                                                            <div class="flex items-start gap-2 text-xs text-gray-12">
                                                                                <span class="font-bold w-4" x-text="opt.label + '.'"></span>
                                                                                <span class="flex-1" x-text="opt.option_text"></span>
                                                                            </div>
                                                                        </template>
                                                                    </div>
                                                                </template>

                                                                <!-- Benar / Salah (Matriks) -->
                                                                <template x-if="item.type === 'binary_matrix'">
                                                                    <div class="pl-5 pt-1">
                                                                        <table class="w-full text-[11px] border border-gray-5">
                                                                            <thead>
                                                                                <tr class="bg-gray-2 text-gray-11 text-left">
                                                                                    <th class="p-1.5 border-b border-gray-4">Pernyataan</th>
                                                                                    <th class="p-1.5 border-b border-gray-4 text-center w-16">Benar</th>
                                                                                    <th class="p-1.5 border-b border-gray-4 text-center w-16">Salah</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <template x-for="(opt, optIdx) in item.options" :key="optIdx">
                                                                                    <tr class="border-b border-gray-3 last:border-b-0">
                                                                                        <td class="p-1.5 text-gray-12" x-text="opt.option_text"></td>
                                                                                        <td class="p-1.5 text-center font-mono">[ &nbsp; ]</td>
                                                                                        <td class="p-1.5 text-center font-mono">[ &nbsp; ]</td>
                                                                                    </tr>
                                                                                </template>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </template>

                                                                <!-- Menjodohkan -->
                                                                <template x-if="item.type === 'matching'">
                                                                    <div class="pl-5 pt-1 space-y-1 text-[11px]">
                                                                        <template x-for="(opt, optIdx) in item.options" :key="optIdx">
                                                                            <div class="flex items-center justify-between border-b border-gray-3 py-1">
                                                                                <span class="text-gray-12" x-text="(optIdx + 1) + '. ' + opt.option_text"></span>
                                                                                <span class="text-gray-9 italic">... dipasangkan ke ... ( &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; )</span>
                                                                            </div>
                                                                        </template>
                                                                    </div>
                                                                </template>

                                                                <!-- Mengurutkan -->
                                                                <template x-if="item.type === 'ordering'">
                                                                    <div class="pl-5 pt-1 space-y-1 text-[11px]">
                                                                        <template x-for="(opt, optIdx) in item.options" :key="optIdx">
                                                                            <div class="flex items-center gap-2 py-0.5">
                                                                                <span class="font-mono text-gray-10">[ Urutan ke-.... ]</span>
                                                                                <span class="text-gray-12" x-text="opt.option_text"></span>
                                                                            </div>
                                                                        </template>
                                                                    </div>
                                                                </template>

                                                                <!-- Isian Singkat -->
                                                                <template x-if="item.type === 'short_answer'">
                                                                    <div class="pl-5 pt-1 text-[11px] text-gray-10">
                                                                        Jawaban: ____________________________________________________________________
                                                                    </div>
                                                                </template>

                                                                <!-- Uraian / Esai -->
                                                                <template x-if="item.type === 'essay'">
                                                                    <div class="pl-5 pt-1 space-y-2 text-[11px] text-gray-8">
                                                                        <div class="border-b border-dashed border-gray-4 h-5"></div>
                                                                        <div class="border-b border-dashed border-gray-4 h-5"></div>
                                                                        <div class="border-b border-dashed border-gray-4 h-5"></div>
                                                                    </div>
                                                                </template>
                                                                </div> <!-- End item.type loop -->
                                                            </div> <!-- End new wrapper div -->
                                                        </template>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>

                                        <!-- LEMBAR KUNCI JAWABAN & PEMBAHASAN TERPISAH (OTOMATIS PAGE-BREAK SAAT PRINT) -->
                                        <div class="answer-key-section pt-8 border-t-2 border-dashed border-gray-5 space-y-4">
                                            <div class="text-center border-b border-gray-5 pb-2">
                                                <span class="text-xs font-bold uppercase tracking-wider text-emerald-11 bg-emerald-2 px-3 py-1 rounded-full border border-emerald-6">
                                                    LEMBAR KUNCI JAWABAN &amp; PEMBAHASAN RESMI (UNTUK GURU / EVALUATOR)
                                                </span>
                                            </div>

                                            <div class="grid grid-cols-1 gap-3">
                                                <template x-for="item in resultPackage.items" :key="'key_' + item.number">
                                                    <div class="p-3 rounded-lg bg-gray-2 border border-gray-5 text-xs space-y-1">
                                                        <div class="flex items-center justify-between font-bold">
                                                            <span>Soal No. <span x-text="item.number"></span>:</span>
                                                            <span class="text-emerald-11 font-mono">
                                                                <template x-if="item.type === 'mcq_single'">
                                                                    <span>Kunci: <strong x-text="item.options.find(o => o.is_correct)?.label || 'A'"></strong></span>
                                                                </template>
                                                                <template x-if="item.type === 'mcq_weighted'">
                                                                    <span>Skor: A=<span x-text="item.options[0]?.score"></span>, B=<span x-text="item.options[1]?.score"></span>, C=<span x-text="item.options[2]?.score"></span>, D=<span x-text="item.options[3]?.score"></span>, E=<span x-text="item.options[4]?.score"></span></span>
                                                                </template>
                                                                <template x-if="item.type === 'mcq_multiple'">
                                                                    <span>Kunci: <strong x-text="item.options.filter(o => o.is_correct).map(o => o.label).join(', ')"></strong></span>
                                                                </template>
                                                            </span>
                                                        </div>
                                                        <p class="text-[11px] text-gray-11 italic whitespace-pre-wrap leading-relaxed" x-text="item.explanation"></p>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- TAB 2: FORMAT TEKS IMPORT WORD CBT -->
                                <div x-show="resultTab === 'cbt'" class="space-y-3" style="display: none;">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="text-gray-11 font-medium">Format Naskah Kompatibel Parser Word CBT ADZKIA:</span>
                                        <button type="button" @click="copyWordText()" class="text-blue-11 hover:underline font-bold cursor-pointer">
                                            <span x-text="copied ? '✓ Berhasil Disalin!' : 'Salin Semua Teks'"></span>
                                        </button>
                                    </div>
                                    <pre class="p-4 rounded-xl bg-gray-2 border border-gray-6 font-mono text-[11px] text-gray-12 whitespace-pre-wrap leading-relaxed select-all max-h-[500px] overflow-y-auto" x-text="wordText"></pre>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- FOOTER AKSI STUDIO (DOWNLOAD WORD, CETAK PRINT, SIMPAN KE BANK) -->
                    <div x-show="resultPackage" class="p-4 bg-gray-2 border-t border-gray-5 flex flex-wrap items-center justify-between gap-2.5">
                        <div class="flex items-center gap-2">
                            <!-- Tombol Cetak Kertas -->
                            <button type="button" @click="printExamSheet()"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gray-12 hover:bg-black text-white text-xs font-bold transition-all shadow-xs cursor-pointer">
                                <x-radix-icon name="printer" class="w-4 h-4" />
                                <span>Cetak Kertas (Ctrl+P)</span>
                            </button>

                            <!-- Tombol Download Word .docx -->
                            <button type="button" @click="downloadDocx()"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-blue-9 hover:bg-blue-10 text-white text-xs font-bold transition-all shadow-xs cursor-pointer">
                                <x-radix-icon name="download" class="w-4 h-4" />
                                <span>Download Word (.docx)</span>
                            </button>
                        </div>

                        <div class="flex items-center gap-2">
                            <!-- Tombol Simpan ke Bank Soal -->
                            <button type="button" @click="saveToQuestionBank()" :disabled="isSaving"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-bold transition-all shadow-xs cursor-pointer disabled:opacity-75">
                                <x-radix-icon name="archive" class="w-4 h-4" />
                                <span x-text="isSaving ? 'Menyimpan...' : 'Simpan ke Bank Soal'"></span>
                            </button>

                            <!-- Tombol Langsung Kirim ke Wizard Asesmen -->
                            <button type="button" @click="sendToWizard()" :disabled="isSendingToWizard"
                                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-indigo-9 hover:bg-indigo-10 text-white text-xs font-bold transition-all shadow-xs cursor-pointer disabled:opacity-75">
                                <x-radix-icon name="magic-wand" class="w-4 h-4" />
                                <span x-text="isSendingToWizard ? 'Menyiapkan Wizard...' : 'Lanjut ke Wizard Ujian →'"></span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- MODAL NOTIFIKASI SUKSES DISIMPAN KE BANK SOAL -->
        <div x-show="showSavedModal" style="display: none;" x-transition.opacity
             class="fixed inset-0 z-50 bg-gray-12/40 backdrop-blur-xs flex items-center justify-center p-4">
            <div @click.away="showSavedModal = false" class="bg-white border border-gray-6 rounded-2xl max-w-sm w-full p-6 text-center space-y-4 shadow-xl">
                <div class="w-12 h-12 rounded-full bg-emerald-3 text-emerald-11 mx-auto flex items-center justify-center">
                    <x-radix-icon name="check" class="w-6 h-6" />
                </div>
                <div>
                    <h3 class="font-display font-bold text-base text-gray-12">Berhasil Disimpan!</h3>
                    <p class="text-xs text-gray-11 mt-1 leading-relaxed" x-text="savedMessage"></p>
                </div>
                <div class="flex items-center justify-center gap-2 pt-2">
                    <a :href="'/question-banks/' + savedBankId" class="px-4 py-2 rounded-xl bg-emerald-9 text-white text-xs font-bold hover:bg-emerald-10 transition-colors">
                        Buka Bank Soal
                    </a>
                    <button type="button" @click="showSavedModal = false" class="px-4 py-2 rounded-xl bg-gray-3 hover:bg-gray-4 text-gray-12 text-xs font-bold transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
        <!-- GLOBAL HIDDEN FILE INPUT -->
        <input type="file" x-ref="globalFileInput" @change="handleImageUpload" accept="image/*" class="hidden">
    </div>

    <!-- STYLING KHUSUS CETAK KERTAS (@media print) -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printable-exam-sheet, #printable-exam-sheet * {
                visibility: visible;
            }
            #printable-exam-sheet {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 15mm;
                border: none !important;
                box-shadow: none !important;
            }
            .answer-key-section {
                page-break-before: always;
            }
        }
    </style>

    <!-- ALPINE.JS COMPONENT SCRIPT -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('questionGeneratorStudio', () => ({
                // Data Master Silabus dari Controller
                syllabus: @json($syllabus),
                
                // Form States
                category: 'school',
                curriculum: 'merdeka',
                grade_level: '10',
                subject: 'matematika',
                availableChapters: [],
                selectedChapters: [],
                
                utbk_group: 'tps',
                skd_track: 'cpns',
                subtest: 'PU',

                difficulty: 'sedang',
                cognitive_level: 'C3-C4 (MOTS)',

                // Multi-tipe Soal & Distribusi Checklist
                question_types: [
                    {
                        key: 'mcq_single',
                        label: 'Pilihan Ganda Tunggal',
                        icon: '🔘',
                        desc: '1 jawaban benar (A-E/A-D)',
                        enabled: true,
                        standalone_count: 5,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    },
                    {
                        key: 'mcq_multiple',
                        label: 'Pilihan Ganda Kompleks',
                        icon: '☑️',
                        desc: 'Lebih dari 1 pernyataan/jawaban benar',
                        enabled: false,
                        standalone_count: 2,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    },
                    {
                        key: 'binary_matrix',
                        label: 'Benar / Salah (Matrix)',
                        icon: '⚖️',
                        desc: 'Tabel evaluasi Benar-Salah / Ya-Tidak',
                        enabled: false,
                        standalone_count: 2,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    },
                    {
                        key: 'matching',
                        label: 'Menjodohkan (Matching)',
                        icon: '🔗',
                        desc: 'Premis kiri dipasangkan dengan opsi kanan',
                        enabled: false,
                        standalone_count: 2,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    },
                    {
                        key: 'ordering',
                        label: 'Mengurutkan (Ordering)',
                        icon: '🔢',
                        desc: 'Menyusun urutan tahapan / kronologi',
                        enabled: false,
                        standalone_count: 1,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    },
                    {
                        key: 'short_answer',
                        label: 'Isian Singkat',
                        icon: '✍️',
                        desc: 'Jawaban kata kunci atau angka pasti',
                        enabled: false,
                        standalone_count: 2,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    },
                    {
                        key: 'essay',
                        label: 'Esai / Uraian Bebas',
                        icon: '📝',
                        desc: 'Analisis mendalam dengan rubrik penilaian',
                        enabled: false,
                        standalone_count: 1,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    },
                    {
                        key: 'mcq_weighted',
                        label: 'TKP / Skala Bertingkat (Bobot 1-5)',
                        icon: '🎯',
                        desc: 'Setiap opsi bernilai 1 sampai 5 poin',
                        enabled: false,
                        standalone_count: 5,
                        stimulus_count: 0,
                        stimulus_questions: 0
                    }
                ],

                stimulus_source: 'ai_generate',
                custom_stimulus_text: '',

                include_visuals: false,

                custom_prompt: '',
                ai_model: 'deepseek-reasoner',

                // Async & Output States
                generating: false,
                generatingText: 'Menghubungkan ke DeepSeek AI...',
                resultPackage: null,
                wordText: '',
                resultTab: 'print',
                copied: false,

                isSaving: false,
                isSendingToWizard: false,
                showSavedModal: false,
                savedMessage: '',
                savedBankId: null,

                uploadTarget: null,
                isUploading: false,

                init() {
                    this.onFilterChange();
                },

                setCategory(cat) {
                    this.category = cat;
                    if (cat === 'skd') {
                        this.subtest = 'TIU';
                        this.applyPreset('skd');
                    } else if (cat === 'utbk') {
                        this.utbk_group = 'tps';
                        this.subtest = 'PU';
                        this.applyPreset('akm_mix');
                    } else {
                        this.applyPreset('standard_pg');
                    }
                    this.onFilterChange();
                },

                getTotalStandalone() {
                    return this.question_types
                        .filter(t => t.enabled)
                        .reduce((acc, t) => acc + (Number(t.standalone_count) || 0), 0);
                },

                getTotalStimulusTexts() {
                    return this.question_types
                        .filter(t => t.enabled)
                        .reduce((acc, t) => acc + (Number(t.stimulus_count) || 0), 0);
                },

                getTotalStimulusQuestions() {
                    return this.question_types
                        .filter(t => t.enabled)
                        .reduce((acc, t) => acc + ((Number(t.stimulus_count) || 0) * (Number(t.stimulus_questions) || 0)), 0);
                },

                getTotalQuestions() {
                    const total = this.getTotalStandalone() + this.getTotalStimulusQuestions();
                    return total > 0 ? total : 0;
                },

                getStimuli() {
                    if (!this.resultPackage) return [];
                    if (this.resultPackage.stimuli && Array.isArray(this.resultPackage.stimuli) && this.resultPackage.stimuli.length > 0) {
                        return this.resultPackage.stimuli.map((st, idx) => ({
                            index: Number(st.index) || (idx + 1),
                            title: st.title || ('Wacana Stimulus #' + (idx + 1)),
                            content: st.content || st.text || st.wacana || ''
                        })).filter(st => !!st.content);
                    }
                    const single = this.getStimulusContent();
                    if (single) {
                        return [{
                            index: 1,
                            title: this.getStimulusTitle(),
                            content: single
                        }];
                    }
                    return [];
                },

                hasMultipleStimuli() {
                    return this.getStimuli().length > 1;
                },

                getStimulusTitle() {
                    if (!this.resultPackage || !this.resultPackage.stimulus) return 'Wacana Stimulus Narasi';
                    if (typeof this.resultPackage.stimulus === 'string') return 'Wacana Stimulus Narasi';
                    return this.resultPackage.stimulus.title || 'Wacana Stimulus Narasi';
                },

                getStimulusContent() {
                    if (!this.resultPackage || !this.resultPackage.stimulus) return '';
                    if (typeof this.resultPackage.stimulus === 'string') return this.resultPackage.stimulus;
                    return this.resultPackage.stimulus.content || this.resultPackage.stimulus.text || this.resultPackage.stimulus.wacana || '';
                },

                hasStimulus() {
                    return !!this.getStimulusContent() || this.getStimuli().length > 0;
                },

                applyPreset(preset) {
                    this.question_types.forEach(t => {
                        t.enabled = false;
                        t.standalone_count = 0;
                        t.stimulus_count = 0;
                        t.stimulus_questions = 0;
                    });

                    if (preset === 'standard_pg') {
                        const pg = this.question_types.find(t => t.key === 'mcq_single');
                        if (pg) {
                            pg.enabled = true;
                            pg.standalone_count = 5;
                        }
                    } else if (preset === 'akm_mix') {
                        const pg = this.question_types.find(t => t.key === 'mcq_single');
                        if (pg) { pg.enabled = true; pg.standalone_count = 2; pg.stimulus_count = 1; pg.stimulus_questions = 2; }

                        const pgk = this.question_types.find(t => t.key === 'mcq_multiple');
                        if (pgk) { pgk.enabled = true; pgk.standalone_count = 1; pgk.stimulus_count = 1; pgk.stimulus_questions = 1; }

                        const bs = this.question_types.find(t => t.key === 'binary_matrix');
                        if (bs) { bs.enabled = true; bs.standalone_count = 1; }

                        const es = this.question_types.find(t => t.key === 'essay');
                        if (es) { es.enabled = true; es.standalone_count = 1; }
                    } else if (preset === 'lengkap') {
                        this.question_types.forEach(t => {
                            if (t.key !== 'mcq_weighted') {
                                t.enabled = true;
                                t.standalone_count = 1;
                            }
                        });
                    } else if (preset === 'skd') {
                        if (this.subtest === 'TKP') {
                            const tkp = this.question_types.find(t => t.key === 'mcq_weighted');
                            if (tkp) { tkp.enabled = true; tkp.standalone_count = 5; }
                        } else {
                            const pg = this.question_types.find(t => t.key === 'mcq_single');
                            if (pg) { pg.enabled = true; pg.standalone_count = 5; }
                        }
                    }
                },

                onFilterChange() {
                    if (this.category === 'school') {
                        const curData = this.syllabus[this.curriculum] || {};
                        const gradeData = curData[this.grade_level] || {};
                        const subData = gradeData[this.subject] || {};
                        let chapters = subData.chapters || [];

                        // Fallback dinamis jika kombinasi tertentu belum didefinisikan secara statis
                        if (chapters.length === 0) {
                            const subName = this.subject ? this.subject.replace(/_/g, ' ').toUpperCase() : 'MATA PELAJARAN';
                            const curName = this.curriculum === 'k13' ? 'Kurikulum 2013' : 'Kurikulum Merdeka';
                            chapters = [
                                { id: 'fb_1', title: `Bab 1: Fondasi & Konsep Inti ${subName} (${curName})`, semester: 1 },
                                { id: 'fb_2', title: `Bab 2: Teori, Prinsip & Aplikasi ${subName}`, semester: 1 },
                                { id: 'fb_3', title: `Bab 3: Pemecahan Masalah & Prosedur Analisis ${subName}`, semester: 1 },
                                { id: 'fb_4', title: `Bab 4: Eksplorasi Lanjutan & Kajian Kontekstual ${subName}`, semester: 2 },
                                { id: 'fb_5', title: `Bab 5: Studi Kasus Terapan & Proyek Evaluasi ${subName}`, semester: 2 }
                            ];
                        }

                        this.availableChapters = chapters;
                        this.selectedChapters = this.availableChapters.slice(0, 2).map(c => c.title);

                        // Auto-aktifkan diagram visual untuk mapel eksakta
                        const exactSubjects = ['matematika', 'matematika_tingkat_lanjut', 'fisika', 'kimia', 'biologi', 'ekonomi', 'geografi'];
                        if (exactSubjects.includes(this.subject)) {
                            this.include_visuals = true;
                        } else {
                            this.include_visuals = false;
                        }
                    }
                },

                selectAllChapters() {
                    this.selectedChapters = this.availableChapters.map(c => c.title);
                },

                selectSemester(sem) {
                    this.selectedChapters = this.availableChapters.filter(c => c.semester === sem).map(c => c.title);
                },

                clearChapters() {
                    this.selectedChapters = [];
                },

                onUtbkGroupChange() {
                    if (this.utbk_group === 'tps') {
                        this.subtest = 'PU';
                    } else {
                        this.subtest = 'LBI';
                    }
                },

                onSkdSubtestChange() {
                    this.applyPreset('skd');
                },

                async generateQuestions() {
                    const activeTypes = this.question_types.filter(t => t.enabled);
                    if (activeTypes.length === 0) {
                        alert('Silakan centang minimal 1 bentuk/tipe soal pada Bagian 2!');
                        return;
                    }

                    const totalCount = this.getTotalQuestions();
                    if (totalCount <= 0) {
                        alert('Jumlah butir soal tidak boleh 0. Silakan isi jumlah soal mandiri atau stimulus!');
                        return;
                    }

                    this.generating = true;
                    this.generatingText = 'Menghubungi DeepSeek Engine (' + (this.ai_model === 'deepseek-reasoner' ? 'Deep Reasoning R1' : 'V3 Chat') + ')...';

                    const primaryType = activeTypes[0].key;
                    const hasStimulus = this.getTotalStimulusTexts() > 0;

                    const payload = {
                        category: this.category,
                        curriculum: this.curriculum,
                        grade_level: this.grade_level,
                        subject: this.subject,
                        chapters: this.selectedChapters,
                        utbk_group: this.utbk_group,
                        skd_track: this.skd_track,
                        subtest: this.subtest,
                        difficulty: this.difficulty,
                        cognitive_level: this.cognitive_level,
                        stimulus_mode: hasStimulus ? 'stimulus_group' : 'standalone',
                        stimulus_source: this.stimulus_source,
                        custom_stimulus_text: this.custom_stimulus_text,
                        question_type: primaryType,
                        question_count: Math.min(totalCount, 50),
                        type_distributions: activeTypes.map(t => ({
                            type: t.key,
                            label: t.label,
                            standalone_count: Number(t.standalone_count) || 0,
                            stimulus_count: Number(t.stimulus_count) || 0,
                            stimulus_questions: Number(t.stimulus_questions) || 0
                        })),
                        custom_prompt: this.custom_prompt,
                        include_visuals: this.include_visuals,
                        ai_model: this.ai_model,
                        _token: '{{ csrf_token() }}'
                    };

                    try {
                        const res = await fetch('{{ route('question-generator.generate') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify(payload)
                        });

                        const data = await res.json();
                        if (data.status === 'success') {
                            this.resultPackage = data.package;
                            this.wordText = data.word_text;
                            this.resultTab = 'print';
                        } else {
                            alert('Gagal membuat soal: ' + (data.message || 'Terjadi kesalahan'));
                        }
                    } catch (e) {
                        alert('Terjadi kesalahan koneksi server: ' + e.message);
                    } finally {
                        this.generating = false;
                    }
                },

                copyWordText() {
                    navigator.clipboard.writeText(this.wordText).then(() => {
                        this.copied = true;
                        setTimeout(() => this.copied = false, 2500);
                    });
                },

                printExamSheet() {
                    window.print();
                },

                downloadDocx() {
                    if (!this.resultPackage) return;
                    
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '{{ route('question-generator.export-word') }}';
                    form.style.display = 'none';

                    const csrf = document.createElement('input');
                    csrf.name = '_token';
                    csrf.value = '{{ csrf_token() }}';
                    form.appendChild(csrf);

                    const pkg = document.createElement('input');
                    pkg.name = 'package';
                    pkg.value = JSON.stringify(this.resultPackage);
                    form.appendChild(pkg);

                    document.body.appendChild(form);
                    form.submit();
                    document.body.removeChild(form);
                },

                async sendToWizard() {
                    if (!this.resultPackage) {
                        window.location.href = '{{ route('assessments.wizard') }}';
                        return;
                    }

                    this.isSendingToWizard = true;

                    try {
                        const res = await fetch('{{ route('question-generator.to-wizard') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                package: this.resultPackage,
                                _token: '{{ csrf_token() }}'
                            })
                        });

                        const data = await res.json();
                        if (data.status === 'success' && data.redirect_url) {
                            window.location.href = data.redirect_url;
                        } else {
                            alert('Gagal menyiapkan Wizard: ' + (data.message || 'Terjadi kesalahan'));
                        }
                    } catch (e) {
                        alert('Koneksi bermasalah: ' + e.message);
                    } finally {
                        this.isSendingToWizard = false;
                    }
                },

                goToWizard() {
                    if (this.resultPackage) {
                        this.sendToWizard();
                    } else {
                        window.location.href = '{{ route('assessments.wizard') }}';
                    }
                },

                async handleImageUpload(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    if (!this.uploadTarget || !this.resultPackage) {
                        alert('Target upload tidak ditemukan.');
                        return;
                    }

                    this.isUploading = true;
                    const formData = new FormData();
                    formData.append('file', file);
                    formData.append('_token', '{{ csrf_token() }}');

                    try {
                        const res = await fetch('{{ route('assessments.upload-image') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        });

                        const data = await res.json();
                        if (data.status === 'success') {
                            const markdownImage = `\n\n![Gambar/Visual](${data.url})\n\n`;
                            
                            // Append to target
                            if (this.uploadTarget.type === 'stimulus') {
                                const targetIdx = this.uploadTarget.index;
                                if (this.resultPackage.stimuli && this.resultPackage.stimuli[targetIdx]) {
                                    this.resultPackage.stimuli[targetIdx].content += markdownImage;
                                } else if (this.resultPackage.stimulus) {
                                    this.resultPackage.stimulus.content += markdownImage;
                                }
                            } else if (this.uploadTarget.type === 'item') {
                                const qNumber = this.uploadTarget.itemNumber;
                                const item = this.resultPackage.items.find(it => it.number === qNumber);
                                if (item) {
                                    item.prompt += markdownImage;
                                }
                            }

                            // Trigger re-render by deeply cloning resultPackage
                            this.resultPackage = JSON.parse(JSON.stringify(this.resultPackage));
                        } else {
                            alert('Gagal mengunggah: ' + (data.message || 'Error'));
                        }
                    } catch (e) {
                        alert('Koneksi bermasalah: ' + e.message);
                    } finally {
                        this.isUploading = false;
                        event.target.value = null; // reset
                    }
                },

                renderPreviewMarkdown(text) {
                    if (!text) return '';
                    let html = text;
                    // Escape HTML first to prevent XSS except our own tags
                    html = html.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
                    // Replace markdown images ![alt](url) with <img> tag
                    html = html.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1" class="max-w-full md:max-w-md h-auto my-3 rounded-lg border border-gray-3 shadow-xs block" />');
                    // Mermaid codeblocks ````mermaid ... ````
                    html = html.replace(/```mermaid([\s\S]*?)```/g, '<div class="p-3 my-2 bg-gray-1 border border-gray-4 rounded font-mono text-[10px] text-gray-9 overflow-auto">Mermaid Diagram Code:<pre class="mt-1 text-gray-11">$1</pre></div>');
                    // Preserve line breaks
                    html = html.replace(/\n/g, '<br/>');
                    return html;
                },

                async saveToQuestionBank() {
                    if (!this.resultPackage) return;
                    this.isSaving = true;

                    try {
                        const res = await fetch('{{ route('question-generator.save-to-bank') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                package: this.resultPackage,
                                bank_title: this.resultPackage.assessment_title,
                                _token: '{{ csrf_token() }}'
                            })
                        });

                        const data = await res.json();
                        if (data.status === 'success') {
                            this.savedMessage = data.message;
                            this.savedBankId = data.bank_id;
                            this.showSavedModal = true;
                        } else {
                            alert('Gagal menyimpan: ' + (data.message || 'Error'));
                        }
                    } catch (e) {
                        alert('Koneksi bermasalah: ' + e.message);
                    } finally {
                        this.isSaving = false;
                    }
                },

                getGroupedSections() {
                    if (!this.resultPackage || !this.resultPackage.items || !Array.isArray(this.resultPackage.items)) {
                        return [];
                    }

                    const preferredOrder = [
                        'mcq_single',
                        'mcq_multiple',
                        'binary_matrix',
                        'matching',
                        'ordering',
                        'short_answer',
                        'essay',
                        'mcq_weighted'
                    ];

                    const typeMetaMap = {
                        'mcq_single': { name: 'Pilihan Ganda (Tunggal)', instructions: 'Pilihlah salah satu jawaban yang paling tepat (A, B, C, D, atau E) untuk setiap butir soal.' },
                        'mcq_multiple': { name: 'Pilihan Ganda Kompleks', instructions: 'Pilihlah satu atau lebih pilihan jawaban yang benar sesuai dengan pertanyaan atau pernyataan yang disajikan.' },
                        'binary_matrix': { name: 'Benar / Salah (Matriks Pernyataan)', instructions: 'Tentukan nilai kebenaran (Benar atau Salah) pada setiap baris pernyataan yang disediakan.' },
                        'matching': { name: 'Menjodohkan', instructions: 'Pasangkan setiap premis atau pertanyaan di kolom kiri dengan jawaban yang sesuai di kolom kanan.' },
                        'ordering': { name: 'Mengurutkan', instructions: 'Susun dan urutkan butir-butir pernyataan/tahapan berikut agar menjadi urutan yang tepat dan logis.' },
                        'short_answer': { name: 'Isian Singkat', instructions: 'Isilah bagian yang rumpang dengan jawaban singkat, presisi, dan tepat.' },
                        'essay': { name: 'Uraian / Esai', instructions: 'Jawablah pertanyaan-pertanyaan berikut dengan penjelasan lengkap, terstruktur, analitis, dan jelas.' },
                        'mcq_weighted': { name: 'Pilihan Berbobot (Karakteristik Pribadi)', instructions: 'Pilihlah opsi tindakan yang menurut Anda paling berintegritas, solutif, dan profesional.' },
                    };

                    const letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M'];

                    // Group by type
                    const grouped = {};
                    this.resultPackage.items.forEach(item => {
                        const t = item.type || 'mcq_single';
                        if (!grouped[t]) grouped[t] = [];
                        grouped[t].push(item);
                    });

                    const sortedTypes = Object.keys(grouped).sort((a, b) => {
                        const ia = preferredOrder.indexOf(a) === -1 ? 999 : preferredOrder.indexOf(a);
                        const ib = preferredOrder.indexOf(b) === -1 ? 999 : preferredOrder.indexOf(b);
                        return ia - ib;
                    });

                    const stimuliMap = {};
                    if (this.resultPackage.stimuli) {
                        this.resultPackage.stimuli.forEach(st => {
                            stimuliMap[Number(st.index || 1)] = st;
                        });
                    } else if (this.resultPackage.stimulus) {
                        stimuliMap[1] = {
                            index: 1,
                            title: this.resultPackage.stimulus.title || 'Wacana Stimulus',
                            content: this.resultPackage.stimulus.content
                        };
                    }

                    return sortedTypes.map((type, idx) => {
                        const meta = typeMetaMap[type] || { name: 'Soal Campuran', instructions: 'Kerjakan butir-butir soal berikut sesuai petunjuk yang tertera.' };
                        const letter = letters[idx] || String.fromCharCode(65 + idx);
                        const typeItems = grouped[type];
                        
                        let currentStimulusIndex = null;
                        
                        // Sort items by stimulus_index so they group together
                        typeItems.sort((a, b) => {
                            const sa = Number(a.stimulus_index || 0);
                            const sb = Number(b.stimulus_index || 0);
                            return sa - sb;
                        });
                        
                        typeItems.forEach(item => {
                            const sIdx = Number(item.stimulus_index || 0);
                            if (sIdx > 0 && stimuliMap[sIdx] && sIdx !== currentStimulusIndex) {
                                item.group_stimulus = {
                                    index: sIdx,
                                    title: stimuliMap[sIdx].title || ('Wacana Stimulus #' + sIdx),
                                    content: stimuliMap[sIdx].content,
                                    badge: 'Wacana Stimulus #' + sIdx
                                };
                                currentStimulusIndex = sIdx;
                            } else {
                                item.group_stimulus = null; // reset if it was set previously but not first anymore
                            }
                        });

                        return {
                            letter: letter,
                            type: type,
                            title: 'BAGIAN ' + letter + ': ' + meta.name.toUpperCase() + ' (' + typeItems.length + ' Butir Soal)',
                            instructions: meta.instructions,
                            items: typeItems
                        };
                    });
                }
            }));
        });
    </script>
</x-layouts.app>
