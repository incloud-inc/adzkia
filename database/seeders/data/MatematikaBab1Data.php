<?php

namespace Database\Seeders\Data;

class MatematikaBab1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 1: Bilangan sampai 10',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 1 Matematika Kelas 1 SD Kurikulum Merdeka: Membilang banyak benda sampai 10, membaca dan menulis lambang bilangan, serta membandingkan bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah apel merah di piring]
Banyak buah apel pada gambar di atas adalah ....',
                                'explanation' => 'Hitung apel satu per satu: 1, 2, 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima ekor ikan berenang di akuarium]
Banyak ikan pada gambar adalah ....',
                                'explanation' => 'Hitung ikan: 1, 2, 3, 4, 5.',
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
                                'prompt' => 'Lambang bilangan "tujuh" adalah ....',
                                'explanation' => 'Nama bilangan tujuh ditulis dengan angka 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka "9" adalah ....',
                                'explanation' => 'Angka 9 dibaca sembilan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sembilan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'delapan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sepuluh', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Empat buah bola di sebelah kiri dan dua buah bola di sebelah kanan]
Banyak bola di sebelah kiri ... daripada bola di sebelah kanan.',
                                'explanation' => '4 bola lebih banyak daripada 2 bola.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil adalah ....',
                                'explanation' => 'Urutan naik dari terkecil: 1, 2, 3, 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1, 2, 3, 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4, 3, 2, 1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2, 1, 4, 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat setelah angka 6 adalah ....',
                                'explanation' => 'Setelah bilangan 6 adalah 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang berada sebelum angka 5 adalah ....',
                                'explanation' => 'Sebelum bilangan 5 adalah 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Satu ekor kucing tidur]
Banyaknya kucing pada gambar adalah ....',
                                'explanation' => 'Ada 1 ekor kucing.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Enam pensil warna berjejer]
Hitunglah banyak pensil tersebut!',
                                'explanation' => 'Jumlah pensil adalah 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Empat buah bintang]
Banyak bintang ada ... buah.',
                                'explanation' => 'Ada 4 bintang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan dari "sepuluh" ditulis angka ....',
                                'explanation' => 'Sepuluh ditulis 10.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 7 dan 9 adalah ....',
                                'explanation' => 'Antara 7 dan 9 adalah bilangan 8.',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah permen merah dan lima buah permen biru]
Bandingkan banyak permen merah dan permen biru! Manakah yang lebih banyak?',
                                'explanation' => 'Permen biru (5) lebih banyak daripada permen merah (3).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan urutan bilangan dari 1 sampai 10 secara urut dari yang paling kecil!',
                                'explanation' => 'Urutan: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 1: Bilangan sampai 10',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 1 Matematika Kelas 1 SD Kurikulum Merdeka: Membilang banyak benda sampai 10, membaca dan menulis lambang bilangan, serta membandingkan bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Dua buah jeruk segar]
Banyak buah jeruk pada gambar adalah ....',
                                'explanation' => 'Ada 2 buah jeruk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima ekor ikan berenang di akuarium]
Banyak ikan pada gambar adalah ....',
                                'explanation' => 'Hitung ikan: 1, 2, 3, 4, 5.',
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
                                'prompt' => 'Lambang bilangan "tujuh" adalah ....',
                                'explanation' => 'Nama bilangan tujuh ditulis dengan angka 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka "9" adalah ....',
                                'explanation' => 'Angka 9 dibaca sembilan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sembilan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'delapan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sepuluh', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Empat buah bola di sebelah kiri dan dua buah bola di sebelah kanan]
Banyak bola di sebelah kiri ... daripada bola di sebelah kanan.',
                                'explanation' => '4 bola lebih banyak daripada 2 bola.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terbesar adalah ....',
                                'explanation' => 'Urutan turun dari terbesar: 5, 4, 3, 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5, 4, 3, 2', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2, 3, 4, 5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3, 5, 4, 2', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat setelah angka 6 adalah ....',
                                'explanation' => 'Setelah bilangan 6 adalah 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang berada sebelum angka 5 adalah ....',
                                'explanation' => 'Sebelum bilangan 5 adalah 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Satu ekor kucing tidur]
Banyaknya kucing pada gambar adalah ....',
                                'explanation' => 'Ada 1 ekor kucing.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Enam pensil warna berjejer]
Hitunglah banyak pensil tersebut!',
                                'explanation' => 'Jumlah pensil adalah 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Empat buah bintang]
Banyak bintang ada ... buah.',
                                'explanation' => 'Ada 4 bintang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan dari "sepuluh" ditulis angka ....',
                                'explanation' => 'Sepuluh ditulis 10.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 7 dan 9 adalah ....',
                                'explanation' => 'Antara 7 dan 9 adalah bilangan 8.',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah permen merah dan lima buah permen biru]
Bandingkan banyak permen merah dan permen biru! Manakah yang lebih banyak?',
                                'explanation' => 'Permen biru (5) lebih banyak daripada permen merah (3).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan urutan bilangan dari 1 sampai 10 secara urut dari yang paling kecil!',
                                'explanation' => 'Urutan: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 1: Bilangan sampai 10',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 1 Matematika Kelas 1 SD Kurikulum Merdeka: Membilang banyak benda sampai 10, membaca dan menulis lambang bilangan, serta membandingkan bilangan.',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah apel merah di piring]
Banyak buah apel pada gambar di atas adalah ....',
                                'explanation' => 'Hitung apel satu per satu: 1, 2, 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima ekor ikan berenang di akuarium]
Banyak ikan pada gambar adalah ....',
                                'explanation' => 'Hitung ikan: 1, 2, 3, 4, 5.',
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
                                'prompt' => 'Lambang bilangan "delapan" adalah ....',
                                'explanation' => 'Delapan ditulis angka 8.',
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
                                'prompt' => 'Nama bilangan dari angka "9" adalah ....',
                                'explanation' => 'Angka 9 dibaca sembilan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sembilan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'delapan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sepuluh', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tiga bunga mawar dan tiga bunga melati]
Banyak mawar ... dengan banyak melati.',
                                'explanation' => '3 sama banyak dengan 3.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sama banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih banyak', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil adalah ....',
                                'explanation' => 'Urutan naik dari terkecil: 1, 2, 3, 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1, 2, 3, 4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4, 3, 2, 1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2, 1, 4, 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang tepat setelah angka 6 adalah ....',
                                'explanation' => 'Setelah bilangan 6 adalah 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan yang berada sebelum angka 5 adalah ....',
                                'explanation' => 'Sebelum bilangan 5 adalah 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Satu ekor kucing tidur]
Banyaknya kucing pada gambar adalah ....',
                                'explanation' => 'Ada 1 ekor kucing.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Enam pensil warna berjejer]
Hitunglah banyak pensil tersebut!',
                                'explanation' => 'Jumlah pensil adalah 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Empat buah bintang]
Banyak bintang ada ... buah.',
                                'explanation' => 'Ada 4 bintang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan dari "sepuluh" ditulis angka ....',
                                'explanation' => 'Sepuluh ditulis 10.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 7 dan 9 adalah ....',
                                'explanation' => 'Antara 7 dan 9 adalah bilangan 8.',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah permen merah dan lima buah permen biru]
Bandingkan banyak permen merah dan permen biru! Manakah yang lebih banyak?',
                                'explanation' => 'Permen biru (5) lebih banyak daripada permen merah (3).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan urutan bilangan dari 1 sampai 10 secara urut dari yang paling kecil!',
                                'explanation' => 'Urutan: 1, 2, 3, 4, 5, 6, 7, 8, 9, 10.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
