<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab8Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 8: Di Sekitar Rumah',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 8 Bahasa Indonesia Kelas 1 SD: Mengenal lingkungan sekitar rumah, arah (kiri, kanan, depan, belakang), denah rute sederhana, dan suku kata berawalan huruf r.',
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
                                'prompt' => '[Keterangan Gambar: Sebuah rumah asri dengan taman bunga di depan]
Bagian rumah yang ada pada gambar di atas adalah ....',
                                'explanation' => 'Bagian depan rumah terdapat halaman dan taman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'halaman depan rumah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kamar mandi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dapur memasak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tangan yang biasa kita gunakan untuk menulis dan makan adalah tangan ....',
                                'explanation' => 'Tangan kanan biasa dipakai untuk makan dan menulis dengan santun.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kanan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kiri', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kaki', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda bundar]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Roda diawali huruf r.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'r', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'p', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "rumah" adalah ....',
                                'explanation' => 'Rumah diawali ru.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ra', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ro', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ro" adalah ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'roti', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'raja', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'rusa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Garis-garis putih tempat menyeberang jalan (zebra cross)]
Tempat aman untuk menyeberang jalan pada gambar dinamakan ....',
                                'explanation' => 'Zebra cross adalah tempat aman menyeberang jalan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'zebra cross', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'trotoar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'taman kota', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Gambar sederhana yang menunjukkan letak suatu tempat disebut ....',
                                'explanation' => 'Gambar petunjuk letak tempat adalah denah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'denah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lukisan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'foto', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari nama hewan "rusa" adalah ....',
                                'explanation' => 'Rusa diawali ru.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ra', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 're', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lawan kata dari arah "depan" adalah ....',
                                'explanation' => 'Lawan kata depan adalah belakang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'belakang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kanan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kiri', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "ra" adalah ....',
                                'explanation' => 'Radio diawali ra.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'radio', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'roda', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'rumah', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Tempat sampah bersih bertuliskan sampah organik]
Benda pada gambar berguna untuk membuang ....',
                                'explanation' => 'Membuang sampah pada tempatnya.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sampah', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "roti" diawali dengan suku kata ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ro', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari arah "kanan" adalah arah ....',
                                'explanation' => 'Lawan arah kanan adalah kiri.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kiri', 'is_correct' => true],
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
                                'prompt' => 'Sebutkan 4 nama arah petunjuk letak yang kamu ketahui!',
                                'explanation' => 'Jawaban: kanan, kiri, depan, belakang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ru"!',
                                'explanation' => 'Contoh: rumah, rusa, rumput, rupiah.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 8: Di Sekitar Rumah',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 8 Bahasa Indonesia Kelas 1 SD: Mengenal lingkungan sekitar rumah, arah (kiri, kanan, depan, belakang), denah rute sederhana, dan suku kata berawalan huruf r.',
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
                                'prompt' => '[Keterangan Gambar: Sebuah rumah asri dengan taman bunga di depan]
Bagian rumah yang ada pada gambar di atas adalah ....',
                                'explanation' => 'Bagian depan rumah terdapat halaman dan taman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'halaman depan rumah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kamar mandi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dapur memasak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tangan yang biasa kita gunakan untuk menulis dan makan adalah tangan ....',
                                'explanation' => 'Tangan kanan biasa dipakai untuk makan dan menulis dengan santun.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kanan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kiri', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kaki', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda bundar]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Roda diawali huruf r.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'r', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'p', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "rumah" adalah ....',
                                'explanation' => 'Rumah diawali ru.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ra', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ro', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ro" adalah ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'roti', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'raja', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'rusa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Garis-garis putih tempat menyeberang jalan (zebra cross)]
Tempat aman untuk menyeberang jalan pada gambar dinamakan ....',
                                'explanation' => 'Zebra cross adalah tempat aman menyeberang jalan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'zebra cross', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'trotoar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'taman kota', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Gambar sederhana yang menunjukkan letak suatu tempat disebut ....',
                                'explanation' => 'Gambar petunjuk letak tempat adalah denah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'denah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lukisan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'foto', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari nama hewan "rusa" adalah ....',
                                'explanation' => 'Rusa diawali ru.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ra', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 're', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lawan kata dari arah "depan" adalah ....',
                                'explanation' => 'Lawan kata depan adalah belakang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'belakang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kanan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kiri', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "ra" adalah ....',
                                'explanation' => 'Radio diawali ra.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'radio', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'roda', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'rumah', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Tempat sampah bersih bertuliskan sampah organik]
Benda pada gambar berguna untuk membuang ....',
                                'explanation' => 'Membuang sampah pada tempatnya.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sampah', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "roti" diawali dengan suku kata ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ro', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari arah "kanan" adalah arah ....',
                                'explanation' => 'Lawan arah kanan adalah kiri.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kiri', 'is_correct' => true],
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
                                'prompt' => 'Sebutkan 4 nama arah petunjuk letak yang kamu ketahui!',
                                'explanation' => 'Jawaban: kanan, kiri, depan, belakang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ru"!',
                                'explanation' => 'Contoh: rumah, rusa, rumput, rupiah.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 8: Di Sekitar Rumah',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 8 Bahasa Indonesia Kelas 1 SD: Mengenal lingkungan sekitar rumah, arah (kiri, kanan, depan, belakang), denah rute sederhana, dan suku kata berawalan huruf r.',
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
                                'prompt' => '[Keterangan Gambar: Sebuah rumah asri dengan taman bunga di depan]
Bagian rumah yang ada pada gambar di atas adalah ....',
                                'explanation' => 'Bagian depan rumah terdapat halaman dan taman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'halaman depan rumah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kamar mandi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dapur memasak', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tangan yang biasa kita gunakan untuk menulis dan makan adalah tangan ....',
                                'explanation' => 'Tangan kanan biasa dipakai untuk makan dan menulis dengan santun.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kanan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kiri', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kaki', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda bundar]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Roda diawali huruf r.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'r', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'p', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "rumah" adalah ....',
                                'explanation' => 'Rumah diawali ru.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ra', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ro', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ro" adalah ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'roti', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'raja', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'rusa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Garis-garis putih tempat menyeberang jalan (zebra cross)]
Tempat aman untuk menyeberang jalan pada gambar dinamakan ....',
                                'explanation' => 'Zebra cross adalah tempat aman menyeberang jalan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'zebra cross', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'trotoar', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'taman kota', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Gambar sederhana yang menunjukkan letak suatu tempat disebut ....',
                                'explanation' => 'Gambar petunjuk letak tempat adalah denah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'denah', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lukisan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'foto', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari nama hewan "rusa" adalah ....',
                                'explanation' => 'Rusa diawali ru.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ra', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 're', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lawan kata dari arah "depan" adalah ....',
                                'explanation' => 'Lawan kata depan adalah belakang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'belakang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kanan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kiri', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "ra" adalah ....',
                                'explanation' => 'Radio diawali ra.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'radio', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'roda', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'rumah', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Tempat sampah bersih bertuliskan sampah organik]
Benda pada gambar berguna untuk membuang ....',
                                'explanation' => 'Membuang sampah pada tempatnya.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sampah', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "roti" diawali dengan suku kata ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ro', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari arah "kanan" adalah arah ....',
                                'explanation' => 'Lawan arah kanan adalah kiri.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kiri', 'is_correct' => true],
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
                                'prompt' => 'Sebutkan 4 nama arah petunjuk letak yang kamu ketahui!',
                                'explanation' => 'Jawaban: kanan, kiri, depan, belakang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ru"!',
                                'explanation' => 'Contoh: rumah, rusa, rumput, rupiah.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
