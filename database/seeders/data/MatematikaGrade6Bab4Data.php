<?php

namespace Database\Seeders\Data;

class MatematikaGrade6Bab4Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Quiz 1 Bab 4: Sifat-sifat dan Jaring-jaring Bangun Ruang',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 4 Quiz 1. Menguji identifikasi sifat-sifat geometri, jaring-jaring, rusuk, sisi, dan titik sudut prisma, limas, tabung, kerucut, dan bola.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Pembuatan Kemasan Produk Kreatif Ramah Lingkungan', 'content' => '[Keterangan Gambar: Aneka bentuk kemasan produk dari karton daur ulang: Kemasan prisma segitiga untuk cokelat batangan, tabung silinder untuk biskuit, dan limas segi empat untuk suvenir.]
Dalam pameran karya kewirausahaan kreatif, siswa kelas 6 merancang kemasan produk ramah lingkungan dari lembaran karton daur ulang. Setiap kelompok memilih bentuk geometri bangun ruang yang unik dan menarik.

Kelompok 1 membuat kemasan cokelat berbentuk prisma segitiga. Prisma ini memiliki 5 sisi (2 sisi alas-tutup berbentuk segitiga dan 3 sisi tegak persegi panjang), 9 rusuk, dan 6 titik sudut. Kelompok 2 merancang kemasan biskuit berbentuk tabung (silinder) yang memiliki 3 sisi (alas dan tutup lingkaran serta selimut tabung persegi panjang lengkung), 2 rusuk lengkung, dan tidak memiliki titik sudut. Kelompok 3 membuat kotak suvenir berbentuk limas segi empat yang memiliki 5 sisi (1 alas persegi dan 4 sisi tegak segitiga), 8 rusuk, dan 5 titik sudut. Pemahaman tentang jaring-jaring dan sifat bangun ruang membuat desain kemasan presisi dan kokoh.'],
                            ['title' => 'Stimulus 2: Menelaah Kubah Tenda Pengungsian dan Kerucut Lalu Lintas', 'content' => '[Keterangan Gambar: Dua objek bangun ruang di lapangan: Tenda pleton kerucut-tabung dan kerucut lalu lintas (traffic cone) oranye berbahan polimer.]
Dalam simulasi tanggap bencana Badan Penanggulangan Bencana Daerah (BPBD), para relawan mendirikan tenda komando dan mengatur jalur evakuasi menggunakan pembatas kerucut lalu lintas (traffic cone).

Kerucut lalu lintas memiliki sifat geometri yang khas: terdiri atas 2 sisi (1 sisi alas berbentuk lingkaran dan 1 selimut kerucut yang berupa juring lingkaran melengkung), 1 rusuk lengkung, dan 1 titik puncak. Kerucut tidak memiliki sudut siku-siku pada selimutnya. Sementara itu, bola piala penghargaan yang dipajang di posko merupakan bangun ruang yang sangat unik karena hanya dibatasi oleh 1 sisi lengkung bola, tidak memiliki rusuk, dan tidak memiliki titik sudut. Jarak dari titik pusat bola ke seluruh permukaan bola selalu sama, yaitu jari-jari bola (r). Pemahaman sifat-sifat ini memudahkan identifikasi benda-benda tiga dimensi di lingkungan sekitar.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, banyak sisi dan rusuk pada kemasan prisma segitiga adalah ....',
                                'explanation' => 'Prisma segitiga memiliki 5 sisi, 9 rusuk, dan 6 titik sudut.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 sisi dan 9 rusuk', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 sisi dan 12 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '5 sisi dan 8 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4 sisi dan 6 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun ruang pada stimulus yang memiliki 2 rusuk lengkung dan tidak memiliki titik sudut sama sekali adalah ....',
                                'explanation' => 'Tabung memiliki 3 sisi, 2 rusuk lengkung, dan 0 titik sudut.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tabung (silinder)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kerucut', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai sifat limas segi empat!',
                                'explanation' => 'Limas segi empat memiliki 5 sisi, 8 rusuk, dan 5 titik sudut.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki 5 buah sisi (1 alas segi empat dan 4 sisi tegak segitiga).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Memiliki 5 titik sudut (4 di alas dan 1 titik puncak).', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memiliki 12 buah rusuk tegak lurus.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tidak memiliki rusuk sama sekali.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran sifat bangun ruang!',
                                'explanation' => 'Kerucut hanya memiliki satu titik puncak.',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tabung memiliki alas dan tutup berbentuk lingkaran yang kongruen.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Prisma segitiga memiliki 6 buah titik sudut.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kerucut memiliki dua buah titik puncak.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Jaring-jaring tabung terdiri atas dua lingkaran dan satu persegi panjang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, banyak sisi dan rusuk yang dimiliki oleh bangun ruang kerucut adalah ....',
                                'explanation' => 'Kerucut memiliki 2 sisi (alas dan selimut) serta 1 rusuk lengkung.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2 sisi dan 1 rusuk lengkung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '3 sisi dan 2 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1 sisi dan 0 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4 sisi dan 6 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun ruang yang hanya memiliki 1 sisi lengkung, tidak memiliki rusuk, dan tidak memiliki titik sudut adalah ....',
                                'explanation' => 'Bola hanya memiliki 1 sisi, 0 rusuk, dan 0 titik sudut.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kerucut', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prisma', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan banyak titik sudutnya!',
                                'explanation' => 'Banyak titik sudut bangun ruang.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => '6 titik sudut', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => '5 titik sudut', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kerucut', 'is_correct' => false, 'match_key' => '1 titik puncak', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => '0 titik sudut', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran sifat geometri bangun ruang!',
                                'explanation' => 'Tabung tidak memiliki titik sudut (0 titik sudut).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Selimut kerucut jika dibuka berbentuk juring lingkaran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bola memiliki titik pusat yang berjarak sama ke seluruh kulit bola.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung memiliki 8 titik sudut.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Limas segitiga memiliki 4 sisi berbentuk segitiga.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jumlah rusuk pada sebuah prisma tegak segitiga adalah ....',
                                'explanation' => 'Prisma segitiga memiliki 9 rusuk.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '9 rusuk', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '6 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '8 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '12 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jumlah sisi pada limas segi empat adalah ....',
                                'explanation' => 'Limas segi empat memiliki 5 sisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '5 sisi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4 sisi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 sisi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '8 sisi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bangun ruang yang memiliki sisi alas dan tutup lingkaran berukuran sama dinamakan ....',
                                'explanation' => 'Tabung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tabung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kerucut', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah kerucut memiliki ... buah sisi.',
                                'explanation' => 'Kerucut memiliki 2 sisi (alas dan selimut).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '4', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Banyak rusuk pada bangun ruang bola adalah ....',
                                'explanation' => 'Bola tidak memiliki rusuk (0).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '0 rusuk', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '2 rusuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'tak terhingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jumlah titik sudut pada limas segitiga adalah ....',
                                'explanation' => 'Limas segitiga memiliki 4 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '4 titik sudut', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '5 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3 titik sudut', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bangun ruang yang memiliki SISI ALAS BERBENTUK LINGKARAN!',
                                'explanation' => 'Tabung dan kerucut beralas lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tabung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kerucut', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai jaring-jaring tabung!',
                                'explanation' => 'Jaring-jaring tabung: 2 lingkaran dan 1 persegi panjang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki dua lingkaran yang kongruen sebagai alas dan tutup.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Selimut tabung yang dibuka berbentuk persegi panjang.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Selimut tabung berbentuk juring lingkaran.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Memiliki empat sisi berbentuk segitiga.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan banyak sisinya!',
                                'explanation' => 'Banyak sisi bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => '5 sisi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => '3 sisi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kerucut', 'is_correct' => false, 'match_key' => '2 sisi', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan bentuk sisi alasnya!',
                                'explanation' => 'Bentuk alas bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => 'Lingkaran', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Prisma segitiga', 'is_correct' => false, 'match_key' => 'Segitiga', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => 'Segi empat (persegi/persegi panjang)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => 'Tidak memiliki alas datar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran sifat bangun ruang!',
                                'explanation' => 'Bola tidak memiliki titik puncak (0 titik puncak).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Prisma segi enam memiliki 12 titik sudut (2 x 6).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Limas segi lima memiliki 6 sisi (1 alas + 5 tegak).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bola memiliki 4 titik puncak.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Semua rusuk tegak pada prisma tegak lurus dengan sisi alasnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran jumlah unsur bangun ruang!',
                                'explanation' => 'Kerucut memiliki 1 rusuk lengkung (bukan rusuk lurus).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rusuk prisma segitiga ada 9 buah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Titik sudut limas segi empat ada 5 buah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung memiliki 2 rusuk lengkung.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kerucut memiliki 2 rusuk lurus.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak sisi pada bangun ruang prisma segitiga adalah ....',
                                'explanation' => '5 sisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '5', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak rusuk pada bangun ruang tabung adalah ... rusuk lengkung.',
                                'explanation' => '2 rusuk lengkung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '2', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak titik sudut pada bangun ruang kerucut adalah ... titik puncak.',
                                'explanation' => '1 titik puncak.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bangun ruang yang hanya memiliki 1 sisi lengkung dan tidak memiliki rusuk adalah ....',
                                'explanation' => 'bola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bola', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Selimut tabung jika dibentangkan pada jaring-jaring berbentuk ....',
                                'explanation' => 'persegi panjang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'persegi panjang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Banyak titik sudut pada prisma segitiga adalah ....',
                                'explanation' => '6 titik sudut.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '6', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sisi tegak pada bangun ruang limas selalu berbentuk ....',
                                'explanation' => 'segitiga.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'segitiga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan sifat-sifat lengkap dari bangun ruang TABUNG dan KERUCUT (meliputi banyak sisi, bentuk sisi, banyak rusuk, dan banyak titik sudut)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
1. Sifat-sifat Tabung:
- Memiliki 3 sisi (2 sisi datar lingkaran sebagai alas dan tutup yang kongruen, serta 1 sisi lengkung sebagai selimut tabung).
- Memiliki 2 rusuk lengkung.
- Tidak memiliki titik sudut (0 titik sudut).
2. Sifat-sifat Kerucut:
- Memiliki 2 sisi (1 sisi datar lingkaran sebagai alas dan 1 sisi lengkung sebagai selimut kerucut).
- Memiliki 1 rusuk lengkung pada tepian alas.
- Memiliki 1 titik sudut puncak.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Gambarkan sketsa jaring-jaring dari PRISMA SEGITIGA dan sebutkan bangun datar apa saja yang membentuk jaring-jaring tersebut serta jumlahnya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Jaring-jaring prisma segitiga terdiri atas:
1. Dua buah bangun datar segitiga yang kongruen (sama bentuk dan ukuran), yang berfungsi sebagai sisi alas dan sisi tutup prisma.
2. Tiga buah bangun datar persegi panjang (atau persegi), yang berfungsi sebagai sisi-sisi tegak yang menghubungkan rusuk-rusuk alas dan tutup.
Total bangun datar pembentuk jaring-jaring prisma segitiga adalah 5 buah bangun datar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan mengapa bangun ruang BOLA berbeda dari seluruh bangun ruang lainnya yang telah kamu pelajari di kelas 6 SD!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Alasan keunikan bola:
1. Bola hanya dibatasi oleh satu bidang sisi lengkung tertutup (kulit bola) dan tidak memiliki bidang datar sama sekali.
2. Bola tidak memiliki rusuk (0 rusuk) dan tidak memiliki titik sudut (0 titik sudut).
3. Bola memiliki satu titik pusat di bagian dalamnya di mana jarak dari titik pusat ke seluruh titik pada permukaan bola adalah sama panjang, yaitu jari-jari bola (r).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 2 Bab 4: Luas Permukaan Bangun Ruang Lanjutan',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 4 Quiz 2. Menguji perhitungan luas permukaan prisma, limas, tabung, kerucut, bola, dan bangun ruang gabungan dalam konteks nyata.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Melapisi Kaleng Biskuit Silinder dengan Kertas Kado', 'content' => '[Keterangan Gambar: Kaleng biskuit logam silinder dengan diameter 14 cm (jari-jari 7 cm) dan tinggi 20 cm yang sedang dilapisi kertas kado bermotif batik.]
Siswa kelas 6 memanfaatkan kaleng biskuit bekas menjadi wadah pensil dan celengan cantik dalam kegiatan daur ulang sampah anorganik. Kaleng biskuit berbentuk tabung dengan diameter 14 cm (jari-jari r = 7 cm) dan tinggi kaleng t = 20 cm.

Siti bertugas memotong kertas kado untuk melapisi seluruh permukaan luar kaleng tanpa celah. Siti menghitung luas permukaan tabung menggunakan rumus: Luas Permukaan = 2 x Luas Alas + Luas Selimut = 2 x (pi x r²) + (2 x pi x r x t) = 2 x pi x r x (r + t). Dengan nilai pi = 22/7, perhitungannya adalah: LP = 2 x 22/7 x 7 x (7 + 20) = 44 x 27 = 1.188 cm². Siti memotong kertas kado seluas 1.188 cm² sehingga pas menutupi alas, tutup, dan selimut kaleng. Ketelitian menghitung luas permukaan menghemat pemakaian kertas kado.'],
                            ['title' => 'Stimulus 2: Menghitung Luas Kain Tenda Limas Segi Empat', 'content' => '[Keterangan Gambar: Tenda perkemahan berbentuk limas segi empat beraturan dengan alas persegi berukuran 6 m x 6 m dan tinggi sisi tegak segitiga 5 meter.]
Regu Rajawali pramuka kelas 6 mendirikan tenda komando berbentuk limas segi empat beraturan. Alas tenda berukuran 6 meter x 6 meter (persegi), dan setiap sisi tegak segitiga memiliki panjang alas 6 meter dan tinggi segitiga (selimut) 5 meter.

Pembina pramuka meminta regu menghitung luas kain terpal parasut yang digunakan untuk membuat tenda tersebut (termasuk alas dan 4 dinding segitiga). Luas alas persegi = 6 m x 6 m = 36 m². Luas satu sisi tegak segitiga = 1/2 x alas x tinggi = 1/2 x 6 m x 5 m = 15 m². Karena terdapat 4 sisi tegak segitiga yang sama, luas seluruh dinding tegak adalah: 4 x 15 m² = 60 m². Luas permukaan total kain tenda adalah: Luas Alas + Luas 4 Segitiga = 36 m² + 60 m² = 96 m². Pemahaman luas permukaan memudahkan perkiraan kebutuhan bahan tekstil kemah.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, luas permukaan kaleng biskuit silinder tersebut adalah ....',
                                'explanation' => 'LP = 2 x 22/7 x 7 x (7 + 20) = 44 x 27 = 1.188 cm².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.188 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '880 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.200 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa luas selimut tabung saja dari kaleng biskuit tersebut?',
                                'explanation' => 'Luas selimut = 2 x pi x r x t = 2 x 22/7 x 7 x 20 = 880 cm².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '880 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '440 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai luas kaleng silinder!',
                                'explanation' => 'Alas+tutup = 2 x 154 = 308 cm²; Selimut = 880 cm². Total = 1.188 cm².',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Luas kedua lingkaran alas dan tutup kaleng adalah 308 cm² (2 x 154).', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Luas selimut kaleng biskuit adalah 880 cm².', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jari-jari kaleng biskuit adalah 14 cm.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tinggi kaleng biskuit adalah 7 cm.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran rumus luas permukaan tabung!',
                                'explanation' => 'Tabung tanpa tutup hanya memiliki 1 alas lingkaran (lebih kecil).',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas permukaan tabung utuh adalah 2 x pi x r x (r + t).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas selimut tabung adalah keliling alas dikali tinggi tabung.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung tanpa tutup memiliki luas yang sama dengan tabung tertutup.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Luas alas tabung berdiameter 14 cm adalah 154 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, luas total kain terpal yang dibutuhkan untuk tenda limas tersebut adalah ....',
                                'explanation' => 'Luas alas 36 m² + Luas 4 dinding 60 m² = 96 m².',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '96 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '60 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '36 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '120 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa meter persegi luas satu sisi tegak segitiga tenda tersebut?',
                                'explanation' => 'Luas segitiga = 1/2 x 6 x 5 = 15 m².',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '15 m²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '30 m²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '20 m²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '25 m²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bagian tenda limas dengan luasnya!',
                                'explanation' => 'Komponen luas tenda limas segi empat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas alas persegi (6 m x 6 m)', 'is_correct' => false, 'match_key' => '36 m²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas satu dinding segitiga (1/2 x 6 x 5)', 'is_correct' => false, 'match_key' => '15 m²', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas empat dinding segitiga', 'is_correct' => false, 'match_key' => '60 m²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Luas permukaan total tenda', 'is_correct' => false, 'match_key' => '96 m²', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan tenda pramuka!',
                                'explanation' => 'Tinggi sisi tegak adalah garis miring selimut (berbeda dari tinggi puncak ke alas).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas permukaan limas = Luas alas + Jumlah luas sisi tegak.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Banyak sisi tegak segitiga pada limas segi empat adalah 4 buah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tinggi sisi tegak segitiga sama persis dengan tinggi tenda di tengah.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Total kain yang dibutuhkan adalah 96 m².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas permukaan tabung tertutup dengan r = 7 cm dan t = 10 cm (pi = 22/7) adalah ....',
                                'explanation' => 'LP = 2 x 22/7 x 7 x (7 + 10) = 44 x 17 = 748 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '748 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '616 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '440 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '528 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas permukaan bola dengan jari-jari 7 cm (pi = 22/7, rumus LP = 4 x pi x r²) adalah ....',
                                'explanation' => 'LP = 4 x 22/7 x 7 x 7 = 4 x 154 = 616 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '616 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '154 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.232 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas selimut tabung dengan jari-jari 10 cm dan tinggi 15 cm (pi = 3,14) adalah ....',
                                'explanation' => '2 x 3,14 x 10 x 15 = 942 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '942 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '314 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '628 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.256 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas permukaan kerucut dengan r = 7 cm dan garis pelukis s = 13 cm (pi = 22/7, LP = pi x r x [r + s]) adalah ....',
                                'explanation' => '22/7 x 7 x (7 + 13) = 22 x 20 = 440 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '440 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '308 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '550 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah prisma segitiga memiliki luas alas 24 cm², keliling alas 24 cm, dan tinggi 10 cm. Luas permukaan prisma adalah ....',
                                'explanation' => 'LP = (2 x 24) + (24 x 10) = 48 + 240 = 288 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '288 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '240 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '264 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '300 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Luas permukaan kubus dengan panjang rusuk 8 cm adalah ....',
                                'explanation' => '6 x s² = 6 x 64 = 384 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '384 cm²', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '512 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '256 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '192 cm²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus luas permukaan bangun ruang yang BENAR!',
                                'explanation' => 'Tabung = 2 x pi x r x (r+t); Bola = 4 x pi x r².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Luas Permukaan Tabung = 2 x pi x r x (r + t)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Luas Permukaan Bola = 4 x pi x r²', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Luas Permukaan Kerucut = 2 x pi x r²', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Luas Permukaan Kubus = 4 x s²', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai luas selimut bangun ruang!',
                                'explanation' => 'Selimut tabung 2 x pi x r x t; selimut kerucut pi x r x s.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Luas selimut tabung dihitung dengan rumus 2 x pi x r x t.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Luas selimut kerucut dihitung dengan rumus pi x r x s.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Luas selimut tabung berbentuk juring lingkaran.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Luas selimut bola berbentuk persegi panjang.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan rumus luas permukaannya!',
                                'explanation' => 'Rumus luas permukaan bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kubus', 'is_correct' => false, 'match_key' => '6 x s²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Balok', 'is_correct' => false, 'match_key' => '2 x (p x l + p x t + l x t)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => '2 x pi x r x (r + t)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => '4 x pi x r²', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jari-jari bola dengan luas permukaannya (pi = 22/7)!',
                                'explanation' => 'Luas permukaan bola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'r = 7 cm', 'is_correct' => false, 'match_key' => '616 cm²', 'order' => 1],
                                    ['label' => null, 'option_text' => 'r = 14 cm', 'is_correct' => false, 'match_key' => '2.464 cm²', 'order' => 2],
                                    ['label' => null, 'option_text' => 'r = 21 cm', 'is_correct' => false, 'match_key' => '5.544 cm²', 'order' => 3],
                                    ['label' => null, 'option_text' => 'r = 10 cm (pi = 3,14)', 'is_correct' => false, 'match_key' => '1.256 cm²', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran konsep luas permukaan!',
                                'explanation' => 'Luas kubus = 6 x 5² = 150 cm² (125 cm³ adalah volumenya).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas permukaan adalah jumlah seluruh luas sisi yang membatasi bangun ruang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Luas permukaan bola adalah empat kali luas lingkaran berpusat sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas permukaan tabung tanpa tutup adalah pi x r x (r + 2t).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Luas permukaan kubus bersisi 5 cm adalah 125 cm².', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran perhitungan luas permukaan!',
                                'explanation' => 'Bola memiliki luas permukaan 4 x pi x r².',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tabung dengan r = 7 cm, t = 10 cm memiliki luas selimut 440 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Balok 10 cm x 5 cm x 4 cm memiliki luas permukaan 220 cm².', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Luas permukaan kubus selalu berupa kelipatan 6.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bola tidak memiliki luas permukaan.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rumus luas permukaan bola berjejari r adalah 4 x ... x r².',
                                'explanation' => 'pi (π).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas permukaan kubus dengan panjang rusuk 10 cm adalah ... cm².',
                                'explanation' => '6 x 100 = 600 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '600', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas selimut tabung dengan r = 7 cm dan t = 10 cm (pi = 22/7) adalah ... cm².',
                                'explanation' => '2 x 22/7 x 7 x 10 = 440 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '440', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas permukaan tabung dengan r = 7 cm dan t = 3 cm (pi = 22/7) adalah ... cm².',
                                'explanation' => '2 x 22/7 x 7 x (7+3) = 44 x 10 = 440 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '440', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas permukaan bola dengan r = 7 cm (pi = 22/7) adalah ... cm².',
                                'explanation' => '4 x 154 = 616 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '616', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Luas alas tabung dengan r = 10 cm (pi = 3,14) adalah ... cm².',
                                'explanation' => '3,14 x 100 = 314 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '314', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Balok berukuran 5 cm x 4 cm x 3 cm memiliki luas permukaan ... cm².',
                                'explanation' => '2 x (20 + 15 + 12) = 2 x 47 = 94 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '94', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah drum minyak berbentuk tabung tanpa tutup terbuat dari lembaran seng. Drum tersebut memiliki diameter 56 cm (jari-jari 28 cm) dan tinggi 100 cm. Hitunglah luas lembaran seng yang diperlukan untuk membuat drum tanpa tutup tersebut! (Gunakan pi = 22/7)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Tabung tanpa tutup memiliki 1 sisi alas lingkaran dan 1 selimut tabung (tanpa tutup atas).
2. Rumus: Luas = Luas Alas + Luas Selimut = (pi x r²) + (2 x pi x r x t)
3. Hitung luas alas:
   Luas alas = 22/7 x 28 x 28 = 22 x 4 x 28 = 2.464 cm².
4. Hitung luas selimut:
   Luas selimut = 2 x 22/7 x 28 x 100 = 2 x 22 x 4 x 100 = 17.600 cm².
5. Total luas seng:
   Total Luas = 2.464 + 17.600 = 20.064 cm² (atau 2,0064 m²).
Jadi, luas lembaran seng yang diperlukan adalah 20.064 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Hitunglah luas permukaan dari bangun ruang gabungan berikut:
Sebuah tabung dengan jari-jari r = 7 cm dan tinggi t = 10 cm yang pada bagian atasnya ditumpuk oleh sebuah belahan setengah bola dengan jari-jari sama (r = 7 cm). Bagian bawah tabung tertutup. (Gunakan pi = 22/7)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Bangun gabungan terdiri dari:
   - 1 alas lingkaran tabung bawah
   - Selimut tabung di tengah
   - Permukaan lengkung setengah bola di atas (bidang sentuh antara tabung dan bola berada di dalam, jadi tidak dihitung).
2. Hitung masing-masing luas permukaan luar:
   - Luas alas tabung = pi x r² = 22/7 x 7 x 7 = 154 cm².
   - Luas selimut tabung = 2 x pi x r x t = 2 x 22/7 x 7 x 10 = 440 cm².
   - Luas setengah bola = 1/2 x (4 x pi x r²) = 2 x pi x r² = 2 x 154 = 308 cm².
3. Jumlahkan total luas permukaan luar:
   Total LP = 154 + 440 + 308 = 902 cm².
Jadi, luas permukaan bangun gabungan tersebut adalah 902 cm².',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah kubah masjid berbentuk setengah bola berongga dengan diameter 14 meter (jari-jari 7 meter). Seluruh permukaan luar kubah akan dicat dengan cat pelindung khusus. Jika satu kaleng cat dapat menutup 22 m² permukaan kubah, berapa kaleng cat yang dibutuhkan untuk mengecat kubah tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Luas permukaan setengah bola berongga (hanya kulit luar):
   LP = 2 x pi x r² = 2 x 22/7 x 7 x 7 = 308 m².
2. Hitung banyak kaleng cat:
   Banyak kaleng = 308 m² : 22 m² per kaleng = 14 kaleng cat.
Jadi, dibutuhkan 14 kaleng cat untuk mengecat seluruh kubah masjid.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Quiz 3 Bab 4: Volume Bangun Ruang Lanjutan dan Gabungan',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Matematika Kelas 6 Bab 4 Quiz 3. Menguji perhitungan volume tabung, kerucut, limas, bola, dan bangun ruang gabungan dalam pemecahan masalah nyata.',
                'duration_minutes' => 60,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Menghitung Kapasitas Tangki Air Silinder Penampung Hujan', 'content' => '[Keterangan Gambar: Tangki air silinder vertikal penampung air hujan di sekolah dengan pipa inlet dan kran air bersih: Diameter tangki 1,4 meter (jari-jari 0,7 m) dan tinggi tangki 2 meter.]
Sebagai bagian dari program Sekolah Adiwiyata Mandiri, SD Harapan memasang instalasi pemanenan air hujan (rainwater harvesting) untuk menyiram tanaman dan membersihkan halaman. Air hujan dari atap dialirkan ke dalam tangki silinder besar.

Tangki tersebut memiliki diameter 1,4 meter (jari-jari r = 0,7 meter = 7 dm) dan tinggi tangki t = 2 meter = 20 dm. Siswa kelas 6 menghitung volume kapasitas maksimal tangki menggunakan rumus volume tabung: V = Luas Alas x Tinggi = pi x r² x t. Dengan nilai pi = 22/7, perhitungannya adalah: V = 22/7 x 7 dm x 7 dm x 20 dm = 22 x 7 x 20 = 3.080 dm³. Karena 1 dm³ = 1 liter, maka tangki silinder tersebut dapat menampung maksimal 3.080 liter air bersih. Mengetahui kapasitas tangki memastikan manajemen air sekolah tetap terjaga saat musim kemarau.'],
                            ['title' => 'Stimulus 2: Menghitung Volume Kerucut Tumpeng Selamatan', 'content' => '[Keterangan Gambar: Tumpeng nasi kuning tradisional berbentuk kerucut sempurna di atas tampah bambu berhias lauk pauk: Jari-jari alas tumpeng 14 cm dan tinggi tumpeng 30 cm.]
Pada peringatan Hari Kemerdekaan Republik Indonesia, siswa kelas 6 bersama orang tua memasak tumpeng nasi kuning berbentuk kerucut berukuran besar untuk lomba antarkelas. Cetakan tumpeng memiliki jari-jari alas r = 14 cm dan tinggi kerucut t = 30 cm.

Ketua kelas, Fajar, menghitung volume cetakan tumpeng menggunakan rumus volume kerucut: V = 1/3 x pi x r² x t. Dengan nilai pi = 22/7, perhitungannya adalah: V = 1/3 x 22/7 x 14 x 14 x 30 = 1/3 x 616 x 30 = 616 x 10 = 6.160 cm³. Jika setiap porsi makan anak membutuhkan 154 cm³ nasi kuning, maka satu cetakan tumpeng kerucut tersebut dapat dibagi rata menjadi 6.160 : 154 = 40 porsi hidangan. Perhitungan volume kerucut membantu memastikan seluruh siswa mendapatkan porsi makanan yang cukup.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 1, kapasitas maksimal air yang dapat ditampung dalam tangki silinder adalah ....',
                                'explanation' => 'V = 22/7 x 7 x 7 x 20 = 3.080 liter (dm³).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3.080 liter', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.540 liter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6.160 liter', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '3.800 liter', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Rumus matematika yang digunakan untuk mencari volume tabung adalah ....',
                                'explanation' => 'Volume tabung = Luas alas x tinggi = pi x r² x t.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'V = pi x r² x t', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'V = 2 x pi x r x t', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'V = 1/3 x pi x r² x t', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'V = 4/3 x pi x r³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pernyataan yang BENAR mengenai kapasitas tangki air di Stimulus 1!',
                                'explanation' => 'r = 0,7 m = 7 dm; 1 dm³ = 1 liter.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jari-jari tangki air dalam satuan desimeter adalah 7 dm.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Satu desimeter kubik (1 dm³) bernilai sama dengan satu liter air.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kapasitas tangki air adalah 10.000 liter.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tinggi tangki air adalah 200 desimeter.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perhitungan tangki air hujan!',
                                'explanation' => 'Volume tabung adalah tiga kali volume kerucut berukuran sama.',
                                'group_index' => 0,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume tabung diperoleh dari luas alas dikalikan tinggi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kapasitas tangki adalah 3.080 liter air.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tinggi tangki 2 meter sama dengan 20 dm.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Volume tabung selalu sama dengan volume kerucut yang berukuran sama.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan Stimulus 2, volume nasi kuning tumpeng berbentuk kerucut tersebut adalah ....',
                                'explanation' => 'V = 1/3 x 22/7 x 14 x 14 x 30 = 6.160 cm³.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '6.160 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '18.480 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3.080 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.540 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berapa banyak porsi hidangan yang dapat disajikan jika setiap porsi berukuran 154 cm³?',
                                'explanation' => '6.160 : 154 = 40 porsi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '40 porsi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '30 porsi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '50 porsi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '45 porsi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan rumus volumenya!',
                                'explanation' => 'Rumus volume bangun ruang.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tabung', 'is_correct' => false, 'match_key' => 'V = pi x r² x t', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kerucut', 'is_correct' => false, 'match_key' => 'V = 1/3 x pi x r² x t', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bola', 'is_correct' => false, 'match_key' => 'V = 4/3 x pi x r³', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Limas segi empat', 'is_correct' => false, 'match_key' => 'V = 1/3 x Luas Alas x t', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perbandingan volume bangun ruang!',
                                'explanation' => 'Satu porsi adalah 154 cm³ (6.160 cm³ adalah total seluruh tumpeng).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Volume kerucut adalah sepertiga dari volume tabung berukuran sama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Volume tumpeng kerucut adalah 6.160 cm³.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Satu porsi tumpeng adalah 6.160 cm³.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tinggi tumpeng adalah 30 cm.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm (pi = 22/7) adalah ....',
                                'explanation' => 'V = 22/7 x 49 x 10 = 1.540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.540 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.450 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '3.080 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '770 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 9 cm (pi = 22/7) adalah ....',
                                'explanation' => '1/3 x 154 x 9 = 154 x 3 = 462 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '462 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.386 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '308 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '616 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume bola dengan jari-jari 21 cm (pi = 22/7, V = 4/3 x pi x r³) adalah ....',
                                'explanation' => '4/3 x 22/7 x 21 x 21 x 21 = 4 x 22 x 21 x 21 = 38.808 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '38.808 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '19.404 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '9.702 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '48.510 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Volume limas segi empat dengan alas persegi berukuran 10 cm x 10 cm dan tinggi 12 cm adalah ....',
                                'explanation' => '1/3 x 100 x 12 = 400 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '400 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.200 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '600 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '300 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah kubus memiliki panjang rusuk 12 cm. Volume kubus tersebut adalah ....',
                                'explanation' => '12 x 12 x 12 = 1.728 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '1.728 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '1.440 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '1.200 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1.800 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sebuah prisma segitiga memiliki luas alas 30 cm² dan tinggi 15 cm. Volume prisma adalah ....',
                                'explanation' => 'V = 30 x 15 = 450 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '450 cm³', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '300 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '150 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '600 cm³', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA rumus volume yang memiliki pengali 1/3!',
                                'explanation' => 'Kerucut dan limas memiliki faktor 1/3.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Volume Kerucut (1/3 x pi x r² x t)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Volume Limas (1/3 x Luas Alas x t)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Volume Tabung (pi x r² x t)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Volume Balok (p x l x t)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA hubungan volume bangun ruang yang BENAR!',
                                'explanation' => '3 volume kerucut = 1 tabung; volume bola = 4/3 pi r³ = 2 x (1/3 pi r² x 2r).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tiga kerucut penuh air dapat mengisi satu tabung berukuran sama.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Volume bola berjari-jari r adalah dua kali volume kerucut berjari-jari r dan tinggi 2r.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Volume tabung selalu lebih kecil dari volume kerucut.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Volume kubus berbanding lurus dengan keliling alasnya.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan ukuran tabung dengan volumenya (pi = 22/7)!',
                                'explanation' => 'Volume tabung variasi ukuran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'r = 7 cm, t = 10 cm', 'is_correct' => false, 'match_key' => '1.540 cm³', 'order' => 1],
                                    ['label' => null, 'option_text' => 'r = 7 cm, t = 20 cm', 'is_correct' => false, 'match_key' => '3.080 cm³', 'order' => 2],
                                    ['label' => null, 'option_text' => 'r = 14 cm, t = 10 cm', 'is_correct' => false, 'match_key' => '6.160 cm³', 'order' => 3],
                                    ['label' => null, 'option_text' => 'r = 14 cm, t = 5 cm', 'is_correct' => false, 'match_key' => '3.080 cm³', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bangun ruang dengan satuannya yang tepat!',
                                'explanation' => 'Besaran dan satuan bangun ruang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Luas Permukaan', 'is_correct' => false, 'match_key' => 'cm² (sentimeter persegi)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Volume / Kapasitas', 'is_correct' => false, 'match_key' => 'cm³ atau liter (desimeter kubik)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Panjang Rusuk', 'is_correct' => false, 'match_key' => 'cm (sentimeter)', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Keliling Alas', 'is_correct' => false, 'match_key' => 'cm (sentimeter)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran konsep volume bangun ruang!',
                                'explanation' => 'Volume tabung dicari dengan mengalikan luas alas dengan tinggi.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '1 liter air sama dengan 1.000 mililiter (atau 1 dm³).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '1 meter kubik (1 m³) sama dengan 1.000 liter.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Volume tabung dapat dicari dengan membagi luas alas dengan tinggi.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Volume kerucut adalah sepertiga dari luas alas kali tinggi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan kebenaran perhitungan volume kubus dan balok!',
                                'explanation' => 'Dimensi balok bisa bermacam-macam kombinasi faktor 60 (misal 3 x 4 x 5).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kubus rusuk 5 cm memiliki volume 125 cm³.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Balok 10 cm x 8 cm x 5 cm memiliki volume 400 cm³.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kubus rusuk 10 cm memiliki volume 1.000 cm³ (1 liter).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Balok dengan volume 60 cm³ selalu berukuran 1 cm x 1 cm x 60 cm.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 4],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume tabung dengan r = 7 cm dan t = 10 cm adalah ... cm³.',
                                'explanation' => '1540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1540', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume kerucut dengan r = 7 cm dan t = 30 cm adalah ... cm³.',
                                'explanation' => '1/3 x 154 x 30 = 1540 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1540', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Rumus volume kerucut adalah 1/3 x Luas ... x tinggi.',
                                'explanation' => 'alas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'alas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '1 desimeter kubik (dm³) setara dengan ... liter.',
                                'explanation' => '1 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '1', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume kubus dengan panjang rusuk 6 cm adalah ... cm³.',
                                'explanation' => '6 x 6 x 6 = 216 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '216', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sebuah bak air berbentuk balok berukuran 10 dm x 8 dm x 5 dm dapat menampung ... liter air.',
                                'explanation' => '10 x 8 x 5 = 400 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '400', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Volume prisma segitiga dengan luas alas 25 cm² dan tinggi 8 cm adalah ... cm³.',
                                'explanation' => '25 x 8 = 200 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '200', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau alasan logis yang lengkap.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah bak penampungan air berbentuk tabung dengan diameter 140 cm (jari-jari 70 cm = 7 dm) dan tinggi 150 cm (15 dm). Bak tersebut mula-mula terisi air 2/5 bagian. Berapa liter air yang harus ditambahkan agar bak penampungan tersebut terisi penuh sampai ke bibir atas? (Gunakan pi = 22/7)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Hitung volume total bak tabung:
   r = 7 dm, t = 15 dm.
   V total = pi x r² x t = 22/7 x 7 x 7 x 15 = 154 x 15 = 2.310 dm³ = 2.310 liter.
2. Hitung bagian air yang perlu ditambahkan:
   Air yang belum terisi = 1 - 2/5 = 3/5 bagian.
3. Hitung volume air yang harus ditambahkan:
   Air tambahan = 3/5 x 2.310 liter = 3 x 462 = 1.386 liter.
Jadi, air yang harus ditambahkan adalah 1.386 liter.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah mainan kayu berbentuk bangun ruang gabungan: Bagian bawah berbentuk tabung dengan jari-jari r = 7 cm dan tinggi t = 10 cm, sedangkan bagian atasnya berupa kerucut dengan jari-jari alas sama (r = 7 cm) dan tinggi kerucut t = 6 cm. Tentukan volume total mainan kayu tersebut! (Gunakan pi = 22/7)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Hitung volume tabung:
   V tabung = pi x r² x t = 22/7 x 7 x 7 x 10 = 154 x 10 = 1.540 cm³.
2. Hitung volume kerucut:
   V kerucut = 1/3 x pi x r² x t kerucut
             = 1/3 x 22/7 x 7 x 7 x 6 = 1/3 x 154 x 6 = 154 x 2 = 308 cm³.
3. Hitung volume total gabungan:
   V total = V tabung + V kerucut = 1.540 + 308 = 1.848 cm³.
Jadi, volume total mainan kayu tersebut adalah 1.848 cm³.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebuah wadah berbentuk bola pejal terbuat dari lilin padat dengan jari-jari 7 cm. Lilin tersebut dilelehkan seluruhnya dan dicetak ulang menjadi beberapa kerucut lilin hias kecil dengan jari-jari alas 7 cm dan tinggi 4 cm. Berapa banyak kerucut lilin kecil yang dapat dibuat dari lelehan bola lilin tersebut?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Langkah penyelesaian:
1. Volume bola = 4/3 x pi x r³ = 4/3 x 22/7 x 7 x 7 x 7 = 4/3 x 1.078 = 4.312 / 3 cm³.
2. Volume satu kerucut kecil = 1/3 x pi x r² x t = 1/3 x 22/7 x 7 x 7 x 4 = 1/3 x 154 x 4 = 616 / 3 cm³.
3. Banyak kerucut yang dihasilkan = Volume bola : Volume kerucut
   = (4.312 / 3) : (616 / 3) = 4.312 : 616 = 7 buah kerucut.
Jadi, dapat dibuat 7 buah kerucut lilin hias kecil.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
