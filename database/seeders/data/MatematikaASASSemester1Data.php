<?php

namespace Database\Seeders\Data;

class MatematikaASASSemester1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASAS Semester 1 (Bab 1 sampai 4) #1',
                'type' => 'asas',
                'duration_minutes' => 120,
                'description' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Paket #1 Matematika Kelas 1 SD Kurikulum Merdeka: Komprehensif Bab 1 sampai Bab 4 (Bilangan, Menguraikan Bilangan, Penjumlahan, dan Bangun Datar/Ruang).',
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
                                'prompt' => '[Keterangan Gambar: 5 buah bintang]
Banyak bintang pada gambar adalah ....',
                                'explanation' => 'Ada 5 bintang.',
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
                                'prompt' => 'Lambang bilangan "sembilan" adalah ....',
                                'explanation' => 'Sembilan = 9.',
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
                                'prompt' => '[Keterangan Gambar: 6 apel dan 4 jeruk]
Banyak apel ... daripada jeruk.',
                                'explanation' => '6 lebih banyak dari 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 5, 2, 4, 3 adalah ....',
                                'explanation' => 'Urutan: 2, 3, 4, 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2, 3, 4, 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5, 4, 3, 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2, 4, 3, 5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang menyusun 8 adalah ....',
                                'explanation' => '5 + 3 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 10 dapat diuraikan menjadi ....',
                                'explanation' => '7 + 3 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 3 + 4 adalah ....',
                                'explanation' => '3 + 4 = 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 4 mobil ditambah 2 mobil]
Jumlah mobil seluruhnya adalah ....',
                                'explanation' => '4 + 2 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 5 + 5 adalah ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '8 + 0 = ....',
                                'explanation' => '8 + 0 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '0', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lingkaran bulat]
Bangun datar pada gambar berbentuk ....',
                                'explanation' => 'Bentuk bulat adalah lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penggaris segitiga]
Penggaris pada gambar memiliki bentuk ....',
                                'explanation' => 'Memiliki 3 sisi = segitiga.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segitiga', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bola basket]
Benda pada gambar berbentuk bangun ruang ....',
                                'explanation' => 'Bola basket berbentuk bola.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kaleng biskuit tabung]
Kaleng biskuit berbentuk bangun ruang ....',
                                'explanation' => 'Kaleng berbentuk tabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Enam pensil]
Banyak pensil ada ... batang.',
                                'explanation' => '6',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "tujuh" ditulis angka ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 8 dan 10 adalah ....',
                                'explanation' => '9',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 diuraikan menjadi 3 dan ....',
                                'explanation' => '2',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 4 dan ... menyusun bilangan 7.',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 4 + 4 adalah ....',
                                'explanation' => '8',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Budi punya 3 permen, diberi ibu 2 permen. Permen Budi sekarang ada ....',
                                'explanation' => '5',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda]
Roda sepeda berbentuk bangun datar ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bangun datar yang memiliki 3 sisi dan 3 sudut adalah ....',
                                'explanation' => 'segitiga',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kaleng susu]
Kaleng susu berbentuk bangun ruang ....',
                                'explanation' => 'tabung',
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
                                'prompt' => '[Keterangan Gambar: Delapan mangga di piring Budi dan enam mangga di piring Siti]
Bandingkan banyak mangga Budi dan mangga Siti! Manakah yang lebih sedikit?',
                                'explanation' => 'Mangga Siti (6) lebih sedikit daripada mangga Budi (8).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua pasang bilangan yang berbeda untuk menyusun bilangan 9!',
                                'explanation' => 'Contoh: 1 dan 8, 2 dan 7, 3 dan 6, atau 4 dan 5.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Di kolam ada 4 ekor bebek. Datang lagi 5 ekor bebek. Berapa jumlah bebek di kolam sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 4 + 5 = 9 ekor bebek.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis dan jam dinding bundar]
Sebutkan nama bangun datar dari permukaan kedua benda tersebut!',
                                'explanation' => 'Papan tulis berbentuk segiempat dan jam dinding berbentuk lingkaran.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh benda berbentuk balok dan 2 contoh benda berbentuk bola yang ada di rumahmu!',
                                'explanation' => 'Contoh balok: kotak sepatu, lemari, kotak kardus. Contoh bola: bola mainan, semangka, kelereng.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAS Semester 1 (Bab 1 sampai 4) #2',
                'type' => 'asas',
                'duration_minutes' => 120,
                'description' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Paket #2 Matematika Kelas 1 SD Kurikulum Merdeka: Komprehensif Bab 1 sampai Bab 4 (Bilangan, Menguraikan Bilangan, Penjumlahan, dan Bangun Datar/Ruang).',
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
                                'prompt' => '[Keterangan Gambar: Tujuh buah bunga]
Banyak bunga adalah ....',
                                'explanation' => 'Ada 7 bunga.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "sembilan" adalah ....',
                                'explanation' => 'Sembilan = 9.',
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
                                'prompt' => '[Keterangan Gambar: 6 apel dan 4 jeruk]
Banyak apel ... daripada jeruk.',
                                'explanation' => '6 lebih banyak dari 4.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Urutan bilangan dari yang terkecil: 5, 2, 4, 3 adalah ....',
                                'explanation' => 'Urutan: 2, 3, 4, 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2, 3, 4, 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5, 4, 3, 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2, 4, 3, 5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang menyusun 8 adalah ....',
                                'explanation' => '5 + 3 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 10 dapat diuraikan menjadi ....',
                                'explanation' => '7 + 3 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 4 + 5 adalah ....',
                                'explanation' => '4 + 5 = 9.',
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
                                'prompt' => '[Keterangan Gambar: 4 mobil ditambah 2 mobil]
Jumlah mobil seluruhnya adalah ....',
                                'explanation' => '4 + 2 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 5 + 5 adalah ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '8 + 0 = ....',
                                'explanation' => '8 + 0 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '0', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Uang koin logam]
Uang koin berbentuk bangun datar ....',
                                'explanation' => 'Uang koin berbentuk lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segitiga', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penggaris segitiga]
Penggaris pada gambar memiliki bentuk ....',
                                'explanation' => 'Memiliki 3 sisi = segitiga.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segitiga', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bola basket]
Benda pada gambar berbentuk bangun ruang ....',
                                'explanation' => 'Bola basket berbentuk bola.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kaleng biskuit tabung]
Kaleng biskuit berbentuk bangun ruang ....',
                                'explanation' => 'Kaleng berbentuk tabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Enam pensil]
Banyak pensil ada ... batang.',
                                'explanation' => '6',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "tujuh" ditulis angka ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 8 dan 10 adalah ....',
                                'explanation' => '9',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 diuraikan menjadi 3 dan ....',
                                'explanation' => '2',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 4 dan ... menyusun bilangan 7.',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 4 + 4 adalah ....',
                                'explanation' => '8',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Budi punya 3 permen, diberi ibu 2 permen. Permen Budi sekarang ada ....',
                                'explanation' => '5',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda]
Roda sepeda berbentuk bangun datar ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bangun datar yang memiliki 3 sisi dan 3 sudut adalah ....',
                                'explanation' => 'segitiga',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kaleng susu]
Kaleng susu berbentuk bangun ruang ....',
                                'explanation' => 'tabung',
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
                                'prompt' => '[Keterangan Gambar: Delapan mangga di piring Budi dan enam mangga di piring Siti]
Bandingkan banyak mangga Budi dan mangga Siti! Manakah yang lebih sedikit?',
                                'explanation' => 'Mangga Siti (6) lebih sedikit daripada mangga Budi (8).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua pasang bilangan yang berbeda untuk menyusun bilangan 9!',
                                'explanation' => 'Contoh: 1 dan 8, 2 dan 7, 3 dan 6, atau 4 dan 5.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Di kolam ada 4 ekor bebek. Datang lagi 5 ekor bebek. Berapa jumlah bebek di kolam sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 4 + 5 = 9 ekor bebek.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis dan jam dinding bundar]
Sebutkan nama bangun datar dari permukaan kedua benda tersebut!',
                                'explanation' => 'Papan tulis berbentuk segiempat dan jam dinding berbentuk lingkaran.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh benda berbentuk balok dan 2 contoh benda berbentuk bola yang ada di rumahmu!',
                                'explanation' => 'Contoh balok: kotak sepatu, lemari, kotak kardus. Contoh bola: bola mainan, semangka, kelereng.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAS Semester 1 (Bab 1 sampai 4) #3',
                'type' => 'asas',
                'duration_minutes' => 120,
                'description' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Paket #3 Matematika Kelas 1 SD Kurikulum Merdeka: Komprehensif Bab 1 sampai Bab 4 (Bilangan, Menguraikan Bilangan, Penjumlahan, dan Bangun Datar/Ruang).',
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
                                'prompt' => '[Keterangan Gambar: 5 buah bintang]
Banyak bintang pada gambar adalah ....',
                                'explanation' => 'Ada 5 bintang.',
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
                                'prompt' => 'Lambang bilangan "sembilan" adalah ....',
                                'explanation' => 'Sembilan = 9.',
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
                                'prompt' => 'Nama bilangan dari angka 8 adalah ....',
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
                                'prompt' => 'Urutan bilangan dari yang terkecil: 5, 2, 4, 3 adalah ....',
                                'explanation' => 'Urutan: 2, 3, 4, 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2, 3, 4, 5', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5, 4, 3, 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2, 4, 3, 5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pasangan bilangan yang menyusun 8 adalah ....',
                                'explanation' => '5 + 3 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 3', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 10 dapat diuraikan menjadi ....',
                                'explanation' => '7 + 3 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6 dan 2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 2 + 6 adalah ....',
                                'explanation' => '2 + 6 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 4 mobil ditambah 2 mobil]
Jumlah mobil seluruhnya adalah ....',
                                'explanation' => '4 + 2 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 5 + 5 adalah ....',
                                'explanation' => '5 + 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '8 + 0 = ....',
                                'explanation' => '8 + 0 = 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '0', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lingkaran bulat]
Bangun datar pada gambar berbentuk ....',
                                'explanation' => 'Bentuk bulat adalah lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penggaris segitiga]
Penggaris pada gambar memiliki bentuk ....',
                                'explanation' => 'Memiliki 3 sisi = segitiga.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segitiga', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak kardus kado]
Kotak kado berbentuk bangun ruang ....',
                                'explanation' => 'Kotak dadu/kado berbentuk kubus.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kubus', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kaleng biskuit tabung]
Kaleng biskuit berbentuk bangun ruang ....',
                                'explanation' => 'Kaleng berbentuk tabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Enam pensil]
Banyak pensil ada ... batang.',
                                'explanation' => '6',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "tujuh" ditulis angka ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 8 dan 10 adalah ....',
                                'explanation' => '9',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 diuraikan menjadi 3 dan ....',
                                'explanation' => '2',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pasangan bilangan 4 dan ... menyusun bilangan 7.',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 4 + 4 adalah ....',
                                'explanation' => '8',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Budi punya 3 permen, diberi ibu 2 permen. Permen Budi sekarang ada ....',
                                'explanation' => '5',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda]
Roda sepeda berbentuk bangun datar ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bangun datar yang memiliki 3 sisi dan 3 sudut adalah ....',
                                'explanation' => 'segitiga',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kaleng susu]
Kaleng susu berbentuk bangun ruang ....',
                                'explanation' => 'tabung',
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
                                'prompt' => '[Keterangan Gambar: Delapan mangga di piring Budi dan enam mangga di piring Siti]
Bandingkan banyak mangga Budi dan mangga Siti! Manakah yang lebih sedikit?',
                                'explanation' => 'Mangga Siti (6) lebih sedikit daripada mangga Budi (8).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua pasang bilangan yang berbeda untuk menyusun bilangan 9!',
                                'explanation' => 'Contoh: 1 dan 8, 2 dan 7, 3 dan 6, atau 4 dan 5.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Di kolam ada 4 ekor bebek. Datang lagi 5 ekor bebek. Berapa jumlah bebek di kolam sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 4 + 5 = 9 ekor bebek.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis dan jam dinding bundar]
Sebutkan nama bangun datar dari permukaan kedua benda tersebut!',
                                'explanation' => 'Papan tulis berbentuk segiempat dan jam dinding berbentuk lingkaran.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh benda berbentuk balok dan 2 contoh benda berbentuk bola yang ada di rumahmu!',
                                'explanation' => 'Contoh balok: kotak sepatu, lemari, kotak kardus. Contoh bola: bola mainan, semangka, kelereng.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
