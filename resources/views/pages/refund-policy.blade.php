<x-layouts.public :title="$title" metaDescription="Kebijakan Pengembalian Dana (Refund Policy) resmi platform ujian dan asesmen ADZKIA CBT. Prosedur, kriteria, dan tata cara klaim pengembalian dana.">
    <!-- HERO HEADER -->
    <section class="bg-gradient-to-b from-slate-900/10 via-slate-900/5 to-transparent pt-12 pb-8 border-b border-slate-200/60">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <nav class="flex items-center gap-2 text-xs text-slate-500 mb-3" aria-label="Breadcrumb">
                <a href="{{ url('/') }}" class="hover:text-emerald-700 transition-colors">Beranda</a>
                <span class="text-slate-300">/</span>
                <span class="text-emerald-800 font-semibold">Kebijakan Pengembalian Dana</span>
            </nav>
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-900 mb-2">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Ketentuan Transaksi Digital Transparan
                    </span>
                    <h1 class="font-display font-black text-2xl sm:text-4xl text-slate-900 tracking-tight">
                        Kebijakan Pengembalian Dana (Refund Policy)
                    </h1>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1.5">
                        Pembaruan Terakhir: {{ date('d F Y') }} &bull; Berlaku untuk seluruh transaksi paket asesmen di ADZKIA CBT
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTENT WRAPPER -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            
            <!-- Quick Summary Notice -->
            <div class="p-5 rounded-2xl bg-sky-50/80 border border-sky-200/80 flex items-start gap-3.5 mb-10 text-xs sm:text-sm text-slate-700">
                <div class="w-8 h-8 rounded-xl bg-sky-100 text-sky-900 flex items-center justify-center shrink-0 mt-0.5 font-bold">
                    i
                </div>
                <div>
                    <strong class="text-slate-900 block mb-0.5">Ringkasan Prinsip Refund:</strong>
                    Paket asesmen dan tryout CBT merupakan <strong>produk digital dengan aktivasi seketika</strong>. Pada dasarnya, transaksi yang telah berhasil bersifat tidak dapat dibatalkan atau dikembalikan (*non-refundable*), kecuali dalam kondisi khusus kegagalan sistem atau pendebetan ganda sebagaimana diuraikan di bawah ini.
                </div>
            </div>

            <!-- Detailed Articles -->
            <div class="space-y-10 text-slate-600 text-sm leading-relaxed">
                
                <!-- Pasal 1 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-sky-100 text-sky-800 text-xs font-black flex items-center justify-center">1</span>
                        <span>Sifat Produk Digital &amp; Aktivasi Instan</span>
                    </h2>
                    <p>
                        Ketika Anda menyelesaikan transaksi pembelian asesmen di ADZKIA CBT melalui kanal pembayaran yang tersedia (Virtual Account, QRIS, atau Dompet Digital TriPay/Midtrans/Duitku), server kami secara otomatis dan instan:
                    </p>
                    <ul class="list-disc list-inside space-y-1.5 pl-2">
                        <li>Mengalokasikan token akses dan kuota pengerjaan ke dalam akun Anda.</li>
                        <li>Membuka hak akses terhadap Bank Soal Asli terstandarisasi.</li>
                        <li>Mengaktifkan engine pemantauan ujian dan sistem pembahasan AI.</li>
                    </ul>
                    <p>
                        Oleh karena hak akses digital telah diserahterimakan seketika setelah pembayaran terkonfirmasi, pembatalan sepihak setelah pembelian tidak dapat difasilitasi.
                    </p>
                </div>

                <!-- Pasal 2 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-black flex items-center justify-center">2</span>
                        <span>Kondisi yang Berhak Mendapatkan Pengembalian Dana</span>
                    </h2>
                    <p>
                        Pengguna berhak mengajukan permohonan pengembalian dana 100% apabila memenuhi salah satu kondisi berikut:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                        <div class="p-4 rounded-2xl bg-white border border-emerald-200/90 shadow-2xs">
                            <span class="font-bold text-slate-900 block text-xs sm:text-sm mb-1 text-emerald-800">1. Terdebet Ganda (Double Charge)</span>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Pengguna tertagih dua kali atau lebih untuk pesanan asesmen yang sama akibat keterlambatan respon gateway atau gangguan sistem perbankan.
                            </p>
                        </div>
                        <div class="p-4 rounded-2xl bg-white border border-emerald-200/90 shadow-2xs">
                            <span class="font-bold text-slate-900 block text-xs sm:text-sm mb-1 text-emerald-800">2. Kegagalan Sistem Internal</span>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Terjadi kendala teknis dari server ADZKIA CBT yang mengakibatkan kuota asesmen tidak terbit sama sekali lebih dari 1x24 jam sejak pembayaran diverifikasi.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pasal 3 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-red-100 text-red-800 text-xs font-black flex items-center justify-center">3</span>
                        <span>Kondisi yang TIDAK Berhak Mendapatkan Pengembalian Dana</span>
                    </h2>
                    <p>
                        Permohonan pengembalian dana akan <strong>ditolak</strong> apabila disebabkan oleh kondisi-kondisi berikut:
                    </p>
                    <ul class="space-y-2 pl-2">
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-red-500 mt-0.5">&times;</span>
                            <div><strong>Kelalaian Pembeli:</strong> Salah memilih paket tryout, salah memilih jenjang kelas, atau berubah pikiran setelah transaksi berhasil.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-red-500 mt-0.5">&times;</span>
                            <div><strong>Gangguan dari Sisi Pengguna:</strong> Koneksi internet tidak stabil, kuota internet habis saat ujian, perangkat ponsel/laptop rusak, atau pemadaman listrik di lokasi peserta.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-red-500 mt-0.5">&times;</span>
                            <div><strong>Pelanggaran Tata Tertib &amp; Kecurangan:</strong> Akun yang didiskualifikasi, dibatalkan nilainya, atau diblokir akibat rekaman kecurangan proctoring (membuka tab lain, bot, bocoran soal).</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-red-500 mt-0.5">&times;</span>
                            <div><strong>Kadaluarsa Kuota Ujian:</strong> Kuota asesmen yang tidak dikerjakan hingga melewati masa aktif 35 hari sejak pembelian.</div>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="font-bold text-red-500 mt-0.5">&times;</span>
                            <div><strong>Melewati Batas Waktu Klaim:</strong> Permohonan diajukan lebih dari 3 x 24 jam setelah waktu transaksi tercatat.</div>
                        </li>
                    </ul>
                </div>

                <!-- Pasal 4 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-sky-100 text-sky-800 text-xs font-black flex items-center justify-center">4</span>
                        <span>Tata Cara &amp; Prosedur Pengajuan Refund</span>
                    </h2>
                    <p>
                        Jika transaksi Anda memenuhi kriteria pengembalian dana, ikuti tahapan berikut:
                    </p>
                    <ol class="list-decimal list-inside space-y-2 pl-2">
                        <li>
                            Hubungi Tim Layanan Pelanggan kami melalui email di <a href="mailto:adzkia.tryout@gmail.com" class="text-emerald-700 font-bold hover:underline">adzkia.tryout@gmail.com</a> atau WhatsApp di <a href="https://wa.me/6281329983555" class="text-emerald-700 font-bold hover:underline">081329983555</a>.
                        </li>
                        <li>
                            Sertakan informasi wajib berikut:
                            <ul class="list-disc list-inside pl-5 mt-1 text-xs text-slate-500 space-y-1">
                                <li>Email akun ADZKIA CBT yang terdaftar</li>
                                <li>Nomor Invoice / Kode Referensi Transaksi (TriPay / Midtrans / Duitku)</li>
                                <li>Bukti mutasi rekening atau struk pembayaran perbankan/e-wallet</li>
                                <li>Alasan permohonan secara jelas</li>
                                <li>Nomor rekening bank tujuan pengembalian beserta nama pemilik rekening (wajib sama dengan nama akun pembeli)</li>
                            </ul>
                        </li>
                    </ol>
                </div>

                <!-- Pasal 5 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-sky-100 text-sky-800 text-xs font-black flex items-center justify-center">5</span>
                        <span>Jadwal &amp; Waktu Pemrosesan Pengembalian</span>
                    </h2>
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs space-y-2 text-slate-700">
                        <p><strong>1. Verifikasi Data:</strong> Tim Finance kami akan memverifikasi log sistem payment gateway dalam waktu maksimal <strong>1 - 2 hari kerja</strong>.</p>
                        <p><strong>2. Pencairan Dana:</strong> Setelah permohonan disetujui, dana akan ditransfer kembali ke rekening pemohon dalam jangka waktu <strong>1 - 3 hari kerja bank</strong>.</p>
                        <p><strong>3. Biaya Administrasi Perbankan:</strong> Pengembalian dana akibat kegagalan sistem internal tidak dikenakan potongan apapun. Untuk kasus overpaid atau human error di luar kegagalan sistem, potongan biaya transfer antarbank (jika ada) berlaku sesuai tarif reguler perbankan.</p>
                    </div>
                </div>

                <!-- Pasal 6 -->
                <div class="space-y-3">
                    <h2 class="text-base sm:text-lg font-bold text-slate-900 flex items-center gap-2.5">
                        <span class="w-7 h-7 rounded-lg bg-sky-100 text-sky-800 text-xs font-black flex items-center justify-center">6</span>
                        <span>Informasi Kontak Pengajuan Refund</span>
                    </h2>
                    <p>
                        Segala korespondensi dan permohonan klaim resmi dilayani melalui saluran:
                    </p>
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 text-xs space-y-2 text-slate-700 shadow-2xs">
                        <p><strong>Email Tim Dukungan:</strong> <a href="mailto:adzkia.tryout@gmail.com" class="text-emerald-700 font-bold hover:underline">adzkia.tryout@gmail.com</a></p>
                        <p><strong>WhatsApp Support:</strong> <a href="https://wa.me/6281329983555" class="text-emerald-700 font-bold hover:underline">081329983555</a></p>
                        <p><strong>Alamat Usaha:</strong> Jalan Sriwijaya RUSUN BPKP KALTENG NO 314 RT 005 RW 014, Panarung, Pahandut, Kota Palangka Raya, Kalimantan Tengah. 73111</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
</x-layouts.public>
