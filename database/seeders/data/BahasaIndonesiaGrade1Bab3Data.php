<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade1Bab3Data
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
            'title' => 'QUIZ 01 Bab 03 Awas Kuman!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 1 Bab 3: Mengenali bahaya kuman, kebiasaan hidup bersih mencuci tangan dengan sabun, serta suku kata ka, ki, ku, ke, ko.',
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
                            'prompt' => 'Kuman berukuran sangat kecil dan dapat menyebabkan tubuh kita menjadi ....',
                            'explanation' => 'Kuman yang masuk ke dalam tubuh dapat menyebabkan penyakit atau sakit.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Sakit', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kuat', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Tinggi', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Sebelum makan dan setelah menggunakan toilet, kita wajib mencuci tangan menggunakan ....',
                            'explanation' => 'Air mengalir dan sabun ampuh membersihkan kotoran serta membunuh kuman di tangan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Air mengalir dan sabun', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Minyak goreng', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Kain kering yang kotor', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Huruf pertama dari kata "kuman" adalah ....',
                            'explanation' => 'Kata "kuman" diawali oleh huruf k.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'k', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'c', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'h', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Bagian tubuh di ujung jari yang harus dipotong pendek dan dibersihkan secara teratur adalah ....',
                            'explanation' => 'Kuku yang panjang dan hitam menjadi sarang bersarangnya kuman penyakit.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Rambut', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Kuku', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Lidah', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suku kata awal dari kata "katak" adalah ....',
                            'explanation' => 'Kata katak terdiri dari dua suku kata: ka-tak, berawalan "ka".',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'ka', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'ki', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'ku', 'is_correct' => false],
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
                            'prompt' => 'Pilihlah dua waktu terpenting saat kita wajib mencuci tangan!',
                            'explanation' => 'Sebelum menyantap makanan dan sesudah buang air besar/kecil di kamar mandi adalah waktu wajib cuci tangan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Sebelum makan', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Setelah buang air di toilet', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Saat sedang tidur lelap', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali oleh suku kata "ku"? (Pilih dua)',
                            'explanation' => 'Kuda dan Kucing diawali suku kata ku. Kelinci diawali ke.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kuda', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kucing', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kelinci', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Apa saja tanda-tanda makanan yang sudah tidak sehat dan dihinggapi kuman? (Pilih dua)',
                            'explanation' => 'Berbau busuk atau basi serta dihinggapi lalat menandakan makanan tercemar kuman.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Berbau asam atau basi', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Dihinggapi lalat berulang kali', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Baru dimasak dan masih hangat', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah benda yang kita gunakan untuk menjaga kebersihan tubuh saat mandi!',
                            'explanation' => 'Sabun mandi dan sampo membersihkan kotoran dari kulit dan rambut.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Sabun mandi', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Sampo rambut', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Pensil warna', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata-kata berikut yang memuat huruf "k"? (Pilih dua)',
                            'explanation' => 'Kotor dan Kering memiliki huruf k. Bersih tidak memiliki huruf k.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kotor', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kering', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Bersih', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah kegiatan kebersihan dengan alat yang tepat.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kegiatan merawat diri dengan perlengkapannya!',
                            'explanation' => 'Menggosok gigi memakai sikat gigi, mencuci tangan memakai sabun cuci tangan, memotong kuku memakai gunting kuku.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Menggosok gigi', 'match_key' => 'Sikat gigi dan pasta gigi', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Mencuci tangan kotor', 'match_key' => 'Sabun cuci tangan dan air mengalir', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Memotong kuku panjang', 'match_key' => 'Gunting pemotong kuku', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Mengeringkan badan basah', 'match_key' => 'Handuk bersih yang kering', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Merapikan rambut kusut', 'match_key' => 'Sisir rambut', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata dengan kata yang berawalan huruf k!',
                            'explanation' => 'ka -> kado, ki -> kipas, ku -> kuman, ke -> keledai, ko -> kolam.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ka', 'match_key' => 'Kado', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Ki', 'match_key' => 'Kipas', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ku', 'match_key' => 'Kuman', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Ke', 'match_key' => 'Keledai', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Ko', 'match_key' => 'Kolam', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan gejala penyakit dengan penyebabnya!',
                            'explanation' => 'Sakit gigi karena jarang sikat gigi, sakit perut karena makan jajanan kotor, batuk pilek karena tertular kuman udara.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Gigi berlubang dan ngilu', 'match_key' => 'Malas menggosok gigi setelah makan permen', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Perut mulas dan diare', 'match_key' => 'Makan jajanan tidak bersih dihinggapi lalat', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Badan gatal-gatal bintik merah', 'match_key' => 'Tidak mandi setelah berkeringat kotor', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Mata merah dan perih', 'match_key' => 'Mengucek mata dengan tangan berdebu', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Batuk dan bersin terus', 'match_key' => 'Tertular percikan kuman flu dari udara', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan langkah cuci tangan dengan urutannya!',
                            'explanation' => 'Basahi tangan dengan air, beri sabun gosok telapak dan punggung, bilas air mengalir, keringkan handuk.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Langkah pertama', 'match_key' => 'Basahi tangan dengan air mengalir', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Langkah kedua', 'match_key' => 'Tuangkan sabun dan gosok kedua telapak tangan', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Langkah ketiga', 'match_key' => 'Gosok punggung tangan dan sela-sela jari', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Langkah keempat', 'match_key' => 'Bilas tangan sampai busa sabun hilang bersih', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Langkah kelima', 'match_key' => 'Keringkan tangan dengan lap bersih atau tisu', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan potongan suku kata menjadi kata bermakna!',
                            'explanation' => 'ku-ku, ku-man, ko-tor, ke-las, ki-pas.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ku - ...', 'match_key' => 'ku (Kuku)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Ku - ... (penyebab sakit)', 'match_key' => 'man (Kuman)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ko - ...', 'match_key' => 'tor (Kotor)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Ke - ...', 'match_key' => 'las (Kelas)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Ki - ...', 'match_key' => 'pas (Kipas)', 'is_correct' => true, 'order' => 5],
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
            'title' => 'QUIZ 02 Bab 03 Awas Kuman!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 2 Bab 3: Menjaga kebersihan mulut dan gigi, etika bersin dan batuk, serta menyusun kata dari huruf k-a-m-i.',
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
                            'prompt' => 'Ketika kita hendak batuk atau bersin, kita harus menutup hidung dan mulut dengan ....',
                            'explanation' => 'Menutup mulut dengan tisu atau lengan baju bagian dalam mencegah kuman menyebar ke orang lain.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lengan baju bagian dalam atau tisu', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Membuka mulut selebar-lebarnya ke teman', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Mengusapnya ke baju teman', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Menggosok gigi sebaiknya dilakukan minimal sehari sebanyak ....',
                            'explanation' => 'Dua kali sehari: pagi hari setelah sarapan dan malam hari sebelum tidur.',
                            'options' => [
                                ['label' => 'A', 'option_text' => '1 kali sebulan', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => '2 kali sehari', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => '5 kali setahun', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Susunan huruf k - u - d - a dibaca menjadi ....',
                            'explanation' => 'k - u - d - a dibaca menjadi kata kuda.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kuda', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kura', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Kutu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Sampah yang menumpuk di pojok kelas harus segera dibuang ke ....',
                            'explanation' => 'Tempat sampah disediakan untuk menampung sampah agar lingkungan bersih.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Tempat sampah', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Bawah laci meja', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Halaman tetangga', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suku kata awal dari kata "kucing" adalah ....',
                            'explanation' => 'Kata kucing berawalan suku kata "ku".',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'ka', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'ku', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'ko', 'is_correct' => false],
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
                            'prompt' => 'Pilihlah dua waktu yang tepat untuk menggosok gigi!',
                            'explanation' => 'Pagi hari setelah sarapan dan malam hari sebelum pergi tidur.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Pagi hari setelah sarapan', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Malam hari sebelum tidur', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Saat sedang mengunyah makanan', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali suku kata "ko"? (Pilih dua)',
                            'explanation' => 'Kopi dan Kolam diawali ko. Kuda diawali ku.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kopi', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kolam', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kuda', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah akibat dari kebiasaan jarang mandi? (Pilih dua)',
                            'explanation' => 'Badan berbau tidak sedap dan kulit menjadi gatal karena kuman berkembang biak.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kulit terasa gatal-gatal', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Badan mengeluarkan aroma tidak sedap', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Tubuh menjadi harum dan segar', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah makanan yang menyehatkan gigi dan tubuh!',
                            'explanation' => 'Buah apel dan sayur brokoli menyehatkan tubuh, sedangkan permen manis berlebih merusak gigi.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Buah-buahan segar', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Sayuran hijau', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Permen manis berwarna pekat yang lengket', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang terdiri atas 2 suku kata? (Pilih dua)',
                            'explanation' => 'Ku-ku (2) dan Ka-ki (2). Ke-le-lai memiliki 3 suku kata.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kuku', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kaki', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kelelawar', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah bagian tubuh dengan cara menjaga kebersihannya.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan bagian tubuh dengan cara merawat kebersihannya!',
                            'explanation' => 'Rambut dikeramasi sampo, gigi digosok sikat gigi, kuku dipotong gunting kuku, telinga dibersihkan lembut, badan disabun.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Rambut kepala', 'match_key' => 'Dicuci keramas dengan sampo harum', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Gigi geligi', 'match_key' => 'Digosok teratur dengan pasta gigi', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Kuku jari tangan', 'match_key' => 'Dipotong pendek jika sudah panjang', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Seluruh badan', 'match_key' => 'Dibasuh air dan digosok sabun mandi', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Kaki setelah main tanah', 'match_key' => 'Dicuci bersih dengan air sabun', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata benda dengan huruf vokal utamanya!',
                            'explanation' => 'Katak -> a, Kipas -> i, Kutu -> u, Keju -> e, Kopi -> o.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Katak', 'match_key' => 'Vokal a', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kipas', 'match_key' => 'Vokal i', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Kutu', 'match_key' => 'Vokal u', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Keju', 'match_key' => 'Vokal e', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Kopi', 'match_key' => 'Vokal o', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan tempat di sekolah dengan cara merawatnya!',
                            'explanation' => 'Ruang kelas disapu, toilet disiram bersih, tempat cuci tangan ditutup kerannya, halaman dicabut rumput liarnya.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Lantai ruang kelas', 'match_key' => 'Disapu dan dipel setiap piket', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kloset kamar mandi sekolah', 'match_key' => 'Disiram air sampai bersih setelah dipakai', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Keran wastafel', 'match_key' => 'Ditutup rapat setelah selesai cuci tangan', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Papan tulis kelas', 'match_key' => 'Dihapus bersih setelah selesai pelajaran', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Taman bunga sekolah', 'match_key' => 'Disiram teratur dan tidak diinjak-injak', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan ciri benda bersih versus benda kotor!',
                            'explanation' => 'Baju bersih harum, baju kotor bau keringat, air jernih segar, air keruh berlumpur.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Baju seragam baru dicuci', 'match_key' => 'Harum, rapi, dan nyaman dipakai', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kaus kaki setelah olahraga', 'match_key' => 'Bau keringat dan harus dicuci', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Air minum dalam botol tertutup', 'match_key' => 'Bening, jernih, dan tidak berbau', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Genangan air comberan', 'match_key' => 'Keruh hitam dan sarang jentik nyamuk', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Piring selesai dicuci sabun', 'match_key' => 'Kesat, berkilau, dan bebas minyak', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata dasar dengan imbuhan atau pasangannya!',
                            'explanation' => 'cu-ci, sa-bun, kum-an, kotor, ber-sih.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Cu - ...', 'match_key' => 'ci (Cuci)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Sa - ...', 'match_key' => 'bun (Sabun)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ku - ...', 'match_key' => 'man (Kuman)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Ber - ...', 'match_key' => 'sih (Bersih)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Ko - ...', 'match_key' => 'tor (Kotor)', 'is_correct' => true, 'order' => 5],
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
            'title' => 'QUIZ 03 Bab 03 Awas Kuman!',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 3 Bab 3: Pemantapan literasi hidup sehat, menghindari makanan basi, dan membaca kalimat sederhana berunsur huruf k.',
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
                            'prompt' => 'Kuman tidak dapat kita lihat secara langsung dengan mata biasa karena ukurannya ....',
                            'explanation' => 'Kuman berukuran sangat mikroskopis atau teramat kecil.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Sangat kecil sekali', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Sebesar bola sepak', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Sebesar pohon kelapa', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Alat yang kita gunakan untuk membilas mulut setelah selesai menyikat gigi adalah ....',
                            'explanation' => 'Air bersih digunakan untuk berkumur.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Air bersih untuk berkumur', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Minyak wangi', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Susu manis', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Kata "kebersihan" diawali dengan huruf ....',
                            'explanation' => 'Kata "kebersihan" berawalan huruf k.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'k', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'h', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Jika kita bersin di dekat orang lain tanpa menutup mulut, kuman penyakit akan ....',
                            'explanation' => 'Percikan bersin yang terbang ke udara dapat menularkan kuman kepada orang di sekitar kita.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Menular ke orang lain', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Menghilang menjadi wangi', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Berubah menjadi makanan enak', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Kalimat "Kiki mencuci tangan" terdiri dari berapa kata? ....',
                            'explanation' => 'Kiki (1) mencuci (2) tangan (3) = 3 kata.',
                            'options' => [
                                ['label' => 'A', 'option_text' => '2 kata', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => '3 kata', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => '5 kata', 'is_correct' => false],
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
                            'prompt' => 'Manakah kebiasaan baik untuk mencegah penularan kuman flu? (Pilih dua)',
                            'explanation' => 'Memakai masker saat flu dan rajin mencuci tangan mencegah kuman berpindah.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Memakai masker penutup hidung dan mulut', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Mencuci tangan dengan sabun dan air', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Mengusapkan lendir hidung ke meja kelas', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali suku kata "ka"? (Pilih dua)',
                            'explanation' => 'Kaki dan Kaca diawali suku kata ka. Kuda diawali ku.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kaki', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kaca', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kuda', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah dua hewan perantara yang membawa kuman penyakit!',
                            'explanation' => 'Lalat yang hinggap di kotoran dan kecoak membawa banyak kuman penyakit.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Lalat hijau', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kecoak di tempat kotor', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kupu-kupu di bunga', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata-kata di bawah ini yang memuat huruf "K" kapital? (Pilih dua)',
                            'explanation' => 'Kiki dan Kalimantan ditulis dengan huruf kapital K.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kiki', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kalimantan', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'sepatu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah tanda-tanda tubuh yang sehat dan bugar!',
                            'explanation' => 'Tubuh bertenaga dan ceria adalah tanda anak yang sehat.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Semangat beraktivitas dan belajar', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Nafsu makan baik dan tidak demam', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Suhu tubuh panas tinggi menggigil', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah istilah kebersihan dengan penjelasannya.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan istilah kesehatan berikut dengan artinya!',
                            'explanation' => 'Kuman adalah makhluk renik pembawa penyakit, sabun pembersih kotoran, masker pelindung napas, imunisasi kekebalan tubuh.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Kuman', 'match_key' => 'Makhluk amat kecil yang bisa membawa bibit penyakit', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Sabun', 'match_key' => 'Bahan pembersih berbusa yang melarutkan lemak dan kuman', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Masker', 'match_key' => 'Kain penutup hidung dan mulut dari debu dan kuman', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Keramas', 'match_key' => 'Membersihkan rambut dan kulit kepala dengan sampo', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Kumur', 'match_key' => 'Membersihkan rongga mulut dengan mengocok air', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata sifat dengan lawannya!',
                            'explanation' => 'Bersih lawannya kotor, sehat lawannya sakit, wangi lawannya bau busuk.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Bersih', 'match_key' => 'Kotor', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Sehat', 'match_key' => 'Sakit', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Harum / Wangi', 'match_key' => 'Bau busuk / Basi', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Basah', 'match_key' => 'Kering', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Pendek (kuku)', 'match_key' => 'Panjang menghitam', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kalimat tanya dengan jawaban yang tepat mengenai kebersihan!',
                            'explanation' => 'Mengapa kita harus mandi? Agar badan bersih dan segar.',
                            'options' => [
                                ['label' => '1', 'option_text' => '"Mengapa kita harus mandi dua kali sehari?"', 'match_key' => 'Agar tubuh bersih dari kotoran dan kuman', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => '"Kapan kita harus mencuci tangan?"', 'match_key' => 'Sebelum menyentuh makanan dan sesudah dari toilet', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => '"Apa akibat jika kuku dibiarkan panjang kotor?"', 'match_key' => 'Kuman bisa ikut tertelan saat kita makan', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => '"Bagaimana cara menutup mulut saat batuk?"', 'match_key' => 'Menggunakan lengan siku baju bagian dalam', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => '"Siapa yang bertugas menjaga kebersihan diri?"', 'match_key' => 'Diri kita sendiri dengan penuh tanggung jawab', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata dengan kata bendanya!',
                            'explanation' => 'ka -> kamar, ki -> kitab, ku -> kunci, ke -> kemeja, ko -> kompor.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ka', 'match_key' => 'Kamar tidur', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Ki', 'match_key' => 'Kitab / buku', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ku', 'match_key' => 'Kunci pintu', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Ke', 'match_key' => 'Kemeja seragam', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Ko', 'match_key' => 'Kompor masak', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata acak menjadi kalimat yang padu!',
                            'explanation' => 'Boni mencuci tangan, Kiki menggosok gigi, Ibu menyapu lantai, Hasan memotong kuku, Caca mandi pagi.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Boni', 'match_key' => 'mencuci tangan pakai sabun', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kiki', 'match_key' => 'menggosok giginya sampai bersih', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ibu', 'match_key' => 'menyapu lantai ruang tamu', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Hasan', 'match_key' => 'memotong kukunya yang panjang', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Caca', 'match_key' => 'mandi pagi dengan air segar', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
