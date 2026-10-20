<x-layouts.app>
    <x-slot:title>Kupon Diskon - Khusus Enterprise - {{ $tenant->name }}</x-slot:title>

    <div class="max-w-5xl mx-auto space-y-8 pb-16 pt-4">
        <!-- Top Breadcrumb / Status Pill -->
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full border"
                      style="background-color: #e7f5ff; border-color: #a5d8ff; color: #1864ab;">
                    Fitur Eksklusif Enterprise
                </span>
                <span class="text-xs font-semibold px-3 py-1 rounded-full border"
                      @if($tenant->isStarter())
                          style="background-color: #fff4e6; border-color: #ffd8a8; color: #d9480f;"
                      @elseif($tenant->isPro())
                          style="background-color: #ebfbee; border-color: #b2f2bb; color: #2b8a3e;"
                      @else
                          style="background-color: #e7f5ff; border-color: #a5d8ff; color: #1864ab;"
                      @endif>
                    Level Saat Ini: {{ $tenant->level_label }}
                </span>
            </div>
            <a href="{{ route('dashboard') }}"
               class="text-xs font-semibold text-slate-500 hover:text-slate-800 transition-colors flex items-center gap-1.5">
                <x-radix-icon name="arrow-left" class="w-3.5 h-3.5" />
                <span>Kembali ke Dashboard</span>
            </a>
        </div>

        <!-- Hero Card (Open Color Blue Theme) -->
        <div class="relative overflow-hidden rounded-3xl p-8 sm:p-10 text-white shadow-xl border"
             style="background: linear-gradient(135deg, #1864ab 0%, #1971c2 50%, #1c7ed6 100%); border-color: #1971c2;">
            <div class="relative z-10 max-w-2xl space-y-4">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center border shadow-xs"
                     style="background-color: rgba(255, 255, 255, 0.15); border-color: rgba(255, 255, 255, 0.3);">
                    <!-- Crown / Enterprise Icon -->
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white font-display">
                    Mengapa Kupon Diskon Hanya untuk Level Enterprise?
                </h1>
                <p class="text-xs sm:text-sm leading-relaxed" style="color: #d0ebff;">
                    Fitur kupon diskon mandiri dirancang khusus untuk institusi mitra <strong class="text-white">Level ENTERPRISE</strong>. Dengan porsi bagi hasil terbesar (<strong class="text-white">75% untuk Institusi</strong> : <strong class="text-white">25% untuk ADZKIA</strong>), institusi Anda memiliki ruang margin finansial yang sehat untuk menyerap diskon murid secara mandiri tanpa mengorbankan stabilitas operasional server CBT.
                </p>
                <div class="pt-3 flex flex-wrap gap-3">
                    <a href="mailto:adzkia.tryout@gmail.com?subject=Konsultasi%20Upgrade%20Kemitraan%20Enterprise%20-%20{{ urlencode($tenant->name) }}&body=Halo%20Tim%20ADZKIA%20CBT%2C%20kami%20dari%20{{ urlencode($tenant->name) }}%20tertarik%20untuk%20berkonsultasi%20mengenai%20upgrade%20kemitraan%20ke%20Level%20ENTERPRISE%20(Bagi%20hasil%2075%25%20dan%20fitur%20kupon%20diskon%20murid)."
                       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl text-xs sm:text-sm font-bold shadow-md transition-all duration-200 hover:-translate-y-0.5 active:scale-[0.98]"
                       style="background-color: #ffffff; color: #1864ab;">
                        <x-radix-icon name="envelope-closed" class="w-4 h-4" />
                        <span>Konsultasi Upgrade ke Enterprise</span>
                    </a>
                </div>
            </div>
            <!-- Decorative circle blur -->
            <div class="absolute -right-16 -bottom-16 w-80 h-80 rounded-full opacity-25 pointer-events-none"
                 style="background: radial-gradient(circle, #74c0fc 0%, transparent 70%);"></div>
        </div>

        <!-- 3 Level Tenant Grid (ORANGE, GREEN, BLUE) -->
        <div>
            <div class="text-center max-w-2xl mx-auto mb-8">
                <span class="text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full border"
                      style="background-color: #f8f9fa; border-color: #dee2e6; color: #495057;">
                    Struktur Kemitraan ADZKIA CBT
                </span>
                <h2 class="text-2xl font-extrabold text-slate-900 mt-2 font-display">
                    Pilihan Level Kemitraan Sekolah & BIMBEL
                </h2>
                <p class="text-xs sm:text-sm text-slate-500 mt-1">
                    Setiap level dirancang adil dan transparan dengan bagi hasil otomatis ke dompet saldo tenant.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- 1. STARTER: ORANGE (#fd7e14) -->
                <div class="rounded-3xl border p-6 flex flex-col justify-between transition-all duration-200 hover:shadow-md"
                     style="background-color: #fff4e6; border-color: #ffd8a8;">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded-lg border"
                                  style="background-color: #ffe8cc; border-color: #ffa94d; color: #d9480f;">
                                Level 1
                            </span>
                            @if($tenant->isStarter())
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full"
                                      style="background-color: #d9480f; color: #ffffff;">
                                    Aktif Saat Ini
                                </span>
                            @endif
                        </div>

                        <!-- Icon Starter: Rocket / Growth Sprout -->
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center border shadow-xs"
                             style="background-color: #ffffff; border-color: #ffd8a8; color: #e8590c;">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-xl font-extrabold" style="color: #d9480f;">STARTER</h3>
                            <p class="text-xs text-slate-600 mt-0.5">Pengawasan ujian mandiri & bank soal kurasi ADZKIA.</p>
                        </div>

                        <!-- Bagi Hasil Badge -->
                        <div class="p-3 rounded-xl border bg-white space-y-1" style="border-color: #ffd8a8;">
                            <div class="text-[10px] uppercase font-bold text-slate-400">Skema Bagi Hasil:</div>
                            <div class="flex items-center justify-between text-xs font-bold">
                                <span style="color: #e8590c;">Tenant: 25%</span>
                                <span class="text-slate-500">ADZKIA: 75%</span>
                            </div>
                        </div>

                        <ul class="text-xs space-y-2 text-slate-700 pt-1">
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #e8590c;">✓</span>
                                <span>Akses Bank Soal Kurasi ADZKIA (TKA, UTBK, SKD)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #e8590c;">✓</span>
                                <span>Sistem CBT Anti-Curang & Auto-Lock</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #e8590c;">✓</span>
                                <span>Dompet Saldo & Pencairan Dana</span>
                            </li>
                            <li class="flex items-start gap-2 text-slate-400">
                                <span>✕</span>
                                <span>Tidak dapat menerbitkan kupon diskon</span>
                            </li>
                            <li class="flex items-start gap-2 text-slate-400">
                                <span>✕</span>
                                <span>Belum mendukung Studio AI DeepSeek</span>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-6 border-t mt-6" style="border-color: #ffd8a8;">
                        <span class="text-[11px] font-semibold text-slate-500">Biaya: Gratis / Bebas Biaya</span>
                    </div>
                </div>

                <!-- 2. PRO: GREEN (#40c057) -->
                <div class="rounded-3xl border p-6 flex flex-col justify-between transition-all duration-200 hover:shadow-md"
                     style="background-color: #ebfbee; border-color: #b2f2bb;">
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded-lg border"
                                  style="background-color: #d3f9d8; border-color: #8ce99a; color: #2b8a3e;">
                                Level 2
                            </span>
                            @if($tenant->isPro())
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full"
                                      style="background-color: #2b8a3e; color: #ffffff;">
                                    Aktif Saat Ini
                                </span>
                            @endif
                        </div>

                        <!-- Icon Pro: Trophy / Achievement Star -->
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center border shadow-xs"
                             style="background-color: #ffffff; border-color: #b2f2bb; color: #2f9e44;">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-xl font-extrabold" style="color: #2b8a3e;">PRO</h3>
                            <p class="text-xs text-slate-600 mt-0.5">Bagi hasil seimbang 50:50 dengan custom branding.</p>
                        </div>

                        <!-- Bagi Hasil Badge -->
                        <div class="p-3 rounded-xl border bg-white space-y-1" style="border-color: #b2f2bb;">
                            <div class="text-[10px] uppercase font-bold text-slate-400">Skema Bagi Hasil:</div>
                            <div class="flex items-center justify-between text-xs font-bold">
                                <span style="color: #2f9e44;">Tenant: 50%</span>
                                <span class="text-slate-500">ADZKIA: 50%</span>
                            </div>
                        </div>

                        <ul class="text-xs space-y-2 text-slate-700 pt-1">
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #2f9e44;">✓</span>
                                <span>Seluruh keunggulan level Starter</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #2f9e44;">✓</span>
                                <span>Bagi hasil seimbang 50:50 (margin 2x Starter)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #2f9e44;">✓</span>
                                <span>Custom Logo, Tagline, & Warna Identitas</span>
                            </li>
                            <li class="flex items-start gap-2 text-slate-400">
                                <span>✕</span>
                                <span>Tidak dapat menerbitkan kupon diskon</span>
                            </li>
                            <li class="flex items-start gap-2 text-slate-400">
                                <span>✕</span>
                                <span>Belum mendukung Studio AI DeepSeek</span>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-6 border-t mt-6" style="border-color: #b2f2bb;">
                        <span class="text-[11px] font-semibold text-slate-500">Rekomendasi: Bimbel & Sekolah Menengah</span>
                    </div>
                </div>

                <!-- 3. ENTERPRISE: BLUE (#228be6) -->
                <div class="rounded-3xl border-2 p-6 flex flex-col justify-between relative shadow-lg"
                     style="background-color: #e7f5ff; border-color: #339af0;">
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider px-2.5 py-1 rounded-lg border"
                                  style="background-color: #d0ebff; border-color: #74c0fc; color: #1864ab;">
                                Level 3 • Tertinggi
                            </span>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full"
                                  style="background-color: #1971c2; color: #ffffff;">
                                Rekomendasi
                            </span>
                        </div>

                        <!-- Icon Enterprise: Crown / Shield Diamond -->
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center border shadow-sm text-white"
                             style="background: linear-gradient(135deg, #1864ab, #228be6); border-color: #339af0;">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-xl font-black" style="color: #1864ab;">ENTERPRISE</h3>
                            <p class="text-xs text-slate-600 mt-0.5">Otoritas asesmen mandiri, Studio AI, & diskon murid.</p>
                        </div>

                        <!-- Bagi Hasil Badge -->
                        <div class="p-3 rounded-xl border bg-white space-y-1" style="border-color: #74c0fc;">
                            <div class="text-[10px] uppercase font-bold text-slate-400">Skema Bagi Hasil Tertinggi:</div>
                            <div class="flex items-center justify-between text-xs font-bold">
                                <span class="text-base" style="color: #1864ab;">Tenant: 75%</span>
                                <span class="text-slate-500">ADZKIA: 25%</span>
                            </div>
                        </div>

                        <ul class="text-xs space-y-2 text-slate-800 pt-1 font-medium">
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #1971c2;">✓</span>
                                <span><strong>Bebas Terbitkan Kupon Diskon</strong> (diserap mandiri s/d 75%)</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #1971c2;">✓</span>
                                <span><strong>Studio Pembuat Soal AI (DeepSeek)</strong></span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #1971c2;">✓</span>
                                <span><strong>Pembuatan Soal & Asesmen Mandiri</strong></span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #1971c2;">✓</span>
                                <span>ON/OFF Katalog Asesmen ADZKIA</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="font-bold" style="color: #1971c2;">✓</span>
                                <span>Penyimpanan Media Galeri R2 Cloudflare</span>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-6 border-t mt-6" style="border-color: #a5d8ff;">
                        <a href="mailto:adzkia.tryout@gmail.com?subject=Konsultasi%20Upgrade%20Enterprise%20-%20{{ urlencode($tenant->name) }}"
                           class="w-full py-2.5 rounded-xl font-bold text-xs flex items-center justify-center gap-1.5 transition-all text-white shadow-xs hover:shadow"
                           style="background-color: #1c7ed6;">
                            <span>Hubungi Kami untuk Upgrade</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>
