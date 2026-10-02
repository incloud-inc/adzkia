<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade1Bab4Data
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
            'title' => 'QUIZ 01 Bab 04 Aku Bisa!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 1 Bab 4: Mengenal aneka ragam gerak tubuh, menirukan gerakan hewan lincah, serta suku kata la, li, lu, le, lo.',
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
                            'prompt' => 'Gerakan katak saat berpindah tempat dari satu daun ke daun lain adalah ....',
                            'explanation' => 'Katak berpindah dengan cara melompat menggunakan kedua kaki belakangnya yang kuat.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Melompat', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Terbang', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Merayap', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Huruf pertama dari kata "lompat" adalah ....',
                            'explanation' => 'Kata "lompat" diawali dengan huruf l.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'l', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 't', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'i', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Ketika menirukan gerakan burung elang terbang, kedua tangan kita direntangkan dan digerakkan ke ....',
                            'explanation' => 'Gerakan terbang ditirukan dengan mengayunkan kedua lengan ke atas dan ke bawah seperti kepakan sayap.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Atas dan bawah seperti sayap', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Dalam saku celana', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Belakang punggung terikat', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Hewan yang berjalan sangat lambat sambil menggendong rumah tempurungnya di punggung adalah ....',
                            'explanation' => 'Siput dan kura-kura bergerak dengan lambat dan memiliki cangkang tempurung.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Siput atau keong', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Harimau', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Kuda pacu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suku kata awal dari kata "lampu" adalah ....',
                            'explanation' => 'Kata lampu diawali oleh suku kata "lam" yang berbasis suku kata "la".',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'la', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'li', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'lu', 'is_correct' => false],
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
                            'prompt' => 'Pilihlah dua hewan yang bergerak dengan cara melompat!',
                            'explanation' => 'Kangguru dan Kelinci melompat lincah. Kura-kura merayap pelan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kelinci yang lucu', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kangguru Australia', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kura-kura darat', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali oleh suku kata "li"? (Pilih dua)',
                            'explanation' => 'Lilin dan Lidah berawalan li. Kuda berawalan ku.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lilin', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lidah', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Lari', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kemampuan mandiri yang sudah bisa dilakukan oleh anak kelas satu SD? (Pilih dua)',
                            'explanation' => 'Memakai sepatu sendiri dan merapikan buku tas adalah kemandirian anak kelas 1 SD.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Memakai seragam dan sepatu sendiri', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Merapikan buku ke dalam tas sekolah', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Mengendarai sepeda motor di jalan raya', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah gerakan tubuh yang membutuhkan keseimbangan!',
                            'explanation' => 'Berdiri satu kaki dan berjalan di atas garis lurus/papan titian melatih keseimbangan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Berdiri tegak dengan satu kaki', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Berjalan di atas papan titian lurus', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Tidur berbaring di atas kasur empuk', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata-kata berikut yang memuat huruf "l"? (Pilih dua)',
                            'explanation' => 'Lari dan Balon memiliki huruf l, sedangkan Kucing tidak memuat huruf l.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lari', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Balon', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kucing', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah hewan dengan cara gerak khasnya.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan hewan dengan jenis gerakannya yang khas!',
                            'explanation' => 'Burung terbang dengan sayap, ikan berenang dengan sirip, kelinci melompat, ular melata, monyet bergelantungan.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Burung merpati', 'match_key' => 'Terbang melayang di angkasa', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Ikan mas koki', 'match_key' => 'Berenang lincah di air', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Kelinci putih', 'match_key' => 'Melompat-lompat di rumput', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Ular sanca', 'match_key' => 'Melata dengan otot perutnya', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Monyet ekor panjang', 'match_key' => 'Bergelantungan di dahan pohon', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata dengan kata yang berawalan huruf l!',
                            'explanation' => 'la -> labu, li -> lilin, lu -> lutut, le -> lebah, lo -> lonceng.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'La', 'match_key' => 'Labu', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Li', 'match_key' => 'Lilin', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Lu', 'match_key' => 'Lutut', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Le', 'match_key' => 'Lebah', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Lo', 'match_key' => 'Lonceng', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan aktivitas fisik dengan bagian tubuh yang paling banyak bergerak!',
                            'explanation' => 'Berlari memakai kaki, melempar memakai tangan, menoleh memakai leher, menyundul memakai kepala, melipat memakai jari.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Berlari cepat', 'match_key' => 'Otot kedua kaki', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Melempar bola kasti', 'match_key' => 'Lengan dan telapak tangan', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Menoleh ke kanan dan kiri', 'match_key' => 'Leher dan kepala', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Menari meliuk-liuk', 'match_key' => 'Pinggang dan punggung lentur', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Menjepit kertas origami', 'match_key' => 'Jari-jemari tangan', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan pernyataan kemampuan dengan sikap yang mencerminkannya!',
                            'explanation' => 'Aku bisa membaca buku, aku berani tampil di depan kelas, aku pantang menyerah saat gagal.',
                            'options' => [
                                ['label' => '1', 'option_text' => '"Aku bisa membaca lancar"', 'match_key' => 'Rajin berlatih mengeja setiap hari', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => '"Aku berani tampil bercerita"', 'match_key' => 'Percaya diri maju ke depan kelas', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => '"Aku bisa memakai sepatu"', 'match_key' => 'Mandiri tanpa bergantung orang lain', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => '"Aku ingin bisa berenang"', 'match_key' => 'Semangat belajar bersama pelatih', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => '"Aku belum bisa berhitung cepat"', 'match_key' => 'Tidak putus asa dan terus mencoba', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata acak menjadi nama anggota tubuh berhuruf l!',
                            'explanation' => 'lu-tut, li-dah, le-her, le-ngan, lu-bang hidung.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Lu - ...', 'match_key' => 'tut (Lutut)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Li - ...', 'match_key' => 'dah (Lidah)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Le - ...', 'match_key' => 'her (Leher)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Le - ...', 'match_key' => 'ngan (Lengan)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'La - ...', 'match_key' => 'pisan kulit (Lapisan)', 'is_correct' => true, 'order' => 5],
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
            'title' => 'QUIZ 02 Bab 04 Aku Bisa!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 2 Bab 4: Memahami instruksi gerak cepat dan lambat, mengenal huruf kapital L dan huruf kecil l, serta keberanian mencoba hal baru.',
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
                            'prompt' => 'Bentuk huruf kapital dari huruf "l" adalah ....',
                            'explanation' => 'Huruf kapital dari l adalah L.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'L', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'I', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'T', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Gerakan pohon bambu saat tertiup angin kencang adalah ....',
                            'explanation' => 'Pohon bambu meliuk-liuk ke kanan dan kiri dengan lentur.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Meliuk-liuk ke kanan dan ke kiri', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Melompat ke atas awan', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Menyelam ke dalam tanah', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Ketika guru memberi aba-aba "Jalan di tempat, gerak!", maka yang kita lakukan adalah ....',
                            'explanation' => 'Mengangkat kaki bergantian secara teratur di tempat yang sama.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Mengangkat kaki bergantian di tempat', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Berlari kencang keluar kelas', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Duduk bersila di lantai', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Hewan kecil bersayap yang menghasilkan madu manis adalah ....',
                            'explanation' => 'Lebah mengumpulkan nektar bunga dan menghasilkan madu.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lebah', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lalat', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Laba-laba', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suku kata awal dari kata "lukisan" adalah ....',
                            'explanation' => 'Kata lukisan terdiri dari lu-ki-san, berawalan "lu".',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'la', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'lu', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'lo', 'is_correct' => false],
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
                            'prompt' => 'Pilihlah dua hewan yang bergerak dengan kecepatan sangat lari kencang!',
                            'explanation' => 'Kuda dan Macan tutul/Cheetah berlari sangat cepat, sedangkan siput bergerak amat lambat.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kuda pacu', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Macan tutul', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Siput kebun', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali suku kata "le"? (Pilih dua)',
                            'explanation' => 'Lebah dan Lemon berawalan le. Labu berawalan la.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lebah', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lemon', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Labu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah sikap yang menunjukkan rasa percaya diri saat belajar? (Pilih dua)',
                            'explanation' => 'Mengacungkan tangan untuk bertanya dan berani membaca nyaring di depan kelas.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Berani mengacungkan tangan saat ingin bertanya', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Membaca nyaring dengan suara jelas di depan guru', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Menyembunyikan wajah di bawah meja karena malu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah kata nama orang yang diawali dengan huruf "L" besar!',
                            'explanation' => 'Lani dan Lisa adalah nama orang dengan awalan huruf kapital L.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lani', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lisa', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'semut', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Gerakan tubuh mana saja yang termasuk gerakan berpindah tempat (lokomotor)? (Pilih dua)',
                            'explanation' => 'Berlari dan melompat memindahkan posisi tubuh, sedangkan menggelengkan kepala diam di tempat.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Berlari mengitari tiang bendera', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Melompat ke dalam lingkaran ban', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Menggelengkan kepala sambil duduk di kursi', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah instruksi gerak dengan peragaan yang sesuai.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan instruksi gerak senam dengan sikap tubuh yang benar!',
                            'explanation' => 'Rentangkan tangan, bungkukkan badan, jinjitkan kaki, putar pinggang, tengadahkan kepala.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Rentangkan kedua tangan!', 'match_key' => 'Membuka kedua tangan lurus ke samping', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bungkukkan badan ke depan!', 'match_key' => 'Menurunkan tubuh hingga ujung jari menyentuh lantai', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Berjinjitlah dengan ujung jari!', 'match_key' => 'Mengangkat tumit kaki tinggi-tinggi', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Putar pinggang ke kanan!', 'match_key' => 'Memutar badan bagian tengah secara melingkar', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Tengadahkan kepalamu!', 'match_key' => 'Mengarahkan pandangan mata lurus ke langit', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata dengan kata benda berawalan l!',
                            'explanation' => 'la -> lalat, li -> lidi, lu -> lumpur, le -> lemari, lo -> loyang.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'La', 'match_key' => 'Lalat', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Li', 'match_key' => 'Lidi', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Lu', 'match_key' => 'Lumpur', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Le', 'match_key' => 'Lemari', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Lo', 'match_key' => 'Loyang', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kecepatan gerak dengan contoh hewannya!',
                            'explanation' => 'Sangat cepat: citah/kuda, sangat lambat: kura-kura/siput, melayang tenang: elang.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Kuda pacu', 'match_key' => 'Berlari sangat cepat', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kura-kura', 'match_key' => 'Merayap sangat lambat', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Burung elang', 'match_key' => 'Melayang tinggi dan menukik tajam', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Bebek di darat', 'match_key' => 'Berjalan megal-megol santai', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Kelinci', 'match_key' => 'Melompat gesit dan lincah', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata benda dengan fungsinya dalam membantu gerak manusia!',
                            'explanation' => 'Sepatu alas kaki, kacamata bantu melihat, tongkat bantu jalan lansia, sepeda kendaraan roda dua.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Sepatu lari', 'match_key' => 'Melindungi kaki saat berlari di aspal', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kacamata renang', 'match_key' => 'Melihat jelas di dalam air kolam', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Sepeda roda dua', 'match_key' => 'Alat transportasi berdaya kayuh', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Matras senam', 'match_key' => 'Alas empuk untuk berguling aman', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Tongkat estafet', 'match_key' => 'Benda silinder untuk dioper saat lari beregu', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata kerja gerak dengan lawan katanya!',
                            'explanation' => 'Maju lawannya mundur, naik lawannya turun, cepat lawannya lambat.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Maju', 'match_key' => 'Mundur', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Naik', 'match_key' => 'Turun', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Cepat', 'match_key' => 'Lambat', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Berdiri', 'match_key' => 'Duduk', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Tutup (tangan)', 'match_key' => 'Buka', 'is_correct' => true, 'order' => 5],
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
            'title' => 'QUIZ 03 Bab 04 Aku Bisa!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 3 Bab 4: Pemantapan mengeja kata berhuruf l, membaca kalimat sederhana tentang kemampuan diri, dan melatih ekspresi percaya diri.',
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
                            'prompt' => 'Susunan huruf l - u - t - u - t dibaca menjadi ....',
                            'explanation' => 'l - u - t - u - t membentuk kata lutut.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lutut', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lumut', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Luput', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Jika kita menemui kesulitan saat belajar mengikat tali sepatu, kita sebaiknya ....',
                            'explanation' => 'Meminta bimbingan guru atau orang tua dan terus berlatih sampai mahir.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Meminta bimbingan orang tua dan terus mencoba', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Membuang sepatu ke selokan', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Menangis seharian di kamar', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Alat penerang ruangan yang memanfaatkan energi listrik adalah ....',
                            'explanation' => 'Lampu listrik menerangi ruangan gelap di rumah kita.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lampu', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lidi', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Lumpur', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Gerakan tangan saat melambai kepada teman yang hendak pulang bermakna ....',
                            'explanation' => 'Melambaikan tangan adalah isyarat ucapan perpisahan atau salam "sampai jumpa".',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Salam perpisahan "sampai jumpa"', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Mengajak berkelahi', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Menyuruh teman lari ketakutan', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Kata "Lani" diawali oleh huruf ....',
                            'explanation' => 'Kata "Lani" diawali dengan huruf kapital L.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'L', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'K', 'is_correct' => false],
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
                            'prompt' => 'Manakah kata-kata berikut yang memuat huruf vokal "e"? (Pilih dua)',
                            'explanation' => 'Lebah (l-e-b-a-h) dan Leher (l-e-h-e-r) memuat huruf vokal e, sedangkan Lilin hanya memuat i.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lebah', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Leher', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Lilin', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah dua kemampuan literasi yang sudah dikuasai anak di kelas satu!',
                            'explanation' => 'Mengenal huruf alfabet dan membaca kata sederhana adalah capaian kelas 1.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Mengenal huruf dan bunyinya dengan tepat', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Membaca kata dua suku kata sederhana', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Menulis buku novel tebal 200 halaman', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali suku kata "lo"? (Pilih dua)',
                            'explanation' => 'Lontong dan Lomba berawalan suku kata lo. Labu berawalan la.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lontong', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lomba', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Labu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah sikap anak hebat yang berkarakter baik! (Pilih dua)',
                            'explanation' => 'Suka menolong sesama dan bertutur kata sopan adalah ciri anak berkarakter mulia.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Suka menolong teman yang kesulitan', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Berbicara dengan kata-kata santun dan sopan', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Suka mengejek kelemahan teman sekelas', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang terdiri atas 2 suku kata? (Pilih dua)',
                            'explanation' => 'La-bu (2 suku kata) dan Le-le (2 suku kata). Lo-ko-mo-tif memiliki 4 suku kata.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Labu', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Lele', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Lokomotif', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah ungkapan rasa percaya diri dengan situasinya.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kalimat "Aku Bisa" dengan tindakan nyata anak mandiri!',
                            'explanation' => 'Bisa mandi sendiri, bisa merapikan tempat tidur, bisa menyikat gigi, bisa membaca, bisa berbagi.',
                            'options' => [
                                ['label' => '1', 'option_text' => '"Aku bisa memakai baju seragam"', 'match_key' => 'Mengancingkan baju kemeja sendiri tanpa bantuan', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => '"Aku bisa merapikan tempat tidur"', 'match_key' => 'Melipat selimut dan meratakan sprei bantal', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => '"Aku bisa membaca buku cerita"', 'match_key' => 'Mengeja kata demi kata dengan teliti dan lancar', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => '"Aku bisa membantu orang tua"', 'match_key' => 'Menyiram pot tanaman bunga di teras rumah', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => '"Aku bisa makan sendiri"', 'match_key' => 'Menggunakan sendok dengan tertib di meja makan', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan nama benda olah raga berawalan huruf l dengan fungsinya!',
                            'explanation' => 'Lompat tali untuk kebugaran, lingkaran hula hoop untuk pinggang, lemari olahraga penyimpan bola.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Lompat tali', 'match_key' => 'Alat melompat melatih kekuatan tungkai kaki', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Lingkaran simpai / hula hoop', 'match_key' => 'Alat meliuk diputar di sekeliling pinggang', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Lampu sorot lapangan', 'match_key' => 'Menerangi arena olahraga di malam hari', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Lemari loker sekolah', 'match_key' => 'Tempat menyimpan sepatu dan tas olahraga', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Lencana juara', 'match_key' => 'Tanda penghargaan disematkan di dada pemenang', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan potongan suku kata menjadi nama sayuran atau buah!',
                            'explanation' => 'la-bu, le-mon, lo-bak, le-ngkeng, la-da.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'La - ... (sayur berkulit jingga)', 'match_key' => 'bu (Labu kuning)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Le - ... (buah kuning masam)', 'match_key' => 'mon (Lemon)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Lo - ... (sayur umbi putih)', 'match_key' => 'bak (Lobak)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Le - ... (buah manis berkulit cokelat)', 'match_key' => 'ngkeng (Kelengkeng/Lengkeng)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'La - ... (rempah butir pedas)', 'match_key' => 'da (Lada)', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kalimat ajakan berlatih dengan gerak tubuhnya!',
                            'explanation' => 'Ayo melompat, mari meluncur, yuk berlari.',
                            'options' => [
                                ['label' => '1', 'option_text' => '"Ayo melompat seperti kangguru!"', 'match_key' => 'Melompat dua kaki secara beruntun', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => '"Mari meliuk seperti pohon tertiup angin!"', 'match_key' => 'Mengayunkan badan ke kiri dan kanan perlahan', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => '"Yuk berjinjit tanpa bersuara!"', 'match_key' => 'Melangkah pelan hanya dengan ujung jari kaki', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => '"Ayo bertepuk tangan di atas kepala!"', 'match_key' => 'Mengangkat kedua tangan lalu menepukkannya', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => '"Mari merentangkan sayap seperti elang!"', 'match_key' => 'Membuka tangan lebar-lebar setinggi bahu', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata subjek dengan kegiatan yang berhasil dilakukannya!',
                            'explanation' => 'Lani bisa menyanyi, Boni bisa bermain bola, Cici bisa melompat tali, Kiki bisa cuci tangan, Budi bisa membaca.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Lani', 'match_key' => 'bisa menyanyikan lagu anak dengan merdu', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Boni', 'match_key' => 'bisa menggiring bola masuk ke gawang', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Cici', 'match_key' => 'bisa melompat tali tanpa terjerat', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Kiki', 'match_key' => 'bisa mencuci tangan pakai sabun sampai bersih', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Budi', 'match_key' => 'bisa membaca dongeng cerita bergambar', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
