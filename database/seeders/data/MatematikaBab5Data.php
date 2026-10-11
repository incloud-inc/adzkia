<?php

namespace Database\Seeders\Data;

class MatematikaBab5Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 5: Bilangan sampai 20',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 5 Matematika Kelas 1 SD Kurikulum Merdeka: Membilang bilangan 11 sampai 20, nilai tempat puluhan dan satuan, serta membandingkan dan mengurutkan bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Sekelompok 10 pensil diikat dan 2 pensil lepas]
Banyak pensil pada gambar adalah ....',
                                'explanation' => '10 + 2 = 12 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "lima belas" adalah ....',
                                'explanation' => 'Lima belas ditulis 15.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '50', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka "18" adalah ....',
                                'explanation' => '18 dibaca delapan belas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'delapan belas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tujuh belas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sembilan belas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat setelah angka 13 adalah ....',
                                'explanation' => 'Setelah 13 adalah 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang berada sebelum angka 20 adalah ....',
                                'explanation' => 'Sebelum 20 adalah 19.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '19', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '18', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '21', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 16 terdiri atas ....',
                                'explanation' => '16 = 1 puluhan + 6 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 6 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 14 donat di piring dan 11 donat di nampan]
14 donat ... daripada 11 donat.',
                                'explanation' => '14 lebih banyak dari 11.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil adalah ....',
                                'explanation' => 'Urutan naik: 11, 12, 13, 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '11, 12, 13, 14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '14, 13, 12, 11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12, 11, 14, 13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan antara 16 dan 18 adalah ....',
                                'explanation' => 'Antara 16 dan 18 adalah 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '15', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '19', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "dua puluh" adalah ....',
                                'explanation' => 'Dua puluh ditulis 20.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 10 permen dalam toples dan 4 permen di luar]
Jumlah permen seluruhnya ada ... butir.',
                                'explanation' => '14',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "tujuh belas" ditulis angka ....',
                                'explanation' => '17',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 5 satuan nilainya adalah ....',
                                'explanation' => '15',
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
                                'prompt' => 'Urutkan bilangan berikut dari yang terbesar ke yang terkecil: 12, 19, 15, 11, 17!',
                                'explanation' => 'Urutan: 19, 17, 15, 12, 11.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 16 kelereng dan Made punya 13 kelereng]
Bandingkan kelereng Budi dan kelereng Made! Siapakah yang mempunyai kelereng lebih banyak?',
                                'explanation' => 'Kelereng Budi (16) lebih banyak daripada kelereng Made (13).',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 5: Bilangan sampai 20',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 5 Matematika Kelas 1 SD Kurikulum Merdeka: Membilang bilangan 11 sampai 20, nilai tempat puluhan dan satuan, serta membandingkan dan mengurutkan bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Sekelompok 10 pensil diikat dan 2 pensil lepas]
Banyak pensil pada gambar adalah ....',
                                'explanation' => '10 + 2 = 12 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "tiga belas" adalah ....',
                                'explanation' => 'Tiga belas ditulis 13.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '31', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka "18" adalah ....',
                                'explanation' => '18 dibaca delapan belas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'delapan belas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tujuh belas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sembilan belas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat setelah angka 13 adalah ....',
                                'explanation' => 'Setelah 13 adalah 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang berada sebelum angka 20 adalah ....',
                                'explanation' => 'Sebelum 20 adalah 19.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '19', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '18', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '21', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 16 terdiri atas ....',
                                'explanation' => '16 = 1 puluhan + 6 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 6 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 17 ... daripada 19.',
                                'explanation' => '17 lebih kecil dari 19.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih kecil', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih besar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama dengan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil adalah ....',
                                'explanation' => 'Urutan naik: 11, 12, 13, 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '11, 12, 13, 14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '14, 13, 12, 11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12, 11, 14, 13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan antara 16 dan 18 adalah ....',
                                'explanation' => 'Antara 16 dan 18 adalah 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '15', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '19', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "dua puluh" adalah ....',
                                'explanation' => 'Dua puluh ditulis 20.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 10 permen dalam toples dan 4 permen di luar]
Jumlah permen seluruhnya ada ... butir.',
                                'explanation' => '14',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "tujuh belas" ditulis angka ....',
                                'explanation' => '17',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 5 satuan nilainya adalah ....',
                                'explanation' => '15',
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
                                'prompt' => 'Urutkan bilangan berikut dari yang terbesar ke yang terkecil: 12, 19, 15, 11, 17!',
                                'explanation' => 'Urutan: 19, 17, 15, 12, 11.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 16 kelereng dan Made punya 13 kelereng]
Bandingkan kelereng Budi dan kelereng Made! Siapakah yang mempunyai kelereng lebih banyak?',
                                'explanation' => 'Kelereng Budi (16) lebih banyak daripada kelereng Made (13).',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 5: Bilangan sampai 20',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 5 Matematika Kelas 1 SD Kurikulum Merdeka: Membilang bilangan 11 sampai 20, nilai tempat puluhan dan satuan, serta membandingkan dan mengurutkan bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Sekelompok 10 pensil diikat dan 2 pensil lepas]
Banyak pensil pada gambar adalah ....',
                                'explanation' => '10 + 2 = 12 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "lima belas" adalah ....',
                                'explanation' => 'Lima belas ditulis 15.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '50', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka "14" adalah ....',
                                'explanation' => '14 dibaca empat belas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'empat belas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tiga belas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lima belas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat setelah angka 13 adalah ....',
                                'explanation' => 'Setelah 13 adalah 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang berada sebelum angka 20 adalah ....',
                                'explanation' => 'Sebelum 20 adalah 19.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '19', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '18', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '21', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 19 terdiri atas ....',
                                'explanation' => '19 = 1 puluhan + 9 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 9 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2 puluhan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 14 donat di piring dan 11 donat di nampan]
14 donat ... daripada 11 donat.',
                                'explanation' => '14 lebih banyak dari 11.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil adalah ....',
                                'explanation' => 'Urutan naik: 11, 12, 13, 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '11, 12, 13, 14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '14, 13, 12, 11', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12, 11, 14, 13', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan antara 16 dan 18 adalah ....',
                                'explanation' => 'Antara 16 dan 18 adalah 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '15', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '19', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "dua puluh" adalah ....',
                                'explanation' => 'Dua puluh ditulis 20.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '20', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 10 permen dalam toples dan 4 permen di luar]
Jumlah permen seluruhnya ada ... butir.',
                                'explanation' => '14',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "tujuh belas" ditulis angka ....',
                                'explanation' => '17',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 5 satuan nilainya adalah ....',
                                'explanation' => '15',
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
                                'prompt' => 'Urutkan bilangan berikut dari yang terbesar ke yang terkecil: 12, 19, 15, 11, 17!',
                                'explanation' => 'Urutan: 19, 17, 15, 12, 11.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 16 kelereng dan Made punya 13 kelereng]
Bandingkan kelereng Budi dan kelereng Made! Siapakah yang mempunyai kelereng lebih banyak?',
                                'explanation' => 'Kelereng Budi (16) lebih banyak daripada kelereng Made (13).',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
