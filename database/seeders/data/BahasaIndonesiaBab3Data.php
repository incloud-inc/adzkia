<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab3Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 3: Awas Kuman!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 3 Bahasa Indonesia Kelas 1 SD: Menjaga kebersihan diri, mencuci tangan pakai sabun, bahaya kuman penyakit, dan suku kata berawalan huruf k.',
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
                                'prompt' => '[Keterangan Gambar: Anak sedang mencuci tangan dengan sabun dan air mengalir]
Kegiatan pada gambar dilakukan untuk membersihkan kuman dengan ....',
                                'explanation' => 'Mencuci tangan harus menggunakan sabun dan air mengalir.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sabun dan air mengalir', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kain kotor', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'minyak goreng', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kuman adalah makhluk hidup yang sangat kecil dan dapat menyebabkan kita ....',
                                'explanation' => 'Kuman dapat menyebabkan tubuh menjadi sakit.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tumbuh besar', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'menjadi sakit', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'kenyang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kuda gagah sedang berlari]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Kuda diawali huruf k.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'k', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'c', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 't', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "kuman" adalah ....',
                                'explanation' => 'Kata kuman diawali suku kata ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'ki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ku', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bersin atau batuk, sebaiknya kita menutup mulut dengan ....',
                                'explanation' => 'Menutup mulut dengan sapu tangan atau siku bagian dalam agar kuman tidak menyebar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tisu atau lipatan siku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'telapak tangan teman', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'buku tulis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ka" adalah ....',
                                'explanation' => 'Kaki diawali suku kata ka.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kuda', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kucing', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak sedang menyikat gigi di depan cermin]
Menyikat gigi secara teratur membuat gigi menjadi ....',
                                'explanation' => 'Menyikat gigi membuat gigi bersih dan bebas kuman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bersih dan sehat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berlubang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kuning kecokelatan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari nama hewan "kelinci" adalah ....',
                                'explanation' => 'Kelinci diawali suku kata ke.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ke', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ko', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita harus mencuci tangan sebelum ....',
                                'explanation' => 'Sebelum makan kita wajib mencuci tangan agar kuman tidak masuk ke perut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'makan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tidur malam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berlari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "ki" adalah ....',
                                'explanation' => 'Kipas diawali suku kata ki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kipas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kapas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kotak', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Busa sabun mandi di atas telapak tangan]
Benda pada gambar yang dipakai membersihkan badan saat mandi adalah ....',
                                'explanation' => 'Benda pembersih tubuh adalah sabun.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Suku kata "ko" jika digabung dengan "tak" membentuk kata ....',
                                'explanation' => 'ko + tak = kotak.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kotak', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika kuku tangan kita panjang dan kotor, kita harus segera ....',
                                'explanation' => 'Kuku panjang harus dipotong.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'memotongnya', 'is_correct' => true],
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
                                'prompt' => 'Mengapa kita harus mencuci tangan dengan sabun setelah bermain di luar rumah?',
                                'explanation' => 'Agar kuman dan kotoran mati dan hilang sehingga tubuh tetap sehat dan terhindar dari penyakit.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ku"!',
                                'explanation' => 'Contoh: kuda, kuku, kuman, kulit.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 3: Awas Kuman!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 3 Bahasa Indonesia Kelas 1 SD: Menjaga kebersihan diri, mencuci tangan pakai sabun, bahaya kuman penyakit, dan suku kata berawalan huruf k.',
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
                                'prompt' => '[Keterangan Gambar: Anak sedang mencuci tangan dengan sabun dan air mengalir]
Kegiatan pada gambar dilakukan untuk membersihkan kuman dengan ....',
                                'explanation' => 'Mencuci tangan harus menggunakan sabun dan air mengalir.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sabun dan air mengalir', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kain kotor', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'minyak goreng', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kuman adalah makhluk hidup yang sangat kecil dan dapat menyebabkan kita ....',
                                'explanation' => 'Kuman dapat menyebabkan tubuh menjadi sakit.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tumbuh besar', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'menjadi sakit', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'kenyang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kuda gagah sedang berlari]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Kuda diawali huruf k.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'k', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'c', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 't', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "kuman" adalah ....',
                                'explanation' => 'Kata kuman diawali suku kata ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'ki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ku', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bersin atau batuk, sebaiknya kita menutup mulut dengan ....',
                                'explanation' => 'Menutup mulut dengan sapu tangan atau siku bagian dalam agar kuman tidak menyebar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tisu atau lipatan siku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'telapak tangan teman', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'buku tulis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ka" adalah ....',
                                'explanation' => 'Kaki diawali suku kata ka.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kuda', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kucing', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak sedang menyikat gigi di depan cermin]
Menyikat gigi secara teratur membuat gigi menjadi ....',
                                'explanation' => 'Menyikat gigi membuat gigi bersih dan bebas kuman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bersih dan sehat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berlubang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kuning kecokelatan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari nama hewan "kelinci" adalah ....',
                                'explanation' => 'Kelinci diawali suku kata ke.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ke', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ko', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita harus mencuci tangan sebelum ....',
                                'explanation' => 'Sebelum makan kita wajib mencuci tangan agar kuman tidak masuk ke perut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'makan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tidur malam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berlari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "ki" adalah ....',
                                'explanation' => 'Kipas diawali suku kata ki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kipas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kapas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kotak', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Busa sabun mandi di atas telapak tangan]
Benda pada gambar yang dipakai membersihkan badan saat mandi adalah ....',
                                'explanation' => 'Benda pembersih tubuh adalah sabun.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Suku kata "ko" jika digabung dengan "tak" membentuk kata ....',
                                'explanation' => 'ko + tak = kotak.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kotak', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika kuku tangan kita panjang dan kotor, kita harus segera ....',
                                'explanation' => 'Kuku panjang harus dipotong.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'memotongnya', 'is_correct' => true],
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
                                'prompt' => 'Mengapa kita harus mencuci tangan dengan sabun setelah bermain di luar rumah?',
                                'explanation' => 'Agar kuman dan kotoran mati dan hilang sehingga tubuh tetap sehat dan terhindar dari penyakit.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ku"!',
                                'explanation' => 'Contoh: kuda, kuku, kuman, kulit.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 3: Awas Kuman!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 3 Bahasa Indonesia Kelas 1 SD: Menjaga kebersihan diri, mencuci tangan pakai sabun, bahaya kuman penyakit, dan suku kata berawalan huruf k.',
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
                                'prompt' => '[Keterangan Gambar: Anak sedang mencuci tangan dengan sabun dan air mengalir]
Kegiatan pada gambar dilakukan untuk membersihkan kuman dengan ....',
                                'explanation' => 'Mencuci tangan harus menggunakan sabun dan air mengalir.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sabun dan air mengalir', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kain kotor', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'minyak goreng', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kuman adalah makhluk hidup yang sangat kecil dan dapat menyebabkan kita ....',
                                'explanation' => 'Kuman dapat menyebabkan tubuh menjadi sakit.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tumbuh besar', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'menjadi sakit', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'kenyang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kuda gagah sedang berlari]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Kuda diawali huruf k.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'k', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'c', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 't', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "kuman" adalah ....',
                                'explanation' => 'Kata kuman diawali suku kata ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'ki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ku', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bersin atau batuk, sebaiknya kita menutup mulut dengan ....',
                                'explanation' => 'Menutup mulut dengan sapu tangan atau siku bagian dalam agar kuman tidak menyebar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tisu atau lipatan siku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'telapak tangan teman', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'buku tulis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ka" adalah ....',
                                'explanation' => 'Kaki diawali suku kata ka.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kuda', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kucing', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak sedang menyikat gigi di depan cermin]
Menyikat gigi secara teratur membuat gigi menjadi ....',
                                'explanation' => 'Menyikat gigi membuat gigi bersih dan bebas kuman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bersih dan sehat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berlubang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kuning kecokelatan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari nama hewan "kelinci" adalah ....',
                                'explanation' => 'Kelinci diawali suku kata ke.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ke', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ko', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita harus mencuci tangan sebelum ....',
                                'explanation' => 'Sebelum makan kita wajib mencuci tangan agar kuman tidak masuk ke perut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'makan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tidur malam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berlari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "ki" adalah ....',
                                'explanation' => 'Kipas diawali suku kata ki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kipas', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kapas', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kotak', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Busa sabun mandi di atas telapak tangan]
Benda pada gambar yang dipakai membersihkan badan saat mandi adalah ....',
                                'explanation' => 'Benda pembersih tubuh adalah sabun.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Suku kata "ko" jika digabung dengan "tak" membentuk kata ....',
                                'explanation' => 'ko + tak = kotak.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kotak', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika kuku tangan kita panjang dan kotor, kita harus segera ....',
                                'explanation' => 'Kuku panjang harus dipotong.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'memotongnya', 'is_correct' => true],
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
                                'prompt' => 'Mengapa kita harus mencuci tangan dengan sabun setelah bermain di luar rumah?',
                                'explanation' => 'Agar kuman dan kotoran mati dan hilang sehingga tubuh tetap sehat dan terhindar dari penyakit.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ku"!',
                                'explanation' => 'Contoh: kuda, kuku, kuman, kulit.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
