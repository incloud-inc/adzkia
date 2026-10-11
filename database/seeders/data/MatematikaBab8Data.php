<?php

namespace Database\Seeders\Data;

class MatematikaBab8Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 8: Diagram Gambar Sederhana (Piktogram)',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 8 Matematika Kelas 1 SD Kurikulum Merdeka: Membaca, menghitung, dan menyajikan data sederhana menggunakan diagram gambar (piktogram).',
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
                                'prompt' => '[Keterangan Gambar: Diagram gambar buah kesukaan: Apel ada 4 gambar, Pisang ada 5 gambar, Jeruk ada 2 gambar]
Banyak siswa yang suka buah apel adalah ....',
                                'explanation' => 'Banyak apel ada 4 gambar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram gambar hewan peliharaan: Kucing 6 gambar, Kelinci 3 gambar, Ikan 5 gambar]
Hewan peliharaan yang paling banyak disukai adalah ....',
                                'explanation' => 'Kucing terbanyak yaitu 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kucing', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kelinci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ikan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram gambar warna kesukaan: Merah 3 gambar, Biru 7 gambar, Hijau 2 gambar]
Warna yang paling sedikit disukai adalah ....',
                                'explanation' => 'Hijau paling sedikit yaitu 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'hijau', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'biru', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram mainan: Bola 5 gambar, Boneka 5 gambar, Mobil-mobilan 3 gambar]
Mainan yang jumlahnya sama banyak adalah ....',
                                'explanation' => 'Bola dan boneka sama-sama 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola dan boneka', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bola dan mobil-mobilan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'boneka dan mobil-mobilan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buku: Budi membaca 3 buku, Siti membaca 4 buku]
Jumlah buku yang dibaca Budi dan Siti adalah ....',
                                'explanation' => '3 + 4 = 7 buku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram balon: Merah 5, Kuning 2]
Selisih banyak balon merah dan balon kuning adalah ....',
                                'explanation' => '5 - 2 = 3 balon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Diagram yang menggunakan gambar untuk menyajikan data disebut diagram ....',
                                'explanation' => 'Piktogram menyajikan data dengan gambar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gambar (piktogram)', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'garis', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram kue: Donat 4 gambar, Bolu 2 gambar]
Donat ... daripada bolu.',
                                'explanation' => '4 lebih banyak dari 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram bunga: Mawar 6 gambar, Melati 1 gambar]
Bunga mawar berjumlah ... tangkai.',
                                'explanation' => 'Mawar ada 6 tangkai.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram pensil warna: Merah 3, Biru 4, Kuning 1]
Total seluruh pensil warna adalah ....',
                                'explanation' => '3 + 4 + 1 = 8 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Piktogram bunga: Mawar ada 5 gambar bunga]
Banyak bunga mawar ada ... tangkai.',
                                'explanation' => '5',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah: Apel 4, Jeruk 2]
Buah yang paling banyak adalah buah ....',
                                'explanation' => 'apel',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Penyajian data menggunakan gambar disebut diagram ....',
                                'explanation' => 'gambar / piktogram',
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
                                'prompt' => '[Keterangan Gambar: Piktogram hewan peliharaan: Kucing ada 4 gambar, Ikan ada 6 gambar, Kelinci ada 2 gambar]
Berdasarkan diagram gambar tersebut, hewan apakah yang paling banyak dan hewan apakah yang paling sedikit?',
                                'explanation' => 'Hewan paling banyak adalah ikan (6), hewan paling sedikit adalah kelinci (2).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah kesukaan: Jeruk 5 gambar dan Pisang 3 gambar]
Berapa selisih banyak buah jeruk dan buah pisang pada diagram tersebut? Tuliskan cara hitungnya!',
                                'explanation' => 'Selisih: 5 - 3 = 2 buah.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 8: Diagram Gambar Sederhana (Piktogram)',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 8 Matematika Kelas 1 SD Kurikulum Merdeka: Membaca, menghitung, dan menyajikan data sederhana menggunakan diagram gambar (piktogram).',
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
                                'prompt' => '[Keterangan Gambar: Diagram gambar buah kesukaan: Apel ada 4 gambar, Pisang ada 5 gambar, Jeruk ada 2 gambar]
Banyak siswa yang suka buah apel adalah ....',
                                'explanation' => 'Banyak apel ada 4 gambar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah: Mangga 5, Jeruk 7, Apel 3]
Buah yang paling banyak adalah ....',
                                'explanation' => 'Jeruk paling banyak yaitu 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'jeruk', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mangga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'apel', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram gambar warna kesukaan: Merah 3 gambar, Biru 7 gambar, Hijau 2 gambar]
Warna yang paling sedikit disukai adalah ....',
                                'explanation' => 'Hijau paling sedikit yaitu 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'hijau', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'biru', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram mainan: Bola 5 gambar, Boneka 5 gambar, Mobil-mobilan 3 gambar]
Mainan yang jumlahnya sama banyak adalah ....',
                                'explanation' => 'Bola dan boneka sama-sama 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola dan boneka', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bola dan mobil-mobilan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'boneka dan mobil-mobilan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buku: Budi membaca 3 buku, Siti membaca 4 buku]
Jumlah buku yang dibaca Budi dan Siti adalah ....',
                                'explanation' => '3 + 4 = 7 buku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram ikan: Mas 6, Cupang 2]
Selisih banyak ikan mas dan cupang adalah ....',
                                'explanation' => '6 - 2 = 4 ikan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Diagram yang menggunakan gambar untuk menyajikan data disebut diagram ....',
                                'explanation' => 'Piktogram menyajikan data dengan gambar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gambar (piktogram)', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'garis', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram kue: Donat 4 gambar, Bolu 2 gambar]
Donat ... daripada bolu.',
                                'explanation' => '4 lebih banyak dari 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram bunga: Mawar 6 gambar, Melati 1 gambar]
Bunga mawar berjumlah ... tangkai.',
                                'explanation' => 'Mawar ada 6 tangkai.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram pensil warna: Merah 3, Biru 4, Kuning 1]
Total seluruh pensil warna adalah ....',
                                'explanation' => '3 + 4 + 1 = 8 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Piktogram bunga: Mawar ada 5 gambar bunga]
Banyak bunga mawar ada ... tangkai.',
                                'explanation' => '5',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah: Apel 4, Jeruk 2]
Buah yang paling banyak adalah buah ....',
                                'explanation' => 'apel',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Penyajian data menggunakan gambar disebut diagram ....',
                                'explanation' => 'gambar / piktogram',
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
                                'prompt' => '[Keterangan Gambar: Piktogram hewan peliharaan: Kucing ada 4 gambar, Ikan ada 6 gambar, Kelinci ada 2 gambar]
Berdasarkan diagram gambar tersebut, hewan apakah yang paling banyak dan hewan apakah yang paling sedikit?',
                                'explanation' => 'Hewan paling banyak adalah ikan (6), hewan paling sedikit adalah kelinci (2).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah kesukaan: Jeruk 5 gambar dan Pisang 3 gambar]
Berapa selisih banyak buah jeruk dan buah pisang pada diagram tersebut? Tuliskan cara hitungnya!',
                                'explanation' => 'Selisih: 5 - 3 = 2 buah.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 8: Diagram Gambar Sederhana (Piktogram)',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 8 Matematika Kelas 1 SD Kurikulum Merdeka: Membaca, menghitung, dan menyajikan data sederhana menggunakan diagram gambar (piktogram).',
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
                                'prompt' => '[Keterangan Gambar: Diagram gambar buah kesukaan: Apel ada 4 gambar, Pisang ada 5 gambar, Jeruk ada 2 gambar]
Banyak siswa yang suka buah apel adalah ....',
                                'explanation' => 'Banyak apel ada 4 gambar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '2', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram gambar hewan peliharaan: Kucing 6 gambar, Kelinci 3 gambar, Ikan 5 gambar]
Hewan peliharaan yang paling banyak disukai adalah ....',
                                'explanation' => 'Kucing terbanyak yaitu 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kucing', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kelinci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ikan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram kendaraan mainan: Mobil 4, Pesawat 1, Kapal 3]
Mainan yang paling sedikit adalah ....',
                                'explanation' => 'Pesawat paling sedikit yaitu 1.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pesawat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mobil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kapal', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Diagram mainan: Bola 5 gambar, Boneka 5 gambar, Mobil-mobilan 3 gambar]
Mainan yang jumlahnya sama banyak adalah ....',
                                'explanation' => 'Bola dan boneka sama-sama 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola dan boneka', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bola dan mobil-mobilan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'boneka dan mobil-mobilan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram permen: Budi 5, Ani 3]
Total permen keduanya adalah ....',
                                'explanation' => '5 + 3 = 8 permen.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram balon: Merah 5, Kuning 2]
Selisih banyak balon merah dan balon kuning adalah ....',
                                'explanation' => '5 - 2 = 3 balon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Diagram yang menggunakan gambar untuk menyajikan data disebut diagram ....',
                                'explanation' => 'Piktogram menyajikan data dengan gambar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gambar (piktogram)', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'garis', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram kue: Donat 4 gambar, Bolu 2 gambar]
Donat ... daripada bolu.',
                                'explanation' => '4 lebih banyak dari 2.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih banyak', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih sedikit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama banyak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram bunga: Mawar 6 gambar, Melati 1 gambar]
Bunga mawar berjumlah ... tangkai.',
                                'explanation' => 'Mawar ada 6 tangkai.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram pensil warna: Merah 3, Biru 4, Kuning 1]
Total seluruh pensil warna adalah ....',
                                'explanation' => '3 + 4 + 1 = 8 pensil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Piktogram bunga: Mawar ada 5 gambar bunga]
Banyak bunga mawar ada ... tangkai.',
                                'explanation' => '5',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah: Apel 4, Jeruk 2]
Buah yang paling banyak adalah buah ....',
                                'explanation' => 'apel',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Penyajian data menggunakan gambar disebut diagram ....',
                                'explanation' => 'gambar / piktogram',
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
                                'prompt' => '[Keterangan Gambar: Piktogram hewan peliharaan: Kucing ada 4 gambar, Ikan ada 6 gambar, Kelinci ada 2 gambar]
Berdasarkan diagram gambar tersebut, hewan apakah yang paling banyak dan hewan apakah yang paling sedikit?',
                                'explanation' => 'Hewan paling banyak adalah ikan (6), hewan paling sedikit adalah kelinci (2).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah kesukaan: Jeruk 5 gambar dan Pisang 3 gambar]
Berapa selisih banyak buah jeruk dan buah pisang pada diagram tersebut? Tuliskan cara hitungnya!',
                                'explanation' => 'Selisih: 5 - 3 = 2 buah.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
