<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab2Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 2: Ayo Bermain!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 2 Bahasa Indonesia Kelas 1 SD: Mengenal tempat bermain yang aman, aturan bermain bersama, suku kata berawalan huruf c, dan kata tanya sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Anak-anak sedang bermain ayunan dan perosotan di taman]
Tempat yang aman untuk bermain bersama teman pada gambar adalah ....',
                                'explanation' => 'Taman bermain adalah tempat aman untuk bermain.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'taman bermain', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pinggir jalan raya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dekat jurang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bermain ayunan di sekolah, sikap yang baik terhadap teman adalah ....',
                                'explanation' => 'Saat bermain bersama, kita harus bergantian dan tertib.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berebut', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'antre bergantian', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'mendorong teman', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah cangkir teh hangat]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali suku kata cang / ca.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ci" adalah ....',
                                'explanation' => 'Cincin diawali suku kata ci.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cacing', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'cincin', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'cumi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama teman adalah ....',
                                'explanation' => 'Kata tanya "Siapa" digunakan untuk menanyakan orang atau nama.',
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
                                'prompt' => '[Keterangan Gambar: Anak-anak sedang bermain petak umpet]
Permainan tradisional pada gambar di atas adalah ....',
                                'explanation' => 'Bermain bersembunyi dan mencari adalah petak umpet.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'petak umpet', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'catur', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'layang-layang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang merupakan kalimat ajakan bermain yang santun adalah ....',
                                'explanation' => 'Kalimat ajakan santun menggunakan kata ayo atau mari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ayo bermain bola di lapangan!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Jangan dekati aku!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Kamu harus pulang!', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "cumi-cumi" adalah ....',
                                'explanation' => 'Cumi diawali suku kata cu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika kita kalah dalam permainan, sikap kita sebaiknya ....',
                                'explanation' => 'Saat kalah bermain, kita tidak boleh marah dan tetap menerima dengan senang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menangis dan marah', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'tetap tersenyum dan tidak marah', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'merusak mainan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"... rumahmu, Budi?"
Kata tanya yang tepat untuk melengkapi kalimat di atas adalah ....',
                                'explanation' => 'Menanyakan tempat menggunakan kata tanya "Di mana".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Di mana', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Siapa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Berapa', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Cermin kaca di dinding]
Benda pada gambar di atas bernama ....',
                                'explanation' => 'Benda kaca untuk berkaca adalah cermin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'cermin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "celana" diawali dengan suku kata ....',
                                'explanation' => 'Kata celana diawali suku kata ce.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ce', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata ajakan yang sering digunakan untuk mengajak teman bermain adalah ....',
                                'explanation' => 'Kata ajakan adalah ayo atau mari.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ayo', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 contoh aturan saat bermain bersama teman agar permainan berjalan tertib!',
                                'explanation' => 'Contoh jawaban: 1. Bergantian/antre, 2. Tidak boleh curang/tidak boleh mendorong teman.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ca"!',
                                'explanation' => 'Contoh jawaban: cacing, cangkir, cabai, candi.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 2: Ayo Bermain!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 2 Bahasa Indonesia Kelas 1 SD: Mengenal tempat bermain yang aman, aturan bermain bersama, suku kata berawalan huruf c, dan kata tanya sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Anak-anak sedang bermain ayunan dan perosotan di taman]
Tempat yang aman untuk bermain bersama teman pada gambar adalah ....',
                                'explanation' => 'Taman bermain adalah tempat aman untuk bermain.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'taman bermain', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pinggir jalan raya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dekat jurang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bermain ayunan di sekolah, sikap yang baik terhadap teman adalah ....',
                                'explanation' => 'Saat bermain bersama, kita harus bergantian dan tertib.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berebut', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'antre bergantian', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'mendorong teman', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah cangkir teh hangat]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali suku kata cang / ca.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ci" adalah ....',
                                'explanation' => 'Cincin diawali suku kata ci.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cacing', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'cincin', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'cumi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama teman adalah ....',
                                'explanation' => 'Kata tanya "Siapa" digunakan untuk menanyakan orang atau nama.',
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
                                'prompt' => '[Keterangan Gambar: Anak-anak sedang bermain petak umpet]
Permainan tradisional pada gambar di atas adalah ....',
                                'explanation' => 'Bermain bersembunyi dan mencari adalah petak umpet.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'petak umpet', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'catur', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'layang-layang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang merupakan kalimat ajakan bermain yang santun adalah ....',
                                'explanation' => 'Kalimat ajakan santun menggunakan kata ayo atau mari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ayo bermain bola di lapangan!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Jangan dekati aku!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Kamu harus pulang!', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "cumi-cumi" adalah ....',
                                'explanation' => 'Cumi diawali suku kata cu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika kita kalah dalam permainan, sikap kita sebaiknya ....',
                                'explanation' => 'Saat kalah bermain, kita tidak boleh marah dan tetap menerima dengan senang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menangis dan marah', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'tetap tersenyum dan tidak marah', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'merusak mainan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"... rumahmu, Budi?"
Kata tanya yang tepat untuk melengkapi kalimat di atas adalah ....',
                                'explanation' => 'Menanyakan tempat menggunakan kata tanya "Di mana".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Di mana', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Siapa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Berapa', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Cermin kaca di dinding]
Benda pada gambar di atas bernama ....',
                                'explanation' => 'Benda kaca untuk berkaca adalah cermin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'cermin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "celana" diawali dengan suku kata ....',
                                'explanation' => 'Kata celana diawali suku kata ce.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ce', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata ajakan yang sering digunakan untuk mengajak teman bermain adalah ....',
                                'explanation' => 'Kata ajakan adalah ayo atau mari.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ayo', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 contoh aturan saat bermain bersama teman agar permainan berjalan tertib!',
                                'explanation' => 'Contoh jawaban: 1. Bergantian/antre, 2. Tidak boleh curang/tidak boleh mendorong teman.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ca"!',
                                'explanation' => 'Contoh jawaban: cacing, cangkir, cabai, candi.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 2: Ayo Bermain!',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 2 Bahasa Indonesia Kelas 1 SD: Mengenal tempat bermain yang aman, aturan bermain bersama, suku kata berawalan huruf c, dan kata tanya sederhana.',
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
                                'prompt' => '[Keterangan Gambar: Anak-anak sedang bermain ayunan dan perosotan di taman]
Tempat yang aman untuk bermain bersama teman pada gambar adalah ....',
                                'explanation' => 'Taman bermain adalah tempat aman untuk bermain.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'taman bermain', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pinggir jalan raya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dekat jurang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat bermain ayunan di sekolah, sikap yang baik terhadap teman adalah ....',
                                'explanation' => 'Saat bermain bersama, kita harus bergantian dan tertib.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berebut', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'antre bergantian', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'mendorong teman', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah cangkir teh hangat]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali suku kata cang / ca.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ci" adalah ....',
                                'explanation' => 'Cincin diawali suku kata ci.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cacing', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'cincin', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'cumi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama teman adalah ....',
                                'explanation' => 'Kata tanya "Siapa" digunakan untuk menanyakan orang atau nama.',
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
                                'prompt' => '[Keterangan Gambar: Anak-anak sedang bermain petak umpet]
Permainan tradisional pada gambar di atas adalah ....',
                                'explanation' => 'Bermain bersembunyi dan mencari adalah petak umpet.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'petak umpet', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'catur', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'layang-layang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang merupakan kalimat ajakan bermain yang santun adalah ....',
                                'explanation' => 'Kalimat ajakan santun menggunakan kata ayo atau mari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ayo bermain bola di lapangan!', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Jangan dekati aku!', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Kamu harus pulang!', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "cumi-cumi" adalah ....',
                                'explanation' => 'Cumi diawali suku kata cu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika kita kalah dalam permainan, sikap kita sebaiknya ....',
                                'explanation' => 'Saat kalah bermain, kita tidak boleh marah dan tetap menerima dengan senang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menangis dan marah', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'tetap tersenyum dan tidak marah', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'merusak mainan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"... rumahmu, Budi?"
Kata tanya yang tepat untuk melengkapi kalimat di atas adalah ....',
                                'explanation' => 'Menanyakan tempat menggunakan kata tanya "Di mana".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Di mana', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Siapa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Berapa', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Cermin kaca di dinding]
Benda pada gambar di atas bernama ....',
                                'explanation' => 'Benda kaca untuk berkaca adalah cermin.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'cermin', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "celana" diawali dengan suku kata ....',
                                'explanation' => 'Kata celana diawali suku kata ce.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ce', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata ajakan yang sering digunakan untuk mengajak teman bermain adalah ....',
                                'explanation' => 'Kata ajakan adalah ayo atau mari.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ayo', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 contoh aturan saat bermain bersama teman agar permainan berjalan tertib!',
                                'explanation' => 'Contoh jawaban: 1. Bergantian/antre, 2. Tidak boleh curang/tidak boleh mendorong teman.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ca"!',
                                'explanation' => 'Contoh jawaban: cacing, cangkir, cabai, candi.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
