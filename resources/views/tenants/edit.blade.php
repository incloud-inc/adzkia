<x-layouts.app>
    @php
        $isSuper = auth()->user()->isSuperUser();
        $backUrl = $isSuper ? route('tenants.index') : route('dashboard');
    @endphp

    <div class="max-w-3xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-200">
                        🏛️ PENGATURAN INSTITUSI
                    </span>
                    <span class="text-xs text-gray-10 font-mono">ID: #{{ $tenant->id }}</span>
                </div>
                <h1 class="font-display font-bold text-2xl text-gray-12 tracking-tight">Edit Informasi & Pengaturan Tenant</h1>
                <p class="text-sm text-gray-11 mt-1">Kelola identitas dasar institusi dan aktifkan kartu asesmen jenjang sekolah.</p>
            </div>

            <a href="{{ $backUrl }}" 
               class="px-3.5 py-2 rounded-xl border border-gray-7 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors cursor-pointer">
                ← Kembali
            </a>
        </div>

        <!-- Form Card -->
        <form method="POST" action="{{ route('tenants.update', $tenant) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- SECTION 1: IDENTITAS DASAR INSTITUSI -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-5">
                <div class="border-b border-gray-5 pb-3">
                    <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                        <x-radix-icon name="backpack" class="w-5 h-5 text-indigo-600" />
                        <span>Identitas Dasar Sekolah / Institusi</span>
                    </h2>
                    <p class="text-xs text-gray-11 mt-0.5">Nama resmi dan alamat sistem lembaga yang terdaftar di ekosistem ADZKIA.</p>
                </div>

                <!-- Nama Institusi -->
                <div class="space-y-1.5">
                    <label for="name" class="block text-sm font-semibold text-gray-12">Nama Institusi / Sekolah <span class="text-red-9">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $tenant->name) }}" required 
                           class="w-full rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-sm text-gray-12 placeholder:text-gray-8 transition-colors focus:border-indigo-6 focus:ring-1 focus:ring-indigo-6 outline-none @error('name') border-red-8 @enderror">
                    @error('name')
                        <p class="text-xs font-medium text-red-11">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subdomain -->
                <div class="space-y-1.5">
                    <label for="subdomain" class="block text-sm font-semibold text-gray-12">Subdomain Sistem</label>
                    @if($isSuper)
                        <div class="flex rounded-xl border border-gray-7 overflow-hidden focus-within:border-indigo-6 focus-within:ring-1 focus-within:ring-indigo-6 @error('subdomain') border-red-8 @enderror">
                            <input type="text" id="subdomain" name="subdomain" value="{{ old('subdomain', $tenant->subdomain) }}" required 
                                   class="flex-1 bg-white px-4 py-2.5 text-sm text-gray-12 placeholder:text-gray-8 outline-none lowercase font-mono">
                            <span class="bg-gray-3 border-l border-gray-6 px-4 py-2.5 text-xs text-gray-11 font-mono flex items-center shrink-0">
                                .adzkia.id
                            </span>
                        </div>
                    @else
                        <div class="flex rounded-xl border border-gray-6 bg-gray-2/50 overflow-hidden">
                            <input type="text" value="{{ $tenant->subdomain }}" disabled 
                                   class="flex-1 px-4 py-2.5 text-sm text-gray-11 font-mono bg-transparent cursor-not-allowed">
                            <span class="bg-gray-3 border-l border-gray-6 px-4 py-2.5 text-xs text-gray-11 font-mono flex items-center shrink-0">
                                .adzkia.id
                            </span>
                        </div>
                        <p class="text-[11px] text-gray-10 italic">Subdomain sistem hanya dapat diubah oleh Owner / Super User ADZKIA.</p>
                    @endif
                    @error('subdomain')
                        <p class="text-xs font-medium text-red-11">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Paket / Plan -->
                <div class="space-y-1.5">
                    <label for="plan" class="block text-sm font-semibold text-gray-12">Tingkat Layanan Paket <span class="text-red-9">*</span></label>
                    @if($isSuper)
                        <select id="plan" name="plan" required
                                class="w-full rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-sm text-gray-12 transition-colors focus:border-indigo-6 focus:ring-1 focus:ring-indigo-6 outline-none cursor-pointer @error('plan') border-red-8 @enderror">
                            <option value="gratis" {{ old('plan', $tenant->plan) === 'gratis' ? 'selected' : '' }}>🌱 STARTER (Gratis, Subdomain & Pengawasan Ujian ADZKIA)</option>
                            <option value="premium" {{ old('plan', $tenant->plan) === 'premium' ? 'selected' : '' }}>⚡ PRO (Custom Domain & Bank Soal Mandiri)</option>
                            <option value="whitelabel" {{ old('plan', $tenant->plan) === 'whitelabel' ? 'selected' : '' }}>👑 ENTERPRISE (Full White Label & Multi-Domain)</option>
                        </select>
                    @else
                        <input type="hidden" name="plan" value="{{ $tenant->plan ?? 'gratis' }}">
                        <div class="flex items-center justify-between p-3.5 rounded-xl border border-gray-6 bg-gray-2/40">
                            <div>
                                <span class="text-xs font-bold text-gray-12 uppercase tracking-wide">
                                    {{ $tenant->level_label }}
                                </span>
                                <span class="text-[11px] text-gray-10 block mt-0.5">
                                    Bagi Hasil: {{ $tenant->revenue_share_ratio }} (ADZKIA : TENANT)
                                </span>
                            </div>
                            <span class="text-[11px] font-bold px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-200">
                                Tingkat Aktif
                            </span>
                        </div>
                    @endif
                    @error('plan')
                        <p class="text-xs font-medium text-red-11">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- SECTION 2: CHECKLIST CARD JENJANG PENDIDIKAN (SD, SMP, SMA) -->
            <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)] space-y-5">
                <div class="border-b border-gray-5 pb-3">
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="font-display font-bold text-base text-gray-12 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-lg bg-amber-100 text-amber-800 flex items-center justify-center text-xs font-bold">🎛️</span>
                            <span>Checklist Kartu Asesmen Jenjang Pendidikan</span>
                        </h2>
                        <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-0.5 rounded-full">
                            Filter Katalog Aktif
                        </span>
                    </div>
                    <p class="text-xs text-gray-11 mt-1">
                        Pilih jenjang sekolah mana saja yang aktif untuk institusi Anda. Kartu asesmen yang dicentang akan ditampilkan pada katalog Bank Soal dan profil publik sekolah.
                    </p>
                </div>

                <input type="hidden" name="grade_settings_submitted" value="1">

                <div class="grid grid-cols-1 gap-3.5">
                    <!-- Item 1: Card Umum (Wajib Aktif) -->
                    <div class="p-4 rounded-xl border border-gray-6 bg-gray-2/30 flex items-center justify-between gap-4">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200 flex items-center justify-center text-lg shrink-0">
                                🌐
                            </div>
                            <div>
                                <div class="font-bold text-xs sm:text-sm text-gray-12 flex items-center gap-2">
                                    <span>Asesmen Umum & Try Out Terbuka</span>
                                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 border border-emerald-300">
                                        WAJIB AKTIF
                                    </span>
                                </div>
                                <div class="text-[11px] text-gray-10 mt-0.5">
                                    Katalog asesmen umum dan try out terstandar nasional ADZKIA (selalu aktif secara sistem).
                                </div>
                            </div>
                        </div>
                        <span class="text-xs font-bold text-emerald-700 shrink-0">
                            ✓ Aktif
                        </span>
                    </div>

                    <!-- Item 2: Card SD / MI -->
                    <label class="p-4 rounded-xl border transition-all cursor-pointer flex items-center justify-between gap-4 group hover:border-indigo-400 {{ $tenant->showGrade('sd') ? 'bg-indigo-50/40 border-indigo-300' : 'bg-white border-gray-6' }}">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-700 border border-blue-200 flex items-center justify-center text-lg shrink-0">
                                🎒
                            </div>
                            <div>
                                <div class="font-bold text-xs sm:text-sm text-gray-12 flex items-center gap-2">
                                    <span>Jenjang SD / MI</span>
                                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-blue-50 text-blue-700 border border-blue-200">
                                        Kelas 1 - 6
                                    </span>
                                </div>
                                <div class="text-[11px] text-gray-10 mt-0.5">
                                    Tampilkan modul dan paket soal tingkat Sekolah Dasar / Madrasah Ibtidaiyah.
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5 shrink-0">
                            <input type="checkbox" name="show_grade_sd" value="1" {{ $tenant->showGrade('sd') ? 'checked' : '' }}
                                   class="w-5 h-5 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                            <span class="text-xs font-bold {{ $tenant->showGrade('sd') ? 'text-indigo-700' : 'text-gray-10' }}">
                                {{ $tenant->showGrade('sd') ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    </label>

                    <!-- Item 3: Card SMP / MTs -->
                    <label class="p-4 rounded-xl border transition-all cursor-pointer flex items-center justify-between gap-4 group hover:border-indigo-400 {{ $tenant->showGrade('smp') ? 'bg-indigo-50/40 border-indigo-300' : 'bg-white border-gray-6' }}">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-700 border border-amber-200 flex items-center justify-center text-lg shrink-0">
                                📚
                            </div>
                            <div>
                                <div class="font-bold text-xs sm:text-sm text-gray-12 flex items-center gap-2">
                                    <span>Jenjang SMP / MTs</span>
                                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-amber-50 text-amber-700 border border-amber-200">
                                        Kelas 7 - 9
                                    </span>
                                </div>
                                <div class="text-[11px] text-gray-10 mt-0.5">
                                    Tampilkan modul dan paket soal tingkat Sekolah Menengah Pertama / Madrasah Tsanawiyah.
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5 shrink-0">
                            <input type="checkbox" name="show_grade_smp" value="1" {{ $tenant->showGrade('smp') ? 'checked' : '' }}
                                   class="w-5 h-5 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                            <span class="text-xs font-bold {{ $tenant->showGrade('smp') ? 'text-indigo-700' : 'text-gray-10' }}">
                                {{ $tenant->showGrade('smp') ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    </label>

                    <!-- Item 4: Card SMA / MA / SMK -->
                    <label class="p-4 rounded-xl border transition-all cursor-pointer flex items-center justify-between gap-4 group hover:border-indigo-400 {{ $tenant->showGrade('sma') ? 'bg-indigo-50/40 border-indigo-300' : 'bg-white border-gray-6' }}">
                        <div class="flex items-center gap-3.5">
                            <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-700 border border-purple-200 flex items-center justify-center text-lg shrink-0">
                                🎓
                            </div>
                            <div>
                                <div class="font-bold text-xs sm:text-sm text-gray-12 flex items-center gap-2">
                                    <span>Jenjang SMA / MA / SMK</span>
                                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-md bg-purple-50 text-purple-700 border border-purple-200">
                                        Kelas 10 - 12 & UTBK
                                    </span>
                                </div>
                                <div class="text-[11px] text-gray-10 mt-0.5">
                                    Tampilkan modul dan paket soal tingkat Sekolah Menengah Atas, Kejuruan, dan UTBK SNBT.
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2.5 shrink-0">
                            <input type="checkbox" name="show_grade_sma" value="1" {{ $tenant->showGrade('sma') ? 'checked' : '' }}
                                   class="w-5 h-5 rounded text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                            <span class="text-xs font-bold {{ $tenant->showGrade('sma') ? 'text-indigo-700' : 'text-gray-10' }}">
                                {{ $tenant->showGrade('sma') ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="{{ $backUrl }}" 
                   class="px-5 py-2.5 rounded-xl border border-gray-7 bg-white hover:bg-gray-3 text-xs sm:text-sm font-semibold text-gray-12 transition-colors cursor-pointer">
                    Batal
                </a>

                <button type="submit" 
                        class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white text-xs sm:text-sm font-bold transition-all shadow-sm cursor-pointer flex items-center gap-2">
                    <x-radix-icon name="check" class="w-4 h-4" />
                    <span>Simpan Perubahan Tenant</span>
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>
