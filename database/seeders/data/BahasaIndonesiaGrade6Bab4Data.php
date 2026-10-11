<?php

namespace Database\Seeders\Data;

class BahasaIndonesiaGrade6Bab4Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Kuis Bab 4 Bahasa Indonesia Kelas 6 (Paket 1 - Teks Eksplanasi Perubahan Iklim)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 4 bagian 1: Memahami struktur teks eksplanasi ilmiah, hubungan kausalitas sebab-akibat, dan terminologi pemanasan global.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Mengapa Bumi Kita Semakin Panas?', 'content' => '[Keterangan Gambar: Ilustrasi efek rumah kaca: radiasi sinar matahari menembus atmosfer bumi, sebagian diserap permukaan bumi, dan panas inframerah terperangkap oleh lapisan gas rumah kaca (CO2, metana, N2O) sehingga suhu global meningkat drastis.]

Pemanasan global (*global warming*) adalah fenomena peningkatan suhu rata-rata atmosfer, laut, dan daratan bumi secara berkelanjutan. Proses terjadinya pemanasan global diawali dari emisi gas buang aktivitas manusia, seperti pembakaran bahan bakar fosil pada kendaraan bermotor dan pabrik industri, serta penggundulan hutan secara masif.

Aktivitas-aktivitas tersebut melepaskan karbon dioksida (CO2) dan gas metana dalam jumlah masif ke udara. Gas-gas ini terkonsentrasi membentuk lapisan tebal di atmosfer yang menyerupai atap rumah kaca. Ketika sinar matahari masuk dan memanaskan bumi, panas pantulan yang seharusnya dilepaskan kembali ke luar angkasa justru terperangkap dan dipantulkan kembali ke permukaan bumi. Akibatnya, suhu bumi meningkat secara perlahan namun pasti. Kenaikan suhu ini memicu pencairan es di kutub utara dan selatan, kenaikan permukaan air laut, serta kekeringan ekstrem di berbagai belahan dunia.'],
                            ['title' => 'Stimulus 2: Struktur dan Ciri Bahasa Teks Eksplanasi', 'content' => '[Keterangan Gambar: Bagan struktur teks eksplanasi ilmiah: 1. Pernyataan Umum (pengenalan fenomena alam/sosial), 2. Rangkaian Sebab-Akibat / Deretan Penjelas (proses terjadinya fenomena secara kronologis dan kausal), 3. Interpretasi / Ulasan (simpulan dan implikasi bagi manusia).]

Teks eksplanasi adalah teks yang menerangkan proses terjadinya suatu fenomena alam, sosial, ilmu pengetahuan, atau budaya berdasarkan prinsip kausalitas (sebab-akibat). Ciri kebahasaan teks eksplanasi ditandai dengan penggunaan kata hubung sebab-akibat seperti karena, sebab, oleh karena itu, sehingga, dan akibatnya. Selain itu, teks eksplanasi memuat istilah-istilah ilmiah serta kalimat pasif untuk menjelaskan proses terjadinya peristiwa secara objektif.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, penyebab utama meningkatnya konsentrasi gas rumah kaca di atmosfer adalah ....',
                                'explanation' => 'Dalam teks: "emisi gas buang... pembakaran bahan bakar fosil... serta penggundulan hutan secara masif."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pembakaran bahan bakar fosil dan penggundulan hutan secara masif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penanaman pohon mangrove di pesisir pantai', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penggunaan sepeda onthel tanpa mesin bermotor', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pemasangan panel surya ramah lingkungan di atap rumah', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Dampak nyata dari pemanasan global yang dijelaskan pada akhir paragraf adalah ....',
                                'explanation' => 'Pemanasan global memicu mencairnya es kutub dan kenaikan air laut.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mencairnya es kutub dan kenaikan permukaan air laut global', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Menurunnya suhu udara menjadi dingin membeku di seluruh dunia', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meningkatnya jumlah populasi beruang kutub secara drastis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menurunnya penguapan air di danau dan sungai', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA jenis gas rumah kaca yang disebutkan dalam teks wacana!',
                                'explanation' => 'Teks menyebutkan karbon dioksida (CO2) dan gas metana.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Karbon dioksida (CO2)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Gas metana', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Gas oksigen murni', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Gas helium', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan rantai sebab-akibat pemanasan global di kolom kiri dengan peristiwanya di kolom kanan!',
                                'explanation' => 'Pasangan rantai kausalitas pemanasan global.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Emisi Pembakaran Fosil', 'is_correct' => false, 'match_key' => 'Pelepasan gas karbon dioksida masif ke atmosfer', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Efek Rumah Kaca', 'is_correct' => false, 'match_key' => 'Panas radiasi terperangkap dan dipantulkan ke bumi', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kenaikan Suhu Global', 'is_correct' => false, 'match_key' => 'Pencairan tudung es di kawasan kutub bumi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kenaikan Permukaan Laut', 'is_correct' => false, 'match_key' => 'Tenggelamnya pulau-pulau kecil dan banjir rob', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Prinsip utama yang mendasari penyusunan alur deretan penjelas dalam teks eksplanasi adalah prinsip ....',
                                'explanation' => 'Eksplanasi berlandaskan prinsip hubungan kausalitas sebab-akibat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kausalitas (hubungan sebab-akibat yang logis)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Khayalan magis fiksi kepahlawanan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sudut pandang subjektif emosional penulis', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Dialog rekaan drama teater panggung', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian akhir teks eksplanasi yang berisi intisari simpulan atau pandangan pengarang terhadap fenomena disebut ....',
                                'explanation' => 'Bagian akhir eksplanasi adalah interpretasi / ulasan.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Interpretasi (atau ulasan)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pernyataan umum', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Deretan penjelas', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Orientasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran ciri teks eksplanasi!',
                                'explanation' => 'Eksplanasi menjelaskan proses terjadinya fenomena secara ilmiah, bukan teks iklan komersial.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks eksplanasi menjawab pertanyaan "mengapa" dan "bagaimana" suatu fenomena terjadi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Bahasa teks eksplanasi memuat banyak kata hubung sebab-akibat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Teks eksplanasi bertujuan mengajak pembaca membeli produk komersial.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi yang digunakan untuk menghubungkan akibat dari suatu peristiwa pada teks eksplanasi adalah ....',
                                'explanation' => 'Sehingga dan akibatnya menyatakan hubungan akibat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sehingga / akibatnya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Tetapi / melainkan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Meskipun / walaupun', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Atau / andaikata', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bagian pembuka teks eksplanasi yang memuat gambaran umum tentang fenomena banjir rob dinamakan ....',
                                'explanation' => 'Pembuka eksplanasi adalah pernyataan umum.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pernyataan umum', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Deretan penjelas', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Interpretasi', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Reorientasi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menggunakan konjungsi kausalitas (sebab-akibat) secara tepat adalah ....',
                                'explanation' => 'Konjungsi "karena" menyatakan hubungan sebab-akibat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Banjir rob merendam permukiman warga karena permukaan air laut pasang meningkat drastis.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Banjir rob merendam permukiman warga dan mereka segera mengungsi.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Apakah banjir rob terjadi di pagi hari atau malam hari?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Banjir rob merendam permukiman warga seperti kolam renang yang luas.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kata ilmiah dalam bidang iklim "emisi" memiliki makna ....',
                                'explanation' => 'Emisi berarti pelepasan/pancaran gas buang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pancaran atau pelepasan gas buang ke udara', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penyaringan udara menggunakan filter', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pengendapan cairan di dasar laut', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Penyerapan sinar matahari oleh daun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Makna istilah "deforestasi" dalam teks eksplanasi lingkungan adalah ....',
                                'explanation' => 'Deforestasi adalah penebangan/penggundulan hutan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penggundulan atau penebangan hutan secara besar-besaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penanaman kembali hutan yang gundul', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Pembuatan cagar alam buatan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Pembersihan sampah di sungai', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Lawan kata (antonim) dari istilah deforestasi adalah ....',
                                'explanation' => 'Lawan penggundulan hutan adalah reboisasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Reboisasi (penghijauan kembali)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Abrasi pantai', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Erosi tanah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Polusi udara', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi antarkalimat yang menyatakan hubungan pertentangan pada teks eksplanasi adalah ....',
                                'explanation' => 'Namun dan meskipun demikian menyatakan pertentangan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Meskipun demikian / namun', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh karena itu', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dengan demikian', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Selain itu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA fenomena alam yang tepat dijelaskan menggunakan teks eksplanasi!',
                                'explanation' => 'Siklus hujan dan gerhana matahari adalah fenomena ilmiah eksplanasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Proses terjadinya siklus hidrologi (hujan)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Proses terjadinya gerhana matahari total', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Cerita dongeng Kancil dan Buaya', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Naskah sandiwara komedi perpisahan kelas', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konjungsi yang menyatakan hubungan sebab-akibat (kausalitas)!',
                                'explanation' => 'Karena, sebab, sehingga, akibatnya adalah konjungsi kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Karena / sebab', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sehingga / akibatnya', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Atau / melainkan', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kemudian / lalu', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan struktur teks eksplanasi dengan fungsinya!',
                                'explanation' => 'Pasangan struktur teks eksplanasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pernyataan Umum', 'is_correct' => false, 'match_key' => 'Mengenalkan topik fenomena yang akan dijelaskan prosesnya', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Deretan Penjelas', 'is_correct' => false, 'match_key' => 'Memaparkan urutan proses sebab-akibat terjadinya peristiwa', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Interpretasi', 'is_correct' => false, 'match_key' => 'Menyajikan simpulan dan tanggapan atas fenomena tersebut', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Judul Teks', 'is_correct' => false, 'match_key' => 'Memberikan gambaran singkat pokok fenomena', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah sains perubahan iklim dengan pengertiannya!',
                                'explanation' => 'Pasangan istilah perubahan iklim.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Efek Rumah Kaca', 'is_correct' => false, 'match_key' => 'Perangkap panas di atmosfer oleh gas CO2 dan metana', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Energi Terbarukan', 'is_correct' => false, 'match_key' => 'Sumber energi alami yang tidak akan habis (matahari, angin)', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Jejak Karbon', 'is_correct' => false, 'match_key' => 'Total emisi gas rumah kaca yang dihasilkan oleh aktivitas seseorang', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Krisis Iklim', 'is_correct' => false, 'match_key' => 'Perubahan iklim drastis yang mengancam kehidupan di bumi', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran teks eksplanasi ilmiah!',
                                'explanation' => 'Deretan penjelas wajib disusun teratur secara kausal dan kronologis.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Teks eksplanasi menyajikan fakta nyata yang dapat dibuktikan secara sains.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Urutan peristiwa dalam deretan penjelas disusun secara acak tanpa pola kausal.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Gaya bahasa teks eksplanasi bersifat informatif dan objektif.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penggunaan konjungsi kausalitas!',
                                'explanation' => 'Konjungsi "karena" adalah konjungsi intrakalimat, bukan konjungsi antarkalimat.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata "oleh karena itu" merupakan konjungsi antarkalimat sebab-akibat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Setelah konjungsi antarkalimat "Oleh karena itu" wajib dibubuhi tanda koma.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Konjungsi "karena" selalu diletakkan di akhir kalimat setelah tanda titik.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Teks yang menerangkan proses terjadinya suatu fenomena alam berdasarkan sebab-akibat dinamakan teks ....',
                                'explanation' => 'Teks eksplanasi.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'eksplanasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bagian inti teks eksplanasi yang memaparkan rangkaian proses terjadinya peristiwa disebut deretan ....',
                                'explanation' => 'Deretan penjelas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'penjelas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Hubungan sebab-akibat dalam kaidah kebahasaan disebut hubungan ....',
                                'explanation' => 'Kausalitas (causality).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kausalitas', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Pelepasan gas buang hasil pembakaran ke udara atmosfer sering disebut ....',
                                'explanation' => 'Emisi gas buang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'emisi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Penanaman kembali pohon di kawasan hutan yang telah gundul dinamakan ....',
                                'explanation' => 'Reboisasi (penghijauan kembali).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'reboisasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bagian penutup teks eksplanasi yang memuat simpulan dinamakan ....',
                                'explanation' => 'Interpretasi / ulasan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'interpretasi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Energi ramah lingkungan yang bersumber dari sinar matahari disebut energi surya atau panel ....',
                                'explanation' => 'Panel surya (solar panel).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'surya', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Sebutkan dan jelaskan secara terperinci tiga bagian struktur pembangun teks eksplanasi ilmiah, serta berikan contoh kalimat untuk masing-masing bagian bertema fenomena banjir rob di pesisir utara Jawa!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Pernyataan Umum: Mengenalkan definisi atau hakikat fenomena yang akan dijelaskan.
   - Contoh: "Banjir rob adalah peristiwa meluapnya air laut ke daratan pesisir pantai yang terjadi akibat pasang surut air laut dan penurunan muka tanah."
2. Rangkaian Penjelas (Sebab-Akibat): Menguraikan tahapan proses terjadinya banjir secara ilmiah dan kausal.
   - Contoh: "Pemanasan global memicu kenaikan suhu laut sehingga volume air laut memuai dan es kutub mencair. Pada saat yang sama, penyedotan air tanah berlebih menyebabkan tanah di pesisir amblas. Akibatnya, saat gelombang pasang tiba, tanggul pantai tidak mampu menahan luapan air sehingga membanjiri perumahan warga."
3. Interpretasi (Ulasan/Simpulan): Menyajikan simpulan dan solusi mitigasi dampak fenomena.
   - Contoh: "Oleh karena itu, pembangunan tanggul laut ramah lingkungan dan penanaman hutan bakau secara masif harus segera digalakkan demi melindungi keselamatan warga pesisir."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Jelaskan proses terjadinya fenomena efek rumah kaca secara sederhana dan runtut menggunakan minimal empat konjungsi kausalitas (seperti: diawali, karena, sehingga, akibatnya)!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Penjelasan:
"Proses efek rumah kaca diawali dari pancaran sinar radiasi matahari yang menembus lapisan atmosfer menuju permukaan bumi. Sebagian panas matahari diserap oleh daratan dan lautan, sedangkan sebagian lainnya dipantulkan kembali menuju luar angkasa. Namun, karena aktivitas industri melepaskan gas karbon dioksida dan metana dalam jumlah masif, gas-gas tersebut membentuk lapisan tebal di atmosfer. Lapisan gas ini memerangkap pantulan panas matahari, sehingga energi panas tersebut memantul kembali ke permukaan bumi. Akibatnya, suhu rata-rata permukaan bumi meningkat secara terus-menerus dan memicu pemanasan global."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbaikilah paragraf berikut agar menjadi teks eksplanasi yang kohesif, runtut, dan menggunakan kata hubung kausalitas yang efektif!

"Hutan ditebang sembarangan. Pohon tidak ada lagi. Air hujan turun deras. Air tidak meresap ke tanah. Terjadilah tanah longsor dan banjir bandang."',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Perbaikan Paragraf Eksplanasi Runtut:
"Penggundulan hutan secara liar menyebabkan ketiadaan pohon yang berfungsi sebagai pengikat struktur tanah. Ketika air hujan turun dengan intensitas deras, air tersebut tidak dapat meresap secara optimal ke dalam pori-pori tanah karena hilangnya akar pepohonan. Akibatnya, lapisan tanah bagian atas menjadi jenuh air dan mudah runtuh, sehingga memicu terjadinya bencana tanah longsor dan banjir bandang di kawasan hilir."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 4 Bahasa Indonesia Kelas 6 (Paket 2 - Kalimat Efektif & Kampanye Iklim)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 4 bagian 2: Menganalisis kalimat efektif, perbaikan pleonasme, kesejajaran bentuk, dan penyusunan kampanye aksi iklim.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Aksi Nyata Hemat Energi Generasi Penerus', 'content' => '[Keterangan Gambar: Infografis panduan ramah lingkungan "Langkah Kecil Berdampak Besar": 1. Mematikan lampu dan sakelar saat tidak dipakai, 2. Berjalan kaki atau bersepeda ke sekolah, 3. Membawa botol minum (*tumbler*) isi ulang, 4. Memilah sampah organik untuk kompos, 5. Menanam pohon di pekarangan rumah.]

Setiap anak memiliki peran berharga dalam memperlambat laju krisis iklim. Melalui pembiasaan gaya hidup hemat energi di lingkungan sekolah dan rumah tangga, jejak karbon harian dapat dipangkas secara nyata. Penggunaan botol minum guna ulang (*tumbler*) secara disiplin oleh 500 siswa di sekolah dapat mencegah terbuangnya lebih dari 15.000 botol plastik sekali pakai setiap bulannya. Selain itu, kebiasaan mematikan lampu ruang kelas saat istirahat siang mampu menekan konsumsi energi listrik sekolah hingga 25 persen. Aksi kolektif yang konsisten dari generasi muda adalah fondasi penyelamatan masa depan bumi.'],
                            ['title' => 'Stimulus 2: Menelaah Kalimat Efektif dalam Teks Kampanye Lingkungan', 'content' => '[Keterangan Gambar: Poster kampanye lingkungan hidup bertuliskan slogan: "Selamatkan Hutan Kita Demi Masa Depan Anak Cucu!". Poster memuat kalimat-kalimat ajakan yang lugas, tidak bertele-tele, serta memiliki kesepadanan subjek dan predikat yang jelas.]

Kalimat efektif adalah kalimat yang disusun secara benar berdasarkan kaidah tata bahasa yang berlaku serta mampu menyampaikan gagasan penulis kepada pembaca secara tepat, jelas, dan mudah dipahami. Ciri-ciri kalimat efektif meliputi:
1. Kesepadanan struktur: Memiliki subjek dan predikat yang jelas (tidak didahului preposisi yang merusak subjek).
2. Kehematan kata: Tidak menggunakan kata-kata bersinonim secara berulang (menghindari pleonasme).
3. Kesejajaran bentuk (paralelisme): Jika unsur pertama berupa kata kerja, unsur berikutnya juga harus berupa kata kerja.
4. Kelogisan makna: Gagasan kalimat masuk akal dan dapat diterima nalar.'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan wacana Stimulus 1, dampak positif dari kebiasaan 500 siswa membawa botol minum guna ulang adalah ....',
                                'explanation' => 'Dalam teks: "mencegah terbuangnya lebih dari 15.000 botol plastik sekali pakai setiap bulannya."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Mencegah terbuangnya lebih dari 15.000 botol plastik sekali pakai per bulan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Membuat kantin sekolah kehabisan stok air minum', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menaikkan biaya iuran sekolah para siswa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Menyebabkan tas sekolah menjadi terlalu berat', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penghematan energi listrik yang diperoleh dari mematikan lampu kelas saat istirahat siang mencapai ....',
                                'explanation' => 'Penghematan listrik mencapai hingga 25 persen.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hingga 25 persen', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hingga 50 persen', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Hingga 10 persen', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hingga 75 persen', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA aksi ramah lingkungan yang dianjurkan dalam infografis!',
                                'explanation' => 'Bersepeda/jalan kaki dan mematikan alat listrik yang tidak dipakai.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Berjalan kaki atau bersepeda saat pergi ke sekolah', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mematikan lampu dan mencabut sakelar yang tidak digunakan', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Membakar sampah plastik di halaman belakang rumah', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Membiarkan keran air mengalir sepanjang malam', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan tindakan ramah lingkungan dengan dampak positifnya!',
                                'explanation' => 'Pasangan aksi iklim dan dampaknya.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Membawa tumbler', 'is_correct' => false, 'match_key' => 'Mengurangi timbulan sampah plastik sekali pakai', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Mematikan lampu kelas', 'is_correct' => false, 'match_key' => 'Menghemat konsumsi energi listrik hingga 25%', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Menanam pohon', 'is_correct' => false, 'match_key' => 'Menyerap gas karbon dioksida di udara', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Bersepeda ke sekolah', 'is_correct' => false, 'match_key' => 'Menekan emisi gas buang bahan bakar fosil', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri kalimat efektif yang menekankan tidak adanya pemborosan kata bersinonim dinamakan prinsip ....',
                                'explanation' => 'Kehematan kata menghindari pemborosan pleonasme.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kehematan kata (efisiensi)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kesepadanan struktur', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kesejajaran bentuk', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kelogisan penalaran', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh kalimat yang TIDAK efektif karena pemborosan kata adalah ....',
                                'explanation' => '"Semua siswa-siswa" merupakan pemborosan jamak ganda.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Semua siswa-siswa berkumpul di lapangan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Seluruh siswa berkumpul di lapangan.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Siswa-siswa berkumpul di lapangan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Para siswa berkumpul di lapangan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran syarat kalimat efektif!',
                                'explanation' => 'Kalimat efektif harus logis (masuk akal) dan paralel.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kalimat efektif wajib memiliki unsur subjek dan predikat yang jelas.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kalimat efektif boleh menggunakan kata yang maknanya bertentangan dengan akal sehat.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bentuk kata dalam perincian kalimat efektif harus sejajar (paralel).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbaikan kalimat tidak logis: "Waktu dan tempat kami persilakan kepada Bapak Kepala Sekolah" yang benar adalah ....',
                                'explanation' => 'Orang yang dipersilakan berbicara adalah Bapak Kepala Sekolah, bukan waktu dan tempat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Bapak Kepala Sekolah kami persilakan menyampaikan sambutan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Waktu dan tempat kami berikan kepada Bapak.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kepada Bapak Kepala Sekolah waktu dan tempat dipersilakan.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tempat dan waktu silakan maju ke depan.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat berikut yang merupakan kalimat efektif yang baku adalah ....',
                                'explanation' => 'Kalimat pertama memiliki struktur lengkap, sejajar, dan hemat kata.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Para siswa membersihkan selokan dan menanam bibit pohon di halaman.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Para siswa-siswa membersihkan daripada selokan di halaman.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Dalam rapat itu membahas tentang masalah pemanasan global.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bagi para peserta lomba harap untuk segera berkumpul.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang TIDAK efektif karena subjeknya kabur (didahului kata depan) adalah ....',
                                'explanation' => 'Kata "Untuk" di awal mengaburkan kedudukan subjek.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Untuk para siswa kelas enam harus mematuhi tata tertib sekolah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Siswa kelas enam harus mematuhi tata tertib sekolah.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Seluruh siswa mematuhi peraturan sekolah dengan tertib.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Tata tertib sekolah wajib ditaati oleh para siswa.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh kalimat efektif yang memenuhi asas kesejajaran bentuk (paralelisme) adalah ....',
                                'explanation' => 'Bentuk pe-an disejajarkan: pengumpulan, pemilahan, penanaman.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kegiatan peduli iklim meliputi pengumpulan sampah, pemilahan barang bekas, dan penanaman pohon.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Kegiatan peduli iklim meliputi mengumpulkan sampah, pemilahan barang bekas, dan menanam pohon.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kegiatan peduli iklim adalah mengumpulkan sampah, memilah barang, dan penanaman pohon.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kegiatan peduli iklim yaitu pengumpulan sampah, memilah barang, dan ditanami pohon.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Perbaikan kalimat pleonastis: "Para relawan saling tolong-menolong membersihkan sampah" yang tepat adalah ....',
                                'explanation' => 'Saling menolong atau tolong-menolong (pilih salah satu).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Para relawan saling menolong membersihkan sampah.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Para relawan saling tolong-menolong satu sama lain.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Para relawan-relawan tolong-menolong bersama-sama.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Para relawan saling membantu tolong-menolong.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat slogan kampanye lingkungan yang paling persuasif dan efektif adalah ....',
                                'explanation' => 'Slogan persuasif bernada padat, berima, dan memikat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pilah Sampahmu Hari Ini, Selamatkan Bumi Esok Pagi!', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mari kita bersama-sama kalau bisa memilah daripada sampah kita masing-masing.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sampah harus dibuang karena sampah itu sangat kotor sekali.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Jangan buang sampah sembarangan ya teman-teman semua.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Makna kata "konsisten" dalam menjalankan aksi penyelamatan bumi adalah ....',
                                'explanation' => 'Konsisten berarti berkesinambungan dan teguh.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tetap, taat asas, dan tidak berubah-ubah dalam pendirian', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hanya rajin di awal lalu berhenti di tengah jalan', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Menunggu diperintah oleh orang lain baru bergerak', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Berubah-ubah sesuai kondisi suasana hati', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kalimat yang termasuk kalimat efektif!',
                                'explanation' => 'Kalimat A dan B efektif dan baku. Kalimat C dan D mubazir/rancu.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hutan lindung itu harus dijaga agar kelestariannya tetap terjamin.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Pemerintah menetapkan aturan ketat tentang pembakaran hutan liar.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Di dalam hutan itu banyak pohon-pohon yang sangat tinggi sekali.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Buku laporan itu saya sudah membacanya kemarin sore.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kesalahan umum yang sering membuat kalimat menjadi TIDAK efektif!',
                                'explanation' => 'Pleonasme dan subjek kabur adalah kesalahan kalimat efektif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penggunaan kata-kata bersinonim secara berulang (pleonasme)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Hilangnya fungsi subjek akibat penggunaan preposisi di awal kalimat', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penggunaan huruf kapital pada nama kota dan orang', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Penggunaan tanda titik di akhir kalimat berita', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan kalimat tidak efektif di kolom kiri dengan penyebab kesalahannya di kolom kanan!',
                                'explanation' => 'Pasangan analisis kalimat tidak efektif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Adik sangat gemar sekali melukis pemandangan alam', 'is_correct' => false, 'match_key' => 'Pemborosan kata (sangat dan sekali dipakai bersamaan)', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Di sekolah kami mengadakan lomba daur ulang plastik', 'is_correct' => false, 'match_key' => 'Subjek tidak jelas karena didahului preposisi "di"', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tahapannya adalah pencatatan, menimbang, dan pembagian', 'is_correct' => false, 'match_key' => 'Ketidaksejajaran bentuk kata dalam perincian', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Mayat korban yang meninggal itu segera dievakuasi', 'is_correct' => false, 'match_key' => 'Pleonastis (mayat pasti sudah meninggal)', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah keefektifan kalimat dengan contoh perbaikannya!',
                                'explanation' => 'Pasangan perbaikan kalimat efektif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Pleonasme Jamak', 'is_correct' => false, 'match_key' => '"Banyak siswa" (bukan "Banyak siswa-siswa")', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Preposisi Perusak Subjek', 'is_correct' => false, 'match_key' => '"Rapat membahas iklim" (bukan "Dalam rapat membahas iklim")', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Paralelisme Verba', 'is_correct' => false, 'match_key' => '"Menyapu, mengepel, dan menyiram"', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kehematan Konjungsi', 'is_correct' => false, 'match_key' => '"Karena sakit, ia izin" (bukan "Karena ia sakit maka ia izin")', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kaidah kehematan kata!',
                                'explanation' => 'Agar dan supaya adalah kata bersinonim, gunakan salah satu saja.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Frasa "sejak dari pagi" termasuk pemborosan kata karena sejak dan dari bersinonim.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Frasa "agar supaya" dianjurkan dipakai bersamaan agar maknanya semakin kuat.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Frasa "turun ke bawah" merupakan pemborosan karena turun pasti ke arah bawah.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kelogisan kalimat!',
                                'explanation' => 'Waktu tidak dapat dipersingkat (panjangnya tetap 60 menit per jam), melainkan diefisienkan.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kalimat: "Pencuri itu berhasil ditangkap polisi" merupakan kalimat logis.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kalimat: "Untuk mempersingkat waktu, kita teruskan acara ini" merupakan kalimat logis.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Perbaikan kalimat tersebut: "Untuk mengefisienkan waktu, kita lanjutkan acara ini."', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => 'Kalimat yang disusun sesuai kaidah tata bahasa dan mudah dipahami pembaca disebut kalimat ....',
                                'explanation' => 'Kalimat efektif.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'efektif', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kesalahan berbahasa berupa penggunaan kata-kata mubazir yang bersinonim berulang disebut ....',
                                'explanation' => 'Pleonasme (pemborosan kata).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'pleonasme', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kesamaan bentuk kata (misalnya sama-sama berawalan me-) dalam perincian kalimat efektif disebut ....',
                                'explanation' => 'Kesejajaran bentuk (paralelisme).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kesejajaran', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Gagasan dalam kalimat efektif harus masuk akal atau dapat diterima nalar yang disebut prinsip ....',
                                'explanation' => 'Kelogisan penalaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'kelogisan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk perbaikan dari frasa mubazir "agar supaya" adalah cukup menggunakan kata ....',
                                'explanation' => 'Gunakan agar atau supaya saja.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'agar', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk perbaikan dari kata jamak ganda "para hadirin sekalian" adalah cukup menggunakan kata ....',
                                'explanation' => 'Cukup hadirin saja.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'hadirin', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Botol minum guna ulang yang ramah lingkungan sering disebut botol ....',
                                'explanation' => 'Tumbler / botol guna ulang.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'tumbler', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan empat syarat utama sebuah kalimat dapat dikategorikan sebagai kalimat efektif (kesepadanan, kehematan, kesejajaran, dan kelogisan), serta berikan masing-masing satu contoh kalimatnya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Kesepadanan Struktur: Memiliki subjek dan predikat yang jelas.
   - Contoh: "Siswa kelas enam menanam bibit mangrove di pesisir pantai."
2. Kehematan Kata: Menghindari kata mubazir yang bersinonim.
   - Contoh: "Para siswa berkumpul di aula." (Bukan "Para siswa-siswa sekalian").
3. Kesejajaran Bentuk (Paralelisme): Memiliki bentuk kata yang seragam dalam perincian.
   - Contoh: "Langkah pelestarian meliputi penanaman pohon, pembersihan sungai, dan pengelolaan sampah." (Semua berkonfiks pe-an).
4. Kelogisan Penalaran: Gagasan kalimat masuk akal sehat.
   - Contoh: "Bapak Lurah kami persilakan menyampaikan pidato." (Bukan "Waktu dan tempat kami persilakan").',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbaikilah kalimat-kalimat tidak efektif di bawah ini agar menjadi kalimat efektif yang baku dan hemat kata!
a. Di dalam pertemuan itu membicarakan daripada masalah krisis iklim global.
b. Kakak menyiram bunga, menyapu halaman, dan pembersihan selokan depan rumah.
c. Sungguh amat sangat indah sekali pemandangan matahari terbit di puncak gunung itu.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Pertemuan itu membicarakan masalah krisis iklim global." (Hapus preposisi "Di dalam" dan "daripada").
b. Perbaikan: "Kakak menyiram bunga, menyapu halaman, dan membersihkan selokan depan rumah." (Ubah pembersihan menjadi membersihkan agar sejajar berawalan me-).
c. Perbaikan: "Sangat indah pemandangan matahari terbit di puncak gunung itu." (Hapus kata mubazir: sungguh, amat, sekali; pilih satu penguat).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah sebuah teks poster kampanye lingkungan hidup yang terdiri atas 3-4 kalimat efektif yang padat, memuat satu slogan persuasif, dan mengajak generasi muda melakukan aksi hemat energi!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Teks Kampanye Efektif:
"Satu Langkah Kecil Kita, Harapan Besar bagi Bumi!
Matikan lampu dan cabut sakelar listrik saat tidak digunakan di rumah. Berjalan kaki atau bersepedalah saat bepergian ke sekolah untuk mengurangi emisi bahan bakar fosil. Mari budayakan gaya hidup hemat energi demi masa depan bumi yang hijau dan lestari!"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Kuis Bab 4 Bahasa Indonesia Kelas 6 (Paket 3 - Kausalitas Kompleks & Sains Serapan)',
                'type' => 'quiz',
                'description' => 'Asesmen formatif Bab 4 bagian 3: Menguasai konjungsi kausalitas intrakalimat dan antarkalimat, istilah sains transisi energi, dan pembentukan kalimat efektif.',
                'duration_minutes' => 45,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Transisi Menuju Energi Bersih dan Berkelanjutan', 'content' => '[Keterangan Gambar: Ladang turbin angin kincir raksasa berpadu dengan ribuan panel fotovoltaik surya di perbukitan hijau yang menyalurkan listrik bersih tanpa emisi polusi.]

Ketergantungan dunia pada bahan bakar hidrokarbon (minyak bumi dan batu bara) harus segera diakhiri. Pasalnya, pembakaran senyawa karbon tersebut melepaskan polutan beracun serta gas rumah kaca yang memicu anomali iklim global. Oleh karena itu, negara-negara di dunia kini mempercepat transisi energi menuju sumber daya energi terbarukan. Pembangkit listrik tenaga bayu (angin), pembangkit surya fotovoltaik, dan panas bumi (geotermal) merupakan alternatif mutlak yang bebas emisi karbon. Meskipun biaya instalasi awal teknologi ramah lingkungan ini cukup tinggi, efisiensi jangka panjang dan dampaknya terhadap keselamatan biosfer bumi jauh lebih berharga.'],
                            ['title' => 'Stimulus 2: Menelaah Konjungsi Kausalitas Intrakalimat dan Antarkalimat', 'content' => '[Keterangan Gambar: Bagan perbedaan konjungsi kausalitas intrakalimat (karena, sebab, sehingga, akibatnya) dan konjungsi antarkalimat (Oleh karena itu, Oleh sebab itu, Akibatnya, Dengan demikian) yang selalu diikuti tanda koma di awal kalimat baru.]

Konjungsi kausalitas berfungsi menghubungkan dua peristiwa yang memiliki keterkaitan sebab-akibat. Konjungsi intrakalimat menghubungkan klausa sebab dan klausa akibat di dalam satu kalimat tunggal yang sama (misalnya: *Es kutub mencair karena suhu bumi meningkat*). Sebaliknya, konjungsi antarkalimat menghubungkan kalimat yang menyatakan akibat dengan kalimat sebelumnya yang memuat sebab. Penulisan konjungsi antarkalimat wajib diletakkan di awal kalimat baru dengan huruf kapital pertama dan diikuti tanda koma (misalnya: *Hutan gundul terus bertambah. Oleh karena itu, banjir bandang sering melanda permukiman warga.*).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Berdasarkan teks Stimulus 1, alasan utama dunia harus segera beralih dari bahan bakar fosil adalah ....',
                                'explanation' => 'Dalam teks: "pembakaran senyawa karbon tersebut melepaskan polutan beracun serta gas... pemicu anomali iklim."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Pembakarannya melepaskan polutan beracun dan gas pemicu anomali iklim global', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Cadangan minyak bumi melimpah dan tidak pernah habis', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Harga bahan bakar fosil gratis di seluruh dunia', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Bahan bakar fosil tidak menghasilkan energi panas sama sekali', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Tiga contoh sumber energi terbarukan ramah lingkungan yang dipaparkan dalam wacana adalah ....',
                                'explanation' => 'Energi bayu, surya, dan geotermal adalah energi terbarukan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Tenaga bayu (angin), surya fotovoltaik, dan panas bumi (geotermal)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Batu bara, minyak tanah, dan gas elpiji', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bensin, solar, dan avtur pesawat', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kayu bakar, arang batok, dan briket batu bara', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata serapan sains yang terdapat pada wacana Stimulus 1!',
                                'explanation' => 'Transisi dan fotovoltaik adalah kata serapan ilmiah.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Transisi (dari kata transition)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Fotovoltaik (dari kata photovoltaic)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Matahari terbit', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Angin sepoi-sepoi', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah energi terbarukan dengan sumber alaminya!',
                                'explanation' => 'Pasangan sumber energi terbarukan.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Energi Bayu', 'is_correct' => false, 'match_key' => 'Angin hembusan atmosfer', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Energi Surya', 'is_correct' => false, 'match_key' => 'Radiasi sinar matahari', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Energi Geotermal', 'is_correct' => false, 'match_key' => 'Panas bumi dari perut bumi', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Energi Hidroelektrik', 'is_correct' => false, 'match_key' => 'Aliran arus air sungai atau bendungan', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Ciri penulisan konjungsi kausalitas antarkalimat yang benar adalah ....',
                                'explanation' => 'Konjungsi antarkalimat di awal kalimat berhuruf kapital dan diikuti koma.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Diletakkan di awal kalimat baru, diawali huruf kapital, dan diikuti tanda koma', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Diletakkan di tengah kalimat tanpa tanda baca pemisah', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Diakhiri tanda seru rangkap dua di akhir kata', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Hanya boleh ditulis menggunakan huruf miring kecil', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Contoh penggunaan konjungsi kausalitas antarkalimat yang tepat di bawah ini adalah ....',
                                'explanation' => '"Oleh karena itu," diawali kapital dan diikuti tanda koma menghubungkan dua kalimat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Curah hujan sangat tinggi selama tiga hari. Oleh karena itu, debit air sungai meluap.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Curah hujan sangat tinggi selama tiga hari, karena debit air sungai meluap.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Curah hujan sangat tinggi selama tiga hari oleh karena itu debit air meluap.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Curah hujan sangat tinggi sehingga oleh karena itu debit air meluap.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran penggunaan konjungsi kausalitas!',
                                'explanation' => 'Oleh sebab itu adalah konjungsi antarkalimat, harus di awal kalimat baru.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Konjungsi "karena" digunakan di dalam satu kalimat majemuk bertingkat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Konjungsi "Oleh sebab itu" boleh diletakkan di tengah kalimat setelah tanda koma.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Tanda koma diletakkan setelah kata "Oleh karena itu" di awal kalimat.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi intrakalimat yang menyatakan hubungan konsekuensi akibat adalah ....',
                                'explanation' => 'Konjungsi sehingga menyatakan akibat.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sehingga', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Karena', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Sebab', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Walaupun', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Kalimat yang menggunakan konjungsi kausalitas antarkalimat secara tepat adalah ....',
                                'explanation' => '"Akibatnya," di awal kalimat baru diikuti koma.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penebangan liar terus terjadi. Akibatnya, bencana tanah longsor menerjang perkampungan.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penebangan liar terus terjadi akibatnya bencana tanah longsor menerjang.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Penebangan liar terus terjadi, akibatnya bencana longsor menerjang.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Penebangan liar terus terjadi karena akibatnya bencana longsor menerjang.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk baku dari kata serapan "anomali" menurut KBBI bermakna ....',
                                'explanation' => 'Anomali berarti penyimpangan dari normal.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Penyimpangan atau keanehan dari keadaan normal', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Penyesuaian terhadap iklim baru', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Kekuatan fisik yang sangat luar biasa', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kondisi cuaca yang cerah berawan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Penulisan kata serapan sains yang benar menurut KBBI adalah ....',
                                'explanation' => 'Bentuk baku: fosil, polutan, biosfer.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Fosil, polutan, dan biosfer', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Fossil, polutans, dan biospir', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Phosil, polutan, dan biospir', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Fosil, polutan, dan biosfir', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Konjungsi intrakalimat yang tepat untuk melengkapi kalimat: "Permukaan air laut meningkat ... mencairnya tudung es di kutub utara" adalah ....',
                                'explanation' => 'Karena menyatakan sebab pencairan es.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'karena', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'tetapi', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'atau', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'melainkan', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Bentuk baku dari kata serapan "atmosfir" menurut KBBI adalah ....',
                                'explanation' => 'Baku: atmosfer (dengan huruf e).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Atmosfer', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Atmosfir', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Atmosphere', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Atmosfeer', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Padanan kata bahasa Indonesia untuk istilah ilmiah "ozone layer" adalah ....',
                                'explanation' => 'Lapisan ozon.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Lapisan ozon', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Selimut ozon', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Bilik ozon', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Kubah ozon', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA konjungsi yang tergolong konjungsi antarkalimat kausalitas!',
                                'explanation' => 'Oleh karena itu dan Oleh sebab itu adalah konjungsi antarkalimat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Oleh karena itu,', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Oleh sebab itu,', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Karena', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Sehingga', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Pilihlah DUA kata serapan sains yang berakhiran "-si"!',
                                'explanation' => 'Konservasi dan instalasi berakhiran -si.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Konservasi (dari conservation)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Instalasi (dari installation)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Energetik (dari energetic)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Global (dari global)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan konjungsi kausalitas dengan jenis letaknya dalam kalimat!',
                                'explanation' => 'Pasangan jenis konjungsi kausalitas.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Karena, sebab', 'is_correct' => false, 'match_key' => 'Konjungsi intrakalimat menyatakan sebab', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Sehingga, sampai-sampai', 'is_correct' => false, 'match_key' => 'Konjungsi intrakalimat menyatakan akibat', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Oleh karena itu,', 'is_correct' => false, 'match_key' => 'Konjungsi antarkalimat menyatakan akibat di awal kalimat baru', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Akibatnya,', 'is_correct' => false, 'match_key' => 'Konjungsi antarkalimat menyatakan konsekuensi peristiwa', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan istilah sains lingkungan dengan padanan kata bakunya!',
                                'explanation' => 'Pasangan istilah sains dan terjemahannya.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Carbon footprint', 'is_correct' => false, 'match_key' => 'Jejak karbon', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Global warming', 'is_correct' => false, 'match_key' => 'Pemanasan global', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Renewable energy', 'is_correct' => false, 'match_key' => 'Energi terbarukan', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Climate crisis', 'is_correct' => false, 'match_key' => 'Krisis iklim', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran tata bahasa konjungsi sebab-akibat!',
                                'explanation' => 'Penggunaan karena dan maka bersamaan adalah kesalahan korelasi mubazir.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kalimat: "Karena hari hujan, maka kami tidak pergi" menggunakan konjungsi mubazir.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Perbaikan yang tepat: "Karena hari hujan, kami tidak pergi." (hapus kata maka).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "karena" dan "maka" wajib dipakai bersamaan dalam satu kalimat baku.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Tentukan status kebenaran kata serapan lingkungan!',
                                'explanation' => 'Baku KBBI adalah hidrokarbon.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kata "polusi" bersinonim dengan pencemaran.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kata "geotermal" merujuk pada energi panas bumi.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kata "hidrokarbon" diserap menjadi "hidrokarbuna".', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 3],
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
                                'prompt' => 'Konjungsi yang menghubungkan sebab-akibat antara satu kalimat dengan kalimat berikutnya dinamakan konjungsi ....',
                                'explanation' => 'Konjungsi antarkalimat.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'antarkalimat', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Tanda baca yang wajib diletakkan setelah kata "Oleh karena itu" di awal kalimat adalah tanda ....',
                                'explanation' => 'Tanda koma.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'koma', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Bentuk baku dari kata serapan "atmosfir" menurut KBBI adalah ....',
                                'explanation' => 'Baku: atmosfer.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'atmosfer', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Kata serapan "polutan" bermakna bahan atau zat yang menyebabkan terjadinya ....',
                                'explanation' => 'Polutan menyebabkan polusi/pencemaran.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'polusi', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Sumber energi ramah lingkungan yang memanfaatkan hembusan angin disebut energi ....',
                                'explanation' => 'Energi bayu (angin).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bayu', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Konjungsi intrakalimat yang menyatakan hubungan sebab adalah ....',
                                'explanation' => 'Karena atau sebab.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'karena', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Lawan kata dari energi tak terbarukan (fosil) adalah energi ....',
                                'explanation' => 'Energi terbarukan.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'terbarukan', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => 'Jelaskan perbedaan mendasar antara konjungsi kausalitas intrakalimat (seperti "karena", "sehingga") dengan konjungsi kausalitas antarkalimat (seperti "Oleh karena itu,", "Akibatnya,"), baik dari segi fungsi gramatikal maupun aturan penulisan tanda bacanya!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
1. Konjungsi Intrakalimat:
   - Fungsi: Menghubungkan dua klausa di dalam satu kalimat majemuk yang sama.
   - Penulisan: Terletak di tengah kalimat (atau klausa anak di depan) tanpa huruf kapital di tengah, tidak memerlukan titik sebelumnya. Contoh: "Suhu bumi meningkat drastis karena emisi gas rumah kaca terus bertambah."
2. Konjungsi Antarkalimat:
   - Fungsi: Menghubungkan kalimat yang menyatakan akibat dengan kalimat sebelumnya yang menyatakan sebab.
   - Penulisan: Terletak di awal kalimat baru, diawali huruf kapital, dan WAJIB diikuti tanda koma. Contoh: "Penebangan pohon di hulu sungai berlangsung masif. Oleh karena itu, banjir bandang melanda dataran rendah."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Perbaikilah kalimat majemuk rancu di bawah ini yang mengalami pemborosan konjungsi sebab-akibat ganda agar menjadi kalimat efektif yang benar!
a. Karena lapisan ozon mengalami penipisan maka akibatnya radiasi ultraviolet menembus bumi secara leluasa.
b. Oleh karena itu sehingga para siswa wajib mematikan pendingin ruangan sebelum pulang.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
a. Perbaikan: "Karena lapisan ozon mengalami penipisan, radiasi ultraviolet menembus bumi secara leluasa."
   (Atau: "Lapisan ozon menipis sehingga radiasi ultraviolet menembus bumi secara leluasa." - Hapus konjungsi ganda maka dan akibatnya).
b. Perbaikan: "Oleh karena itu, para siswa wajib mematikan pendingin ruangan sebelum pulang."
   (Hapus kata sehingga setelah konjungsi antarkalimat Oleh karena itu).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Buatlah sebuah paragraf singkat (3-4 kalimat) bertema transisi energi hijau di Indonesia yang memadukan minimal satu konjungsi intrakalimat ("karena" atau "sehingga"), satu konjungsi antarkalimat ("Oleh karena itu,"), dan dua istilah sains serapan baku!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Rubrik Penilaian & Kunci Jawaban:
Contoh Paragraf:
"Pemerintah mempercepat pembangunan pembangkit listrik tenaga surya di berbagai pulau terluar karena potensi radiasi matahari di kawasan tropis sangat melimpah. Pemanfaatan teknologi panel fotovoltaik ini mampu menghasilkan energi bersih sehingga ketergantungan pada bahan bakar fosil dapat dikurangi. Oleh karena itu, investasi pada sektor energi terbarukan menjadi prioritas utama demi menurunkan emisi karbon nasional secara berkelanjutan."',
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
