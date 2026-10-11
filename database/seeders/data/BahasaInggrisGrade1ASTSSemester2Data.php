<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1ASTSSemester2Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASTS Semester 2 (Unit 3) #1',
                'type' => 'asts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Paket #1 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka Unit 3: My Family and Friends (Family members, friends, body parts).',
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
                                'prompt' => '[Keterangan Gambar: Seorang ayah sedang tersenyum]
"This is my ...."',
                                'explanation' => 'Ayah adalah father.',
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
                                'prompt' => '[Keterangan Gambar: Seorang ibu sedang tersenyum ramah]
"She is my ...."',
                                'explanation' => 'Ibu adalah mother.',
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
                                'prompt' => '[Keterangan Gambar: Kakak laki-laki memakai topi]
"He is my ...."',
                                'explanation' => 'Saudara laki-laki adalah brother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'brother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'grandmother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Adik perempuan manis]
"This is my ...."',
                                'explanation' => 'Saudara perempuan adalah sister.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sister', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'father', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'baby', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kakek tua berambut putih]
"He is my ...."',
                                'explanation' => 'Kakek adalah grandfather.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandfather', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sister', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Nenek sedang memangku kucing]
"She is my ...."',
                                'explanation' => 'Nenek adalah grandmother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandmother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'father', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak bergandengan tangan di taman]
"Joshua is my ...."',
                                'explanation' => 'Teman adalah friend.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'friend', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'table', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pencil', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua mata terbuka]
I have two ....',
                                'explanation' => 'Mata berjumlah dua (two eyes).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eyes', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'noses', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mouths', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Hidung anak]
We smell flowers with our ....',
                                'explanation' => 'Mencium wangi dengan hidung (nose).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'nose', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ears', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'eyes', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The word "Mother" begins with letter ....',
                                'explanation' => 'Mother diawali huruf M.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'M', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'N', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'W', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Ayah]
Ayah in English is ....',
                                'explanation' => 'Jawaban: father / dad.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ibu]
Ibu in English is ....',
                                'explanation' => 'Jawaban: mother / mom.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kakek in English is ....',
                                'explanation' => 'Jawaban: grandfather / grandpa.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nenek in English is ....',
                                'explanation' => 'Jawaban: grandmother / grandma.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have ... eyes.',
                                'explanation' => 'Jawaban: two.',
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
                                'prompt' => '[Keterangan Gambar: Foto keluarga lengkap]
Tuliskan satu kalimat pendek dalam bahasa Inggris yang menyatakan bahwa kamu mencintai keluargamu!',
                                'explanation' => 'Jawaban: "I love my family".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan sebutan bahasa Inggris untuk: (a) Ayah, (b) Ibu, (c) Kakek!',
                                'explanation' => 'Jawaban: (a) Father, (b) Mother, (c) Grandfather.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara kamu memperkenalkan teman barumu bernama Made dalam bahasa Inggris?',
                                'explanation' => 'Jawaban: "This is my friend, Made".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak menunjuk bagian tubuhnya]
Sebutkan 3 nama anggota tubuh di bagian kepala dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Eyes, nose, ears, mouth, hair.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Apa perbedaan arti kata "boy" dan "girl"? Jelaskan secara singkat!',
                                'explanation' => 'Boy artinya anak laki-laki, sedangkan girl artinya anak perempuan.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 2 (Unit 3) #2',
                'type' => 'asts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Paket #2 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka Unit 3: My Family and Friends (Family members, friends, body parts).',
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
                                'prompt' => '[Keterangan Gambar: Seorang ayah sedang tersenyum]
"This is my ...."',
                                'explanation' => 'Ayah adalah father.',
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
                                'prompt' => '[Keterangan Gambar: Seorang ibu sedang tersenyum ramah]
"She is my ...."',
                                'explanation' => 'Ibu adalah mother.',
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
                                'prompt' => '[Keterangan Gambar: Kakak laki-laki memakai topi]
"He is my ...."',
                                'explanation' => 'Saudara laki-laki adalah brother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'brother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'grandmother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Bayi mungil lucu]
"Look at the sweet ...."',
                                'explanation' => 'Bayi adalah baby.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baby', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'cat', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ball', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kakek tua berambut putih]
"He is my ...."',
                                'explanation' => 'Kakek adalah grandfather.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandfather', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sister', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Nenek sedang memangku kucing]
"She is my ...."',
                                'explanation' => 'Nenek adalah grandmother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandmother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'father', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua anak bergandengan tangan di taman]
"Joshua is my ...."',
                                'explanation' => 'Teman adalah friend.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'friend', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'table', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pencil', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua telinga mendengar]
I have two ....',
                                'explanation' => 'Dua telinga adalah two ears.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ears', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'noses', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'heads', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Hidung anak]
We smell flowers with our ....',
                                'explanation' => 'Mencium wangi dengan hidung (nose).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'nose', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ears', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'eyes', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor kelinci]
The word "Rabbit" begins with letter ....',
                                'explanation' => 'Rabbit diawali huruf R.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'R', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'P', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'B', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Ayah]
Ayah in English is ....',
                                'explanation' => 'Jawaban: father / dad.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ibu]
Ibu in English is ....',
                                'explanation' => 'Jawaban: mother / mom.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kakek in English is ....',
                                'explanation' => 'Jawaban: grandfather / grandpa.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nenek in English is ....',
                                'explanation' => 'Jawaban: grandmother / grandma.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have ... eyes.',
                                'explanation' => 'Jawaban: two.',
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
                                'prompt' => '[Keterangan Gambar: Foto keluarga lengkap]
Tuliskan satu kalimat pendek dalam bahasa Inggris yang menyatakan bahwa kamu mencintai keluargamu!',
                                'explanation' => 'Jawaban: "I love my family".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan sebutan bahasa Inggris untuk: (a) Ayah, (b) Ibu, (c) Kakek!',
                                'explanation' => 'Jawaban: (a) Father, (b) Mother, (c) Grandfather.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara kamu memperkenalkan teman barumu bernama Made dalam bahasa Inggris?',
                                'explanation' => 'Jawaban: "This is my friend, Made".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak menunjuk bagian tubuhnya]
Sebutkan 3 nama anggota tubuh di bagian kepala dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Eyes, nose, ears, mouth, hair.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Apa perbedaan arti kata "boy" dan "girl"? Jelaskan secara singkat!',
                                'explanation' => 'Boy artinya anak laki-laki, sedangkan girl artinya anak perempuan.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASTS Semester 2 (Unit 3) #3',
                'type' => 'asts',
                'duration_minutes' => 60,
                'description' => 'Asesmen Sumatif Tengah Semester (ASTS) 2 Paket #3 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka Unit 3: My Family and Friends (Family members, friends, body parts).',
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
                                'prompt' => '"I love my ...." (Keluarga)',
                                'explanation' => 'Keluarga adalah family.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'family', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'table', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'chair', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seorang ibu sedang tersenyum ramah]
"She is my ...."',
                                'explanation' => 'Ibu adalah mother.',
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
                                'prompt' => '[Keterangan Gambar: Kakak laki-laki memakai topi]
"He is my ...."',
                                'explanation' => 'Saudara laki-laki adalah brother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'brother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sister', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'grandmother', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Adik perempuan manis]
"This is my ...."',
                                'explanation' => 'Saudara perempuan adalah sister.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sister', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'father', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'baby', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kakek tua berambut putih]
"He is my ...."',
                                'explanation' => 'Kakek adalah grandfather.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandfather', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sister', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Nenek sedang memangku kucing]
"She is my ...."',
                                'explanation' => 'Nenek adalah grandmother.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'grandmother', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'brother', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'father', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Aisyah is a ... (anak perempuan).',
                                'explanation' => 'Anak perempuan adalah girl.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'girl', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'boy', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'father', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua tangan]
"Clap your ...."',
                                'explanation' => 'Bertepuk tangan: Clap your hands.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'hands', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'eyes', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ears', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Hidung anak]
We smell flowers with our ....',
                                'explanation' => 'Mencium wangi dengan hidung (nose).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'nose', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ears', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'eyes', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The word "Mother" begins with letter ....',
                                'explanation' => 'Mother diawali huruf M.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'M', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'N', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'W', 'is_correct' => false],
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
                                'prompt' => '[Keterangan Gambar: Ayah]
Ayah in English is ....',
                                'explanation' => 'Jawaban: father / dad.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Ibu]
Ibu in English is ....',
                                'explanation' => 'Jawaban: mother / mom.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kakek in English is ....',
                                'explanation' => 'Jawaban: grandfather / grandpa.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nenek in English is ....',
                                'explanation' => 'Jawaban: grandmother / grandma.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Dua mata]
I have ... eyes.',
                                'explanation' => 'Jawaban: two.',
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
                                'prompt' => '[Keterangan Gambar: Foto keluarga lengkap]
Tuliskan satu kalimat pendek dalam bahasa Inggris yang menyatakan bahwa kamu mencintai keluargamu!',
                                'explanation' => 'Jawaban: "I love my family".',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan sebutan bahasa Inggris untuk: (a) Ayah, (b) Ibu, (c) Kakek!',
                                'explanation' => 'Jawaban: (a) Father, (b) Mother, (c) Grandfather.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Bagaimana cara kamu memperkenalkan teman barumu bernama Made dalam bahasa Inggris?',
                                'explanation' => 'Jawaban: "This is my friend, Made".',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Anak menunjuk bagian tubuhnya]
Sebutkan 3 nama anggota tubuh di bagian kepala dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Eyes, nose, ears, mouth, hair.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Apa perbedaan arti kata "boy" dan "girl"? Jelaskan secara singkat!',
                                'explanation' => 'Boy artinya anak laki-laki, sedangkan girl artinya anak perempuan.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
