<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1Unit1Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Unit 1: How Are You?',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Unit 1 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Sapaan dasar (Greetings), ungkapan menanyakan kabar, dan perkenalan nama diri.',
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
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan dengan riang saat bertemu teman]
Made says: "Hello, Joshua!"
Joshua answers: "..., Made!"',
                                'explanation' => 'Jawaban yang tepat untuk membalas sapaan Hello adalah Hello atau Hi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hello', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good night', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Goodbye', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Matahari terbit di pagi hari, anak berangkat ke sekolah]
Greeting for the morning is ....',
                                'explanation' => 'Sapaan di pagi hari dalam bahasa Inggris adalah Good morning.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Good morning', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good night', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Good afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah: "How are you?"
Cici: "I am ...."',
                                'explanation' => 'Jawaban sopan saat ditanya kabar baik adalah "I am fine" (Saya baik-baik saja).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'fine', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'name', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'you', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seorang anak laki-laki tersenyum menunjuk dirinya sendiri]
"What is your name?"
"My name is ...."',
                                'explanation' => 'Pertanyaan "What is your name?" menanyakan nama diri.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Morning', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan saat hendak pulang sekolah]
Before going home, we say ....',
                                'explanation' => 'Saat berpamitan pulang, kita mengucapkan "Goodbye".',
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
                                'prompt' => 'Teacher: "Good morning, students!"
Students: "Good morning, ...."',
                                'explanation' => 'Murid menjawab sapaan guru dengan menyebut "Teacher".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Teacher', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Night', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Bye', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Huruf kapital A dan sebuah apel merah]
The first letter of "Apple" is ....',
                                'explanation' => 'Kata Apple diawali dengan huruf A.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'A', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'C', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum dengan wajah ceria gembira]
"I am ...."',
                                'explanation' => 'Gambar wajah tersenyum bahagia menunjukkan rasa senang (happy).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sleepy', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Joshua: "Hi, Cici!"
Cici: "..., Joshua!"',
                                'explanation' => 'Sapaan Hi dibalas dengan Hi atau Hello.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'No', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Huruf B besar dan bola sepak]
The word "Ball" begins with the letter ....',
                                'explanation' => 'Kata Ball diawali dengan huruf B.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'B', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'D', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'P', 'is_correct' => false],
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
                                'prompt' => 'Greeting in the morning is Good ....',
                                'explanation' => 'Lengkapnya adalah Good morning.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Anak tersenyum riang]
"How are you?"
"I am ...."',
                                'explanation' => 'Jawaban yang tepat adalah fine / happy.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"What is your name?"
"My ... is Made."',
                                'explanation' => 'Kata yang hilang adalah name.',
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
                                'prompt' => '[Keterangan Gambar: Dua orang anak saling menyapa di depan kelas]
Tuliskan kalimat sapaan yang kamu ucapkan saat bertemu teman di pagi hari!',
                                'explanation' => 'Contoh jawaban yang benar: "Good morning" atau "Hello, good morning".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara kamu memperkenalkan namamu sendiri dalam bahasa Inggris? Tuliskan satu kalimat pendek!',
                                'explanation' => 'Contoh: "My name is [nama]" atau "I am [nama]".',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Unit 1: How Are You?',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Unit 1 Bahasa Inggris Kelas 1 SD: Variasi sapaan siang dan malam (afternoon/night), ekspresi perasaan (happy/sad), dan fonik huruf C-D.',
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
                                'prompt' => '[Keterangan Gambar: Matahari berada tepat di atas kepala, waktu siang hari]
In the afternoon, we say "Good ...."',
                                'explanation' => 'Sapaan waktu siang hari adalah Good afternoon.',
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
                                'prompt' => '[Keterangan Gambar: Bulan dan bintang di malam hari, anak hendak tidur]
Before sleeping at night, we say "Good ...."',
                                'explanation' => 'Sebelum tidur di malam hari, kita mengucapkan Good night.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'night', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'afternoon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak sedang bersedih karena es krimnya jatuh]
He looks ....',
                                'explanation' => 'Gambar menunjukkan ekspresi sedih (sad).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sad', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'happy', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'fine', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kucing lucu]
The word "Cat" starts with letter ....',
                                'explanation' => 'Cat diawali dengan huruf C.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'C', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'K', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'S', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Made: "Goodbye, Joshua!"
Joshua: "..., Made!"',
                                'explanation' => 'Balasan ucapan Goodbye adalah Goodbye atau Bye.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Goodbye', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Thank you', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor anjing kecil]
The word "Dog" begins with letter ....',
                                'explanation' => 'Dog diawali dengan huruf D.',
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
                                'prompt' => '"How are you today?"
"I am very ..., thank you!"',
                                'explanation' => 'Ungkapan rasa senang / baik adalah happy atau fine.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'morning', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'name', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak perempuan berkenalan]
"I am Aisyah. What is your ...?"',
                                'explanation' => 'Untuk menanyakan nama teman: "What is your name?"',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'name', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'good', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'When someone helps you, you say ....',
                                'explanation' => 'Saat seseorang menolong kita, kita mengucapkan "Thank you".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Thank you', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Goodbye', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Hi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak melambaikan tangan "Bye-bye"]
"See you tomorrow!" means ....',
                                'explanation' => '"See you tomorrow" artinya sampai jumpa besok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sampai jumpa besok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Selamat pagi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Siapa namamu', 'is_correct' => false],
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
                                'prompt' => 'Greeting before sleeping at night is Good ....',
                                'explanation' => 'Lengkapnya adalah Good night.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Anak sedang tersenyum ceria]
Opposite of sad is ....',
                                'explanation' => 'Lawan kata dari sad (sedih) adalah happy (senang).',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"How ... you?" "I am fine."',
                                'explanation' => 'Kata bantu yang tepat adalah are.',
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
                                'prompt' => '[Keterangan Gambar: Anak laki-laki pamit pada ibunya hendak tidur]
Tuliskan ucapan selamat malam dalam bahasa Inggris!',
                                'explanation' => 'Jawaban: "Good night, Mom" atau "Good night".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Apa yang kamu katakan saat temanmu menanyakan: "How are you?" Tuliskan jawaban lengkapnya!',
                                'explanation' => 'Jawaban: "I am fine, thank you" atau "I am good, thank you".',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Unit 1: How Are You?',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Unit 1 Bahasa Inggris Kelas 1 SD: Penguatan percakapan perkenalan teman baru, ucapan terima kasih, dan fonik huruf E-F.',
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
                                'prompt' => '[Keterangan Gambar: Dua anak saling tersenyum bersalaman]
"Nice to meet you!"
"Nice to meet you, ....!"',
                                'explanation' => 'Balasan sopan untuk "Nice to meet you" adalah "Nice to meet you, too!"',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'too', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'no', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bye', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah telur ayam]
The word "Egg" starts with letter ....',
                                'explanation' => 'Egg diawali dengan huruf E.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'E', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'A', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'I', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor ikan berenang di air]
The word "Fish" begins with letter ....',
                                'explanation' => 'Fish diawali dengan huruf F.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'F', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'P', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'V', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Budi: "Thank you, Cici."
Cici: "You are ...."',
                                'explanation' => 'Jawaban untuk ucapan terima kasih adalah "You are welcome".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'welcome', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'fine', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'good', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak sedang melambaikan tangan tanda pamit]
"Bye-bye, see you!"
The word "see you" means ....',
                                'explanation' => '"See you" berarti sampai jumpa.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sampai jumpa', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Terima kasih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Nama saya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Joshua: "Are you happy today?"
Made: "Yes, I am ...."',
                                'explanation' => 'Jawaban persetujuan rasa bahagia adalah "Yes, I am happy".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'happy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sad', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'night', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Murid memberi hormat kepada guru di sekolah]
Greeting to our teacher in the afternoon is ....',
                                'explanation' => 'Sapaan siang hari kepada guru: "Good afternoon, Teacher".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Good afternoon, Teacher', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Good night, Teacher', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Goodbye, Teacher', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"My name is Cici."
In Indonesian, it means ....',
                                'explanation' => 'Artinya: "Nama saya Cici".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nama saya Cici', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Saya teman Cici', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Selamat pagi Cici', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak sedang tersenyum ceria dan sehat]
"How are you?"
"I am great!"
The word "great" means ....',
                                'explanation' => '"Great" berarti luar biasa / sangat baik.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sangat baik', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Sedih', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Mengantuk', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which one is a polite greeting?
(Manakah sapaan yang sopan?)',
                                'explanation' => '"Hello" adalah sapaan sopan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hello', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'No', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Stop', 'is_correct' => false],
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
                                'prompt' => '"Thank you!"
"You are ...."',
                                'explanation' => 'Lengkapnya adalah welcome.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Seekor ikan]
The word "Fish" starts with letter ....',
                                'explanation' => 'Diawali huruf F.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"Nice to meet you, ...!"',
                                'explanation' => 'Lengkapnya adalah too.',
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
                                'prompt' => '[Keterangan Gambar: Anak menerima hadiah pensil dari gurunya]
Apa yang kamu ucapkan dalam bahasa Inggris saat menerima bantuan atau hadiah?',
                                'explanation' => 'Jawaban: "Thank you" atau "Thank you very much".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan dua contoh ucapan salam (greetings) dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Good morning, Good afternoon, Hello, Hi, Good night.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
