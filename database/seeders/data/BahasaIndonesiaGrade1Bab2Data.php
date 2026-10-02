<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade1Bab2Data
{
    public static function getAssessments(): array
    {
        return [
            self::getQuiz01(),
            self::getQuiz02(),
            self::getQuiz03(),
        ];
    }

    public static function getQuiz01(): array
    {
        return [
            'title' => 'QUIZ 01 Bab 02 Ayo Bermain!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 1 Bab 2: Mengenal aneka permainan anak tradisional dan modern, tempat bermain yang aman, serta suku kata ca, ci, cu, ce, co.',
            'sections' => [
                [
                    'title' => 'Bagian I: Pilihan Ganda',
                    'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C).',
                    'order' => 1,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Tempat yang paling aman dan luas untuk bermain kejar-kejaran bersama teman adalah ....',
                            'explanation' => 'Taman atau lapangan rumput adalah tempat bermain yang aman. Bermain di jalan raya berbahaya karena banyak kendaraan melintas.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Taman bermain atau lapangan', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Jalan raya yang ramai', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Di dekat sumur terbuka', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Huruf pertama dari kata "cacing" adalah ....',
                            'explanation' => 'Kata "cacing" diawali dengan huruf c.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'c', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 's', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'k', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Saat giliran teman bermain ayunan, sikap kita yang baik adalah ....',
                            'explanation' => 'Kita harus sabar menunggu giliran dan mengantre dengan tertib.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Merebutnya dengan paksa', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Sabar menunggu giliran', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Menangis dengan keras', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Permainan tradisional yang menggunakan seutas tali dari jalinan karet gelang disebut lompat ....',
                            'explanation' => 'Permainan lompat tali menggunakan jalinan karet gelang yang direntangkan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kelereng', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Tali', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Tangga', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suku kata awal dari kata "cincin" adalah ....',
                            'explanation' => 'Kata cincin diawali oleh suku kata "cin" yang berakar dari vokal "ci".',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'ca', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'ci', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'cu', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian II: Pilihan Ganda Kompleks',
                    'instructions' => 'Pilihlah semua jawaban yang benar (jawaban benar lebih dari satu).',
                    'order' => 2,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah dua permainan tradisional yang dimainkan bersama banyak teman!',
                            'explanation' => 'Ular naga dan petak umpet dimainkan secara berkelompok, sedangkan bermain gawai/game HP biasanya sendiri.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Ular naga panjangnya', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Petak umpet', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Bermain game di ponsel sendirian', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali dengan suku kata "ca"? (Pilih dua)',
                            'explanation' => 'Cabai dan cacing berawalan ca, sedangkan cumi diawali cu.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Cabai', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Cacing', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Cumi-cumi', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Aturan keselamatan saat bermain sepeda adalah .... (Pilih dua)',
                            'explanation' => 'Memakai helm pengaman dan bersepeda di tempat aman melindungi kita dari cedera.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Memakai helm pelindung kepala', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Memperhatikan jalan di depan', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Melepaskan setang sepeda di jalan menurun', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah sikap sportif saat bermain bersama teman!',
                            'explanation' => 'Menerima kekalahan dengan senyum dan memberi selamat kepada pemenang adalah wujud sikap sportif.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Menerima kekalahan dengan lapang dada', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Memberi ucapan selamat kepada teman yang menang', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Marah dan memukul teman yang menang', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata-kata berikut yang memuat huruf "c"? (Pilih dua)',
                            'explanation' => 'Cangkir dan Capung memuat huruf c, sedangkan Balon memuat huruf b.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Cangkir', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Capung', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Balon', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkan nama permainan dengan alat atau cara bermainnya.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan nama permainan dengan alat yang digunakan!',
                            'explanation' => 'Lompat tali memakai karet, kelereng memakai bola kaca kecil, sepak bola memakai bola besar, layang-layang memakai benang dan kertas.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Lompat tali', 'match_key' => 'Jalinan karet gelang', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bermain kelereng', 'match_key' => 'Kelereng kaca bulat', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Bermain layang-layang', 'match_key' => 'Kerangka bambu dan benang', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Bermain egrang', 'match_key' => 'Batang bambu panjang bertumpuan', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Bermain congklak', 'match_key' => 'Papan berlubang dan biji kerang', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata dengan kata yang berawalan huruf c!',
                            'explanation' => 'ca -> cacing, ci -> cincin, cu -> cumi-cumi, ce -> celana, co -> cokelat.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ca', 'match_key' => 'Cacing', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Ci', 'match_key' => 'Cincin', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Cu', 'match_key' => 'Cumi-cumi', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Ce', 'match_key' => 'Celana', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Co', 'match_key' => 'Cokelat', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan aktivitas bermain dengan tempat bermain yang tepat!',
                            'explanation' => 'Berenang di kolam renang, bermain bola di lapangan, membaca di perpustakaan, bermain ayunan di taman.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Berenang dan menyelam', 'match_key' => 'Kolam renang ramah anak', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bermain sepak bola', 'match_key' => 'Lapangan rumput', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Bermain perosotan', 'match_key' => 'Taman bermain anak', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Membaca buku cerita', 'match_key' => 'Pojok baca / perpustakaan', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Menerbangkan layang-layang', 'match_key' => 'Tanah lapang luas berangin', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata instruksi bermain dengan artinya!',
                            'explanation' => 'Lari berarti bergerak cepat dengan kaki, Lompat berarti menolak tubuh ke atas, Tangkap berarti menyambut bola.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Lari!', 'match_key' => 'Melangkahkan kaki dengan sangat cepat', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Lompat!', 'match_key' => 'Menolakkan tubuh ke atas dengan kedua kaki', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Tangkap!', 'match_key' => 'Menyambut benda dengan kedua tangan', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Sembunyi!', 'match_key' => 'Mencari tempat aman agar tidak terlihat penjaga', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Berhenti!', 'match_key' => 'Membekukan gerakan tubuh dan tidak bergerak', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kalimat ajakan dengan situasi permainan yang sesuai!',
                            'explanation' => 'Mari bermain bersama, ayo berbaris, hati-hati saat berlari.',
                            'options' => [
                                ['label' => '1', 'option_text' => '"Ayo, kita main petak umpet!"', 'match_key' => 'Mengajak bermain sembunyi-sembunyian', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => '"Hati-hati, lantainya licin!"', 'match_key' => 'Mengingatkan bahaya jatuh', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => '"Giliranmu sekarang, silakan!"', 'match_key' => 'Memberikan giliran bermain', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => '"Hebat sekali tendanganmu!"', 'match_key' => 'Memuji keberhasilan teman', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => '"Mari kita rapikan mainan ini!"', 'match_key' => 'Membersihkan setelah bermain', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    public static function getQuiz02(): array
    {
        return [
            'title' => 'QUIZ 02 Bab 02 Ayo Bermain!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 2 Bab 2: Memahami tanda bahaya, aturan bermain tertib, serta suku kata berawalan h (ha, hi, hu, he, ho).',
            'sections' => [
                [
                    'title' => 'Bagian I: Pilihan Ganda',
                    'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C).',
                    'order' => 1,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Huruf pertama dari kata "hujan" adalah ....',
                            'explanation' => 'Kata "hujan" diawali oleh huruf h.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'h', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'n', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'm', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Hewan berkaki empat yang memiliki leher sangat panjang adalah ....',
                            'explanation' => 'Jerapah berleher panjang, tetapi harimau dan kelinci tidak.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Harimau', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Jerapah', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kelinci', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Ketika teman kita terjatuh dan lututnya terluka, hal yang harus kita lakukan adalah ....',
                            'explanation' => 'Menolong teman yang cedera adalah perbuatan mulia dan berempati.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Menertawakannya beramai-ramai', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Segera menolong dan mengobatinya', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Meninggalkannya sendirian', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Tanda seru (!) dalam kalimat "Awas, jangan berlari di tempat licin!" menunjukkan bahwa kalimat itu adalah ....',
                            'explanation' => 'Tanda seru digunakan untuk kalimat peringatan, perintah, atau seruan tegas.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Peringatan atau larangan tegas', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Pertanyaan yang meminta jawaban', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Cerita dongeng tidur', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suku kata awal dari kata "harimau" adalah ....',
                            'explanation' => 'Kata harimau diawali dengan ha-ri-mau, yaitu suku kata ha.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'ha', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'hi', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'hu', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian II: Pilihan Ganda Kompleks',
                    'instructions' => 'Pilihlah semua jawaban yang benar (jawaban benar lebih dari satu).',
                    'order' => 2,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah dua kata yang diawali dengan suku kata "hi"!',
                            'explanation' => 'Hidung dan hijau berawalan hi, sedangkan hutan berawalan hu.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Hidung', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Hijau', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Hutan', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Hal apa saja yang tidak boleh dilakukan saat bermain bersama teman? (Pilih dua)',
                            'explanation' => 'Mendorong teman dan berbuat curang dapat menyebabkan cedera dan pertengkaran.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Mendorong teman dari belakang', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Berbuat curang agar selalu menang', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Mematuhi peraturan permainan', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah benda yang memiliki permukaan licin dan berbahaya jika diinjak? (Pilih dua)',
                            'explanation' => 'Lantai basah berbusa dan kulit pisang sangat licin, rumput kering tidak licin.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lantai basah berbusa sabun', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kulit pisang yang tergeletak di jalan', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Hamparan rumput lapangan yang kering', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah kata yang diawali dengan huruf "H" besar!',
                            'explanation' => 'Hasan dan Halim adalah nama orang yang ditulis dengan huruf awal kapital H.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Hasan', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Halim', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'kucing', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah aturan penting saat bermain petak umpet? (Pilih dua)',
                            'explanation' => 'Penjaga memejamkan mata sambil menghitung dan pemain lain bersembunyi dengan aman.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Penjaga menutup mata saat menghitung sampai sepuluh', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Teman-teman mencari tempat sembunyi yang aman', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Bersembunyi di dalam lemari pakaian yang terkunci', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah suku kata awal h dengan kata bendanya.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata awal berhuruf h dengan kata yang tepat!',
                            'explanation' => 'ha -> harimau, hi -> hiu, hu -> hujan, he -> helm, ho -> hotel.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ha', 'match_key' => 'Harimau', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Hi', 'match_key' => 'Hiu (ikan hiu)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Hu', 'match_key' => 'Hujan', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'He', 'match_key' => 'Helm pelindung', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Ho', 'match_key' => 'Hotel', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata sifat perasaan saat bermain dengan situasinya!',
                            'explanation' => 'Gembira saat bermain, sedih saat terluka, takut saat gelap, bangga saat menang, tenang saat beristirahat.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Gembira', 'match_key' => 'Bisa tertawa riang bersama teman', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kecewa', 'match_key' => 'Hujan turun saat baru mulai bermain', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Takut', 'match_key' => 'Melihat petir menyambar kencang', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Lelah', 'match_key' => 'Berlari keliling lapangan tiga kali', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Bangga', 'match_key' => 'Bisa menyelesaikan permainan dengan jujur', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan rambu atau tanda dengan maknanya saat bermain di taman!',
                            'explanation' => 'Rambu dilarang menginjak rumput, tempat sampah, hati-hati licin.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Gambar orang terpeleset bertuliskan "Hati-hati"', 'match_key' => 'Lantai licin dan basah', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Gambar tong sampah', 'match_key' => 'Tempat membuang bungkus makanan', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Gambar rumput disilang merah', 'match_key' => 'Dilarang menginjak tanaman hias', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Gambar sepeda di jalur hijau', 'match_key' => 'Jalur khusus untuk pesepeda', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Gambar kran air dan sabun', 'match_key' => 'Tempat mencuci tangan', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan permainan dengan jumlah pemain yang dibutuhkan!',
                            'explanation' => 'Ular naga butuh banyak orang, catur butuh dua orang, lompat tali butuh minimal tiga orang.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ular Naga', 'match_key' => 'Kelompok banyak orang (lebih dari 5 anak)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bermain Catur', 'match_key' => 'Tepat dua orang saling berhadapan', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Lompat Tali Karet', 'match_key' => 'Minimal tiga anak (dua pemegang, satu pelompat)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Sepak Bola Mini', 'match_key' => 'Dua tim beregu di lapangan', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Menyusun Balok Puzzle', 'match_key' => 'Bisa dimainkan mandiri seorang diri', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan potongan kata menjadi nama hewan berawalan h!',
                            'explanation' => 'ha-ri-mau, hi-u, he-lang, ha-mus-ter, he-wan.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ha - ri - ...', 'match_key' => 'mau (Harimau)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Hi - ...', 'match_key' => 'u (Hiu)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'He - ...', 'match_key' => 'lang (Elang/Helang)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Hu - ...', 'match_key' => 'tan (Hutan)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Ha - ...', 'match_key' => 'duk (Handuk)', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    public static function getQuiz03(): array
    {
        return [
            'title' => 'QUIZ 03 Bab 02 Ayo Bermain!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 3 Bab 2: Pemantapan membaca gabungan suku kata huruf c dan h, melatih kepedulian terhadap teman saat bermain.',
            'sections' => [
                [
                    'title' => 'Bagian I: Pilihan Ganda',
                    'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C).',
                    'order' => 1,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Kata "cangkir" jika diuraikan menurut suku katanya menjadi ....',
                            'explanation' => 'Cangkir terdiri dari dua suku kata: cang-kir.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'cang - kir', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'ca - ng - kir', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'cangki - r', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Sebelum bermain di luar rumah bersama teman, kita sebaiknya ....',
                            'explanation' => 'Meminta izin kepada orang tua adalah kewajiban anak agar ayah dan ibu tidak cemas.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Pergi diam-diam tanpa pamit', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Berpamitan dan meminta izin orang tua', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Mengunci pintu kamar dari luar', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Benda pelindung kepala yang wajib dipakai saat belajar mengendarai sepeda adalah ....',
                            'explanation' => 'Helm melindungi tempurung kepala saat terjadi benturan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Helm', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Topi rajut', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Peci', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Hewan melata bertubuh lunak dan hidup di tanah gembur adalah ....',
                            'explanation' => 'Cacing hidup di dalam tanah dan tidak berkaki.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Cicak', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Cacing', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Capung', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Setelah selesai bermain, mainan yang berserakan di ruang tengah harus ....',
                            'explanation' => 'Merapikan kembali mainan ke tempatnya melatih rasa tanggung jawab anak.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Dibiarkan begitu saja', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Dirapikan dan disimpan di kotaknya', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Dibuang ke tempat sampah', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian II: Pilihan Ganda Kompleks',
                    'instructions' => 'Pilihlah semua jawaban yang benar (jawaban benar lebih dari satu).',
                    'order' => 2,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata di bawah ini yang memuat huruf vokal "i"? (Pilih dua)',
                            'explanation' => 'Cincin (c-i-n-c-i-n) dan Hiu (h-i-u) memuat vokal i. Celana hanya memuat e dan a.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Cincin', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Hiu', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Celana', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah dua tempat berbahaya yang tidak boleh dijadikan tempat bermain anak!',
                            'explanation' => 'Rel kereta api dan tepi jalan raya sangat berbahaya dan membahayakan keselamatan jiwa.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Tepi rel perlintasan kereta api', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Pinggir jalan raya yang ramai truk', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Halaman belakang sekolah yang berpagar', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata yang berawalan huruf "C"? (Pilih dua)',
                            'explanation' => 'Capung dan Ceri berawalan huruf c, sedangkan Harimau berawalan huruf h.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Capung', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Ceri', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Harimau', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Sikap yang benar saat bermain peran bersama teman sekelas adalah .... (Pilih dua)',
                            'explanation' => 'Berbagi peran dan saling menghargai membuat permainan berjalan menyenangkan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Membagi peran secara adil', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Saling mendukung penampilan teman', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Ingin menjadi pemeran utama terus-menerus', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang terdiri atas 2 suku kata? (Pilih dua)',
                            'explanation' => 'Hu-jan (2) dan Ca-cing (2). Ha-ri-mau memiliki 3 suku kata.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Hujan', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Cacing', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Harimau', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah situasi bermain dengan tindakan sopan yang tepat.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan situasi bermain dengan ucapan yang sopan!',
                            'explanation' => 'Menabrak tidak sengaja -> minta maaf, diberi pinjam mainan -> terima kasih, ingin ikut bermain -> bolehkah aku ikut?.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Secara tidak sengaja menyenggol teman', 'match_key' => '"Maafkan aku, aku tidak sengaja."', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Diberi pinjaman mainan oleh teman', 'match_key' => '"Terima kasih banyak telah meminjamkan."', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ingin bergabung bermain lompat tali', 'match_key' => '"Bolehkah aku ikut bermain bersama kalian?"', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Teman mencetak gol dalam sepak bola', 'match_key' => '"Wah, tendanganmu hebat sekali!"', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Hari sudah sore dan harus pulang ke rumah', 'match_key' => '"Teman-teman, aku pamit pulang dulu ya."', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan gambar hewan dengan ciri khas gerakannya saat bermain!',
                            'explanation' => 'Kelinci melompat, capung terbang, ikan berenang, cacing merayap di tanah, harimau berlari.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Kelinci', 'match_key' => 'Melompat-lompat lincah', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Capung', 'match_key' => 'Terbang melayang di udara', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Cacing', 'match_key' => 'Menggeliat dan merayap di tanah', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Harimau', 'match_key' => 'Berlari mengejar mangsa', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Bebek', 'match_key' => 'Berjalan beriringan sambil megal-megol', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata dengan kata benda yang sesuai!',
                            'explanation' => 'ce -> cerek, cu -> cuka, ci -> cicak, he -> hewan, hu -> huruf.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ce', 'match_key' => 'Cerek air minum', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Cu', 'match_key' => 'Cuka dapur', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ci', 'match_key' => 'Cicak di dinding', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'He', 'match_key' => 'Hewan peliharaan', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Hu', 'match_key' => 'Huruf alfabet', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan perlengkapan bermain dengan fungsi keamanannya!',
                            'explanation' => 'Helm pelindung kepala, deker siku/lutut mencegah lecet, sepatu melindung telapak kaki.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Helm sepeda', 'match_key' => 'Melindungi kepala dari benturan', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Pelindung lutut (knee pad)', 'match_key' => 'Mencegah lutut lecet saat jatuh', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Sepatu olahraga', 'match_key' => 'Melindungi telapak kaki dari batu tajam', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Kacamata renang', 'match_key' => 'Mencegah mata pedih kemasukan air kolam', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Pelampung rompi', 'match_key' => 'Membantu tubuh mengapung aman di air', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan nama anak dengan kegiatan bermain yang dilakukannya!',
                            'explanation' => 'Boni menendang bola, Cici melompat tali, Hana mengayuh sepeda, Budi mengejar layangan, Caca menyusun balok.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Boni', 'match_key' => 'Menendang bola ke arah gawang', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Cici', 'match_key' => 'Melompat di atas seutas tali karet', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Hana', 'match_key' => 'Mengayuh sepeda roda dua di taman', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Budi', 'match_key' => 'Memegang gulungan benang layang-layang', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Caca', 'match_key' => 'Menyusun istana balok warna-warni', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
