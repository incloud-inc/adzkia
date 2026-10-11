<?php

namespace Database\Seeders\Data;

class MatematikaBab2Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 2: Menguraikan dan Menyusun Bilangan',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 2 Matematika Kelas 1 SD Kurikulum Merdeka: Pasangan bilangan (number bonds), menguraikan dan menyusun bilangan sampai 10.',
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
                                'prompt' => '[Keterangan Gambar: 5 kelereng dipisah menjadi 2 kelereng di piring merah dan 3 kelereng di piring biru]
Bilangan 5 dapat diuraikan menjadi ....',
                                'explanation' => '5 dapat diuraikan menjadi 2 dan 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2 dan 4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 4 dapat disusun dari pasangan bilangan ....',
                                'explanation' => '1 dan 3 jika digabung menjadi 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2 and 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram pasangan bilangan 6 dengan cabang 4 dan titik-titik]
Pasangan bilangan 4 untuk menyusun bilangan 6 adalah ....',
                                'explanation' => '4 dan 2 menyusun 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 7 dapat diuraikan menjadi ....',
                                'explanation' => '5 + 2 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan 3 dan 3 jika digabungkan membentuk bilangan ....',
                                'explanation' => '3 dan 3 menyusun 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 8 donat diuraikan menjadi 4 donat cokelat dan 4 donat keju]
Bilangan 8 diuraikan menjadi ....',
                                'explanation' => '8 adalah 4 dan 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 dan 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3 dan 4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5 dan 2', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 3 dapat diuraikan menjadi ....',
                                'explanation' => '1 dan 2 membentuk 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang membentuk 10 adalah ....',
                                'explanation' => '5 dan 5 menyusun 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika 9 diuraikan menjadi 7 dan ..., maka bilangan yang hilang adalah ....',
                                'explanation' => '7 dan 2 menyusun 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 2 dapat diuraikan menjadi ....',
                                'explanation' => '1 dan 1 menyusun 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 1', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '0 dan 0', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 4 balok dipisah 2 dan 2]
Bilangan 4 dapat diuraikan menjadi 2 dan ....',
                                'explanation' => 'Jawaban: 2.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 3 dan ... menyusun bilangan 7.',
                                'explanation' => 'Jawaban: 4.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 tersusun dari 1 dan ....',
                                'explanation' => 'Jawaban: 4.',
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
                                'prompt' => '[Keterangan Gambar: Enam butir telur dalam wadah]
Tuliskan 2 cara berbeda untuk menguraikan bilangan 6!',
                                'explanation' => 'Contoh: 1 dan 5, 2 dan 4, atau 3 dan 3.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ibu memiliki 8 buah jeruk. Jeruk tersebut dibagikan kepada Budi dan Siti. Tuliskan satu kemungkinan cara pembagian jeruk tersebut!',
                                'explanation' => 'Contoh: Budi 4 dan Siti 4, atau Budi 5 dan Siti 3.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 2: Menguraikan dan Menyusun Bilangan',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 2 Matematika Kelas 1 SD Kurikulum Merdeka: Pasangan bilangan (number bonds), menguraikan dan menyusun bilangan sampai 10.',
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
                                'prompt' => '[Keterangan Gambar: 5 kelereng dipisah menjadi 2 kelereng di piring merah dan 3 kelereng di piring biru]
Bilangan 5 dapat diuraikan menjadi ....',
                                'explanation' => '5 dapat diuraikan menjadi 2 dan 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2 dan 4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 5 tersusun dari ....',
                                'explanation' => '1 dan 4 membentuk 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram pasangan bilangan 6 dengan cabang 4 dan titik-titik]
Pasangan bilangan 4 untuk menyusun bilangan 6 adalah ....',
                                'explanation' => '4 dan 2 menyusun 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 7 dapat diuraikan menjadi ....',
                                'explanation' => '5 + 2 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan 3 dan 3 jika digabungkan membentuk bilangan ....',
                                'explanation' => '3 dan 3 menyusun 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 8 donat diuraikan menjadi 4 donat cokelat dan 4 donat keju]
Bilangan 8 diuraikan menjadi ....',
                                'explanation' => '8 adalah 4 dan 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 dan 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3 dan 4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5 dan 2', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 3 dapat diuraikan menjadi ....',
                                'explanation' => '1 dan 2 membentuk 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang membentuk 8 adalah ....',
                                'explanation' => '6 dan 2 menyusun 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 and 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 and 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika 9 diuraikan menjadi 7 dan ..., maka bilangan yang hilang adalah ....',
                                'explanation' => '7 dan 2 menyusun 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 2 dapat diuraikan menjadi ....',
                                'explanation' => '1 dan 1 menyusun 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 1', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '0 dan 0', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 4 balok dipisah 2 dan 2]
Bilangan 4 dapat diuraikan menjadi 2 dan ....',
                                'explanation' => 'Jawaban: 2.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 3 dan ... menyusun bilangan 7.',
                                'explanation' => 'Jawaban: 4.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 tersusun dari 1 dan ....',
                                'explanation' => 'Jawaban: 4.',
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
                                'prompt' => '[Keterangan Gambar: Enam butir telur dalam wadah]
Tuliskan 2 cara berbeda untuk menguraikan bilangan 6!',
                                'explanation' => 'Contoh: 1 dan 5, 2 dan 4, atau 3 dan 3.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ibu memiliki 8 buah jeruk. Jeruk tersebut dibagikan kepada Budi dan Siti. Tuliskan satu kemungkinan cara pembagian jeruk tersebut!',
                                'explanation' => 'Contoh: Budi 4 dan Siti 4, atau Budi 5 dan Siti 3.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 2: Menguraikan dan Menyusun Bilangan',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 2 Matematika Kelas 1 SD Kurikulum Merdeka: Pasangan bilangan (number bonds), menguraikan dan menyusun bilangan sampai 10.',
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
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '3 dan 3 menyusun 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 and 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 4 dapat disusun dari pasangan bilangan ....',
                                'explanation' => '1 dan 3 jika digabung menjadi 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2 and 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram pasangan bilangan 6 dengan cabang 4 dan titik-titik]
Pasangan bilangan 4 untuk menyusun bilangan 6 adalah ....',
                                'explanation' => '4 dan 2 menyusun 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 7 dapat diuraikan menjadi ....',
                                'explanation' => '5 + 2 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan 3 dan 3 jika digabungkan membentuk bilangan ....',
                                'explanation' => '3 dan 3 menyusun 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 8 donat diuraikan menjadi 4 donat cokelat dan 4 donat keju]
Bilangan 8 diuraikan menjadi ....',
                                'explanation' => '8 adalah 4 dan 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 dan 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3 dan 4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5 dan 2', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 3 dapat diuraikan menjadi ....',
                                'explanation' => '1 dan 2 membentuk 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang membentuk 10 adalah ....',
                                'explanation' => '8 dan 2 menyusun 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8 dan 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika 9 diuraikan menjadi 7 dan ..., maka bilangan yang hilang adalah ....',
                                'explanation' => '7 dan 2 menyusun 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 2 dapat diuraikan menjadi ....',
                                'explanation' => '1 dan 1 menyusun 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 1', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '0 dan 0', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 4 balok dipisah 2 dan 2]
Bilangan 4 dapat diuraikan menjadi 2 dan ....',
                                'explanation' => 'Jawaban: 2.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 3 dan ... menyusun bilangan 7.',
                                'explanation' => 'Jawaban: 4.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 tersusun dari 1 dan ....',
                                'explanation' => 'Jawaban: 4.',
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
                                'prompt' => '[Keterangan Gambar: Enam butir telur dalam wadah]
Tuliskan 2 cara berbeda untuk menguraikan bilangan 6!',
                                'explanation' => 'Contoh: 1 dan 5, 2 dan 4, atau 3 dan 3.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ibu memiliki 8 buah jeruk. Jeruk tersebut dibagikan kepada Budi dan Siti. Tuliskan satu kemungkinan cara pembagian jeruk tersebut!',
                                'explanation' => 'Contoh: Budi 4 dan Siti 4, atau Budi 5 dan Siti 3.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
