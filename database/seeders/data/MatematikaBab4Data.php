<?php

namespace Database\Seeders\Data;

class MatematikaBab4Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 4: Bentuk Bangun Datar dan Bangun Ruang Sederhana',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 1 Bab 4 Matematika Kelas 1 SD Kurikulum Merdeka: Mengenal bentuk bangun datar (segitiga, segiempat, lingkaran) dan bangun ruang sederhana (balok, kubus, tabung, bola).',
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
                                'prompt' => '[Keterangan Gambar: Bentuk lingkaran sempurna]
Bangun datar pada gambar berbentuk ....',
                                'explanation' => 'Bentuk bulat tanpa sudut adalah lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bentuk segitiga dengan 3 sisi dan 3 sudut]
Bangun datar yang memiliki 3 sisi adalah ....',
                                'explanation' => 'Segitiga memiliki 3 sisi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segitiga', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buku tulis berbentuk segiempat]
Permukaan buku tulis umumnya berbentuk ....',
                                'explanation' => 'Buku tulis berbentuk segiempat.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segiempat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lingkaran', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segitiga', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Uang koin bulat]
Uang koin logam berbentuk ....',
                                'explanation' => 'Uang koin berbentuk lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bola sepak bundar]
Benda pada gambar memiliki bentuk bangun ruang ....',
                                'explanation' => 'Bola sepak berbentuk bangun ruang bola.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kaleng susu cair]
Kaleng susu berbentuk bangun ruang ....',
                                'explanation' => 'Kaleng berbentuk tabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak kardus mie instan]
Kotak kardus pada gambar berbentuk ....',
                                'explanation' => 'Kotak kardus berbentuk balok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'balok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bola', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tabung', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dadu permainan dengan 6 sisi persegi sama besar]
Dadu berbentuk bangun ruang ....',
                                'explanation' => 'Dadu berbentuk kubus.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kubus', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak sudut pada bangun segitiga ada ....',
                                'explanation' => 'Segitiga memiliki 3 sudut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '0', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun datar yang tidak memiliki sudut adalah ....',
                                'explanation' => 'Lingkaran tidak memiliki sudut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segitiga', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Potongan pizza berbentuk segitiga]
Bentuk bangun datar potongan pizza adalah ....',
                                'explanation' => 'segitiga',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Permukaan jam dinding yang bulat berbentuk bangun ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kotak kado berbentuk kubus]
Kotak kado berbentuk bangun ruang ....',
                                'explanation' => 'kubus / balok',
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
                                'prompt' => '[Keterangan Gambar: Benda-benda di kelas: jam dinding, papan tulis, penggaris segitiga]
Sebutkan bentuk bangun datar dari jam dinding bulat dan papan tulis!',
                                'explanation' => 'Jam dinding berbentuk lingkaran, sedangkan papan tulis berbentuk segiempat.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh benda di sekitarmu yang berbentuk bangun ruang bola dan tabung!',
                                'explanation' => 'Contoh bola: bola sepak, kelereng, jeruk. Contoh tabung: kaleng susu, botol minum, gelas.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 4: Bentuk Bangun Datar dan Bangun Ruang Sederhana',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 2 Bab 4 Matematika Kelas 1 SD Kurikulum Merdeka: Mengenal bentuk bangun datar (segitiga, segiempat, lingkaran) dan bangun ruang sederhana (balok, kubus, tabung, bola).',
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
                                'prompt' => '[Keterangan Gambar: Roda sepeda yang berputar]
Roda sepeda berbentuk ....',
                                'explanation' => 'Roda sepeda berbentuk lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segitiga', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bentuk segitiga dengan 3 sisi dan 3 sudut]
Bangun datar yang memiliki 3 sisi adalah ....',
                                'explanation' => 'Segitiga memiliki 3 sisi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segitiga', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buku tulis berbentuk segiempat]
Permukaan buku tulis umumnya berbentuk ....',
                                'explanation' => 'Buku tulis berbentuk segiempat.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segiempat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lingkaran', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segitiga', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Uang koin bulat]
Uang koin logam berbentuk ....',
                                'explanation' => 'Uang koin berbentuk lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bola sepak bundar]
Benda pada gambar memiliki bentuk bangun ruang ....',
                                'explanation' => 'Bola sepak berbentuk bangun ruang bola.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kaleng susu cair]
Kaleng susu berbentuk bangun ruang ....',
                                'explanation' => 'Kaleng berbentuk tabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak pasta gigi / odol]
Kotak odol berbentuk bangun ruang ....',
                                'explanation' => 'Kotak pasta gigi berbentuk balok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'balok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dadu permainan dengan 6 sisi persegi sama besar]
Dadu berbentuk bangun ruang ....',
                                'explanation' => 'Dadu berbentuk kubus.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kubus', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak sudut pada bangun segitiga ada ....',
                                'explanation' => 'Segitiga memiliki 3 sudut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '0', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun datar yang tidak memiliki sudut adalah ....',
                                'explanation' => 'Lingkaran tidak memiliki sudut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segitiga', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Potongan pizza berbentuk segitiga]
Bentuk bangun datar potongan pizza adalah ....',
                                'explanation' => 'segitiga',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Permukaan jam dinding yang bulat berbentuk bangun ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kotak kado berbentuk kubus]
Kotak kado berbentuk bangun ruang ....',
                                'explanation' => 'kubus / balok',
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
                                'prompt' => '[Keterangan Gambar: Benda-benda di kelas: jam dinding, papan tulis, penggaris segitiga]
Sebutkan bentuk bangun datar dari jam dinding bulat dan papan tulis!',
                                'explanation' => 'Jam dinding berbentuk lingkaran, sedangkan papan tulis berbentuk segiempat.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh benda di sekitarmu yang berbentuk bangun ruang bola dan tabung!',
                                'explanation' => 'Contoh bola: bola sepak, kelereng, jeruk. Contoh tabung: kaleng susu, botol minum, gelas.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 4: Bentuk Bangun Datar dan Bangun Ruang Sederhana',
                'type' => 'ph',
                'duration_minutes' => 45,
                'description' => 'Kuis 3 Bab 4 Matematika Kelas 1 SD Kurikulum Merdeka: Mengenal bentuk bangun datar (segitiga, segiempat, lingkaran) dan bangun ruang sederhana (balok, kubus, tabung, bola).',
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
                                'prompt' => '[Keterangan Gambar: Bentuk lingkaran sempurna]
Bangun datar pada gambar berbentuk ....',
                                'explanation' => 'Bentuk bulat tanpa sudut adalah lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bentuk segitiga dengan 3 sisi dan 3 sudut]
Bangun datar yang memiliki 3 sisi adalah ....',
                                'explanation' => 'Segitiga memiliki 3 sisi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segitiga', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis di kelas]
Permukaan papan tulis berbentuk ....',
                                'explanation' => 'Papan tulis berbentuk segiempat.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'segiempat', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lingkaran', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Uang koin bulat]
Uang koin logam berbentuk ....',
                                'explanation' => 'Uang koin berbentuk lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bola sepak bundar]
Benda pada gambar memiliki bentuk bangun ruang ....',
                                'explanation' => 'Bola sepak berbentuk bangun ruang bola.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bola', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'balok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Gelas minum berbentuk silinder]
Gelas minum berbentuk bangun ruang ....',
                                'explanation' => 'Gelas minum berbentuk tabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'balok', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kubus', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak kardus mie instan]
Kotak kardus pada gambar berbentuk ....',
                                'explanation' => 'Kotak kardus berbentuk balok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'balok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bola', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'tabung', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dadu permainan dengan 6 sisi persegi sama besar]
Dadu berbentuk bangun ruang ....',
                                'explanation' => 'Dadu berbentuk kubus.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kubus', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tabung', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak sudut pada bangun segitiga ada ....',
                                'explanation' => 'Segitiga memiliki 3 sudut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '0', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun datar yang tidak memiliki sudut adalah ....',
                                'explanation' => 'Lingkaran tidak memiliki sudut.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segiempat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segitiga', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Potongan pizza berbentuk segitiga]
Bentuk bangun datar potongan pizza adalah ....',
                                'explanation' => 'segitiga',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Permukaan jam dinding yang bulat berbentuk bangun ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kotak kado berbentuk kubus]
Kotak kado berbentuk bangun ruang ....',
                                'explanation' => 'kubus / balok',
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
                                'prompt' => '[Keterangan Gambar: Benda-benda di kelas: jam dinding, papan tulis, penggaris segitiga]
Sebutkan bentuk bangun datar dari jam dinding bulat dan papan tulis!',
                                'explanation' => 'Jam dinding berbentuk lingkaran, sedangkan papan tulis berbentuk segiempat.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh benda di sekitarmu yang berbentuk bangun ruang bola dan tabung!',
                                'explanation' => 'Contoh bola: bola sepak, kelereng, jeruk. Contoh tabung: kaleng susu, botol minum, gelas.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
