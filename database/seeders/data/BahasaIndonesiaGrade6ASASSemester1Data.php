<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6ASASSemester1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Akhir Semester 1 (ASAS 1) Bahasa Indonesia Kelas 6 - Paket A',
                'type' => 'exam',
                'description' => 'Ujian akhir semester ganjil (Paket A): Menguji penguasaan komprehensif Bab 1 sampai Bab 4 mencakup korespondensi, wawancara, teks LHO, teks eksplanasi, kalimat efektif, morfologi imbuhan, dan gaya bahasa.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Laporan Observasi Penangkaran Penyu Hijau di Sukabumi', 'content' => '[Keterangan Gambar: Peneliti satwa dan siswa sedang mengamati tukik (anak penyu hijau) yang baru menetas dari sarang pasir pantai di kawasan konservasi Pantai Pangumbahan, Jawa Barat.]

Penyu hijau (*Chelonia mydas*) merupakan reptil laut purba yang telah menjelajahi samudra selama lebih dari seratus juta tahun. Di kawasan suaka pesisir Pantai Pangumbahan, Sukabumi, dilakukan upaya konservasi terpadu untuk melindungi sarang telur penyu dari ancaman predator alami dan perburuan liar manusia.

Berdasarkan hasil observasi tim peneliti, penyu hijau betina mendarat di pantai pada malam hari saat air pasang untuk bertelur. Seekor induk mampu menghasilkan 80 hingga 120 butir telur dalam satu kali proses bertelur. Telur-telur tersebut kemudian dipindahkan oleh petugas penangkar ke area penetasan semi-alami berpagar kawat untuk menjaga suhu pasir sekitar 28 hingga 30 derajat Celsius. Setelah masa inkubasi selama 50 hingga 60 hari, tukik akan menetas dan segera dilepasliarkan kembali ke laut lepas pada sore hari guna menghindari sengatan panas terik matahari dan burung pemangsa. Pelestarian penyu hijau berperan vital menjaga kesehatan ekosistem padang lamun di lautan tropis nusantara.'],
                            ['title' => 'Stimulus 2: Infografis Bahaya Sampah Plastik terhadap Biota Laut', 'content' => '[Keterangan Gambar: Infografis diagram lingkaran persentase jenis sampah laut di perairan Indonesia: Plastik sekali pakai (58%), Logam dan kaca (14%), Kayu dan organik (16%), Karet dan tekstil (12%). Infografis menunjukkan gambar penyu menelan kantong plastik karena mengiranya ubur-ubur.]

Lautan Indonesia kini menghadapi ancaman darurat polusi plastik. Menurut data riset kelautan tahun 2026, sampah plastik sekali pakai mendominasi lebih dari separuh (58%) total timbulan sampah laut nasional. Plastik tidak dapat terurai secara biologis, melainkan terpecah menjadi partikel mikroplastik beracun yang tertelan oleh ikan, kerang, dan mamalia laut. Penyu laut sering salah mengira kantong kresek terapung sebagai mangsa ubur-ubur, sehingga menyumbat saluran pencernaan dan menyebabkan kematian tragis. Upaya pengendalian sampah plastik melalui kampanye 3R (Reduce, Reuse, Recycle) mutlak dilaksanakan sejak bangku sekolah dasar.'],
                            ['title' => 'Stimulus 3: Surat Undangan Sosialisasi Aksi Iklim Sekolah Adiwiyata', 'content' => '[Keterangan Gambar: Surat resmi berkop sekolah Adiwiyata Nasional Mandiri "SD TUNAS HARAPAN", bernomor dinas, perihal permohonan narasumber workshop hemat energi, bertanggal resmi, dan ditandatangani kepala sekolah.]

Nomor : 088/SD-TH/XI/2026
Hal : Permohonan Narasumber Sosialisasi Iklim

Yth. Direktur Komunitas Generasi Energi Bersih
Jalan Teratai Putih No. 12, Bandung

Dengan hormat,
Dalam rangka mewujudkan program Sekolah Adiwiyata Mandiri serta membekali siswa kelas 6 dengan kecakapan literasi iklim, kami bermaksud mengadakan Lokakarya Cilik "Aksi Cerdas Hemat Energi di Sekolah dan Rumah". Kegiatan ini bertujuan memotivasi para siswa agar mampu menerapkan gaya hidup rendah emisi karbon sejak dini.

Sehubungan dengan hal tersebut, kami memohon kesediaan Bapak/Ibu untuk menjadi narasumber pada kegiatan yang akan diselenggarakan pada:
hari, tanggal : Kamis, 12 November 2026
waktu : pukul 09.00 - 12.00 WIB
tempat : Aula Serbaguna SD Tunas Harapan

Demikian permohonan ini kami sampaikan. Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.

Hormat kami,
Kepala Sekolah,
Hj. Siti Rahmah, M.Pd.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, masa inkubasi penetasan telur penyu hijau dalam sarang pasir berlangsung selama ....',
                                'explanation' => 'Dalam teks: "Setelah masa inkubasi selama 50 hingga 60 hari, tukik akan menetas..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '50 hingga 60 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '80 hingga 120 hari', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '28 hingga 30 hari', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10 hingga 20 hari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alasan tukik dilepasliarkan ke laut lepas pada sore hari adalah ....',
                                'explanation' => 'Pelepasliaran sore hari menghindari terik matahari dan burung pemangsa.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menghindari sengatan panas terik matahari dan serangan burung pemangsa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Agar tukik dapat bermain di bawah sinar bulan purnama', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karena air laut pada sore hari berubah menjadi tawar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Supaya tukik dapat ditangkap kembali oleh nelayan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ancaman utama terhadap sarang telur penyu hijau menurut wacana!',
                                'explanation' => 'Perburuan liar manusia dan predator alami mengancam sarang penyu.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perburuan liar oleh oknum manusia', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Serangan predator alami di pantai', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hujan rintik-rintik di malam hari', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pertumbuhan rumput laut yang lebat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek biologis penyu hijau dengan keterangannya!',
                                'explanation' => 'Pasangan fakta biologi penyu hijau.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nama Ilmiah', 'is_correct' => false, 'match_key' => 'Chelonia mydas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jumlah Telur per Sarang', 'is_correct' => false, 'match_key' => '80 hingga 120 butir', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Suhu Pasir Inkubasi', 'is_correct' => false, 'match_key' => '28 hingga 30 derajat Celsius', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Peran Ekosistem', 'is_correct' => false, 'match_key' => 'Menjaga kesehatan padang lamun lautan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan data infografis, persentase sampah plastik sekali pakai di laut Indonesia mencapai ....',
                                'explanation' => 'Plastik sekali pakai mendominasi 58% sampah laut.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '58%', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '14%', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '16%', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alasan penyu laut sering menelan kantong kresek plastik adalah ....',
                                'explanation' => 'Penyu mengira kantong kresek transparan sebagai ubur-ubur.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penyu mengira kantong plastik terapung sebagai ubur-ubur mangsanya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penyu menyukai aroma harum dari bahan kimia plastik', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Plastik membantu proses pencernaan cangkang penyu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Plastik terapung di permukaan air laut sangat berkilau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran data pencemaran laut!',
                                'explanation' => 'Mikroplastik sangat beracun dan membahayakan rantai makanan laut.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Plastik sekali pakai merupakan jenis sampah terbanyak di perairan Indonesia.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Partikel mikroplastik tidak berbahaya jika tertelan oleh ikan laut.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kampanye 3R bertujuan mengurangi timbulan sampah plastik dari sumbernya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Prinsip 3R yang berarti mengurangi pemakaian barang pemicu sampah adalah prinsip ....',
                                'explanation' => 'Reduce bermakna mengurangi penggunaan barang pemicu timbulan sampah.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Reduce (mengurangi)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Reuse (menggunakan kembali)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Recycle (mendaur ulang)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Replace (mengganti)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama penyelenggaraan lokakarya iklim di SD Tunas Harapan adalah ....',
                                'explanation' => 'Tujuannya membekali siswa kecakapan literasi iklim dan hidup hemat energi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membekali siswa kelas 6 kecakapan literasi iklim dan hidup hemat energi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjual peralatan listrik tenaga surya impor kepada orang tua siswa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengumpulkan dana bantuan pembangunan gedung laboratorium baru', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengisi waktu kosong saat guru-guru sedang berlibur keluar kota', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat penutup surat resmi di atas yang benar dan santun adalah ....',
                                'explanation' => 'Penutup resmi santun dan efektif: "Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih."',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Demikian permohonan ini kami sampaikan. Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sekian dulu permohonan kami, tolong cepat dibalas ya.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Atas perhatiannya yang sangat banyak sekali diucapkan terima kasih.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Demikian surat ini dibuat agar narasumber tidak menolak hadir.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur surat resmi di atas!',
                                'explanation' => 'Rincian hari, waktu, tempat dalam rincian surat diawali huruf kecil jika merupakan lanjutan kalimat.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Surat tersebut ditujukan kepada Direktur Komunitas Generasi Energi Bersih.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kegiatan lokakarya dilaksanakan pada hari Sabtu malam hari.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Penulisan nama hari dan tanggal menggunakan huruf kecil pada awal kata di rincian jadwal.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur identitas instansi yang wajib tercantum dalam kop surat resmi!',
                                'explanation' => 'Kop surat wajib memuat nama lembaga, logo, alamat, dan kontak.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nama lembaga/sekolah dan logo resmi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Alamat lengkap dan kontak telepon/surel lembaga', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nama seluruh siswa yang bersekolah di sana', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Daftar menu makanan kantin sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 1] Surat yang dikirim oleh seorang siswa kepada temannya untuk menceritakan liburan termasuk jenis surat ....',
                                'explanation' => 'Surat pribadi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pribadi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dinas resmi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Niaga komersial', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Surat keputusan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 1] Bagian surat resmi yang berfungsi menunjukkan nomor pencatatan agenda surat keluar disebut ....',
                                'explanation' => 'Nomor surat mencatat agenda surat keluar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nomor surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Lampiran', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perihal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Alamat tujuan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Kata tanya yang paling tepat untuk menggali proses terjadinya peristiwa dalam wawancara adalah ....',
                                'explanation' => 'Bagaimana menanyakan proses.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bagaimana', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Siapa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berapa', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Bentuk baku dari kata serapan asing "aktifitet" menurut KBBI adalah ....',
                                'explanation' => 'Baku: aktivitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Aktivitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Aktifitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Aktifitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Aktiv', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Majas yang melukiskan benda mati seolah-olah bertingkah laku seperti manusia disebut majas ....',
                                'explanation' => 'Personifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Personifikasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Metafora', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Kalimat: "Dewi malam menyinari bumi nusantara yang permai" menggunakan majas ....',
                                'explanation' => 'Dewi malam adalah metafora untuk bulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Asosiasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Bagian pembuka teks Laporan Hasil Observasi yang memuat pengenalan umum objek dinamakan ....',
                                'explanation' => 'Pernyataan umum.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pernyataan umum / definisi umum', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Deskripsi bagian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Deskripsi manfaat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Simpulan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Kalimat berikut yang merupakan kalimat definisi dalam teks LHO adalah ....',
                                'explanation' => 'Kata "adalah" menandai kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hutan bakau adalah ekosistem tumbuhan pantai yang tahan terhadap kadar garam tinggi.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Akar bakau menjulur di atas lumpur pantai.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak kepiting berjalan di antara akar bakau.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hutan bakau tampak sangat rindang di kejauhan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Kata berimbuhan ber-an pada kalimat "Mereka bersalaman di panggung" bermakna ....',
                                'explanation' => 'Bersalaman bermakna saling bersalaman.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Saling melakukan perbuatan (resiprokal)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Banyak benda bertaburan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyerupai benda tajam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Melakukan pekerjaan untuk orang lain', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Teks yang memaparkan proses terjadinya fenomena alam berdasarkan sebab-akibat disebut teks ....',
                                'explanation' => 'Teks eksplanasi ilmiah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Eksplanasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Narasi fiksi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Deskripsi subjektif', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prosedur', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 & 2] Pilihlah DUA ciri utama surat dinas resmi!',
                                'explanation' => 'Surat dinas memakai kop surat, stempel, dan bahasa baku hemat kata.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan kepala (kop) surat dan stempel resmi instansi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menggunakan ragam bahasa baku dan hemat kata sesuai PUEBI', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggunakan kata-kata gaul dan emotikon lucu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tidak mencantumkan tanggal penulisan surat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 3 & 4] Pilihlah DUA konjungsi kausalitas sebab-akibat!',
                                'explanation' => 'Karena dan sehingga adalah konjungsi kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Karena', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sehingga', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Atau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Pilihlah DUA contoh kalimat efektif yang baku!',
                                'explanation' => 'Kalimat A dan B efektif. Kalimat C dan D mubazir/rancu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Para siswa menanam pohon di pekarangan sekolah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pemerintah meresmikan kawasan suaka margasatwa baru.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Semua para siswa-siswa berkumpul di aula.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Buku itu saya sudah membacanya kemarin.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 s.d. 4] Pasangkan istilah kebahasaan dengan contoh katanya!',
                                'explanation' => 'Pasangan ragam istilah kebahasaan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata Serapan Baku', 'is_correct' => false, 'match_key' => 'Kualitas, sistem, teknik', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Majas Personifikasi', 'is_correct' => false, 'match_key' => 'Angin berbisik menyampaikan salam', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konjungsi Kausalitas', 'is_correct' => false, 'match_key' => 'Oleh karena itu, sehingga, karena', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kata Berimbuhan ber-an', 'is_correct' => false, 'match_key' => 'Beterbangan, berserakan, bersalaman', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Pasangkan nama taman nasional dengan lokasinya di Indonesia!',
                                'explanation' => 'Pasangan taman nasional dan provinsinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Taman Nasional Komodo', 'is_correct' => false, 'match_key' => 'Nusa Tenggara Timur', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Taman Nasional Ujung Kulon', 'is_correct' => false, 'match_key' => 'Banten (Jawa Barat)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Taman Nasional Tanjung Puting', 'is_correct' => false, 'match_key' => 'Kalimantan Tengah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Taman Nasional Gunung Leuser', 'is_correct' => false, 'match_key' => 'Aceh dan Sumatra Utara', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Pasangkan istilah sains iklim dengan definisinya!',
                                'explanation' => 'Pasangan istilah sains lingkungan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Deforestasi', 'is_correct' => false, 'match_key' => 'Penebangan hutan secara masif', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Reboisasi', 'is_correct' => false, 'match_key' => 'Penanaman kembali hutan yang gundul', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Emisi Karbon', 'is_correct' => false, 'match_key' => 'Gas buang pembakaran bahan bakar fosil', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mikroplastik', 'is_correct' => false, 'match_key' => 'Partikel plastik renik berbahaya di lautan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 s.d. 4] Tentukan status kebenaran pernyataan tata bahasa!',
                                'explanation' => 'Kata serapan adaptasi disesuaikan ejaannya dengan kaidah bahasa Indonesia.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kalimat majemuk setara menghubungkan dua klausa yang berkedudukan setara.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata serapan adaptasi tidak mengalami penyesuaian ejaan sama sekali.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks LHO disusun berdasarkan fakta hasil pengamatan langsung di lapangan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Tentukan status kebenaran kalimat efektif!',
                                'explanation' => 'Pleonasme harus dihindari dalam kalimat efektif.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prinsip pleonasme adalah prinsip yang dianjurkan dalam kalimat efektif.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kesejajaran bentuk (paralelisme) membuat kalimat perincian menjadi teratur.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kalimat: "Waktu dan tempat kami persilakan" merupakan contoh kalimat tidak logis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => '[Bab 1] Lembar isian untuk mendaftar suatu kegiatan formal disebut ....',
                                'explanation' => 'Formulir pendaftaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'formulir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 1] Bagian surat resmi yang memuat nomor, lampiran, dan hal terletak di bagian ....',
                                'explanation' => 'Kepala / kop surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kepala', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Orang yang diwawancarai untuk dimintai keterangan disebut ....',
                                'explanation' => 'Narasumber.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'narasumber', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Bentuk baku dari kata serapan "praktek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: praktik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'praktik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Majas yang melebih-lebihkan kenyataan agar terdengar luar biasa disebut majas ....',
                                'explanation' => 'Hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hiperbola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Kata kiasan langsung tanpa kata pembanding dinamakan majas ....',
                                'explanation' => 'Metafora.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Teks yang memuat hasil pengamatan objektif secara ilmiah dinamakan teks ....',
                                'explanation' => 'Laporan hasil observasi (LHO).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'observasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Kalimat yang menjelaskan arti suatu istilah disebut kalimat ....',
                                'explanation' => 'Kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'definisi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Satwa kadal purba terbesar di dunia yang dilindungi di NTT adalah ....',
                                'explanation' => 'Komodo.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'komodo', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Makna imbuhan ber-an pada kata "bersalaman" adalah perbuatan ....',
                                'explanation' => 'Saling bersalaman (resiprokal).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'saling', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Teks yang menerangkan hubungan sebab-akibat suatu fenomena alam dinamakan teks ....',
                                'explanation' => 'Teks eksplanasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'eksplanasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Gas utama hasil pembakaran bahan bakar fosil yang memicu pemanasan global adalah karbon ....',
                                'explanation' => 'Karbon dioksida (CO2).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dioksida', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Konjungsi antarkalimat sebab-akibat yang diletakkan di awal kalimat baru adalah oleh karena ....',
                                'explanation' => 'Oleh karena itu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Penggunaan kata-kata bersinonim secara berlebihan dalam satu kalimat disebut ....',
                                'explanation' => 'Pleonasme.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pleonasme', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Sumber energi ramah lingkungan yang berasal dari angin dinamakan energi ....',
                                'explanation' => 'Energi bayu (angin).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bayu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 1 & 2 - Korespondensi & Wawancara]
Sebutkan dan jelaskan tiga perbedaan mendasar antara teks surat dinas resmi dengan teks transkrip wawancara berdasarkan tujuan penulisan, struktur format, dan ragam bahasa yang digunakan!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tujuan Penulisan: Surat dinas resmi bertujuan menyampaikan informasi, undangan, atau permohonan tertulis antarinstansi resmi; sedangkan transkrip wawancara bertujuan mendokumentasikan informasi, pendapat, atau keterangan lisan dari narasumber.
2. Struktur Format: Surat dinas memiliki kop surat, nomor, perihal, alamat, salam, isi, tanda tangan, dan stempel; sedangkan teks wawancara tersusun atas pengantar topik, daftar tanya jawab dialog langsung (atau narasi fakta), dan penutup.
3. Ragam Bahasa: Surat dinas menggunakan ragam bahasa formal-lugas yang sangat hemat kata; sedangkan teks wawancara menggunakan bahasa lisan yang santun, komunikatif, dan interaktif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 3 - Teks Laporan Hasil Observasi]
Sebuah teks LHO harus memenuhi kriteria objektif, faktual, dan sistematis. Jelaskan apa yang dimaksud dengan ketiga kriteria tersebut, serta mengapa opini emosional penulis tidak boleh dimasukkan ke dalam teks LHO!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Objektif: Menyajikan keadaan objek apa adanya sesuai kenyataan lapangan tanpa dipengaruhi perasaan atau keberpihakan pribadi penulis.
2. Faktual: Seluruh informasi yang disajikan didukung oleh bukti nyata, data angka pengamatan, dan fakta ilmiah yang dapat diuji kebenarannya.
3. Sistematis: Disusun secara runtut dan teratur mengikuti struktur baku (definisi umum -> deskripsi bagian -> deskripsi manfaat).
4. Alasan Opini Dilarang: Opini subjektif bersifat dugaan tanpa bukti yang dapat mengaburkan akurasi data ilmiah dan merugikan pihak pembaca yang membutuhkan rujukan fakta terpercaya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 4 - Teks Eksplanasi Fenomena Alam]
Jelaskan proses terjadinya fenomena hujan asam secara berurutan menggunakan konsep sebab-akibat, serta gunakan minimal tiga konjungsi kausalitas yang tepat (seperti: karena, sehingga, akibatnya)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Penjelasan:
"Hujan asam diawali dari pelepasan gas belerang dioksida (SO2) dan nitrogen oksida (NOx) ke udara akibat asap pabrik dan kendaraan bermotor. Gas-gas polutan tersebut bereaksi dengan uap air di atmosfer karena proses fotooksidasi, sehingga membentuk senyawa asam sulfat dan asam nitrat yang pekat. Ketika uap air mengalami kondensasi membentuk awan dan jatuh sebagai presipitasi, air hujan yang turun memiliki tingkat keasaman yang sangat tinggi (pH rendah). Akibatnya, hujan asam tersebut merusak tanaman hutan, mengikis bangunan logam, dan meracuni ekosistem perairan danau."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 4 - Kalimat Efektif & Analisis Kesalahan]
Perbaikilah ketiga kalimat di bawah ini agar menjadi kalimat efektif yang baku, logis, dan hemat kata!
a. Seluruh para peserta lomba daur ulang harap untuk segera memasuki ke dalam ruangan aula.
b. Di dalam penelitian itu membuktikan tentang adanya kandungan mikroplastik pada ikan laut.
c. Kegiatan konservasi meliputi penanaman pohon mangrove, pembersihan pantai, dan mendaur ulang botol plastik.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Seluruh peserta lomba daur ulang harap segera memasuki ruangan aula." (Hapus para, ke dalam).
b. Perbaikan: "Penelitian itu membuktikan adanya kandungan mikroplastik pada ikan laut." (Hapus Di dalam dan tentang).
c. Perbaikan: "Kegiatan konservasi meliputi penanaman pohon mangrove, pembersihan pantai, dan pendaurulangan botol plastik." (Ubah mendaur ulang menjadi pendaurulangan agar sejajar berkonfiks pe-an).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 2 & 3 - Gaya Bahasa & Morfologi]
Buatlah sebuah paragraf narasi orisinal (4-5 kalimat) yang menceritakan pelepasan tukik penyu di pantai yang memuat:
a. Satu majas personifikasi
b. Satu majas asosiasi (menggunakan kata "bagai" atau "laksana")
c. Dua kata berimbuhan ber-an yang bermakna jamak atau resiprokal!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Paragraf:
"Sore itu, ratusan anak penyu hijau mulai bergerak lincah di hamparan pasir Pantai Pangumbahan. Ombak laut berkejaran mencium bibir pantai seakan memanggil mereka untuk segera pulang ke samudra luas (majas personifikasi). Gerakan langkah kaki-kaki mungil tukik itu sangat gesit laksana ksatria kecil yang siap menaklukkan lautan biru (majas asosiasi). Rombongan tukik tersebut berjalan beriringan menuju deburan ombak, sementara burung-burung camar beterbangan di langit senja menyaksikan momen perpisahan yang mengharukan itu (kata beriringan dan beterbangan berimbuhan ber-an). Para pengunjung sekolah bertepuk tangan haru melepas kepergian mereka."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Semester 1 (ASAS 1) Bahasa Indonesia Kelas 6 - Paket B',
                'type' => 'exam',
                'description' => 'Ujian akhir semester ganjil (Paket B): Pengujian komprehensif Bab 1 s.d. Bab 4 mencakup analisis laporan observasi satwa liar, penalaran kritis infografis, kalimat efektif, dan sintaksis kausalitas.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Observasi Penyelamatan Orangutan di Taman Nasional Tanjung Puting', 'content' => '[Keterangan Gambar: Induk orangutan kalimantan (*Pongo pygmaeus*) sedang menggendong anaknya bergelantungan di tajuk kanopi pohon ulin raksasa di tepi Sungai Sekonyer, Kalimantan Tengah.]

Taman Nasional Tanjung Puting di Kalimantan Tengah merupakan pusat rehabilitasi dan konservasi orangutan terbesar di dunia. Orangutan adalah satwa arboreal primata sejati yang menghabiskan hampir 90 persen hidupnya di atas kanopi pepohonan hutan hujan tropis. Mereka memakan aneka buah-buahan hutan, dedaunan muda, dan kulit kayu. Sebagai pemencar biji alami, orangutan berperan sebagai "petani hutan" yang menjaga kelangsungan regenerasi pohon-pohon endemik. Ancaman deforestasi dan kebakaran lahan gambut menuntut patroli perlindungan ketat dari petugas polisi kehutanan bersama masyarakat adat sekitar.'],
                            ['title' => 'Stimulus 2: Infografis Bahaya Sampah Plastik terhadap Biota Laut', 'content' => '[Keterangan Gambar: Infografis diagram lingkaran persentase jenis sampah laut di perairan Indonesia: Plastik sekali pakai (58%), Logam dan kaca (14%), Kayu dan organik (16%), Karet dan tekstil (12%). Infografis menunjukkan gambar penyu menelan kantong plastik karena mengiranya ubur-ubur.]

Lautan Indonesia kini menghadapi ancaman darurat polusi plastik. Menurut data riset kelautan tahun 2026, sampah plastik sekali pakai mendominasi lebih dari separuh (58%) total timbulan sampah laut nasional. Plastik tidak dapat terurai secara biologis, melainkan terpecah menjadi partikel mikroplastik beracun yang tertelan oleh ikan, kerang, dan mamalia laut. Penyu laut sering salah mengira kantong kresek terapung sebagai mangsa ubur-ubur, sehingga menyumbat saluran pencernaan dan menyebabkan kematian tragis. Upaya pengendalian sampah plastik melalui kampanye 3R (Reduce, Reuse, Recycle) mutlak dilaksanakan sejak bangku sekolah dasar.'],
                            ['title' => 'Stimulus 3: Surat Undangan Sosialisasi Aksi Iklim Sekolah Adiwiyata', 'content' => '[Keterangan Gambar: Surat resmi berkop sekolah Adiwiyata Nasional Mandiri "SD TUNAS HARAPAN", bernomor dinas, perihal permohonan narasumber workshop hemat energi, bertanggal resmi, dan ditandatangani kepala sekolah.]

Nomor : 088/SD-TH/XI/2026
Hal : Permohonan Narasumber Sosialisasi Iklim

Yth. Direktur Komunitas Generasi Energi Bersih
Jalan Teratai Putih No. 12, Bandung

Dengan hormat,
Dalam rangka mewujudkan program Sekolah Adiwiyata Mandiri serta membekali siswa kelas 6 dengan kecakapan literasi iklim, kami bermaksud mengadakan Lokakarya Cilik "Aksi Cerdas Hemat Energi di Sekolah dan Rumah". Kegiatan ini bertujuan memotivasi para siswa agar mampu menerapkan gaya hidup rendah emisi karbon sejak dini.

Sehubungan dengan hal tersebut, kami memohon kesediaan Bapak/Ibu untuk menjadi narasumber pada kegiatan yang akan diselenggarakan pada:
hari, tanggal : Kamis, 12 November 2026
waktu : pukul 09.00 - 12.00 WIB
tempat : Aula Serbaguna SD Tunas Harapan

Demikian permohonan ini kami sampaikan. Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.

Hormat kami,
Kepala Sekolah,
Hj. Siti Rahmah, M.Pd.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, sebutan "petani hutan" disematkan kepada orangutan karena perannya sebagai ....',
                                'explanation' => 'Dalam teks: "Sebagai pemencar biji alami, orangutan berperan sebagai petani hutan..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pemencar biji buah-buahan alami yang menjaga regenerasi pohon hutan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hewan pemakan serangga perusak tanaman pertanian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penjaga batas wilayah hutan adat masyarakat desa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hewan yang membantu membajak sawah penduduk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebagian besar waktu hidup orangutan (hampir 90%) dihabiskan di ....',
                                'explanation' => 'Orangutan hidup di atas kanopi pohon (satwa arboreal).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Atas kanopi pepohonan hutan hujan tropis (arboreal)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dalam liang tanah bawah pohon ulin', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Di dasar perairan Sungai Sekonyer', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Di padang rumput savana terbuka', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ancaman utama terhadap kelestarian orangutan di alam liar!',
                                'explanation' => 'Deforestasi dan kebakaran lahan gambut adalah ancaman kelestarian orangutan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Deforestasi atau penebangan hutan hujan secara liar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kebakaran lahan gambut saat musim kemarau', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kelebihan pasokan buah-buahan manis di hutan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hujan rintik-rintik di pedalaman Kalimantan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek ekologis orangutan dengan keterangannya!',
                                'explanation' => 'Pasangan fakta ekologi orangutan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nama Ilmiah', 'is_correct' => false, 'match_key' => 'Pongo pygmaeus', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sifat Hidup', 'is_correct' => false, 'match_key' => 'Satwa arboreal (di atas kanopi pohon)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Makanan Pokok', 'is_correct' => false, 'match_key' => 'Buah hutan, pucuk daun, dan kulit kayu', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Pusat Rehabilitasi', 'is_correct' => false, 'match_key' => 'Taman Nasional Tanjung Puting', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan data infografis, persentase sampah plastik sekali pakai di laut Indonesia mencapai ....',
                                'explanation' => 'Plastik sekali pakai mendominasi 58% sampah laut.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '58%', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '14%', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '16%', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alasan penyu laut sering menelan kantong kresek plastik adalah ....',
                                'explanation' => 'Penyu mengira kantong kresek transparan sebagai ubur-ubur.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penyu mengira kantong plastik terapung sebagai ubur-ubur mangsanya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penyu menyukai aroma harum dari bahan kimia plastik', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Plastik membantu proses pencernaan cangkang penyu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Plastik terapung di permukaan air laut sangat berkilau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran data pencemaran laut!',
                                'explanation' => 'Mikroplastik sangat beracun dan membahayakan rantai makanan laut.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Plastik sekali pakai merupakan jenis sampah terbanyak di perairan Indonesia.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Partikel mikroplastik tidak berbahaya jika tertelan oleh ikan laut.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kampanye 3R bertujuan mengurangi timbulan sampah plastik dari sumbernya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Prinsip 3R yang berarti mengurangi pemakaian barang pemicu sampah adalah prinsip ....',
                                'explanation' => 'Reduce bermakna mengurangi penggunaan barang pemicu timbulan sampah.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Reduce (mengurangi)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Reuse (menggunakan kembali)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Recycle (mendaur ulang)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Replace (mengganti)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama penyelenggaraan lokakarya iklim di SD Tunas Harapan adalah ....',
                                'explanation' => 'Tujuannya membekali siswa kecakapan literasi iklim dan hidup hemat energi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membekali siswa kelas 6 kecakapan literasi iklim dan hidup hemat energi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjual peralatan listrik tenaga surya impor kepada orang tua siswa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengumpulkan dana bantuan pembangunan gedung laboratorium baru', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengisi waktu kosong saat guru-guru sedang berlibur keluar kota', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat penutup surat resmi di atas yang benar dan santun adalah ....',
                                'explanation' => 'Penutup resmi santun dan efektif: "Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih."',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Demikian permohonan ini kami sampaikan. Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sekian dulu permohonan kami, tolong cepat dibalas ya.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Atas perhatiannya yang sangat banyak sekali diucapkan terima kasih.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Demikian surat ini dibuat agar narasumber tidak menolak hadir.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur surat resmi di atas!',
                                'explanation' => 'Rincian hari, waktu, tempat dalam rincian surat diawali huruf kecil jika merupakan lanjutan kalimat.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Surat tersebut ditujukan kepada Direktur Komunitas Generasi Energi Bersih.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kegiatan lokakarya dilaksanakan pada hari Sabtu malam hari.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Penulisan nama hari dan tanggal menggunakan huruf kecil pada awal kata di rincian jadwal.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur identitas instansi yang wajib tercantum dalam kop surat resmi!',
                                'explanation' => 'Kop surat wajib memuat nama lembaga, logo, alamat, dan kontak.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nama lembaga/sekolah dan logo resmi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Alamat lengkap dan kontak telepon/surel lembaga', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nama seluruh siswa yang bersekolah di sana', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Daftar menu makanan kantin sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 1] Surat yang dikirim oleh seorang siswa kepada temannya untuk menceritakan liburan termasuk jenis surat ....',
                                'explanation' => 'Surat pribadi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pribadi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dinas resmi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Niaga komersial', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Surat keputusan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 1] Bagian surat resmi yang berfungsi menunjukkan nomor pencatatan agenda surat keluar disebut ....',
                                'explanation' => 'Nomor surat mencatat agenda surat keluar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nomor surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Lampiran', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perihal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Alamat tujuan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Kata tanya yang paling tepat untuk menggali proses terjadinya peristiwa dalam wawancara adalah ....',
                                'explanation' => 'Bagaimana menanyakan proses.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bagaimana', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Siapa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berapa', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Bentuk baku dari kata serapan asing "aktifitet" menurut KBBI adalah ....',
                                'explanation' => 'Baku: aktivitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Aktivitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Aktifitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Aktifitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Aktiv', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Majas yang melukiskan benda mati seolah-olah bertingkah laku seperti manusia disebut majas ....',
                                'explanation' => 'Personifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Personifikasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Metafora', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Kalimat: "Dewi malam menyinari bumi nusantara yang permai" menggunakan majas ....',
                                'explanation' => 'Dewi malam adalah metafora untuk bulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Asosiasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Bagian pembuka teks Laporan Hasil Observasi yang memuat pengenalan umum objek dinamakan ....',
                                'explanation' => 'Pernyataan umum.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pernyataan umum / definisi umum', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Deskripsi bagian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Deskripsi manfaat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Simpulan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Kalimat berikut yang merupakan kalimat definisi dalam teks LHO adalah ....',
                                'explanation' => 'Kata "adalah" menandai kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hutan bakau adalah ekosistem tumbuhan pantai yang tahan terhadap kadar garam tinggi.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Akar bakau menjulur di atas lumpur pantai.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak kepiting berjalan di antara akar bakau.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hutan bakau tampak sangat rindang di kejauhan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Kata berimbuhan ber-an pada kalimat "Mereka bersalaman di panggung" bermakna ....',
                                'explanation' => 'Bersalaman bermakna saling bersalaman.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Saling melakukan perbuatan (resiprokal)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Banyak benda bertaburan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyerupai benda tajam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Melakukan pekerjaan untuk orang lain', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Teks yang memaparkan proses terjadinya fenomena alam berdasarkan sebab-akibat disebut teks ....',
                                'explanation' => 'Teks eksplanasi ilmiah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Eksplanasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Narasi fiksi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Deskripsi subjektif', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prosedur', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 & 2] Pilihlah DUA ciri utama surat dinas resmi!',
                                'explanation' => 'Surat dinas memakai kop surat, stempel, dan bahasa baku hemat kata.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan kepala (kop) surat dan stempel resmi instansi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menggunakan ragam bahasa baku dan hemat kata sesuai PUEBI', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggunakan kata-kata gaul dan emotikon lucu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tidak mencantumkan tanggal penulisan surat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 3 & 4] Pilihlah DUA konjungsi kausalitas sebab-akibat!',
                                'explanation' => 'Karena dan sehingga adalah konjungsi kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Karena', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sehingga', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Atau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Pilihlah DUA contoh kalimat efektif yang baku!',
                                'explanation' => 'Kalimat A dan B efektif. Kalimat C dan D mubazir/rancu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Para siswa menanam pohon di pekarangan sekolah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pemerintah meresmikan kawasan suaka margasatwa baru.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Semua para siswa-siswa berkumpul di aula.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Buku itu saya sudah membacanya kemarin.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 s.d. 4] Pasangkan istilah kebahasaan dengan contoh katanya!',
                                'explanation' => 'Pasangan ragam istilah kebahasaan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata Serapan Baku', 'is_correct' => false, 'match_key' => 'Kualitas, sistem, teknik', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Majas Personifikasi', 'is_correct' => false, 'match_key' => 'Angin berbisik menyampaikan salam', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konjungsi Kausalitas', 'is_correct' => false, 'match_key' => 'Oleh karena itu, sehingga, karena', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kata Berimbuhan ber-an', 'is_correct' => false, 'match_key' => 'Beterbangan, berserakan, bersalaman', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Pasangkan nama taman nasional dengan lokasinya di Indonesia!',
                                'explanation' => 'Pasangan taman nasional dan provinsinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Taman Nasional Komodo', 'is_correct' => false, 'match_key' => 'Nusa Tenggara Timur', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Taman Nasional Ujung Kulon', 'is_correct' => false, 'match_key' => 'Banten (Jawa Barat)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Taman Nasional Tanjung Puting', 'is_correct' => false, 'match_key' => 'Kalimantan Tengah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Taman Nasional Gunung Leuser', 'is_correct' => false, 'match_key' => 'Aceh dan Sumatra Utara', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Pasangkan istilah sains iklim dengan definisinya!',
                                'explanation' => 'Pasangan istilah sains lingkungan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Deforestasi', 'is_correct' => false, 'match_key' => 'Penebangan hutan secara masif', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Reboisasi', 'is_correct' => false, 'match_key' => 'Penanaman kembali hutan yang gundul', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Emisi Karbon', 'is_correct' => false, 'match_key' => 'Gas buang pembakaran bahan bakar fosil', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mikroplastik', 'is_correct' => false, 'match_key' => 'Partikel plastik renik berbahaya di lautan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 s.d. 4] Tentukan status kebenaran pernyataan tata bahasa!',
                                'explanation' => 'Kata serapan adaptasi disesuaikan ejaannya dengan kaidah bahasa Indonesia.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kalimat majemuk setara menghubungkan dua klausa yang berkedudukan setara.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata serapan adaptasi tidak mengalami penyesuaian ejaan sama sekali.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks LHO disusun berdasarkan fakta hasil pengamatan langsung di lapangan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Tentukan status kebenaran kalimat efektif!',
                                'explanation' => 'Pleonasme harus dihindari dalam kalimat efektif.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prinsip pleonasme adalah prinsip yang dianjurkan dalam kalimat efektif.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kesejajaran bentuk (paralelisme) membuat kalimat perincian menjadi teratur.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kalimat: "Waktu dan tempat kami persilakan" merupakan contoh kalimat tidak logis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => '[Bab 1] Lembar isian untuk mendaftar suatu kegiatan formal disebut ....',
                                'explanation' => 'Formulir pendaftaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'formulir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 1] Bagian surat resmi yang memuat nomor, lampiran, dan hal terletak di bagian ....',
                                'explanation' => 'Kepala / kop surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kepala', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Orang yang diwawancarai untuk dimintai keterangan disebut ....',
                                'explanation' => 'Narasumber.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'narasumber', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Bentuk baku dari kata serapan "praktek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: praktik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'praktik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Majas yang melebih-lebihkan kenyataan agar terdengar luar biasa disebut majas ....',
                                'explanation' => 'Hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hiperbola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Kata kiasan langsung tanpa kata pembanding dinamakan majas ....',
                                'explanation' => 'Metafora.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Teks yang memuat hasil pengamatan objektif secara ilmiah dinamakan teks ....',
                                'explanation' => 'Laporan hasil observasi (LHO).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'observasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Kalimat yang menjelaskan arti suatu istilah disebut kalimat ....',
                                'explanation' => 'Kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'definisi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Satwa kadal purba terbesar di dunia yang dilindungi di NTT adalah ....',
                                'explanation' => 'Komodo.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'komodo', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Makna imbuhan ber-an pada kata "bersalaman" adalah perbuatan ....',
                                'explanation' => 'Saling bersalaman (resiprokal).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'saling', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Teks yang menerangkan hubungan sebab-akibat suatu fenomena alam dinamakan teks ....',
                                'explanation' => 'Teks eksplanasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'eksplanasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Gas utama hasil pembakaran bahan bakar fosil yang memicu pemanasan global adalah karbon ....',
                                'explanation' => 'Karbon dioksida (CO2).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dioksida', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Konjungsi antarkalimat sebab-akibat yang diletakkan di awal kalimat baru adalah oleh karena ....',
                                'explanation' => 'Oleh karena itu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Penggunaan kata-kata bersinonim secara berlebihan dalam satu kalimat disebut ....',
                                'explanation' => 'Pleonasme.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pleonasme', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Sumber energi ramah lingkungan yang berasal dari angin dinamakan energi ....',
                                'explanation' => 'Energi bayu (angin).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bayu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 1 & 2 - Korespondensi & Wawancara]
Sebutkan dan jelaskan tiga perbedaan mendasar antara teks surat dinas resmi dengan teks transkrip wawancara berdasarkan tujuan penulisan, struktur format, dan ragam bahasa yang digunakan!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tujuan Penulisan: Surat dinas resmi bertujuan menyampaikan informasi, undangan, atau permohonan tertulis antarinstansi resmi; sedangkan transkrip wawancara bertujuan mendokumentasikan informasi, pendapat, atau keterangan lisan dari narasumber.
2. Struktur Format: Surat dinas memiliki kop surat, nomor, perihal, alamat, salam, isi, tanda tangan, dan stempel; sedangkan teks wawancara tersusun atas pengantar topik, daftar tanya jawab dialog langsung (atau narasi fakta), dan penutup.
3. Ragam Bahasa: Surat dinas menggunakan ragam bahasa formal-lugas yang sangat hemat kata; sedangkan teks wawancara menggunakan bahasa lisan yang santun, komunikatif, dan interaktif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 3 - Teks Laporan Hasil Observasi]
Sebuah teks LHO harus memenuhi kriteria objektif, faktual, dan sistematis. Jelaskan apa yang dimaksud dengan ketiga kriteria tersebut, serta mengapa opini emosional penulis tidak boleh dimasukkan ke dalam teks LHO!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Objektif: Menyajikan keadaan objek apa adanya sesuai kenyataan lapangan tanpa dipengaruhi perasaan atau keberpihakan pribadi penulis.
2. Faktual: Seluruh informasi yang disajikan didukung oleh bukti nyata, data angka pengamatan, dan fakta ilmiah yang dapat diuji kebenarannya.
3. Sistematis: Disusun secara runtut dan teratur mengikuti struktur baku (definisi umum -> deskripsi bagian -> deskripsi manfaat).
4. Alasan Opini Dilarang: Opini subjektif bersifat dugaan tanpa bukti yang dapat mengaburkan akurasi data ilmiah dan merugikan pihak pembaca yang membutuhkan rujukan fakta terpercaya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 4 - Teks Eksplanasi Fenomena Alam]
Jelaskan proses terjadinya fenomena hujan asam secara berurutan menggunakan konsep sebab-akibat, serta gunakan minimal tiga konjungsi kausalitas yang tepat (seperti: karena, sehingga, akibatnya)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Penjelasan:
"Hujan asam diawali dari pelepasan gas belerang dioksida (SO2) dan nitrogen oksida (NOx) ke udara akibat asap pabrik dan kendaraan bermotor. Gas-gas polutan tersebut bereaksi dengan uap air di atmosfer karena proses fotooksidasi, sehingga membentuk senyawa asam sulfat dan asam nitrat yang pekat. Ketika uap air mengalami kondensasi membentuk awan dan jatuh sebagai presipitasi, air hujan yang turun memiliki tingkat keasaman yang sangat tinggi (pH rendah). Akibatnya, hujan asam tersebut merusak tanaman hutan, mengikis bangunan logam, dan meracuni ekosistem perairan danau."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 4 - Kalimat Efektif & Analisis Kesalahan]
Perbaikilah ketiga kalimat di bawah ini agar menjadi kalimat efektif yang baku, logis, dan hemat kata!
a. Seluruh para peserta lomba daur ulang harap untuk segera memasuki ke dalam ruangan aula.
b. Di dalam penelitian itu membuktikan tentang adanya kandungan mikroplastik pada ikan laut.
c. Kegiatan konservasi meliputi penanaman pohon mangrove, pembersihan pantai, dan mendaur ulang botol plastik.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Seluruh peserta lomba daur ulang harap segera memasuki ruangan aula." (Hapus para, ke dalam).
b. Perbaikan: "Penelitian itu membuktikan adanya kandungan mikroplastik pada ikan laut." (Hapus Di dalam dan tentang).
c. Perbaikan: "Kegiatan konservasi meliputi penanaman pohon mangrove, pembersihan pantai, dan pendaurulangan botol plastik." (Ubah mendaur ulang menjadi pendaurulangan agar sejajar berkonfiks pe-an).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 2 & 3 - Gaya Bahasa & Morfologi]
Buatlah sebuah paragraf narasi orisinal (4-5 kalimat) yang menceritakan pelepasan tukik penyu di pantai yang memuat:
a. Satu majas personifikasi
b. Satu majas asosiasi (menggunakan kata "bagai" atau "laksana")
c. Dua kata berimbuhan ber-an yang bermakna jamak atau resiprokal!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Paragraf:
"Sore itu, ratusan anak penyu hijau mulai bergerak lincah di hamparan pasir Pantai Pangumbahan. Ombak laut berkejaran mencium bibir pantai seakan memanggil mereka untuk segera pulang ke samudra luas (majas personifikasi). Gerakan langkah kaki-kaki mungil tukik itu sangat gesit laksana ksatria kecil yang siap menaklukkan lautan biru (majas asosiasi). Rombongan tukik tersebut berjalan beriringan menuju deburan ombak, sementara burung-burung camar beterbangan di langit senja menyaksikan momen perpisahan yang mengharukan itu (kata beriringan dan beterbangan berimbuhan ber-an). Para pengunjung sekolah bertepuk tangan haru melepas kepergian mereka."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Semester 1 (ASAS 1) Bahasa Indonesia Kelas 6 - Paket C',
                'type' => 'exam',
                'description' => 'Ujian akhir semester ganjil (Paket C): Evaluasi menyeluruh Bab 1 sampai Bab 4 untuk menguji daya serap kompetensi literasi membaca teks eksposisi, korespondensi resmi, kalimat efektif, dan kaidah morfologi PUEBI.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Laporan Observasi Keanekaragaman Terumbu Karang Raja Ampat', 'content' => '[Keterangan Gambar: Ekosistem terumbu karang warna-warni di perairan dangkal Kepulauan Raja Ampat, Papua Barat Daya: aneka terumbu karang keras dan karang lunak dikelilingi ribuan ikan badut dan penyu sisik.]

Kepulauan Raja Ampat di Papua Barat Daya dikenal sebagai "Jantung Segitiga Terumbu Karang Dunia" (*Coral Triangle*). Kawasan laut ini menampung lebih dari 75 persen spesies karang dunia dan lebih dari 1.400 jenis ikan karang. Terumbu karang adalah ekosistem bawah laut yang dibangun oleh koloni hewan-hewan kecil karang (polip) yang bersimbiosis dengan alga bersel satu *zooxanthellae*. Selain menjadi benteng pemecah ombak alami yang melindungi pantai dari abrasi, terumbu karang menyediakan habitat pemijahan dan pembesaran bagi ikan konsumsi bernilai ekonomi tinggi. Ancaman kenaikan suhu air laut global memicu pemutihan karang (*coral bleaching*) yang harus diwaspadai melalui kawasan konservasi perairan daerah.'],
                            ['title' => 'Stimulus 2: Infografis Bahaya Sampah Plastik terhadap Biota Laut', 'content' => '[Keterangan Gambar: Infografis diagram lingkaran persentase jenis sampah laut di perairan Indonesia: Plastik sekali pakai (58%), Logam dan kaca (14%), Kayu dan organik (16%), Karet dan tekstil (12%). Infografis menunjukkan gambar penyu menelan kantong plastik karena mengiranya ubur-ubur.]

Lautan Indonesia kini menghadapi ancaman darurat polusi plastik. Menurut data riset kelautan tahun 2026, sampah plastik sekali pakai mendominasi lebih dari separuh (58%) total timbulan sampah laut nasional. Plastik tidak dapat terurai secara biologis, melainkan terpecah menjadi partikel mikroplastik beracun yang tertelan oleh ikan, kerang, dan mamalia laut. Penyu laut sering salah mengira kantong kresek terapung sebagai mangsa ubur-ubur, sehingga menyumbat saluran pencernaan dan menyebabkan kematian tragis. Upaya pengendalian sampah plastik melalui kampanye 3R (Reduce, Reuse, Recycle) mutlak dilaksanakan sejak bangku sekolah dasar.'],
                            ['title' => 'Stimulus 3: Surat Undangan Sosialisasi Aksi Iklim Sekolah Adiwiyata', 'content' => '[Keterangan Gambar: Surat resmi berkop sekolah Adiwiyata Nasional Mandiri "SD TUNAS HARAPAN", bernomor dinas, perihal permohonan narasumber workshop hemat energi, bertanggal resmi, dan ditandatangani kepala sekolah.]

Nomor : 088/SD-TH/XI/2026
Hal : Permohonan Narasumber Sosialisasi Iklim

Yth. Direktur Komunitas Generasi Energi Bersih
Jalan Teratai Putih No. 12, Bandung

Dengan hormat,
Dalam rangka mewujudkan program Sekolah Adiwiyata Mandiri serta membekali siswa kelas 6 dengan kecakapan literasi iklim, kami bermaksud mengadakan Lokakarya Cilik "Aksi Cerdas Hemat Energi di Sekolah dan Rumah". Kegiatan ini bertujuan memotivasi para siswa agar mampu menerapkan gaya hidup rendah emisi karbon sejak dini.

Sehubungan dengan hal tersebut, kami memohon kesediaan Bapak/Ibu untuk menjadi narasumber pada kegiatan yang akan diselenggarakan pada:
hari, tanggal : Kamis, 12 November 2026
waktu : pukul 09.00 - 12.00 WIB
tempat : Aula Serbaguna SD Tunas Harapan

Demikian permohonan ini kami sampaikan. Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.

Hormat kami,
Kepala Sekolah,
Hj. Siti Rahmah, M.Pd.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks Stimulus 1, organisme kecil yang membangun koloni terumbu karang adalah ....',
                                'explanation' => 'Dalam teks: "dibangun oleh koloni hewan-hewan kecil karang (polip) yang bersimbiosis dengan alga..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Polip hewan karang yang bersimbiosis dengan alga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ubur-ubur raksasa beracun di dasar laut', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bintang laut berduri pemakan karang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lumut kerak di bebatuan karang kering', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Fenomena memutihnya terumbu karang akibat kenaikan suhu air laut ekstrem disebut ....',
                                'explanation' => 'Fenomena tersebut disebut coral bleaching.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Coral bleaching (pemutihan karang)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Abrasi pantai laut pasang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Eutrofikasi perairan dangkal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sedimentasi muara sungai', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA manfaat terumbu karang bagi ekosistem pesisir!',
                                'explanation' => 'Pemecah ombak alami dan habitat pemijahan ikan karang.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Benteng pemecah ombak alami pencegah abrasi pantai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tempat pemijahan dan pembesaran aneka ikan karang', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sumber bahan bakar minyak mentah bagi kapal laut', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tempat pembuangan limbah industri kimia', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek ekologi Raja Ampat dengan keterangannya!',
                                'explanation' => 'Pasangan fakta ekosistem laut Raja Ampat.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Julukan Kawasan', 'is_correct' => false, 'match_key' => 'Jantung Segitiga Terumbu Karang Dunia', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kekayaan Karang', 'is_correct' => false, 'match_key' => 'Menampung 75% spesies karang dunia', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mitra Simbiosis Polip', 'is_correct' => false, 'match_key' => 'Alga bersel satu zooxanthellae', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ancaman Suhu Laut', 'is_correct' => false, 'match_key' => 'Pemutihan karang (coral bleaching)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan data infografis, persentase sampah plastik sekali pakai di laut Indonesia mencapai ....',
                                'explanation' => 'Plastik sekali pakai mendominasi 58% sampah laut.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '58%', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '14%', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '16%', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alasan penyu laut sering menelan kantong kresek plastik adalah ....',
                                'explanation' => 'Penyu mengira kantong kresek transparan sebagai ubur-ubur.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penyu mengira kantong plastik terapung sebagai ubur-ubur mangsanya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penyu menyukai aroma harum dari bahan kimia plastik', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Plastik membantu proses pencernaan cangkang penyu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Plastik terapung di permukaan air laut sangat berkilau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran data pencemaran laut!',
                                'explanation' => 'Mikroplastik sangat beracun dan membahayakan rantai makanan laut.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Plastik sekali pakai merupakan jenis sampah terbanyak di perairan Indonesia.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Partikel mikroplastik tidak berbahaya jika tertelan oleh ikan laut.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kampanye 3R bertujuan mengurangi timbulan sampah plastik dari sumbernya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Prinsip 3R yang berarti mengurangi pemakaian barang pemicu sampah adalah prinsip ....',
                                'explanation' => 'Reduce bermakna mengurangi penggunaan barang pemicu timbulan sampah.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Reduce (mengurangi)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Reuse (menggunakan kembali)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Recycle (mendaur ulang)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Replace (mengganti)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama penyelenggaraan lokakarya iklim di SD Tunas Harapan adalah ....',
                                'explanation' => 'Tujuannya membekali siswa kecakapan literasi iklim dan hidup hemat energi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membekali siswa kelas 6 kecakapan literasi iklim dan hidup hemat energi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjual peralatan listrik tenaga surya impor kepada orang tua siswa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengumpulkan dana bantuan pembangunan gedung laboratorium baru', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengisi waktu kosong saat guru-guru sedang berlibur keluar kota', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat penutup surat resmi di atas yang benar dan santun adalah ....',
                                'explanation' => 'Penutup resmi santun dan efektif: "Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih."',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Demikian permohonan ini kami sampaikan. Atas kesediaan dan kerja sama Bapak/Ibu, kami ucapkan terima kasih.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sekian dulu permohonan kami, tolong cepat dibalas ya.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Atas perhatiannya yang sangat banyak sekali diucapkan terima kasih.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Demikian surat ini dibuat agar narasumber tidak menolak hadir.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur surat resmi di atas!',
                                'explanation' => 'Rincian hari, waktu, tempat dalam rincian surat diawali huruf kecil jika merupakan lanjutan kalimat.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Surat tersebut ditujukan kepada Direktur Komunitas Generasi Energi Bersih.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kegiatan lokakarya dilaksanakan pada hari Sabtu malam hari.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Penulisan nama hari dan tanggal menggunakan huruf kecil pada awal kata di rincian jadwal.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur identitas instansi yang wajib tercantum dalam kop surat resmi!',
                                'explanation' => 'Kop surat wajib memuat nama lembaga, logo, alamat, dan kontak.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nama lembaga/sekolah dan logo resmi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Alamat lengkap dan kontak telepon/surel lembaga', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nama seluruh siswa yang bersekolah di sana', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Daftar menu makanan kantin sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 1] Surat yang dikirim oleh seorang siswa kepada temannya untuk menceritakan liburan termasuk jenis surat ....',
                                'explanation' => 'Surat pribadi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pribadi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dinas resmi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Niaga komersial', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Surat keputusan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 1] Bagian surat resmi yang berfungsi menunjukkan nomor pencatatan agenda surat keluar disebut ....',
                                'explanation' => 'Nomor surat mencatat agenda surat keluar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nomor surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Lampiran', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perihal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Alamat tujuan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Kata tanya yang paling tepat untuk menggali proses terjadinya peristiwa dalam wawancara adalah ....',
                                'explanation' => 'Bagaimana menanyakan proses.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bagaimana', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Siapa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berapa', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Bentuk baku dari kata serapan asing "aktifitet" menurut KBBI adalah ....',
                                'explanation' => 'Baku: aktivitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Aktivitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Aktifitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Aktifitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Aktiv', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Majas yang melukiskan benda mati seolah-olah bertingkah laku seperti manusia disebut majas ....',
                                'explanation' => 'Personifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Personifikasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Metafora', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 2] Kalimat: "Dewi malam menyinari bumi nusantara yang permai" menggunakan majas ....',
                                'explanation' => 'Dewi malam adalah metafora untuk bulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Asosiasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Bagian pembuka teks Laporan Hasil Observasi yang memuat pengenalan umum objek dinamakan ....',
                                'explanation' => 'Pernyataan umum.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pernyataan umum / definisi umum', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Deskripsi bagian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Deskripsi manfaat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Simpulan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Kalimat berikut yang merupakan kalimat definisi dalam teks LHO adalah ....',
                                'explanation' => 'Kata "adalah" menandai kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hutan bakau adalah ekosistem tumbuhan pantai yang tahan terhadap kadar garam tinggi.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Akar bakau menjulur di atas lumpur pantai.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak kepiting berjalan di antara akar bakau.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hutan bakau tampak sangat rindang di kejauhan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Kata berimbuhan ber-an pada kalimat "Mereka bersalaman di panggung" bermakna ....',
                                'explanation' => 'Bersalaman bermakna saling bersalaman.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Saling melakukan perbuatan (resiprokal)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Banyak benda bertaburan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyerupai benda tajam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Melakukan pekerjaan untuk orang lain', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Teks yang memaparkan proses terjadinya fenomena alam berdasarkan sebab-akibat disebut teks ....',
                                'explanation' => 'Teks eksplanasi ilmiah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Eksplanasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Narasi fiksi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Deskripsi subjektif', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prosedur', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 & 2] Pilihlah DUA ciri utama surat dinas resmi!',
                                'explanation' => 'Surat dinas memakai kop surat, stempel, dan bahasa baku hemat kata.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan kepala (kop) surat dan stempel resmi instansi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menggunakan ragam bahasa baku dan hemat kata sesuai PUEBI', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggunakan kata-kata gaul dan emotikon lucu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tidak mencantumkan tanggal penulisan surat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 3 & 4] Pilihlah DUA konjungsi kausalitas sebab-akibat!',
                                'explanation' => 'Karena dan sehingga adalah konjungsi kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Karena', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sehingga', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Atau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Pilihlah DUA contoh kalimat efektif yang baku!',
                                'explanation' => 'Kalimat A dan B efektif. Kalimat C dan D mubazir/rancu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Para siswa menanam pohon di pekarangan sekolah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pemerintah meresmikan kawasan suaka margasatwa baru.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Semua para siswa-siswa berkumpul di aula.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Buku itu saya sudah membacanya kemarin.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 s.d. 4] Pasangkan istilah kebahasaan dengan contoh katanya!',
                                'explanation' => 'Pasangan ragam istilah kebahasaan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata Serapan Baku', 'is_correct' => false, 'match_key' => 'Kualitas, sistem, teknik', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Majas Personifikasi', 'is_correct' => false, 'match_key' => 'Angin berbisik menyampaikan salam', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konjungsi Kausalitas', 'is_correct' => false, 'match_key' => 'Oleh karena itu, sehingga, karena', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kata Berimbuhan ber-an', 'is_correct' => false, 'match_key' => 'Beterbangan, berserakan, bersalaman', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 3] Pasangkan nama taman nasional dengan lokasinya di Indonesia!',
                                'explanation' => 'Pasangan taman nasional dan provinsinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Taman Nasional Komodo', 'is_correct' => false, 'match_key' => 'Nusa Tenggara Timur', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Taman Nasional Ujung Kulon', 'is_correct' => false, 'match_key' => 'Banten (Jawa Barat)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Taman Nasional Tanjung Puting', 'is_correct' => false, 'match_key' => 'Kalimantan Tengah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Taman Nasional Gunung Leuser', 'is_correct' => false, 'match_key' => 'Aceh dan Sumatra Utara', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Pasangkan istilah sains iklim dengan definisinya!',
                                'explanation' => 'Pasangan istilah sains lingkungan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Deforestasi', 'is_correct' => false, 'match_key' => 'Penebangan hutan secara masif', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Reboisasi', 'is_correct' => false, 'match_key' => 'Penanaman kembali hutan yang gundul', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Emisi Karbon', 'is_correct' => false, 'match_key' => 'Gas buang pembakaran bahan bakar fosil', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mikroplastik', 'is_correct' => false, 'match_key' => 'Partikel plastik renik berbahaya di lautan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Bab 1 s.d. 4] Tentukan status kebenaran pernyataan tata bahasa!',
                                'explanation' => 'Kata serapan adaptasi disesuaikan ejaannya dengan kaidah bahasa Indonesia.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kalimat majemuk setara menghubungkan dua klausa yang berkedudukan setara.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata serapan adaptasi tidak mengalami penyesuaian ejaan sama sekali.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks LHO disusun berdasarkan fakta hasil pengamatan langsung di lapangan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Bab 4] Tentukan status kebenaran kalimat efektif!',
                                'explanation' => 'Pleonasme harus dihindari dalam kalimat efektif.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prinsip pleonasme adalah prinsip yang dianjurkan dalam kalimat efektif.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kesejajaran bentuk (paralelisme) membuat kalimat perincian menjadi teratur.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kalimat: "Waktu dan tempat kami persilakan" merupakan contoh kalimat tidak logis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => '[Bab 1] Lembar isian untuk mendaftar suatu kegiatan formal disebut ....',
                                'explanation' => 'Formulir pendaftaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'formulir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 1] Bagian surat resmi yang memuat nomor, lampiran, dan hal terletak di bagian ....',
                                'explanation' => 'Kepala / kop surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kepala', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Orang yang diwawancarai untuk dimintai keterangan disebut ....',
                                'explanation' => 'Narasumber.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'narasumber', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Bentuk baku dari kata serapan "praktek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: praktik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'praktik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Majas yang melebih-lebihkan kenyataan agar terdengar luar biasa disebut majas ....',
                                'explanation' => 'Hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hiperbola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 2] Kata kiasan langsung tanpa kata pembanding dinamakan majas ....',
                                'explanation' => 'Metafora.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Teks yang memuat hasil pengamatan objektif secara ilmiah dinamakan teks ....',
                                'explanation' => 'Laporan hasil observasi (LHO).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'observasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Kalimat yang menjelaskan arti suatu istilah disebut kalimat ....',
                                'explanation' => 'Kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'definisi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Satwa kadal purba terbesar di dunia yang dilindungi di NTT adalah ....',
                                'explanation' => 'Komodo.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'komodo', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 3] Makna imbuhan ber-an pada kata "bersalaman" adalah perbuatan ....',
                                'explanation' => 'Saling bersalaman (resiprokal).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'saling', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Teks yang menerangkan hubungan sebab-akibat suatu fenomena alam dinamakan teks ....',
                                'explanation' => 'Teks eksplanasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'eksplanasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Gas utama hasil pembakaran bahan bakar fosil yang memicu pemanasan global adalah karbon ....',
                                'explanation' => 'Karbon dioksida (CO2).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dioksida', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Konjungsi antarkalimat sebab-akibat yang diletakkan di awal kalimat baru adalah oleh karena ....',
                                'explanation' => 'Oleh karena itu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Penggunaan kata-kata bersinonim secara berlebihan dalam satu kalimat disebut ....',
                                'explanation' => 'Pleonasme.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pleonasme', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Bab 4] Sumber energi ramah lingkungan yang berasal dari angin dinamakan energi ....',
                                'explanation' => 'Energi bayu (angin).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bayu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 1 & 2 - Korespondensi & Wawancara]
Sebutkan dan jelaskan tiga perbedaan mendasar antara teks surat dinas resmi dengan teks transkrip wawancara berdasarkan tujuan penulisan, struktur format, dan ragam bahasa yang digunakan!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tujuan Penulisan: Surat dinas resmi bertujuan menyampaikan informasi, undangan, atau permohonan tertulis antarinstansi resmi; sedangkan transkrip wawancara bertujuan mendokumentasikan informasi, pendapat, atau keterangan lisan dari narasumber.
2. Struktur Format: Surat dinas memiliki kop surat, nomor, perihal, alamat, salam, isi, tanda tangan, dan stempel; sedangkan teks wawancara tersusun atas pengantar topik, daftar tanya jawab dialog langsung (atau narasi fakta), dan penutup.
3. Ragam Bahasa: Surat dinas menggunakan ragam bahasa formal-lugas yang sangat hemat kata; sedangkan teks wawancara menggunakan bahasa lisan yang santun, komunikatif, dan interaktif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 3 - Teks Laporan Hasil Observasi]
Sebuah teks LHO harus memenuhi kriteria objektif, faktual, dan sistematis. Jelaskan apa yang dimaksud dengan ketiga kriteria tersebut, serta mengapa opini emosional penulis tidak boleh dimasukkan ke dalam teks LHO!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Objektif: Menyajikan keadaan objek apa adanya sesuai kenyataan lapangan tanpa dipengaruhi perasaan atau keberpihakan pribadi penulis.
2. Faktual: Seluruh informasi yang disajikan didukung oleh bukti nyata, data angka pengamatan, dan fakta ilmiah yang dapat diuji kebenarannya.
3. Sistematis: Disusun secara runtut dan teratur mengikuti struktur baku (definisi umum -> deskripsi bagian -> deskripsi manfaat).
4. Alasan Opini Dilarang: Opini subjektif bersifat dugaan tanpa bukti yang dapat mengaburkan akurasi data ilmiah dan merugikan pihak pembaca yang membutuhkan rujukan fakta terpercaya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 4 - Teks Eksplanasi Fenomena Alam]
Jelaskan proses terjadinya fenomena hujan asam secara berurutan menggunakan konsep sebab-akibat, serta gunakan minimal tiga konjungsi kausalitas yang tepat (seperti: karena, sehingga, akibatnya)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Penjelasan:
"Hujan asam diawali dari pelepasan gas belerang dioksida (SO2) dan nitrogen oksida (NOx) ke udara akibat asap pabrik dan kendaraan bermotor. Gas-gas polutan tersebut bereaksi dengan uap air di atmosfer karena proses fotooksidasi, sehingga membentuk senyawa asam sulfat dan asam nitrat yang pekat. Ketika uap air mengalami kondensasi membentuk awan dan jatuh sebagai presipitasi, air hujan yang turun memiliki tingkat keasaman yang sangat tinggi (pH rendah). Akibatnya, hujan asam tersebut merusak tanaman hutan, mengikis bangunan logam, dan meracuni ekosistem perairan danau."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 4 - Kalimat Efektif & Analisis Kesalahan]
Perbaikilah ketiga kalimat di bawah ini agar menjadi kalimat efektif yang baku, logis, dan hemat kata!
a. Seluruh para peserta lomba daur ulang harap untuk segera memasuki ke dalam ruangan aula.
b. Di dalam penelitian itu membuktikan tentang adanya kandungan mikroplastik pada ikan laut.
c. Kegiatan konservasi meliputi penanaman pohon mangrove, pembersihan pantai, dan mendaur ulang botol plastik.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Seluruh peserta lomba daur ulang harap segera memasuki ruangan aula." (Hapus para, ke dalam).
b. Perbaikan: "Penelitian itu membuktikan adanya kandungan mikroplastik pada ikan laut." (Hapus Di dalam dan tentang).
c. Perbaikan: "Kegiatan konservasi meliputi penanaman pohon mangrove, pembersihan pantai, dan pendaurulangan botol plastik." (Ubah mendaur ulang menjadi pendaurulangan agar sejajar berkonfiks pe-an).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Bab 2 & 3 - Gaya Bahasa & Morfologi]
Buatlah sebuah paragraf narasi orisinal (4-5 kalimat) yang menceritakan pelepasan tukik penyu di pantai yang memuat:
a. Satu majas personifikasi
b. Satu majas asosiasi (menggunakan kata "bagai" atau "laksana")
c. Dua kata berimbuhan ber-an yang bermakna jamak atau resiprokal!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Paragraf:
"Sore itu, ratusan anak penyu hijau mulai bergerak lincah di hamparan pasir Pantai Pangumbahan. Ombak laut berkejaran mencium bibir pantai seakan memanggil mereka untuk segera pulang ke samudra luas (majas personifikasi). Gerakan langkah kaki-kaki mungil tukik itu sangat gesit laksana ksatria kecil yang siap menaklukkan lautan biru (majas asosiasi). Rombongan tukik tersebut berjalan beriringan menuju deburan ombak, sementara burung-burung camar beterbangan di langit senja menyaksikan momen perpisahan yang mengharukan itu (kata beriringan dan beterbangan berimbuhan ber-an). Para pengunjung sekolah bertepuk tangan haru melepas kepergian mereka."',
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
