<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1ASATData
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASAT (Unit 1 sampai 4) #1',
                'type' => 'asaj',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Tahun (ASAT) Paket #1 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Komprehensif Unit 1 (How Are You?), Unit 2 (My Numbers & Colors), Unit 3 (My Family and Friends), dan Unit 4 (My Classroom & Toys).',
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
                                'prompt' => '[Keterangan Gambar: Matahari terbit pagi hari]
Greeting in the morning is "Good ...."',
                                'explanation' => 'Sapaan pagi adalah Good morning.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'morning', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'afternoon', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah: "How are you?"
Cici: "I am ...."',
                                'explanation' => 'Kabar baik: I am fine.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'duck', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'table', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak berkenalan]
"What is your name?"
"My name is ...."',
                                'explanation' => 'Nama diri adalah Joshua.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Joshua', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Apple', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Blue', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Before sleeping at night, we say "Good ...."',
                                'explanation' => 'Sebelum tidur di malam hari adalah Good night.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'night', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tiga buah apel merah]
How many apples? There are ....',
                                'explanation' => 'Tiga apel adalah three apples.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'three', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'two', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'five', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tomat segar]
The tomato is color ....',
                                'explanation' => 'Tomat berwarna red.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'red', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'black', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima bintang kuning]
There are ... yellow stars.',
                                'explanation' => 'Lima bintang adalah five stars.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'four', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Langit cerah]
The sky is ....',
                                'explanation' => 'Langit berwarna blue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'blue', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'yellow', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'green', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Ayah tersenyum]
"This is my ...."',
                                'explanation' => 'Ayah adalah father.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'father', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'doll', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Ibu tersenyum hangat]
"She is my ...."',
                                'explanation' => 'Ibu adalah mother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kite', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua sahabat bergandengan]
"Made is my ...."',
                                'explanation' => 'Sahabat adalah friend.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'friend', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'chair', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'book', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have two ....',
                                'explanation' => 'Dua mata adalah two eyes.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eyes', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'noses', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mouths', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buku tulis terbuka]
"This is a ...."',
                                'explanation' => 'Buku adalah book.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'book', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ball', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'robot', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bola sepak bundar]
"I kick the ...."',
                                'explanation' => 'Bola adalah ball.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ball', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pencil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'eraser', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When teacher says "Sit down", students should ....',
                                'explanation' => 'Sit down artinya duduk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'duduk di kursi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berdiri tegak', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berlari keluar', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct answers!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Greeting in the morning is Good ....',
                                'explanation' => 'Jawaban: morning.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"How are you?" "I am ...."',
                                'explanation' => 'Jawaban: fine / happy.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Number 1 in English is ....',
                                'explanation' => 'Jawaban: one.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang kuning]
The banana is color ....',
                                'explanation' => 'Jawaban: yellow.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ayah]
Ayah in English is ....',
                                'explanation' => 'Jawaban: father / dad.',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ibu]
Ibu in English is ....',
                                'explanation' => 'Jawaban: mother / mom.',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have ... eyes.',
                                'explanation' => 'Jawaban: two.',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buku]
Buku in English is ....',
                                'explanation' => 'Jawaban: book.',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Bola]
Bola in English is ....',
                                'explanation' => 'Jawaban: ball.',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'When class starts, teacher says "Sit ...!"',
                                'explanation' => 'Jawaban: down.',
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
                                'prompt' => '[Keterangan Gambar: Anak menyapa teman di pagi hari]
Tuliskan kalimat sapaan saat bertemu teman di pagi hari dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Good morning" atau "Hello, good morning".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan angka 1 sampai 5 dalam bahasa Inggris secara berurutan!',
                                'explanation' => 'Jawaban: one, two, three, four, five.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Ayah, Ibu, dan seorang anak tersenyum]
Tuliskan sebutan bahasa Inggris untuk Ayah dan Ibu!',
                                'explanation' => 'Jawaban: Father (Ayah) dan Mother (Ibu).',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 3 nama benda peralatan sekolah yang ada di dalam tasmu dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Book, pencil, ruler, eraser, pencil case.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak memegang boneka dan mobil-mobilan]
Tuliskan nama 2 mainan kesukaanmu dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Ball, doll, toy car, robot, kite, yo-yo.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAT (Unit 1 sampai 4) #2',
                'type' => 'asaj',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Tahun (ASAT) Paket #2 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Komprehensif Unit 1 (How Are You?), Unit 2 (My Numbers & Colors), Unit 3 (My Family and Friends), dan Unit 4 (My Classroom & Toys).',
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
                                'prompt' => '[Keterangan Gambar: Waktu siang hari pulang sekolah]
Greeting in the afternoon is "Good ...."',
                                'explanation' => 'Sapaan siang hari adalah Good afternoon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'afternoon', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah: "How are you?"
Cici: "I am ...."',
                                'explanation' => 'Kabar baik: I am fine.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'duck', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'table', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak berkenalan]
"What is your name?"
"My name is ...."',
                                'explanation' => 'Nama diri adalah Joshua.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Joshua', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Apple', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Blue', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Before sleeping at night, we say "Good ...."',
                                'explanation' => 'Sebelum tidur di malam hari adalah Good night.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'night', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Empat pensil warna hijau]
There are ... pencils.',
                                'explanation' => 'Empat pensil adalah four pencils.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'four', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'two', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'three', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tomat segar]
The tomato is color ....',
                                'explanation' => 'Tomat berwarna red.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'red', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'black', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima bintang kuning]
There are ... yellow stars.',
                                'explanation' => 'Lima bintang adalah five stars.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'four', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Langit cerah]
The sky is ....',
                                'explanation' => 'Langit berwarna blue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'blue', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'yellow', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'green', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kakek berambut putih]
"He is my ...."',
                                'explanation' => 'Kakek adalah grandfather.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandfather', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'baby', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Ibu tersenyum hangat]
"She is my ...."',
                                'explanation' => 'Ibu adalah mother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kite', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua sahabat bergandengan]
"Made is my ...."',
                                'explanation' => 'Sahabat adalah friend.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'friend', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'chair', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'book', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have two ....',
                                'explanation' => 'Dua mata adalah two eyes.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eyes', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'noses', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mouths', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buku tulis terbuka]
"This is a ...."',
                                'explanation' => 'Buku adalah book.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'book', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ball', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'robot', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Layang-layang terbang]
"Look at the ...."',
                                'explanation' => 'Layang-layang adalah kite.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kite', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'chair', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When teacher says "Sit down", students should ....',
                                'explanation' => 'Sit down artinya duduk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'duduk di kursi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berdiri tegak', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berlari keluar', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct answers!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Greeting in the morning is Good ....',
                                'explanation' => 'Jawaban: morning.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"How are you?" "I am ...."',
                                'explanation' => 'Jawaban: fine / happy.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Number 1 in English is ....',
                                'explanation' => 'Jawaban: one.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang kuning]
The banana is color ....',
                                'explanation' => 'Jawaban: yellow.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ayah]
Ayah in English is ....',
                                'explanation' => 'Jawaban: father / dad.',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ibu]
Ibu in English is ....',
                                'explanation' => 'Jawaban: mother / mom.',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have ... eyes.',
                                'explanation' => 'Jawaban: two.',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buku]
Buku in English is ....',
                                'explanation' => 'Jawaban: book.',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Bola]
Bola in English is ....',
                                'explanation' => 'Jawaban: ball.',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'When class starts, teacher says "Sit ...!"',
                                'explanation' => 'Jawaban: down.',
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
                                'prompt' => '[Keterangan Gambar: Anak menyapa teman di pagi hari]
Tuliskan kalimat sapaan saat bertemu teman di pagi hari dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Good morning" atau "Hello, good morning".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan angka 1 sampai 5 dalam bahasa Inggris secara berurutan!',
                                'explanation' => 'Jawaban: one, two, three, four, five.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Ayah, Ibu, dan seorang anak tersenyum]
Tuliskan sebutan bahasa Inggris untuk Ayah dan Ibu!',
                                'explanation' => 'Jawaban: Father (Ayah) dan Mother (Ibu).',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 3 nama benda peralatan sekolah yang ada di dalam tasmu dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Book, pencil, ruler, eraser, pencil case.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak memegang boneka dan mobil-mobilan]
Tuliskan nama 2 mainan kesukaanmu dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Ball, doll, toy car, robot, kite, yo-yo.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAT (Unit 1 sampai 4) #3',
                'type' => 'asaj',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Tahun (ASAT) Paket #3 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Komprehensif Unit 1 (How Are You?), Unit 2 (My Numbers & Colors), Unit 3 (My Family and Friends), dan Unit 4 (My Classroom & Toys).',
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
                                'prompt' => '[Keterangan Gambar: Matahari terbit pagi hari]
Greeting in the morning is "Good ...."',
                                'explanation' => 'Sapaan pagi adalah Good morning.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'morning', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'afternoon', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When someone gives you a book, you say ....',
                                'explanation' => 'Mengucapkan terima kasih: Thank you.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good morning', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak berkenalan]
"What is your name?"
"My name is ...."',
                                'explanation' => 'Nama diri adalah Joshua.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Joshua', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Apple', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Blue', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Before sleeping at night, we say "Good ...."',
                                'explanation' => 'Sebelum tidur di malam hari adalah Good night.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'night', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Enam balon warna kuning]
There are ... balloons.',
                                'explanation' => 'Enam balon adalah six balloons.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'six', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'seven', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'five', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tomat segar]
The tomato is color ....',
                                'explanation' => 'Tomat berwarna red.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'red', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'black', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima bintang kuning]
There are ... yellow stars.',
                                'explanation' => 'Lima bintang adalah five stars.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'four', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Langit cerah]
The sky is ....',
                                'explanation' => 'Langit berwarna blue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'blue', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'yellow', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'green', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Nenek tersenyum ramah]
"She is my ...."',
                                'explanation' => 'Nenek adalah grandmother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandmother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'father', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'brother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Ibu tersenyum hangat]
"She is my ...."',
                                'explanation' => 'Ibu adalah mother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kite', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua sahabat bergandengan]
"Made is my ...."',
                                'explanation' => 'Sahabat adalah friend.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'friend', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'chair', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'book', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have two ....',
                                'explanation' => 'Dua mata adalah two eyes.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eyes', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'noses', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mouths', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buku tulis terbuka]
"This is a ...."',
                                'explanation' => 'Buku adalah book.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'book', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ball', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'robot', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Boneka cantik]
"Cici plays with a ...."',
                                'explanation' => 'Boneka adalah doll.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'doll', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'car', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'desk', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When teacher says "Sit down", students should ....',
                                'explanation' => 'Sit down artinya duduk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'duduk di kursi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'berdiri tegak', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'berlari keluar', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct answers!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Greeting in the morning is Good ....',
                                'explanation' => 'Jawaban: morning.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"How are you?" "I am ...."',
                                'explanation' => 'Jawaban: fine / happy.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Number 1 in English is ....',
                                'explanation' => 'Jawaban: one.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang kuning]
The banana is color ....',
                                'explanation' => 'Jawaban: yellow.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ayah]
Ayah in English is ....',
                                'explanation' => 'Jawaban: father / dad.',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ibu]
Ibu in English is ....',
                                'explanation' => 'Jawaban: mother / mom.',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have ... eyes.',
                                'explanation' => 'Jawaban: two.',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buku]
Buku in English is ....',
                                'explanation' => 'Jawaban: book.',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Bola]
Bola in English is ....',
                                'explanation' => 'Jawaban: ball.',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'When class starts, teacher says "Sit ...!"',
                                'explanation' => 'Jawaban: down.',
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
                                'prompt' => '[Keterangan Gambar: Anak menyapa teman di pagi hari]
Tuliskan kalimat sapaan saat bertemu teman di pagi hari dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Good morning" atau "Hello, good morning".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan angka 1 sampai 5 dalam bahasa Inggris secara berurutan!',
                                'explanation' => 'Jawaban: one, two, three, four, five.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Ayah, Ibu, dan seorang anak tersenyum]
Tuliskan sebutan bahasa Inggris untuk Ayah dan Ibu!',
                                'explanation' => 'Jawaban: Father (Ayah) dan Mother (Ibu).',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 3 nama benda peralatan sekolah yang ada di dalam tasmu dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Book, pencil, ruler, eraser, pencil case.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak memegang boneka dan mobil-mobilan]
Tuliskan nama 2 mainan kesukaanmu dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Ball, doll, toy car, robot, kite, yo-yo.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
