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
                <a href="{{ route('assessments.wizard') }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-gray-6 bg-white hover:bg-gray-3 text-gray-12 text-xs font-semibold transition-colors cursor-pointer shadow-2xs">
                    <x-radix-icon name="magic-wand" class="w-3.5 h-3.5 text-indigo-11" />
                    <span>Ke Wizard Ujian</span>
                </a>
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
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
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
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-11 mb-1.5">Mata Pelajaran:</label>
                            <select x-model="subject" @change="onFilterChange()"
                                    class="w-full px-3 py-2.5 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-blue-9 focus:ring-2 focus:ring-blue-9/20 transition-all">
                                <option value="matematika">Matematika</option>
                                <option value="bahasa_indonesia">Bahasa Indonesia</option>
                                <option value="ipa">Ilmu Pengetahuan Alam (IPA)</option>
                                <option value="fisika">Fisika</option>
                                <option value="biologi">Biologi</option>
                                <option value="kimia">Kimia</option>
                                <option value="pendidikan_pancasila">Pendidikan Pancasila (PPKn)</option>
                                <option value="bahasa_inggris">Bahasa Inggris</option>
                            </select>
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
                                <template x-for="ch in availableChapters" :key="ch.id">
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

                <!-- BAGIAN 2: Format & Bentuk Soal + Mode Stimulus -->
                <div class="bg-white border border-gray-6 rounded-2xl p-5 shadow-xs space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-3">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 rounded-lg bg-emerald-3 text-emerald-11 flex items-center justify-center font-bold text-xs">2</span>
                            <h2 class="font-display font-bold text-sm text-gray-12">Format Soal, Stimulus & Tingkat Kognitif</h2>
                        </div>
                    </div>

                    <!-- Mode Stimulus Wacana vs Soal Mandiri -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-11">Pola Stimulus Konteks:</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                            <label :class="stimulus_mode === 'standalone' ? 'border-emerald-9 bg-emerald-2/30 text-emerald-11 font-bold' : 'border-gray-6 text-gray-12 hover:bg-gray-2'"
                                   class="flex items-start gap-2.5 p-3 rounded-xl border text-xs cursor-pointer transition-all">
                                <input type="radio" value="standalone" x-model="stimulus_mode" class="mt-0.5 text-emerald-9 focus:ring-0">
                                <div>
                                    <span class="block">🔘 Soal Mandiri</span>
                                    <span class="text-[10px] text-gray-10 font-normal">Setiap butir soal berdiri sendiri tanpa teks wacana panjang bersama.</span>
                                </div>
                            </label>

                            <label :class="stimulus_mode === 'stimulus_group' ? 'border-emerald-9 bg-emerald-2/30 text-emerald-11 font-bold' : 'border-gray-6 text-gray-12 hover:bg-gray-2'"
                                   class="flex items-start gap-2.5 p-3 rounded-xl border text-xs cursor-pointer transition-all">
                                <input type="radio" value="stimulus_group" x-model="stimulus_mode" class="mt-0.5 text-emerald-9 focus:ring-0">
                                <div>
                                    <span class="block">📑 Wacana Berseri (Standar AKM)</span>
                                    <span class="text-[10px] text-gray-10 font-normal">1 Wacana/studi kasus menaungi serangkaian anak soal di bawahnya.</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Pengaturan Tambahan jika Mode Stimulus Berseri dipilih -->
                    <div x-show="stimulus_mode === 'stimulus_group'" class="p-3.5 bg-gray-2 rounded-xl border border-gray-5 space-y-3" style="display: none;">
                        <label class="block text-xs font-bold text-gray-11">Sumber Teks Wacana:</label>
                        <div class="grid grid-cols-2 gap-2">
                            <label :class="stimulus_source === 'ai_generate' ? 'border-emerald-9 bg-white text-emerald-11 font-bold shadow-2xs' : 'border-gray-6 text-gray-12'"
                                   class="flex items-center gap-2 p-2 rounded-lg border text-xs cursor-pointer">
                                <input type="radio" value="ai_generate" x-model="stimulus_source" class="text-emerald-9 focus:ring-0">
                                <span>🤖 AI Auto-Generate</span>
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

                    <!-- TIPE SOAL (Visual Chip Selector) -->
                    <div class="space-y-2">
                        <label class="block text-xs font-bold text-gray-11">Bentuk / Tipe Soal:</label>
                        <div class="flex flex-wrap gap-1.5">
                            <button type="button" @click="question_type = 'mcq_single'" :disabled="category === 'skd' && subtest === 'TKP'"
                                    :class="question_type === 'mcq_single' ? 'bg-blue-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer disabled:opacity-40">
                                🔘 PG Tunggal
                            </button>
                            <button type="button" @click="question_type = 'mcq_weighted'"
                                    :class="question_type === 'mcq_weighted' ? 'bg-emerald-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer">
                                🎯 TKP (Bobot 1-5)
                            </button>
                            <button type="button" @click="question_type = 'mcq_multiple'" :disabled="category === 'skd' && subtest === 'TKP'"
                                    :class="question_type === 'mcq_multiple' ? 'bg-purple-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer disabled:opacity-40">
                                ☑️ PG Kompleks
                            </button>
                            <button type="button" @click="question_type = 'binary_matrix'" :disabled="category === 'skd' && subtest === 'TKP'"
                                    :class="question_type === 'binary_matrix' ? 'bg-amber-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer disabled:opacity-40">
                                ⚖️ Benar/Salah
                            </button>
                            <button type="button" @click="question_type = 'matching'" :disabled="category === 'skd' && subtest === 'TKP'"
                                    :class="question_type === 'matching' ? 'bg-teal-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer disabled:opacity-40">
                                🔗 Menjodohkan
                            </button>
                            <button type="button" @click="question_type = 'ordering'" :disabled="category === 'skd' && subtest === 'TKP'"
                                    :class="question_type === 'ordering' ? 'bg-cyan-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer disabled:opacity-40">
                                🔢 Mengurutkan
                            </button>
                            <button type="button" @click="question_type = 'short_answer'" :disabled="category === 'skd' && subtest === 'TKP'"
                                    :class="question_type === 'short_answer' ? 'bg-pink-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer disabled:opacity-40">
                                ✍️ Isian Singkat
                            </button>
                            <button type="button" @click="question_type = 'essay'" :disabled="category === 'skd' && subtest === 'TKP'"
                                    :class="question_type === 'essay' ? 'bg-rose-9 text-white font-bold' : 'bg-gray-3 hover:bg-gray-4 text-gray-12'"
                                    class="px-3 py-1.5 rounded-lg text-xs transition-colors cursor-pointer disabled:opacity-40">
                                📝 Esai / Uraian
                            </button>
                        </div>
                    </div>

                    <!-- Jumlah Soal, Kesulitan, & Kognitif (3 Kolom) -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-1">
                        <div>
                            <label class="block text-xs font-bold text-gray-11 mb-1">Jumlah Butir Soal:</label>
                            <select x-model.number="question_count"
                                    class="w-full px-3 py-2 bg-gray-2 border border-gray-6 rounded-xl text-xs font-bold text-gray-12 focus:bg-white focus:border-emerald-9 transition-all">
                                <option :value="1">1 Butir Soal</option>
                                <option :value="3">3 Butir Soal</option>
                                <option :value="5">5 Butir Soal (Standar)</option>
                                <option :value="10">10 Butir Soal</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-11 mb-1">Tingkat Kesulitan:</label>
                            <select x-model="difficulty"
                                    class="w-full px-3 py-2 bg-gray-2 border border-gray-6 rounded-xl text-xs font-semibold text-gray-12 focus:bg-white focus:border-emerald-9 transition-all">
                                <option value="mudah">Mudah (Dasar)</option>
                                <option value="sedang">Sedang (Standar Ujian)</option>
                                <option value="sukar">Sukar (Tantangan Tinggi)</option>
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

                                        <!-- WACANA STIMULUS (JIKA ADA) -->
                                        <template x-if="resultPackage.stimulus">
                                            <div class="p-4 rounded-xl bg-blue-1/40 border border-blue-5/60 space-y-2">
                                                <h4 class="font-bold text-xs text-blue-12 uppercase tracking-wide flex items-center gap-1.5">
                                                    <span>📖</span>
                                                    <span x-text="resultPackage.stimulus.title || 'Wacana Stimulus'"></span>
                                                </h4>
                                                <p class="text-xs text-gray-12 whitespace-pre-wrap leading-relaxed" x-text="resultPackage.stimulus.content"></p>
                                            </div>
                                        </template>

                                        <!-- DAFTAR BUTIR SOAL KERTAS (KUNCI DISEMBUNYIKAN DI NASKAH SISWA) -->
                                        <div class="space-y-5 pt-2">
                                            <template x-for="(item, idx) in resultPackage.items" :key="idx">
                                                <div class="space-y-2 pb-3 border-b border-gray-4 last:border-b-0">
                                                    <div class="flex items-start gap-2">
                                                        <span class="font-bold text-xs" x-text="item.number + '.'"></span>
                                                        <div class="flex-1 text-xs text-gray-12 font-medium whitespace-pre-wrap leading-relaxed" x-text="item.prompt"></div>
                                                    </div>

                                                    <!-- Pilihan Opsi untuk Cetak Kertas -->
                                                    <div class="pl-5 space-y-1.5">
                                                        <template x-for="opt in item.options" :key="opt.label">
                                                            <div class="flex items-start gap-2 text-xs text-gray-12">
                                                                <span class="font-bold w-4" x-text="opt.label + '.'"></span>
                                                                <span class="flex-1" x-text="opt.option_text"></span>
                                                            </div>
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

                        <!-- Tombol Simpan ke Bank Soal -->
                        <button type="button" @click="saveToQuestionBank()" :disabled="isSaving"
                                class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-emerald-9 hover:bg-emerald-10 text-white text-xs font-bold transition-all shadow-xs cursor-pointer disabled:opacity-75">
                            <x-radix-icon name="archive" class="w-4 h-4" />
                            <span x-text="isSaving ? 'Menyimpan...' : 'Simpan ke Bank Soal'"></span>
                        </button>
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
                question_type: 'mcq_single',
                question_count: 5,

                stimulus_mode: 'standalone',
                stimulus_source: 'ai_generate',
                custom_stimulus_text: '',

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
                showSavedModal: false,
                savedMessage: '',
                savedBankId: null,

                init() {
                    this.onFilterChange();
                },

                setCategory(cat) {
                    this.category = cat;
                    if (cat === 'skd') {
                        this.subtest = 'TIU';
                    } else if (cat === 'utbk') {
                        this.utbk_group = 'tps';
                        this.subtest = 'PU';
                    }
                    this.onFilterChange();
                },

                onFilterChange() {
                    if (this.category === 'school') {
                        const curData = this.syllabus[this.curriculum] || {};
                        const gradeData = curData[this.grade_level] || {};
                        const subData = gradeData[this.subject] || {};
                        this.availableChapters = subData.chapters || [];
                        this.selectedChapters = this.availableChapters.slice(0, 2).map(c => c.title);
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
                    if (this.subtest === 'TKP') {
                        this.question_type = 'mcq_weighted';
                    } else if (this.question_type === 'mcq_weighted') {
                        this.question_type = 'mcq_single';
                    }
                },

                async generateQuestions() {
                    this.generating = true;
                    this.generatingText = 'Menghubungi DeepSeek Engine (' + (this.ai_model === 'deepseek-reasoner' ? 'Deep Reasoning R1' : 'V3 Chat') + ')...';

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
                        stimulus_mode: this.stimulus_mode,
                        stimulus_source: this.stimulus_source,
                        custom_stimulus_text: this.custom_stimulus_text,
                        question_type: this.question_type,
                        question_count: this.question_count,
                        custom_prompt: this.custom_prompt,
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
                }
            }));
        });
    </script>
</x-layouts.app>
