<?php

namespace Database\Seeders\Data;

class MatematikaASTSSemester1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASTS Semester 1 (Bab 1 dan 2) #1',
                'type' => 'asts',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Paket #1 Matematika Kelas 1 SD Kurikulum Merdeka: Bilangan sampai 10 dan Menguraikan serta Menyusun Bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Empat cangkir di meja]
Banyak cangkir pada gambar adalah ....',
                                'explanation' => 'Banyak cangkir ada 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "enam" adalah ....',
                                'explanation' => 'Enam ditulis 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan 8 adalah ....',
                                'explanation' => '8 dibaca delapan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'delapan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tujuh', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sembilan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 7 apel dan 5 jeruk]
Banyak apel ... daripada banyak jeruk.',
                                'explanation' => '7 lebih banyak dari 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 3, 1, 4, 2 adalah ....',
                                'explanation' => 'Urutan: 1, 2, 3, 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1, 2, 3, 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4, 3, 2, 1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1, 3, 2, 4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat sesudah angka 8 adalah ....',
                                'explanation' => 'Sesudah 8 adalah 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 5 dapat diuraikan menjadi ....',
                                'explanation' => '2 + 3 = 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang menyusun 7 adalah ....',
                                'explanation' => '4 + 3 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5 and 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram bilangan 9 pecah jadi 6 dan titik-titik]
Angka yang tepat untuk mengisi diagram adalah ....',
                                'explanation' => '6 dan 3 menyusun 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 10 dapat tersusun dari ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6 dan 3', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Tiga buah buku]
Banyak buku ada ... buah.',
                                'explanation' => 'Ada 3 buah buku.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nama bilangan dari angka 7 adalah ....',
                                'explanation' => 'tujuh',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan sebelum angka 10 adalah ....',
                                'explanation' => '9 (sembilan)',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 dapat diuraikan menjadi 2 dan ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 4 dan ... menyusun bilangan 8.',
                                'explanation' => '4',
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
                                'prompt' => '[Keterangan Gambar: Enam pensil Budi dan empat pensil Siti]
Bandingkan banyak pensil Budi dan Siti! Siapakah yang memiliki pensil lebih banyak?',
                                'explanation' => 'Pensil Budi (6) lebih banyak daripada pensil Siti (4).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Urutkan bilangan berikut dari yang terbesar ke yang terkecil: 2, 7, 5, 9, 4!',
                                'explanation' => 'Urutan dari terbesar: 9, 7, 5, 4, 2.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua pasang bilangan berbeda yang dapat menyusun bilangan 7!',
                                'explanation' => 'Contoh: 1 dan 6, 2 dan 5, atau 3 dan 4.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Kotak berisi 10 permen]
Bagikan 10 permen ke dalam 2 toples sama banyak! Berapa permen di setiap toples?',
                                'explanation' => 'Masing-masing toples berisi 5 permen.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan nama bilangan dan lambang bilangan dari jumlah jari kedua tanganmu!',
                                'explanation' => 'Lambang bilangan: 10, Nama bilangan: sepuluh.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 1 (Bab 1 dan 2) #2',
                'type' => 'asts',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Paket #2 Matematika Kelas 1 SD Kurikulum Merdeka: Bilangan sampai 10 dan Menguraikan serta Menyusun Bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Enam balon warna-warni]
Banyak balon adalah ....',
                                'explanation' => 'Ada 6 balon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "enam" adalah ....',
                                'explanation' => 'Enam ditulis 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan 8 adalah ....',
                                'explanation' => '8 dibaca delapan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'delapan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tujuh', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sembilan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 7 apel dan 5 jeruk]
Banyak apel ... daripada banyak jeruk.',
                                'explanation' => '7 lebih banyak dari 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 3, 1, 4, 2 adalah ....',
                                'explanation' => 'Urutan: 1, 2, 3, 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1, 2, 3, 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4, 3, 2, 1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1, 3, 2, 4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat sesudah angka 8 adalah ....',
                                'explanation' => 'Sesudah 8 adalah 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '1 + 5 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 dan 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang menyusun 7 adalah ....',
                                'explanation' => '4 + 3 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5 and 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram bilangan 9 pecah jadi 6 dan titik-titik]
Angka yang tepat untuk mengisi diagram adalah ....',
                                'explanation' => '6 dan 3 menyusun 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 10 dapat tersusun dari ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6 dan 3', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Tiga buah buku]
Banyak buku ada ... buah.',
                                'explanation' => 'Ada 3 buah buku.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nama bilangan dari angka 7 adalah ....',
                                'explanation' => 'tujuh',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan sebelum angka 10 adalah ....',
                                'explanation' => '9 (sembilan)',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 dapat diuraikan menjadi 2 dan ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 4 dan ... menyusun bilangan 8.',
                                'explanation' => '4',
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
                                'prompt' => '[Keterangan Gambar: Enam pensil Budi dan empat pensil Siti]
Bandingkan banyak pensil Budi dan Siti! Siapakah yang memiliki pensil lebih banyak?',
                                'explanation' => 'Pensil Budi (6) lebih banyak daripada pensil Siti (4).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Urutkan bilangan berikut dari yang terbesar ke yang terkecil: 2, 7, 5, 9, 4!',
                                'explanation' => 'Urutan dari terbesar: 9, 7, 5, 4, 2.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua pasang bilangan berbeda yang dapat menyusun bilangan 7!',
                                'explanation' => 'Contoh: 1 dan 6, 2 dan 5, atau 3 dan 4.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Kotak berisi 10 permen]
Bagikan 10 permen ke dalam 2 toples sama banyak! Berapa permen di setiap toples?',
                                'explanation' => 'Masing-masing toples berisi 5 permen.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan nama bilangan dan lambang bilangan dari jumlah jari kedua tanganmu!',
                                'explanation' => 'Lambang bilangan: 10, Nama bilangan: sepuluh.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 1 (Bab 1 dan 2) #3',
                'type' => 'asts',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Paket #3 Matematika Kelas 1 SD Kurikulum Merdeka: Bilangan sampai 10 dan Menguraikan serta Menyusun Bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Empat cangkir di meja]
Banyak cangkir pada gambar adalah ....',
                                'explanation' => 'Banyak cangkir ada 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "sembilan" adalah ....',
                                'explanation' => 'Sembilan ditulis 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan 8 adalah ....',
                                'explanation' => '8 dibaca delapan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'delapan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tujuh', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sembilan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 7 apel dan 5 jeruk]
Banyak apel ... daripada banyak jeruk.',
                                'explanation' => '7 lebih banyak dari 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 3, 1, 4, 2 adalah ....',
                                'explanation' => 'Urutan: 1, 2, 3, 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1, 2, 3, 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4, 3, 2, 1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1, 3, 2, 4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat sesudah angka 8 adalah ....',
                                'explanation' => 'Sesudah 8 adalah 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 5 dapat diuraikan menjadi ....',
                                'explanation' => '2 + 3 = 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang membentuk 8 adalah ....',
                                'explanation' => '4 + 4 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 dan 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3 dan 4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram bilangan 9 pecah jadi 6 dan titik-titik]
Angka yang tepat untuk mengisi diagram adalah ....',
                                'explanation' => '6 dan 3 menyusun 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 10 dapat tersusun dari ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 dan 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '6 dan 3', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Tiga buah buku]
Banyak buku ada ... buah.',
                                'explanation' => 'Ada 3 buah buku.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nama bilangan dari angka 7 adalah ....',
                                'explanation' => 'tujuh',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan sebelum angka 10 adalah ....',
                                'explanation' => '9 (sembilan)',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 dapat diuraikan menjadi 2 dan ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 4 dan ... menyusun bilangan 8.',
                                'explanation' => '4',
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
                                'prompt' => '[Keterangan Gambar: Enam pensil Budi dan empat pensil Siti]
Bandingkan banyak pensil Budi dan Siti! Siapakah yang memiliki pensil lebih banyak?',
                                'explanation' => 'Pensil Budi (6) lebih banyak daripada pensil Siti (4).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Urutkan bilangan berikut dari yang terbesar ke yang terkecil: 2, 7, 5, 9, 4!',
                                'explanation' => 'Urutan dari terbesar: 9, 7, 5, 4, 2.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua pasang bilangan berbeda yang dapat menyusun bilangan 7!',
                                'explanation' => 'Contoh: 1 dan 6, 2 dan 5, atau 3 dan 4.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Kotak berisi 10 permen]
Bagikan 10 permen ke dalam 2 toples sama banyak! Berapa permen di setiap toples?',
                                'explanation' => 'Masing-masing toples berisi 5 permen.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan nama bilangan dan lambang bilangan dari jumlah jari kedua tanganmu!',
                                'explanation' => 'Lambang bilangan: 10, Nama bilangan: sepuluh.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
