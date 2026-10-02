<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade1Bab1Data
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
            'title' => 'QUIZ 01 Bab 01 Bunyi Apa?',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 1 Bab 1: Mengenali ragam bunyi di sekitar, tiruan bunyi hewan dan benda, serta suku kata berawalan huruf b.',
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
                            'prompt' => 'Tiruan bunyi suara bebek yang sedang berenang di kolam adalah ....',
                            'explanation' => 'Suara bebek adalah kwek-kwek. Suara meong adalah kucing, dan guk-guk adalah anjing.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kwek-kwek', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Meong-meong', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Guk-guk', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Bunyi klakson mobil saat melintas di jalan terdengar ....',
                            'explanation' => 'Klakson mobil atau kendaraan bermotor menghasilkan bunyi tin-tin atau din-din.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kring-kring', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Tin-tin', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Prok-prok', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Huruf pertama dari kata "bola" adalah ....',
                            'explanation' => 'Kata "bola" diawali oleh huruf b.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'b', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'd', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'p', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Benda yang berbunyi nyaring ketika ditiup oleh wasit saat bermain bola adalah ....',
                            'explanation' => 'Peluit ditiup dan menghasilkan bunyi priiiit.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Gendang', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Peluit', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Gitar', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suku kata awal dari nama benda "buku" adalah ....',
                            'explanation' => 'Kata buku terdiri dari suku kata bu-ku, sehingga suku kata awalnya adalah "bu".',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'ba', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'bi', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'bu', 'is_correct' => true],
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
                            'prompt' => 'Pilihlah dua hewan berikut yang menghasilkan bunyi alami dari suaranya!',
                            'explanation' => 'Kucing dan burung berkicau menghasilkan bunyi alami makhluk hidup, sedangkan radio adalah benda buatan elektronik.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Kucing mengeong', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Burung berkicau', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Radio menyala', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata-kata berikut yang diawali dengan huruf "b"? (Pilih dua)',
                            'explanation' => 'Baju dan balon berawalan huruf b, sedangkan daun diawali huruf d.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Baju', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Balon', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Daun', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah bunyi yang biasanya terdengar lembut atau pelan? (Pilih dua)',
                            'explanation' => 'Bisikan teman dan gesekan daun terdengar pelan, sedangkan petir menggelegar keras.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Bisikan teman', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Gesekan daun tertiup angin', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Suara guntur petir', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah bunyi yang berasal dari anggota tubuh manusia!',
                            'explanation' => 'Tepuk tangan (prok-prok) dan hentakan kaki berasal dari tubuh, sedangkan klakson dari kendaraan.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Tepukan tangan', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Hentakan kaki ke lantai', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Klakson motor', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata di bawah ini yang memiliki suku kata "ba"? (Pilih dua)',
                            'explanation' => 'Batu (ba-tu) dan bata (ba-ta) memiliki suku kata ba, sedangkan bola berawalan bo.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Batu', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Bata', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Bola', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah sumber bunyi di sebelah kiri dengan tiruan bunyinya di sebelah kanan.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkanlah sumber bunyi berikut dengan tiruan bunyinya!',
                            'explanation' => 'Ayam berkokok kukuruyuk, bel sepeda kring-kring, hujan tik-tik, pintu diketuk tok-tok, anjing guk-guk.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ayam jantan berkokok', 'match_key' => 'Kukuruyuk', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bel sepeda berbunyi', 'match_key' => 'Kring-kring', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Air hujan jatuh ke genting', 'match_key' => 'Tik-tik-tik', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Pintu diketuk', 'match_key' => 'Tok-tok-tok', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Anjing menggonggong', 'match_key' => 'Guk-guk-guk', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan gambar/nama benda dengan huruf awal namanya!',
                            'explanation' => 'Bebek awal b, Cangkir awal c, Kuda awal k, Mangga awal m, Topi awal t.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Bebek', 'match_key' => 'Huruf B', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Cangkir', 'match_key' => 'Huruf C', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Kuda', 'match_key' => 'Huruf K', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Mangga', 'match_key' => 'Huruf M', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Topi', 'match_key' => 'Huruf T', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata dengan jumlah suku katanya!',
                            'explanation' => 'Ibu (2: i-bu), Boneka (3: bo-ne-ka), Meja (2: me-ja), Helikopter (4: he-li-kop-ter), Buku (2: bu-ku).',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ibu', 'match_key' => '2 Suku Kata', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Boneka', 'match_key' => '3 Suku Kata', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Meja', 'match_key' => '2 Suku Kata', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Sepeda', 'match_key' => '3 Suku Kata', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Buku', 'match_key' => '2 Suku Kata', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata awal "b" dengan kelanjutan katanya!',
                            'explanation' => 'ba-tu, bi-ntang, bu-bur, be-bek, bo-la.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ba - ...', 'match_key' => 'tu (Batu)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bi - ...', 'match_key' => 'ru (Biru)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Bu - ...', 'match_key' => 'nga (Bunga)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Be - ...', 'match_key' => 'cak (Becak)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Bo - ...', 'match_key' => 'tol (Botol)', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan jenis bunyi berikut dengan contohnya!',
                            'explanation' => 'Bunyi alam berasal dari alam (petir, angin), bunyi buatan dari alat buatan manusia (peluit, klakson).',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Petir menyambar', 'match_key' => 'Bunyi Alam', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Gitar dipetik', 'match_key' => 'Bunyi Alat Musik', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Kucing mengeong', 'match_key' => 'Bunyi Hewan', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Tepuk tangan', 'match_key' => 'Bunyi Tubuh Manusia', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Klakson motor', 'match_key' => 'Bunyi Benda Buatan', 'is_correct' => true, 'order' => 5],
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
            'title' => 'QUIZ 02 Bab 01 Bunyi Apa?',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 2 Bab 1: Mengenal bunyi keras dan lembut, membedakan huruf kapital B dan huruf kecil b, serta menyimak cerita bergambar.',
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
                            'prompt' => 'Ketika seekor singa mengaum, suaranya terdengar sangat ....',
                            'explanation' => 'Auman singa sangat keras dan menggetarkan telinga.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Keras', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Pelan', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Halus', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Bentuk huruf kapital untuk huruf "b" adalah ....',
                            'explanation' => 'Bentuk huruf kapital untuk b adalah B.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'D', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'B', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'P', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Tiruan bunyi saat balon meletus adalah ....',
                            'explanation' => 'Balon yang meletus berbunyi dor atau darr.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Dor!', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Byur!', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Ssshh!', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Boni memegang benda bundar untuk ditendang. Benda itu adalah ....',
                            'explanation' => 'Benda bundar yang ditendang saat bermain sepak bola adalah bola.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Batu', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Bola', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Buku', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Indra tubuh yang kita gunakan untuk mendengarkan aneka bunyi adalah ....',
                            'explanation' => 'Telinga adalah alat indra pendengar.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Mata', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Hidung', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Telinga', 'is_correct' => true],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian II: Pilihan Ganda Kompleks',
                    'instructions' => 'Pilihlah semua jawaban yang benar (bisa lebih dari satu).',
                    'order' => 2,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah bunyi di bawah ini yang termasuk bunyi keras? (Pilih dua)',
                            'explanation' => 'Petir dan sirene ambulans menghasilkan suara keras, sedangkan dengkuran kucing bersuara lembut.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Suara halilintar menggelegar', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Suara sirene ambulans', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Suara desau angin sepoi-sepoi', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali oleh suku kata "bi"? (Pilih dua)',
                            'explanation' => 'Bintang (bin-tang) dan bibir (bi-bir) diawali suku kata bi, sedangkan bebek diawali be.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Bintang', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Bibir', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Bebek', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Sikap yang baik saat guru sedang menjelaskan materi pelajaran di kelas adalah .... (Pilih dua)',
                            'explanation' => 'Menyimak dengan tenang dan mendengarkan penjelasan adalah sikap terpuji. Berteriak mengganggu teman.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Mendengarkan dengan tenang', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Menyimak penjelasan bapak/ibu guru', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Berteriak-teriak sendiri', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah kata yang terdiri atas dua suku kata!',
                            'explanation' => 'Bo-la (2 suku kata) dan bu-ku (2 suku kata). Se-pe-da memiliki 3 suku kata.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Bola', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Buku', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Sepeda', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah tiruan bunyi saat benda jatuh ke dalam air? (Pilih dua)',
                            'explanation' => 'Byur! dan kecipak! adalah bunyi air, sedangkan kring-kring adalah bel.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Byur!', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kecipak!', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kring-kring!', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah hewan dengan tiruan suaranya yang tepat.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan hewan ternak dengan bunyi suaranya!',
                            'explanation' => 'Sapi bersuara mooo, kambing mbeeek, ayam berkokok kukuruyuk, burung cuit-cuit, katak teot-teblung.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Sapi', 'match_key' => 'Mooo', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Kambing', 'match_key' => 'Mbeeek', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Ayam jago', 'match_key' => 'Kukuruyuk', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Burung pipit', 'match_key' => 'Cuit-cuit', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Katak', 'match_key' => 'Teot-teblung', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan benda di rumah dengan bunyi khasnya!',
                            'explanation' => 'Jam dinding tik-tok, bel pintu ting-nong, sapu srok-srok, telepon dering kring-kring, air keran gemericik.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Jam dinding', 'match_key' => 'Tik-tok-tik-tok', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bel pintu rumah', 'match_key' => 'Ting-nong', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Sapu menyapu lantai', 'match_key' => 'Srok-srok', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Telepon berdering', 'match_key' => 'Kring-kring-kring', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Air keran mengucur', 'match_key' => 'Kricik-kricik', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suku kata dengan kata yang sesuai!',
                            'explanation' => 'bo -> botol, bi -> bis, bu -> buku, be -> beras, ba -> baju.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Bo', 'match_key' => 'Botol', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bi', 'match_key' => 'Bis', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Bu', 'match_key' => 'Buku', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Be', 'match_key' => 'Beras', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Ba', 'match_key' => 'Baju', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan anggota tubuh dengan aktivitas mendengarkan atau bersuara!',
                            'explanation' => 'Telinga mendengar, Mulut berucap, Tangan tepuk, Kaki hentak, Hidung bernapas.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Telinga', 'match_key' => 'Mendengarkan bunyi', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Mulut', 'match_key' => 'Berbicara dan bernyanyi', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Dua telapak tangan', 'match_key' => 'Bertepuk tangan (prok)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Kaki', 'match_key' => 'Menghentak lantai (dum)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Jari tangan', 'match_key' => 'Memetik senar gitar', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata dengan lawan bunyinya (Keras lawan Pelan)!',
                            'explanation' => 'Keras lawannya pelan/lembut.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Bunyi petir', 'match_key' => 'Sangat Keras', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Suara bisikan', 'match_key' => 'Sangat Lembut', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Sirene polisi', 'match_key' => 'Keras Menyeruak', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Kicau anak burung', 'match_key' => 'Lembut Menenangkan', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Dentuman drum', 'match_key' => 'Keras Berdentum', 'is_correct' => true, 'order' => 5],
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
            'title' => 'QUIZ 03 Bab 01 Bunyi Apa?',
            'type' => 'ph',
            'duration_minutes' => 20,
            'description' => 'Kuis Formatif 3 Bab 1: Pemantapan membaca suku kata ba-bi-bu-be-bo, membedakan tiruan bunyi di sekitar, dan melatih konsentrasi menyimak.',
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
                            'prompt' => 'Susunan huruf b - o - l - a dibaca menjadi ....',
                            'explanation' => 'b - o - l - a membentuk kata bola.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Bola', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Bolu', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Batu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Suara semut saat berjalan tidak dapat kita dengar karena bunyinya sangat ....',
                            'explanation' => 'Semut bertubuh kecil dan langkahnya sangat lembut sehingga tidak terdengar telinga kita.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Keras', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Lembut sekali', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Bising', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Alat musik tradisional yang dipukul dan menghasilkan bunyi "dung-dung" adalah ....',
                            'explanation' => 'Gendang dibunyikan dengan cara dipukul permukaannya.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Suling', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Gendang', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Biola', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Kata berikut yang diakhiri oleh huruf "u" adalah ....',
                            'explanation' => 'B-a-j-u berakhiran huruf u, sedangkan b-o-l-a berakhiran a.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Baju', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Bola', 'is_correct' => false],
                                ['label' => 'C', 'option_text' => 'Bata', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_single',
                            'points' => 1.0,
                            'prompt' => 'Tiruan bunyi saat kita mengetuk pintu kayu secara sopan adalah ....',
                            'explanation' => 'Mengetuk pintu bersuara tok-tok-tok.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Bum-bum-bum', 'is_correct' => false],
                                ['label' => 'B', 'option_text' => 'Tok-tok-tok', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Din-din-din', 'is_correct' => false],
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
                            'prompt' => 'Manakah kata-kata berikut yang memuat huruf vokal "a"? (Pilih dua)',
                            'explanation' => 'Bata (b-a-t-a) dan Kuda (k-u-d-a) mengandung huruf vokal a, sedangkan Ibu hanya mengandung i dan u.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Bata', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kuda', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Ibu', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah dua tiruan bunyi yang berasal dari kendaraan bermotor!',
                            'explanation' => 'Brum-brum (suara knalpot/mesin) dan tin-tin (klakson) dari kendaraan, kwek-kwek dari bebek.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Brum-brum (mesin motor)', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Tin-tin (klakson mobil)', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Kwek-kwek (suara bebek)', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Manakah kata yang mempunyai 3 suku kata? (Pilih dua)',
                            'explanation' => 'Bo-ne-ka (3 suku kata) dan ke-la-pa (3 suku kata). Bu-ku hanya 2 suku kata.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Boneka', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Kelapa', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Buku', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Pilihlah bunyi yang menandakan adanya bahaya atau keadaan darurat!',
                            'explanation' => 'Sirene pemadam kebakaran dan sirine ambulans memberi tahu adanya keadaan darurat, bunyi rebana untuk musik.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Sirene pemadam kebakaran', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Sirene mobil ambulans', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'Bunyi rebana saat pentas', 'is_correct' => false],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'mcq_multiple',
                            'points' => 1.0,
                            'prompt' => 'Kata mana saja yang diawali huruf "B" besar? (Pilih dua)',
                            'explanation' => 'Budi dan Bandung adalah nama orang dan tempat yang diawali huruf kapital B.',
                            'options' => [
                                ['label' => 'A', 'option_text' => 'Budi', 'is_correct' => true],
                                ['label' => 'B', 'option_text' => 'Bandung', 'is_correct' => true],
                                ['label' => 'C', 'option_text' => 'ayam', 'is_correct' => false],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Bagian III: Menjodohkan',
                    'instructions' => 'Pasangkanlah kata di sebelah kiri dengan suku kata awalnya di sebelah kanan.',
                    'order' => 3,
                    'questions' => [
                        [
                            'order' => 1,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan kata benda berikut dengan suku kata pertamanya!',
                            'explanation' => 'balon -> ba, bintang -> bi, bunga -> bu, bendera -> be, botol -> bo.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Balon', 'match_key' => 'ba', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bintang', 'match_key' => 'bi', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Bunga', 'match_key' => 'bu', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Bendera', 'match_key' => 'be', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Botol', 'match_key' => 'bo', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 2,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan suara berikut dengan suasana waktu yang tepat!',
                            'explanation' => 'Ayam jantan berkokok di pagi hari, burung hantu di malam hari, lonceng sekolah saat bel masuk.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ayam berkokok bersahutan', 'match_key' => 'Pagi hari yang cerah', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Lonceng sekolah berdering', 'match_key' => 'Waktu masuk kelas', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Suara jangkrik mengerik', 'match_key' => 'Malam hari yang sunyi', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Gemuruh petir berdentum', 'match_key' => 'Saat hujan lebat', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Sorak gembira penonton', 'match_key' => 'Pertandingan sepak bola', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 3,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan gambar/nama benda dengan cara memainkannya agar berbunyi!',
                            'explanation' => 'Peluit ditiup, drum dipukul, gitar dipetik, bel ditekan, rebana ditepuk.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Peluit', 'match_key' => 'Ditiup', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Gitar', 'match_key' => 'Dipetik senarnya', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Gendang', 'match_key' => 'Dipukul kulitnya', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Bel rumah listrik', 'match_key' => 'Ditekan tombolnya', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Pianika', 'match_key' => 'Ditiup sambil ditekan tutsnya', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 4,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan hewan dengan habitat atau tempat tinggalnya!',
                            'explanation' => 'Ikan di air, Burung di udara/pohon, Cacing di tanah, Monyet di dahan, Kuda di padang rumput.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ikan mas', 'match_key' => 'Di dalam kolam air', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Burung gereja', 'match_key' => 'Di sarang atas pohon', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Bebek', 'match_key' => 'Berenang di rawa/kolam', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Sapi', 'match_key' => 'Di dalam kandang rumput', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Cacing tanah', 'match_key' => 'Di dalam tanah yang gembur', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                        [
                            'order' => 5,
                            'type' => 'matching',
                            'points' => 1.0,
                            'prompt' => 'Pasangkan potongan suku kata menjadi kata yang utuh!',
                            'explanation' => 'ba-ca, bu-ku, bi-ru, bo-la, be-cak.',
                            'options' => [
                                ['label' => '1', 'option_text' => 'Ba - ...', 'match_key' => 'ca (Baca)', 'is_correct' => true, 'order' => 1],
                                ['label' => '2', 'option_text' => 'Bu - ...', 'match_key' => 'ku (Buku)', 'is_correct' => true, 'order' => 2],
                                ['label' => '3', 'option_text' => 'Bi - ...', 'match_key' => 'ru (Biru)', 'is_correct' => true, 'order' => 3],
                                ['label' => '4', 'option_text' => 'Bo - ...', 'match_key' => 'la (Bola)', 'is_correct' => true, 'order' => 4],
                                ['label' => '5', 'option_text' => 'Be - ...', 'match_key' => 'cak (Becak)', 'is_correct' => true, 'order' => 5],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
