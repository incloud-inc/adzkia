<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1ASASSemester1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASAS Semester 1 (Unit 1 dan 2) #1',
                'type' => 'asas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Paket #1 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Komprehensif Unit 1 (How Are You?) dan Unit 2 (My Numbers & Colors).',
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
                                'prompt' => '[Keterangan Gambar: Anak menyapa teman di pagi hari]
Greeting at 07:00 AM is "Good ...."',
                                'explanation' => 'Sapaan pagi hari adalah Good morning.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'morning', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'night', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Made: "How are you, Joshua?"
Joshua: "I am ..., thank you."',
                                'explanation' => 'Kabar baik diungkapkan dengan "fine".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum gembira]
He is ....',
                                'explanation' => 'Tersenyum gembira adalah happy.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'angry', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When you go to bed at night, you say "Good ...."',
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
                                'prompt' => '[Keterangan Gambar: Dua anak berkenalan]
"What is your name?"
"My name is ...."',
                                'explanation' => 'Jawaban nama adalah Budi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Duck', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Ten', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Before going home from school, we say ....',
                                'explanation' => 'Saat pamitan pulang kita mengucapkan Goodbye.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Goodbye', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Hello', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good morning', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tiga buah bola berwarna merah]
There are ... balls.',
                                'explanation' => 'Tiga bola adalah three balls.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'three', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'two', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'four', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang kuning matang]
What color is the banana?',
                                'explanation' => 'Pisang matang berwarna yellow.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'yellow', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'black', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima buah apel hijau]
How many apples? There are ....',
                                'explanation' => 'Ada lima apel (five apples).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Langit luas berwarna biru cerah]
The sky is ....',
                                'explanation' => 'Langit cerah berwarna blue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'blue', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'red', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'yellow', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Delapan buah pensil rapi]
Number 8 in English is ....',
                                'explanation' => 'Angka 8 adalah eight.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eight', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'seven', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'nine', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kucing lucu]
The word "Cat" begins with letter ....',
                                'explanation' => 'Cat diawali huruf C.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'C', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepatu hitam]
The shoes are ....',
                                'explanation' => 'Sepatu berwarna black.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'black', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'white', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pink', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '1 + 1 = .... (In English)',
                                'explanation' => '1 + 1 = 2 (two).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'two', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Someone gives you a gift. You say ....',
                                'explanation' => 'Diberi hadiah mengucapkan Thank you.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good night', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct words or numbers!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'In the morning, we say Good ....',
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
                                'prompt' => '"What is your name?" "My ... is Joshua."',
                                'explanation' => 'Jawaban: name.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Tomat merah]
The color of a tomato is ....',
                                'explanation' => 'Jawaban: red.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Count: one, two, .... (Tuliskan angka setelah two dalam bahasa Inggris)',
                                'explanation' => 'Jawaban: three.',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lima bintang kuning]
There are ... stars.',
                                'explanation' => 'Jawaban: five.',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The color of milk is ....',
                                'explanation' => 'Jawaban: white.',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Huruf A besar dan seekor semut]
The word "Ant" begins with letter ....',
                                'explanation' => 'Jawaban: A.',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'When someone says "Thank you", you answer "You are ...."',
                                'explanation' => 'Jawaban: welcome.',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Number 10 in English is ....',
                                'explanation' => 'Jawaban: ten.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak bersalaman di kelas]
Tuliskan percakapan pendek saat kamu menanyakan nama dan kabar teman barumu!',
                                'explanation' => 'Contoh: "Hello! What is your name?" dan "How are you?"',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah balon merah dan dua buah balon biru]
Tuliskan jumlah balon merah dan biru pada gambar dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Three red balloons and two blue balloons".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 4 nama warna dasar dalam bahasa Inggris beserta artinya dalam bahasa Indonesia!',
                                'explanation' => 'Contoh: Red (merah), Blue (biru), Yellow (kuning), Green (hijau).',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan apa yang kamu ucapkan saat hendak pamit pulang sekolah kepada gurumu!',
                                'explanation' => 'Jawaban: "Goodbye, Teacher" atau "See you tomorrow, Teacher".',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAS Semester 1 (Unit 1 dan 2) #2',
                'type' => 'asas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Paket #2 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Komprehensif Unit 1 (How Are You?) dan Unit 2 (My Numbers & Colors).',
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
                                'prompt' => '[Keterangan Gambar: Siang hari terik sepulang sekolah]
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
                                'prompt' => 'Made: "How are you, Joshua?"
Joshua: "I am ..., thank you."',
                                'explanation' => 'Kabar baik diungkapkan dengan "fine".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum gembira]
He is ....',
                                'explanation' => 'Tersenyum gembira adalah happy.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'angry', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When you go to bed at night, you say "Good ...."',
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
                                'prompt' => '[Keterangan Gambar: Dua anak berkenalan]
"What is your name?"
"My name is ...."',
                                'explanation' => 'Jawaban nama adalah Budi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Duck', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Ten', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Before going home from school, we say ....',
                                'explanation' => 'Saat pamitan pulang kita mengucapkan Goodbye.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Goodbye', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Hello', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good morning', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Empat mobil mainan warna biru]
There are ... cars.',
                                'explanation' => 'Empat mobil adalah four cars.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'four', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'five', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang kuning matang]
What color is the banana?',
                                'explanation' => 'Pisang matang berwarna yellow.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'yellow', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'black', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima buah apel hijau]
How many apples? There are ....',
                                'explanation' => 'Ada lima apel (five apples).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Langit luas berwarna biru cerah]
The sky is ....',
                                'explanation' => 'Langit cerah berwarna blue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'blue', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'red', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'yellow', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepuluh jari tangan]
Number 10 in English is ....',
                                'explanation' => 'Angka 10 adalah ten.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ten', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'six', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'eight', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kucing lucu]
The word "Cat" begins with letter ....',
                                'explanation' => 'Cat diawali huruf C.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'C', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepatu hitam]
The shoes are ....',
                                'explanation' => 'Sepatu berwarna black.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'black', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'white', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pink', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '1 + 1 = .... (In English)',
                                'explanation' => '1 + 1 = 2 (two).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'two', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Someone gives you a gift. You say ....',
                                'explanation' => 'Diberi hadiah mengucapkan Thank you.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good night', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct words or numbers!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'In the morning, we say Good ....',
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
                                'prompt' => '"What is your name?" "My ... is Joshua."',
                                'explanation' => 'Jawaban: name.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Tomat merah]
The color of a tomato is ....',
                                'explanation' => 'Jawaban: red.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Count: one, two, .... (Tuliskan angka setelah two dalam bahasa Inggris)',
                                'explanation' => 'Jawaban: three.',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lima bintang kuning]
There are ... stars.',
                                'explanation' => 'Jawaban: five.',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The color of milk is ....',
                                'explanation' => 'Jawaban: white.',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Huruf A besar dan seekor semut]
The word "Ant" begins with letter ....',
                                'explanation' => 'Jawaban: A.',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'When someone says "Thank you", you answer "You are ...."',
                                'explanation' => 'Jawaban: welcome.',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Number 10 in English is ....',
                                'explanation' => 'Jawaban: ten.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak bersalaman di kelas]
Tuliskan percakapan pendek saat kamu menanyakan nama dan kabar teman barumu!',
                                'explanation' => 'Contoh: "Hello! What is your name?" dan "How are you?"',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah balon merah dan dua buah balon biru]
Tuliskan jumlah balon merah dan biru pada gambar dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Three red balloons and two blue balloons".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 4 nama warna dasar dalam bahasa Inggris beserta artinya dalam bahasa Indonesia!',
                                'explanation' => 'Contoh: Red (merah), Blue (biru), Yellow (kuning), Green (hijau).',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan apa yang kamu ucapkan saat hendak pamit pulang sekolah kepada gurumu!',
                                'explanation' => 'Jawaban: "Goodbye, Teacher" atau "See you tomorrow, Teacher".',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAS Semester 1 (Unit 1 dan 2) #3',
                'type' => 'asas',
                'duration_minutes' => 90,
                'description' => 'Asesmen Sumatif Akhir Semester (ASAS) 1 Paket #3 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Komprehensif Unit 1 (How Are You?) dan Unit 2 (My Numbers & Colors).',
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
                                'prompt' => '[Keterangan Gambar: Anak menyapa teman di pagi hari]
Greeting at 07:00 AM is "Good ...."',
                                'explanation' => 'Sapaan pagi hari adalah Good morning.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'morning', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'night', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah: "Nice to meet you, Cici!"
Cici: "Nice to meet you, ...!"',
                                'explanation' => 'Nice to meet you, too!',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'too', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'to', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum gembira]
He is ....',
                                'explanation' => 'Tersenyum gembira adalah happy.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'angry', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When you go to bed at night, you say "Good ...."',
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
                                'prompt' => '[Keterangan Gambar: Dua anak berkenalan]
"What is your name?"
"My name is ...."',
                                'explanation' => 'Jawaban nama adalah Budi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Duck', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Ten', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Before going home from school, we say ....',
                                'explanation' => 'Saat pamitan pulang kita mengucapkan Goodbye.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Goodbye', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Hello', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good morning', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Enam balon warna kuning]
There are ... yellow balloons.',
                                'explanation' => 'Enam balon adalah six balloons.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'six', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'seven', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'five', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang kuning matang]
What color is the banana?',
                                'explanation' => 'Pisang matang berwarna yellow.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'yellow', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'blue', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'black', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Lima buah apel hijau]
How many apples? There are ....',
                                'explanation' => 'Ada lima apel (five apples).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'five', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Langit luas berwarna biru cerah]
The sky is ....',
                                'explanation' => 'Langit cerah berwarna blue.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'blue', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'red', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'yellow', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tujuh buah buku di rak]
Number 7 in English is ....',
                                'explanation' => 'Angka 7 adalah seven.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'seven', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'eight', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'nine', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kucing lucu]
The word "Cat" begins with letter ....',
                                'explanation' => 'Cat diawali huruf C.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'C', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepatu hitam]
The shoes are ....',
                                'explanation' => 'Sepatu berwarna black.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'black', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'white', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pink', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '1 + 1 = .... (In English)',
                                'explanation' => '1 + 1 = 2 (two).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'two', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'three', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'one', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Someone gives you a gift. You say ....',
                                'explanation' => 'Diberi hadiah mengucapkan Thank you.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good night', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct words or numbers!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'In the morning, we say Good ....',
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
                                'prompt' => '"What is your name?" "My ... is Joshua."',
                                'explanation' => 'Jawaban: name.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Tomat merah]
The color of a tomato is ....',
                                'explanation' => 'Jawaban: red.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Count: one, two, .... (Tuliskan angka setelah two dalam bahasa Inggris)',
                                'explanation' => 'Jawaban: three.',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Lima bintang kuning]
There are ... stars.',
                                'explanation' => 'Jawaban: five.',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The color of milk is ....',
                                'explanation' => 'Jawaban: white.',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Huruf A besar dan seekor semut]
The word "Ant" begins with letter ....',
                                'explanation' => 'Jawaban: A.',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'When someone says "Thank you", you answer "You are ...."',
                                'explanation' => 'Jawaban: welcome.',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Number 10 in English is ....',
                                'explanation' => 'Jawaban: ten.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak bersalaman di kelas]
Tuliskan percakapan pendek saat kamu menanyakan nama dan kabar teman barumu!',
                                'explanation' => 'Contoh: "Hello! What is your name?" dan "How are you?"',
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
                                'prompt' => '[Keterangan Gambar: Tiga buah balon merah dan dua buah balon biru]
Tuliskan jumlah balon merah dan biru pada gambar dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Three red balloons and two blue balloons".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 4 nama warna dasar dalam bahasa Inggris beserta artinya dalam bahasa Indonesia!',
                                'explanation' => 'Contoh: Red (merah), Blue (biru), Yellow (kuning), Green (hijau).',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan apa yang kamu ucapkan saat hendak pamit pulang sekolah kepada gurumu!',
                                'explanation' => 'Jawaban: "Goodbye, Teacher" atau "See you tomorrow, Teacher".',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
