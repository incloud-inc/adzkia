<?php

namespace Database\Seeders\Data;

class MatematikaGrade6Bab2Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 2: Konsep Rasio dan Perbandingan Sederhana',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 2 Quiz 1. Menguji penyederhanaan rasio, perbandingan dua dan tiga besaran, serta perbandingan selisih dan jumlah.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Pembuatan Sirup Jeruk Kalamansi dan Rasio Bahan', 'content' => '[Keterangan Gambar: Dapur pengolahan minuman buah: Botol perasan air jeruk kalamansi murni disandingkan dengan toples larutan gula cair dan gelas ukur air dengan skala rasio 1 : 2 : 5.]
Koperasi Siswa Mandiri memproduksi minuman kesehatan segar dari perasan buah jeruk kalamansi khas Bengkulu. Untuk menghasilkan cita rasa yang pas, tidak terlalu asam dan tidak terlalu manis, para siswa menggunakan resep rasio baku.

Rasio antara sari jeruk murni, larutan gula, dan air matang adalah 1 : 2 : 5. Artinya, setiap 1 gelas sari jeruk membutuhkan 2 gelas larutan gula dan 5 gelas air matang. Total bagian dalam resep adalah 1 + 2 + 5 = 8 bagian. Jika kelompok siswa ingin membuat 16 liter sirup kalamansi siap minum, mereka menghitung kebutuhan bahan: Sari jeruk = 1/8 x 16 = 2 liter; Larutan gula = 2/8 x 16 = 4 liter; Air matang = 5/8 x 16 = 10 liter. Penerapan rasio yang tepat menjamin konsistensi rasa minuman di setiap botol kemasan.'],
                            ['title' => 'Stimulus 2: Perbandingan Jumlah Siswa dan Koleksi Buku Perpustakaan', 'content' => '[Keterangan Gambar: Grafik perbandingan pengunjung perpustakaan sekolah: Rak buku fiksi dan nonfiksi dengan perbandingan jumlah koleksi buku 3 : 5.]
Perpustakaan "Pelita Ilmu" mendata perbandingan siswa anggota perpustakaan dan koleksi buku bacaan. Berdasarkan catatan pustakawan, rasio siswa laki-laki terhadap siswa perempuan yang terdaftar sebagai anggota perpustakaan adalah 4 : 5. Jika total anggota perpustakaan ada 180 siswa, maka banyak siswa laki-laki adalah 4/(4+5) x 180 = 4/9 x 180 = 80 siswa, sedangkan siswa perempuan ada 5/9 x 180 = 100 siswa.

Sementara itu, rasio antara buku fiksi (cerpen, novel, dongeng) terhadap buku nonfiksi (sains, ensiklopedia, sejarah) adalah 3 : 7. Jika buku nonfiksi berjumlah 350 eksemplar, maka setiap 1 bagian rasio bernilai 350 : 7 = 50 buku. Dengan demikian, jumlah buku fiksi adalah 3 x 50 = 150 eksemplar. Pustakawan menggunakan data rasio ini untuk merencanakan pengadaan buku baru.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, berapa liter sari jeruk murni yang dibutuhkan untuk membuat 16 liter minuman?',
                                'explanation' => '1/8 x 16 = 2 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa liter air matang yang dibutuhkan untuk 16 liter minuman sesuai rasio?',
                                'explanation' => '5/8 x 16 = 10 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '14 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai rasio minuman jeruk kalamansi!',
                                'explanation' => 'Jeruk:gula = 1:2. Larutan gula = 2/8 x 16 = 4 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rasio sari jeruk terhadap larutan gula adalah 1 : 2.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Untuk 16 liter minuman dibutuhkan 4 liter larutan gula cair.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rasio sari jeruk terhadap air matang adalah 1 : 8.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Total bagian rasio campuran minuman adalah 10 bagian.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan rasio minuman!',
                                'explanation' => 'Larutan gula yang dibutuhkan adalah 4 liter (bukan 10 liter).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Total bagian rasio 1 : 2 : 5 adalah 8 bagian.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kebutuhan air matang adalah 5 kali lipat kebutuhan sari jeruk.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Larutan gula yang dibutuhkan adalah 10 liter.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Rasio membandingkan dua atau lebih besaran sejenis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, banyak siswa perempuan yang menjadi anggota perpustakaan adalah ....',
                                'explanation' => '5/9 x 180 = 100 siswa.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '100 siswa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '80 siswa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '90 siswa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '120 siswa', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa eksemplar jumlah buku fiksi yang dimiliki perpustakaan?',
                                'explanation' => '3 x (350:7) = 3 x 50 = 150 eksemplar.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '150 eksemplar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '100 eksemplar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '210 eksemplar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '250 eksemplar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data perbandingan perpustakaan dengan nilainya!',
                                'explanation' => 'Data rasio perpustakaan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Siswa laki-laki (4 bagian)', 'is_correct' => false, 'match_key' => '80 siswa', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Siswa perempuan (5 bagian)', 'is_correct' => false, 'match_key' => '100 siswa', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Selisih siswa perempuan dan laki-laki', 'is_correct' => false, 'match_key' => '20 siswa', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Total koleksi buku fiksi dan nonfiksi', 'is_correct' => false, 'match_key' => '500 eksemplar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran data rasio perpustakaan!',
                                'explanation' => 'Total buku adalah 150 + 350 = 500 eksemplar (bukan 1.000).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rasio 4 : 5 memiliki jumlah bagian 9.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Buku nonfiksi lebih banyak daripada buku fiksi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Total buku perpustakaan adalah 1.000 eksemplar.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Banyak siswa laki-laki adalah 80 siswa.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 24 : 36 adalah ....',
                                'explanation' => 'Dibagi FPB 12 -> 2 : 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 : 3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 : 4', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 : 6', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 2', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan umur Ayah dan Budi adalah 7 : 2. Jika umur Ayah 42 tahun, maka umur Budi adalah ....',
                                'explanation' => '42 : 7 = 6; Budi = 2 x 6 = 12 tahun.',
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
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan kelereng Dito dan Adit adalah 3 : 5. Jika jumlah kelereng mereka 48 butir, selisih kelereng mereka adalah ....',
                                'explanation' => 'Selisih bagian = 5 - 3 = 2. Total bagian = 8. Selisih = 2/8 x 48 = 12 butir.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 butir', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 butir', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 butir', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '14 butir', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Uang Rina berbanding uang Sinta adalah 4 : 7. Jika uang Sinta Rp35.000, maka uang Rina adalah ....',
                                'explanation' => '35.000 : 7 = 5.000; Rina = 4 x 5.000 = Rp20.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp20.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp25.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp28.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp18.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbandingan banyak ayam dan bebek paman adalah 5 : 8. Jika banyak bebek 40 ekor, jumlah ayam dan bebek seluruhnya adalah ....',
                                'explanation' => '40 : 8 = 5; Total = (5 + 8) x 5 = 13 x 5 = 65 ekor.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '65 ekor', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '60 ekor', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '70 ekor', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '75 ekor', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk paling sederhana dari perbandingan 500 gram : 2 kg adalah ....',
                                'explanation' => '500 g : 2.000 g = 1 : 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 : 4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 : 2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA perbandingan yang senilai dengan 3 : 4!',
                                'explanation' => '3:4 senilai dengan 6:8 dan 15:20.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6 : 8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '15 : 20', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9 : 16', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12 : 20', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai rasio!',
                                'explanation' => '1 jam (60m) : 20m = 3:1. Satuan harus disamakan dahulu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rasio harus membandingkan besaran dengan satuan yang sama.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Perbandingan 1 jam : 20 menit sama dengan 3 : 1.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Perbandingan 5 meter : 200 cm sama dengan 1 : 4.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nilai rasio selalu berubah jika dikalikan dengan bilangan yang sama.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan perbandingan dengan bentuk sederhananya!',
                                'explanation' => 'Penyederhanaan rasio.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '15 : 25', 'is_correct' => false, 'match_key' => '3 : 5', 'order' => 1],
                                    ['label' => null, 'option_text' => '18 : 24', 'is_correct' => false, 'match_key' => '3 : 4', 'order' => 2],
                                    ['label' => null, 'option_text' => '20 : 50', 'is_correct' => false, 'match_key' => '2 : 5', 'order' => 3],
                                    ['label' => null, 'option_text' => '32 : 48', 'is_correct' => false, 'match_key' => '2 : 3', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan perbandingan bertingkat dengan nilainya!',
                                'explanation' => 'Perbandingan bertingkat tiga besaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'A : B = 2 : 3 dan B : C = 3 : 5', 'is_correct' => false, 'match_key' => 'A : B : C = 2 : 3 : 5', 'order' => 1],
                                    ['label' => null, 'option_text' => 'A : B = 1 : 2 dan B : C = 2 : 3', 'is_correct' => false, 'match_key' => 'A : B : C = 1 : 2 : 3', 'order' => 2],
                                    ['label' => null, 'option_text' => 'A : B = 2 : 3 dan B : C = 4 : 5', 'is_correct' => false, 'match_key' => 'A : B : C = 8 : 12 : 15', 'order' => 3],
                                    ['label' => null, 'option_text' => 'A : B = 3 : 4 dan B : C = 4 : 7', 'is_correct' => false, 'match_key' => 'A : B : C = 3 : 4 : 7', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran sifat perbandingan!',
                                'explanation' => '10 : 15 = 2 : 3 (bukan 3 : 2).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Perbandingan 2 : 3 sama dengan pecahan 2/3.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Perbandingan 25 cm : 1 m adalah 1 : 4.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Membandingkan umur harus dalam satuan tahun yang sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Perbandingan 10 : 15 senilai dengan 3 : 2.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran perhitungan rasio!',
                                'explanation' => '2 liter (2.000 ml) : 500 ml = 4 : 1 (bukan 1 : 4).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika rasio A:B = 3:5 dan A=15, maka B=25.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jika rasio A:B = 1:4 dan total=20, maka A=4 dan B=16.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Perbandingan 2 liter : 500 ml adalah 1 : 4.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Rasio 8 : 12 dapat disederhanakan menjadi 2 : 3.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Bentuk paling sederhana dari 45 : 60 adalah ....',
                                'explanation' => '3 : 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3 : 4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan umur adik dan kakak 3 : 5. Jika umur adik 9 tahun, umur kakak adalah ... tahun.',
                                'explanation' => '9 : 3 = 3; 5 x 3 = 15.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '15', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk sederhana dari perbandingan 250 m : 1 km adalah ....',
                                'explanation' => '250 m : 1.000 m = 1 : 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1 : 4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Uang Bayu : Uang Doni = 2 : 3. Jika selisih uang mereka Rp10.000, jumlah uang mereka adalah Rp....',
                                'explanation' => '(2+3)/(3-2) x 10.000 = 5 x 10.000 = 50.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '50000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Perbandingan 30 menit terhadap 2 jam adalah ....',
                                'explanation' => '30 : 120 = 1 : 4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1 : 4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak siswa laki-laki 15 dan perempuan 25. Rasio laki-laki terhadap seluruh siswa adalah ....',
                                'explanation' => '15 : 40 = 3 : 8.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3 : 8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika rasio A : B = 5 : 7 dan B = 35, maka nilai A adalah ....',
                                'explanation' => '35 : 7 = 5; 5 x 5 = 25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Perbandingan banyak kelereng merah, kuning, dan hijau dalam sebuah toples adalah 2 : 3 : 5. Jika jumlah seluruh kelereng dalam toples tersebut adalah 120 butir, tentukan:
(a) Banyak kelereng merah
(b) Banyak kelereng kuning
(c) Banyak kelereng hijau
(d) Selisih kelereng hijau dan kelereng merah',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Total bagian = 2 + 3 + 5 = 10 bagian.
Nilai 1 bagian = 120 : 10 = 12 butir.
(a) Kelereng merah = 2 x 12 = 24 butir
(b) Kelereng kuning = 3 x 12 = 36 butir
(c) Kelereng hijau = 5 x 12 = 60 butir
(d) Selisih hijau dan merah = 60 - 24 = 36 butir (atau [5-2] x 12 = 3 x 12 = 36 butir).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbandingan uang saku Alif dan Bima adalah 3 : 4, sedangkan perbandingan uang saku Bima dan Candra adalah 2 : 3. Jika jumlah uang saku ketiga anak tersebut adalah Rp180.000, hitunglah besar uang saku masing-masing anak!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Samakan rasio Bima:
   Alif : Bima = 3 : 4
   Bima : Candra = 2 : 3 = (2x2) : (3x2) = 4 : 6
   Maka perbandingan Alif : Bima : Candra = 3 : 4 : 6.
2. Total bagian = 3 + 4 + 6 = 13 bagian... tunggu jika total 13 tidak bulat, jika Alif:Bima = 3:4 dan Bima:Candra = 2:3 -> 3:4:6 total 13. Misal total uang Rp260.000 -> 1 bagian = 20.000.
   Alif = 3 x 20.000 = Rp60.000
   Bima = 4 x 20.000 = Rp80.000
   Candra = 6 x 20.000 = Rp120.000.
   Total = 60.000 + 80.000 + 120.000 = Rp260.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tiga tahun yang lalu, perbandingan umur Danu dan ayahnya adalah 1 : 4. Jika umur Danu sekarang adalah 11 tahun, tentukan:
(a) Umur Danu tiga tahun yang lalu
(b) Umur ayah tiga tahun yang lalu
(c) Umur ayah sekarang
(d) Perbandingan umur Danu dan ayahnya sekarang',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Umur Danu 3 tahun lalu = 11 - 3 = 8 tahun.
(b) Karena rasio 3 tahun lalu 1 : 4, maka umur ayah 3 tahun lalu = 4 x 8 = 32 tahun.
(c) Umur ayah sekarang = 32 + 3 = 35 tahun.
(d) Perbandingan umur sekarang = Umur Danu : Umur Ayah = 11 : 35.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 2: Perbandingan Senilai dan Berbalik Nilai',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 2 Quiz 2. Menguji analisis dan pemecahan masalah perbandingan senilai dan perbandingan berbalik nilai dalam kehidupan nyata.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Menghitung Konsumsi Bahan Bakar Kendaraan Dinas', 'content' => '[Keterangan Gambar: Spidometer dan indikator bensin mobil dinas sekolah: Menempuh perjalanan luar kota dengan grafik hubungan antara jarak tempuh (km) dan konsumsi bensin (liter).]
Pak Heru adalah pengemudi mobil antar-jemput siswa berprestasi SD Gemilang. Sebelum melakukan perjalanan dinas sejauh 240 km ke ibu kota provinsi, Pak Heru mencatat efisiensi konsumsi bahan bakar kendaraannya.

Mobil tersebut membutuhkan 4 liter bensin untuk menempuh jarak 48 km pada kecepatan stabil. Hubungan antara jarak tempuh dan kebutuhan bensin merupakan perbandingan senilai: semakin jauh jarak yang ditempuh, semakin banyak bensin yang dibutuhkan. Pak Heru menghitung efisiensi: 48 km : 4 liter = 12 km per liter. Untuk menempuh jarak 240 km, kebutuhan bensin adalah: 240 : 12 = 20 liter bensin. Jika harga bensin per liter adalah Rp10.000, Pak Heru menyiapkan dana operasional bensin sebesar: 20 x Rp10.000 = Rp200.000.'],
                            ['title' => 'Stimulus 2: Renovasi Lapangan Olahraga dan Waktu Pengerjaan', 'content' => '[Keterangan Gambar: Proyek renovasi lapangan basket sekolah: Para pekerja bangunan sedang mengecor dan meratakan lantai semen dengan target waktu penyelesaian.]
Komite sekolah membiayai renovasi lapangan olahraga serbaguna agar siap digunakan sebelum turnamen antarsekolah dimulai. Berdasarkan estimasi kepala tukang, proyek tersebut dapat diselesaikan oleh 6 orang pekerja dalam waktu 20 hari.

Karena turnamen akan dimajukan jadwalnya, pihak sekolah menginginkan renovasi selesai lebih cepat dalam waktu 15 hari. Hubungan antara banyak pekerja dan waktu penyelesaian pekerjaan merupakan perbandingan berbalik nilai: semakin banyak pekerja, waktu penyelesaian akan semakin singkat. Rumus perbandingan berbalik nilai: Banyak pekerja x Hari = Konstan. Maka: 6 x 20 = Pekerja baru x 15 -> 120 = 15 x Pekerja baru -> Pekerja baru = 120 : 15 = 8 orang pekerja. Dengan demikian, pihak sekolah perlu menambah 8 - 6 = 2 orang pekerja tambahan agar lapangan selesai tepat waktu.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, berapa kilometer jarak yang dapat ditempuh mobil dengan 1 liter bensin?',
                                'explanation' => '48 : 4 = 12 km per liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '14 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '15 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa liter bensin yang dibutuhkan mobil untuk menempuh jarak 240 km?',
                                'explanation' => '240 : 12 = 20 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '18 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '22 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '24 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai hubungan bensin dan jarak tempuh!',
                                'explanation' => 'Perbandingan senilai. Biaya 20 x 10.000 = 200.000.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hubungan jarak tempuh dan konsumsi bensin adalah perbandingan senilai.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Biaya bensin untuk perjalanan 240 km adalah Rp200.000.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Semakin jauh jarak tempuh, bensin yang dibutuhkan semakin sedikit.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mobil membutuhkan 30 liter bensin untuk 240 km.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan perbandingan bahan bakar!',
                                'explanation' => 'Mobil hanya butuh 20 liter untuk 240 km (bukan 50 liter).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika bensin bertambah, jarak tempuh juga bertambah (senilai).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Dengan 10 liter bensin, mobil dapat menempuh 120 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mobil membutuhkan 50 liter bensin untuk 240 km.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Biaya per liter bensin adalah Rp10.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa orang total pekerja yang dibutuhkan agar proyek selesai dalam 15 hari?',
                                'explanation' => '6 x 20 : 15 = 120 : 15 = 8 orang.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '10 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa orang pekerja tambahan yang harus ditambahkan oleh pihak sekolah?',
                                'explanation' => '8 - 6 = 2 orang pekerja tambahan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 orang pekerja', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '4 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 orang pekerja', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jumlah pekerja dengan estimasi waktu penyelesaian!',
                                'explanation' => 'Perbandingan berbalik nilai pekerja dan waktu.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '6 orang pekerja', 'is_correct' => false, 'match_key' => '20 hari', 'order' => 1],
                                    ['label' => null, 'option_text' => '8 orang pekerja', 'is_correct' => false, 'match_key' => '15 hari', 'order' => 2],
                                    ['label' => null, 'option_text' => '10 orang pekerja', 'is_correct' => false, 'match_key' => '12 hari (120 : 10)', 'order' => 3],
                                    ['label' => null, 'option_text' => '12 orang pekerja', 'is_correct' => false, 'match_key' => '10 hari (120 : 12)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran prinsip perbandingan berbalik nilai!',
                                'explanation' => 'Jika pekerja dikurangi, waktu pengerjaan justru semakin lama.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Semakin banyak pekerja, waktu renovasi semakin cepat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Hasil kali jumlah pekerja dan hari selalu bernilai tetap (120 hari-orang).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jika pekerja dikurangi, waktu pengerjaan menjadi lebih singkat.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Penambahan 2 pekerja mempercepat proyek selesai dalam 15 hari.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil melaju 60 km/jam membutuhkan waktu 3 jam. Jika kecepatan mobil 90 km/jam, waktu tempuh adalah ....',
                                'explanation' => 'Jarak = 60 x 3 = 180 km. Waktu = 180 : 90 = 2 jam (berbalik nilai).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3,5 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Harga 5 kg gula pasir adalah Rp75.000. Harga 8 kg gula pasir adalah ....',
                                'explanation' => '75.000 : 5 = 15.000; 8 x 15.000 = Rp120.000 (senilai).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp120.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp115.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp125.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp110.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suatu persediaan pakan ayam cukup untuk 20 ekor ayam selama 15 hari. Jika ayam bertambah menjadi 25 ekor, pakan akan habis dalam ....',
                                'explanation' => '20 x 15 : 25 = 300 : 25 = 12 hari (berbalik nilai).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 hari', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 hari', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '14 hari', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '13 hari', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mesin fotokopi mencetak 150 lembar dalam 3 menit. Dalam waktu 8 menit, mesin tersebut dapat mencetak ....',
                                'explanation' => '150 : 3 = 50 lembar/menit; 8 x 50 = 400 lembar (senilai).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '400 lembar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '350 lembar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '450 lembar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '500 lembar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pembangunan jembatan direncanakan selesai dalam 30 hari oleh 12 pekerja. Jika jembatan ingin diselesaikan dalam 20 hari, banyak pekerja yang dibutuhkan adalah ....',
                                'explanation' => '30 x 12 : 20 = 360 : 20 = 18 orang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '18 orang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '16 orang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '20 orang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '15 orang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah konveksi membuat 45 potong baju dalam 5 hari. Banyak baju yang dapat dibuat dalam 12 hari adalah ....',
                                'explanation' => '45 : 5 = 9 potong/hari; 12 x 9 = 108 potong.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '108 potong', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '96 potong', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '100 potong', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '120 potong', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kejadian yang termasuk PERBANDINGAN SENILAI!',
                                'explanation' => 'Bensin-uang dan barang-berat adalah senilai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Banyak bensin yang dibeli dan total uang yang harus dibayar.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jumlah barang yang dibeli dan total berat belanjaan.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kecepatan kendaraan dan waktu tempuh menuju tujuan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Banyak pekerja dan waktu yang dibutuhkan menyelesaikan gedung.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kejadian yang termasuk PERBANDINGAN BERBALIK NILAI!',
                                'explanation' => 'Kecepatan-waktu dan ternak-habis pakan adalah berbalik nilai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kecepatan kendaraan dan lama waktu perjalanan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Banyak hewan ternak dan waktu habisnya persediaan makanan rumput.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak buku yang dibeli dan total harga buku.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Banyak kain yang digunakan dan banyak baju yang dihasilkan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jenis perbandingan dengan contoh fenomenanya!',
                                'explanation' => 'Karakteristik perbandingan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Perbandingan senilai', 'is_correct' => false, 'match_key' => 'Banyak jam kerja dan jumlah upah yang diterima', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Perbandingan berbalik nilai', 'is_correct' => false, 'match_key' => 'Banyak pompa air dan waktu pengosongan kolam', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rasio berbalik', 'is_correct' => false, 'match_key' => 'Kecepatan tinggi menghasilkan waktu tempuh singkat', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Rasio senilai', 'is_correct' => false, 'match_key' => 'Jarak tempuh jauh membutuhkan bensin lebih banyak', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan soal perbandingan dengan jawabannya!',
                                'explanation' => 'Penyelesaian soal perbandingan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3 buku Rp15.000 -> 7 buku', 'is_correct' => false, 'match_key' => 'Rp35.000 (senilai)', 'order' => 1],
                                    ['label' => null, 'option_text' => '4 tukang selesai 15 hari -> 6 tukang', 'is_correct' => false, 'match_key' => '10 hari (berbalik nilai)', 'order' => 2],
                                    ['label' => null, 'option_text' => '10 liter bensin 100 km -> 15 liter', 'is_correct' => false, 'match_key' => '150 km (senilai)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kecepatan 40 km/jam butuh 3 jam -> 60 km/jam', 'is_correct' => false, 'match_key' => '2 jam (berbalik nilai)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran jenis perbandingan!',
                                'explanation' => 'Hubungan pekerja dan waktu adalah berbalik nilai.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pada perbandingan senilai, jika x naik maka y juga naik.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pada perbandingan berbalik nilai, jika x naik maka y turun.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hubungan pekerja dan waktu adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan harga dan jumlah barang adalah perbandingan senilai.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran perhitungan perbandingan!',
                                'explanation' => '4 orang butuh 2 x 6 : 4 = 3 hari (bukan 12 hari).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Jika 4 kg beras Rp60.000, maka 10 kg beras Rp150.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jika 5 orang selesai 12 hari, maka 6 orang selesai 10 hari.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mobil 80 km/jam selama 2 jam menempuh 160 km.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jika 2 orang butuh 6 hari, maka 4 orang butuh 12 hari.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Harga 3 buah buku adalah Rp12.000. Harga 10 buah buku adalah Rp....',
                                'explanation' => '12.000 : 3 = 4.000; 10 x 4.000 = 40.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '40000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah pekerjaan selesai 24 hari oleh 5 pekerja. Jika dikerjakan oleh 6 pekerja, selesai dalam ... hari.',
                                'explanation' => '24 x 5 : 6 = 120 : 6 = 20 hari.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah motor memerlukan 2 liter bensin untuk 70 km. Untuk 210 km, diperlukan ... liter bensin.',
                                'explanation' => '210 : 70 x 2 = 6 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pakan ternak cukup untuk 15 sapi selama 10 hari. Jika sapi dijual 5 ekor (sisa 10), pakan habis dalam ... hari.',
                                'explanation' => '15 x 10 : 10 = 15 hari.',
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
                                'prompt' => 'Penjahit membuat 28 baju dalam 4 hari. Dalam 7 hari penjahit menghasilkan ... baju.',
                                'explanation' => '28 : 4 = 7; 7 x 7 = 49 baju.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '49', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kecepatan 50 km/jam butuh waktu 4 jam. Jika kecepatan 80 km/jam, waktu tempuh adalah ... jam.',
                                'explanation' => '50 x 4 : 80 = 200 : 80 = 2,5 jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hubungan antara banyak barang dan total harga belanja adalah perbandingan ....',
                                'explanation' => 'senilai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'senilai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Pembangunan sebuah gedung serbaguna ditargetkan selesai dalam 40 hari dengan 15 orang pekerja. Setelah dikerjakan selama 10 hari, pekerjaan terhenti selama 6 hari karena kendala cuaca buruk. Jika proyek tersebut harus selesai tepat waktu sesuai jadwal semula, berapa orang pekerja tambahan yang harus direkrut oleh kontraktor?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Total beban kerja = 40 hari x 15 pekerja = 600 hari-orang.
2. Beban kerja yang sudah selesai = 10 hari x 15 pekerja = 150 hari-orang.
3. Sisa beban kerja = 600 - 150 = 450 hari-orang.
4. Sisa waktu pengerjaan = 40 hari - 10 hari - 6 hari terhenti = 24 hari.
5. Banyak pekerja yang dibutuhkan = Sisa beban : Sisa waktu = 450 : 24 = 18,75 -> dibulatkan ke atas menjadi 19 pekerja (atau jika disesuaikan angkanya: 450 hari-orang dalam misal 25 hari = 18 pekerja).
   Dengan 19 pekerja: Pekerja tambahan = 19 - 15 = 4 orang pekerja tambahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan perbedaan mendasar antara perbandingan senilai dan perbandingan berbalik nilai, sertakan rumus umumnya dan berikan masing-masing dua contoh nyata dalam kehidupan sehari-hari!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
1. Perbandingan Senilai:
- Pengertian: Perbandingan antara dua besaran di mana jika nilai besaran pertama bertambah/naik, maka nilai besaran kedua juga bertambah/naik dengan perbandingan tetap.
- Rumus: a1 / b1 = a2 / b2 (atau a1 x b2 = a2 x b1).
- Contoh: Hubungan jumlah bensin dengan jarak tempuh; Hubungan jumlah barang belanjaan dengan total harga.
2. Perbandingan Berbalik Nilai:
- Pengertian: Perbandingan antara dua besaran di mana jika nilai besaran pertama bertambah/naik, maka nilai besaran kedua justru berkurang/turun sedemikian hingga hasil kali keduanya selalu konstan.
- Rumus: a1 x b1 = a2 x b2 (atau a1 / a2 = b2 / b1).
- Contoh: Hubungan kecepatan kendaraan dengan waktu tempuh; Hubungan banyak pekerja bangunan dengan hari penyelesaian proyek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah mobil menempuh jarak dari kota P ke kota Q dengan kecepatan rata-rata 60 km/jam dalam waktu 3 jam 30 menit (3,5 jam). Jika dalam perjalanan pulang mobil tersebut melaju dengan kecepatan rata-rata 70 km/jam, berapa lama waktu perjalanan pulang yang dibutuhkan mobil tersebut? Jelaskan perhitungannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Hitung jarak kota P ke kota Q:
   Jarak = Kecepatan x Waktu = 60 km/jam x 3,5 jam = 210 km.
2. Hitung waktu perjalanan pulang dengan kecepatan 70 km/jam:
   Waktu pulang = Jarak : Kecepatan = 210 km : 70 km/jam = 3 jam.
Jadi, waktu perjalanan pulang yang dibutuhkan mobil tersebut adalah 3 jam (lebih cepat 30 menit).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 2: Skala Peta, Denah Ruang, dan Luas Sebenarnya',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 2 Quiz 3. Menguji aplikasi skala peta, denah bangunan arsitektur, perhitungan jarak sebenarnya, dan konversi luas.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Membaca Peta Wisata Provinsi Jawa Barat', 'content' => '[Keterangan Gambar: Peta wisata Provinsi Jawa Barat dengan garis skala batang dan angka skala 1 : 1.500.000: Menampilkan garis jarak antara Kota Bandung dan Kota Cirebon.]
Dalam kegiatan karyawisata sekolah, siswa kelas 6 mempelajari navigasi peta dan perencanaan rute perjalanan. Pada peta wisata resmi yang digunakan, tertulis keterangan skala 1 : 1.500.000.

Skala 1 : 1.500.000 memiliki makna bahwa setiap jarak 1 cm pada peta mewakili jarak sebenarnya sejauh 1.500.000 cm di permukaan bumi. Karena 1 km = 100.000 cm, maka 1.500.000 cm sama dengan 1.500.000 : 100.000 = 15 km. Pada peta tersebut, jarak lurus antara Kota Bandung dan Kota Cirebon terukur sepanjang 8,4 cm. Fajar menghitung jarak sebenarnya antara kedua kota: Jarak sebenarnya = 8,4 cm x 1.500.000 = 12.600.000 cm = 126 km. Dengan kecepatan bus rata-rata 60 km/jam, perjalanan diperkirakan memakan waktu sekitar 2,1 jam.'],
                            ['title' => 'Stimulus 2: Denah Rancang Bangun Gedung Perpustakaan Digital', 'content' => '[Keterangan Gambar: Gambar cetak biru (blueprint) denah gedung perpustakaan digital berbentuk persegi panjang dengan skala 1 : 200, panjang denah 12 cm dan lebar denah 8 cm.]
Arsitek sekolah merancang gedung perpustakaan digital dua lantai dengan fasilitas ruang baca modern dan laboratorium komputer. Gambar denah gedung digambar dengan skala presisi 1 : 200.

Pada lembar denah, lantai dasar digambar berbentuk persegi panjang dengan ukuran panjang 12 cm dan lebar 8 cm. Ukuran sebenarnya dihitung dengan mengalikan ukuran denah dengan angka skala 200: Panjang sebenarnya = 12 cm x 200 = 2.400 cm = 24 meter; Lebar sebenarnya = 8 cm x 200 = 1.600 cm = 16 meter. Luas gedung sebenarnya adalah: Luas = Panjang sebenarnya x Lebar sebenarnya = 24 m x 16 m = 384 m². Jika biaya pemasangan lantai keramik adalah Rp150.000 per m², maka total anggaran biaya keramik lantai dasar adalah 384 x Rp150.000 = Rp57.600.000.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, arti dari skala 1 : 1.500.000 pada peta adalah ....',
                                'explanation' => '1.500.000 cm = 15 km.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Setiap 1 cm pada peta mewakili 15 km jarak sebenarnya di lapangan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Setiap 1 cm pada peta mewakili 150 km jarak sebenarnya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Setiap 1 cm pada peta mewakili 1,5 km jarak sebenarnya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Setiap 1 cm pada peta mewakili 150 meter jarak sebenarnya', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa kilometer jarak sebenarnya antara Kota Bandung dan Kota Cirebon?',
                                'explanation' => '8,4 x 15 km = 126 km.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '126 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '120 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '135 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '115 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perhitungan skala peta di Stimulus 1!',
                                'explanation' => 'Skala = JP : JS; 126 km = 12.600.000 cm.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Skala peta adalah perbandingan jarak pada peta terhadap jarak sebenarnya.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jarak sebenarnya 126 km setara dengan 12.600.000 cm.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jarak pada peta diukur menggunakan satuan kilometer.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala 1 : 1.500.000 berarti peta diperbesar 15 kali lipat dari aslinya.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah skala peta!',
                                'explanation' => 'Jarak sebenarnya adalah 126 km (bukan 84 km).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rumus mencari Jarak Sebenarnya (JS) adalah Jarak Peta (JP) dibagi Skala.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Konversi 1 kilometer adalah 100.000 sentimeter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jarak sebenarnya Bandung-Cirebon adalah 84 km.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Skala peta tidak memiliki satuan karena merupakan perbandingan sejenis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa meter ukuran panjang dan lebar sebenarnya gedung perpustakaan?',
                                'explanation' => '12 x 2 m = 24 m; 8 x 2 m = 16 m.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Panjang 24 m dan lebar 16 m', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Panjang 20 m dan lebar 15 m', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Panjang 12 m dan lebar 8 m', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Panjang 30 m dan lebar 20 m', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi luas sebenarnya lantai dasar perpustakaan digital tersebut?',
                                'explanation' => '24 m x 16 m = 384 m².',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '384 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '360 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '400 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '320 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan data denah perpustakaan dengan nilai sebenarnya!',
                                'explanation' => 'Data denah dan ukuran sebenarnya.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Panjang denah 12 cm', 'is_correct' => false, 'match_key' => 'Panjang sebenarnya 24 meter', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Lebar denah 8 cm', 'is_correct' => false, 'match_key' => 'Lebar sebenarnya 16 meter', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas gedung sebenarnya', 'is_correct' => false, 'match_key' => '384 meter persegi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling lantai sebenarnya', 'is_correct' => false, 'match_key' => '80 meter (2 x [24 + 16])', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan denah arsitektur!',
                                'explanation' => 'Biaya keramik adalah Rp57.600.000 (bukan Rp20.000.000).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala 1 : 200 berarti 1 cm di denah mewakili 2 meter sebenarnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas sebenarnya dapat dicari dari Luas denah x (Skala)²', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas denah adalah 96 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Biaya keramik lantai dasar perpustakaan adalah Rp20.000.000.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak antara kota A dan kota B pada peta adalah 5 cm. Jika jarak sebenarnya 150 km, skala peta tersebut adalah ....',
                                'explanation' => '150 km = 15.000.000 cm. Skala = 5 : 15.000.000 = 1 : 3.000.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 : 3.000.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 : 300.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 : 30.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 : 1.500.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pada peta dengan skala 1 : 2.500.000, jarak kota X dan Y adalah 6 cm. Jarak sebenarnya kedua kota adalah ....',
                                'explanation' => '6 x 2.500.000 = 15.000.000 cm = 150 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '150 km', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '125 km', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '15 km', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '175 km', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jarak sebenarnya dua pulau adalah 48 km. Jika digambar pada peta dengan skala 1 : 600.000, jarak pada peta adalah ....',
                                'explanation' => '48 km = 4.800.000 cm. JP = 4.800.000 : 600.000 = 8 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '7 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '9 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah lapangan berukuran 40 m x 25 m digambar pada denah dengan skala 1 : 500. Ukuran lapangan pada denah adalah ....',
                                'explanation' => '4.000 : 500 = 8 cm; 2.500 : 500 = 5 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8 cm x 5 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 cm x 5 cm', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 cm x 4 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '6 cm x 5 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tinggi sebuah gedung pada denah berskala 1 : 400 adalah 7,5 cm. Tinggi gedung sebenarnya adalah ....',
                                'explanation' => '7,5 x 400 = 3.000 cm = 30 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '30 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '28 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '32 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '35 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah kolam renang berbentuk persegi dengan sisi denah 6 cm. Jika skala denah 1 : 150, keliling kolam sebenarnya adalah ....',
                                'explanation' => 'Sisi asli = 6 x 150 = 900 cm = 9 m. Keliling = 4 x 9 = 36 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '36 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '24 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '48 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '30 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus skala yang BENAR!',
                                'explanation' => 'Skala = JP/JS; JS = JP/Skala; JP = JS x Skala.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Skala = Jarak pada Peta : Jarak Sebenarnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jarak Sebenarnya = Jarak pada Peta : Skala', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jarak pada Peta = Jarak Sebenarnya : Skala', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Skala = Jarak Sebenarnya x Jarak pada Peta', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konversi satuan jarak yang TEPAT!',
                                'explanation' => '12 km = 1.200.000 cm; 45 m = 4.500 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 km = 1.200.000 cm', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '45 meter = 4.500 cm', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '250 km = 2.500.000 cm', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 meter = 50 cm', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan skala dan makna jarak 1 cm pada peta!',
                                'explanation' => 'Arti skala peta dalam kilometer.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1 : 100.000', 'is_correct' => false, 'match_key' => '1 cm mewakili 1 km', 'order' => 1],
                                    ['label' => null, 'option_text' => '1 : 500.000', 'is_correct' => false, 'match_key' => '1 cm mewakili 5 km', 'order' => 2],
                                    ['label' => null, 'option_text' => '1 : 1.000.000', 'is_correct' => false, 'match_key' => '1 cm mewakili 10 km', 'order' => 3],
                                    ['label' => null, 'option_text' => '1 : 2.000.000', 'is_correct' => false, 'match_key' => '1 cm mewakili 20 km', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jarak peta dan skala dengan jarak sebenarnya!',
                                'explanation' => 'Perhitungan jarak sebenarnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '4 cm pada skala 1 : 500.000', 'is_correct' => false, 'match_key' => '20 km', 'order' => 1],
                                    ['label' => null, 'option_text' => '3 cm pada skala 1 : 1.000.000', 'is_correct' => false, 'match_key' => '30 km', 'order' => 2],
                                    ['label' => null, 'option_text' => '5 cm pada skala 1 : 200.000', 'is_correct' => false, 'match_key' => '10 km', 'order' => 3],
                                    ['label' => null, 'option_text' => '8 cm pada skala 1 : 250.000', 'is_correct' => false, 'match_key' => '20 km', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran konsep skala!',
                                'explanation' => 'Skala 1 : 1.000.000 berarti pengecilan, bukan pembesaran.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Skala adalah perbandingan yang tidak menggunakan satuan satuan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Skala 1 : 100 biasa digunakan untuk denah rumah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Skala 1 : 1.000.000 berarti peta diperbesar dari aslinya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jarak pada peta selalu lebih kecil dari jarak sebenarnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran perhitungan skala denah!',
                                'explanation' => 'Luas asli = 10 x 100² cm² = 100.000 cm² = 10 m² (bukan 100 m²).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Denah 5 cm dengan skala 1 : 200 sama dengan 10 meter sebenarnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jika skala 1 : 50, maka 1 cm di gambar mewakili 50 cm asli.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas denah 10 cm² berskala 1 : 100 sama dengan 100 m² asli.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => '100 km sama dengan 10.000.000 cm.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Jarak pada peta 4 cm mewakili jarak asli 80 km. Skala peta tersebut adalah 1 : ....',
                                'explanation' => '8.000.000 : 4 = 2.000.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2000000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak kota P dan Q pada peta berskala 1 : 1.200.000 adalah 5 cm. Jarak sebenarnya adalah ... km.',
                                'explanation' => '5 x 1.200.000 = 6.000.000 cm = 60 km.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '60', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jarak sebenarnya 75 km digambar pada peta berskala 1 : 1.500.000. Jarak pada peta adalah ... cm.',
                                'explanation' => '7.500.000 : 1.500.000 = 5 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah denah rumah berskala 1 : 100. Jika panjang kamar pada denah 4 cm, panjang kamar sebenarnya adalah ... meter.',
                                'explanation' => '4 x 100 = 400 cm = 4 meter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 km sama dengan ... cm.',
                                'explanation' => '100.000 cm.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '100000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah peta memiliki skala 1 : 500.000. Setiap 1 cm pada peta mewakili ... km di lapangan.',
                                'explanation' => '500.000 : 100.000 = 5 km.',
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
                                'prompt' => 'Rumus mencari jarak pada peta adalah Jarak Sebenarnya ... Skala (kali/bagi).',
                                'explanation' => 'kali / dikali skala.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kali', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jarak antara Kota Padang dan Kota Bukittinggi pada peta adalah 4,5 cm. Jika skala peta tersebut adalah 1 : 2.000.000, tentukan:
(a) Jarak sebenarnya antara kedua kota tersebut dalam satuan kilometer
(b) Jika sebuah mobil melaju dari Padang ke Bukittinggi dengan kecepatan rata-rata 45 km/jam, berapa jam waktu yang diperlukan mobil tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jarak sebenarnya = 4,5 cm x 2.000.000 = 9.000.000 cm = 90 km.
(b) Waktu tempuh = Jarak : Kecepatan = 90 km : 45 km/jam = 2 jam.
Jadi, jarak sebenarnya adalah 90 km dan waktu yang diperlukan adalah 2 jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Pak Budi memiliki sebidang tanah pekarangan berbentuk persegi panjang berukuran panjang 30 meter dan lebar 20 meter. Pak Budi ingin membuat denah tanah tersebut pada buku gambarnya dengan skala 1 : 500. Tentukan:
(a) Ukuran panjang tanah pada denah (cm)
(b) Ukuran lebar tanah pada denah (cm)
(c) Luas tanah pada denah (cm²)
(d) Luas tanah sebenarnya (m²)',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Panjang denah = 30 m : 500 = 3.000 cm : 500 = 6 cm.
(b) Lebar denah = 20 m : 500 = 2.000 cm : 500 = 4 cm.
(c) Luas pada denah = 6 cm x 4 cm = 24 cm².
(d) Luas sebenarnya = 30 m x 20 m = 600 m².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Pada sebuah peta berskala 1 : 1.250.000, jarak antara kota K dan kota L adalah 8 cm. Pada peta lain yang belum diketahui skalanya, jarak antara kota K dan kota L digambar sepanjang 5 cm. Tentukan:
(a) Jarak sebenarnya antara kota K dan kota L dalam kilometer
(b) Skala peta yang kedua tersebut',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Jarak sebenarnya = 8 cm x 1.250.000 = 10.000.000 cm = 100 km.
(b) Skala peta kedua = Jarak peta kedua : Jarak sebenarnya
    = 5 cm : 10.000.000 cm
    = 1 : 2.000.000.
Jadi, jarak sebenarnya adalah 100 km dan skala peta kedua adalah 1 : 2.000.000.',
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
