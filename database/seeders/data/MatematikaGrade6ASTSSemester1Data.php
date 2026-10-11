<?php

namespace Database\Seeders\Data;

class MatematikaGrade6ASTSSemester1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Matematika Kelas 6 (Paket A)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Tengah Semester 1 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket A. Menguji capaian Bab 1 (Pecahan dan Desimal Lanjutan) dan Bab 2 (Rasio, Proporsi & Skala Peta). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket A): Pengelolaan Lumbung Pangan Desa dan Perbandingan Stok', 'content' => '[Keterangan Gambar: Lumbung gabah desa mandiri dengan karung-karung beras tersusun rapi: Timbangan beras mekanik dan papan inventaris stok komoditas pangan.]
Dalam menjaga ketahanan pangan masyarakat, Koperasi Desa "Sukamaju" mengelola lumbung padi terpadu. Pada panen gadu musim ini, lumbung menerima kiriman 4,8 ton gabah kering giling (GKG).

Pengurus lumbung mendistribusikan gabah tersebut ke beberapa unit penggilingan beras desa. Sebanyak 3/8 bagian dialokasikan untuk stok pangan cadangan desa, yaitu 3/8 x 4,8 ton = 1,8 ton (1.800 kg). Sebanyak 25% (0,25 bagian) digiling menjadi beras kualitas premium untuk dijual ke pasar induk, yaitu 0,25 x 4,8 ton = 1,2 ton (1.200 kg). Sisanya sebesar 4,8 - 1,8 - 1,2 = 1,8 ton digiling untuk memenuhi kebutuhan harian warga desa. Dalam proses penggilingan, rasio antara beras bersih dan dedak bekatul yang dihasilkan adalah 7 : 3. Artinya, dari setiap 10 kg gabah giling, diperoleh 7 kg beras putih bersih dan 3 kg bekatul pakan ternak. Manajemen pangan yang terukur memastikan desa selalu mandiri dan bebas krisis pangan.'],
                            ['title' => 'Stimulus 2 (Paket A): Ekspedisi Pengiriman Logistik Antarpulau', 'content' => '[Keterangan Gambar: Kapal kargo perintis sandar di pelabuhan peti kemas: Peta jalur pelayaran antarpulau berskala 1 : 2.000.000 dengan penanda rute pelayaran laut.]
Sebuah kapal kargo perintis melayani pengiriman kebutuhan pokok dari Pelabuhan Tanjung Perak Surabaya menuju Pelabuhan Lembar di Lombok. Pada peta navigasi maritim berskala 1 : 2.000.000, jarak garis pelayaran antara kedua pelabuhan terukur sepanjang 18 cm.

Kapten kapal menghitung jarak pelayaran sebenarnya: Jarak sebenarnya = 18 cm x 2.000.000 = 36.000.000 cm = 360 km. Kapal berlayar dengan kecepatan tetap rata-rata 30 km/jam (sekitar 16 knot). Waktu tempuh perjalanan laut dihitung dengan perbandingan: 360 km : 30 km/jam = 12 jam. Kapal mengonsumsi bahan bakar solar sebanyak 50 liter untuk setiap 30 km pelayaran. Dengan demikian, total bahan bakar yang dibutuhkan untuk pelayaran satu arah adalah: (360 : 30) x 50 liter = 12 x 50 = 600 liter solar. Perhitungan yang akurat menjamin keselamatan kapal mengarungi selat.'],
                            ['title' => 'Stimulus 3 (Paket A): Proyek Pengaspalan Jalan Desa dan Estimasi Tenaga Kerja', 'content' => '[Keterangan Gambar: Alat berat pemadat jalan (roller) dan sekelompok pekerja proyek pengaspalan jalan desa sepanjang 3 km dengan papan target penyelesaian kerja.]
Program Dana Desa mengalokasikan anggaran untuk pengaspalan jalan penghubung antardusun sepanjang 3 kilometer. Berdasarkan analisis teknis dinas pekerjaan umum, pekerjaan pengaspalan tersebut dapat diselesaikan oleh 12 orang pekerja dalam waktu 25 hari kerja.

Karena jalan tersebut akan segera dilalui untuk jalur panen raya jagung, kepala desa meminta agar proyek diselesaikan lebih cepat dalam waktu 15 hari saja. Hubungan antara banyak pekerja dan waktu pengerjaan merupakan perbandingan berbalik nilai. Beban total pekerjaan = 12 x 25 = 300 hari-orang. Untuk menyelesaikan dalam 15 hari, banyak pekerja yang dibutuhkan adalah: 300 : 15 = 20 orang pekerja. Dengan demikian, kontraktor desa harus menambah tenaga kerja sebanyak 20 - 12 = 8 orang pekerja. Gotong royong dan manajemen proyek yang baik mempercepat terwujudnya infrastruktur desa yang tangguh.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket A, berapa kilogram gabah yang disimpan untuk cadangan pangan desa?',
                                'explanation' => '3/8 x 4.800 kg = 1.800 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.800 kg (1,8 ton)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 kg (1,2 ton)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.500 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika dari 1,8 ton gabah harian digiling seluruhnya dengan rasio beras:bekatul = 7 : 3, berapa kilogram beras bersih yang diperoleh?',
                                'explanation' => '7/10 x 1.800 kg = 1.260 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.260 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.350 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.400 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai alokasi gabah di lumbung pangan!',
                                'explanation' => 'Pasar induk 25% = 1,2 ton; Rasio beras:bekatul = 7:3.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Gabah untuk beras premium pasar induk adalah 1,2 ton (25%).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rasio beras bersih terhadap dedak bekatul adalah 7 : 3.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Total gabah yang diterima lumbung adalah 10 ton.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Stok cadangan pangan desa lebih sedikit dari beras pasar induk.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan lumbung pangan!',
                                'explanation' => 'Beras bersih (7 bagian) lebih banyak dari bekatul (3 bagian).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sebanyak 4,8 ton gabah sama dengan 4.800 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rasio 7 : 3 memiliki total perbandingan 10 bagian.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Beras bersih yang dihasilkan lebih sedikit dari dedak bekatul.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sisa gabah untuk kebutuhan warga adalah 1,8 ton.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa kilometer jarak pelayaran sebenarnya antara kedua pelabuhan?',
                                'explanation' => '18 x 20 km = 360 km.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '360 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '320 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '400 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '280 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa liter bahan bakar solar yang dihabiskan kapal untuk menempuh perjalanan 360 km?',
                                'explanation' => '12 x 50 = 600 liter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '600 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '500 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '720 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '650 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data navigasi kapal kargo dengan nilainya!',
                                'explanation' => 'Data pelayaran kapal kargo perintis.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jarak pada peta (skala 1 : 2.000.000)', 'is_correct' => false, 'match_key' => '18 cm', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarak pelayaran sebenarnya', 'is_correct' => false, 'match_key' => '360 km', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Waktu tempuh pada kecepatan 30 km/jam', 'is_correct' => false, 'match_key' => '12 jam', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kebutuhan solar total', 'is_correct' => false, 'match_key' => '600 liter', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan pelayaran!',
                                'explanation' => 'Kapal membutuhkan 600 liter solar (bukan 1.000 liter).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 2.000.000 berarti 1 cm di peta mewakili 20 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Lama perjalanan kapal adalah 12 jam.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kapal membutuhkan 1.000 liter solar untuk satu arah.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan jarak pelayaran dan konsumsi solar adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa orang total pekerja yang dibutuhkan agar jalan selesai dalam 15 hari?',
                                'explanation' => '12 x 25 : 15 = 300 : 15 = 20 orang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '18 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '16 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa orang pekerja tambahan yang harus ditambahkan oleh kontraktor desa?',
                                'explanation' => '20 - 12 = 8 orang pekerja tambahan.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai proyek pengaspalan jalan desa!',
                                'explanation' => 'Berbalik nilai; pekerja tambahan = 8 orang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hubungan banyak pekerja dan waktu pengerjaan merupakan perbandingan berbalik nilai.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pekerja tambahan yang dibutuhkan adalah 8 orang.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jika pekerja bertambah, waktu penyelesaian jalan akan semakin lama.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Total beban pekerjaan pengaspalan adalah 500 hari-orang.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip pengerjaan jalan desa!',
                                'explanation' => 'Proyek pekerja dan hari adalah perbandingan berbalik nilai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Total beban kerja adalah 12 x 25 = 300 hari-orang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Untuk selesai dalam 15 hari dibutuhkan 20 pekerja.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pengaspalan jalan adalah contoh perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Semakin banyak pekerja, waktu penyelesaian jalan semakin cepat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3 1/2 x 4/7 adalah ....',
                                'explanation' => '7/2 x 4/7 = 28/14 = 2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 1/2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 3/4', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 2/5 : 0,8 adalah ....',
                                'explanation' => '12/5 : 4/5 = 12/4 = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 36 : 60 adalah ....',
                                'explanation' => 'Dibagi 12 -> 3 : 5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 : 5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 : 3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3 : 4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan uang Andi dan Budi adalah 3 : 5. Jika uang Budi Rp45.000, uang Andi adalah ....',
                                'explanation' => '45.000 : 5 x 3 = 27.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp27.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp30.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp25.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp24.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil melaju 60 km/jam membutuhkan waktu 4 jam. Jika kecepatan 80 km/jam, waktu tempuh adalah ....',
                                'explanation' => '60 x 4 : 80 = 240 : 80 = 3 jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Harga 6 buku tulis adalah Rp24.000. Harga 15 buku tulis yang sama adalah ....',
                                'explanation' => '24.000 : 6 x 15 = 60.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp60.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp55.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp50.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp65.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak kota A dan B pada peta berskala 1 : 1.500.000 adalah 6 cm. Jarak sebenarnya adalah ....',
                                'explanation' => '6 x 15 km = 90 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '90 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '75 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '60 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '100 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak sebenarnya 120 km digambar pada peta sepanjang 8 cm. Skala peta tersebut adalah ....',
                                'explanation' => '12.000.000 : 8 = 1.500.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 : 1.500.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 : 1.200.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 : 1.800.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 1.000.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah lapangan berukuran 50 m x 30 m digambar berskala 1 : 1.000. Ukuran denah adalah ....',
                                'explanation' => '5.000:1.000 = 5 cm; 3.000:1.000 = 3 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 cm x 3 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 cm x 6 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '5 cm x 2 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4 cm x 3 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 0,75 + 1/2 x 1,4 adalah ....',
                                'explanation' => '0,75 + 0,70 = 1,45.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1,45', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1,35', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1,50', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,25', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk yang senilai dengan 2 1/4!',
                                'explanation' => '2 1/4 = 9/4 = 2,25 = 225%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '225%', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '250%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA perbandingan yang senilai dengan 4 : 5!',
                                'explanation' => '4:5 senilai dengan 12:15 dan 20:25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 : 15', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20 : 25', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 : 12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '16 : 25', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kejadian perbandingan senilai!',
                                'explanation' => 'Bensin-jarak dan barang-bayar adalah perbandingan senilai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jumlah liter bensin dan jarak tempuh kendaraan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jumlah barang yang dibeli dan total pembayaran kasir.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kecepatan berkendara dan waktu tiba di tujuan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jumlah pekerja proyek dan hari penyelesaian.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi pecahan dengan hasilnya!',
                                'explanation' => 'Operasi pecahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/4 x 8/9', 'is_correct' => false, 'match_key' => '2/3', 'order' => 1],
                                    ['label' => null, 'option_text' => '5/6 : 2/3', 'is_correct' => false, 'match_key' => '1 1/4', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 1/2 + 0,5 x 2', 'is_correct' => false, 'match_key' => '2,5', 'order' => 3],
                                    ['label' => null, 'option_text' => '2 - 3/4', 'is_correct' => false, 'match_key' => '1 1/4', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan perbandingan dengan bentuk sederhananya!',
                                'explanation' => 'Penyederhanaan perbandingan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20 : 35', 'is_correct' => false, 'match_key' => '4 : 7', 'order' => 1],
                                    ['label' => null, 'option_text' => '28 : 42', 'is_correct' => false, 'match_key' => '2 : 3', 'order' => 2],
                                    ['label' => null, 'option_text' => '15 : 45', 'is_correct' => false, 'match_key' => '1 : 3', 'order' => 3],
                                    ['label' => null, 'option_text' => '50 : 75', 'is_correct' => false, 'match_key' => '2 : 3', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan skala dengan jarak sebenarnya dari 4 cm di peta!',
                                'explanation' => 'Perhitungan skala peta.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 500.000', 'is_correct' => false, 'match_key' => '20 km', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Skala 1 : 1.000.000', 'is_correct' => false, 'match_key' => '40 km', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Skala 1 : 2.000.000', 'is_correct' => false, 'match_key' => '80 km', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Skala 1 : 250.000', 'is_correct' => false, 'match_key' => '10 km', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah matematika Semester 1!',
                                'explanation' => 'Mengalikan dengan 0,25 sama dengan membagi dengan 4 (karena 0,25 = 1/4).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Operasi perkalian dan pembagian memiliki derajat sama kuat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Perbandingan senilai memiliki perbandingan rasio tetap.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Skala 1 : 100 berarti 1 cm di peta mewakili 1 meter di lapangan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mengalikan bilangan dengan 0,25 sama dengan membagi dengan 2.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan terapan!',
                                'explanation' => '50% dari 500 adalah 250 (bukan 200).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika rasio A:B = 2:3 dan A=10, maka B=15.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Suatu proyek oleh 6 orang selesai 10 hari, oleh 12 orang selesai 5 hari.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jarak 5 cm pada peta berskala 1 : 200.000 adalah 10 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai 50% dari 500 adalah 200.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Hasil dari 2/3 x 3/4 adalah ....',
                                'explanation' => '1/2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 3 1/2 : 0,5 adalah ....',
                                'explanation' => '7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk paling sederhana dari 30 : 45 adalah ....',
                                'explanation' => '2 : 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2 : 3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan umur adik dan kakak 2 : 5. Jika umur adik 8 tahun, umur kakak adalah ... tahun.',
                                'explanation' => '8 : 2 x 5 = 20 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Harga 4 pensil Rp10.000. Harga 10 pensil adalah Rp....',
                                'explanation' => '10.000 : 4 x 10 = 25.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '25000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Suatu pekerjaan selesai 15 hari oleh 4 orang. Oleh 6 orang selesai dalam ... hari.',
                                'explanation' => '15 x 4 : 6 = 10 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak pada peta 3 cm berskala 1 : 1.000.000 mewakili jarak sebenarnya ... km.',
                                'explanation' => '3 x 10 km = 30 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '30', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak sebenarnya 80 km digambar pada peta berskala 1 : 2.000.000 sepanjang ... cm.',
                                'explanation' => '8.000.000 : 2.000.000 = 4 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk persen dari 3/5 adalah ...%.',
                                'explanation' => '60%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '60', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk desimal dari 7/20 adalah ....',
                                'explanation' => '0,35.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,35', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 1 - 0,45 adalah ....',
                                'explanation' => '0,55.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,55', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan 500 meter terhadap 2 km adalah ....',
                                'explanation' => '500 : 2.000 = 1 : 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1 : 4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Uang Riko : Uang Bayu = 3 : 4. Jika jumlah uang mereka Rp70.000, uang Riko adalah Rp....',
                                'explanation' => '3/7 x 70.000 = 30.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '30000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah denah berskala 1 : 200. Panjang denah 5 cm sama dengan ... meter sebenarnya.',
                                'explanation' => '5 x 200 = 1.000 cm = 10 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rumus skala adalah Jarak pada Peta ... Jarak Sebenarnya (dibagi/dikali).',
                                'explanation' => 'dibagi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dibagi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah koperasi tani memiliki persediaan pupuk urea sebanyak 3,6 ton. Hari pertama terjual 1/3 bagian, hari kedua terjual 25% dari persediaan awal, dan sisanya dibagikan secara merata kepada 9 kelompok tani binaan. Tentukan:
(a) Pupuk yang terjual pada hari pertama (kg)
(b) Pupuk yang terjual pada hari kedua (kg)
(c) Sisa pupuk yang dibagikan kepada kelompok tani (kg)
(d) Berat pupuk yang diterima masing-masing kelompok tani (kg)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total pupuk = 3,6 ton = 3.600 kg.
(a) Hari pertama = 1/3 x 3.600 kg = 1.200 kg.
(b) Hari kedua = 25% x 3.600 kg = 900 kg.
(c) Sisa pupuk = 3.600 - (1.200 + 900) = 3.600 - 2.100 = 1.500 kg.
(d) Setiap kelompok tani = 1.500 kg : 9 kelompok = 166,67 kg (atau 166 2/3 kg).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbandingan jumlah tabungan Amir, Budi, dan Candra adalah 3 : 5 : 7. Jika selisih uang tabungan Candra dan Amir adalah Rp160.000, tentukan:
(a) Besar tabungan Amir
(b) Besar tabungan Budi
(c) Besar tabungan Candra
(d) Jumlah tabungan ketiga anak tersebut seluruhnya',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Selisih bagian Candra dan Amir = 7 - 3 = 4 bagian.
Nilai 1 bagian = Rp160.000 : 4 = Rp40.000.
(a) Tabungan Amir = 3 x Rp40.000 = Rp120.000
(b) Tabungan Budi = 5 x Rp40.000 = Rp200.000
(c) Tabungan Candra = 7 x Rp40.000 = Rp280.000
(d) Total tabungan = Rp120.000 + Rp200.000 + Rp280.000 = Rp600.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah proyek jembatan direncanakan selesai dalam waktu 36 hari dengan 15 orang pekerja. Setelah bekerja selama 12 hari, proyek dihentikan selama 4 hari karena banjir bandang. Berapa orang pekerja tambahan yang harus ditambah agar proyek jembatan dapat selesai tepat waktu?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Beban kerja total = 36 hari x 15 pekerja = 540 hari-orang.
Beban yang sudah selesai = 12 hari x 15 pekerja = 180 hari-orang.
Sisa beban kerja = 540 - 180 = 360 hari-orang.
Sisa hari kerja = 36 - 12 - 4 = 20 hari.
Pekerja yang dibutuhkan = 360 : 20 = 18 orang pekerja.
Pekerja tambahan = 18 - 15 = 3 orang pekerja tambahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jarak antara Kota A dan Kota B pada peta adalah 7,5 cm. Peta tersebut memiliki skala 1 : 1.600.000. Tentukan:
(a) Jarak sebenarnya kedua kota dalam kilometer
(b) Jika seorang pengendara motor berangkat dari Kota A pukul 07.15 dengan kecepatan rata-rata 48 km/jam, pukul berapa ia akan tiba di Kota B jika di jalan beristirahat selama 30 menit?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jarak sebenarnya = 7,5 cm x 1.600.000 = 12.000.000 cm = 120 km.
(b) Waktu tempuh perjalanan = Jarak : Kecepatan = 120 km : 48 km/jam = 2,5 jam = 2 jam 30 menit.
Total waktu termasuk istirahat = 2 jam 30 menit + 30 menit = 3 jam.
Waktu tiba = 07.15 + 3 jam = 10.15.
Jadi, ia akan tiba di Kota B pukul 10.15.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kebun sayur berbentuk persegi panjang digambar pada denah berskala 1 : 400 dengan ukuran panjang 15 cm dan lebar 10 cm. Tentukan:
(a) Ukuran panjang dan lebar sebenarnya kebun tersebut (meter)
(b) Keliling kebun sebenarnya (meter)
(c) Luas kebun sebenarnya (meter persegi)
(d) Jika sekeliling kebun dipasangi pagar kawat dengan biaya Rp75.000 per meter, berapa total biaya pemasangan pagar kawat tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Panjang sebenarnya = 15 cm x 400 = 6.000 cm = 60 meter.
    Lebar sebenarnya = 10 cm x 400 = 4.000 cm = 40 meter.
(b) Keliling sebenarnya = 2 x (60 + 40) = 2 x 100 = 200 meter.
(c) Luas sebenarnya = 60 m x 40 m = 2.400 m².
(d) Biaya pagar kawat = Keliling x Biaya per meter = 200 m x Rp75.000 = Rp15.000.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Matematika Kelas 6 (Paket B)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Tengah Semester 1 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket B. Menguji capaian Bab 1 (Pecahan dan Desimal Lanjutan) dan Bab 2 (Rasio, Proporsi & Skala Peta). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket B): Pengelolaan Lumbung Pangan Desa dan Perbandingan Stok', 'content' => '[Keterangan Gambar: Lumbung gabah desa mandiri dengan karung-karung beras tersusun rapi: Timbangan beras mekanik dan papan inventaris stok komoditas pangan.]
Dalam menjaga ketahanan pangan masyarakat, Koperasi Desa "Sukamaju" mengelola lumbung padi terpadu. Pada panen gadu musim ini, lumbung menerima kiriman 4,8 ton gabah kering giling (GKG).

Pengurus lumbung mendistribusikan gabah tersebut ke beberapa unit penggilingan beras desa. Sebanyak 3/8 bagian dialokasikan untuk stok pangan cadangan desa, yaitu 3/8 x 4,8 ton = 1,8 ton (1.800 kg). Sebanyak 25% (0,25 bagian) digiling menjadi beras kualitas premium untuk dijual ke pasar induk, yaitu 0,25 x 4,8 ton = 1,2 ton (1.200 kg). Sisanya sebesar 4,8 - 1,8 - 1,2 = 1,8 ton digiling untuk memenuhi kebutuhan harian warga desa. Dalam proses penggilingan, rasio antara beras bersih dan dedak bekatul yang dihasilkan adalah 7 : 3. Artinya, dari setiap 10 kg gabah giling, diperoleh 7 kg beras putih bersih dan 3 kg bekatul pakan ternak. Manajemen pangan yang terukur memastikan desa selalu mandiri dan bebas krisis pangan.'],
                            ['title' => 'Stimulus 2 (Paket B): Ekspedisi Pengiriman Logistik Antarpulau', 'content' => '[Keterangan Gambar: Kapal kargo perintis sandar di pelabuhan peti kemas: Peta jalur pelayaran antarpulau berskala 1 : 2.000.000 dengan penanda rute pelayaran laut.]
Sebuah kapal kargo perintis melayani pengiriman kebutuhan pokok dari Pelabuhan Tanjung Perak Surabaya menuju Pelabuhan Lembar di Lombok. Pada peta navigasi maritim berskala 1 : 2.000.000, jarak garis pelayaran antara kedua pelabuhan terukur sepanjang 18 cm.

Kapten kapal menghitung jarak pelayaran sebenarnya: Jarak sebenarnya = 18 cm x 2.000.000 = 36.000.000 cm = 360 km. Kapal berlayar dengan kecepatan tetap rata-rata 30 km/jam (sekitar 16 knot). Waktu tempuh perjalanan laut dihitung dengan perbandingan: 360 km : 30 km/jam = 12 jam. Kapal mengonsumsi bahan bakar solar sebanyak 50 liter untuk setiap 30 km pelayaran. Dengan demikian, total bahan bakar yang dibutuhkan untuk pelayaran satu arah adalah: (360 : 30) x 50 liter = 12 x 50 = 600 liter solar. Perhitungan yang akurat menjamin keselamatan kapal mengarungi selat.'],
                            ['title' => 'Stimulus 3 (Paket B): Proyek Pengaspalan Jalan Desa dan Estimasi Tenaga Kerja', 'content' => '[Keterangan Gambar: Alat berat pemadat jalan (roller) dan sekelompok pekerja proyek pengaspalan jalan desa sepanjang 3 km dengan papan target penyelesaian kerja.]
Program Dana Desa mengalokasikan anggaran untuk pengaspalan jalan penghubung antardusun sepanjang 3 kilometer. Berdasarkan analisis teknis dinas pekerjaan umum, pekerjaan pengaspalan tersebut dapat diselesaikan oleh 12 orang pekerja dalam waktu 25 hari kerja.

Karena jalan tersebut akan segera dilalui untuk jalur panen raya jagung, kepala desa meminta agar proyek diselesaikan lebih cepat dalam waktu 15 hari saja. Hubungan antara banyak pekerja dan waktu pengerjaan merupakan perbandingan berbalik nilai. Beban total pekerjaan = 12 x 25 = 300 hari-orang. Untuk menyelesaikan dalam 15 hari, banyak pekerja yang dibutuhkan adalah: 300 : 15 = 20 orang pekerja. Dengan demikian, kontraktor desa harus menambah tenaga kerja sebanyak 20 - 12 = 8 orang pekerja. Gotong royong dan manajemen proyek yang baik mempercepat terwujudnya infrastruktur desa yang tangguh.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket B, berapa kilogram gabah yang disimpan untuk cadangan pangan desa?',
                                'explanation' => '3/8 x 4.800 kg = 1.800 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.800 kg (1,8 ton)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 kg (1,2 ton)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.500 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika dari 1,8 ton gabah harian digiling seluruhnya dengan rasio beras:bekatul = 7 : 3, berapa kilogram beras bersih yang diperoleh?',
                                'explanation' => '7/10 x 1.800 kg = 1.260 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.260 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.350 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.400 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai alokasi gabah di lumbung pangan!',
                                'explanation' => 'Pasar induk 25% = 1,2 ton; Rasio beras:bekatul = 7:3.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Gabah untuk beras premium pasar induk adalah 1,2 ton (25%).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rasio beras bersih terhadap dedak bekatul adalah 7 : 3.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Total gabah yang diterima lumbung adalah 10 ton.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Stok cadangan pangan desa lebih sedikit dari beras pasar induk.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan lumbung pangan!',
                                'explanation' => 'Beras bersih (7 bagian) lebih banyak dari bekatul (3 bagian).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sebanyak 4,8 ton gabah sama dengan 4.800 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rasio 7 : 3 memiliki total perbandingan 10 bagian.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Beras bersih yang dihasilkan lebih sedikit dari dedak bekatul.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sisa gabah untuk kebutuhan warga adalah 1,8 ton.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa kilometer jarak pelayaran sebenarnya antara kedua pelabuhan?',
                                'explanation' => '18 x 20 km = 360 km.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '360 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '320 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '400 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '280 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa liter bahan bakar solar yang dihabiskan kapal untuk menempuh perjalanan 360 km?',
                                'explanation' => '12 x 50 = 600 liter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '600 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '500 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '720 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '650 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data navigasi kapal kargo dengan nilainya!',
                                'explanation' => 'Data pelayaran kapal kargo perintis.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jarak pada peta (skala 1 : 2.000.000)', 'is_correct' => false, 'match_key' => '18 cm', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarak pelayaran sebenarnya', 'is_correct' => false, 'match_key' => '360 km', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Waktu tempuh pada kecepatan 30 km/jam', 'is_correct' => false, 'match_key' => '12 jam', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kebutuhan solar total', 'is_correct' => false, 'match_key' => '600 liter', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan pelayaran!',
                                'explanation' => 'Kapal membutuhkan 600 liter solar (bukan 1.000 liter).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 2.000.000 berarti 1 cm di peta mewakili 20 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Lama perjalanan kapal adalah 12 jam.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kapal membutuhkan 1.000 liter solar untuk satu arah.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan jarak pelayaran dan konsumsi solar adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa orang total pekerja yang dibutuhkan agar jalan selesai dalam 15 hari?',
                                'explanation' => '12 x 25 : 15 = 300 : 15 = 20 orang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '18 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '16 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa orang pekerja tambahan yang harus ditambahkan oleh kontraktor desa?',
                                'explanation' => '20 - 12 = 8 orang pekerja tambahan.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai proyek pengaspalan jalan desa!',
                                'explanation' => 'Berbalik nilai; pekerja tambahan = 8 orang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hubungan banyak pekerja dan waktu pengerjaan merupakan perbandingan berbalik nilai.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pekerja tambahan yang dibutuhkan adalah 8 orang.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jika pekerja bertambah, waktu penyelesaian jalan akan semakin lama.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Total beban pekerjaan pengaspalan adalah 500 hari-orang.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip pengerjaan jalan desa!',
                                'explanation' => 'Proyek pekerja dan hari adalah perbandingan berbalik nilai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Total beban kerja adalah 12 x 25 = 300 hari-orang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Untuk selesai dalam 15 hari dibutuhkan 20 pekerja.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pengaspalan jalan adalah contoh perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Semakin banyak pekerja, waktu penyelesaian jalan semakin cepat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3 1/2 x 4/7 adalah ....',
                                'explanation' => '7/2 x 4/7 = 28/14 = 2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 1/2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 3/4', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 2/5 : 0,8 adalah ....',
                                'explanation' => '12/5 : 4/5 = 12/4 = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 36 : 60 adalah ....',
                                'explanation' => 'Dibagi 12 -> 3 : 5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 : 5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 : 3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3 : 4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan uang Andi dan Budi adalah 3 : 5. Jika uang Budi Rp45.000, uang Andi adalah ....',
                                'explanation' => '45.000 : 5 x 3 = 27.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp27.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp30.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp25.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp24.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil melaju 60 km/jam membutuhkan waktu 4 jam. Jika kecepatan 80 km/jam, waktu tempuh adalah ....',
                                'explanation' => '60 x 4 : 80 = 240 : 80 = 3 jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Harga 6 buku tulis adalah Rp24.000. Harga 15 buku tulis yang sama adalah ....',
                                'explanation' => '24.000 : 6 x 15 = 60.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp60.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp55.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp50.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp65.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak kota A dan B pada peta berskala 1 : 1.500.000 adalah 6 cm. Jarak sebenarnya adalah ....',
                                'explanation' => '6 x 15 km = 90 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '90 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '75 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '60 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '100 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak sebenarnya 120 km digambar pada peta sepanjang 8 cm. Skala peta tersebut adalah ....',
                                'explanation' => '12.000.000 : 8 = 1.500.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 : 1.500.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 : 1.200.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 : 1.800.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 1.000.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah lapangan berukuran 50 m x 30 m digambar berskala 1 : 1.000. Ukuran denah adalah ....',
                                'explanation' => '5.000:1.000 = 5 cm; 3.000:1.000 = 3 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 cm x 3 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 cm x 6 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '5 cm x 2 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4 cm x 3 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 0,75 + 1/2 x 1,4 adalah ....',
                                'explanation' => '0,75 + 0,70 = 1,45.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1,45', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1,35', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1,50', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,25', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk yang senilai dengan 2 1/4!',
                                'explanation' => '2 1/4 = 9/4 = 2,25 = 225%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '225%', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '250%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA perbandingan yang senilai dengan 4 : 5!',
                                'explanation' => '4:5 senilai dengan 12:15 dan 20:25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 : 15', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20 : 25', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 : 12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '16 : 25', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kejadian perbandingan senilai!',
                                'explanation' => 'Bensin-jarak dan barang-bayar adalah perbandingan senilai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jumlah liter bensin dan jarak tempuh kendaraan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jumlah barang yang dibeli dan total pembayaran kasir.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kecepatan berkendara dan waktu tiba di tujuan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jumlah pekerja proyek dan hari penyelesaian.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi pecahan dengan hasilnya!',
                                'explanation' => 'Operasi pecahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/4 x 8/9', 'is_correct' => false, 'match_key' => '2/3', 'order' => 1],
                                    ['label' => null, 'option_text' => '5/6 : 2/3', 'is_correct' => false, 'match_key' => '1 1/4', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 1/2 + 0,5 x 2', 'is_correct' => false, 'match_key' => '2,5', 'order' => 3],
                                    ['label' => null, 'option_text' => '2 - 3/4', 'is_correct' => false, 'match_key' => '1 1/4', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan perbandingan dengan bentuk sederhananya!',
                                'explanation' => 'Penyederhanaan perbandingan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20 : 35', 'is_correct' => false, 'match_key' => '4 : 7', 'order' => 1],
                                    ['label' => null, 'option_text' => '28 : 42', 'is_correct' => false, 'match_key' => '2 : 3', 'order' => 2],
                                    ['label' => null, 'option_text' => '15 : 45', 'is_correct' => false, 'match_key' => '1 : 3', 'order' => 3],
                                    ['label' => null, 'option_text' => '50 : 75', 'is_correct' => false, 'match_key' => '2 : 3', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan skala dengan jarak sebenarnya dari 4 cm di peta!',
                                'explanation' => 'Perhitungan skala peta.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 500.000', 'is_correct' => false, 'match_key' => '20 km', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Skala 1 : 1.000.000', 'is_correct' => false, 'match_key' => '40 km', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Skala 1 : 2.000.000', 'is_correct' => false, 'match_key' => '80 km', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Skala 1 : 250.000', 'is_correct' => false, 'match_key' => '10 km', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah matematika Semester 1!',
                                'explanation' => 'Mengalikan dengan 0,25 sama dengan membagi dengan 4 (karena 0,25 = 1/4).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Operasi perkalian dan pembagian memiliki derajat sama kuat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Perbandingan senilai memiliki perbandingan rasio tetap.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Skala 1 : 100 berarti 1 cm di peta mewakili 1 meter di lapangan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mengalikan bilangan dengan 0,25 sama dengan membagi dengan 2.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan terapan!',
                                'explanation' => '50% dari 500 adalah 250 (bukan 200).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika rasio A:B = 2:3 dan A=10, maka B=15.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Suatu proyek oleh 6 orang selesai 10 hari, oleh 12 orang selesai 5 hari.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jarak 5 cm pada peta berskala 1 : 200.000 adalah 10 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai 50% dari 500 adalah 200.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Hasil dari 2/3 x 3/4 adalah ....',
                                'explanation' => '1/2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 3 1/2 : 0,5 adalah ....',
                                'explanation' => '7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk paling sederhana dari 30 : 45 adalah ....',
                                'explanation' => '2 : 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2 : 3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan umur adik dan kakak 2 : 5. Jika umur adik 8 tahun, umur kakak adalah ... tahun.',
                                'explanation' => '8 : 2 x 5 = 20 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Harga 4 pensil Rp10.000. Harga 10 pensil adalah Rp....',
                                'explanation' => '10.000 : 4 x 10 = 25.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '25000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Suatu pekerjaan selesai 15 hari oleh 4 orang. Oleh 6 orang selesai dalam ... hari.',
                                'explanation' => '15 x 4 : 6 = 10 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak pada peta 3 cm berskala 1 : 1.000.000 mewakili jarak sebenarnya ... km.',
                                'explanation' => '3 x 10 km = 30 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '30', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak sebenarnya 80 km digambar pada peta berskala 1 : 2.000.000 sepanjang ... cm.',
                                'explanation' => '8.000.000 : 2.000.000 = 4 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk persen dari 3/5 adalah ...%.',
                                'explanation' => '60%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '60', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk desimal dari 7/20 adalah ....',
                                'explanation' => '0,35.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,35', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 1 - 0,45 adalah ....',
                                'explanation' => '0,55.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,55', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan 500 meter terhadap 2 km adalah ....',
                                'explanation' => '500 : 2.000 = 1 : 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1 : 4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Uang Riko : Uang Bayu = 3 : 4. Jika jumlah uang mereka Rp70.000, uang Riko adalah Rp....',
                                'explanation' => '3/7 x 70.000 = 30.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '30000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah denah berskala 1 : 200. Panjang denah 5 cm sama dengan ... meter sebenarnya.',
                                'explanation' => '5 x 200 = 1.000 cm = 10 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rumus skala adalah Jarak pada Peta ... Jarak Sebenarnya (dibagi/dikali).',
                                'explanation' => 'dibagi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dibagi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah koperasi tani memiliki persediaan pupuk urea sebanyak 3,6 ton. Hari pertama terjual 1/3 bagian, hari kedua terjual 25% dari persediaan awal, dan sisanya dibagikan secara merata kepada 9 kelompok tani binaan. Tentukan:
(a) Pupuk yang terjual pada hari pertama (kg)
(b) Pupuk yang terjual pada hari kedua (kg)
(c) Sisa pupuk yang dibagikan kepada kelompok tani (kg)
(d) Berat pupuk yang diterima masing-masing kelompok tani (kg)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total pupuk = 3,6 ton = 3.600 kg.
(a) Hari pertama = 1/3 x 3.600 kg = 1.200 kg.
(b) Hari kedua = 25% x 3.600 kg = 900 kg.
(c) Sisa pupuk = 3.600 - (1.200 + 900) = 3.600 - 2.100 = 1.500 kg.
(d) Setiap kelompok tani = 1.500 kg : 9 kelompok = 166,67 kg (atau 166 2/3 kg).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbandingan jumlah tabungan Amir, Budi, dan Candra adalah 3 : 5 : 7. Jika selisih uang tabungan Candra dan Amir adalah Rp160.000, tentukan:
(a) Besar tabungan Amir
(b) Besar tabungan Budi
(c) Besar tabungan Candra
(d) Jumlah tabungan ketiga anak tersebut seluruhnya',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Selisih bagian Candra dan Amir = 7 - 3 = 4 bagian.
Nilai 1 bagian = Rp160.000 : 4 = Rp40.000.
(a) Tabungan Amir = 3 x Rp40.000 = Rp120.000
(b) Tabungan Budi = 5 x Rp40.000 = Rp200.000
(c) Tabungan Candra = 7 x Rp40.000 = Rp280.000
(d) Total tabungan = Rp120.000 + Rp200.000 + Rp280.000 = Rp600.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah proyek jembatan direncanakan selesai dalam waktu 36 hari dengan 15 orang pekerja. Setelah bekerja selama 12 hari, proyek dihentikan selama 4 hari karena banjir bandang. Berapa orang pekerja tambahan yang harus ditambah agar proyek jembatan dapat selesai tepat waktu?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Beban kerja total = 36 hari x 15 pekerja = 540 hari-orang.
Beban yang sudah selesai = 12 hari x 15 pekerja = 180 hari-orang.
Sisa beban kerja = 540 - 180 = 360 hari-orang.
Sisa hari kerja = 36 - 12 - 4 = 20 hari.
Pekerja yang dibutuhkan = 360 : 20 = 18 orang pekerja.
Pekerja tambahan = 18 - 15 = 3 orang pekerja tambahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jarak antara Kota A dan Kota B pada peta adalah 7,5 cm. Peta tersebut memiliki skala 1 : 1.600.000. Tentukan:
(a) Jarak sebenarnya kedua kota dalam kilometer
(b) Jika seorang pengendara motor berangkat dari Kota A pukul 07.15 dengan kecepatan rata-rata 48 km/jam, pukul berapa ia akan tiba di Kota B jika di jalan beristirahat selama 30 menit?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jarak sebenarnya = 7,5 cm x 1.600.000 = 12.000.000 cm = 120 km.
(b) Waktu tempuh perjalanan = Jarak : Kecepatan = 120 km : 48 km/jam = 2,5 jam = 2 jam 30 menit.
Total waktu termasuk istirahat = 2 jam 30 menit + 30 menit = 3 jam.
Waktu tiba = 07.15 + 3 jam = 10.15.
Jadi, ia akan tiba di Kota B pukul 10.15.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kebun sayur berbentuk persegi panjang digambar pada denah berskala 1 : 400 dengan ukuran panjang 15 cm dan lebar 10 cm. Tentukan:
(a) Ukuran panjang dan lebar sebenarnya kebun tersebut (meter)
(b) Keliling kebun sebenarnya (meter)
(c) Luas kebun sebenarnya (meter persegi)
(d) Jika sekeliling kebun dipasangi pagar kawat dengan biaya Rp75.000 per meter, berapa total biaya pemasangan pagar kawat tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Panjang sebenarnya = 15 cm x 400 = 6.000 cm = 60 meter.
    Lebar sebenarnya = 10 cm x 400 = 4.000 cm = 40 meter.
(b) Keliling sebenarnya = 2 x (60 + 40) = 2 x 100 = 200 meter.
(c) Luas sebenarnya = 60 m x 40 m = 2.400 m².
(d) Biaya pagar kawat = Keliling x Biaya per meter = 200 m x Rp75.000 = Rp15.000.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Matematika Kelas 6 (Paket C)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Tengah Semester 1 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket C. Menguji capaian Bab 1 (Pecahan dan Desimal Lanjutan) dan Bab 2 (Rasio, Proporsi & Skala Peta). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket C): Pengelolaan Lumbung Pangan Desa dan Perbandingan Stok', 'content' => '[Keterangan Gambar: Lumbung gabah desa mandiri dengan karung-karung beras tersusun rapi: Timbangan beras mekanik dan papan inventaris stok komoditas pangan.]
Dalam menjaga ketahanan pangan masyarakat, Koperasi Desa "Sukamaju" mengelola lumbung padi terpadu. Pada panen gadu musim ini, lumbung menerima kiriman 4,8 ton gabah kering giling (GKG).

Pengurus lumbung mendistribusikan gabah tersebut ke beberapa unit penggilingan beras desa. Sebanyak 3/8 bagian dialokasikan untuk stok pangan cadangan desa, yaitu 3/8 x 4,8 ton = 1,8 ton (1.800 kg). Sebanyak 25% (0,25 bagian) digiling menjadi beras kualitas premium untuk dijual ke pasar induk, yaitu 0,25 x 4,8 ton = 1,2 ton (1.200 kg). Sisanya sebesar 4,8 - 1,8 - 1,2 = 1,8 ton digiling untuk memenuhi kebutuhan harian warga desa. Dalam proses penggilingan, rasio antara beras bersih dan dedak bekatul yang dihasilkan adalah 7 : 3. Artinya, dari setiap 10 kg gabah giling, diperoleh 7 kg beras putih bersih dan 3 kg bekatul pakan ternak. Manajemen pangan yang terukur memastikan desa selalu mandiri dan bebas krisis pangan.'],
                            ['title' => 'Stimulus 2 (Paket C): Ekspedisi Pengiriman Logistik Antarpulau', 'content' => '[Keterangan Gambar: Kapal kargo perintis sandar di pelabuhan peti kemas: Peta jalur pelayaran antarpulau berskala 1 : 2.000.000 dengan penanda rute pelayaran laut.]
Sebuah kapal kargo perintis melayani pengiriman kebutuhan pokok dari Pelabuhan Tanjung Perak Surabaya menuju Pelabuhan Lembar di Lombok. Pada peta navigasi maritim berskala 1 : 2.000.000, jarak garis pelayaran antara kedua pelabuhan terukur sepanjang 18 cm.

Kapten kapal menghitung jarak pelayaran sebenarnya: Jarak sebenarnya = 18 cm x 2.000.000 = 36.000.000 cm = 360 km. Kapal berlayar dengan kecepatan tetap rata-rata 30 km/jam (sekitar 16 knot). Waktu tempuh perjalanan laut dihitung dengan perbandingan: 360 km : 30 km/jam = 12 jam. Kapal mengonsumsi bahan bakar solar sebanyak 50 liter untuk setiap 30 km pelayaran. Dengan demikian, total bahan bakar yang dibutuhkan untuk pelayaran satu arah adalah: (360 : 30) x 50 liter = 12 x 50 = 600 liter solar. Perhitungan yang akurat menjamin keselamatan kapal mengarungi selat.'],
                            ['title' => 'Stimulus 3 (Paket C): Proyek Pengaspalan Jalan Desa dan Estimasi Tenaga Kerja', 'content' => '[Keterangan Gambar: Alat berat pemadat jalan (roller) dan sekelompok pekerja proyek pengaspalan jalan desa sepanjang 3 km dengan papan target penyelesaian kerja.]
Program Dana Desa mengalokasikan anggaran untuk pengaspalan jalan penghubung antardusun sepanjang 3 kilometer. Berdasarkan analisis teknis dinas pekerjaan umum, pekerjaan pengaspalan tersebut dapat diselesaikan oleh 12 orang pekerja dalam waktu 25 hari kerja.

Karena jalan tersebut akan segera dilalui untuk jalur panen raya jagung, kepala desa meminta agar proyek diselesaikan lebih cepat dalam waktu 15 hari saja. Hubungan antara banyak pekerja dan waktu pengerjaan merupakan perbandingan berbalik nilai. Beban total pekerjaan = 12 x 25 = 300 hari-orang. Untuk menyelesaikan dalam 15 hari, banyak pekerja yang dibutuhkan adalah: 300 : 15 = 20 orang pekerja. Dengan demikian, kontraktor desa harus menambah tenaga kerja sebanyak 20 - 12 = 8 orang pekerja. Gotong royong dan manajemen proyek yang baik mempercepat terwujudnya infrastruktur desa yang tangguh.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket C, berapa kilogram gabah yang disimpan untuk cadangan pangan desa?',
                                'explanation' => '3/8 x 4.800 kg = 1.800 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.800 kg (1,8 ton)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 kg (1,2 ton)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.500 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika dari 1,8 ton gabah harian digiling seluruhnya dengan rasio beras:bekatul = 7 : 3, berapa kilogram beras bersih yang diperoleh?',
                                'explanation' => '7/10 x 1.800 kg = 1.260 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.260 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.350 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.400 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai alokasi gabah di lumbung pangan!',
                                'explanation' => 'Pasar induk 25% = 1,2 ton; Rasio beras:bekatul = 7:3.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Gabah untuk beras premium pasar induk adalah 1,2 ton (25%).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rasio beras bersih terhadap dedak bekatul adalah 7 : 3.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Total gabah yang diterima lumbung adalah 10 ton.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Stok cadangan pangan desa lebih sedikit dari beras pasar induk.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan lumbung pangan!',
                                'explanation' => 'Beras bersih (7 bagian) lebih banyak dari bekatul (3 bagian).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sebanyak 4,8 ton gabah sama dengan 4.800 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rasio 7 : 3 memiliki total perbandingan 10 bagian.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Beras bersih yang dihasilkan lebih sedikit dari dedak bekatul.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sisa gabah untuk kebutuhan warga adalah 1,8 ton.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa kilometer jarak pelayaran sebenarnya antara kedua pelabuhan?',
                                'explanation' => '18 x 20 km = 360 km.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '360 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '320 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '400 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '280 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa liter bahan bakar solar yang dihabiskan kapal untuk menempuh perjalanan 360 km?',
                                'explanation' => '12 x 50 = 600 liter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '600 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '500 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '720 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '650 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data navigasi kapal kargo dengan nilainya!',
                                'explanation' => 'Data pelayaran kapal kargo perintis.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jarak pada peta (skala 1 : 2.000.000)', 'is_correct' => false, 'match_key' => '18 cm', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jarak pelayaran sebenarnya', 'is_correct' => false, 'match_key' => '360 km', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Waktu tempuh pada kecepatan 30 km/jam', 'is_correct' => false, 'match_key' => '12 jam', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kebutuhan solar total', 'is_correct' => false, 'match_key' => '600 liter', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan pelayaran!',
                                'explanation' => 'Kapal membutuhkan 600 liter solar (bukan 1.000 liter).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 2.000.000 berarti 1 cm di peta mewakili 20 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Lama perjalanan kapal adalah 12 jam.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kapal membutuhkan 1.000 liter solar untuk satu arah.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan jarak pelayaran dan konsumsi solar adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa orang total pekerja yang dibutuhkan agar jalan selesai dalam 15 hari?',
                                'explanation' => '12 x 25 : 15 = 300 : 15 = 20 orang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '18 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '16 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa orang pekerja tambahan yang harus ditambahkan oleh kontraktor desa?',
                                'explanation' => '20 - 12 = 8 orang pekerja tambahan.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai proyek pengaspalan jalan desa!',
                                'explanation' => 'Berbalik nilai; pekerja tambahan = 8 orang.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hubungan banyak pekerja dan waktu pengerjaan merupakan perbandingan berbalik nilai.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pekerja tambahan yang dibutuhkan adalah 8 orang.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jika pekerja bertambah, waktu penyelesaian jalan akan semakin lama.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Total beban pekerjaan pengaspalan adalah 500 hari-orang.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip pengerjaan jalan desa!',
                                'explanation' => 'Proyek pekerja dan hari adalah perbandingan berbalik nilai.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Total beban kerja adalah 12 x 25 = 300 hari-orang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Untuk selesai dalam 15 hari dibutuhkan 20 pekerja.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pengaspalan jalan adalah contoh perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Semakin banyak pekerja, waktu penyelesaian jalan semakin cepat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3 1/2 x 4/7 adalah ....',
                                'explanation' => '7/2 x 4/7 = 28/14 = 2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 1/2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 3/4', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 2/5 : 0,8 adalah ....',
                                'explanation' => '12/5 : 4/5 = 12/4 = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 36 : 60 adalah ....',
                                'explanation' => 'Dibagi 12 -> 3 : 5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 : 5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 : 3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3 : 4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan uang Andi dan Budi adalah 3 : 5. Jika uang Budi Rp45.000, uang Andi adalah ....',
                                'explanation' => '45.000 : 5 x 3 = 27.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp27.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp30.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp25.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp24.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil melaju 60 km/jam membutuhkan waktu 4 jam. Jika kecepatan 80 km/jam, waktu tempuh adalah ....',
                                'explanation' => '60 x 4 : 80 = 240 : 80 = 3 jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Harga 6 buku tulis adalah Rp24.000. Harga 15 buku tulis yang sama adalah ....',
                                'explanation' => '24.000 : 6 x 15 = 60.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp60.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp55.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp50.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp65.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak kota A dan B pada peta berskala 1 : 1.500.000 adalah 6 cm. Jarak sebenarnya adalah ....',
                                'explanation' => '6 x 15 km = 90 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '90 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '75 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '60 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '100 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak sebenarnya 120 km digambar pada peta sepanjang 8 cm. Skala peta tersebut adalah ....',
                                'explanation' => '12.000.000 : 8 = 1.500.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 : 1.500.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 : 1.200.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 : 1.800.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 1.000.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah lapangan berukuran 50 m x 30 m digambar berskala 1 : 1.000. Ukuran denah adalah ....',
                                'explanation' => '5.000:1.000 = 5 cm; 3.000:1.000 = 3 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 cm x 3 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 cm x 6 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '5 cm x 2 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4 cm x 3 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 0,75 + 1/2 x 1,4 adalah ....',
                                'explanation' => '0,75 + 0,70 = 1,45.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1,45', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1,35', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1,50', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,25', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk yang senilai dengan 2 1/4!',
                                'explanation' => '2 1/4 = 9/4 = 2,25 = 225%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '225%', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '250%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA perbandingan yang senilai dengan 4 : 5!',
                                'explanation' => '4:5 senilai dengan 12:15 dan 20:25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 : 15', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20 : 25', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 : 12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '16 : 25', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kejadian perbandingan senilai!',
                                'explanation' => 'Bensin-jarak dan barang-bayar adalah perbandingan senilai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jumlah liter bensin dan jarak tempuh kendaraan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jumlah barang yang dibeli dan total pembayaran kasir.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kecepatan berkendara dan waktu tiba di tujuan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jumlah pekerja proyek dan hari penyelesaian.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi pecahan dengan hasilnya!',
                                'explanation' => 'Operasi pecahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/4 x 8/9', 'is_correct' => false, 'match_key' => '2/3', 'order' => 1],
                                    ['label' => null, 'option_text' => '5/6 : 2/3', 'is_correct' => false, 'match_key' => '1 1/4', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 1/2 + 0,5 x 2', 'is_correct' => false, 'match_key' => '2,5', 'order' => 3],
                                    ['label' => null, 'option_text' => '2 - 3/4', 'is_correct' => false, 'match_key' => '1 1/4', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan perbandingan dengan bentuk sederhananya!',
                                'explanation' => 'Penyederhanaan perbandingan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20 : 35', 'is_correct' => false, 'match_key' => '4 : 7', 'order' => 1],
                                    ['label' => null, 'option_text' => '28 : 42', 'is_correct' => false, 'match_key' => '2 : 3', 'order' => 2],
                                    ['label' => null, 'option_text' => '15 : 45', 'is_correct' => false, 'match_key' => '1 : 3', 'order' => 3],
                                    ['label' => null, 'option_text' => '50 : 75', 'is_correct' => false, 'match_key' => '2 : 3', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan skala dengan jarak sebenarnya dari 4 cm di peta!',
                                'explanation' => 'Perhitungan skala peta.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 500.000', 'is_correct' => false, 'match_key' => '20 km', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Skala 1 : 1.000.000', 'is_correct' => false, 'match_key' => '40 km', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Skala 1 : 2.000.000', 'is_correct' => false, 'match_key' => '80 km', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Skala 1 : 250.000', 'is_correct' => false, 'match_key' => '10 km', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah matematika Semester 1!',
                                'explanation' => 'Mengalikan dengan 0,25 sama dengan membagi dengan 4 (karena 0,25 = 1/4).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Operasi perkalian dan pembagian memiliki derajat sama kuat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Perbandingan senilai memiliki perbandingan rasio tetap.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Skala 1 : 100 berarti 1 cm di peta mewakili 1 meter di lapangan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mengalikan bilangan dengan 0,25 sama dengan membagi dengan 2.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan terapan!',
                                'explanation' => '50% dari 500 adalah 250 (bukan 200).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika rasio A:B = 2:3 dan A=10, maka B=15.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Suatu proyek oleh 6 orang selesai 10 hari, oleh 12 orang selesai 5 hari.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jarak 5 cm pada peta berskala 1 : 200.000 adalah 10 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai 50% dari 500 adalah 200.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Hasil dari 2/3 x 3/4 adalah ....',
                                'explanation' => '1/2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 3 1/2 : 0,5 adalah ....',
                                'explanation' => '7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk paling sederhana dari 30 : 45 adalah ....',
                                'explanation' => '2 : 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2 : 3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan umur adik dan kakak 2 : 5. Jika umur adik 8 tahun, umur kakak adalah ... tahun.',
                                'explanation' => '8 : 2 x 5 = 20 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Harga 4 pensil Rp10.000. Harga 10 pensil adalah Rp....',
                                'explanation' => '10.000 : 4 x 10 = 25.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '25000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Suatu pekerjaan selesai 15 hari oleh 4 orang. Oleh 6 orang selesai dalam ... hari.',
                                'explanation' => '15 x 4 : 6 = 10 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak pada peta 3 cm berskala 1 : 1.000.000 mewakili jarak sebenarnya ... km.',
                                'explanation' => '3 x 10 km = 30 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '30', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak sebenarnya 80 km digambar pada peta berskala 1 : 2.000.000 sepanjang ... cm.',
                                'explanation' => '8.000.000 : 2.000.000 = 4 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk persen dari 3/5 adalah ...%.',
                                'explanation' => '60%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '60', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk desimal dari 7/20 adalah ....',
                                'explanation' => '0,35.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,35', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 1 - 0,45 adalah ....',
                                'explanation' => '0,55.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,55', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan 500 meter terhadap 2 km adalah ....',
                                'explanation' => '500 : 2.000 = 1 : 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1 : 4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Uang Riko : Uang Bayu = 3 : 4. Jika jumlah uang mereka Rp70.000, uang Riko adalah Rp....',
                                'explanation' => '3/7 x 70.000 = 30.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '30000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah denah berskala 1 : 200. Panjang denah 5 cm sama dengan ... meter sebenarnya.',
                                'explanation' => '5 x 200 = 1.000 cm = 10 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rumus skala adalah Jarak pada Peta ... Jarak Sebenarnya (dibagi/dikali).',
                                'explanation' => 'dibagi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dibagi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah koperasi tani memiliki persediaan pupuk urea sebanyak 3,6 ton. Hari pertama terjual 1/3 bagian, hari kedua terjual 25% dari persediaan awal, dan sisanya dibagikan secara merata kepada 9 kelompok tani binaan. Tentukan:
(a) Pupuk yang terjual pada hari pertama (kg)
(b) Pupuk yang terjual pada hari kedua (kg)
(c) Sisa pupuk yang dibagikan kepada kelompok tani (kg)
(d) Berat pupuk yang diterima masing-masing kelompok tani (kg)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total pupuk = 3,6 ton = 3.600 kg.
(a) Hari pertama = 1/3 x 3.600 kg = 1.200 kg.
(b) Hari kedua = 25% x 3.600 kg = 900 kg.
(c) Sisa pupuk = 3.600 - (1.200 + 900) = 3.600 - 2.100 = 1.500 kg.
(d) Setiap kelompok tani = 1.500 kg : 9 kelompok = 166,67 kg (atau 166 2/3 kg).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbandingan jumlah tabungan Amir, Budi, dan Candra adalah 3 : 5 : 7. Jika selisih uang tabungan Candra dan Amir adalah Rp160.000, tentukan:
(a) Besar tabungan Amir
(b) Besar tabungan Budi
(c) Besar tabungan Candra
(d) Jumlah tabungan ketiga anak tersebut seluruhnya',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Selisih bagian Candra dan Amir = 7 - 3 = 4 bagian.
Nilai 1 bagian = Rp160.000 : 4 = Rp40.000.
(a) Tabungan Amir = 3 x Rp40.000 = Rp120.000
(b) Tabungan Budi = 5 x Rp40.000 = Rp200.000
(c) Tabungan Candra = 7 x Rp40.000 = Rp280.000
(d) Total tabungan = Rp120.000 + Rp200.000 + Rp280.000 = Rp600.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah proyek jembatan direncanakan selesai dalam waktu 36 hari dengan 15 orang pekerja. Setelah bekerja selama 12 hari, proyek dihentikan selama 4 hari karena banjir bandang. Berapa orang pekerja tambahan yang harus ditambah agar proyek jembatan dapat selesai tepat waktu?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Beban kerja total = 36 hari x 15 pekerja = 540 hari-orang.
Beban yang sudah selesai = 12 hari x 15 pekerja = 180 hari-orang.
Sisa beban kerja = 540 - 180 = 360 hari-orang.
Sisa hari kerja = 36 - 12 - 4 = 20 hari.
Pekerja yang dibutuhkan = 360 : 20 = 18 orang pekerja.
Pekerja tambahan = 18 - 15 = 3 orang pekerja tambahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jarak antara Kota A dan Kota B pada peta adalah 7,5 cm. Peta tersebut memiliki skala 1 : 1.600.000. Tentukan:
(a) Jarak sebenarnya kedua kota dalam kilometer
(b) Jika seorang pengendara motor berangkat dari Kota A pukul 07.15 dengan kecepatan rata-rata 48 km/jam, pukul berapa ia akan tiba di Kota B jika di jalan beristirahat selama 30 menit?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jarak sebenarnya = 7,5 cm x 1.600.000 = 12.000.000 cm = 120 km.
(b) Waktu tempuh perjalanan = Jarak : Kecepatan = 120 km : 48 km/jam = 2,5 jam = 2 jam 30 menit.
Total waktu termasuk istirahat = 2 jam 30 menit + 30 menit = 3 jam.
Waktu tiba = 07.15 + 3 jam = 10.15.
Jadi, ia akan tiba di Kota B pukul 10.15.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kebun sayur berbentuk persegi panjang digambar pada denah berskala 1 : 400 dengan ukuran panjang 15 cm dan lebar 10 cm. Tentukan:
(a) Ukuran panjang dan lebar sebenarnya kebun tersebut (meter)
(b) Keliling kebun sebenarnya (meter)
(c) Luas kebun sebenarnya (meter persegi)
(d) Jika sekeliling kebun dipasangi pagar kawat dengan biaya Rp75.000 per meter, berapa total biaya pemasangan pagar kawat tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Panjang sebenarnya = 15 cm x 400 = 6.000 cm = 60 meter.
    Lebar sebenarnya = 10 cm x 400 = 4.000 cm = 40 meter.
(b) Keliling sebenarnya = 2 x (60 + 40) = 2 x 100 = 200 meter.
(c) Luas sebenarnya = 60 m x 40 m = 2.400 m².
(d) Biaya pagar kawat = Keliling x Biaya per meter = 200 m x Rp75.000 = Rp15.000.000.',
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
