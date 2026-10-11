<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab6Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 6: Berbeda Itu Tak Apa',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 6 Bahasa Indonesia Kelas 1 SD: Menghargai perbedaan fisik dan kegemaran teman, suku kata berawalan huruf g, dan kata sifat sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak perempuan, satu berambut lurus dan satu berambut ikal keriting]
Perbedaan yang terlihat pada gambar di atas adalah bentuk ....',
                                'explanation' => 'Perbedaan bentuk rambut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'rambut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sepatu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Meskipun kita dan teman memiliki perbedaan kegemaran, sikap kita sebaiknya ....',
                                'explanation' => 'Saling menghormati dan hidup rukun.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling menghargai dan rukun', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mengejek dan memusuhi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tidak mau bermain bersama', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor gajah besar dengan belalai panjang]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Gajah diawali huruf g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'j', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'y', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gigi" adalah ....',
                                'explanation' => 'Gigi diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "gu" adalah ....',
                                'explanation' => 'Gula diawali suku kata gu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gula', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gajah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gitar', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lawan kata dari kata "tinggi" adalah ....',
                                'explanation' => 'Lawan kata tinggi adalah pendek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pendek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'besar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jauh', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Alat musik gitar berdawai]
Nama alat musik pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Gitar diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ge', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gelas" adalah ....',
                                'explanation' => 'Gelas diawali suku kata ge.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ge', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'go', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Budi suka menggambar, sedangkan Siti suka menyanyi. Sikap mereka sebaiknya ....',
                                'explanation' => 'Tetap berteman dan saling mendukung kesukaan masing-masing.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling mendukung kesukaan teman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merasa kesukaannya paling hebat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bertengkar setiap hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gol" adalah ....',
                                'explanation' => 'Gol diawali suku kata go.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'go', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ga', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Anak tersenyum memperlihatkan deretan gigi yang rapi]
Nama bagian tubuh pada gambar adalah ....',
                                'explanation' => 'Bagian tubuh pada gambar adalah gigi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'gigi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "gajah" diawali dengan suku kata ....',
                                'explanation' => 'Gajah diawali suku kata ga.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ga', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut "lurus" adalah rambut ....',
                                'explanation' => 'Lawan kata lurus adalah keriting atau ikal.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
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
                                'prompt' => 'Mengapa kita tidak boleh mengejek teman yang berbeda ciri fisik dengan kita?',
                                'explanation' => 'Karena setiap anak diciptakan unik dan istimewa, dan kita harus saling menyayangi antar sesama teman.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ga"!',
                                'explanation' => 'Contoh: gajah, garam, garpu, gambar.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 6: Berbeda Itu Tak Apa',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 6 Bahasa Indonesia Kelas 1 SD: Menghargai perbedaan fisik dan kegemaran teman, suku kata berawalan huruf g, dan kata sifat sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak perempuan, satu berambut lurus dan satu berambut ikal keriting]
Perbedaan yang terlihat pada gambar di atas adalah bentuk ....',
                                'explanation' => 'Perbedaan bentuk rambut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'rambut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sepatu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Meskipun kita dan teman memiliki perbedaan kegemaran, sikap kita sebaiknya ....',
                                'explanation' => 'Saling menghormati dan hidup rukun.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling menghargai dan rukun', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mengejek dan memusuhi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tidak mau bermain bersama', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor gajah besar dengan belalai panjang]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Gajah diawali huruf g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'j', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'y', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gigi" adalah ....',
                                'explanation' => 'Gigi diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "gu" adalah ....',
                                'explanation' => 'Gula diawali suku kata gu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gula', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gajah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gitar', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lawan kata dari kata "tinggi" adalah ....',
                                'explanation' => 'Lawan kata tinggi adalah pendek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pendek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'besar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jauh', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Alat musik gitar berdawai]
Nama alat musik pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Gitar diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ge', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gelas" adalah ....',
                                'explanation' => 'Gelas diawali suku kata ge.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ge', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'go', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Budi suka menggambar, sedangkan Siti suka menyanyi. Sikap mereka sebaiknya ....',
                                'explanation' => 'Tetap berteman dan saling mendukung kesukaan masing-masing.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling mendukung kesukaan teman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merasa kesukaannya paling hebat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bertengkar setiap hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gol" adalah ....',
                                'explanation' => 'Gol diawali suku kata go.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'go', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ga', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Anak tersenyum memperlihatkan deretan gigi yang rapi]
Nama bagian tubuh pada gambar adalah ....',
                                'explanation' => 'Bagian tubuh pada gambar adalah gigi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'gigi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "gajah" diawali dengan suku kata ....',
                                'explanation' => 'Gajah diawali suku kata ga.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ga', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut "lurus" adalah rambut ....',
                                'explanation' => 'Lawan kata lurus adalah keriting atau ikal.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
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
                                'prompt' => 'Mengapa kita tidak boleh mengejek teman yang berbeda ciri fisik dengan kita?',
                                'explanation' => 'Karena setiap anak diciptakan unik dan istimewa, dan kita harus saling menyayangi antar sesama teman.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ga"!',
                                'explanation' => 'Contoh: gajah, garam, garpu, gambar.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 6: Berbeda Itu Tak Apa',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 6 Bahasa Indonesia Kelas 1 SD: Menghargai perbedaan fisik dan kegemaran teman, suku kata berawalan huruf g, dan kata sifat sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak perempuan, satu berambut lurus dan satu berambut ikal keriting]
Perbedaan yang terlihat pada gambar di atas adalah bentuk ....',
                                'explanation' => 'Perbedaan bentuk rambut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'rambut', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sepatu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Meskipun kita dan teman memiliki perbedaan kegemaran, sikap kita sebaiknya ....',
                                'explanation' => 'Saling menghormati dan hidup rukun.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling menghargai dan rukun', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mengejek dan memusuhi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tidak mau bermain bersama', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor gajah besar dengan belalai panjang]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Gajah diawali huruf g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'j', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'y', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gigi" adalah ....',
                                'explanation' => 'Gigi diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "gu" adalah ....',
                                'explanation' => 'Gula diawali suku kata gu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gula', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gajah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'gitar', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lawan kata dari kata "tinggi" adalah ....',
                                'explanation' => 'Lawan kata tinggi adalah pendek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pendek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'besar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jauh', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Alat musik gitar berdawai]
Nama alat musik pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Gitar diawali suku kata gi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'gi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ge', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gelas" adalah ....',
                                'explanation' => 'Gelas diawali suku kata ge.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ge', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'go', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Budi suka menggambar, sedangkan Siti suka menyanyi. Sikap mereka sebaiknya ....',
                                'explanation' => 'Tetap berteman dan saling mendukung kesukaan masing-masing.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling mendukung kesukaan teman', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'merasa kesukaannya paling hebat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bertengkar setiap hari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "gol" adalah ....',
                                'explanation' => 'Gol diawali suku kata go.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'go', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'gu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ga', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Anak tersenyum memperlihatkan deretan gigi yang rapi]
Nama bagian tubuh pada gambar adalah ....',
                                'explanation' => 'Bagian tubuh pada gambar adalah gigi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'gigi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "gajah" diawali dengan suku kata ....',
                                'explanation' => 'Gajah diawali suku kata ga.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ga', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut "lurus" adalah rambut ....',
                                'explanation' => 'Lawan kata lurus adalah keriting atau ikal.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
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
                                'prompt' => 'Mengapa kita tidak boleh mengejek teman yang berbeda ciri fisik dengan kita?',
                                'explanation' => 'Karena setiap anak diciptakan unik dan istimewa, dan kita harus saling menyayangi antar sesama teman.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ga"!',
                                'explanation' => 'Contoh: gajah, garam, garpu, gambar.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
