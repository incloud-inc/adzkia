<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6ASAJData
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Akhir Jenjang (ASAJ SD) Bahasa Indonesia - Paket A',
                'type' => 'exam',
                'description' => 'Ujian kelulusan akhir jenjang SD Kurikulum Merdeka Fase C (Paket A): Pengujian komprehensif lintas tingkat (20% Kelas 4, 30% Kelas 5, 50% Kelas 6) mengukur literasi membaca kritis, pemahaman teks faktual dan sastra, tata kalimat efektif, serta etika komunikasi.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Teks Narasi Inspiratif Pejuang Literasi Pelosok Negeri', 'content' => '[Keterangan Gambar: Pak Ridwan menunggang kuda poni yang membawa dua keranjang penuh buku bacaan melintasi jalan setapak perbukitan terjal menuju sekolah dasar terpencil di lereng Gunung Slamet.]

Kuda Pustaka melangkah tegap menapaki jalan berbatu lereng Gunung Slamet yang berselimut kabut tebal. Di atas punggungnya, dua keranjang anyaman bambu sarat dengan ratusan buku cerita anak, ensiklopedia sains, dan komik pengetahuan. Ridwan Sururi (45 tahun), sang pegiat literasi bersahaja, memegang tali kekang kuda dengan senyum ramah yang tak pernah luntur.

Sejak sepuluh tahun silam, Pak Ridwan mendedikasikan hidupnya mengantarkan jendela ilmu secara cuma-cuma ke desa-desa terpencil yang belum terjangkau fasilitas perpustakaan umum. Kedatangan Kuda Pustaka selalu disambut pekik riang anak-anak desa. Mereka berhamburan keluar dari rumah, mengerumuni keranjang buku dengan mata berbinar-binar penuh dahaga pengetahuan. "Melihat binar bahagia di mata anak-anak saat membuka halaman buku adalah upah termewah yang melenyapkan seluruh rasa lelah saya," tutur Pak Ridwan haru. Berkat dedikasi tulusnya, minat baca anak-anak pelosok desa tumbuh subur laksana tunas bambu di musim semi.'],
                            ['title' => 'Stimulus 2: Laporan Observasi Konservasi Bunga Bangkai Raksasa Rafflesia', 'content' => '[Keterangan Gambar: Bunga Rafflesia arnoldii berkelopak lima berwarna merah jingga dengan bintik-bintik putih mekar sempurna berdiameter 95 sentimeter di lantai hutan lindung Bukit Daun, Bengkulu.]

Rafflesia arnoldii merupakan tumbuhan parasit obligat langka yang pertama kali ditemukan oleh Dr. Joseph Arnold dan Thomas Stamford Raffles pada tahun 1818 di hutan Sumatra. Tumbuhan holoparasit ini tidak memiliki daun, batang, maupun akar sejati, melainkan hidup menumpang sepenuhnya pada jaringan inang merambat merambat *Tetrastigma*.

Berdasarkan hasil observasi botani, bunga Rafflesia membutuhkan waktu pertumbuhan kuncup selama 9 hingga 12 bulan sebelum mekar sempurna. Masa mekar bunga raksasa ini sangat singkat, yaitu hanya berkisar antara 5 hingga 7 hari sebelum layu dan membusuk menghitam. Saat mekar penuh, bunga ini mengeluarkan aroma busuk menyengat menyerupai bangkai daging untuk memikat lalat bangkai (*Lucilia*) yang bertindak sebagai polinator penyerbukan silang. Statusnya sebagai puspa langka nasional dilindungi ketat oleh undang-undang konservasi sumber daya alam hayati.'],
                            ['title' => 'Stimulus 3: Naskah Pidato Persuasif Menjaga Lingkungan Pesisir', 'content' => '[Keterangan Gambar: Pelajar SD berpidato di hadapan warga pesisir pada peringatan Hari Laut Sedunia: ia mengajak nelayan dan warga menjaga terumbu karang dan menghentikan pengeboman ikan.]

Bapak dan Ibu warga pesisir yang saya hormati,

Lautan nusantara adalah anugerah teragung yang menghidupi nenek moyang kita secara turun-temurun. Dari deburan ombaknya, ribuan nelayan menjemput rezeki untuk menyekolahkan anak-anaknya. Namun, kini terumbu karang kita menangis akibat penangkapan ikan menggunakan bahan peledak dan racun sianida yang merusak ekosistem dalam sekejap.

Ingatlah, karang yang hancur dalam satu detik membutuhkan waktu puluhan tahun untuk tumbuh kembali! Oleh karena itu, marilah kita hentikan penangkapan ikan yang merusak. Mari kita gunakan jaring ramah lingkungan dan rawat hutan bakau di pesisir pantai kita demi masa depan anak cucu tercinta!'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, tujuan mulia Pak Ridwan mengoperasikan Kuda Pustaka adalah ....',
                                'explanation' => 'Dalam teks: "mengantarkan jendela ilmu secara cuma-cuma ke desa-desa terpencil..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengantarkan buku bacaan secara gratis ke desa-desa terpencil tanpa perpustakaan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjual buku cerita impor dengan harga mahal kepada warga desa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyewakan kuda poni untuk sarana transportasi angkutan barang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengumpulkan uang sumbangan untuk membeli kuda balap', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas asosiasi (perumpamaan) yang terdapat pada kalimat terakhir wacana di atas adalah ....',
                                'explanation' => 'Laksana tunas bambu di musim semi adalah majas asosiasi (perumpamaan).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Minat baca anak-anak pelosok tumbuh subur laksana tunas bambu di musim semi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kedatangan Kuda Pustaka selalu disambut pekik riang anak-anak desa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kuda Pustaka melangkah tegap menapaki jalan berbatu lereng gunung', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dua keranjang anyaman bambu sarat dengan ratusan buku cerita anak', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA nilai moral keteladanan yang ditunjukkan oleh tokoh Ridwan Sururi!',
                                'explanation' => 'Keikhlasan, kerelawanan, dan keteguhan menempuh rintangan perbukitan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Keikhlasan dan kerelawanan mengabdi tanpa pamrih materi demi kemajuan anak bangsa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Keteguhan dan pantang menyerah menempuh medan perbukitan terjal demi literasi', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menuntut bayaran sewa buku yang tinggi kepada anak-anak desa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Memilih-milih desa tujuan hanya yang jalannya beraspal mulus', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek wacana Kuda Pustaka dengan keterangannya!',
                                'explanation' => 'Pasangan fakta wacana Kuda Pustaka.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tokoh Utama', 'is_correct' => false, 'match_key' => 'Ridwan Sururi (pegiat literasi)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Latar Tempat', 'is_correct' => false, 'match_key' => 'Lereng perbukitan Gunung Slamet', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sarana Angkut', 'is_correct' => false, 'match_key' => 'Kuda poni dengan dua keranjang buku bambu', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Buku yang Dibawa', 'is_correct' => false, 'match_key' => 'Buku cerita, ensiklopedia sains, dan komik', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks LHO di atas, fungsi aroma busuk menyengat yang dikeluarkan bunga Rafflesia adalah ....',
                                'explanation' => 'Dalam teks: "mengeluarkan aroma busuk menyengat... untuk memikat lalat bangkai yang bertindak sebagai polinator penyerbukan silang."',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memikat lalat bangkai untuk membantu proses penyerbukan silang bunga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mengusir seluruh binatang pemakan rumput agar tidak menginjaknya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyerap zat hara dari udara sekitar lantai hutan tropis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghangatkan kelopak bunga dari suhu dingin hutan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Masa mekar sempurna bunga Rafflesia arnoldii tergolong sangat singkat, yaitu hanya berkisar ....',
                                'explanation' => 'Masa mekar hanya 5 sampai 7 hari sebelum membusuk.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 hingga 7 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '9 hingga 12 bulan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2 hingga 3 minggu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 bulan penuh', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran ciri biologi Rafflesia arnoldii!',
                                'explanation' => 'Inang Rafflesia adalah tumbuhan merambat Tetrastigma (bukan kelapa sawit).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rafflesia arnoldii tidak memiliki daun, batang, dan akar sejati.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tumbuhan inang tempat menempelnya Rafflesia adalah pohon kelapa sawit.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rafflesia arnoldii ditetapkan sebagai puspa langka nasional Indonesia.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat pada wacana yang merupakan kalimat definisi adalah ....',
                                'explanation' => 'Penggunaan kata "merupakan" menandai kalimat definisi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rafflesia arnoldii merupakan tumbuhan parasit obligat langka yang ditemukan di hutan Sumatra.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bunga ini membutuhkan waktu pertumbuhan kuncup 9 hingga 12 bulan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Saat mekar penuh bunga ini mengeluarkan aroma busuk menyengat.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lalat bangkai bertindak sebagai polinator penyerbukan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Seruan persuasif utama yang disampaikan dalam pidato di atas adalah ....',
                                'explanation' => 'Seruan: Menghentikan pengeboman ikan dan menjaga terumbu karang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menghentikan penangkapan ikan menggunakan bahan peledak dan menjaga terumbu karang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membakar hutan bakau untuk dijadikan tambak garam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menjual seluruh perahu nelayan kepada perusahaan asing', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Melarang anak-anak nelayan bersekolah tinggi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas personifikasi yang terdapat dalam kutipan pidato tersebut adalah ....',
                                'explanation' => 'Terumbu karang menangis adalah personifikasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Terumbu karang kita menangis akibat penangkapan ikan menggunakan bahan peledak', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dari deburan ombaknya ribuan nelayan menjemput rezeki', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karang yang hancur membutuhkan puluhan tahun untuk tumbuh', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lautan nusantara adalah anugerah teragung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur pidato persuasif!',
                                'explanation' => 'Pidato ditujukan kepada warga pesisir pantai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kutipan tersebut memuat kalimat ajakan yang ditandai kata "marilah" dan "mari".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pidato tersebut ditujukan kepada para astronot di stasiun luar angkasa.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Argumen yang disampaikan didasarkan pada perlindungan masa depan anak cucu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat persuasif yang terdapat dalam naskah pidato!',
                                'explanation' => 'Kalimat A dan B memuat kata ajakan marilah dan mari.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Marilah kita hentikan penangkapan ikan yang merusak!', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mari kita gunakan jaring ramah lingkungan dan rawat hutan bakau!', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lautan nusantara adalah anugerah teragung nenek moyang kita.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dari deburan ombaknya nelayan menjemput rezeki.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Gagasan utama yang mendasari sebuah paragraf dan dijabarkan oleh kalimat-kalimat penjelas dinamakan ....',
                                'explanation' => 'Ide pokok adalah inti pikiran paragraf.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ide pokok (gagasan pokok)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kalimat pengembang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Judul bacaan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ringkasan cerita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Paragraf yang kalimat utamanya terletak di awal paragraf dinamakan paragraf ....',
                                'explanation' => 'Paragraf deduktif memiliki kalimat utama di awal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Deduktif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Induktif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Campuran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Naratif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Kalimat yang memerlukan objek penderita agar maknanya lengkap disebut kalimat aktif ....',
                                'explanation' => 'Kalimat transitif memerlukan objek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Transitif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Intransitif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pasif', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Imperatif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Ciri utama pantun nasihat yang tepat menurut aturan sastra lama adalah ....',
                                'explanation' => 'Pantun terdiri atas 4 baris rima a-b-a-b, sampiran dan isi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tiap bait terdiri atas 4 baris berima a-b-a-b, baris 1-2 sampiran, baris 3-4 isi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tiap bait terdiri atas 2 baris berima a-a, semuanya isi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tiap bait bebas tanpa aturan rima dan baris', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tiap bait terdiri atas 8 baris puisi berima sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Bahasa yang digunakan dalam teks iklan komersial harus bersifat ....',
                                'explanation' => 'Bahasa iklan bersifat persuasif dan komunikatif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Persuasif, menarik, sugestif, dan mudah diingat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kaku, resmi, dan memuat pasal-pasal hukum pidana', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berbelit-belit dengan istilah asing yang tidak dipahami', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bernada sedih dan menakut-nakuti calon pembeli', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Kata berimbuhan pe-...-an yang bermakna tempat atau daerah lingkungan adalah ....',
                                'explanation' => 'Pedesaan dan pesisir bermakna daerah/lingkungan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pedesaan dan pesisir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pembacaan dan penulisan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pemukulan dan tendangan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pemanasan dan pendinginan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Kalimat tunggal: "Ayah membaca koran" jika diubah menjadi kalimat pasif yang tepat adalah ....',
                                'explanation' => 'Koran dibaca oleh ayah (predikat berawalan di-).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Koran dibaca oleh ayah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ayah sedang membaca koran di teras.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Koran membaca ayah di pagi hari.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ayah yang membaca koran itu.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Surat resmi dinas dibedakan dari surat pribadi melalui adanya unsur ....',
                                'explanation' => 'Kop surat, nomor surat, dan stempel dinas adalah pembeda surat dinas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kop surat, nomor surat, dan stempel dinas instansi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Salam penutup dan tanda tangan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tanggal pembuatan surat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Isi pesan dan harapan pengirim', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Bentuk baku dari kata serapan "analisa" dan "kwalitas" menurut KBBI adalah ....',
                                'explanation' => 'Baku: analisis dan kualitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Analisis dan kualitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Analisa dan kwalitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Analitika dan kualitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Analisis dan kwalitas', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Majas yang melukiskan benda mati seolah bersikap seperti manusia hidup adalah majas ....',
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
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pilihlah DUA ciri kalimat efektif yang baku!',
                                'explanation' => 'Struktur jelas dan hemat kata (efisien).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki kesepadanan struktur subjek dan predikat yang jelas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hemat kata dan tidak menggunakan kata mubazir bersinonim (pleonasme)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak menggunakan kata-kata gaul kekinian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menggunakan huruf kecil di awal nama kota dan orang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah DUA konjungsi kausalitas sebab-akibat antarkalimat!',
                                'explanation' => 'Oleh karena itu dan Oleh sebab itu adalah konjungsi antarkalimat kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Oleh karena itu,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh sebab itu,', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meskipun demikian,', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sementara itu,', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah DUA aturan netiket kesantunan di dunia maya!',
                                'explanation' => 'Hindari huruf kapital semua dan cantumkan sumber karya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tidak menulis pesan menggunakan huruf kapital seluruhnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mencantumkan sumber rujukan saat mengutip karya orang lain', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyebarkan kabar burung yang sensasional tanpa verifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengunggah identitas kartu keluarga di media sosial', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pasangkan jenis teks dengan struktur utamanya!',
                                'explanation' => 'Pasangan struktur teks kurikulum merdeka.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks Laporan Hasil Observasi', 'is_correct' => false, 'match_key' => 'Definisi Umum - Deskripsi Bagian - Deskripsi Manfaat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teks Eksplanasi Ilmiah', 'is_correct' => false, 'match_key' => 'Pernyataan Umum - Rangkaian Penjelas Sebab-Akibat - Interpretasi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks Prosedur', 'is_correct' => false, 'match_key' => 'Tujuan - Alat/Bahan - Langkah-Langkah - Penutup', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Teks Biografi', 'is_correct' => false, 'match_key' => 'Orientasi - Peristiwa dan Masalah - Reorientasi', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5 & 6] Pasangkan jenis majas dengan contoh kalimatnya!',
                                'explanation' => 'Pasangan jenis majas dan kalimatnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => 'Pena menari-nari lincah di atas kertas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Metafora', 'is_correct' => false, 'match_key' => 'Buku adalah jendela ilmu pengetahuan dunia', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => 'Teriakannya menggelegar membelah bumi perkemahan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Asosiasi', 'is_correct' => false, 'match_key' => 'Wajah kedua anak kembar itu laksana pinang dibelah dua', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4 & 5] Pasangkan istilah kebahasaan dengan maknanya!',
                                'explanation' => 'Pasangan istilah semantik dasar SD.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sinonim', 'is_correct' => false, 'match_key' => 'Persamaan makna antara dua kata', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Antonim', 'is_correct' => false, 'match_key' => 'Lawan makna antara dua kata', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Homofon', 'is_correct' => false, 'match_key' => 'Kata yang sama lafal bunyinya namun beda ejaan dan arti', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Polisemi', 'is_correct' => false, 'match_key' => 'Kata yang memiliki lebih dari satu makna bertalian', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Tentukan status kebenaran kaidah ejaan PUEBI!',
                                'explanation' => 'Nama hari dan bulan diawali huruf kapital.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Huruf pertama pada awal kalimat selalu ditulis dengan huruf kapital.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nama hari, bulan, dan hari raya keagamaan diawali huruf kecil.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tanda titik digunakan untuk mengakhiri kalimat pernyataan berita.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Tentukan status kebenaran fakta dan opini!',
                                'explanation' => 'Hoaks berisi kepalsuan yang menyesatkan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Fakta dapat dibuktikan kebenarannya secara objektif melalui data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Opini berisi penilaian subjektif yang dapat berbeda pada setiap orang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Berita hoaks selalu memuat data fakta ilmiah yang dapat dipercaya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => '[Materi Kelas 4] Paragraf yang kalimat utamanya terletak di akhir paragraf disebut paragraf ....',
                                'explanation' => 'Paragraf induktif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'induktif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Ide pokok atau gagasan sentral paragraf sering disebut juga pikiran ....',
                                'explanation' => 'Pikiran utama.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'utama', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Kalimat aktif yang tidak membutuhkan objek penderita disebut kalimat ....',
                                'explanation' => 'Kalimat intransitif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'intransitif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Dua baris pertama dalam bait pantun empat baris dinamakan baris ....',
                                'explanation' => 'Sampiran pantun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sampiran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Dua baris terakhir dalam bait pantun yang memuat pesan moral disebut baris ....',
                                'explanation' => 'Isi pantun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'isi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Teks yang berfungsi membujuk masyarakat agar membeli produk komersial disebut ....',
                                'explanation' => 'Teks iklan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'iklan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Kata berimbuhan pe-an dari kata dasar "tanam" adalah ....',
                                'explanation' => 'Pertanian (atau penanaman).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pertanian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Kepala surat dinas resmi yang memuat nama instansi dan logo disebut ....',
                                'explanation' => 'Kop surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kop surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Riwayat hidup seorang tokoh terkemuka yang ditulis oleh orang lain dinamakan ....',
                                'explanation' => 'Biografi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'biografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Kalimat yang menirukan ujaran seseorang persis dan diapit tanda petik disebut kalimat ....',
                                'explanation' => 'Kalimat langsung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'langsung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Majas yang melebih-lebihkan kenyataan secara luar biasa disebut majas ....',
                                'explanation' => 'Hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hiperbola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Konjungsi antarkalimat yang menyatakan hubungan sebab-akibat adalah oleh karena ....',
                                'explanation' => 'Oleh karena itu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Bentuk baku dari kata serapan "praktek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: praktik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'praktik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Berita bohong yang sengaja disebarkan di media sosial dinamakan ....',
                                'explanation' => 'Hoaks.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hoaks', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Etika sopan santun dalam berkomunikasi di internet dinamakan ....',
                                'explanation' => 'Netiket.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'netiket', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Materi Kelas 5 & 6 - Korespondensi & Kalimat Efektif]
Sebuah surat resmi dinas harus disusun menggunakan prinsip kalimat efektif dan bahasa baku. Perbaikilah kalimat-kalimat surat dinas yang rancu di bawah ini agar menjadi kalimat efektif yang benar sesuai PUEBI!
a. Kepada para Bapak Kepala Sekolah-Kepala Sekolah sekalian dimohon untuk segera menghadiri daripada rapat dinas.
b. Sehubungan dengan kegiatan tersebut, maka dengan ini kami mengundang kehadiran Saudara tepat waktu.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Bapak Kepala Sekolah dimohon segera menghadiri rapat dinas." (Menghilangkan kata mubazir: Kepada, para, -sekalian, daripada).
b. Perbaikan: "Sehubungan dengan kegiatan tersebut, kami mengundang kehadiran Saudara tepat waktu." (Menghilangkan konjungsi ganda yang rancu: maka dengan ini).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Teks Laporan Hasil Observasi]
Jelaskan mengapa sebuah teks Laporan Hasil Observasi (LHO) wajib disajikan secara objektif, sistematis, dan berdasarkan data faktual pengamatan langsung di lapangan, serta jelaskan bahayanya jika sebuah laporan ilmiah memuat opini subjektif pengarang!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Objektif & Faktual: Karena teks LHO adalah rujukan ilmu pengetahuan yang menguraikan kenyataan flora, fauna, atau fenomena alam apa adanya tanpa manipulasi.
2. Sistematis: Disusun runtut mulai dari definisi umum, deskripsi bagian-bagian, hingga deskripsi manfaat agar mudah dipelajari pembaca.
3. Bahaya Opini Subjektif: Jika laporan memuat opini yang tidak teruji, data ilmiah menjadi bias, pembaca tersesat oleh informasi keliru, dan kebijakan konservasi perlindungan alam yang diambil berisiko gagal total.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Teks Pidato Persuasif]
Susunlah sebuah naskah pidato persuasif perpisahan kelas 6 sekolah dasar (minimal 2 paragraf) yang memuat:
a. Sapaan hormat dan ungkapan rasa syukur kepada Tuhan
b. Ungkapan terima kasih yang tulus dan bakti kepada bapak/ibu guru yang telah mengajar selama enam tahun
c. Permohonan maaf atas segala kesalahan dan kenakalan selama bersekolah
d. Satu kalimat ajakan persuasif kepada teman-teman angkatan agar terus bersemangat menuntut ilmu di jenjang SMP!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Naskah Pidato Perpisahan:
"Selamat pagi dan salam sejahtera bagi Bapak/Ibu Guru serta teman-teman yang saya sayangi. Puji dan syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa karena atas limpahan rahmat-Nya kita dapat berkumpul dalam acara perpisahan kelas enam ini dalam keadaan sehat walafiat.

Bapak dan Ibu Guru yang kami muliakan, tiada untaian kata yang mampu membalas ketulusan dan kesabaran Bapak/Ibu dalam mendidik kami selama enam tahun ini. Dari anak yang belum bisa membaca hingga kami menjadi siswa yang siap menatap masa depan, jasa Bapak/Ibu laksana pelita dalam kegelapan. Kami memohon maaf yang sebesar-besarnya atas segala kekhilafan, tingkah laku, dan kenakalan kami yang pernah melukai hati Bapak/Ibu Guru. Kepada teman-teman seperjuanganku, marilah kita jaga nama baik sekolah kita dan teruslah melangkah dengan semangat membara menuntut ilmu di jenjang sekolah menengah pertama demi menggapai cita-cita luhur kita bersama! Terima kasih, selamat pagi."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 5 & 6 - Teks Cerpen & Gaya Bahasa]
Bacalah kutipan cerpen berikut, lalu analisislah unsur intrinsiknya (tema, watak tokoh, latar suasana, dan amanat) serta sebutkan dua jenis majas yang digunakan dalam kutipan tersebut!

"Mentari pagi tersenyum hangat menyapa langkah kaki Raka. Meskipun sepatu bututnya sudah menganga dan baju seragamnya telah pudar warnanya, binar semangat di matanya menyala membakar keputusasaan. Dengan sabar, ia membantu kakeknya memikul keranjang singkong ke pasar sebelum berangkat ke sekolah. Raka berbisik dalam hatinya, kemiskinan bukanlah tembok penghalang untuk menjadi anak yang berilmu."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tema: Kegigihan menuntut ilmu dan bakti kepada keluarga di tengah keterbatasan ekonomi.
2. Watak Tokoh Raka: Berbakti, penyabar, pantang menyerah, dan memiliki tekad belajar yang kuat.
3. Latar Suasana: Penuh kehangatan, haru, dan semangat membara di pagi hari.
4. Amanat: Jangan pernah berputus asa terhadap kemiskinan atau keterbatasan fasilitas; tetaplah rajin berbakti kepada orang tua dan bersemangat menuntut ilmu.
5. Majas yang Digunakan:
   - Majas Personifikasi: "Mentari pagi tersenyum hangat menyapa langkah kaki Raka."
   - Majas Hiperbola: "Binar semangat di matanya menyala membakar keputusasaan." (atau Majas Metafora: "kemiskinan bukanlah tembok penghalang").',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Literasi Digital & Kesantunan Berbahasa]
Jelaskan apa yang dimaksud dengan prinsip "Saring Sebelum Sharing" dalam beraktivitas di dunia maya, mengapa kita dilarang membagikan data pribadi (seperti NIK dan nomor telepon) kepada pihak tak dikenal di internet, serta bagaimana cara menegur teman di grup percakapan yang menyebarkan berita bohong secara santun tanpa mempermalukannya di depan umum!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Prinsip "Saring Sebelum Sharing": Sikap bijak untuk memeriksa, memverifikasi, dan menyaring kebenaran serta manfaat suatu informasi/berita sebelum memutuskan untuk meneruskan atau membagikannya ke media sosial.
2. Alasan Melindungi Data Pribadi: NIK dan nomor telepon adalah identitas rahasia yang dapat disalahgunakan oleh penjahat siber untuk penipuan daring, pencurian rekening perbankan, pinjaman daring ilegal, atau pemerasan digital.
3. Cara Menegur Teman Secara Santun:
   - Menegur melalui pesan pribadi (japri/private message) agar teman tidak merasa dipermalukan di depan anggota grup lainnya.
   - Menggunakan bahasa yang santun dan mengedepankan fakta klarifikasi dari sumber resmi terpercaya, misalnya: "Hai kawan, terima kasih sudah berbagi info di grup. Namun, setelah saya cek di situs resmi Kemenkes/pemerintah, berita tersebut ternyata tergolong hoaks/tidak valid. Mari kita klarifikasi di grup agar teman-teman lain tidak salah paham ya sahabat."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Jenjang (ASAJ SD) Bahasa Indonesia - Paket B',
                'type' => 'exam',
                'description' => 'Ujian kelulusan akhir jenjang SD Kurikulum Merdeka Fase C (Paket B): Pengujian komprehensif lintas tingkat (20% Kelas 4, 30% Kelas 5, 50% Kelas 6) menguji daya nalar kritis membaca, analisis struktur teks, kalimat efektif, dan penerapan etika digital.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Teks Narasi Sang Pengrajin Batik Cilik dari Pekalongan', 'content' => '[Keterangan Gambar: Anak laki-laki kelas 6 sedang memegang canting tembaga meniup lelehan malam panas di atas kain mori putih bermotif parang garuda di bengkel batik tradisional.]

Aroma malam cair dan asap tungku tanah liat menguar semerbak di bengkel kerja kakeknya. Fajar (12 tahun) duduk bersila dengan penuh ketenangan, memegang canting tembaga kecil berujung melengkung. Tangan mungilnya menorehkan cairan lilin panas dengan tarikan garis yang sangat luwes dan presisi di atas kain mori putih.

Di saat teman-teman sebayanya asyik menghabiskan waktu bermain gim daring di gawai, Fajar memilih menekuni seni membatik tulis warisan leluhur. Baginya, setiap cantingan motif parang dan kawung bukan sekadar hiasan kain, melainkan doa dan filosofi luhur bangsa tentang keteguhan budi pekerti. Prestasi Fajar menjuarai Festival Kriya Budaya Nasional membuktikan bahwa generasi muda mampu menjadi benteng pelestari warisan budaya dunia takbenda kebanggaan Indonesia.'],
                            ['title' => 'Stimulus 2: Laporan Observasi Konservasi Bunga Bangkai Raksasa Rafflesia', 'content' => '[Keterangan Gambar: Bunga Rafflesia arnoldii berkelopak lima berwarna merah jingga dengan bintik-bintik putih mekar sempurna berdiameter 95 sentimeter di lantai hutan lindung Bukit Daun, Bengkulu.]

Rafflesia arnoldii merupakan tumbuhan parasit obligat langka yang pertama kali ditemukan oleh Dr. Joseph Arnold dan Thomas Stamford Raffles pada tahun 1818 di hutan Sumatra. Tumbuhan holoparasit ini tidak memiliki daun, batang, maupun akar sejati, melainkan hidup menumpang sepenuhnya pada jaringan inang merambat merambat *Tetrastigma*.

Berdasarkan hasil observasi botani, bunga Rafflesia membutuhkan waktu pertumbuhan kuncup selama 9 hingga 12 bulan sebelum mekar sempurna. Masa mekar bunga raksasa ini sangat singkat, yaitu hanya berkisar antara 5 hingga 7 hari sebelum layu dan membusuk menghitam. Saat mekar penuh, bunga ini mengeluarkan aroma busuk menyengat menyerupai bangkai daging untuk memikat lalat bangkai (*Lucilia*) yang bertindak sebagai polinator penyerbukan silang. Statusnya sebagai puspa langka nasional dilindungi ketat oleh undang-undang konservasi sumber daya alam hayati.'],
                            ['title' => 'Stimulus 3: Naskah Pidato Persuasif Menjaga Lingkungan Pesisir', 'content' => '[Keterangan Gambar: Pelajar SD berpidato di hadapan warga pesisir pada peringatan Hari Laut Sedunia: ia mengajak nelayan dan warga menjaga terumbu karang dan menghentikan pengeboman ikan.]

Bapak dan Ibu warga pesisir yang saya hormati,

Lautan nusantara adalah anugerah teragung yang menghidupi nenek moyang kita secara turun-temurun. Dari deburan ombaknya, ribuan nelayan menjemput rezeki untuk menyekolahkan anak-anaknya. Namun, kini terumbu karang kita menangis akibat penangkapan ikan menggunakan bahan peledak dan racun sianida yang merusak ekosistem dalam sekejap.

Ingatlah, karang yang hancur dalam satu detik membutuhkan waktu puluhan tahun untuk tumbuh kembali! Oleh karena itu, marilah kita hentikan penangkapan ikan yang merusak. Mari kita gunakan jaring ramah lingkungan dan rawat hutan bakau di pesisir pantai kita demi masa depan anak cucu tercinta!'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks wacana Stimulus 1, sikap terpuji yang ditunjukkan oleh tokoh Fajar adalah ....',
                                'explanation' => 'Dalam teks: "memilih menekuni seni membatik tulis warisan leluhur..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ketekunan melestarikan seni batik tulis tradisional warisan leluhur nusantara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kegemaran bermain gim daring sepanjang hari hingga lupa waktu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sikap malas belajar dan menolak membantu kakeknya di bengkel', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Keinginan menjual seluruh kain batik kakeknya ke luar negeri', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alat tradisional yang digunakan Fajar untuk menorehkan cairan lilin malam pada kain batik adalah ....',
                                'explanation' => 'Canting tembaga adalah alat membatik tulis.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Canting tembaga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kuas cat air', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pena bolpoin', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pahat ukir besi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA nilai keteladanan yang dapat dipetik dari tokoh Fajar!',
                                'explanation' => 'Cinta budaya bangsa dan kesabaran tekun dalam berkarya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cinta dan bangga terhadap warisan seni budaya luhur bangsa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sabar, tekun, dan penuh konsentrasi dalam berkarya', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sombong memamerkan piala kejuaraannya di hadapan teman', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mudah berputus asa saat tangannya terkena tetesan lilin malam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek wacana pengrajin batik cilik dengan keterangannya!',
                                'explanation' => 'Pasangan fakta kriya batik cilik.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tokoh Cilik', 'is_correct' => false, 'match_key' => 'Fajar (12 tahun) dari Pekalongan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Alat Membatik', 'is_correct' => false, 'match_key' => 'Canting tembaga dan tungku malam panas', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kain Dasar', 'is_correct' => false, 'match_key' => 'Kain mori putih', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Prestasi', 'is_correct' => false, 'match_key' => 'Juara Festival Kriya Budaya Nasional', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks LHO di atas, fungsi aroma busuk menyengat yang dikeluarkan bunga Rafflesia adalah ....',
                                'explanation' => 'Dalam teks: "mengeluarkan aroma busuk menyengat... untuk memikat lalat bangkai yang bertindak sebagai polinator penyerbukan silang."',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memikat lalat bangkai untuk membantu proses penyerbukan silang bunga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mengusir seluruh binatang pemakan rumput agar tidak menginjaknya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyerap zat hara dari udara sekitar lantai hutan tropis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghangatkan kelopak bunga dari suhu dingin hutan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Masa mekar sempurna bunga Rafflesia arnoldii tergolong sangat singkat, yaitu hanya berkisar ....',
                                'explanation' => 'Masa mekar hanya 5 sampai 7 hari sebelum membusuk.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 hingga 7 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '9 hingga 12 bulan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2 hingga 3 minggu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 bulan penuh', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran ciri biologi Rafflesia arnoldii!',
                                'explanation' => 'Inang Rafflesia adalah tumbuhan merambat Tetrastigma (bukan kelapa sawit).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rafflesia arnoldii tidak memiliki daun, batang, dan akar sejati.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tumbuhan inang tempat menempelnya Rafflesia adalah pohon kelapa sawit.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rafflesia arnoldii ditetapkan sebagai puspa langka nasional Indonesia.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat pada wacana yang merupakan kalimat definisi adalah ....',
                                'explanation' => 'Penggunaan kata "merupakan" menandai kalimat definisi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rafflesia arnoldii merupakan tumbuhan parasit obligat langka yang ditemukan di hutan Sumatra.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bunga ini membutuhkan waktu pertumbuhan kuncup 9 hingga 12 bulan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Saat mekar penuh bunga ini mengeluarkan aroma busuk menyengat.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lalat bangkai bertindak sebagai polinator penyerbukan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Seruan persuasif utama yang disampaikan dalam pidato di atas adalah ....',
                                'explanation' => 'Seruan: Menghentikan pengeboman ikan dan menjaga terumbu karang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menghentikan penangkapan ikan menggunakan bahan peledak dan menjaga terumbu karang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membakar hutan bakau untuk dijadikan tambak garam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menjual seluruh perahu nelayan kepada perusahaan asing', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Melarang anak-anak nelayan bersekolah tinggi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas personifikasi yang terdapat dalam kutipan pidato tersebut adalah ....',
                                'explanation' => 'Terumbu karang menangis adalah personifikasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Terumbu karang kita menangis akibat penangkapan ikan menggunakan bahan peledak', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dari deburan ombaknya ribuan nelayan menjemput rezeki', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karang yang hancur membutuhkan puluhan tahun untuk tumbuh', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lautan nusantara adalah anugerah teragung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur pidato persuasif!',
                                'explanation' => 'Pidato ditujukan kepada warga pesisir pantai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kutipan tersebut memuat kalimat ajakan yang ditandai kata "marilah" dan "mari".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pidato tersebut ditujukan kepada para astronot di stasiun luar angkasa.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Argumen yang disampaikan didasarkan pada perlindungan masa depan anak cucu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat persuasif yang terdapat dalam naskah pidato!',
                                'explanation' => 'Kalimat A dan B memuat kata ajakan marilah dan mari.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Marilah kita hentikan penangkapan ikan yang merusak!', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mari kita gunakan jaring ramah lingkungan dan rawat hutan bakau!', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lautan nusantara adalah anugerah teragung nenek moyang kita.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dari deburan ombaknya nelayan menjemput rezeki.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Gagasan utama yang mendasari sebuah paragraf dan dijabarkan oleh kalimat-kalimat penjelas dinamakan ....',
                                'explanation' => 'Ide pokok adalah inti pikiran paragraf.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ide pokok (gagasan pokok)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kalimat pengembang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Judul bacaan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ringkasan cerita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Paragraf yang kalimat utamanya terletak di awal paragraf dinamakan paragraf ....',
                                'explanation' => 'Paragraf deduktif memiliki kalimat utama di awal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Deduktif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Induktif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Campuran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Naratif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Kalimat yang memerlukan objek penderita agar maknanya lengkap disebut kalimat aktif ....',
                                'explanation' => 'Kalimat transitif memerlukan objek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Transitif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Intransitif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pasif', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Imperatif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Ciri utama pantun nasihat yang tepat menurut aturan sastra lama adalah ....',
                                'explanation' => 'Pantun terdiri atas 4 baris rima a-b-a-b, sampiran dan isi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tiap bait terdiri atas 4 baris berima a-b-a-b, baris 1-2 sampiran, baris 3-4 isi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tiap bait terdiri atas 2 baris berima a-a, semuanya isi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tiap bait bebas tanpa aturan rima dan baris', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tiap bait terdiri atas 8 baris puisi berima sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Bahasa yang digunakan dalam teks iklan komersial harus bersifat ....',
                                'explanation' => 'Bahasa iklan bersifat persuasif dan komunikatif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Persuasif, menarik, sugestif, dan mudah diingat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kaku, resmi, dan memuat pasal-pasal hukum pidana', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berbelit-belit dengan istilah asing yang tidak dipahami', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bernada sedih dan menakut-nakuti calon pembeli', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Kata berimbuhan pe-...-an yang bermakna tempat atau daerah lingkungan adalah ....',
                                'explanation' => 'Pedesaan dan pesisir bermakna daerah/lingkungan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pedesaan dan pesisir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pembacaan dan penulisan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pemukulan dan tendangan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pemanasan dan pendinginan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Kalimat tunggal: "Ayah membaca koran" jika diubah menjadi kalimat pasif yang tepat adalah ....',
                                'explanation' => 'Koran dibaca oleh ayah (predikat berawalan di-).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Koran dibaca oleh ayah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ayah sedang membaca koran di teras.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Koran membaca ayah di pagi hari.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ayah yang membaca koran itu.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Surat resmi dinas dibedakan dari surat pribadi melalui adanya unsur ....',
                                'explanation' => 'Kop surat, nomor surat, dan stempel dinas adalah pembeda surat dinas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kop surat, nomor surat, dan stempel dinas instansi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Salam penutup dan tanda tangan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tanggal pembuatan surat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Isi pesan dan harapan pengirim', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Bentuk baku dari kata serapan "analisa" dan "kwalitas" menurut KBBI adalah ....',
                                'explanation' => 'Baku: analisis dan kualitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Analisis dan kualitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Analisa dan kwalitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Analitika dan kualitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Analisis dan kwalitas', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Majas yang melukiskan benda mati seolah bersikap seperti manusia hidup adalah majas ....',
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
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pilihlah DUA ciri kalimat efektif yang baku!',
                                'explanation' => 'Struktur jelas dan hemat kata (efisien).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki kesepadanan struktur subjek dan predikat yang jelas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hemat kata dan tidak menggunakan kata mubazir bersinonim (pleonasme)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak menggunakan kata-kata gaul kekinian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menggunakan huruf kecil di awal nama kota dan orang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah DUA konjungsi kausalitas sebab-akibat antarkalimat!',
                                'explanation' => 'Oleh karena itu dan Oleh sebab itu adalah konjungsi antarkalimat kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Oleh karena itu,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh sebab itu,', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meskipun demikian,', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sementara itu,', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah DUA aturan netiket kesantunan di dunia maya!',
                                'explanation' => 'Hindari huruf kapital semua dan cantumkan sumber karya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tidak menulis pesan menggunakan huruf kapital seluruhnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mencantumkan sumber rujukan saat mengutip karya orang lain', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyebarkan kabar burung yang sensasional tanpa verifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengunggah identitas kartu keluarga di media sosial', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pasangkan jenis teks dengan struktur utamanya!',
                                'explanation' => 'Pasangan struktur teks kurikulum merdeka.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks Laporan Hasil Observasi', 'is_correct' => false, 'match_key' => 'Definisi Umum - Deskripsi Bagian - Deskripsi Manfaat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teks Eksplanasi Ilmiah', 'is_correct' => false, 'match_key' => 'Pernyataan Umum - Rangkaian Penjelas Sebab-Akibat - Interpretasi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks Prosedur', 'is_correct' => false, 'match_key' => 'Tujuan - Alat/Bahan - Langkah-Langkah - Penutup', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Teks Biografi', 'is_correct' => false, 'match_key' => 'Orientasi - Peristiwa dan Masalah - Reorientasi', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5 & 6] Pasangkan jenis majas dengan contoh kalimatnya!',
                                'explanation' => 'Pasangan jenis majas dan kalimatnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => 'Pena menari-nari lincah di atas kertas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Metafora', 'is_correct' => false, 'match_key' => 'Buku adalah jendela ilmu pengetahuan dunia', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => 'Teriakannya menggelegar membelah bumi perkemahan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Asosiasi', 'is_correct' => false, 'match_key' => 'Wajah kedua anak kembar itu laksana pinang dibelah dua', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4 & 5] Pasangkan istilah kebahasaan dengan maknanya!',
                                'explanation' => 'Pasangan istilah semantik dasar SD.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sinonim', 'is_correct' => false, 'match_key' => 'Persamaan makna antara dua kata', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Antonim', 'is_correct' => false, 'match_key' => 'Lawan makna antara dua kata', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Homofon', 'is_correct' => false, 'match_key' => 'Kata yang sama lafal bunyinya namun beda ejaan dan arti', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Polisemi', 'is_correct' => false, 'match_key' => 'Kata yang memiliki lebih dari satu makna bertalian', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Tentukan status kebenaran kaidah ejaan PUEBI!',
                                'explanation' => 'Nama hari dan bulan diawali huruf kapital.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Huruf pertama pada awal kalimat selalu ditulis dengan huruf kapital.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nama hari, bulan, dan hari raya keagamaan diawali huruf kecil.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tanda titik digunakan untuk mengakhiri kalimat pernyataan berita.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Tentukan status kebenaran fakta dan opini!',
                                'explanation' => 'Hoaks berisi kepalsuan yang menyesatkan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Fakta dapat dibuktikan kebenarannya secara objektif melalui data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Opini berisi penilaian subjektif yang dapat berbeda pada setiap orang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Berita hoaks selalu memuat data fakta ilmiah yang dapat dipercaya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => '[Materi Kelas 4] Paragraf yang kalimat utamanya terletak di akhir paragraf disebut paragraf ....',
                                'explanation' => 'Paragraf induktif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'induktif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Ide pokok atau gagasan sentral paragraf sering disebut juga pikiran ....',
                                'explanation' => 'Pikiran utama.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'utama', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Kalimat aktif yang tidak membutuhkan objek penderita disebut kalimat ....',
                                'explanation' => 'Kalimat intransitif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'intransitif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Dua baris pertama dalam bait pantun empat baris dinamakan baris ....',
                                'explanation' => 'Sampiran pantun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sampiran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Dua baris terakhir dalam bait pantun yang memuat pesan moral disebut baris ....',
                                'explanation' => 'Isi pantun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'isi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Teks yang berfungsi membujuk masyarakat agar membeli produk komersial disebut ....',
                                'explanation' => 'Teks iklan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'iklan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Kata berimbuhan pe-an dari kata dasar "tanam" adalah ....',
                                'explanation' => 'Pertanian (atau penanaman).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pertanian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Kepala surat dinas resmi yang memuat nama instansi dan logo disebut ....',
                                'explanation' => 'Kop surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kop surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Riwayat hidup seorang tokoh terkemuka yang ditulis oleh orang lain dinamakan ....',
                                'explanation' => 'Biografi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'biografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Kalimat yang menirukan ujaran seseorang persis dan diapit tanda petik disebut kalimat ....',
                                'explanation' => 'Kalimat langsung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'langsung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Majas yang melebih-lebihkan kenyataan secara luar biasa disebut majas ....',
                                'explanation' => 'Hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hiperbola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Konjungsi antarkalimat yang menyatakan hubungan sebab-akibat adalah oleh karena ....',
                                'explanation' => 'Oleh karena itu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Bentuk baku dari kata serapan "praktek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: praktik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'praktik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Berita bohong yang sengaja disebarkan di media sosial dinamakan ....',
                                'explanation' => 'Hoaks.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hoaks', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Etika sopan santun dalam berkomunikasi di internet dinamakan ....',
                                'explanation' => 'Netiket.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'netiket', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Materi Kelas 5 & 6 - Korespondensi & Kalimat Efektif]
Sebuah surat resmi dinas harus disusun menggunakan prinsip kalimat efektif dan bahasa baku. Perbaikilah kalimat-kalimat surat dinas yang rancu di bawah ini agar menjadi kalimat efektif yang benar sesuai PUEBI!
a. Kepada para Bapak Kepala Sekolah-Kepala Sekolah sekalian dimohon untuk segera menghadiri daripada rapat dinas.
b. Sehubungan dengan kegiatan tersebut, maka dengan ini kami mengundang kehadiran Saudara tepat waktu.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Bapak Kepala Sekolah dimohon segera menghadiri rapat dinas." (Menghilangkan kata mubazir: Kepada, para, -sekalian, daripada).
b. Perbaikan: "Sehubungan dengan kegiatan tersebut, kami mengundang kehadiran Saudara tepat waktu." (Menghilangkan konjungsi ganda yang rancu: maka dengan ini).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Teks Laporan Hasil Observasi]
Jelaskan mengapa sebuah teks Laporan Hasil Observasi (LHO) wajib disajikan secara objektif, sistematis, dan berdasarkan data faktual pengamatan langsung di lapangan, serta jelaskan bahayanya jika sebuah laporan ilmiah memuat opini subjektif pengarang!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Objektif & Faktual: Karena teks LHO adalah rujukan ilmu pengetahuan yang menguraikan kenyataan flora, fauna, atau fenomena alam apa adanya tanpa manipulasi.
2. Sistematis: Disusun runtut mulai dari definisi umum, deskripsi bagian-bagian, hingga deskripsi manfaat agar mudah dipelajari pembaca.
3. Bahaya Opini Subjektif: Jika laporan memuat opini yang tidak teruji, data ilmiah menjadi bias, pembaca tersesat oleh informasi keliru, dan kebijakan konservasi perlindungan alam yang diambil berisiko gagal total.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Teks Pidato Persuasif]
Susunlah sebuah naskah pidato persuasif perpisahan kelas 6 sekolah dasar (minimal 2 paragraf) yang memuat:
a. Sapaan hormat dan ungkapan rasa syukur kepada Tuhan
b. Ungkapan terima kasih yang tulus dan bakti kepada bapak/ibu guru yang telah mengajar selama enam tahun
c. Permohonan maaf atas segala kesalahan dan kenakalan selama bersekolah
d. Satu kalimat ajakan persuasif kepada teman-teman angkatan agar terus bersemangat menuntut ilmu di jenjang SMP!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Naskah Pidato Perpisahan:
"Selamat pagi dan salam sejahtera bagi Bapak/Ibu Guru serta teman-teman yang saya sayangi. Puji dan syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa karena atas limpahan rahmat-Nya kita dapat berkumpul dalam acara perpisahan kelas enam ini dalam keadaan sehat walafiat.

Bapak dan Ibu Guru yang kami muliakan, tiada untaian kata yang mampu membalas ketulusan dan kesabaran Bapak/Ibu dalam mendidik kami selama enam tahun ini. Dari anak yang belum bisa membaca hingga kami menjadi siswa yang siap menatap masa depan, jasa Bapak/Ibu laksana pelita dalam kegelapan. Kami memohon maaf yang sebesar-besarnya atas segala kekhilafan, tingkah laku, dan kenakalan kami yang pernah melukai hati Bapak/Ibu Guru. Kepada teman-teman seperjuanganku, marilah kita jaga nama baik sekolah kita dan teruslah melangkah dengan semangat membara menuntut ilmu di jenjang sekolah menengah pertama demi menggapai cita-cita luhur kita bersama! Terima kasih, selamat pagi."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 5 & 6 - Teks Cerpen & Gaya Bahasa]
Bacalah kutipan cerpen berikut, lalu analisislah unsur intrinsiknya (tema, watak tokoh, latar suasana, dan amanat) serta sebutkan dua jenis majas yang digunakan dalam kutipan tersebut!

"Mentari pagi tersenyum hangat menyapa langkah kaki Raka. Meskipun sepatu bututnya sudah menganga dan baju seragamnya telah pudar warnanya, binar semangat di matanya menyala membakar keputusasaan. Dengan sabar, ia membantu kakeknya memikul keranjang singkong ke pasar sebelum berangkat ke sekolah. Raka berbisik dalam hatinya, kemiskinan bukanlah tembok penghalang untuk menjadi anak yang berilmu."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tema: Kegigihan menuntut ilmu dan bakti kepada keluarga di tengah keterbatasan ekonomi.
2. Watak Tokoh Raka: Berbakti, penyabar, pantang menyerah, dan memiliki tekad belajar yang kuat.
3. Latar Suasana: Penuh kehangatan, haru, dan semangat membara di pagi hari.
4. Amanat: Jangan pernah berputus asa terhadap kemiskinan atau keterbatasan fasilitas; tetaplah rajin berbakti kepada orang tua dan bersemangat menuntut ilmu.
5. Majas yang Digunakan:
   - Majas Personifikasi: "Mentari pagi tersenyum hangat menyapa langkah kaki Raka."
   - Majas Hiperbola: "Binar semangat di matanya menyala membakar keputusasaan." (atau Majas Metafora: "kemiskinan bukanlah tembok penghalang").',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Literasi Digital & Kesantunan Berbahasa]
Jelaskan apa yang dimaksud dengan prinsip "Saring Sebelum Sharing" dalam beraktivitas di dunia maya, mengapa kita dilarang membagikan data pribadi (seperti NIK dan nomor telepon) kepada pihak tak dikenal di internet, serta bagaimana cara menegur teman di grup percakapan yang menyebarkan berita bohong secara santun tanpa mempermalukannya di depan umum!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Prinsip "Saring Sebelum Sharing": Sikap bijak untuk memeriksa, memverifikasi, dan menyaring kebenaran serta manfaat suatu informasi/berita sebelum memutuskan untuk meneruskan atau membagikannya ke media sosial.
2. Alasan Melindungi Data Pribadi: NIK dan nomor telepon adalah identitas rahasia yang dapat disalahgunakan oleh penjahat siber untuk penipuan daring, pencurian rekening perbankan, pinjaman daring ilegal, atau pemerasan digital.
3. Cara Menegur Teman Secara Santun:
   - Menegur melalui pesan pribadi (japri/private message) agar teman tidak merasa dipermalukan di depan anggota grup lainnya.
   - Menggunakan bahasa yang santun dan mengedepankan fakta klarifikasi dari sumber resmi terpercaya, misalnya: "Hai kawan, terima kasih sudah berbagi info di grup. Namun, setelah saya cek di situs resmi Kemenkes/pemerintah, berita tersebut ternyata tergolong hoaks/tidak valid. Mari kita klarifikasi di grup agar teman-teman lain tidak salah paham ya sahabat."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Jenjang (ASAJ SD) Bahasa Indonesia - Paket C',
                'type' => 'exam',
                'description' => 'Ujian kelulusan akhir jenjang SD Kurikulum Merdeka Fase C (Paket C): Evaluasi terpadu lintas tingkat (20% Kelas 4, 30% Kelas 5, 50% Kelas 6) untuk menguji kematangan berbahasa Indonesia, keterampilan menulis efektif, berpikir kritis, dan budi pekerti luhur.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Kisah Petani Cilik Pelindung Mata Air Gunung Lawu', 'content' => '[Keterangan Gambar: Dua siswa SD bersama kakek petani menanam pohon beringin dan aren di sekitar ceruk mata air pegunungan Lawu yang berbatu cadas.]

Gemericik air jernih yang memancar dari sela-sela bebatuan lereng Gunung Lawu adalah urat nadi kehidupan bagi tiga desa di bawahnya. Sejak debit mata air mulai menyusut akibat penebangan pohon liar, Arya (12 tahun) memprakarsai aksi "Satu Anak Satu Pohon Penjaga Air". Bersama teman-teman sekolahnya, Arya mendaki bukit setiap akhir pekan untuk menanam bibit pohon aren dan beringin yang berakar dalam mengikat air tanah.

"Jika mata air ini mati, sawah-sawah akan kering kerontang dan kehidupan warga akan punah," ujar Arya dengan tatapan penuh keyakinan. Berkat aksi konservasi berkelanjutan yang mereka galakkan, ceruk mata air itu kini terlindungi oleh rimbunnya vegetasi hijau. Burung-burung kepodang kembali bernyanyi menyambut lestarinya sumber kehidupan nusantara.'],
                            ['title' => 'Stimulus 2: Laporan Observasi Konservasi Bunga Bangkai Raksasa Rafflesia', 'content' => '[Keterangan Gambar: Bunga Rafflesia arnoldii berkelopak lima berwarna merah jingga dengan bintik-bintik putih mekar sempurna berdiameter 95 sentimeter di lantai hutan lindung Bukit Daun, Bengkulu.]

Rafflesia arnoldii merupakan tumbuhan parasit obligat langka yang pertama kali ditemukan oleh Dr. Joseph Arnold dan Thomas Stamford Raffles pada tahun 1818 di hutan Sumatra. Tumbuhan holoparasit ini tidak memiliki daun, batang, maupun akar sejati, melainkan hidup menumpang sepenuhnya pada jaringan inang merambat merambat *Tetrastigma*.

Berdasarkan hasil observasi botani, bunga Rafflesia membutuhkan waktu pertumbuhan kuncup selama 9 hingga 12 bulan sebelum mekar sempurna. Masa mekar bunga raksasa ini sangat singkat, yaitu hanya berkisar antara 5 hingga 7 hari sebelum layu dan membusuk menghitam. Saat mekar penuh, bunga ini mengeluarkan aroma busuk menyengat menyerupai bangkai daging untuk memikat lalat bangkai (*Lucilia*) yang bertindak sebagai polinator penyerbukan silang. Statusnya sebagai puspa langka nasional dilindungi ketat oleh undang-undang konservasi sumber daya alam hayati.'],
                            ['title' => 'Stimulus 3: Naskah Pidato Persuasif Menjaga Lingkungan Pesisir', 'content' => '[Keterangan Gambar: Pelajar SD berpidato di hadapan warga pesisir pada peringatan Hari Laut Sedunia: ia mengajak nelayan dan warga menjaga terumbu karang dan menghentikan pengeboman ikan.]

Bapak dan Ibu warga pesisir yang saya hormati,

Lautan nusantara adalah anugerah teragung yang menghidupi nenek moyang kita secara turun-temurun. Dari deburan ombaknya, ribuan nelayan menjemput rezeki untuk menyekolahkan anak-anaknya. Namun, kini terumbu karang kita menangis akibat penangkapan ikan menggunakan bahan peledak dan racun sianida yang merusak ekosistem dalam sekejap.

Ingatlah, karang yang hancur dalam satu detik membutuhkan waktu puluhan tahun untuk tumbuh kembali! Oleh karena itu, marilah kita hentikan penangkapan ikan yang merusak. Mari kita gunakan jaring ramah lingkungan dan rawat hutan bakau di pesisir pantai kita demi masa depan anak cucu tercinta!'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, gerakan konservasi lingkungan yang diprakarsai oleh Arya adalah ....',
                                'explanation' => 'Dalam teks: "memprakarsai aksi Satu Anak Satu Pohon Penjaga Air..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Aksi "Satu Anak Satu Pohon Penjaga Air" menanam bibit aren dan beringin', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pembangunan vila mewah di sekitar ceruk mata air', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penebangan seluruh pohon besar di lereng gunung Lawu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pengalihan aliran air sungai ke pabrik swasta', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Alasan pohon aren dan pohon beringin dipilih untuk ditanam di sekitar mata air adalah ....',
                                'explanation' => 'Akar dalam efektif mengikat dan menyimpan air tanah.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki sistem perakaran dalam yang sangat efektif mengikat air tanah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mudah ditebang untuk dijadikan bahan baku kayu bakar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dapat menghasilkan buah manis yang cepat berbuah dalam sebulan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Memiliki daun yang sangat harum untuk parfum', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA nilai keteladanan yang ditunjukkan oleh tokoh Arya!',
                                'explanation' => 'Kepedulian aksi nyata dan kepemimpinan menggerakkan sesama.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kepedulian dan aksi nyata menjaga kelestarian sumber mata air bagi masyarakat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kepemimpinan menggerakkan teman-teman sekolah untuk berbuat kebaikan bersama', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sikap pasrah membiarkan mata air menyusut tanpa berbuat apa-apa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menuntut upah uang kepada warga desa setiap kali menanam pohon', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek konservasi mata air dengan keterangannya!',
                                'explanation' => 'Pasangan fakta konservasi mata air Lawu.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tokoh Penggerak', 'is_correct' => false, 'match_key' => 'Arya (12 tahun) dari lereng Gunung Lawu', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nama Gerakan', 'is_correct' => false, 'match_key' => 'Satu Anak Satu Pohon Penjaga Air', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jenis Bibit Pohon', 'is_correct' => false, 'match_key' => 'Pohon aren dan beringin pengikat air', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Dampak Positif', 'is_correct' => false, 'match_key' => 'Debit air tanah terjaga dan burung kepodang kembali', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks LHO di atas, fungsi aroma busuk menyengat yang dikeluarkan bunga Rafflesia adalah ....',
                                'explanation' => 'Dalam teks: "mengeluarkan aroma busuk menyengat... untuk memikat lalat bangkai yang bertindak sebagai polinator penyerbukan silang."',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memikat lalat bangkai untuk membantu proses penyerbukan silang bunga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mengusir seluruh binatang pemakan rumput agar tidak menginjaknya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyerap zat hara dari udara sekitar lantai hutan tropis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghangatkan kelopak bunga dari suhu dingin hutan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Masa mekar sempurna bunga Rafflesia arnoldii tergolong sangat singkat, yaitu hanya berkisar ....',
                                'explanation' => 'Masa mekar hanya 5 sampai 7 hari sebelum membusuk.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 hingga 7 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '9 hingga 12 bulan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2 hingga 3 minggu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 bulan penuh', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran ciri biologi Rafflesia arnoldii!',
                                'explanation' => 'Inang Rafflesia adalah tumbuhan merambat Tetrastigma (bukan kelapa sawit).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rafflesia arnoldii tidak memiliki daun, batang, dan akar sejati.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tumbuhan inang tempat menempelnya Rafflesia adalah pohon kelapa sawit.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rafflesia arnoldii ditetapkan sebagai puspa langka nasional Indonesia.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat pada wacana yang merupakan kalimat definisi adalah ....',
                                'explanation' => 'Penggunaan kata "merupakan" menandai kalimat definisi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rafflesia arnoldii merupakan tumbuhan parasit obligat langka yang ditemukan di hutan Sumatra.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bunga ini membutuhkan waktu pertumbuhan kuncup 9 hingga 12 bulan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Saat mekar penuh bunga ini mengeluarkan aroma busuk menyengat.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lalat bangkai bertindak sebagai polinator penyerbukan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Seruan persuasif utama yang disampaikan dalam pidato di atas adalah ....',
                                'explanation' => 'Seruan: Menghentikan pengeboman ikan dan menjaga terumbu karang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menghentikan penangkapan ikan menggunakan bahan peledak dan menjaga terumbu karang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membakar hutan bakau untuk dijadikan tambak garam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menjual seluruh perahu nelayan kepada perusahaan asing', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Melarang anak-anak nelayan bersekolah tinggi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas personifikasi yang terdapat dalam kutipan pidato tersebut adalah ....',
                                'explanation' => 'Terumbu karang menangis adalah personifikasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Terumbu karang kita menangis akibat penangkapan ikan menggunakan bahan peledak', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dari deburan ombaknya ribuan nelayan menjemput rezeki', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karang yang hancur membutuhkan puluhan tahun untuk tumbuh', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lautan nusantara adalah anugerah teragung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran unsur pidato persuasif!',
                                'explanation' => 'Pidato ditujukan kepada warga pesisir pantai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kutipan tersebut memuat kalimat ajakan yang ditandai kata "marilah" dan "mari".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pidato tersebut ditujukan kepada para astronot di stasiun luar angkasa.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Argumen yang disampaikan didasarkan pada perlindungan masa depan anak cucu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat persuasif yang terdapat dalam naskah pidato!',
                                'explanation' => 'Kalimat A dan B memuat kata ajakan marilah dan mari.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Marilah kita hentikan penangkapan ikan yang merusak!', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mari kita gunakan jaring ramah lingkungan dan rawat hutan bakau!', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lautan nusantara adalah anugerah teragung nenek moyang kita.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dari deburan ombaknya nelayan menjemput rezeki.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Gagasan utama yang mendasari sebuah paragraf dan dijabarkan oleh kalimat-kalimat penjelas dinamakan ....',
                                'explanation' => 'Ide pokok adalah inti pikiran paragraf.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ide pokok (gagasan pokok)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kalimat pengembang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Judul bacaan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ringkasan cerita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Paragraf yang kalimat utamanya terletak di awal paragraf dinamakan paragraf ....',
                                'explanation' => 'Paragraf deduktif memiliki kalimat utama di awal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Deduktif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Induktif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Campuran', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Naratif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Kalimat yang memerlukan objek penderita agar maknanya lengkap disebut kalimat aktif ....',
                                'explanation' => 'Kalimat transitif memerlukan objek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Transitif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Intransitif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pasif', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Imperatif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Ciri utama pantun nasihat yang tepat menurut aturan sastra lama adalah ....',
                                'explanation' => 'Pantun terdiri atas 4 baris rima a-b-a-b, sampiran dan isi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tiap bait terdiri atas 4 baris berima a-b-a-b, baris 1-2 sampiran, baris 3-4 isi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tiap bait terdiri atas 2 baris berima a-a, semuanya isi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tiap bait bebas tanpa aturan rima dan baris', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tiap bait terdiri atas 8 baris puisi berima sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Bahasa yang digunakan dalam teks iklan komersial harus bersifat ....',
                                'explanation' => 'Bahasa iklan bersifat persuasif dan komunikatif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Persuasif, menarik, sugestif, dan mudah diingat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kaku, resmi, dan memuat pasal-pasal hukum pidana', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berbelit-belit dengan istilah asing yang tidak dipahami', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bernada sedih dan menakut-nakuti calon pembeli', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Kata berimbuhan pe-...-an yang bermakna tempat atau daerah lingkungan adalah ....',
                                'explanation' => 'Pedesaan dan pesisir bermakna daerah/lingkungan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pedesaan dan pesisir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pembacaan dan penulisan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pemukulan dan tendangan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pemanasan dan pendinginan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Kalimat tunggal: "Ayah membaca koran" jika diubah menjadi kalimat pasif yang tepat adalah ....',
                                'explanation' => 'Koran dibaca oleh ayah (predikat berawalan di-).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Koran dibaca oleh ayah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ayah sedang membaca koran di teras.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Koran membaca ayah di pagi hari.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ayah yang membaca koran itu.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Surat resmi dinas dibedakan dari surat pribadi melalui adanya unsur ....',
                                'explanation' => 'Kop surat, nomor surat, dan stempel dinas adalah pembeda surat dinas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kop surat, nomor surat, dan stempel dinas instansi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Salam penutup dan tanda tangan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tanggal pembuatan surat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Isi pesan dan harapan pengirim', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Bentuk baku dari kata serapan "analisa" dan "kwalitas" menurut KBBI adalah ....',
                                'explanation' => 'Baku: analisis dan kualitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Analisis dan kualitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Analisa dan kwalitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Analitika dan kualitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Analisis dan kwalitas', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Majas yang melukiskan benda mati seolah bersikap seperti manusia hidup adalah majas ....',
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
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pilihlah DUA ciri kalimat efektif yang baku!',
                                'explanation' => 'Struktur jelas dan hemat kata (efisien).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki kesepadanan struktur subjek dan predikat yang jelas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hemat kata dan tidak menggunakan kata mubazir bersinonim (pleonasme)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak menggunakan kata-kata gaul kekinian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menggunakan huruf kecil di awal nama kota dan orang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah DUA konjungsi kausalitas sebab-akibat antarkalimat!',
                                'explanation' => 'Oleh karena itu dan Oleh sebab itu adalah konjungsi antarkalimat kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Oleh karena itu,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh sebab itu,', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meskipun demikian,', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sementara itu,', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah DUA aturan netiket kesantunan di dunia maya!',
                                'explanation' => 'Hindari huruf kapital semua dan cantumkan sumber karya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tidak menulis pesan menggunakan huruf kapital seluruhnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mencantumkan sumber rujukan saat mengutip karya orang lain', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyebarkan kabar burung yang sensasional tanpa verifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengunggah identitas kartu keluarga di media sosial', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pasangkan jenis teks dengan struktur utamanya!',
                                'explanation' => 'Pasangan struktur teks kurikulum merdeka.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks Laporan Hasil Observasi', 'is_correct' => false, 'match_key' => 'Definisi Umum - Deskripsi Bagian - Deskripsi Manfaat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teks Eksplanasi Ilmiah', 'is_correct' => false, 'match_key' => 'Pernyataan Umum - Rangkaian Penjelas Sebab-Akibat - Interpretasi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks Prosedur', 'is_correct' => false, 'match_key' => 'Tujuan - Alat/Bahan - Langkah-Langkah - Penutup', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Teks Biografi', 'is_correct' => false, 'match_key' => 'Orientasi - Peristiwa dan Masalah - Reorientasi', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5 & 6] Pasangkan jenis majas dengan contoh kalimatnya!',
                                'explanation' => 'Pasangan jenis majas dan kalimatnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => 'Pena menari-nari lincah di atas kertas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Metafora', 'is_correct' => false, 'match_key' => 'Buku adalah jendela ilmu pengetahuan dunia', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => 'Teriakannya menggelegar membelah bumi perkemahan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Asosiasi', 'is_correct' => false, 'match_key' => 'Wajah kedua anak kembar itu laksana pinang dibelah dua', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4 & 5] Pasangkan istilah kebahasaan dengan maknanya!',
                                'explanation' => 'Pasangan istilah semantik dasar SD.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sinonim', 'is_correct' => false, 'match_key' => 'Persamaan makna antara dua kata', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Antonim', 'is_correct' => false, 'match_key' => 'Lawan makna antara dua kata', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Homofon', 'is_correct' => false, 'match_key' => 'Kata yang sama lafal bunyinya namun beda ejaan dan arti', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Polisemi', 'is_correct' => false, 'match_key' => 'Kata yang memiliki lebih dari satu makna bertalian', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Tentukan status kebenaran kaidah ejaan PUEBI!',
                                'explanation' => 'Nama hari dan bulan diawali huruf kapital.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Huruf pertama pada awal kalimat selalu ditulis dengan huruf kapital.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nama hari, bulan, dan hari raya keagamaan diawali huruf kecil.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tanda titik digunakan untuk mengakhiri kalimat pernyataan berita.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Tentukan status kebenaran fakta dan opini!',
                                'explanation' => 'Hoaks berisi kepalsuan yang menyesatkan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Fakta dapat dibuktikan kebenarannya secara objektif melalui data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Opini berisi penilaian subjektif yang dapat berbeda pada setiap orang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Berita hoaks selalu memuat data fakta ilmiah yang dapat dipercaya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => '[Materi Kelas 4] Paragraf yang kalimat utamanya terletak di akhir paragraf disebut paragraf ....',
                                'explanation' => 'Paragraf induktif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'induktif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Ide pokok atau gagasan sentral paragraf sering disebut juga pikiran ....',
                                'explanation' => 'Pikiran utama.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'utama', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Kalimat aktif yang tidak membutuhkan objek penderita disebut kalimat ....',
                                'explanation' => 'Kalimat intransitif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'intransitif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Dua baris pertama dalam bait pantun empat baris dinamakan baris ....',
                                'explanation' => 'Sampiran pantun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sampiran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Dua baris terakhir dalam bait pantun yang memuat pesan moral disebut baris ....',
                                'explanation' => 'Isi pantun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'isi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Teks yang berfungsi membujuk masyarakat agar membeli produk komersial disebut ....',
                                'explanation' => 'Teks iklan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'iklan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Kata berimbuhan pe-an dari kata dasar "tanam" adalah ....',
                                'explanation' => 'Pertanian (atau penanaman).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pertanian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Kepala surat dinas resmi yang memuat nama instansi dan logo disebut ....',
                                'explanation' => 'Kop surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kop surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Riwayat hidup seorang tokoh terkemuka yang ditulis oleh orang lain dinamakan ....',
                                'explanation' => 'Biografi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'biografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Kalimat yang menirukan ujaran seseorang persis dan diapit tanda petik disebut kalimat ....',
                                'explanation' => 'Kalimat langsung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'langsung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Majas yang melebih-lebihkan kenyataan secara luar biasa disebut majas ....',
                                'explanation' => 'Hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hiperbola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Konjungsi antarkalimat yang menyatakan hubungan sebab-akibat adalah oleh karena ....',
                                'explanation' => 'Oleh karena itu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Bentuk baku dari kata serapan "praktek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: praktik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'praktik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Berita bohong yang sengaja disebarkan di media sosial dinamakan ....',
                                'explanation' => 'Hoaks.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hoaks', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Etika sopan santun dalam berkomunikasi di internet dinamakan ....',
                                'explanation' => 'Netiket.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'netiket', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Materi Kelas 5 & 6 - Korespondensi & Kalimat Efektif]
Sebuah surat resmi dinas harus disusun menggunakan prinsip kalimat efektif dan bahasa baku. Perbaikilah kalimat-kalimat surat dinas yang rancu di bawah ini agar menjadi kalimat efektif yang benar sesuai PUEBI!
a. Kepada para Bapak Kepala Sekolah-Kepala Sekolah sekalian dimohon untuk segera menghadiri daripada rapat dinas.
b. Sehubungan dengan kegiatan tersebut, maka dengan ini kami mengundang kehadiran Saudara tepat waktu.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Bapak Kepala Sekolah dimohon segera menghadiri rapat dinas." (Menghilangkan kata mubazir: Kepada, para, -sekalian, daripada).
b. Perbaikan: "Sehubungan dengan kegiatan tersebut, kami mengundang kehadiran Saudara tepat waktu." (Menghilangkan konjungsi ganda yang rancu: maka dengan ini).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Teks Laporan Hasil Observasi]
Jelaskan mengapa sebuah teks Laporan Hasil Observasi (LHO) wajib disajikan secara objektif, sistematis, dan berdasarkan data faktual pengamatan langsung di lapangan, serta jelaskan bahayanya jika sebuah laporan ilmiah memuat opini subjektif pengarang!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Objektif & Faktual: Karena teks LHO adalah rujukan ilmu pengetahuan yang menguraikan kenyataan flora, fauna, atau fenomena alam apa adanya tanpa manipulasi.
2. Sistematis: Disusun runtut mulai dari definisi umum, deskripsi bagian-bagian, hingga deskripsi manfaat agar mudah dipelajari pembaca.
3. Bahaya Opini Subjektif: Jika laporan memuat opini yang tidak teruji, data ilmiah menjadi bias, pembaca tersesat oleh informasi keliru, dan kebijakan konservasi perlindungan alam yang diambil berisiko gagal total.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Teks Pidato Persuasif]
Susunlah sebuah naskah pidato persuasif perpisahan kelas 6 sekolah dasar (minimal 2 paragraf) yang memuat:
a. Sapaan hormat dan ungkapan rasa syukur kepada Tuhan
b. Ungkapan terima kasih yang tulus dan bakti kepada bapak/ibu guru yang telah mengajar selama enam tahun
c. Permohonan maaf atas segala kesalahan dan kenakalan selama bersekolah
d. Satu kalimat ajakan persuasif kepada teman-teman angkatan agar terus bersemangat menuntut ilmu di jenjang SMP!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Naskah Pidato Perpisahan:
"Selamat pagi dan salam sejahtera bagi Bapak/Ibu Guru serta teman-teman yang saya sayangi. Puji dan syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa karena atas limpahan rahmat-Nya kita dapat berkumpul dalam acara perpisahan kelas enam ini dalam keadaan sehat walafiat.

Bapak dan Ibu Guru yang kami muliakan, tiada untaian kata yang mampu membalas ketulusan dan kesabaran Bapak/Ibu dalam mendidik kami selama enam tahun ini. Dari anak yang belum bisa membaca hingga kami menjadi siswa yang siap menatap masa depan, jasa Bapak/Ibu laksana pelita dalam kegelapan. Kami memohon maaf yang sebesar-besarnya atas segala kekhilafan, tingkah laku, dan kenakalan kami yang pernah melukai hati Bapak/Ibu Guru. Kepada teman-teman seperjuanganku, marilah kita jaga nama baik sekolah kita dan teruslah melangkah dengan semangat membara menuntut ilmu di jenjang sekolah menengah pertama demi menggapai cita-cita luhur kita bersama! Terima kasih, selamat pagi."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 5 & 6 - Teks Cerpen & Gaya Bahasa]
Bacalah kutipan cerpen berikut, lalu analisislah unsur intrinsiknya (tema, watak tokoh, latar suasana, dan amanat) serta sebutkan dua jenis majas yang digunakan dalam kutipan tersebut!

"Mentari pagi tersenyum hangat menyapa langkah kaki Raka. Meskipun sepatu bututnya sudah menganga dan baju seragamnya telah pudar warnanya, binar semangat di matanya menyala membakar keputusasaan. Dengan sabar, ia membantu kakeknya memikul keranjang singkong ke pasar sebelum berangkat ke sekolah. Raka berbisik dalam hatinya, kemiskinan bukanlah tembok penghalang untuk menjadi anak yang berilmu."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tema: Kegigihan menuntut ilmu dan bakti kepada keluarga di tengah keterbatasan ekonomi.
2. Watak Tokoh Raka: Berbakti, penyabar, pantang menyerah, dan memiliki tekad belajar yang kuat.
3. Latar Suasana: Penuh kehangatan, haru, dan semangat membara di pagi hari.
4. Amanat: Jangan pernah berputus asa terhadap kemiskinan atau keterbatasan fasilitas; tetaplah rajin berbakti kepada orang tua dan bersemangat menuntut ilmu.
5. Majas yang Digunakan:
   - Majas Personifikasi: "Mentari pagi tersenyum hangat menyapa langkah kaki Raka."
   - Majas Hiperbola: "Binar semangat di matanya menyala membakar keputusasaan." (atau Majas Metafora: "kemiskinan bukanlah tembok penghalang").',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Literasi Digital & Kesantunan Berbahasa]
Jelaskan apa yang dimaksud dengan prinsip "Saring Sebelum Sharing" dalam beraktivitas di dunia maya, mengapa kita dilarang membagikan data pribadi (seperti NIK dan nomor telepon) kepada pihak tak dikenal di internet, serta bagaimana cara menegur teman di grup percakapan yang menyebarkan berita bohong secara santun tanpa mempermalukannya di depan umum!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Prinsip "Saring Sebelum Sharing": Sikap bijak untuk memeriksa, memverifikasi, dan menyaring kebenaran serta manfaat suatu informasi/berita sebelum memutuskan untuk meneruskan atau membagikannya ke media sosial.
2. Alasan Melindungi Data Pribadi: NIK dan nomor telepon adalah identitas rahasia yang dapat disalahgunakan oleh penjahat siber untuk penipuan daring, pencurian rekening perbankan, pinjaman daring ilegal, atau pemerasan digital.
3. Cara Menegur Teman Secara Santun:
   - Menegur melalui pesan pribadi (japri/private message) agar teman tidak merasa dipermalukan di depan anggota grup lainnya.
   - Menggunakan bahasa yang santun dan mengedepankan fakta klarifikasi dari sumber resmi terpercaya, misalnya: "Hai kawan, terima kasih sudah berbagi info di grup. Namun, setelah saya cek di situs resmi Kemenkes/pemerintah, berita tersebut ternyata tergolong hoaks/tidak valid. Mari kita klarifikasi di grup agar teman-teman lain tidak salah paham ya sahabat."',
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
