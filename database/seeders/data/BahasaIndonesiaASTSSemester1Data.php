<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaASTSSemester1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASTS Semester 1 (Bab 1 dan 2) #1',
                'type' => 'pts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester 1 Paket #1 Bahasa Indonesia Kelas 1 SD: Menguji capaian Bab 1 (Bunyi) dan Bab 2 (Bermain), suku kata b dan c, serta kosakata dasar.',
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
                                'prompt' => '[Keterangan Gambar: Anak memetik senar gitar]
Bunyi alat musik pada gambar dihasilkan dengan cara ....',
                                'explanation' => 'Gitar dibunyikan dengan cara dipetik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'dipetik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ditiup', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dipukul', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tiruan suara ayam jantan saat matahari terbit adalah ....',
                                'explanation' => 'Ayam jago berkokok kukuruyuk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kukuruyuk', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kwek-kwek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'petok-petok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "bola" adalah ....',
                                'explanation' => 'Bola diawali suku kata bo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bo', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'bu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang paling aman untuk bermain kejar-kejaran adalah ....',
                                'explanation' => 'Halaman sekolah atau lapangan adalah tempat yang aman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pinggir rel kereta', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'lapangan rumput yang luas', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'jalan raya yang ramai', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah cangkir keramik di atas piring kecil]
Nama benda pada gambar diawali dengan huruf ....',
                                'explanation' => 'Cangkir diawali huruf c.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'c', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata "ca" jika digabung dengan "ri" menjadi kata ....',
                                'explanation' => 'ca + ri = cari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ciri', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cuci', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya untuk menanyakan tempat bermain adalah ....',
                                'explanation' => 'Kata tanya untuk tempat adalah "Di mana".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Siapa', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'Di mana', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'Apa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh bunyi alam yang terjadi saat langit gelap adalah ....',
                                'explanation' => 'Suara gemuruh petir adalah bunyi alam.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'suara petir menggelegar', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'suara klakson bus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'suara bel pintu listrik', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat teman kita terjatuh waktu berlari, sikap kita adalah ....',
                                'explanation' => 'Membantu teman yang terjatuh adalah sikap terpuji.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menertawakannya', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'menolongnya berdiri', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'meninggalkannya lari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan huruf b kecil adalah ....',
                                'explanation' => 'Kata baju diawali huruf b.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baju', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'daun', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pagi', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban singkat dan benar!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kambing makan rumput di kandang]
Suara tiruan hewan pada gambar adalah ....',
                                'explanation' => 'Suara kambing adalah mbee.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mbee', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "cacing" diawali dengan suku kata ....',
                                'explanation' => 'Kata cacing diawali suku kata ca.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ca', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bunyi bel sepeda anak berbunyi ....',
                                'explanation' => 'Bel sepeda berbunyi kring-kring.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kring-kring', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama seseorang adalah ....',
                                'explanation' => 'Menanyakan nama menggunakan kata tanya Siapa.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'siapa', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Saat bermain bersama, kita tidak boleh curang dan harus ....',
                                'explanation' => 'Saat bermain harus jujur atau tertib.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jujur', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "bu"!',
                                'explanation' => 'Contoh: buku, bumi, bulan, burung.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ci"!',
                                'explanation' => 'Contoh: cicak, cincin, cium, cita.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh bunyi buatan yang ada di sekolah!',
                                'explanation' => 'Contoh: bel sekolah, tepuk tangan, tiupan peluit guru olahraga.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Mengapa kita tidak boleh bermain di jalan raya?',
                                'explanation' => 'Karena banyak kendaraan lalu lalang dan sangat berbahaya.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Buatlah satu kalimat ajakan bermain bersama teman dengan kata "Ayo"!',
                                'explanation' => 'Contoh: Ayo kita bermain bola di lapangan! atau Ayo bermain ayunan bersama!',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 1 (Bab 1 dan 2) #2',
                'type' => 'pts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester 1 Paket #2 Bahasa Indonesia Kelas 1 SD: Menguji capaian Bab 1 (Bunyi) dan Bab 2 (Bermain), suku kata b dan c, serta kosakata dasar.',
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
                                'prompt' => '[Keterangan Gambar: Anak memetik senar gitar]
Bunyi alat musik pada gambar dihasilkan dengan cara ....',
                                'explanation' => 'Gitar dibunyikan dengan cara dipetik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'dipetik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ditiup', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dipukul', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tiruan suara ayam jantan saat matahari terbit adalah ....',
                                'explanation' => 'Ayam jago berkokok kukuruyuk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kukuruyuk', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kwek-kwek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'petok-petok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "bola" adalah ....',
                                'explanation' => 'Bola diawali suku kata bo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bo', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'bu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang paling aman untuk bermain kejar-kejaran adalah ....',
                                'explanation' => 'Halaman sekolah atau lapangan adalah tempat yang aman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pinggir rel kereta', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'lapangan rumput yang luas', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'jalan raya yang ramai', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah cangkir keramik di atas piring kecil]
Nama benda pada gambar diawali dengan huruf ....',
                                'explanation' => 'Cangkir diawali huruf c.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'c', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata "ca" jika digabung dengan "ri" menjadi kata ....',
                                'explanation' => 'ca + ri = cari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ciri', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cuci', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya untuk menanyakan tempat bermain adalah ....',
                                'explanation' => 'Kata tanya untuk tempat adalah "Di mana".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Siapa', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'Di mana', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'Apa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh bunyi alam yang terjadi saat langit gelap adalah ....',
                                'explanation' => 'Suara gemuruh petir adalah bunyi alam.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'suara petir menggelegar', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'suara klakson bus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'suara bel pintu listrik', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat teman kita terjatuh waktu berlari, sikap kita adalah ....',
                                'explanation' => 'Membantu teman yang terjatuh adalah sikap terpuji.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menertawakannya', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'menolongnya berdiri', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'meninggalkannya lari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan huruf b kecil adalah ....',
                                'explanation' => 'Kata baju diawali huruf b.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baju', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'daun', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pagi', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban singkat dan benar!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kambing makan rumput di kandang]
Suara tiruan hewan pada gambar adalah ....',
                                'explanation' => 'Suara kambing adalah mbee.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mbee', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "cacing" diawali dengan suku kata ....',
                                'explanation' => 'Kata cacing diawali suku kata ca.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ca', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bunyi bel sepeda anak berbunyi ....',
                                'explanation' => 'Bel sepeda berbunyi kring-kring.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kring-kring', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama seseorang adalah ....',
                                'explanation' => 'Menanyakan nama menggunakan kata tanya Siapa.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'siapa', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Saat bermain bersama, kita tidak boleh curang dan harus ....',
                                'explanation' => 'Saat bermain harus jujur atau tertib.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jujur', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "bu"!',
                                'explanation' => 'Contoh: buku, bumi, bulan, burung.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ci"!',
                                'explanation' => 'Contoh: cicak, cincin, cium, cita.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh bunyi buatan yang ada di sekolah!',
                                'explanation' => 'Contoh: bel sekolah, tepuk tangan, tiupan peluit guru olahraga.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Mengapa kita tidak boleh bermain di jalan raya?',
                                'explanation' => 'Karena banyak kendaraan lalu lalang dan sangat berbahaya.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Buatlah satu kalimat ajakan bermain bersama teman dengan kata "Ayo"!',
                                'explanation' => 'Contoh: Ayo kita bermain bola di lapangan! atau Ayo bermain ayunan bersama!',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 1 (Bab 1 dan 2) #3',
                'type' => 'pts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester 1 Paket #3 Bahasa Indonesia Kelas 1 SD: Menguji capaian Bab 1 (Bunyi) dan Bab 2 (Bermain), suku kata b dan c, serta kosakata dasar.',
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
                                'prompt' => '[Keterangan Gambar: Anak memetik senar gitar]
Bunyi alat musik pada gambar dihasilkan dengan cara ....',
                                'explanation' => 'Gitar dibunyikan dengan cara dipetik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'dipetik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ditiup', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dipukul', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tiruan suara ayam jantan saat matahari terbit adalah ....',
                                'explanation' => 'Ayam jago berkokok kukuruyuk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kukuruyuk', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kwek-kwek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'petok-petok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "bola" adalah ....',
                                'explanation' => 'Bola diawali suku kata bo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bo', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'bu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tempat yang paling aman untuk bermain kejar-kejaran adalah ....',
                                'explanation' => 'Halaman sekolah atau lapangan adalah tempat yang aman.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pinggir rel kereta', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'lapangan rumput yang luas', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'jalan raya yang ramai', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah cangkir keramik di atas piring kecil]
Nama benda pada gambar diawali dengan huruf ....',
                                'explanation' => 'Cangkir diawali huruf c.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'c', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata "ca" jika digabung dengan "ri" menjadi kata ....',
                                'explanation' => 'ca + ri = cari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cari', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ciri', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cuci', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya untuk menanyakan tempat bermain adalah ....',
                                'explanation' => 'Kata tanya untuk tempat adalah "Di mana".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Siapa', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'Di mana', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'Apa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh bunyi alam yang terjadi saat langit gelap adalah ....',
                                'explanation' => 'Suara gemuruh petir adalah bunyi alam.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'suara petir menggelegar', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'suara klakson bus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'suara bel pintu listrik', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Saat teman kita terjatuh waktu berlari, sikap kita adalah ....',
                                'explanation' => 'Membantu teman yang terjatuh adalah sikap terpuji.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menertawakannya', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'menolongnya berdiri', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'meninggalkannya lari', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan huruf b kecil adalah ....',
                                'explanation' => 'Kata baju diawali huruf b.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baju', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'daun', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pagi', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan jawaban singkat dan benar!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Kambing makan rumput di kandang]
Suara tiruan hewan pada gambar adalah ....',
                                'explanation' => 'Suara kambing adalah mbee.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mbee', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "cacing" diawali dengan suku kata ....',
                                'explanation' => 'Kata cacing diawali suku kata ca.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'ca', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bunyi bel sepeda anak berbunyi ....',
                                'explanation' => 'Bel sepeda berbunyi kring-kring.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'kring-kring', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata tanya yang digunakan untuk menanyakan nama seseorang adalah ....',
                                'explanation' => 'Menanyakan nama menggunakan kata tanya Siapa.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'siapa', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Saat bermain bersama, kita tidak boleh curang dan harus ....',
                                'explanation' => 'Saat bermain harus jujur atau tertib.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'jujur', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "bu"!',
                                'explanation' => 'Contoh: buku, bumi, bulan, burung.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang berawalan suku kata "ci"!',
                                'explanation' => 'Contoh: cicak, cincin, cium, cita.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh bunyi buatan yang ada di sekolah!',
                                'explanation' => 'Contoh: bel sekolah, tepuk tangan, tiupan peluit guru olahraga.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Mengapa kita tidak boleh bermain di jalan raya?',
                                'explanation' => 'Karena banyak kendaraan lalu lalang dan sangat berbahaya.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Buatlah satu kalimat ajakan bermain bersama teman dengan kata "Ayo"!',
                                'explanation' => 'Contoh: Ayo kita bermain bola di lapangan! atau Ayo bermain ayunan bersama!',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
