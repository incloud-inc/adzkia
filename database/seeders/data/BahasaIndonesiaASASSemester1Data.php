<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaASASSemester1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASAS Semester 1 (Bab 1 sampai 4) #1',
                'type' => 'pas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Semester 1 Paket #1 Bahasa Indonesia Kelas 1 SD: Ujian komprehensif Bab 1 sampai 4 (Bunyi, Bermain, Kuman, dan Kemandirian), huruf b, c, k, dan l.',
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
                                'prompt' => '[Keterangan Gambar: Bebek berenang di kolam]
Tiruan bunyi suara hewan pada gambar adalah ....',
                                'explanation' => 'Bebek bersuara kwek-kwek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kwek-kwek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'meong-meong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'petok-petok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "bola" adalah ....',
                                'explanation' => 'Bola diawali bo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang aman untuk bermain ayunan adalah ....',
                                'explanation' => 'Taman bermain adalah tempat yang aman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'taman bermain', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pinggir jalan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'atap rumah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Cangkir minuman hangat]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali huruf c.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'c', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'k', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya untuk menanyakan nama teman baru adalah ....',
                                'explanation' => 'Siapa menanyakan orang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Siapa', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Di mana', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Kapan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita mencuci tangan memakai sabun agar terhindar dari ....',
                                'explanation' => 'Sabun membunuh kuman penyebab sakit.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuman penyakit', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'wangi bunga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'air bersih', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kelinci memakan wortel]
Suku kata awal dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Kelinci diawali ke.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ke', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ku', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali suku kata "ku" adalah ....',
                                'explanation' => 'Kuda diawali ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuda', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kaki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kaca', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bersin, kita harus menutup mulut menggunakan ....',
                                'explanation' => 'Menutup dengan tisu atau lipatan siku tangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tisu atau lipatan siku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'buku gambar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sepatu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melompat tali di halaman]
Gerakan melompat tali menggunakan anggota tubuh ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kepala', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'leher', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali suku kata "la" adalah ....',
                                'explanation' => 'Lampu diawali la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lampu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lilin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lumpur', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang berisi larangan adalah ....',
                                'explanation' => 'Kalimat larangan diawali kata Jangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jangan lari di tangga!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Ayo kita ke kantin!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Buku ini sangat bagus.', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lukisan" adalah ....',
                                'explanation' => 'Lukisan diawali lu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'li', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'le', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Setelah selesai membaca, buku cerita sebaiknya ....',
                                'explanation' => 'Buku dirapikan di rak.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'disimpan di rak buku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'diletakkan di lantai', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'disobek halamannya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bunyi lonceng berdentang terdengar ....',
                                'explanation' => 'Lonceng berbunyi teng-teng.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'teng-teng', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'prok-prok', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kwek-kwek', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban yang benar!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kucing anggora sedang mengeong]
Suara tiruan hewan pada gambar adalah ....',
                                'explanation' => 'Kucing bersuara meong.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'meong', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "buku" diawali dengan suku kata ....',
                                'explanation' => 'Buku diawali bu.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'bu', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "cincin" diawali dengan suku kata ....',
                                'explanation' => 'Cincin diawali ci.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ci', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan tempat adalah ....',
                                'explanation' => 'Di mana menanyakan tempat.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'di mana', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Agar terhindar dari kuman sebelum makan kita harus mencuci tangan dengan ....',
                                'explanation' => 'Mencuci tangan dengan sabun.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lilin menyala di atas meja]
Benda pada gambar di atas adalah ....',
                                'explanation' => 'Benda tersebut adalah lilin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'lilin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "kaki" diawali dengan suku kata ....',
                                'explanation' => 'Kaki diawali ka.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ka', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "lari" diawali dengan suku kata ....',
                                'explanation' => 'Lari diawali la.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'la', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat larangan selalu memuat kata ....',
                                'explanation' => 'Kalimat larangan memuat kata jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hewan anjing menggonggong dengan bunyi ....',
                                'explanation' => 'Anjing bersuara guk-guk.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'guk-guk', 'is_correct' => true],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan di bawah ini dengan jelas!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ba"!',
                                'explanation' => 'Contoh: batu, baju, balon, bayi.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ca"!',
                                'explanation' => 'Contoh: cacing, cangkir, cabai.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ka"!',
                                'explanation' => 'Contoh: kaki, katak, kancing, kapal.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "la"!',
                                'explanation' => 'Contoh: lari, lampu, labu, lalat.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 waktu penting ketika kita harus mencuci tangan dengan sabun!',
                                'explanation' => 'Contoh: 1. Sebelum makan, 2. Setelah dari toilet / setelah bermain di luar.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAS Semester 1 (Bab 1 sampai 4) #2',
                'type' => 'pas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Semester 1 Paket #2 Bahasa Indonesia Kelas 1 SD: Ujian komprehensif Bab 1 sampai 4 (Bunyi, Bermain, Kuman, dan Kemandirian), huruf b, c, k, dan l.',
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
                                'prompt' => '[Keterangan Gambar: Bebek berenang di kolam]
Tiruan bunyi suara hewan pada gambar adalah ....',
                                'explanation' => 'Bebek bersuara kwek-kwek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kwek-kwek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'meong-meong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'petok-petok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "bola" adalah ....',
                                'explanation' => 'Bola diawali bo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang aman untuk bermain ayunan adalah ....',
                                'explanation' => 'Taman bermain adalah tempat yang aman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'taman bermain', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pinggir jalan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'atap rumah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Cangkir minuman hangat]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali huruf c.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'c', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'k', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya untuk menanyakan nama teman baru adalah ....',
                                'explanation' => 'Siapa menanyakan orang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Siapa', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Di mana', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Kapan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita mencuci tangan memakai sabun agar terhindar dari ....',
                                'explanation' => 'Sabun membunuh kuman penyebab sakit.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuman penyakit', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'wangi bunga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'air bersih', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kelinci memakan wortel]
Suku kata awal dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Kelinci diawali ke.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ke', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ku', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali suku kata "ku" adalah ....',
                                'explanation' => 'Kuda diawali ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuda', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kaki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kaca', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bersin, kita harus menutup mulut menggunakan ....',
                                'explanation' => 'Menutup dengan tisu atau lipatan siku tangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tisu atau lipatan siku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'buku gambar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sepatu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melompat tali di halaman]
Gerakan melompat tali menggunakan anggota tubuh ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kepala', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'leher', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali suku kata "la" adalah ....',
                                'explanation' => 'Lampu diawali la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lampu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lilin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lumpur', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang berisi larangan adalah ....',
                                'explanation' => 'Kalimat larangan diawali kata Jangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jangan lari di tangga!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Ayo kita ke kantin!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Buku ini sangat bagus.', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lukisan" adalah ....',
                                'explanation' => 'Lukisan diawali lu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'li', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'le', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Setelah selesai membaca, buku cerita sebaiknya ....',
                                'explanation' => 'Buku dirapikan di rak.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'disimpan di rak buku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'diletakkan di lantai', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'disobek halamannya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bunyi lonceng berdentang terdengar ....',
                                'explanation' => 'Lonceng berbunyi teng-teng.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'teng-teng', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'prok-prok', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kwek-kwek', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban yang benar!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kucing anggora sedang mengeong]
Suara tiruan hewan pada gambar adalah ....',
                                'explanation' => 'Kucing bersuara meong.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'meong', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "buku" diawali dengan suku kata ....',
                                'explanation' => 'Buku diawali bu.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'bu', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "cincin" diawali dengan suku kata ....',
                                'explanation' => 'Cincin diawali ci.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ci', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan tempat adalah ....',
                                'explanation' => 'Di mana menanyakan tempat.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'di mana', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Agar terhindar dari kuman sebelum makan kita harus mencuci tangan dengan ....',
                                'explanation' => 'Mencuci tangan dengan sabun.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lilin menyala di atas meja]
Benda pada gambar di atas adalah ....',
                                'explanation' => 'Benda tersebut adalah lilin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'lilin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "kaki" diawali dengan suku kata ....',
                                'explanation' => 'Kaki diawali ka.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ka', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "lari" diawali dengan suku kata ....',
                                'explanation' => 'Lari diawali la.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'la', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat larangan selalu memuat kata ....',
                                'explanation' => 'Kalimat larangan memuat kata jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hewan anjing menggonggong dengan bunyi ....',
                                'explanation' => 'Anjing bersuara guk-guk.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'guk-guk', 'is_correct' => true],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan di bawah ini dengan jelas!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ba"!',
                                'explanation' => 'Contoh: batu, baju, balon, bayi.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ca"!',
                                'explanation' => 'Contoh: cacing, cangkir, cabai.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ka"!',
                                'explanation' => 'Contoh: kaki, katak, kancing, kapal.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "la"!',
                                'explanation' => 'Contoh: lari, lampu, labu, lalat.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 waktu penting ketika kita harus mencuci tangan dengan sabun!',
                                'explanation' => 'Contoh: 1. Sebelum makan, 2. Setelah dari toilet / setelah bermain di luar.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAS Semester 1 (Bab 1 sampai 4) #3',
                'type' => 'pas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Semester 1 Paket #3 Bahasa Indonesia Kelas 1 SD: Ujian komprehensif Bab 1 sampai 4 (Bunyi, Bermain, Kuman, dan Kemandirian), huruf b, c, k, dan l.',
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
                                'prompt' => '[Keterangan Gambar: Bebek berenang di kolam]
Tiruan bunyi suara hewan pada gambar adalah ....',
                                'explanation' => 'Bebek bersuara kwek-kwek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kwek-kwek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'meong-meong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'petok-petok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "bola" adalah ....',
                                'explanation' => 'Bola diawali bo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang aman untuk bermain ayunan adalah ....',
                                'explanation' => 'Taman bermain adalah tempat yang aman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'taman bermain', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pinggir jalan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'atap rumah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Cangkir minuman hangat]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali huruf c.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'c', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'k', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya untuk menanyakan nama teman baru adalah ....',
                                'explanation' => 'Siapa menanyakan orang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Siapa', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Di mana', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Kapan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita mencuci tangan memakai sabun agar terhindar dari ....',
                                'explanation' => 'Sabun membunuh kuman penyebab sakit.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuman penyakit', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'wangi bunga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'air bersih', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kelinci memakan wortel]
Suku kata awal dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Kelinci diawali ke.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ke', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ku', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali suku kata "ku" adalah ....',
                                'explanation' => 'Kuda diawali ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuda', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kaki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kaca', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bersin, kita harus menutup mulut menggunakan ....',
                                'explanation' => 'Menutup dengan tisu atau lipatan siku tangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tisu atau lipatan siku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'buku gambar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sepatu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melompat tali di halaman]
Gerakan melompat tali menggunakan anggota tubuh ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kepala', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'leher', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali suku kata "la" adalah ....',
                                'explanation' => 'Lampu diawali la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lampu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lilin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lumpur', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang berisi larangan adalah ....',
                                'explanation' => 'Kalimat larangan diawali kata Jangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jangan lari di tangga!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Ayo kita ke kantin!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Buku ini sangat bagus.', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lukisan" adalah ....',
                                'explanation' => 'Lukisan diawali lu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'li', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'le', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Setelah selesai membaca, buku cerita sebaiknya ....',
                                'explanation' => 'Buku dirapikan di rak.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'disimpan di rak buku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'diletakkan di lantai', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'disobek halamannya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bunyi lonceng berdentang terdengar ....',
                                'explanation' => 'Lonceng berbunyi teng-teng.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'teng-teng', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'prok-prok', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kwek-kwek', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban yang benar!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kucing anggora sedang mengeong]
Suara tiruan hewan pada gambar adalah ....',
                                'explanation' => 'Kucing bersuara meong.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'meong', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "buku" diawali dengan suku kata ....',
                                'explanation' => 'Buku diawali bu.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'bu', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "cincin" diawali dengan suku kata ....',
                                'explanation' => 'Cincin diawali ci.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ci', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan tempat adalah ....',
                                'explanation' => 'Di mana menanyakan tempat.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'di mana', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Agar terhindar dari kuman sebelum makan kita harus mencuci tangan dengan ....',
                                'explanation' => 'Mencuci tangan dengan sabun.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lilin menyala di atas meja]
Benda pada gambar di atas adalah ....',
                                'explanation' => 'Benda tersebut adalah lilin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'lilin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "kaki" diawali dengan suku kata ....',
                                'explanation' => 'Kaki diawali ka.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ka', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "lari" diawali dengan suku kata ....',
                                'explanation' => 'Lari diawali la.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'la', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat larangan selalu memuat kata ....',
                                'explanation' => 'Kalimat larangan memuat kata jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hewan anjing menggonggong dengan bunyi ....',
                                'explanation' => 'Anjing bersuara guk-guk.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'guk-guk', 'is_correct' => true],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan di bawah ini dengan jelas!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ba"!',
                                'explanation' => 'Contoh: batu, baju, balon, bayi.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ca"!',
                                'explanation' => 'Contoh: cacing, cangkir, cabai.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ka"!',
                                'explanation' => 'Contoh: kaki, katak, kancing, kapal.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "la"!',
                                'explanation' => 'Contoh: lari, lampu, labu, lalat.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 waktu penting ketika kita harus mencuci tangan dengan sabun!',
                                'explanation' => 'Contoh: 1. Sebelum makan, 2. Setelah dari toilet / setelah bermain di luar.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
