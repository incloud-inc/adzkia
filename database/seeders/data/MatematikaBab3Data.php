<?php

namespace Database\Seeders\Data;

class MatematikaBab3Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 3: Operasi Penjumlahan sampai 10',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 3 Matematika Kelas 1 SD Kurikulum Merdeka: Konsep penjumlahan, menggabungkan objek konkret, dan operasi hitung penjumlahan sampai 10.',
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
                                'prompt' => '[Keterangan Gambar: 3 buah jeruk digabung dengan 2 buah jeruk]
Hasil dari 3 + 2 adalah ....',
                                'explanation' => '3 jeruk ditambah 2 jeruk sama dengan 5 jeruk.',
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
                                'prompt' => '4 + 1 = ....',
                                'explanation' => '4 ditambah 1 hasilnya 5.',
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
                                'prompt' => '[Keterangan Gambar: 2 burung di pohon, datang lagi 4 burung]
Banyak burung seluruhnya adalah ....',
                                'explanation' => '2 + 4 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil penjumlahan 5 + 3 adalah ....',
                                'explanation' => '5 + 3 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '7 + 0 = ....',
                                'explanation' => 'Bilangan berapa pun ditambah 0 hasilnya tetap.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '0', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 6 + 4 adalah ....',
                                'explanation' => '6 + 4 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 3 kelereng, Siti memberi 3 kelereng]
Kalimat matematika yang benar adalah ....',
                                'explanation' => '3 kelereng ditambah 3 kelereng menjadi 6 kelereng.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 + 3 = 6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3 + 2 = 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 + 4 = 7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '1 + 8 = ....',
                                'explanation' => '1 + 8 = 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil penjumlahan yang bernilai 7 adalah ....',
                                'explanation' => '4 + 3 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 + 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 + 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5 + 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '5 + 5 = ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 3 pensil ditambah 4 pensil]
3 + 4 = ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 5 + 2 adalah ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Ali punya 4 bola, ayah membelikan 1 bola lagi. Jumlah bola Ali sekarang ada ... buah.',
                                'explanation' => '5',
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
                                'prompt' => '[Keterangan Gambar: 5 ikan merah dan 3 ikan kuning]
Tuliskan kalimat matematika penjumlahan berdasarkan gambar dan hitung hasilnya!',
                                'explanation' => 'Kalimat matematika: 5 + 3 = 8.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Siti mempunyai 2 buah apel. Ibu memberi Siti 4 buah apel lagi. Berapa banyak buah apel Siti sekarang? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 2 + 4 = 6 buah apel.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 3: Operasi Penjumlahan sampai 10',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 3 Matematika Kelas 1 SD Kurikulum Merdeka: Konsep penjumlahan, menggabungkan objek konkret, dan operasi hitung penjumlahan sampai 10.',
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
                                'prompt' => '[Keterangan Gambar: 3 buah jeruk digabung dengan 2 buah jeruk]
Hasil dari 3 + 2 adalah ....',
                                'explanation' => '3 jeruk ditambah 2 jeruk sama dengan 5 jeruk.',
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
                                'prompt' => '2 + 6 = ....',
                                'explanation' => '2 + 6 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 2 burung di pohon, datang lagi 4 burung]
Banyak burung seluruhnya adalah ....',
                                'explanation' => '2 + 4 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil penjumlahan 5 + 3 adalah ....',
                                'explanation' => '5 + 3 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '7 + 0 = ....',
                                'explanation' => 'Bilangan berapa pun ditambah 0 hasilnya tetap.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '0', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 6 + 4 adalah ....',
                                'explanation' => '6 + 4 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 3 kelereng, Siti memberi 3 kelereng]
Kalimat matematika yang benar adalah ....',
                                'explanation' => '3 kelereng ditambah 3 kelereng menjadi 6 kelereng.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 + 3 = 6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3 + 2 = 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 + 4 = 7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '1 + 8 = ....',
                                'explanation' => '1 + 8 = 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil penjumlahan yang bernilai 6 adalah ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 + 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 + 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 + 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '5 + 5 = ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 3 pensil ditambah 4 pensil]
3 + 4 = ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 5 + 2 adalah ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Ali punya 4 bola, ayah membelikan 1 bola lagi. Jumlah bola Ali sekarang ada ... buah.',
                                'explanation' => '5',
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
                                'prompt' => '[Keterangan Gambar: 5 ikan merah dan 3 ikan kuning]
Tuliskan kalimat matematika penjumlahan berdasarkan gambar dan hitung hasilnya!',
                                'explanation' => 'Kalimat matematika: 5 + 3 = 8.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Siti mempunyai 2 buah apel. Ibu memberi Siti 4 buah apel lagi. Berapa banyak buah apel Siti sekarang? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 2 + 4 = 6 buah apel.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 3: Operasi Penjumlahan sampai 10',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 3 Matematika Kelas 1 SD Kurikulum Merdeka: Konsep penjumlahan, menggabungkan objek konkret, dan operasi hitung penjumlahan sampai 10.',
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
                                'prompt' => '[Keterangan Gambar: 3 buah jeruk digabung dengan 2 buah jeruk]
Hasil dari 3 + 2 adalah ....',
                                'explanation' => '3 jeruk ditambah 2 jeruk sama dengan 5 jeruk.',
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
                                'prompt' => '4 + 1 = ....',
                                'explanation' => '4 ditambah 1 hasilnya 5.',
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
                                'prompt' => '[Keterangan Gambar: 2 burung di pohon, datang lagi 4 burung]
Banyak burung seluruhnya adalah ....',
                                'explanation' => '2 + 4 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 4 + 4 adalah ....',
                                'explanation' => '4 + 4 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '7 + 0 = ....',
                                'explanation' => 'Bilangan berapa pun ditambah 0 hasilnya tetap.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '0', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 7 + 2 adalah ....',
                                'explanation' => '7 + 2 = 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Budi punya 3 kelereng, Siti memberi 3 kelereng]
Kalimat matematika yang benar adalah ....',
                                'explanation' => '3 kelereng ditambah 3 kelereng menjadi 6 kelereng.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 + 3 = 6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3 + 2 = 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 + 4 = 7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '1 + 8 = ....',
                                'explanation' => '1 + 8 = 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil penjumlahan yang bernilai 7 adalah ....',
                                'explanation' => '4 + 3 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 + 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 + 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5 + 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '5 + 5 = ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: 3 pensil ditambah 4 pensil]
3 + 4 = ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 5 + 2 adalah ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Ali punya 4 bola, ayah membelikan 1 bola lagi. Jumlah bola Ali sekarang ada ... buah.',
                                'explanation' => '5',
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
                                'prompt' => '[Keterangan Gambar: 5 ikan merah dan 3 ikan kuning]
Tuliskan kalimat matematika penjumlahan berdasarkan gambar dan hitung hasilnya!',
                                'explanation' => 'Kalimat matematika: 5 + 3 = 8.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Siti mempunyai 2 buah apel. Ibu memberi Siti 4 buah apel lagi. Berapa banyak buah apel Siti sekarang? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 2 + 4 = 6 buah apel.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
