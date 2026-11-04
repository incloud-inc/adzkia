<x-layouts.public :title="$title" metaDescription="Syarat dan Ketentuan resmi penggunaan platform ujian dan asesmen ADZKIA CBT untuk siswa, guru, sekolah, dan bimbingan belajar di seluruh Indonesia.">
    <!-- HERO HEADER -->
    <section class="bg-gradient-to-b from-slate-900/10 via-slate-900/5 to-transparent pt-12 pb-8 border-b border-slate-200/60">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-3" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-emerald-700 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-800 font-semibold">Syarat &amp; Ketentuan</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-900 mb-2">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Perjanjian Penggunaan Layanan Resmi
                    </span>
                    <h1 class="font-display font-black text-2xl sm:text-4xl text-slate-900 tracking-tight">
                        Syarat &amp; Ketentuan (Terms &amp; Conditions)
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1.5">
                        Pembaruan Terakhir: {{ date('d F Y') }} &bull; Berlaku untuk seluruh pengguna platform ADZKIA CBT
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT WRAPPER -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            
            <!-- Quick Summary Notice -->
            <div class="p-5 rounded-2xl bg-amber-50/80 border border-amber-200/80 flex items-start gap-3.5 mb-10 text-xs sm:text-sm text-slate-700">
                <div class="w-8 h-8 rounded-xl bg-amber-100 text-amber-900 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                    !
                </div>
                <div>
                    <strong class="text-slate-900 block mb-0.5">Penting untuk Diketahui:</strong>
                    Dengan mendaftar, mengakses, atau membeli paket asesmen di platform ADZKIA CBT (termasuk seluruh subdomain resmi mitra), Anda secara sadar dan sukarela mengikatkan diri serta menyetujui seluruh syarat dan ketentuan berikut.
                </div>
            </div>

            <!-- Detailed Articles -->
            <div class="space-y-10 text-slate-600 text-sm leading-relaxed">
                
                <!-- Pasal 1 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">1</span>
                        <span>Ketentuan Umum &amp; Definisi Layanan</span>
                    </h2>
                    <p>
                        Platform <strong>ADZKIA CBT</strong> adalah sistem evaluasi pendidikan terpadu berbasis komputasi awan (*Cloud Computer-Based Test*) yang diselenggarakan melalui domain utama <code class="px-1.5 py-0.5 rounded bg-slate-100 text-emerald-800 font-mono text-xs">https://adzkia.id</code> dan portal mitra multi-tenant terkait.
                    </p>
                    <p>
                        Dalam Syarat &amp; Ketentuan ini, istilah-istilah berikut memiliki arti:
                    </p>
                    <ul class="list-disc list-inside space-y-1.5 pl-2">
                        <li><strong>Platform:</strong> Layanan website, engine ujian, aplikasi pendukung, dan database ADZKIA CBT.</li>
                        <li><strong>Pengguna:</strong> Setiap individu atau pihak yang mengakses platform, baik sebagai Peserta Ujian (Siswa), Pendidik (Guru/Tutor), Pengawas, maupun Institusi (Sekolah/BIMBEL).</li>
                        <li><strong>Tenant:</strong> Lembaga pendidikan, sekolah, atau bimbingan belajar yang memiliki portal ujian mandiri (*white-label*) di dalam sistem ADZKIA CBT.</li>
                        <li><strong>Asesmen / TryOut:</strong> Naskah soal ujian terstandarisasi, kunci jawaban, dan pembahasan berbasis kecerdasan buatan (*AI*) yang diterbitkan di dalam platform.</li>
                    </ul>
                </div>

                <!-- Pasal 2 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">2</span>
                        <span>Akun Pengguna, Keamanan &amp; Verifikasi</span>
                    </h2>
                    <ul class="space-y-2 pl-2">
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 mt-0.5">&bull;</span>
                            <div><strong>Kebenaran Data:</strong> Pengguna wajib memberikan data yang jujur, akurat, dan mutakhir saat proses pendaftaran (nama lengkap, jenjang sekolah, nomor telepon aktif, dan email valid). Penggunaan identitas palsu atau bot dilarang keras.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 mt-0.5">&bull;</span>
                            <div><strong>Kerahasiaan Akun:</strong> Akun peserta ujian bersifat perorangan dan tidak dapat dialihkan atau dipinjamkan kepada orang lain. Pengguna bertanggung jawab penuh atas segala kegiatan yang terjadi di bawah kredensial akun miliknya.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 mt-0.5">&bull;</span>
                            <div><strong>Penyalahgunaan Akun:</strong> Manajemen ADZKIA CBT berhak membekukan atau memblokir akun secara permanen tanpa kompensasi apabila ditemukan indikasi penyalahgunaan kredensial, upaya peretasan, atau kecurangan terstruktur.</div>
                        </li>
                    </ul>
                </div>

                <!-- Pasal 3 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">3</span>
                        <span>Integritas Akademik &amp; Tata Tertib Ujian CBT (Anti-Curang)</span>
                    </h2>
                    <p>
                        ADZKIA CBT menjunjung tinggi nilai kejujuran akademik. Setiap sesi ujian dilengkapi dengan modul pengawasan mandiri (*automated proctoring*) dan penguncian perangkat (*single device lock*).
                    </p>
                    <ol class="list-decimal list-inside space-y-1.5 pl-2">
                        <li>Peserta wajib mengerjakan ujian secara mandiri tanpa bantuan pihak ketiga, catatan tidak sah, atau alat bantu ilegal lainnya.</li>
                        <li>Sistem merekam anomali pengerjaan, seperti perpindahan tab browser (*tab switch*), upaya keluar dari mode layar penuh (*fullscreen exit*), atau penggunaan ekstensi browser yang mencurigakan.</li>
                        <li>Peserta dilarang keras merekam, memotret, melakukan tangkapan layar (*screenshot*), atau mendistribusikan butir soal ujian ke media sosial atau forum publik.</li>
                        <li>Pihak sekolah/lembaga pengawas berhak membatalkan hasil asesmen peserta yang terbukti memiliki log kecurangan sesuai rekaman sistem.</li>
                    </ol>
                </div>

                <!-- Pasal 4 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">4</span>
                        <span>Pembelian Asesmen, Pembayaran &amp; Biaya Layanan</span>
                    </h2>
                    <p>
                        Pembelian akses asesmen dapat dilakukan secara mandiri oleh peserta maupun secara kolektif oleh institusi.
                    </p>
                    <ul class="space-y-2 pl-2">
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 mt-0.5">&bull;</span>
                            <div><strong>Payment Gateway Resmi:</strong> Transaksi pembayaran diproses secara aman melalui mitra payment gateway terlisensi Bank Indonesia (termasuk iPaymu dan TriPay).</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 mt-0.5">&bull;</span>
                            <div><strong>Metode Pembayaran:</strong> Pengguna dapat memilih pembayaran via Virtual Account (BCA, BNI, BRI, Mandiri, BSI, Muamalat), QRIS (GoPay, OVO, Dana, LinkAja, BCA), maupun Dompet Digital (OVO, DANA, ShopeePay).</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 mt-0.5">&bull;</span>
                            <div><strong>Biaya Layanan Payment Gateway:</strong> Biaya transaksi perbankan atau gateway dicantumkan secara transparan sebelum pembayaran dilakukan dan menjadi tanggung jawab pengguna sesuai metode yang dipilih.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-emerald-600 mt-0.5">&bull;</span>
                            <div><strong>Masa Aktif Kuota Ujian:</strong> Setelah pembayaran terkonfirmasi berhasil, kuota asesmen akan aktif dan dapat digunakan dalam jangka waktu yang ditentukan (standar paket mandiri berlaku aktif 35 hari sejak pembelian).</div>
                        </li>
                    </ul>
                </div>

                <!-- Pasal 5 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">5</span>
                        <span>Kebijakan Pengembalian Dana (Refund)</span>
                    </h2>
                    <p>
                        Mengingat produk yang dibeli merupakan produk digital dengan aktivasi instan ke bank soal dan mesin evaluasi, maka seluruh transaksi yang telah berhasil bersifat <strong>final dan tidak dapat dibatalkan atau dikembalikan (*non-refundable*)</strong>, kecuali dalam kondisi force-failure sistem yang diatur secara rinci pada halaman <a href="{{ route('pages.refund-policy') }}" class="text-emerald-700 font-bold hover:underline">Kebijakan Pengembalian Dana (Refund Policy)</a>.
                    </p>
                </div>

                <!-- Pasal 6 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">6</span>
                        <span>Hak Kekayaan Intelektual (HAKI)</span>
                    </h2>
                    <p>
                        Seluruh naskah soal asli, algoritma penilaian, modul pembahasan AI, desain visual, logo, dan kode sumber ADZKIA CBT dilindungi oleh Undang-Undang Hak Cipta Republik Indonesia.
                    </p>
                    <p>
                        Dilarang memperbanyak, menggandakan, mencetak untuk tujuan komersial, mengkompilasi ulang, atau memperjualbelikan materi naskah soal ADZKIA CBT tanpa izin tertulis dari pemilik hak cipta. Pelanggaran hak kekayaan intelektual akan diproses secara hukum pidana maupun perdata.
                    </p>
                </div>

                <!-- Pasal 7 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">7</span>
                        <span>Batasan Tanggung Jawab &amp; Ketersediaan Layanan</span>
                    </h2>
                    <p>
                        Kami berkomitmen menjaga reliabilitas server setinggi mungkin dengan auto-scaling cloud. Namun, ADZKIA CBT tidak bertanggung jawab atas kerugian atau ketidakmampuan menyelesaikan ujian yang diakibatkan oleh:
                    </p>
                    <ul class="list-disc list-inside space-y-1 pl-2">
                        <li>Gangguan jaringan internet, kuota seluler habis, atau ketidakstabilan koneksi pengguna.</li>
                        <li>Kerusakan hardware, baterai habis, atau malware pada perangkat milik peserta.</li>
                        <li>Kejadian kahar (*force majeure*) di luar kendali wajar seperti pemadaman listrik massal, bencana alam, atau putusnya kabel fiber optik operator telekomunikasi utama.</li>
                    </ul>
                </div>

                <!-- Pasal 8 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">8</span>
                        <span>Hukum yang Berlaku &amp; Domisili Penyelesaian Sengketa</span>
                    </h2>
                    <p>
                        Syarat dan Ketentuan ini diatur dan ditafsirkan berdasarkan hukum Negara Kesatuan Republik Indonesia. Segala perselisihan yang timbul akan diselesaikan terlebih dahulu secara musyawarah mufakat. Apabila tidak tercapai mufakat, para pihak sepakat menyelesaikannya melalui Pengadilan Negeri yang berwenang di wilayah hukum Kota Palangka Raya, Kalimantan Tengah.
                    </p>
                </div>

                <!-- Pasal 9 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">9</span>
                        <span>Informasi Kontak &amp; Penanggung Jawab Layanan</span>
                    </h2>
                    <p>
                        Jika Anda memiliki pertanyaan terkait syarat dan ketentuan ini, silakan menghubungi kami:
                    </p>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs space-y-2 text-slate-700">
                        <p><strong>Pengelola Resmi:</strong> ADZKIA CBT (Educational Assessment Engine)</p>
                        <p><strong>Alamat Usaha:</strong> Jalan Sriwijaya RUSUN BPKP KALTENG NO 314 RT 005 RW 014, Panarung, Pahandut, Kota Palangka Raya, Kalimantan Tengah. 73111</p>
                        <p><strong>Telepon / WhatsApp:</strong> <a href="https://wa.me/6281329983555" class="text-emerald-700 font-bold hover:underline">081329983555</a></p>
                        <p><strong>Surat Elektronik (Email):</strong> <a href="mailto:adzkia.tryout@gmail.com" class="text-emerald-700 font-bold hover:underline">adzkia.tryout@gmail.com</a></p>
                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layouts.public>

