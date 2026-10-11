<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6Bab8Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 8 Bahasa Indonesia Kelas 6 (Paket 1 - Teks Prosedur & Keamanan Siber)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 8 bagian 1: Menyusun teks prosedur keamanan akun, mengenali kalimat imperatif, dan menjaga privasi data digital.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Petunjuk Menjaga Keamanan Akun dan Data Pribadi di Internet', 'content' => '[Keterangan Gambar: Infografis langkah-langkah keamanan siber bagi pelajar sekolah: 1. Membuat kata sandi (*password*) kuat kombinasi huruf kapital, angka, dan simbol, 2. Mengaktifkan autentikasi dua faktor (2FA), 3. Tidak membagikan data pribadi (NIK, alamat rumah, nomor telepon) kepada orang tak dikenal, 4. Selalu keluar (*log out*) dari komputer umum perpustakaan.]

Dunia maya menawarkan samudera informasi yang tak terbatas, namun di balik kemudahannya tersimpan ancaman siber seperti pencurian data (*phishing*), peretasan akun, dan penipuan daring. Sebagai pelajar cerdas berkarakter, kita wajib menerapkan prosedur keamanan digital berikut:

Pertama, buatlah kata sandi yang kuat dan unik dengan panjang minimal delapan karakter yang memadukan huruf besar, huruf kecil, angka, dan lambang khusus. Kedua, jangan pernah mengklik tautan (*link*) mencurigakan dari nomor asing yang menjanjikan hadiah gratis secara tiba-tiba. Ketiga, lindungi privasi dengan tidak mengunggah foto kartu identitas, kartu keluarga, atau tiket perjalanan ke media sosial. Keempat, selalu lakukan proses keluar (*log out*) setelah menggunakan komputer bersama di laboratorium sekolah. Dengan berlayar secara waspada dan disiplin, kita dapat memanfaatkan teknologi digital secara aman dan bermanfaat.'],
                            ['title' => 'Stimulus 2: Menelaah Struktur dan Ciri Kebahasaan Teks Prosedur', 'content' => '[Keterangan Gambar: Bagan struktur teks prosedur: 1. Tujuan (pengantar hasil yang ingin dicapai), 2. Bahan/Alat (jika ada), 3. Langkah-langkah (urutan tahapan sistematis dan logis), 4. Penutup/Simpulan.]

Teks prosedur adalah teks yang memaparkan langkah-langkah atau tahapan terperinci untuk membuat, melakukan, atau mengoperasikan sesuatu secara benar dan berurutan. Ciri kebahasaan teks prosedur ditandai oleh penggunaan kalimat perintah (imperatif) seperti *buatlah*, *kliklah*, *jangan bagikan*, penggunaan kata keterangan urutan (pertama, kedua, selanjutnya), serta petunjuk yang jelas dan tidak menimbulkan tafsiran ganda.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, ciri kata sandi (*password*) yang kuat dan aman menurut prosedur keamanan adalah ....',
                                'explanation' => 'Dalam teks: "minimal delapan karakter yang memadukan huruf besar, huruf kecil, angka, dan lambang khusus."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Minimal delapan karakter dengan kombinasi huruf besar, huruf kecil, angka, dan simbol khusus', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menggunakan tanggal lahir sendiri agar mudah diingat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Cukup empat angka berurutan seperti 1234', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menggunakan nama panggilan pendek tanpa angka', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tindakan pencegahan yang harus dilakukan saat menerima pesan tautan (*link*) mencurigakan dari nomor asing adalah ....',
                                'explanation' => 'Jangan mengklik tautan asing mencurigakan (mencegah phishing).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengabaikan dan tidak mengklik tautan tersebut serta memblokir nomor pengirim', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Langsung mengklik tautan untuk segera mengklaim hadiah uang tunai', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meneruskan pesan tersebut ke seluruh grup percakapan sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengisi seluruh data nomor induk kependudukan di tautan tersebut', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA data pribadi rahasia yang TIDAK boleh diunggah sembarangan ke media sosial!',
                                'explanation' => 'NIK, kartu keluarga, dan alamat rumah adalah data pribadi rahasia.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nomor Induk Kependudukan (NIK) dan alamat rumah lengkap', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Foto kartu keluarga dan kartu identitas siswa', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Foto pemandangan gunung saat karya wisata', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Foto karya lukisan buatan sendiri di sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah keamanan digital di kolom kiri dengan definisinya di kolom kanan!',
                                'explanation' => 'Pasangan istilah keamanan siber dasar.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Phishing', 'is_correct' => false, 'match_key' => 'Pancingan tautan palsu untuk mencuri data kata sandi pengguna', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Autentikasi Dua Faktor (2FA)', 'is_correct' => false, 'match_key' => 'Lapisan keamanan ganda menggunakan kode verifikasi ponsel', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata Sandi (Password)', 'is_correct' => false, 'match_key' => 'Kunci rahasia huruf dan angka untuk mengakses akun pribadi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jejak Digital', 'is_correct' => false, 'match_key' => 'Rekam jejak seluruh aktivitas yang ditinggalkan saat berselancar di internet', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri kebahasaan teks prosedur yang menggunakan akhiran -lah atau -kan pada kata kerja adalah kalimat ....',
                                'explanation' => 'Kalimat imperatif (perintah) mencirikan teks prosedur.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perintah (imperatif)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tanya (interogatif)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berita (deklaratif)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Seruan dramatis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama penulisan teks prosedur adalah ....',
                                'explanation' => 'Memberi petunjuk langkah kerja sistematis.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memberikan petunjuk langkah-langkah agar pembaca berhasil melakukan sesuatu secara benar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menghibur pembaca dengan cerita petualangan seru', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menjelaskan asal-usul legenda suatu daerah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Meyakinkan pembaca untuk menyumbang dana sosial', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran teks prosedur!',
                                'explanation' => 'Langkah teks prosedur wajib urut dan logis.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Langkah-langkah dalam teks prosedur harus disusun secara urut dan sistematis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teks prosedur boleh menggunakan langkah acak yang membingungkan pengguna.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata penghubung urutan seperti "pertama", "lalu", "selanjutnya" lazim digunakan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh kata kerja imperatif yang terdapat dalam petunjuk internet sehat adalah ....',
                                'explanation' => 'Aktifkanlah dan amankan adalah verba imperatif.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Aktifkanlah dan amankan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sedang berselancar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Telah mengunduh', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Akan menghapus', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat prosedur berikut yang memuat larangan tegas adalah ....',
                                'explanation' => '"Jangan pernah membagikan..." adalah kalimat imperatif larangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jangan pernah membagikan kode OTP atau kata sandimu kepada siapa pun!', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Klik tombol simpan setelah mengisi formulir pendaftaran.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Masukkan nama pengguna dan kata sandi dengan benar.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Periksa kembali kelengkapan data sebelum keluar.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kode rahasia sekali pakai yang dikirimkan melalui SMS untuk verifikasi akun perbankan/aplikasi disebut kode ....',
                                'explanation' => 'OTP adalah One-Time Password.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'OTP (One-Time Password)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'PIN statis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Barcode', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'QR Code', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tindakan mengunduh aplikasi hanya dari toko resmi (seperti Play Store atau App Store) bertujuan untuk ....',
                                'explanation' => 'Mencegah malware dan virus dari sumber tak resmi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mencegah perangkat terinfeksi virus atau program jahat (malware)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membuat baterai ponsel habis dalam sekejap', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mempersulit penggunaan telepon pintar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghapus seluruh foto kenangan di ponsel', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Struktur teks prosedur yang berisi alat atau piranti yang diperlukan untuk melakukan kegiatan disebut ....',
                                'explanation' => 'Bahan / alat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bahan atau alat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tujuan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Langkah-langkah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Penutup', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat prosedur yang menggunakan kata keterangan cara adalah ....',
                                'explanation' => '"Dengan hati-hati dan teliti" adalah keterangan cara.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ketikkan kata sandi dengan hati-hati dan teliti.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Klik tombol berwarna biru di layar.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Setelah itu masuk ke menu pengaturan akun.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pertama buka peramban internet di komputermu.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Rekam jejak seluruh postingan, komentar, dan riwayat pencarian yang kita tinggalkan di internet disebut ....',
                                'explanation' => 'Jejak digital (digital footprint).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jejak digital (digital footprint)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sidik jari siber', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jejak langkah kaki', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Riwayat perbankan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri utama kalimat imperatif (perintah) dalam teks prosedur!',
                                'explanation' => 'Partikel -lah/-kan dan subjek tersirat mencirikan kalimat imperatif prosedur.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan partikel penegas -lah atau akhiran -kan (contoh: simpanlah, pastikan)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menghilangkan subjek kalimat karena ditujukan kepada pembaca secara langsung', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggunakan kata tanya ADiKSiMBa di akhir kalimat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Selalu diakhiri dengan tanda tanya rangkap tiga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ancaman siber yang sering terjadi di dunia maya!',
                                'explanation' => 'Phishing dan malware adalah ancaman siber nyata.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penipuan tautan palsu peretas data (phishing)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penyebaran virus perusak sistem (malware)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Baterai senter yang kehabisan daya listrik', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Layar monitor berdebu karena jarang dibersihkan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah dunia siber dengan padanan kata resminya dalam bahasa Indonesia!',
                                'explanation' => 'Pasangan istilah teknologi informasi bahasa Indonesia.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Download', 'is_correct' => false, 'match_key' => 'Unduh', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Upload', 'is_correct' => false, 'match_key' => 'Unggah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Website', 'is_correct' => false, 'match_key' => 'Situs web / laman', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Browser', 'is_correct' => false, 'match_key' => 'Peramban', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan langkah prosedur keamanan akun dengan tujuannya!',
                                'explanation' => 'Pasangan prosedur keamanan siber dan fungsinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Membuat kata sandi rumit', 'is_correct' => false, 'match_key' => 'Mencegah akun ditebak dan dibobol peretas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mengaktifkan autentikasi 2FA', 'is_correct' => false, 'match_key' => 'Memberikan perlindungan lapis ganda pada akun', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Keluar (log out) di komputer umum', 'is_correct' => false, 'match_key' => 'Mencegah orang lain mengakses akun kita', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Memperbarui sistem aplikasi', 'is_correct' => false, 'match_key' => 'Menutup celah keamanan siber yang usang', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran jejak digital di internet!',
                                'explanation' => 'Pelanggaran di internet diatur oleh Undang-Undang ITE.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jejak digital yang buruk di masa kecil dapat memengaruhi masa depan saat dewasa.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sekali sesuatu diunggah ke internet, data tersebut sangat sulit dihapus sepenuhnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kita bebas mengunggah ujaran kebencian karena di internet tidak ada hukum.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran teks prosedur!',
                                'explanation' => 'Urutan pembuatan akun harus runut dan teratur.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Bahasa dalam teks prosedur harus lugas, jelas, dan komunikatif.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Urutan langkah dalam membuat akun baru boleh dibolak-balik sesuka hati.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kalimat imperatif digunakan untuk memberi instruksi kepada pengguna.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Teks yang berisi petunjuk langkah-langkah kerja berurutan dinamakan teks ....',
                                'explanation' => 'Teks prosedur.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'prosedur', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat yang berisi perintah atau instruksi untuk melakukan sesuatu disebut kalimat ....',
                                'explanation' => 'Kalimat imperatif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'imperatif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kunci pengaman rahasia yang digunakan untuk masuk ke akun digital disebut kata ....',
                                'explanation' => 'Kata sandi / password.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sandi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tindakan mengunduh data dari internet ke perangkat pribadi disebut kegiatan meng-...-kan.',
                                'explanation' => 'Mengunduh (download).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'unduh', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tindakan mengirimkan atau menaruh data dari perangkat ke internet disebut meng-...-kan.',
                                'explanation' => 'Mengunggah (upload).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'unggah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perangkat lunak penjelajah internet seperti Chrome atau Firefox dinamakan ....',
                                'explanation' => 'Peramban (browser).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'peramban', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rekam jejak seluruh aktivitas yang ditinggalkan di internet disebut jejak ....',
                                'explanation' => 'Jejak digital.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'digital', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan dan jelaskan secara lengkap empat langkah prosedur penting bagi anak sekolah dasar agar aman dari bahaya kejahatan siber saat berselancar di internet!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Membuat Kata Sandi Kuat: Gunakan minimal 8 karakter kombinasi huruf besar, kecil, angka, dan simbol; serta ganti secara berkala.
2. Menjaga Kerahasiaan Data Pribadi: Jangan pernah membagikan NIK, alamat rumah, nomor kontak, kata sandi, atau foto dokumen keluarga di media sosial.
3. Mewaspadai Tautan Asing (Anti-Phishing): Jangan mengklik tautan atau mengunduh berkas mencurigakan dari nomor tak dikenal yang menjanjikan hadiah palsu.
4. Log Out dari Komputer Bersama: Selalu keluar dari akun dan bersihkan riwayat peramban setelah menggunakan perangkat di sekolah atau tempat umum.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan apa yang dimaksud dengan jejak digital (digital footprint), mengapa jejak digital bersifat abadi, dan bagaimana cara kita membangun jejak digital yang positif sejak bangku sekolah dasar!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pengertian: Jejak digital adalah riwayat seluruh aktivitas, jejak postingan, foto, komentar, dan pencarian yang ditinggalkan seseorang saat menggunakan internet.
2. Sifat Abadi: Karena data yang diunggah ke internet dapat disalin, disimpan, atau tangkapan layarnya diarsipkan oleh server pihak ketiga, sehingga sangat sulit dihapus tuntas meskipun postingan asli sudah dihapus.
3. Membangun Jejak Positif: Selalu membagikan karya bermanfaat (tulisan, prestasi, karya seni), bertutur kata santun tanpa menyebar ujaran kebencian, serta tidak membagikan informasi palsu (hoaks).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Susunlah sebuah teks prosedur singkat (3-4 langkah terurut) tentang "Cara Mengganti Kata Sandi Akun Belajar Daring Sekolah Secara Aman" dengan menggunakan kalimat imperatif dan konjungsi urutan!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Teks Prosedur:
"Langkah-Langkah Mengganti Kata Sandi Akun Belajar:
Pertama, masuklah ke portal akun belajar sekolahmu menggunakan peramban resmi, lalu pilihlah menu "Pengaturan Akun" di sudut kanan atas.
Kedua, klik opsi "Keamanan dan Sandi", lalu masukkan kata sandi lamamu untuk memverifikasi kepemilikan akun.
Ketiga, buatlah kata sandi baru yang memadukan huruf besar, angka, dan tanda baca khusus, kemudian ketikkan ulang kata sandi tersebut di kolom konfirmasi.
Terakhir, tekan tombol "Simpan Perubahan" dan pastikan muncul notifikasi bahwa kata sandi barumu telah berhasil diperbarui."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 8 Bahasa Indonesia Kelas 6 (Paket 2 - Literasi Digital & Netiket)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 8 bagian 2: Menangkal hoaks, menerapkan prinsip Saring Sebelum Sharing, netiket berjejaring sosial, dan etika privasi.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Saring Sebelum Sharing: Menangkal Bahaya Berita Bohong (Hoaks)', 'content' => '[Keterangan Gambar: Ilustrasi siswa bijak memegang kaca pembesar meneliti judul berita sensasional di layar ponsel cerdas: ia memeriksa sumber berita ke situs resmi sebelum memutuskan untuk tidak menyebarkannya.]

Banjir informasi di media sosial kerap membawa serta berita bohong (*hoaks*) yang sengaja disebarkan oleh pihak tidak bertanggung jawab. Berita hoaks umumnya memiliki ciri khas: menggunakan judul yang sensasional dan provokatif, memuat ancaman atau imbauan mendesak seperti "Sebarkan pesan ini atau kamu akan celaka", serta tidak mencantumkan nama penulis atau tanggal penerbitan yang kredibel.

Untuk menangkal penyebaran hoaks, Kementerian Komunikasi dan Informatika mencanangkan gerakan "Saring Sebelum Sharing". Sebelum meneruskan suatu informasi, kita wajib mengecek fakta melalui tiga langkah: pertama, periksa kredibilitas sumber beritanya ke situs media resmi terpercaya; kedua, periksa tanggal peristiwanya agar tidak terjebak berita lama yang didaur ulang; ketiga, bandingkan dengan sumber berita lain yang terverifikasi. Jika informasi terbukti palsu atau diragukan, segera hentikan penyebarannya agar tidak menimbulkan keresahan masyarakat.'],
                            ['title' => 'Stimulus 2: Etika Berkomunikasi di Ruang Digital (Netiket)', 'content' => '[Keterangan Gambar: Infografis netiket (etika internet): 1. Menggunakan bahasa santun dan menghargai perbedaan, 2. Tidak menulis dengan huruf kapital semua (karena bermakna berteriak/marah), 3. Tidak menyebarkan ujaran kebencian atau perundungan siber (*cyberbullying*), 4. Menghargai hak cipta karya orang lain dengan mencantumkan sumber rujukan.]

Dunia digital adalah perpanjangan dari dunia nyata. Di ruang siber berlaku aturan etika yang dikenal sebagai netiket (*network etiquette*). Salah satu prinsip etika terpenting adalah mengingat bahwa di balik layar gawai terdapat manusia sesungguhnya yang memiliki perasaan dan martabat. Menulis komentar dengan huruf kapital seluruhnya dianggap tidak sopan karena setara dengan berteriak membentak. Selain itu, menghargai karya cipta orang lain dengan mencantumkan nama pembuat karya merupakan bentuk integritas akademik yang luhur.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, ciri utama berita bohong (hoaks) yang sering ditemukan di media sosial adalah ....',
                                'explanation' => 'Ciri hoaks: judul sensasional, provokatif, mendesak disebarkan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan judul sensasional provokatif dan mendesak pembaca menyebarkannya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ditulis oleh ilmuwan resmi dengan data laboratorium teruji', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Selalu mencantumkan nama penulis dan tanggal terbit yang valid', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Disiarkan langsung melalui stasiun televisi nasional', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Makna dari slogan literasi digital "Saring Sebelum Sharing" adalah ....',
                                'explanation' => 'Memeriksa kebenaran informasi sebelum membagikannya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memeriksa kebenaran dan kebaikan informasi sebelum memutuskan untuk membagikannya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menyaring kopi hangat sebelum diminum bersama teman', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Membagikan semua informasi yang masuk tanpa perlu dibaca', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghapus seluruh aplikasi media sosial di ponsel', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA langkah cerdas untuk mengecek kebenaran berita menurut teks!',
                                'explanation' => 'Cek sumber resmi dan bandingkan dengan media terverifikasi.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memeriksa kredibilitas sumber berita ke situs media resmi terpercaya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membandingkan informasi tersebut dengan beberapa sumber berita terverifikasi lainnya', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Langsung mempercayai berita jika dibagikan oleh teman di grup', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Meneruskan pesan secepat mungkin agar menjadi orang pertama yang tahu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah literasi digital dengan penjelasannya!',
                                'explanation' => 'Pasangan konsep literasi digital.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Hoaks (Hoax)', 'is_correct' => false, 'match_key' => 'Informasi atau berita palsu yang sengaja direkayasa untuk menyesatkan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Saring Sebelum Sharing', 'is_correct' => false, 'match_key' => 'Prinsip memverifikasi kebenaran data sebelum membagikannya', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kredibilitas Sumber', 'is_correct' => false, 'match_key' => 'Tingkat kepercayaan dan keahlian pihak penerbit berita', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Verifikasi Fakta', 'is_correct' => false, 'match_key' => 'Proses memeriksa kebenaran bukti nyata dari suatu klaim', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alasan penulisan pesan teks dengan seluruh huruf kapital dianggap tidak sopan di internet adalah ....',
                                'explanation' => 'Huruf kapital semua diartikan berteriak/marah secara virtual.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menulis huruf kapital semua dianggap setara dengan berteriak membentak atau marah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membuat ukuran memori pesan menjadi terlalu besar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Huruf kapital dilarang oleh operator telekomunikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membuat layar ponsel menjadi cepat panas', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tindakan menghargai karya cipta tulisan atau gambar orang lain di internet diwujudkan dengan cara ....',
                                'explanation' => 'Mencantumkan nama pencipta dan tautan sumber rujukan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mencantumkan nama pencipta dan sumber rujukan aslinya saat mengutip', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menghapus nama pembuat asli dan menggantinya dengan nama sendiri', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menjual karya orang lain tanpa izin untuk keuntungan pribadi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengaku bahwa karya tersebut adalah buatan sendiri sejak awal', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran etika berinternet (netiket)!',
                                'explanation' => 'Akun anonim tidak kebal hukum; perundungan siber melanggar UU ITE.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Perundungan siber (cyberbullying) merupakan pelanggaran hukum dan etika.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kita bebas menghina orang lain di media sosial karena menggunakan akun anonim palsu.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Menyapa teman di ruang obrolan daring hendaknya menggunakan kata-kata yang santun.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Istilah untuk etika sopan santun dalam berkomunikasi di jaringan internet adalah ....',
                                'explanation' => 'Netiket adalah etika berjejaring internet.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Netiket (network etiquette)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cyberlaw', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Phishing', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Malware', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tindakan mengancam, menghina, atau mempermalukan seseorang melalui media sosial disebut ....',
                                'explanation' => 'Perundungan siber (cyberbullying).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perundungan siber (cyberbullying)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Literasi digital', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Autentikasi akun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Verifikasi data', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap bijak saat melihat teman sekelas menjadi korban perundungan siber di grup percakapan adalah ....',
                                'explanation' => 'Membela korban santun, menasihati pelaku, dan lapor guru.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membela korban secara santun, menasihati pelaku, dan melaporkan kejadian kepada guru', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ikut menertawakan dan menambahkan stiker ejekan yang lucu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyebarkan tangkapan layar ejekan tersebut ke seluruh media sosial', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mendiamkan saja karena merasa bukan urusan pribadi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri alamat situs web resmi lembaga pemerintah Indonesia yang terpercaya adalah menggunakan domain ....',
                                'explanation' => 'Domain resmi pemerintah Indonesia adalah .go.id.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '.go.id', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '.com', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '.xyz', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '.net', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri alamat situs web resmi lembaga pendidikan sekolah di Indonesia adalah menggunakan domain ....',
                                'explanation' => 'Domain resmi sekolah adalah .sch.id.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '.sch.id', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '.co.id', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '.biz', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '.info', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hukum positif di Indonesia yang mengatur tentang informasi dan transaksi elektronik adalah ....',
                                'explanation' => 'UU ITE (Informasi dan Transaksi Elektronik).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Undang-Undang ITE', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Undang-Undang Hak Cipta', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Undang-Undang Lingkungan Hidup', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Undang-Undang Perbankan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tindakan memposting foto teman tanpa izin yang menampilkan pose memalukan melanggar hak ....',
                                'explanation' => 'Melanggar hak privasi dan kehormatan pribadi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Privasi dan martabat pribadi orang lain', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kekayaan intelektual komersial', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kebebasan berekspresi mutlak', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hak pilih umum', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA akibat buruk dari penyebaran berita hoaks di masyarakat!',
                                'explanation' => 'Hoaks menimbulkan kepanikan, keresahan, dan perpecahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menimbulkan keresahan, kepanikan, dan rasa curiga antarsesama warga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Memicu konflik perpecahan dan merusak persatuan bangsa', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meningkatkan kecerdasan literasi sains masyarakat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membuat perekonomian daerah berkembang pesat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA contoh perilaku berinternet yang sesuai dengan netiket!',
                                'explanation' => 'Komentar santun dan meminta izin saat menandai foto adalah netiket terpuji.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berkomentar dengan kata-kata santun dan argumentasi yang logis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Meminta izin sebelum menandai (tag) foto teman di media sosial', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyebarkan kabar burung yang belum jelas kebenarannya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menggunakan kata-kata kasar saat berbeda pendapat di kolom komentar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan domain situs web dengan jenis lembaganya di Indonesia!',
                                'explanation' => 'Pasangan domain web dan jenis lembaganya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '.go.id', 'is_correct' => false, 'match_key' => 'Lembaga instansi resmi pemerintah Indonesia', 'order' => 1],
                                    ['label' => null, 'option_text' => '.sch.id', 'is_correct' => false, 'match_key' => 'Lembaga satuan pendidikan sekolah di Indonesia', 'order' => 2],
                                    ['label' => null, 'option_text' => '.ac.id', 'is_correct' => false, 'match_key' => 'Perguruan tinggi / universitas di Indonesia', 'order' => 3],
                                    ['label' => null, 'option_text' => '.org / .or.id', 'is_correct' => false, 'match_key' => 'Organisasi atau lembaga nirlaba swadaya masyarakat', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan tindakan di internet dengan status etikanya!',
                                'explanation' => 'Pasangan tindakan dan etika internet.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Menyebarkan foto aib orang lain', 'is_correct' => false, 'match_key' => 'Perundungan Siber (Melanggar Hukum)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mencantumkan sumber kutipan artikel', 'is_correct' => false, 'match_key' => 'Integritas Akademik (Terpuji)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Memverifikasi berita ke situs resmi', 'is_correct' => false, 'match_key' => 'Literasi Kritis (Terpuji)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mengirim pesan spam berantai berisi fitnah', 'is_correct' => false, 'match_key' => 'Pelanggaran Netiket (Tercela)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran verifikasi berita!',
                                'explanation' => 'Foto mudah disunting digital, jangan percaya hanya dari judul sensasional.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Berita yang disertai foto belum tentu benar karena foto bisa disunting atau dimanipulasi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Informasi yang berasal dari akun resmi bercentang biru selalu 100% mutlak palsu.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Membaca hanya bagian judul saja tanpa membaca isi berita sering memicu salah paham.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran privasi daring!',
                                'explanation' => 'Kata sandi adalah rahasia pribadi yang tidak boleh dibagikan ke siapa pun.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata sandi akun media sosial boleh dibagikan kepada teman akrab satu kelas.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Fitur akun privat membantu membatasi orang asing melihat postingan kita.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Setiap pengguna internet bertanggung jawab penuh atas apa yang diketiknya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Berita atau informasi palsu yang sengaja disebarkan untuk menyesatkan pembaca dinamakan ....',
                                'explanation' => 'Hoaks (hoax).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hoaks', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Etika sopan santun dalam berinteraksi di jaringan internet dinamakan ....',
                                'explanation' => 'Netiket (netiquette).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'netiket', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tindakan mengintimidasi atau mengejek seseorang di media sosial dinamakan perundungan ....',
                                'explanation' => 'Perundungan siber (cyberbullying).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'siber', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Domain situs web resmi untuk lembaga pemerintah Republik Indonesia berakhiran .go.....',
                                'explanation' => '.go.id.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'id', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Domain situs web resmi untuk sekolah di Indonesia berakhiran .sch.....',
                                'explanation' => '.sch.id.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'id', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Undang-undang yang mengatur tindak kejahatan informasi digital di Indonesia disingkat UU ....',
                                'explanation' => 'Undang-Undang ITE.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'ITE', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Slogan literasi digital untuk menangkal berita bohong adalah saring sebelum ....',
                                'explanation' => 'Saring sebelum sharing.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sharing', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan apa yang dimaksud dengan berita hoaks, sebutkan tiga ciri-ciri utama berita hoaks di media sosial, serta jelaskan bahaya yang dapat ditimbulkannya bagi kerukunan masyarakat!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pengertian: Hoaks adalah informasi atau berita palsu yang sengaja direkayasa dan disebarkan untuk memanipulasi, menyesatkan, atau menipu pembaca.
2. Tiga Ciri Utama Hoaks:
   - Judul Sensasional & Provokatif: Menggunakan kata-kata bombastis yang memicu kemarahan, ketakutan, atau kecemasan.
   - Sumber Tak Jelas / Anonim: Tidak mencantumkan nama penulis, lembaga penanggung jawab, atau mencatut nama tokoh terkenal secara palsu.
   - Memuat Pesan Berantai Mendesak: Berisi perintah memaksa seperti "Sebarkan segera ke seluruh grup jika peduli!".
3. Bahaya bagi Masyarakat: Memicu kepanikan massal, menimbulkan saling curiga antarkelompok masyarakat, menyulut pertikaian dan perpecahan bangsa, serta merusak reputasi nama baik korban yang difitnah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan apa yang dimaksud dengan netiket (network etiquette) dan sebutkan empat aturan kesantunan berinternet yang wajib ditaati oleh siswa kelas 6 SD saat berinteraksi di grup media sosial sekolah!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pengertian: Netiket adalah tata krama, etika, dan sopan santun dalam berkomunikasi dan berinteraksi di ruang digital/internet.
2. Empat Aturan Netiket Pelajar:
   - Menjaga Tutur Kata: Menggunakan bahasa yang santun, ramah, dan tidak menggunakan kata makian kasar.
   - Hindari Menulis Huruf Kapital Semua: Karena melambangkan kemarahan atau bentakan di dunia maya.
   - Menghargai Privasi & Hak Cipta: Tidak menyebarkan foto atau rahasia teman tanpa izin, serta mencantumkan sumber saat mengutip karya orang lain.
   - Stop Cyberbullying: Tidak ikut-ikutan mengejek, menghina, atau menyudutkan teman yang sedang mengalami kesulitan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jika kamu menerima pesan berantai di grup obrolan yang menyatakan bahwa esok hari seluruh sekolah akan diliburkan karena fenomena alam langka, langkah-langkah apa sajakah yang akan kamu lakukan untuk memverifikasi kebenaran berita tersebut sebelum memutuskan menyebarkannya?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Langkah-Langkah Verifikasi Fakta:
1. Jangan Langsung Percaya & Menahan Diri: Tidak langsung menyebarkan pesan tersebut ke orang lain (menerapkan prinsip "Saring Sebelum Sharing").
2. Memeriksa Sumber Informasi: Memeriksa apakah pesan tersebut mencantumkan surat dinas resmi dari Kementerian Pendidikan atau Dinas Pendidikan setempat berstempel resmi.
3. Mengonfirmasi ke Pihak Sekolah: Menanyakan langsung kebenaran berita tersebut kepada wali kelas atau bapak/ibu guru sekolah.
4. Memeriksa Situs Berita Kredibel: Membuka laman portal berita nasional resmi untuk memeriksa apakah ada pengumuman serupa. Jika terbukti palsu, berikan klarifikasi santun kepada pengirim pesan agar pesan tersebut tidak disebarkan lebih luas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 8 Bahasa Indonesia Kelas 6 (Paket 3 - Kosakata Teknologi & Kata Majemuk)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 8 bagian 3: Menguasai istilah serapan teknologi informasi, padanan bahasa Indonesia, dan aturan afiksasi kata majemuk PUEBI.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Perkembangan Teknologi Komunikasi dan Kecerdasan Artifisial', 'content' => '[Keterangan Gambar: Ilustrasi siswa menggunakan komputer tablet untuk belajar bahasa pemrograman visual coding: sistem kecerdasan artifisial (AI) memberikan umpan balik koreksi tata bahasa secara otomatis dan real-time.]

Revolusi teknologi digital telah melahirkan aneka inovasi mutakhir seperti kecerdasan artifisial (*artificial intelligence*), komputasi awan (*cloud computing*), dan internet untuk segala (*Internet of Things*). Bahasa Indonesia terus berkembang menyerap dan memadankan istilah-istilah teknologi tersebut ke dalam kosakata baku nasional.

Kecerdasan artifisial didefinisikan sebagai simulasi kecerdasan manusia yang dimodelkan pada mesin komputer sehingga mampu melakukan penalaran, pembelajaran mandiri, dan pemecahan masalah rumit. Melalui algoritma pembelajaran mesin (*machine learning*), komputer dapat mengenali pola suara, menerjemahkan bahasa asing secara instan, dan memprediksi cuaca secara presisi. Sebagai generasi emas penerus bangsa, penguasaan literasi teknologi digital dan kecerdasan artifisial harus berlandaskan etika moral Pancasila.'],
                            ['title' => 'Stimulus 2: Menelaah Kaidah Penulisan Kata Majemuk (Gabungan Kata)', 'content' => '[Keterangan Gambar: Bagan aturan penulisan gabungan kata (kata majemuk): 1. Ditulis terpisah jika mandiri (tanggung jawab, kerja sama, tanda tangan, rumah sakit), 2. Ditulis terpisah jika hanya mendapat awalan atau akhiran saja (bertanggung jawab, tanda tangani, bekerja sama), 3. Ditulis serangkai jika mendapat awalan dan akhiran sekaligus (mempertanggungjawabkan, menandatangani, bekerjasama-kan), 4. Ditulis serangkai yang sudah padu benar (kacamata, beasiswa, olahraga, bumiputera).]

Kata majemuk atau gabungan kata adalah paduan dua kata dasar atau lebih yang membentuk makna baru. Penulisan kata majemuk harus memperhatikan kaidah afiksasi (pengimbuhan) menurut PUEBI agar tidak terjadi kesalahan pemisahan atau penyambungan kata.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, padanan resmi bahasa Indonesia untuk istilah asing "artificial intelligence" adalah ....',
                                'explanation' => 'Artificial intelligence dipadankan menjadi kecerdasan artifisial/buatan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kecerdasan artifisial (atau kecerdasan buatan)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kecerdasan alami manusia', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Robot pembantu rumah tangga', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mesin pencari internet otomatis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Padanan resmi bahasa Indonesia untuk istilah "cloud computing" adalah ....',
                                'explanation' => 'Cloud computing adalah komputasi awan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Komputasi awan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Komputasi langit', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penyimpanan uap air', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jaringan mendung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kemampuan kecerdasan artifisial yang dipaparkan dalam wacana!',
                                'explanation' => 'AI mengenali suara, menerjemahkan bahasa, dan memprediksi cuaca.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengenali pola suara dan menerjemahkan bahasa asing secara instan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Memprediksi kondisi cuaca secara presisi menggunakan algoritma data', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Merasakan kesedihan batin dan menangis tersedu-sedu secara alami', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menikmati kelezatan masakan tradisional di meja makan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah asing teknologi di kolom kiri dengan padanan kata bakunya di kolom kanan!',
                                'explanation' => 'Pasangan istilah teknologi dan padanan bakunya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Hardware', 'is_correct' => false, 'match_key' => 'Perangkat keras', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Software', 'is_correct' => false, 'match_key' => 'Perangkat lunak', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Database', 'is_correct' => false, 'match_key' => 'Pangkalan data / basis data', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Server', 'is_correct' => false, 'match_key' => 'Peladen', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan gabungan kata yang benar saat hanya mendapat awalan ber- adalah ....',
                                'explanation' => 'Jika hanya mendapat awalan saja, tetap ditulis terpisah: bekerja sama, bertanggung jawab.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bekerja sama dan bertanggung jawab', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bekerjasama dan bertanggungjawab', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Ber-tanggung jawab dan ber-kerja sama', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bekerja-sama dan bertanggung-jawab', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan gabungan kata yang benar saat mendapat awalan dan akhiran sekaligus (konfiks) adalah ....',
                                'explanation' => 'Mendapat awalan dan akhiran sekaligus ditulis serangkai: mempertanggungjawabkan, menandatangani.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mempertanggungjawabkan dan menandatangani', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mempertanggung jawabkan dan menanda tangani', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mempertanggung-jawabkan dan menanda-tangani', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menanggung jawabkan dan menandatangani', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penulisan gabungan kata!',
                                'explanation' => 'Tanpa imbuhan ditulis terpisah: kerja sama (bukan kerjasama).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata "tanda tangan" ditulis terpisah jika tidak berimbuhan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata "olahraga" dan "beasiswa" wajib ditulis serangkai karena sudah padu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "kerja sama" baku jika ditulis "kerjasama" tanpa imbuhan.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata majemuk senyawa berikut yang wajib ditulis serangkai menurut PUEBI adalah ....',
                                'explanation' => 'Kacamata, saputangan, segitiga ditulis serangkai.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kacamata, saputangan, dan segitiga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Budi pekerti, orang tua, dan meja hijau', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rumah sakit, kereta api, dan jalan raya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kambing hitam, kabar burung, dan buah tangan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kata gabung serasi yang baku adalah ....',
                                'explanation' => 'Bumiputera, sukacita, dukacita ditulis serangkai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bumiputera, sukacita, dan dukacita', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bumi putera, suka cita, dan duka cita', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bumi-putera, suka-cita, dan duka-cita', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bumiputra, sukacita, dan duka-chita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kata gabung berimbuhan yang benar adalah ....',
                                'explanation' => 'Awalan dan akhiran sekaligus ditulis serangkai: menyebarluaskan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menyebarluaskan (dari sebar luas)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menyebar luaskan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyebarluas kan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyebar-luaskan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan bentuk ulang gabungan kata yang benar adalah ....',
                                'explanation' => 'Unsur pertama yang diulang: surat-surat kabar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Surat-surat kabar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Surat kabar-surat kabar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Surat kabar-kabar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Surat-kabar-surat-kabar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Padanan kata bahasa Indonesia untuk istilah teknologi "link" adalah ....',
                                'explanation' => 'Link dipadankan menjadi tautan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tautan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pautan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sambungan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kaitan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Padanan kata bahasa Indonesia untuk istilah "login" dan "logout" adalah ....',
                                'explanation' => 'Masuk log dan keluar log.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Masuk log dan keluar log', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Buka akun dan tutup akun', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Awal kunci dan akhir kunci', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pintu masuk dan pintu keluar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Padanan kata bahasa Indonesia untuk istilah "scan" dokumen adalah ....',
                                'explanation' => 'Scan dipadankan menjadi pindai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pindai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cetak', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Salin', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bidikan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA gabungan kata yang ditulis serangkai karena sudah dianggap senyawa padu!',
                                'explanation' => 'Olahraga dan kacamata ditulis serangkai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Olahraga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kacamata', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kerja sama', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tanggung jawab', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata serapan teknologi informasi yang baku menurut KBBI!',
                                'explanation' => 'Algoritma dan internet adalah istilah baku KBBI.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Algoritma (dari algorithm)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Internet (dari internet)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kwalitas data', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sistim operasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah gawai dengan padanan kata bakunya!',
                                'explanation' => 'Pasangan perangkat gawai dan istilah resminya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Touchscreen', 'is_correct' => false, 'match_key' => 'Layar sentuh', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Headset / earphone', 'is_correct' => false, 'match_key' => 'Pelantang telinga / penyuara telinga', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Flashdisk', 'is_correct' => false, 'match_key' => 'Kandar kilas', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Charger', 'is_correct' => false, 'match_key' => 'Pengisi daya', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kaidah penulisan gabungan kata dengan contohnya!',
                                'explanation' => 'Pasangan kaidah penulisan kata majemuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Ditulis terpisah tanpa imbuhan', 'is_correct' => false, 'match_key' => 'Kerja sama, tanggung jawab', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Ditulis terpisah berawalan saja', 'is_correct' => false, 'match_key' => 'Bekerja sama, bertanggung jawab', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Ditulis serangkai berkonfiks lengkap', 'is_correct' => false, 'match_key' => 'Menandatangani, mempertanggungjawabkan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ditulis serangkai senyawa padu', 'is_correct' => false, 'match_key' => 'Beasiswa, olahraga, bumiputera', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran istilah teknologi bahasa Indonesia!',
                                'explanation' => 'Hacker dipadankan menjadi peretas.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Istilah "daring" merupakan akronim dari dalam jaringan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Istilah "luring" merupakan akronim dari luar jaringan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Istilah "hacker" dipadankan menjadi "pembajak laut".', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penulisan kata majemuk!',
                                'explanation' => 'Tata usaha ditulis terpisah jika tanpa imbuhan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata "lipat ganda" jika diberi konfiks meng-...-kan ditulis "melipatgandakan".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata "garis bawah" jika diberi awalan meng- ditulis "menggarisbawahi".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "tata usaha" ditulis serangkai "tatausaha" tanpa imbuhan.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan bahasa Indonesia untuk kata "download" adalah ....',
                                'explanation' => 'Unduh.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'unduh', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan bahasa Indonesia untuk kata "upload" adalah ....',
                                'explanation' => 'Unggah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'unggah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan bahasa Indonesia untuk istilah "link" adalah ....',
                                'explanation' => 'Tautan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tautan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan bahasa Indonesia untuk istilah peretas siber adalah ....',
                                'explanation' => 'Peretas (hacker).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'peretas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Penulisan baku dari kata majemuk "kerja sama" tanpa imbuhan adalah ditulis ....',
                                'explanation' => 'Ditulis terpisah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'terpisah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Penulisan baku dari kata "tanda tangan" saat diberi awalan dan akhiran sekaligus adalah menan-...-i.',
                                'explanation' => 'Menandatangani (serangkai).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'datangan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan resmi untuk istilah "touchscreen" adalah layar ....',
                                'explanation' => 'Layar sentuh.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sentuh', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan aturan lengkap penulisan gabungan kata (kata majemuk) menurut Pedoman Umum Ejaan Bahasa Indonesia (PUEBI) untuk kondisi:
a. Tidak berimbuhan
b. Hanya mendapat awalan atau akhiran saja
c. Mendapat awalan dan akhiran secara bersamaan (konfiks)
d. Gabungan kata yang sudah padu benar (senyawa)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Tanpa Imbuhan: Ditulis terpisah antarkata unsurnya. Contoh: tanggung jawab, kerja sama, tanda tangan, budi pekerti.
b. Hanya Mendapat Awalan atau Akhiran Saja: Tetap ditulis terpisah. Contoh: bertanggung jawab, bekerja sama, berterima kasih, tanda tangani.
c. Mendapat Awalan dan Akhiran Sekaligus (Konfiks): Ditulis serangkai (menyatu). Contoh: mempertanggungjawabkan, menandatangani, menyebarluaskan, melipatgandakan.
d. Sudah Padu Benar (Senyawa): Ditulis serangkai sejak semula. Contoh: kacamata, olahraga, beasiswa, bumiputera, saputangan, sukacita.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan lima istilah teknologi informasi dalam bahasa Inggris beserta padanan kata resminya dalam bahasa Indonesia baku menurut Kamus Besar Bahasa Indonesia (KBBI)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Download -> Unduh
2. Upload -> Unggah
3. Link -> Tautan
4. Browser -> Peramban
5. Mouse -> Tetikus
(Atau istilah lain yang valid: Hacker -> Peretas, Online -> Daring, Offline -> Luring, Touchscreen -> Layar sentuh, Flashdisk -> Kandar kilas).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbaikilah penulisan gabungan kata yang keliru dalam kalimat-kalimat di bawah ini agar sesuai dengan kaidah baku PUEBI!
a. Seluruh panitia lomba harus bekerjasama dan saling membagi tugas.
b. Kepala sekolah akan menanda tangani ijazah kelulusan para siswa besok pagi.
c. Kita wajib mempertanggung jawabkan perbuatan kita di media sosial.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Seluruh panitia lomba harus bekerja sama dan saling membagi tugas." (bekerjasama -> bekerja sama, karena hanya berawalan ber-).
b. Perbaikan: "Kepala sekolah akan menandatangani ijazah kelulusan para siswa besok pagi." (menanda tangani -> menandatangani, karena mendapat awalan me- dan akhiran -i sekaligus).
c. Perbaikan: "Kita wajib mempertanggungjawabkan perbuatan kita di media sosial." (mempertanggung jawabkan -> mempertanggungjawabkan, karena berkonfiks memper-...-kan).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
