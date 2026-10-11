<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6Bab7Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 7 Bahasa Indonesia Kelas 6 (Paket 1 - Pidato Persuasif & Empati Sosial)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 7 bagian 1: Menganalisis naskah pidato persuasif, struktur pembukaan/isi/penutup, dan keterampilan orasi antiperundungan.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Naskah Pidato Persuasif Stop Perundungan di Sekolah', 'content' => '[Keterangan Gambar: Siswa kelas 6 sedang berpidato di podium upacara bendera di hadapan ratusan teman dan guru: ia berbicara lantang dengan gestur tangan terbuka mengajak seluruh warga sekolah menolak segala bentuk perundungan (*bullying*).]

Bapak/Ibu Guru yang saya hormati, serta teman-teman yang saya sayangi,

Pernahkah kita menyadari bahwa seuntai kata ejekan yang kita anggap lelucon sepele dapat merobek hati dan melukai masa depan seorang sahabat? Perundungan bukanlah tanda kehebatan, melainkan cermin dari kelemahan jiwa yang takut bersaing secara sehat.

Sekolah kita adalah rumah kedua tempat kita bertumbuh, merajut cita-cita, dan saling merangkul dalam kehangatan keluarga. Oleh karena itu, marilah kita bergandengan tangan menolak segala bentuk perundungan, baik perundungan fisik, verbal, maupun perundungan di dunia maya. Mari kita jadikan rasa empati sebagai napas pergaulan sehari-hari. Mulai hari ini, mari kita saling melindungi, saling menghargai perbedaan, dan menjadi sahabat yang menguatkan sesama!'],
                            ['title' => 'Stimulus 2: Menelaah Struktur dan Kaidah Kebahasaan Pidato Persuasif', 'content' => '[Keterangan Gambar: Bagan piramida struktur pidato persuasif: 1. Pembukaan (salam pembuka, sapaan hormat, ucapan syukur, pengantar topik), 2. Isi Pidato (paparan fakta, argumen logis, dan kalimat ajakan/bujukan), 3. Penutup (simpulan pesan, permohonan maaf, ucapan terima kasih, salam penutup).]

Pidato persuasif bertujuan meyakinkan dan memengaruhi pendengar agar tergerak mengikuti imbauan atau ajakan pembicara secara sukarela. Ciri kebahasaan pidato persuasif antara lain menggunakan kata-kata ajakan (marilah, ayo), kata kerja mental (menyadari, meyakini, menghargai), kalimat persuasif, serta kata sapaan santun yang menghormati seluruh hadirin.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan naskah pidato pada Stimulus 1, pesan utama yang ingin disampaikan oleh orator adalah ....',
                                'explanation' => 'Dalam teks: "marilah kita bergandengan tangan menolak segala bentuk perundungan... jadikan rasa empati sebagai napas pergaulan."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengajak seluruh warga sekolah menolak segala bentuk perundungan dan menumbuhkan empati', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menuntut kenaikan uang jajan sekolah kepada orang tua', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengumumkan libur panjang semester genap lebih awal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menunjuk satu orang siswa untuk menjadi sasaran ejekan bersama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat persuasif yang berisi ajakan nyata dalam kutipan pidato di atas adalah ....',
                                'explanation' => 'Kata ajakan "mari kita saling melindungi..." menandai kalimat persuasif.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mulai hari ini, mari kita saling melindungi dan saling menghargai perbedaan!', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pernahkah kita menyadari bahwa seuntai kata ejekan melukai masa depan?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bapak/Ibu Guru yang saya hormati serta teman-teman yang saya sayangi.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sekolah kita adalah rumah kedua tempat kita bertumbuh.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA bentuk perundungan yang diserukan untuk dihentikan dalam pidato!',
                                'explanation' => 'Pidato menyerukan penghentian perundungan fisik, verbal, dan dunia maya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Perundungan verbal (ejekan atau kata-kata kasar)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Perundungan di dunia maya (cyberbullying)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Belajar kelompok bersama di perpustakaan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membantu teman yang terjatuh di halaman', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan bagian naskah pidato di kolom kiri dengan kutipannya di kolom kanan!',
                                'explanation' => 'Pasangan bagian naskah pidato persuasif.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Salam Pembuka / Sapaan', 'is_correct' => false, 'match_key' => '"Bapak/Ibu Guru yang saya hormati serta teman-teman yang saya sayangi,"', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Isi / Argumen', 'is_correct' => false, 'match_key' => '"Perundungan bukanlah tanda kehebatan melainkan cermin kelemahan jiwa."', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Ajakan Persuasif', 'is_correct' => false, 'match_key' => '"Marilah kita bergandengan tangan menolak perundungan!"', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Salam Penutup', 'is_correct' => false, 'match_key' => '"Sekian pidato dari saya, terima kasih atas perhatian hadirin."', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama dari pidato persuasif adalah ....',
                                'explanation' => 'Pidato persuasif bertujuan memengaruhi dan membujuk pendengar.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memengaruhi dan mengajak pendengar agar tergerak mengikuti ajakan pembicara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menceritakan dongeng fiksi yang lucu menghibur', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memperdebatkan lawan bicara hingga marah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghafalkan rumus matematika di depan umum', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata penanda ajakan yang lazim digunakan dalam pidato persuasif adalah ....',
                                'explanation' => 'Kata mari dan ayo adalah kata ajakan khas teks persuasif.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mari dan ayo', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Jangan dan dilarang', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meskipun dan walaupun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Setelah dan lalu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran struktur teks pidato persuasif!',
                                'explanation' => 'Salam penutup dan ucapan terima kasih adalah bagian wajib penutup pidato.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pembukaan pidato memuat ucapan salam, sapaan hormat, dan rasa syukur.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Isi pidato memuat argumen pendukung dan seruan ajakan bertindak.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pidato persuasif tidak memerlukan salam penutup dan ucapan terima kasih.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata kerja mental yang menunjukkan proses berpikir dalam pidato persuasif adalah ....',
                                'explanation' => 'Menyadari dan meyakini adalah verba mental.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menyadari dan meyakini', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Melompat dan berlari', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memukul dan menendang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menebang dan membakar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian penutup pidato yang santun dan efektif adalah ....',
                                'explanation' => 'Penutup santun memuat permohonan maaf dan terima kasih.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Demikian pidato ini saya sampaikan, mohon maaf atas segala kekurangan, dan terima kasih atas perhatian hadirin.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sekian pidato saya, kalau ada yang tidak setuju silakan maju ke depan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Saya rasa waktu saya sudah habis, cepat bubar saja ya.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Demikian pidato panjang ini saya akhiri tanpa salam.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat pembuka pidato yang memuat rasa syukur kepada Tuhan Yang Maha Esa adalah ....',
                                'explanation' => 'Ungkapan puji syukur mengawali pembukaan pidato.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa karena atas rahmat-Nya kita dapat berkumpul dalam keadaan sehat.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hadirin yang saya hormati, langsung saja dengarkan saya bicara.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengapa kalian semua terlambat hadir di ruangan ini?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hari ini saya sangat lelah sekali berdiri di sini.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap tubuh (gestur) yang baik dan tepat saat berpidato di hadapan umum adalah ....',
                                'explanation' => 'Berdiri tegak, rileks, dan menjaga kontak mata.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berdiri tegak, rileks, dan melakukan kontak mata dengan hadirin secara menyeluruh', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membungkuk sambil memasukkan kedua tangan ke dalam saku celana', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menatap lantai terus-menerus tanpa memandang hadirin', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membalikkan badan membelakangi para pendengar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Intonasi suara yang tepat saat membacakan bagian seruan ajakan dalam pidato adalah ....',
                                'explanation' => 'Tegas, bersemangat, dan meyakinkan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bernada tegas, penuh semangat, dan meyakinkan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Berbisik-bisik sangat pelan dan ragu-ragu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Membentak dengan nada marah dan memaki', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bernada datar seperti orang yang mengantuk', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata sapaan yang tepat untuk hadirin yang sebaya dalam pidato sekolah adalah ....',
                                'explanation' => 'Teman-teman yang saya banggakan tepat untuk sebaya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Teman-teman yang saya banggakan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Anak-anakku sekalian', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Para hadirin orang tua yang terhormat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Saudara-saudara bawahanku', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Arti kata "empati" dalam kehidupan bermasyarakat adalah kemampuan untuk ....',
                                'explanation' => 'Empati adalah kemampuan merasakan perasaan orang lain.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memahami dan ikut merasakan apa yang sedang dialami oleh orang lain', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menertawakan penderitaan dan musibah orang lain', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memaksa orang lain menuruti keinginan kita', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyembunyikan perasaan sedih sendirian', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri bahasa naskah pidato persuasif!',
                                'explanation' => 'Kalimat ajakan santun dan sapaan hormat adalah ciri pidato persuasif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan kalimat ajakan dan bujukan santun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Memuat kata sapaan hormat kepada hadirin', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggunakan kata makian yang kasar dan merendahkan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Ditulis dalam bentuk bait-bait puisi berima', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA persiapan penting yang harus dilakukan sebelum tampil berpidato!',
                                'explanation' => 'Menguasai materi, latihan artikulasi, dan menjaga kepercayaan diri.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menguasai topik naskah pidato dan berlatih pelafalan intonasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menjaga kesehatan fisik dan rasa percaya diri', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Membeli mikrofon baru yang paling mahal', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menghafal seluruh nama penonton yang hadir', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah dalam keterampilan berpidato dengan definisinya!',
                                'explanation' => 'Pasangan aspek keterampilan berpidato.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Artikulasi', 'is_correct' => false, 'match_key' => 'Kejelasan pelafalan bunyi huruf dan kata saat berbicara', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Intonasi', 'is_correct' => false, 'match_key' => 'Tinggi rendah dan naik turunnya nada suara', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Gestur', 'is_correct' => false, 'match_key' => 'Gerak tubuh dan ekspresi wajah yang mendukung pembicaraan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tempo', 'is_correct' => false, 'match_key' => 'Cepat lambatnya pengucapan kalimat pidato', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kutipan kalimat pidato dengan bagian strukturnya!',
                                'explanation' => 'Pasangan kutipan dan bagian struktur pidato.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => '"Selamat pagi dan salam sejahtera bagi kita semua."', 'is_correct' => false, 'match_key' => 'Salam Pembuka', 'order' => 1],
                                    ['label' => null, 'option_text' => '"Marilah kita budayakan sikap saling tolong-menolong."', 'is_correct' => false, 'match_key' => 'Ajakan / Isi', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Semoga apa yang saya sampaikan dapat bermanfaat bagi kita semua."', 'is_correct' => false, 'match_key' => 'Harapan Penutup', 'order' => 3],
                                    ['label' => null, 'option_text' => '"Wassalamu\'alaikum warahmatullahi wabarakatuh."', 'is_correct' => false, 'match_key' => 'Salam Penutup', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran etika berpidato di depan umum!',
                                'explanation' => 'Orator dilarang menyinggung SARA dan wajib menjaga etika.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Orator harus menghormati waktu yang diberikan panitia.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Saat berpidato, kita boleh menyinggung perasaan suku atau agama orang lain.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kejelasan artikulasi kata memudahkan pendengar menangkap isi pidato.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran jenis-jenis pidato!',
                                'explanation' => 'Pidato rekreatif bertujuan menghibur hadirin, bukan menakut-nakuti.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pidato persuasif bertujuan meyakinkan dan membujuk pendengar.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Pidato informatif bertujuan memberikan wawasan atau pengetahuan baru.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pidato rekreatif bertujuan menakut-nakuti hadirin dengan cerita horor.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Kegiatan berbicara di depan umum untuk menyampaikan gagasan kepada banyak orang disebut ....',
                                'explanation' => 'Pidato.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pidato', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Orang yang ahli atau sedang menyampaikan pidato di depan umum dinamakan ....',
                                'explanation' => 'Orator.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'orator', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pidato yang bertujuan membujuk dan mengajak pendengar melakukan suatu tindakan disebut pidato ....',
                                'explanation' => 'Pidato persuasif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'persuasif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kejelasan pelafalan bunyi huruf dan kata saat berpidato dinamakan ....',
                                'explanation' => 'Artikulasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'artikulasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tinggi rendahnya nada suara saat berbicara dinamakan ....',
                                'explanation' => 'Intonasi suara.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'intonasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sikap mampu merasakan dan memahami penderitaan yang dialami orang lain disebut rasa ....',
                                'explanation' => 'Empati.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'empati', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bagian awal pidato yang berisi salam dan ucapan syukur dinamakan bagian ....',
                                'explanation' => 'Pembukaan pidato.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pembukaan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan dan jelaskan tiga bagian struktur pokok sebuah naskah pidato persuasif (pembukaan, isi, dan penutup), serta uraikan apa saja yang harus disampaikan pada masing-masing bagian tersebut!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pembukaan: Memuat salam pembuka, sapaan hormat kepada hadirin (dari yang paling dituakan hingga yang sebaya), ucapan rasa syukur kepada Tuhan, serta pengantar topik masalah yang akan dibahas.
2. Isi Pidato: Memuat fakta-fakta permasalahan, argumen logis yang mendasari pentingnya perubahan, pandangan orator, serta seruan kalimat ajakan/persuasi yang menggerakkan hadirin untuk bertindak nyata.
3. Penutup: Memuat rangkuman/simpulan pesan pokok, permohonan maaf atas khilaf kata, ucapan terima kasih atas perhatian hadirin, dan salam penutup.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan empat hal penting yang harus diperhatikan dalam aspek penampilan (performa) saat berpidato di hadapan umum (artikulasi, intonasi, tempo, dan gestur tubuh)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Artikulasi: Kejelasan pengucapan kata demi kata agar pesan terdengar jernih dan tidak gumam.
2. Intonasi: Pengaturan nada suara (tinggi-rendah) agar pembicaraan hidup, bervariasi, dan tidak monoton membosankan.
3. Tempo: Pengaturan kecepatan bicara (tidak terlalu cepat tergesa-gesa dan tidak terlalu lambat).
4. Gestur Tubuh & Kontak Mata: Gerakan tangan dan ekspresi wajah yang wajar mendukung pesan, serta tatapan mata yang menyapa seluruh sudut hadirin untuk membangun ikatan emosional.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tulislah sebuah naskah pidato persuasif singkat (1-2 paragraf) tentang pentingnya sikap tolong-menolong dan empati kepada teman yang tertimpa musibah dengan memuat salam pembuka, satu kalimat argumen, satu kalimat ajakan, dan salam penutup!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Naskah Pidato Singkat:
"Selamat pagi dan salam sejahtera untuk Bapak/Ibu Guru serta teman-teman yang saya sayangi. Sebagai sesama insan manusia dan sahabat satu sekolah, penderitaan yang dialami oleh teman kita yang terkena musibah kebakaran adalah duka kita bersama. Beban yang berat akan terasa ringan jika dipikul bersama dengan ketulusan hati. Oleh karena itu, marilah kita menyisihkan sebagian uang saku kita untuk menggalang donasi dan memberikan bantuan terbaik bagi sahabat kita tersebut. Sekian ajakan dari saya, terima kasih atas kepedulian teman-teman semua. Selamat pagi dan salam persahabatan!"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 7 Bahasa Indonesia Kelas 6 (Paket 2 - Fakta vs Opini dalam Diskusi)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 7 bagian 2: Memilah fakta objektif dan opini subjektif, menelaah data statistik, dan menyampaikan argumen kritis beradab.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Diskusi Kelas Mengenai Sarapan Sehat Sebelum Sekolah', 'content' => '[Keterangan Gambar: Suasana diskusi interaktif di kelas 6: dua kelompok siswa sedang bertukar argumen tentang kebiasaan sarapan pagi dengan bimbingan wali kelas di depan papan tulis.]

Dalam diskusi kelas tentang pola hidup sehat, Rian menyampaikan data: "Berdasarkan penelitian Kementerian Kesehatan Republik Indonesia tahun 2025, sebanyak 44,6 persen anak usia sekolah dasar tidak membiasakan diri sarapan sebelum berangkat ke sekolah. Padahal, tubuh membutuhkan asupan glukosa untuk menjaga konsentrasi belajar."

Menanggapi data tersebut, Siska berpendapat: "Menurut pendapat saya, sarapan dengan sepotong roti dan susu cokelat terasa jauh lebih lezat dan praktis dibandingkan makan nasi uduk di pagi hari. Sarapan roti sepertinya membuat kita tidak cepat mengantuk di kelas." Guru menengahi bahwa data persentase Kemenkes adalah fakta yang dapat diuji kebenarannya, sedangkan penilaian rasa lezat dan praktis adalah opini yang bersifat subjektif bagi tiap-tiap orang.'],
                            ['title' => 'Stimulus 2: Menelaah Perbedaan Mendasar Fakta dan Opini', 'content' => '[Keterangan Gambar: Tabel komparasi: Fakta (pasti, objektif, dapat dibuktikan, ada data angka/waktu, jawaban atas apa/kapan/di mana) vs Opini (pendapat, subjektif, relatif, menggunakan kata menurut saya/sebaiknya/paling, jawaban atas bagaimana/mengapa menurut tafsiran).]

Dalam berargumentasi dan menyampaikan pendapat secara santun, kemampuan memilah antara fakta dan opini sangat krusial. Fakta memberikan fondasi kebenaran yang kokoh, sedangkan opini memberikan sudut pandang dan gagasan pemecahan masalah. Kalimat opini yang baik harus dilandasi oleh fakta-fakta pendukung agar tidak menjadi prasangka yang menyesatkan.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pernyataan pada teks wacana yang merupakan sebuah fakta adalah ....',
                                'explanation' => 'Data penelitian Kemenkes 44,6% adalah fakta teruji.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sebanyak 44,6 persen anak sekolah dasar tidak membiasakan diri sarapan menurut Kemenkes RI', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sarapan roti dan susu cokelat terasa jauh lebih lezat daripada nasi uduk', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sarapan roti sepertinya membuat kita tidak cepat mengantuk di kelas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semua anak sekolah pasti menyukai sarapan roti bakar', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Pernyataan tokoh Siska tergolong sebagai opini karena ....',
                                'explanation' => 'Opini bersifat subjektif dan memuat anggapan pribadi.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berisi penilaian pribadi yang subjektif dan menggunakan kata anggapan "menurut saya" serta "sepertinya"', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Didukung oleh bukti laboratorium resmi kedokteran dunia', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berisi angka statistik sensus penduduk nasional', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Merupakan undang-undang hukum yang disahkan negara', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA ciri utama kalimat fakta!',
                                'explanation' => 'Fakta dapat dibuktikan nyata dan didukung data otentik.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kebenarannya dapat dibuktikan secara nyata dan didukung data otentik', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menyajikan peristiwa yang benar-benar telah atau sedang terjadi', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Banyak memuat kata dugaan seperti "mungkin", "bisa jadi", dan "menurut hemat saya"', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tergantung pada selera atau perasaan suka/tidak suka seseorang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kalimat dengan statusnya (Fakta atau Opini)!',
                                'explanation' => 'Pasangan kalimat fakta dan opini.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Indonesia merdeka pada tanggal 17 Agustus 1945', 'is_correct' => false, 'match_key' => 'Fakta Sejarah', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Masakan gudeg Yogyakarta adalah makanan terenak di dunia', 'is_correct' => false, 'match_key' => 'Opini Subjektif', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Matahari terbit dari sebelah timur', 'is_correct' => false, 'match_key' => 'Fakta Alamiah', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Belajar matematika sepertinya lebih membosankan daripada menyanyi', 'is_correct' => false, 'match_key' => 'Opini Subjektif', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata penanda yang sering ditemukan pada kalimat opini adalah ....',
                                'explanation' => 'Sebaiknya, menurut saya, dan mungkin menandai opini.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sebaiknya, menurut saya, dan mungkin', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Telah terjadi, tercatat, dan berjumlah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Berdasarkan data sensus, pada tanggal, dan di kota', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Terbukti secara nyata, diukur, dan dihitung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Fakta dalam sebuah argumen berfungsi untuk ....',
                                'explanation' => 'Fakta memperkuat kebenaran argumen.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Memperkuat kebenaran argumen dengan bukti yang dapat diuji', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membuat pendengar merasa takut dan terancam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menggantikan peran seluruh perasaan empati manusia', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyembunyikan kelemahan pembicara', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran perbedaan fakta dan opini!',
                                'explanation' => 'Opini tidak selalu salah; opini berharga jika didasarkan pada fakta.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Fakta bersifat objektif sedangkan opini bersifat subjektif.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Opini selalu salah dan dilarang digunakan dalam diskusi kelas.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Opini yang baik adalah opini yang didukung oleh fakta-fakta yang valid.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang merupakan opini adalah ....',
                                'explanation' => 'Kata "sangat menarik" adalah penilaian opini subjektif.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Buku cerita bergambar itu sangat menarik dibaca oleh anak-anak.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Buku itu memiliki ketebalan 120 halaman.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Buku itu diterbitkan pada tahun 2026.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Buku itu ditulis oleh Ratih Kumala.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat fakta tentang keanekaragaman flora Indonesia adalah ....',
                                'explanation' => 'Bunga Rafflesia endemik Bengkulu adalah fakta biologis.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bunga Rafflesia arnoldii adalah bunga bangkai endemik yang ditemukan di Bengkulu.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Bunga mawar merah adalah bunga terindah di muka bumi.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Semua orang pasti membenci bau bunga bangkai.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bunga anggrek sepertinya lebih anggun daripada bunga melati.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang memuat opini tentang kegiatan perkemahan sekolah adalah ....',
                                'explanation' => '"Sangat menyenangkan dan berkesan" adalah penilaian opini.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kegiatan perkemahan di alam terbuka sangat menyenangkan dan berkesan bagi semua siswa.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Perkemahan itu berlangsung selama tiga hari dua malam di Cibodas.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Jumlah peserta perkemahan mencapai 120 siswa kelas enam.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Upacara pembukaan perkemahan dipimpin oleh Kepala Sekolah.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata sifat relatif yang menunjukkan opini dalam kalimat adalah ....',
                                'explanation' => 'Sifat relatif (lezat, indah, mahal) mencirikan opini subjektif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sangat lezat, amat indah, dan terlalu mahal', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Dua meter, lima kilogram, dan tiga jam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hari Senin, tanggal 12, dan tahun 2026', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Warna hitam, bentuk bulat, dan bersudut siku', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang merupakan fakta dalam berita sekolah adalah ....',
                                'explanation' => 'Juara lomba tingkat kabupaten kemarin adalah fakta peristiwa.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'SD Merdeka berhasil menjuarai lomba cerdas cermat sains tingkat kabupaten kemarin.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'SD Merdeka adalah sekolah paling hebat di seluruh dunia.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lomba cerdas cermat kemarin sepertinya kurang seru untuk ditonton.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pertanyaan lomba matematika kemarin terlalu mudah bagi peserta.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Manfaat utama membedakan fakta dan opini saat menerima informasi adalah ....',
                                'explanation' => 'Menghindari hasutan hoaks dan prasangka keliru.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Agar kita tidak mudah terhasut oleh berita bohong (hoaks) dan prasangka', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Agar kita bisa memenangkan setiap perdebatan dengan kasar', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Agar kita tidak perlu mendengarkan pendapat orang lain', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Supaya kita dianggap orang paling pintar di sekolah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat opini yang santun dalam diskusi kelas di bawah ini adalah ....',
                                'explanation' => 'Bahasa santun dan konstruktif menyampaikan kritik.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menurut hemat saya, usulan teman-teman sangat baik, namun alangkah baiknya kita pertimbangkan biayanya.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pendapatmu itu sangat bodoh dan tidak masuk akal sama sekali!', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kamu tidak tahu apa-apa, jadi diam saja mendengarkan saya!', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Usulan itu pasti gagal total karena ide yang sangat konyol.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat yang termasuk kelompok fakta!',
                                'explanation' => 'Lokasi Monas di Jakarta dan sejarah Candi Prambanan adalah fakta.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Monumen Nasional (Monas) terletak di ibu kota Jakarta.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Candi Prambanan dibangun pada masa peradaban kerajaan Hindu Mataram Kuno.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Monas terlihat jauh lebih megah saat malam hari dibandingkan siang hari.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Candi Prambanan adalah candi paling eksotis di seluruh benua Asia.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat yang termasuk kelompok opini!',
                                'explanation' => 'Sangat mendebarkan dan terasa lebih nyaman adalah opini.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Film petualangan anak itu sangat mendebarkan dan menguras air mata penonton.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Belajar mandiri di rumah terasa lebih nyaman daripada di perpustakaan sekolah.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Durasi tayang film petualangan tersebut adalah 95 menit.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Perpustakaan sekolah buka setiap hari Senin hingga Jumat.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan pernyataan dengan kelompoknya (Fakta atau Opini)!',
                                'explanation' => 'Pasangan klasifikasi fakta dan opini.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Suhu normal tubuh manusia berkisar antara 36,5 hingga 37,5 derajat Celsius', 'is_correct' => false, 'match_key' => 'Fakta Ilmiah', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Minum teh hangat manis terasa paling nikmat saat cuaca dingin', 'is_correct' => false, 'match_key' => 'Opini Pribadi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Pulau Kalimantan adalah pulau terbesar ketiga di dunia', 'is_correct' => false, 'match_key' => 'Fakta Geografis', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tinggal di desa jauh lebih membahagiakan daripada tinggal di kota', 'is_correct' => false, 'match_key' => 'Opini Subjektif', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kata penanda dengan jenis kalimatnya!',
                                'explanation' => 'Pasangan kata penanda fakta dan opini.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Berdasarkan data statistik', 'is_correct' => false, 'match_key' => 'Penanda Kalimat Fakta', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Menurut pandangan saya', 'is_correct' => false, 'match_key' => 'Penanda Kalimat Opini', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tercatat pada dokumen resmi', 'is_correct' => false, 'match_key' => 'Penanda Kalimat Fakta', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Tampaknya / Sepertinya', 'is_correct' => false, 'match_key' => 'Penanda Kalimat Opini', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran pernyataan berikut!',
                                'explanation' => 'Kalimat yang memuat angka data hasil pengukuran adalah fakta.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Fakta tidak dapat diubah oleh perasaan suka atau tidak suka seseorang.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Opini setiap orang terhadap suatu hal yang sama dapat berbeda-beda.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Semua kalimat yang memuat angka pasti merupakan kalimat opini.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran etika berpendapat!',
                                'explanation' => 'Dilarang memaksakan pendapat pribadi kepada orang lain.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kita berhak menyampaikan opini kita dengan cara yang santun dan beradab.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kita boleh memaksakan opini kita agar diterima secara mutlak oleh orang lain.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Menghargai perbedaan opini teman adalah cerminan sikap toleransi berempati.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Pernyataan yang sesuai dengan keadaan nyata dan kebenarannya dapat dibuktikan disebut ....',
                                'explanation' => 'Fakta.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'fakta', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pernyataan yang berisi pendapat, anggapan, atau tanggapan subjektif seseorang dinamakan ....',
                                'explanation' => 'Opini.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'opini', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Fakta bersifat ... karena berlaku sama bagi semua orang tanpa dipengaruhi perasaan.',
                                'explanation' => 'Objektif.',
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
                                'prompt' => 'Opini bersifat ... karena tergantung pada sudut pandang dan selera individu.',
                                'explanation' => 'Subjektif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'subjektif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata "menurut saya" dan "sebaiknya" merupakan ciri kalimat ....',
                                'explanation' => 'Opini.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'opini', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Data angka hasil sensus atau penelitian laboratorium tergolong sebagai ....',
                                'explanation' => 'Fakta.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'fakta', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sikap menghargai perbedaan pendapat orang lain dalam musyawarah disebut sikap ....',
                                'explanation' => 'Toleransi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'toleransi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan empat perbedaan mendasar antara kalimat fakta dan kalimat opini berdasarkan sifat kebenaran, sumber pembuktian, kata penanda kebahasaan, dan tingkat subjektivitasnya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Sifat Kebenaran: Fakta kebenarannya mutlak dan pasti terjadi; opini kebenarannya bersifat relatif dan belum pasti.
2. Sumber Pembuktian: Fakta didukung oleh data angka, dokumen otentik, saksi mata, atau uji ilmiah; opini didasarkan pada perasaan, selera, atau anggapan pribadi.
3. Kata Penanda: Fakta ditandai kata pasti (telah, tercatat, menurut data); opini ditandai kata relatif/dugaan (sebaiknya, menurut saya, sangat, mungkin).
4. Tingkat Subjektivitas: Fakta bersifat objektif (sama bagi semua orang); opini bersifat subjektif (berbeda-beda antarsesama orang).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Tentukan status masing-masing kalimat di bawah ini (apakah FAKTA atau OPINI) beserta alasan logisnya!
a. "Provinsi Jawa Barat beribu kota di Kota Bandung."
b. "Belajar di sekolah ber-AC terasa jauh lebih menyenangkan daripada belajar di ruang terbuka."
c. "Sebanyak 35 siswa kelas 6 SD Melati lulus dengan nilai rata-rata 88 pada tahun 2026."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Fakta Geografis: Karena status Bandung sebagai ibu kota Jawa Barat diatur dalam undang-undang tata negara resmi dan dapat dibuktikan kebenarannya secara objektif.
b. Opini Subjektif: Karena kata "terasa jauh lebih menyenangkan" adalah penilaian relatif berdasarkan selera kenyamanan pribadi yang belum tentu disetujui semua orang.
c. Fakta Administratif: Karena menyajikan data angka konkret (35 siswa, nilai 88, tahun 2026) yang tercatat dalam dokumen resmi kelulusan sekolah.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah sebuah contoh dialog santun dalam musyawarah pemilihan ketua kelas (3-4 baris dialog) yang menunjukkan bagaimana seorang siswa menyampaikan opini pribadinya yang didukung oleh fakta konkret tanpa menyinggung perasaan temannya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Dialog Santun:
Dimas: "Teman-teman, menurut hemat saya, Farhan sangat tepat jika kita pilih sebagai ketua kelas (Opini).
Selama dua semester terakhir, Farhan terbukti selalu hadir paling pagi dan sukses memimpin regu piket kelas kita tanpa ada catatan pelanggaran (Fakta pendukung).
Bagaimana pendapat teman-teman yang lain? Tentu kita sangat terbuka untuk mendiskusikan calon lainnya secara bersama-sama."
(Dialog menggunakan kata santun, memuat opini didukung fakta, dan menghargai suara bersama).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 7 Bahasa Indonesia Kelas 6 (Paket 3 - Kesantunan Berbahasa & Etika Diskusi)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 7 bagian 3: Menguasai etika berpendapat, empat kata ajaib kesantunan, sanggahan santun tanpa ad hominem, dan musyawarah mufakat.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Musyawarah Menentukan Lokasi Karya Wisata Angkatan', 'content' => '[Keterangan Gambar: Suasana musyawarah mufakat kelas 6: siswa mengangkat tangan secara tertib sebelum berbicara, ketua kelas memimpin musyawarah dengan bijak, dan notulis mencatat usulan di papan tulis.]

Suasana ruang kelas 6 tampak hangat saat berlangsung musyawarah penentuan lokasi karya wisata kelulusan. Edo mengusulkan perjalanan ke museum sains di ibu kota, sementara Laras mengusulkan jelajah alam ke perkemahan lereng gunung.

Ketika Laras memaparkan argumennya, Edo menyimak dengan tenang tanpa memotong pembicaraan. Setelah Laras selesai, Edo mengangkat tangan dan berkata: "Usulan Laras sangat menarik karena memberi kesempatan kita menikmati alam bebas. Namun, izinkan saya menyampaikan pertimbangan cuaca bahwa saat ini sedang musim hujan lebat. Jika kita berkemah di lereng gunung, risiko jalan licin dan banjir perlu kita waspadai bersama. Bagaimana jika alternatif museum sains kita pertimbangkan demi faktor keselamatan?" Wali kelas tersenyum bangga menyaksikan bagaimana anak-anak mempraktikkan etika kesantunan berbahasa dan kedewasaan berdemokrasi.'],
                            ['title' => 'Stimulus 2: Menelaah Kaidah Kesantunan Berbahasa Leech', 'content' => '[Keterangan Gambar: Bagan enam maksim kesantunan berbahasa menurut Geoffrey Leech: 1. Maksim Kebijaksanaan (meminimalkan kerugian orang lain), 2. Maksim Kedermawanan, 3. Maksim Penghargaan (memuji orang lain), 4. Maksim Kerendahan Hati, 5. Maksim Permufakatan (mencari kesepakatan), 6. Maksim Simpati (berempati pada kemalangan orang lain).]

Kesantunan berbahasa adalah penggunaan bahasa yang sopan, santun, tidak menyinggung perasaan, serta menjunjung tinggi tata krama pergaulan. Dalam menyampaikan sanggahan atau kritik, kita dianjurkan menggunakan kata-kata pelembut (*mitigator*) seperti maaf, tolong, permisi, mohon izin, dan terima kasih. Mengkritik gagasan orang lain harus fokus pada substansi masalah, bukan menyerang pribadi orangnya (*ad hominem*).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap etis yang ditunjukkan oleh tokoh Edo saat Laras sedang menyampaikan pendapat adalah ....',
                                'explanation' => 'Dalam teks: "Edo menyimak dengan tenang tanpa memotong pembicaraan."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menyimak dengan tenang tanpa memotong pembicaraan hingga selesai', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Berteriak mencemooh ide Laras di hadapan teman-teman', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meninggalkan ruangan musyawarah dengan membanting pintu', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Memaksa ketua kelas langsung mengetuk palu kemenangan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kaidah kesantunan berbahasa yang tercermin dari cara Edo menyampaikan bantahan usulan adalah ....',
                                'explanation' => 'Kesantunan: apresiasi dulu kelebihan ide lawan baru sampaikan alasan logis.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengapresiasi kelebihan ide lawan terlebih dahulu sebelum menyampaikan kritik secara santun dan logis', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Langsung menghina bahwa ide perkemahan sangat berbahaya dan bodoh', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengancam tidak mau ikut karya wisata jika usulannya tidak dipilih', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyerang kepribadian Laras secara pribadi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA prinsip etika musyawarah mufakat yang diterapkan di kelas tersebut!',
                                'explanation' => 'Mengangkat tangan sebelum bicara dan menghormati hak bicara orang lain.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mengangkat tangan dengan tertib sebelum menyampaikan pendapat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menghormati hak bicara setiap peserta musyawarah secara adil', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Memaksakan kehendak kelompok sendiri dengan cara kekerasan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mengejek peserta musyawarah yang berbeda pilihan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan tindakan musyawarah dengan nilai etikanya!',
                                'explanation' => 'Pasangan tindakan dan etika musyawarah.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Menyimak penjelasan teman', 'is_correct' => false, 'match_key' => 'Etika menghargai pembicara', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mengangkat tangan sebelum bicara', 'is_correct' => false, 'match_key' => 'Etika ketertiban forum', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mengapresiasi usulan orang lain', 'is_correct' => false, 'match_key' => 'Kesantunan berbahasa', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Menerima keputusan mufakat bersama', 'is_correct' => false, 'match_key' => 'Jiwa besar dan sportivitas', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata-kata pelembut yang digunakan untuk menjaga kesantunan dalam menyampaikan sanggahan adalah ....',
                                'explanation' => 'Kata pelembut: mohon maaf, izinkan saya, permisi.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mohon maaf, izinkan saya, dan permisi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Harus, wajib, dan pasti salah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bohong, palsu, dan mengada-ada', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Diam, mundur, dan dengarkan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kesalahan etika diskusi berupa menyerang pribadi orang lain (bukan substansi idenya) dinamakan kekeliruan ....',
                                'explanation' => 'Menyerang pribadi lawan disebut ad hominem.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ad hominem', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pleonasme', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kausalitas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hiperbola', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kesantunan berbahasa!',
                                'explanation' => 'Kesantunan berbahasa berlaku setara kepada siapa saja tanpa memandang harta.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kritik santun fokus membedah ide gagasan, bukan menghina pribadi orangnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kesantunan berbahasa hanya perlu diterapkan kepada orang yang lebih kaya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mendengarkan pembicara tanpa memotong pembicaraan mencerminkan maksim penghargaan.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tindakan yang melanggar kesantunan berbahasa saat berbicara dengan orang yang lebih tua adalah ....',
                                'explanation' => 'Membentak dan menggunakan bahasa kasar melanggar kesantunan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menggunakan nada bicara membentak dan bahasa kasar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menundukkan kepala sedikit saat lewat di depannya', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mengucapkan salam hormat dengan ramah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Mendengarkan nasihat dengan saksama', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat penolakan pendapat yang paling santun dan bijaksana dalam rapat OSIS adalah ....',
                                'explanation' => 'Penolakan santun: "Mohon maaf, saya kurang sependapat..."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mohon maaf, saya kurang sependapat dengan usulan tersebut karena keterbatasan anggaran kas kita.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Saya tolak usulan itu karena ide tersebut sama sekali tidak berguna!', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pendapatmu itu tidak ada mutunya, jangan banyak bicara!', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Semua orang pasti setuju kalau idemu itu sangat konyol.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat permintaan tolong yang santun kepada teman sekelas adalah ....',
                                'explanation' => 'Meminta tolong dengan kata "Bolehkah saya meminta tolong..."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bolehkah saya meminta tolong membantuku membawa tumpukan buku ini?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cepat bawakan buku-buku ini sekarang juga!', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kamu kan nganggur, angkat buku ini cepat!', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jangan malas, bawa buku ini ke ruang guru!', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat permintaan maaf yang tulus saat tidak sengaja menumpahkan air minum adalah ....',
                                'explanation' => 'Permintaan maaf tulus disertai tanggung jawab membersihkan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mohon maaf sebesar-besarnya, saya tidak sengaja menumpahkan air ke mejamu, mari saya bersihkan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Salahmu sendiri menaruh botol air di pinggir meja!', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Cuma air tumpah sedikit saja kok kamu marah-marah!', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Air itu tumpah sendiri karena tersenggol angin.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ungkapan "lapang dada" saat usulan kita tidak terpilih dalam musyawarah bermakna ....',
                                'explanation' => 'Lapang dada berarti ikhlas berjiwa besar.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Ikhlas dan menerima keputusan bersama dengan jiwa besar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Merasa sakit hati dan berniat membalas dendam', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Mogok belajar dan mengurung diri di rumah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Memaksa pemilihan diulang kembali hingga kita menang', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Sikap empati seorang sahabat saat temannya berduka cita adalah ....',
                                'explanation' => 'Menyampaikan belasungkawa, menghibur, dan membantu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Menghibur dan menyampaikan belasungkawa serta menawarkan bantuan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menyuruh temannya segera melupakan kesedihannya dan tertawa', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menyebarkan foto duka temannya di media sosial demi konten viral', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pura-pura tidak tahu agar tidak repot membantu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tujuan utama dari musyawarah mufakat adalah mencapai ....',
                                'explanation' => 'Mencapai mufakat demi kebaikan bersama.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Keputusan bersama yang disetujui demi kebaikan seluruh pihak', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kemenangan sepihak kelompok yang anggotanya paling banyak', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Keuntungan finansial pribadi bagi pemimpin rapat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pertikaian sengit yang tidak berkesudahan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat sapaan yang santun kepada guru!',
                                'explanation' => 'Kalimat A dan B santun diawali salam dan kata permisi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Selamat pagi, Ibu Ratna, mohon izin saya ingin mengumpulkan tugas kliping.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Permisi, Bapak Guru, bolehkah saya bertanya tentang materi pecahan tadi?', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hei guru, cepat periksa tugasku sekarang!', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pak, nilai saya kok jelek sekali sih?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata ajaib kesantunan berbahasa yang wajib dibiasakan anak sehari-hari!',
                                'explanation' => 'Tolong, terima kasih, maaf, permisi adalah empat kata ajaib kesantunan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tolong dan terima kasih', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Maaf dan permisi', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Cepat dan paksa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Beli dan jual', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan situasi komunikasi dengan ungkapan santun yang tepat!',
                                'explanation' => 'Pasangan situasi dan ungkapan santun.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Meminta bantuan kepada orang lain', 'is_correct' => false, 'match_key' => '"Bolehkah saya meminta tolong dibantu?"', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Menerima pemberian atau bantuan', 'is_correct' => false, 'match_key' => '"Terima kasih banyak atas kebaikan Anda."', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Melakukan kesalahan tanpa sengaja', 'is_correct' => false, 'match_key' => '"Mohon maaf sebesar-besarnya atas kekhilafan saya."', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Lewat di depan orang yang sedang duduk', 'is_correct' => false, 'match_key' => '"Permisi, mohon izin menumpang lewat."', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan prinsip komunikasi dengan maknanya!',
                                'explanation' => 'Pasangan prinsip etika berkomunikasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Empati Komunikasi', 'is_correct' => false, 'match_key' => 'Menempatkan diri pada perasaan lawan bicara', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kejujuran Tuturan', 'is_correct' => false, 'match_key' => 'Menyampaikan fakta yang sebenarnya tanpa manipulasi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kehematan Kata', 'is_correct' => false, 'match_key' => 'Berbicara langsung pada inti masalah tanpa berbelit-belit', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kepatutan Bahasa', 'is_correct' => false, 'match_key' => 'Menyesuaikan ragam bahasa dengan situasi resmi atau santai', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran etika berkomunikasi santun!',
                                'explanation' => 'Emosi tidak membenarkan penggunaan kata kasar yang melanggar adab.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Mengucapkan terima kasih adalah tanda menghargai bantuan orang lain.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Menggunakan kata kasar adalah hal wajar jika kita sedang emosi.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Mendengarkan lawan bicara adalah bagian penting dari kesantunan berbahasa.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran musyawarah kelas!',
                                'explanation' => 'Keputusan mufakat dihormati bersama dengan lapang dada.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Setiap siswa memiliki hak yang sama untuk menyampaikan pendapatnya.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Keputusan musyawarah wajib dijalankan bersama dengan penuh tanggung jawab.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Siswa yang usulannya ditolak boleh merusak fasilitas kelas sebagai protes.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Penggunaan tata bahasa yang sopan dan tidak menyinggung perasaan disebut kesantunan ....',
                                'explanation' => 'Kesantunan berbahasa.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'berbahasa', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Empat kata santun yang wajib dibiasakan adalah tolong, maaf, permisi, dan terima ....',
                                'explanation' => 'Terima kasih.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kasih', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kegiatan berunding bersama untuk mengambil keputusan yang disepakati disebut ....',
                                'explanation' => 'Musyawarah mufakat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'musyawarah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sikap menerima hasil keputusan bersama dengan ikhlas dinamakan sikap lapang ....',
                                'explanation' => 'Lapang dada.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'dada', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Menyerang pribadi lawan bicara saat berdiskusi dan bukan membahas idenya dinamakan kekeliruan ad ....',
                                'explanation' => 'Ad hominem.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hominem', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata yang diucapkan saat kita membutuhkan bantuan orang lain adalah kata ....',
                                'explanation' => 'Tolong.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tolong', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata yang diucapkan saat kita melakukan kesalahan adalah kata ....',
                                'explanation' => 'Maaf.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'maaf', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan mengapa kesantunan berbahasa sangat penting diterapkan dalam kehidupan sehari-hari, baik di lingkungan sekolah, keluarga, maupun masyarakat, serta sebutkan empat "kata ajaib" kesantunan berbahasa dan fungsinya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pentingnya Kesantunan Berbahasa: Menjaga keharmonisan hubungan antarsesama manusia, mencegah timbulnya kesalahpahaman dan konflik sosial, mencerminkan budi pekerti dan adab luhur seseorang, serta menciptakan suasana pergaulan yang saling menghormati dan penuh empati.
2. Empat Kata Ajaib Kesantunan:
   - Tolong: Digunakan dengan rendah hati saat meminta bantuan orang lain.
   - Terima Kasih: Diucapkan sebagai ungkapan syukur dan penghargaan atas kebaikan, jasa, atau bantuan orang lain.
   - Maaf: Diucapkan dengan tulus saat melakukan kesalahan atau kekhilafan yang merugikan/mengganggu orang lain.
   - Permisi: Diucapkan dengan santun saat meminta izin lewat, memotong pembicaraan, atau memasuki ruang orang lain.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Bagaimana tata krama (etika) yang benar dalam menyampaikan sanggahan atau penolakan terhadap pendapat orang lain dalam sebuah musyawarah kelas agar tidak menyinggung perasaan pembicara?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Meminta Izin / Mengangkat Tangan: Menunggu giliran bicara dan tidak memotong saat orang lain sedang berbicara.
2. Mengapresiasi Pendapat Lawan: Mengakui kebaikan ide lawan terlebih dahulu sebelum menyampaikan sanggahan.
3. Menggunakan Bahasa Santun & Kata Pelembut: Mengawali dengan frasa santun seperti: "Mohon maaf, izinkan saya menyampaikan sudut pandang yang berbeda..."
4. Fokus pada Substansi Masalah: Menjelaskan alasan logis atau data pendukung tanpa menyerang kekurangan pribadi orangnya (*no ad hominem*).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Ubahlah kalimat-kalimat kasar di bawah ini menjadi kalimat yang santun, beradab, dan mencerminkan empati budi pekerti yang baik!
a. "Ide karya wisatamu itu sangat bodoh dan bikin susah orang saja!"
b. "Bawakan tasku sekarang, jangan lambat seperti kura-kura!"',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan Santun: "Mohon maaf, menurut pandangan saya usulan tersebut memiliki kendala biaya dan jarak yang cukup berat. Bagaimana jika kita cari alternatif lokasi lain yang lebih terjangkau?"
b. Perbaikan Santun: "Bolehkah saya meminta tolong dibantu membawakan tas ini sebentar? Terima kasih banyak atas bantuanmu sahabatku."',
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
