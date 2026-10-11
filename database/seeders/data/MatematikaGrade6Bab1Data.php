<?php

namespace Database\Seeders\Data;

class MatematikaGrade6Bab1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 1: Perkalian dan Pembagian Pecahan Lanjutan',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 1 Quiz 1. Menguji perkalian dan pembagian pecahan biasa, campuran, desimal, serta persen dalam masalah nyata.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Pembuatan Pupuk Kompos Cair di Kebun Sekolah', 'content' => '[Keterangan Gambar: Wadah ember drum pengomposan dengan skala takaran liter: Larutan biang EM4 dicampur dengan molase gula merah dan air kelapa dengan takaran pecahan liter.]
Dalam rangka proyek penguatan profil pelajar Pancasila (P5), siswa kelas 6 SD Harapan Bangsa memproduksi pupuk organik cair (POC) untuk tanaman kebun hidroponik sekolah. Setiap drum pengomposan membutuhkan campuran larutan biang mikroba dan air kelapa segar.

Kelompok Dika menyiapkan 4 drum pupuk. Setiap drum membutuhkan 2 1/2 liter air kelapa dan 3/4 liter larutan molase gula merah. Dika menghitung total kebutuhan bahan dengan cermat: "Untuk 4 drum, kebutuhan air kelapa adalah 4 x 2 1/2 liter = 10 liter, sedangkan larutan molase adalah 4 x 3/4 liter = 3 liter." Setelah pupuk cair matang selama 2 minggu, mereka mengemas pupuk tersebut ke dalam botol-botol kecil berukuran 0,25 liter (1/4 liter) untuk dibagikan kepada warga sekolah. Sebanyak 12 liter pupuk cair yang dipanen berhasil dikemas seluruhnya ke dalam botol-botol tersebut tanpa tersisa sedikit pun.'],
                            ['title' => 'Stimulus 2: Menjahit Seragam Tari Daerah Nusantara', 'content' => '[Keterangan Gambar: Meja desainer pakaian adat dengan gulungan kain tenun motif songket sepanjang 15 meter, meteran kain, dan pola baju tari.]
Ibu Maya adalah perajin pakaian tradisional yang bertugas membuat baju tari piring untuk 8 orang penari putri kelas 6. Ibu Maya membeli kain songket sepanjang 15 meter dan kain selendang sutra sepanjang 10 1/2 meter.

Setiap baju tari membutuhkan 1 3/8 meter kain songket. Ibu Maya menghitung kain songket yang digunakan untuk seluruh 8 penari: 8 x 1 3/8 = 8 x 11/8 = 11 meter. Sisa kain songket disimpan untuk aksesoris ikat kepala. Sementara itu, kain selendang sutra dipotong menjadi 6 helai selendang yang sama panjang. Masing-masing helai selendang memiliki panjang: 10 1/2 : 6 = 21/2 x 1/6 = 21/12 = 1 3/4 meter (atau 1,75 meter). Perhitungan pecahan yang tepat membuat tidak ada kain mahal yang terbuang sia-sia.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, total air kelapa yang dibutuhkan untuk 4 drum pupuk adalah ....',
                                'explanation' => '4 x 2 1/2 = 4 x 5/2 = 10 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8 1/2 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak botol kecil berukuran 0,25 liter yang dihasilkan dari 12 liter pupuk cair yang dipanen?',
                                'explanation' => '12 : 0,25 = 12 : 1/4 = 12 x 4 = 48 botol.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '48 botol', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '36 botol', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '24 botol', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '60 botol', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai takaran bahan pupuk kompos cair!',
                                'explanation' => 'Molase: 4 x 3/4 = 3 liter. 0,25 liter = 1/4 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kebutuhan larutan molase untuk 4 drum adalah 3 liter.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Setiap botol kemasan kecil menampung volume 1/4 liter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Setiap drum pupuk membutuhkan 5 liter air kelapa murni.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Total pupuk yang dipanen hanya dapat mengisi 12 botol kecil.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan operasi pecahan pupuk!',
                                'explanation' => '3/4 = 0,75 liter (bukan 0,5 liter).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Hasil perkalian 4 x 2 1/2 adalah bilangan bulat 10.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Operasi 12 : 0,25 senilai dengan 12 x 4.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai 3/4 liter sama dengan 0,5 liter.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Pembagian pecahan dilakukan dengan mengalikan kebalikan pembagi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa meter kain songket yang digunakan untuk membuat 8 baju tari?',
                                'explanation' => '8 x 1 3/8 = 8 x 11/8 = 11 meter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '11 meter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '12 meter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '10 3/8 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '13 1/2 meter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter panjang masing-masing helai selendang sutra setelah dipotong menjadi 6 bagian sama panjang?',
                                'explanation' => '10 1/2 : 6 = 21/2 : 6 = 21/12 = 1 9/12 = 1 3/4 meter = 1,75 meter.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 3/4 meter (1,75 meter)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 1/2 meter (1,5 meter)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2 meter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 1/4 meter (1,25 meter)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi pecahan kain dengan hasil perhitungannya!',
                                'explanation' => 'Operasi hitung pecahan kain seragam tari.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '8 x 1 3/8 meter', 'is_correct' => false, 'match_key' => '11 meter', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sisa kain songket (15 - 11)', 'is_correct' => false, 'match_key' => '4 meter', 'order' => 2],
                                    ['label' => null, 'option_text' => '10 1/2 : 6 meter', 'is_correct' => false, 'match_key' => '1 3/4 meter', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bentuk desimal dari 1 3/4', 'is_correct' => false, 'match_key' => '1,75', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan seragam tari!',
                                'explanation' => 'Kain 15 m mencukupi karena yang terpakai hanya 11 m.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sisa kain songket Ibu Maya adalah 4 meter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Panjang setiap selendang adalah 1,75 meter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kain songket 15 meter tidak mencukupi untuk 8 baju tari.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Pecahan campuran 1 3/8 senilai dengan 11/8.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3/5 x 2 1/2 adalah ....',
                                'explanation' => '3/5 x 5/2 = 15/10 = 3/2 = 1 1/2.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 1/4', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 3/5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 4/7 : 2/3 adalah ....',
                                'explanation' => '4/7 x 3/2 = 12/14 = 6/7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6/7', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '8/21', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '5/7', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 1/7', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 1/4 : 0,75 adalah ....',
                                'explanation' => '2 1/4 = 9/4, 0,75 = 3/4. 9/4 : 3/4 = 9/4 x 4/3 = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai dari 0,6 x 1,25 adalah ....',
                                'explanation' => '6/10 x 5/4 = 30/40 = 3/4 = 0,75.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0,75', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '0,85', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,65', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,72', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk persen dari 7/20 adalah ....',
                                'explanation' => '7/20 x 100% = 35%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '35%', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '30%', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '40%', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '25%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah tali sepanjang 5 1/4 meter dipotong masing-masing 3/4 meter. Banyak potongan tali adalah ....',
                                'explanation' => '21/4 : 3/4 = 21/4 x 4/3 = 7.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7 potong', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 potong', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 potong', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5 potong', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk pecahan yang senilai dengan 0,8!',
                                'explanation' => '0,8 = 8/10 = 4/5 = 80%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4/5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '80%', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3/4', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8/100', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA hasil operasi hitung pecahan yang bernilai BENAR!',
                                'explanation' => '2/3 x 3/4 = 2/4 = 1/2; 3/2 : 1/2 = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2/3 x 3/4 = 1/2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 1/2 : 1/2 = 3', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3/5 x 5/3 = 2', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1/4 : 2 = 1/2', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan pecahan biasa dengan bentuk desimalnya!',
                                'explanation' => 'Pecahan perdelapan dan bentuk desimal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/8', 'is_correct' => false, 'match_key' => '0,125', 'order' => 1],
                                    ['label' => null, 'option_text' => '3/8', 'is_correct' => false, 'match_key' => '0,375', 'order' => 2],
                                    ['label' => null, 'option_text' => '5/8', 'is_correct' => false, 'match_key' => '0,625', 'order' => 3],
                                    ['label' => null, 'option_text' => '7/8', 'is_correct' => false, 'match_key' => '0,875', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi pecahan dengan hasilnya!',
                                'explanation' => 'Operasi pecahan dasar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2 x 4/5', 'is_correct' => false, 'match_key' => '2/5', 'order' => 1],
                                    ['label' => null, 'option_text' => '3/4 : 1/2', 'is_correct' => false, 'match_key' => '1 1/2', 'order' => 2],
                                    ['label' => null, 'option_text' => '2 1/3 x 3/7', 'is_correct' => false, 'match_key' => '1', 'order' => 3],
                                    ['label' => null, 'option_text' => '5/6 : 5/6', 'is_correct' => false, 'match_key' => '1', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan pecahan desimal!',
                                'explanation' => '1/3 = 0,333... bukan 0,3 (0,3 = 3/10).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mengalikan dengan 0,5 sama dengan membagi dengan 2.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 25% dari 200 adalah 50.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pecahan 1/3 senilai dengan desimal 0,3.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hasil pembagian 3/4 : 3/4 adalah 1.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran operasi hitung campuran pecahan!',
                                'explanation' => 'Semua pernyataan benar sesuai kaidah matematika dasar.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2 + 1/4 x 2 = 1/2 + 1/2 = 1.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Operasi perkalian dikerjakan lebih dahulu dari penjumlahan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hasil dari (1/3 + 2/3) x 5 adalah 5.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => '0,5 x 0,2 = 0,1.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Hasil dari 3/4 x 4/5 adalah ....',
                                'explanation' => '3/5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 5/8 : 5/6 adalah ....',
                                'explanation' => '5/8 x 6/5 = 6/8 = 3/4.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/4', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk pecahan biasa paling sederhana dari 0,65 adalah ....',
                                'explanation' => '65/100 = 13/20.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '13/20', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk desimal dari 3 1/4 adalah ....',
                                'explanation' => '3,25.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3,25', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 2 1/2 x 1 1/5 adalah ....',
                                'explanation' => '5/2 x 6/5 = 30/10 = 3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai dari 15% dari Rp80.000 adalah ....',
                                'explanation' => '15/100 x 80.000 = Rp12.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '12000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah drum berisi 15 liter minyak goreng dikemas ke botol 1 1/2 liter. Banyak botol adalah ....',
                                'explanation' => '15 : 3/2 = 15 x 2/3 = 10 botol.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '10', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Pak Rudi memiliki sebidang tanah seluas 600 m². Sebanyak 2/5 bagian tanah dibangun rumah tinggal, 1/3 bagian ditanami pohon buah-buahan, dan sisanya dibuat kolam ikan. Tentukan:
(a) Luas tanah untuk rumah tinggal
(b) Luas tanah untuk pohon buah-buahan
(c) Luas tanah untuk kolam ikan',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Luas rumah = 2/5 x 600 m² = 240 m²
(b) Luas pohon buah = 1/3 x 600 m² = 200 m²
(c) Luas kolam ikan = 600 - (240 + 200) = 600 - 440 = 160 m² (atau [1 - 2/5 - 1/3] = [15/15 - 6/15 - 5/15] = 4/15 x 600 = 160 m²).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Hitunglah hasil operasi hitung campuran pecahan berikut dengan langkah pengerjaan yang lengkap dan runtut:
2 1/2 + 1 3/4 x 0,8 - 1,2 : 3/5',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Ubah ke bentuk desimal atau pecahan biasa:
   - 2 1/2 = 2,5
   - 1 3/4 = 1,75
   - 1 3/4 x 0,8 = 7/4 x 4/5 = 7/5 = 1,4
   - 1,2 : 3/5 = 12/10 : 3/5 = 12/10 x 5/3 = 60/30 = 2
2. Gabungkan hasil operasi:
   = 2,5 + 1,4 - 2
   = 3,9 - 2 = 1,9 (atau 1 9/10).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Ibu membeli 5 1/2 kg gula pasir. Sebanyak 2 1/4 kg digunakan untuk membuat kue bolu. Sisanya akan dimasukkan ke dalam beberapa kantong plastik kecil dengan berat masing-masing 0,25 kg (1/4 kg). Berapa banyak kantong plastik yang dibutuhkan Ibu? Jelaskan langkahnya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Hitung sisa gula pasir setelah membuat kue:
   Sisa = 5 1/2 - 2 1/4 = 5 2/4 - 2 1/4 = 3 1/4 kg = 13/4 kg.
2. Hitung banyak kantong plastik yang dibutuhkan:
   Banyak kantong = 3 1/4 : 0,25 = (13/4) : (1/4) = 13/4 x 4/1 = 13 kantong.
Jadi, banyak kantong plastik yang dibutuhkan Ibu adalah 13 kantong.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 1: Operasi Hitung Campuran Pecahan dan Desimal',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 1 Quiz 2. Menguji urutan operasi hitung campuran (kurung, kali/bagi, tambah/kurang) pada pecahan dan desimal.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Toko Roti Manis dan Efisiensi Bahan Baku', 'content' => '[Keterangan Gambar: Dapur pembuatan roti dengan timbangan digital: Menimbang tepung terigu protein tinggi, mentega, susu bubuk, dan ragi instan dalam satuan kilogram pecahan.]
Toko Roti "Berkah Jaya" memproduksi aneka roti manis setiap pagi. Kepala dapur, Pak Seno, mencatat persediaan bahan baku tepung terigu di awal pekan sebanyak 25 kg. Pada hari Senin dan Selasa, terigu tersebut terpakai berturut-turut sebanyak 8 3/4 kg dan 7,5 kg.

Melihat stok yang tersisa kian menipis, Pak Seno membeli tambahan tepung terigu sebanyak 12 1/2 kg. Pak Seno menghitung persediaan tepung yang tersedia sekarang: 25 - 8 3/4 - 7,5 + 12 1/2 = 25 - 8,75 - 7,5 + 12,5 = 21,25 kg (atau 21 1/4 kg). Tepung terigu yang tersisa ini dibagi rata ke dalam 5 wadah kedap udara untuk produksi hari Rabu hingga Minggu. Setiap wadah diisi: 21,25 : 5 = 4,25 kg (atau 4 1/4 kg) tepung terigu. Pengelolaan stok bahan dengan pecahan presisi menjaga kelancaran usaha roti.'],
                            ['title' => 'Stimulus 2: Mengelola Uang Saku dan Menabung untuk Cita-Cita', 'content' => '[Keterangan Gambar: Catatan keuangan celengan siswa SD: Diagram lingkaran alokasi uang saku untuk jajan sehat 50%, sedekah 15%, alat tulis 10%, dan tabungan masa depan 25%.]
Setiap awal bulan, Farhan menerima uang saku dan pembinaan dari orang tuanya sebesar Rp200.000. Sebagai siswa kelas 6 yang cerdas finansial, Farhan selalu membagi uang sakunya menggunakan persentase dan pecahan yang terencana.

Sebanyak 50% (1/2 bagian) digunakan untuk ongkos dan jajan sehat di sekolah, yaitu 0,5 x Rp200.000 = Rp100.000. Sebanyak 15% dialokasikan untuk infak dan sedekah, yaitu 0,15 x Rp200.000 = Rp30.000. Sebanyak 10% (1/10 bagian) disiapkan untuk membeli buku dan alat tulis, yaitu Rp20.000. Sisanya sebesar 25% (1/4 bagian) langsung ditabung ke dalam rekening tabungan SimPel (Simpanan Pelajar) di bank, yaitu 0,25 x Rp200.000 = Rp50.000. Dengan kedisiplinan ini, dalam satu tahun tabungan Farhan mencapai Rp600.000.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, total tepung terigu yang terpakai pada hari Senin dan Selasa adalah ....',
                                'explanation' => '8 3/4 + 7,5 = 8,75 + 7,5 = 16,25 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '16,25 kg (16 1/4 kg)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '15,5 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '14,75 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '17 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa kilogram tepung terigu yang dimasukkan ke setiap wadah dari 5 wadah kedap udara?',
                                'explanation' => '21,25 : 5 = 4,25 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4,25 kg (4 1/4 kg)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4,5 kg', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3,75 kg', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '5,25 kg', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai perhitungan stok tepung roti!',
                                'explanation' => 'Stok tersisa 21,25 kg dan setiap wadah 4,25 kg = 4 1/4 kg.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tepung yang tersedia sebelum dibagi ke wadah adalah 21,25 kg.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Setiap wadah menampung tepung terigu seberat 4 1/4 kg.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Toko roti kehabisan tepung pada hari Selasa.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tambahan tepung yang dibeli Pak Seno adalah 20 kg.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan stok terigu!',
                                'explanation' => 'Tepung terpakai adalah 16,25 kg (kurang dari 25 kg).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pecahan campuran 8 3/4 setara dengan 8,75.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai 21,25 jika dibagi 5 menghasilkan 4,25.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tepung terigu yang terpakai lebih banyak dari tepung awal 25 kg.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Pecahan 12 1/2 senilai dengan desimal 12,5.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa rupiah uang yang dialokasikan Farhan untuk infak dan sedekah setiap bulan?',
                                'explanation' => '15% x Rp200.000 = Rp30.000.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp30.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp20.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp50.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp40.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa rupiah uang tabungan yang disetor Farhan ke bank setiap bulan?',
                                'explanation' => '25% x Rp200.000 = Rp50.000.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp50.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp40.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp60.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp30.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan persentase alokasi uang Farhan dengan nominal rupiahnya!',
                                'explanation' => 'Alokasi uang saku bulanan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '50% (jajan & ongkos)', 'is_correct' => false, 'match_key' => 'Rp100.000', 'order' => 1],
                                    ['label' => null, 'option_text' => '15% (infak sedekah)', 'is_correct' => false, 'match_key' => 'Rp30.000', 'order' => 2],
                                    ['label' => null, 'option_text' => '10% (alat tulis)', 'is_correct' => false, 'match_key' => 'Rp20.000', 'order' => 3],
                                    ['label' => null, 'option_text' => '25% (tabungan bank)', 'is_correct' => false, 'match_key' => 'Rp50.000', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran manajemen finansial Farhan!',
                                'explanation' => 'Farhan menabung Rp50.000/bulan x 12 = Rp600.000/tahun.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Alokasi jajan sehat merupakan porsi terbesar (Rp100.000).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Dalam setahun (12 bulan), tabungan Farhan terkumpul Rp600.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Farhan menghabiskan seluruh uang saku untuk membeli mainan.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Persentase 25% senilai dengan pecahan 1/4.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3/4 + 0,6 x 1/2 adalah ....',
                                'explanation' => '3/4 + (0,6 x 0,5) = 0,75 + 0,30 = 1,05.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1,05 (1 1/20)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1,1', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,95', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,2', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2,4 : 0,8 + 1 1/2 adalah ....',
                                'explanation' => '2,4 : 0,8 = 3. 3 + 1,5 = 4,5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3,5', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 5/6 - 1/3 x 1 1/2 adalah ....',
                                'explanation' => '1/3 x 3/2 = 1/2. 5/6 - 3/6 = 2/6 = 1/3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1/3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1/2', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1/6', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '2/3', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 40% + 1/4 - 0,15 adalah ....',
                                'explanation' => '0,40 + 0,25 - 0,15 = 0,50.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '0,45', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,55', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '0,6', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari (3/5 + 1/2) x 10 adalah ....',
                                'explanation' => '(6/10 + 5/10) x 10 = 11/10 x 10 = 11.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '11', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '9', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ibu memiliki 2,5 liter sirup. Sebanyak 3/5 bagian dibuat es buah. Sisa sirup Ibu adalah ....',
                                'explanation' => 'Terpakai: 3/5 x 2,5 = 1,5 liter. Sisa = 2,5 - 1,5 = 1 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1,5 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '0,5 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1,2 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk yang senilai dengan 1 3/5!',
                                'explanation' => '1 3/5 = 8/5 = 1,6 = 160%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1,6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '160%', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1,35', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '135%', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA urutan pengerjaan operasi hitung campuran yang BENAR!',
                                'explanation' => 'Kurung utama, lalu kali/bagi, lalu tambah/kurang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Operasi dalam tanda kurung dikerjakan paling awal.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Perkalian dan pembagian dikerjakan sebelum penjumlahan dan pengurangan.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penjumlahan selalu dikerjakan lebih dahulu dari perkalian.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Operasi dari kanan ke kiri tanpa melihat tanda kurung.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan operasi hitung dengan hasilnya!',
                                'explanation' => 'Operasi hitung campuran pecahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,25 x 4 + 0,5', 'is_correct' => false, 'match_key' => '1,5', 'order' => 1],
                                    ['label' => null, 'option_text' => '1/2 : 1/4 - 1', 'is_correct' => false, 'match_key' => '1', 'order' => 2],
                                    ['label' => null, 'option_text' => '0,8 - 0,3 x 2', 'is_correct' => false, 'match_key' => '0,2', 'order' => 3],
                                    ['label' => null, 'option_text' => '2 x (1/4 + 1/4)', 'is_correct' => false, 'match_key' => '1', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bentuk pecahan dengan persentasenya!',
                                'explanation' => 'Pecahan perlima dan persen.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1/5', 'is_correct' => false, 'match_key' => '20%', 'order' => 1],
                                    ['label' => null, 'option_text' => '2/5', 'is_correct' => false, 'match_key' => '40%', 'order' => 2],
                                    ['label' => null, 'option_text' => '3/5', 'is_correct' => false, 'match_key' => '60%', 'order' => 3],
                                    ['label' => null, 'option_text' => '4/5', 'is_correct' => false, 'match_key' => '80%', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan desimal!',
                                'explanation' => '0,75 + (0,25 x 2) = 0,75 + 0,5 = 1,25 (bukan 2).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '0,2 x 0,3 = 0,06.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '1,5 : 0,5 = 3.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => '0,75 + 0,25 x 2 = 2.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => '2,4 - 0,4 x 5 = 0,4.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran sifat operasi hitung pecahan!',
                                'explanation' => 'Pembagian dengan nol tidak terdefinisi.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'a/b x c/d = (a x c) / (b x d).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'a/b : c/d = a/b x d/c.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pecahan berpenyebut nol terdefinisi dalam matematika.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Penjumlahan pecahan berbeda penyebut harus disamakan KPK penyebutnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
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
                                'prompt' => 'Hasil dari 0,75 + 1/2 x 0,4 adalah ....',
                                'explanation' => '0,75 + 0,20 = 0,95.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,95', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 3 1/2 : 0,5 - 2 adalah ....',
                                'explanation' => '7/2 : 1/2 = 7; 7 - 2 = 5.',
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
                                'prompt' => 'Bentuk persen dari 0,45 adalah ....',
                                'explanation' => '45%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '45%', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 2/3 x 0,9 adalah ....',
                                'explanation' => '2/3 x 9/10 = 18/30 = 3/5 = 0,6.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 1 - 3/8 - 1/4 adalah ....',
                                'explanation' => '8/8 - 3/8 - 2/8 = 3/8.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '3/8', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai dari 20% dari 1,5 kg adalah ... kg.',
                                'explanation' => '0,20 x 1,5 = 0,3 kg.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,3', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah botol berisi 0,75 liter air diminum 1/3 bagian. Sisa air adalah ... liter.',
                                'explanation' => 'Terpakai: 1/3 x 0,75 = 0,25. Sisa = 0,5 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '0,5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Pak Danu memiliki beras 100 kg. Sebanyak 40% disumbangkan ke panti asuhan, 1/4 bagian diberikan kepada kerabat, dan sisanya dijual ke pasar dengan harga Rp14.000 per kg. Tentukan:
(a) Berat beras yang disumbangkan ke panti asuhan
(b) Berat beras yang diberikan kepada kerabat
(c) Hasil uang penjualan beras yang tersisa di pasar',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Beras panti asuhan = 40% x 100 kg = 40 kg
(b) Beras kerabat = 1/4 x 100 kg = 25 kg
(c) Sisa beras dijual = 100 - (40 + 25) = 100 - 65 = 35 kg.
Uang penjualan = 35 kg x Rp14.000 = Rp490.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tentukan hasil operasi hitung campuran berikut secara teliti:
(3 1/4 - 1,75) : 0,5 + 2/5 x 15',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Hitung dalam kurung: 3 1/4 - 1,75 = 3,25 - 1,75 = 1,50.
2. Lakukan pembagian: 1,5 : 0,5 = 3.
3. Lakukan perkalian: 2/5 x 15 = 30/5 = 6.
4. Jumlahkan hasil: 3 + 6 = 9.
Jadi, hasil akhirnya adalah 9.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah bak mandi mula-mula terisi air 1/4 bagian. Kemudian dialirkan air dari kran selama 15 menit dengan debit 12 liter per menit sehingga bertambah 180 liter. Jika kapasitas penuh bak adalah 300 liter, tentukan:
(a) Volume air mula-mula
(b) Volume air sekarang
(c) Pecahan yang menyatakan bagian bak yang belum terisi air',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Volume awal = 1/4 x 300 liter = 75 liter.
(b) Volume sekarang = 75 + 180 = 255 liter.
(c) Air yang belum terisi = 300 - 255 = 45 liter.
Pecahan bagian yang belum terisi = 45 / 300 = 3/20 bagian (atau 15%).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 1: Aplikasi Pecahan, Desimal, dan Persen dalam Kehidupan',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 1 Quiz 3. Menguji pemecahan masalah kontekstual diskon belanja, pengelolaan keuangan keluarga, dan konversi multi-satuan.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Panen Madu Lebah Trigona Organik', 'content' => '[Keterangan Gambar: Peternakan lebah tanpa sengat (Trigona) di kebun bunga: Peternak memanen madu dengan alat sedot khusus ke dalam wadah ukur kaca liter.]
Kelompok Tani Hutan "Lestari Rimba" membudidayakan lebah madu Trigona di kawasan hutan lereng bukit. Lebah ini menghasilkan madu propolis organik yang kaya khasiat obat dengan rasa asam-manis khas.

Pada panen raya bulan ini, terkumpul 42 liter madu murni. Ketua kelompok tani membagi hasil panen: 1/6 bagian dibagikan kepada anggota pengelola peternakan, 1/4 bagian disimpan untuk stok cadangan obat warga desa, dan sisanya dikemas ke dalam botol kaca 0,35 liter untuk dijual ke koperasi herbal. Madu yang dibagikan kepada anggota adalah 1/6 x 42 = 7 liter. Madu untuk cadangan obat warga adalah 1/4 x 42 = 10,5 liter. Sisa madu untuk dijual adalah 42 - 7 - 10,5 = 24,5 liter. Sebanyak 24,5 liter madu tersebut menghasilkan 24,5 : 0,35 = 70 botol madu herbal bernilai tinggi.'],
                            ['title' => 'Stimulus 2: Bazar Amal dan Diskon Belanja Cerdas', 'content' => '[Keterangan Gambar: Toko perlengkapan sekolah dengan label promo diskon: Tas sekolah Rp150.000 (diskon 20%), Sepatu Rp200.000 (diskon 25%), Paket Buku Tulis Rp50.000 (diskon 10%).]
Menjelang tahun ajaran baru, sebuah toko perlengkapan sekolah menyelenggarakan program "Bazar Pelajar Cerdas" dengan potongan harga (diskon) spesial bagi siswa berprestasi. Riko berbelanja perlengkapan sekolah menggunakan tabungan pribadinya.

Riko membeli satu tas sekolah seharga Rp150.000 dengan diskon 20%, sepasang sepatu seharga Rp200.000 dengan diskon 25%, dan satu paket buku tulis seharga Rp50.000 dengan diskon 10%. Riko menghitung harga setelah diskon: Tas sekolah mendapat potongan 0,20 x 150.000 = Rp30.000 (harga bayar Rp120.000); Sepatu mendapat potongan 0,25 x 200.000 = Rp50.000 (harga bayar Rp150.000); Paket buku mendapat potongan 0,10 x 50.000 = Rp5.000 (harga bayar Rp45.000). Total yang dibayar Riko adalah Rp120.000 + Rp150.000 + Rp45.000 = Rp315.000. Penghematan total yang didapatkan Riko mencapai Rp85.000.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, berapa liter madu yang disimpan untuk cadangan obat warga desa?',
                                'explanation' => '1/4 x 42 = 10,5 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10,5 liter (10 1/2 liter)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '7 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '12 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '14 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak botol kaca ukuran 0,35 liter yang dihasilkan dari sisa madu yang dijual?',
                                'explanation' => '24,5 : 0,35 = 70 botol.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '70 botol', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '60 botol', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '80 botol', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '75 botol', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai pembagian panen madu!',
                                'explanation' => 'Anggota = 7 liter; Dijual = 24,5 liter (70 botol @ 0,35 liter).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Madu yang dibagikan untuk anggota pengelola adalah 7 liter.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Volume madu yang dikemas untuk dijual ke koperasi adalah 24,5 liter.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Total madu yang dipanen adalah 50 liter.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Setiap botol kaca madu berkapasitas 1 liter penuh.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan panen madu!',
                                'explanation' => 'Anggota pengelola menerima 7 liter (bukan 15 liter).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Operasi 24,5 : 0,35 setara dengan 2450 : 35 = 70.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bagian cadangan obat warga desa adalah 10,5 liter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Anggota pengelola menerima madu sebanyak 15 liter.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Total panen madu murni adalah 42 liter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, berapa harga tas sekolah setelah dipotong diskon 20%?',
                                'explanation' => 'Rp150.000 - Rp30.000 = Rp120.000.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp120.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp130.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp125.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp110.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa total uang yang harus dibayarkan Riko untuk ketiga barang belanjaannya?',
                                'explanation' => 'Rp120.000 + Rp150.000 + Rp45.000 = Rp315.000.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp315.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp400.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp325.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp300.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan barang belanjaan Riko dengan besar potongan diskonnya!',
                                'explanation' => 'Perhitungan diskon perlengkapan sekolah.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tas sekolah (20% dari 150.000)', 'is_correct' => false, 'match_key' => 'Rp30.000', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sepatu (25% dari 200.000)', 'is_correct' => false, 'match_key' => 'Rp50.000', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Paket buku (10% dari 50.000)', 'is_correct' => false, 'match_key' => 'Rp5.000', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Total seluruh potongan diskon', 'is_correct' => false, 'match_key' => 'Rp85.000', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan diskon Riko!',
                                'explanation' => 'Harga sepatu setelah diskon adalah Rp150.000 (bukan Rp180.000).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diskon 25% dari Rp200.000 adalah Rp50.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Riko menghemat uang belanja sebesar Rp85.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Harga sepatu setelah diskon adalah Rp180.000.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Total belanja awal sebelum diskon adalah Rp400.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah toko pakaian memberikan diskon 30% untuk kemeja seharga Rp180.000. Harga kemeja setelah diskon adalah ....',
                                'explanation' => 'Potongan = 30% x 180.000 = 54.000. Harga bayar = 180.000 - 54.000 = Rp126.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp126.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp130.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp120.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp136.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Di dalam sebuah kelas terdapat 40 siswa. Sebanyak 60% adalah siswa perempuan. Banyak siswa laki-laki adalah ....',
                                'explanation' => 'Laki-laki = 40% x 40 = 16 orang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '16 orang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '24 orang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '20 orang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '18 orang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Seorang pedagang membeli 50 kg mangga seharga Rp500.000. Sebanyak 10% mangga busuk, sisanya dijual Rp15.000/kg. Keuntungan pedagang adalah ....',
                                'explanation' => 'Bagus = 45 kg. Penjualan = 45 x 15.000 = 675.000. Untung = 675.000 - 500.000 = Rp175.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rp175.000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rp150.000', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rp200.000', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rp125.000', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2,5 x 0,4 : 0,2 adalah ....',
                                'explanation' => '1,0 : 0,2 = 5.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2,5', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '6', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nilai dari 3/4 dari 2 jam adalah ... menit.',
                                'explanation' => '3/4 x 120 menit = 90 menit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '90 menit', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '75 menit', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '80 menit', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '100 menit', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah mobil menghabiskan 1 liter bensin untuk menempuh 12,5 km. Untuk menempuh 150 km, bensin yang dibutuhkan adalah ....',
                                'explanation' => '150 : 12,5 = 12 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '10 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '14 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '15 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai persentase dan pecahan!',
                                'explanation' => 'Diskon 50% = 1/2 harga; 3/20 = 15%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diskon 50% berarti pembeli hanya membayar setengah dari harga asli.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pecahan 3/20 senilai dengan 15%.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nilai 10% dari Rp1.000.000 adalah Rp50.000.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Diskon 100% berarti harga barang naik dua kali lipat.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA hasil konversi waktu ke pecahan jam yang BENAR!',
                                'explanation' => '45 menit = 3/4 jam; 30 menit = 1/2 jam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '45 menit = 3/4 jam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '30 menit = 1/2 jam', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '20 menit = 1/4 jam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '15 menit = 1/3 jam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan persentase dengan nilai pecahan biasanya!',
                                'explanation' => 'Persen dan pecahan biasa.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '12,5%', 'is_correct' => false, 'match_key' => '1/8', 'order' => 1],
                                    ['label' => null, 'option_text' => '25%', 'is_correct' => false, 'match_key' => '1/4', 'order' => 2],
                                    ['label' => null, 'option_text' => '50%', 'is_correct' => false, 'match_key' => '1/2', 'order' => 3],
                                    ['label' => null, 'option_text' => '75%', 'is_correct' => false, 'match_key' => '3/4', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan masalah kontekstual dengan operasi perhitungannya!',
                                'explanation' => 'Masalah kontekstual pecahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mencari 20% dari total', 'is_correct' => false, 'match_key' => 'Dikalikan dengan 0,20', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Membagi 12 liter ke botol 0,5 liter', 'is_correct' => false, 'match_key' => '12 dibagi 0,5 = 24', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mencari sisa setelah terpakai 3/4', 'is_correct' => false, 'match_key' => 'Dikalikan dengan 1/4', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Diskon 10% dari Rp100.000', 'is_correct' => false, 'match_key' => 'Potongan Rp10.000', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan harga!',
                                'explanation' => 'Diskon bertingkat tidak dijumlahkan langsung.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Harga barang Rp100.000 diskon 10% menjadi Rp90.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bunga tabungan 5% per tahun dari Rp1.000.000 adalah Rp50.000.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Membagi dengan 0,1 sama dengan mengalikan dengan 10.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Diskon 20% dan diskon 30% berturut-turut sama dengan diskon 50%.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran konversi satuan!',
                                'explanation' => '1 1/2 jam = 90 menit (bukan 60 menit).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '1/2 kilogram sama dengan 500 gram.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '3/4 meter sama dengan 75 sentimeter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => '1/4 liter sama dengan 250 mililiter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => '1 1/2 jam sama dengan 60 menit.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
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
                                'prompt' => 'Sepeda seharga Rp800.000 didiskon 15%. Besar potongan diskon adalah Rp....',
                                'explanation' => '15% x 800.000 = Rp120.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '120000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai 2/5 dari Rp50.000 adalah Rp....',
                                'explanation' => '2/5 x 50.000 = Rp20.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '20000', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak siswa perempuan adalah 28 dari 50 siswa. Persentase siswa perempuan adalah ...%.',
                                'explanation' => '28/50 x 100% = 56%.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '56', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah tangki berisi 1.200 liter minyak dialirkan 3/4 bagian. Sisa minyak adalah ... liter.',
                                'explanation' => '1/4 x 1.200 = 300 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '300', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '0,75 jam sama dengan ... menit.',
                                'explanation' => '0,75 x 60 = 45 menit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '45', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 1,25 x 8 adalah ....',
                                'explanation' => '1,25 x 8 = 10.',
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
                                'prompt' => 'Sebanyak 35% siswa menyukai renang dari 60 siswa. Banyak siswa penyuka renang adalah ... anak.',
                                'explanation' => '35% x 60 = 21 anak.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '21', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Pak Arman memperoleh gaji bulanan sebesar Rp4.500.000. Sebanyak 1/3 bagian digunakan untuk keperluan dapur dan rumah tangga, 20% untuk biaya pendidikan anak, 1/5 bagian untuk cicilan rumah, dan sisanya ditabung. Tentukan:
(a) Nominal untuk keperluan rumah tangga
(b) Nominal untuk pendidikan anak
(c) Nominal untuk cicilan rumah
(d) Nominal uang yang ditabung Pak Arman',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
(a) Keperluan rumah tangga = 1/3 x Rp4.500.000 = Rp1.500.000
(b) Pendidikan anak = 20% x Rp4.500.000 = Rp900.000
(c) Cicilan rumah = 1/5 x Rp4.500.000 = Rp900.000
(d) Uang ditabung = Rp4.500.000 - (1.500.000 + 900.000 + 900.000) = Rp4.500.000 - Rp3.300.000 = Rp1.200.000.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah koperasi sekolah membeli 12 lusin buku tulis dengan harga Rp36.000 per lusin. Koperasi mendapat potongan harga (diskon) sebesar 10% karena membeli dalam jumlah banyak. Jika buku tersebut dijual kembali seharga Rp3.500 per buah, hitunglah keuntungan bersih yang diperoleh koperasi sekolah!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Total harga beli sebelum diskon = 12 x Rp36.000 = Rp432.000.
2. Potongan diskon 10% = 10/100 x Rp432.000 = Rp43.200.
3. Total harga beli setelah diskon = Rp432.000 - Rp43.200 = Rp388.800.
4. Total buku = 12 lusin x 12 buah = 144 buah.
5. Total penjualan = 144 x Rp3.500 = Rp504.000.
6. Keuntungan bersih = Penjualan - Modal beli = Rp504.000 - Rp388.800 = Rp115.200.
Jadi, keuntungan bersih koperasi adalah Rp115.200.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Di sebuah gudang terdapat beras sebanyak 2,4 ton. Hari pertama terjual 3/8 bagian. Hari kedua terjual 0,4 bagian dari persediaan awal. Berapa kilogram sisa beras yang masih ada di gudang sekarang? Tuliskan langkah perhitungannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Konversi ton ke kg: 2,4 ton = 2,4 x 1.000 kg = 2.400 kg.
2. Penjualan hari pertama = 3/8 x 2.400 kg = 900 kg.
3. Penjualan hari kedua = 0,4 x 2.400 kg = 960 kg.
4. Total beras terjual = 900 kg + 960 kg = 1.860 kg.
5. Sisa beras di gudang = 2.400 kg - 1.860 kg = 540 kg.
Jadi, sisa beras di gudang adalah 540 kg.',
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
