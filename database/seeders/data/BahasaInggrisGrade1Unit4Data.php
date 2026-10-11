<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade1Unit4Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Unit 4: My Classroom & Toys',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Unit 4 Bahasa Inggris Kelas 1 SD Kurikulum Merdeka: Mengenal benda-benda di dalam ruang kelas (Book, Pencil, Ruler, Eraser, Bag, Desk, Chair).',
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
                                'prompt' => '[Keterangan Gambar: Sebuah buku tulis terbuka]
"This is a ...."',
                                'explanation' => 'Buku dalam bahasa Inggris adalah book.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'book', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'bag', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pencil', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah pensil kayu berujung lancip]
We write with a ....',
                                'explanation' => 'Kita menulis dengan pensil (pencil).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pencil', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ruler', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'chair', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penggaris lurus panjang 30 cm]
"This is a ...."',
                                'explanation' => 'Penggaris adalah ruler.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ruler', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'eraser', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'desk', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Penghapus karet putih bersih]
To erase pencil marks, we use an ....',
                                'explanation' => 'Penghapus adalah eraser.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'eraser', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bag', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tas sekolah ransel di punggung anak]
"I put my books in my ...."',
                                'explanation' => 'Buku ditaruh di dalam tas (bag).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bag', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'chair', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'desk', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah meja belajar kayu di kelas]
"This is a ...."',
                                'explanation' => 'Meja belajar adalah desk / table.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'desk', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'chair', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ruler', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah kursi untuk duduk siswa]
We sit on a ....',
                                'explanation' => 'Kita duduk di atas kursi (chair).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'chair', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pencil', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bag', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis putih di depan kelas]
The teacher writes on the ....',
                                'explanation' => 'Guru menulis di papan tulis (whiteboard / blackboard).',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'board', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'door', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'window', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Huruf S besar dan gambar matahari cerah (Sun)]
The word "Sun" begins with letter ....',
                                'explanation' => 'Sun diawali huruf S.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'S', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'C', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Z', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"Open your book, please!"
In Indonesian, it means ....',
                                'explanation' => '"Open your book" artinya Silakan buka bukumu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Buka bukumu', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Tutup tasmu', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Duduk di kursi', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct classroom object!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buku]
Buku in English is ....',
                                'explanation' => 'Jawaban: book.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Pensil]
Pensil in English is ....',
                                'explanation' => 'Jawaban: pencil.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'We sit on a ... (kursi).',
                                'explanation' => 'Jawaban: chair.',
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
                                'prompt' => '[Keterangan Gambar: Meja belajar dengan sebuah buku dan pensil di atasnya]
Sebutkan 3 benda yang ada di dalam ruang kelas dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Book, pencil, ruler, eraser, bag, chair, desk.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan satu kalimat pendek dalam bahasa Inggris yang menyatakan bahwa kamu membawa sebuah tas!',
                                'explanation' => 'Jawaban: "I have a bag" atau "This is my bag".',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Unit 4: My Classroom & Toys',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Unit 4 Bahasa Inggris Kelas 1 SD: Mengenal aneka mainan kesukaan (Ball, Doll, Toy Car, Robot, Kite, Yo-yo, Teddy Bear).',
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
                                'prompt' => '[Keterangan Gambar: Sebuah bola sepak bundar hitam putih]
"I kick the ...."',
                                'explanation' => 'Bola adalah ball.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ball', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'doll', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'car', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Boneka perempuan cantik dengan gaun merah muda]
"Cici plays with a pretty ...."',
                                'explanation' => 'Boneka adalah doll.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'doll', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'robot', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kite', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Mobil-mobilan merah beroda empat]
"Joshua has a red toy ...."',
                                'explanation' => 'Mobil mainan adalah toy car.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'car', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'plane', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ball', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Robot mainan dari besi dengan lampu berkedip]
"This is my cool ...."',
                                'explanation' => 'Robot adalah robot.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'robot', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'doll', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'book', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Layang-layang terbang tinggi ditiup angin di lapangan]
"Look at the flying ...."',
                                'explanation' => 'Layang-layang adalah kite.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kite', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'ball', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'yo-yo', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Yo-yo berputar naik turun dengan tali]
"Made plays with a ...."',
                                'explanation' => 'Yo-yo adalah yo-yo.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'yo-yo', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'doll', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'kite', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Boneka beruang berbulu cokelat lembut]
"A soft teddy ...."',
                                'explanation' => 'Boneka beruang adalah teddy bear.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bear', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lion', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'cat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Huruf T besar dan mobil mainan (Toy)]
The word "Toy" begins with letter ....',
                                'explanation' => 'Toy diawali huruf T.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'T', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'D', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'F', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"I like my toys."
Toys means ....',
                                'explanation' => 'Toys artinya mainan-mainan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mainan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Buku pelajaran', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Sepatu baru', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua buah bola mainan]
How many balls? There are ....',
                                'explanation' => 'Dua bola adalah two balls.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'two balls', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'one doll', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'three cars', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Fill in the blanks with the correct toy word!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Bola sepak]
Bola in English is ....',
                                'explanation' => 'Jawaban: ball.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Boneka]
Boneka in English is ....',
                                'explanation' => 'Jawaban: doll.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Layang-layang]
Layang-layang in English is ....',
                                'explanation' => 'Jawaban: kite.',
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
                                'prompt' => '[Keterangan Gambar: Anak laki-laki memegang mobil-mobilan dan robot]
Sebutkan 3 jenis mainan dalam bahasa Inggris yang kamu sukai!',
                                'explanation' => 'Contoh: Ball, doll, toy car, robot, kite, yo-yo.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan satu kalimat pendek dalam bahasa Inggris yang menyatakan bahwa kamu memiliki sebuah bola berwarna merah!',
                                'explanation' => 'Jawaban: "I have a red ball".',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Unit 4: My Classroom & Toys',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Unit 4 Bahasa Inggris Kelas 1 SD: Gabungan benda kelas dan mainan, instruksi kelas (stand up, sit down), dan fonik huruf U-Z.',
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
                                'prompt' => '[Keterangan Gambar: Guru memberi isyarat berdiri kepada siswa]
"..., please!"',
                                'explanation' => 'Instruksi untuk berdiri adalah "Stand up".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Stand up', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Sit down', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Sleep', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Guru memberi isyarat duduk di kursi]
"..., please!"',
                                'explanation' => 'Instruksi untuk duduk adalah "Sit down".',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sit down', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Stand up', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Run', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Payung terbuka di bawah hujan (Umbrella)]
The word "Umbrella" starts with letter ....',
                                'explanation' => 'Umbrella diawali huruf U.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'U', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'A', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'O', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sebuah mobil van (Van)]
The word "Van" starts with letter ....',
                                'explanation' => 'Van diawali huruf V.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'V', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'W', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'F', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Jendela kaca di dinding kelas (Window)]
The word "Window" begins with letter ....',
                                'explanation' => 'Window diawali huruf W.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'W', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'M', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'V', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Seekor zebra bergaris hitam putih (Zebra)]
The word "Zebra" begins with letter ....',
                                'explanation' => 'Zebra diawali huruf Z.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Z', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'S', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'X', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak pensil berisi pensil warna-warni]
"This is my pencil ...."',
                                'explanation' => 'Kotak pensil adalah pencil case.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'case', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'book', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'desk', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '"May I borrow your ruler?"
Borrow means ....',
                                'explanation' => 'Borrow artinya meminjam.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Meminjam', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Membeli', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Membuang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Tiga buah buku dan satu pensil]
There are three books and ... pencil.',
                                'explanation' => 'Satu pensil adalah one pencil.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'one', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'four', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'two', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'We clean our classroom together.
Clean means ....',
                                'explanation' => 'Clean artinya membersihkan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membersihkan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'Mengotori', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'Menutup', 'is_correct' => false],
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
                                'prompt' => 'Stand ..., please! (Instruksi berdiri)',
                                'explanation' => 'Jawaban: up.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sit ..., please! (Instruksi duduk)',
                                'explanation' => 'Jawaban: down.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Payung]
"Umbrella" begins with letter ....',
                                'explanation' => 'Jawaban: U.',
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
                                'prompt' => 'Tuliskan dua instruksi sederhana di dalam kelas yang sering diucapkan oleh guru dalam bahasa Inggris!',
                                'explanation' => 'Contoh: Stand up, Sit down, Open your book, Listen to me.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan huruf terakhir dalam abjad bahasa Inggris beserta contoh satu kata hewannya!',
                                'explanation' => 'Jawaban: Huruf Z, contoh: Zebra.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
