<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab4Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 4: Aku Bisa!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 4 Bahasa Indonesia Kelas 1 SD: Mengenal gerakan tubuh, kemandirian anak, suku kata berawalan huruf l, dan kalimat petunjuk/larangan sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Anak kecil memakai sepatu sendiri tanpa dibantu]
Kegiatan pada gambar menunjukkan anak yang ....',
                                'explanation' => 'Memakai sepatu sendiri adalah contoh sikap mandiri.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mandiri', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'manja', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'malas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Gerakan melompat dilakukan dengan menggunakan anggota tubuh yaitu ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tangan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kepala', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lampu belajar menyala di atas meja]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Lampu diawali suku kata lam / la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'la', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'li', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "li" adalah ....',
                                'explanation' => 'Lilin diawali suku kata li.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lilin', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lalat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lontong', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh kalimat larangan yang santun adalah ....',
                                'explanation' => 'Kalimat larangan memakai kata jangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jangan berlari di lantai yang basah!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Ayo kita makan bersama!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Bolehkah aku meminjam pensilmu?', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lukisan" adalah ....',
                                'explanation' => 'Lukisan diawali suku kata lu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'la', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'le', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak merapikan mainan ke dalam kotak rak]
Setelah selesai bermain, mainan sebaiknya ....',
                                'explanation' => 'Mainan dirapikan kembali ke tempatnya.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'dibiarkan berantakan', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'dirapikan ke tempatnya', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'dibuang ke luar', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "le" adalah ....',
                                'explanation' => 'Leher diawali suku kata le.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'leher', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lidah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lutut', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Anggota tubuh yang digunakan untuk merasakan manisnya es krim adalah ....',
                                'explanation' => 'Lidah berfungsi untuk mengecap rasa.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lidah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'telinga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mata', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lorong" adalah ....',
                                'explanation' => 'Lorong diawali suku kata lo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'la', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lu', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan kata yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lilin menyala tegak]
Nama benda penerang pada gambar adalah ....',
                                'explanation' => 'Benda pada gambar adalah lilin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'lilin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "lari" terdiri dari suku kata la dan ....',
                                'explanation' => 'la + ri = lari.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ri', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata yang digunakan dalam kalimat larangan adalah ....',
                                'explanation' => 'Kata larangan adalah jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 contoh kegiatan mandiri yang sudah bisa kamu lakukan sendiri di rumah!',
                                'explanation' => 'Contoh: memakai sepatu sendiri, merapikan tempat tidur, makan sendiri, mencuci tangan.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "la"!',
                                'explanation' => 'Contoh: lari, lampu, labu, lalat.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 4: Aku Bisa!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 4 Bahasa Indonesia Kelas 1 SD: Mengenal gerakan tubuh, kemandirian anak, suku kata berawalan huruf l, dan kalimat petunjuk/larangan sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Anak kecil memakai sepatu sendiri tanpa dibantu]
Kegiatan pada gambar menunjukkan anak yang ....',
                                'explanation' => 'Memakai sepatu sendiri adalah contoh sikap mandiri.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mandiri', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'manja', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'malas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Gerakan melompat dilakukan dengan menggunakan anggota tubuh yaitu ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tangan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kepala', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lampu belajar menyala di atas meja]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Lampu diawali suku kata lam / la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'la', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'li', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "li" adalah ....',
                                'explanation' => 'Lilin diawali suku kata li.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lilin', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lalat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lontong', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh kalimat larangan yang santun adalah ....',
                                'explanation' => 'Kalimat larangan memakai kata jangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jangan berlari di lantai yang basah!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Ayo kita makan bersama!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Bolehkah aku meminjam pensilmu?', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lukisan" adalah ....',
                                'explanation' => 'Lukisan diawali suku kata lu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'la', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'le', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak merapikan mainan ke dalam kotak rak]
Setelah selesai bermain, mainan sebaiknya ....',
                                'explanation' => 'Mainan dirapikan kembali ke tempatnya.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'dibiarkan berantakan', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'dirapikan ke tempatnya', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'dibuang ke luar', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "le" adalah ....',
                                'explanation' => 'Leher diawali suku kata le.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'leher', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lidah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lutut', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Anggota tubuh yang digunakan untuk merasakan manisnya es krim adalah ....',
                                'explanation' => 'Lidah berfungsi untuk mengecap rasa.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lidah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'telinga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mata', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lorong" adalah ....',
                                'explanation' => 'Lorong diawali suku kata lo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'la', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lu', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan kata yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lilin menyala tegak]
Nama benda penerang pada gambar adalah ....',
                                'explanation' => 'Benda pada gambar adalah lilin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'lilin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "lari" terdiri dari suku kata la dan ....',
                                'explanation' => 'la + ri = lari.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ri', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata yang digunakan dalam kalimat larangan adalah ....',
                                'explanation' => 'Kata larangan adalah jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 contoh kegiatan mandiri yang sudah bisa kamu lakukan sendiri di rumah!',
                                'explanation' => 'Contoh: memakai sepatu sendiri, merapikan tempat tidur, makan sendiri, mencuci tangan.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "la"!',
                                'explanation' => 'Contoh: lari, lampu, labu, lalat.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 4: Aku Bisa!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 4 Bahasa Indonesia Kelas 1 SD: Mengenal gerakan tubuh, kemandirian anak, suku kata berawalan huruf l, dan kalimat petunjuk/larangan sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Anak kecil memakai sepatu sendiri tanpa dibantu]
Kegiatan pada gambar menunjukkan anak yang ....',
                                'explanation' => 'Memakai sepatu sendiri adalah contoh sikap mandiri.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mandiri', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'manja', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'malas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Gerakan melompat dilakukan dengan menggunakan anggota tubuh yaitu ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tangan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kepala', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lampu belajar menyala di atas meja]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Lampu diawali suku kata lam / la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'la', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'li', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "li" adalah ....',
                                'explanation' => 'Lilin diawali suku kata li.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lilin', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lalat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lontong', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh kalimat larangan yang santun adalah ....',
                                'explanation' => 'Kalimat larangan memakai kata jangan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jangan berlari di lantai yang basah!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Ayo kita makan bersama!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Bolehkah aku meminjam pensilmu?', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lukisan" adalah ....',
                                'explanation' => 'Lukisan diawali suku kata lu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'la', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'le', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak merapikan mainan ke dalam kotak rak]
Setelah selesai bermain, mainan sebaiknya ....',
                                'explanation' => 'Mainan dirapikan kembali ke tempatnya.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'dibiarkan berantakan', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'dirapikan ke tempatnya', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'dibuang ke luar', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "le" adalah ....',
                                'explanation' => 'Leher diawali suku kata le.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'leher', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lidah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lutut', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Anggota tubuh yang digunakan untuk merasakan manisnya es krim adalah ....',
                                'explanation' => 'Lidah berfungsi untuk mengecap rasa.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lidah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'telinga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mata', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "lorong" adalah ....',
                                'explanation' => 'Lorong diawali suku kata lo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'la', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lu', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan kata yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lilin menyala tegak]
Nama benda penerang pada gambar adalah ....',
                                'explanation' => 'Benda pada gambar adalah lilin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'lilin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "lari" terdiri dari suku kata la dan ....',
                                'explanation' => 'la + ri = lari.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ri', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata yang digunakan dalam kalimat larangan adalah ....',
                                'explanation' => 'Kata larangan adalah jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 contoh kegiatan mandiri yang sudah bisa kamu lakukan sendiri di rumah!',
                                'explanation' => 'Contoh: memakai sepatu sendiri, merapikan tempat tidur, makan sendiri, mencuci tangan.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "la"!',
                                'explanation' => 'Contoh: lari, lampu, labu, lalat.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
