<?php

namespace Database\Seeders\Data;

class MatematikaASATData
{
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'ASAT (Bab 1 sampai 8) #1',
                'type' => 'asaj',
                'duration_minutes' => 120,
                'description' => 'Asesmen Sumatif Akhir Tahun (ASAT) Paket #1 Matematika Kelas 1 SD Kurikulum Merdeka: Komprehensif seluruh materi Bab 1 sampai Bab 8.',
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
                                'prompt' => '[Keterangan Gambar: 7 jeruk di piring]
Banyak jeruk pada gambar adalah ....',
                                'explanation' => 'Ada 7 jeruk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "delapan" adalah ....',
                                'explanation' => 'Delapan ditulis 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 5 + 4 adalah ....',
                                'explanation' => '5 + 4 = 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 3 pensil ditambah 3 pensil]
3 + 3 = ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda bundar]
Roda sepeda berbentuk bangun datar ....',
                                'explanation' => 'Roda sepeda = lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak pasta gigi]
Kotak odol berbentuk bangun ruang ....',
                                'explanation' => 'Kotak odol = balok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'balok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "tujuh belas" adalah ....',
                                'explanation' => 'Tujuh belas = 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '71', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 14 terdiri atas ....',
                                'explanation' => '14 = 1 puluhan + 4 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 4 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 15 - 5 adalah ....',
                                'explanation' => '15 - 5 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 4 = ....',
                                'explanation' => '18 - 4 = 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '13', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua penggaris: A panjang 30 cm dan B panjang 15 cm]
Penggaris A ... daripada penggaris B.',
                                'explanation' => '30 cm lebih panjang dari 15 cm.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih panjang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih pendek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu lebih lama adalah ....',
                                'explanation' => 'Tidur malam berlangsung lama.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tidur malam', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'minum air', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mencuci tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah: Apel 5 gambar, Mangga 3 gambar]
Buah yang paling banyak disukai adalah ....',
                                'explanation' => 'Apel terbanyak yaitu 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'apel', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mangga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jeruk', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram balon: Merah 6, Kuning 2]
Selisih banyak balon merah dan kuning adalah ....',
                                'explanation' => '6 - 2 = 4 balon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "sembilan" adalah ....',
                                'explanation' => '9',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 diuraikan menjadi 2 dan ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 4 + 3 adalah ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Uang koin logam]
Uang koin berbentuk bangun datar ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 14 dan 16 adalah ....',
                                'explanation' => '15',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 2 satuan nilainya ....',
                                'explanation' => '12',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 15 - 3 adalah ....',
                                'explanation' => '12',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Mengukur meja menggunakan jari tangan terbuka disebut ....',
                                'explanation' => 'jengkal',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kita sarapan pagi pada waktu ... hari.',
                                'explanation' => 'pagi',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Piktogram bintang: Ada 6 gambar bintang]
Banyak bintang pada gambar ada ... buah.',
                                'explanation' => '6',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Urutkan bilangan berikut dari yang paling kecil: 15, 8, 12, 19, 5!',
                                'explanation' => 'Urutan: 5, 8, 12, 15, 19.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ali mempunyai 6 butir kelereng. Diberi paman 4 butir kelereng lagi. Berapa banyak kelereng Ali sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 6 + 4 = 10 butir kelereng.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ibu membeli 14 butir telur. Dipakai untuk membuat kue sebanyak 4 butir. Berapa sisa telur ibu? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 14 - 4 = 10 butir telur.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis dan kaleng susu]
Sebutkan bentuk bangun datar dari papan tulis dan bentuk bangun ruang dari kaleng susu!',
                                'explanation' => 'Papan tulis berbentuk bangun datar segiempat, sedangkan kaleng susu berbentuk bangun ruang tabung.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah kesukaan: Apel 5 gambar, Mangga 7 gambar, Jeruk 2 gambar]
Berdasarkan data gambar tersebut, buah apakah yang paling banyak disukai dan buah apakah yang paling sedikit disukai?',
                                'explanation' => 'Paling banyak disukai adalah mangga (7), paling sedikit disukai adalah jeruk (2).',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAT (Bab 1 sampai 8) #2',
                'type' => 'asaj',
                'duration_minutes' => 120,
                'description' => 'Asesmen Sumatif Akhir Tahun (ASAT) Paket #2 Matematika Kelas 1 SD Kurikulum Merdeka: Komprehensif seluruh materi Bab 1 sampai Bab 8.',
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
                                'prompt' => '[Keterangan Gambar: 9 balon warna-warni]
Banyak balon adalah ....',
                                'explanation' => 'Ada 9 balon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "delapan" adalah ....',
                                'explanation' => 'Delapan ditulis 8.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '8', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '7', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '9', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 6 + 4 adalah ....',
                                'explanation' => '6 + 4 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 3 pensil ditambah 3 pensil]
3 + 3 = ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda bundar]
Roda sepeda berbentuk bangun datar ....',
                                'explanation' => 'Roda sepeda = lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak pasta gigi]
Kotak odol berbentuk bangun ruang ....',
                                'explanation' => 'Kotak odol = balok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'balok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "tujuh belas" adalah ....',
                                'explanation' => 'Tujuh belas = 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '71', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 14 terdiri atas ....',
                                'explanation' => '14 = 1 puluhan + 4 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 4 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 12 - 2 adalah ....',
                                'explanation' => '12 - 2 = 10.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '10', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '9', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '11', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 4 = ....',
                                'explanation' => '18 - 4 = 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '13', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua penggaris: A panjang 30 cm dan B panjang 15 cm]
Penggaris A ... daripada penggaris B.',
                                'explanation' => '30 cm lebih panjang dari 15 cm.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih panjang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih pendek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu lebih lama adalah ....',
                                'explanation' => 'Tidur malam berlangsung lama.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'tidur malam', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'minum air', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'mencuci tangan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram hewan: Kucing 7 gambar, Kelinci 2 gambar]
Hewan yang paling banyak adalah ....',
                                'explanation' => 'Kucing terbanyak yaitu 7.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'kucing', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kelinci', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'ikan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram balon: Merah 6, Kuning 2]
Selisih banyak balon merah dan kuning adalah ....',
                                'explanation' => '6 - 2 = 4 balon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "sembilan" adalah ....',
                                'explanation' => '9',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 diuraikan menjadi 2 dan ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 4 + 3 adalah ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Uang koin logam]
Uang koin berbentuk bangun datar ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 14 dan 16 adalah ....',
                                'explanation' => '15',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 2 satuan nilainya ....',
                                'explanation' => '12',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 15 - 3 adalah ....',
                                'explanation' => '12',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Mengukur meja menggunakan jari tangan terbuka disebut ....',
                                'explanation' => 'jengkal',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kita sarapan pagi pada waktu ... hari.',
                                'explanation' => 'pagi',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Piktogram bintang: Ada 6 gambar bintang]
Banyak bintang pada gambar ada ... buah.',
                                'explanation' => '6',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Urutkan bilangan berikut dari yang paling kecil: 15, 8, 12, 19, 5!',
                                'explanation' => 'Urutan: 5, 8, 12, 15, 19.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ali mempunyai 6 butir kelereng. Diberi paman 4 butir kelereng lagi. Berapa banyak kelereng Ali sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 6 + 4 = 10 butir kelereng.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ibu membeli 14 butir telur. Dipakai untuk membuat kue sebanyak 4 butir. Berapa sisa telur ibu? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 14 - 4 = 10 butir telur.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis dan kaleng susu]
Sebutkan bentuk bangun datar dari papan tulis dan bentuk bangun ruang dari kaleng susu!',
                                'explanation' => 'Papan tulis berbentuk bangun datar segiempat, sedangkan kaleng susu berbentuk bangun ruang tabung.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah kesukaan: Apel 5 gambar, Mangga 7 gambar, Jeruk 2 gambar]
Berdasarkan data gambar tersebut, buah apakah yang paling banyak disukai dan buah apakah yang paling sedikit disukai?',
                                'explanation' => 'Paling banyak disukai adalah mangga (7), paling sedikit disukai adalah jeruk (2).',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'ASAT (Bab 1 sampai 8) #3',
                'type' => 'asaj',
                'duration_minutes' => 120,
                'description' => 'Asesmen Sumatif Akhir Tahun (ASAT) Paket #3 Matematika Kelas 1 SD Kurikulum Merdeka: Komprehensif seluruh materi Bab 1 sampai Bab 8.',
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
                                'prompt' => '[Keterangan Gambar: 7 jeruk di piring]
Banyak jeruk pada gambar adalah ....',
                                'explanation' => 'Ada 7 jeruk.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '7', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '6', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '8', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Nama bilangan dari angka 10 adalah ....',
                                'explanation' => '10 = sepuluh.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'sepuluh', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'sembilan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'delapan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 6 dapat diuraikan menjadi ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 dan 3', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '2 dan 3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '4 dan 1', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 7 + 2 adalah ....',
                                'explanation' => '7 + 2 = 9.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '8', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '10', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: 3 pensil ditambah 3 pensil]
3 + 3 = ....',
                                'explanation' => '3 + 3 = 6.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '5', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '7', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Roda sepeda bundar]
Roda sepeda berbentuk bangun datar ....',
                                'explanation' => 'Roda sepeda = lingkaran.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lingkaran', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'segitiga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'segiempat', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Kotak pasta gigi]
Kotak odol berbentuk bangun ruang ....',
                                'explanation' => 'Kotak odol = balok.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'balok', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'kubus', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'bola', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lambang bilangan "tujuh belas" adalah ....',
                                'explanation' => 'Tujuh belas = 17.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '17', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '71', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '16', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bilangan 14 terdiri atas ....',
                                'explanation' => '14 = 1 puluhan + 4 satuan.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1 puluhan dan 4 satuan', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '4 puluhan dan 1 satuan', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '1 puluhan dan 5 satuan', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Hasil dari 16 - 3 adalah ....',
                                'explanation' => '16 - 3 = 13.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '13', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '12', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '14', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '18 - 4 = ....',
                                'explanation' => '18 - 4 = 14.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '14', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '13', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '15', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Dua penggaris: A panjang 30 cm dan B panjang 15 cm]
Penggaris A ... daripada penggaris B.',
                                'explanation' => '30 cm lebih panjang dari 15 cm.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lebih panjang', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'lebih pendek', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'sama panjang', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kegiatan yang membutuhkan waktu paling sebentar adalah ....',
                                'explanation' => 'Berkedip hanya sebentar.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'berkedip', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'makan siang', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'belajar di kelas', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah: Apel 5 gambar, Mangga 3 gambar]
Buah yang paling banyak disukai adalah ....',
                                'explanation' => 'Apel terbanyak yaitu 5.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'apel', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => 'mangga', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => 'jeruk', 'is_correct' => false],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Keterangan Gambar: Piktogram balon: Merah 6, Kuning 2]
Selisih banyak balon merah dan kuning adalah ....',
                                'explanation' => '6 - 2 = 4 balon.',
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4', 'is_correct' => true],
                                    ['label' => 'B', 'option_text' => '3', 'is_correct' => false],
                                    ['label' => 'C', 'option_text' => '5', 'is_correct' => false],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik dengan jawaban yang tepat!',
                        'order' => 2,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lambang bilangan "sembilan" adalah ....',
                                'explanation' => '9',
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan 5 diuraikan menjadi 2 dan ....',
                                'explanation' => '3',
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 4 + 3 adalah ....',
                                'explanation' => '7',
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Uang koin logam]
Uang koin berbentuk bangun datar ....',
                                'explanation' => 'lingkaran',
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bilangan antara 14 dan 16 adalah ....',
                                'explanation' => '15',
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 puluhan dan 2 satuan nilainya ....',
                                'explanation' => '12',
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hasil dari 15 - 3 adalah ....',
                                'explanation' => '12',
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Mengukur meja menggunakan jari tangan terbuka disebut ....',
                                'explanation' => 'jengkal',
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kita sarapan pagi pada waktu ... hari.',
                                'explanation' => 'pagi',
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Keterangan Gambar: Piktogram bintang: Ada 6 gambar bintang]
Banyak bintang pada gambar ada ... buah.',
                                'explanation' => '6',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Uraian',
                        'instructions' => 'Jawablah pertanyaan dengan jelas dan teliti!',
                        'order' => 3,
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Urutkan bilangan berikut dari yang paling kecil: 15, 8, 12, 19, 5!',
                                'explanation' => 'Urutan: 5, 8, 12, 15, 19.',
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ali mempunyai 6 butir kelereng. Diberi paman 4 butir kelereng lagi. Berapa banyak kelereng Ali sekarang? Tuliskan kalimat matematikanya!',
                                'explanation' => 'Kalimat matematika: 6 + 4 = 10 butir kelereng.',
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => 'Ibu membeli 14 butir telur. Dipakai untuk membuat kue sebanyak 4 butir. Berapa sisa telur ibu? Tuliskan cara hitungnya!',
                                'explanation' => 'Cara hitung: 14 - 4 = 10 butir telur.',
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Papan tulis dan kaleng susu]
Sebutkan bentuk bangun datar dari papan tulis dan bentuk bangun ruang dari kaleng susu!',
                                'explanation' => 'Papan tulis berbentuk bangun datar segiempat, sedangkan kaleng susu berbentuk bangun ruang tabung.',
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 3.0,
                                'prompt' => '[Keterangan Gambar: Piktogram buah kesukaan: Apel 5 gambar, Mangga 7 gambar, Jeruk 2 gambar]
Berdasarkan data gambar tersebut, buah apakah yang paling banyak disukai dan buah apakah yang paling sedikit disukai?',
                                'explanation' => 'Paling banyak disukai adalah mangga (7), paling sedikit disukai adalah jeruk (2).',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
