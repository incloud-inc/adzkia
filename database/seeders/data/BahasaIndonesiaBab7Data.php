<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaBab7Data
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 7: Aku Ingin',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 1 Bab 7 Bahasa Indonesia Kelas 1 SD: Membedakan kebutuhan dan keinginan, hidup hemat, suku kata berawalan huruf p, dan pengenalan uang sederhana.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepiring nasi, sayur bayam, dan sebutir telur]
Benda pada gambar merupakan contoh dari ....',
                                'explanation' => 'Makanan bergizi adalah kebutuhan utama tubuh manusia.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kebutuhan utama', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'keinginan mainan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hadiah ulang tahun', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh benda yang termasuk keinginan dan bukan kebutuhan mendesak adalah ....',
                                'explanation' => 'Mobil-mobilan baru adalah keinginan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mainan mobil baru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'air putih untuk minum', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pakaian seragam sekolah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Payung terbuka warna biru]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Payung diawali huruf p.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'p', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "pintu" adalah ....',
                                'explanation' => 'Pintu diawali suku kata pin / pi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "pu" adalah ....',
                                'explanation' => 'Pulau diawali pu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pulau', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pagi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pohon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak memasukkan uang koin ke dalam celengan ayam]
Kegiatan yang dilakukan anak pada gambar adalah ....',
                                'explanation' => 'Menyimpan uang ke celengan disebut menabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menabung uang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'membeli mainan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membuang sampah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap hemat dalam menggunakan uang saku dapat dilakukan dengan ....',
                                'explanation' => 'Menyisihkan uang untuk ditabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menyisihkan sebagian untuk ditabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'menghabiskan semua untuk jajan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membeli banyak permen manis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "pohon" adalah ....',
                                'explanation' => 'Pohon diawali po.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'po', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "pe" adalah ....',
                                'explanation' => 'Pepaya diawali pe.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pepaya', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pisang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'padi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebelum membeli sesuatu, kita harus memikirkan apakah benda itu kita ....',
                                'explanation' => 'Pikirkan apakah benda itu benar-benar dibutuhkan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'butuhkan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'benci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'buang', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan kata yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang matang warna kuning]
Nama buah lezat pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Pisang diawali pi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'pi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tempat menyimpan uang tabungan di rumah disebut ....',
                                'explanation' => 'Tempat menabung adalah celengan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'celengan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "padi" diawali dengan suku kata ....',
                                'explanation' => 'Padi diawali pa.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'pa', 'is_correct' => true],
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
                                'prompt' => 'Apa perbedaan antara "kebutuhan" dan "keinginan"?',
                                'explanation' => 'Kebutuhan adalah hal penting yang harus dipenuhi agar kita bisa hidup sehat (seperti makanan dan pakaian), sedangkan keinginan adalah hal yang kita inginkan tetapi belum tentu diperlukan (seperti mainan baru).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "pa"!',
                                'explanation' => 'Contoh: pagi, padi, pagar, payung.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 7: Aku Ingin',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 2 Bab 7 Bahasa Indonesia Kelas 1 SD: Membedakan kebutuhan dan keinginan, hidup hemat, suku kata berawalan huruf p, dan pengenalan uang sederhana.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepiring nasi, sayur bayam, dan sebutir telur]
Benda pada gambar merupakan contoh dari ....',
                                'explanation' => 'Makanan bergizi adalah kebutuhan utama tubuh manusia.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kebutuhan utama', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'keinginan mainan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hadiah ulang tahun', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh benda yang termasuk keinginan dan bukan kebutuhan mendesak adalah ....',
                                'explanation' => 'Mobil-mobilan baru adalah keinginan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mainan mobil baru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'air putih untuk minum', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pakaian seragam sekolah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Payung terbuka warna biru]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Payung diawali huruf p.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'p', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "pintu" adalah ....',
                                'explanation' => 'Pintu diawali suku kata pin / pi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "pu" adalah ....',
                                'explanation' => 'Pulau diawali pu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pulau', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pagi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pohon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak memasukkan uang koin ke dalam celengan ayam]
Kegiatan yang dilakukan anak pada gambar adalah ....',
                                'explanation' => 'Menyimpan uang ke celengan disebut menabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menabung uang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'membeli mainan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membuang sampah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap hemat dalam menggunakan uang saku dapat dilakukan dengan ....',
                                'explanation' => 'Menyisihkan uang untuk ditabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menyisihkan sebagian untuk ditabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'menghabiskan semua untuk jajan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membeli banyak permen manis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "pohon" adalah ....',
                                'explanation' => 'Pohon diawali po.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'po', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "pe" adalah ....',
                                'explanation' => 'Pepaya diawali pe.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pepaya', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pisang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'padi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebelum membeli sesuatu, kita harus memikirkan apakah benda itu kita ....',
                                'explanation' => 'Pikirkan apakah benda itu benar-benar dibutuhkan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'butuhkan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'benci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'buang', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan kata yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang matang warna kuning]
Nama buah lezat pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Pisang diawali pi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'pi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tempat menyimpan uang tabungan di rumah disebut ....',
                                'explanation' => 'Tempat menabung adalah celengan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'celengan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "padi" diawali dengan suku kata ....',
                                'explanation' => 'Padi diawali pa.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'pa', 'is_correct' => true],
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
                                'prompt' => 'Apa perbedaan antara "kebutuhan" dan "keinginan"?',
                                'explanation' => 'Kebutuhan adalah hal penting yang harus dipenuhi agar kita bisa hidup sehat (seperti makanan dan pakaian), sedangkan keinginan adalah hal yang kita inginkan tetapi belum tentu diperlukan (seperti mainan baru).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "pa"!',
                                'explanation' => 'Contoh: pagi, padi, pagar, payung.',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 7: Aku Ingin',
                'type' => 'ph',
                'duration_minutes' => 30,
                'description' => 'Kuis 3 Bab 7 Bahasa Indonesia Kelas 1 SD: Membedakan kebutuhan dan keinginan, hidup hemat, suku kata berawalan huruf p, dan pengenalan uang sederhana.',
                'sections' => [
                    [
                        'title' => 'Bagian 1: Pilihan Ganda',
                        'instructions' => 'Pilihlah salah satu jawaban yang paling tepat (A, B, atau C)!',
                        'order' => 1,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Sepiring nasi, sayur bayam, dan sebutir telur]
Benda pada gambar merupakan contoh dari ....',
                                'explanation' => 'Makanan bergizi adalah kebutuhan utama tubuh manusia.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kebutuhan utama', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'keinginan mainan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'hadiah ulang tahun', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh benda yang termasuk keinginan dan bukan kebutuhan mendesak adalah ....',
                                'explanation' => 'Mobil-mobilan baru adalah keinginan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'mainan mobil baru', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'air putih untuk minum', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pakaian seragam sekolah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Payung terbuka warna biru]
Huruf pertama dari nama benda pada gambar adalah ....',
                                'explanation' => 'Payung diawali huruf p.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'p', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'b', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'd', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "pintu" adalah ....',
                                'explanation' => 'Pintu diawali suku kata pin / pi.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pi', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pu', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata di bawah ini yang diawali dengan suku kata "pu" adalah ....',
                                'explanation' => 'Pulau diawali pu.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pulau', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pagi', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pohon', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Anak memasukkan uang koin ke dalam celengan ayam]
Kegiatan yang dilakukan anak pada gambar adalah ....',
                                'explanation' => 'Menyimpan uang ke celengan disebut menabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menabung uang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'membeli mainan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membuang sampah', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap hemat dalam menggunakan uang saku dapat dilakukan dengan ....',
                                'explanation' => 'Menyisihkan uang untuk ditabung.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'menyisihkan sebagian untuk ditabung', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'menghabiskan semua untuk jajan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'membeli banyak permen manis', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Suku kata awal dari kata "pohon" adalah ....',
                                'explanation' => 'Pohon diawali po.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'po', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pa', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'pi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata yang diawali dengan suku kata "pe" adalah ....',
                                'explanation' => 'Pepaya diawali pe.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'pepaya', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'pisang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'padi', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebelum membeli sesuatu, kita harus memikirkan apakah benda itu kita ....',
                                'explanation' => 'Pikirkan apakah benda itu benar-benar dibutuhkan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'butuhkan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'benci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'buang', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik di bawah ini dengan kata yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Buah pisang matang warna kuning]
Nama buah lezat pada gambar diawali dengan suku kata ....',
                                'explanation' => 'Pisang diawali pi.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'pi', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tempat menyimpan uang tabungan di rumah disebut ....',
                                'explanation' => 'Tempat menabung adalah celengan.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'celengan', 'is_correct' => true],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "padi" diawali dengan suku kata ....',
                                'explanation' => 'Padi diawali pa.',
                                'options' => [
                                    ['label' => null, 'option_text' => 'pa', 'is_correct' => true],
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
                                'prompt' => 'Apa perbedaan antara "kebutuhan" dan "keinginan"?',
                                'explanation' => 'Kebutuhan adalah hal penting yang harus dipenuhi agar kita bisa hidup sehat (seperti makanan dan pakaian), sedangkan keinginan adalah hal yang kita inginkan tetapi belum tentu diperlukan (seperti mainan baru).',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Tuliskan 2 kata yang diawali dengan suku kata "pa"!',
                                'explanation' => 'Contoh: pagi, padi, pagar, payung.',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
