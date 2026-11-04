<x-layouts.public :title="$title" metaDescription="Hubungi tim resmi ADZKIA CBT untuk layanan pelanggan, verifikasi transaksi pembayaran, bantuan teknis ujian CBT, dan kemitraan sekolah atau BIMBEL.">
    <!-- HERO HEADER -->
    <section class="bg-gradient-to-b from-emerald-900/15 via-emerald-800/5 to-transparent pt-12 pb-8 border-b border-slate-200/60">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-3" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-emerald-700 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-800 font-semibold">Kontak Kami</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 mb-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-600 animate-pulse"></span>
                        Layanan Pelanggan &amp; Kemitraan Resmi
                    </span>
                    <h1 class="font-display font-black text-2xl sm:text-4xl text-slate-900 tracking-tight">
                        Hubungi Kami
                    </h1>
                    <p class="text-sm sm:text-base text-slate-600 mt-2 max-w-2xl leading-relaxed">
                        Kami siap membantu Anda terkait kendala teknis ujian CBT, verifikasi pembelian asesmen, konsultasi kemitraan sekolah dan BIMBEL, serta pertanyaan umum lainnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT DETAILS & CHANNELS -->
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            
            <!-- 3 Main Contact Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                
                <!-- Email Card -->
                <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h2 class="font-display font-bold text-lg text-slate-900 mb-1">Surat Elektronik (Email)</h2>
                        <p class="text-xs text-slate-500 mb-4 leading-relaxed">
                            Kirimkan pertanyaan resmi, permohonan kemitraan, verifikasi transaksi, atau keluhan layanan.
                        </p>
                        <p class="text-sm font-bold text-slate-800 break-all bg-slate-50 p-3 rounded-xl border border-slate-200">
                            adzkia.tryout@gmail.com
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <a href="mailto:adzkia.tryout@gmail.com" 
                           class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition-all shadow-xs">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            <span>Kirim Email Langsung</span>
                        </a>
                    </div>
                </div>

                <!-- Phone / WhatsApp Card -->
                <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h2 class="font-display font-bold text-lg text-slate-900 mb-1">Telepon &amp; WhatsApp</h2>
                        <p class="text-xs text-slate-500 mb-4 leading-relaxed">
                            Layanan respon cepat melalui chat WhatsApp resmi untuk bantuan siswa dan operator sekolah.
                        </p>
                        <p class="text-sm font-bold text-emerald-800 bg-emerald-50/80 p-3 rounded-xl border border-emerald-200/80">
                            081329983555
                        </p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <a href="https://wa.me/6281329983555?text=Halo%20Admin%20ADZKIA%20CBT,%20saya%20ingin%20berkonsultasi%20terkait..." 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="inline-flex items-center justify-center gap-2 w-full py-2.5 px-4 rounded-xl bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold transition-all shadow-xs shadow-emerald-700/20">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766 0-3.18-2.587-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.698.077-2.072-.492-1.758-.727-2.884-2.518-2.973-2.637-.088-.118-.718-.956-.718-1.824 0-.868.455-1.295.617-1.472.161-.177.352-.222.469-.222.118 0 .235.001.338.006.109.005.255-.041.399.305.148.356.505 1.23.55 1.32.044.09.073.195.015.312-.059.118-.088.192-.176.295-.088.104-.186.232-.266.312-.088.089-.18.185-.077.362.103.177.458.756.983 1.224.675.602 1.244.788 1.421.876.177.089.28.074.383-.045.103-.118.441-.515.559-.691.118-.177.235-.148.397-.089.162.059 1.029.485 1.206.574.177.088.294.133.338.206.044.074.044.428-.1 1.033z"/>
                            </svg>
                            <span>Chat WhatsApp Kami</span>
                        </a>
                    </div>
                </div>

                <!-- Office Address Card -->
                <div class="p-6 rounded-3xl bg-white border border-slate-200/90 shadow-sm hover:shadow-md transition-all flex flex-col justify-between">
                    <div>
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-800 flex items-center justify-center mb-4">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h2 class="font-display font-bold text-lg text-slate-900 mb-1">Alamat Usaha &amp; Operasional</h2>
                        <p class="text-xs text-slate-500 mb-4 leading-relaxed">
                            Lokasi pusat operasional manajemen dan pengembangan platform ADZKIA CBT.
                        </p>
                        <div class="text-xs leading-relaxed text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-200">
                            <strong>Jalan Sriwijaya RUSUN BPKP KALTENG NO 314 RT 005 RW 014, Panarung, Pahandut, Kota Palangka Raya, Kalimantan Tengah. 73111</strong>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <div class="inline-flex items-center gap-1.5 text-xs text-slate-500 font-medium">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            <span>Provinsi Kalimantan Tengah, Indonesia</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Operating Hours & Service Commitments -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 bg-white rounded-3xl border border-slate-200/90 p-6 sm:p-10 shadow-sm mb-12">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-800 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-md inline-block mb-3">
                        Jadwal Pelayanan
                    </span>
                    <h3 class="font-display font-bold text-xl text-slate-900 mb-4">
                        Jam Kerja Operasional &amp; Monitoring
                    </h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-6">
                        Tim Customer Care dan Tim Teknis kami siap melayani seluruh pertanyaan dan bantuan operasional pada jadwal berikut:
                    </p>
                    <div class="space-y-3 text-xs sm:text-sm text-slate-700">
                        <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                            <span class="font-semibold text-slate-800">Senin - Jumat</span>
                            <span class="font-bold text-emerald-800">08.00 - 17.00 WIB</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                            <span class="font-semibold text-slate-800">Sabtu</span>
                            <span class="font-bold text-emerald-800">08.30 - 15.00 WIB</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 border border-slate-200/80">
                            <span class="font-semibold text-slate-800">Minggu &amp; Hari Libur Nasional</span>
                            <span class="text-slate-500 italic">Dukungan Darurat (Khusus Ujian Berjadwal)</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-xl bg-emerald-50/70 border border-emerald-200/80">
                            <span class="font-semibold text-emerald-950">Infrastruktur Server Cloud CBT</span>
                            <span class="font-bold text-emerald-800">24 Jam / 7 Hari (99.9% Uptime)</span>
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-[11px] font-bold uppercase tracking-wider text-sky-800 bg-sky-50 border border-sky-200 px-2.5 py-1 rounded-md inline-block mb-3">
                        Kategori Layanan
                    </span>
                    <h3 class="font-display font-bold text-xl text-slate-900 mb-4">
                        Saluran Bantuan Terpadu
                    </h3>
                    <div class="space-y-4 text-xs sm:text-sm">
                        <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/50">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                Bantuan Siswa &amp; Peserta Ujian
                            </h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Kendala login akun, kode OTP, verifikasi pembayaran via TriPay / Virtual Account / QRIS, dan akses pengerjaan soal.
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/50">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                                Kemitraan Sekolah &amp; Lembaga BIMBEL
                            </h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Pendaftaran portal CBT Multi-Tenant, custom subdomain sekolah, integrasi bank soal mandiri, dan pengadaan lisensi massal.
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl border border-slate-200 bg-slate-50/50">
                            <h4 class="font-bold text-slate-900 mb-1 flex items-center gap-2">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                Keamanan &amp; Integritas Ujian
                            </h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Pelaporan anomali proctoring, kendala lock browser, atau pertanyaan seputar kepatuhan UU PDP No. 27/2022.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- QUICK FAQ TEASER -->
            <div class="p-8 rounded-3xl bg-emerald-950 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
                <div>
                    <h3 class="font-display font-black text-xl sm:text-2xl mb-2">Punya pertanyaan seputar cara pembelian atau ujian?</h3>
                    <p class="text-xs sm:text-sm text-emerald-200/90 max-w-xl">
                        Temukan jawaban instan mengenai metode pembayaran TriPay, masa aktif paket soal, sistem anti-curang, dan pembahasannya di pusat bantuan kami.
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('pages.faq') }}" 
                       class="px-5 py-3 rounded-2xl bg-white text-emerald-950 hover:bg-emerald-50 font-bold text-xs transition-all shadow-md">
                        Buka Halaman FAQ
                    </a>
                    <a href="{{ route('pages.refund-policy') }}" 
                       class="px-5 py-3 rounded-2xl bg-emerald-800 hover:bg-emerald-700 text-white font-bold text-xs transition-all border border-emerald-600/60">
                        Refund Policy
                    </a>
                </div>
            </div>

        </div>
    </section>
</x-layouts.public>

