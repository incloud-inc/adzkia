<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1Unit3Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Unit 3: My Family and Friends',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Unit 3 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Mengenal anggota keluarga inti (Father, Mother, Brother, Sister, Baby) dan kalimat sederhana "This is my...".',
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
                                'prompt' => '[Keterangan Gambar: Seorang ayah tersenyum memakai kemeja]
"This is my ...."',
                                'explanation' => 'Ayah dalam bahasa Inggris adalah father.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'father', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seorang ibu dengan senyum hangat dan lembut]
"She is my ...."',
                                'explanation' => 'Ibu dalam bahasa Inggris adalah mother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'father', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak laki-laki adik/kakak tersenyum ceria]
"He is my ...."',
                                'explanation' => 'Saudara laki-laki adalah brother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'brother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak perempuan adik/kakak memakai pita rambut]
"This is my ...."',
                                'explanation' => 'Saudara perempuan adalah sister.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sister', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'father', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'brother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bayi mungil tertawa lucu di kereta bayi]
"Look at the cute ...."',
                                'explanation' => 'Bayi mungil dalam bahasa Inggris adalah baby.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baby', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'teacher', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'book', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"I love my family."
In Indonesian, it means ....',
                                'explanation' => '"I love my family" artinya Saya sayang keluarga saya.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Saya sayang keluarga saya', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Saya punya teman baru', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Ini rumah saya', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Huruf M besar dan gambar buah mangga]
The word "Mother" begins with letter ....',
                                'explanation' => 'Mother diawali dengan huruf M.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'M', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'N', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'W', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Father and mother are our ....',
                                'explanation' => 'Ayah dan ibu adalah orang tua (parents).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'parents', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'friends', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'teachers', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seluruh anggota keluarga berkumpul bahagia]
A happy ....',
                                'explanation' => 'Keluarga bahagia adalah happy family.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'family', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'school', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pencil', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Who is female?
(Siapakah perempuan?)',
                                'explanation' => 'Mother (ibu) adalah perempuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Father', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Brother', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct family member!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ayah sedang membaca koran]
This is my ....',
                                'explanation' => 'Jawaban: father / dad.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ibu tersenyum]
She is my ....',
                                'explanation' => 'Jawaban: mother / mom.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The word "Father" begins with letter ....',
                                'explanation' => 'Jawaban: F.',
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
                                'prompt' => '[Keterangan Gambar: Foto keluarga terdiri atas ayah, ibu, dan anak]
Tuliskan satu kalimat pendek dalam bahasa Inggris yang menyatakan rasa sayang pada keluargamu!',
                                'explanation' => 'Jawaban: "I love my family".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Sebutkan 3 sebutan anggota keluarga inti dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Father, mother, brother, sister, baby.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Unit 3: My Family and Friends',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Unit 3 Bahasa Inggris Kelas 1 SD: Mengenal kakek dan nenek (Grandfather, Grandmother) serta teman-teman di sekolah (Friends, Boy, Girl).',
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
                                'prompt' => '[Keterangan Gambar: Kakek berambut putih memakai tongkat dan kacamata]
"He is my ...."',
                                'explanation' => 'Kakek dalam bahasa Inggris adalah grandfather (grandpa).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandfather', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Nenek ramah sedang merajut sambil tersenyum]
"She is my ...."',
                                'explanation' => 'Nenek dalam bahasa Inggris adalah grandmother (grandma).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandmother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'father', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sister', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak berjalan bersama sambil tertawa]
"Made is my good ...."',
                                'explanation' => 'Teman baik adalah good friend.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'friend', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pencil', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seorang anak laki-laki sedang bermain bola]
Joshua is a ....',
                                'explanation' => 'Joshua adalah anak laki-laki (boy).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'boy', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'girl', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seorang anak perempuan manis memakai rok]
Aisyah is a ....',
                                'explanation' => 'Aisyah adalah anak perempuan (girl).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'girl', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'boy', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'father', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Ibu guru mengajar di depan kelas]
"Good morning, ...."',
                                'explanation' => 'Ibu guru disapa dengan Teacher.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Teacher', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Baby', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Dog', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Grandpa is another name for ....',
                                'explanation' => 'Grandpa adalah panggilan untuk grandfather (kakek).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandfather', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'father', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Grandma is another name for ....',
                                'explanation' => 'Grandma adalah panggilan untuk grandmother (nenek).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandmother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Hidung anak yang mancung]
The word "Nose" starts with letter ....',
                                'explanation' => 'Nose diawali huruf N.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'N', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'M', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'H', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"We play together."
"Together" means ....',
                                'explanation' => '"Together" artinya bersama-sama.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bersama-sama', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Sendirian', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Marah-marah', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Kakek]
My father\'s father is my ....',
                                'explanation' => 'Jawaban: grandfather / grandpa.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Nenek]
My mother\'s mother is my ....',
                                'explanation' => 'Jawaban: grandmother / grandma.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'A male child is a ... (anak laki-laki).',
                                'explanation' => 'Jawaban: boy.',
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
                                'prompt' => '[Keterangan Gambar: Dua orang sahabat bermain ayunan di taman]
Tuliskan satu kalimat pendek dalam bahasa Inggris untuk memperkenalkan sahabatmu!',
                                'explanation' => 'Contoh: "This is my friend, Made" atau "He is my friend".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Apa sebutan dalam bahasa Inggris untuk kakek dan nenek?',
                                'explanation' => 'Jawaban: Grandfather (kakek) dan Grandmother (nenek).',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Unit 3: My Family and Friends',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Unit 3 Bahasa Inggris Kelas 1 SD: Pengayaan kalimat perkenalan keluarga, bagian tubuh/ekspresi senyum, dan fonik huruf P-Q-R.',
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
                                'prompt' => '[Keterangan Gambar: Dua mata berkedip indah]
We see with our two ....',
                                'explanation' => 'Mata adalah eyes.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eyes', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ears', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hands', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua telinga mendengar musik]
We listen with our two ....',
                                'explanation' => 'Telinga adalah ears.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ears', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'eyes', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'feet', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Mulut tersenyum manis]
Show your smile with your ....',
                                'explanation' => 'Mulut adalah mouth.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mouth', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'nose', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hands', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kelinci berbulu putih melompat (Rabbit)]
The word "Rabbit" begins with letter ....',
                                'explanation' => 'Rabbit diawali huruf R.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'R', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'P', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Gambar seorang ratu memakai mahkota (Queen)]
The word "Queen" begins with letter ....',
                                'explanation' => 'Queen diawali huruf Q.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Q', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'O', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'C', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah pensil tulis (Pencil)]
"Pencil" begins with letter ....',
                                'explanation' => 'Pencil diawali huruf P.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'P', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'B', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'D', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"This is my sister, Cici."
Sister means ....',
                                'explanation' => 'Sister artinya saudara perempuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Saudara perempuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Saudara laki-laki', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Ibu guru', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"This is my brother, Budi."
Brother means ....',
                                'explanation' => 'Brother artinya saudara laki-laki.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Saudara laki-laki', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Kakek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Paman', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua tangan bertepuk gembira]
Clap your ....',
                                'explanation' => 'Bertepuk tangan: "Clap your hands".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'hands', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'eyes', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ears', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'How many nose do you have?
(Berapa jumlah hidungmu?)',
                                'explanation' => 'Hidung ada satu (one nose).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'one', 'is_correct' => true],
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
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have ... eyes.',
                                'explanation' => 'Jawaban: two.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Touch your ... (tunjuk hidungmu).',
                                'explanation' => 'Jawaban: nose.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '"Rabbit" begins with letter ....',
                                'explanation' => 'Jawaban: R.',
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
                                'prompt' => '[Keterangan Gambar: Anak tersenyum menunjuk mata dan telinganya]
Tuliskan nama 2 bagian wajah dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Eyes, nose, ears, mouth.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan satu kalimat pendek untuk memperkenalkan saudara laki-lakimu bernama Budi!',
                                'explanation' => 'Jawaban: "This is my brother, Budi" atau "He is my brother, Budi".',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
