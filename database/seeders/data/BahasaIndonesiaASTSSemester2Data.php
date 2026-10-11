<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaASTSSemester2Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASTS Semester 2 (Bab 5 dan 6) #1',
                'type' => 'pts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester 2 Paket #1 Bahasa Indonesia Kelas 1 SD: Menguji capaian Bab 5 (Teman Baru) dan Bab 6 (Berbeda Itu Tak Apa), suku kata m dan g, kata santun, dan saling menghargai.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak sedang berjabat tangan sambil tersenyum]
Sikap terpuji saat pertama kali bertemu teman baru adalah ....',
                                'explanation' => 'Tersenyum dan memperkenalkan diri dengan ramah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tersenyum dan bersalaman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'memalingkan muka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berteriak kencang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang kita ucapkan saat meminta bantuan teman adalah ....',
                                'explanation' => 'Kata tolong diucapkan saat meminta bantuan.',
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
                                'prompt' => '[Keterangan Gambar: Seekor gajah besar dengan belalai]
Nama hewan pada gambar diawali dengan huruf ....',
                                'explanation' => 'Gajah diawali huruf g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'm', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'c', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "meja" adalah ....',
                                'explanation' => 'Meja diawali me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "gi" adalah ....',
                                'explanation' => 'Gigi diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gigi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gula', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gajah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tanda baca di akhir kalimat berita sederhana adalah tanda ....',
                                'explanation' => 'Kalimat berita diakhiri titik (.).',
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
                                'prompt' => 'Jika teman kita tidak sengaja menjatuhkan pensil kita, sikap kita adalah ....',
                                'explanation' => 'Memaafkan teman dengan ikhlas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'memaafkannya', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'membalas menjatuhkan bukunya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'marah-marah di kelas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gula" adalah ....',
                                'explanation' => 'Gula diawali gu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ge', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak, satu tinggi dan satu pendek]
Perbedaan yang tampak pada gambar di atas adalah ....',
                                'explanation' => 'Perbedaan tinggi badan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tinggi badan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'warna seragam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jumlah tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "mu" adalah ....',
                                'explanation' => 'Mulut diawali mu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mulut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mata', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mobil', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Gambar mata anak yang sehat]
Nama bagian tubuh pada gambar adalah ....',
                                'explanation' => 'Bagian tubuh pada gambar adalah mata.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mata', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "gitar" diawali dengan suku kata ....',
                                'explanation' => 'Gitar diawali gi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'gi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Setelah ditolong oleh teman, kita mengucapkan ....',
                                'explanation' => 'Ucapan terima kasih.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'terima kasih', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "mobil" diawali dengan suku kata ....',
                                'explanation' => 'Mobil diawali mo.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mo', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut lurus adalah rambut ....',
                                'explanation' => 'Rambut keriting.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan di bawah ini dengan lengkap dan jelas!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ma"!',
                                'explanation' => 'Contoh: mata, madu, malam, masak.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ga"!',
                                'explanation' => 'Contoh: gajah, garam, garpu, gambar.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Kapan kita harus mengucapkan kata "maaf" kepada teman?',
                                'explanation' => 'Saat kita berbuat salah atau tidak sengaja mengganggu/merugikan teman.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana sikap kita terhadap teman yang berbeda suku atau bentuk rambut?',
                                'explanation' => 'Tetap ramah, menghargai perbedaannya, dan berteman dengan rukun tanpa membeda-bedakan.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Buatlah satu kalimat sederhana yang diakhiri dengan tanda titik (.)!',
                                'explanation' => 'Contoh: Ini buku Budi. atau Siti membaca buku cerita.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 2 (Bab 5 dan 6) #2',
                'type' => 'pts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester 2 Paket #2 Bahasa Indonesia Kelas 1 SD: Menguji capaian Bab 5 (Teman Baru) dan Bab 6 (Berbeda Itu Tak Apa), suku kata m dan g, kata santun, dan saling menghargai.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak sedang berjabat tangan sambil tersenyum]
Sikap terpuji saat pertama kali bertemu teman baru adalah ....',
                                'explanation' => 'Tersenyum dan memperkenalkan diri dengan ramah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tersenyum dan bersalaman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'memalingkan muka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berteriak kencang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang kita ucapkan saat meminta bantuan teman adalah ....',
                                'explanation' => 'Kata tolong diucapkan saat meminta bantuan.',
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
                                'prompt' => '[Keterangan Gambar: Seekor gajah besar dengan belalai]
Nama hewan pada gambar diawali dengan huruf ....',
                                'explanation' => 'Gajah diawali huruf g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'm', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'c', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "meja" adalah ....',
                                'explanation' => 'Meja diawali me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "gi" adalah ....',
                                'explanation' => 'Gigi diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gigi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gula', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gajah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tanda baca di akhir kalimat berita sederhana adalah tanda ....',
                                'explanation' => 'Kalimat berita diakhiri titik (.).',
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
                                'prompt' => 'Jika teman kita tidak sengaja menjatuhkan pensil kita, sikap kita adalah ....',
                                'explanation' => 'Memaafkan teman dengan ikhlas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'memaafkannya', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'membalas menjatuhkan bukunya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'marah-marah di kelas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gula" adalah ....',
                                'explanation' => 'Gula diawali gu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ge', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak, satu tinggi dan satu pendek]
Perbedaan yang tampak pada gambar di atas adalah ....',
                                'explanation' => 'Perbedaan tinggi badan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tinggi badan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'warna seragam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jumlah tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "mu" adalah ....',
                                'explanation' => 'Mulut diawali mu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mulut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mata', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mobil', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Gambar mata anak yang sehat]
Nama bagian tubuh pada gambar adalah ....',
                                'explanation' => 'Bagian tubuh pada gambar adalah mata.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mata', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "gitar" diawali dengan suku kata ....',
                                'explanation' => 'Gitar diawali gi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'gi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Setelah ditolong oleh teman, kita mengucapkan ....',
                                'explanation' => 'Ucapan terima kasih.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'terima kasih', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "mobil" diawali dengan suku kata ....',
                                'explanation' => 'Mobil diawali mo.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mo', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut lurus adalah rambut ....',
                                'explanation' => 'Rambut keriting.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan di bawah ini dengan lengkap dan jelas!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ma"!',
                                'explanation' => 'Contoh: mata, madu, malam, masak.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ga"!',
                                'explanation' => 'Contoh: gajah, garam, garpu, gambar.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Kapan kita harus mengucapkan kata "maaf" kepada teman?',
                                'explanation' => 'Saat kita berbuat salah atau tidak sengaja mengganggu/merugikan teman.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana sikap kita terhadap teman yang berbeda suku atau bentuk rambut?',
                                'explanation' => 'Tetap ramah, menghargai perbedaannya, dan berteman dengan rukun tanpa membeda-bedakan.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Buatlah satu kalimat sederhana yang diakhiri dengan tanda titik (.)!',
                                'explanation' => 'Contoh: Ini buku Budi. atau Siti membaca buku cerita.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 2 (Bab 5 dan 6) #3',
                'type' => 'pts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester 2 Paket #3 Bahasa Indonesia Kelas 1 SD: Menguji capaian Bab 5 (Teman Baru) dan Bab 6 (Berbeda Itu Tak Apa), suku kata m dan g, kata santun, dan saling menghargai.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak sedang berjabat tangan sambil tersenyum]
Sikap terpuji saat pertama kali bertemu teman baru adalah ....',
                                'explanation' => 'Tersenyum dan memperkenalkan diri dengan ramah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tersenyum dan bersalaman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'memalingkan muka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berteriak kencang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang kita ucapkan saat meminta bantuan teman adalah ....',
                                'explanation' => 'Kata tolong diucapkan saat meminta bantuan.',
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
                                'prompt' => '[Keterangan Gambar: Seekor gajah besar dengan belalai]
Nama hewan pada gambar diawali dengan huruf ....',
                                'explanation' => 'Gajah diawali huruf g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'm', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'c', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "meja" adalah ....',
                                'explanation' => 'Meja diawali me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "gi" adalah ....',
                                'explanation' => 'Gigi diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gigi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gula', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gajah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tanda baca di akhir kalimat berita sederhana adalah tanda ....',
                                'explanation' => 'Kalimat berita diakhiri titik (.).',
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
                                'prompt' => 'Jika teman kita tidak sengaja menjatuhkan pensil kita, sikap kita adalah ....',
                                'explanation' => 'Memaafkan teman dengan ikhlas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'memaafkannya', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'membalas menjatuhkan bukunya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'marah-marah di kelas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gula" adalah ....',
                                'explanation' => 'Gula diawali gu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ge', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak, satu tinggi dan satu pendek]
Perbedaan yang tampak pada gambar di atas adalah ....',
                                'explanation' => 'Perbedaan tinggi badan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tinggi badan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'warna seragam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jumlah tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "mu" adalah ....',
                                'explanation' => 'Mulut diawali mu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mulut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mata', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mobil', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Gambar mata anak yang sehat]
Nama bagian tubuh pada gambar adalah ....',
                                'explanation' => 'Bagian tubuh pada gambar adalah mata.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mata', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "gitar" diawali dengan suku kata ....',
                                'explanation' => 'Gitar diawali gi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'gi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Setelah ditolong oleh teman, kita mengucapkan ....',
                                'explanation' => 'Ucapan terima kasih.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'terima kasih', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "mobil" diawali dengan suku kata ....',
                                'explanation' => 'Mobil diawali mo.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mo', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut lurus adalah rambut ....',
                                'explanation' => 'Rambut keriting.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan di bawah ini dengan lengkap dan jelas!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ma"!',
                                'explanation' => 'Contoh: mata, madu, malam, masak.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ga"!',
                                'explanation' => 'Contoh: gajah, garam, garpu, gambar.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Kapan kita harus mengucapkan kata "maaf" kepada teman?',
                                'explanation' => 'Saat kita berbuat salah atau tidak sengaja mengganggu/merugikan teman.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana sikap kita terhadap teman yang berbeda suku atau bentuk rambut?',
                                'explanation' => 'Tetap ramah, menghargai perbedaannya, dan berteman dengan rukun tanpa membeda-bedakan.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Buatlah satu kalimat sederhana yang diakhiri dengan tanda titik (.)!',
                                'explanation' => 'Contoh: Ini buku Budi. atau Siti membaca buku cerita.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
