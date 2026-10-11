<?php

namespace Database\Seeders\Data;

class MatematikaGrade6ASTSSemester2Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Matematika Kelas 6 (Paket A)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Tengah Semester 2 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket A. Menguji capaian Bab 4 (Bangun Ruang Lanjutan) dan Bab 5 (Peluang & Statistika Dasar). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket A): Pengolahan Sampah Organik dan Komposter Silinder', 'content' => '[Keterangan Gambar: Wadah komposter silinder tabung di instalasi pengolahan pupuk organik sekolah: Diameter komposter 70 cm (jari-jari 35 cm) dan tinggi 100 cm dengan termometer pengukur suhu fermentasi.]
Dalam program Adiwiyata mandiri, siswa kelas 6 mengolah limbah daun kering dan sisa kantin sekolah menjadi kompos padat bernutrisi tinggi menggunakan drum komposter berbentuk tabung silinder.

Drum komposter tersebut memiliki diameter 70 cm (jari-jari r = 35 cm = 3,5 dm) dan tinggi drum t = 100 cm = 10 dm. Siswa menghitung kapasitas tampung drum menggunakan rumus volume tabung: V = pi x r² x t = 22/7 x 3,5 dm x 3,5 dm x 10 dm = 385 dm³ = 385 liter. Sementara itu, untuk mencegah karat, seluruh permukaan luar drum (termasuk alas dan tutup lingkaran) dicat anti-karat seluas: LP = 2 x pi x r x (r + t) = 2 x 22/7 x 35 x (35 + 100) = 220 x 135 = 29.700 cm² (setara 2,97 m²). Jika setiap drum terisi sampah basah rata-rata 300 liter, dalam 3 drum terkumpul 900 liter bahan kompos. Pengukuran volume dan luas permukaan memastikan operasional fasilitas daur ulang berjalan optimal.'],
                            ['title' => 'Stimulus 2 (Paket A): Analisis Nilai Asesmen Sumatif IPA Siswa Kelas 6', 'content' => '[Keterangan Gambar: Tabel distribusi frekuensi nilai ujian IPA 20 siswa kelas 6: Nilai 70 (3 siswa), Nilai 75 (5 siswa), Nilai 80 (6 siswa), Nilai 85 (4 siswa), Nilai 90 (2 siswa).]
Guru IPA menganalisis hasil asesmen sumatif materi tata surya dan sistem organ dari 20 siswa kelas 6. Data nilai yang diperoleh tersusun dalam tabel distribusi frekuensi:

- Nilai 70 diperoleh 3 siswa (total nilai = 210)
- Nilai 75 diperoleh 5 siswa (total nilai = 375)
- Nilai 80 diperoleh 6 siswa (total nilai = 480)
- Nilai 85 diperoleh 4 siswa (total nilai = 340)
- Nilai 90 diperoleh 2 siswa (total nilai = 180)
Total seluruh nilai 20 siswa adalah: 210 + 375 + 480 + 340 + 180 = 1.585. Nilai rata-rata (mean) kelas adalah: 1.585 : 20 = 79,25. Karena banyak siswa n = 20 (genap), nilai median berada di antara data ke-10 dan data ke-11. Data ke-1 s.d 3 adalah 70; data ke-4 s.d 8 adalah 75; data ke-9 s.d 14 adalah 80. Maka data ke-10 dan ke-11 bernilai 80, sehingga Median = (80 + 80) : 2 = 80. Modus data adalah nilai 80 karena diperoleh oleh siswa terbanyak (6 siswa).'],
                            ['title' => 'Stimulus 3 (Paket A): Pengambilan Kupon Doorprize Gebyar Olahraga', 'content' => '[Keterangan Gambar: Kotak kaca transparan pengundian doorprize: Berisi 100 kupon gulung berwarna: 10 kupon Sepeda Lipat (Emas), 25 kupon Smartwatch (Perak), 65 kupon Buku Ensiklopedia (Perunggu).]
Dalam acara jalan sehat gebyar olahraga sekolah, panitia menyiapkan 100 gulungan kupon undian berhadiah di dalam kotak undian. Setiap peserta yang menyelesaikan rute jalan sehat berhak mengambil satu kupon secara acak.

Kupon terdiri atas 3 kategori warna:
1. Kupon Emas (Hadiah Utama: Sepeda Lipat) = 10 kupon -> Peluang = 10 / 100 = 1/10 (10%).
2. Kupon Perak (Hadiah Kedua: Smartwatch) = 25 kupon -> Peluang = 25 / 100 = 1/4 (25%).
3. Kupon Perunggu (Hadiah Hiburan: Buku Ensiklopedia) = 65 kupon -> Peluang = 65 / 100 = 13/20 (65%).
Rian adalah peserta pertama yang mengambil kupon dari kotak undian. Peluang terbesar yang dihadapi Rian adalah mendapatkan kupon Perunggu (65%), sedangkan peluang terkecil adalah mendapatkan kupon Emas (10%). Pemahaman peluang membantu peserta memahami peluang keberuntungan secara rasional dan objektif.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket A, berapa liter kapasitas volume maksimal drum komposter tersebut?',
                                'explanation' => 'V = 22/7 x 3,5 x 3,5 x 10 = 385 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '385 liter (dm³)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '770 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '192,5 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '500 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa sentimeter persegi luas seluruh permukaan luar drum tabung yang dicat anti-karat?',
                                'explanation' => 'LP = 2 x 22/7 x 35 x 135 = 220 x 135 = 29.700 cm².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '29.700 cm² (2,97 m²)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '15.400 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22.000 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30.800 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai drum komposter silinder!',
                                'explanation' => 'r = 35 cm; Volume = 385 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jari-jari drum komposter adalah 35 cm (3,5 dm).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapasitas volume drum komposter adalah 385 liter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tinggi drum komposter adalah 50 cm.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Drum komposter berbentuk bola pejal.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan drum komposter!',
                                'explanation' => 'Luas permukaan drum adalah 29.700 cm² (bukan 50.000 cm²).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume tabung dihitung dengan rumus V = pi x r² x t.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kapasitas satu drum komposter adalah 385 liter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas permukaan drum adalah 50.000 cm².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tiga buah drum dapat menampung 900 liter sampah basah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, nilai rata-rata (mean) hasil asesmen IPA tersebut adalah ....',
                                'explanation' => 'Mean = 1.585 : 20 = 79,25.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '79,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '80', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '78,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '81', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa nilai median dan modus dari hasil asesmen IPA siswa kelas 6?',
                                'explanation' => 'Median = 80 (data ke-10 dan 11) dan Modus = 80 (muncul 6 kali).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Median = 80 dan Modus = 80', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Median = 75 dan Modus = 80', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Median = 80 dan Modus = 85', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Median = 79,25 dan Modus = 75', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nilai asesmen dengan frekuensinya!',
                                'explanation' => 'Distribusi frekuensi nilai IPA.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nilai 70', 'is_correct' => false, 'match_key' => '3 siswa', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 75', 'is_correct' => false, 'match_key' => '5 siswa', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai 80', 'is_correct' => false, 'match_key' => '6 siswa (terbanyak/modus)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai 85', 'is_correct' => false, 'match_key' => '4 siswa', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran analisis nilai IPA!',
                                'explanation' => 'Median kelas adalah 80 (bukan 75).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Modus data adalah nilai 80 karena frekuensinya terbanyak.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai rata-rata kelas adalah 79,25.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Banyak siswa yang memperoleh nilai di atas 80 adalah 6 siswa (4 + 2).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai median kelas adalah 75.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa peluang Rian mendapatkan kupon Perak (hadiah Smartwatch)?',
                                'explanation' => 'Peluang kupon perak = 25/100 = 1/4 = 25%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '25/100 (1/4 atau 25%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10/100 (1/10)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '65/100 (13/20)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1/100', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kategori hadiah manakah yang memiliki peluang terambil PALING KECIL?',
                                'explanation' => 'Kupon Emas memiliki peluang terkecil yaitu 10%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kupon Emas hadiah sepeda lipat (10%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kupon Perak hadiah smartwatch', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kupon Perunggu hadiah buku', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semua hadiah peluangnya sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai peluang kupon doorprize!',
                                'explanation' => 'Perunggu = 65%; total kupon = 100 kupon.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Peluang terambilnya kupon Perunggu adalah 65% (13/20).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Total seluruh kupon undian dalam kotak adalah 100 kupon.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Peluang terambilnya kupon Emas adalah 50%.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kupon Perak berjumlah 50 kupon.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip peluang doorprize!',
                                'explanation' => 'Kupon emas (10%) lebih kecil dari perak (25%).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jumlah seluruh peluang ketiga jenis kupon adalah 100% (1,0).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kupon yang paling banyak di dalam kotak adalah kupon Perunggu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Peluang terambil kupon sepeda lipat adalah 10%.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Peluang mendapatkan kupon emas lebih besar daripada kupon perak.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak rusuk pada bangun ruang prisma segitiga adalah ....',
                                'explanation' => 'Prisma segitiga memiliki 9 rusuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9 rusuk', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak titik sudut pada limas segi empat adalah ....',
                                'explanation' => 'Limas segi empat memiliki 5 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 titik sudut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm (pi = 22/7) adalah ....',
                                'explanation' => 'V = 22/7 x 49 x 10 = 1.540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.540 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3.080 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '770 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 12 cm (pi = 22/7) adalah ....',
                                'explanation' => '1/3 x 154 x 12 = 616 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.848 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '924 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas permukaan bola dengan r = 7 cm (pi = 22/7, LP = 4 x pi x r²) adalah ....',
                                'explanation' => '4 x 154 = 616 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.232 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Mean dari data: 6, 7, 8, 9, 10 adalah ....',
                                'explanation' => '40 : 5 = 8.',
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
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Median dari data: 10, 8, 6, 12, 14 adalah ....',
                                'explanation' => 'Data urut: 6, 8, 10, 12, 14. Median = 10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Modus dari data: 7, 8, 8, 9, 7, 8, 10 adalah ....',
                                'explanation' => '8 muncul 3 kali (terbanyak).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Peluang munculnya mata dadu prima {2, 3, 5} pada pelemparan satu dadu adalah ....',
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
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai peluang suatu kejadian yang mustahil terjadi adalah ....',
                                'explanation' => 'Mustahil = 0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '-1', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bangun ruang yang memiliki TITIK PUNCAK!',
                                'explanation' => 'Kerucut dan limas memiliki titik puncak.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kerucut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Limas segi empat', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus volume bangun ruang yang BENAR!',
                                'explanation' => 'Tabung = pi x r² x t; Bola = 4/3 x pi x r³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Volume Tabung = pi x r² x t', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Volume Bola = 4/3 x pi x r³', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Volume Kerucut = 2 x pi x r² x t', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Volume Limas = Luas Alas x t', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR tentang ukuran pemusatan data!',
                                'explanation' => 'Mean dan modus adalah ukuran pemusatan data.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mean adalah jumlah seluruh data dibagi banyaknya data.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Modus adalah nilai data yang frekuensinya paling besar.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Median selalu bernilai sama dengan modus.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Data genap tidak memiliki nilai rata-rata.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan banyak sisinya!',
                                'explanation' => 'Banyak sisi bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => '3 sisi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => '1 sisi lengkung', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah statistika dengan perhitungannya!',
                                'explanation' => 'Ukuran statistik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mean', 'is_correct' => false, 'match_key' => 'Jumlah data : banyak data', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Median', 'is_correct' => false, 'match_key' => 'Nilai tengah data terurut', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Modus', 'is_correct' => false, 'match_key' => 'Nilai yang paling sering muncul', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Range (Jangkauan)', 'is_correct' => false, 'match_key' => 'Nilai maksimum - nilai minimum', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan peluang kejadian dengan nilainya!',
                                'explanation' => 'Nilai peluang kejadian.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pasti terjadi', 'is_correct' => false, 'match_key' => '1 (100%)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mustahil terjadi', 'is_correct' => false, 'match_key' => '0', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mata dadu genap {2, 4, 6}', 'is_correct' => false, 'match_key' => '1/2 (50%)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mata dadu angka 3', 'is_correct' => false, 'match_key' => '1/6', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran materi matematika Semester 2!',
                                'explanation' => 'Nilai peluang selalu berada di antara 0 dan 1.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume kerucut adalah 1/3 dari volume tabung berukuran sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas permukaan bola adalah 4 x pi x r².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai peluang dapat bernilai lebih dari 1.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Median dari data 4, 6, 8, 10 adalah (6 + 8) / 2 = 7.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran sifat bangun ruang dan data!',
                                'explanation' => 'Kerucut hanya memiliki 1 titik sudut puncak.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tabung memiliki 2 rusuk lengkung.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diagram batang cocok untuk membandingkan kategori data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kerucut memiliki 5 titik sudut.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Peluang muncul angka pada koin adalah 1/2.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Banyak rusuk pada prisma segitiga adalah ....',
                                'explanation' => '9 rusuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '9', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak titik sudut pada limas segi empat adalah ....',
                                'explanation' => '5 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm adalah ... cm³.',
                                'explanation' => '1540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1540', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 21 cm adalah ... cm³.',
                                'explanation' => '1/3 x 154 x 21 = 1078 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1078', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas permukaan kubus dengan rusuk 10 cm adalah ... cm².',
                                'explanation' => '6 x 100 = 600 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '600', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai rata-rata dari data: 10, 20, 30 adalah ....',
                                'explanation' => '20.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Median dari data: 5, 7, 9, 11, 13 adalah ....',
                                'explanation' => '9.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '9', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Modus dari data: 4, 6, 6, 8, 9 adalah ....',
                                'explanation' => '6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang kejadian yang pasti terjadi bernilai ....',
                                'explanation' => '1.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang kejadian yang mustahil terjadi bernilai ....',
                                'explanation' => '0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang muncul mata dadu 6 pada satu dadu adalah ....',
                                'explanation' => '1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak sisi pada bangun ruang bola adalah ....',
                                'explanation' => '1 sisi lengkung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Selimut tabung berbentuk bangun datar ....',
                                'explanation' => 'persegi panjang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'persegi panjang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 meter kubik sama dengan ... liter.',
                                'explanation' => '1.000 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai tengah dari data yang telah diurutkan disebut ....',
                                'explanation' => 'median.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'median', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah bak penampungan air berbentuk tabung dengan diameter 140 cm (jari-jari 70 cm = 7 dm) dan tinggi 200 cm (20 dm). Hitunglah:
(a) Volume kapasitas air maksimal bak tersebut dalam satuan liter (Gunakan pi = 22/7)
(b) Jika bak tersebut telah terisi air 3/4 bagian, berapa liter air yang sudah ada di dalam bak?
(c) Berapa liter air yang masih dibutuhkan agar bak tersebut terisi penuh?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) r = 7 dm, t = 20 dm. Volume = 22/7 x 7 x 7 x 20 = 154 x 20 = 3.080 dm³ = 3.080 liter.
(b) Air yang sudah ada = 3/4 x 3.080 liter = 2.310 liter.
(c) Air yang dibutuhkan = 3.080 - 2.310 = 770 liter (atau 1/4 x 3.080 = 770 liter).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tabel berikut menyajikan data nilai ulangan matematika 10 siswa:
Nilai: 70, 75, 80, 85, 90, 80, 85, 80, 75, 80
Tentukan:
(a) Nilai rata-rata (mean)
(b) Nilai tengah (median)
(c) Modus nilai siswa',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jumlah nilai = 70 + 75 + 80 + 85 + 90 + 80 + 85 + 80 + 75 + 80 = 800.
    Mean = 800 : 10 = 80.
(b) Median:
    Data urut: 70, 75, 75, 80, 80, 80, 80, 85, 85, 90.
    Data ke-5 = 80, Data ke-6 = 80.
    Median = (80 + 80) : 2 = 80.
(c) Modus: Nilai 80 (muncul 4 kali, terbanyak).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kantong berisi 40 kelereng dengan rincian: 16 kelereng merah, 14 kelereng biru, dan 10 kelereng hijau. Satu kelereng diambil secara acak. Hitunglah:
(a) Peluang terambil kelereng merah
(b) Peluang terambil kelereng biru
(c) Peluang terambil kelereng hijau
(d) Jika kelereng merah diambil dan tidak dikembalikan, berapa peluang terambil kelereng merah pada pengambilan kedua?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total awal n(S) = 40.
(a) Peluang merah = 16 / 40 = 2/5 (40%).
(b) Peluang biru = 14 / 40 = 7/20 (35%).
(c) Peluang hijau = 10 / 40 = 1/4 (25%).
(d) Pada pengambilan kedua tanpa pengembalian: sisa kelereng merah = 15, sisa total n(S) = 39.
    Peluang merah kedua = 15 / 39 = 5/13.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kubah masjid berbentuk setengah bola dengan diameter 14 meter (jari-jari 7 meter). Seluruh permukaan luar kubah dicat dengan biaya Rp50.000 per meter persegi. Tentukan:
(a) Luas permukaan luar kubah yang dicat (pi = 22/7)
(b) Total biaya pengecatan seluruh kubah',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Luas setengah bola = 2 x pi x r² = 2 x 22/7 x 7 x 7 = 308 m².
(b) Total biaya pengecatan = Luas x Biaya per m² = 308 m² x Rp50.000 = Rp15.400.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Dua buah dadu bermata enam dilemparkan secara bersamaan sebanyak satu kali. Tentukan:
(a) Banyak seluruh ruang sampel n(S)
(b) Peluang munculnya pasangan mata dadu berjumlah 7 (yaitu [1,6], [2,5], [3,4], [4,3], [5,2], [6,1])
(c) Peluang munculnya pasangan mata dadu kembar ([1,1], [2,2], [3,3], [4,4], [5,5], [6,6])',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Banyak ruang sampel n(S) = 6 x 6 = 36 titik sampel.
(b) Titik sampel berjumlah 7 ada 6 pasang: {(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)}.
    Peluang = 6 / 36 = 1/6.
(c) Titik sampel mata dadu kembar ada 6 pasang: {(1,1), (2,2), (3,3), (4,4), (5,5), (6,6)}.
    Peluang = 6 / 36 = 1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Matematika Kelas 6 (Paket B)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Tengah Semester 2 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket B. Menguji capaian Bab 4 (Bangun Ruang Lanjutan) dan Bab 5 (Peluang & Statistika Dasar). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket B): Pengolahan Sampah Organik dan Komposter Silinder', 'content' => '[Keterangan Gambar: Wadah komposter silinder tabung di instalasi pengolahan pupuk organik sekolah: Diameter komposter 70 cm (jari-jari 35 cm) dan tinggi 100 cm dengan termometer pengukur suhu fermentasi.]
Dalam program Adiwiyata mandiri, siswa kelas 6 mengolah limbah daun kering dan sisa kantin sekolah menjadi kompos padat bernutrisi tinggi menggunakan drum komposter berbentuk tabung silinder.

Drum komposter tersebut memiliki diameter 70 cm (jari-jari r = 35 cm = 3,5 dm) dan tinggi drum t = 100 cm = 10 dm. Siswa menghitung kapasitas tampung drum menggunakan rumus volume tabung: V = pi x r² x t = 22/7 x 3,5 dm x 3,5 dm x 10 dm = 385 dm³ = 385 liter. Sementara itu, untuk mencegah karat, seluruh permukaan luar drum (termasuk alas dan tutup lingkaran) dicat anti-karat seluas: LP = 2 x pi x r x (r + t) = 2 x 22/7 x 35 x (35 + 100) = 220 x 135 = 29.700 cm² (setara 2,97 m²). Jika setiap drum terisi sampah basah rata-rata 300 liter, dalam 3 drum terkumpul 900 liter bahan kompos. Pengukuran volume dan luas permukaan memastikan operasional fasilitas daur ulang berjalan optimal.'],
                            ['title' => 'Stimulus 2 (Paket B): Analisis Nilai Asesmen Sumatif IPA Siswa Kelas 6', 'content' => '[Keterangan Gambar: Tabel distribusi frekuensi nilai ujian IPA 20 siswa kelas 6: Nilai 70 (3 siswa), Nilai 75 (5 siswa), Nilai 80 (6 siswa), Nilai 85 (4 siswa), Nilai 90 (2 siswa).]
Guru IPA menganalisis hasil asesmen sumatif materi tata surya dan sistem organ dari 20 siswa kelas 6. Data nilai yang diperoleh tersusun dalam tabel distribusi frekuensi:

- Nilai 70 diperoleh 3 siswa (total nilai = 210)
- Nilai 75 diperoleh 5 siswa (total nilai = 375)
- Nilai 80 diperoleh 6 siswa (total nilai = 480)
- Nilai 85 diperoleh 4 siswa (total nilai = 340)
- Nilai 90 diperoleh 2 siswa (total nilai = 180)
Total seluruh nilai 20 siswa adalah: 210 + 375 + 480 + 340 + 180 = 1.585. Nilai rata-rata (mean) kelas adalah: 1.585 : 20 = 79,25. Karena banyak siswa n = 20 (genap), nilai median berada di antara data ke-10 dan data ke-11. Data ke-1 s.d 3 adalah 70; data ke-4 s.d 8 adalah 75; data ke-9 s.d 14 adalah 80. Maka data ke-10 dan ke-11 bernilai 80, sehingga Median = (80 + 80) : 2 = 80. Modus data adalah nilai 80 karena diperoleh oleh siswa terbanyak (6 siswa).'],
                            ['title' => 'Stimulus 3 (Paket B): Pengambilan Kupon Doorprize Gebyar Olahraga', 'content' => '[Keterangan Gambar: Kotak kaca transparan pengundian doorprize: Berisi 100 kupon gulung berwarna: 10 kupon Sepeda Lipat (Emas), 25 kupon Smartwatch (Perak), 65 kupon Buku Ensiklopedia (Perunggu).]
Dalam acara jalan sehat gebyar olahraga sekolah, panitia menyiapkan 100 gulungan kupon undian berhadiah di dalam kotak undian. Setiap peserta yang menyelesaikan rute jalan sehat berhak mengambil satu kupon secara acak.

Kupon terdiri atas 3 kategori warna:
1. Kupon Emas (Hadiah Utama: Sepeda Lipat) = 10 kupon -> Peluang = 10 / 100 = 1/10 (10%).
2. Kupon Perak (Hadiah Kedua: Smartwatch) = 25 kupon -> Peluang = 25 / 100 = 1/4 (25%).
3. Kupon Perunggu (Hadiah Hiburan: Buku Ensiklopedia) = 65 kupon -> Peluang = 65 / 100 = 13/20 (65%).
Rian adalah peserta pertama yang mengambil kupon dari kotak undian. Peluang terbesar yang dihadapi Rian adalah mendapatkan kupon Perunggu (65%), sedangkan peluang terkecil adalah mendapatkan kupon Emas (10%). Pemahaman peluang membantu peserta memahami peluang keberuntungan secara rasional dan objektif.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket B, berapa liter kapasitas volume maksimal drum komposter tersebut?',
                                'explanation' => 'V = 22/7 x 3,5 x 3,5 x 10 = 385 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '385 liter (dm³)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '770 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '192,5 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '500 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa sentimeter persegi luas seluruh permukaan luar drum tabung yang dicat anti-karat?',
                                'explanation' => 'LP = 2 x 22/7 x 35 x 135 = 220 x 135 = 29.700 cm².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '29.700 cm² (2,97 m²)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '15.400 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22.000 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30.800 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai drum komposter silinder!',
                                'explanation' => 'r = 35 cm; Volume = 385 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jari-jari drum komposter adalah 35 cm (3,5 dm).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapasitas volume drum komposter adalah 385 liter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tinggi drum komposter adalah 50 cm.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Drum komposter berbentuk bola pejal.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan drum komposter!',
                                'explanation' => 'Luas permukaan drum adalah 29.700 cm² (bukan 50.000 cm²).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume tabung dihitung dengan rumus V = pi x r² x t.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kapasitas satu drum komposter adalah 385 liter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas permukaan drum adalah 50.000 cm².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tiga buah drum dapat menampung 900 liter sampah basah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, nilai rata-rata (mean) hasil asesmen IPA tersebut adalah ....',
                                'explanation' => 'Mean = 1.585 : 20 = 79,25.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '79,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '80', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '78,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '81', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa nilai median dan modus dari hasil asesmen IPA siswa kelas 6?',
                                'explanation' => 'Median = 80 (data ke-10 dan 11) dan Modus = 80 (muncul 6 kali).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Median = 80 dan Modus = 80', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Median = 75 dan Modus = 80', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Median = 80 dan Modus = 85', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Median = 79,25 dan Modus = 75', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nilai asesmen dengan frekuensinya!',
                                'explanation' => 'Distribusi frekuensi nilai IPA.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nilai 70', 'is_correct' => false, 'match_key' => '3 siswa', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 75', 'is_correct' => false, 'match_key' => '5 siswa', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai 80', 'is_correct' => false, 'match_key' => '6 siswa (terbanyak/modus)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai 85', 'is_correct' => false, 'match_key' => '4 siswa', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran analisis nilai IPA!',
                                'explanation' => 'Median kelas adalah 80 (bukan 75).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Modus data adalah nilai 80 karena frekuensinya terbanyak.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai rata-rata kelas adalah 79,25.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Banyak siswa yang memperoleh nilai di atas 80 adalah 6 siswa (4 + 2).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai median kelas adalah 75.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa peluang Rian mendapatkan kupon Perak (hadiah Smartwatch)?',
                                'explanation' => 'Peluang kupon perak = 25/100 = 1/4 = 25%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '25/100 (1/4 atau 25%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10/100 (1/10)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '65/100 (13/20)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1/100', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kategori hadiah manakah yang memiliki peluang terambil PALING KECIL?',
                                'explanation' => 'Kupon Emas memiliki peluang terkecil yaitu 10%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kupon Emas hadiah sepeda lipat (10%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kupon Perak hadiah smartwatch', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kupon Perunggu hadiah buku', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semua hadiah peluangnya sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai peluang kupon doorprize!',
                                'explanation' => 'Perunggu = 65%; total kupon = 100 kupon.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Peluang terambilnya kupon Perunggu adalah 65% (13/20).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Total seluruh kupon undian dalam kotak adalah 100 kupon.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Peluang terambilnya kupon Emas adalah 50%.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kupon Perak berjumlah 50 kupon.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip peluang doorprize!',
                                'explanation' => 'Kupon emas (10%) lebih kecil dari perak (25%).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jumlah seluruh peluang ketiga jenis kupon adalah 100% (1,0).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kupon yang paling banyak di dalam kotak adalah kupon Perunggu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Peluang terambil kupon sepeda lipat adalah 10%.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Peluang mendapatkan kupon emas lebih besar daripada kupon perak.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak rusuk pada bangun ruang prisma segitiga adalah ....',
                                'explanation' => 'Prisma segitiga memiliki 9 rusuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9 rusuk', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak titik sudut pada limas segi empat adalah ....',
                                'explanation' => 'Limas segi empat memiliki 5 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 titik sudut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm (pi = 22/7) adalah ....',
                                'explanation' => 'V = 22/7 x 49 x 10 = 1.540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.540 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3.080 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '770 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 12 cm (pi = 22/7) adalah ....',
                                'explanation' => '1/3 x 154 x 12 = 616 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.848 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '924 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas permukaan bola dengan r = 7 cm (pi = 22/7, LP = 4 x pi x r²) adalah ....',
                                'explanation' => '4 x 154 = 616 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.232 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Mean dari data: 6, 7, 8, 9, 10 adalah ....',
                                'explanation' => '40 : 5 = 8.',
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
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Median dari data: 10, 8, 6, 12, 14 adalah ....',
                                'explanation' => 'Data urut: 6, 8, 10, 12, 14. Median = 10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Modus dari data: 7, 8, 8, 9, 7, 8, 10 adalah ....',
                                'explanation' => '8 muncul 3 kali (terbanyak).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Peluang munculnya mata dadu prima {2, 3, 5} pada pelemparan satu dadu adalah ....',
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
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai peluang suatu kejadian yang mustahil terjadi adalah ....',
                                'explanation' => 'Mustahil = 0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '-1', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bangun ruang yang memiliki TITIK PUNCAK!',
                                'explanation' => 'Kerucut dan limas memiliki titik puncak.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kerucut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Limas segi empat', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus volume bangun ruang yang BENAR!',
                                'explanation' => 'Tabung = pi x r² x t; Bola = 4/3 x pi x r³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Volume Tabung = pi x r² x t', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Volume Bola = 4/3 x pi x r³', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Volume Kerucut = 2 x pi x r² x t', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Volume Limas = Luas Alas x t', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR tentang ukuran pemusatan data!',
                                'explanation' => 'Mean dan modus adalah ukuran pemusatan data.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mean adalah jumlah seluruh data dibagi banyaknya data.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Modus adalah nilai data yang frekuensinya paling besar.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Median selalu bernilai sama dengan modus.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Data genap tidak memiliki nilai rata-rata.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan banyak sisinya!',
                                'explanation' => 'Banyak sisi bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => '3 sisi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => '1 sisi lengkung', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah statistika dengan perhitungannya!',
                                'explanation' => 'Ukuran statistik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mean', 'is_correct' => false, 'match_key' => 'Jumlah data : banyak data', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Median', 'is_correct' => false, 'match_key' => 'Nilai tengah data terurut', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Modus', 'is_correct' => false, 'match_key' => 'Nilai yang paling sering muncul', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Range (Jangkauan)', 'is_correct' => false, 'match_key' => 'Nilai maksimum - nilai minimum', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan peluang kejadian dengan nilainya!',
                                'explanation' => 'Nilai peluang kejadian.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pasti terjadi', 'is_correct' => false, 'match_key' => '1 (100%)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mustahil terjadi', 'is_correct' => false, 'match_key' => '0', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mata dadu genap {2, 4, 6}', 'is_correct' => false, 'match_key' => '1/2 (50%)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mata dadu angka 3', 'is_correct' => false, 'match_key' => '1/6', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran materi matematika Semester 2!',
                                'explanation' => 'Nilai peluang selalu berada di antara 0 dan 1.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume kerucut adalah 1/3 dari volume tabung berukuran sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas permukaan bola adalah 4 x pi x r².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai peluang dapat bernilai lebih dari 1.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Median dari data 4, 6, 8, 10 adalah (6 + 8) / 2 = 7.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran sifat bangun ruang dan data!',
                                'explanation' => 'Kerucut hanya memiliki 1 titik sudut puncak.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tabung memiliki 2 rusuk lengkung.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diagram batang cocok untuk membandingkan kategori data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kerucut memiliki 5 titik sudut.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Peluang muncul angka pada koin adalah 1/2.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Banyak rusuk pada prisma segitiga adalah ....',
                                'explanation' => '9 rusuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '9', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak titik sudut pada limas segi empat adalah ....',
                                'explanation' => '5 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm adalah ... cm³.',
                                'explanation' => '1540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1540', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 21 cm adalah ... cm³.',
                                'explanation' => '1/3 x 154 x 21 = 1078 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1078', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas permukaan kubus dengan rusuk 10 cm adalah ... cm².',
                                'explanation' => '6 x 100 = 600 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '600', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai rata-rata dari data: 10, 20, 30 adalah ....',
                                'explanation' => '20.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Median dari data: 5, 7, 9, 11, 13 adalah ....',
                                'explanation' => '9.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '9', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Modus dari data: 4, 6, 6, 8, 9 adalah ....',
                                'explanation' => '6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang kejadian yang pasti terjadi bernilai ....',
                                'explanation' => '1.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang kejadian yang mustahil terjadi bernilai ....',
                                'explanation' => '0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang muncul mata dadu 6 pada satu dadu adalah ....',
                                'explanation' => '1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak sisi pada bangun ruang bola adalah ....',
                                'explanation' => '1 sisi lengkung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Selimut tabung berbentuk bangun datar ....',
                                'explanation' => 'persegi panjang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'persegi panjang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 meter kubik sama dengan ... liter.',
                                'explanation' => '1.000 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai tengah dari data yang telah diurutkan disebut ....',
                                'explanation' => 'median.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'median', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah bak penampungan air berbentuk tabung dengan diameter 140 cm (jari-jari 70 cm = 7 dm) dan tinggi 200 cm (20 dm). Hitunglah:
(a) Volume kapasitas air maksimal bak tersebut dalam satuan liter (Gunakan pi = 22/7)
(b) Jika bak tersebut telah terisi air 3/4 bagian, berapa liter air yang sudah ada di dalam bak?
(c) Berapa liter air yang masih dibutuhkan agar bak tersebut terisi penuh?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) r = 7 dm, t = 20 dm. Volume = 22/7 x 7 x 7 x 20 = 154 x 20 = 3.080 dm³ = 3.080 liter.
(b) Air yang sudah ada = 3/4 x 3.080 liter = 2.310 liter.
(c) Air yang dibutuhkan = 3.080 - 2.310 = 770 liter (atau 1/4 x 3.080 = 770 liter).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tabel berikut menyajikan data nilai ulangan matematika 10 siswa:
Nilai: 70, 75, 80, 85, 90, 80, 85, 80, 75, 80
Tentukan:
(a) Nilai rata-rata (mean)
(b) Nilai tengah (median)
(c) Modus nilai siswa',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jumlah nilai = 70 + 75 + 80 + 85 + 90 + 80 + 85 + 80 + 75 + 80 = 800.
    Mean = 800 : 10 = 80.
(b) Median:
    Data urut: 70, 75, 75, 80, 80, 80, 80, 85, 85, 90.
    Data ke-5 = 80, Data ke-6 = 80.
    Median = (80 + 80) : 2 = 80.
(c) Modus: Nilai 80 (muncul 4 kali, terbanyak).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kantong berisi 40 kelereng dengan rincian: 16 kelereng merah, 14 kelereng biru, dan 10 kelereng hijau. Satu kelereng diambil secara acak. Hitunglah:
(a) Peluang terambil kelereng merah
(b) Peluang terambil kelereng biru
(c) Peluang terambil kelereng hijau
(d) Jika kelereng merah diambil dan tidak dikembalikan, berapa peluang terambil kelereng merah pada pengambilan kedua?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total awal n(S) = 40.
(a) Peluang merah = 16 / 40 = 2/5 (40%).
(b) Peluang biru = 14 / 40 = 7/20 (35%).
(c) Peluang hijau = 10 / 40 = 1/4 (25%).
(d) Pada pengambilan kedua tanpa pengembalian: sisa kelereng merah = 15, sisa total n(S) = 39.
    Peluang merah kedua = 15 / 39 = 5/13.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kubah masjid berbentuk setengah bola dengan diameter 14 meter (jari-jari 7 meter). Seluruh permukaan luar kubah dicat dengan biaya Rp50.000 per meter persegi. Tentukan:
(a) Luas permukaan luar kubah yang dicat (pi = 22/7)
(b) Total biaya pengecatan seluruh kubah',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Luas setengah bola = 2 x pi x r² = 2 x 22/7 x 7 x 7 = 308 m².
(b) Total biaya pengecatan = Luas x Biaya per m² = 308 m² x Rp50.000 = Rp15.400.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Dua buah dadu bermata enam dilemparkan secara bersamaan sebanyak satu kali. Tentukan:
(a) Banyak seluruh ruang sampel n(S)
(b) Peluang munculnya pasangan mata dadu berjumlah 7 (yaitu [1,6], [2,5], [3,4], [4,3], [5,2], [6,1])
(c) Peluang munculnya pasangan mata dadu kembar ([1,1], [2,2], [3,3], [4,4], [5,5], [6,6])',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Banyak ruang sampel n(S) = 6 x 6 = 36 titik sampel.
(b) Titik sampel berjumlah 7 ada 6 pasang: {(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)}.
    Peluang = 6 / 36 = 1/6.
(c) Titik sampel mata dadu kembar ada 6 pasang: {(1,1), (2,2), (3,3), (4,4), (5,5), (6,6)}.
    Peluang = 6 / 36 = 1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Matematika Kelas 6 (Paket C)',
                'type' => 'exam',
                'description' => 'Asesmen Sumatif Tengah Semester 2 mata pelajaran Matematika Kelas 6 Fase C Kurikulum Merdeka Paket C. Menguji capaian Bab 4 (Bangun Ruang Lanjutan) dan Bab 5 (Peluang & Statistika Dasar). Berbobot 40:30:30 skala 100.',
                'duration_minutes' => 90,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1 (Paket C): Pengolahan Sampah Organik dan Komposter Silinder', 'content' => '[Keterangan Gambar: Wadah komposter silinder tabung di instalasi pengolahan pupuk organik sekolah: Diameter komposter 70 cm (jari-jari 35 cm) dan tinggi 100 cm dengan termometer pengukur suhu fermentasi.]
Dalam program Adiwiyata mandiri, siswa kelas 6 mengolah limbah daun kering dan sisa kantin sekolah menjadi kompos padat bernutrisi tinggi menggunakan drum komposter berbentuk tabung silinder.

Drum komposter tersebut memiliki diameter 70 cm (jari-jari r = 35 cm = 3,5 dm) dan tinggi drum t = 100 cm = 10 dm. Siswa menghitung kapasitas tampung drum menggunakan rumus volume tabung: V = pi x r² x t = 22/7 x 3,5 dm x 3,5 dm x 10 dm = 385 dm³ = 385 liter. Sementara itu, untuk mencegah karat, seluruh permukaan luar drum (termasuk alas dan tutup lingkaran) dicat anti-karat seluas: LP = 2 x pi x r x (r + t) = 2 x 22/7 x 35 x (35 + 100) = 220 x 135 = 29.700 cm² (setara 2,97 m²). Jika setiap drum terisi sampah basah rata-rata 300 liter, dalam 3 drum terkumpul 900 liter bahan kompos. Pengukuran volume dan luas permukaan memastikan operasional fasilitas daur ulang berjalan optimal.'],
                            ['title' => 'Stimulus 2 (Paket C): Analisis Nilai Asesmen Sumatif IPA Siswa Kelas 6', 'content' => '[Keterangan Gambar: Tabel distribusi frekuensi nilai ujian IPA 20 siswa kelas 6: Nilai 70 (3 siswa), Nilai 75 (5 siswa), Nilai 80 (6 siswa), Nilai 85 (4 siswa), Nilai 90 (2 siswa).]
Guru IPA menganalisis hasil asesmen sumatif materi tata surya dan sistem organ dari 20 siswa kelas 6. Data nilai yang diperoleh tersusun dalam tabel distribusi frekuensi:

- Nilai 70 diperoleh 3 siswa (total nilai = 210)
- Nilai 75 diperoleh 5 siswa (total nilai = 375)
- Nilai 80 diperoleh 6 siswa (total nilai = 480)
- Nilai 85 diperoleh 4 siswa (total nilai = 340)
- Nilai 90 diperoleh 2 siswa (total nilai = 180)
Total seluruh nilai 20 siswa adalah: 210 + 375 + 480 + 340 + 180 = 1.585. Nilai rata-rata (mean) kelas adalah: 1.585 : 20 = 79,25. Karena banyak siswa n = 20 (genap), nilai median berada di antara data ke-10 dan data ke-11. Data ke-1 s.d 3 adalah 70; data ke-4 s.d 8 adalah 75; data ke-9 s.d 14 adalah 80. Maka data ke-10 dan ke-11 bernilai 80, sehingga Median = (80 + 80) : 2 = 80. Modus data adalah nilai 80 karena diperoleh oleh siswa terbanyak (6 siswa).'],
                            ['title' => 'Stimulus 3 (Paket C): Pengambilan Kupon Doorprize Gebyar Olahraga', 'content' => '[Keterangan Gambar: Kotak kaca transparan pengundian doorprize: Berisi 100 kupon gulung berwarna: 10 kupon Sepeda Lipat (Emas), 25 kupon Smartwatch (Perak), 65 kupon Buku Ensiklopedia (Perunggu).]
Dalam acara jalan sehat gebyar olahraga sekolah, panitia menyiapkan 100 gulungan kupon undian berhadiah di dalam kotak undian. Setiap peserta yang menyelesaikan rute jalan sehat berhak mengambil satu kupon secara acak.

Kupon terdiri atas 3 kategori warna:
1. Kupon Emas (Hadiah Utama: Sepeda Lipat) = 10 kupon -> Peluang = 10 / 100 = 1/10 (10%).
2. Kupon Perak (Hadiah Kedua: Smartwatch) = 25 kupon -> Peluang = 25 / 100 = 1/4 (25%).
3. Kupon Perunggu (Hadiah Hiburan: Buku Ensiklopedia) = 65 kupon -> Peluang = 65 / 100 = 13/20 (65%).
Rian adalah peserta pertama yang mengambil kupon dari kotak undian. Peluang terbesar yang dihadapi Rian adalah mendapatkan kupon Perunggu (65%), sedangkan peluang terkecil adalah mendapatkan kupon Emas (10%). Pemahaman peluang membantu peserta memahami peluang keberuntungan secara rasional dan objektif.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1 Paket C, berapa liter kapasitas volume maksimal drum komposter tersebut?',
                                'explanation' => 'V = 22/7 x 3,5 x 3,5 x 10 = 385 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '385 liter (dm³)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '770 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '192,5 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '500 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa sentimeter persegi luas seluruh permukaan luar drum tabung yang dicat anti-karat?',
                                'explanation' => 'LP = 2 x 22/7 x 35 x 135 = 220 x 135 = 29.700 cm².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '29.700 cm² (2,97 m²)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '15.400 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22.000 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30.800 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai drum komposter silinder!',
                                'explanation' => 'r = 35 cm; Volume = 385 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jari-jari drum komposter adalah 35 cm (3,5 dm).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapasitas volume drum komposter adalah 385 liter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tinggi drum komposter adalah 50 cm.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Drum komposter berbentuk bola pejal.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan drum komposter!',
                                'explanation' => 'Luas permukaan drum adalah 29.700 cm² (bukan 50.000 cm²).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume tabung dihitung dengan rumus V = pi x r² x t.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kapasitas satu drum komposter adalah 385 liter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas permukaan drum adalah 50.000 cm².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tiga buah drum dapat menampung 900 liter sampah basah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, nilai rata-rata (mean) hasil asesmen IPA tersebut adalah ....',
                                'explanation' => 'Mean = 1.585 : 20 = 79,25.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '79,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '80', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '78,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '81', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa nilai median dan modus dari hasil asesmen IPA siswa kelas 6?',
                                'explanation' => 'Median = 80 (data ke-10 dan 11) dan Modus = 80 (muncul 6 kali).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Median = 80 dan Modus = 80', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Median = 75 dan Modus = 80', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Median = 80 dan Modus = 85', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Median = 79,25 dan Modus = 75', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nilai asesmen dengan frekuensinya!',
                                'explanation' => 'Distribusi frekuensi nilai IPA.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nilai 70', 'is_correct' => false, 'match_key' => '3 siswa', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 75', 'is_correct' => false, 'match_key' => '5 siswa', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai 80', 'is_correct' => false, 'match_key' => '6 siswa (terbanyak/modus)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai 85', 'is_correct' => false, 'match_key' => '4 siswa', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran analisis nilai IPA!',
                                'explanation' => 'Median kelas adalah 80 (bukan 75).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Modus data adalah nilai 80 karena frekuensinya terbanyak.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai rata-rata kelas adalah 79,25.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Banyak siswa yang memperoleh nilai di atas 80 adalah 6 siswa (4 + 2).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Nilai median kelas adalah 75.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 3, berapa peluang Rian mendapatkan kupon Perak (hadiah Smartwatch)?',
                                'explanation' => 'Peluang kupon perak = 25/100 = 1/4 = 25%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '25/100 (1/4 atau 25%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10/100 (1/10)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '65/100 (13/20)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1/100', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kategori hadiah manakah yang memiliki peluang terambil PALING KECIL?',
                                'explanation' => 'Kupon Emas memiliki peluang terkecil yaitu 10%.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kupon Emas hadiah sepeda lipat (10%)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kupon Perak hadiah smartwatch', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kupon Perunggu hadiah buku', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semua hadiah peluangnya sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai peluang kupon doorprize!',
                                'explanation' => 'Perunggu = 65%; total kupon = 100 kupon.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Peluang terambilnya kupon Perunggu adalah 65% (13/20).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Total seluruh kupon undian dalam kotak adalah 100 kupon.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Peluang terambilnya kupon Emas adalah 50%.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kupon Perak berjumlah 50 kupon.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip peluang doorprize!',
                                'explanation' => 'Kupon emas (10%) lebih kecil dari perak (25%).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jumlah seluruh peluang ketiga jenis kupon adalah 100% (1,0).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kupon yang paling banyak di dalam kotak adalah kupon Perunggu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Peluang terambil kupon sepeda lipat adalah 10%.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Peluang mendapatkan kupon emas lebih besar daripada kupon perak.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak rusuk pada bangun ruang prisma segitiga adalah ....',
                                'explanation' => 'Prisma segitiga memiliki 9 rusuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9 rusuk', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak titik sudut pada limas segi empat adalah ....',
                                'explanation' => 'Limas segi empat memiliki 5 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 titik sudut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm (pi = 22/7) adalah ....',
                                'explanation' => 'V = 22/7 x 49 x 10 = 1.540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.540 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3.080 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '770 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 12 cm (pi = 22/7) adalah ....',
                                'explanation' => '1/3 x 154 x 12 = 616 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.848 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '924 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas permukaan bola dengan r = 7 cm (pi = 22/7, LP = 4 x pi x r²) adalah ....',
                                'explanation' => '4 x 154 = 616 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.232 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Mean dari data: 6, 7, 8, 9, 10 adalah ....',
                                'explanation' => '40 : 5 = 8.',
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
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Median dari data: 10, 8, 6, 12, 14 adalah ....',
                                'explanation' => 'Data urut: 6, 8, 10, 12, 14. Median = 10.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Modus dari data: 7, 8, 8, 9, 7, 8, 10 adalah ....',
                                'explanation' => '8 muncul 3 kali (terbanyak).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Peluang munculnya mata dadu prima {2, 3, 5} pada pelemparan satu dadu adalah ....',
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
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai peluang suatu kejadian yang mustahil terjadi adalah ....',
                                'explanation' => 'Mustahil = 0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '-1', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bangun ruang yang memiliki TITIK PUNCAK!',
                                'explanation' => 'Kerucut dan limas memiliki titik puncak.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kerucut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Limas segi empat', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus volume bangun ruang yang BENAR!',
                                'explanation' => 'Tabung = pi x r² x t; Bola = 4/3 x pi x r³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Volume Tabung = pi x r² x t', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Volume Bola = 4/3 x pi x r³', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Volume Kerucut = 2 x pi x r² x t', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Volume Limas = Luas Alas x t', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR tentang ukuran pemusatan data!',
                                'explanation' => 'Mean dan modus adalah ukuran pemusatan data.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mean adalah jumlah seluruh data dibagi banyaknya data.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Modus adalah nilai data yang frekuensinya paling besar.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Median selalu bernilai sama dengan modus.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Data genap tidak memiliki nilai rata-rata.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan banyak sisinya!',
                                'explanation' => 'Banyak sisi bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => '3 sisi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => '1 sisi lengkung', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah statistika dengan perhitungannya!',
                                'explanation' => 'Ukuran statistik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mean', 'is_correct' => false, 'match_key' => 'Jumlah data : banyak data', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Median', 'is_correct' => false, 'match_key' => 'Nilai tengah data terurut', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Modus', 'is_correct' => false, 'match_key' => 'Nilai yang paling sering muncul', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Range (Jangkauan)', 'is_correct' => false, 'match_key' => 'Nilai maksimum - nilai minimum', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan peluang kejadian dengan nilainya!',
                                'explanation' => 'Nilai peluang kejadian.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pasti terjadi', 'is_correct' => false, 'match_key' => '1 (100%)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mustahil terjadi', 'is_correct' => false, 'match_key' => '0', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mata dadu genap {2, 4, 6}', 'is_correct' => false, 'match_key' => '1/2 (50%)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mata dadu angka 3', 'is_correct' => false, 'match_key' => '1/6', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran materi matematika Semester 2!',
                                'explanation' => 'Nilai peluang selalu berada di antara 0 dan 1.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume kerucut adalah 1/3 dari volume tabung berukuran sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas permukaan bola adalah 4 x pi x r².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai peluang dapat bernilai lebih dari 1.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Median dari data 4, 6, 8, 10 adalah (6 + 8) / 2 = 7.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran sifat bangun ruang dan data!',
                                'explanation' => 'Kerucut hanya memiliki 1 titik sudut puncak.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tabung memiliki 2 rusuk lengkung.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Diagram batang cocok untuk membandingkan kategori data.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kerucut memiliki 5 titik sudut.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Peluang muncul angka pada koin adalah 1/2.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Banyak rusuk pada prisma segitiga adalah ....',
                                'explanation' => '9 rusuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '9', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak titik sudut pada limas segi empat adalah ....',
                                'explanation' => '5 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm adalah ... cm³.',
                                'explanation' => '1540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1540', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 21 cm adalah ... cm³.',
                                'explanation' => '1/3 x 154 x 21 = 1078 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1078', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas permukaan kubus dengan rusuk 10 cm adalah ... cm².',
                                'explanation' => '6 x 100 = 600 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '600', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai rata-rata dari data: 10, 20, 30 adalah ....',
                                'explanation' => '20.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Median dari data: 5, 7, 9, 11, 13 adalah ....',
                                'explanation' => '9.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '9', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Modus dari data: 4, 6, 6, 8, 9 adalah ....',
                                'explanation' => '6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang kejadian yang pasti terjadi bernilai ....',
                                'explanation' => '1.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang kejadian yang mustahil terjadi bernilai ....',
                                'explanation' => '0.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Peluang muncul mata dadu 6 pada satu dadu adalah ....',
                                'explanation' => '1/6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak sisi pada bangun ruang bola adalah ....',
                                'explanation' => '1 sisi lengkung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Selimut tabung berbentuk bangun datar ....',
                                'explanation' => 'persegi panjang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'persegi panjang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 meter kubik sama dengan ... liter.',
                                'explanation' => '1.000 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai tengah dari data yang telah diurutkan disebut ....',
                                'explanation' => 'median.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'median', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebuah bak penampungan air berbentuk tabung dengan diameter 140 cm (jari-jari 70 cm = 7 dm) dan tinggi 200 cm (20 dm). Hitunglah:
(a) Volume kapasitas air maksimal bak tersebut dalam satuan liter (Gunakan pi = 22/7)
(b) Jika bak tersebut telah terisi air 3/4 bagian, berapa liter air yang sudah ada di dalam bak?
(c) Berapa liter air yang masih dibutuhkan agar bak tersebut terisi penuh?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) r = 7 dm, t = 20 dm. Volume = 22/7 x 7 x 7 x 20 = 154 x 20 = 3.080 dm³ = 3.080 liter.
(b) Air yang sudah ada = 3/4 x 3.080 liter = 2.310 liter.
(c) Air yang dibutuhkan = 3.080 - 2.310 = 770 liter (atau 1/4 x 3.080 = 770 liter).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tabel berikut menyajikan data nilai ulangan matematika 10 siswa:
Nilai: 70, 75, 80, 85, 90, 80, 85, 80, 75, 80
Tentukan:
(a) Nilai rata-rata (mean)
(b) Nilai tengah (median)
(c) Modus nilai siswa',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jumlah nilai = 70 + 75 + 80 + 85 + 90 + 80 + 85 + 80 + 75 + 80 = 800.
    Mean = 800 : 10 = 80.
(b) Median:
    Data urut: 70, 75, 75, 80, 80, 80, 80, 85, 85, 90.
    Data ke-5 = 80, Data ke-6 = 80.
    Median = (80 + 80) : 2 = 80.
(c) Modus: Nilai 80 (muncul 4 kali, terbanyak).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kantong berisi 40 kelereng dengan rincian: 16 kelereng merah, 14 kelereng biru, dan 10 kelereng hijau. Satu kelereng diambil secara acak. Hitunglah:
(a) Peluang terambil kelereng merah
(b) Peluang terambil kelereng biru
(c) Peluang terambil kelereng hijau
(d) Jika kelereng merah diambil dan tidak dikembalikan, berapa peluang terambil kelereng merah pada pengambilan kedua?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total awal n(S) = 40.
(a) Peluang merah = 16 / 40 = 2/5 (40%).
(b) Peluang biru = 14 / 40 = 7/20 (35%).
(c) Peluang hijau = 10 / 40 = 1/4 (25%).
(d) Pada pengambilan kedua tanpa pengembalian: sisa kelereng merah = 15, sisa total n(S) = 39.
    Peluang merah kedua = 15 / 39 = 5/13.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kubah masjid berbentuk setengah bola dengan diameter 14 meter (jari-jari 7 meter). Seluruh permukaan luar kubah dicat dengan biaya Rp50.000 per meter persegi. Tentukan:
(a) Luas permukaan luar kubah yang dicat (pi = 22/7)
(b) Total biaya pengecatan seluruh kubah',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Luas setengah bola = 2 x pi x r² = 2 x 22/7 x 7 x 7 = 308 m².
(b) Total biaya pengecatan = Luas x Biaya per m² = 308 m² x Rp50.000 = Rp15.400.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Dua buah dadu bermata enam dilemparkan secara bersamaan sebanyak satu kali. Tentukan:
(a) Banyak seluruh ruang sampel n(S)
(b) Peluang munculnya pasangan mata dadu berjumlah 7 (yaitu [1,6], [2,5], [3,4], [4,3], [5,2], [6,1])
(c) Peluang munculnya pasangan mata dadu kembar ([1,1], [2,2], [3,3], [4,4], [5,5], [6,6])',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Banyak ruang sampel n(S) = 6 x 6 = 36 titik sampel.
(b) Titik sampel berjumlah 7 ada 6 pasang: {(1,6), (2,5), (3,4), (4,3), (5,2), (6,1)}.
    Peluang = 6 / 36 = 1/6.
(c) Titik sampel mata dadu kembar ada 6 pasang: {(1,1), (2,2), (3,3), (4,4), (5,5), (6,6)}.
    Peluang = 6 / 36 = 1/6.',
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
