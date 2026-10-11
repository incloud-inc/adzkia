<?php

namespace Database\Seeders\Data;

class MatematikaBab6Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 6: Operasi Pengurangan sampai 20',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 6 Matematika Kelas 1 SD Kurikulum Merdeka: Konsep pengurangan, mengambil/mencoret objek konkret, dan operasi pengurangan sampai 20.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 8 balon, 3 balon meletus tanda silang]
Sisa balon yang tidak meletus adalah ....',
                                'explanation' => '8 dikurangi 3 sama dengan 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 9 - 4 adalah ....',
                                'explanation' => '9 - 4 = 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '10 - 6 = ....',
                                'explanation' => '10 - 6 = 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 12 telur di wadah, 2 telur pecah]
Banyak telur yang masih utuh adalah ....',
                                'explanation' => '12 - 2 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil pengurangan 15 - 5 adalah ....',
                                'explanation' => '15 - 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '14 - 3 = ....',
                                'explanation' => '14 - 3 = 11.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '11', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '10', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 8 = ....',
                                'explanation' => '18 - 8 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 16 - 4 adalah ....',
                                'explanation' => '16 - 4 = 12.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ibu membeli 7 kue, dimakan adik 2 kue. Sisa kue ibu adalah ....',
                                'explanation' => '7 - 2 = 5 kue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '20 - 5 = ....',
                                'explanation' => '20 - 5 = 15.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '14', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: 7 apel, diambil 3 apel]
7 - 3 = ....',
                                'explanation' => '4',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 15 - 4 adalah ....',
                                'explanation' => '11',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Siti punya 10 pensil warna, 2 pensil patah. Banyak pensil yang utuh ada ... batang.',
                                'explanation' => '8',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: 12 buah mangga di keranjang, diambil 4 buah mangga]
Tuliskan kalimat matematika pengurangan berdasarkan gambar dan hitung sisanya!',
                                'explanation' => 'Kalimat matematika: 12 - 4 = 8 mangga.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Paman membawa 15 buah pisang. Diberikan kepada tetangga sebanyak 5 buah. Berapa buah pisang paman yang tersisa? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 15 - 5 = 10 buah pisang.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 6: Operasi Pengurangan sampai 20',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 6 Matematika Kelas 1 SD Kurikulum Merdeka: Konsep pengurangan, mengambil/mencoret objek konkret, dan operasi pengurangan sampai 20.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 8 balon, 3 balon meletus tanda silang]
Sisa balon yang tidak meletus adalah ....',
                                'explanation' => '8 dikurangi 3 sama dengan 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 13 - 3 adalah ....',
                                'explanation' => '13 - 3 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '10 - 6 = ....',
                                'explanation' => '10 - 6 = 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 12 telur di wadah, 2 telur pecah]
Banyak telur yang masih utuh adalah ....',
                                'explanation' => '12 - 2 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil pengurangan 15 - 5 adalah ....',
                                'explanation' => '15 - 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '14 - 3 = ....',
                                'explanation' => '14 - 3 = 11.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '11', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '10', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 8 = ....',
                                'explanation' => '18 - 8 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 17 - 5 adalah ....',
                                'explanation' => '17 - 5 = 12.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ibu membeli 7 kue, dimakan adik 2 kue. Sisa kue ibu adalah ....',
                                'explanation' => '7 - 2 = 5 kue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '20 - 5 = ....',
                                'explanation' => '20 - 5 = 15.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '14', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: 7 apel, diambil 3 apel]
7 - 3 = ....',
                                'explanation' => '4',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 15 - 4 adalah ....',
                                'explanation' => '11',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Siti punya 10 pensil warna, 2 pensil patah. Banyak pensil yang utuh ada ... batang.',
                                'explanation' => '8',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: 12 buah mangga di keranjang, diambil 4 buah mangga]
Tuliskan kalimat matematika pengurangan berdasarkan gambar dan hitung sisanya!',
                                'explanation' => 'Kalimat matematika: 12 - 4 = 8 mangga.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Paman membawa 15 buah pisang. Diberikan kepada tetangga sebanyak 5 buah. Berapa buah pisang paman yang tersisa? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 15 - 5 = 10 buah pisang.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 6: Operasi Pengurangan sampai 20',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 6 Matematika Kelas 1 SD Kurikulum Merdeka: Konsep pengurangan, mengambil/mencoret objek konkret, dan operasi pengurangan sampai 20.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 8 balon, 3 balon meletus tanda silang]
Sisa balon yang tidak meletus adalah ....',
                                'explanation' => '8 dikurangi 3 sama dengan 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 9 - 4 adalah ....',
                                'explanation' => '9 - 4 = 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '12 - 4 = ....',
                                'explanation' => '12 - 4 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 12 telur di wadah, 2 telur pecah]
Banyak telur yang masih utuh adalah ....',
                                'explanation' => '12 - 2 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil pengurangan 15 - 5 adalah ....',
                                'explanation' => '15 - 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 19 - 9 adalah ....',
                                'explanation' => '19 - 9 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 8 = ....',
                                'explanation' => '18 - 8 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 16 - 4 adalah ....',
                                'explanation' => '16 - 4 = 12.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ibu membeli 7 kue, dimakan adik 2 kue. Sisa kue ibu adalah ....',
                                'explanation' => '7 - 2 = 5 kue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '20 - 5 = ....',
                                'explanation' => '20 - 5 = 15.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '14', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: 7 apel, diambil 3 apel]
7 - 3 = ....',
                                'explanation' => '4',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 15 - 4 adalah ....',
                                'explanation' => '11',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Siti punya 10 pensil warna, 2 pensil patah. Banyak pensil yang utuh ada ... batang.',
                                'explanation' => '8',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: 12 buah mangga di keranjang, diambil 4 buah mangga]
Tuliskan kalimat matematika pengurangan berdasarkan gambar dan hitung sisanya!',
                                'explanation' => 'Kalimat matematika: 12 - 4 = 8 mangga.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Paman membawa 15 buah pisang. Diberikan kepada tetangga sebanyak 5 buah. Berapa buah pisang paman yang tersisa? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 15 - 5 = 10 buah pisang.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
