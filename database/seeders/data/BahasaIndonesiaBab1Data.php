<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 1: Bunyi Apa?',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 1 Bahasa Indonesia Kelas 1 SD: Mengenali bunyi benda, tiruan bunyi hewan di sekitar, dan suku kata berawalan huruf b.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang benar (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor bebek berenang di kolam]
Suara hewan pada gambar terdengar ....',
                                'explanation' => 'Suara bebek adalah kwek-kwek.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kwek-kwek', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'meong-meong', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'moo-moo', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tiruan bunyi bel sepeda yang dibunyikan anak adalah ....',
                                'explanation' => 'Bel sepeda berbunyi kring-kring.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tin-tin', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'kring-kring', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'prok-prok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah bola sepak bundar]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Benda bola diawali dengan huruf b.',
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
                                'prompt' => 'Suku kata awal dari kata "buku" adalah ....',
                                'explanation' => 'Kata buku terdiri dari suku kata bu-ku, suku kata awalnya adalah bu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bu', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'bo', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh bunyi yang termasuk bunyi alam adalah suara ....',
                                'explanation' => 'Suara petir dan hujan adalah bunyi alam karena tidak dibuat oleh mesin atau manusia.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'klakson mobil', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'hujan deras', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'gitar dipetik', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "ba" adalah ....',
                                'explanation' => 'Baju diawali suku kata ba-ju.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baju', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bola', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bisa', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Jam dinding berdetak di kamar]
Bunyi jarum jam dinding terdengar ....',
                                'explanation' => 'Jarum jam berbunyi tik-tok tik-tok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tik-tok tik-tok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'dor-dor', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ngiung-ngiung', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Huruf vokal pada kata "batu" adalah ....',
                                'explanation' => 'Huruf vokal pada kata batu adalah a dan u.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'b dan t', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'a dan u', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'b dan u', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bunyi tepuk tangan terdengar ....',
                                'explanation' => 'Tepuk tangan berbunyi prok-prok-prok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'byur-byur', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'prok-prok', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'krik-krik', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bunyi yang terdengar sangat pelan adalah bunyi ....',
                                'explanation' => 'Bisikan suara teman terdengar pelan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'petir menggelegar', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bisikan teman', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'klakson truk', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Seekor kucing manis]
Suara tiruan hewan pada gambar di atas adalah ....',
                                'explanation' => 'Suara kucing adalah meong.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'meong', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "bobi" terdiri dari suku kata bo dan ....',
                                'explanation' => 'Kata bobi dipenggal menjadi bo-bi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'bi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bunyi ketukan pintu rumah berbunyi ....',
                                'explanation' => 'Ketukan pintu berbunyi tok-tok-tok.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'tok-tok', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 kata benda yang diawali dengan suku kata "bo"!',
                                'explanation' => 'Contoh jawaban yang benar: bola, botol, bolu.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 contoh bunyi buatan yang ada di sekitarmu!',
                                'explanation' => 'Contoh jawaban yang benar: bel sepeda, klakson mobil, tepuk tangan, tiupan peluit.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 1: Bunyi Apa?',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 1 Bahasa Indonesia Kelas 1 SD: Membedakan bunyi keras dan pelan, suku kata bi dan bu, serta bunyi hewan peliharaan.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang benar (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor sapi sedang makan rumput]
Suara tiruan sapi pada gambar adalah ....',
                                'explanation' => 'Suara sapi adalah moo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kukuruyuk', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'moo-moo', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'cit-cit', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bunyi yang terdengar keras dan mengejutkan adalah ....',
                                'explanation' => 'Balon meletus menghasilkan suara keras dor!',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'balon meletus', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'suara hembusan angin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'detak jam tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "biru" adalah ....',
                                'explanation' => 'Kata biru diawali dengan suku kata bi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bi', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'be', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak meniup peluit wasit]
Alat pada gambar berbunyi ....',
                                'explanation' => 'Peluit ditiup berbunyi priiiit.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'priiiit', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'dor', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kring', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "bu" adalah ....',
                                'explanation' => 'Bulan diawali dengan bu-lan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bunga', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bebek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bata', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tiruan bunyi tetesan air kran yang jatuh ke ember adalah ....',
                                'explanation' => 'Tetesan air berbunyi tik-tik-tik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tik-tik-tik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tin-tin', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'prok-prok', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hewan yang berbunyi "kukuruyuk" di pagi hari adalah ....',
                                'explanation' => 'Ayam jago berkokok kukuruyuk di pagi hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ayam jago', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'burung hantu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kambing', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Huruf b kecil ditulis dengan lambang ....',
                                'explanation' => 'Lambang huruf b kecil memiliki garis tegak dengan perut di kanan bawah.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'b', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'd', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'p', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Gitar menghasilkan bunyi ketika ....',
                                'explanation' => 'Senar gitar menghasilkan bunyi saat dipetik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ditiup', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'dipetik', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'dipukul', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Petir menyambar di langit mendung]
Bunyi pada gambar di atas adalah bunyi ....',
                                'explanation' => 'Petir adalah fenomena alam, jadi suaranya adalah bunyi alam.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'buatan', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'alam', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'hewan', 'is_correct' => false],
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
                                'prompt' => 'Tiruan bunyi kambing yang lapar adalah ....',
                                'explanation' => 'Kambing bersuara mbeee.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'mbeee', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "bebek" diawali suku kata ....',
                                'explanation' => 'Kata bebek diawali suku kata be.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'be', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kendaraan kereta api berjalan di rel dengan bunyi ....',
                                'explanation' => 'Kereta api berbunyi tut-tut-tut atau gujes-gujes.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'tut-tut', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan 2 kata yang memiliki suku kata awal "bi"!',
                                'explanation' => 'Contoh jawaban yang benar: biru, bibir, bisa, bintang.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 2 macam hewan dan bunyi suaranya masing-masing!',
                                'explanation' => 'Contoh jawaban: Kucing suaranya meong, anjing suaranya guk-guk, bebek suaranya kwek-kwek.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 1: Bunyi Apa?',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 1 Bahasa Indonesia Kelas 1 SD: Latihan suku kata b, merangkai bunyi vokal, dan membedakan sumber bunyi lingkungan.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang benar (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Huruf b jika digabung dengan huruf i dibaca ....',
                                'explanation' => 'Huruf b dan i dirangkai menjadi suku kata bi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ba', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bi', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'bu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bedug masjid dipukul]
Bunyi alat musik tradisional pada gambar berbunyi ....',
                                'explanation' => 'Bedug berbunyi dung-dung-dung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'dung-dung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'tring-tring', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pipp-pipp', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata "b-o-t-o-l" jika dieja suku katanya menjadi ....',
                                'explanation' => 'Botol dipenggal menjadi bo-tol.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bo-tol', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bot-ol', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'b-otol', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hewan katak di tepi kolam berbunyi ....',
                                'explanation' => 'Katak bersuara krok-krok atau teot-teblung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'krok-krok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'cicit-cuit', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kuek-kuek', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Budi sedang membaca buku cerita]
Budi membaca buku dengan suara yang ....',
                                'explanation' => 'Membaca yang baik dilakukan dengan suara tenang dan jelas.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berteriak', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'jelas', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'ribut', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Benda yang berbunyi ketika dipukul adalah ....',
                                'explanation' => 'Gendang dibunyikan dengan cara dipukul.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'seruling', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'gendang', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'harmonika', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata akhir dari kata "labu" adalah ....',
                                'explanation' => 'Kata la-bu suku kata akhirnya adalah bu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'la', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'bu', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'ba', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tiruan bunyi lonceng sekolah masuk kelas berbunyi ....',
                                'explanation' => 'Lonceng besi berbunyi teng-teng-teng.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'teng-teng-teng', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brem-brem', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'dor-dor', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Di bawah ini yang merupakan huruf vokal adalah ....',
                                'explanation' => 'Huruf vokal bahasa Indonesia adalah a, i, u, e, o.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'B', 'option_text' => 'a', 'is_correct' => true],
                                    ['label' => 'C', 'option_text' => 'm', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bunyi langkah kaki saat berjalan pelan terdengar ....',
                                'explanation' => 'Langkah kaki berbunyi tap-tap-tap.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tap-tap-tap', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'din-din', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'prang', 'is_correct' => false],
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
                                'prompt' => 'Suku kata "ba" jika ditambah "tu" membentuk kata ....',
                                'explanation' => 'ba + tu = batu.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'batu', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Burung kecil bernyanyi di dahan]
Suara burung berkicau terdengar ....',
                                'explanation' => 'Burung berkicau cuit-cuit.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'cuit-cuit', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bunyi balon yang ditiup terlalu besar lalu pecah adalah ....',
                                'explanation' => 'Balon meletus berbunyi dor.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'dor', 'is_correct' => true],
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
                                'prompt' => 'Tuliskan huruf vokal lengkap dari a sampai o!',
                                'explanation' => 'Jawaban: a, i, u, e, o.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "ba"!',
                                'explanation' => 'Contoh jawaban yang benar: baju, batu, balon, bayi.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
