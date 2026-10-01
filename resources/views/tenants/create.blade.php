<x-layouts.app>
    <div class="max-w-3xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="font-display font-bold text-2xl text-gray-12 tracking-tight">Tambah Institusi Baru</h1>
                <p class="text-sm text-gray-11 mt-1">Daftarkan sekolah atau cabang bimbel baru ke dalam ekosistem ADZKIA.</p>
            </div>

            <a href="{{ route('tenants.index') }}" 
               class="px-3.5 py-2 rounded-xl border border-gray-7 bg-white hover:bg-gray-3 text-xs font-semibold text-gray-12 transition-colors cursor-pointer">
                Kembali
            </a>
        </div>

        @if($errors->any())
            <div class="bg-red-2 border border-red-6 text-red-11 rounded-xl p-4 text-xs font-medium space-y-1">
                <div class="font-bold flex items-center gap-1.5 text-red-12">
                    <x-radix-icon name="exclamation-triangle" class="w-4 h-4 text-red-10" />
                    <span>Mohon lengkapi formulir dengan benar:</span>
                </div>
                <ul class="list-disc list-inside space-y-0.5 pl-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-white p-6 sm:p-8 rounded-2xl border border-gray-6 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
            <form method="POST" action="{{ route('tenants.store') }}" class="space-y-6" 
                  x-data="{ 
                      subdomain: '{{ old('subdomain') }}',
                      selectedPlan: '{{ old('plan', 'gratis') }}'
                  }">
                @csrf

                <!-- 1. IDENTITAS DASAR INSTITUSI -->
                <div class="space-y-4">
                    <h2 class="font-display font-bold text-sm text-gray-12 uppercase tracking-wider text-green-11 border-b border-gray-5 pb-2">
                        1. Informasi Identitas Institusi
                    </h2>

                    <!-- Nama Institusi -->
                    <div class="space-y-1.5">
                        <label for="name" class="block text-sm font-semibold text-gray-12">Nama Institusi / Sekolah <span class="text-red-9">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                               placeholder="Contoh: SMAN 1 Bandung atau Bimbel Ruang Cerdas"
                               class="w-full rounded-xl border border-gray-7 bg-white px-4 py-2.5 text-sm sm:text-base text-gray-12 placeholder:text-gray-8 transition-colors focus:border-green-8 focus:ring-1 focus:ring-green-8 outline-none @error('name') border-red-8 @enderror">
                        @error('name')
                            <p class="text-xs font-medium text-red-11">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subdomain -->
                    <div class="space-y-1.5">
                        <label for="subdomain" class="block text-sm font-semibold text-gray-12">Subdomain Sistem <span class="text-red-9">*</span></label>
                        <div class="flex rounded-xl border border-gray-7 overflow-hidden focus-within:border-green-8 focus-within:ring-1 focus-within:ring-green-8 @error('subdomain') border-red-8 @enderror">
                            <input type="text" id="subdomain" name="subdomain" x-model="subdomain" required 
                                   placeholder="sman1bdg"
                                   class="flex-1 bg-white px-4 py-2.5 text-sm sm:text-base text-gray-12 placeholder:text-gray-8 outline-none lowercase font-mono">
                            <span class="bg-gray-3 border-l border-gray-6 px-4 py-2.5 text-xs sm:text-sm text-gray-11 font-mono flex items-center shrink-0">
                                .{{ config('app.url_base_domain', 'localhost') }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-11 font-mono mt-1" x-show="subdomain">
                            URL Portal: http://<span x-text="subdomain.toLowerCase()"></span>.{{ config('app.url_base_domain', 'localhost') }}
                        </p>
                        @error('subdomain')
                            <p class="text-xs font-medium text-red-11">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- 2. PAKET LAYANAN (STARTER, PRO, ENTERPRISE) -->
                <div class="space-y-3 pt-3">
                    <div class="flex items-center justify-between border-b border-gray-5 pb-2">
                        <h2 class="font-display font-bold text-sm text-gray-12 uppercase tracking-wider text-green-11">
                            2. Pilihan Paket Layanan <span class="text-red-9">*</span>
                        </h2>
                        <span class="text-xs text-gray-11">Disesuaikan dengan level skema bagi hasil</span>
                    </div>

                    <input type="hidden" name="plan" :value="selectedPlan">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3.5 pt-1">
                        <!-- Card STARTER -->
                        <div @click="selectedPlan = 'gratis'"
                             :class="selectedPlan === 'gratis' ? 'border-green-8 bg-green-2/40 shadow-xs ring-2 ring-green-8/30' : 'border-gray-6 bg-white hover:border-gray-8 hover:bg-gray-2/30'"
                             class="rounded-2xl border p-4.5 transition-all duration-200 cursor-pointer flex flex-col justify-between relative group">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-extrabold uppercase bg-gray-3 text-gray-12 border border-gray-6">
                                        🌱 STARTER
                                    </span>
                                    <div :class="selectedPlan === 'gratis' ? 'bg-green-9 text-white' : 'border border-gray-6 bg-white text-transparent'"
                                         class="w-5 h-5 rounded-full flex items-center justify-center text-xs transition-colors">
                                        ✓
                                    </div>
                                </div>
                                <div>
                                    <div class="font-display font-bold text-base text-gray-12">Paket Starter</div>
                                    <div class="text-xs font-semibold text-green-11 mt-0.5">Bagi Hasil: 75% ADZKIA : 25% Tenant</div>
                                </div>
                                <p class="text-xs text-gray-11 leading-relaxed">
                                    Akses dasar tanpa biaya langganan awal. Menggunakan subdomain standar <code class="font-mono text-[11px]">.adzkia.id</code> dan koreksi asesmen otomatis.
                                </p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-5/80 text-[11px] font-semibold text-gray-10 flex items-center gap-1.5">
                                <x-radix-icon name="check" class="w-3.5 h-3.5 text-green-9" />
                                <span>Ideal untuk sekolah rintisan</span>
                            </div>
                        </div>

                        <!-- Card PRO -->
                        <div @click="selectedPlan = 'premium'"
                             :class="selectedPlan === 'premium' ? 'border-blue-8 bg-blue-2/40 shadow-xs ring-2 ring-blue-8/30' : 'border-gray-6 bg-white hover:border-gray-8 hover:bg-gray-2/30'"
                             class="rounded-2xl border p-4.5 transition-all duration-200 cursor-pointer flex flex-col justify-between relative group">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-extrabold uppercase bg-blue-3 text-blue-11 border border-blue-6/60">
                                        ⚡ PRO
                                    </span>
                                    <div :class="selectedPlan === 'premium' ? 'bg-blue-9 text-white' : 'border border-gray-6 bg-white text-transparent'"
                                         class="w-5 h-5 rounded-full flex items-center justify-center text-xs transition-colors">
                                        ✓
                                    </div>
                                </div>
                                <div>
                                    <div class="font-display font-bold text-base text-gray-12">Paket Pro</div>
                                    <div class="text-xs font-semibold text-blue-11 mt-0.5">Bagi Hasil: 50% ADZKIA : 50% Tenant</div>
                                </div>
                                <p class="text-xs text-gray-11 leading-relaxed">
                                    Dukungan kustom domain instansi (contoh: <code class="font-mono text-[11px]">ujian.sekolah.sch.id</code>), analitik butir soal mendalam &amp; sistem proctoring.
                                </p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-5/80 text-[11px] font-semibold text-blue-11 flex items-center gap-1.5">
                                <x-radix-icon name="check" class="w-3.5 h-3.5 text-blue-9" />
                                <span>Kustom domain sekolah</span>
                            </div>
                        </div>

                        <!-- Card ENTERPRISE -->
                        <div @click="selectedPlan = 'whitelabel'"
                             :class="selectedPlan === 'whitelabel' ? 'border-purple-8 bg-purple-2/40 shadow-xs ring-2 ring-purple-8/30' : 'border-gray-6 bg-white hover:border-gray-8 hover:bg-gray-2/30'"
                             class="rounded-2xl border p-4.5 transition-all duration-200 cursor-pointer flex flex-col justify-between relative group">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-extrabold uppercase bg-purple-3 text-purple-11 border border-purple-6/60">
                                        👑 ENTERPRISE
                                    </span>
                                    <div :class="selectedPlan === 'whitelabel' ? 'bg-purple-9 text-white' : 'border border-gray-6 bg-white text-transparent'"
                                         class="w-5 h-5 rounded-full flex items-center justify-center text-xs transition-colors">
                                        ✓
                                    </div>
                                </div>
                                <div>
                                    <div class="font-display font-bold text-base text-gray-12">Paket Enterprise</div>
                                    <div class="text-xs font-semibold text-purple-11 mt-0.5">Bagi Hasil: 25% ADZKIA : 75% Tenant</div>
                                </div>
                                <p class="text-xs text-gray-11 leading-relaxed">
                                    Solusi White Label eksklusif tanpa atribut ADZKIA, prioritas bandwidth performa tinggi, dan siswa tanpa batasan kuota.
                                </p>
                            </div>
                            <div class="mt-4 pt-3 border-t border-gray-5/80 text-[11px] font-semibold text-purple-11 flex items-center gap-1.5">
                                <x-radix-icon name="check" class="w-3.5 h-3.5 text-purple-9" />
                                <span>Bagi hasil maksimal &amp; White Label</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-6">
                    <a href="{{ route('tenants.index') }}" 
                       class="px-5 py-2.5 rounded-xl border border-gray-7 bg-white hover:bg-gray-3 text-sm font-semibold text-gray-12 transition-colors cursor-pointer">
                        Batal
                    </a>

                    <button type="submit" 
                            class="px-6 py-2.5 rounded-xl bg-green-9 hover:bg-green-10 active:bg-green-11 text-white text-sm font-bold transition-all shadow-[0_1px_2px_rgba(0,0,0,0.06)] active:scale-[0.98] cursor-pointer flex items-center gap-2">
                        <x-radix-icon name="check" class="w-4 h-4" />
                        <span>Simpan Institusi</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
