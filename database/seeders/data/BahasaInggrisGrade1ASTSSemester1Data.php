<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1ASTSSemester1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASTS Semester 1 (Unit 1) #1',
                'type' => 'asts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Paket #1 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka Unit 1: How Are You? (Greetings, introductions, basic phonics).',
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
                                'prompt' => '[Keterangan Gambar: Matahari terbit cerah, anak berseragam rapi]
What greeting do you say at 7:00 in the morning?',
                                'explanation' => 'Good morning diucapkan pada pagi hari.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Good morning', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good night', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Joshua: "Hello, Made!"
Made: "..., Joshua!"',
                                'explanation' => 'Hello dibalas dengan Hello.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hello', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah: "How are you today?"
Cici: "I am ..., thank you."',
                                'explanation' => 'Ungkapan kabar baik adalah "fine".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bye', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak laki-laki tersenyum menunjuk dada]
"What is your name?"
"My name ... Joshua."',
                                'explanation' => 'Bentuk to be untuk my name adalah is.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'is', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'are', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'am', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan di pintu gerbang sekolah]
When you leave school, you say ....',
                                'explanation' => 'Saat meninggalkan sekolah kita mengucapkan Goodbye.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Goodbye', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Hello', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah apel merah]
The English word for apel is ....',
                                'explanation' => 'Apel dalam bahasa Inggris adalah Apple.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Apple', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Banana', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Orange', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah bola sepak bundar]
"Ball" begins with the letter ....',
                                'explanation' => 'Ball diawali huruf B.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'B', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'C', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum dengan senyum lebar ceria]
The boy is feeling ....',
                                'explanation' => 'Tersenyum lebar menunjukkan rasa happy.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'angry', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bulan purnama bersinar di langit malam]
Greeting before sleeping is "Good ...."',
                                'explanation' => 'Sebelum tidur di malam hari mengucapkan Good night.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'night', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When someone gives you a candy, you say ....',
                                'explanation' => 'Menerima sesuatu mengucapkan Thank you.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'No', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct words!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Greeting in the morning is Good ....',
                                'explanation' => 'Lengkapnya adalah morning.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"How are you?" "I am ...."',
                                'explanation' => 'Jawaban: fine / happy / good.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"What is your name?" "My ... is Budi."',
                                'explanation' => 'Kata yang hilang adalah name.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Huruf A besar dan buah apel]
"Apple" starts with letter ....',
                                'explanation' => 'Diawali huruf A.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Before sleeping at night, we say Good ....',
                                'explanation' => 'Lengkapnya adalah night.',
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
                                'prompt' => '[Keterangan Gambar: Dua murid bertemu di halaman sekolah pagi hari]
Tuliskan kalimat sapaan yang diucapkan saat bertemu teman di pagi hari!',
                                'explanation' => 'Contoh jawaban: "Good morning" atau "Hello, good morning".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara kamu menanyakan nama teman baru dalam bahasa Inggris? Tuliskan kalimat tanyanya!',
                                'explanation' => 'Jawaban: "What is your name?"',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Jika temanmu menyapa: "How are you?", apa yang kamu jawab? Tuliskan kalimat lengkapnya!',
                                'explanation' => 'Jawaban: "I am fine, thank you" atau "I am good".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan saat pulang sekolah]
Tuliskan ucapan perpisahan (pamit) dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Goodbye" atau "Bye-bye, see you".',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata benda sederhana dalam bahasa Inggris yang diawali dengan huruf A dan B!',
                                'explanation' => 'Contoh: A = Apple / Ant, B = Ball / Book / Boy.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 1 (Unit 1) #2',
                'type' => 'asts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Paket #2 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka Unit 1: How Are You? (Greetings, introductions, basic phonics).',
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
                                'prompt' => '[Keterangan Gambar: Siang hari yang cerah jam 1 siang]
Greeting in the afternoon is ....',
                                'explanation' => 'Sapaan siang hari adalah Good afternoon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Good afternoon', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Joshua: "Hello, Made!"
Made: "..., Joshua!"',
                                'explanation' => 'Hello dibalas dengan Hello.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hello', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah: "How are you today?"
Cici: "I am ..., thank you."',
                                'explanation' => 'Ungkapan kabar baik adalah "fine".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bye', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"Hello, I am Made. What is your ...?"',
                                'explanation' => 'Menanyakan nama teman: What is your name?',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'name', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'fine', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan di pintu gerbang sekolah]
When you leave school, you say ....',
                                'explanation' => 'Saat meninggalkan sekolah kita mengucapkan Goodbye.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Goodbye', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Hello', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kucing kecil mengeong]
The word "Cat" begins with letter ....',
                                'explanation' => 'Cat diawali huruf C.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'C', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah bola sepak bundar]
"Ball" begins with the letter ....',
                                'explanation' => 'Ball diawali huruf B.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'B', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'C', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum dengan senyum lebar ceria]
The boy is feeling ....',
                                'explanation' => 'Tersenyum lebar menunjukkan rasa happy.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'angry', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bulan purnama bersinar di langit malam]
Greeting before sleeping is "Good ...."',
                                'explanation' => 'Sebelum tidur di malam hari mengucapkan Good night.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'night', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When someone gives you a candy, you say ....',
                                'explanation' => 'Menerima sesuatu mengucapkan Thank you.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'No', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct words!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Greeting in the morning is Good ....',
                                'explanation' => 'Lengkapnya adalah morning.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"How are you?" "I am ...."',
                                'explanation' => 'Jawaban: fine / happy / good.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"What is your name?" "My ... is Budi."',
                                'explanation' => 'Kata yang hilang adalah name.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Huruf A besar dan buah apel]
"Apple" starts with letter ....',
                                'explanation' => 'Diawali huruf A.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Before sleeping at night, we say Good ....',
                                'explanation' => 'Lengkapnya adalah night.',
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
                                'prompt' => '[Keterangan Gambar: Dua murid bertemu di halaman sekolah pagi hari]
Tuliskan kalimat sapaan yang diucapkan saat bertemu teman di pagi hari!',
                                'explanation' => 'Contoh jawaban: "Good morning" atau "Hello, good morning".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara kamu menanyakan nama teman baru dalam bahasa Inggris? Tuliskan kalimat tanyanya!',
                                'explanation' => 'Jawaban: "What is your name?"',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Jika temanmu menyapa: "How are you?", apa yang kamu jawab? Tuliskan kalimat lengkapnya!',
                                'explanation' => 'Jawaban: "I am fine, thank you" atau "I am good".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan saat pulang sekolah]
Tuliskan ucapan perpisahan (pamit) dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Goodbye" atau "Bye-bye, see you".',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata benda sederhana dalam bahasa Inggris yang diawali dengan huruf A dan B!',
                                'explanation' => 'Contoh: A = Apple / Ant, B = Ball / Book / Boy.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 1 (Unit 1) #3',
                'type' => 'asts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 1 Paket #3 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka Unit 1: How Are You? (Greetings, introductions, basic phonics).',
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
                                'prompt' => '"Good morning, Mom!"
Mom answers: "Good ..., dear!"',
                                'explanation' => 'Good morning dibalas dengan Good morning.',
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
                                'prompt' => 'Joshua: "Hello, Made!"
Made: "..., Joshua!"',
                                'explanation' => 'Hello dibalas dengan Hello.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hello', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah: "How are you today?"
Cici: "I am ..., thank you."',
                                'explanation' => 'Ungkapan kabar baik adalah "fine".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bye', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Cici: "Nice to meet you!"
Made: "Nice to meet you, ...!"',
                                'explanation' => 'Nice to meet you, too!',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'too', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'to', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan di pintu gerbang sekolah]
When you leave school, you say ....',
                                'explanation' => 'Saat meninggalkan sekolah kita mengucapkan Goodbye.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Goodbye', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Hello', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor anjing ramah]
The word "Dog" begins with letter ....',
                                'explanation' => 'Dog diawali huruf D.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'D', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'P', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah bola sepak bundar]
"Ball" begins with the letter ....',
                                'explanation' => 'Ball diawali huruf B.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'B', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'C', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum dengan senyum lebar ceria]
The boy is feeling ....',
                                'explanation' => 'Tersenyum lebar menunjukkan rasa happy.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'angry', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bulan purnama bersinar di langit malam]
Greeting before sleeping is "Good ...."',
                                'explanation' => 'Sebelum tidur di malam hari mengucapkan Good night.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'night', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When someone gives you a candy, you say ....',
                                'explanation' => 'Menerima sesuatu mengucapkan Thank you.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'No', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct words!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Greeting in the morning is Good ....',
                                'explanation' => 'Lengkapnya adalah morning.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"How are you?" "I am ...."',
                                'explanation' => 'Jawaban: fine / happy / good.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"What is your name?" "My ... is Budi."',
                                'explanation' => 'Kata yang hilang adalah name.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Huruf A besar dan buah apel]
"Apple" starts with letter ....',
                                'explanation' => 'Diawali huruf A.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Before sleeping at night, we say Good ....',
                                'explanation' => 'Lengkapnya adalah night.',
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
                                'prompt' => '[Keterangan Gambar: Dua murid bertemu di halaman sekolah pagi hari]
Tuliskan kalimat sapaan yang diucapkan saat bertemu teman di pagi hari!',
                                'explanation' => 'Contoh jawaban: "Good morning" atau "Hello, good morning".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara kamu menanyakan nama teman baru dalam bahasa Inggris? Tuliskan kalimat tanyanya!',
                                'explanation' => 'Jawaban: "What is your name?"',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Jika temanmu menyapa: "How are you?", apa yang kamu jawab? Tuliskan kalimat lengkapnya!',
                                'explanation' => 'Jawaban: "I am fine, thank you" atau "I am good".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan saat pulang sekolah]
Tuliskan ucapan perpisahan (pamit) dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Goodbye" atau "Bye-bye, see you".',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata benda sederhana dalam bahasa Inggris yang diawali dengan huruf A dan B!',
                                'explanation' => 'Contoh: A = Apple / Ant, B = Ball / Book / Boy.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
