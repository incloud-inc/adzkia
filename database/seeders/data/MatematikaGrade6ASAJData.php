<?php

namespace Database\Seeders\Data;

class MatematikaGrade6ASAJData
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Akhir Jenjang (ASAJ SD) Matematika - Paket A',
                'type' => 'exam',
                'description' => 'Ujian kelulusan akhir jenjang SD Kurikulum Merdeka Fase C (Paket A): Komprehensif lintas tingkat (20% Kelas 4, 30% Kelas 5, 50% Kelas 6) meliputi bilangan, geometri, pengukuran, statistika, dan transformasi.',
                'duration_minutes' => 120,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Masterplan Pembangunan Kawasan Ekowisata Terpadu', 'content' => 'Pemerintah daerah merancang kawasan ekowisata terpadu seluas 12 hektare. Pada denah berskala 1 : 2.500, kawasan ini dibagi menjadi: zona konservasi hutan lindung (3/8 bagian), danau buatan dan rekreasi air (0,25 bagian), agrowisata buah organik (20%), dan sisanya untuk fasilitas umum serta pusat UMKM kuliner lokal.
[Keterangan Gambar: Infografis peta kawasan ekowisata berbentuk persegi panjang pada bidang koordinat. Skala 1 : 2.500. Diagram lingkaran menunjukkan proporsi pembagian lahan: Hutan 37,5%, Danau 25%, Agrowisata 20%, dan Fasilitas Umum 17,5%.]'],
                            ['title' => 'Stimulus 2: Instalasi Tangki Penampungan Air Bersih Berskala Besar', 'content' => 'Untuk mencukupi kebutuhan air bersih warga desa, dipasang tandon air silindris (tabung) dengan diameter 2,8 meter dan tinggi 3 meter. Air dialirkan dari sumber mata air pegunungan menggunakan pipa berdebit 70 liter per menit.
[Keterangan Gambar: Ilustrasi tangki air berbentuk tabung dengan diameter d = 2,8 m (jari-jari r = 1,4 m) dan tinggi t = 3 m. Pipa pengisian di bagian atas mengalirkan air dengan debit tetap 70 liter/menit. Gunakan nilai pi = 22/7.]'],
                            ['title' => 'Stimulus 3: Analisis Prestasi Belajar dan Hasil Uji Kemahiran Siswa', 'content' => 'Data perolehan nilai try out ujian kelulusan matematika dari 40 siswa kelas 6 SD Cendekia tercatat sebagai berikut:
Nilai 65: 4 siswa; Nilai 70: 6 siswa; Nilai 75: 8 siswa; Nilai 80: 10 siswa; Nilai 85: 7 siswa; Nilai 90: 3 siswa; Nilai 95: 2 siswa.
[Keterangan Gambar: Diagram batang distribusi nilai matematika siswa kelas 6. Sumbu X menunjukkan rentang nilai 65 hingga 95, sumbu Y menunjukkan frekuensi siswa. Garis putus-putus merah horizontal menunjukkan KKM = 75.]'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah bagian luas lahan yang dialokasikan untuk fasilitas umum dan pusat UMKM?',
                                'explanation' => 'Hutan = 3/8 = 37,5%; Danau = 0,25 = 25%; Agro = 20%. Total = 37,5% + 25% + 20% = 82,5%. Sisa fasilitas umum = 100% - 82,5% = 17,5% = 7/40 bagian.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '17,5% (7/40 bagian)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '15% (3/20 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22,5% (9/40 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12,5% (1/8 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi luas lahan nyata yang diperuntukkan bagi danau buatan?',
                                'explanation' => 'Total luas = 12 hektare = 120.000 m². Luas danau = 0,25 x 120.000 m² = 30.000 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '30.000 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '45.000 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '24.000 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '18.000 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Tentukan semua pernyataan yang BENAR berdasarkan masterplan di atas:',
                                'explanation' => 'Luas danau (30.000 m²) lebih besar dari agrowisata (24.000 m²). Hutan = 45.000 m² (terluas). Fasilitas umum = 17,5% x 120.000 = 21.000 m².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Zona konservasi hutan merupakan zona dengan alokasi lahan terluas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Luas lahan agrowisata adalah 24.000 m²', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Fasilitas umum menempati lahan seluas 21.000 m²', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Luas danau buatan lebih kecil dari luas agrowisata', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan zona ekowisata dengan luas lahan nyatanya:',
                                'explanation' => 'Pasangan alokasi luas lahan kawasan ekowisata.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Zona Hutan Lindung (3/8 bagian)', 'is_correct' => false, 'match_key' => '45.000 m²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Danau Buatan (0,25 bagian)', 'is_correct' => false, 'match_key' => '30.000 m²', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Agrowisata Organik (20%)', 'is_correct' => false, 'match_key' => '24.000 m²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Fasilitas Umum & UMKM (17,5%)', 'is_correct' => false, 'match_key' => '21.000 m²', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah volume kapasitas penuh tangki air tersebut dalam satuan liter?',
                                'explanation' => 'Volume tabung = pi x r^2 x t = 22/7 x 1,4 x 1,4 x 3 = 22 x 0,2 x 1,4 x 3 = 18,48 m³ = 18.480 liter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '18.480 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '9.240 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '36.960 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '55.440 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa waktu yang diperlukan untuk mengisi tangki air dari kondisi kosong hingga terisi penuh?',
                                'explanation' => 'Waktu = Volume / Debit = 18.480 liter / 70 liter/menit = 264 menit (4 jam 24 menit).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '264 menit (4 jam 24 menit)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '240 menit (4 jam)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '300 menit (5 jam)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '180 menit (3 jam)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan mengenai tangki air bersih:',
                                'explanation' => 'Waktu pengisian adalah 4 jam 24 menit (lebih dari 4 jam). Luas alas = 22/7 x 1,4 x 1,4 = 6,16 m².',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jari-jari alas tangki adalah 1,4 meter', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas alas tabung adalah 6,16 m²', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Waktu pengisian penuh kurang dari 4 jam', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika tangki air hanya diisi setinggi 2 meter, berapa liter volume air di dalam tangki?',
                                'explanation' => 'V = 6,16 m² x 2 m = 12,32 m³ = 12.320 liter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12.320 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6.160 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '18.480 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8.200 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah modus dari data perolehan nilai siswa tersebut?',
                                'explanation' => 'Modus adalah nilai dengan frekuensi terbanyak, yaitu nilai 80 dengan 10 siswa.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '80', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '75', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '85', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '70', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa persentase siswa yang nilainya memenuhi atau melampaui KKM (nilai >= 75)?',
                                'explanation' => 'Siswa tuntas (>= 75) = 8 + 10 + 7 + 3 + 2 = 30 siswa dari 40. Persentase = 30/40 x 100% = 75%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '75%', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '70%', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '80%', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '85%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan analisis data nilai:',
                                'explanation' => 'Siswa nilai 90 ke atas = 3 (nilai 90) + 2 (nilai 95) = 5 anak (bukan 6).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Modus data adalah nilai 80', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jumlah siswa yang mendapat nilai di bawah KKM adalah 10 anak', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Siswa yang mendapat nilai 90 ke atas berjumlah 6 anak', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Tentukan pernyataan yang BENAR mengenai data statistik tersebut:',
                                'explanation' => 'Median data ke-20 dan 21 ada pada kelompok nilai 80. Rata-rata sekitar 78,5 (di atas 70).',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Median (nilai tengah) data terletak pada nilai 80', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Frekuensi nilai terendah adalah 4 siswa', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nilai tertinggi yang diperoleh siswa adalah 95', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rata-rata nilai siswa berada di bawah 70', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] FPB dan KPK dari bilangan 36 dan 48 berturut-turut adalah...',
                                'explanation' => '36 = 2^2 x 3^2, 48 = 2^4 x 3. FPB = 2^2 x 3 = 12. KPK = 2^4 x 3^2 = 16 x 9 = 144.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 dan 144', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 dan 144', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12 dan 96', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4 dan 72', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Bentuk pecahan paling sederhana dari 45/60 adalah...',
                                'explanation' => 'FPB dari 45 dan 60 adalah 15. 45:15 / 60:15 = 3/4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3/4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4/5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2/3', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5/6', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Sebuah taman berbentuk persegi panjang memiliki panjang 24 m dan lebar 15 m. Keliling taman tersebut adalah...',
                                'explanation' => 'Keliling = 2 x (p + l) = 2 x (24 + 15) = 2 x 39 = 78 m.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '78 m', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '39 m', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '360 m', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '80 m', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Sebuah mobil menempuh jarak 180 km dalam waktu 2 jam 30 menit. Kecepatan rata-rata mobil tersebut adalah...',
                                'explanation' => 'Waktu = 2,5 jam. Kecepatan = Jarak / Waktu = 180 / 2,5 = 72 km/jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '72 km/jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '65 km/jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '75 km/jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '80 km/jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Sebuah keran mengalirkan air dengan debit 24 liter/menit. Volume air yang mengalir selama 15 menit adalah...',
                                'explanation' => 'Volume = Debit x Waktu = 24 x 15 = 360 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '360 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '240 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '180 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '480 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Sebuah kubus memiliki volume 4.096 cm³. Panjang rusuk kubus tersebut adalah...',
                                'explanation' => 'Akar pangkat tiga dari 4.096 adalah 16 cm (16 x 16 x 16 = 4.096).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '16 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '14 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '18 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '24 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Luas permukaan balok berukuran panjang 12 cm, lebar 8 cm, dan tinggi 5 cm adalah...',
                                'explanation' => 'L = 2 x (pl + pt + lt) = 2 x (96 + 60 + 40) = 2 x 196 = 392 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '392 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '196 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '480 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '784 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Hasil dari 3 1/2 x 0,6 : 7/10 adalah...',
                                'explanation' => '7/2 x 6/10 x 10/7 = 42/20 x 10/7 = (42 x 10)/(20 x 7) = 420/140 = 3.',
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
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Perbandingan uang tabungan Alif dan Bima adalah 3 : 5. Jika selisih uang mereka Rp60.000, berapakah jumlah uang mereka berdua?',
                                'explanation' => 'Selisih perbandingan = 5 - 3 = 2. Jumlah perbandingan = 3 + 5 = 8. Jumlah uang = 8/2 x 60.000 = 4 x 60.000 = Rp240.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp240.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp180.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp150.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp300.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Luas lingkaran yang memiliki diameter 28 cm adalah...',
                                'explanation' => 'r = 14 cm. Luas = 22/7 x 14 x 14 = 616 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.232 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pilihlah semua pernyataan yang BENAR mengenai sifat-sifat bangun datar dan ruang:',
                                'explanation' => 'Segitiga siku-siku sembarang tidak memiliki 3 simetri lipat (hanya segitiga sama sisi yang punya 3). Pilihan A, B, D benar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tabung memiliki 3 sisi dan tidak memiliki titik sudut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kerucut memiliki 1 titik puncak dan 1 rusuk lengkung', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Segitiga siku-siku memiliki simetri lipat sebanyak 3 buah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Balok memiliki 12 rusuk dan 6 sisi berbentuk persegi panjang', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah pernyataan yang BENAR mengenai rasio dan perbandingan:',
                                'explanation' => 'Skala 1 : 100.000 berarti 1 cm mewakili 1 km (bukan 10 km). 2 kg : 500 g = 2000 g : 500 g = 4 : 1. Pilihan A, B, D benar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perbandingan 15 : 25 senilai dengan 3 : 5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pada perbandingan berbalik nilai, semakin banyak pekerja maka waktu penyelesaian semakin singkat', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Skala 1 : 100.000 berarti 1 cm mewakili 10 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rasio 2 kg terhadap 500 gram adalah 4 : 1', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah titik-titik yang terletak pada Kuadran III bidang koordinat Kartesius:',
                                'explanation' => 'Kuadran III memiliki absis negatif dan ordinat negatif. R(-5, 3) berada di Kuadran II.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Titik P(-4, -6)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Titik Q(-1, -8)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Titik R(-5, 3)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Titik S(-7, -2)', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pasangkan konsep matematika dengan rumusnya yang tepat:',
                                'explanation' => 'Pasangan rumus matematika dasar SD.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume Tabung', 'is_correct' => false, 'match_key' => 'pi x r² x t', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Keliling Lingkaran', 'is_correct' => false, 'match_key' => '2 x pi x r', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas Permukaan Balok', 'is_correct' => false, 'match_key' => '2 x (pl + pt + lt)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kecepatan Rata-rata', 'is_correct' => false, 'match_key' => 'Jarak / Waktu', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4 & 5] Pasangkan operasi hitung dengan hasilnya:',
                                'explanation' => 'Pasangan operasi dasar KPK/FPB dan konversi satuan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'KPK dari 12 dan 18', 'is_correct' => false, 'match_key' => '36', 'order' => 1],
                                    ['label' => null, 'option_text' => 'FPB dari 24 dan 36', 'is_correct' => false, 'match_key' => '12', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Akar pangkat tiga dari 1.728', 'is_correct' => false, 'match_key' => '12', 'order' => 3],
                                    ['label' => null, 'option_text' => '3,6 km/jam dikonversi ke m/detik', 'is_correct' => false, 'match_key' => '1 m/detik', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pasangkan koordinat titik awal dengan hasil refleksinya:',
                                'explanation' => 'Pasangan transformasi geometri refleksi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '(3, 5) dicerminkan terhadap sumbu X', 'is_correct' => false, 'match_key' => '(3, -5)', 'order' => 1],
                                    ['label' => null, 'option_text' => '(-4, 2) dicerminkan terhadap sumbu Y', 'is_correct' => false, 'match_key' => '(4, 2)', 'order' => 2],
                                    ['label' => null, 'option_text' => '(1, -6) dicerminkan terhadap sumbu X', 'is_correct' => false, 'match_key' => '(1, 6)', 'order' => 3],
                                    ['label' => null, 'option_text' => '(-2, -7) dicerminkan terhadap titik O(0,0)', 'is_correct' => false, 'match_key' => '(2, 7)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Tentukan kebenaran pernyataan berikut:',
                                'explanation' => '1 m³ = 1.000 dm³ = 1.000 liter (pernyataan 3 salah).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Bilangan prima terkecil adalah 2', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jumlah sudut dalam sembarang segitiga adalah 180 derajat', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 meter kubik sama dengan 100 liter', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Tentukan kebenaran pernyataan statistika dan koordinat:',
                                'explanation' => 'Titik (0, 4) terletak di sumbu Y karena absisnya 0.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nilai rata-rata hitung disebut juga mean', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Peluang muncul angka genap pada pelemparan sebuah dadu adalah 1/2', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Titik (0, 4) terletak tepat di sumbu X', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => '[Materi Kelas 4] Hasil dari (-15) + 28 - (-12) adalah...',
                                'explanation' => '(-15) + 28 + 12 = 13 + 12 = 25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] FPB dari bilangan 42 dan 56 adalah...',
                                'explanation' => '42 = 2 x 3 x 7; 56 = 2^3 x 7. FPB = 2 x 7 = 14.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '14', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Keliling sebuah persegi yang memiliki luas 81 cm² adalah ... cm.',
                                'explanation' => 'Sisi = akar(81) = 9 cm. Keliling = 4 x 9 = 36 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '36', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Sebuah bus berangkat pukul 06.30 dan tiba pukul 09.00 dengan kecepatan 60 km/jam. Jarak yang ditempuh adalah ... km.',
                                'explanation' => 'Waktu = 2,5 jam. Jarak = 60 x 2,5 = 150 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '150', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Sebuah bak mandi bervolume 720 liter diisi penuh dalam waktu 12 menit. Debit aliran air adalah ... liter/menit.',
                                'explanation' => 'Debit = 720 / 12 = 60 liter/menit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '60', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Jarak pada peta 4 cm mewakili jarak sebenarnya 80 km. Skala peta tersebut adalah 1 : ...',
                                'explanation' => '80 km = 8.000.000 cm. Skala = 4 / 8.000.000 = 1 : 2.000.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2.000.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Sebuah balok memiliki panjang 15 cm, lebar 10 cm, dan tinggi 8 cm. Volume balok tersebut adalah ... cm³.',
                                'explanation' => 'V = 15 x 10 x 8 = 1.200 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1200', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Bentuk desimal dari pecahan 7/8 adalah...',
                                'explanation' => '7 : 8 = 0,875.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,875', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Hasil perkalian pecahan 2 1/4 x 2/3 adalah ... (dalam pecahan biasa paling sederhana a/b)',
                                'explanation' => '9/4 x 2/3 = 18/12 = 3/2 (atau 1,5).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Keliling lingkaran dengan jari-jari 21 cm adalah ... cm. (pi = 22/7)',
                                'explanation' => 'K = 2 x 22/7 x 21 = 2 x 22 x 3 = 132 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '132', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Volume kerucut dengan jari-jari alas 7 cm dan tinggi 18 cm adalah ... cm³. (pi = 22/7)',
                                'explanation' => 'V = 1/3 x 22/7 x 7 x 7 x 18 = 1/3 x 154 x 18 = 154 x 6 = 924 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '924', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Nilai ulangan harian: 7, 8, 8, 9, 7, 6, 8, 10, 9. Nilai rata-rata (mean) data tersebut adalah...',
                                'explanation' => 'Jumlah = 72. Banyak data = 9. Rata-rata = 72 / 9 = 8.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Titik A(-3, 7) dicerminkan terhadap sumbu X menghasilkan bayangan A\'(-3, ...).',
                                'explanation' => 'Refleksi thd sumbu X membalik tanda ordinat: y\' = -7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '-7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Titik B(4, 2) ditranslasikan oleh T[-6, 5]. Absis bayangan B\' adalah...',
                                'explanation' => 'Absis baru = 4 + (-6) = -2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '-2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Peluang munculnya mata dadu prima ganjil (3 dan 5) pada sebuah dadu bermata 6 adalah ... (dalam bentuk pecahan paling sederhana a/b)',
                                'explanation' => 'Ada 2 angka (3 dan 5) dari 6 sisi dadu = 2/6 = 1/3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Materi Kelas 5 & 6 - Perbandingan & Skala]
Sebuah denah gedung sekolah digambar dengan skala 1 : 400. Lapangan upacara pada denah berbentuk persegi panjang berukuran panjang 12 cm dan lebar 7,5 cm.
a. Hitunglah panjang dan lebar sebenarnya dari lapangan upacara tersebut dalam satuan meter!
b. Hitunglah keliling dan luas sebenarnya dari lapangan upacara tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Menghitung ukuran sebenarnya:
   - Panjang sebenarnya = 12 cm x 400 = 4.800 cm = 48 meter.
   - Lebar sebenarnya = 7,5 cm x 400 = 3.000 cm = 30 meter.
b. Menghitung keliling dan luas sebenarnya:
   - Keliling sebenarnya = 2 x (p + l) = 2 x (48 + 30) = 2 x 78 = 156 meter.
   - Luas sebenarnya = p x l = 48 m x 30 m = 1.440 m².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Geometri Lingkaran]
Sebuah taman kota berbentuk lingkaran memiliki diameter 42 meter. Di sekeliling tepi luar taman dibuat jalur jalan setapak selebar 3,5 meter.
a. Hitunglah jari-jari taman bagian dalam dan jari-jari lingkaran luar (taman + jalan setapak)!
b. Hitunglah luas seluruh area jalan setapak tersebut! (Gunakan pi = 22/7)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Jari-jari taman dalam (r1) = 42 / 2 = 21 meter.
   Jari-jari lingkaran luar (r2) = 21 m + 3,5 m = 24,5 meter = 49/2 meter.
b. Luas jalan setapak = Luas lingkaran luar - Luas lingkaran dalam:
   - Luas dalam = 22/7 x 21 x 21 = 1.386 m².
   - Luas luar = 22/7 x (49/2) x (49/2) = 22/7 x 2401 / 4 = 22 x 343 / 4 = 7.546 / 4 = 1.886,5 m².
   - Luas jalan setapak = 1.886,5 m² - 1.386 m² = 500,5 m².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Bangun Ruang Campuran]
Sebuah tenda kemah berbentuk gabungan balok dan prisma segitiga di atasnya. Bagian bawah berupa balok dengan ukuran panjang 6 meter, lebar 4 meter, dan tinggi 2 meter. Bagian atap berupa prisma segitiga dengan tinggi atap 1,5 meter.
a. Hitunglah volume ruangan bagian bawah (balok)!
b. Hitunglah volume ruangan atap tenda (prisma segitiga)!
c. Berapakah volume total kapasitas udara di dalam tenda tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Volume balok = p x l x t = 6 x 4 x 2 = 48 m³.
b. Volume prisma segitiga = Luas alas segitiga x tinggi prisma:
   Alas segitiga = lebar balok = 4 meter. Tinggi segitiga = 1,5 meter.
   Luas alas segitiga = 1/2 x 4 x 1,5 = 3 m².
   Tinggi prisma = panjang balok = 6 meter.
   Volume prisma = 3 m² x 6 m = 18 m³.
c. Volume total = Volume balok + Volume prisma = 48 + 18 = 66 m³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Statistika & Analisis Data]
Tabel perolehan hasil panen padi Koperasi Tani Makmur selama 5 tahun tercatat sebagai berikut:
Tahun 2021: 42 ton; Tahun 2022: 48 ton; Tahun 2023: 50 ton; Tahun 2024: 54 ton; Tahun 2025: 56 ton.
a. Hitunglah rata-rata (mean) hasil panen padi per tahun selama periode 5 tahun tersebut!
b. Pada tahun berapakah terjadi kenaikan panen paling tinggi dibandingkan tahun sebelumnya? Sebutkan besar kenaikannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Total hasil panen = 42 + 48 + 50 + 54 + 56 = 250 ton.
   Banyak tahun = 5 tahun.
   Rata-rata (mean) = 250 / 5 = 50 ton per tahun.
b. Analisis kenaikan panen tahunan:
   - Kenaikan 2021 ke 2022 = 48 - 42 = 6 ton.
   - Kenaikan 2022 ke 2023 = 50 - 48 = 2 ton.
   - Kenaikan 2023 ke 2024 = 54 - 50 = 4 ton.
   - Kenaikan 2024 ke 2025 = 56 - 54 = 2 ton.
   Kenaikan panen paling tinggi terjadi pada tahun 2022 dengan peningkatan sebesar 6 ton.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Sistem Koordinat & Refleksi]
Sebuah kapal feri bergerak pada sistem koordinat navigasi dari pelabuhan A(-4, 3) menuju mercusuar B(2, 3), lalu berbelok menuju pulau C(2, -5).
a. Hitunglah jarak mendatar dari A ke B dan jarak tegak dari B ke C (dalam satuan koordinat)!
b. Jika posisi pulau C dicerminkan terhadap sumbu koordinat Y, tentukan koordinat bayangan pulau C\'!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Menghitung jarak:
   - Jarak mendatar AB = xB - xA = 2 - (-4) = 6 satuan.
   - Jarak tegak BC = yB - yC = 3 - (-5) = 8 satuan.
b. Titik C memiliki koordinat (2, -5).
   Pencerminan terhadap sumbu Y membalik tanda absis (x -> -x):
   Koordinat bayangan C\' = (-2, -5).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Jenjang (ASAJ SD) Matematika - Paket B',
                'type' => 'exam',
                'description' => 'Ujian kelulusan akhir jenjang SD Kurikulum Merdeka Fase C (Paket B): Pengujian komprehensif lintas tingkat (20% Kelas 4, 30% Kelas 5, 50% Kelas 6) untuk mengukur kompetensi penalaran matematis dan pemecahan masalah.',
                'duration_minutes' => 120,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Pengelolaan Logistik Bantuan Bencana Alam', 'content' => 'Badan penanggulangan bencana mendistribusikan total 24 ton beras bantuan untuk tiga kecamatan terdampak. Kecamatan Merapi menerima 3/8 bagian, Kecamatan Sindoro menerima 0,35 bagian, dan sisanya dibagikan ke Kecamatan Sumbing.
[Keterangan Gambar: Infografis armada truk logistik bantuan beras. Diagram lingkaran proporsi pembagian: Merapi 37,5%, Sindoro 35%, Sumbing 27,5%. Total stok awal di gudang logistik 24 ton = 24.000 kg.]'],
                            ['title' => 'Stimulus 2: Efisiensi Kolam Retensi Pengendali Banjir', 'content' => 'Sebuah kolam retensi pengendali banjir berbentuk balok memiliki panjang 25 meter, lebar 12 meter, dan kedalaman 4 meter. Ketika pintu pompa dibuka, dua unit mesin pompa penyedot air dinyalakan bersamaan. Pompa A memiliki debit 400 liter/detik dan Pompa B memiliki debit 600 liter/detik.
[Keterangan Gambar: Ilustrasi kolam retensi penampungan air hujan dengan dimensi p = 25 m, l = 12 m, t = 4 m. Dua pipa pompa besar mengeluarkan air secara simultan menuju sungai utama dengan total debit gabungan 1.000 liter/detik.]'],
                            ['title' => 'Stimulus 3: Evaluasi Berat Badan Ideal Siswa Angkatan Kelulusan', 'content' => 'Petugas UKS menimbang berat badan 30 siswa kelas 6 SD Harapan Bangsa. Hasil pengukuran (dalam kg) adalah sebagai berikut:
Berat 34 kg: 3 siswa; Berat 36 kg: 5 siswa; Berat 38 kg: 8 siswa; Berat 40 kg: 7 siswa; Berat 42 kg: 4 siswa; Berat 45 kg: 3 siswa.
[Keterangan Gambar: Tabel dan diagram garis pengukuran berat badan siswa kelas 6. Data menunjukkan rentang dari 34 kg hingga 45 kg dengan puncak tertinggi pada 38 kg.]'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa bagian beras yang diterima oleh Kecamatan Sumbing?',
                                'explanation' => 'Merapi = 3/8 = 37,5%; Sindoro = 0,35 = 35%. Total = 72,5%. Sisa Sumbing = 100% - 72,5% = 27,5% = 11/40 bagian.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '27,5% (11/40 bagian)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '25% (1/4 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '30% (3/10 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '22,5% (9/40 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa kilogram beras yang diterima oleh Kecamatan Merapi?',
                                'explanation' => 'Beras Merapi = 3/8 x 24.000 kg = 3 x 3.000 kg = 9.000 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9.000 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8.400 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6.600 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10.200 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Tentukan semua pernyataan yang BENAR mengenai alokasi beras bantuan:',
                                'explanation' => 'Sindoro = 0,35 x 24.000 = 8.400 kg. Sumbing = 24.000 - (9.000 + 8.400) = 6.600 kg. Selisih Merapi dan Sindoro = 9.000 - 8.400 = 600 kg (bukan 1.000 kg). Pilihan A, B, C benar.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kecamatan Merapi menerima beras paling banyak di antara ketiga kecamatan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kecamatan Sindoro menerima 8.400 kg beras', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kecamatan Sumbing menerima 6.600 kg beras', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Selisih beras Merapi dan Sindoro adalah 1.000 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan kecamatan dengan jumlah beras yang diterimanya:',
                                'explanation' => 'Pasangan alokasi bantuan beras bencana alam.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kecamatan Merapi', 'is_correct' => false, 'match_key' => '9.000 kg', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kecamatan Sindoro', 'is_correct' => false, 'match_key' => '8.400 kg', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kecamatan Sumbing', 'is_correct' => false, 'match_key' => '6.600 kg', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Total Seluruh Bantuan', 'is_correct' => false, 'match_key' => '24.000 kg', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah kapasitas volume tampung maksimum kolam retensi tersebut dalam liter?',
                                'explanation' => 'Volume = 25 x 12 x 4 = 1.200 m³ = 1.200.000 liter (karena 1 m³ = 1.000 liter).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.200.000 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '600.000 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.500.000 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '300.000 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa detik waktu yang dibutuhkan untuk mengosongkan kolam yang penuh dengan kedua pompa beroperasi bersamaan?',
                                'explanation' => 'Debit total = 400 + 600 = 1.000 liter/detik. Waktu = 1.200.000 / 1.000 = 1.200 detik = 20 menit.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.200 detik (20 menit)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '600 detik (10 menit)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.800 detik (30 menit)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2.400 detik (40 menit)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan mengenai operasional pompa air:',
                                'explanation' => 'Waktu pengosongan hanya 20 menit (kurang dari 1 jam).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume kapasitas kolam adalah 1.200 m³', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Debit gabungan kedua pompa adalah 1.000 liter/detik', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Waktu pengosongan kolam memerlukan lebih dari 1 jam', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika hanya pompa A yang bekerja, berapa detik waktu yang dibutuhkan untuk mengosongkan kolam?',
                                'explanation' => 'Waktu = 1.200.000 / 400 = 3.000 detik = 50 menit.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3.000 detik (50 menit)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 detik (20 menit)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2.000 detik (33,3 menit)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4.000 detik', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah modus berat badan siswa kelas 6 tersebut?',
                                'explanation' => 'Modus adalah berat dengan jumlah siswa terbanyak, yaitu 38 kg dengan 8 siswa.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '38 kg', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '40 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '36 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '42 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak siswa yang memiliki berat badan lebih dari 38 kg?',
                                'explanation' => 'Siswa dengan berat > 38 kg = berat 40 kg (7) + berat 42 kg (4) + berat 45 kg (3) = 14 siswa.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14 siswa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7 siswa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '11 siswa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '17 siswa', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan analisis berat badan:',
                                'explanation' => 'Median data ke-15 dan 16 terletak pada rentang 38 kg atau 40 kg, bukan 42 kg.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Berat badan terendah siswa adalah 34 kg', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Modus data berat badan adalah 38 kg', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Median (nilai tengah) berat badan adalah 42 kg', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pernyataan yang BENAR mengenai statistik berat badan siswa:',
                                'explanation' => 'Rentang = 45 - 34 = 11 kg. Hanya 3 siswa di bawah 35 kg.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Total siswa yang ditimbang adalah 30 orang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Frekuensi siswa dengan berat badan 36 kg adalah 5 anak', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rentang berat badan siswa adalah 11 kg', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sebagian besar siswa memiliki berat di bawah 35 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] KPK dari 15, 20, dan 30 adalah...',
                                'explanation' => '15 = 3x5, 20 = 2^2x5, 30 = 2x3x5. KPK = 2^2 x 3 x 5 = 60.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '60', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '30', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '120', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '90', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] FPB dari 48 dan 72 adalah...',
                                'explanation' => '48 = 2^4 x 3, 72 = 2^3 x 3^2. FPB = 2^3 x 3 = 24.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '24', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '36', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Sebuah segitiga memiliki alas 16 cm dan tinggi 12 cm. Luas segitiga tersebut adalah...',
                                'explanation' => 'Luas = 1/2 x 16 x 12 = 96 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '96 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '192 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '48 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '84 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Sebuah sepeda motor melaju dengan kecepatan 45 km/jam selama 1 jam 20 menit. Jarak yang ditempuh adalah...',
                                'explanation' => 'Waktu = 1 1/3 jam = 4/3 jam. Jarak = 45 x 4/3 = 60 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '60 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '55 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '50 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '70 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Debit aliran selang pemadam kebakaran adalah 180 liter/menit. Nilai ini setara dengan ... liter/detik.',
                                'explanation' => '180 liter / 60 detik = 3 liter/detik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1,8', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Sebuah balok berukuran 20 cm x 15 cm x 10 cm. Volume balok tersebut adalah...',
                                'explanation' => 'V = 20 x 15 x 10 = 3.000 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3.000 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.500 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6.000 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4.500 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Luas permukaan kubus yang panjang rusuknya 8 cm adalah...',
                                'explanation' => 'L = 6 x s² = 6 x 64 = 384 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '384 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '512 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '256 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '192 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Hasil dari 5/6 + 2 1/3 - 1 1/4 adalah...',
                                'explanation' => '5/6 + 7/3 - 5/4 = 10/12 + 28/12 - 15/12 = 23/12 = 1 11/12.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 11/12', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 1/12', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 7/12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2 5/12', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Perbandingan umur Ayah dan Anang adalah 7 : 2. Jika umur Ayah 42 tahun, berapakah umur Anang?',
                                'explanation' => 'Umur Anang = 2/7 x 42 = 12 tahun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 tahun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '14 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '16 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Sebuah roda sepeda memiliki diameter 56 cm. Jika roda berputar sebanyak 100 kali, jarak yang ditempuh sepeda adalah... (pi = 22/7)',
                                'explanation' => 'Keliling = 22/7 x 56 = 176 cm. Jarak = 176 cm x 100 = 17.600 cm = 176 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '176 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '88 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '352 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '154 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pilihlah semua bangun datar yang memiliki simetri lipat dan simetri putar berjumlah SAMA:',
                                'explanation' => 'Jajar genjang memiliki 0 simetri lipat dan 2 simetri putar (tidak sama).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Persegi (4 simetri lipat & 4 simetri putar)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Segitiga sama sisi (3 simetri lipat & 3 simetri putar)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Persegi panjang (2 simetri lipat & 2 simetri putar)', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jajar genjang (2 simetri lipat & 2 simetri putar)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah pernyataan yang BENAR mengenai sistem koordinat Kartesius:',
                                'explanation' => 'Pencerminan terhadap sumbu X mengubah tanda ordinat y (bukan absis x).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sumbu X disebut sumbu absis dan sumbu Y disebut sumbu ordinat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Titik K(-5, -3) terletak di Kuadran III', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pencerminan terhadap sumbu X mengubah tanda absis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Translasi tidak mengubah ukuran dan bentuk bangun', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah peluang teoretis yang bernilai 1/2:',
                                'explanation' => 'Mata dadu 5 memiliki peluang 1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Muncul mata dadu genap pada sebuah dadu bermata 6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Muncul sisi gambar pada pelemparan sekeping uang logam', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Muncul mata dadu angka 5 pada sebuah dadu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Terambilnya kelereng merah dari kantong berisi 5 merah dan 5 biru', 'is_correct' => true, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pasangkan bangun ruang dengan rumus volumenya:',
                                'explanation' => 'Pasangan rumus volume bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kubus', 'is_correct' => false, 'match_key' => 's³', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Balok', 'is_correct' => false, 'match_key' => 'p x l x t', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Prisma Segitiga', 'is_correct' => false, 'match_key' => 'Luas alas segitiga x tinggi prisma', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Limas Segi Empat', 'is_correct' => false, 'match_key' => '1/3 x Luas alas x tinggi limas', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5 & 6] Pasangkan koordinat bayangan hasil pencerminan terhadap sumbu Y:',
                                'explanation' => 'Refleksi terhadap sumbu Y membalik tanda nilai x.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Titik (2, 7)', 'is_correct' => false, 'match_key' => '(-2, 7)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Titik (-5, 4)', 'is_correct' => false, 'match_key' => '(5, 4)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Titik (3, -1)', 'is_correct' => false, 'match_key' => '(-3, -1)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Titik (-8, -6)', 'is_correct' => false, 'match_key' => '(8, -6)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4 & 5] Pasangkan pecahan biasa dengan bentuk persennya:',
                                'explanation' => 'Pasangan konversi pecahan ke persen.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/4', 'is_correct' => false, 'match_key' => '25%', 'order' => 1],
                                    ['label' => null, 'option_text' => '3/5', 'is_correct' => false, 'match_key' => '60%', 'order' => 2],
                                    ['label' => null, 'option_text' => '7/10', 'is_correct' => false, 'match_key' => '70%', 'order' => 3],
                                    ['label' => null, 'option_text' => '3/8', 'is_correct' => false, 'match_key' => '37,5%', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Tentukan kebenaran pernyataan matematika berikut:',
                                'explanation' => '1 ton = 1.000 kg (pernyataan 3 salah).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '1 gross sama dengan 144 buah', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '1 kodi sama dengan 20 lembar', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 ton sama dengan 10.000 kg', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Tentukan kebenaran sifat peluang dan diagram:',
                                'explanation' => 'Total sudut satu lingkaran penuh adalah 360 derajat.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Peluang suatu kejadian pasti bernilai 1', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Peluang kejadian mustahil bernilai 0', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Total sudut pada diagram lingkaran adalah 180 derajat', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => '[Materi Kelas 4] Hasil operasi hitung 125 + 75 : 5 - 20 adalah...',
                                'explanation' => '125 + 15 - 20 = 140 - 20 = 120.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '120', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] KPK dari 18 dan 24 adalah...',
                                'explanation' => '18 = 2x3^2, 24 = 2^3x3. KPK = 8 x 9 = 72.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '72', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Luas persegi dengan keliling 48 cm adalah ... cm².',
                                'explanation' => 'Sisi = 48 / 4 = 12 cm. Luas = 12 x 12 = 144 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '144', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Sebuah kendaraan bergerak selama 45 menit dengan kecepatan 80 km/jam. Jarak tempuh kendaraan tersebut adalah ... km.',
                                'explanation' => 'Waktu = 45/60 jam = 3/4 jam. Jarak = 80 x 3/4 = 60 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '60', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Debit air 30 liter/menit sama dengan ... cm³/detik.',
                                'explanation' => '30 liter = 30.000 cm³. 30.000 / 60 detik = 500 cm³/detik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '500', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Jarak kota A ke B pada peta 5 cm. Jika skala peta 1 : 1.500.000, jarak sebenarnya adalah ... km.',
                                'explanation' => '5 x 1.500.000 = 7.500.000 cm = 75 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '75', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Luas alas sebuah balok adalah 45 cm². Jika tinggi balok 12 cm, maka volumenya adalah ... cm³.',
                                'explanation' => 'Volume = 45 x 12 = 540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '540', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Hasil dari 4/5 : 2/3 x 5/6 adalah ... (dalam pecahan biasa paling sederhana)',
                                'explanation' => '4/5 x 3/2 x 5/6 = 12/10 x 5/6 = 60/60 = 1.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Uang Riko berbanding uang Siska adalah 4 : 7. Jika uang Siska Rp84.000, maka uang Riko adalah Rp...',
                                'explanation' => 'Uang Riko = 4/7 x 84.000 = 4 x 12.000 = Rp48.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '48000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Luas lingkaran dengan jari-jari 10 cm adalah ... cm². (pi = 3,14)',
                                'explanation' => 'Luas = 3,14 x 10 x 10 = 314 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '314', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Volume tabung dengan diameter 14 cm dan tinggi 20 cm adalah ... cm³. (pi = 22/7)',
                                'explanation' => 'r = 7 cm. V = 22/7 x 7 x 7 x 20 = 154 x 20 = 3.080 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3080', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Rata-rata dari data nilai: 6, 7, 8, 8, 9, 10, 8 adalah...',
                                'explanation' => 'Jumlah = 56. Banyak data = 7. Rata-rata = 56 / 7 = 8.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Titik P(5, -3) jika dicerminkan terhadap sumbu Y menghasilkan koordinat bayangan (..., -3).',
                                'explanation' => 'Absis x\' = -5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '-5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Titik Q(2, 6) digeser oleh translasi T[4, -3]. Koordinat bayangan Q\' adalah (6, ...).',
                                'explanation' => 'Ordinat y\' = 6 + (-3) = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Dalam sebuah kantong terdapat 3 kelereng merah dan 7 kelereng biru. Peluang terambilnya kelereng merah adalah ... (dalam pecahan a/b)',
                                'explanation' => 'Peluang = 3 / (3 + 7) = 3/10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Materi Kelas 5 & 6 - Perbandingan Senilai & Bertingkat]
Sebuah proyek pengaspalan jalan sepanjang 18 km direncanakan selesai dalam waktu 30 hari oleh 12 orang pekerja.
a. Jika setelah bekerja selama 10 hari proyek dihentikan selama 5 hari karena cuaca buruk, berapa hari sisa waktu pengerjaan yang tersedia?
b. Berapa tambahan pekerja yang dibutuhkan agar proyek tersebut dapat selesai tepat waktu sesuai jadwal semula?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Sisa hari semula = 30 - 10 = 20 hari.
   Karena libur 5 hari, sisa waktu efektif yang tersedia = 20 - 5 = 15 hari.
b. Menggunakan prinsip perbandingan berbalik nilai (beban kerja = pekerja x hari):
   Sisa beban kerja = 12 pekerja x 20 hari = 240 orang-hari.
   Pekerja yang dibutuhkan untuk 15 hari = 240 / 15 = 16 orang pekerja.
   Tambahan pekerja = 16 - 12 = 4 orang pekerja.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Geometri Bangun Ruang Campuran]
Sebuah tempat penampungan air minum terdiri dari tabung silinder dan setengah bola di bagian bawahnya. Diameter tabung dan setengah bola adalah 14 cm. Tinggi bagian tabung adalah 20 cm.
a. Hitunglah volume air pada bagian tabung silinder!
b. Hitunglah volume air pada bagian setengah bola!
c. Hitunglah kapasitas volume total penampungan air tersebut! (Gunakan pi = 22/7)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Jari-jari r = 14 / 2 = 7 cm.
   Volume tabung = pi x r² x t = 22/7 x 7 x 7 x 20 = 154 x 20 = 3.080 cm³.
b. Volume setengah bola = 1/2 x (4/3 x pi x r³) = 2/3 x 22/7 x 7 x 7 x 7 = 2/3 x 22 x 49 = 2.156 / 3 = 718,67 cm³.
c. Volume total = 3.080 + 718,67 = 3.798,67 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Statistika & Diagram Lingkaran]
Diagram lingkaran minat ekstrakurikuler 120 siswa kelas 6 SD menunjukkan data berikut: Pramuka 30%, Futsal 25%, Seni Tari 20%, Robotik 15%, dan sisanya PMR.
a. Berapa persentase dan besar sudut pusat untuk ekstrakurikuler PMR?
b. Berapakah jumlah siswa yang memilih masing-masing ekstrakurikuler Pramuka dan Robotik?
c. Hitunglah selisih jumlah siswa yang memilih Futsal dengan Seni Tari!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Persentase PMR = 100% - (30% + 25% + 20% + 15%) = 100% - 90% = 10%.
   Besar sudut PMR = 10/100 x 360 derajat = 36 derajat.
b. Jumlah siswa:
   - Pramuka = 30/100 x 120 = 36 siswa.
   - Robotik = 15/100 x 120 = 18 siswa.
c. Futsal = 25/100 x 120 = 30 siswa.
   Seni Tari = 20/100 x 120 = 24 siswa.
   Selisih = 30 - 24 = 6 siswa.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Koordinat Kartesius & Transformasi]
Segitiga KLM memiliki koordinat K(2, 1), L(6, 1), dan M(2, 4).
a. Tunjukkan bahwa segitiga KLM adalah segitiga siku-siku dan hitung keliling serta luasnya!
b. Tentukan koordinat bayangan K\', L\', M\' setelah ditranslasikan oleh T[-4, 3]!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Sisi alas KL horizontal: panjang = 6 - 2 = 4 satuan.
   Sisi tegak KM vertikal: panjang = 4 - 1 = 3 satuan.
   Karena KL dan KM tegak lurus pada titik K, segitiga KLM adalah segitiga siku-siku di K.
   Sisi miring LM = akar(4² + 3²) = akar(16 + 9) = 5 satuan.
   Keliling = 4 + 3 + 5 = 12 satuan. Luas = 1/2 x 4 x 3 = 6 satuan luas.
b. Hasil translasi T[-4, 3]:
   - K(2, 1) -> K\'(2-4, 1+3) = K\'(-2, 4)
   - L(6, 1) -> L\'(6-4, 1+3) = L\'(2, 4)
   - M(2, 4) -> M\'(2-4, 4+3) = M\'(-2, 7)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 4 & 5 - Pengukuran & Debit]
Sebuah akuarium berbentuk balok dengan panjang 80 cm, lebar 50 cm, dan tinggi 60 cm mula-mula terisi air setinggi 15 cm. Kemudian akuarium diisi air menggunakan selang berdebit 15 liter/menit sampai terisi setinggi 45 cm.
a. Hitunglah volume air yang ditambahkan ke dalam akuarium (dalam liter)!
b. Berapa menit waktu yang diperlukan untuk proses pengisian tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Kenaikan tinggi air = 45 cm - 15 cm = 30 cm.
   Volume penambahan air = panjang x lebar x kenaikan tinggi
   = 80 cm x 50 cm x 30 cm = 120.000 cm³.
   Karena 1 liter = 1.000 cm³, maka volume penambahan = 120.000 / 1.000 = 120 liter.
b. Waktu pengisian = Volume / Debit = 120 liter / 15 liter/menit = 8 menit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Jenjang (ASAJ SD) Matematika - Paket C',
                'type' => 'exam',
                'description' => 'Ujian kelulusan akhir jenjang SD Kurikulum Merdeka Fase C (Paket C): Evaluasi komprehensif lintas tingkat (20% Kelas 4, 30% Kelas 5, 50% Kelas 6) menguji daya nalar, literasi numerasi, dan penguasaan konsep matematika dasar.',
                'duration_minutes' => 120,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Alokasi Anggaran Belanja Organisasi Siswa Sekolah', 'content' => 'OSIS SD Teladan mengelola anggaran tahunan sebesar Rp18.000.000 untuk kegiatan siswa. Anggaran dialokasikan untuk: Peringatan Hari Besar Nasional (PHBN) sebesar 3/10 bagian, Lomba Literasi & Sains sebesar 0,25 bagian, Pengembangan Bakat Olahraga 20%, dan sisanya disimpan sebagai kas cadangan operasional.
[Keterangan Gambar: Infografis diagram batang dan diagram lingkaran anggaran OSIS. PHBN 30%, Lomba Literasi 25%, Olahraga 20%, dan Kas Cadangan 25%. Total anggaran Rp18.000.000.]'],
                            ['title' => 'Stimulus 2: Instalasi Pipa dan Pengisian Kolam Renang Mini Edukasi', 'content' => 'Sebuah kolam renang mini memiliki panjang 15 meter, lebar 8 meter, dan kedalaman rata-rata 1,5 meter. Kolam diisi menggunakan 3 pipa air yang identik. Masing-masing pipa memiliki debit aliran 250 liter per menit.
[Keterangan Gambar: Ilustrasi kolam renang mini dengan 3 kran pipa pengisi di bibir kolam. Dimensi kolam p = 15 m, l = 8 m, t = 1,5 m. Ketiga kran mengalir bersamaan dengan debit total 750 liter/menit.]'],
                            ['title' => 'Stimulus 3: Hasil Uji Ketahanan Fisik Lari 60 Meter Siswa SD', 'content' => 'Guru PJOK mencatat catatan waktu lari cepat 60 meter (dibulatkan ke detik terdekat) dari 36 siswa kelas 6:
Waktu 10 detik: 4 siswa; Waktu 11 detik: 8 siswa; Waktu 12 detik: 12 siswa; Waktu 13 detik: 7 siswa; Waktu 14 detik: 5 siswa.
[Keterangan Gambar: Diagram batang hasil tes lari 60 meter. Puncak batang tertinggi pada waktu 12 detik dengan 12 siswa.]'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa persentase anggaran yang dialokasikan sebagai kas cadangan operasional?',
                                'explanation' => 'PHBN = 30%; Lomba = 25%; Olahraga = 20%. Total = 75%. Sisa kas cadangan = 100% - 75% = 25% (1/4 bagian).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '25% (1/4 bagian)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '20% (1/5 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '30% (3/10 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '15% (3/20 bagian)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah jumlah rupiah yang dialokasikan untuk kegiatan PHBN?',
                                'explanation' => 'Dana PHBN = 3/10 x Rp18.000.000 = Rp5.400.000.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp5.400.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp4.500.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp3.600.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp6.000.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Tentukan semua pernyataan yang BENAR mengenai alokasi anggaran OSIS:',
                                'explanation' => 'Kas cadangan = 25% x 18.000.000 = Rp4.500.000 (lebih dari 4 juta). Pilihan A, B, C benar.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dana untuk Lomba Literasi dan Kas Cadangan memiliki jumlah yang sama persis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dana untuk Pengembangan Bakat Olahraga adalah Rp3.600.000', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Alokasi terbesar digunakan untuk kegiatan PHBN', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kas cadangan operasional berjumlah kurang dari Rp4.000.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Pasangkan pos kegiatan OSIS dengan alokasi dananya:',
                                'explanation' => 'Pasangan rincian anggaran belanja OSIS.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'PHBN (30%)', 'is_correct' => false, 'match_key' => 'Rp5.400.000', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Lomba Literasi (25%)', 'is_correct' => false, 'match_key' => 'Rp4.500.000', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Olahraga (20%)', 'is_correct' => false, 'match_key' => 'Rp3.600.000', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kas Cadangan (25%)', 'is_correct' => false, 'match_key' => 'Rp4.500.000', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah volume air yang diperlukan untuk mengisi penuh kolam renang tersebut?',
                                'explanation' => 'Volume = 15 x 8 x 1,5 = 180 m³ = 180.000 liter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '180.000 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '90.000 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '120.000 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '240.000 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa waktu yang diperlukan untuk mengisi penuh kolam renang jika ketiga pipa dibuka bersamaan?',
                                'explanation' => 'Debit total = 3 x 250 = 750 liter/menit. Waktu = 180.000 / 750 = 240 menit = 4 jam.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '240 menit (4 jam)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '180 menit (3 jam)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '300 menit (5 jam)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '360 menit (6 jam)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan teknis kolam renang:',
                                'explanation' => 'Waktu pengisian adalah 4 jam, bukan 6 jam.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume kapasitas kolam renang adalah 180 m³', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Debit gabungan ketiga pipa adalah 750 liter/menit', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Waktu pengisian penuh adalah 6 jam', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika hanya 1 pipa yang digunakan, berapa jam waktu yang dibutuhkan untuk mengisi penuh kolam?',
                                'explanation' => 'Waktu 1 pipa = 180.000 / 250 = 720 menit = 12 jam.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '15 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapakah modus catatan waktu lari cepat siswa tersebut?',
                                'explanation' => 'Modus adalah waktu dengan frekuensi terbanyak, yaitu 12 detik (12 siswa).',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 detik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '11 detik', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '13 detik', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10 detik', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa persentase siswa yang berhasil mencatat waktu lari di bawah 12 detik (10 dan 11 detik)?',
                                'explanation' => 'Siswa di bawah 12 detik = 4 + 8 = 12 siswa dari 36 siswa = 12/36 = 1/3 = 33,3%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '33,3% (1/3 siswa)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '25%', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '40%', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '50%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran pernyataan analisis lari cepat:',
                                'explanation' => 'Siswa > 12 detik = 7 + 5 = 12 siswa (bukan 15 siswa).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Waktu lari tercepat siswa adalah 10 detik', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Modus data waktu lari adalah 12 detik', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Siswa yang mencatat waktu lebih dari 12 detik berjumlah 15 siswa', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah pernyataan yang BENAR mengenai data waktu lari:',
                                'explanation' => 'Ada 4 siswa mencatat waktu 10 detik (tidak semua di atas 11 detik).',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Total siswa yang mengikuti tes adalah 36 anak', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jumlah siswa dengan catatan waktu 11 detik adalah 8 anak', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Median waktu lari terletak pada 12 detik', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semua siswa mencatat waktu di atas 11 detik', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Faktorisasi prima dari bilangan 84 adalah...',
                                'explanation' => '84 = 4 x 21 = 2² x 3 x 7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2² x 3 x 7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2 x 3² x 7', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2³ x 3 x 7', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2 x 6 x 7', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] KPK dari 24 dan 32 adalah...',
                                'explanation' => '24 = 2³ x 3, 32 = 2^5. KPK = 2^5 x 3 = 32 x 3 = 96.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '96', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '64', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '128', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '72', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4] Sebuah persegi memiliki panjang sisi 14 cm. Luas persegi tersebut adalah...',
                                'explanation' => 'Luas = 14 x 14 = 196 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '196 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '56 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '98 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '144 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Sebuah kereta api melaju menempuh jarak 210 km dalam waktu 3 jam 30 menit. Kecepatan rata-ratanya adalah...',
                                'explanation' => 'Waktu = 3,5 jam. Kecepatan = 210 / 3,5 = 60 km/jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '60 km/jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '70 km/jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '65 km/jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '75 km/jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Debit air 45 liter/menit setara dengan ... liter/jam.',
                                'explanation' => '45 liter x 60 menit = 2.700 liter/jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2.700', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.800', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3.600', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '900', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Sebuah kolam kubus bervolume 27.000 liter. Panjang sisi bagian dalam kolam tersebut adalah...',
                                'explanation' => '27.000 liter = 27 m³. Sisi = akar pangkat tiga dari 27 = 3 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2,7 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '30 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,3 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 5] Jarak pada peta 6 cm mewakili jarak sebenarnya 120 km. Skala peta tersebut adalah...',
                                'explanation' => '120 km = 12.000.000 cm. Skala = 6 / 12.000.000 = 1 : 2.000.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 : 2.000.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 : 200.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 : 1.200.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 720.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Hasil dari 3/4 + 0,8 - 3/5 adalah...',
                                'explanation' => '0,75 + 0,8 - 0,6 = 1,55 - 0,6 = 0,95.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0,95', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '0,85', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1,05', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,75', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Perbandingan banyak kelereng Fajar dan Galih adalah 5 : 8. Jika kelereng Galih 40 butir, berapa butir kelereng Fajar?',
                                'explanation' => 'Kelereng Fajar = 5/8 x 40 = 25 butir.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '25 butir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '30 butir', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '20 butir', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '35 butir', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Keliling lingkaran yang memiliki diameter 35 cm adalah... (pi = 22/7)',
                                'explanation' => 'Keliling = 22/7 x 35 = 110 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '110 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '220 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '55 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '70 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pilihlah bangun ruang yang memiliki bidang sisi lengkung:',
                                'explanation' => 'Prisma segi enam seluruh sisinya datar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tabung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kerucut', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bola', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prisma Segi Enam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah pernyataan yang BENAR mengenai sistem koordinat Kartesius:',
                                'explanation' => 'Translasi T[0, -4] menggeser titik 4 satuan ke bawah (bukan ke kanan).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Titik P(4, -5) terletak di Kuadran IV', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pencerminan terhadap sumbu Y mengubah tanda absis x', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jarak titik (-3, 6) ke sumbu Y adalah 3 satuan', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Translasi T[0, -4] menggeser titik 4 satuan ke kanan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pilihlah pernyataan yang BENAR mengenai pengolahan data:',
                                'explanation' => 'Diagram lingkaran dijumlahkan menghasilkan 360 derajat (atau 100%).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Modus adalah nilai yang memiliki frekuensi paling tinggi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Median adalah nilai tengah setelah data diurutkan', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rata-rata hitung diperoleh dari jumlah nilai dibagi banyak data', 'is_correct' => true, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Diagram lingkaran selalu dijumlahkan menghasilkan 100 derajat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Pasangkan bangun datar dengan luasnya:',
                                'explanation' => 'Pasangan perhitungan luas bangun datar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Persegi panjang p=10, l=6', 'is_correct' => false, 'match_key' => '60 satuan luas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Segitiga a=12, t=8', 'is_correct' => false, 'match_key' => '48 satuan luas', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jajar genjang a=9, t=5', 'is_correct' => false, 'match_key' => '45 satuan luas', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Belah ketupat d1=10, d2=8', 'is_correct' => false, 'match_key' => '40 satuan luas', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Pasangkan titik asal dengan bayangannya setelah translasi T[2, -3]:',
                                'explanation' => 'Pasangan hasil operasi translasi titik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '(1, 4)', 'is_correct' => false, 'match_key' => '(3, 1)', 'order' => 1],
                                    ['label' => null, 'option_text' => '(-2, 5)', 'is_correct' => false, 'match_key' => '(0, 2)', 'order' => 2],
                                    ['label' => null, 'option_text' => '(4, 0)', 'is_correct' => false, 'match_key' => '(6, -3)', 'order' => 3],
                                    ['label' => null, 'option_text' => '(-3, -2)', 'is_correct' => false, 'match_key' => '(-1, -5)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 4 & 5] Pasangkan pecahan desimal dengan bentuk persennya:',
                                'explanation' => 'Pasangan konversi desimal ke persen.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,2', 'is_correct' => false, 'match_key' => '20%', 'order' => 1],
                                    ['label' => null, 'option_text' => '0,45', 'is_correct' => false, 'match_key' => '45%', 'order' => 2],
                                    ['label' => null, 'option_text' => '0,08', 'is_correct' => false, 'match_key' => '8%', 'order' => 3],
                                    ['label' => null, 'option_text' => '1,25', 'is_correct' => false, 'match_key' => '125%', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Lintas Jenjang] Tentukan kebenaran pernyataan matematika:',
                                'explanation' => 'Sudut tumpul besarnya lebih dari 90 derajat (pernyataan 2 salah).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sudut siku-siku besarnya tepat 90 derajat', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sudut tumpul besarnya kurang dari 90 derajat', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Segitiga sama sisi memiliki 3 sudut yang sama besar yaitu 60 derajat', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Materi Kelas 6] Tentukan kebenaran pernyataan probabilitas:',
                                'explanation' => 'Mata dadu hanya 1 sampai 6, mata dadu 7 mustahil (peluang = 0).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Peluang muncul gambar pada pelemparan sebuah koin adalah 1/2', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Peluang selalu bernilai antara 0 sampai 1', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jika sebuah dadu dilempar, peluang muncul mata dadu 7 adalah 1/6', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => '[Materi Kelas 4] Hasil dari 24 x 15 - 120 : 4 adalah...',
                                'explanation' => '360 - 30 = 330.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '330', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] FPB dari bilangan 36 dan 60 adalah...',
                                'explanation' => '36 = 2²x3², 60 = 2²x3x5. FPB = 4 x 3 = 12.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '12', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 4] Sebuah persegi panjang memiliki keliling 50 cm dan panjang 15 cm. Lebar persegi panjang tersebut adalah ... cm.',
                                'explanation' => 'Lebar = (50/2) - 15 = 25 - 15 = 10 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Seorang pelari menempuh jarak 5 km dalam waktu 20 menit. Kecepatan rata-rata pelari tersebut adalah ... km/jam.',
                                'explanation' => 'Waktu = 20/60 jam = 1/3 jam. Kecepatan = 5 / (1/3) = 15 km/jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '15', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Volume air yang dialirkan kran dengan debit 12 liter/menit selama setengah jam adalah ... liter.',
                                'explanation' => 'Setengah jam = 30 menit. Volume = 12 x 30 = 360 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '360', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Jarak sebenarnya dua kota adalah 90 km. Jika digambar pada peta berskala 1 : 1.500.000, maka jarak pada peta adalah ... cm.',
                                'explanation' => '90 km = 9.000.000 cm. Jarak peta = 9.000.000 / 1.500.000 = 6 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 5] Luas permukaan kubus dengan panjang rusuk 10 cm adalah ... cm².',
                                'explanation' => 'L = 6 x 10² = 600 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '600', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Bentuk pecahan paling sederhana dari 0,65 adalah ... (dalam bentuk a/b)',
                                'explanation' => '65/100 = 13/20.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '13/20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Jumlah kelereng Doni dan Eko adalah 64 butir. Jika perbandingan kelereng mereka 3 : 5, maka banyak kelereng Eko adalah ... butir.',
                                'explanation' => 'Kelereng Eko = 5/8 x 64 = 40 butir.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '40', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Luas lingkaran yang berdiameter 14 cm adalah ... cm². (pi = 22/7)',
                                'explanation' => 'r = 7 cm. Luas = 22/7 x 7 x 7 = 154 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '154', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Volume kerucut dengan jari-jari 7 cm dan tinggi 12 cm adalah ... cm³. (pi = 22/7)',
                                'explanation' => 'V = 1/3 x 22/7 x 7 x 7 x 12 = 1/3 x 154 x 12 = 154 x 4 = 616 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '616', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Nilai tengah (median) dari data: 4, 5, 7, 7, 8, 8, 9 adalah...',
                                'explanation' => 'Data sudah urut, data ke-4 adalah 7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Titik A(6, 2) dicerminkan terhadap sumbu X menghasilkan bayangan A\'(6, ...).',
                                'explanation' => 'Ordinat y\' = -2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '-2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Titik B(-1, 8) ditranslasikan oleh T[4, -3]. Absis bayangan B\' adalah...',
                                'explanation' => 'Absis baru = -1 + 4 = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Materi Kelas 6] Peluang munculnya mata dadu kurang dari 3 (yaitu 1 dan 2) pada sebuah dadu bermata 6 adalah ... (dalam pecahan a/b)',
                                'explanation' => '2/6 = 1/3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Materi Kelas 5 & 6 - Skala & Perbandingan Luas]
Sebuah denah gedung aula pertemuan digambar pada kertas arsitektur berskala 1 : 250. Gedung tersebut berbentuk persegi panjang dengan panjang 16 cm dan lebar 10 cm pada denah.
a. Tentukan panjang dan lebar gedung aula yang sebenarnya dalam satuan meter!
b. Berapakah luas lantai gedung aula yang sebenarnya dalam satuan meter persegi (m²)?
c. Jika lantai gedung akan dipasangi keramik berukuran 40 cm x 40 cm, berapa banyak keramik yang dibutuhkan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Ukuran sebenarnya:
   - Panjang = 16 cm x 250 = 4.000 cm = 40 meter.
   - Lebar = 10 cm x 250 = 2.500 cm = 25 meter.
b. Luas lantai gedung sebenarnya = 40 m x 25 m = 1.000 m² = 10.000.000 cm².
c. Luas 1 keping keramik = 40 cm x 40 cm = 1.600 cm².
   Banyak keramik yang dibutuhkan = 10.000.000 / 1.600 = 6.250 buah keramik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Geometri Bangun Ruang Gabungan]
Sebuah monumen kota berbentuk gabungan prisma segi empat (balok) dan limas segi empat di puncaknya. Balok berukuran panjang 4 meter, lebar 4 meter, dan tinggi 10 meter. Limas di atasnya memiliki alas persegi yang sama (4 m x 4 m) dan tinggi limas 3 meter.
a. Hitunglah volume bagian bawah monumen (balok)!
b. Hitunglah volume bagian puncak monumen (limas segi empat)!
c. Berapakah volume total monumen tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Volume balok = p x l x t = 4 x 4 x 10 = 160 m³.
b. Volume limas = 1/3 x luas alas x tinggi limas
   = 1/3 x (4 x 4) x 3 = 1/3 x 16 x 3 = 16 m³.
c. Volume total = Volume balok + Volume limas = 160 + 16 = 176 m³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Statistika & Analisis Data]
Data berat badan (dalam kg) 8 orang anggota tim bola basket sekolah tercatat sebagai berikut:
42, 45, 48, 50, 45, 52, 45, 49.
a. Urutkan data berat badan tersebut dari yang terkecil hingga terbesar!
b. Tentukan nilai modus dan median dari data tersebut!
c. Hitunglah nilai rata-rata (mean) berat badan anggota tim basket tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Data terurut: 42, 45, 45, 45, 48, 49, 50, 52.
b. Modus = 45 kg (muncul sebanyak 3 kali).
   Median = nilai tengah data ke-4 dan ke-5 = (45 + 48) / 2 = 93 / 2 = 46,5 kg.
c. Rata-rata (mean) = (42 + 45 + 45 + 45 + 48 + 49 + 50 + 52) / 8
   = 376 / 8 = 47 kg.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 6 - Transformasi Geometri]
Persegi panjang ABCD memiliki titik-titik sudut A(1, 2), B(7, 2), C(7, 6), dan D(1, 6).
a. Jika persegi panjang ABCD dicerminkan terhadap garis x = 0 (sumbu Y), tentukan koordinat bayangan A\', B\', C\', dan D\'!
b. Jika bangun bayangan A\'B\'C\'D\' kemudian digeser oleh translasi T[5, -2], tentukan koordinat akhir titik A\'\'!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Pencerminan terhadap sumbu Y membalik nilai absis (x -> -x):
   - A(1, 2) -> A\'(-1, 2)
   - B(7, 2) -> B\'(-7, 2)
   - C(7, 6) -> C\'(-7, 6)
   - D(1, 6) -> D\'(-1, 6)
b. Translasi titik A\'(-1, 2) oleh T[5, -2]:
   x\'\' = -1 + 5 = 4
   y\'\' = 2 + (-2) = 0
   Koordinat akhir A\'\' = (4, 0).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Materi Kelas 4 & 5 - FPB & Kecepatan]
Dua orang pelari, Dimas dan Farhan, berlatih di lintasan lari melingkar. Dimas dapat menyelesaikan 1 putaran dalam waktu 60 detik, sedangkan Farhan menyelesaikan 1 putaran dalam waktu 90 detik. Mereka mulai berlari bersamaan dari garis start yang sama.
a. Setelah berapa detik mereka berdua akan bertemu kembali di garis start untuk pertama kalinya?
b. Pada saat mereka bertemu pertama kali tersebut, berapa banyak putaran yang telah diselesaikan oleh masing-masing Dimas dan Farhan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Kunci Jawaban & Rubrik:
a. Waktu bertemu kembali dihitung menggunakan Kelipatan Persekutuan Terkecil (KPK) dari 60 dan 90:
   60 = 2² x 3 x 5 = 60
   90 = 2 x 3² x 5 = 90
   KPK = 2² x 3² x 5 = 4 x 9 x 5 = 180 detik (atau 3 menit).
   Mereka akan bertemu kembali di garis start setelah 180 detik.
b. Banyak putaran saat bertemu:
   - Dimas = 180 detik / 60 detik = 3 putaran.
   - Farhan = 180 detik / 90 detik = 2 putaran.',
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
