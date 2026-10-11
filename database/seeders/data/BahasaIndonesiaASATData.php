<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaASATData
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASAT (Bab 1 sampai 8) #1',
                'type' => 'pas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Tahun / Akhir Tahun Paket #1 Bahasa Indonesia Kelas 1 SD: Evaluasi komprehensif seluruh materi Bab 1 sampai 8 (Bunyi, Bermain, Kuman, Mandiri, Teman, Perbedaan, Kebutuhan, dan Lingkungan Rumah).',
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
Suara tiruan bebek pada gambar terdengar ....',
                                'explanation' => 'Bebek berbunyi kwek-kwek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kwek-kwek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'meong-meong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'guk-guk', 'is_correct' => false],
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
                                    ['label' => 'B', 'option_text' => 'pinggir jalan raya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dekat rel kereta', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Cangkir minuman teh]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali ca.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita mencuci tangan memakai sabun agar terhindar dari ....',
                                'explanation' => 'Mencuci tangan membunuh kuman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuman penyakit', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'air bersih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'busa wangi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kuda berlari di padang rumput]
Nama hewan pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Kuda diawali ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ko', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Melompat tali dilakukan menggunakan anggota tubuh ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'leher', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kepala', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali suku kata "la" adalah ....',
                                'explanation' => 'Lampu diawali la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lampu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lilin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lorong', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat meminta bantuan teman, kita mengucapkan kata ajaib ....',
                                'explanation' => 'Meminta tolong dengan kata tolong.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tolong', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'maaf', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permisi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Meja belajar yang rapi]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Meja diawali me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap yang baik terhadap teman yang berbeda bentuk rambut adalah ....',
                                'explanation' => 'Menghormati dan tidak mengejek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling menghargai', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mengejeknya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'menjauhinya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Gajah berbelalai panjang]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Gajah diawali g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'm', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'r', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Benda yang merupakan kebutuhan pokok setiap hari adalah ....',
                                'explanation' => 'Nasi dan lauk adalah kebutuhan pokok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'makanan bergizi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mainan robot baru', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permen cokelat manis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Payung terbuka warna biru]
Nama benda pada gambar diawali dengan huruf ....',
                                'explanation' => 'Payung diawali p.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'p', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang aman untuk menyeberang jalan raya adalah ....',
                                'explanation' => 'Zebra cross adalah tempat aman menyeberang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'zebra cross', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tengah tikungan tajam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lampu merah menyala hijau', 'is_correct' => false],
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
                                'prompt' => 'Tiruan bunyi ayam jago berkokok adalah ....',
                                'explanation' => 'Ayam jago bersuara kukuruyuk.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kukuruyuk', 'is_correct' => true],
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
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama adalah ....',
                                'explanation' => 'Siapa menanyakan nama.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'siapa', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Mencuci tangan harus menggunakan air bersih dan ....',
                                'explanation' => 'Sabun pembersih kuman.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat larangan biasanya memuat kata ....',
                                'explanation' => 'Memuat kata jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Setelah ditolong oleh teman kita mengucapkan ....',
                                'explanation' => 'Terima kasih.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'terima kasih', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut lurus adalah rambut ....',
                                'explanation' => 'Rambut keriting.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Menyimpan sisa uang saku di celengan disebut ....',
                                'explanation' => 'Menabung.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'menabung', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "roti" diawali dengan suku kata ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ro', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari arah "kanan" adalah arah ....',
                                'explanation' => 'Arah kiri.',
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
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ba"!',
                                'explanation' => 'Contoh: batu, baju, balon, bayi.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh kata ajaib yang harus diucapkan dengan santun!',
                                'explanation' => 'Contoh: tolong, maaf, terima kasih, permisi.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Mengapa kita harus mencuci tangan sebelum makan?',
                                'explanation' => 'Agar kuman dan kotoran pada tangan mati dan tidak masuk ke dalam tubuh sehingga terhindar dari penyakit sakit perut.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Berikan satu contoh "kebutuhan" dan satu contoh "keinginan"!',
                                'explanation' => 'Contoh kebutuhan: nasi / air minum / baju. Contoh keinginan: mainan baru / boneka.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 4 nama arah mata angin / letak arah yang kamu ketahui!',
                                'explanation' => 'Jawaban: kanan, kiri, depan, belakang.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAT (Bab 1 sampai 8) #2',
                'type' => 'pas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Tahun / Akhir Tahun Paket #2 Bahasa Indonesia Kelas 1 SD: Evaluasi komprehensif seluruh materi Bab 1 sampai 8 (Bunyi, Bermain, Kuman, Mandiri, Teman, Perbedaan, Kebutuhan, dan Lingkungan Rumah).',
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
Suara tiruan bebek pada gambar terdengar ....',
                                'explanation' => 'Bebek berbunyi kwek-kwek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kwek-kwek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'meong-meong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'guk-guk', 'is_correct' => false],
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
                                    ['label' => 'B', 'option_text' => 'pinggir jalan raya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dekat rel kereta', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Cangkir minuman teh]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali ca.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita mencuci tangan memakai sabun agar terhindar dari ....',
                                'explanation' => 'Mencuci tangan membunuh kuman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuman penyakit', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'air bersih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'busa wangi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kuda berlari di padang rumput]
Nama hewan pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Kuda diawali ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ko', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Melompat tali dilakukan menggunakan anggota tubuh ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'leher', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kepala', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali suku kata "la" adalah ....',
                                'explanation' => 'Lampu diawali la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lampu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lilin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lorong', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat meminta bantuan teman, kita mengucapkan kata ajaib ....',
                                'explanation' => 'Meminta tolong dengan kata tolong.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tolong', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'maaf', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permisi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Meja belajar yang rapi]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Meja diawali me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap yang baik terhadap teman yang berbeda bentuk rambut adalah ....',
                                'explanation' => 'Menghormati dan tidak mengejek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling menghargai', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mengejeknya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'menjauhinya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Gajah berbelalai panjang]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Gajah diawali g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'm', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'r', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Benda yang merupakan kebutuhan pokok setiap hari adalah ....',
                                'explanation' => 'Nasi dan lauk adalah kebutuhan pokok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'makanan bergizi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mainan robot baru', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permen cokelat manis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Payung terbuka warna biru]
Nama benda pada gambar diawali dengan huruf ....',
                                'explanation' => 'Payung diawali p.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'p', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang aman untuk menyeberang jalan raya adalah ....',
                                'explanation' => 'Zebra cross adalah tempat aman menyeberang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'zebra cross', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tengah tikungan tajam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lampu merah menyala hijau', 'is_correct' => false],
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
                                'prompt' => 'Tiruan bunyi ayam jago berkokok adalah ....',
                                'explanation' => 'Ayam jago bersuara kukuruyuk.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kukuruyuk', 'is_correct' => true],
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
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama adalah ....',
                                'explanation' => 'Siapa menanyakan nama.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'siapa', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Mencuci tangan harus menggunakan air bersih dan ....',
                                'explanation' => 'Sabun pembersih kuman.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat larangan biasanya memuat kata ....',
                                'explanation' => 'Memuat kata jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Setelah ditolong oleh teman kita mengucapkan ....',
                                'explanation' => 'Terima kasih.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'terima kasih', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut lurus adalah rambut ....',
                                'explanation' => 'Rambut keriting.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Menyimpan sisa uang saku di celengan disebut ....',
                                'explanation' => 'Menabung.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'menabung', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "roti" diawali dengan suku kata ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ro', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari arah "kanan" adalah arah ....',
                                'explanation' => 'Arah kiri.',
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
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ba"!',
                                'explanation' => 'Contoh: batu, baju, balon, bayi.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh kata ajaib yang harus diucapkan dengan santun!',
                                'explanation' => 'Contoh: tolong, maaf, terima kasih, permisi.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Mengapa kita harus mencuci tangan sebelum makan?',
                                'explanation' => 'Agar kuman dan kotoran pada tangan mati dan tidak masuk ke dalam tubuh sehingga terhindar dari penyakit sakit perut.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Berikan satu contoh "kebutuhan" dan satu contoh "keinginan"!',
                                'explanation' => 'Contoh kebutuhan: nasi / air minum / baju. Contoh keinginan: mainan baru / boneka.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 4 nama arah mata angin / letak arah yang kamu ketahui!',
                                'explanation' => 'Jawaban: kanan, kiri, depan, belakang.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAT (Bab 1 sampai 8) #3',
                'type' => 'pas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Tahun / Akhir Tahun Paket #3 Bahasa Indonesia Kelas 1 SD: Evaluasi komprehensif seluruh materi Bab 1 sampai 8 (Bunyi, Bermain, Kuman, Mandiri, Teman, Perbedaan, Kebutuhan, dan Lingkungan Rumah).',
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
Suara tiruan bebek pada gambar terdengar ....',
                                'explanation' => 'Bebek berbunyi kwek-kwek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kwek-kwek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'meong-meong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'guk-guk', 'is_correct' => false],
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
                                    ['label' => 'B', 'option_text' => 'pinggir jalan raya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dekat rel kereta', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Cangkir minuman teh]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Cangkir diawali ca.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ca', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kita mencuci tangan memakai sabun agar terhindar dari ....',
                                'explanation' => 'Mencuci tangan membunuh kuman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kuman penyakit', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'air bersih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'busa wangi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kuda berlari di padang rumput]
Nama hewan pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Kuda diawali ku.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ku', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ka', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ko', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Melompat tali dilakukan menggunakan anggota tubuh ....',
                                'explanation' => 'Melompat menggunakan kaki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kaki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'leher', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kepala', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali suku kata "la" adalah ....',
                                'explanation' => 'Lampu diawali la.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lampu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lilin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lorong', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat meminta bantuan teman, kita mengucapkan kata ajaib ....',
                                'explanation' => 'Meminta tolong dengan kata tolong.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tolong', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'maaf', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permisi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Meja belajar yang rapi]
Suku kata awal dari nama benda pada gambar adalah ....',
                                'explanation' => 'Meja diawali me.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'me', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ma', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap yang baik terhadap teman yang berbeda bentuk rambut adalah ....',
                                'explanation' => 'Menghormati dan tidak mengejek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'saling menghargai', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mengejeknya', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'menjauhinya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Gajah berbelalai panjang]
Huruf pertama dari nama hewan pada gambar adalah ....',
                                'explanation' => 'Gajah diawali g.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'g', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'm', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'r', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Benda yang merupakan kebutuhan pokok setiap hari adalah ....',
                                'explanation' => 'Nasi dan lauk adalah kebutuhan pokok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'makanan bergizi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mainan robot baru', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'permen cokelat manis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Payung terbuka warna biru]
Nama benda pada gambar diawali dengan huruf ....',
                                'explanation' => 'Payung diawali p.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'p', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang aman untuk menyeberang jalan raya adalah ....',
                                'explanation' => 'Zebra cross adalah tempat aman menyeberang.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'zebra cross', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tengah tikungan tajam', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'lampu merah menyala hijau', 'is_correct' => false],
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
                                'prompt' => 'Tiruan bunyi ayam jago berkokok adalah ....',
                                'explanation' => 'Ayam jago bersuara kukuruyuk.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kukuruyuk', 'is_correct' => true],
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
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama adalah ....',
                                'explanation' => 'Siapa menanyakan nama.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'siapa', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Mencuci tangan harus menggunakan air bersih dan ....',
                                'explanation' => 'Sabun pembersih kuman.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'sabun', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat larangan biasanya memuat kata ....',
                                'explanation' => 'Memuat kata jangan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jangan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Setelah ditolong oleh teman kita mengucapkan ....',
                                'explanation' => 'Terima kasih.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'terima kasih', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari rambut lurus adalah rambut ....',
                                'explanation' => 'Rambut keriting.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'keriting', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Menyimpan sisa uang saku di celengan disebut ....',
                                'explanation' => 'Menabung.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'menabung', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "roti" diawali dengan suku kata ....',
                                'explanation' => 'Roti diawali ro.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ro', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari arah "kanan" adalah arah ....',
                                'explanation' => 'Arah kiri.',
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
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ba"!',
                                'explanation' => 'Contoh: batu, baju, balon, bayi.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh kata ajaib yang harus diucapkan dengan santun!',
                                'explanation' => 'Contoh: tolong, maaf, terima kasih, permisi.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Mengapa kita harus mencuci tangan sebelum makan?',
                                'explanation' => 'Agar kuman dan kotoran pada tangan mati dan tidak masuk ke dalam tubuh sehingga terhindar dari penyakit sakit perut.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Berikan satu contoh "kebutuhan" dan satu contoh "keinginan"!',
                                'explanation' => 'Contoh kebutuhan: nasi / air minum / baju. Contoh keinginan: mainan baru / boneka.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 4 nama arah mata angin / letak arah yang kamu ketahui!',
                                'explanation' => 'Jawaban: kanan, kiri, depan, belakang.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
