<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6Bab3Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 3 Bahasa Indonesia Kelas 6 (Paket 1 - Teks Laporan Hasil Observasi)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 3 bagian 1: Menganalisis teks LHO, struktur definisi umum dan deskripsi bagian, serta menyajikan fakta objektif fauna langka.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Laporan Observasi Ekosistem Taman Nasional Komodo', 'content' => '[Keterangan Gambar: Komodo jantan dewasa berukuran panjang sekitar 2,8 meter sedang berjemur di bawah naungan pohon asam di sabana savana Pulau Rinca, Nusa Tenggara Timur.]

Taman Nasional Komodo yang terletak di wilayah Nusa Tenggara Timur didirikan pada tahun 1980 dan telah ditetapkan oleh UNESCO sebagai Situs Warisan Dunia. Kawasan konservasi ini terdiri atas tiga pulau besar, yaitu Pulau Komodo, Pulau Rinca, dan Pulau Padar, serta puluhan pulau kecil lainnya.

Berdasarkan hasil observasi biologis, komodo (*Varanus komodoensis*) adalah spesies kadal terbesar di dunia yang masih bertahan hidup hingga saat ini. Panjang tubuh komodo jantan dapat mencapai lebih dari tiga meter dengan bobot berkisar antara 70 hingga 90 kilogram. Kulit komodo berwarna abu-abu bersisik kasar yang berfungsi sebagai kamuflase alami di padang sabana. Komodo memiliki lidah bercabang dua berwarna kuning yang selalu menjulur keluar untuk mendeteksi bau mangsa dan partikel di udara melalui organ Jacobson. Sebagai predator puncak, komodo memangsa rusa timor, babi hutan, serta kerbau air. Pelestarian ekosistem Taman Nasional Komodo sangat penting guna mencegah kepunahan satwa endemik kebanggaan Indonesia tersebut.'],
                            ['title' => 'Stimulus 2: Struktur Teks Laporan Hasil Observasi (LHO)', 'content' => '[Keterangan Gambar: Bagan piramida struktur teks Laporan Hasil Observasi (LHO): 1. Pernyataan Umum/Definisi Umum (klasifikasi dan pengantar objek), 2. Deskripsi Bagian (perincian aspek fisik, perilaku, habitat), 3. Deskripsi Manfaat/Simpulan (kegunaan dan arti penting pelestarian).]

Teks Laporan Hasil Observasi (LHO) adalah teks yang menyajikan informasi secara ilmiah dan faktual berdasarkan pengamatan langsung di lapangan. Berbeda dengan teks rekaan fiksi, teks LHO harus bersifat objektif, sistematis, dan bebas dari opini pribadi yang tidak berdasar. Kalimat definisi yang ditandai kata adalah, merupakan, atau yaitu lazim digunakan pada paragraf pembuka untuk mengenalkan objek yang diobservasi kepada pembaca.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks LHO di atas, organ khusus yang membantu komodo mendeteksi bau mangsa di udara adalah ....',
                                'explanation' => 'Dalam teks: "lidah bercabang dua berwarna kuning... untuk mendeteksi bau mangsa melalui organ Jacobson."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Lidah bercabang dua dan organ Jacobson', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mata faset bersudut lebar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Telinga dalam berselaput getar', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sisik kasar di sekujur punggung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama didirikannya kawasan konservasi Taman Nasional Komodo adalah ....',
                                'explanation' => 'Kawasan konservasi bertujuan melestarikan satwa endemik dan ekosistem aslinya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Melestarikan populasi satwa endemik komodo dan ekosistem alaminya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjadikan seluruh pulau sebagai area perumahan modern', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Membuka tambang nikel dan batubara terbesar di NTT', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membiakkan komodo di kandang sirkus keliling', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA pulau besar yang termasuk dalam kawasan Taman Nasional Komodo!',
                                'explanation' => 'Kawasan terdiri atas Pulau Komodo, Pulau Rinca, Pulau Padar, dan pulau-pulau kecil sekitarnya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pulau Komodo', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pulau Rinca', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pulau Kalimantan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pulau Madura', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek biologis komodo di kolom kiri dengan keterangannya di kolom kanan!',
                                'explanation' => 'Pasangan aspek biologi komodo.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nama Ilmiah', 'is_correct' => false, 'match_key' => 'Varanus komodoensis', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Ciri Lidah', 'is_correct' => false, 'match_key' => 'Bercabang dua berwarna kuning', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Fungsi Kulit Bersisik', 'is_correct' => false, 'match_key' => 'Kamuflase alami di padang sabana', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mangsa Utama', 'is_correct' => false, 'match_key' => 'Rusa timor, babi hutan, dan kerbau air', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri utama yang membedakan teks LHO dari teks fiksi atau cerpen adalah ....',
                                'explanation' => 'Teks LHO bersifat faktual, objektif, dan ilmiah berdasarkan pengamatan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berisi informasi faktual, ilmiah, dan objektif berdasarkan pengamatan nyata', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mengandung alur cerita fantasi dengan tokoh khayalan sakti', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggunakan bahasa santai sehari-hari penuh canda tawa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengutamakan sudut pandang subjektif perasaan penulis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata penanda kalimat definisi yang lazim digunakan pada bagian pernyataan umum teks LHO adalah ....',
                                'explanation' => 'Kalimat definisi ditandai oleh kata adalah, merupakan, yaitu.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Adalah, merupakan, dan yaitu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tetapi, melainkan, dan sedangkan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meskipun, kendatipun, dan walaupun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Setelah, kemudian, dan lalu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran struktur teks Laporan Hasil Observasi!',
                                'explanation' => 'Teks LHO wajib faktual dan dilarang memuat informasi rekayasa.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pernyataan umum berisi klasifikasi atau pengenalan awal objek observasi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Deskripsi bagian memaparkan perincian detail mengenai ciri fisik dan habitat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks LHO boleh memuat rekayasa cerita yang tidak ada buktinya di lapangan.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian teks LHO yang memaparkan kegunaan atau manfaat objek bagi kehidupan dinamakan bagian ....',
                                'explanation' => 'Bagian manfaat disebut deskripsi manfaat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Deskripsi manfaat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pernyataan umum', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Komplikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orientasi cerita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang merupakan contoh kalimat definisi adalah ....',
                                'explanation' => 'Penggunaan kata "merupakan" mencirikan kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Badak bercula satu merupakan mamalia langka yang dilindungi di Taman Nasional Ujung Kulon.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Badak itu berjalan lambat menyusuri hutan rawa pandan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah kamu pernah melihat cula badak secara langsung?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Alangkah gagahnya badak yang berendam di kubangan lumpur itu!', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Fakta ilmiah yang disajikan dalam teks LHO harus dapat diuji kebenarannya secara ....',
                                'explanation' => 'Fakta harus dapat diuji secara objektif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Objektif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Subjektif', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Imajinatif', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Spekulatif', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Objek berikut yang paling tepat dijadikan bahan penulisan teks LHO adalah ....',
                                'explanation' => 'Keanekaragaman flora dapat diobservasi secara ilmiah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Keanekaragaman flora di Kebun Raya Bogor', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mimpi seseorang terbang ke planet Mars', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Cerita hantu penunggu jembatan tua', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Khayalan anak yang memiliki sayap emas', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penggunaan data angka dan ukuran dalam teks LHO berfungsi untuk ....',
                                'explanation' => 'Data angka memberikan keakuratan faktual.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memperkuat akurasi dan kebenaran fakta yang dilaporkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membuat pembaca merasa bingung menghitung', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menghemat penggunaan kata-kata dalam paragraf', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menggantikan peran seluruh kalimat penjelasan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sinonim dari kata "endemik" dalam konteks fauna nusantara adalah ....',
                                'explanation' => 'Endemik berarti khas terbatas pada daerah tertentu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Khas atau hanya ditemukan di wilayah geografis tertentu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Berasal dari luar negeri yang diimpor', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dapat hidup di sembarang tempat di seluruh dunia', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sudah punah ratusan tahun yang lalu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata "konservasi" memiliki arti yang berkaitan erat dengan kegiatan ....',
                                'explanation' => 'Konservasi berarti perlindungan dan pelestarian alam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perlindungan dan pelestarian alam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penangkapan hewan liar secara massal', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penebangan hutan untuk pembukaan pabrik', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pembangunan gedung pencakar langit', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri bahasa teks Laporan Hasil Observasi!',
                                'explanation' => 'Teks LHO menggunakan istilah ilmiah dan kalimat definisi/deskripsi faktual.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan istilah-istilah ilmiah bidang biologi atau geografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menggunakan kalimat definisi dan deskripsi faktual', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggunakan kata-kata kiasan majas hiperbola yang dramatis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Banyak menggunakan kalimat perintah dan bujukan emosional', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA satwa endemik Indonesia yang dilindungi di taman nasional!',
                                'explanation' => 'Orang utan dan badak jawa adalah satwa endemik Indonesia.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orang utan di Taman Nasional Tanjung Puting', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Badak jawa di Taman Nasional Ujung Kulon', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Singa afrika di padang savana Serengeti', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Beruang kutub di lingkar Arktik utara', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nama taman nasional di sebelah kiri dengan satwa yang dilindunginya di sebelah kanan!',
                                'explanation' => 'Pasangan taman nasional dan satwa kuncinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Taman Nasional Ujung Kulon', 'is_correct' => false, 'match_key' => 'Badak bercula satu (badak jawa)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Taman Nasional Tanjung Puting', 'is_correct' => false, 'match_key' => 'Orang utan kalimantan', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Taman Nasional Komodo', 'is_correct' => false, 'match_key' => 'Kadal purba komodo', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Taman Nasional Way Kambas', 'is_correct' => false, 'match_key' => 'Gajah sumatra', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan struktur teks LHO dengan fungsinya!',
                                'explanation' => 'Pasangan struktur teks LHO.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pernyataan Umum', 'is_correct' => false, 'match_key' => 'Mengenalkan nama ilmiah dan klasifikasi umum objek', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Deskripsi Bagian', 'is_correct' => false, 'match_key' => 'Menjelaskan perincian bentuk fisik, perilaku, dan habitat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Deskripsi Manfaat', 'is_correct' => false, 'match_key' => 'Menguraikan fungsi dan peran objek bagi lingkungan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Simpulan', 'is_correct' => false, 'match_key' => 'Rangkuman akhir penilaian peneliti terhadap objek', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran teks Laporan Hasil Observasi!',
                                'explanation' => 'Teks LHO mengutamakan objektivitas fakta lapangan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks LHO disusun setelah melakukan pengamatan lapangan secara langsung.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pendapat pribadi penulis yang emosional diutamakan dalam teks LHO.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Informasi dalam teks LHO harus sesuai dengan kenyataan yang sebenarnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran istilah biogeografi!',
                                'explanation' => 'Taman Nasional Ujung Kulon berada di ujung barat Pulau Jawa (Provinsi Banten).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Fauna tipe Asiatis di Indonesia bagian barat dipisahkan oleh Garis Wallace.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Komodo termasuk jenis reptil yang bertelur (ovipar).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Taman Nasional Ujung Kulon terletak di provinsi Jawa Timur.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Teks yang berisi laporan ilmiah berdasarkan pengamatan langsung disebut teks laporan hasil ....',
                                'explanation' => 'Laporan hasil observasi (LHO).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'observasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat yang menjelaskan pengertian suatu istilah atau objek disebut kalimat ....',
                                'explanation' => 'Kalimat definisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'definisi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sifat teks LHO yang menyajikan kenyataan apa adanya tanpa dipengaruhi perasaan pribadi disebut ....',
                                'explanation' => 'Objektif menyajikan fakta sebenarnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'objektif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Spesies hewan atau tumbuhan yang hanya ditemukan secara alami di suatu daerah tertentu disebut flora/fauna ....',
                                'explanation' => 'Endemik khas wilayah tertentu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'endemik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Taman Nasional Ujung Kulon di Banten terkenal sebagai habitat perlindungan satwa langka badak bercula ....',
                                'explanation' => 'Badak jawa bercula satu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'satu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Badan dunia di bawah naungan PBB yang menetapkan situs warisan dunia adalah ....',
                                'explanation' => 'UNESCO menetapkan World Heritage Site.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'UNESCO', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Struktur teks LHO yang menjelaskan perincian bagian-bagian objek disebut bagian deskripsi ....',
                                'explanation' => 'Deskripsi bagian.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bagian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan dan jelaskan tiga struktur utama penyusun teks Laporan Hasil Observasi (LHO), serta berikan contoh kalimat untuk masing-masing bagian tersebut bertema pelestarian badak jawa!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pernyataan Umum / Definisi Umum: Mengenalkan objek observasi dan klasifikasinya.
   - Contoh: "Badak jawa (Rhinoceros sondaicus) merupakan salah satu mamalia darat paling langka di dunia yang dilindungi di Taman Nasional Ujung Kulon, Banten."
2. Deskripsi Bagian: Merinci ciri fisik, ukuran tubuh, makanan, dan habitat objek.
   - Contoh: "Badak jawa dewasa memiliki bobot tubuh mencapai 1,5 ton dengan satu buah cula di bagian moncongnya yang berukuran panjang sekitar 20-25 cm. Kulitnya tebal berwarna abu-abu dengan lipatan-lipatan menyerupai baju zirah perang."
3. Deskripsi Manfaat / Simpulan: Menguraikan fungsi dan nilai penting objek bagi kehidupan dan keseimbangan ekosistem.
   - Contoh: "Sebagai pemakan pucuk daun dan ranting semak, badak jawa berperan penting menjaga regenerasi vegetasi hutan hujan tropis dataran rendah. Upaya konservasi ketat mutlak diperlukan agar kepunahannya dapat dicegah."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Mengapa bahasa dalam teks LHO harus menggunakan ragam baku, lugas, dan bebas dari opini pribadi subjektif? Jelaskan dampaknya jika sebuah laporan observasi memuat opini atau dugaan yang keliru!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Alasan: Karena teks LHO adalah karya tulis ilmiah faktual yang menjadi rujukan data bagi peneliti, akademisi, dan masyarakat. Bahasa baku dan lugas menjamin penyampaian informasi tidak multitafsir (jelas dan pasti).
2. Dampak jika memuat opini keliru: Dapat menyesatkan pembaca, menurunkan kredibilitas penelitian, serta berisiko menyebabkan pengambilan kebijakan konservasi yang salah (misalnya penanganan habitat yang keliru karena data populasi tidak akurat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah satu paragraf deskripsi bagian teks LHO tentang pohon Cendana di Nusa Tenggara Timur dengan menggunakan minimal dua data angka dan satu istilah ilmiah botani!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Paragraf:
"Pohon cendana (*Santalum album*) merupakan tumbuhan berkayu hemiparasit yang dapat tumbuh hingga mencapai ketinggian 12 hingga 15 meter dengan diameter batang sekitar 30 sampai 40 sentimeter. Bagian teras kayu (*heartwood*) dan akarnya mengandung minyak asiri santalol dengan kadar mencapai 4 hingga 8 persen, yang menghasilkan aroma wangi semerbak khas dan bernilai ekonomis sangat tinggi di pasar internasional."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 3 Bahasa Indonesia Kelas 6 (Paket 2 - Infografis & Literasi Data)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 3 bagian 2: Membaca dan menafsirkan data infografis, tabel berkala, dan diagram konservasi keanekaragaman hayati.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Infografis Status Keterancaman Satwa Kunci Indonesia', 'content' => '[Keterangan Gambar: Infografis batang horizontal data estimasi populasi 4 satwa kunci di alam liar menurut Kementerian LHK tahun 2026: 1. Orangutan Sumatra (13.500 ekor), 2. Gajah Sumatra (1.800 ekor), 3. Harimau Sumatra (450 ekor), 4. Badak Jawa (76 ekor). Diagram disertai simbol status konservasi IUCN: Kritis / Critically Endangered.]

Infografis menyajikan informasi kompleks melalui perpaduan teks ringkas, grafik visual, dan simbol warna agar mudah dipahami pembaca secara cepat dan akurat. Dari data grafik batang tersebut, badak jawa menempati status paling kritis dengan jumlah individu yang hanya tersisa 76 ekor di habitat alaminya di Semenanjung Ujung Kulon. Ancaman utama penyusutan populasi satwa kunci meliputi penyempitan habitat akibat alih fungsi lahan hutan, fragmentasi koridor satwa, serta perburuan liar. Upaya penyelamatan habitat dan patroli perlindungan ketat menjadi prioritas mutlak.'],
                            ['title' => 'Stimulus 2: Menafsirkan Data Tabel Kunjungan Wisatawan Situs Warisan Budaya', 'content' => '[Keterangan Gambar: Tabel rekapitulasi data kunjungan wisatawan ke Candi Borobudur selama 3 bulan pertama tahun 2026: Januari (wisatawan domestik: 120.000, mancanegara: 15.000); Februari (domestik: 95.000, mancanegara: 12.000); Maret (domestik: 140.000, mancanegara: 18.000). Total kunjungan Maret mencapai 158.000 orang.]

Tabel adalah susunan baris dan kolom yang digunakan untuk mengelompokkan data secara teratur dan sistematis. Membaca tabel memerlukan ketelitian dalam mencocokkan judul kolom (kategori vertikal) dengan judul baris (kategori horizontal). Melalui tabel, pembaca dapat membuat perbandingan angka antarperiode, melihat pola kenaikan atau penurunan, serta menarik simpulan umum terhadap fenomena yang diteliti tanpa harus membaca uraian narasi yang panjang.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan data infografis Stimulus 1, satwa kunci dengan estimasi jumlah populasi paling sedikit di alam liar adalah ....',
                                'explanation' => 'Badak jawa hanya tersisa 76 ekor (paling sedikit).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Badak jawa (76 ekor)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Harimau sumatra (450 ekor)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Gajah sumatra (1.800 ekor)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orangutan sumatra (13.500 ekor)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Fungsi utama penyajian data populasi satwa dalam bentuk infografis visual adalah ....',
                                'explanation' => 'Infografis memudahkan pembaca memahami data kuantitatif secara visual.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memudahkan pembaca memahami data kuantitatif secara cepat, menarik, dan informatif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menghilangkan data penting agar pembaca menebak-nebak', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggantikan peran seluruh undang-undang konservasi hutan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membuat biaya percetakan buku pelajaran menjadi lebih murah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA faktor utama penyebab penyusutan populasi satwa liar menurut wacana!',
                                'explanation' => 'Penyempitan habitat dan perburuan liar adalah ancaman utama.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penyempitan habitat hutan akibat alih fungsi lahan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Perburuan liar dan perdagangan ilegal satwa', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Terlalu banyaknya pasokan makanan alami di hutan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hujan lebat yang menyuburkan tanaman hutan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan nama satwa kunci dengan estimasi populasinya pada data grafik!',
                                'explanation' => 'Pasangan satwa dan estimasi populasinya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Orangutan Sumatra', 'is_correct' => false, 'match_key' => '13.500 ekor', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Gajah Sumatra', 'is_correct' => false, 'match_key' => '1.800 ekor', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Harimau Sumatra', 'is_correct' => false, 'match_key' => '450 ekor', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Badak Jawa', 'is_correct' => false, 'match_key' => '76 ekor', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan data tabel pada Stimulus 2, jumlah kunjungan wisatawan domestik tertinggi terjadi pada bulan ....',
                                'explanation' => 'Wisatawan domestik tertinggi pada bulan Maret yaitu 140.000 orang.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Maret (140.000 orang)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Januari (120.000 orang)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Februari (95.000 orang)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Desember (80.000 orang)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Total seluruh wisatawan (domestik dan mancanegara) yang berkunjung ke Candi Borobudur pada bulan Januari adalah ....',
                                'explanation' => 'Total Januari = 120.000 + 15.000 = 135.000 orang.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '135.000 orang', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '107.000 orang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '158.000 orang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '120.000 orang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penafsiran data tabel kunjungan wisatawan!',
                                'explanation' => 'Wisatawan domestik selalu lebih banyak dibanding mancanegara. Maret adalah bulan tertinggi.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kunjungan wisatawan mengalami penurunan dari bulan Januari ke Februari.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Jumlah wisatawan mancanegara selalu lebih banyak dibanding wisatawan domestik.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bulan Maret mencatat total kunjungan tertinggi selama triwulan pertama.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Simpulan yang tepat mengenai tren kunjungan wisatawan pada triwulan pertama adalah ....',
                                'explanation' => 'Tren menurun di Februari lalu melonjak tinggi di Maret.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kunjungan sempat menurun pada bulan Februari, namun melonjak drastis pada bulan Maret', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kunjungan terus menurun drastis dari bulan ke bulan tanpa kenaikan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jumlah kunjungan setiap bulan selalu sama persis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tidak ada wisatawan mancanegara yang berkunjung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagan visual yang menyajikan perbandingan data dalam bentuk lingkaran berpotongan sektor disebut ....',
                                'explanation' => 'Diagram lingkaran menyajikan data per sektor sudut/persen.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diagram lingkaran (pie chart)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Grafik garis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Diagram batang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tabel frekuensi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Grafik garis paling tepat digunakan untuk menggambarkan data yang menunjukkan ....',
                                'explanation' => 'Grafik garis cocok untuk data berkesinambungan (time-series).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perkembangan atau perubahan data secara kontinu dari waktu ke waktu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Perbandingan jenis kelamin anggota kelompok', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Daftar nama benda mati di dalam kelas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Letak koordinat geografis pulau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Langkah pertama yang benar dalam membaca grafik batang adalah membaca ....',
                                'explanation' => 'Membaca judul dan label sumbu adalah langkah utama memahami grafik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Judul grafik dan keterangan sumbu horizontal serta vertikal', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Warna latar belakang grafik yang paling gelap', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Angka yang paling kecil di sudut kiri bawah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Komentar orang lain di media sosial', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dalam diagram batang, sumbu vertikal (sumbu tegak) biasanya memuat data mengenai ....',
                                'explanation' => 'Sumbu tegak umumnya menunjukkan jumlah/frekuensi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Frekuensi atau jumlah kuantitas nilai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kategori nama bulan atau jenis benda', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nama pencetak grafik', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Harga kertas gambar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pernyataan yang sesuai jika sebuah grafik menunjukkan batang bulan Mei lebih tinggi dari bulan Juni adalah ....',
                                'explanation' => 'Batang lebih tinggi mencerminkan kuantitas lebih besar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Jumlah pada bulan Mei lebih banyak daripada bulan Juni', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jumlah pada bulan Mei lebih sedikit daripada bulan Juni', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bulan Mei tidak memiliki data yang valid', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bulan Juni mencatat rekor tertinggi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Istilah "triwulan" dalam tabel pelaporan data berkala merujuk pada rentang waktu selama ....',
                                'explanation' => 'Triwulan = rentang 3 bulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => '3 bulan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => '4 bulan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => '6 bulan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '1 tahun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA keuntungan menyajikan informasi dalam bentuk infografis!',
                                'explanation' => 'Infografis menarik, cepat dipahami, dan efisien.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tampilan visual menarik sehingga tidak membosankan untuk dibaca', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Informasi pokok dapat dipahami secara cepat dan efisien', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Data menjadi kabur dan tidak dapat dipertanggungjawabkan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengharuskan pembaca menghafal rumus matematika yang rumit', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA unsur utama yang wajib ada dalam sebuah tabel penyajian data!',
                                'explanation' => 'Judul tabel dan label kolom/baris adalah unsur utama tabel.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Judul tabel yang menerangkan isi data', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kepala baris dan kolom yang teratur', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Puisi pembuka dan pantun penutup', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Foto selfie pembuat tabel', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jenis diagram visual dengan fungsinya yang paling tepat!',
                                'explanation' => 'Pasangan jenis diagram dan fungsinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Diagram Batang', 'is_correct' => false, 'match_key' => 'Membandingkan jumlah kuantitas antar-kategori', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Grafik Garis', 'is_correct' => false, 'match_key' => 'Menunjukkan tren kenaikan atau penurunan dari waktu ke waktu', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Diagram Lingkaran', 'is_correct' => false, 'match_key' => 'Menampilkan proporsi atau persentase pembagian bagian dari keseluruhan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tabel Data', 'is_correct' => false, 'match_key' => 'Menyajikan data angka terperinci dalam baris dan kolom', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah statistik sederhana dengan definisinya!',
                                'explanation' => 'Pasangan istilah pengolahan data sederhana.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rata-rata (mean)', 'is_correct' => false, 'match_key' => 'Jumlah seluruh data dibagi banyak data', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Nilai Tertinggi (maksimum)', 'is_correct' => false, 'match_key' => 'Kuantitas angka terbesar dalam kumpulan data', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai Terendah (minimum)', 'is_correct' => false, 'match_key' => 'Kuantitas angka terkecil dalam kumpulan data', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Selisih', 'is_correct' => false, 'match_key' => 'Hasil pengurangan nilai terbesar dengan nilai terkecil', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran mengenai interpretasi grafik data!',
                                'explanation' => 'Diagram lingkaran bernilai 100%, garis menukik ke bawah menunjukkan penurunan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Grafik garis yang arahnya menukik ke bawah menunjukkan penurunan nilai.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Total persentase seluruh sektor pada diagram lingkaran harus tepat 100%.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Data angka pada tabel boleh diubah sesuka hati tanpa sumber penelitian.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran mengenai penyajian data infografis!',
                                'explanation' => 'Warna sangat memengaruhi keterbacaan, dan sumber rujukan wajib dicantumkan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Infografis menggabungkan teks, gambar, dan data grafis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Warna dalam infografis tidak memiliki pengaruh visual pada keterbacaan data.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sumber rujukan data wajib dicantumkan pada bagian catatan kaki infografis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Penyajian data visual yang memadukan teks ringkas, ikon gambar, dan grafik disebut ....',
                                'explanation' => 'Infografis (information graphic).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'infografis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Susunan data angka yang teratur dalam bentuk baris mendatar dan kolom tegak dinamakan ....',
                                'explanation' => 'Tabel data.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tabel', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Diagram yang berbentuk lingkaran terbagi dalam juring-juring sektor disebut diagram ....',
                                'explanation' => 'Diagram lingkaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'lingkaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sumbu mendatar pada diagram batang sering disebut sumbu ....',
                                'explanation' => 'Sumbu horizontal (sumbu X).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'horizontal', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Jumlah persentase seluruh juring dalam sebuah diagram lingkaran adalah ... persen.',
                                'explanation' => '100 persen.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '100', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Besar sudut satu lingkaran penuh dalam diagram lingkaran adalah ... derajat.',
                                'explanation' => '360 derajat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '360', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Nilai terbesar dalam sebuah kumpulan data grafik sering disebut nilai ....',
                                'explanation' => 'Maksimum atau nilai tertinggi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'maksimum', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Perhatikan data berikut:
Hasil penanaman bibit pohon mangrove di pesisir desa selama 4 bulan tercatat: Januari (400 bibit), Februari (650 bibit), Maret (800 bibit), April (950 bibit).
a. Buatlah sebuah tabel data dua kolom (Bulan dan Jumlah Bibit) berdasarkan informasi tersebut!
b. Jelaskan bagaimana tren penanaman bibit tersebut dari bulan Januari hingga April!
c. Hitunglah total seluruh bibit pohon mangrove yang telah ditanam selama 4 bulan tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Tabel Data Penanaman Mangrove:
   | Bulan    | Jumlah Bibit |
   |----------|--------------|
   | Januari  | 400 bibit    |
   | Februari | 650 bibit    |
   | Maret    | 800 bibit    |
   | April    | 950 bibit    |
b. Tren Data: Penanaman bibit mangrove mengalami kenaikan yang konsisten dan positif setiap bulannya dari Januari hingga April.
c. Total Bibit = 400 + 650 + 800 + 950 = 2.800 bibit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan kelebihan penyajian data menggunakan infografis visual dibandingkan dengan penyajian data dalam bentuk teks paragraf biasa, terutama bagi pembaca anak-anak usia sekolah dasar!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Daya Tarik Visual: Infografis menggunakan ilustrasi berwarna dan ikon menarik sehingga memicu minat baca anak-anak tanpa rasa jenuh.
2. Efisiensi & Keringkasan: Konsep data rumit (misalnya data punahnya satwa liar) diringkas menjadi poin-poin visual yang mudah dicerna dalam waktu singkat.
3. Retensi Memori: Otak manusia memproses gambar 60.000 kali lebih cepat daripada teks, sehingga anak-anak lebih mudah mengingat pesan kunci pelestarian alam yang disampaikan lewat grafis visual.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Bagaimana langkah-langkah yang tepat dan sistematis dalam membaca serta menafsirkan isi data sebuah grafik batang agar kita tidak salah menarik simpulan?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Membaca Judul: Mengetahui topik utama dan periode data yang disajikan.
2. Memeriksa Label Sumbu: Memahami apa yang diwakili oleh sumbu horizontal (kategori) dan sumbu vertikal (satuan/jumlah frekuensi data).
3. Mengamati Batang Grafik: Membandingkan tinggi rendahnya tiap batang, mencari nilai tertinggi (puncak), nilai terendah (dasar), dan selisihnya.
4. Menarik Simpulan: Menghubungkan pola hubungan antardata secara logis dan menyusun simpulan berdasarkan fakta yang tertera.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 3 Bahasa Indonesia Kelas 6 (Paket 3 - Morfologi & Kaidah Kebahasaan)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 3 bagian 3: Menguasai makna gramatikal imbuhan ber-an dan konfiks meng-...-kan dalam konteks konservasi lingkungan.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Aksi Bersih Pantai Komunitas Generasi Lestari', 'content' => '[Keterangan Gambar: Ratusan siswa berpakaian kaus hijau sedang membersihkan sampah plastik di sepanjang pantai; botol plastik dan kemasan saset berserakan di atas pasir putih sebelum dipungut.]

Minggu pagi, ratusan relawan cilik berkumpul di Pantai Pasir Putih. Sampah-sampah plastik tampak berserakan di sepanjang garis pantai akibat terbawa ombak pasang malam sebelumnya. Para relawan bekerja bahu-membahu membersihkan pantai. Mereka memisahkan sampah organik dan anorganik, lalu mengumpulkan sampah daur ulang ke dalam karung goni. Ketua panitia menegaskan pentingnya menggalakkan gerakan bebas plastik sekali pakai guna menyelamatkan penyu dan lumba-lumba. Burung-burung camar beterbangan di langit biru seakan menyaksikan ketulusan anak-anak bangsa yang sedang melestarikan keindahan alam nusantara.'],
                            ['title' => 'Stimulus 2: Kaidah Pembentukan Kata Berimbuhan meng-...-kan', 'content' => '[Keterangan Gambar: Bagan kaidah morfologi pembentukan kata kerja transitif dengan konfiks meng-...-kan. Makna gramatikal yang dihasilkan: 1. Kausatif (menyebabkan menjadi), 2. Benefaktif (melakukan untuk orang lain), 3. Menjadikan sebagai.]

Konfiks meng-...-kan adalah gabungan awalan meng- dan akhiran -kan yang dilekatkan secara bersamaan pada kata dasar untuk membentuk kata kerja aktif transitif (kata kerja yang memerlukan objek). Makna gramatikal konfiks ini antara lain:
1. Menyebabkan jadi (kausatif), contoh: membersihkan (menyebabkan jadi bersih), melestarikan (menyebabkan jadi lestari).
2. Melakukan perbuatan untuk orang lain (benefaktif), contoh: membelikan adik buku, membukakan pintu.
3. Membawa ke tempat tertentu, contoh: mendaratkan pesawat, meminggirkan perahu.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata berimbuhan "berserakan" pada wacana Stimulus 1 memiliki makna gramatikal ....',
                                'explanation' => 'Berserakan bermakna banyak dan tercecer di mana-mana secara tak beraturan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berada di banyak tempat secara tidak beraturan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Melakukan perbuatan bersama-sama', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyerupai benda tajam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyatakan alat untuk menyapu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata berimbuhan yang menyatakan perbuatan yang dilakukan oleh banyak subjek secara terus-menerus pada wacana di atas adalah ....',
                                'explanation' => 'Beterbangan (imbuhan ber-an) menyatakan banyak burung terbang ke sana ke mari.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Beterbangan (dari terbang)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Berkumpul (dari kumpul)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Membawa (dari bawa)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyaksikan (dari saksi)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata kerja berimbuhan meng-...-kan yang terdapat pada teks wacana!',
                                'explanation' => 'Mengumpulkan dan menggalakkan menggunakan konfiks meng-...-kan (melestarikan menggunakan me-...-kan, berserakan menggunakan ber-...-an).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengumpulkan (dari kata dasar kumpul)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menggalakkan (dari kata dasar galak)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Melestarikan (dari kata dasar lestari)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berserakan (dari kata dasar serak)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kata berimbuhan ber-an dengan makna gramatikalnya!',
                                'explanation' => 'Pasangan kata berimbuhan ber-an dan maknanya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Beterbangan', 'is_correct' => false, 'match_key' => 'Banyak yang terbang ke sana ke mari', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Berserakan', 'is_correct' => false, 'match_key' => 'Berada di banyak tempat tidak teratur', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Berlarian', 'is_correct' => false, 'match_key' => 'Banyak orang yang berlari ke berbagai arah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Berjatuhan', 'is_correct' => false, 'match_key' => 'Banyak benda yang jatuh berturut-turut', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata "menyelamatkan" dalam kalimat: "Relawan menyelamatkan penyu laut" memiliki makna gramatikal ....',
                                'explanation' => 'Menyelamatkan bermakna menyebabkan menjadi selamat (kausatif).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menyebabkan menjadi selamat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membeli penyu untuk orang lain', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menganggap penyu sebagai musuh', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyelam ke dasar laut dalam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang memuat kata berimbuhan meng-...-kan dengan makna melakukan sesuatu untuk orang lain (benefaktif) adalah ....',
                                'explanation' => 'Membuatkan bekal untuk relawan bermakna benefaktif (untuk orang lain).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ibu membuatkan bekal sarapan untuk para relawan pantai.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pemerintah meresmikan taman nasional baru di Papua.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pohon jati itu menggugurkan daunnya pada musim kemarau.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Siswa mengumpulkan sampah plastik di tepi pantai.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran fungsi konfiks meng-...-kan!',
                                'explanation' => 'Kata kerja transitif selalu membutuhkan objek penderita.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konfiks meng-...-kan selalu membentuk kata kerja (verba) aktif transitif.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata dasar "stabil" jika diberi konfiks meng-...-kan menjadi "menstabilkan".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata kerja dengan konfiks meng-...-kan tidak membutuhkan objek dalam kalimat.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk baku pembentukan kata dari kata dasar "sukses" yang diberi konfiks meng-...-kan adalah ....',
                                'explanation' => 'Huruf S luluh menjadi ny: menyukseskan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menyukseskan (huruf s luluh)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mensukseskan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengsukseskan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyuksesi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata berimbuhan ber-an yang bermakna saling (resiprokal) terdapat dalam kalimat ....',
                                'explanation' => 'Bersalaman bermakna saling menyalami (resiprokal).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kedua sahabat itu bersalaman erat saat bertemu di gerbang sekolah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dedaunan kering berjatuhan di halaman rumah.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bintang-bintang bertaburan di langit malam.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sampah plastik berserakan di tepi selokan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata berimbuhan ber-an yang bermakna banyak dan tidak beraturan terdapat dalam kalimat ....',
                                'explanation' => 'Berhamburan bermakna banyak tersebar tak beraturan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kertas-kertas tugas itu berhamburan tertiup angin kencang.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mereka berpelukan haru setelah pengumuman kelulusan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rani dan Danu bertatapan mata dengan ramah.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kakak berbisik-bisikan dengan adik di sudut kamar.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata dasar dari kata berimbuhan "menomorsatukan" adalah ....',
                                'explanation' => 'Kata dasar gabung: nomor satu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nomor satu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nomor', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Satu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menomor', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata berimbuhan meng-...-kan yang bermakna membawa atau memasukkan ke tempat adalah ....',
                                'explanation' => 'Memasukkan bermakna menaruh ke dalam suatu tempat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memasukkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membersihkan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memperbaiki', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghancurkan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk kata berimbuhan yang benar dari kata dasar "koordinasi" dengan konfiks meng-...-kan adalah ....',
                                'explanation' => 'K luluh: mengoordinasikan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengoordinasikan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mengkoordinasikan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengoordinir', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menkoordinasikan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menggunakan kata berimbuhan ber-an secara tepat adalah ....',
                                'explanation' => 'Bermekaran bermakna banyak bunga mekar bersamaan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bunga-bunga mawar bermekaran menyambut musim semi.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bunga-bunga mawar mekar-mekaran sangat indah.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bunga itu berbunga-an di kebun sekolah.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bunga itu sedang beraneka-an warna.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata kerja berimbuhan meng-...-kan yang bermakna kausatif (menyebabkan menjadi)!',
                                'explanation' => 'Menghijaukan dan mengeringkan bermakna kausatif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menghijaukan (menyebabkan jadi hijau)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mengeringkan (menyebabkan jadi kering)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Membacakan (membaca untuk orang lain)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengambilkan (mengambil untuk orang lain)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata berimbuhan ber-an yang bermakna saling melakukan perbuatan (resiprokal)!',
                                'explanation' => 'Berpandangan dan bersentuhan bermakna saling (resiprokal).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berpandangan (saling memandang)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bersentuhan (saling menyentuh)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berhamburan (banyak yang berhambur)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berguguran (banyak yang gugur)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kata dasar dengan bentuk kata berimbuhannya setelah diberi konfiks meng-...-kan!',
                                'explanation' => 'Pasangan pembentukan kata berimbuhan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kembang', 'is_correct' => false, 'match_key' => 'Mengembangkan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Lestari', 'is_correct' => false, 'match_key' => 'Melestarikan', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pasti', 'is_correct' => false, 'match_key' => 'Memastikan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tentu', 'is_correct' => false, 'match_key' => 'Menentukan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kata berimbuhan ber-an dengan jenis maknanya!',
                                'explanation' => 'Pasangan makna imbuhan ber-an.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Bercipratan', 'is_correct' => false, 'match_key' => 'Menyatakan banyak titik air yang menciprat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bermusuhan', 'is_correct' => false, 'match_key' => 'Menyatakan hubungan saling memusuhi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bercucuran', 'is_correct' => false, 'match_key' => 'Menyatakan cairan mengalir deras terus-menerus', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bersebelahan', 'is_correct' => false, 'match_key' => 'Menyatakan letak yang saling berdampingan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pembentukan imbuhan berikut!',
                                'explanation' => 'Bentuk baku KBBI adalah "mengesampingkan" (bukan mengenyampingkan).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Imbuhan ber-an pada kata "bersalaman" bermakna saling (timbal balik).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata dasar yang diawali huruf K selalu luluh saat diberi konfiks meng-...-kan jika huruf kedua vokal.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "mengenyampingkan" adalah bentuk baku menurut KBBI.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran fungsi gramatikal imbuhan!',
                                'explanation' => 'Imbuhan ber-an membentuk kata kerja atau kata sifat, bukan selalu nomina.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konfiks meng-...-kan mengubah kata sifat menjadi kata kerja (contoh: bersih -> membersihkan).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Imbuhan ber-an selalu membentuk kata benda (nomina).', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "berkilauan" bermakna banyak pancaran sinar berkilau.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Konfiks pembentuk kata kerja yang terdiri atas awalan meng- dan akhiran -kan disebut konfiks meng-...-....',
                                'explanation' => 'Meng-...-kan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Makna imbuhan ber-an pada kalimat "Mereka saling bertatapan" adalah menyatakan perbuatan saling atau ....',
                                'explanation' => 'Resiprokal atau timbal balik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'resiprokal', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "menghijaukan" berasal dari kata dasar ....',
                                'explanation' => 'Kata dasar: hijau.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hijau', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku konfiks meng-...-kan pada kata dasar "terjemah" adalah ....',
                                'explanation' => 'Menerjemahkan (t luluh).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'menerjemahkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Makna kata "berguguran" pada kalimat "Daun-daun berguguran" adalah menyatakan banyak benda yang gugur secara ....',
                                'explanation' => 'Banyak daun gugur berurutan/terus-menerus.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'terus-menerus', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata berimbuhan dari kata dasar "selaras" dengan konfiks meng-...-kan adalah ....',
                                'explanation' => 'Menyelaraskan (s luluh).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'menyelaraskan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata dasar dari kata berimbuhan "bercucuran" adalah ....',
                                'explanation' => 'Kata dasar: cucur.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'cucur', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan dua makna gramatikal utama yang dapat dihasilkan oleh imbuhan ber-an (makna resiprokal/saling dan makna banyak/frekuentatif), serta buatlah masing-masing satu contoh kalimat lengkapnya bertema gotong royong di lingkungan sekolah!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Makna Resiprokal (Saling Melakukan Perbuatan): Menunjukkan perbuatan yang dilakukan oleh dua pihak atau lebih secara berbalasan.
   - Contoh: "Dani dan Edo bersalaman tanda rukun setelah bersama-sama menyelesaikan tugas membersihkan taman sekolah."
2. Makna Banyak / Jamak / Tidak Beraturan (Frekuentatif): Menunjukkan banyak subjek yang melakukan perbuatan atau banyak objek yang berada di berbagai tempat.
   - Contoh: "Daun-daun kering berguguran di halaman sekolah saat para siswa kelas enam menyapu di bawah pohon beringin."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan proses perubahan bunyi (fonologi) saat kata dasar berikut diberi konfiks meng-...-kan berdasarkan kaidah K, P, T, S:
a. Kata "kelola"
b. Kata "padu"
c. Kata "tata"
d. Kata "sukses"',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. meng- + kelola + -kan -> Mengelola / Mengelolakan (huruf K luluh menjadi ng karena diikuti vokal e).
b. meng- + padu + -kan -> Memadukan (huruf P luluh menjadi m karena diikuti vokal a).
c. meng- + tata + -kan -> Menata / Menatakan (huruf T luluh menjadi n karena diikuti vokal a).
d. meng- + sukses + -kan -> Menyukseskan (huruf S luluh menjadi ny karena diikuti vokal u).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah tiga kalimat efektif yang memuat kata berimbuhan meng-...-kan dengan ketentuan variasi makna sebagai berikut:
a. Bermakna kausatif (menyebabkan menjadi bersih/lestari)
b. Bermakna benefaktif (melakukan perbuatan untuk orang lain)
c. Bermakna membawa atau memasukkan ke suatu tempat!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Kausatif: "Warga desa bahu-membahu melestarikan hutan lindung di sekitar sumber mata air pegunungan." (menyebabkan jadi lestari)
b. Benefaktif: "Raka membukakan pintu gerbang untuk bapak guru yang sedang membawa bibit pohon penghijauan." (membuka untuk orang lain)
c. Membawa ke tempat: "Petugas pos pengawas meminggirkan perahu motor wisata agar tidak mengganggu jalur migrasi penyu." (membawa ke pinggir)',
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
