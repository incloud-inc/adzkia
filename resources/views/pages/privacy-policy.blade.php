<x-layouts.public :title="$title" metaDescription="Kebijakan Privasi resmi platform ujian dan asesmen ADZKIA CBT sesuai Undang-Undang Perlindungan Data Pribadi (UU PDP No. 27/2022).">
    <!-- HERO HEADER -->
    <section class="bg-gradient-to-b from-slate-900/10 via-slate-900/5 to-transparent pt-12 pb-8 border-b border-slate-200/60">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-3" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-emerald-700 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-800 font-semibold">Kebijakan Privasi</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 mb-2">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        Kepatuhan UU PDP No. 27/2022
                    </span>
                    <h1 class="font-display font-black text-2xl sm:text-4xl text-slate-900 tracking-tight">
                        Kebijakan Privasi (Privacy Policy)
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1.5">
                        Pembaruan Terakhir: {{ date('d F Y') }} &bull; Komitmen perlindungan data pribadi seluruh pengguna ADZKIA CBT
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT WRAPPER -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            
            <div class="p-5 rounded-2xl bg-emerald-50/80 border border-emerald-200/80 flex items-start gap-3.5 mb-10 text-xs sm:text-sm text-slate-700">
                <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                    ✓
                </div>
                <div>
                    <strong class="text-slate-900 block mb-0.5">Komitmen Perlindungan Privasi:</strong>
                    ADZKIA CBT tunduk penuh pada <strong>Undang-Undang No. 27 Tahun 2022 tentang Perlindungan Data Pribadi (UU PDP)</strong> Republik Indonesia. Kami menjamin keamanan seluruh data pribadi peserta didik, tenaga pendidik, dan pimpinan institusi pendidikan.
                </div>
            </div>

            <!-- Detailed Articles -->
            <div class="space-y-10 text-slate-600 text-sm leading-relaxed">
                
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">1</span>
                        <span>Pendahuluan &amp; Ruang Lingkup</span>
                    </h2>
                    <p>
                        Kebijakan Privasi ini menerangkan bagaimana platform ADZKIA CBT mengumpulkan, menyimpan, menggunakan, mengolah, dan melindungi informasi pribadi yang Anda berikan ketika menggunakan layanan kami melalui <code class="px-1.5 py-0.5 rounded bg-slate-100 text-emerald-800 font-mono text-xs">https://adzkia.id</code> maupun seluruh subdomain resmi mitra tenant.
                    </p>
                </div>

                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">2</span>
                        <span>Data Pribadi yang Kami Kumpulkan</span>
                    </h2>
                    <ul class="list-disc list-inside space-y-2 pl-2">
                        <li><strong>Identitas Pengguna:</strong> Nama lengkap, alamat surel (email), nomor telepon / WhatsApp aktif, jenjang sekolah, dan asal sekolah.</li>
                        <li><strong>Kredensial Keamanan:</strong> Kata sandi terenkripsi (one-way bcrypt) atau token identitas dari penyedia resmi Google OAuth 2.0.</li>
                        <li><strong>Aktivitas Asesmen:</strong> Pilihan jawaban ujian, riwayat skor, catatan durasi per butir soal, dan interaksi dengan generator pembahasan AI.</li>
                        <li><strong>Integritas Ujian (Proctoring):</strong> Log anomali perpindahan tab peramban dan status layar penuh guna memverifikasi kejujuran ujian. Kami tidak merekam webcam atau mikrofon tanpa izin eksplisit.</li>
                        <li><strong>Data Transaksi:</strong> Nomor pesanan, jumlah tagihan, dan kode referensi dari payment gateway resmi (TriPay). Kami <strong>tidak pernah menyimpan nomor kartu kredit atau PIN perbankan</strong> pengguna.</li>
                    </ul>
                </div>

                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">3</span>
                        <span>Tujuan Penggunaan Data Pribadi</span>
                    </h2>
                    <ol class="list-decimal list-inside space-y-1.5 pl-2">
                        <li>Memproses otentikasi akun dan akses peserta ke dalam ruang ujian CBT.</li>
                        <li>Mengkalkulasi skor asesmen, merilis rekapitulasi nilai, dan analisis butir soal bagi pengajar.</li>
                        <li>Menyajikan bimbingan dan pembahasan AI yang relevan dengan kelemahan konsep peserta.</li>
                        <li>Mencegah upaya kecurangan dan menjaga keadilan ujian massal.</li>
                        <li>Mengirimkan notifikasi penting terkait aktivasi kuota ujian dan status transaksi pembayaran.</li>
                    </ol>
                </div>

                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">4</span>
                        <span>Larangan Penjualan Data &amp; Berbagi Pihak Ketiga</span>
                    </h2>
                    <p>
                        <strong>ADZKIA CBT berkomitmen penuh untuk TIDAK PERNAH memperjualbelikan, menyewakan, atau menyebarkan data pribadi pengguna kepada pihak ketiga untuk kepentingan iklan komersial.</strong> Data hanya diteruskan secara terbatas kepada penyedia infrastruktur pembayaran berizin Bank Indonesia dan institusi pendidikan yang menaungi peserta.
                    </p>
                </div>

                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">5</span>
                        <span>Hak Pengguna &amp; Kontak Petugas Perlindungan Data</span>
                    </h2>
                    <p>
                        Sesuai ketentuan UU PDP, setiap pemilik data berhak meminta klarifikasi, pembaruan, maupun penghapusan data akun miliknya. Anda dapat mengajukan permohonan melalui kontak resmi:
                    </p>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs space-y-2 text-slate-700">
                        <p><strong>Email Petugas Privasi:</strong> <a href="mailto:adzkia.tryout@gmail.com" class="text-emerald-700 font-bold hover:underline">adzkia.tryout@gmail.com</a></p>
                        <p><strong>Telepon / WhatsApp:</strong> <a href="https://wa.me/6281329983555" class="text-emerald-700 font-bold hover:underline">081329983555</a></p>
                        <p><strong>Alamat Usaha:</strong> Jalan Sriwijaya RUSUN BPKP KALTENG NO 314 RT 005 RW 014, Panarung, Pahandut, Kota Palangka Raya, Kalimantan Tengah. 73111</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layouts.public>

