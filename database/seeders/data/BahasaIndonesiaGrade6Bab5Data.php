<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6Bab5Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 5 Bahasa Indonesia Kelas 6 (Paket 1 - Teks Biografi Tokoh Pengubah Dunia)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 5 bagian 1: Menganalisis struktur teks biografi, kronologi riwayat hidup tokoh, dan nilai-nilai keteladanan kemanusiaan.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Keberanian Malala Yousafzai Memperjuangkan Pendidikan', 'content' => '[Keterangan Gambar: Malala Yousafzai, gadis muda peraih Nobel Perdamaian termuda, sedang berpidato di hadapan Sidang Umum PBB mengenakan selendang merah muda dengan sorot mata penuh keteguhan.]

Malala Yousafzai lahir pada 12 Juli 1997 di Lembah Swat, Pakistan barat laut. Sejak berusia sebelas tahun, Malala telah berani menyuarakan hak anak perempuan untuk bersekolah di bawah ancaman kelompok ekstremis yang melarang pendidikan bagi perempuan. Melalui buku harian berkode samaran yang dimuat di media internasional, Malala menceritakan ketakutan dan tekad anak-anak di kotanya yang tetap ingin belajar.

Meskipun pernah mengalami serangan bersenjata yang hampir merenggut nyawanya pada tahun 2012, Malala tidak gentar. Setelah sembuh, ia justru mendirikan Yayasan Malala (*Malala Fund*) untuk membantu jutaan anak perempuan di seluruh dunia agar memperoleh akses pendidikan gratis dan berkualitas selama 12 tahun. Pada usia 17 tahun, Malala dianugerahi Penghargaan Nobel Perdamaian, menjadikannya penerima Nobel termuda dalam sejarah peradaban manusia.'],
                            ['title' => 'Stimulus 2: Struktur dan Ciri Bahasa Teks Biografi', 'content' => '[Keterangan Gambar: Bagan struktur teks biografi: 1. Orientasi (pengenalan latar belakang identitas tokoh, tempat/tanggal lahir, keluarga), 2. Peristiwa dan Masalah/Komplikasi (perjalanan karier, perjuangan, rintangan berat, cara mengatasi masalah), 3. Reorientasi (pandangan akhir penulis dan simpulan keteladanan tokoh).]

Teks biografi adalah teks narasi faktual yang mengisahkan riwayat hidup seorang tokoh terkemuka yang ditulis oleh orang lain (jika ditulis oleh diri sendiri disebut autobiografi). Ciri utama teks biografi adalah memuat fakta otentik kehidupan, disajikan secara kronologis (runtut menurut urutan waktu), serta menonjolkan nilai-nilai keteladanan watak yang dapat menginspirasi pembaca untuk berbuat kebaikan.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, hak fundamental yang gigih diperjuangkan oleh Malala Yousafzai adalah ....',
                                'explanation' => 'Dalam teks: "menyuarakan hak anak perempuan untuk bersekolah... memperoleh akses pendidikan."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hak anak perempuan untuk memperoleh akses pendidikan dan bersekolah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hak mendirikan pabrik industri senjata modern di Pakistan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hak menjadi pemimpin kelompok militer bersenjata', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hak bepergian keliling dunia tanpa dokumen paspor', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Prestasi dunia membanggakan yang diraih Malala pada usia 17 tahun adalah ....',
                                'explanation' => 'Malala meraih Nobel Perdamaian termuda pada usia 17 tahun.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penerima Penghargaan Nobel Perdamaian termuda dalam sejarah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Juara pertama olimpiade sains antariksa dunia', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menjadi presiden termuda di benua Asia', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mendapatkan rekor lari maraton tercepat di dunia', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA nilai keteladanan yang dapat dipetik dari biografi Malala Yousafzai!',
                                'explanation' => 'Keberanian dan kepedulian sosial adalah nilai keteladanan Malala.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Keberanian memperjuangkan kebenaran meskipun menghadapi ancaman bahaya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kepedulian sosial yang tinggi terhadap nasib pendidikan sesama anak', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sikap pendendam terhadap orang-orang yang pernah melukainya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mementingkan kekayaan materi pribadi di atas segalanya', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan peristiwa penting dalam kehidupan Malala dengan tahun terjadinya!',
                                'explanation' => 'Pasangan garis waktu riwayat hidup Malala Yousafzai.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kelahiran Malala di Lembah Swat', 'is_correct' => false, 'match_key' => 'Tahun 1997', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mulai menulis buku harian pendidikan di usia 11 tahun', 'is_correct' => false, 'match_key' => 'Tahun 2008', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mengalami serangan bersenjata di bus sekolah', 'is_correct' => false, 'match_key' => 'Tahun 2012', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Menerima Penghargaan Nobel Perdamaian di usia 17 tahun', 'is_correct' => false, 'match_key' => 'Tahun 2014', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Teks riwayat hidup seorang tokoh yang ditulis oleh orang lain dinamakan teks ....',
                                'explanation' => 'Riwayat hidup yang ditulis orang lain adalah biografi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Biografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Autobiografi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bibliografi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Monografi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Jika riwayat hidup ditulis sendiri oleh tokoh yang bersangkutan, teks tersebut disebut teks ....',
                                'explanation' => 'Ditulis sendiri disebut autobiografi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Autobiografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Biografi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Biologi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Antologi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran ciri teks biografi!',
                                'explanation' => 'Biografi bersifat faktual dan tidak boleh direkayasa mitos.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks biografi memuat fakta otentik perjalanan hidup seorang tokoh.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Urutan peristiwa dalam teks biografi disajikan secara kronologis waktu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks biografi boleh menambahkan cerita mitos magis yang tidak nyata.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian pembuka teks biografi yang mengenalkan identitas, tempat, dan tanggal lahir tokoh disebut ....',
                                'explanation' => 'Pembuka biografi adalah orientasi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orientasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Komplikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Reorientasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Koda cerita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian penutup teks biografi yang memuat pandangan penulis dan simpulan keteladanan tokoh disebut ....',
                                'explanation' => 'Penutup biografi adalah reorientasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Reorientasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Orientasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Resolusi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Abstraksi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri tokoh yang lazim diangkat menjadi subjek penulisan teks biografi adalah ....',
                                'explanation' => 'Tokoh biografi memiliki kontribusi dan prestasi inspiratif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memiliki kontribusi, prestasi, atau karya nyata yang bermanfaat bagi orang banyak', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hanya orang yang memiliki banyak harta kekayaan dan mobil mewah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Seseorang yang sering membuat onar dan sensasi di media sosial', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tokoh khayalan yang memiliki kesaktian terbang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pola penyajian peristiwa dalam teks biografi umumnya disusun berdasarkan alur ....',
                                'explanation' => 'Alur maju kronologis dari masa kecil hingga dewasa.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Maju (kronologis urutan waktu)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mundur (kilas balik tanpa urutan)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Campuran acak', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Siklus berputar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata ganti orang ketiga tunggal yang dominan digunakan dalam penulisan teks biografi adalah ....',
                                'explanation' => 'Biografi menggunakan kata ganti orang ketiga (ia, beliau, dia).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ia / Beliau / Dia', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Saya / Aku', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kami / Kita', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kamu / Engkau', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap keteladanan tokoh yang pantang menyerah saat menghadapi rintangan berat disebut sikap ....',
                                'explanation' => 'Gigih dan ulet pantang menyerah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Gigih / ulet', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pesimistis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apatis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Egoistis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Peristiwa penting dalam hidup tokoh yang menjadi titik balik kesuksesannya sering disebut ....',
                                'explanation' => 'Momen penting titik balik kesuksesan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Momen penting / puncak capaian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Konflik akhir', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pemberhentian sementara', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Prolog cerita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA informasi yang lazim terdapat pada bagian orientasi teks biografi!',
                                'explanation' => 'Nama, tempat/tanggal lahir, dan masa kecil ada di bagian orientasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nama lengkap dan tempat tanggal lahir tokoh', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Latar belakang keluarga dan masa kecil tokoh', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Simpulan evaluasi keteladanan di akhir hayat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Daftar nama anak cucu secara lengkap', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA tokoh inspiratif cilik dan remaja yang tepat dijadikan subjek teks biografi!',
                                'explanation' => 'Boyan Slat dan Greta Thunberg adalah tokoh nyata inspiratif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Boyan Slat (pemuda pencetus alat pembersih sampah samudra The Ocean Cleanup)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Greta Thunberg (aktivis remaja pejuang keadilan iklim global)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tokoh kartun Mickey Mouse dari dunia animasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tokoh mitos Sangkuriang dari tanah Sunda', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah biografi di kolom kiri dengan pengertiannya di kolom kanan!',
                                'explanation' => 'Pasangan istilah teks biografi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Biografi', 'is_correct' => false, 'match_key' => 'Kisah riwayat hidup yang ditulis oleh orang lain', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Autobiografi', 'is_correct' => false, 'match_key' => 'Kisah riwayat hidup yang ditulis oleh diri sendiri', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Orientasi', 'is_correct' => false, 'match_key' => 'Bagian pengenalan identitas tokoh', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Reorientasi', 'is_correct' => false, 'match_key' => 'Bagian simpulan pandangan penulis tentang tokoh', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan tokoh inspiratif dengan bidang perjuangannya!',
                                'explanation' => 'Pasangan tokoh dan bidang perjuangannya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Malala Yousafzai', 'is_correct' => false, 'match_key' => 'Hak pendidikan anak perempuan', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Boyan Slat', 'is_correct' => false, 'match_key' => 'Teknologi pembersih sampah laut', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Louis Braille', 'is_correct' => false, 'match_key' => 'Sistem tulisan timbul bagi penyandang tunanetra', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Anne Frank', 'is_correct' => false, 'match_key' => 'Catatan harian perjuangan toleransi kemanusiaan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah penulisan biografi!',
                                'explanation' => 'Data biografi harus otentik dan dilarang diubah sembarangan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks biografi harus menyajikan data riwayat hidup yang benar dan valid.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Penulis biografi bebas mengubah tanggal lahir tokoh sesuai keinginannya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Nilai keteladanan tokoh menjadi pelajaran berharga bagi pembaca.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penggunaan kata ganti biografi!',
                                'explanation' => 'Kata ganti "aku" digunakan dalam autobiografi, bukan biografi.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata ganti "beliau" digunakan untuk menghormati tokoh yang dituakan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata ganti "aku" merupakan kata ganti dominan dalam teks biografi.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata ganti "ia" dan "dia" merujuk pada subjek tokoh yang diceritakan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Riwayat perjalanan hidup seseorang yang ditulis oleh orang lain dinamakan ....',
                                'explanation' => 'Biografi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'biografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Riwayat perjalanan hidup seseorang yang ditulis oleh dirinya sendiri dinamakan ....',
                                'explanation' => 'Autobiografi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'autobiografi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata ganti orang ketiga yang digunakan untuk menghormati tokoh terkemuka adalah ....',
                                'explanation' => 'Beliau.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'beliau', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bagian awal teks biografi yang berisi pengenalan nama dan latar belakang tokoh disebut ....',
                                'explanation' => 'Orientasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'orientasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Penyusunan peristiwa dalam biografi yang berurutan sesuai lini masa waktu disebut urutan ....',
                                'explanation' => 'Kronologis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kronologis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Yayasan pendidikan yang didirikan oleh Malala dinamakan Malala ....',
                                'explanation' => 'Malala Fund.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Fund', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bagian akhir teks biografi yang memuat simpulan dan kesan penulis disebut ....',
                                'explanation' => 'Reorientasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'reorientasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan dan jelaskan tiga struktur utama penyusun teks biografi (orientasi, peristiwa/masalah, dan reorientasi), serta uraikan apa saja informasi yang biasanya disajikan pada masing-masing bagian tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Orientasi (Pengenalan): Memuat informasi dasar mengenai identitas tokoh, nama lengkap, tempat dan tanggal lahir, latar belakang keluarga, serta gambaran umum masa kecilnya.
2. Peristiwa dan Masalah (Inti/Komplikasi): Memaparkan rangkaian perjalanan hidup, perjuangan merintis cita-cita, rintangan/kesulitan hidup yang dihadapi, serta cara tokoh mengatasi masalah hingga meraih prestasi gemilang (disusun secara kronologis).
3. Reorientasi (Penutup/Simpulan): Berisi pandangan akhir atau simpulan penulis terhadap dedikasi tokoh, serta rangkuman nilai-nilai karakter terpuji yang dapat diteladani oleh pembaca.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan perbedaan mendasar antara teks biografi dan autobiografi! Kapan sebaiknya seseorang menulis autobiografi daripada membiarkan orang lain menulis biografinya?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Perbedaan: Biografi ditulis oleh orang lain menggunakan kata ganti orang ketiga (ia, dia, beliau); sedangkan autobiografi ditulis sendiri oleh tokoh yang bersangkutan menggunakan kata ganti orang pertama (aku, saya).
2. Alasan Menulis Autobiografi: Seseorang menulis autobiografi saat ingin menceritakan secara langsung pengalaman batin, pemikiran pribadi yang paling mendalam, serta fakta-fakta yang hanya diketahui oleh dirinya sendiri tanpa ada distorsi atau penafsiran pihak kedua.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tulislah sebuah draf singkat bagian reorientasi (simpulan keteladanan) teks biografi tentang tokoh penemu muda Indonesia (minimal 3-4 kalimat) yang menekankan pentingnya kerja keras, rasa ingin tahu yang tinggi, dan kecintaan pada tanah air!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Draf Reorientasi:
"Kegigihan dan kerja keras yang ditunjukkan oleh Muhammad Rafli dalam mengembangkan alat penjernih air tenaga surya menjadi bukti nyata bahwa usia muda bukanlah batasan untuk berkarya bagi negeri. Rasa ingin tahunya yang mendalam terhadap ilmu sains berhasil melahirkan solusi praktis bagi masyarakat pedesaan yang mengalami krisis air bersih. Semangat pantang menyerah dan kecintaannya pada tanah air patut menjadi teladan bagi seluruh generasi muda Indonesia untuk terus berinovasi dan mengharumkan nama bangsa di kancah dunia."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 5 Bahasa Indonesia Kelas 6 (Paket 2 - Kalimat Langsung & Tidak Langsung)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 5 bagian 2: Menguasai aturan tanda baca kalimat langsung, konversi pronomina dan waktu ke kalimat tidak langsung.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Petikan Wawancara Inspiratif dengan Aktivis Cilik Penyelamat Sungai', 'content' => '[Keterangan Gambar: Aeshnina Azzahra (Nina), gadis cilik asal Gresik, Jawa Timur, sedang menunjukkan surat terbuka yang ia tulis untuk pemimpin negara maju agar menghentikan ekspor sampah plastik ke Indonesia.]

Nina berkata, "Kami anak-anak Indonesia berhak hidup di lingkungan yang bersih dan menghirup udara yang bebas dari racun plastik." Pernyataan tegas tersebut disampaikan Nina di hadapan konferensi lingkungan internasional di Jerman.

Wartawan bertanya kepada Nina mengapa ia berani mengirim surat ke kantor kedutaan besar negara-negara maju. Nina menjawab bahwa ia melihat langsung sungai di desanya tercemar oleh tumpukan sampah plastik impor yang tidak dapat didaur ulang. Ia menegaskan bahwa generasi muda tidak boleh tinggal diam ketika masa depan bumi sedang dirusak oleh kelalaian orang dewasa.'],
                            ['title' => 'Stimulus 2: Kaidah Perubahan Kalimat Langsung Menjadi Kalimat Tidak Langsung', 'content' => '[Keterangan Gambar: Bagan aturan konversi sintaksis: 1. Tanda petik dihilangkan, 2. Ditambahkan konjungsi "bahwa" (kalimat berita) atau "agar/supaya" (kalimat perintah), 3. Perubahan kata ganti: saya/aku -> dia/ia; kami/kita -> mereka; kamu/kalian -> saya/kami, 4. Perubahan keterangan waktu: sekarang -> saat itu; besok -> keesokan harinya; kemarin -> hari sebelumnya.]

Kalimat langsung adalah kalimat yang menirukan ujaran seseorang persis seperti yang diucapkannya tanpa perubahan. Sebaliknya, kalimat tidak langsung adalah kalimat yang menceritakan kembali ujaran orang lain dengan menggunakan bahasa sendiri. Saat mengubah kalimat langsung menjadi tidak langsung, penulis wajib menyesuaikan kata ganti orang (pronomina), kata penunjuk tempat/waktu, serta menghilangkan tanda petik rangkap dua.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat pada wacana di atas yang merupakan kalimat langsung adalah ....',
                                'explanation' => 'Kalimat langsung ditandai dengan tanda petik ganda ("...").',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Nina berkata, "Kami anak-anak Indonesia berhak hidup di lingkungan yang bersih dan menghirup udara yang bebas dari racun plastik."', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Wartawan bertanya kepada Nina mengapa ia berani mengirim surat ke kedutaan besar.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nina menjawab bahwa ia melihat langsung sungai di desanya tercemar.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ia menegaskan bahwa generasi muda tidak boleh tinggal diam.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri kebahasaan kalimat langsung yang terlihat nyata pada wacana Stimulus 1 adalah ....',
                                'explanation' => 'Tanda petik mengapit kutipan langsung pembicara.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penggunaan tanda petik dua ("...") yang mengapit ujaran asli pembicara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penggunaan kata penghubung "bahwa" di tengah kalimat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pengubahan kata ganti "kami" menjadi "mereka"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Intonasi datar tanpa tanda baca apapun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat dari wacana yang merupakan kalimat TIDAK langsung!',
                                'explanation' => 'Kalimat A dan B tidak menggunakan tanda petik dan menggunakan kata penghubung (bahwa, mengapa).',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Wartawan bertanya kepada Nina mengapa ia berani mengirim surat ke kantor kedutaan besar negara-negara maju.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Nina menjawab bahwa ia melihat langsung sungai di desanya tercemar oleh tumpukan sampah plastik impor.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Nina berkata, "Kami anak-anak berhak hidup di lingkungan yang bersih."', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '"Sungai kami tercemar racun," ujar Nina dengan sedih.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kalimat langsung dengan bentuk kalimat tidak langsungnya yang tepat!',
                                'explanation' => 'Pasangan konversi kalimat langsung ke tidak langsung.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Nina berkata, "Saya akan terus berjuang."', 'is_correct' => false, 'match_key' => 'Nina berkata bahwa ia akan terus berjuang.', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Ayah berkata, "Kalian harus rajin belajar."', 'is_correct' => false, 'match_key' => 'Ayah berkata bahwa kami harus rajin belajar.', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Guru bertanya, "Siapa yang piket hari ini?"', 'is_correct' => false, 'match_key' => 'Guru menanyakan orang yang bertugas piket hari itu.', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ibu berpesan, "Tutup pintunya sekarang!"', 'is_correct' => false, 'match_key' => 'Ibu berpesan agar menutup pintu saat itu.', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata ganti "saya" dalam kalimat langsung akan berubah menjadi ... dalam kalimat tidak langsung.',
                                'explanation' => 'Kata ganti orang pertama (saya) berubah menjadi orang ketiga (dia/ia).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dia atau ia', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kamu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mereka', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Keterangan waktu "sekarang" dalam kalimat langsung berubah menjadi ... dalam kalimat tidak langsung.',
                                'explanation' => 'Sekarang berubah menjadi saat itu/waktu itu.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Saat itu / waktu itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Besok lusa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hari ini', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Nanti malam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah kalimat langsung dan tidak langsung!',
                                'explanation' => 'Kata hubung "bahwa" digunakan dalam kalimat tidak langsung.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Tanda petik rangkap dua ("...") wajib dihilangkan saat diubah menjadi kalimat tidak langsung.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Huruf pertama di dalam tanda petik pada kalimat langsung wajib diawali huruf kapital.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata hubung "bahwa" lazim digunakan di dalam kalimat langsung berpetik.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kalimat langsung yang benar menurut ejaan PUEBI di bawah ini adalah ....',
                                'explanation' => 'Diikuti tanda koma, spasi, tanda petik buka, huruf kapital di awal, dan tanda baca di dalam petik tutup.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ibu berkata, "Jangan lupa mencuci tangan sebelum makan!"', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ibu berkata: "jangan lupa mencuci tangan sebelum makan!"', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Ibu berkata "Jangan lupa mencuci tangan sebelum makan!"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ibu berkata, Jangan lupa mencuci tangan sebelum makan!', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk kalimat tidak langsung dari: Rian berkata, "Aku belum menyelesaikan tugas bahasa Indonesiaku" adalah ....',
                                'explanation' => 'Aku -> ia, -ku -> -nya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Rian berkata bahwa ia belum menyelesaikan tugas bahasa Indonesianya.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Rian berkata bahwa aku belum menyelesaikan tugas bahasa Indonesiaku.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rian berkata bahwa kamu belum menyelesaikan tugas bahasa Indonesianya.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rian berkata jangan selesaikan tugas bahasa Indonesianya.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk kalimat langsung dari: Ibu guru menasihati kami agar belajar dengan sungguh-sungguh adalah ....',
                                'explanation' => 'Perintah agar belajar berubah menjadi kalimat imperatif dalam tanda petik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ibu guru menasihati, "Belajarlah kalian dengan sungguh-sungguh!"', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ibu guru menasihati bahwa kami harus belajar.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Ibu guru bertanya, "Apakah kalian belajar sungguh-sungguh?"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => '"Kami belajar sungguh-sungguh," nasihat Ibu guru.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tanda baca yang memisahkan bagian pengiring dengan petikan langsung adalah tanda ....',
                                'explanation' => 'Tanda koma memisahkan bagian pengiring dengan kutipan langsung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Koma (,)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Titik dua (:)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Titik koma (;)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hubung (-)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Letak tanda titik (.) pada akhir kalimat langsung berita yang tepat adalah ....',
                                'explanation' => 'Tanda titik diletakkan di dalam sebelum tanda petik penutup.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Di dalam tanda petik penutup ("... .")', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Di luar setelah tanda petik penutup ("..." .)', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tidak perlu diberi tanda titik sama sekali', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Di awal sebelum tanda petik pembuka', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang merupakan kalimat tidak langsung yang menyatakan pertanyaan adalah ....',
                                'explanation' => 'Kalimat tidak langsung dari pertanyaan menggunakan kata tanya sebagai penghubung tanpa tanda petik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dokter menanyakan di mana anak itu merasakan sakit.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dokter bertanya, "Di mana kamu sakit?"', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dokter berkata bahwa anak itu sedang sakit.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dokter memeriksa pasien yang sedang sakit.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk kalimat langsung dari: Ayah menyuruh Dimas mengambilkan kacamata di meja adalah ....',
                                'explanation' => 'Ayah berkata, "Ambilkan kacamata di meja!"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ayah berkata kepada Dimas, "Ambilkan kacamata di meja!"', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ayah berkata bahwa Dimas mengambil kacamata di meja.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dimas berkata, "Ayah tolong ambilkan kacamata di meja!"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ayah bertanya, "Di mana kacamataku, Dimas?"', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri kalimat langsung yang tepat!',
                                'explanation' => 'Diapit tanda petik dan diawali huruf kapital.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diapit oleh tanda petik ganda ("...")', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Huruf pertama kalimat petikan diawali huruf kapital', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Selalu menggunakan konjungsi "bahwa"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Intonasi bacaan selalu datar tanpa emosi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA perubahan kata ganti yang benar saat mengubah kalimat langsung ke tidak langsung!',
                                'explanation' => 'Saya -> dia/ia; kami -> mereka.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kata "saya/aku" berubah menjadi "dia/ia"', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kata "kami" berubah menjadi "mereka"', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kata "dia" berubah menjadi "saya"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kata "kalian" berubah menjadi "dia"', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kalimat langsung dengan jenis fungsinya!',
                                'explanation' => 'Pasangan jenis fungsi ujaran kalimat langsung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Doni berkata, "Hari ini cuaca sangat cerah."', 'is_correct' => false, 'match_key' => 'Kalimat Berita Langsung', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Siti bertanya, "Kapan kita berangkat ke museum?"', 'is_correct' => false, 'match_key' => 'Kalimat Tanya Langsung', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pak Guru berseru, "Kumpulkan tugas sekarang!"', 'is_correct' => false, 'match_key' => 'Kalimat Perintah Langsung', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ayu berkata, "Aduh, kakiku terantuk batu!"', 'is_correct' => false, 'match_key' => 'Kalimat Seruan Langsung', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan perubahan keterangan waktu/tempat dari kalimat langsung ke tidak langsung!',
                                'explanation' => 'Pasangan konversi penunjuk waktu dan tempat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Hari ini', 'is_correct' => false, 'match_key' => 'Hari itu', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Besok', 'is_correct' => false, 'match_key' => 'Keesokan harinya', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kemarin', 'is_correct' => false, 'match_key' => 'Hari sebelumnya', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Di sini', 'is_correct' => false, 'match_key' => 'Di sana / di tempat itu', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penulisan tanda baca kalimat langsung!',
                                'explanation' => 'Tanda koma dan tanda seru diletakkan di dalam sebelum tanda petik penutup.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Penulisan: "Tolong bantu aku", kata Budi. (salah penempatan tanda koma).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bentuk yang tepat: "Tolong bantu aku," kata Budi. (koma di dalam petik).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tanda seru diletakkan di luar tanda petik penutup.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran struktur kalimat tidak langsung!',
                                'explanation' => 'Kalimat tidak langsung bernada tuturan naratif datar menceritakan kembali.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kalimat tidak langsung tidak menggunakan tanda petik sama sekali.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata kerja pengiring seperti "mengatakan bahwa" lazim digunakan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Intonasi kalimat tidak langsung menirukan nada bicara asli pembicara.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Kalimat yang menirukan ujaran seseorang secara persis dan diapit tanda petik disebut kalimat ....',
                                'explanation' => 'Kalimat langsung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'langsung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat yang menceritakan kembali ucapan seseorang dengan bahasa sendiri disebut kalimat ....',
                                'explanation' => 'Kalimat tidak langsung.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tidak langsung', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda baca yang mengapit ujaran asli dalam kalimat langsung adalah tanda ....',
                                'explanation' => 'Tanda petik (kutip ganda).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'petik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata hubung yang lazim digunakan dalam kalimat tidak langsung berita adalah kata ....',
                                'explanation' => 'Konjungsi bahwa.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bahwa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Huruf pertama pada awal kalimat petikan langsung harus ditulis menggunakan huruf ....',
                                'explanation' => 'Huruf kapital.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kapital', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata ganti "kami" dalam kalimat langsung berubah menjadi kata ganti ... dalam kalimat tidak langsung.',
                                'explanation' => 'Mereka.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'mereka', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Keterangan waktu "besok" dalam kalimat langsung berubah menjadi keesokan ....',
                                'explanation' => 'Keesokan harinya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'harinya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan empat aturan tata cara penulisan tanda baca dan huruf kapital pada kalimat langsung menurut Pedoman Umum Ejaan Bahasa Indonesia (PUEBI)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Diapit Tanda Petik Ganda: Bagian kutipan langsung diapit oleh tanda petik ("...").
2. Huruf Kapital Awal Petikan: Huruf pertama pada kalimat yang dipetik selalu diawali huruf kapital.
3. Tanda Pemisah Pengiring: Tanda koma (,) digunakan untuk memisahkan kalimat petikan dari kalimat pengiring (baik pengiring di depan maupun di belakang petikan).
4. Posisi Tanda Baca Akhir: Tanda baca penutup (titik, tanya, atau seru) ditempatkan DI DALAM tanda petik penutup, bukan di luar tanda petik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Ubahlah dua kalimat langsung di bawah ini menjadi kalimat tidak langsung yang baku dan tepat!
a. Dokter berkata kepada pasien, "Kamu harus meminum obat ini secara teratur tiga kali sehari."
b. Farhan bertanya kepada Dimas, "Kapan kamu akan mengembalikan buku ensiklopedia sainsku?"',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan (a): "Dokter berkata kepada pasien bahwa ia harus meminum obat itu secara teratur tiga kali sehari."
   (Kamu -> ia, ini -> itu, hilangkan petik, tambah bahwa).
b. Perbaikan (b): "Farhan menanyakan kepada Dimas kapan ia akan mengembalikan buku ensiklopedia sainsnya."
   (Kamu -> ia, -ku -> -nya, hilangkan petik dan tanda tanya).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Ubahlah kutipan teks narasi tidak langsung berikut menjadi percakapan dialog kalimat langsung lengkap dengan tanda baca yang benar!

"Kepala sekolah mengumumkan kepada para siswa bahwa upacara peringatan Hari Sumpah Pemuda akan dilaksanakan pada hari Senin pagi di lapangan utama sekolah."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Perubahan Menjadi Kalimat Langsung:
Kepala sekolah mengumumkan kepada para siswa, "Upacara peringatan Hari Sumpah Pemuda akan dilaksanakan pada hari Senin pagi di lapangan utama sekolah."
(Atau: "Upacara peringatan Hari Sumpah Pemuda akan dilaksanakan pada hari Senin pagi di lapangan utama sekolah," umum Kepala sekolah kepada para siswa.)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 5 Bahasa Indonesia Kelas 6 (Paket 3 - Konjungsi Temporal & Kohesi Teks)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 5 bagian 3: Menguasai konjungsi temporal kronologis, pemaduan paragraf biografi, dan penulisan konjungsi antarkalimat baku.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Perjalanan Boyan Slat Merancang Pembersih Lautan', 'content' => '[Keterangan Gambar: Sistem penghalang terapung raksasa sepanjang 600 meter The Ocean Cleanup yang sedang menjaring tumpukan sampah plastik di Pusaran Sampah Pasifik Raya / Great Pacific Garbage Patch.]

Gagasan membersihkan samudra dari sampah plastik bermula ketika Boyan Slat berusia 16 tahun sedang menyelam di Yunani. Mula-mula, ia terkejut melihat lebih banyak kantong plastik daripada ikan di bawah air. Setelah itu, ia memutuskan meneliti masalah tersebut untuk proyek sains sekolah menengahnya. Pada awalnya, banyak ilmuwan meragukan gagasannya karena menganggap membersihkan lautan luas mustahil dilakukan.

Akan tetapi, Boyan pantang menyerah. Ia kemudian memutuskan keluar dari bangku kuliah teknik dirgantara demi mendirikan yayasan The Ocean Cleanup. Akhirnya, setelah bertahun-tahun merancang dan menguji purwarupa di laut lepas, sistem penjaring sampah terapung otomatis berhasil beroperasi dan mengangkat ratusan ton sampah plastik dari lautan dunia.'],
                            ['title' => 'Stimulus 2: Menelaah Ragam Konjungsi Temporal Kronologis', 'content' => '[Keterangan Gambar: Bagan urutan kronologis peristiwa: 1. Permulaan (mula-mula, awalnya, pertama-tama), 2. Kelanjutan (lalu, kemudian, setelah itu, selanjutnya), 3. Bersamaan (sementara itu, serentak dengan itu), 4. Pengakhiran (akhirnya, pada akhirnya, kesudahannya).]

Konjungsi temporal adalah kata hubung yang menerangkan urutan waktu atau hubungan kronologis antara dua peristiwa. Dalam teks biografi dan teks narasi, konjungsi temporal sangat penting untuk merangkai alur cerita agar pembaca dapat mengikuti perjalanan hidup tokoh secara runut dari masa ke masa. Konjungsi temporal antarkalimat diletakkan di awal kalimat baru dengan huruf kapital dan diikuti tanda koma (misalnya: *Setelah itu, ia melanjutkan studinya ke luar negeri.*).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, konjungsi temporal kronologis yang menunjukkan urutan awal tindakan Boyan Slat adalah ....',
                                'explanation' => 'Mula-mula menunjukkan tahapan awal peristiwa.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mula-mula / pada awalnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Akhirnya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kemudian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Akan tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi kronologis yang menandai puncak keberhasilan perjuangan Boyan Slat setelah bertahun-tahun merancang alat adalah ....',
                                'explanation' => 'Akhirnya menandai titik akhir capaian.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Akhirnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mula-mula', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Setelah itu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konjungsi kronologis urutan waktu yang terdapat dalam teks wacana!',
                                'explanation' => 'Setelah itu dan kemudian adalah konjungsi temporal kronologis urutan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Setelah itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kemudian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meskipun demikian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Oleh karena itu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan konjungsi kronologis dengan urutan tahapannya dalam cerita!',
                                'explanation' => 'Pasangan fungsi konjungsi kronologis.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mula-mula / Awalnya', 'is_correct' => false, 'match_key' => 'Tahap permulaan peristiwa', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Setelah itu / Selanjutnya', 'is_correct' => false, 'match_key' => 'Tahap perkembangan urutan berikutnya', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sementara itu', 'is_correct' => false, 'match_key' => 'Peristiwa yang berlangsung bersamaan waktunya', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Akhirnya', 'is_correct' => false, 'match_key' => 'Tahap penutup atau akhir peristiwa', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Fungsi utama konjungsi temporal dalam teks narasi dan biografi adalah ....',
                                'explanation' => 'Menghubungkan urutan waktu kronologis peristiwa.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Merangkai peristiwa secara runtut sesuai urutan waktu kejadian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membandingkan bentuk tubuh dua orang tokoh', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyatakan alasan sebab terjadinya musibah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menjelaskan definisi istilah ilmiah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh konjungsi temporal yang menyatakan peristiwa terjadi bersamaan pada waktu yang sama adalah ....',
                                'explanation' => 'Sementara itu menyatakan waktu bersamaan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sementara itu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mula-mula', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Setelah itu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Akhirnya', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran konjungsi temporal!',
                                'explanation' => 'Konjungsi temporal umum dipakai dalam teks narasi dan biografi.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata "kemudian" dan "lalu" digunakan untuk menyatakan kelanjutan waktu.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Konjungsi antarkalimat temporal di awal kalimat wajib diikuti tanda koma.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konjungsi temporal hanya boleh digunakan dalam teks iklan niaga.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan konjungsi temporal antarkalimat yang benar menurut PUEBI adalah ....',
                                'explanation' => 'Diawali huruf kapital dan diikuti tanda koma.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Setelah itu, ia menerima beasiswa prestasi.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Setelah itu ia menerima beasiswa prestasi.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Setelah itu: ia menerima beasiswa prestasi.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'setelah itu, ia menerima beasiswa prestasi.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi temporal yang tepat untuk melengkapi kalimat: "Ia menyapu halaman, ... menyiram bunga mawar" adalah ....',
                                'explanation' => 'Lalu/kemudian menyatakan kelanjutan perbuatan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'lalu / kemudian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'karena', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'walaupun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menggunakan konjungsi temporal permulaan adalah ....',
                                'explanation' => 'Mula-mula menyatakan tahap permulaan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mula-mula, para peserta lomba berkumpul di garis start.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Akhirnya, pelari nomor dada tujuh mencapai garis finis.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Setelah itu, para pemenang naik ke atas podium.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sementara itu, penonton bertepuk tangan meriah.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi antarkalimat yang menyatakan pertentangan dengan gagasan sebelumnya adalah ....',
                                'explanation' => 'Namun dan Akan tetapi menyatakan pertentangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Namun, / Akan tetapi,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh karena itu,', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Selain itu,', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Akibatnya,', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi antarkalimat yang menyatakan penambahan informasi adalah ....',
                                'explanation' => 'Selain itu menyatakan penambahan informasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Selain itu,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Namun,', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sebaliknya,', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Oleh sebab itu,', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi temporal intrakalimat yang menyatakan hubungan sebelum suatu perbuatan dilakukan adalah ....',
                                'explanation' => 'Sebelum menyatakan waktu pendahulu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sebelum', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Setelah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sesudah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk baku konjungsi antarkalimat pengakhiran adalah ....',
                                'explanation' => 'Akhirnya / Pada akhirnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pada akhirnya, / Akhirnya,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Akhir-akhirnya,', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kesudahan-sudahannya,', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Maka dari itu berakhir,', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konjungsi yang menyatakan urutan kelanjutan waktu!',
                                'explanation' => 'Kemudian dan selanjutnya menyatakan kelanjutan waktu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kemudian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Selanjutnya', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mula-mula', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pertama-tama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat yang memuat konjungsi temporal secara tepat!',
                                'explanation' => 'Kalimat A (setelah) dan B (sementara) memuat konjungsi temporal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Setelah sarapan pagi, Doni berpamitan kepada ibunya.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ibu menyiapkan bekal sementara ayah memanaskan sepeda motor.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Rani rajin belajar karena ia ingin pintar.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Apakah kamu suka membaca atau menggambar?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan jenis konjungsi antarkalimat dengan contoh katanya!',
                                'explanation' => 'Pasangan jenis konjungsi antarkalimat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Hubungan Pertentangan', 'is_correct' => false, 'match_key' => 'Akan tetapi, / Namun,', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Hubungan Waktu Kelanjutan', 'is_correct' => false, 'match_key' => 'Setelah itu, / Kemudian,', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hubungan Akibat', 'is_correct' => false, 'match_key' => 'Oleh karena itu, / Akibatnya,', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hubungan Tambahan', 'is_correct' => false, 'match_key' => 'Selain itu, / Di samping itu,', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan konjungsi waktu intrakalimat dengan maknanya!',
                                'explanation' => 'Pasangan makna konjungsi waktu intrakalimat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sejak', 'is_correct' => false, 'match_key' => 'Menyatakan permulaan waktu di masa lampau', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Selama', 'is_correct' => false, 'match_key' => 'Menyatakan rentang durasi waktu berlangsungnya perbuatan', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Hingga / Sampai', 'is_correct' => false, 'match_key' => 'Menyatakan batas akhir waktu perbuatan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Ketika / Saat', 'is_correct' => false, 'match_key' => 'Menyatakan titik waktu bersamaan terjadinya peristiwa', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran fungsi konjungsi dalam paragraf!',
                                'explanation' => 'Kata "lalu" adalah konjungsi intrakalimat, bukan konjungsi antarkalimat (gunakan "Setelah itu," atau "Kemudian,").',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi membantu menciptakan kepaduan makna (kohesi) antarkalimat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tanda koma wajib diletakkan setelah konjungsi antarkalimat di awal kalimat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konjungsi "lalu" dapat diletakkan di awal kalimat baru sebagai konjungsi antarkalimat.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran urutan waktu dalam narasi!',
                                'explanation' => 'Pada mulanya menyatakan awal, pada akhirnya menyatakan penutup.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Paragraf yang baik menyusun urutan peristiwa secara logis dan kronologis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata "pada mulanya" sama fungsinya dengan kata "pada akhirnya".', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konjungsi "sementara itu" menunjukkan dua hal terjadi pada waktu bersamaan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Konjungsi yang menghubungkan urutan waktu peristiwa disebut konjungsi ....',
                                'explanation' => 'Konjungsi temporal (waktu).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'temporal', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi temporal yang menyatakan tahap awal suatu kegiatan adalah mula-....',
                                'explanation' => 'Mula-mula.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'mula', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda baca yang wajib ditulis setelah konjungsi antarkalimat "Setelah itu" di awal kalimat adalah tanda ....',
                                'explanation' => 'Tanda koma.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'koma', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi intrakalimat yang menyatakan perbuatan yang berlangsung bersamaan waktunya adalah ....',
                                'explanation' => 'Sementara atau ketika.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sementara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi temporal penutup yang menandai akhir dari suatu rangkaian cerita adalah ....',
                                'explanation' => 'Akhirnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'akhirnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Keterikatan antarelemen teks yang padu secara struktur kebahasaan disebut ....',
                                'explanation' => 'Kohesi tekstual.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kohesi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk konjungsi antarkalimat yang menyatakan pertentangan dan diikuti tanda koma adalah ....',
                                'explanation' => 'Namun, atau Akan tetapi,.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'namun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan fungsi penting konjungsi temporal kronologis dalam penyusunan sebuah teks narasi atau biografi, serta berikan contoh rantai konjungsi temporal yang biasa dipakai untuk menyusun alur cerita dari awal hingga akhir!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Fungsi Penting: Konjungsi temporal menjaga alur cerita tersusun secara kronologis dan logis sehingga pembaca dapat memahami urutan perjalanan hidup tokoh dari masa ke masa secara runut tanpa kebingungan.
2. Rantai Konjungsi Temporal:
   - Tahap Awal: Mula-mula, pertama-tama, pada awalnya.
   - Tahap Perkembangan: Setelah itu, kemudian, selanjutnya, lalu.
   - Tahap Bersamaan: Sementara itu, sewaktu, ketika.
   - Tahap Akhir: Akhirnya, pada akhirnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Gabungkanlah kalimat-kalimat terpisah di bawah ini menjadi satu paragraf narasi biografi yang padu dan kohesif dengan memanfaatkan minimal tiga konjungsi temporal yang tepat!

Kalimat 1: Louis Braille mengalami kebutaan pada kedua matanya akibat kecelakaan di bengkel ayahnya.
Kalimat 2: Ia belajar di Institut Nasional untuk Pemuda Tunanetra di Paris.
Kalimat 3: Ia mulai mengembangkan sistem kode huruf timbul enam titik.
Kalimat 4: Alfabet Braille diakui di seluruh dunia dan membantu jutaan tunanetra membaca.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Penggabungan Paragraf Padu:
"Pada awalnya, Louis Braille mengalami kebutaan pada kedua matanya akibat kecelakaan kerja di bengkel ayahnya saat berusia belia. Setelah itu, ia melanjutkan pendidikannya di Institut Nasional untuk Pemuda Tunanetra di Paris. Di sekolah tersebut, ia kemudian mulai mengembangkan sistem kode huruf timbul enam titik yang praktis untuk membaca. Akhirnya, sistem alfabet Braille ciptaannya diakui secara luas di seluruh dunia dan berhasil membantu jutaan penyandang tunanetra membaca serta mengakses ilmu pengetahuan."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah tiga kalimat yang masing-masing menggunakan konjungsi antarkalimat yang berbeda secara benar sesuai aturan tanda baca PUEBI:
a. Menggunakan konjungsi temporal urutan ("Setelah itu,")
b. Menggunakan konjungsi pertentangan ("Akan tetapi,")
c. Menggunakan konjungsi kesimpulan/akibat ("Oleh karena itu,")',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Contoh (a): "Farhan menyelesaikan rancangan purwarupa robotnya di laboratorium sekolah. Setelah itu, ia mempresentasikan cara kerjanya di hadapan dewan juri lomba."
b. Contoh (b): "Banyak pihak meragukan ide pembuatan aplikasi pendeteksi banjir tersebut. Akan tetapi, para siswa peneliti cilik itu tidak pernah patah semangat."
c. Contoh (c): "Kawasan hulu sungai mengalami erosi parah akibat penebangan liar. Oleh karena itu, penanaman kembali ribuan pohon vetiver harus segera dilaksanakan."',
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
