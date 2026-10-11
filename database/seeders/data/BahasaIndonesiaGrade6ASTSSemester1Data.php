<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6ASTSSemester1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Tengah Semester 1 (ASTS 1) Bahasa Indonesia Kelas 6 - Paket A',
                'type' => 'exam',
                'description' => 'Asesmen sumatif tengah semester ganjil (Paket A): Menguji penguasaan Bab 1 dan Bab 2 mencakup korespondensi resmi, teks deskripsi, wawancara, kata serapan, dan majas.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Kiprah Paduan Suara Anak Indonesia di Kompetisi Internasional', 'content' => '[Keterangan Gambar: Tim paduan suara cilik Indonesia mengenakan pakaian adat Toraja berdiri di podium juara pertama festival paduan suara dunia di Italia.]

Paduan Suara Anak Nusantara (PSAN) menorehkan tinta emas di kancah musik dunia. Dalam ajang "World Choral Championship" yang digelar di Roma, Italia, kelompok paduan suara yang beranggotakan 32 anak usia 10-12 tahun ini sukses meraih juara umum. Mereka membawakan dua repertoar lagu tradisional, yaitu "Yamko Rambe Yamko" dari Papua dan "Janger" dari Bali. Penampilan mereka memukau dewan juri karena memadukan harmoni vokal bertingkat dengan koreografi tarian yang lincah dan berenergi tinggi. Balutan kostum tenun ikat khas Toraja bermotif geometris semakin memperkuat identitas budaya nusantara di panggung Eropa. Keberhasilan ini membuktikan bahwa anak-anak Indonesia mampu bersaing dan menggetarkan panggung kebudayaan internasional.'],
                            ['title' => 'Stimulus 2: Menelaah Format Surat Resmi Dinas Sekolah', 'content' => '[Keterangan Gambar: Contoh surat dinas sekolah dengan bagian kop surat bernomor resmi, perihal permohonan dispensasi siswa berprestasi, tanggal surat, salam pembuka, isi, dan tanda tangan kepala sekolah berstempel dinas.]

Surat dinas resmi merupakan sarana komunikasi tertulis yang digunakan oleh instansi pendidikan atau organisasi formal. Bahasa yang digunakan harus lugas, jelas, dan menggunakan ragam baku sesuai kaidah PUEBI. Salah satu prinsip utama penulisan surat resmi adalah kehematan kata (efisiensi). Penulis dilarang menggunakan kata-kata mubazir seperti "adalah merupakan", "sangat indah sekali", atau "demi untuk". Selain itu, kata sapaan wajib ditulis dengan huruf kapital di awal, misalnya "Bapak", "Ibu", atau "Saudara".'],
                            ['title' => 'Stimulus 3: Majas dan Keindahan Bahasa dalam Resensi Musik', 'content' => '[Keterangan Gambar: Lembar kritik musik budaya yang mengulas harmoni gesekan rebab Sunda dalam pementasan karawitan kontemporer.]

Gesekan rebab Mang Kardi merayap perlahan menembus kesunyian malam. Suaranya meliuk-liuk bagai sulur tanaman anggur yang membelit tiang panggung bambu. Melodi dawai tunggal itu seakan berbisik mengisahkan keagungan masa silam Tanah Pasundan. Para penonton terpaku tanpa kata, terhipnotis oleh sihir nada yang mengalir tenang laksana arus sungai jernih di kaki Gunung Salak. Kritik seni memuji kemahiran Mang Kardi yang mampu menghidupkan jiwa pada sebatang kayu dan seutas kawat sederhana.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, ajang internasional yang berhasil dijuarai oleh Tim PSAN bertempat di kota ....',
                                'explanation' => 'Dalam teks: "Dalam ajang World Choral Championship yang digelar di Roma, Italia..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Roma, Italia', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Paris, Prancis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tokyo, Jepang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'New York, Amerika Serikat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Faktor utama yang membuat dewan juri festival terpukau pada penampilan tim PSAN adalah ....',
                                'explanation' => 'Dewan juri terpukau perpaduan vokal harmonis dan koreografi tari dinamis.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perpaduan harmoni vokal yang matang dengan koreografi tarian lincah berenergi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penggunaan alat musik elektronik canggih buatan Eropa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jumlah anggota paduan suara yang paling banyak dibanding negara lain', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Lagu yang dinyanyikan berbahasa Italia fasih', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA lagu daerah yang dibawakan oleh Tim PSAN dalam kejuaraan dunia tersebut!',
                                'explanation' => 'Lagu yang dibawakan adalah Yamko Rambe Yamko dan Janger.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yamko Rambe Yamko dari Papua', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Janger dari Bali', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bungong Jeumpa dari Aceh', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kicir-Kicir dari Jakarta', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek pertunjukan PSAN di kolom kiri dengan keterangannya di kolom kanan!',
                                'explanation' => 'Pasangan fakta prestasi paduan suara anak nusantara.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Repertoar Lagu', 'is_correct' => false, 'match_key' => 'Lagu tradisional Papua dan Bali', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kostum Pertunjukan', 'is_correct' => false, 'match_key' => 'Tenun ikat khas Toraja bermotif geometris', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jumlah Anggota', 'is_correct' => false, 'match_key' => '32 siswa usia 10 hingga 12 tahun', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Hasil Kejuaraan', 'is_correct' => false, 'match_key' => 'Juara umum World Choral Championship', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri utama ragam bahasa yang wajib digunakan dalam surat dinas resmi adalah ....',
                                'explanation' => 'Surat resmi wajib baku, lugas, santun, dan hemat kata.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Baku, lugas, santun, dan hemat kata sesuai kaidah PUEBI', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penuh kiasan majas hiperbola agar berkesan dramatis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bahasa sehari-hari yang akrab dengan singkatan gaul', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bahasa daerah tanpa terjemahan bahasa Indonesia', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh frasa mubazir (tidak hemat kata) yang harus dihindari dalam surat resmi adalah ....',
                                'explanation' => '"Adalah merupakan" pemborosan kata bersinonim yang mubazir.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Adalah merupakan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh karena itu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sehubungan dengan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dengan hormat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah penulisan surat resmi berikut!',
                                'explanation' => 'Surat dinas dari sekolah wajib memakai kop surat resmi.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata sapaan seperti Bapak atau Ibu wajib diawali huruf kapital.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Surat dinas resmi tidak memerlukan kop surat jika ditujukan kepada orang tua siswa.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Stempel dinas dibubuhkan menyinggung tanda tangan pimpinan instansi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan salam pembuka surat dinas yang benar menurut ejaan baku adalah ....',
                                'explanation' => 'Penulisan baku: Dengan hormat, (diakhiri tanda koma).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dengan hormat,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dengan Hormat!', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'dengan hormat.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dengan hormat;', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas asosiasi (perumpamaan) yang terdapat pada wacana Stimulus 3 adalah ....',
                                'explanation' => 'Frasa "bagai sulur tanaman anggur" adalah majas asosiasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Suaranya meliuk-liuk bagai sulur tanaman anggur', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Gesekan rebab merayap perlahan menembus kesunyian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Melodi dawai seakan berbisik mengisahkan masa silam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Para penonton terpaku tanpa kata', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas personifikasi pada teks ditunjukkan oleh kalimat ....',
                                'explanation' => 'Dawai berbisik mengisahkan masa silam adalah personifikasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Melodi dawai tunggal itu seakan berbisik mengisahkan keagungan masa silam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Para penonton terpaku tanpa kata di kursinya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Suaranya meliuk-liuk bagai sulur anggur', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rebab Mang Kardi terbuat dari sebatang kayu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran analisis gaya bahasa pada teks resensi musik!',
                                'explanation' => 'Ulasan seni menggunakan majas untuk menghidupkan penggambaran estetika.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Frasa "tenang laksana arus sungai" menggunakan kata pembanding "laksana".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teks tersebut tidak memuat majas sama sekali karena merupakan ulasan fakta.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Penggunaan majas pada ulasan seni bertujuan memperkuat imajinasi pembaca.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA cerapan indra yang dominan digunakan dalam wacana Stimulus 3!',
                                'explanation' => 'Teks didominasi cerapan pendengaran dan penglihatan.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cerapan indra pendengaran (alunan suara rebab meliuk-liuk)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cerapan indra penglihatan (sulur tanaman bambu dan penonton terpaku)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Cerapan indra pencecapan rasa masakan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cerapan indra penciuman aroma wangi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian surat resmi yang memuat tanggal surat, nomor surat, dan perihal terletak di bagian ....',
                                'explanation' => 'Nomor, lampiran, perihal, dan tanggal terletak di bagian kepala surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kepala (awal) surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Isi surat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penutup surat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kaki surat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan alamat tujuan surat yang tepat menurut kaidah PUEBI adalah ....',
                                'explanation' => 'Tidak menggunakan kata "Kepada", singkatan "Yth." tanpa titik dua, kata "Jalan" tidak disingkat, dan tanpa titik di akhir alamat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yth. Kepala SD Negeri 1 Merdeka
Jalan Pemuda No. 10
Surabaya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kepada Yth. Bapak Kepala SD Negeri 1 Merdeka
Jl. Pemuda 10
Surabaya.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Yth: Kepala SDN 1 Merdeka
Jln Pemuda No 10
Surabaya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kepada Yth: Kepala Sekolah SD 1 Merdeka
di Tempat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya yang tepat untuk menggali informasi mengenai alasan suatu kebijakan diambil adalah ....',
                                'explanation' => 'Mengapa menanyakan alasan/sebab.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengapa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berapa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Di mana', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat wawancara berikut yang termasuk jenis pertanyaan terbuka adalah ....',
                                'explanation' => 'Pertanyaan "bagaimana strategi..." menuntut penjelasan rinci (terbuka).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bagaimana strategi sekolah Bapak dalam membina bakat seni para siswa?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Apakah sekolah Bapak memiliki grup musik angklung?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah Bapak menjabat sebagai kepala sekolah di sini?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berapa jumlah siswa yang ikut lomba hari ini?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk baku dari kata serapan "tehnik" dan "aktifitas" adalah ....',
                                'explanation' => 'Baku: teknik dan aktivitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Teknik dan aktivitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tehnik dan aktifitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Teknik dan aktifitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Teknologi dan aktivis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kata serapan berimbuhan yang benar adalah ....',
                                'explanation' => 'Huruf V tidak luluh: memverifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memverifikasi (dari verifikasi)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Memferifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengverifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Meverifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat majemuk setara yang menyatakan hubungan perlawanan/pertentangan adalah ....',
                                'explanation' => 'Konjungsi "tetapi" menyatakan pertentangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dini gemar memainkan biolanya, tetapi adiknya lebih memilih bermain drum.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dini memainkan biolanya dan adiknya bernyanyi dengan gembira.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah Dini akan bermain biola atau bermain piano?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dini bermain biola ketika para tamu mulai berdatangan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata gabung yang ditulis serangkai karena telah padu benar adalah ....',
                                'explanation' => 'Kacamata, beasiswa, dan olahraga ditulis serangkai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kacamata, beasiswa, dan olahraga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tanggungjawab, kerjasama, dan tatabahasa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bumi putera, pasca panen, dan tatausaha', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Budi pekerti, rumah sakit, dan kerja sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas yang membandingkan suatu benda secara langsung dengan benda lain yang memiliki sifat sama disebut ....',
                                'explanation' => 'Metafora membandingkan langsung tanpa kata perbanding.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh majas hiperbola dalam kalimat bertema perjuangan adalah ....',
                                'explanation' => 'Pekik menggelegar meruntuhkan langit adalah hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pekik kemerdekaan para pejuang menggelegar meruntuhkan langit angkasa.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bendera merah putih berkibar anggun menyapa para pahlawan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bung Tomo adalah singa podium perjuangan Surabaya.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kami hanyalah rakyat jelata yang tidak memiliki daya apa-apa.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri utama teks deskripsi yang membedakannya dengan teks narasi!',
                                'explanation' => 'Deskripsi merinci ciri fisik dan melibatkan pancaindra tanpa alur cerita konflik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggambarkan ciri fisik, warna, bentuk, atau sifat objek secara rinci', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Melibatkan cerapan pancaindra pembaca', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memiliki alur cerita dengan konflik tokoh dan penyelesaian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berisi argumen untuk meyakinkan pembaca membeli produk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konjungsi koordinatif yang digunakan dalam kalimat majemuk setara!',
                                'explanation' => 'Dan dan sedangkan adalah konjungsi koordinatif (setara). Karena dan sehingga adalah subordinatif (bertingkat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sedangkan', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karena', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sehingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata serapan yang penulisannya sudah sesuai dengan KBBI!',
                                'explanation' => 'Sistem dan objektif adalah bentuk baku resmi KBBI.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sistem (bukan sistim)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Objektif (bukan obyektif)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kwalitas (bukan kualitas)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Praktek (bukan praktik)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah kebahasaan di kolom kiri dengan definisinya di kolom kanan!',
                                'explanation' => 'Pasangan istilah linguistik dasar SD.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi', 'is_correct' => false, 'match_key' => 'Kata tugas yang menghubungkan antarklausa atau antarkalimat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Majas', 'is_correct' => false, 'match_key' => 'Gaya bahasa kiasan untuk menciptakan efek estetika', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Cerapan Indra', 'is_correct' => false, 'match_key' => 'Deskripsi yang merangsang penglihatan, pendengaran, atau perabaan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kata Serapan', 'is_correct' => false, 'match_key' => 'Kata yang dipinjam dari bahasa asing atau bahasa daerah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kalimat dengan jenis majas yang dikandungnya!',
                                'explanation' => 'Pasangan contoh kalimat dan majasnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kamera fotografer itu membidik sasaran dengan sigap', 'is_correct' => false, 'match_key' => 'Majas Personifikasi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Buku adalah jendela dunia', 'is_correct' => false, 'match_key' => 'Majas Metafora', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Air matanya membanjiri ruang aula', 'is_correct' => false, 'match_key' => 'Majas Hiperbola', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Singgahlah ke gubuk reotku', 'is_correct' => false, 'match_key' => 'Majas Litotes', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kata serapan bahasa Inggris dengan bentuk bakunya dalam bahasa Indonesia!',
                                'explanation' => 'Pasangan kata serapan dan bentuk bakunya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Activity', 'is_correct' => false, 'match_key' => 'Aktivitas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'System', 'is_correct' => false, 'match_key' => 'Sistem', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Effective', 'is_correct' => false, 'match_key' => 'Efektif', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Technique', 'is_correct' => false, 'match_key' => 'Teknik', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penulisan unsur serapan!',
                                'explanation' => 'Huruf x di awal kata diserap menjadi s (xylophone -> silofon).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Huruf c di depan a, u, o diserap menjadi k (contoh: camera -> kamera).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Huruf ph diserap menjadi f (contoh: photo -> foto).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Huruf x di awal kata diserap menjadi ks (contoh: xylophone -> ksilofon).', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kalimat majemuk setara!',
                                'explanation' => 'Sebab dan karena adalah konjungsi bertingkat (subordinatif).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi "atau" digunakan untuk menyatakan pilihan antarklausa.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Klausa dalam kalimat majemuk setara dapat berdiri sendiri sebagai kalimat tunggal.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "sebab" dan "karena" termasuk konjungsi setara.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Kepala surat dinas resmi instansi sering disebut juga ....',
                                'explanation' => 'Kop surat memuat identitas lembaga.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kop surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Singkatan "PUEBI" adalah Pedoman Umum ... Bahasa Indonesia.',
                                'explanation' => 'Pedoman Umum Ejaan Bahasa Indonesia.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Ejaan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku dari kata serapan "obyek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: objek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'objek', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku dari kata serapan "kongkrit" menurut KBBI adalah ....',
                                'explanation' => 'Baku: konkret.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'konkret', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat majemuk yang menghubungkan dua klausa yang setara disebut kalimat majemuk ....',
                                'explanation' => 'Kalimat majemuk setara.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'setara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda baca yang memisahkan nama kota dan tanggal surat dinas adalah tanda ....',
                                'explanation' => 'Nama tempat diikuti tanda koma.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'koma', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata serapan "musisi" diserap dari bahasa Inggris yaitu ....',
                                'explanation' => 'Diserap dari kata musician.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'musician', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Gaya bahasa yang membandingkan benda mati seolah bersikap seperti manusia disebut majas ....',
                                'explanation' => 'Personifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'personifikasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat "Parasnya ayu laksana rembulan" menggunakan majas ....',
                                'explanation' => 'Asosiasi/simile menggunakan kata laksana.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'asosiasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Alat musik dawai khas Nusa Tenggara Timur yang terbuat dari daun lontar adalah ....',
                                'explanation' => 'Sasando dari Pulau Rote NTT.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sasando', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Unsur wawancara yang menanyakan waktu kejadian adalah kata tanya ....',
                                'explanation' => 'Kapan menanyakan waktu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kapan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Orang yang memberikan informasi dalam wawancara disebut ....',
                                'explanation' => 'Narasumber pemberi informasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'narasumber', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi koordinatif untuk menyatakan hubungan penjumlahan adalah ....',
                                'explanation' => 'Dan menyatakan penjumlahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan bahasa Indonesia untuk kata serapan "gadget" adalah ....',
                                'explanation' => 'Gadget dipadankan menjadi gawai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'gawai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Teks yang melukiskan suatu objek secara rinci dengan pancaindra dinamakan teks ....',
                                'explanation' => 'Teks deskripsi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'deskripsi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan lima bagian pokok yang wajib ada dalam sebuah surat resmi dinas sekolah, dan jelaskan fungsi masing-masing bagian tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Kop/Kepala Surat: Memuat identitas resmi instansi pengirim (nama, logo, alamat, kontak).
2. Nomor Surat & Tanggal: Sebagai arsip resmi korespondensi dan penanda waktu pembuatan surat.
3. Alamat Tujuan: Menunjukkan pihak penerima surat secara jelas dan spesifik.
4. Isi Surat (Pembuka, Inti, Penutup): Memuat maksud dan tujuan penyampaian informasi atau undangan dinas.
5. Tanda Tangan, Nama Terang & Stempel: Mengesahkan legalitas dan pertanggungjawaban isi surat oleh pejabat berwenang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan perbedaan antara teks deskripsi dan teks wawancara berdasarkan tujuan penulisan dan struktur penyajiannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tujuan Penulisan:
   - Teks Deskripsi bertujuan menggambarkan objek, tempat, atau suasana secara mendalam agar pembaca seolah merasakan dan melihat sendiri.
   - Teks Wawancara bertujuan menggali informasi faktual, wawasan, atau pendapat dari narasumber kompeten mengenai suatu isu tertentu.
2. Struktur Penyajian:
   - Teks Deskripsi tersusun atas identifikasi umum, deskripsi bagian-bagian objek, dan simpulan/kesan.
   - Teks Wawancara tersusun atas pembukaan (pengantar topik), transkrip dialog tanya-jawab (atau narasi fakta hasil wawancara), dan penutup/simpulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah dua kalimat majemuk setara dengan ketentuan sebagai berikut:
a. Menggunakan konjungsi pertentangan "tetapi" atau "sedangkan" dengan tema prestasi musik anak Indonesia.
b. Menggunakan konjungsi penggabungan "dan" dengan tema kerja sama pementasan seni budaya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Contoh (pertentangan): "Tim paduan suara anak itu menghadapi jadwal latihan yang sangat padat, tetapi mereka tetap mampu meraih prestasi juara pertama di Italia."
b. Contoh (penggabungan): "Siswa kelas enam menyiapkan instrumen musik tradisional gamelan di panggung dan guru kesenian mengatur tata cahaya lampu pementasan."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbaikilah kalimat-kalimat di bawah ini menjadi kalimat baku yang efektif sesuai PUEBI!
a. Kepada para bapak-bapak dan ibu-ibu sekalian dimohon untuk segera memasuki daripada ruangan aula.
b. Tim paduan suara itu sangat berprestasi sekali karena sering mempraktekkan sistim vokal yang efisiens.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Bapak dan Ibu dimohon segera memasuki ruangan aula." (Menghilangkan kata mubazir: Kepada, para, -sekalian, daripada).
b. Perbaikan: "Tim paduan suara itu sangat berprestasi karena sering mempraktikkan sistem vokal yang efisien." (Menghilangkan sekali, mempraktekkan -> mempraktikkan, sistim -> sistem, efisiens -> efisien).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan dan jelaskan tiga jenis majas (personifikasi, metafora, dan hiperbola), kemudian buatlah masing-masing satu contoh kalimat bertema kekayaan alam atau budaya Indonesia!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Personifikasi: Melekatkan sifat insani manusia pada benda mati.
   - Contoh: "Hutan bakau di pesisir Papua memeluk erat bibir pantai dari gempuran ombak Samudra Pasifik."
2. Metafora: Perbandingan langsung dua hal yang memiliki kesamaan sifat tanpa kata pembanding.
   - Contoh: "Candi Borobudur adalah mahkota keagungan arsitektur peradaban nusantara masa lampau."
3. Hiperbola: Gaya bahasa yang melebih-lebihkan kenyataan untuk memberi efek dramatis.
   - Contoh: "Semangat cinta tanah air para pemuda nusantara bergelora membakar seluruh penjuru cakrawala."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester 1 (ASTS 1) Bahasa Indonesia Kelas 6 - Paket B',
                'type' => 'exam',
                'description' => 'Asesmen sumatif tengah semester ganjil (Paket B): Pengujian komprehensif Bab 1 dan Bab 2 mencakup etika wawancara, teks narasi profil tokoh, ejaan baku kata serapan, dan apresiasi majas.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Sang Grandmaster Cilik Mengharumkan Nusantara', 'content' => '[Keterangan Gambar: Pecatur cilik kelas 6 SD duduk tenang di depan papan catur kayu menghadapi grandmaster internasional senior dengan tatapan tajam dan penuh konsentrasi.]

Satria (12 tahun) menorehkan prestasi gemilang di Kejuaraan Catur Yunior Asia. Siswa kelas 6 SD ini berhasil mengalahkan pecatur tangguh dari berbagai negara berkat ketenangan berpikir dan kejelian membaca taktik lawan. Menurut pelatihnya, Satria memiliki disiplin latihan yang luar biasa. Setiap hari ia mempelajari ratusan variasi pembukaan catur klasik selama empat jam. Keberhasilannya meraih gelar Master FIDE Cilik menjadikannya salah satu aset emas olahraga asah otak nasional. Satria membuktikan bahwa ketekunan dan kerja keras adalah kunci utama menaklukkan panggung prestasi internasional.'],
                            ['title' => 'Stimulus 2: Mengisi Formulir Pendaftaran Uji Kemahiran Berbahasa', 'content' => '[Keterangan Gambar: Lembar formulir resmi Uji Kemahiran Berbahasa Indonesia (UKBI) Pelajar, memuat identitas pendaftar, sekolah, kelas, serta pernyataan keabsahan data.]

Mengisi formulir resmi memerlukan kecermatan tinggi. Calon peserta wajib membaca petunjuk pengisian terlebih dahulu sebelum menuliskan data. Setiap kolom data seperti Tempat dan Tanggal Lahir harus diisi sesuai dokumen otentik akta kelahiran atau kartu keluarga. Kesalahan dalam pengisian dapat menyebabkan diskualifikasi atau penolakan sistem daring. Pada bagian akhir, formulir selalu memuat tanda tangan pemohon di atas tanggal pengisian sebagai bentuk pertanggungjawaban hukum bahwa seluruh data yang diisikan adalah benar dan dapat dipertanggungjawabkan.'],
                            ['title' => 'Stimulus 3: Majas dalam Puisi Gemerlap Bintang Panggung', 'content' => '[Keterangan Gambar: Lukisan panggung teater dengan tata cahaya warna-warni yang menyorot seorang pemain biola cilik.]

Bait Puisi:
Lampu panggung tersenyum menatap langkahmu,
Dawai biolamu menyanyikan kidung sukacita,
Suaramu merdu laksana embun pagi membasahi kelopak melati,
Tepuk tangan penonton bergemuruh merobohkan dinding gedung teater,
Engkau berdiri tegak bak ksatria pelindung seni bangsa.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, kunci utama keberhasilan Satria menaklukkan panggung internasional adalah ....',
                                'explanation' => 'Dalam teks: "ketekunan dan kerja keras adalah kunci utama menaklukkan panggung prestasi internasional."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ketekunan dan kerja keras dalam disiplin latihan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kekayaan materi orang tuanya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Keberuntungan semata saat melempar dadu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bantuan curang dari penonton turnamen', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Karakteristik kepribadian Satria yang menonjol saat bertanding di depan papan catur adalah ....',
                                'explanation' => 'Satria bertanding dengan tenang dan jeli.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tenang dalam berpikir dan jeli membaca taktik lawan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Gugup dan tergesa-gesa menjalankan bidak', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Suka berbicara keras untuk mengintimidasi musuh', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mudah putus asa saat posisinya terdesak', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA fakta mengenai tokoh Satria yang tercantum dalam wacana!',
                                'explanation' => 'Satria meraih Master FIDE Cilik dan berlatih catur 4 jam per hari.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berhasil meraih gelar Master FIDE Cilik di Kejuaraan Catur Yunior Asia', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Berlatih variasi pembukaan catur klasik selama empat jam setiap hari', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Merupakan atlet cabang olahraga pencak silat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bersekolah di sekolah menengah pertama negeri', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek prestasi Satria dengan keterangannya!',
                                'explanation' => 'Pasangan fakta profil prestasi catur cilik.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Ajang Turnamen', 'is_correct' => false, 'match_key' => 'Kejuaraan Catur Yunior Asia', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Gelar Prestasi', 'is_correct' => false, 'match_key' => 'Master FIDE Cilik', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Disiplin Latihan', 'is_correct' => false, 'match_key' => 'Mempelajari variasi catur 4 jam per hari', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Sifat Unggul', 'is_correct' => false, 'match_key' => 'Tenang dan jeli membaca taktik', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Langkah pertama yang wajib dilakukan sebelum mengisi formulir resmi adalah ....',
                                'explanation' => 'Membaca petunjuk pengisian adalah langkah wajib pertama.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Membaca petunjuk pengisian dengan saksama', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Langsung menandatangani lembar formulir yang kosong', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menuliskan nomor kontak teman sekelas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Meminta panitia mengisi seluruh kolom formulir', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dokumen otentik yang menjadi rujukan pengisian data tempat dan tanggal lahir adalah ....',
                                'explanation' => 'Akta kelahiran dan kartu keluarga adalah dokumen otentik resmi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Akta kelahiran atau kartu keluarga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Buku komik kesukaan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Catatan buku harian pribadi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kuitansi pembayaran toko serba ada', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan pengisian formulir!',
                                'explanation' => 'Tanda tangan membuktikan tanggung jawab sah pengisi formulir.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Data formulir wajib diisi dengan informasi yang jujur dan benar.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Tanda tangan pemohon tidak memiliki konsekuensi tanggung jawab data.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kesalahan penulisan identitas dapat menyebabkan kendala administrasi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan tempat dan tanggal pengisian formulir yang tepat adalah ....',
                                'explanation' => 'Penulisan baku: Semarang, 15 September 2026.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Semarang, 15 September 2026', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Semarang; 15-09-2026', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Semarang 15 September 2026.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semarang, 15/09/2026', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Larik puisi yang menggunakan majas personifikasi adalah ....',
                                'explanation' => 'Lampu tersenyum menatap adalah personifikasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Lampu panggung tersenyum menatap langkahmu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Engkau berdiri tegak bak ksatria pelindung seni', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Suaramu merdu laksana embun pagi membasahi melati', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tepuk tangan penonton bergemuruh merobohkan dinding', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Larik puisi yang mengandung majas hiperbola adalah ....',
                                'explanation' => 'Tepuk tangan merobohkan dinding adalah hiperbola.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tepuk tangan penonton bergemuruh merobohkan dinding gedung teater', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Suaramu merdu laksana embun pagi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lampu panggung tersenyum menatap langkahmu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dawai biolamu menyanyikan kidung sukacita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran majas pada puisi tersebut!',
                                'explanation' => 'Larik kelima menggunakan majas asosiasi (bak ksatria), bukan litotes.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Larik ketiga memuat majas asosiasi dengan kata perbanding "laksana".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Larik kelima memuat majas litotes yang merendahkan diri.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Puisi tersebut memanfaatkan majas untuk memperkuat keindahan estetika.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA larik puisi yang menggunakan kata pembanding majas asosiasi!',
                                'explanation' => 'Laksana dan bak adalah kata pembanding majas asosiasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Suaramu merdu laksana embun pagi membasahi kelopak melati', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Engkau berdiri tegak bak ksatria pelindung seni bangsa', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lampu panggung tersenyum menatap langkahmu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tepuk tangan penonton bergemuruh merobohkan dinding', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian surat resmi yang memuat tanggal surat, nomor surat, dan perihal terletak di bagian ....',
                                'explanation' => 'Nomor, lampiran, perihal, dan tanggal terletak di bagian kepala surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kepala (awal) surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Isi surat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penutup surat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kaki surat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan alamat tujuan surat yang tepat menurut kaidah PUEBI adalah ....',
                                'explanation' => 'Tidak menggunakan kata "Kepada", singkatan "Yth." tanpa titik dua, kata "Jalan" tidak disingkat, dan tanpa titik di akhir alamat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yth. Kepala SD Negeri 1 Merdeka
Jalan Pemuda No. 10
Surabaya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kepada Yth. Bapak Kepala SD Negeri 1 Merdeka
Jl. Pemuda 10
Surabaya.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Yth: Kepala SDN 1 Merdeka
Jln Pemuda No 10
Surabaya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kepada Yth: Kepala Sekolah SD 1 Merdeka
di Tempat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya yang tepat untuk menggali informasi mengenai alasan suatu kebijakan diambil adalah ....',
                                'explanation' => 'Mengapa menanyakan alasan/sebab.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengapa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berapa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Di mana', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat wawancara berikut yang termasuk jenis pertanyaan terbuka adalah ....',
                                'explanation' => 'Pertanyaan "bagaimana strategi..." menuntut penjelasan rinci (terbuka).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bagaimana strategi sekolah Bapak dalam membina bakat seni para siswa?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Apakah sekolah Bapak memiliki grup musik angklung?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah Bapak menjabat sebagai kepala sekolah di sini?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berapa jumlah siswa yang ikut lomba hari ini?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk baku dari kata serapan "tehnik" dan "aktifitas" adalah ....',
                                'explanation' => 'Baku: teknik dan aktivitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Teknik dan aktivitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tehnik dan aktifitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Teknik dan aktifitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Teknologi dan aktivis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kata serapan berimbuhan yang benar adalah ....',
                                'explanation' => 'Huruf V tidak luluh: memverifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memverifikasi (dari verifikasi)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Memferifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengverifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Meverifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat majemuk setara yang menyatakan hubungan perlawanan/pertentangan adalah ....',
                                'explanation' => 'Konjungsi "tetapi" menyatakan pertentangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dini gemar memainkan biolanya, tetapi adiknya lebih memilih bermain drum.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dini memainkan biolanya dan adiknya bernyanyi dengan gembira.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah Dini akan bermain biola atau bermain piano?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dini bermain biola ketika para tamu mulai berdatangan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata gabung yang ditulis serangkai karena telah padu benar adalah ....',
                                'explanation' => 'Kacamata, beasiswa, dan olahraga ditulis serangkai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kacamata, beasiswa, dan olahraga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tanggungjawab, kerjasama, dan tatabahasa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bumi putera, pasca panen, dan tatausaha', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Budi pekerti, rumah sakit, dan kerja sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas yang membandingkan suatu benda secara langsung dengan benda lain yang memiliki sifat sama disebut ....',
                                'explanation' => 'Metafora membandingkan langsung tanpa kata perbanding.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh majas hiperbola dalam kalimat bertema perjuangan adalah ....',
                                'explanation' => 'Pekik menggelegar meruntuhkan langit adalah hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pekik kemerdekaan para pejuang menggelegar meruntuhkan langit angkasa.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bendera merah putih berkibar anggun menyapa para pahlawan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bung Tomo adalah singa podium perjuangan Surabaya.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kami hanyalah rakyat jelata yang tidak memiliki daya apa-apa.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri utama teks deskripsi yang membedakannya dengan teks narasi!',
                                'explanation' => 'Deskripsi merinci ciri fisik dan melibatkan pancaindra tanpa alur cerita konflik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggambarkan ciri fisik, warna, bentuk, atau sifat objek secara rinci', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Melibatkan cerapan pancaindra pembaca', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memiliki alur cerita dengan konflik tokoh dan penyelesaian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berisi argumen untuk meyakinkan pembaca membeli produk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konjungsi koordinatif yang digunakan dalam kalimat majemuk setara!',
                                'explanation' => 'Dan dan sedangkan adalah konjungsi koordinatif (setara). Karena dan sehingga adalah subordinatif (bertingkat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sedangkan', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karena', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sehingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata serapan yang penulisannya sudah sesuai dengan KBBI!',
                                'explanation' => 'Sistem dan objektif adalah bentuk baku resmi KBBI.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sistem (bukan sistim)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Objektif (bukan obyektif)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kwalitas (bukan kualitas)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Praktek (bukan praktik)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah kebahasaan di kolom kiri dengan definisinya di kolom kanan!',
                                'explanation' => 'Pasangan istilah linguistik dasar SD.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi', 'is_correct' => false, 'match_key' => 'Kata tugas yang menghubungkan antarklausa atau antarkalimat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Majas', 'is_correct' => false, 'match_key' => 'Gaya bahasa kiasan untuk menciptakan efek estetika', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Cerapan Indra', 'is_correct' => false, 'match_key' => 'Deskripsi yang merangsang penglihatan, pendengaran, atau perabaan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kata Serapan', 'is_correct' => false, 'match_key' => 'Kata yang dipinjam dari bahasa asing atau bahasa daerah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kalimat dengan jenis majas yang dikandungnya!',
                                'explanation' => 'Pasangan contoh kalimat dan majasnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kamera fotografer itu membidik sasaran dengan sigap', 'is_correct' => false, 'match_key' => 'Majas Personifikasi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Buku adalah jendela dunia', 'is_correct' => false, 'match_key' => 'Majas Metafora', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Air matanya membanjiri ruang aula', 'is_correct' => false, 'match_key' => 'Majas Hiperbola', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Singgahlah ke gubuk reotku', 'is_correct' => false, 'match_key' => 'Majas Litotes', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kata serapan bahasa Inggris dengan bentuk bakunya dalam bahasa Indonesia!',
                                'explanation' => 'Pasangan kata serapan dan bentuk bakunya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Activity', 'is_correct' => false, 'match_key' => 'Aktivitas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'System', 'is_correct' => false, 'match_key' => 'Sistem', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Effective', 'is_correct' => false, 'match_key' => 'Efektif', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Technique', 'is_correct' => false, 'match_key' => 'Teknik', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penulisan unsur serapan!',
                                'explanation' => 'Huruf x di awal kata diserap menjadi s (xylophone -> silofon).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Huruf c di depan a, u, o diserap menjadi k (contoh: camera -> kamera).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Huruf ph diserap menjadi f (contoh: photo -> foto).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Huruf x di awal kata diserap menjadi ks (contoh: xylophone -> ksilofon).', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kalimat majemuk setara!',
                                'explanation' => 'Sebab dan karena adalah konjungsi bertingkat (subordinatif).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi "atau" digunakan untuk menyatakan pilihan antarklausa.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Klausa dalam kalimat majemuk setara dapat berdiri sendiri sebagai kalimat tunggal.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "sebab" dan "karena" termasuk konjungsi setara.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Kepala surat dinas resmi instansi sering disebut juga ....',
                                'explanation' => 'Kop surat memuat identitas lembaga.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kop surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Singkatan "PUEBI" adalah Pedoman Umum ... Bahasa Indonesia.',
                                'explanation' => 'Pedoman Umum Ejaan Bahasa Indonesia.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Ejaan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku dari kata serapan "obyek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: objek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'objek', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku dari kata serapan "kongkrit" menurut KBBI adalah ....',
                                'explanation' => 'Baku: konkret.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'konkret', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat majemuk yang menghubungkan dua klausa yang setara disebut kalimat majemuk ....',
                                'explanation' => 'Kalimat majemuk setara.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'setara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda baca yang memisahkan nama kota dan tanggal surat dinas adalah tanda ....',
                                'explanation' => 'Nama tempat diikuti tanda koma.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'koma', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata serapan "musisi" diserap dari bahasa Inggris yaitu ....',
                                'explanation' => 'Diserap dari kata musician.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'musician', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Gaya bahasa yang membandingkan benda mati seolah bersikap seperti manusia disebut majas ....',
                                'explanation' => 'Personifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'personifikasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat "Parasnya ayu laksana rembulan" menggunakan majas ....',
                                'explanation' => 'Asosiasi/simile menggunakan kata laksana.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'asosiasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Alat musik dawai khas Nusa Tenggara Timur yang terbuat dari daun lontar adalah ....',
                                'explanation' => 'Sasando dari Pulau Rote NTT.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sasando', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Unsur wawancara yang menanyakan waktu kejadian adalah kata tanya ....',
                                'explanation' => 'Kapan menanyakan waktu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kapan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Orang yang memberikan informasi dalam wawancara disebut ....',
                                'explanation' => 'Narasumber pemberi informasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'narasumber', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi koordinatif untuk menyatakan hubungan penjumlahan adalah ....',
                                'explanation' => 'Dan menyatakan penjumlahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan bahasa Indonesia untuk kata serapan "gadget" adalah ....',
                                'explanation' => 'Gadget dipadankan menjadi gawai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'gawai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Teks yang melukiskan suatu objek secara rinci dengan pancaindra dinamakan teks ....',
                                'explanation' => 'Teks deskripsi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'deskripsi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan lima bagian pokok yang wajib ada dalam sebuah surat resmi dinas sekolah, dan jelaskan fungsi masing-masing bagian tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Kop/Kepala Surat: Memuat identitas resmi instansi pengirim (nama, logo, alamat, kontak).
2. Nomor Surat & Tanggal: Sebagai arsip resmi korespondensi dan penanda waktu pembuatan surat.
3. Alamat Tujuan: Menunjukkan pihak penerima surat secara jelas dan spesifik.
4. Isi Surat (Pembuka, Inti, Penutup): Memuat maksud dan tujuan penyampaian informasi atau undangan dinas.
5. Tanda Tangan, Nama Terang & Stempel: Mengesahkan legalitas dan pertanggungjawaban isi surat oleh pejabat berwenang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan perbedaan antara teks deskripsi dan teks wawancara berdasarkan tujuan penulisan dan struktur penyajiannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tujuan Penulisan:
   - Teks Deskripsi bertujuan menggambarkan objek, tempat, atau suasana secara mendalam agar pembaca seolah merasakan dan melihat sendiri.
   - Teks Wawancara bertujuan menggali informasi faktual, wawasan, atau pendapat dari narasumber kompeten mengenai suatu isu tertentu.
2. Struktur Penyajian:
   - Teks Deskripsi tersusun atas identifikasi umum, deskripsi bagian-bagian objek, dan simpulan/kesan.
   - Teks Wawancara tersusun atas pembukaan (pengantar topik), transkrip dialog tanya-jawab (atau narasi fakta hasil wawancara), dan penutup/simpulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah dua kalimat majemuk setara dengan ketentuan sebagai berikut:
a. Menggunakan konjungsi pertentangan "tetapi" atau "sedangkan" dengan tema prestasi musik anak Indonesia.
b. Menggunakan konjungsi penggabungan "dan" dengan tema kerja sama pementasan seni budaya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Contoh (pertentangan): "Tim paduan suara anak itu menghadapi jadwal latihan yang sangat padat, tetapi mereka tetap mampu meraih prestasi juara pertama di Italia."
b. Contoh (penggabungan): "Siswa kelas enam menyiapkan instrumen musik tradisional gamelan di panggung dan guru kesenian mengatur tata cahaya lampu pementasan."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbaikilah kalimat-kalimat di bawah ini menjadi kalimat baku yang efektif sesuai PUEBI!
a. Kepada para bapak-bapak dan ibu-ibu sekalian dimohon untuk segera memasuki daripada ruangan aula.
b. Tim paduan suara itu sangat berprestasi sekali karena sering mempraktekkan sistim vokal yang efisiens.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Bapak dan Ibu dimohon segera memasuki ruangan aula." (Menghilangkan kata mubazir: Kepada, para, -sekalian, daripada).
b. Perbaikan: "Tim paduan suara itu sangat berprestasi karena sering mempraktikkan sistem vokal yang efisien." (Menghilangkan sekali, mempraktekkan -> mempraktikkan, sistim -> sistem, efisiens -> efisien).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan dan jelaskan tiga jenis majas (personifikasi, metafora, dan hiperbola), kemudian buatlah masing-masing satu contoh kalimat bertema kekayaan alam atau budaya Indonesia!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Personifikasi: Melekatkan sifat insani manusia pada benda mati.
   - Contoh: "Hutan bakau di pesisir Papua memeluk erat bibir pantai dari gempuran ombak Samudra Pasifik."
2. Metafora: Perbandingan langsung dua hal yang memiliki kesamaan sifat tanpa kata pembanding.
   - Contoh: "Candi Borobudur adalah mahkota keagungan arsitektur peradaban nusantara masa lampau."
3. Hiperbola: Gaya bahasa yang melebih-lebihkan kenyataan untuk memberi efek dramatis.
   - Contoh: "Semangat cinta tanah air para pemuda nusantara bergelora membakar seluruh penjuru cakrawala."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester 1 (ASTS 1) Bahasa Indonesia Kelas 6 - Paket C',
                'type' => 'exam',
                'description' => 'Asesmen sumatif tengah semester ganjil (Paket C): Evaluasi terpadu Bab 1 dan Bab 2 mengukur keterampilan membaca kritis teks eksposisi tokoh, tata kalimat majemuk, ejaan serapan, dan pemahaman majas.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Sang Penemu Muda Pengolah Limbah Plastik', 'content' => '[Keterangan Gambar: Dua siswa SD memamerkan alat pirolisis mini pengubah sampah plastik menjadi bahan bakar cair dalam pameran inovasi teknologi tepat guna.]

Farhan dan Dimas, dua siswa kelas 6 SD Berkarakter, menciptakan alat penyulingan sampah plastik sederhana berbahan dasar kaleng biskuit bekas dan pipa tembaga. Melalui proses pirolisis tanpa oksigen, limbah kantong kresek dipanaskan hingga menguap dan terkondensasi menjadi cairan bahan bakar alternatif. Inovasi ramah lingkungan ini berhasil meraih medali emas dalam Kompetisi Peneliti Cilik Nasional. Mereka termotivasi membuat alat ini setelah melihat tumpukan sampah plastik yang mencemari saluran irigasi di desa mereka. Prestasi ini membuktikan bahwa kepedulian terhadap kelestarian lingkungan dapat memicu kreativitas sains yang bermanfaat bagi masyarakat luas.'],
                            ['title' => 'Stimulus 2: Menelaah Format Surat Resmi Dinas Sekolah', 'content' => '[Keterangan Gambar: Contoh surat dinas sekolah dengan bagian kop surat bernomor resmi, perihal permohonan dispensasi siswa berprestasi, tanggal surat, salam pembuka, isi, dan tanda tangan kepala sekolah berstempel dinas.]

Surat dinas resmi merupakan sarana komunikasi tertulis yang digunakan oleh instansi pendidikan atau organisasi formal. Bahasa yang digunakan harus lugas, jelas, dan menggunakan ragam baku sesuai kaidah PUEBI. Salah satu prinsip utama penulisan surat resmi adalah kehematan kata (efisiensi). Penulis dilarang menggunakan kata-kata mubazir seperti "adalah merupakan", "sangat indah sekali", atau "demi untuk". Selain itu, kata sapaan wajib ditulis dengan huruf kapital di awal, misalnya "Bapak", "Ibu", atau "Saudara".'],
                            ['title' => 'Stimulus 3: Majas dan Keindahan Bahasa dalam Resensi Musik', 'content' => '[Keterangan Gambar: Lembar kritik musik budaya yang mengulas harmoni gesekan rebab Sunda dalam pementasan karawitan kontemporer.]

Gesekan rebab Mang Kardi merayap perlahan menembus kesunyian malam. Suaranya meliuk-liuk bagai sulur tanaman anggur yang membelit tiang panggung bambu. Melodi dawai tunggal itu seakan berbisik mengisahkan keagungan masa silam Tanah Pasundan. Para penonton terpaku tanpa kata, terhipnotis oleh sihir nada yang mengalir tenang laksana arus sungai jernih di kaki Gunung Salak. Kritik seni memuji kemahiran Mang Kardi yang mampu menghidupkan jiwa pada sebatang kayu dan seutas kawat sederhana.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, motivasi awal Farhan dan Dimas menciptakan alat pengolah sampah adalah ....',
                                'explanation' => 'Dalam teks: "termotivasi membuat alat ini setelah melihat tumpukan sampah plastik yang mencemari saluran irigasi..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Melihat tumpukan sampah plastik yang mencemari saluran irigasi desa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Keinginan mendapatkan hadiah uang tunai bernilai jutaan rupiah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tuntutan nilai tugas akhir semester yang sangat sulit', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Perintah langsung dari menteri lingkungan hidup', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Karakter profil pelajar Pancasila yang paling menonjol pada tokoh Farhan dan Dimas adalah ....',
                                'explanation' => 'Kreatif, bernalar kritis, dan peduli lingkungan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kreatif dan bernalar kritis peduli lingkungan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Individualis dan suka menyendiri di laboratorium', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mudah menyerah jika alat percobaannya gagal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hanya mau bekerja sama jika dibayar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA fakta mengenai inovasi Farhan dan Dimas!',
                                'explanation' => 'Bahan alat kaleng bekas dan pipa tembaga, meraih medali emas.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memanfaatkan kaleng biskuit bekas dan pipa tembaga sebagai bahan alat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Berhasil meraih medali emas dalam Kompetisi Peneliti Cilik Nasional', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menciptakan pembangkit listrik tenaga nuklir raksasa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menjual bahan bakar minyak mentah ke pasar luar negeri', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek inovasi sains cilik dengan penjelasannya!',
                                'explanation' => 'Pasangan fakta inovasi sains ramah lingkungan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Metode Pengolahan', 'is_correct' => false, 'match_key' => 'Proses pemanasan pirolisis tanpa oksigen', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bahan Baku Limbah', 'is_correct' => false, 'match_key' => 'Kantong kresek plastik yang mencemari irigasi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Penghargaan', 'is_correct' => false, 'match_key' => 'Medali emas Peneliti Cilik Nasional', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Dampak Positif', 'is_correct' => false, 'match_key' => 'Mengurangi sampah dan menghasilkan energi alternatif', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri utama ragam bahasa yang wajib digunakan dalam surat dinas resmi adalah ....',
                                'explanation' => 'Surat resmi wajib baku, lugas, santun, dan hemat kata.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Baku, lugas, santun, dan hemat kata sesuai kaidah PUEBI', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penuh kiasan majas hiperbola agar berkesan dramatis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bahasa sehari-hari yang akrab dengan singkatan gaul', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bahasa daerah tanpa terjemahan bahasa Indonesia', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh frasa mubazir (tidak hemat kata) yang harus dihindari dalam surat resmi adalah ....',
                                'explanation' => '"Adalah merupakan" pemborosan kata bersinonim yang mubazir.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Adalah merupakan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh karena itu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sehubungan dengan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dengan hormat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah penulisan surat resmi berikut!',
                                'explanation' => 'Surat dinas dari sekolah wajib memakai kop surat resmi.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata sapaan seperti Bapak atau Ibu wajib diawali huruf kapital.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Surat dinas resmi tidak memerlukan kop surat jika ditujukan kepada orang tua siswa.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Stempel dinas dibubuhkan menyinggung tanda tangan pimpinan instansi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan salam pembuka surat dinas yang benar menurut ejaan baku adalah ....',
                                'explanation' => 'Penulisan baku: Dengan hormat, (diakhiri tanda koma).',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dengan hormat,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dengan Hormat!', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'dengan hormat.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dengan hormat;', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas asosiasi (perumpamaan) yang terdapat pada wacana Stimulus 3 adalah ....',
                                'explanation' => 'Frasa "bagai sulur tanaman anggur" adalah majas asosiasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Suaranya meliuk-liuk bagai sulur tanaman anggur', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Gesekan rebab merayap perlahan menembus kesunyian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Melodi dawai seakan berbisik mengisahkan masa silam', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Para penonton terpaku tanpa kata', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas personifikasi pada teks ditunjukkan oleh kalimat ....',
                                'explanation' => 'Dawai berbisik mengisahkan masa silam adalah personifikasi.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Melodi dawai tunggal itu seakan berbisik mengisahkan keagungan masa silam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Para penonton terpaku tanpa kata di kursinya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Suaranya meliuk-liuk bagai sulur anggur', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Rebab Mang Kardi terbuat dari sebatang kayu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran analisis gaya bahasa pada teks resensi musik!',
                                'explanation' => 'Ulasan seni menggunakan majas untuk menghidupkan penggambaran estetika.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Frasa "tenang laksana arus sungai" menggunakan kata pembanding "laksana".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teks tersebut tidak memuat majas sama sekali karena merupakan ulasan fakta.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Penggunaan majas pada ulasan seni bertujuan memperkuat imajinasi pembaca.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA cerapan indra yang dominan digunakan dalam wacana Stimulus 3!',
                                'explanation' => 'Teks didominasi cerapan pendengaran dan penglihatan.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cerapan indra pendengaran (alunan suara rebab meliuk-liuk)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cerapan indra penglihatan (sulur tanaman bambu dan penonton terpaku)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Cerapan indra pencecapan rasa masakan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cerapan indra penciuman aroma wangi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian surat resmi yang memuat tanggal surat, nomor surat, dan perihal terletak di bagian ....',
                                'explanation' => 'Nomor, lampiran, perihal, dan tanggal terletak di bagian kepala surat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kepala (awal) surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Isi surat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penutup surat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kaki surat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan alamat tujuan surat yang tepat menurut kaidah PUEBI adalah ....',
                                'explanation' => 'Tidak menggunakan kata "Kepada", singkatan "Yth." tanpa titik dua, kata "Jalan" tidak disingkat, dan tanpa titik di akhir alamat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yth. Kepala SD Negeri 1 Merdeka
Jalan Pemuda No. 10
Surabaya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kepada Yth. Bapak Kepala SD Negeri 1 Merdeka
Jl. Pemuda 10
Surabaya.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Yth: Kepala SDN 1 Merdeka
Jln Pemuda No 10
Surabaya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kepada Yth: Kepala Sekolah SD 1 Merdeka
di Tempat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata tanya yang tepat untuk menggali informasi mengenai alasan suatu kebijakan diambil adalah ....',
                                'explanation' => 'Mengapa menanyakan alasan/sebab.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengapa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kapan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berapa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Di mana', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat wawancara berikut yang termasuk jenis pertanyaan terbuka adalah ....',
                                'explanation' => 'Pertanyaan "bagaimana strategi..." menuntut penjelasan rinci (terbuka).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bagaimana strategi sekolah Bapak dalam membina bakat seni para siswa?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Apakah sekolah Bapak memiliki grup musik angklung?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah Bapak menjabat sebagai kepala sekolah di sini?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berapa jumlah siswa yang ikut lomba hari ini?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk baku dari kata serapan "tehnik" dan "aktifitas" adalah ....',
                                'explanation' => 'Baku: teknik dan aktivitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Teknik dan aktivitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tehnik dan aktifitas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Teknik dan aktifitet', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Teknologi dan aktivis', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kata serapan berimbuhan yang benar adalah ....',
                                'explanation' => 'Huruf V tidak luluh: memverifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memverifikasi (dari verifikasi)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Memferifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengverifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Meverifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat majemuk setara yang menyatakan hubungan perlawanan/pertentangan adalah ....',
                                'explanation' => 'Konjungsi "tetapi" menyatakan pertentangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dini gemar memainkan biolanya, tetapi adiknya lebih memilih bermain drum.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dini memainkan biolanya dan adiknya bernyanyi dengan gembira.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah Dini akan bermain biola atau bermain piano?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dini bermain biola ketika para tamu mulai berdatangan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata gabung yang ditulis serangkai karena telah padu benar adalah ....',
                                'explanation' => 'Kacamata, beasiswa, dan olahraga ditulis serangkai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kacamata, beasiswa, dan olahraga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tanggungjawab, kerjasama, dan tatabahasa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bumi putera, pasca panen, dan tatausaha', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Budi pekerti, rumah sakit, dan kerja sama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Majas yang membandingkan suatu benda secara langsung dengan benda lain yang memiliki sifat sama disebut ....',
                                'explanation' => 'Metafora membandingkan langsung tanpa kata perbanding.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Metafora', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Personifikasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Litotes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh majas hiperbola dalam kalimat bertema perjuangan adalah ....',
                                'explanation' => 'Pekik menggelegar meruntuhkan langit adalah hiperbola.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pekik kemerdekaan para pejuang menggelegar meruntuhkan langit angkasa.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bendera merah putih berkibar anggun menyapa para pahlawan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bung Tomo adalah singa podium perjuangan Surabaya.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kami hanyalah rakyat jelata yang tidak memiliki daya apa-apa.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri utama teks deskripsi yang membedakannya dengan teks narasi!',
                                'explanation' => 'Deskripsi merinci ciri fisik dan melibatkan pancaindra tanpa alur cerita konflik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggambarkan ciri fisik, warna, bentuk, atau sifat objek secara rinci', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Melibatkan cerapan pancaindra pembaca', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memiliki alur cerita dengan konflik tokoh dan penyelesaian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berisi argumen untuk meyakinkan pembaca membeli produk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konjungsi koordinatif yang digunakan dalam kalimat majemuk setara!',
                                'explanation' => 'Dan dan sedangkan adalah konjungsi koordinatif (setara). Karena dan sehingga adalah subordinatif (bertingkat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Dan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sedangkan', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karena', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sehingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata serapan yang penulisannya sudah sesuai dengan KBBI!',
                                'explanation' => 'Sistem dan objektif adalah bentuk baku resmi KBBI.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sistem (bukan sistim)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Objektif (bukan obyektif)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kwalitas (bukan kualitas)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Praktek (bukan praktik)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah kebahasaan di kolom kiri dengan definisinya di kolom kanan!',
                                'explanation' => 'Pasangan istilah linguistik dasar SD.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi', 'is_correct' => false, 'match_key' => 'Kata tugas yang menghubungkan antarklausa atau antarkalimat', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Majas', 'is_correct' => false, 'match_key' => 'Gaya bahasa kiasan untuk menciptakan efek estetika', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Cerapan Indra', 'is_correct' => false, 'match_key' => 'Deskripsi yang merangsang penglihatan, pendengaran, atau perabaan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kata Serapan', 'is_correct' => false, 'match_key' => 'Kata yang dipinjam dari bahasa asing atau bahasa daerah', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kalimat dengan jenis majas yang dikandungnya!',
                                'explanation' => 'Pasangan contoh kalimat dan majasnya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kamera fotografer itu membidik sasaran dengan sigap', 'is_correct' => false, 'match_key' => 'Majas Personifikasi', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Buku adalah jendela dunia', 'is_correct' => false, 'match_key' => 'Majas Metafora', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Air matanya membanjiri ruang aula', 'is_correct' => false, 'match_key' => 'Majas Hiperbola', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Singgahlah ke gubuk reotku', 'is_correct' => false, 'match_key' => 'Majas Litotes', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kata serapan bahasa Inggris dengan bentuk bakunya dalam bahasa Indonesia!',
                                'explanation' => 'Pasangan kata serapan dan bentuk bakunya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Activity', 'is_correct' => false, 'match_key' => 'Aktivitas', 'order' => 1],
                                    ['label' => null, 'option_text' => 'System', 'is_correct' => false, 'match_key' => 'Sistem', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Effective', 'is_correct' => false, 'match_key' => 'Efektif', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Technique', 'is_correct' => false, 'match_key' => 'Teknik', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penulisan unsur serapan!',
                                'explanation' => 'Huruf x di awal kata diserap menjadi s (xylophone -> silofon).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Huruf c di depan a, u, o diserap menjadi k (contoh: camera -> kamera).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Huruf ph diserap menjadi f (contoh: photo -> foto).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Huruf x di awal kata diserap menjadi ks (contoh: xylophone -> ksilofon).', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kalimat majemuk setara!',
                                'explanation' => 'Sebab dan karena adalah konjungsi bertingkat (subordinatif).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi "atau" digunakan untuk menyatakan pilihan antarklausa.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Klausa dalam kalimat majemuk setara dapat berdiri sendiri sebagai kalimat tunggal.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "sebab" dan "karena" termasuk konjungsi setara.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Kepala surat dinas resmi instansi sering disebut juga ....',
                                'explanation' => 'Kop surat memuat identitas lembaga.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kop surat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Singkatan "PUEBI" adalah Pedoman Umum ... Bahasa Indonesia.',
                                'explanation' => 'Pedoman Umum Ejaan Bahasa Indonesia.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Ejaan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku dari kata serapan "obyek" menurut KBBI adalah ....',
                                'explanation' => 'Baku: objek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'objek', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku dari kata serapan "kongkrit" menurut KBBI adalah ....',
                                'explanation' => 'Baku: konkret.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'konkret', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat majemuk yang menghubungkan dua klausa yang setara disebut kalimat majemuk ....',
                                'explanation' => 'Kalimat majemuk setara.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'setara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda baca yang memisahkan nama kota dan tanggal surat dinas adalah tanda ....',
                                'explanation' => 'Nama tempat diikuti tanda koma.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'koma', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata serapan "musisi" diserap dari bahasa Inggris yaitu ....',
                                'explanation' => 'Diserap dari kata musician.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'musician', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Gaya bahasa yang membandingkan benda mati seolah bersikap seperti manusia disebut majas ....',
                                'explanation' => 'Personifikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'personifikasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kalimat "Parasnya ayu laksana rembulan" menggunakan majas ....',
                                'explanation' => 'Asosiasi/simile menggunakan kata laksana.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'asosiasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Alat musik dawai khas Nusa Tenggara Timur yang terbuat dari daun lontar adalah ....',
                                'explanation' => 'Sasando dari Pulau Rote NTT.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'sasando', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Unsur wawancara yang menanyakan waktu kejadian adalah kata tanya ....',
                                'explanation' => 'Kapan menanyakan waktu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kapan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Orang yang memberikan informasi dalam wawancara disebut ....',
                                'explanation' => 'Narasumber pemberi informasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'narasumber', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi koordinatif untuk menyatakan hubungan penjumlahan adalah ....',
                                'explanation' => 'Dan menyatakan penjumlahan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Padanan bahasa Indonesia untuk kata serapan "gadget" adalah ....',
                                'explanation' => 'Gadget dipadankan menjadi gawai.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'gawai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Teks yang melukiskan suatu objek secara rinci dengan pancaindra dinamakan teks ....',
                                'explanation' => 'Teks deskripsi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'deskripsi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan lima bagian pokok yang wajib ada dalam sebuah surat resmi dinas sekolah, dan jelaskan fungsi masing-masing bagian tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Kop/Kepala Surat: Memuat identitas resmi instansi pengirim (nama, logo, alamat, kontak).
2. Nomor Surat & Tanggal: Sebagai arsip resmi korespondensi dan penanda waktu pembuatan surat.
3. Alamat Tujuan: Menunjukkan pihak penerima surat secara jelas dan spesifik.
4. Isi Surat (Pembuka, Inti, Penutup): Memuat maksud dan tujuan penyampaian informasi atau undangan dinas.
5. Tanda Tangan, Nama Terang & Stempel: Mengesahkan legalitas dan pertanggungjawaban isi surat oleh pejabat berwenang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan perbedaan antara teks deskripsi dan teks wawancara berdasarkan tujuan penulisan dan struktur penyajiannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Tujuan Penulisan:
   - Teks Deskripsi bertujuan menggambarkan objek, tempat, atau suasana secara mendalam agar pembaca seolah merasakan dan melihat sendiri.
   - Teks Wawancara bertujuan menggali informasi faktual, wawasan, atau pendapat dari narasumber kompeten mengenai suatu isu tertentu.
2. Struktur Penyajian:
   - Teks Deskripsi tersusun atas identifikasi umum, deskripsi bagian-bagian objek, dan simpulan/kesan.
   - Teks Wawancara tersusun atas pembukaan (pengantar topik), transkrip dialog tanya-jawab (atau narasi fakta hasil wawancara), dan penutup/simpulan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah dua kalimat majemuk setara dengan ketentuan sebagai berikut:
a. Menggunakan konjungsi pertentangan "tetapi" atau "sedangkan" dengan tema prestasi musik anak Indonesia.
b. Menggunakan konjungsi penggabungan "dan" dengan tema kerja sama pementasan seni budaya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Contoh (pertentangan): "Tim paduan suara anak itu menghadapi jadwal latihan yang sangat padat, tetapi mereka tetap mampu meraih prestasi juara pertama di Italia."
b. Contoh (penggabungan): "Siswa kelas enam menyiapkan instrumen musik tradisional gamelan di panggung dan guru kesenian mengatur tata cahaya lampu pementasan."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbaikilah kalimat-kalimat di bawah ini menjadi kalimat baku yang efektif sesuai PUEBI!
a. Kepada para bapak-bapak dan ibu-ibu sekalian dimohon untuk segera memasuki daripada ruangan aula.
b. Tim paduan suara itu sangat berprestasi sekali karena sering mempraktekkan sistim vokal yang efisiens.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Bapak dan Ibu dimohon segera memasuki ruangan aula." (Menghilangkan kata mubazir: Kepada, para, -sekalian, daripada).
b. Perbaikan: "Tim paduan suara itu sangat berprestasi karena sering mempraktikkan sistem vokal yang efisien." (Menghilangkan sekali, mempraktekkan -> mempraktikkan, sistim -> sistem, efisiens -> efisien).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Sebutkan dan jelaskan tiga jenis majas (personifikasi, metafora, dan hiperbola), kemudian buatlah masing-masing satu contoh kalimat bertema kekayaan alam atau budaya Indonesia!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Personifikasi: Melekatkan sifat insani manusia pada benda mati.
   - Contoh: "Hutan bakau di pesisir Papua memeluk erat bibir pantai dari gempuran ombak Samudra Pasifik."
2. Metafora: Perbandingan langsung dua hal yang memiliki kesamaan sifat tanpa kata pembanding.
   - Contoh: "Candi Borobudur adalah mahkota keagungan arsitektur peradaban nusantara masa lampau."
3. Hiperbola: Gaya bahasa yang melebih-lebihkan kenyataan untuk memberi efek dramatis.
   - Contoh: "Semangat cinta tanah air para pemuda nusantara bergelora membakar seluruh penjuru cakrawala."',
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
