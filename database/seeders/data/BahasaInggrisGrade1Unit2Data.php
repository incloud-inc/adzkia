<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1Unit2Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Unit 2: My Numbers & Colors',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Unit 2 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Mengenal angka 1-5 (one to five) dan warna-warna dasar (red, blue, yellow, green).',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Choose the correct answer (A, B, or C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Angka 1 besar dan satu buah apel merah]
Number 1 in English is ....',
                                'explanation' => 'Angka 1 dalam bahasa Inggris adalah one.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'one', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'two', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'three', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua buah bola berwarna biru]
How many balls are there?',
                                'explanation' => 'Ada dua bola (two balls).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'two', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'one', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'four', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tiga buah bintang kuning bersinar]
There are ... stars.',
                                'explanation' => 'Tiga bintang adalah three stars.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'three', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'five', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah tomat berwarna merah segar]
What color is the tomato?',
                                'explanation' => 'Tomat berwarna merah (red).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'red', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'green', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Langit cerah berwarna biru]
The color of the sky is ....',
                                'explanation' => 'Warna langit cerah adalah biru (blue).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'blue', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'yellow', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'black', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Empat buah pensil berwarna hijau rapi]
How many pencils? There are ....',
                                'explanation' => 'Empat pensil adalah four pencils.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'four', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'five', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang matang berwarna kuning]
The banana is ....',
                                'explanation' => 'Pisang matang berwarna kuning (yellow).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'yellow', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'green', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'blue', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Daun pohon berwarna hijau segar]
The leaf is ....',
                                'explanation' => 'Daun berwarna hijau (green).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'green', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'red', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'yellow', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima buah jari tangan terbuka]
Show your hand. There are ... fingers.',
                                'explanation' => 'Ada lima jari (five fingers).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'four', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Count: 1, 2, 3, .... The next number is ....',
                                'explanation' => 'Setelah angka 3 adalah 4 (four).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'four', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'five', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct number or color!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Tiga buah buku di atas meja]
How many books? There are ... books.',
                                'explanation' => 'Jawaban: three.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The color of an apple is ....',
                                'explanation' => 'Jawaban: red / green.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Number 5 in English is ....',
                                'explanation' => 'Jawaban: five.',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Answer the questions clearly and politely!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Dua buah balon berwarna kuning]
Berapa jumlah balon pada gambar dan apa warnanya? Tuliskan dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Two yellow balloons" atau "There are two balloons, yellow".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan angka 1 sampai 5 dalam bahasa Inggris secara urut!',
                                'explanation' => 'Jawaban: one, two, three, four, five.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Unit 2: My Numbers & Colors',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Unit 2 Bahasa Inggris Kelas 1 SD: Mengenal angka 6-10 (six to ten) dan warna tambahan (black, white, purple, orange).',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Choose the correct answer (A, B, or C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Enam buah permen manis berjejer]
There are ... candies.',
                                'explanation' => 'Enam adalah six.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'six', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'seven', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'eight', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tujuh buah bunga mekar di taman]
How many flowers? There are ....',
                                'explanation' => 'Tujuh bunga adalah seven flowers.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'seven', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'six', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'nine', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Delapan buah kelereng bulat]
There are ... marbles.',
                                'explanation' => 'Delapan adalah eight.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eight', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ten', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'five', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sembilan buah donat lezat]
How many donuts are there?',
                                'explanation' => 'Sembilan donat adalah nine donuts.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'nine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'eight', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ten', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepuluh jari tangan anak terbuka]
I have ... fingers on my hands.',
                                'explanation' => 'Sepuluh jari tangan adalah ten fingers.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ten', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'nine', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'six', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepatu sekolah berwarna hitam pekat]
The shoes are ....',
                                'explanation' => 'Sepatu berwarna hitam (black).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'black', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'white', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'red', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Gelas susu segar berwarna putih]
Milk is ....',
                                'explanation' => 'Susu berwarna putih (white).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'white', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'black', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'blue', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buah jeruk segar berwarna jingga]
The color of an orange fruit is ....',
                                'explanation' => 'Warna buah jeruk adalah orange.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'orange', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'yellow', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'purple', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buah anggur berwarna ungu]
The grapes are ....',
                                'explanation' => 'Anggur ungu adalah purple.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'purple', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pink', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'green', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Number 10 in English is ....',
                                'explanation' => 'Angka 10 adalah ten.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ten', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'two', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'three', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct word!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Count: 5, 6, 7, .... The next number is ....',
                                'explanation' => 'Jawaban: 8 (eight).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buah jeruk]
An orange is color ....',
                                'explanation' => 'Jawaban: orange.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The color of clean teeth and milk is ....',
                                'explanation' => 'Jawaban: white.',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Answer the questions clearly and politely!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Enam pensil warna hitam]
Tuliskan jumlah dan warna pensil pada gambar dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Six black pencils".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan nama angka 6 sampai 10 dalam bahasa Inggris secara berurutan!',
                                'explanation' => 'Jawaban: six, seven, eight, nine, ten.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Unit 2: My Numbers & Colors',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Unit 2 Bahasa Inggris Kelas 1 SD: Menghitung objek benda, perpaduan angka dan warna (Number + Color + Noun), serta fonik huruf G-H-I.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Choose the correct answer (A, B, or C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tiga buah tas berwarna merah]
Look at the picture. There are ....',
                                'explanation' => 'Tiga tas merah adalah three red bags.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'three red bags', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'two blue bags', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'four yellow bags', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima buah buku berwarna biru]
There are ... blue books.',
                                'explanation' => 'Lima buku biru adalah five blue books.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor jerapah leher panjang (Giraffe)]
The word "Giraffe" begins with letter ....',
                                'explanation' => 'Giraffe diawali huruf G.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'G', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'J', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'H', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah topi koboi lucu (Hat)]
The word "Hat" begins with letter ....',
                                'explanation' => 'Hat diawali huruf H.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'H', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'A', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'F', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Es krim lezat di dalam cone]
"Ice cream" begins with letter ....',
                                'explanation' => 'Ice cream diawali huruf I.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'I', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'E', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'A', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bunga mawar berwarna merah muda (pink)]
The flower is ....',
                                'explanation' => 'Merah muda dalam bahasa Inggris adalah pink.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pink', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'green', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Empat buah kursi kayu]
"How many chairs?"
"There are ... chairs."',
                                'explanation' => 'Empat kursi adalah four chairs.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'four', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'six', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'seven', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What color is chocolate?
(Cokelat biasanya berwarna apa?)',
                                'explanation' => 'Cokelat berwarna brown (cokelat).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'brown', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'white', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'blue', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tujuh balon aneka warna]
Joshua has seven balloons.
Number seven is ....',
                                'explanation' => 'Seven adalah angka 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"Two yellow ducks" means ....',
                                'explanation' => 'Artinya dua ekor bebek kuning.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dua bebek kuning', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Tiga ayam merah', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Satu angsa putih', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct answer!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Satu boneka beruang warna cokelat]
One ... bear.',
                                'explanation' => 'Jawaban: brown.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '3 + 2 = .... (In English word)',
                                'explanation' => 'Jawaban: five.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The word "Hat" starts with letter ....',
                                'explanation' => 'Jawaban: H.',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Answer the questions clearly and politely!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Empat buah apel berwarna hijau]
Tuliskan kalimat bahasa Inggris yang menyatakan ada 4 apel hijau!',
                                'explanation' => 'Jawaban: "Four green apples" atau "There are four green apples".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 3 nama warna dasar yang kamu sukai dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Red, blue, yellow, green, pink, purple.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
