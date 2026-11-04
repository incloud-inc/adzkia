<x-layouts.public :title="$title" metaDescription="Pertanyaan yang sering diajukan seputar aplikasi ujian ADZKIA CBT, pembelian paket tryout, metode pembayaran TriPay, sistem anti-curang, dan pembahasan AI.">
    <!-- HERO HEADER -->
    <section class="bg-gradient-to-b from-emerald-900/15 via-emerald-800/5 to-transparent pt-12 pb-8 border-b border-slate-200/60">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-3" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-emerald-700 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-800 font-semibold">Tanya Jawab (FAQ)</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 mb-2">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Pusat Bantuan &amp; Informasi
                    </span>
                    <h1 class="font-display font-black text-2xl sm:text-4xl text-slate-900 tracking-tight">
                        Pertanyaan yang Sering Diajukan (FAQ)
                    </h1>
                    <p class="text-sm sm:text-base text-slate-600 mt-2 max-w-2xl leading-relaxed">
                        Temukan jawaban cepat seputar tata cara pengerjaan ujian CBT, aktivasi kuota asesmen, metode pembayaran TriPay, sistem anti-curang, dan pembahasan AI.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT WRAPPER -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 space-y-12">
            
            <!-- Category 1: Akun & Pendaftaran -->
            <div class="space-y-4">
                <div class="flex items-center gap-3 pb-2 border-b border-slate-200">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xs">
                        01
                    </div>
                    <h2 class="font-display font-bold text-lg sm:text-xl text-slate-900">
                        Akun &amp; Pendaftaran
                    </h2>
                </div>

                <div class="space-y-3">
                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Apakah membuat akun di ADZKIA CBT berbayar?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Tidak. Pendaftaran akun murid maupun guru di ADZKIA CBT adalah <strong>100% Gratis</strong>. Anda dapat mendaftar menggunakan email atau langsung login menggunakan satu klik Google SSO resmi.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Apa perbedaan akun Siswa (Murid) dengan akun Guru/Admin?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Akun Siswa dikhususkan untuk membeli kuota asesmen, mengerjakan ujian, membaca modul pembahasan AI, dan melihat riwayat skor serta pemeringkatan. Sedangkan akun Guru/Admin memiliki hak akses untuk mengelola bank soal, membuat jadwal asesmen, memantau pengawas CBT (proctoring log), dan mengunduh rekap nilai.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Bagaimana jika saya lupa kata sandi akun?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Anda dapat menggunakan fitur <em>Lupa Kata Sandi</em> di halaman login untuk menerima tautan pemulihan via email, atau langsung masuk menggunakan Google SSO jika email Google Anda sesuai dengan akun yang terdaftar.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Category 2: Pembelian Asesmen & Pembayaran TriPay -->
            <div class="space-y-4">
                <div class="flex items-center gap-3 pb-2 border-b border-slate-200">
                    <div class="w-8 h-8 rounded-xl bg-sky-100 text-sky-800 flex items-center justify-center font-bold text-xs">
                        02
                    </div>
                    <h2 class="font-display font-bold text-lg sm:text-xl text-slate-900">
                        Pembelian Asesmen &amp; Metode Pembayaran
                    </h2>
                </div>

                <div class="space-y-3">
                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Metode pembayaran apa saja yang didukung oleh ADZKIA CBT?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-3">
                            Kami bekerja sama dengan payment gateway resmi terlisensi Bank Indonesia (TriPay) untuk menyediakan beragam pilihan pembayaran instan:
                        </p>
                        <ul class="list-disc list-inside text-xs sm:text-sm text-slate-600 space-y-1 pl-2">
                            <li><strong>Virtual Account (VA):</strong> BCA, BNI, BRI, Mandiri, BSI (Bank Syariah Indonesia), dan Bank Muamalat.</li>
                            <li><strong>QRIS Instan:</strong> Scan langsung dari GoPay, OVO, DANA, LinkAja, ShopeePay, BCA Mobile, Livin' Mandiri, BRImo, dan seluruh aplikasi m-banking.</li>
                            <li><strong>Dompet Digital (E-Wallet):</strong> OVO, DANA, dan ShopeePay.</li>
                        </ul>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Berapa lama waktu yang dibutuhkan hingga kuota ujian saya aktif?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Sistem kami terhubung secara otomatis via Webhook Callback. Begitu transfer berhasil diverifikasi oleh bank atau gateway, <strong>kuota asesmen akan aktif secara instan dalam 1-3 detik</strong> tanpa perlu konfirmasi manual.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Berapa lama masa aktif kuota asesmen setelah dibeli?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Masa aktif pengerjaan asesmen mandiri adalah <strong>35 hari sejak tanggal transaksi pembayaran berhasil</strong>. Selama kurun waktu tersebut, Anda dapat memulai tes kapan saja sesuai kesiapan belajar Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Category 3: Pengerjaan Ujian CBT & Sistem Anti-Curang -->
            <div class="space-y-4">
                <div class="flex items-center gap-3 pb-2 border-b border-slate-200">
                    <div class="w-8 h-8 rounded-xl bg-purple-100 text-purple-800 flex items-center justify-center font-bold text-xs">
                        03
                    </div>
                    <h2 class="font-display font-bold text-lg sm:text-xl text-slate-900">
                        Pengerjaan Ujian &amp; Sistem Anti-Curang (Proctoring)
                    </h2>
                </div>

                <div class="space-y-3">
                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Apa yang terjadi jika koneksi internet terputus di tengah-tengah ujian?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Jangan khawatir. Engine CBT ADZKIA dilengkapi dengan fitur <em>auto-save</em> lokal dan sinkronisasi server berkala. Setiap jawaban butir soal yang Anda pilih langsung tersimpan. Saat koneksi tersambung kembali, Anda dapat melanjutkan pengerjaan selama batas waktu durasi sesi belum berakhir.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Bagaimana sistem mencegah kecurangan ujian (*proctoring*)?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            ADZKIA CBT mengadopsi <strong>Single Device Lock</strong> dan <strong>Automated Event Tracking</strong>. Sistem memantau dan mencatat perpindahan tab (*tab switch*), upaya keluar dari mode layar penuh (*fullscreen*), serta mendeteksi ekstensi peramban yang tidak lazim untuk dilaporkan kepada pihak pengawas atau sekolah.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Perangkat apa saja yang dapat digunakan untuk ujian?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            ADZKIA CBT dapat diakses dari Laptop, Komputer Desktop (PC), Tablet, maupun Smartphone berbasis Android dan iOS melalui browser modern (Google Chrome, Mozilla Firefox, Safari, Microsoft Edge). Tampilan soal didesain responsif untuk kenyamanan membaca stimulus panjang maupun rumus matematika.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Category 4: Bank Soal Asli & Pembahasan AI -->
            <div class="space-y-4">
                <div class="flex items-center gap-3 pb-2 border-b border-slate-200">
                    <div class="w-8 h-8 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold text-xs">
                        04
                    </div>
                    <h2 class="font-display font-bold text-lg sm:text-xl text-slate-900">
                        Bank Soal Asli &amp; Pembahasan AI
                    </h2>
                </div>

                <div class="space-y-3">
                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Apakah soal yang diujikan benar-benar Soal ASLI?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Ya. Bank soal kami memuat naskah soal asli terstandarisasi UTBK-SNBT (sejak tahun 2019 hingga 2026 dan prediksi 2027), Tes Kemampuan Akademik (TKA), SKD Kedinasan CPNS, serta materi Kurikulum Merdeka Fase A hingga F (SD, SMP, SMA/SMK) yang diverifikasi oleh tim kurikulum berpengalaman.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Bagaimana cara kerja Pembahasan AI Langkah demi Langkah?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Setelah ujian diselesaikan atau saat mode latihan mandiri aktif, mesin penalaran kecerdasan buatan (*AI Explanation Engine*) menyajikan penjelasan terstruktur: mulai dari pemahaman konsep dasar, identifikasi rumus atau kata kunci, eliminasi opsi yang keliru, hingga trik penyelesaian cepat (*smart solution*).
                        </p>
                    </div>
                </div>
            </div>

            <!-- Category 5: Multi-Tenant & Kemitraan Sekolah/BIMBEL -->
            <div class="space-y-4">
                <div class="flex items-center gap-3 pb-2 border-b border-slate-200">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center font-bold text-xs">
                        05
                    </div>
                    <h2 class="font-display font-bold text-lg sm:text-xl text-slate-900">
                        Kemitraan White-Label Sekolah &amp; BIMBEL
                    </h2>
                </div>

                <div class="space-y-3">
                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Apakah sekolah atau BIMBEL saya bisa menggunakan logo dan nama sendiri?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Bisa! ADZKIA CBT mendukung arsitektur multi-tenant dengan portal eksklusif, subdomain kustom (misal: <code class="px-1.5 py-0.5 rounded bg-slate-100 text-emerald-800 font-mono text-xs">sekolah-anda.adzkia.id</code>), logo lembaga, dan tema warna institusi Anda.
                        </p>
                    </div>

                    <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-2xs">
                        <h3 class="font-bold text-slate-900 text-sm sm:text-base mb-2">
                            Bagaimana cara mendaftarkan kemitraan sekolah atau BIMBEL?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                            Pimpinan sekolah atau pemilik bimbingan belajar dapat menghubungi tim kemitraan kami melalui WhatsApp di <a href="https://wa.me/6281329983555" class="text-emerald-700 font-bold hover:underline">081329983555</a> atau melalui halaman <a href="{{ route('pages.contact') }}" class="text-emerald-700 font-bold hover:underline">Kontak Kami</a> untuk konsultasi demo dan penetapan paket institusi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Still have questions banner -->
            <div class="p-8 rounded-3xl bg-slate-900 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
                <div>
                    <h3 class="font-display font-bold text-xl text-white mb-1">Masih memiliki pertanyaan lain?</h3>
                    <p class="text-xs sm:text-sm text-slate-300">
                        Tim Customer Support ADZKIA CBT siap membantu Anda setiap hari kerja.
                    </p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('pages.contact') }}" 
                       class="px-5 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs transition-all shadow-xs">
                        Hubungi Kami
                    </a>
                    <a href="https://wa.me/6281329983555" 
                       target="_blank"
                       class="px-5 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs transition-all border border-slate-700">
                        Chat WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </section>
</x-layouts.public>

