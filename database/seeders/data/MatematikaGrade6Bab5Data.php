<?php

namespace Database\Seeders\Data;

class MatematikaGrade6Bab5Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 5: Pengumpulan Data, Tabel Frekuensi, dan Penyajian Diagram',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 5 Quiz 1. Menguji pengorganisasian data tabel, diagram batang, diagram garis, dan diagram lingkaran derajat/persen.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Sensus Hasil Panen Buah Kebun Komunitas', 'content' => '[Keterangan Gambar: Tabel frekuensi dan diagram batang hasil panen buah kebun organik (kg): Mangga 120 kg, Jeruk 80 kg, Pepaya 100 kg, Pisang 150 kg, dan Jambu 50 kg.]
Kelompok Tani Lingkungan mendata hasil panen buah-buahan organik dari kebun percontohan desa selama satu bulan. Data dikumpulkan untuk mengevaluasi jenis buah yang paling produktif dan digemari masyarakat.

Berdasarkan hasil penimbangan, diperoleh data berat panen: Buah Mangga = 120 kg, Jeruk = 80 kg, Pepaya = 100 kg, Pisang = 150 kg, dan Jambu Air = 50 kg. Total seluruh hasil panen buah adalah: 120 + 80 + 100 + 150 + 50 = 500 kg. Petugas menyajikan data tersebut dalam bentuk diagram batang dan diagram lingkaran. Pada diagram lingkaran, buah Pisang menempati porsi terbesar dengan persentase: 150 / 500 x 100% = 30% (atau sudut juring 30% x 360° = 108°). Buah Jambu Air menempati porsi terkecil: 50 / 500 x 100% = 10% (sudut 36°). Diagram ini memudahkan pengurus merencanakan perluasan lahan bibit buah.'],
                            ['title' => 'Stimulus 2: Grafik Garis Suhu Tubuh Pasien Rawat Inap', 'content' => '[Keterangan Gambar: Grafik garis perkembangan suhu tubuh pasien anak di rumah sakit selama 6 hari: Hari ke-1 (39°C), Hari ke-2 (38,5°C), Hari ke-3 (38°C), Hari ke-4 (37,5°C), Hari ke-5 (36,8°C), dan Hari ke-6 (36,5°C).]
Di ruang rawat inap anak RSUD Sehat Sejahtera, perawat mencatat suhu tubuh Dito yang dirawat karena demam berdarah. Suhu tubuh diukur setiap pagi pukul 06.00 WIB selama enam hari berturut-turut.

Data dicatat dan disajikan dalam bentuk diagram garis: Hari ke-1 = 39°C; Hari ke-2 = 38,5°C; Hari ke-3 = 38°C; Hari ke-4 = 37,5°C; Hari ke-5 = 36,8°C; dan Hari ke-6 = 36,5°C. Dokter anak membaca tren grafik garis tersebut dan menyimpulkan bahwa suhu tubuh Dito mengalami penurunan secara berkala dan stabil menuju rentang normal (36,5°C - 37,2°C). Diagram garis sangat efektif digunakan untuk menyajikan data yang berkesinambungan atau menunjukkan perkembangan dari waktu ke waktu.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, jenis buah yang menghasilkan panen paling banyak adalah ....',
                                'explanation' => 'Pisang menghasilkan panen terbanyak yaitu 150 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pisang (150 kg)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mangga (120 kg)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pepaya (100 kg)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jeruk (80 kg)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa derajat besar sudut juring buah Pisang pada diagram lingkaran?',
                                'explanation' => '150 / 500 x 360° = 30% x 360° = 108°.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '108 derajat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '90 derajat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '120 derajat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '72 derajat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai data panen buah kebun!',
                                'explanation' => 'Total = 500 kg; Jambu = 50/500 x 100% = 10% (36°).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Total seluruh hasil panen buah adalah 500 kg.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Porsi buah Jambu Air pada diagram lingkaran adalah 10% (36 derajat).', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hasil panen buah Jeruk lebih banyak daripada buah Mangga.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Buah Pepaya menempati 50% dari seluruh total panen.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penyajian data panen buah!',
                                'explanation' => 'Jambu air menghasilkan panen paling sedikit (50 kg).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diagram batang cocok untuk membandingkan jumlah tiap kategori buah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Satu lingkaran penuh mewakili 100% atau 360 derajat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hasil panen Mangga dan Jeruk jika digabung berjumlah 200 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Buah Jambu Air menghasilkan panen terbanyak.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, pada hari ke berapakah suhu tubuh Dito mulai mencapai rentang normal (di bawah 37°C)?',
                                'explanation' => 'Hari ke-5 suhu tubuh Dito turun ke 36,8°C.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hari ke-5 (36,8°C)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hari ke-4 (37,5°C)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hari ke-3 (38°C)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hari ke-2 (38,5°C)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Mengapa diagram garis sangat cocok untuk menyajikan data suhu tubuh harian pasien?',
                                'explanation' => 'Diagram garis efektif untuk tren data berkala/waktu.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Karena efektif menunjukkan tren perkembangan data yang berkesinambungan dari waktu ke waktu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Karena diagram garis hanya bisa memuat angka pecahan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karena diagram garis berwarna-warni', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Karena tidak memerlukan sumbu koordinat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jenis diagram dengan kegunaan utamanya!',
                                'explanation' => 'Fungsi berbagai jenis diagram statistika.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diagram batang', 'is_correct' => false, 'match_key' => 'Membandingkan data diskret antarkategori', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diagram garis', 'is_correct' => false, 'match_key' => 'Menunjukkan tren perkembangan data dari waktu ke waktu', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Diagram lingkaran', 'is_correct' => false, 'match_key' => 'Menunjukkan perbandingan porsi terhadap keseluruhan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tabel frekuensi', 'is_correct' => false, 'match_key' => 'Menyajikan data mentah terorganisasi dalam baris dan kolom', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran grafik perkembangan suhu Dito!',
                                'explanation' => 'Pada hari ke-6 suhu Dito stabil di 36,5°C.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Suhu tubuh tertinggi Dito terjadi pada hari ke-1 (39°C).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Terjadi tren penurunan suhu yang stabil dari hari ke hari.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pada hari ke-6 suhu tubuh Dito naik drastis menjadi 40°C.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Grafik garis menghubungkan titik-titik koordinat waktu dan nilai data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penyajian data dalam bentuk gambar lingkaran yang dibagi menjadi beberapa juring dinamakan ....',
                                'explanation' => 'Diagram lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diagram lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Diagram batang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Diagram garis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Piktogram', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah diagram lingkaran menunjukkan data kegemaran olahraga: Sepak bola 40%, Bulu tangkis 25%, Renang 20%, dan Voli sisanya. Persentase penyuka voli adalah ....',
                                'explanation' => '100% - (40% + 25% + 20%) = 100% - 85% = 15%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15%', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20%', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10%', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '25%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika dalam diagram lingkaran sudut juring buku sains adalah 90 derajat dari total 400 buku, banyak buku sains adalah ....',
                                'explanation' => '90/360 x 400 = 1/4 x 400 = 100 buku.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '100 buku', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '90 buku', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '120 buku', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '80 buku', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Diagram yang paling tepat untuk menyajikan data pertumbuhan tinggi badan tanaman jagung setiap minggu adalah ....',
                                'explanation' => 'Diagram garis cocok untuk data berkala waktu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diagram garis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Diagram lingkaran', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Diagram piktogram', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Diagram pohon', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pada diagram batang, sumbu mendatar biasanya menyatakan ... dan sumbu tegak menyatakan ....',
                                'explanation' => 'Sumbu mendatar = kategori; tegak = frekuensi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kategori data dan frekuensi/jumlah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Waktu dan suhu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jumlah dan total', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nilai dan derajat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai 25% pada diagram lingkaran setara dengan sudut juring sebesar ....',
                                'explanation' => '25/100 x 360° = 90°.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '90 derajat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '60 derajat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '120 derajat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '45 derajat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk penyajian data statistik yang sering digunakan di sekolah!',
                                'explanation' => 'Diagram batang dan lingkaran adalah diagram statistik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diagram batang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Diagram lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Diagram rantai makanan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Peta benua dunia', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai diagram lingkaran!',
                                'explanation' => 'Total sudut = 360°; Total persen = 100%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Total seluruh sudut juring satu lingkaran penuh adalah 360 derajat.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Total seluruh persentase satu lingkaran penuh adalah 100%.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Diagram lingkaran selalu dibuat dalam bentuk persegi panjang.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Porsi setengah lingkaran setara dengan sudut 90 derajat.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan persentase dengan besar sudut juring pada diagram lingkaran!',
                                'explanation' => 'Konversi persen ke sudut juring.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '50%', 'is_correct' => false, 'match_key' => '180°', 'order' => 1],
                                    ['label' => null, 'option_text' => '25%', 'is_correct' => false, 'match_key' => '90°', 'order' => 2],
                                    ['label' => null, 'option_text' => '10%', 'is_correct' => false, 'match_key' => '36°', 'order' => 3],
                                    ['label' => null, 'option_text' => '20%', 'is_correct' => false, 'match_key' => '72°', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah statistika dengan maknanya!',
                                'explanation' => 'Istilah dasar statistika.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Data', 'is_correct' => false, 'match_key' => 'Kumpulan fakta, angka, atau informasi hasil pengamatan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Frekuensi', 'is_correct' => false, 'match_key' => 'Banyaknya kemunculan suatu data dalam kelompok', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabel', 'is_correct' => false, 'match_key' => 'Susunan data dalam bentuk baris dan kolom teratur', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Diagram', 'is_correct' => false, 'match_key' => 'Representasi visual grafis untuk membaca data dengan cepat', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penyajian data diagram!',
                                'explanation' => 'Diagram lingkaran dapat dinyatakan dalam derajat maupun persen.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diagram garis paling efektif untuk menampilkan data kontinu dari waktu ke waktu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diagram batang menggunakan balok persegi panjang berjarak sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Besar sudut 72 derajat mewakili 20% data pada diagram lingkaran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Diagram lingkaran tidak dapat dinyatakan dalam satuan persen.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pembacaan data!',
                                'explanation' => 'Jumlah sudut dalam satu lingkaran penuh selalu tepat 360 derajat.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika total siswa 200 dan juring 25%, maka banyak siswa adalah 50 anak.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diagram piktogram menyajikan data menggunakan lambang gambar benda.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sudut juring 180 derajat membagi lingkaran menjadi dua bagian sama besar.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jumlah sudut pada diagram lingkaran dapat melebihi 360 derajat.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Jumlah sudut satu putaran penuh pada diagram lingkaran adalah ... derajat.',
                                'explanation' => '360 derajat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '360', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Persentase total seluruh bagian pada diagram lingkaran adalah ...%.',
                                'explanation' => '100%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '100', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sudut juring 90 derajat mewakili ...% dari keseluruhan data.',
                                'explanation' => '25%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Diagram yang menghubungkan titik-titik data dari waktu ke waktu disebut diagram ....',
                                'explanation' => 'garis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'garis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyaknya data yang muncul pada suatu kategori disebut ....',
                                'explanation' => 'frekuensi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'frekuensi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebanyak 30% dari 300 siswa menyukai matematika. Banyak siswa tersebut adalah ... anak.',
                                'explanation' => '30/100 x 300 = 90 anak.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '90', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sudut 180 derajat pada diagram lingkaran mewakili ... bagian lingkaran.',
                                'explanation' => '1/2 bagian (setengah lingkaran).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Data kegemaran ekstrakurikuler 60 siswa kelas 6 SD disajikan sebagai berikut:
- Pramuka: 18 siswa
- Futsal: 15 siswa
- Tari Tradisional: 12 siswa
- Robotika: 9 siswa
- Dokter Kecil: 6 siswa
Hitunglah besar sudut juring (dalam derajat) untuk masing-masing ekstrakurikuler jika data tersebut disajikan dalam diagram lingkaran!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total siswa = 60 siswa. Rumus sudut = (Banyak siswa / 60) x 360° = Banyak siswa x 6°.
1. Pramuka = 18 x 6° = 108°
2. Futsal = 15 x 6° = 90°
3. Tari Tradisional = 12 x 6° = 72°
4. Robotika = 9 x 6° = 54°
5. Dokter Kecil = 6 x 6° = 36°
Total = 108° + 90° + 72° + 54° + 36° = 360°.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah diagram lingkaran menunjukkan persentase mata pelajaran yang disukai oleh 200 siswa SD:
- IPA: 35%
- Matematika: 25%
- Bahasa Indonesia: 20%
- Bahasa Inggris: 15%
- Seni Rupa: 5%
Tentukan:
(a) Banyak siswa yang menyukai masing-masing mata pelajaran
(b) Selisih banyak siswa yang menyukai IPA dan Bahasa Inggris
(c) Mata pelajaran yang paling banyak dan paling sedikit disukai',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Banyak siswa:
- IPA = 35% x 200 = 70 siswa
- Matematika = 25% x 200 = 50 siswa
- Bahasa Indonesia = 20% x 200 = 40 siswa
- Bahasa Inggris = 15% x 200 = 30 siswa
- Seni Rupa = 5% x 200 = 10 siswa
(b) Selisih IPA dan Bahasa Inggris = 70 - 30 = 40 siswa.
(c) Paling banyak disukai: IPA (70 siswa); Paling sedikit disukai: Seni Rupa (10 siswa).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan keuntungan menyajikan data menggunakan DIAGRAM BATANG dibandingkan hanya menyajikannya dalam bentuk tabel angka biasa!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Keuntungan penyajian dengan diagram batang:
1. Visualisasi Cepat: Pembaca dapat langsung melihat perbandingan tinggi-rendah nilai antarkategori secara sekilas tanpa harus membaca dan membandingkan angka-angka satu per satu.
2. Mudah Membedakan Ekstrem: Nilai tertinggi (maksimum) dan terendah (minimum) langsung terlihat jelas dari batang yang paling tinggi dan paling pendek.
3. Menarik dan Komunikatif: Diagram batang lebih menarik secara estetika dan mudah dipahami oleh masyarakat umum dalam laporan presentasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 5: Pemusatan Data (Mean, Median, dan Modus)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 5 Quiz 2. Menguji perhitungan rata-rata hitung (mean), nilai tengah (median data ganjil/genap), dan nilai modus (frekuensi terbanyak).',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Analisis Nilai Asesmen Matematika Kelas 6A', 'content' => '[Keterangan Gambar: Papan nilai asesmen formatif matematika 10 siswa kelas 6A: 75, 80, 85, 90, 80, 75, 85, 80, 95, 85.]
Ibu Dewi mengoreksi hasil asesmen formatif matematika materi pecahan dari 10 siswa di kelas 6A. Nilai-nilai tersebut adalah: 75, 80, 85, 90, 80, 75, 85, 80, 95, 85. Ibu Dewi menganalisis ukuran pemusatan data untuk mengevaluasi capaian pembelajaran kelas.

1. Rata-rata (Mean): Jumlah seluruh nilai dibagi banyak siswa. Jumlah nilai = 75 + 80 + 85 + 90 + 80 + 75 + 85 + 80 + 95 + 85 = 830. Mean = 830 : 10 = 83.
2. Nilai Tengah (Median): Urutkan data dari terkecil ke terbesar: 75, 75, 80, 80, 80, 85, 85, 85, 90, 95. Karena banyak data genap (n = 10), median terletak di antara data ke-5 dan ke-6: Median = (80 + 85) : 2 = 165 : 2 = 82,5.
3. Modus: Nilai yang paling sering muncul. Nilai 75 muncul 2 kali, 80 muncul 3 kali, 85 muncul 3 kali, 90 muncul 1 kali, 95 muncul 1 kali. Modus data adalah 80 dan 85 (bimodus).'],
                            ['title' => 'Stimulus 2: Data Berat Badan Tim Inti Bola Voli Sekolah', 'content' => '[Keterangan Gambar: Catatan timbangan berat badan 7 atlet inti tim bola voli putra SD Gemilang: 38 kg, 42 kg, 40 kg, 45 kg, 40 kg, 41 kg, dan 43 kg.]
Pelatih bola voli sekolah menimbang berat badan 7 siswa anggota tim inti sebelum bertanding di kejuaraan daerah. Data berat badan (dalam kg) yang tercatat adalah: 38, 42, 40, 45, 40, 41, 43.

Pelatih menghitung statistik tim:
1. Rata-rata berat badan (Mean) = (38 + 42 + 40 + 45 + 40 + 41 + 43) : 7 = 289 : 7 = 41,29 kg (dibulatkan 41,3 kg).
2. Nilai tengah (Median): Urutkan data ganjil (n = 7): 38, 40, 40, 41, 42, 43, 45. Data tepat di tengah adalah data ke-4, yaitu 41 kg.
3. Modus: Nilai yang paling sering muncul adalah 40 kg (muncul sebanyak 2 kali). Data berat badan ini membantu pelatih mengatur pola konsumsi protein dan kebugaran tim.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, nilai rata-rata (mean) dari hasil asesmen matematika tersebut adalah ....',
                                'explanation' => 'Mean = 830 : 10 = 83.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '83', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '82,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '80', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '85', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa nilai tengah (median) dari data nilai setelah diurutkan?',
                                'explanation' => 'Data urut: data ke-5 adalah 80 dan data ke-6 adalah 85. Median = (80 + 85) : 2 = 82,5.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '82,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '80', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '85', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '83', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai analisis nilai kelas 6A!',
                                'explanation' => 'Mean = 83; Modus = 80 dan 85 (muncul 3 kali).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nilai rata-rata kelas 6A adalah 83.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nilai modus yang paling sering muncul adalah 80 dan 85 (masing-masing 3 kali).', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nilai tertinggi yang diperoleh siswa adalah 100.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nilai terendah di kelas adalah 60.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran ukuran pemusatan data!',
                                'explanation' => 'Modus adalah data yang memiliki frekuensi paling banyak/sering.',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mean diperoleh dengan membagi jumlah seluruh data dengan banyak data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Untuk mencari median, data wajib diurutkan terlebih dahulu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Modus adalah data yang memiliki frekuensi paling sedikit.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Data di atas memiliki median 82,5.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, nilai median berat badan tim bola voli tersebut adalah ....',
                                'explanation' => 'Data urut: 38, 40, 40, 41, 42, 43, 45. Median data ke-4 adalah 41 kg.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '41 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '40 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '42 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '41,3 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa modus berat badan dari data atlet bola voli tersebut?',
                                'explanation' => 'Modus adalah 40 kg karena muncul paling sering (2 kali).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '40 kg (muncul 2 kali)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '41 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '42 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '45 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan ukuran pemusatan data atlet dengan nilainya!',
                                'explanation' => 'Statistik berat badan atlet voli.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Median data', 'is_correct' => false, 'match_key' => '41 kg', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Modus data', 'is_correct' => false, 'match_key' => '40 kg', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Berat badan terendah', 'is_correct' => false, 'match_key' => '38 kg', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Berat badan tertinggi', 'is_correct' => false, 'match_key' => '45 kg', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan statistik atlet!',
                                'explanation' => 'Modus adalah 40 kg (bukan 45 kg).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Karena jumlah data ganjil (7), median adalah data ke-4.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Berat badan terberat dalam tim adalah 45 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Modus data adalah 45 kg.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Rata-rata berat badan tim berada di sekitar 41,3 kg.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai rata-rata dari data: 6, 8, 7, 9, 10 adalah ....',
                                'explanation' => '(6+8+7+9+10)/5 = 40/5 = 8.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8,5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Median dari data: 7, 5, 8, 9, 6, 7, 10 adalah ....',
                                'explanation' => 'Data urut: 5, 6, 7, 7, 8, 9, 10. Median data ke-4 = 7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '7,5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Modus dari data: 5, 6, 7, 6, 8, 6, 9, 7 adalah ....',
                                'explanation' => '6 muncul 3 kali (paling sering).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Median dari data: 12, 14, 10, 16, 18, 20 adalah ....',
                                'explanation' => 'Data urut: 10, 12, 14, 16, 18, 20. Median = (14+16)/2 = 15.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '14', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '14,5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Rata-rata ulangan matematika 4 siswa adalah 80. Jika nilai siswa kelima adalah 90, rata-rata kelima siswa adalah ....',
                                'explanation' => 'Total = (4 x 80) + 90 = 320 + 90 = 410. Rata-rata = 410/5 = 82.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '82', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '81', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '85', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '83', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Data berat badan 5 siswa: 32, 35, 34, 35, 39. Selisih mean dan median data tersebut adalah ....',
                                'explanation' => 'Data urut: 32, 34, 35, 35, 39. Median = 35. Mean = 175/5 = 35. Selisih = 0 kg.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,5 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai ukuran pemusatan data!',
                                'explanation' => 'Mean = jumlah/banyak; Median = nilai tengah data berurutan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mean adalah jumlah seluruh nilai data dibagi dengan banyaknya data.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Median adalah nilai yang berada tepat di tengah setelah data diurutkan.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Modus selalu bernilai lebih besar dari median.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Data genap tidak memiliki median.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA langkah yang BENAR saat mencari median data!',
                                'explanation' => 'Urutkan data dan cari nilai tengah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengurutkan data dari nilai terkecil ke nilai terbesar.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jika banyak data genap, menjumlahkan dua data di tengah lalu membaginya dengan dua.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menghitung data yang paling sering muncul.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menjumlahkan seluruh data lalu membaginya dengan banyak data.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah statistika dengan rumusnya!',
                                'explanation' => 'Definisi ukuran pemusatan data.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mean (Rata-rata)', 'is_correct' => false, 'match_key' => 'Jumlah seluruh data : Banyak data', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Median (Nilai tengah)', 'is_correct' => false, 'match_key' => 'Nilai data di posisi tengah setelah diurutkan', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Modus', 'is_correct' => false, 'match_key' => 'Nilai data yang memiliki frekuensi terbesar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jangkauan (Range)', 'is_correct' => false, 'match_key' => 'Nilai tertinggi dikurangi nilai terendah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data tunggal dengan nilai meannya!',
                                'explanation' => 'Perhitungan mean data sederhana.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Data: 4, 6, 8', 'is_correct' => false, 'match_key' => 'Mean = 6', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Data: 5, 5, 5, 5', 'is_correct' => false, 'match_key' => 'Mean = 5', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Data: 10, 20, 30', 'is_correct' => false, 'match_key' => 'Mean = 20', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Data: 2, 4, 6, 8, 10', 'is_correct' => false, 'match_key' => 'Mean = 6', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran sifat mean, median, dan modus!',
                                'explanation' => 'Menghitung rata-rata tidak harus mengurutkan data (hanya menjumlahkan).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sebuah kelompok data dapat memiliki lebih dari satu modus.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sebuah kelompok data bisa tidak memiliki modus sama sekali jika frekuensi semua data sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Untuk menghitung rata-rata, data harus selalu diurutkan terlebih dahulu.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai median membagi data terurut menjadi dua bagian sama banyak.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran perhitungan statistika!',
                                'explanation' => 'Data 2, 3, 4, 5 tidak memiliki modus (semua muncul 1 kali).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rata-rata dari 10, 20, 30 adalah 20.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Median dari 3, 5, 7, 9 adalah 6.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Modus dari 2, 3, 4, 5 adalah 5.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jika semua data bernilai sama, maka mean = median = modus.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Nilai rata-rata dari sekelompok data disebut juga ....',
                                'explanation' => 'mean.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'mean', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai yang berada tepat di tengah-tengah setelah data diurutkan disebut ....',
                                'explanation' => 'median.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'median', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai yang paling sering muncul dalam kelompok data disebut ....',
                                'explanation' => 'modus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'modus', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rata-rata dari data: 7, 8, 9 adalah ....',
                                'explanation' => '8.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Median dari data: 4, 6, 8, 10, 12 adalah ....',
                                'explanation' => '8.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Modus dari data: 3, 5, 5, 7, 8 adalah ....',
                                'explanation' => '5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Selisih antara nilai tertinggi dan nilai terendah disebut ....',
                                'explanation' => 'jangkauan (range).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangkauan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Tabel berikut menunjukkan data hasil panen jagung (dalam kuintal) selama 8 musim berturut-turut:
Musim: I, II, III, IV, V, VI, VII, VIII
Hasil (kuintal): 24, 28, 26, 30, 26, 32, 28, 26
Tentukan:
(a) Nilai rata-rata (mean) hasil panen jagung
(b) Nilai tengah (median) hasil panen jagung
(c) Modus hasil panen jagung',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Mean = (24 + 28 + 26 + 30 + 26 + 32 + 28 + 26) : 8 = 220 : 8 = 27,5 kuintal.
(b) Median:
    Urutkan data: 24, 26, 26, 26, 28, 28, 30, 32.
    Data ke-4 = 26, Data ke-5 = 28.
    Median = (26 + 28) : 2 = 54 : 2 = 27 kuintal.
(c) Modus: Nilai yang paling sering muncul adalah 26 kuintal (muncul sebanyak 3 kali).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Nilai rata-rata ulangan matematika dari 19 orang siswa adalah 76. Kemudian, seorang siswa susulan bernama Farhan mengikuti ujian dan memperoleh nilai 96. Berapakah nilai rata-rata ulangan matematika kelas tersebut sekarang setelah nilai Farhan digabungkan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Hitung jumlah nilai 19 siswa semula:
   Jumlah nilai lama = 19 x 76 = 1.444.
2. Tambahkan nilai Farhan:
   Jumlah nilai baru = 1.444 + 96 = 1.540.
3. Hitung banyak siswa baru:
   Banyak siswa = 19 + 1 = 20 orang.
4. Hitung rata-rata baru:
   Rata-rata baru = 1.540 : 20 = 77.
Jadi, nilai rata-rata ulangan matematika kelas tersebut sekarang adalah 77.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan mengapa nilai ekstrim (nilai yang sangat tinggi atau sangat rendah) dapat memengaruhi nilai rata-rata (mean), namun tidak memengaruhi nilai tengah (median)! Berikan contoh sederhana!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Penjelasan:
1. Pengaruh pada Mean: Mean dihitung dengan menjumlahkan seluruh nilai data. Jika ada satu nilai pencilan yang sangat besar atau kecil (nilai ekstrim), jumlah total data akan melonjak atau anjlok drastis, sehingga nilai rata-rata ikut tertarik oleh nilai ekstrim tersebut.
2. Kekebalan Median: Median hanya bergantung pada urutan posisi di tengah, bukan besaran angka ekstrim di ujung.
Contoh: Data gaji 5 pekerja: 2, 2, 3, 3, 100 juta rupiah.
- Median = 3 juta (menggambarkan kondisi mayoritas pekerja secara adil).
- Mean = 110 : 5 = 22 juta rupiah (menyesatkan karena tampak besar akibat nilai ekstrim 100 juta).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 5: Peluang Kejadian Sederhana (Dadu, Koin, Kelereng)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 5 Quiz 3. Menguji pemahaman konsep ruang sampel, titik sampel, rentang nilai peluang (0 s.d 1), dan frekuensi harapan percobaan acak.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Eksperimen Peluang Melempar Dadu dan Koin Bersama', 'content' => '[Keterangan Gambar: Dua siswa melakukan percobaan peluang di meja kelas: Sebuah dadu bersisi 6 bermata 1-6 dan sekeping uang logam Rp1.000 bersisi Angka dan Gambar dilempar berulang kali.]
Dalam pembelajaran matematika peluang kejadian sederhana, kelompok belajar Rian melakukan eksperimen pelemparan koin logam dan dadu standar berenam sisi untuk mencatat ruang sampel dan titik sampel kejadian.

Sebuah dadu bermata enam memiliki ruang sampel S = {1, 2, 3, 4, 5, 6} dengan total 6 titik sampel. Peluang munculnya setiap mata dadu adalah 1/6. Peluang munculnya mata dadu genap {2, 4, 6} adalah 3/6 = 1/2 (atau 50%). Sementara itu, sekeping uang koin memiliki 2 sisi: Angka (A) dan Gambar (G). Peluang munculnya sisi Angka adalah 1/2. Jika dadu dan koin dilempar bersama-sama, ruang sampel gabungan memiliki 2 x 6 = 12 titik sampel, seperti (A, 1), (A, 2), ..., (G, 6). Peluang munculnya pasangan (Angka dan mata dadu 6) adalah 1/12. Siswa memahami bahwa nilai peluang selalu berada pada rentang antara 0 (kejadian mustahil) hingga 1 (kejadian pasti).'],
                            ['title' => 'Stimulus 2: Pengambilan Kelereng dalam Kotak Misteri Hadiah', 'content' => '[Keterangan Gambar: Sebuah kotak misteri tertutup dengan lubang tangan di atasnya: Berisi 10 kelereng merah, 6 kelereng biru, dan 4 kelereng kuning tanpa siswa dapat melihat ke dalam kotak.]
Pada acara bazar amal sekolah, stan permainan edukatif mengadakan tantangan "Kotak Kelereng Berhadiah". Di dalam sebuah kotak tertutup terdapat 20 kelereng identik yang hanya berbeda warna: 10 kelereng merah, 6 kelereng biru, dan 4 kelereng kuning.

Setiap pengunjung yang berdonasi dipersilakan mengambil satu kelereng secara acak tanpa melihat. Siswa menghitung peluang teoritis setiap kemungkinan pengambilan:
1. Peluang terambil kelereng merah = 10 / 20 = 1/2 (atau 50%).
2. Peluang terambil kelereng biru = 6 / 20 = 3/10 (atau 30%).
3. Peluang terambil kelereng kuning = 4 / 20 = 2/10 = 1/5 (atau 20%).
Jika seseorang mengambil kelereng, warna yang paling berpeluang (kemungkinan terbesar) terambil adalah kelereng merah karena jumlahnya paling banyak di dalam kotak. Mengetahui peluang membantu kita berpikir logis dalam memprediksi suatu kemungkinan.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, peluang munculnya mata dadu bernilai genap pada pelemparan sebuah dadu bersisi enam adalah ....',
                                'explanation' => 'Mata genap {2, 4, 6} ada 3 titik. Peluang = 3/6 = 1/2.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3/6 (1/2 atau 50%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1/6', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2/6 (1/3)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4/6 (2/3)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak seluruh titik sampel jika sebuah dadu dan sekeping koin dilempar bersamaan?',
                                'explanation' => '2 sisi koin x 6 sisi dadu = 12 titik sampel.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 titik sampel', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8 titik sampel', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 titik sampel', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10 titik sampel', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai teori peluang dasar!',
                                'explanation' => 'Peluang berada di antara 0 (mustahil) dan 1 (pasti).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Peluang suatu kejadian selalu bernilai antara 0 sampai dengan 1.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Peluang kejadian bernilai 0 berarti kejadian tersebut mustahil terjadi.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Peluang kejadian bernilai 1 berarti kejadian tersebut mustahil terjadi.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Peluang munculnya angka 7 pada dadu standar adalah 1/2.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran percobaan peluang dadu dan koin!',
                                'explanation' => 'Nilai peluang tidak pernah negatif (0 <= P <= 1).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Peluang munculnya sisi Angka pada koin adalah 1/2.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Peluang munculnya angka 6 pada dadu standar adalah 1/6.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Peluang munculnya mata dadu bilangan prima {2, 3, 5} adalah 1/2.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai peluang dapat berupa bilangan negatif.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, peluang terambilnya satu butir kelereng berwarna biru adalah ....',
                                'explanation' => 'Peluang biru = 6/20 = 3/10 = 30%.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6/20 (3/10 atau 30%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10/20 (1/2)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4/20 (1/5)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1/20', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Warna kelereng manakah yang memiliki kemungkinan PALING BESAR untuk terambil?',
                                'explanation' => 'Merah paling banyak (10 dari 20 = 50%).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Merah (50%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Biru (30%)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kuning (20%)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semua warna peluangnya sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan warna kelereng dengan nilai peluang terambilnya!',
                                'explanation' => 'Peluang pengambilan kelereng kotak misteri.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kelereng merah (10 butir)', 'is_correct' => false, 'match_key' => '1/2 (50%)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kelereng biru (6 butir)', 'is_correct' => false, 'match_key' => '3/10 (30%)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kelereng kuning (4 butir)', 'is_correct' => false, 'match_key' => '1/5 (20%)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Total seluruh kelereng', 'is_correct' => false, 'match_key' => '20 butir', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran peluang kelereng!',
                                'explanation' => 'Tidak ada kelereng hijau di dalam kotak (peluangnya 0).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Peluang terambil kelereng kuning adalah 1/5.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kelereng merah memiliki peluang terbesar.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Peluang terambil kelereng hijau adalah 1/2.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jumlah seluruh peluang merah, biru, dan kuning adalah 1 (100%).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Peluang munculnya mata dadu bilangan ganjil {1, 3, 5} pada pelemparan satu dadu adalah ....',
                                'explanation' => '3/6 = 1/2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1/3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1/6', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2/3', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Peluang munculnya mata dadu lebih dari 4 {yaitu 5 dan 6} adalah ....',
                                'explanation' => '2/6 = 1/3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1/3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1/2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1/6', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2/5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dalam sebuah kantong terdapat 5 kelereng putih dan 15 kelereng hitam. Peluang terambil kelereng putih adalah ....',
                                'explanation' => '5 / (5+15) = 5/20 = 1/4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1/4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1/3', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1/5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3/4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kejadian yang PASTI terjadi memiliki nilai peluang sebesar ....',
                                'explanation' => 'Kejadian pasti memiliki nilai peluang 1.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '0', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '100', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kejadian yang MUSTAHIL (tidak mungkin) terjadi memiliki nilai peluang sebesar ....',
                                'explanation' => 'Kejadian mustahil bernilai 0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '-1', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,1', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dari 52 kartu remi standar tanpa joker, banyak kartu bergambar As adalah 4. Peluang terambil kartu As adalah ....',
                                'explanation' => '4/52 = 1/13.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4/52 (1/13)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1/52', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4/13', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1/4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA contoh kejadian yang memiliki nilai peluang sama dengan 0 (MUSTAHIL)!',
                                'explanation' => 'Matahari terbit dari barat dan dadu bernilai 8 adalah mustahil (P = 0).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Matahari terbit dari sebelah barat esok hari.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Munculnya mata dadu bernilai 8 pada dadu standar bermata enam.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Besok akan turun hujan di musim penghujan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Munculnya sisi Gambar pada pelemparan koin logam.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA contoh kejadian yang memiliki nilai peluang sama dengan 1 (PASTI)!',
                                'explanation' => 'Kematian makhluk hidup dan urutan hari adalah kepastian alami (P = 1).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Setiap manusia yang hidup pasti akan meninggal dunia.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hari setelah hari Senin adalah hari Selasa.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Seseorang yang membeli satu kupon undian pasti menang undian utama.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hari ini pasti terjadi gempa bumi berkekuatan besar.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kejadian dengan nilai peluangnya!',
                                'explanation' => 'Tingkat kepastian kejadian peluang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Matahari terbit dari arah timur', 'is_correct' => false, 'match_key' => '1 (Pasti)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Ayam bertelur melahirkan anak sapi', 'is_correct' => false, 'match_key' => '0 (Mustahil)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Muncul angka genap pada dadu', 'is_correct' => false, 'match_key' => '1/2 (50%)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Muncul angka 1 pada dadu', 'is_correct' => false, 'match_key' => '1/6', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan pengambilan kelereng dari toples (total 10) dengan peluangnya!',
                                'explanation' => 'Peluang pengambilan kelereng.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3 kelereng merah dari 10', 'is_correct' => false, 'match_key' => '3/10 (0,3)', 'order' => 1],
                                    ['label' => null, 'option_text' => '5 kelereng hijau dari 10', 'is_correct' => false, 'match_key' => '1/2 (0,5)', 'order' => 2],
                                    ['label' => null, 'option_text' => '2 kelereng biru dari 10', 'is_correct' => false, 'match_key' => '1/5 (0,2)', 'order' => 3],
                                    ['label' => null, 'option_text' => '10 kelereng dari 10', 'is_correct' => false, 'match_key' => '1 (Pasti)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran teori peluang dasar!',
                                'explanation' => 'Nilai peluang maksimal adalah 1 (tidak boleh lebih dari 1).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Peluang empiris diperoleh dari hasil percobaan nyata.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Peluang teoritis dihitung dari rasio titik sampel terhadap ruang sampel.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai peluang suatu kejadian bisa bernilai 1,5.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ruang sampel adalah himpunan semua hasil yang mungkin terjadi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran peluang pelemparan koin!',
                                'explanation' => 'Pelemparan koin acak bisa menghasilkan sisi angka atau gambar.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Peluang muncul gambar pada satu koin adalah 1/2.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jika koin dilempar 100 kali, frekuensi harapan muncul angka adalah 50 kali.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pelemparan koin selalu menghasilkan sisi angka di setiap lemparan.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ruang sampel dua koin adalah {AA, AG, GA, GG} sebanyak 4.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Nilai peluang suatu kejadian yang pasti terjadi adalah ....',
                                'explanation' => '1.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai peluang suatu kejadian yang mustahil terjadi adalah ....',
                                'explanation' => '0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang munculnya mata dadu 5 pada sebuah dadu bermata enam adalah ....',
                                'explanation' => '1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang munculnya sisi Gambar pada pelemparan sekeping uang logam adalah ....',
                                'explanation' => '1/2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Himpunan semua hasil yang mungkin terjadi dalam suatu percobaan disebut ruang ....',
                                'explanation' => 'sampel.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sampel', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Dalam kotak ada 3 bola merah dan 7 bola putih. Peluang terambil bola merah adalah ....',
                                'explanation' => '3/10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rumus peluang kejadian A adalah P(A) = n(A) dibagi ....',
                                'explanation' => 'n(S) (banyak ruang sampel).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'n(S)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah kantong kain berisi 30 kelereng dengan rincian warna sebagai berikut:
- Kelereng merah: 12 butir
- Kelereng hijau: 9 butir
- Kelereng kuning: 6 butir
- Kelereng biru: 3 butir
Jika seorang anak mengambil satu butir kelereng secara acak dari dalam kantong, hitunglah peluang terambilnya:
(a) Kelereng merah
(b) Kelereng hijau
(c) Kelereng kuning
(d) Kelereng biru
Sajikan masing-masing dalam bentuk pecahan paling sederhana!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total kelereng n(S) = 12 + 9 + 6 + 3 = 30 butir.
(a) Peluang merah P(M) = 12 / 30 = 2/5 (atau 40%).
(b) Peluang hijau P(H) = 9 / 30 = 3/10 (atau 30%).
(c) Peluang kuning P(K) = 6 / 30 = 1/5 (atau 20%).
(d) Peluang biru P(B) = 3 / 30 = 1/10 (atau 10%).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Dua buah uang logam (koin) dilemparkan secara bersama-sama sebanyak satu kali. Tentukan:
(a) Seluruh ruang sampel (S) yang mungkin terjadi
(b) Banyaknya titik sampel n(S)
(c) Peluang munculnya kejadian "keduanya sisi Angka" (A, A)
(d) Peluang munculnya kejadian "paling sedikit satu sisi Gambar"',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Ruang sampel S = {(A, A), (A, G), (G, A), (G, G)}.
(b) Banyak titik sampel n(S) = 4.
(c) Kejadian keduanya Angka = {(A, A)} -> Peluang = 1/4 (25%).
(d) Kejadian paling sedikit satu Gambar = {(A, G), (G, A), (G, G)} -> Peluang = 3/4 (75%).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan pengertian "Frekuensi Harapan" dalam konsep peluang matematika dan hitunglah frekuensi harapan munculnya mata dadu prima {2, 3, 5} jika sebuah dadu dilempar sebanyak 120 kali!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Penjelasan:
Frekuensi Harapan (Fh) adalah perkiraan banyaknya suatu kejadian yang diharapkan akan muncul dalam suatu percobaan yang diulang sebanyak n kali. Rumus: Fh(A) = n x P(A).
Perhitungan:
1. Titik sampel prima = {2, 3, 5} -> n(A) = 3.
2. Ruang sampel dadu n(S) = 6.
3. Peluang prima P(A) = 3/6 = 1/2.
4. Banyak percobaan n = 120 kali.
5. Frekuensi Harapan = 120 x 1/2 = 60 kali.
Jadi, frekuensi harapan munculnya mata dadu prima adalah 60 kali.',
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
