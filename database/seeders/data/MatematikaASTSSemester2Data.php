<?php

namespace Database\Seeders\Data;

class MatematikaASTSSemester2Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASTS Semester 2 (Bab 5 dan 6) #1',
                'type' => 'asts',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Paket #1 Matematika Kelas 1 SD Kurikulum Merdeka: Bilangan sampai 20 dan Operasi Pengurangan sampai 20.',
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
                                'prompt' => '[Keterangan Gambar: 10 pensil diikat dan 3 pensil di luar ikat]
Banyak pensil adalah ....',
                                'explanation' => '10 + 3 = 13 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "enam belas" adalah ....',
                                'explanation' => 'Enam belas = 16.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '16', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '61', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka 19 adalah ....',
                                'explanation' => '19 = sembilan belas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sembilan belas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'delapan belas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tujuh belas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 15 terdiri atas ....',
                                'explanation' => '15 = 1 puluhan + 5 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 4 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 ... daripada 14.',
                                'explanation' => '18 lebih besar dari 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih besar', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih kecil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama dengan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 15, 12, 17, 13 adalah ....',
                                'explanation' => 'Urutan: 12, 13, 15, 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12, 13, 15, 17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '17, 15, 13, 12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12, 15, 13, 17', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 8 - 3 adalah ....',
                                'explanation' => '8 - 3 = 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 10 jeruk diambil 4 jeruk]
Sisa jeruk adalah ....',
                                'explanation' => '10 - 4 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 16 - 6 adalah ....',
                                'explanation' => '16 - 6 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 5 = ....',
                                'explanation' => '18 - 5 = 13.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
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
                                'prompt' => 'Lambang bilangan "empat belas" adalah ....',
                                'explanation' => '14',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 8 satuan nilainya ....',
                                'explanation' => '18',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 17 dan 19 adalah ....',
                                'explanation' => '18',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 10 - 7 adalah ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '15 - 3 = ....',
                                'explanation' => '12',
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
                                'prompt' => 'Urutkan bilangan berikut dari yang paling kecil ke yang paling besar: 14, 11, 20, 16, 13!',
                                'explanation' => 'Urutan: 11, 13, 14, 16, 20.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 18 kelereng dan Ali punya 15 kelereng]
Berapa selisih banyak kelereng Budi dan kelereng Ali? Tuliskan cara hitungnya!',
                                'explanation' => 'Selisih: 18 - 15 = 3 kelereng.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan bentuk puluhan dan satuan dari bilangan 17!',
                                'explanation' => '17 = 1 puluhan dan 7 satuan.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Siti memetik 16 buah bunga mawar di kebun. Diberikan kepada ibu 6 buah. Berapa sisa bunga mawar Siti sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 16 - 6 = 10 buah bunga mawar.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua contoh kalimat matematika pengurangan yang hasilnya sama dengan 10!',
                                'explanation' => 'Contoh: 15 - 5 = 10, 12 - 2 = 10, 14 - 4 = 10, atau 10 - 0 = 10.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 2 (Bab 5 dan 6) #2',
                'type' => 'asts',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Paket #2 Matematika Kelas 1 SD Kurikulum Merdeka: Bilangan sampai 20 dan Operasi Pengurangan sampai 20.',
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
                                'prompt' => '[Keterangan Gambar: 10 pensil diikat dan 3 pensil di luar ikat]
Banyak pensil adalah ....',
                                'explanation' => '10 + 3 = 13 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "dua belas" adalah ....',
                                'explanation' => 'Dua belas = 12.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '21', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka 19 adalah ....',
                                'explanation' => '19 = sembilan belas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sembilan belas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'delapan belas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tujuh belas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 15 terdiri atas ....',
                                'explanation' => '15 = 1 puluhan + 5 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 4 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 ... daripada 14.',
                                'explanation' => '18 lebih besar dari 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih besar', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih kecil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama dengan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 15, 12, 17, 13 adalah ....',
                                'explanation' => 'Urutan: 12, 13, 15, 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12, 13, 15, 17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '17, 15, 13, 12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12, 15, 13, 17', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 8 - 3 adalah ....',
                                'explanation' => '8 - 3 = 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 10 jeruk diambil 4 jeruk]
Sisa jeruk adalah ....',
                                'explanation' => '10 - 4 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 14 - 4 adalah ....',
                                'explanation' => '14 - 4 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 5 = ....',
                                'explanation' => '18 - 5 = 13.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
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
                                'prompt' => 'Lambang bilangan "empat belas" adalah ....',
                                'explanation' => '14',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 8 satuan nilainya ....',
                                'explanation' => '18',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 17 dan 19 adalah ....',
                                'explanation' => '18',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 10 - 7 adalah ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '15 - 3 = ....',
                                'explanation' => '12',
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
                                'prompt' => 'Urutkan bilangan berikut dari yang paling kecil ke yang paling besar: 14, 11, 20, 16, 13!',
                                'explanation' => 'Urutan: 11, 13, 14, 16, 20.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 18 kelereng dan Ali punya 15 kelereng]
Berapa selisih banyak kelereng Budi dan kelereng Ali? Tuliskan cara hitungnya!',
                                'explanation' => 'Selisih: 18 - 15 = 3 kelereng.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan bentuk puluhan dan satuan dari bilangan 17!',
                                'explanation' => '17 = 1 puluhan dan 7 satuan.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Siti memetik 16 buah bunga mawar di kebun. Diberikan kepada ibu 6 buah. Berapa sisa bunga mawar Siti sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 16 - 6 = 10 buah bunga mawar.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua contoh kalimat matematika pengurangan yang hasilnya sama dengan 10!',
                                'explanation' => 'Contoh: 15 - 5 = 10, 12 - 2 = 10, 14 - 4 = 10, atau 10 - 0 = 10.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 2 (Bab 5 dan 6) #3',
                'type' => 'asts',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Paket #3 Matematika Kelas 1 SD Kurikulum Merdeka: Bilangan sampai 20 dan Operasi Pengurangan sampai 20.',
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
                                'prompt' => '[Keterangan Gambar: 10 pensil diikat dan 3 pensil di luar ikat]
Banyak pensil adalah ....',
                                'explanation' => '10 + 3 = 13 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "enam belas" adalah ....',
                                'explanation' => 'Enam belas = 16.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '16', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '61', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka 19 adalah ....',
                                'explanation' => '19 = sembilan belas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sembilan belas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'delapan belas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tujuh belas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 15 terdiri atas ....',
                                'explanation' => '15 = 1 puluhan + 5 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 4 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '13 ... daripada 16.',
                                'explanation' => '13 lebih kecil dari 16.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih kecil', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih besar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama dengan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 15, 12, 17, 13 adalah ....',
                                'explanation' => 'Urutan: 12, 13, 15, 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '12, 13, 15, 17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '17, 15, 13, 12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '12, 15, 13, 17', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 8 - 3 adalah ....',
                                'explanation' => '8 - 3 = 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 10 jeruk diambil 4 jeruk]
Sisa jeruk adalah ....',
                                'explanation' => '10 - 4 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 16 - 6 adalah ....',
                                'explanation' => '16 - 6 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '17 - 4 = ....',
                                'explanation' => '17 - 4 = 13.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
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
                                'prompt' => 'Lambang bilangan "empat belas" adalah ....',
                                'explanation' => '14',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 8 satuan nilainya ....',
                                'explanation' => '18',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 17 dan 19 adalah ....',
                                'explanation' => '18',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 10 - 7 adalah ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '15 - 3 = ....',
                                'explanation' => '12',
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
                                'prompt' => 'Urutkan bilangan berikut dari yang paling kecil ke yang paling besar: 14, 11, 20, 16, 13!',
                                'explanation' => 'Urutan: 11, 13, 14, 16, 20.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 18 kelereng dan Ali punya 15 kelereng]
Berapa selisih banyak kelereng Budi dan kelereng Ali? Tuliskan cara hitungnya!',
                                'explanation' => 'Selisih: 18 - 15 = 3 kelereng.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan bentuk puluhan dan satuan dari bilangan 17!',
                                'explanation' => '17 = 1 puluhan dan 7 satuan.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Siti memetik 16 buah bunga mawar di kebun. Diberikan kepada ibu 6 buah. Berapa sisa bunga mawar Siti sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 16 - 6 = 10 buah bunga mawar.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua contoh kalimat matematika pengurangan yang hasilnya sama dengan 10!',
                                'explanation' => 'Contoh: 15 - 5 = 10, 12 - 2 = 10, 14 - 4 = 10, atau 10 - 0 = 10.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
