<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab5Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 5: Teman Baru',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 5 Bahasa Indonesia Kelas 1 SD: Berkenalan dengan ramah, empat kata ajaib (tolong, maaf, terima kasih, permisi), suku kata huruf m, dan tanda titik.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak tersenyum ramah sambil bersalaman]
Saat berkenalan dengan teman baru di kelas, sikap kita adalah ....',
                                'explanation' => 'Berkenalan dengan tersenyum ramah dan bersalaman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tersenyum dan bersalaman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'cemberut dan membuang muka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bersembunyi di balik pintu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika kita membutuhkan bantuan teman, kata ajaib yang kita ucapkan adalah ....',
                                'explanation' => 'Meminta bantuan menggunakan kata tolong.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tolong', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'maaf', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permisi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Meja belajar kayu berwarna cokelat]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Meja diawali suku kata me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ma" adalah ....',
                                'explanation' => 'Mata diawali suku kata ma.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mata', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mobil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'madu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Setelah ditolong oleh teman, kita harus mengucapkan ....',
                                'explanation' => 'Menerima pertolongan diakhiri dengan terima kasih.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'terima kasih', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sampai jumpa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'maafkan aku', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tanda baca yang diletakkan pada akhir kalimat berita sederhana adalah tanda ....',
                                'explanation' => 'Kalimat berita diakhiri dengan tanda titik (.).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'titik (.)', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tanya (?)', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'seru (!)', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tidak sengaja menabrak teman hingga bukunya jatuh]
Kata santun yang harus segera diucapkan adalah ....',
                                'explanation' => 'Saat melakukan kesalahan kita mengucap maaf.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'maaf', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'terima kasih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'halo', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "mobil" adalah ....',
                                'explanation' => 'Mobil diawali suku kata mo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "mu" adalah ....',
                                'explanation' => 'Mulut diawali suku kata mu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mulut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merpati', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mangga', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika hendak lewat di depan guru yang sedang berdiri, kita mengucapkan ....',
                                'explanation' => 'Lewat di depan orang lain mengucap permisi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'permisi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tolong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hai', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Dua bola mata]
Nama anggota tubuh untuk melihat pada gambar adalah ....',
                                'explanation' => 'Anggota tubuh untuk melihat adalah mata.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mata', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "minum" diawali dengan suku kata ....',
                                'explanation' => 'Minum diawali mi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika kita berbuat kesalahan kepada teman, kita harus segera meminta ....',
                                'explanation' => 'Berbuat salah harus meminta maaf.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'maaf', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 3 dari 4 kata ajaib yang harus selalu kita ucapkan dengan sopan!',
                                'explanation' => 'Jawaban: tolong, maaf, terima kasih, permisi (pilih 3).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "me"!',
                                'explanation' => 'Contoh: meja, melati, merah, merah jambu.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 5: Teman Baru',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 5 Bahasa Indonesia Kelas 1 SD: Berkenalan dengan ramah, empat kata ajaib (tolong, maaf, terima kasih, permisi), suku kata huruf m, dan tanda titik.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak tersenyum ramah sambil bersalaman]
Saat berkenalan dengan teman baru di kelas, sikap kita adalah ....',
                                'explanation' => 'Berkenalan dengan tersenyum ramah dan bersalaman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tersenyum dan bersalaman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'cemberut dan membuang muka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bersembunyi di balik pintu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika kita membutuhkan bantuan teman, kata ajaib yang kita ucapkan adalah ....',
                                'explanation' => 'Meminta bantuan menggunakan kata tolong.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tolong', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'maaf', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permisi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Meja belajar kayu berwarna cokelat]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Meja diawali suku kata me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ma" adalah ....',
                                'explanation' => 'Mata diawali suku kata ma.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mata', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mobil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'madu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Setelah ditolong oleh teman, kita harus mengucapkan ....',
                                'explanation' => 'Menerima pertolongan diakhiri dengan terima kasih.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'terima kasih', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sampai jumpa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'maafkan aku', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tanda baca yang diletakkan pada akhir kalimat berita sederhana adalah tanda ....',
                                'explanation' => 'Kalimat berita diakhiri dengan tanda titik (.).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'titik (.)', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tanya (?)', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'seru (!)', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tidak sengaja menabrak teman hingga bukunya jatuh]
Kata santun yang harus segera diucapkan adalah ....',
                                'explanation' => 'Saat melakukan kesalahan kita mengucap maaf.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'maaf', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'terima kasih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'halo', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "mobil" adalah ....',
                                'explanation' => 'Mobil diawali suku kata mo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "mu" adalah ....',
                                'explanation' => 'Mulut diawali suku kata mu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mulut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merpati', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mangga', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika hendak lewat di depan guru yang sedang berdiri, kita mengucapkan ....',
                                'explanation' => 'Lewat di depan orang lain mengucap permisi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'permisi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tolong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hai', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Dua bola mata]
Nama anggota tubuh untuk melihat pada gambar adalah ....',
                                'explanation' => 'Anggota tubuh untuk melihat adalah mata.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mata', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "minum" diawali dengan suku kata ....',
                                'explanation' => 'Minum diawali mi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika kita berbuat kesalahan kepada teman, kita harus segera meminta ....',
                                'explanation' => 'Berbuat salah harus meminta maaf.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'maaf', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 3 dari 4 kata ajaib yang harus selalu kita ucapkan dengan sopan!',
                                'explanation' => 'Jawaban: tolong, maaf, terima kasih, permisi (pilih 3).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "me"!',
                                'explanation' => 'Contoh: meja, melati, merah, merah jambu.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 5: Teman Baru',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 5 Bahasa Indonesia Kelas 1 SD: Berkenalan dengan ramah, empat kata ajaib (tolong, maaf, terima kasih, permisi), suku kata huruf m, dan tanda titik.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak tersenyum ramah sambil bersalaman]
Saat berkenalan dengan teman baru di kelas, sikap kita adalah ....',
                                'explanation' => 'Berkenalan dengan tersenyum ramah dan bersalaman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tersenyum dan bersalaman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'cemberut dan membuang muka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bersembunyi di balik pintu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika kita membutuhkan bantuan teman, kata ajaib yang kita ucapkan adalah ....',
                                'explanation' => 'Meminta bantuan menggunakan kata tolong.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tolong', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'maaf', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permisi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Meja belajar kayu berwarna cokelat]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Meja diawali suku kata me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ma" adalah ....',
                                'explanation' => 'Mata diawali suku kata ma.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mata', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mobil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'madu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Setelah ditolong oleh teman, kita harus mengucapkan ....',
                                'explanation' => 'Menerima pertolongan diakhiri dengan terima kasih.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'terima kasih', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sampai jumpa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'maafkan aku', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tanda baca yang diletakkan pada akhir kalimat berita sederhana adalah tanda ....',
                                'explanation' => 'Kalimat berita diakhiri dengan tanda titik (.).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'titik (.)', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tanya (?)', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'seru (!)', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tidak sengaja menabrak teman hingga bukunya jatuh]
Kata santun yang harus segera diucapkan adalah ....',
                                'explanation' => 'Saat melakukan kesalahan kita mengucap maaf.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'maaf', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'terima kasih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'halo', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "mobil" adalah ....',
                                'explanation' => 'Mobil diawali suku kata mo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "mu" adalah ....',
                                'explanation' => 'Mulut diawali suku kata mu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mulut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merpati', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mangga', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ketika hendak lewat di depan guru yang sedang berdiri, kita mengucapkan ....',
                                'explanation' => 'Lewat di depan orang lain mengucap permisi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'permisi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tolong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hai', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Dua bola mata]
Nama anggota tubuh untuk melihat pada gambar adalah ....',
                                'explanation' => 'Anggota tubuh untuk melihat adalah mata.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mata', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "minum" diawali dengan suku kata ....',
                                'explanation' => 'Minum diawali mi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jika kita berbuat kesalahan kepada teman, kita harus segera meminta ....',
                                'explanation' => 'Berbuat salah harus meminta maaf.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'maaf', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 3 dari 4 kata ajaib yang harus selalu kita ucapkan dengan sopan!',
                                'explanation' => 'Jawaban: tolong, maaf, terima kasih, permisi (pilih 3).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "me"!',
                                'explanation' => 'Contoh: meja, melati, merah, merah jambu.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
